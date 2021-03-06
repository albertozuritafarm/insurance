<html>
    <head>
        <title>Magnus</title>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page  {
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
            <!--<img src="<?php echo e(public_path('PDF_quotation/header.png')); ?>" alt="" style="width: 100%;height:100%;"/>-->
            <!--<center><strong class="bold" style="color:#183c6b;font-size: 14px;">N?? COT-</strong></center>-->
        </header>

        <footer>
            <!--<img src="<?php echo e(public_path('PDF_quotation/footer.png')); ?>" alt="" style="width: 100%;height:100%;"/>-->
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <!-- FIRST SET OF DATA -->
            <div class="col-md-4 col-md-offset-4">
                <img src="<?php echo e(public_path('images/logo_seguros_sucre.jpg')); ?>" alt="" style="width:25%;margin-left:35%;"/>
                <center>
                    <span style="font-size:14px; font-family: 'Arial';"><b>
                        
                    FORMULARIO DE VINCULACI??N A TERCEROS
<br>
                    PERSONA JUR??DICA</b>
                        
                    </span>
                </center>
            </div>
            <hr>
            <div class="col-md-12" style="padding-top: -5px;">
               <span style="font-size:10px; font-family: 'Arial'; ">
               <b>LA ENTREGA DE LA INFORMACI??N Y DOCUMENTACI??N SOLICITADA ES OBLIGATORIA.</b>
               </span>
            </div>
            <div class="col-md-12" style="padding-top: -10px;">
                <h2 class="title" style="float:left; font-size:10px;">DATOS DE LA COMPA????A  </h2>
                <h2 class="title" style="float:right; font-size:10px;">FECHA: <?php echo e($viamaticaDate); ?></h2>
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
                            <td colspan="2">Raz??n Social: </td>
                            <td colspan="7" style="text-align:left;" class="underlineCell"><?php echo e($customer->first_name); ?> <?php echo e($customer->second_name); ?></td>
                            <td colspan="2" style="text-align:right;">Ruc:</td>
                            <td colspan="8" style="text-align:left;" class="underlineCell"><?php echo e($customer->last_name); ?> <?php echo e($customer->second_last_name); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Actividad econ??mica: </td>
                            <td colspan="7" style="text-align:left;" class="underlineCell"><?php echo e($customer->first_name); ?> <?php echo e($customer->second_name); ?></td>
                            <td colspan="2" style="text-align:right;">Fecha de Constituci??n:</td>
                            <td colspan="8" style="text-align:left;" class="underlineCell"><?php echo e($customer->last_name); ?> <?php echo e($customer->second_last_name); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Direcci??n/ Calle Principal:</td>
                            <td colspan="18" class="underlineCell" style="text-align:left;"><?php echo e($vinculation->main_road); ?> </td>
                        </tr>
                        <tr>
                            <td colspan="2">Transversal:</td>
                            <td colspan="9" class="underlineCell" style="text-align:left;"><?php echo e($vinculation->secondary_road); ?></td>
                            <td colspan="1" style="text-align:right;">No:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;"> <?php echo e($vinculation->address_number); ?></td>

                        </tr>
                        <tr>
                            <td colspan="2">Pa??s:</td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><span > <?php echo e($country->name); ?></span> </td>
                            <td colspan="2" style="text-align:right;">Provincia: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><?php echo e($province->name); ?></td>
                            <td colspan="1" style="text-align:right;">Cant??n: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><?php echo e($city->name); ?></td>
                            <td colspan="1" style="text-align:right;">Parroquia: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;">N/A</td>
                            <td colspan="1" style="text-align:right;">Sector: </td>
                            <td colspan="4" class="underlineCell" style="text-align:left;"><?php echo e($vinculation->address_zone); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Tel??fono:</td>
                            <td colspan="4"  class="underlineCell" style="text-align:left;"><?php echo e($customer->phone); ?></td>
                            <td colspan="1" style="text-align:right;">Celular:</td>
                            <td colspan="3" class="underlineCell" style="text-align:left;"><?php echo e($customer->mobile_phone); ?></td>
                            <td colspan="1" style="text-align:right;">Email:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;"><?php echo e($customer->email); ?></td>
                        </tr>
                        <tr>
                            <td colspan="3">C??dula Identidad:<input type="checkbox" style="margin-top:5px;margin-left:5px;" <?php if($customer->document_id == 1): ?> checked="checked" <?php endif; ?> > </td>
                            <td colspan="2"> Pasaporte:<input type="checkbox" style="margin-top:5px;" <?php if($customer->document_id == 2): ?> checked="checked" <?php endif; ?> ></td>
                            <td colspan="2"> Ruc:<input type="checkbox"  style="margin-top:5px;"> </td>
                            <td colspan="1" style="text-align:right;">Nro:</td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><?php echo e($customer->document); ?></td>
                            <td colspan="1" style="text-align:right;">Nacionalidad:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;"><?php echo e($birthCountry->name); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Lugar y fecha de <br>nacimiento:</td>
                            <td colspan="17" class="underlineCell" style="text-align:left;"><?php echo e($birthCity->name); ?> <?php echo e($vinculation->birth_date); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Estado civil:</td>
                            <td colspan="3">Casado/a:<input type="checkbox" style="margin-top:5px;"  <?php if($vinculation->civil_state ==2): ?> checked="checked" <?php endif; ?> ></td>
                            <td colspan="3">Soltero/a:<input type="checkbox" style="margin-top:5px;"  <?php if($vinculation->civil_state == 1): ?> checked="checked" <?php endif; ?> ></td>
                            <td colspan="3">Uni??n de Hecho  <input type="checkbox" style="margin-top:5px;" <?php if($vinculation->civil_state == 5): ?> checked="checked" <?php endif; ?> ></td>
                            <td colspan="2"> Divorciado/a: <input type="checkbox" style="margin-top:5px;" <?php if($vinculation->civil_state == 3): ?> checked="checked" <?php endif; ?> ></td>
                            <td colspan="2">Viudo/a: <input type="checkbox" style="margin-top:5px;" <?php if($vinculation->civil_state == 4): ?> checked="checked" <?php endif; ?> > </td>
                            <td  colspan="7"></td>

                        </tr>
                        <tr>
                            <td colspan="2">Direcci??n/ Calle Principal:</td>
                            <td colspan="18" class="underlineCell" style="text-align:left;"><?php echo e($vinculation->main_road); ?> </td>
                        </tr>
                        <tr>
                            <td colspan="2">Transversal:</td>
                            <td colspan="9" class="underlineCell" style="text-align:left;"><?php echo e($vinculation->secondary_road); ?></td>
                            <td colspan="1" style="text-align:right;">No:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;"> <?php echo e($vinculation->address_number); ?></td>

                        </tr>
                        <tr>
                            <td colspan="2">Pa??s:</td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><span > <?php echo e($country->name); ?></span> </td>
                            <td colspan="2" style="text-align:right;">Provincia: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><?php echo e($province->name); ?></td>
                            <td colspan="1" style="text-align:right;">Cant??n: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><?php echo e($city->name); ?></td>
                            <td colspan="1" style="text-align:right;">Parroquia: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;">N/A</td>
                            <td colspan="1" style="text-align:right;">Sector: </td>
                            <td colspan="4" class="underlineCell" style="text-align:left;"><?php echo e($vinculation->address_zone); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Tel??fono:</td>
                            <td colspan="4"  class="underlineCell" style="text-align:left;"><?php echo e($customer->phone); ?></td>
                            <td colspan="1" style="text-align:right;">Celular:</td>
                            <td colspan="3" class="underlineCell" style="text-align:left;"><?php echo e($customer->mobile_phone); ?></td>
                            <td colspan="1" style="text-align:right;">Email:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;"><?php echo e($customer->email); ?></td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="col-md-12" style="padding-top: -10px;">
                <h2 class="title" style="float:left; font-size:10px;">DATOS DEL REPRESENTANTE LEGAL   </h2>
                
            </div>
            <br><br>
            <div class="divData" style="width:100%;">
                <div>
                    <table>
                        <tr>
                            <td colspan="2">Nombres y apellidos:</td>
                            <td colspan="18" style="text-align:left;" class="underlineCell"><?php echo e($customer->first_name); ?> <?php echo e($customer->second_name); ?></td>
                            
                        </tr>
                        <tr>
                            <td colspan="3">C??dula Identidad:<input type="checkbox" style="margin-top:5px;margin-left:5px;" <?php if($customer->document_id == 1): ?> checked="checked" <?php endif; ?> > </td>
                            <td colspan="2"> Pasaporte:<input type="checkbox" style="margin-top:5px;" <?php if($customer->document_id == 2): ?> checked="checked" <?php endif; ?> ></td>
                            <td colspan="2"> Ruc:<input type="checkbox"  style="margin-top:5px;"> </td>
                            <td colspan="1" style="text-align:right;">Nro:</td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><?php echo e($customer->document); ?></td>
                            <td colspan="1" style="text-align:right;">Nacionalidad:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;"><?php echo e($birthCountry->name); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Lugar y fecha de <br>nacimiento:</td>
                            <td colspan="17" class="underlineCell" style="text-align:left;"><?php echo e($birthCity->name); ?> <?php echo e($vinculation->birth_date); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Estado civil:</td>
                            <td colspan="3">Casado/a:<input type="checkbox" style="margin-top:5px;"  <?php if($vinculation->civil_state ==2): ?> checked="checked" <?php endif; ?> ></td>
                            <td colspan="3">Soltero/a:<input type="checkbox" style="margin-top:5px;"  <?php if($vinculation->civil_state == 1): ?> checked="checked" <?php endif; ?> ></td>
                            <td colspan="3">Uni??n de Hecho  <input type="checkbox" style="margin-top:5px;" <?php if($vinculation->civil_state == 5): ?> checked="checked" <?php endif; ?> ></td>
                            <td colspan="2"> Divorciado/a: <input type="checkbox" style="margin-top:5px;" <?php if($vinculation->civil_state == 3): ?> checked="checked" <?php endif; ?> ></td>
                            <td colspan="2">Viudo/a: <input type="checkbox" style="margin-top:5px;" <?php if($vinculation->civil_state == 4): ?> checked="checked" <?php endif; ?> > </td>
                            <td  colspan="7"></td>

                        </tr>
                        <tr>
                            <td colspan="2">Direcci??n/ Calle Principal:</td>
                            <td colspan="18" class="underlineCell" style="text-align:left;"><?php echo e($vinculation->main_road); ?> </td>
                        </tr>
                        <tr>
                            <td colspan="2">Transversal:</td>
                            <td colspan="9" class="underlineCell" style="text-align:left;"><?php echo e($vinculation->secondary_road); ?></td>
                            <td colspan="1" style="text-align:right;">No:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;"> <?php echo e($vinculation->address_number); ?></td>

                        </tr>
                        <tr>
                            <td colspan="2">Pa??s:</td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><span > <?php echo e($country->name); ?></span> </td>
                            <td colspan="2" style="text-align:right;">Provincia: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><?php echo e($province->name); ?></td>
                            <td colspan="1" style="text-align:right;">Cant??n: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;"><?php echo e($city->name); ?></td>
                            <td colspan="1" style="text-align:right;">Parroquia: </td>
                            <td colspan="2" class="underlineCell" style="text-align:left;">N/A</td>
                            <td colspan="1" style="text-align:right;">Sector: </td>
                            <td colspan="4" class="underlineCell" style="text-align:left;"><?php echo e($vinculation->address_zone); ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">Tel??fono:</td>
                            <td colspan="4"  class="underlineCell" style="text-align:left;"><?php echo e($customer->phone); ?></td>
                            <td colspan="1" style="text-align:right;">Celular:</td>
                            <td colspan="3" class="underlineCell" style="text-align:left;"><?php echo e($customer->mobile_phone); ?></td>
                            <td colspan="1" style="text-align:right;">Email:</td>
                            <td colspan="8" class="underlineCell" style="text-align:left;"><?php echo e($customer->email); ?></td>
                        </tr>
                    </table>
                </div>

            </div>
            <!-- SECOND SET OF DATA -->
            <div class="col-md-12">
                <h3 class="title" style="float:left">SITUACI??N FINANCIERA</h3>
            </div>
            <br>
            <br>
            <div class="divData" style="width:100%;">
                <div>
                    <table>
                    <tr>
                            <td colspan="1">Ingresos brutos anuales declarados en el a??o anterior: </td>
                            <td style="width:60%" colspan="14" class="underlineCell" style="text-align:left;"><?php echo e($vinculation->main_road); ?> </td>
                        </tr>
                     
                    </table>
                </div>

            </div>
            


            
            <!-- THIRD SET OF DATA -->
            
            <!-- FOURTH SET OF DATA -->
            
            
            <!-- SIXTH SET OF DATA -->
            <div class="col-md-12">
                <h2 class="title" style="float:left">DECLARACI??N Y AUTORIZACI??N</h2>
            </div>
            <br><br><br><br>
            <div class="divData" style="width:100%;text-align:justify !important">
                <div>
                    <span class="title">DECLARACI??N</span>
                    <br>
                    <span style="text-align:justify !important">
                    Declaro que la informaci??n contenida en este formulario, as?? como toda la documentaci??n presentada, es verdadera, completa y proporciona la informaci??n de modo confiable y actualizada. Adem??s, declaro conocer y aceptar que es mi obligaci??n como cliente actualizar anualmente estos datos, as?? como el comunicar y documentar de manera inmediata a la compa????a cualquier cambio en la informaci??n que hubiere proporcionado. Durante la vigencia de la relaci??n con Seguros Sucre S.A., me comprometo a proveer de la documentaci??n e informaci??n que me sea solicitada.

El asegurado declara expresamente que el seguro aqu?? convenido ampara bienes de procedencia l??cita, no ligados con actividades de narcotr??fico, lavado de dinero o cualquier otra actividad tipificada en la Ley Org??nica de Prevenci??n, Detecci??n y Erradicaci??n del Delito de Lavado de Activos y del Financiamiento de Delitos. Igualmente, la prima a pagar por este concepto tiene origen l??cito y ninguna relaci??n con las actividades mencionadas anteriormente. Eximo a Seguros Sucre S.A. de toda responsabilidad, inclusive respecto a terceros, si esta declaraci??n fuese falsa o err??nea. 

En caso de que se inicien investigaciones sobre mi persona, relacionadas con las actividades antes se??aladas o de producirse transacciones inusuales o injustificadas, Seguros Sucre S.A., podr?? proporcionar a las autoridades competentes toda la informaci??n que tenga sobre las mismas o que le sea requerida. En tal sentido renuncio a presentar en contra de Seguros Sucre S.A., sus funcionarios o empleados, cualquier reclamo o acci??n legal, judicial, extrajudicial, administrativa, civil penal o arbitral en la eventualidad de producirse tales hechos.


                        Declaraci??n sobre la condici??n de Persona Expuesta Pol??ticamente PEP (Persona que desempe??a o ha desempe??ado funciones p??blicas en el pa??s o en el exterior). Informo que he le??do la Lista M??nima de Cargos P??blicos a ser considerados "Personas Expuestas Pol??ticamente" y declaro bajo juramento que SI</span><?php if($vinculation->person_exposed =='yes'): ?> __<span class="underline">X</span>__ <?php else: ?> _____ <?php endif; ?> <span text-align="justifty"> NO </span><?php if($vinculation->person_exposed !='yes'): ?> __<span class="underline">X</span>__ <?php else: ?> _____ <?php endif; ?> <span text-align="justifty"> me encuentro ejerciendo uno de los cargos incluidos en la lista o lo ejerc?? hace un a??o atr??s. En el caso de que la respuesta sea positiva, indicar: Cargo/Funci??n/Jerarqu??a:
                    </span>
                    <span class="underline"><?php echo e($vinculation->family_exposed); ?></span>
                    <hr>
                    <span>
                        Nota: La presente declaraci??n no constituye una autoincriminaci??n de ninguna clase, ni conlleva ninguna responsabilidad administrativa, civil o penal.
                    </span>
                </div>
            </div>
            <br>
           <div class="divData" style="width:100%;text-align:justify !important">
                <div>
                    <span class="title">AUTORIZACI??N</span>
                    <br>
                    <span style="text-align:justify">
                        Siendo conocedor de las disposiciones legales, autorizo expresamente en forma libre, voluntaria e irrevocable a Seguros Sucre S. A., a realizar el an??lisis y las verificaciones que considere necesarias para corroborar la licitud de fondos y bienes comprendidos en el contrato de seguro e informar a las autoridades competentes si fuera el caso; adem??s autorizo expresa, voluntaria e irrevocablemente a todas las personas naturales o jur??dicas de derecho p??blico o privado a facilitar a Seguros Sucre S.A. toda la informaci??n que ??sta les requiera  y revisar los bur?? de cr??dito sobre mi informaci??n de riesgos crediticios. 
                    </span>
                    <hr>
                    <span>
                        Nota: La presente declaraci??n no constituye una autoincriminaci??n de ninguna clase, ni conlleva ninguna responsabilidad administrativa, civil o penal.
                    </span>
                    <br>
                    <br>
                   
                    <br>

                    <table>
                    <tr><td></td><td></td><td colspan="1" style="text-align:left;">______________________________</td><td></td><td></td></tr>
                    <tr>
                    <td></td><td></td><td colspan="1" style="text-align:left;">Firma del Representante Legal </td><td></td><td></td>
                    </tr>
                    <tr>
                    <td colspan="1" style="text-align:left;">C.I: <?php echo e($customer->document); ?> </td>
                    </tr>
                    
                    </table>
                   
                </div>
            </div>
            <!-- SEVENTH SET OF DATA AGENTE --> 
             
            <!-- EIGTH SET OF DATA DATOS DEL CANAL -->
           
            <!-- NINTH SET OF DATA -->
            <div class="col-md-12">
                <h2 class="title" style="float:left">USO EXCLUSIVO DE SEGUROS SUCRE S.A.</h2>
            </div>
            <br><br><br><br>
            <div class="divData" style="width:100%;text-align:justify !important">
                <div>
                    <span style="text-align:justify">
                        Datos de la Relaci??n Comercial
                        Nueva __<span class="underline">X</span>__    Renovaci??n ____ Ramo: _____<span class="underline"><?php echo e($broker->ramodes); ?></span>_____________ Suma Asegurada: _______<span class="underline"><?php echo e($broker->insured_value); ?></span>________ Canal de Vinculaci??n: ____<span class="underline"><?php echo e($broker->canal); ?></span>_______ 
                    </span>
                    <br>
                    <span class="title">
                        Nombre y firma del Ejecutivo que verifica la documentaci??n e informaci??n:
                    </span>
                    <br>
                    <span>
                        Nombres Completos: ________________<span class="underline"><?php if($broker->channelId!=19): ?><?php echo e($broker->ejecutivo); ?><?php else: ?><?php echo e($broker->ejecutivo_ss); ?><?php endif; ?></span>__________________________________ Confirmo que he revisado la razonabilidad de la informaci??n proporcionada por el cliente o contratante y declaro que he verificado la documentaci??n e informaci??n solicitada de acuerdo a lo establecido en la pol??tica "Conozca su Cliente" y he analizado la informaci??n respecto a la actividad econ??mica e ingresos, los cuales concuerdan con los productos solicitados.
                    </span>
                    <br>
                </div>
            </div>
            <div class="autorizacion">   
                        <br><br>
                    <table>
                    <tr><td colspan="1" style="text-align:left;">__________________________________</td><td colspan="1" style="text-align:left;">______________</td></tr>
                    <tr>
                    <td colspan="1">Firma del Representante Comercial </td> <td colspan="1">Lugar y  Fecha </td>
                    </tr>
                    
                    </table>
            </div>
            <!-- TENTH SET OF DATA -->
            <div class="col-md-12">
                <h3 class="title" style="float:left">DOCUMENTOS REQUERIDOS - PERSONA JUR??DICA</h3>
            </div>
            <br><br>
            <div class="divData" style="width:100%">
                <div>
                    <ul>
                      <li style="padding:5px">??? Copia del registro ??nico de contribuyentes (RUC) o n??mero an??logo.</li>
                      <li style="padding:5px">???	Copia del documento de identificaci??n del representante legal o apoderado.</li>
                      <li style="padding:5px">???	Copia certificada del nombramiento del representante legal o apoderado.</li>
                    </ul>
                    
                   
                </div>
            </div>
        </main>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel\magnussucre\resources\views/vinculation/pdf_terceros.blade.php ENDPATH**/ ?>