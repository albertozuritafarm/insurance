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
                                    <td style="padding: 5px 0px 5px 14px; margin:60px 0px 0px 0px; font-size: 1.5em; font-weight: bold; display: inherit; color: rgb(96, 96, 96); text-align: center;"> <img src="{{$message->embed(public_path('images/Email/Mail_suscripcion_medica.png'))}}" width="100%" alt="Listas Informativas"> </td>
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
                                        <p style="margin: 0px;">Estimado <span style="font-weight: bold">{{$inspector[0]->inspName}}</span></p>
                                        
                                        <p style="margin: 10px 0 0 0;"><span style="font-weight: bold"> {{$customer[0]->channel_name}} </span> ha solicitado que se realice el proceso de suscripci??n medica n??mero <span style="font-weight: bold"> {{$inspectionId}} </span> para el cliente  <span style="font-weight: bold"> {{$customer[0]->Cliente}} </span> con n??mero de identificaci??n <span style="font-weight: bold">{{$customer[0]->cusDocument}}</span>, con los siguientes datos: </p>
                                    </td>
                                </tr>
                                <tr bgcolor="Transparent" style="display: inherit;">
                                    <td style="padding: 30px 10px 30px 14px; display: inherit; color: rgb(96, 96, 96); text-align: justify;">
                                        <ul>
                                            <li><span style="font-weight: bold">Tel??fono Celular: </span>{{$customer[0]->mobile}}</li>
                                            <li><span style="font-weight: bold">Tel??fono Fijo: </span>{{$customer[0]->phone}}</li>
                                        </ul>
                                    </td>
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