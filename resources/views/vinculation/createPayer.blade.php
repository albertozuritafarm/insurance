@extends('layouts.remote_app')

@section('content')
<script src="{{ assets('js/registerCustom.js') }}"></script>
<script src="{{ assets('js/vinculation/createPayer.js') }}"></script>
<link href="{{ assets('css/sales/create.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ assets('css/sales/index.css')}}" rel="stylesheet" type="text/css"/>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@if($secondary_email == null)
<script>
$(document).ready(function () {
var div = document.getElementById('emailSecondaryForm');
$(div).fadeOut();
});</script>
@endif
@if($economic_activity != 6)
<script>
    $(document).ready(function () {
    var div = document.getElementById('otherEconomicActivityDiv');
    $(div).fadeOut();
    });</script>
@endif
@if($other_monthly_income == null)
<script>
    $(document).ready(function () {
    var div = document.getElementById('otherIncomeDiv');
    $(div).fadeOut();
    });</script>
@endif
@if($spouse_document == null)
<script>
    $(document).ready(function () {
    var div = document.getElementById('spouseFullDiv');
    $(div).fadeOut();
    });</script>
@endif
@if($customer->document_id != 3)
<script>
    $(document).ready(function () {
    var div = document.getElementById('passportFullDiv');
    $(div).fadeOut();
    });</script>
