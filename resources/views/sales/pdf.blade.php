<html>
    <head>
    	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <title>Magnus</title>
        <style>
            /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
             @import url('https://fonts.googleapis.com/css?family=Montserrat:600,700&display=swap');
            @page {
                margin: 0cm 0cm;
            }
           /* @font-face {
                  font-family: 'Montserrat-SemiBold';
                  src: url('/home/magnusmas/www/www/hit/storage/fonts/Montserrat-SemiBold.ttf') format('truetype');
                  font-weight: lighter;
            }*/

            /** Define now the real margins of every page in the PDF **/
            body {
                font-family: 'Montserrat-SemiBold', sans-serif; 
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
            .font{
            	/*font-family:  'Montserrat-SemiBold';*/
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
                font-family:  'Montserrat-Bold';
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
            <!--<img src="/var/www/html/hit/public/PDF/header.png" alt="" style="width: 100%;height:200px"/>
            <img src="/var/www/html/hit/public/PDF/header_lower_border.png" alt="" style="width:100%"/>
            <img src="/var/www/html/hit/images/logo.png" alt="" style="margin-top:-120px;width:250px"/>-->
        </header>

        <footer>
            <img src="/var/www/html/hit/public/PDF/footer.jpg" alt="" style="margin-top: -90px;width:100%"/>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <div class="col-md-8" style="margin-left: 30px;margin-bottom: 80px">
                <span class="bold" style="float:right;margin-top:-5px">COD: {{$id}} - {{$year}}</span><br>
                <span class="bold">Estimado/a {{$customer}},</span><br>
                <hr>
                <span class="bold">Bienvenido al programa de Embellecimiento Automotriz HIT Solution</span	>
                <br><hr>
                <span class="font">Ser impecable es una caracter??stica de quienes definen su estilo como exc&eacute;lsior. </span>
                <br><br>
                <span> 
                    HIT Solution es parte de un programa que te ayuda a mantener tu auto impecable, reparando
                    golpes/abolladuras  con m??todos innovadores que manipulan el metal y dejan tu auto como nuevo.</span>
                <br><hr>
                <span class="bold">DETALLE DEL PRODUCTO</span>
                <br><hr>
                <span>Reparaci??n  de <span class="bold">golpes/abolladuras</span> con un <span class="bold">m??ximo de extensi??n de 12 cm en paneles met&aacute;licos</span> siempre y cuando la <span class="bold">pintura no est?? rota o quebrada. </span></span>
                <br><hr>
                <span class="bold">CONDICIONES</span>
                <br><hr>
                <span class="bold">- PLAN LIMITADO:</span> 2 eventos por a??o.<br>
                - Reparaciones a <span class="bold">domicilio</span> tendr?? un <span class="bold">valor extra de $8.95 incluido IVA.</span><br>

                - Una vez proporcianadas las fotos del veh??culo, se activar?? el producto.<br>
                <hr>
                
                <span class="bold">BENEFICIOS</span><br>
                - Descuentos del 25% en otros trabajos de taller.<br>
                - Descuentos hasta el 80% en la pintura de toda la pieza.<br>
                Valor total a cancelar = <span class="bold">$22.39 incluido IVA.</span> Certificado de garant??a con pinturas
                <img src="/var/www/html/hit/public/PDF/paint2.png" alt="" style="float:right;margin-top:-20px;margin-right: -40px;width:120px"/>
                <br><hr>
                <span class="bold">EXCLUSIONES</span><br>
                <hr>
                - Golpes / abolladuras superiores a 12cm.<br>
                - Golpes / abolladuras donde la pintura se encuentre rota o trizada.<br>
                - Reembolso de dinero por reparaciones en otros talleres.<br>
                - Da??os m??ltiples por granizo.<br>
                <hr>
                <hr>
                <span class="bold">??C??MO AGENDAR UNA CITA?</span><br><hr>
                <!--<img src="/var/www/html/hit/public/PDF/whatsapp.png" alt="" style="margin-top:-25px;margin-right:150px;float:right"/>-->
                1) Env??a una foto del da??o + el n??mero de placa al 097 894 6945.<br>
                2) Un asesor te contactar?? en los siguientes 10 minutos.<br>
                3) Indica el lugar de reparaci??n.<br>
                Y tu auto estar?? listo en 2 HORAS!
                <br><hr>
                <span class="bold">CONDICIONES DE AGENDAMIENTO</span><br><hr>
                - De acuerdo a la extensi??n del golpe el lugar de reparaci??n podr?? ser en el taller o a domicilio, depender?? del an??lisis del t??cnico en reparaci??n.
                <br>
                <br>
                <span class="bold">RECUERDA:</span> podr??s agendar, siempre y cuando hayas activado tu producto.
                <div class="page-break"></div>
                <span class="bold">POL??TICAS DE CANCELACI??N Y ANULACI??N</span>
                <br><hr>
                <span class="bold">ANULACI??N:</span> Devoluci??n del dinero menos gastos administrativos  hasta 1 mes despu??s de la compra del producto, siempre y cuando el mismo no haya sido utilizado.<br>
                <span class="bold">CANCELACI??N:</span> Devoluci??n del proporcional del tiempo transcurrido desde la compra menos gastos administrativos, se podr?? cancelar  despu??s de 1 mes despu??s de la compra del producto, siempre y cuando este no haya sido utilizado.<br><br>
                <!--<hr>-->
                <span class="bold">MANT??N TU AUTO IMPECABLE CON HIT SOLUTION!</span><br>
                <span class="bold">... para todo hay soluci??n!</span>
            </div>
        </main>
    </body>
</html>
