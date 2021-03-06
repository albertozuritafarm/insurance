<html>
    <head>
        <title>Magnus</title>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                font-family: 'Arial';
                font-size: 8px;
                margin-top: 50px;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 21px;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height:1cm;
                text-align: center;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height:2cm;
                text-align: center;
            }
            ul{
                list-style-type: none;
                line-height:1%;
            }
            ol{
                list-style-type: none;
                line-height:1%;
            }
            .bold{
                font-weight: bold;
            }

            .title{
                color:blue;
            }
            .page-break {
                page-break-after: always;
            }
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                line-height: 2;
            }

            td, th {
                text-align: left;
               /*border: 1px solid;*/
                padding:0px; 
                margin: 0px;
                font-size:10px;
            }

            tr:nth-child(even) {
                /*background-color: #dddddd;*/
            }
            .divData{
                /*background-color:#e5e5e5;*/
            }
            hr {
              border: 1px solid black;
            }
            .underline{
                text-decoration: underline;
                text-align: center;
            }
            .underlineCell{
                text-align: center;
                border-bottom: 1px solid #000;
            }
            #referenceTable td{
                border: 1px solid black;
                text-align: center;
            }
            #referenceTable th{
                border: 1px solid black;
                text-align: center;
            }
            .page-break {
                page-break-after: always;
            }
            .autorizacion{
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <!--<img src="{{public_path('PDF_quotation/header.png')}}" alt="" style="width: 100%;height:100%;"/>-->
            <!--<center><strong class="bold" style="color:#183c6b;font-size: 14px;">N?? COT-</strong></center>-->
        </header>

        <footer>
            <!--<img src="{{public_path('PDF_quotation/footer.png')}}" alt="" style="width: 100%;height:100%;"/>-->
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <!-- FIRST SET OF DATA -->
            <div class="col-md-4 col-md-offset-4">
                <img src="{{public_path('images/logo_seguros_sucre.jpg')}}" alt="" style="width:25%;margin-left:35%;"/>
                <center>
                    <span style="font-size:14px; font-family: 'Arial';"><b>
                        
                            FORMULARIO DE VINCULACI??N DE BENEFICIARIOS
                            (Persona Jur??dica)</b><br>
                            La informaci??n proporcionada en este documento ser?? de estricta confidencialidad
                        
                    </span>
                </center>
            </div>
            <hr>
            <div class="col-md-12" style="padding-top: -5px;">
               <span style="font-size:10px; font-family: 'Arial'; ">
               </span>
            </div>
            <div class="col-md-12" style="padding-top: -10px;">
                <h3 class="title" style="float:left; font-size:10px;">Datos de la empresa (Beneficiario Final): </h3>
                
            </div>
<!--            <div class="col-md-12">
                <h2 style="float:left">Nombres Completos: <span class="underline"></span> </h2>
                <h2 style="float:right">Apellidos Completos: <span class="underline"></span></h2>
            </div>-->
            <br>
            <br>
            <div class="divData" style="width:100%;">
                <div>
                    <table>
                        <tr>
                            <td colspan="2">Nombre:</td>
                            <td colspan="3" style="text-align:left;" class="underlineCell">{{$customer->first_name}} {{$customer->last_name}}</td>
                            <!--<td colspan="2" style="text-align:right;">Apellidos Completos:</td>
                            <td colspan="8" style="text-align:left;" class="underlineCell">{{$customer->last_name}} {{$customer->second_last_name}}</td>-->
                        </tr>
                        <tr>
                           <!-- <td colspan="3">C??dula Identidad:<input type="checkbox" style="margin-top:5px;margin-left:5px;" @if($customer->document_id == 1) checked="checked" @endif > </td>
                            <td colspan="2"> Pasaporte:<input type="checkbox" style="margin-top:5px;" @if($customer->document_id == 2) checked="checked" @endif ></td>
                            <td colspan="2"> Ruc:<input type="checkbox"  style="margin-top:5px;"> </td>-->
                            <td colspan="1" style="text-align:left;">Ruc N?? </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;">{{$customer->document}}</td>
                            <td colspan="5" style="text-align:right;">Fecha de Constituci??n: </td>
                            <td colspan="4" class="underlineCell" style="text-align:left;">{{$birthCountry->name}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Objeto Social:</td>
                            <td colspan="18" class="underlineCell" style="text-align:left;">{{$birthCity->name}} {{$vinculation->birth_date}}</td>
                        </tr>
                       <!-- <tr>
                            <td colspan="2">Estado civil:</td>
                            <td colspan="3">Casado/a:<input type="checkbox" style="margin-top:5px;"  @if($vinculation->civil_state ==2) checked="checked" @endif ></td>
                            <td colspan="3">Soltero/a:<input type="checkbox" style="margin-top:5px;"  @if($vinculation->civil_state == 1) checked="checked" @endif ></td>
                            <td colspan="3">Uni??n de Hecho  <input type="checkbox" style="margin-top:5px;" @if($vinculation->civil_state == 5) checked="checked" @endif ></td>
                            <td colspan="2"> Divorciado/a: <input type="checkbox" style="margin-top:5px;" @if($vinculation->civil_state == 3) checked="checked" @endif ></td>
                            <td colspan="2">Viudo/a: <input type="checkbox" style="margin-top:5px;" @if($vinculation->civil_state == 4) checked="checked" @endif > </td>
                            <td  colspan="7"></td>

                        </tr>-->
                        <tr>
                            <td colspan="4">Actividad Econ??mica:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;">{{$vinculation->main_road}} </td>
                            <td colspan="2">C??digo:</td>
                            <td colspan="6" class="underlineCell" style="text-align:left;">{{$vinculation->main_road}} </td>
                        </tr>

                        <tr>
                            <td colspan="6">Ingresos brutos anuales de la compan??a:</td>
                            <td colspan="14" class="underlineCell" style="text-align:left;">{{$birthCity->name}} {{$vinculation->birth_date}}</td>
                        </tr>

                         <tr>
                            <td colspan="2">Su empresa es::</td><br>
                            <td colspan="3">Sociedad An??nima:<input type="checkbox" style="margin-top:5px;"  @if($vinculation->civil_state ==2) checked="checked" @endif ></td>
                            <td colspan="3">C??a. Limitada:<input type="checkbox" style="margin-top:5px;"  @if($vinculation->civil_state == 1) checked="checked" @endif ></td>
                            <td colspan="3">Sociedad de Hecho  <input type="checkbox" style="margin-top:5px;" @if($vinculation->civil_state == 5) checked="checked" @endif ></td>
                            <td colspan="2"> P??blica: <input type="checkbox" style="margin-top:5px;" @if($vinculation->civil_state == 3) checked="checked" @endif ></td>
                            <td colspan="2">Privada: <input type="checkbox" style="margin-top:5px;" @if($vinculation->civil_state == 4) checked="checked" @endif > </td>
                            <td colspan="2">ONG's: <input type="checkbox" style="margin-top:5px;" @if($vinculation->civil_state == 4) checked="checked" @endif > </td>
                            <td  colspan="7"></td>

                        </tr>
                        <!--<tr>
                            <td colspan="2">Transversal:</td>
                            <td colspan="9" class="underlineCell" style="text-align:left;">{{$vinculation->secondary_road}}</td>
                            <td colspan="1" style="text-align:right;">No:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;"> {{$vinculation->address_number}}</td>

                        </tr>-->
                        <tr>
                            <td colspan="2">Pa??s:</td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><span > {{$country->name}}</span> </td>
                            <td colspan="2" style="text-align:right;">Provincia: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;">{{$province->name}}</td>
                            <td colspan="1" style="text-align:right;">Cant??n: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;">{{$city->name}}</td>
                            <td colspan="1" style="text-align:right;">Parroquia: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;">N/A</td>
                            <td colspan="1" style="text-align:right;">Sector: </td>
                            <td colspan="4" class="underlineCell" style="text-align:left;">{{$vinculation->address_zone}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Calle principal:</td>
                            <td colspan="7" class="underlineCell" style="text-align:left;">{{$vinculation->secondary_road}}</td>
                            <td colspan="1" style="text-align:right;">No:</td>
                            <td colspan="10" class="underlineCell" style="text-align:left;"> {{$vinculation->address_number}}</td>

                        </tr>

                        <tr>
                            <td colspan="2">Transversal:</td>
                            <td colspan="7" class="underlineCell" style="text-align:left;">{{$vinculation->secondary_road}}</td>
                            <td colspan="1" style="text-align:right;">Sector:</td>
                            <td colspan="10" class="underlineCell" style="text-align:left;"> {{$vinculation->address_number}}</td>

                        </tr>
                        <tr>
                            <td colspan="2">Tel??fonos:</td>
                            <td colspan="7"  class="underlineCell" style="text-align:left;">{{$customer->phone}}</td>
                            <td colspan="1" style="text-align:right;">Fax:</td>
                            <td colspan="10" class="underlineCell" style="text-align:left;">{{$customer->mobile_phone}}</td>
                            
                        </tr>

                        <tr>
                            <td colspan="2">Email:</td>
                            <td colspan="7"  class="underlineCell" style="text-align:left;">{{$customer->phone}}</td>
                            <td colspan="1" style="text-align:right;">Website:</td>
                            <td colspan="10" class="underlineCell" style="text-align:left;">{{$customer->mobile_phone}}</td>
                            
                        </tr>
                    </table>
                </div>

            </div>
            <!-- SECOND SET OF DATA -->
            <hr>
            <div class="col-md-12">
                <h3 class="title" style="float:left">Datos del Representante Legal o Apoderado:</h3>
            </div>
            <br>
            <br>
            <br>
            <div class="divData" style="width:100%;">
                <div>
                    <table style="padding:0px; margin: 5px 0px;">
                    <tr>
                            <td colspan="2">Apellidos:</td>
                            <td colspan="3" style="text-align:left;" class="underlineCell">{{$customer->first_name}} {{$customer->last_name}}</td>
                            <td colspan="2" style="text-align:right;">Nombres:</td>
                            <td colspan="3" style="text-align:left;" class="underlineCell">{{$customer->last_name}} {{$customer->second_last_name}}</td>
                        </tr>
                        

                        <tr>
                            <td colspan="2">Lugar y Fecha de Nacimiento:</td>
                            <td colspan="2"  class="underlineCell" style="text-align:left;">{{$customer->phone}}</td>
                            <td colspan="2" style="text-align:right;">Sexo:</td>
                            <td colspan="2">Masculino: <input type="checkbox" style="margin-top:5px;" @if($vinculation->civil_state == 4) checked="checked" @endif ></td>
                            <td colspan="2">Femenino:<input type="checkbox" style="margin-top:5px;"  @if($vinculation->civil_state == 1) checked="checked" @endif ></td>
                            
                        </tr>

                        <tr>
                            <td colspan="2">C??dula /Pasaporte No.:</td>
                            <td colspan="1"  class="underlineCell" style="text-align:left;">{{$customer->phone}}</td>
                            <td colspan="2" style="text-align:right;">Nacionalidad:</td>
                            <td colspan="1" class="underlineCell" style="text-align:left;">{{$customer->mobile_phone}}</td>
                            <td colspan="1" style="text-align:right;">Pep:</td>
                            <td colspan="2"  style="text-align:left;">Si: <input type="checkbox" style="margin-top:5px;" @if($vinculation->civil_state == 4) checked="checked" @endif ></td>
                            <td colspan="2">No:<input type="checkbox" style="margin-top:5px;"  @if($vinculation->civil_state == 1) checked="checked" @endif ></td>
                            
                        </tr>
                        <tr>
                            <td colspan="2">Fecha Nombramiento:</td>
                            <td colspan="1" style="text-align:left;" class="underlineCell"></td>
                            <td colspan="2" style="text-align:right;">Profesi??n:</td>
                            <td colspan="3" style="text-align:left;" class="underlineCell">{{$customer->last_name}} {{$customer->second_last_name}}</td>
                        </tr>

                        <tr>
                            <td colspan="1">Direcci??n:</td>
                            <td colspan="18" style="text-align:left;" class="underlineCell"></td>
                           
                        </tr>

                        <tr>
                            <td colspan="1">Pa??s:</td>
                            <td colspan="1" class="underlineCell" style="text-align:left;"><span > {{$country->name}}</span> </td>
                            <td colspan="2" style="text-align:right;">Provincia: </td>
                            <td colspan="1" class="underlineCell" style="text-align:left;">{{$province->name}}</td>
                            <td colspan="1" style="text-align:right;">Cant??n: </td>
                            <td colspan="1" class="underlineCell" style="text-align:left;">{{$city->name}}</td>
                            <td colspan="1" style="text-align:right;">Parroquia: </td>
                            <td colspan="1" class="underlineCell" style="text-align:left;">N/A</td>
                            <td colspan="1" style="text-align:right;">Sector: </td>
                            <td colspan="1" class="underlineCell" style="text-align:left;">{{$vinculation->address_zone}}</td>
                        </tr>

                        <tr>
                            <td colspan="2">Calle principal:</td>
                            <td colspan="5" class="underlineCell" style="text-align:left;">{{$vinculation->secondary_road}}</td>
                            <td colspan="1" style="text-align:right;">No:</td>
                            <td colspan="6" class="underlineCell" style="text-align:left;"> {{$vinculation->address_number}}</td>

                        </tr>

                        <tr>
                            <td colspan="2">Transversal:</td>
                            <td colspan="5" class="underlineCell" style="text-align:left;">{{$vinculation->secondary_road}}</td>
                            <td colspan="1" style="text-align:right;">Sector:</td>
                            <td colspan="6" class="underlineCell" style="text-align:left;"> {{$vinculation->address_number}}</td>

                        </tr>

                        <tr>
                            <td width="14%">Cargo Actual:</td>
                            <td colspan="6" class="underlineCell" style="text-align:left;">{{$ecoActivity->name}}</td>
                            <td width="15%" style="text-align:right;">Correo Electr??nico:</td>
                            <td colspan="6" class="underlineCell" style="text-align:left;">N/A</td>
                        </tr>

                        <tr>
                            <td colspan="2">Tel??fono Residencial:</td>
                            <td colspan="1"  class="underlineCell" style="text-align:left;">{{$customer->phone}}</td>
                            <td colspan="3" style="text-align:right;">Celular No.:</td>
                            <td colspan="2" class="underlineCell" style="text-align:left;">{{$customer->mobile_phone}}</td>
                            <td colspan="3" style="text-align:right;">Fax No.:</td>
                            <td colspan="2" class="underlineCell" style="text-align:left;">{{$customer->mobile_phone}}</td>
                            
                        </tr>
                        <!--<tr>
                            <td width="14%">Independiente:<input type="checkbox" style="margin-top:5px;"></td>
                            <td width="14%">Empleado privado:<input type="checkbox" checked style="margin-top:5px;"></td>
                            <td width="14%">Empleado p??blico:<input type="checkbox" style="margin-top:5px;"></td>
                            <td width="14%">Jubilado:<input type="checkbox" style="margin-top:5px;"></td>
                            <td width="14%">Estudiante:<input type="checkbox" style="margin-top:5px;"></td>
                            <td width="14%" style="text-align:right;">Otro:</td>
                            <td width="14%"  class="underlineCell" >{{$vinculation->economic_activity_other}}</td>
                        </tr>
                        <tr>
                            <td width="14%">Ocupaci??n o Actividad <br>Econ??mica:</td>
                            <td colspan="3" class="underlineCell" style="text-align:left;">{{$ecoActivity->name}}</td>
                            <td width="15%" style="text-align:right;">Nombre de la Empresa:</td>
                            <td colspan="2" class="underlineCell" style="text-align:left;">N/A</td>
                        </tr>
                         <tr>
                            <td colspan="1">Cargo que desempe??a:</td>
                            <td colspan="3" class="underlineCell" style="text-align:left;">{{$occupation->name}}</td>
                            <td colspan="1"style="text-align:right;">Correo Electr??nico:</td>
                            <td colspan="14" class="underlineCell" style="text-align:left;"></td>
                        </tr>
                        <tr>
                            <td colspan="1">Direcci??n del trabajo:</td>
                            <td colspan="3" class="underlineCell"></td>
                            <td colspan="1" style="text-align:right;">Tel??fonos:</td>
                            <td colspan="14" class="underlineCell"></td>
                        </tr>
                        <tr>
                            <td colspan="1">Direcci??n de cobro:</td>
                            <td colspan="1">Domicilio:<input type="checkbox" checked="checked" style="margin-top:5px;"></td>
                            <td colspan="1">Lugar de trabajo:<input type="checkbox" style="margin-top:5px;"></td>
                            <td colspan="2" style="text-align:right;">Otro:</td>
                            <td colspan="11" class="underlineCell" style="text-align:left;"></td>


                        </tr>-->
                    </table>
                </div>
            </div>
            <!-- THIRD SET OF DATA -->
            <hr>
            <div class="col-md-12">
                <h3 class="title" style="float:left">Datos del C??nyuge o Conviviente del Representante Legal o Apoderado (si aplica):</h3>
            </div>
            <br>
            <br>
            <br>
            <div class="divData" style="width:100%;">
                <div>
                    <table>
                       <!-- <tr>
                            <td colspan="2">Nombres y apellidos:</td>
                            <td colspan="17" class="underlineCell" colspan="3" style="text-align:left;">{{$vinculation->spouse_name}} {{$vinculation->spouse_last_name}}</td>
                        </tr>-->
                        <tr>
                            <td colspan="2">Apellidos:</td>
                            <td colspan="1" style="text-align:left;" class="underlineCell">{{$customer->first_name}} {{$customer->last_name}}</td>
                            <td colspan="2" style="text-align:right;">Nombres:</td>
                            <td colspan="3" style="text-align:left;" class="underlineCell">{{$customer->last_name}} {{$customer->second_last_name}}</td>
                        </tr>
                       <!-- <tr>
                            <td colspan="2">C??dula de Identidad: <input type="checkbox" style="margin-top:5px;" @if($vinculation->spouse_document_id == 1) checked="checked" @endif> </td>
                            <td colspan="1">Pasaporte: <input type="checkbox" style="margin-top:5px;" @if($vinculation->spouse_document_id == 3) checked="checked" @endif> </td>
                            <td colspan="1" style="text-align:right;">No:</td>
                            <td colspan="6" class="underlineCell">{{$vinculation->spouse_document}}</td>
                            <td colspan="1" style="text-align:right;">Nacionalidad:</td>
                            <td colspan="8" class="underlineCell">N/A</td>
                       </tr>--->

                       <tr>
                           
                            <td colspan="2">C??dula /Pasaporte No.: :</td>
                            <td colspan="1" style="text-align:left;" class="underlineCell">{{$customer->first_name}} {{$customer->last_name}}</td>
                            <td colspan="2" style="text-align:right;">Nacionalidad:</td>
                            <td colspan="3" style="text-align:left;" class="underlineCell">{{$customer->last_name}} {{$customer->second_last_name}}</td>
                        </tr>
                       </tr>
                        <!--<tr>
                            <td colspan="2">Lugar y fecha de nacimiento:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;">N/A</td>
                            <td colspan="2" style="text-align:right;">Profesi??n o Actividad Econ??mica:</td>
                            <td colspan="7" class="underlineCell" style="text-align:left;">N/A</td>
                        </tr>
                        <tr>
                            <td colspan="2">Nombre de la Empresa:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;">N/A</td>
                            <td colspan="1" style="text-align:right;">Ingresos Anuales:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;">N/A</td>
                        </tr>
                        <tr>
                            <td colspan="2">Tel??fono:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;">N/A</td>
                            <td colspan="1" style="text-align:right;">Email:</td>
                            <td colspan="7" class="underlineCell" style="text-align:left;">N/A</td>
                        </tr>-->
                    </table>
                </div>
            </div>
            <!-- FOURTH SET OF DATA -->
            <hr>
            <div class="col-md-12">
                <h3 class="title" style="float:left">Historial de reclamaciones e indemnizaciones de los ??ltimos 2 a??os (superiores a USD. 10.000)</h3>
            </div>
            <br>
            <br>
            <br>
            <div class="divData" style="width:100%;">
                <div>
                    <table>
                        <!--<tr>
                            <td style="width:15%">Ingreso Anual:</td>
                            <td style="width:15%" class="underlineCell" style="text-align:left;">{{$vinculation->annual_income}}</td>
                            <td style="width:15%">Otros Ingresos Anuales:</td>
                            <td style="width:15%" class="underlineCell" style="text-align:left;">{{$vinculation->other_annual_income}}</td>
                            <td style="width:15%">Total Ingresos:</td>
                            <td style="width:15%" class="underlineCell" style="text-align:left;">{{$vinculation->total_annual_income}}</td>
                        </tr>
                        <tr>
                            <td style="width:25%" colspan="3">Descripci??n de otros ingresos:</td>
                            <td style="width:75%"colspan="3" class="underlineCell" style="text-align:left;">{{$vinculation->description_other_income}}</td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <span class="title">(Aplica a contratos cuya suma asegurada sea superior a USD 50.000)</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:15%">Total de Activos: USD:</td>
                            <td style="width:15%" class="underlineCell" style="text-align:left;">{{$vinculation->total_actives}}</td>
                            <td style="width:15%">Total de Pasivos: USD:</td>
                            <td style="width:15%" class="underlineCell" style="text-align:left;">{{$vinculation->total_pasives}}</td>
                            <td style="width:15%">(A-P) = Total Patrimonio:</td>
                            <td style="width:15%" class="underlineCell" style="text-align:left;">{{$vinculation->total_assets_pasives}}</td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <span class="title">Referencias (Aplica a contratos cuya suma asegurada sea superior a USD 200.000):</span>
                            </td>
                        </tr>-->
                        <tr><td colspan="1" style="text-align:left;">??Ha recibido indemnizaciones superiores a USD. 10.000, respecto de cualquier asegurador en los ??ltimos dos a??os? :</td><br>
                            <td colspan="6">Si: <input type="checkbox" style="margin-top:5px;" @if($vinculation->civil_state == 4) checked="checked" @endif ></td>
                            <td colspan="6">No:<input type="checkbox" style="margin-top:5px;"  @if($vinculation->civil_state == 1) checked="checked" @endif ></td> 
                            
                        </tr>
                        <tr><td>Si la respuesta es SI, detalle la siguiente informaci??n:</td></tr>
                    </table>
                    <table id="referenceTable">
                        <tr>
                            <th style="width:33%" colspan="3">Nombre de la Compa????a de Seguros</th>
                            <th style="width:33%" colspan="3">Fecha de Indemnizaci??n</th>
                            <th style="width:33%" colspan="3">Descripci??n del bien indemnizado</th>
                            <th style="width:33%" colspan="3">Valor de la indemnizaci??n</th>
                        </tr>
                        <tr>
                        <td style="width:33%" colspan="3">nombre</td>
                        <td style="width:33%" colspan="3">fecha</td>
                        <td style="width:33%" colspan="3">Descripci??n</td>
                        <td style="width:33%" colspan="3">Descripci??n</td>
                            <!--<td style="width:10%">Nombre</td>
                            <td style="width:23%" colspan="2" style="text-align:left;">{{$vinculation->personal_reference_name}}</td>
                            <td style="width:10%">Entidad</td>
                            <td style="width:23%" colspan="2" style="text-align:left;">{{$vinculation->commercial_reference_name}}</td>
                            <td style="width:10%" rowspan="2">Instituci??n Financiera</td>
                            <td style="width:23%" colspan="2" rowspan="2" style="text-align:left;">{{$vinculation->commercial_reference_bank_name}}</td>-->
                        </tr>
                        <tr>
                        <td style="width:33%" colspan="3">nombre</td>
                        <td style="width:33%" colspan="3">fecha</td>
                        <td style="width:33%" colspan="3">Descripci??n</td>
                        <td style="width:33%" colspan="3">Descripci??n</td>
                            <!--<td style="width:10%">Parentesco</td>
                            <td style="width:23%" colspan="2">{{$vinculation->personal_reference_relationship}}</td>
                            <td style="width:10%">Monto</td>
                            <td style="width:23%" colspan="2">{{$vinculation->commercial_reference_amount}}</td>-->
                        </tr>
                        <tr>
                        <td style="width:33%" colspan="3">nombre</td>
                        <td style="width:33%" colspan="3">fecha</td>
                        <td style="width:33%" colspan="3">Descripci??n</td>
                        <td style="width:33%" colspan="3">Descripci??n</td>
                            <!--<td style="width:10%">Tel??fono</td>
                            <td style="width:23%" colspan="2">{{$vinculation->personal_reference_phone}}</td>
                            <td style="width:10%">Tel??fono</td>
                            <td style="width:23%" colspan="2">{{$vinculation->commercial_reference_phone}}</td>
                            <td style="width:10%" >Producto</td>
                            <td style="width:23%" colspan="2">{{$vinculation->commercial_reference_product}}</td>-->
                        </tr>
                        <tr>
                        <td style="width:33%" colspan="3">nombre</td>
                        <td style="width:33%" colspan="3">fecha</td>
                        <td style="width:33%" colspan="3">Descripci??n</td>
                        <td style="width:33%" colspan="3">Descripci??n</td>

                        </tr>
                    </table>
                </div>
            </div>
            <div class="page-break"></div>
            <!-- FIFTH SET OF DATA -->
            <!--<div class="col-md-12">
                <h2 class="title" style="float:left">V??NCULOS EXISTENTES ENTRE EL CONTRATANTE, BENEFICIARIO Y PAGADOR</h2>
            </div>
            <br>
            <br>
           <div class="divData" style="width:100%;">
                <div>
                    <table>
                        <tr>
                            <td style="width:100%">??Es usted el beneficiario de la p??liza? Si <input type="checkbox" style="margin-top:5px" @if($vinculation->benefitiary_name == null) checked="checked" @endif> No <input type="checkbox" style="margin-top:5px" @if($vinculation->benefitiary_name != null) checked="checked" @endif> Si respondi?? NO, indique a continuaci??n los datos del beneficiario y su relaci??n: </td>
                        </tr>
                        <tr>
                            <td style="width:50%">Nombres Completos o raz??n social:</td>
                            <td style="width:50%">{{$vinculation->benefitiary_name}}</td>
                        </tr>
                        <tr>
                            <td style="width:50%">C??dula Identidad:<input type="checkbox" style="margin-top:5px" @if($vinculation->benefitiary_document_id == 1) checked="checked" @endif> Pasaporte:<input type="checkbox" style="margin-top:5px" @if($vinculation->benefitiary_document_id == 3) checked="checked" @endif> Ruc:<input type="checkbox" style="margin-top:5px" @if($vinculation->benefitiary_document_id == 2) checked="checked" @endif> Nro: <span class="underline"></span></td>
                            <td style="width:50%">Nacionalidad: <span class="underline"></span></td>
                        </tr>
                        <tr>
                            <td style="width:50%">Direcci??n de domicilio: <span class="underline">{{$vinculation->benefitiary_address}}</span></td>
                            <td style="width:50%">Tel??fono: <span class="underline">{{$vinculation->benefitiary_phone}}</span></td>
                        </tr>
                        <tr>
                            <td colspan="2">Relaci??n: <span class="underline">{{$vinculation->benefitiary_relationship}}</span></td>
                        </tr>
                        <tr>
                            <td style="width:10%" colspan="2">??Es usted el pagador de la p??liza? S?? <input type="checkbox" style="margin-top:5px" checked="checked"> No <input type="checkbox" style="margin-top:5px"> Si respondi?? NO, indique a continuaci??n los datos personales del pagador de la p??liza y su relaci??n:</td>
                        </tr>
                        <tr>
                            <td style="width:10%" colspan="2">Nombres Completos o raz??n social: <span class="underline"></span></td>
                        </tr>
                        <tr>
                            <td style="width:50%">C??dula Identidad:<input type="checkbox" style="margin-top:5px"> Pasaporte:<input type="checkbox" style="margin-top:5px"> Ruc:<input type="checkbox" style="margin-top:5px"> Nro: <span class="underline"></span></td>
                            <td style="width:50%">Nacionalidad: <span class="underline"></span></td>
                        </tr>
                        <tr>
                            <td style="width:50%">Direcci??n de domicilio: <span class="underline"></span></td>
                            <td style="width:50%">Tel??fono: <span class="underline"></span></td>
                        </tr>
                        <tr>
                            <td style="width:10%" colspan="2">Relaci??n: <span class="underline"></span></td>
                        </tr>
                    </table>
                    <div>
                        <span style="text-align:justify !important">Cuando en la p??liza de seguro de vida o de accidentes personales con la cobertura de muerte, los asegurados hubiesen designado como beneficiarios a sus parientes hasta el cuarto grado de consanguinidad o segundo grado de afinidad, o a su c??nyuge o conviviente en uni??n de hecho, no se requerir?? la informaci??n de tales beneficiarios. Si fuesen otras personas las designadas como beneficiarios, la documentaci??n referente a estos deber?? ser presentada, obligatoriamente, mediante formulario de vinculaci??n de clientes. </span>
                    </div>
                </div>
            </div> -->
            <!-- SIXTH SET OF DATA -->
            <hr>
            <div class="col-md-12">
                <h2 class="title" style="float:left">DECLARACI??N</h2>
            </div>
            <br><br><br><br>
            <div class="divData" style="width:100%;text-align:justify !important">
                <div>
                    
                    <br>
                    <span style="text-align:justify !important">
                    Declaro que la informaci??n contenida en este formulario, as?? como toda la documentaci??n presentada, es verdadera, completa y proporciona la informaci??n de modo confiable y actualizado. 
El beneficiario declara expresamente que sus bienes son de procedencia l??cita, no ligados con actividades de narcotr??fico, lavado de dinero o cualquier otra actividad tipificada en la Ley Org??nica de Prevenci??n, Detecci??n y Erradicaci??n del Delito de Lavado de Activos y del Financiamiento de Delitos. Eximo a Seguros Sucre S. A. de toda responsabilidad, inclusive respecto a terceros, si esta declaraci??n fuese falsa o err??nea.

                    </span>
                    <span class="underline">{{$vinculation->family_exposed}}</span>
                   
                   
                </div>
            </div>
            <br>
            <hr>
            <div class="col-md-12">
                <h2 class="title" style="float:left">AUTORIZACI??N</h2>
            </div>
            <br><br><br><br>
            <div class="divData" style="width:100%;text-align:justify !important">
                <div>
                    
                    <br>
                    <span style="text-align:justify !important">
                    Siendo conocedor de las disposiciones legales para reprimir el lavado de activos, narcotr??fico y financiamiento del terrorismo autorizo expresamente en forma libre, voluntaria e irrevocable a Seguros Sucre S. A., a realizar el an??lisis y las verificaciones que considere necesarias para corroborar la licitud de fondos y bienes comprendidos en el contrato de seguro, e informar a las autoridades competentes si fuera el caso; as?? mismo autorizo expresa, voluntaria e irrevocablemente a todas las personas naturales o jur??dicas de derecho p??blico o privado a facilitar a Seguros Sucre S.A. toda la informaci??n que ??sta les requiera y revisar los bur?? de cr??dito sobre mi informaci??n de riesgos crediticios.

                    </span>
                    <span class="underline">{{$vinculation->family_exposed}}</span>
                   
                    <br><br>
                    <table>
                    <tr><td colspan="1" style="text-align:left;">______________________________</td><td colspan="1" style="text-align:left;">____________</td><td></td><td></td></tr>
                    <tr>
                    <td colspan="1">Firma del Representante Legal </td> <td colspan="1">Lugar y  Fecha </td>
                    </tr>
                    
                    </table>
                    
                    
                </div>
            </div>
            <br>
           
            <!-- SEVENTH SET OF DATA AGENTE --> 
             
            <!-- EIGTH SET OF DATA DATOS DEL CANAL -->
            
            <!-- TENTH SET OF DATA -->
            <hr>
            <div class="col-md-12">
                <h2 class="title" style="float:left">DOCUMENTACI??N REQUERIDA</h2>
            </div>
           
            <br><br>
            <div class="divData" style="width:100%">
                <div>
                    <ul>
                      <li style="padding:5px">???	Copia del registro ??nico de contribuyentes (RUC) o n??mero an??logo.</li>
                      <li style="padding:5px">???	Copia del documento de identificaci??n del representante legal o apoderado.</li>
                      <li style="padding:5px">???	Copia certificada del nombramiento del representante legal o apoderado.</li>
                      <li style="padding:5px">???	N??mina actualizada de accionistas o socios, en la que consten los montos de acciones o participaciones obtenida por el cliente en el ??rgano de control competente o registro competente que lo regule.</li>
                      <li style="padding:5px">???	Constancia de revisi??n en listas de observados.</li>
                    </ul>
                   
                </div>
            </div>
            <hr>
            <div class="col-md-12">
                <h2 class="title" style="float:left">USO EXCLUSIVO DE SEGUROS SUCRE S.A.</h2>
            </div>
            <hr>
            <br><br><br><br>
            <div class="divData" style="width:100%;text-align:justify !important">
            
            <h3>Nombre y firma del Ejecutivo que verifica la documentaci??n e informaci??n: </h3>
                
            </div>
            <div class="divData" style="width:100%;">
                <div>
                    <table>
                        <tr>
                            <td colspan="2">Nombre:</td>
                            <td colspan="7" style="text-align:left;" class="underlineCell">{{$customer->first_name}} {{$customer->last_name}}</td>
                            <!--<td colspan="2" style="text-align:right;">Apellidos Completos:</td>
                            <td colspan="8" style="text-align:left;" class="underlineCell">{{$customer->last_name}} {{$customer->second_last_name}}</td>-->
                        </tr>
                      
                     
                       

                    
                      
                    </table>
                    <br><br>
                    <div class="autorizacion">   
                        Se ha revisado la razonabilidad de la informaci??n proporcionada por el beneficiario y declaro que he verificado la documentaci??n e informaci??n solicitada de acuerdo a lo establecido en la normativa de prevenci??n de lavado de activos. 
                        <br><br>
                    <table>
                    <tr><td colspan="1" style="text-align:left;">__________________________________</td><td colspan="1" style="text-align:left;">______________</td></tr>
                    <tr>
                    <td colspan="1">Firma del Representante Legal </td> <td colspan="1">Lugar y  Fecha </td>
                    </tr>
                    
                    </table>
                    </div>
                </div>
        </main>
    </body>
</html>