@endif
<style>
    .form-group{
        margin-top:25px !important;
        margin-bottom: 25px !important;
    }
    .frmSearch {border: 1px solid #a8d4b1;background-color: #c6f7d0;margin: 2px 0px;padding:40px;border-radius:4px;}
    #customer-list{float:left;list-style:none;margin-top:-3px;padding:0;width:290px;position: absolute;z-index:9999;}
    #customer-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
    #customer-list li:hover{background:#ece3d2;cursor: pointer;}
    #search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
    .error{border:1px solid red}
    .modal-header {
        border-bottom: 0 none;
    }

    .modal-footer {
        border-top: 0 none;
    }.titleDiv {
        cursor: pointer;
    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container" style="margin-top:15px; font-size:14px !important">
    <!--<div class="row justify-content-center border" style="margin-left:20%;">-->
    <div class="col-md-10 col-md-offset-1 border" style="padding: 15px;">
        <div class="row">
            <div class="col-xs-12 registerForm" style="margin:12px;">
                <center>
                    <h4 style="font-weight:bold">Formulario de Vinculaci??n</h4>
                    <!--<h5>Datos del Cliente.</h5>-->
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-2 wizard_inicial" style="padding-left:0px !important"><div id="firstStepWizard" class="wizard_activo registerForm">Informaci??n</div></div>
            <div class="col-xs-12 col-md-3 wizard_inicial" style="padding-left:0px !important"><div id="secondStepWizard" class="wizard_inactivo registerForm">Actividad Economica</div></div>
            <div class="col-xs-12 col-md-2 wizard_medio" style="padding-left:0px !important"><div id="thirdStepWizard" class="wizard_inactivo registerForm">Declaraci??n</div></div>
            <div class="col-xs-12 col-md-2 wizard_medio" style="padding-left:0px !important"><div id="fourthStepWizard" class="wizard_inactivo registerForm">Documentaci??n</div></div>
            <div class="col-xs-12 col-md-3 wizard_final" style="padding-right: 0px !important"><div id="fifthStepWizard" class="wizard_inactivo registerForm">Firma</div></div>
        </div>

        <div id="firstStep" class="col-md-12" style="margin-top:10px">
            <form id="firstStepForm" name="firstStepForm" method="POST" action="{{asset('/user')}}" id="salesForm">
                {{ csrf_field() }}
                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                <div id="productAlert" class="alert alert-danger hidden">
                    <strong>??Alerta!</strong> Debe seleccionar un producto
                </div>
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('personalDiv')">
                        <a href="#" class="titleLink">Datos de la Compa??ia</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="personalDiv" class="col-md-12">
                        @if($customer == false)
                        <input type="hidden" id="customerCheck" value="0">
                        @else
                        <input type="hidden" id="customerCheck" value="1">
                        @endif
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="business_name"> Raz??n Social</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="business_name" name="business_name" class="form-control registerForm" required tabindex="2" placeholder="Raz??n Social" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="{{$customer->first_name}}">
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="occupation"> Actividad Economica</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="occupation" name="occupation" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)" @if($nationality_id != null) disabled="disabled" @endif>
                                    <option value="">--Escoja Una---</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="main_road"> Direcci??n/Calle Principal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="main_road" name="main_road" class="form-control registerForm" required tabindex="2" placeholder="Calle Principal" onchange="removeInputRedFocus(this.id)" value="{{$main_road}}" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="sector"> N??</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="number" name="number" class="form-control registerForm" required tabindex="2" placeholder="N??" onchange="removeInputRedFocus(this.id)" value="{{$address_number}}" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="country"> Pais</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="country" name="country" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)">
                                    <option value="">--Escoja Una---</option>
                                    @foreach($countries as $cou)
                                    <option value="{{$cou->id}}">{{$cou->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Cant??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="city" name="city" class="form-control registerForm" required tabindex="2" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                    <option value="">--Escoja Una---</option>
                                    @if($addressCities != null)
                                    @foreach($addressCities as $cit)
                                    <option @if($cit->id == $city_id) selected @endif value="{{$cit->id}}">{{$cit->name}}</option>
                                    @endforeach
                                    @else
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="mobile_phone"> Celular</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="mobile_phone" name="mobile_phone" class="form-control registerForm" required tabindex="2" placeholder="Celular" onchange="removeInputRedFocus(this.id)" value="{{$mobile_phone}}" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="email"> Email</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="email" id="email" name="email" class="form-control registerForm" required tabindex="2" placeholder="Correo" onchange="removeInputRedFocus(this.id)" value="{{$email}}" {{$disable_status}}>
                                <p id="emailError" style="color:red;font-weight: bold"></p>    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> RUC</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input id="documentForm" type="text" id="document" name="document" class="form-control registerForm" required tabindex="2" placeholder="N??mero de Identificaci??n" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="{{$customer->document}}">
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="creation_date"> Fecha de Constituci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="date" id="creation_date" name="creation_date" class="form-control registerForm" style="line-height: 15px !important" onchange="removeInputRedFocus(this.id)" value="{{$birth_date}}" @if($birth_date != null) readonly="readonly" @endif>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="main_road"> Transversal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="secondary_road" name="secondary_road" class="form-control registerForm" required tabindex="2" placeholder="Calle Transversal" onchange="removeInputRedFocus(this.id)" value="{{$secondary_road}}" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="sector"> Sector</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="sector" name="sector" class="form-control registerForm" required tabindex="2" placeholder="Sector" onchange="removeInputRedFocus(this.id)" value="{{$sector}}" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Provincia  </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="province" name="province" class="form-control registerForm" required tabindex="2" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                    <option selected="true" value="" disabled="disabled">--Escoja Una---</option>
                                    @foreach($provinces as $prov)
                                    <option @if($prov->id == $province_id) selected @endif value="{{$prov->id}}">{{$prov->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="municipality"> Parroquia </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="municipality" name="municipality" class="form-control registerForm" required tabindex="2" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                    <option selected="true" value="">--Escoja Una---</option>
                                    <option value="">Conocoto</option>
                                    <option value="">Calderon</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="phone">Tel??fono</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="phone" name="phone" class="form-control registerForm" required tabindex="2" placeholder="Tel??fono" onchange="removeInputRedFocus(this.id)" value="{{$phone}}" {{$disable_status}}>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div id="legalRepresentativeFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('legalRepresentativeDiv')">
                        <a href="#" class="titleLink">Datos del Representante Legal</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="legalRepresentativeDiv" class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="legalRepresentativeFirstName"> Nombres</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text2" id="legalRepresentativeFirstName" name="legalRepresentativeFirstName" placeholder="Nombres" class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important;" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="document_id" name="document_id" class="form-control registerForm" required tabindex="2" onchange="removeInputRedFocus(this.id)" @if($customer != false) disabled="disabled" @endif>
                                    <option selected="true" value="" disabled="disabled">--Escoja Una---</option>
                                    @foreach($documents as $doc)
                                    @if($customer != false)
                                    @if($customer->document_id == $doc->id)
                                    <option value="{{$doc->id}}" selected="true">{{$doc->name}}</option>
                                    @else
                                    @endif
                                    @else
                                    <option value="{{$doc->id}}">{{$doc->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="nationality"> Nacionalidad</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="nationality" name="nationality" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)" @if($nationality_id != null) disabled="disabled" @endif>
                                    <option value="">--Escoja Una---</option>
                                    @foreach($countries as $cou)
                                    <option @if($cou->id == $nationality_id) selected="true" @endif value="{{$cou->id}}">{{$cou->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="birth_date"> Fecha de Nacimiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="date" id="birth_date" name="birth_date" class="form-control registerForm" style="line-height: 15px !important" onchange="removeInputRedFocus(this.id)" value="{{$birth_date}}" @if($birth_date != null) readonly="readonly" @endif>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="main_road"> Direcci??n/Calle Principal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="main_road" name="main_road" class="form-control registerForm" required tabindex="2" placeholder="Calle Principal" onchange="removeInputRedFocus(this.id)" value="{{$main_road}}" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Provincia  </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="province" name="province" class="form-control registerForm" required tabindex="2" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                    <option selected="true" value="" disabled="disabled">--Escoja Una---</option>
                                    @foreach($provinces as $prov)
                                    <option @if($prov->id == $province_id) selected @endif value="{{$prov->id}}">{{$prov->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="municipality"> Parroquia </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="municipality" name="municipality" class="form-control registerForm" required tabindex="2" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                    <option selected="true" value="">--Escoja Una---</option>
                                    <option value="">Conocoto</option>
                                    <option value="">Calderon</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="mobile_phone"> Celular</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="mobile_phone" name="mobile_phone" class="form-control registerForm" required tabindex="2" placeholder="Celular" onchange="removeInputRedFocus(this.id)" value="{{$mobile_phone}}" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="email"> Email</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="email" id="email" name="email" class="form-control registerForm" required tabindex="2" placeholder="Correo" onchange="removeInputRedFocus(this.id)" value="{{$email}}" {{$disable_status}}>
                                <p id="emailError" style="color:red;font-weight: bold"></p>    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="legalRepresentativeLastName"> Apellidos</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text2" id="legalRepresentativeLastName" name="legalRepresentativeLastName" placeholder="Apellidos" class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="legalRepresentativeDocument"> Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text2" id="legalRepresentativeDocument" name="legalRepresentativeDocument" placeholder="Apellidos" class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="birth_city"> Lugar de Nacimiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="birth_city" name="birth_city" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)" @if($birth_place != null) disabled="disabled" @endif>
                                    <option value="">--Escoja Una---</option>
                                    @foreach($cities as $cit)
                                    <option @if($cit->id == $birth_place) selected @endif value="{{$cit->id}}">{{$cit->name}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" id="birth_place" name="birth_place" value="{{$birth_place}}">
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="civilState">Estado Civil</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="civilState" name="civilState" class="form-control registerForm" required tabindex="2" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                    <option value="">--Escoja Una---</option>
                                    @foreach($civilStates as $sta)
                                    <option @if($sta->id == $civil_state) selected @endif value="{{$sta->id}}">{{$sta->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="country"> Pais</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="country" name="country" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)">
                                    <option value="">--Escoja Una---</option>
                                    @foreach($countries as $cou)
                                    <option value="{{$cou->id}}">{{$cou->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Cant??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="city" name="city" class="form-control registerForm" required tabindex="2" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                    <option value="">--Escoja Una---</option>
                                    @if($addressCities != null)
                                    @foreach($addressCities as $cit)
                                    <option @if($cit->id == $city_id) selected @endif value="{{$cit->id}}">{{$cit->name}}</option>
                                    @endforeach
                                    @else
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="sector"> Sector</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="sector" name="sector" class="form-control registerForm" required tabindex="2" placeholder="Sector" onchange="removeInputRedFocus(this.id)" value="{{$sector}}" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="phone">Tel??fono</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="phone" name="phone" class="form-control registerForm" required tabindex="2" placeholder="Tel??fono" onchange="removeInputRedFocus(this.id)" value="{{$phone}}" {{$disable_status}}>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="spouseFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('spouseDiv')">
                        <a href="#" class="titleLink">Datos del C??nyuge o Conviviente</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="spouseDiv" class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="passportEndDate"> Nombres y Apellidos del Conyuge</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="spouseName" name="spouseName" class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important" value="{{$spouse_name}}" placeholder="Nombre del Conyuge" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="passportBeginDate"> Documento de Identidad Conyuge</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="spouseDocument" name="spouseDocument" class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important;" value="{{$spouse_document}}" placeholder="Documento de Identidad Conyuge" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="nationality_spouse"> Nacionalidad</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="nationality_spouse" name="nationality_spouse" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)" @if($nationality_id != null) disabled="disabled" @endif>
                                    <option value="">--Escoja Una---</option>
                                    @foreach($countries as $cou)
                                    <option @if($cou->id == $nationality_id) selected="true" @endif value="{{$cou->id}}">{{$cou->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="spouse_document_id"> Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="spouse_document_id" name="spouse_document_id" class="form-control registerForm" required tabindex="2" onchange="removeInputRedFocus(this.id)">
                                    <option selected="true" value="" disabled="disabled">--Escoja Una---</option>
                                    @foreach($documents as $doc)
                                    <option value="{{$doc->id}}">{{$doc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="beneficiaryFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('beneficiaryDiv')">
                        <a href="#" class="titleLink">Vinculos Existentes entre el Contratante y Beneficiario</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="beneficiaryDiv" class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="is_beneficiary"> ??Es usted el beneficiario de la p??liza?</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><br>
                                <input id="is_beneficiary" name="is_beneficiary" type="checkbox" checked="checked" data-toggle="toggle" data-on="Si" data-off="No" onchange="isBeneficiaryChange(this)">
                            </div>
                        </div>
                        <span id="beneficiaryDataDiv" style="margin-top:-25px;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiaryName"> Nombres Completos o Raz??n Social</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text2" id="beneficiaryName" name="beneficiaryName" checked class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important" value="" placeholder="Nombres Completos o Raz??n Social" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top:-25px">
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiary_document_id"> Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select id="beneficiary_document_id" name="beneficiary_document_id" class="form-control registerForm" required tabindex="2" onchange="removeInputRedFocus(this.id)">
                                        <option selected="true" value="" disabled="disabled">--Escoja Una---</option>
                                        @foreach($documents as $doc)
                                        <option value="{{$doc->id}}">{{$doc->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiary_nationality"> Nacionalidad</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select id="beneficiary_nationality" name="beneficiary_nationality" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)">
                                        <option value="">--Escoja Una---</option>
                                        @foreach($countries as $cou)
                                        <option value="{{$cou->id}}">{{$cou->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiary_phone"> Tel??fono</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text2" id="beneficiary_phone" name="beneficiary_phone" class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important" value="" placeholder="Tel??fono" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top:-25px">
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiary_document"> Documento de Identidad</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text2" id="beneficiary_document" name="beneficiary_document" class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important" value="" placeholder="Documento" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                </div>
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiary_address"> Direcci??n de Domicilio</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text2" id="beneficiary_address" name="beneficiary_address" class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important" value="" placeholder="Direcci??n de Domicilio" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                </div>
                                <div class="form-group">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiary_relationship"> Relaci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text2" id="beneficiary_relationship" name="beneficiary_relationship" class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important" value="" placeholder="Relaci??n" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: justify;">
                                * Cuando en la p??liza de seguro de vida o de accidentes personales con la cobertura de muerte, los asegurados hubiesen designado como beneficiarios a sus parientes hasta el cuarto grado de consanguinidad o segundo grado de afinidad, o a su c??nyuge o conviviente en uni??n de hecho, no se requerir?? la informaci??n de tales beneficiarios. Si fuesen otras personas las designadas como beneficiarios, la documentaci??n referente a estos deber?? ser presentada, obligatoriamente, mediante formulario de vinculaci??n de clientes. 
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:5px;padding-top:15px;padding-bottom:15px">
                    <div class="row" style="float:left">
                        <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" style="margin-left: -30px;"> Cancelar </a>-->
                    </div>
                    <div class="row"style="float:right">
                        <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" style="margin-left: 30px;background-color: #444;color:white"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>-->
                        <a id="firstStepBtnNext" class="btn btn-info registerForm" align="right" href="#"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                    </div>
                </div>
            </form>
        </div>
        <div id="secondStep" class="col-md-12 hidden" style="margin-top:20px">
            <form id="secondStepForm" name="secondStepForm" method="POST" action="{{asset('/user')}}" id="salesForm">
                {{ csrf_field() }}
                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('occupationDiv')">
                        <a href="#" class="titleLink">Situaci??n Financiera</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="occupationDiv" class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="annual_income"> Ingresos brutos anuales declarados en el a??o anterior</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text2" id="annual_income" name="annual_income" class="form-control registerForm" required tabindex="2"  style="line-height: 15px !important" value="" placeholder="Ingresos brutos anuales declarados en el a??o anterior" onchange="removeInputRedFocus(this.id)" {{$disable_status}}>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12" style="margin-top:5px;padding-top:15px;padding-bottom:15px">
                    <div class="row" style="float:left">
                        <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" style="margin-left: -30px;"> Cancelar </a>-->
                    </div>
                    <div class="row" style="float:right">
                        <a id="secondStepBtnBack" class="btn btn-back registerForm" align="right" href="#"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                        <a id="secondStepBtnNext" class="btn btn-info registerForm" align="right" href="#"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                    </div>
                </div>
            </form>
        </div>
        <div id="thirdStep" class="col-md-12 hidden" style="margin-top:20px">
            <form id="thirdStepForm" name="thirdStepForm" method="POST" action="{{asset('/user')}}" id="salesForm">
                {{ csrf_field() }}
                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('pepDeclarationDiv')">
                        <a href="#" class="titleLink">Declaraci??n y Autorizaci??n</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="pepDeclarationDiv" class="col-md-12">
                        <div class="col-md-12" style="margin-top:15px;text-align: justify; font-size: 14px;margin-bottom: 10px;">
                            <div class="col-md-12" style="margin-top:-25px;">
                                <div class="form-group">
                                    <h4>Declaraci??n</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                Declaro que la informaci??n contenida en este formulario, as?? como toda la documentaci??n presentada, es verdadera, completa y proporciona la informaci??n de modo confiable y actualizada. Adem??s, declaro conocer y aceptar que es mi obligaci??n como cliente actualizar anualmente estos datos, as?? como el comunicar y documentar de manera inmediata a la compa????a cualquier cambio en la informaci??n que hubiere proporcionado. Durante la vigencia de la relaci??n con Seguros Sucre S.A., me comprometo a proveer de la documentaci??n e informaci??n que me sea solicitada.                            
                            </div>
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                El asegurado declara expresamente que el seguro aqu?? convenido ampara bienes de procedencia l??cita, no ligados con actividades de narcotr??fico, lavado de dinero o cualquier otra actividad tipificada en la Ley Org??nica de Prevenci??n, Detecci??n y Erradicaci??n del Delito de Lavado de Activos y del Financiamiento de Delitos. Igualmente, la prima a pagar por este concepto tiene origen l??cito y ninguna relaci??n con las actividades mencionadas anteriormente. Eximo a Seguros Sucre S.A. de toda responsabilidad, inclusive respecto a terceros, si esta declaraci??n fuese falsa o err??nea.                             
                            </div>  
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                En caso de que se inicien investigaciones sobre mi persona, relacionadas con las actividades antes se??aladas o de producirse transacciones inusuales o injustificadas, Seguros Sucre S.A., podr?? proporcionar a las autoridades competentes toda la informaci??n que tenga sobre las mismas o que le sea requerida. En tal sentido renuncio a presentar en contra de Seguros Sucre S.A., sus funcionarios o empleados, cualquier reclamo o acci??n legal, judicial, extrajudicial, administrativa, civil penal o arbitral en la eventualidad de producirse tales hechos.
                            </div>
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                Declaraci??n sobre la condici??n de Persona Expuesta Pol??ticamente PEP (Persona que desempe??a o ha desempe??ado funciones p??blicas en el pa??s o en el exterior). Informo que he le??do la Lista M??nima de Cargos P??blicos a ser considerados "Personas Expuestas Pol??ticamente" y declaro bajo juramento que <label class="radio-inline" style="padding-left:5px;padding-right: 5px;">Si <input type="radio" name="optradio3" value="yes" @if($person_exposed == 'yes') checked @endif style="margin-left:5px;margin-top: 0px;"></label> <label class="radio-inline" style="padding-left:5px; padding-right:15px;">No <input type="radio" name="optradio3" value="no" @if($person_exposed == 'no') checked @endif style="margin-left:5px;margin-top: 0px;"></label><br> me encuentro ejerciendo uno de los cargos incluidos en la lista o lo ejerc?? hace un a??o atr??s. En el caso de que la respuesta sea positiva, indicar: Cargo/Funci??n/Jerarqu??a:  <input type="text2" id="pep_client" name="pep_client" class="form-control registerForm" required tabindex="2" placeholder="Cargo/Funci??n/Jerarqu??a" onchange="removeInputRedFocus(this.id)" value="" {{$disable_status}}>
                                Nota: La presente declaraci??n no constituye una autoincriminaci??n de ninguna clase, ni conlleva ninguna responsabilidad administrativa, civil o penal.
                            </div>
                            <hr>
                            <div class="col-md-12" style="margin-top:-25px;">
                                <div class="form-group">
                                    <h4>Autorizaci??n</h4>
                                </div>
                            </div>  
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                Siendo conocedor de las disposiciones legales, autorizo expresamente en forma libre, voluntaria e irrevocable a Seguros Sucre S. A., a realizar el an??lisis y las verificaciones que considere necesarias para corroborar la licitud de fondos y bienes comprendidos en el contrato de seguro e informar a las autoridades competentes si fuera el caso; adem??s autorizo expresa, voluntaria e irrevocablemente a todas las personas naturales o jur??dicas de derecho p??blico o privado a facilitar a Seguros Sucre S.A. toda la informaci??n que ??sta les requiera  y revisar los bur?? de cr??dito sobre mi informaci??n de riesgos crediticios.
                            </div> 
                        </div>
                    </div>
                    <input type="hidden" id="exposedPersonInput" name="exposedPersonInput" value="{{$person_exposed}}">
                </div>
                <div class="col-md-12" style="margin-top:5px;padding-top:15px;padding-bottom:15px">
                    <div class="row" style="float:left">
                        <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" style="margin-left: -30px;"> Cancelar </a>-->
                    </div>
                    <div class="row" style="float:right">
                        <a id="thirdStepBtnBack" class="btn btn-back registerForm" align="right" href="#"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                        <a id="thirdStepBtnNext" class="btn btn-info registerForm" align="right" href="#"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                    </div>
                </div>
            </form>
        </div>
        <div id="fourthStep" class="col-md-12 hidden" style="margin-top:20px">
            <!--<form id="fourthStepForm" name="fourthtepForm" method="POST" action="{{asset('/user')}}" id="salesForm">-->
            {{ csrf_field() }}
            <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
            <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
            <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('picturesDivpicturesDiv')">
                    <a href="#" class="titleLink">Documentos Requeridos - Persona Juridica</a>
                    <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                </div>
                <div id="picturesDiv" class="col-md-12">
                    <div class="col-md-12">
                        <div class="col-md-6 form-group">
                            <form method="post" id="upload_formDocumentApplicant" name="upload_formDocumentApplicant" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formDocumentApplicant'">
                                {{ csrf_field() }}                                
                                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                                <input type="hidden" id="uploadType" name="uploadType" value="DocumentApplicant">
                                <input type="hidden" id="uploadedFileDocumentApplicant" name="uploadedFileDocumentApplicant" value="{{$picture_document_applicant}}">
                                <center>
                                    <label>Copia del registro ??nico de contribuyentes (RUC)</label>
                                    <div class="alert" id="messageDocumentApplicant" style="display: none"></div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameDocumentApplicant"></div>
                                    <div class="inputWrapper"><span id="uploaded_imageDocumentApplicant">{!! $picture_document_applicant !!}</span>
                                        <center>
                                            <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileDocumentApplicant" onchange="fileNameFunction('DocumentApplicant')" id="select_fileDocumentApplicant">
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadDocumentApplicant" class="btn btn-primary @if($picture_document_applicant == null) visible @else hidden @endif" onclick="uploadPictureForm('DocumentApplicant')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="@if($picture_document_applicant == null) hidden @else visible @endif" id="deletePictureDocumentApplicant" href="#" onclick="deletePictureForm('DocumentApplicant','{{$customer->id}}','{{$sales_id}}')">
                                        <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                    </a>  
                                </center>
                            </form>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Fecha de Caducidad</label>
                            <input type="date" class="form-control" style="line-height:14px;">
                            <br>
                            <form method="post" id="upload_formDocumentSpouse" name="upload_formDocumentSpouse" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formDocumentSpouse'">
                                {{ csrf_field() }}                                
                                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                                <input type="hidden" id="uploadType" name="uploadType" value="DocumentSpouse">
                                <input type="hidden" id="uploadedFileDocumentSpouse" name="uploadedFileDocumentSpouse" value="{{$picture_document_spouse}}">
                                <center>
                                    <label>Copia del documento de identificaci??n del representante legal o apoderado</label>
                                    <div class="alert" id="messageDocumentSpouse" style="display: none"></div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameDocumentSpouse"></div>
                                    <div class="inputWrapper"><span id="uploaded_imageDocumentSpouse">{!! $picture_document_spouse !!}</span>
                                        <center>
                                            <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileDocumentSpouse" onchange="fileNameFunction('DocumentSpouse')" id="select_fileDocumentSpouse">
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadDocumentSpouse" class="btn btn-primary @if($picture_document_spouse == null) visible @else hidden @endif" onclick="uploadPictureForm('DocumentSpouse')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="@if($picture_document_spouse == null) hidden @else visible @endif" id="deletePictureDocumentSpouse" href="#" onclick="deletePictureForm('DocumentSpouse','{{$customer->id}}','{{$sales_id}}')">
                                        <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                    </a>  
                                </center>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6 form-group">
                            <label>Fecha de Caducidad</label>
                            <input type="date" class="form-control" style="line-height:14px;">
                            <br>
                            <form method="post" id="upload_formService" name="upload_formService" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formService'">
                                {{ csrf_field() }}                                
                                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                                <input type="hidden" id="uploadType" name="uploadType" value="Service">
                                <input type="hidden" id="uploadedFilePictureService" name="uploadedFilePictureService" value="{{$picture_service}}">
                                <center>
                                    <label>Copia del documento de identificaci??n del c??nyuge o conviviente del representante legal o apoderado, si aplica</label>
                                    <div class="alert" id="messageService" style="display: none"></div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameService"></div>
                                    <div class="inputWrapper"><span id="uploaded_imageService">{!! $picture_service !!}</span>
                                        <center>
                                            <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileService" onchange="fileNameFunction('Service')" id="select_fileService">
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadService" class="btn btn-primary @if($picture_service == null) visible @else hidden @endif" onclick="uploadPictureForm('Service')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="@if($picture_service == null) hidden @else visible @endif" id="deletePictureService" href="#" onclick="deletePictureForm('Service','{{$customer->id}}','{{$sales_id}}')">
                                        <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                    </a>  
                                </center>
                            </form>
                        </div>
                        <div class="col-md-6 form-group">
                            <form method="post" id="upload_formService" name="upload_formService" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formService'">
                                {{ csrf_field() }}                                
                                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                                <input type="hidden" id="uploadType" name="uploadType" value="Service">
                                <input type="hidden" id="uploadedFilePictureService" name="uploadedFilePictureService" value="{{$picture_service}}">
                                <center>
                                    <label>Copia de una planilla de servicios b??sicos.</label>
                                    <div class="alert" id="messageService" style="display: none"></div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameService"></div>
                                    <div class="inputWrapper"><span id="uploaded_imageService">{!! $picture_service !!}</span>
                                        <center>
                                            <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileService" onchange="fileNameFunction('Service')" id="select_fileService">
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadService" class="btn btn-primary @if($picture_service == null) visible @else hidden @endif" onclick="uploadPictureForm('Service')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="@if($picture_service == null) hidden @else visible @endif" id="deletePictureService" href="#" onclick="deletePictureForm('Service','{{$customer->id}}','{{$sales_id}}')">
                                        <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                    </a>  
                                </center>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6 form-group">
                            <form method="post" id="upload_formService" name="upload_formService" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formService'">
                                {{ csrf_field() }}                                
                                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                                <input type="hidden" id="uploadType" name="uploadType" value="Service">
                                <input type="hidden" id="uploadedFilePictureService" name="uploadedFilePictureService" value="{{$picture_service}}">
                                <center>
                                    <label>Copia de la escritura de constituci??n y de sus reformas, de existirlas.</label>
                                    <div class="alert" id="messageService" style="display: none"></div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameService"></div>
                                    <div class="inputWrapper"><span id="uploaded_imageService">{!! $picture_service !!}</span>
                                        <center>
                                            <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileService" onchange="fileNameFunction('Service')" id="select_fileService">
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadService" class="btn btn-primary @if($picture_service == null) visible @else hidden @endif" onclick="uploadPictureForm('Service')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="@if($picture_service == null) hidden @else visible @endif" id="deletePictureService" href="#" onclick="deletePictureForm('Service','{{$customer->id}}','{{$sales_id}}')">
                                        <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                    </a>  
                                </center>
                            </form>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Fecha de Caducidad</label>
                            <input type="date" class="form-control" style="line-height:14px;">
                            <br>
                            <form method="post" id="upload_formService" name="upload_formService" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formService'">
                                {{ csrf_field() }}                                
                                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                                <input type="hidden" id="uploadType" name="uploadType" value="Service">
                                <input type="hidden" id="uploadedFilePictureService" name="uploadedFilePictureService" value="{{$picture_service}}">
                                <center>
                                    <label>Copia certificada del nombramiento del representante legal o apoderado.</label>
                                    <div class="alert" id="messageService" style="display: none"></div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameService"></div>
                                    <div class="inputWrapper"><span id="uploaded_imageService">{!! $picture_service !!}</span>
                                        <center>
                                            <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileService" onchange="fileNameFunction('Service')" id="select_fileService">
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadService" class="btn btn-primary @if($picture_service == null) visible @else hidden @endif" onclick="uploadPictureForm('Service')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="@if($picture_service == null) hidden @else visible @endif" id="deletePictureService" href="#" onclick="deletePictureForm('Service','{{$customer->id}}','{{$sales_id}}')">
                                        <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                    </a>  
                                </center>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6 form-group">
                            <form method="post" id="upload_formService" name="upload_formService" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formService'">
                                {{ csrf_field() }}                                
                                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                                <input type="hidden" id="uploadType" name="uploadType" value="Service">
                                <input type="hidden" id="uploadedFilePictureService" name="uploadedFilePictureService" value="{{$picture_service}}">
                                <center>
                                    <label>N??mina actualizada de accionistas o socios, en la que consten los montos de acciones o participaciones obtenida por el cliente en el ??rgano de control competente o registro competente que lo regule.</label>
                                    <div class="alert" id="messageService" style="display: none"></div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameService"></div>
                                    <div class="inputWrapper"><span id="uploaded_imageService">{!! $picture_service !!}</span>
                                        <center>
                                            <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileService" onchange="fileNameFunction('Service')" id="select_fileService">
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadService" class="btn btn-primary @if($picture_service == null) visible @else hidden @endif" onclick="uploadPictureForm('Service')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="@if($picture_service == null) hidden @else visible @endif" id="deletePictureService" href="#" onclick="deletePictureForm('Service','{{$customer->id}}','{{$sales_id}}')">
                                        <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                    </a>  
                                </center>
                            </form>
                        </div>
                        <div class="col-md-6 form-group">
                            <form method="post" id="upload_formService" name="upload_formService" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formService'">
                                {{ csrf_field() }}                                
                                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                                <input type="hidden" id="uploadType" name="uploadType" value="Service">
                                <input type="hidden" id="uploadedFilePictureService" name="uploadedFilePictureService" value="{{$picture_service}}">
                                <center>
                                    <label>Certificado de cumplimiento de obligaciones otorgado por el ??rgano de control competente.</label>
                                    <div class="alert" id="messageService" style="display: none"></div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameService"></div>
                                    <div class="inputWrapper"><span id="uploaded_imageService">{!! $picture_service !!}</span>
                                        <center>
                                            <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileService" onchange="fileNameFunction('Service')" id="select_fileService">
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadService" class="btn btn-primary @if($picture_service == null) visible @else hidden @endif" onclick="uploadPictureForm('Service')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="@if($picture_service == null) hidden @else visible @endif" id="deletePictureService" href="#" onclick="deletePictureForm('Service','{{$customer->id}}','{{$sales_id}}')">
                                        <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                    </a>  
                                </center>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6 form-group">
                            <form method="post" id="upload_formService" name="upload_formService" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formService'">
                                {{ csrf_field() }}                                
                                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                                <input type="hidden" id="uploadType" name="uploadType" value="Service">
                                <input type="hidden" id="uploadedFilePictureService" name="uploadedFilePictureService" value="{{$picture_service}}">
                                <center>
                                    <label>Estados financieros, m??nimo de un a??o atr??s. (Si la suma asegurada supera los USD 200.000,00 se deber?? presentar los estados financieros auditados).</label>
                                    <div class="alert" id="messageService" style="display: none"></div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameService"></div>
                                    <div class="inputWrapper"><span id="uploaded_imageService">{!! $picture_service !!}</span>
                                        <center>
                                            <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileService" onchange="fileNameFunction('Service')" id="select_fileService">
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadService" class="btn btn-primary @if($picture_service == null) visible @else hidden @endif" onclick="uploadPictureForm('Service')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="@if($picture_service == null) hidden @else visible @endif" id="deletePictureService" href="#" onclick="deletePictureForm('Service','{{$customer->id}}','{{$sales_id}}')">
                                        <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                    </a>  
                                </center>
                            </form>
                        </div>
                        <div class="col-md-6 form-group">
                            <form method="post" id="upload_formService" name="upload_formService" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formService'">
                                {{ csrf_field() }}                                
                                <input type="hidden" id="documentId" name="documentId" value="{{$customer->id}}">
                                <input type="hidden" id="saleId" name="saleId" value="{{$sales_id}}">
                                <input type="hidden" id="uploadType" name="uploadType" value="Service">
                                <input type="hidden" id="uploadedFilePictureService" name="uploadedFilePictureService" value="{{$picture_service}}">
                                <center>
                                    <label>Confirmaci??n del pago del impuesto a la renta del a??o inmediato anterior o constancia de la informaci??n publicada por el Servicio de Rentas Internas (SRI) a trav??s de la p??gina web, de ser aplicable. </label>
                                    <div class="alert" id="messageService" style="display: none"></div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameService"></div>
                                    <div class="inputWrapper"><span id="uploaded_imageService">{!! $picture_service !!}</span>
                                        <center>
                                            <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileService" onchange="fileNameFunction('Service')" id="select_fileService">
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadService" class="btn btn-primary @if($picture_service == null) visible @else hidden @endif" onclick="uploadPictureForm('Service')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="@if($picture_service == null) hidden @else visible @endif" id="deletePictureService" href="#" onclick="deletePictureForm('Service','{{$customer->id}}','{{$sales_id}}')">
                                        <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                    </a>  
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12" style="margin-top:5px;padding-top:15px;padding-bottom:15px">
                <div class="row" style="float:left">
                    <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" style="margin-left: -30px;"> Cancelar </a>-->
                </div>
                <div class="row" style="float:right">
                    <a id="fourthStepBtnBack" class="btn btn-back registerForm" align="right" href="#"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                    <a id="fourthStepBtnNext" class="btn btn-info registerForm" align="right" href="#"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                </div>
            </div>
            <!--</form>-->
        </div>
        <div id="fifthStep" class="col-md-12 hidden" style="margin-top:20px">
            <div class="col-xs-12 col-md-12 border">
                <div id="fifthStepAlert" class="alert alert-success hidden">
                    Se ha completado el Formulario de Vinculaci??n, su asesor de venta pronto se pondra en contacto con usted.
                </div>
                <div class="checkbox">
                    <!--<label><input type="checkbox" id="fifthStepChk" name="fifthStepChk" value="">Certifico que los datos ingresados son verdaderos.</label>-->
                </div>
                <div class="col-md-12" style="margin-top:-25px;">
                    <div class="form-group">
                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="tokenCode"> Token</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                        <input type="text2" id="tokenCode" name="tokenCode" class="form-control registerForm" required tabindex="2" placeholder="Token" onchange="removeInputRedFocus(this.id)" value="">
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="margin-top:5px;padding-top:15px;padding-bottom:15px">
                <div class="row" style="float:left">
                    <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" style="margin-left: -30px;"> Cancelar </a>-->
                </div>
                <div class="row" style="float:right">
                    <a id="fifthStepBtnBack" class="btn btn-back registerForm" align="right" href="#"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                    <a id="fifthStepBtnNext" class="btn btn-info registerForm" align="right" href="#"> Validar </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
