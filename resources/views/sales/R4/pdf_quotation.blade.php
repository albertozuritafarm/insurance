<html>
    <head>
        <title>Magnus</title>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @import url('https://fonts.googleapis.com/css?family=Montserrat:600,700&display=swap');
            @page {
                margin: 0cm;
            }

            /** Define now the real margins of every page in the PDF **/
            body {
                font-family: Montserrat;
                text-align: justify;
                font-size:12px;
                margin-top: 150px;
                margin-left: 1cm;
                margin-right: 1cm;
                margin-bottom: 2cm;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height:2cm;
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
                line-height:5%;
            }
            ol{
                list-style-type: none;
                line-height:5%;
            }
            li{
                list-style-type: none;
                margin-top: 10px;
                line-height:5%;
            }
            .bold{
                font-weight: bold;
            }

            .title{
                font-size: 13px;
            }

            hr {
                clear: both;
                visibility: hidden;
            }
            .page-break {
                page-break-after: always;
            }
            table {
                font-family:  'Montserrat-SemiBold', sans-serif;
                border-collapse: collapse;
                width: 100%;
                line-height: 2;
                max-width: 700px !important;
            }

            td, th {
                text-align: left;
            }

            tr:nth-child(even) {
                /*background-color: #dddddd;*/
            }
            .divData{
                background-color:#e5e5e5;
            }
            .borderLeft{
                 border-left: 1px solid #2D2A26; padding-left: 5px
            }
            .borderRight{
                 border-right: 1px solid #2D2A26
            }
            .borderBottom{
                 border-bottom: 1px solid #2D2A26
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <img src="{{public_path('PDF_quotation/header.png')}}" alt="" style="width: 100%;height:100%;"/>
            <center><strong class="bold" style="color:#183c6b;font-size: 14px;">N?? COT-CASA HABITACI??N-{{$year}}-{{$id}}</strong></center>
        </header>

        <footer>
            <img src="{{public_path('PDF_quotation/footer.png')}}" alt="" style="width: 100%;height:100%;"/>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <!-- FIRST SET OF DATA -->
            <div class="" style="width:100%;">
                <div style="padding-left: 10px;">
                    <table>
                        <tr>
                            <td style="width:25%"></td>
                            <td style="width:25%"></td>
                            <th style="width:25%" class="divData"><span class="bold" style="padding-left:5px">Fecha Cotizaci??n:</span></th>
                            <td style="width:25%" class="divData">{{$customer[0]->date}}</td>
                        </tr>
                        <tr>
                            <th style="width:50%;background-color:#003B71; text-align:left; border-top: 0px; border-bottom: 0px; border-left: 2px solid #CF3339; color:white; padding:0 0 0 5px"><span class="bold">DATOS DEL ASEGURADO</span></th>
                            <td style="width:20%;background-color:#003B71;"></td>
                            <td style="width:20%;background-color:#003B71;"></td>
                            <td style="width:10%;background-color:#003B71; border-right: 1px solid #2D2A26"></td>
                        </tr>
                        <tr class="divData borderLeftRight">
                            <th class='borderLeft' style="width:20%;">Tipo de Documento</th>
                            <td style="width:30%">{{$customer[0]->typeDocDes}}</td>
                            <th style="width:25%">Numero Doc</th>
                            <td style="width:25%; border-right: 1px solid #2D2A26">{{$customer[0]->cusDocument}}</td>
                        </tr>
                        <tr class='borderLeftRight'>
                            <th style="width:20%; border-left: 1px solid #2D2A26; padding-left: 5px">Nombres</th>
                            <td style="width:30%">{{$customer[0]->names}}</td>
                            <th style="width:25%">Apellidos</th>
                            <td style="width:25%; border-right: 1px solid #2D2A26">{{$customer[0]->lastNames}}</td>
                        </tr>
                        <tr class="divData borderLeftRight">
                            <th style="width:20%; border-left: 1px solid #2D2A26; padding-left: 5px">Fch. Nacimiento</th>
                            <td style="width:30%">{{$customer[0]->cusBirthdate}}</td>
                            <th style="width:25%">Ciudad</th>
                            <td style="width:25%; border-right: 1px solid #2D2A26">{{$customer[0]->city}}</td>
                        </tr>
                        <tr class='borderLeftRight'>
                            <th style="width:20%; border-left: 1px solid #2D2A26; padding-left: 5px">Tlf. Convencional</th>
                            <td style="width:30%">{{$customer[0]->phone}}</td>
                            <th style="width:25%">Tlf. Celular</th>
                            <td style="width:25%; border-right: 1px solid #2D2A26">{{$customer[0]->mobile}}</td>
                        </tr>
                        <tr class="divData borderLeftRight">
                            <th style="width:20%; border-left: 1px solid #2D2A26; padding-left: 5px">Correo Electronico</th>
                            <td style="width:30%">{{$customer[0]->email}}</td>
                            <td style="width:25%"></td>
                            <td style="width:25%; border-right: 1px solid #2D2A26"></td>
                        </tr>
                        <tr class='borderLeftRight borderBottom'>
                            <th style="width:20%; border-left: 1px solid #2D2A26; border-bottom: 1px solid #2D2A26; padding-left: 5px">Tiene Broker</th>
                            <td style="width:30%; border-bottom: 1px solid #2D2A26">Si</td>
                            <td style="width:25%; border-bottom: 1px solid #2D2A26"></td>
                            <td style="width:25%; border-right: 1px solid #2D2A26; border-bottom: 1px solid #2D2A26"></td>
                        </tr>
                    </table>
                    <hr>
                </div>
            </div>
            <!-- SECOND SET OF DATA -->
            <div class="" style="width:100%;">
                <div style="padding-left: 10px;">
                    <table>
                        <tr>
                            <th style="width:50%;background-color:#003B71; text-align:left; border-top: 0px; border-bottom: 0px; border-left: 2px solid #CF3339; color:white; padding:0 0 0 5px"><span class="bold">BIEN ASEGURADO</span></th>
                            <td style="width:20%;background-color:#003B71;"></td>
                            <td style="width:20%;background-color:#003B71;"></td>
                            <td style="width:10%;background-color:#003B71; border-right: 1px solid #2D2A26"></td>
                        </tr>
                        <tr class='divData'>
                            <th class='borderLeft' style="width:25%">Calle Principal</th>
                            <td style="width:25%">{{$bienAsegurado[0]->main_street}}</td>
                            <th style="width:25%">Calle Secundaria</th>
                            <td class='borderRight' style="width:25%">{{$bienAsegurado[0]->secondary_street}}</td>
                        </tr>
                        <tr>
                            <th class='borderLeft' style="width:25%">N??mero</th>
                            <td style="width:25%">{{$bienAsegurado[0]->number}}</td>
                            <th style="width:25%">Oficina/Departamento</th>
                            <td class='borderRight' style="width:25%">{{$bienAsegurado[0]->office_department}}</td>
                        </tr>
                        <tr class='divData'>
                            <th class='borderLeft borderBottom' style="width:25%">Ciudad</th>
                            <td class='borderBottom' style="width:25%">{{$bienAsegurado[0]->name}}</td>
                            <th class='borderBottom' style="width:25%"></th>
                            <td class='borderRight borderBottom' style="width:25%"></td>
                        </tr>
                    </table>
                    <hr>
                </div>
            </div>
            <div class="" style="width:100%;">
                <div style="padding-left: 10px;">
                    <table style="border: 1px solid">
                        <tr>
                            <th style="width:50%;background-color:#003B71; text-align:left; border-top: 0px; border-bottom: 0px; border-left: 2px solid #CF3339; color:white; padding:0 0 0 5px"><span class="bold">RUBROS</span></th>
                            <td style="width:20%;background-color:#003B71;"></td>
                            <td style="width:20%;background-color:#003B71;"></td>
                            <td style="width:10%;background-color:#003B71; border-right: 1px solid #2D2A26"></td>
                        </tr>
                        {!! getRubrosPdf($id) !!}
                    </table>
                    <hr>
                </div>
            </div>
            <!-- THIRD SET OF DATA -->
            <div class="" style="width:100%;">
                <div style="padding-left: 10px;">
                    <table style="border: 1px solid">
                        <tr>
                            <th style="width:50%;background-color:#003B71; text-align:left; border-top: 0px; border-bottom: 0px; border-left: 2px solid #CF3339; color:white; padding:0 0 0 5px"><span class="bold">VALOR DE PRIMA</span></th>
                            <td style="width:20%;background-color:#003B71;"></td>
                            <td style="width:20%;background-color:#003B71;"></td>
                            <td style="width:10%;background-color:#003B71; border-right: 1px solid #2D2A26"></td>
                        </tr>
                        <tr class="divData">
                            <th class="borderLeft" style="width:25%">Prima Neta</th>
                            <td style="width:25%">{{$sales->prima_total}}</td>
                            <th style="width:25%">Contribucion SCVS</th>
                            <td class="borderRight" style="width:25%">{{$sales->super_bancos}}</td>
                        </tr>
                        <tr>
                            <th class="borderLeft" style="width:25%">Seguro Campesino</th>
                            <td style="width:25%">{{$sales->seguro_campesino}}</td>
                            <th style="width:25%">Derecho de Emision</th>
                            <td class="borderRight" style="width:25%">{{$sales->derecho_emision}}</td>
                        </tr>
                        <tr class="divData">
                            <th class="borderLeft borderBottom" style="width:25%">Iva 12%</th>
                            <td class="borderBottom" style="width:25%">{{$sales->tax}}</td>
                            <th class="borderBottom" style="width:25%">Prima Total</th>
                            <td class="borderRight borderBottom" style="width:25%">{{$sales->total}}</td>
                        </tr>
                    </table>
                    <hr>
                </div>
            </div>

            <div>
                <hr>
                    <div style="width:100%;background-color: white;color:#183c6b;font-size:14px;font-weight: bold;line-height: 20px; height:25px;">
                        <span><center><h1>{{$proName}}</h1></center></span>
                    </div>
                <hr>
            </div>
            <!-- COBERTURAS -->
            <div >
                    <div style="max-width: 700px !important;">
                            {!! getCoverageDetails(1, $customer[0]->idProduct) !!}

                        <hr>
                    </div>
                <hr>
                <hr>
                <hr>
            </div>
            <!-- AMPAROS ADICIONALES --> 
            <!-- <div>
                <div style="width:100%;background-color: #183c6b;color:white;font-size:14px;font-weight: bold;line-height: 20px; height:25px;">
                    <span><center>AMPAROS ADICIONALES</center></span>
                </div>
                <hr>
                <table>
                    <tr>
                        <th style="width:40%">RESPONSABILIDAD CIVIL</th>
                        <td style="width:60%">USD 40,000.00 LUC (l??mite ??nico combinado)<td>
                    </tr>
                    <tr>
                        <th style="width:40%">MUERTE ACCIDENTAL E INVALIDEZ TOTAL Y PERMANENTE</th>
                        <td style="width:60%">USD 8,000.00 por ocupante (en exceso del SPPAT) Cubre al n??mero de ocupantes detallados en la matr??cula del veh??culo, inclu??do el conductor (m??ximo 5 ocupantes, no aplica furgonetas)<td>
                    </tr>
                    <tr>
                        <th style="width:40%">GASTOS MEDICOS POR ACCIDENTE</th>
                        <td style="width:60%">USD 5,000.00 por ocupante (en exceso del SPPAT<td>
                    </tr>
                    <tr>
                        <th style="width:40%">CANASTA FAMILIAR POR MUERTE DEL TITULAR</th>
                        <td style="width:60%">USD 2,000.00 de indemnizaci??n por muerte del titular de la p??liza<td>
                    </tr>  
                </table>
            </div> -->
            <!-- CONDICIONES ESPECIALES -->
            <!-- <div>
                <hr>
                <div style="width:100%;background-color: #183c6b;color:white;font-size:14px;font-weight: bold;line-height: 20px; height:25px;">
                    <span><center>CONDICIONES ESPECIALES</center></span>
                </div>
                <hr>
                <div>
                    No depreciaci??n en p??rdidas parciales<br>
                    Se cubre Air Bag al 100% solamente por un siniestro cubierto por la p??liza<br>
                    Descuento del 10% en talleres en convenio con Seguros Sucre para mantenimiento y da??os por aver??a<br>
                    <hr>
                </div>
            </div> -->
            <!-- DISPOSITIVO -->
            <!-- <div>
                <span class="bold">DISPOSITIVO</span><br>
                <hr>
                <div>
                    Todo veh??culo con valor asegurado igual o superior a USD 25,000.00, deber?? mantener instalado y activo un dispositivo de rastreo satelital debidamente calificado durante la vigencia de la p??liza, caso contrario se aplicar?? el deducible estipulado en las condiciones particulares.<br>
                    En caso de que el veh??culo asegurado sufra alg??n choque, volcamiento o realice cualquier modificaci??n o instalaci??n de equipos adicionales que comprometan componentes el??ctricos del veh??culo, se deber?? comunicar de manera inmediata al proveedor del sistema de seguridad con el objeto de que se revise el correcto funcionamiento del dispositivo.<br>
                    Adem??s el asegurado se encuentra obligado a realizar por cada per??odo de renovaci??n una revisi??n del dispositivo en las instalaciones del proveedor.<br>
                    La certificaci??n de operatividad del deducible ser?? documento ineludible en el tr??mite del siniestro.<br>
                </div>
            </div> -->
            <!-- AUTORIZACI??N EXPRESS -->
            <!-- <div>
                <hr>
                <span class="bold">AUTORIZACION EXPRESS</span><br>
                <hr>
                <div>
                    Siempre que el siniestro no supere USD. 1.500,00 y el veh??culo ingrese a los talleres en convenio de la Compa????a, se autorizar?? reparaci??n inmediata.<br>
                    En caso de siniestro, que afecte uno de los amparos de p??rdida parcial, en el que fuere necesaria la reposici??n de piezas que no existieren en el
                    mercado, la Compa????a no ser?? responsable por los perjuicios que ocasionare al Asegurado, el tiempo que demande la importaci??n de dichas
                    piezas; y si tales piezas no existieren tampoco en la f??brica, la Compa????a cumplir?? su obligaci??n pagando el importe de ellas, en efectivo, al
                    Asegurado, en un plazo de 45 d??as, de acuerdo con el precio promedio de venta de los importadores que los hubieren tenido disponibles durante el
                    ??ltimo semestre, m??s el costo ajustado de su instalaci??n basado en un presupuesto formulado por un taller de reconocida solvencia. <br>
                    Los gastos adicionales que implique la aceleraci??n del proceso de importaci??n, tampoco ser??n responsabilidad de la Compa????a.<br>
                </div>
            </div> -->
            <!-- SUCRE ASISTENCIA -->
            <!-- <div>
                <hr>
                <span class="bold">SUCRE ASISTENCIA</span><br>
                <hr>
                <div>
                    Remolque o traslado del veh??culo (a nivel nacional) por aver??a y accidentes USD 400,00<br>
                    Segundo Traslado hasta USD.100,00<br>
                    Auxilio mec??nico en aver??as como llanta baja, llaves al interior, bater??a, gasolina.<br>
                    Conductor Elegido<br>
                    Transmisi??n de mensajes urgentes (ilimitado).<br>
                    Traslado de ambulancia en caso de accidentes.<br>
                    Orientaci??n jur??dica en el sitio en caso de heridos.<br>
                    Orientaci??n jur??dica telef??nica.<br>
                    Asistencia Legal In Situ en Quito, Guayaquil, Cuenca, Ambato, Manta, Portoviejo<br>
                    Servicio de matriculaci??n<br>
                    Desplazamiento de los ocupantes por inmovilizaci??n del veh??culo asegurado<br>
                    Servicio Exequial<br>
                </div>
            </div> -->
            <!-- AUTO SUSTITUTO -->
            <!-- <div>
                <hr>
                <span class="bold">AUTO SUSTITUTO</span><br>
                <hr>
                <div>
                    Valor m??nimo del siniestro para acceder al beneficio: $ 1.000.00 como costo ajustado y aceptado para la reparaci??n.
                    Numero de d??as del beneficio:<br>
                    Siniestros parciales 12 d??as por evento<br>
                    Perdidas totales 20 d??as<br>
                    Tipo de veh??culo a proveerse: categor??a econ??mica<br>
                    Voucher en garant??a<br>
                </div>
            </div> -->
            <!-- SERVICIO MI AUTO MATRICULADO -->
            <!-- <div>
                <hr>
                <span class="bold">SERVICIO MI AUTO MATRICULADO</span><br>
                <hr>
                <div>
                    Servicio que incluye la gesti??n de los tr??mites de revisi??n t??cnica y matriculaci??n vehicular del veh??culo de propiedad del asegurado (1evento al
                    a??o)<br>
                    Servicios para veh??culos que tengan un seguro de VH vigente.<br>
                    Servicios para tr??mites de renovaci??n de matr??cula.<br>
                    Los pagos necesarios deber??n ser realizados por el Asegurado.<br>
                    El Asegurado deber?? entregar los documentos necesarios.<br>
                    El Asegurado ser?? responsable por el estado mec??nico del veh??culo que permita la aprobaci??n por parte de la autoridad.<br>
                </div>
            </div> -->
            <!-- SERVICIO LEGAL -->
            <!-- <div>
                <hr>
                <span class="bold">SERVICIO LEGAL EN IMPUGNACIONES DE CONTRAVENCIONES DE TR??NSITO</span><br>
                <hr>
                <div>
                    Servicio que cubre los honorarios profesionales de un abogado para el an??lisis e impugnaci??n por contravenciones de tr??nsito en territorio
                    ecuatoriano.<br>
                    Condiciones:<br>
                    - Infracciones imputadas al veh??culo propiedad del Asegurado.<br>
                    - Asegurado deber?? notificar al servicio dentro de las 24 horas siguientes a la notificaci??n (en la Actualidad la ANT notifica al titular al correo
                    electr??nico
                    o celular del propietario)<br>
                    - Servicio Incluye:<br>
                    a.- An??lisis de la contravenci??n<br>
                    b.- Impugnaci??n<br>
                    c.- Acompa??amiento a la Audiencia respectiva<br>
                    (L??mite: 1 evento al a??o)
                </div>
            </div> -->
            <!-- CLAUSULAS -->
            <!-- <hr>
            <div style="width:100%;background-color: #183c6b;color:white;font-size:14px;font-weight: bold;line-height: 20px; height:25px;">
                <span><center>CLAUSULAS</center></span>
            </div>
            <hr>
            <div>
                Cl??usula de Adhesi??n <br>
                Cl??usula de pago de primas 30 d??as.<br>
                Cl??usula de cancelaci??n de p??liza 30 d??as<br>
                Cl??usula de notificaci??n del siniestro 10 d??as<br>
                Cl??usula de Restituci??n autom??tica de valor asegurado<br>
                Cl??usula para radios, equipos de m??sica y otros accesorios hasta el 10% de la suma asegurada del veh??culo<br>
            </div> -->
            <!-- DEDUCIBLES -->
           <!--  <hr>
            <div style="width:100%;background-color: #183c6b;color:white;font-size:14px;font-weight: bold;line-height: 20px; height:25px;">
                <span><center>DEDUCIBLES</center></span>
            </div>
            <hr>
            <div>
                P??rdidas parciales 10.00 % del valor del siniestro, m??nimo 1.00% del valor asegurado, no menor a USD 150.00 (siempre se aplicar?? el que sea mayor)<br>
                P??rdida total por da??os: 10.00% del valor asegurado.<br>
                P??rdida total por robo: 0.00% del valor asegurado (con dispositivo de rastreo satelital operativo y vigente al momento del siniestro).<br>
                P??rdida total por robo (Sin dispositivo veh??culos menores a USD. 25.000): 10.00% del valor asegurado<br>
                P??rdida total por robo (Sin dispositivo veh??culos mayores a USD. 25.001): 20.00% del valor asegurado<br>
                Parabrisas, vidrios y cristales: USD 75.00; no incluye l??minas de seguridad<br>
            </div> -->
            <!-- OBSERVACIONES -->
<!--            <hr>
            <div style="width:100%;background-color: #183c6b;color:white;font-size:14px;font-weight: bold;line-height: 20px; height:25px;">
                <span><center>OBSERVACIONES</center></span>
            </div>
            <hr>
            <div>
                La presente cotizaci??n tiene una validez de 30 d??as.<br>
                Quedamos a sus gratas ??rdenes para cualquier inquietud relacionada a la presente propuesta.<br>
                Atentamente,<br>
                <hr><hr><hr>
                <span class="bold titleDiv">SEGUROS SUCRE, S.A.</span>
            </div>-->
        </main>
    </body>
</html>
