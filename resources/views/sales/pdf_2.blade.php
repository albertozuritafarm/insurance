<html>
    <head>
        <title>Magnus</title>
        
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
            @page {
                margin: 0cm 0cm;
            }
            @font-face {
                  font-family: 'Montserrat-SemiBold';
                  src: url(C:/wamp64/www/MagnusHit/storage/fonts/Montserrat-SemiBold.ttf) format('truetype');
                  font-weight: lighter;
                  font-style: normal;
                }
            @font-face {
                  font-family: 'Montserrat-Bold';
                  src: url(C:/wamp64/www/MagnusHit/storage/fonts/Montserrat-ExtraBold.ttf) format('truetype');
                  font-weight: normal;
                  font-style: normal;
                }

            /** Define now the real margins of every page in the PDF **/
            body {
                font-family: 'Montserrat-SemiBold';
                text-align: justify;
                font-size:13px;
                margin-top: 350px;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 100px;
            }

            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 2cm;
                text-align: center;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
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
                font-family: Montserrat-Bold !important;
                /*font-weight: bold;*/
            }

            hr {
                clear: both;
                visibility: hidden;
            }
            .page-break {
                page-break-after: always;
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <img src="{{$message->embed(public_path('images/logo_seguros_sucre.jpg'))}}" alt="" style="width: 100%;height:190px;float:left;"/>
                <strong class="bold" style="float:right;margin-top:-5px">COD: {{$id}} - {{$year}}</strong><br>
        </header>

        <footer>
            <img src="C:/xampp/htdocs/MagnusHit/public/PDF/footer.png" alt="" style="margin-top: -90px;width:100%"/>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <div class="col-md-8" style="margin-left: 30px;margin-bottom: 70px">
                <strong class="bold">Estimado/a {{$customer}},</strong><br>
                <hr>
                <strong class="bold">Bienvenido al programa de Embellecimiento Automotriz HIT Solution</strong>
                <br><hr>
                <span>Ser impecable es una caracter??stica de quienes definen su estilo como exc&eacute;lsior. </span>
                <br><br>
                <span style="text-align: right !important"> 
                    HIT Solution es parte de un programa que te ayuda a mantener tu auto impecable, reparando
                    golpes/abolladuras  con m??todos innovadores que manipulan el metal y dejan tu auto como nuevo.</span>
                <br><hr>
                <strong class="bold">DETALLE DEL PRODUCTO</strong>
                <br><hr>
                <span>Reparaci??n  de <strong class="bold">golpes/abolladuras</strong> con un <strong class="bold">m??ximo de extensi??n de 12 cm en paneles met&aacute;licos</strong> siempre y cuando la <strong class="bold">pintura no est?? rota o quebrada. </strong></span>
                <br><hr>
                <strong class="bold">CONDICIONES</strong>
                <br><hr>
                <strong class="bold">- PLAN LIMITADO:</strong> 1 eventos por a??o.<br>
                - Reparaciones a <strong class="bold">domicilio</strong> tendr?? un <strong class="bold">valor extra de $10 + IVA.</strong><br>

                - Una vez proporcianadas las fotos del veh??culo, se activar?? el producto.<br>
                <hr>

                <strong class="bold">BENEFICIOS</strong><br>
                - Descuentos del 25% en otros trabajos de taller.<br>
                - Descuentos hasta el 80% en la pintura de toda la pieza.<br>
                Valor total a cancelar = <strong class="bold">$19.99 + IVA.</strong> Certificado de garant??a con pinturas
                <img src="C:/wamp64/www/MagnusHit/public/PDF/paint2.png" alt="" style="float:right;margin-top:-50px;margin-right: 0px;width:120px"/>
                <br><hr>
                <strong class="bold">EXCLUSIONES</strong><br>
                <hr>
                - Golpes / abolladuras superiores a 12cm.<br>
                - Golpes / abolladuras donde la pintura se encuentre rota o trizada.<br>
                - Reembolso de dinero por reparaciones en otros talleres.<br>
                - Da??os m??ltiples por granizo.<br>
                <hr>
                @if($benefits == 'false')
                @else
                <strong class="bold">BENEFICIOS EXCLUSIVOS</strong><br>
                <hr>
                @foreach($benefits as $benefit)
                - {{$benefit->name}}.<br>
                @endforeach
                @endif
                <hr>
                <strong class="bold">??C??MO AGENDAR UNA CITA?</strong><br><hr>
                <img src="C:/xampp/htdocs/MagnusHit/public/PDF/whatsapp.png" alt="" style="margin-top:-25px;margin-right:150px;float:right"/>
                1) Env??a una foto del da??o + el n??mero de placa al 097 894 6945<br>
                2) Un asesor te contactar?? en los siguientes 10 minutos<br>
                3) Indica el lugar de reparaci??n<br>
                Y tu auto estar?? listo en 2 HORAS!
                <br><hr>
                <strong class="bold">CONDICIONES DE AGENDAMIENTO</strong><br><hr>
                - De acuerdo a la extensi??n del golpe el lugar de reparaci??n podr?? ser en el taller o a domicilio, depender?? del an??lisis del t??cnico en reparaci??n.
                <br>
                <br>
                <strong class="bold">RECUERDA:</strong> podr??s agendar, siempre y cuando hayas activado tu producto.
                <div class="page-break"></div>
                <strong class="bold">POL??TICAS DE CANCELACI??N Y ANULACI??N</strong>
                <br><hr>
                <strong class="bold">ANULACI??N:</strong> Devoluci??n del dinero menos gastos administrativos  hasta 1 mes despu??s de la compra del producto, siempre y cuando el mismo no haya sido utilizado.<br>
                <strong class="bold">CANCELACI??N:</strong> Devoluci??n del proporcional del tiempo transcurrido desde la compra menos gastos administrativos, se podr?? cancelar  despu??s de 1 mes despu??s de la compra del producto, siempre y cuando este no haya sido utilizado.<br><br>
                <!--<hr>-->
                <strong class="bold">MANT??N TU AUTO IMPECABLE CON HIT SOLUTION!</strong><br>
                <strong class="bold">... para todo hay soluci??n!</strong>
            </div>
        </main>
    </body>
</html>
