@extends('layouts.remote_app')

@section('content')
<script src="{{ assets('js/registerCustom.js') }}"></script>
<script src="{{ assets('js/sales/R2/insuranceApplication.js') }}"></script>

<link href="{{ assets('css/sales/create.css')}}" rel="stylesheet" type="text/css"/>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="{{ assets('responsive-tables-js-master/src/responsivetables.js') }}"></script>
<link href="{{ assets('responsive-tables-js-master/src/responsivetables.css')}}" rel="stylesheet" type="text/css"/>
<style>
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
    }
    textarea { 
        resize: vertical; 
    }
/*    #vehiclesTable {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }*/
.redBorder {
    outline: thin solid red !important;
}

td::before {
  display: none;
}

@media screen and (max-width: 37em), print and (max-width: 5in) {
    td::before {
        display: block;
        font-weight: bold;
    }
    #beneficiaryTable td{
        display: block ruby;
        text-align: left;
    }
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="container" style="font-size:14px !important;padding-bottom: 15px;">
    <!--<div class="row justify-content-center border" style="margin-left:20%;">-->

    <div class="col-xs-12 col-md-10 col-md-offset-1 border" style="padding: 15px;">
        <div class="row">
            <div class="col-xs-12 registerForm" style="margin:12px;">
                <center>
                    <h4 style="font-weight:bold">Solicitud de Seguro</h4>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-2 wizard_inicial" style="padding-left:0px !important"><div id="firstStepWizard" class="wizard_activo registerForm">Solicitante</div></div>
            <div class="col-xs-12 col-md-2 wizard_medio" style="padding-left:0px !important"><div id="secondStepWizard" class="wizard_inactivo registerForm">Beneficiarios</div></div>
            <div class="col-xs-12 col-md-4 wizard_medio" style="padding-left:0px !important"><div id="thirdStepWizard" class="wizard_inactivo registerForm">Antecendentes de Segurabilidad</div></div>
            <div class="col-xs-12 col-md-2 wizard_medio" style="padding-left:0px !important"><div id="fourthStepWizard" class="wizard_inactivo registerForm">Historial Cl??nico</div></div>
            <div class="col-xs-12 col-md-2 wizard_final" style="padding-right:0px !important"><div id="fifthStepWizard" class="wizard_inactivo registerForm">Autorizaci??n</div></div>
        </div>
        <div class="">
            <form name="salesForm" method="POST" action="/user" id="salesForm">
                <div id="firstStep" class="col-xs-12 col-md-12">
                    <div class="col-md-12" style="margin-top:5px;margin-bottom: 5px;padding-top:15px;">
                        <div class="row" style="float:left">
                            <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" tabindex="1"> Cancelar </a>-->
                        </div>
                        <div class="row" style="float:right">
                            <!--<a id="secondStepBtnBackTop" class="btn btn-back registerForm" align="right"><span class="glyphicon glyphicon-step-backward" tabindex="2"></span> Anterior </a>-->
                            <a id="secondStepBtnNextTop" class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="firstStepBtnNext()" tabindex="3"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                        <div class="wizard_activo registerForm titleDivBorderTop" onclick="fadeToggle('resumeDiv')">
                            <span class="titleLink">Datos del Solicitante</span>
                            <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                        <div id="customerAlert" class="alert alert-danger registerForm titleDivBorderTop hidden" style="margin-top:5px;border-radius:0px !important;">
                            <center><strong>??Alerta!</strong> Revise los campos </center>
                        </div>
                        {{ csrf_field() }}
                        <div class="col-md-12" style="margin-top: 25px;">
                            <button id="btnModalSecondStep" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#secondStepModal">Open Modal</button>
                            <!-- Modal Contents -->
                            <!-- Modal -->
                            <div id="secondStepModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form>
                                <div class="form-row">
                                    <input type="hidden" id="salId" name="salId" value="{{$sales->id}}">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="document"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> C??dula</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <!--<input type="text" class="form-control registerForm" name="document" id="document" placeholder="C??dula" value="{{ old('document') }}" required="required">-->
                                        <input autocomplete="off" type="text" class="form-control registerForm" name="document" id="document" value="{{$customer->document}}"  placeholder="C??dula" required="required" tabindex="4" disabled="disabled">
                                        <div id="suggesstion-box"></div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="document_id"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="document_id" name="document_id" class="form-control registerForm" value="{{old('document_id')}}" required tabindex="5" disabled="disabled">
                                            <option value="0">--Escoja Una---</option>
                                            <option selected="true" value="{{$documentUser->id}}">{{$documentUser->name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" style="list-style-type:disc;" for="first_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Primer Nombre</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="first_name" id="first_name" placeholder="Primer Nombre" value="{{$customer->first_name}}" required="required" tabindex="6" disabled="disabled">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" style="list-style-type:disc;" for="second_name"> Segundo Nombre</label>
                                        <input type="text" class="form-control registerForm" name="second_name" id="second_name" placeholder="Segundo Nombre" value="{{$customer->second_name}}" tabindex="7" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="last_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Primer Apellido</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="last_name" id="last_name" placeholder="Primer Apellido" value="{{$customer->last_name}}" required tabindex="8" disabled="disabled">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="second_last_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Segundo Apellido</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="second_last_name" id="second_last_name" placeholder="Segundo Apellido" value="{{$customer->second_last_name}}" required tabindex="9" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="birthdate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Fecha de Nacimiento </label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="date" class="form-control registerForm" name="birthdate" id="birthdate" placeholder="Fecha de Nacimiento" value="{{$customer->birthdate}}" required tabindex="10" style="line-height: 14px;" disabled="disabled">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="city"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Celular</label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><label class="own"><span class="glyphicon glyphicon-info-sign" style="color:#0099ff"><span class="own1" style="float:left">El celular debe tener 10 caracteres</span></span></label>
                                        <input type="text" class="form-control registerForm" name="mobile_phone" id="mobile_phone" placeholder="Celular" value="{{$customer->mobile_phone}}" required tabindex="11" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="document"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Tel??fono </label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><label class="own"><span class="glyphicon glyphicon-info-sign" style="color:#0099ff"><span class="own1" style="float:left">El telefono debe tener 9 caracteres</span></span></label>
                                        <input type="text" class="form-control registerForm" name="phone" id="phone" placeholder="Tel??fono" value="{{$customer->phone}}" required tabindex="12" disabled="disabled">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="city"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Direcci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="address" id="address" placeholder="Direcci??n" required tabindex="13" value="{{$customer->address}}" disabled="disabled">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="correo"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Correo</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="email" class="form-control registerForm" name="email" id="email" placeholder="Correo" value="{{$customer->email}}" required tabindex="14" disabled="disabled">
                                        <p id="emailError" style="color:red;font-weight: bold; display: none;"></p>    
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                        @if($errors->any())
                                        <span style="color:red;font-weight:bold">{{$errors->first()}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="country"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Pa??s</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select name="country" id="country" class="form-control registerForm" required tabindex="15" disabled="disabled">
                                            <option value="0">--Escoja Una---</option>
                                            <option selected="true" value="{{$countryUser->id}}">{{$countryUser->name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="province"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Canton</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select name="province" class="form-control registerForm" id="province" required tabindex="16" disabled="disabled">
                                           <option selected="true" value="{{$provinceUser->id}}">{{$provinceUser->name}}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="city"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Ciudad</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select name="city" class="form-control registerForm" id="city" required tabindex="17" disabled="disabled">
                                            <option selected="true" value="{{$cityUser->id}}">{{$cityUser->name}}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="weight"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Peso (lb)</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="weight" id="weight" placeholder="Peso" required tabindex="18" value="{{$weight}}" {{$disabled}} maxlength="3">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="stature"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Estatura (cm)</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="stature" id="stature" placeholder="Estatura" required tabindex="19" value="{{$stature}}" {{$disabled}} maxlength="3">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="registerForm" for="broker"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Asesor Productor de Seguros</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="broker" id="broker" placeholder="" required tabindex="20" value="{{$agentSS[0]->agentedes}}" disabled="disabled" maxlength="100">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-bottom:15px">
                        <div class="row" style="float:left">
                            <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" tabindex="23"> Cancelar </a>-->
                        </div>
                        <div class="row" style="float:right">
                            <!--<a class="btn btn-back registerForm" align="right"   tabindex="22"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>-->
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="firstStepBtnNext()" tabindex="21"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                </div>
                <div id="secondStep" class="col-md-12 hidden">
                    <div class="col-md-12" style="margin-top:5px;padding-top:15px;">
                        <div class="row" style="float:left">
                            <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" tabindex="1"> Cancelar </a>-->
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right"  href="#" onclick="nextStep('secondStep', 'firstStep')" tabindex="2"> <span class="glyphicon glyphicon-step-backward"></span>Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="secondStepBtnNext()" tabindex="3"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                        <div class="wizard_activo registerForm titleDivBorderTop">
                            <span class="titleLink">Beneficiarios</span>
                            <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                        <div id="beneficiaryAlert" class="alert alert-danger hidden registerForm titleDivBorderTop" style="margin-top:5px;border-radius:0px !important;">
                            <center><strong>??Alerta!</strong> xxxxx</center>
                        </div>
                        <div class="col-md-12" style="margin-top: 25px;">
                            <button id="btnModalSecondStep" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#secondStepModal">Open Modal</button>
                            <!-- Modal Contents -->
                            <!-- Modal -->
                            <div id="secondStepModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" style="list-style-type:disc;" for="beneficiary_first_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Primer Nombre</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="beneficiary_first_name" id="beneficiary_first_name" placeholder="Primer Nombre" value="" required="required" tabindex="4" maxlength="30">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label class="registerForm" style="list-style-type:disc;" for="beneficiary_second_name"> Segundo Nombre</label>
                                        <input type="text" class="form-control registerForm" name="beneficiary_second_name" id="beneficiary_second_name" placeholder="Segundo Nombre" value="" tabindex="5" maxlength="30">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="beneficiary_last_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Primer Apellido</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="beneficiary_last_name" id="beneficiary_last_name" placeholder="Primer Apellido" value="" required tabindex="6" maxlength="30">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="beneficiary_second_last_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Segundo Apellido</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="beneficiary_second_last_name" id="beneficiary_second_last_name" placeholder="Segundo Apellido" value="" required tabindex="7" maxlength="30">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="porcentage_Beneficiary"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Porcentaje</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="porcentage_Beneficiary" id="porcentage_Beneficiary" placeholder="Porcentaje" value="" required tabindex="8" onkeypress="return onlyNumbers(event, this)">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="beneficiary_relationship"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Parentesco</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="beneficiary_relationship" name="relationship" class="form-control registerForm" value="" required tabindex="9">
                                            <option selected="true" value="0">--Escoja Una---</option>
                                            <option value="1">PADRE/MADRE</option>
                                            <option value="2">HIJO(A)</option>
                                            <option value="3">ABUELO(A)</option>
                                            <option value="4">NIETO(A)</option>
                                            <option value="5">HERMANO(A)</option>
                                            <option value="6">SUEGRO(A)</option>
                                            <option value="7">YERNO</option>
                                            <option value="8">NUERA</option>
                                            <option value="9">CU??ADO(A)</option>
                                            <option value="10">CONYUGE</option>
                                            <option value="11">OTROS</option>
                                            <option value="12">TIO(A)</option>
                                            <option value="13">PRIMO(A)</option>
                                            <option value="14">SOBRINO(A)</option>
                                            <option value="15">ASEGURADO PRINCIPAL</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6 col-md-offset-6">
                                        <a  id="btnBeneficiary"  class="btn btn-success registerForm" align="right" href="#" style="float:right;margin-right: 0px;padding: 5px;width:100px" @if($disabled == '') onclick="addBeneficiary()" @else {{$disabled}} @endif tabindex="10" ><span class="glyphicon glyphicon-plus"></span>Agregar </a>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12" style="margin-top: 55px;">
                                        <table id="beneficiaryTable" class="table table-striped table-bordered responsive">
                                            <thead class="tableCustomHeader">
                                                <tr>
                                                    <th>Primer Nombre</th>
                                                    <th>Segundo Nombre</th>
                                                    <th>Primer Apellido</th>
                                                    <th>Segundo Apellido</th>
                                                    <th>Porcentaje</th>
                                                    <th>Parentesco</th>
                                                    <th>Acci??n</th>
                                                </tr>
                                            </thead>
                                            <tbody id="beneficiaryBodyTable">
                                                {!! $beneTable !!}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>    
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12" style="margin-top:5px;padding-top:15px;">
                        <div class="row" style="float:left">
                            <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" tabindex="13"> Cancelar </a>-->
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('secondStep', 'firstStep')" tabindex="12"><span class="glyphicon glyphicon-step-backward" ></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="secondStepBtnNext()" tabindex="11"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                </div>    
                <div id="thirdStep" class="col-md-12 hidden">
                    <div class="col-md-12" style="margin-top:5px;padding-top:15px;">
                        <div class="row" style="float:left">
                            <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" tabindex="1"> Cancelar </a>-->
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('thirdStep', 'secondStep')" tabindex="2"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="thirdStepBtnNext()"  tabindex="3"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                        <div class="wizard_activo registerForm titleDivBorderTop">
                            <span class="titleLink">Antecedentes de Asegurabilidad</span>
                            <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                        <div id="insuranceRecordAlert" class="alert alert-danger registerForm titleDivBorderTop hidden" style="margin-top:5px;border-radius:0px !important;">
                            <center><strong>??Alerta!</strong> Revise los campos </center>
                        </div>
                        <button id="btnModalThirdStep" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#thirdStepModal">Open Modal</button>
                            <!-- Modal Contents -->
                            <!-- Modal -->
                            <div id="thirdStepModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12" style="margin-top: 25px;">
                            <form>
                                <table id="">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th >Si</th>
                                            <th >No</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr id="insuranceRecord1Div" style="background-color: transparent;">
                                            <td class="registerForm">1.-  ??Alguna vez ha sido cancelada, negada o rechazada su solicitud de seguro?</td>
                                            <td><input type="radio" name="insuranceRecord1" id="insuranceRecord11" value="yes" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord1 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="insuranceRecord1" id="insuranceRecord12" value="no" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord1 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr  style="background-color: transparent;" id="textArea_iR1" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord1_detail == null) hidden="true" @endif @else hidden="true" @endif>
                                            <td span="3" colspan="3"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for=""> Detalle</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                <textarea type="text" class="form-control registerForm" name="textAreaiR1" id="textAreaiR1" placeholder="" required tabindex="" onchange="removeInputRedFocus(this.id)" maxlength="500"> @if($insuranceApp != null) @if($insuranceApp->insuranceRecord1_detail != null) {{$insuranceApp->insuranceRecord1_detail}} @endif @endif</textarea></td>
                                        </tr>
                                        <tr id="insuranceRecord2Div" style="background-color: transparent;">
                                            <td class="registerForm">2.-  ??Tiene seguros de vida en otra compa????a, en caso de ser afirmativa su respuesta especificar nombre y monto del seguro?</td>
                                            <td><input type="radio" name="insuranceRecord2" id="insuranceRecord21" value="yes" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord2 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="insuranceRecord2" id="insuranceRecord22" value="no" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord2 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_iR2" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord2_detail == null) hidden="true" @endif @else hidden="true" @endif>
                                            <td span="3" colspan="3"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for=""> Detalle</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                            <textarea type="text" class="form-control registerForm" name="textAreaiR2" id="textAreaiR2" placeholder="" required tabindex="" onchange="removeInputRedFocus(this.id)" maxlength="500"> @if($insuranceApp != null) @if($insuranceApp->insuranceRecord2_detail != null) {{$insuranceApp->insuranceRecord2_detail}} @endif @endif </textarea></td>
                                        </tr>
                                        <tr id="insuranceRecord3Div" style="background-color: transparent;">
                                            <td class="registerForm">3.-  ??Ha participado o piensa participar en actividades de deportes riesgosos tales como: boxeo, inmersi??n submarina, 
                                             <br>monta??ismo, alas delta, paracaidismo; carreras de caballos, autom??viles, motocicleta, lanchas u otros?</td>
                                             <td><input type="radio" name="insuranceRecord3" id="insuranceRecord31" value="yes"@if($insuranceApp != null) @if($insuranceApp->insuranceRecord3 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="insuranceRecord3" id="insuranceRecord32" value="no"@if($insuranceApp != null) @if($insuranceApp->insuranceRecord3 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_iR3" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord3_detail == null) hidden="true" @endif @else hidden="true" @endif>
                                            <td span="3" colspan="3"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for=""> Detalle</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                            <textarea type="text" class="form-control registerForm" name="textAreaiR3" id="textAreaiR3" placeholder="" required tabindex="" onchange="removeInputRedFocus(this.id)" maxlength="500"> @if($insuranceApp != null) @if($insuranceApp->insuranceRecord3_detail != null) {{$insuranceApp->insuranceRecord3_detail}} @endif @endif</textarea></td>
                                        </tr>
                                        <tr id="insuranceRecord4Div" style="background-color: transparent;">
                                            <td class="registerForm">4.-  ??Consume bebidas alcoh??licas? En caso afirmativo indique cantidad y frecuencia</td>
                                            <td><input type="radio" name="insuranceRecord4" id="insuranceRecord41" value="yes"@if($insuranceApp != null) @if($insuranceApp->insuranceRecord4 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="insuranceRecord4" id="insuranceRecord42" value="no"@if($insuranceApp != null) @if($insuranceApp->insuranceRecord4 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_iR4" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord4_detail == null) hidden="true" @endif @else hidden="true" @endif>
                                            <td span="3" colspan="3"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for=""> Detalle</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                            <textarea type="text" class="form-control registerForm" name="textAreaiR4" id="textAreaiR4" placeholder="" required tabindex="" onchange="removeInputRedFocus(this.id)" maxlength="500"> @if($insuranceApp != null) @if($insuranceApp->insuranceRecord4_detail != null) {{$insuranceApp->insuranceRecord4_detail}} @endif @endif</textarea></td>
                                        </tr>
                                        <tr id="insuranceRecord5Div" style="background-color: transparent;">
                                            <td class="registerForm">5.-  ??Ha consumido cualquier derivado de tabaco en los ??ltimos 12 meses? En caso afirmativo indique tipo, cantidad y frecuencia </td>
                                            <td><input type="radio" name="insuranceRecord5" id="insuranceRecord51" value="yes" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord5 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="insuranceRecord5" id="insuranceRecord52" value="no" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord5 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_iR5" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord5_detail == null) hidden="true" @endif @else hidden="true" @endif>
                                            <td span="3" colspan="3"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for=""> Detalle</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                            <textarea type="text" class="form-control registerForm" name="textAreaiR5" id="textAreaiR5" placeholder="" required tabindex="" onchange="removeInputRedFocus(this.id)" maxlength="500"> @if($insuranceApp != null) @if($insuranceApp->insuranceRecord5_detail != null) {{$insuranceApp->insuranceRecord5_detail}} @endif @endif</textarea></td>
                                        </tr>
                                        <tr id="insuranceRecord6Div" style="background-color: transparent;">
                                            <td class="registerForm">6.-  ??Durante los ??ltimos diez a??os ha consumido coca??na, marihuana, meta-anfetaminas, barbit??ricos o cualquier otra sustancia controlada?</td>
                                            <td><input type="radio" name="insuranceRecord6" id="insuranceRecord61" value="yes" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord6 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="insuranceRecord6" id="insuranceRecord62" value="no" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord6 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_iR6" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord6_detail == null) hidden="true" @endif @else hidden="true" @endif>
                                            <td span="3" colspan="3"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for=""> Detalle</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                            <textarea type="text" class="form-control registerForm" name="textAreaiR6" id="textAreaiR6" placeholder="" required tabindex="" onchange="removeInputRedFocus(this.id)" maxlength="500"> @if($insuranceApp != null) @if($insuranceApp->insuranceRecord6_detail != null) {{$insuranceApp->insuranceRecord6_detail}} @endif @endif</textarea></td>
                                        </tr>
                                        <tr id="insuranceRecord7Div" style="background-color: transparent;">
                                            <td class="registerForm">7.-  ??Alguna vez ha recibido beneficios por incapacidad?</td>
                                            <td><input type="radio" name="insuranceRecord7" id="insuranceRecord71" value="yes" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord7 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="insuranceRecord7" id="insuranceRecord72" value="no" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord7 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_iR7" @if($insuranceApp != null) @if($insuranceApp->insuranceRecord7_detail == null) hidden="true" @endif @else hidden="true" @endif>
                                            <td span="3" colspan="3"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for=""> Detalle</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                            <textarea type="text" class="form-control registerForm" name="textAreaiR7" id="textAreaiR7" placeholder="" required tabindex="" onchange="removeInputRedFocus(this.id)" maxlength="500"> @if($insuranceApp != null) @if($insuranceApp->insuranceRecord7_detail != null) {{$insuranceApp->insuranceRecord7_detail}} @endif @endif</textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-bottom:15px">
                        <div class="row" style="float:left">
                            <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" tabindex="6"> Cancelar </a>-->
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('thirdStep', 'secondStep')"  tabindex="5"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="thirdStepBtnNext()"  tabindex="4"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                </div>
                <div id="fourthStep" class="col-md-12 hidden">
                    <div class="col-md-12" style="margin-top:5px;padding-top:15px;">
                        <div class="row" style="float:left">
                            <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" tabindex="1"> Cancelar </a>-->
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('fourthStep', 'thirdStep')" tabindex="2"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="fourthStepBtnNext()" tabindex="3"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                        <div class="wizard_activo registerForm titleDivBorderTop">
                            <span class="titleLink">Historial Cl??nico</span>
                            <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                        <div id="medicalHistoryAlert" class="alert alert-danger registerForm titleDivBorderTop hidden" style="margin-top:5px;border-radius:0px !important;">
                            <center><strong>??Alerta!</strong> Revise los campos </center>
                        </div>
                        <button id="btnModalFourthStep" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#fourthStepModal">Open Modal</button>
                            <!-- Modal Contents -->
                            <!-- Modal -->
                            <div id="fourthStepModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12" style="margin-top: 25px;">
                            <form>
                                <table id="">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th >Si</th>
                                            <th >No</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr id="medicalHistory1Div" style="background-color: transparent;">
                                            <td class="registerForm">1.-  ??Tiene m??dico personal?  En caso de ser afirmativa su respuesta cita el nombre del m??dico</td>
                                            <td><input type="radio" name="medicalHistory1"  value="yes" tabindex="4" @if($insuranceApp != null) @if($insuranceApp->medicalHistory1 == 'yes') checked @endif @endif ></td>
                                            <td><input type="radio" name="medicalHistory1"  value="no"  tabindex="5" @if($insuranceApp != null) @if($insuranceApp->medicalHistory1 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_mH1" @if($insuranceApp == null) hidden="true" @else @if($insuranceApp->medicalHistory1 == 'no' || $insuranceApp->medicalHistory1 == null) hidden="true" @endif @endif>
                                            <td span="3" colspan="3">
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Diagn??stico y tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="diagnosis1" id="diagnosis1" placeholder="Diagn??stico y tratamiento" @if($insuranceApp != null) value="{{$insuranceApp->diagnosis1}}" @endif required tabindex="6" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="treatmentDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Fecha de tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="date" class="form-control registerForm" name="treatmentDate1" id="treatmentDate1" @if($insuranceApp != null) value="{{date('Y-m-d', strtotime($insuranceApp->treatmentDate1))}}" @endif required tabindex="7">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Duraci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="duration1" id="duration1" placeholder="Duraci??n" @if($insuranceApp != null) value="{{$insuranceApp->duration1}}" @endif required tabindex="8" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Nombre del M??dico  - Cl??nica ??? Hospital</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="hospital1" id="hospital1" placeholder="Nombre del M??dico  - Cl??nica ??? Hospital" @if($insuranceApp != null) value="{{$insuranceApp->hospital1}}" @endif required tabindex="9" maxlength="100">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="medicalHistory2Div" style="background-color: transparent;">
                                            <td class="registerForm">2.-  ??Est?? actualmente tomando alg??n medicamento, en observaci??n o tratamiento m??dico?</td>
                                            <td><input type="radio" name="medicalHistory2"  value="yes" tabindex="10"@if($insuranceApp != null) @if($insuranceApp->medicalHistory2 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="medicalHistory2"  value="no" tabindex="11" @if($insuranceApp != null) @if($insuranceApp->medicalHistory2 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_mH2" @if($insuranceApp == null) hidden="true" @else @if($insuranceApp->medicalHistory2 == 'no' || $insuranceApp->medicalHistory2 == null) hidden="true" @endif @endif>
                                            <td span="3" colspan="3">
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Diagn??stico y tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="diagnosis2" id="diagnosis2" placeholder="Diagn??stico y tratamiento" @if($insuranceApp != null) value="{{$insuranceApp->diagnosis2}}" @endif required tabindex="12" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="treatmentDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Fecha de tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="date" class="form-control registerForm" name="treatmentDate2" id="treatmentDate2" @if($insuranceApp != null) value="{{date('Y-m-d', strtotime($insuranceApp->treatmentDate2))}}" @endif required tabindex="13">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Duraci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="duration2" id="duration2" placeholder="Duraci??n" @if($insuranceApp != null) value="{{$insuranceApp->duration2}}" @endif required tabindex="14" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Nombre del M??dico  - Cl??nica ??? Hospital</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="hospital2" id="hospital2" placeholder="Nombre del M??dico  - Cl??nica ??? Hospital" @if($insuranceApp != null) value="{{$insuranceApp->hospital2}}" @endif required tabindex="15" maxlength="100">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="medicalHistory3Div" style="background-color: transparent;">
                                            <td class="registerForm">3.-  ??Se ha realizado alg??n examen, consulta, chequeo u operaci??n en los ??ltimos tres (3) a??os?</td>
                                            <td><input type="radio" name="medicalHistory3"  value="yes" tabindex="16" @if($insuranceApp != null) @if($insuranceApp->medicalHistory3 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="medicalHistory3"  value="no" tabindex="17" @if($insuranceApp != null) @if($insuranceApp->medicalHistory3 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_mH3" @if($insuranceApp == null) hidden="true" @else @if($insuranceApp->medicalHistory3 == 'no' || $insuranceApp->medicalHistory3 == null) hidden="true" @endif @endif>
                                            <td span="3" colspan="3">
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Diagn??stico y tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="diagnosis3" id="diagnosis3" placeholder="Diagn??stico y tratamiento" @if($insuranceApp != null) value="{{$insuranceApp->diagnosis3}}" @endif required tabindex="18" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="treatmentDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Fecha de tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="date" class="form-control registerForm" name="treatmentDate3" id="treatmentDate3" @if($insuranceApp != null) value="{{date('Y-m-d', strtotime($insuranceApp->treatmentDate3))}}" @endif required tabindex="19">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Duraci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="duration3" id="duration3" placeholder="Duraci??n" @if($insuranceApp != null) value="{{$insuranceApp->duration3}}" @endif required tabindex="20" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Nombre del M??dico  - Cl??nica ??? Hospital</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="hospital3" id="hospital3" placeholder="Nombre del M??dico  - Cl??nica ??? Hospital" @if($insuranceApp != null) value="{{$insuranceApp->hospital3}}" @endif required tabindex="21" maxlength="100">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="medicalHistory4Div" style="background-color: transparent;">
                                            <td class="registerForm">4.-  ??Ha sido hospitalizado o internado en alguna instituci??n o sanatorio en los ??ltimos tres (3) a??os?</td>
                                            <td><input type="radio" name="medicalHistory4"  value="yes" tabindex="22" @if($insuranceApp != null) @if($insuranceApp->medicalHistory4 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="medicalHistory4"  value="no" tabindex="23" @if($insuranceApp != null) @if($insuranceApp->medicalHistory4 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_mH4" @if($insuranceApp == null) hidden="true" @else @if($insuranceApp->medicalHistory4 == 'no' || $insuranceApp->medicalHistory4 == null) hidden="true" @endif @endif>
                                            <td span="3" colspan="3">
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Diagn??stico y tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="diagnosis4" id="diagnosis4" placeholder="Diagn??stico y tratamiento" @if($insuranceApp != null) value="{{$insuranceApp->diagnosis4}}" @endif required tabindex="24" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="treatmentDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Fecha de tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="date" class="form-control registerForm" name="treatmentDate4" id="treatmentDate4" @if($insuranceApp != null) value="{{date('Y-m-d', strtotime($insuranceApp->treatmentDate4))}}" @endif required tabindex="25">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Duraci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="duration4" id="duration4" placeholder="Duraci??n" @if($insuranceApp != null) value="{{$insuranceApp->duration4}}" @endif required tabindex="26" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Nombre del M??dico  - Cl??nica ??? Hospital</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="hospital4" id="hospital4" placeholder="Nombre del M??dico  - Cl??nica ??? Hospital" @if($insuranceApp != null) value="{{$insuranceApp->hospital4}}" @endif required tabindex="27" maxlength="100">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="medicalHistory5Div" style="background-color: transparent;">
                                            <td class="registerForm">5.-  ??Tiene que ser hospitalizado o internado en alguna instituci??n o sanatorio? </td>
                                            <td><input type="radio" name="medicalHistory5"  value="yes" tabindex="28" @if($insuranceApp != null) @if($insuranceApp->medicalHistory5 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="medicalHistory5"  value="no" tabindex="29" @if($insuranceApp != null) @if($insuranceApp->medicalHistory5 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_mH5" @if($insuranceApp == null) hidden="true" @else @if($insuranceApp->medicalHistory5 == 'no' || $insuranceApp->medicalHistory5 == null) hidden="true" @endif @endif>
                                            <td span="3" colspan="3">
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Diagn??stico y tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="diagnosis5" id="diagnosis5" placeholder="Diagn??stico y tratamiento" @if($insuranceApp != null) value="{{$insuranceApp->diagnosis5}}" @endif required tabindex="30" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="treatmentDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Fecha de tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="date" class="form-control registerForm" name="treatmentDate5" id="treatmentDate5" @if($insuranceApp != null) value="{{date('Y-m-d', strtotime($insuranceApp->treatmentDate5))}}" @endif required tabindex="31" maxlength="100">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Duraci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="duration5" id="duration5" placeholder="Duraci??n" @if($insuranceApp != null) value="{{$insuranceApp->duration5}}" @endif required tabindex="32" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Nombre del M??dico  - Cl??nica ??? Hospital</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="hospital5" id="hospital5" placeholder="Nombre del M??dico  - Cl??nica ??? Hospital" @if($insuranceApp != null) value="{{$insuranceApp->hospital5}}" @endif required tabindex="33" maxlength="100">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="medicalHistory6Div" style="background-color: transparent;">
                                            <td class="registerForm">6.-  ??Ha sufrido alguna enfermedad f??sica o mental no mencionada anteriormente?</td>
                                            <td><input type="radio" name="medicalHistory6"  value="yes" tabindex="34" @if($insuranceApp != null) @if($insuranceApp->medicalHistory6 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="medicalHistory6"  value="no" tabindex="35" @if($insuranceApp != null) @if($insuranceApp->medicalHistory6 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_mH6" @if($insuranceApp == null) hidden="true" @else @if($insuranceApp->medicalHistory6 == 'no' || $insuranceApp->medicalHistory6 == null) hidden="true" @endif @endif>
                                            <td span="3" colspan="3">
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Diagn??stico y tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="diagnosis6" id="diagnosis6" placeholder="Diagn??stico y tratamiento" @if($insuranceApp != null) value="{{$insuranceApp->diagnosis6}}" @endif required tabindex="36" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="treatmentDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Fecha de tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="date" class="form-control registerForm" name="treatmentDate6" id="treatmentDate6" @if($insuranceApp != null) value="{{date('Y-m-d', strtotime($insuranceApp->treatmentDate6))}}" @endif required tabindex="37" maxlength="100">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Duraci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="duration6" id="duration6" placeholder="Duraci??n" @if($insuranceApp != null) value="{{$insuranceApp->duration6}}" @endif required tabindex="38" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Nombre del M??dico  - Cl??nica ??? Hospital</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="hospital6" id="hospital6" placeholder="Nombre del M??dico  - Cl??nica ??? Hospital" @if($insuranceApp != null) value="{{$insuranceApp->hospital6}}" @endif required tabindex="39" maxlength="100">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        </tr>
                                        <tr id="medicalHistory7Div" style="background-color: transparent;">
                                            <td class="registerForm">7.-  ??Han padecido sus padres o hermanos diabetes, c??ncer hipertensi??n arterial, enfermedad cardiaca, renal y/o mental?</td>
                                            <td><input type="radio" name="medicalHistory7"  value="yes" tabindex="40" @if($insuranceApp != null) @if($insuranceApp->medicalHistory7 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="medicalHistory7"  value="no" tabindex="41" @if($insuranceApp != null) @if($insuranceApp->medicalHistory7 == 'no') checked @endif @endif></td>
                                        </tr>
                                       <tr style="background-color: transparent;" id="textArea_mH7" @if($insuranceApp == null) hidden="true" @else @if($insuranceApp->medicalHistory7 == 'no' || $insuranceApp->medicalHistory7 == null) hidden="true" @endif @endif>
                                           <td span="3" colspan="3">
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Diagn??stico y tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="diagnosis7" id="diagnosis7" placeholder="Diagn??stico y tratamiento" @if($insuranceApp != null) value="{{$insuranceApp->diagnosis7}}" @endif required tabindex="42" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="treatmentDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Fecha de tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="date" class="form-control registerForm" name="treatmentDate7" id="treatmentDate7" @if($insuranceApp != null) value="{{date('Y-m-d', strtotime($insuranceApp->treatmentDate7))}}" @endif required tabindex="43" maxlength="100">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Duraci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="duration7" id="duration7" placeholder="Duraci??n" @if($insuranceApp != null) value="{{$insuranceApp->duration7}}" @endif required tabindex="44" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Nombre del M??dico  - Cl??nica ??? Hospital</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="hospital7" id="hospital7" placeholder="Nombre del M??dico  - Cl??nica ??? Hospital" @if($insuranceApp != null) value="{{$insuranceApp->hospital7}}" @endif required tabindex="45" maxlength="100">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr id="medicalHistory8Div" style="background-color: transparent;">
                                            <td class="registerForm">8.-  Solo para mujeres, ??Est?? embarazada? Indique cuantos meses</td>
                                            <td><input type="radio" name="medicalHistory8"  value="yes" tabindex="46" @if($insuranceApp != null) @if($insuranceApp->medicalHistory8 == 'yes') checked @endif @endif></td>
                                            <td><input type="radio" name="medicalHistory8"  value="no" tabindex="47" @if($insuranceApp != null) @if($insuranceApp->medicalHistory8 == 'no') checked @endif @endif></td>
                                        </tr>
                                        <tr style="background-color: transparent;" id="textArea_mH8" @if($insuranceApp == null) hidden="true" @else @if($insuranceApp->medicalHistory8 == 'no' || $insuranceApp->medicalHistory8 == null) hidden="true" @endif @endif>
                                            <td span="3" colspan="3">
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Diagn??stico y tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="diagnosis8" id="diagnosis8" placeholder="Diagn??stico y tratamiento" @if($insuranceApp != null) value="{{$insuranceApp->diagnosis8}}" @endif required tabindex="48" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="treatmentDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Fecha de tratamiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="date" class="form-control registerForm" name="treatmentDate8" id="treatmentDate8" @if($insuranceApp != null) value="{{date('Y-m-d', strtotime($insuranceApp->treatmentDate8))}}" @endif required tabindex="49" maxlength="100">
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Duraci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="duration8" id="duration8" placeholder="Duraci??n" @if($insuranceApp != null) value="{{$insuranceApp->duration8}}" @endif required tabindex="50" maxlength="100">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="registerForm" for="doctor_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Nombre del M??dico  - Cl??nica ??? Hospital</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                        <input type="text2" class="form-control registerForm" name="hospital8" id="hospital8" placeholder="Nombre del M??dico  - Cl??nica ??? Hospital" @if($insuranceApp != null) value="{{$insuranceApp->hospital8}}" @endif required tabindex="51" maxlength="100">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-bottom:15px">
                        <div class="row" style="float:left">
                            <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" tabindex="54"> Cancelar </a>-->
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('fourthStep', 'thirdStep')"><span class="glyphicon glyphicon-step-backward" tabindex="53"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="fourthStepBtnNext()" tabindex="52"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                </div>
                <div id="fifthStep" class="col-md-12 hidden">
                <div class="col-md-12" style="margin-top:5px;padding-top:15px;">
                        <div class="row" style="float:left">
                            <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" tabindex="1"> Cancelar </a>-->
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('fifthStep', 'fourthStep')" tabindex="2"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="fifthStepBtnNext()" tabindex="3"> Firmar <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                        <div class="wizard_activo registerForm titleDivBorderTop">
                            <span class="titleLink">Autorizaci??n</span>
                            <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                        <div id="medicalHistoryAlert" class="alert alert-danger registerForm titleDivBorderTop hidden" style="margin-top:5px;border-radius:0px !important;">
                            <center><strong>??Alerta!</strong> Revise los campos </center>
                        </div>
                        <button id="btnModalFifthStep" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#fifthStepModal">Open Modal</button>
                            <!-- Modal Contents -->
                            <!-- Modal -->
                            <div id="fifthStepModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-md-12" style="margin-top: 25px;">
                            <form>
                                <div class="row form-group">
                                    <div class="col-md-12 registerForm" style="text-align: justify;">
                                    Autorizo a cualquier m??dico, hospital, cl??nica o cualquier otros establecimiento de servicios m??dico o relacionados o compa????a de seguros, que posea datos referentes al diagn??stico, 
                                    tratamiento o prognosis de alguna enfermedad y/o tratamiento f??sico o mental o que posea informaci??n que no sea m??dica sobre mi persona que suministre a SEGUROS SUCRE S.A., 
                                    o a su representaci??n legal, toda la informaci??n que le sea solicitada. Autorizo a SEGUROS SUCRE S.A. a que realice todo tipo de examen m??dico incluido sin limitarse todos aquellos 
                                    que sirvan para diagn??stico de enfermedades de notificaci??n obligatoria de acuerdo a la normativa vigente de salud, Esta autorizaci??n ser?? v??lida por dos a??os y medio a partir de la 
                                    fecha que se indica a continuaci??n.<br>
                                    <br>Declaro bajo juramento que toda la informaci??n contenida en este formulario es de ver??dica y absoluta responsabilidad de quien lo suscribe. Autorizo a SEGUROS SUCRE S.A. a 
                                    verificar la informaci??n de este formulario. Declaro bajo juramento que los fondos para el pago de primas, gastos e impuestos en raz??n o consecuencia de la emisi??n de p??lizas 
                                    contratadas con SEGUROS SUCRE S.A. tienen origen l??cito. Eximo a SEGUROS SUCRE S.A. de toda responsabilidad, inclusive frente a terceros si esta declaraci??n fuese falsa o 
                                    err??nea.                         
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12" style="padding-bottom:15px">
                        <div class="row" style="float:left">
                            <!--<a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}" tabindex="6"> Cancelar </a>-->
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('fifthStep', 'fourthStep')" ><span class="glyphicon glyphicon-step-backward" tabindex="5"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="fifthStepBtnNext()" tabindex="4"> Firmar <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                </div>
                </div>
            </form>
            <!-- Trigger the modal with a button -->
            <button id="confirmModal" type="button" class="btn btn-info btn-lg hidden" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal">Open Modal</button>

            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Su registro a sido completado satisfactoriamente</h4>
                        </div>
                        <div class="modal-body">
                            <center>
                                <p id="modalText" style="font-weight: bold;font-size: 16px"></p><br>
                                <p style="font-weight: bold;font-size: 16px">??Desea ir a la pasarela de cobro?.</p><br>
                            </center>
                        </div>
                        <div class="modal-footer">
                            <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                            <a href="{{asset('/sales')}}" type="button" class="btn btn-default" style="float:left">NO</a>
                            <form action="/payments/create" method="POST">
                                {{ csrf_field() }}
                                <input type="hidden" id="chargeId" name="chargeId" value="">
                                <input type="submit" class="btn btn-info" style="float:right" value="SI">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trigger the modal with a button -->
<button id="priceModalBtn" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#priceModal">Open Modal</button>

<!-- Modal -->
<div id="priceModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Precios de Vehiculos</h4>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <div class="form-group">
                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="priceModalSelect"> Modelos</label>
                <select id="priceModalSelect" name="priceModalSelect" class="form-control registerForm" value="" required onchange="priceModalSelect(this.value)">
                </select>
            </div>
        </div>
      </div>
      <div class="modal-footer">
          <button id="priceModalBtnClose" type="button" class="btn btn-default registerForm" data-dismiss="modal" style="float:left">Cerrar</button>
      </div>
    </div>

  </div>
</div>
@endsection
