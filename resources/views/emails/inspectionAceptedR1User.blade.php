@extends('layouts.email')

@section('content')

<tr class="ui-droppable">
    <td style="padding: 0px">
        <table border="0" cellpadding="0" cellspacing="0" class="container" id="3" style="width:700px">
            <tbody>
                <tr>
                    <td class="container-column ui-droppable" style="width:100%;max-width:600px;vertical-align:top">
                        <table border="0" cellpadding="0" cellspacing="0" class="component title-component" i18n="MODULES-TXT_HEAD_TITLE" id="4" style="width:100%">
                            <tbody style="display: block; border: 0px none rgb(96, 96, 96); border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; background-color: rgba(0, 0, 0, 0);">
                                <tr bgcolor="Transparent" style="display: inherit;">
                                    <td style="padding: 5px 0px 5px 14px; margin:60px 0px 0px 0px; font-size: 1.5em; font-weight: bold; display: inherit; color: rgb(96, 96, 96); text-align: center;"> <img src="{{$message->embed(public_path('images/Email/Mail_Inspeccion.png'))}}" width="100%" alt="Listas Informativas"> </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr class="ui-droppable">
    <td style="padding: 0px">
        <table border="0" cellpadding="0" cellspacing="0" class="container" id="6" style="width:600px">
            <tbody>
                <tr>
                    <td class="container-column ui-droppable" style="width:100%;max-width:600px;vertical-align:top">
                        <table border="0" cellpadding="0" cellspacing="0" class="component text-component" i18n="MODULES-TXT_BEGIN_AND_CUSTUMIZE" id="7" style="width:100%">
                            <tbody style="display: block; border: 0px none rgb(96, 96, 96); border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; background-color: rgba(0, 0, 0, 0);">
                                <tr bgcolor="Transparent" style="display: inherit;">
									<td style="padding: 30px 10px 30px 14px; display: inherit; color: rgb(96, 96, 96); text-align: justify;">
                                        <p style="margin: 0px;">Estimado <span style="font-weight: bold">{{$customer[0]->user}}</span></p>
                                        
                                        <p style="margin: 10px 0 0 0;">Seguros Sucre te informa que la inspecci??n del cliente <span style="font-weight: bold"> {{$customer[0]->Cliente}} </span> correspondiente a la cotizaci??n n??mero <span style="font-weight: bold"> {{$saleId}} </span> , ha sido realizada satisfactoriamente, ya puedes continuar con el proceso de pago desde la plataforma de ventas. </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table border="1" cellpadding="0" cellspacing="0" class="component text-component" i18n="MODULES-TXT_BEGIN_AND_CUSTUMIZE" id="8" style="width:100%">
                            <tbody>
                                <tr style="background-color: #183c6b;color: white;">
                                    <th>Placa</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>A??o</th>
                                    <th>Resultado</th>
                                </tr>
                                @foreach($car as $c)
                                    <tr>
                                        <th>{{$c->plate}}</th>
                                        <th>{{$c->brand}}</th>
                                        <th>{{$c->model}}</th>
                                        <th>{{$c->year}}</th>
                                        <th>{{$c->status}}</th>
                                    </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
<tr class="ui-droppable">
    <td style="padding: 0px">
        <table border="0" cellpadding="0" cellspacing="0" class="container" id="3" style="width:700px">
            <tbody>
                <tr>
                    <td class="container-column ui-droppable" style="width:100%;max-width:600px;vertical-align:top">
                        <table border="0" cellpadding="0" cellspacing="0" class="component title-component" i18n="MODULES-TXT_HEAD_TITLE" id="4" style="width:100%">
                            <tbody style="display: block; border: 0px none rgb(96, 96, 96); border-top-left-radius: 0px; border-top-right-radius: 0px; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; background-color: rgba(0, 0, 0, 0);">
                                <tr bgcolor="Transparent" style="display: inherit;">
                                    <td style="padding: 5px 0px 5px 14px; margin:60px 0px 20px 0px; font-size: 1.5em; font-weight: bold; display: inherit; color: rgb(96, 96, 96); text-align: center;"> <img src="{{$message->embed(public_path('images/Email/Mail-Pie-de-pagina.png'))}}" width="100%" alt="Footer"> </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
@endsection