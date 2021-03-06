@extends('layouts.app')

@section('content')
<!--<div class="se-pre-con"></div>-->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link href="{{ assets('css/sales/productSelect.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{ assets('css/sales/index.css')}}" rel="stylesheet" type="text/css"/>
<script src="{{ assets('js/massivesVinculation/legalPerson/legalPersonVinculationForm.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://kit.fontawesome.com/fd8222181b.js" crossorigin="anonymous"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<div id="customerStep" class="container-fluid" style="font-size:14px !important;padding-bottom: 15px;">

    <div class="col-md-8 col-md-offset-2 border">
        <div class="row">
            <div class="col-xs-12 registerForm" style="margin:12px;">
                <center>
                    <h4 style="font-weight:bold">Datos del Cliente</h4>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-4 wizard_inicial"><div style="margin-left:-10px" class="wizard_inactivo registerForm"></div></div>
            <div class="col-xs-12 col-md-4 wizard_medio"><div class="wizard_activo registerForm">Cliente</div></div>
            <div class="col-xs-12 col-md-4 wizard_final"><div style="margin-right:-10px;" class="wizard_inactivo registerForm"></div></div>
        </div>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-12" style="margin-top:5px;padding-top:15px;">
                    <div class="row" style="float:left">
                        <a class="btn btn-default registerForm" align="right" href="{{asset('/massivesVinculation')}}"> Cancelar </a>
                    </div>
                    <div class="row" style="float:right">
                        <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="validateVinculationForm()"> Guardar </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                    <div class="wizard_activo registerForm titleDivBorderTop" onclick="fadeToggle('clientDiv')">
                        <a href="#" class="titleLink">Datos de la Compa????a</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="clientDiv" class="col-md-12" style="padding-top: 25px;">
                        <input type="hidden" id="legalRepresentativeId" name="legalRepresentativeId" value="{{$legalRepresentative->id}}">
                        <input type="hidden" id="saleId" name="saleId" value="{{$sales->id}}">
                        <input type="hidden" id="companyId" name="companyId" value="{{$company->id}}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document"> RUC</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input autocomplete="off" type="text" class="form-control registerForm" name="documentCompany" id="documentCompany" placeholder="RUC" required="required"tabindex="1" readonly="readonly" value="{{$company->document}}">                                    
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" style="list-style-type:disc;" for="first_name"> Raz??n Social</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" class="form-control registerForm" name="business_name" id="business_name" placeholder="Raz??n Social" required="required" tabindex="3" disabled="disabled" value="{{$company->business_name}}">
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="city"> Celular</label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><label class="own"><span class="glyphicon glyphicon-info-sign" style="color:#0099ff"><span class="own1" style="float:left">El celular debe tener 10 caracteres</span></span></label>
                                <input type="text" class="form-control registerForm" name="mobile_phone_company" id="mobile_phone_company" placeholder="Celular" required tabindex="5" value="{{$company->mobile_phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="document_id_company" name="document_id_company" class="form-control registerForm" value="{{old('document_id')}}" required tabindex="2" disabled="disabled">
                                    <option value="0">--Escoja Una---</option>
                                    @foreach($documents as $doc)
                                    <option @if($doc->id == $company->document_id) selected="true" @else @endif value="{{$doc->id}}">{{$doc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="last_name"> Nombre Comercial</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" class="form-control registerForm" name="tradename" id="tradename" placeholder="Nombre Comercial" required tabindex="4" disabled="disabled" value="{{$company->tradename}}">
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="correo"> Correo</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="email" class="form-control registerForm" name="emailCompany" id="emailCompany" placeholder="Correo" required tabindex="8" value="{{$company->email}}">
                                <p id="emailError" style="color:red;font-weight: bold"></p>   
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-bottom:15px">
                            <div class="row" style="float:left">
                            </div>
                            <div class="row" style="float:right;margin-right: 0px;">
                                <!--<a class="btn btn-success registerForm" align="right" href="#" style="padding: 5px"> Actualizar </a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                    <div class="wizard_activo registerForm titleDivBorderTop" onclick="fadeToggle('clientDiv')">
                        <a href="#" class="titleLink">Datos del Representante Legal</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="clientDiv" class="col-md-12" style="padding-top: 25px;">
                        <input type="hidden" id="legalRepresentativeId" name="legalRepresentativeId" value="{{$legalRepresentative->id}}">
                        <input type="hidden" id="saleId" name="saleId" value="{{$sales->id}}">
                        <input type="hidden" id="companyId" name="companyId" value="{{$company->id}}">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document"> C??dula</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input autocomplete="off" type="text" class="form-control registerForm" name="document" id="document" placeholder="C??dula" required="required"tabindex="1" readonly="readonly" value="{{$legalRepresentative->document}}">                                    
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" style="list-style-type:disc;" for="first_name"> Nombre(s)</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" class="form-control registerForm" name="first_name" id="first_name" placeholder="Nombre" required="required" tabindex="3" disabled="disabled" value="{{$legalRepresentative->first_name}}">
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="city"> Celular</label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><label class="own"><span class="glyphicon glyphicon-info-sign" style="color:#0099ff"><span class="own1" style="float:left">El celular debe tener 10 caracteres</span></span></label>
                                <input type="text" class="form-control registerForm" name="mobile_phone" id="mobile_phone" placeholder="Nombre" required tabindex="5" value="{{$legalRepresentative->mobile_phone}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="document_id" name="document_id" class="form-control registerForm" value="{{old('document_id')}}" required tabindex="2" disabled="disabled">
                                    <option value="0">--Escoja Una---</option>
                                    @foreach($documents as $doc)
                                    <option @if($doc->id == $legalRepresentative->document_id) selected="true" @else @endif value="{{$doc->id}}">{{$doc->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="last_name"> Apellido(s)</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" class="form-control registerForm" name="last_name" id="last_name" placeholder="Apellido" required tabindex="4" disabled="disabled" value="{{$legalRepresentative->last_name}}">
                            </div>
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="correo"> Correo</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="email" class="form-control registerForm" name="email" id="email" placeholder="Correo" required tabindex="8" value="{{$legalRepresentative->email}}">
                                <p id="emailError" style="color:red;font-weight: bold"></p>   
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-bottom:15px">
                            <div class="row" style="float:left">
                            </div>
                            <div class="row" style="float:right;margin-right: 0px;">
                                <!--<a class="btn btn-success registerForm" align="right" href="#" style="padding: 5px"> Actualizar </a>-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px;margin-top:25px;">
                    <div class="wizard_activo registerForm titleDivBorderTop" onclick="fadeToggle('vinculationsFormsDiv')">
                        <a href="#" class="titleLink">Formulario de Vinculaci??n</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="vinculationsFormsDiv" class="col-md-12" style="padding-top: 25px;">
                        <table class="table table-striped table-bordered" style="text-align: center;">
                            <thead class="tableCustomHeader">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th>Ver Formulario</th>
                                    <th>Reenviar</th>
                                    <th>Validaci??n</th>
                                </tr>
                            </thead>
                            <tbody id="vinculationTableBodyResume">
                                <tr>
                                    <td style="text-transform: uppercase;">{{$legalRepresentative->first_name}} {{$legalRepresentative->second_name}} {{$legalRepresentative->last_name}} {{$legalRepresentative->second_last_name}}</td>
                                    <td>Cliente</td>
                                    <td>Pendiente</td>
                                    @if($vinculation->status_id== 1)
                                        <td><a href="{{asset('')}}legalPersonVinculation/create?document={{\Crypt::encrypt($legalRepresentative->document)}}&sales={{\Crypt::encrypt($sales->id)}}&companys={{\Crypt::encrypt($company->document)}}&broker=1" target="_blank" align="right"> Ver Formulario </a></td>
                                    @else
                                        <td></td>
                                    @endif
                                    <td><a onclick="sendVinculationFormLink('{{$sales->id}}')"  href="#"> Enviar Link </a></td>
                                    <td><input name="formValidate" id="formValidate" type="checkbox" data-toggle="toggle" data-on="Validado" data-off="No Validado"data-onstyle="success"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12" style="padding-bottom:15px">
                    <div class="row" style="float:left">
                        <a class="btn btn-default registerForm" align="right" href="{{asset('/massivesVinculation')}}"> Cancelar </a>
                    </div>
                    <div class="row" style="float:right">
                        <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="validateVinculationForm()"> Guardar </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->
@endsection