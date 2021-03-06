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
                margin-top: 150px;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 100px;
                line-height: 1.5;
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

            .title{
                font-size: 15px;
            }

            hr {
                clear: both;
                visibility: hidden;
            }
            .page-break {
                page-break-after: always;
            }
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: center;
                padding: 2px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
            <img src="{{public_path('images/logo_seguros_sucre.jpg')}}" alt="" style="width: 30%;height:90px;padding-top: 30px; margin-left: 55px; float:left;"/>
            <strong class="bold" style="float:right;padding-top:70px;padding-right: 70px;">COD: {{$id}} - {{$year}}</strong><br>
        </header>

        <footer>
        </footer>

        <!-- Wrap the content of your PDF inside a main tag -->
        <main>
            <div class="col-md-10">
                <center>
                    <strong class="bold title">CERTIFICADO DE COBERTURA</strong><br>
                    <strong class="bold title">{{$proName}}</strong><br>
                </center>
                <hr>
                <center>
                    <strong class="bold title">CONDICIONES DEL SEGURO</strong>
                </center>
                <hr>
                <strong class="bold title">OBJETO DEL SEGURO:</strong>
                <br><hr>
                <span>Se  pagar??  por  parte  de  la  compa????a  al  asegurado  en  caso  de  fallecimiento  accidental,  incapacidad  total  y permanente o gastos m??dicos, la suma asegurada detallada en cada plan contratado</span>
                <br><hr>
                <span> 
                    Nombre del Asegurado: {{$customer}}
                    <br>
                    Documento de Identidad: {{$cusDocument}}
                </span>
                <br><hr>
                <center>
                    <strong class="bold">DOCUMENTACI??N M??NIMA EN CASO DE SINIESTRO</strong>
                </center>
                <hr>
                <span>
                    Dentro del t??rmino legal, la Compa????a pagar?? por conducto del Contratante al Asegurado o a los beneficiarios, odirectamente  a  estos,  la  indemnizaci??n  a  que  est??  obligada  por  esta  p??liza  y  sus  amparos  adicionales  si  loshubiere,  al  acreditar  la  ocurrencia  del  siniestro  y  la  cuant??a  del  mismo;  para  el  efecto  podr??  utilizar  todos  losmedios  probatorios  admitidos  en  la  Ley  ecuatoriana,  y  en  especial  la  documentaci??n  m??nima  relacionada  en  elcuadro de documentos m??nimos requeridos en caso de siniestro
                </span>
                <br><hr>
                <span>
                    -Notificaci??n de aviso de siniestro
                </span>
                <br>
                <span>
                    -Copia de c??dula del asegurado
                </span>
                <br><hr>
                <center>
                    <strong class="bold">DETALLE DEL PLAN ASEGURADO</strong>
                </center>
                <br>
                <table>
                    <tr>
                        <th>Nombre del Producto</th>
                        <th>Coberturas</th>
                        <th>Suma Asegurada</th>
                    </tr>
                    <tr>
                        <td rowspan="4">{{$proName}}</td>
                        <td>Perdida Total por robo</td>
                        <td>Valor Comercial</td>
                    </tr>
                    <tr>
                        <td>perdida Parcial por robo</td>
                        <td>Valor Comercial</td>
                    </tr>
                    <tr>
                        
                        <td>Perdida Total por da??o</td>
                        <td>Valor Comercial</td>
                    </tr>
                    <tr>
                        
                        <td>perdida Parcial por da??o</td>
                        <td>Valor Comercial</td>
                    </tr>
                </table>
                <br>
                <center>
                    <strong class="bold">AUTORIZACI??N DE DEBITO</strong>
                </center>
                <br>
                <span>
                    Autorizo a la Compa????a de Seguros Sucre a debitar de mi cuenta 123456 el valor mensual declarado en el plan, yme  comprometo  a  mantener  los  saldos  respectivos  para  los  d??bitos,  en  caso  de  dos  intentos  mensualesseguidos entiendo que la presente p??liza / certificado quedar?? anulado autom??ticamente.
                </span>
                <br><hr>
                <span>
                    El  Contratante  y/o  Asegurado  podr??  solicitar  a  la  Superintendencia  de  Compa????as,  Valores  y  Seguros  laverificaci??n de este texto. <br>Lugar y fecha: Quito, {{$date}}
                </span>
                <br><hr><hr>
                <center>
                    <span class="bold title" style="border-top: 1px solid black;">
                        Seguros Sucre
                    </span>
                </center>
            </div>
        </main>
    </body>
</html>
