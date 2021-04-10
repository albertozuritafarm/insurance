@extends('layouts.app')

@section('content')
<!--<div class="se-pre-con"></div>-->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="{{ assets('js/registerCustom.js') }}"></script>
<script src="{{ assets('js/massivesVinculation/index.js') }}"></script>
<link href="{{ assets('css/sales/index.css')}}" rel="stylesheet" type="text/css"/>
<div class="container" style="width: 100%">
    <div>
        <div class="col-md-12 border" id="filter" style="margin-top:10px;margin-left:0;margin-right:15px;display:none">
            <form  class="col-md-12 border" method="POST" action="{{asset('/massivesVinculation')}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="first_name">Cliente</label>
                            <input type="text" class="form-control" name="customer" id="customer" placeholder="Cliente" value="{{ session('massivesVinculationCustomer') }}">
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="list-style-type:disc;" for="first_name">Identificación</label>
                            <input type="text" class="form-control" name="document" id="document" placeholder="Identificación" value="{{ session('massivesVinculationDocument')  }}">
                        </div>

                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="list-style-type:disc;" for="status">Estado</label>
                            <select name="status" id="status" class="form-control" value="">
                                <option selected="true" value="">Todos</option>
                                @foreach($status as $sta)
                                @if($sta->id == session('massivesVinculationStatus'))
                                <option selected="true" value="{{$sta->id}}">{{$sta->name}}</option>
                                @else
                                <option value="{{$sta->id}}">{{$sta->name}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="list-style-type:disc;" for="first_name">Fecha Creación Desde</label>
                            <input type="date" class="form-control" name="dateFrom" id="dateFrom" data-date-format="DD-MM-YYYY" placeholder="Fecha creación desde" value="{{ session('massivesVinculationDateFrom')  }}" style="line-height:14px">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="list-style-type:disc;" for="first_name">Fecha Creación Hasta</label>
                            <input type="date" class="form-control" name="dateUntil" id="dateUntil" data-date-format="DD-MM-YYYY" placeholder="Fecha creación hasta" value="{{ session('massivesVinculationDateUntil')  }}" style="line-height:14px">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="channel">Canal</label>
                            <select name="channel" id="channel" class="form-control" value="">
                                <option selected="true" value="">Todos</option>
                                @foreach($channel as $c)
                                @if($c->id == session('massivesVinculationChannel'))
                                <option selected="true" value="{{$c->id}}">{{$c->canalnegodes}}</option>
                                @else
                                <option value="{{$c->id}}">{{$c->canalnegodes}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="list-style-type:disc;" for="nameBusiness">Nombre Empresa</label>
                            <select name="nameBusiness" id="nameBusiness" class="form-control" value="">
                                <option selected="true" value="">Todos</option>
                                @foreach($agent as $c)
                                @if($c->id == session('massivesVinculationNameBusiness'))
                                <option selected="true" value="{{$c->id}}">{{$c->agentedes}}</option>
                                @else
                                <option value="{{$c->id}}">{{$c->agentedes}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="list-style-type:disc;" for="first_name">Fecha Última act. Desde</label>
                            <input type="date" class="form-control" name="updateDateFrom" id="updateDateFrom" data-date-format="DD-MM-YYYY" placeholder="Fecha última actualización desde" value="{{ session('massivesVinculationUpdateDateFrom')  }}" style="line-height:14px">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label style="list-style-type:disc;" for="first_name">Fecha Última act. Hasta</label>
                            <input type="date" class="form-control" name="updateDateUntil" id="updateDateUntil" data-date-format="DD-MM-YYYY" placeholder="Fecha última actualización hasta" value="{{ session('massivesVinculationUpdateDateUntil')  }}" style="line-height:14px">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="items" id="items" value="{{$items}}">
                <input type="button" id="btnCancel" class="btn btn-default" value="Cancelar">
                <input type="button" id="btnClearSales" class="btn btn-default" value="Limpiar">
                <input id="btnFilterForm" type="submit" class="btn btn-primary" value="Aplicar">
            </form>
        </div>
        <div class="col-md-12" style="margin-left: -15px">
            <h4>Listado de Vinculaciones </h4>
            @if (session('Success'))
            <div class="alert alert-success">
                <img src="{{ asset('images/iconos/ok.png')}}" alt="Girl in a jacket" style="width:40px;height:40px;">{{ session('Success') }}
            </div>
            @endif
            @if (Session::has('SendEmailMessage'))
            <div class="alert alert-success" style="margin-right:-20px">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <center>
                    <span class="glyphicon glyphicon-ok" id="annulmentMsgSuccess"  style="font-weight: bold;"></span>{{ session('SendEmailMessage') }}
                </center>
            </div>
            @endif
            @if (Session::has('informativeList'))
            <div class="alert alert alert-danger" style="margin-right:-20px">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <center>
                    <span class="glyphicon" id="annulmentMsgSuccess"  style="font-weight: bold;"></span>{{ session('informativeList') }}
                </center>
            </div>
            @endif
            <button class="border btnTable" type="button" id="filterButton"><img id="filterImg" src="{{asset('/images/filter.png')}}" width="24" height="24" alt=""></button> 
            <a type="button" class="border btnTable @if(!$create) hidden @endif" data-toggle="modal" data-target="#myModal"  title="Registrar Venta"><img src="{{assets('/images/mas.png')}}" width="24" height="24" alt=""></a>
            <a type="button" id="reloadTableBtn" class="border btnTable" href="#" data-toggle="tooltip" title="Actualizar Tabla"><img src="{{assets('/images/refresh.png')}}" width="24" height="24" alt=""></a>
            @include('pagination.items')
        </div>
        <div id="tableData">
            @include('pagination.massivesVinculation')
        </div>
    </div>
</div>
<!-- MODAL SALES RESUME -->
<button id="modalBtnClickResume" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#saleModal">Open Modal</button>
<div id="saleModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Resumen de la Vinculación</h4>
            </div>
            <div id="modalBodySaleResume" class="modal-body">

            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>-->
            </div>
        </div>

    </div>
</div>
<!-- MODAL ACTIVATE SALES-->
<button id="modalBtnClickActivate" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#saleActivateModal">Open Modal</button>
<div id="saleActivateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Validar el codigo SMS</h4>
            </div>
            <div id="modalBodySaleActivate" class="modal-body">
                <form id="validateCodeForm">
                    {{ csrf_field() }}
                    <div id="resultMessage">
                    </div>
                    <span class="col-md-12 border">
                        <div id="validationCode">
                        </div>
                        <div class="form-group">
                            <label for="code">Ingrese el codigo</label>
                            <input type="text" class="form-control" name="code" id="code" placeholder="Ingrese el codigo"><br>
                            <button id="resendCodeBtn" type="submit" class="btn btn-success" style="float:right;margin-bottom: 10px" onclick="resendCode()">Reenviar Codigo</button>
                        </div>
                    </span>
                    <div>
                        <button type="button" class="btn btn-default" data-dismiss="modal" style="float:left;margin-top: 10px">Cerrar</button>
                        <button id="validateCodeBtn" type="submit" class="btn btn-info" onclick="validateCode()" style="float:right;margin-top: 10px;">Validar</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="border-top: 0 none !important;">
            </div>
        </div>
    </div>
</div>
<!-- MODAL FORMULARIO VINCULACIÓN-->
<button id="modalBtnClickValidatePayer" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#saleValidatePayer">Open Modal</button>
<div id="saleValidatePayer" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4>Validar Pagador</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer" style="border-top: 0 none !important;">
            </div>
        </div>
    </div>
</div>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#myModal">Open Modal</button>
<!-- Modal Actividades Economicas -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">SELECCIÓN DE CLIENTE</h4>
            </div>
            <div class="modal-body">
                <form id="modalForm">
                    <div class="row">
                        <div class="col-md-3">
                           <a type="button" title="Persona Natural" href="{{asset('massivesVinculation/create')}}"><i class='glyphicon glyphicon-user' style="margin-left:50%;font-size:48px;color:#183c6b"></i> <p style="margin-left:40%;text-size:14px">PERSONA NATURAL</p></a>
                        </div>
                        <div class="col-md-3">
                           <a type="button" title="Persona Natural" href="{{asset('vinculation/pj/beneficiaryPerson/create')}}"><i class='glyphicon glyphicon-user' style="margin-left:50%;font-size:48px;color:#183c6b"></i> <p style="margin-left:40%;text-size:14px">BENEFICIARIO</p></a>
                        </div>
                        <div class="col-md-3">
                           <a type="button" title="Persona Natural" href="{{asset('vinculation/pj/tercerosPerson/create')}}"><i class='glyphicon glyphicon-user' style="margin-left:50%;font-size:48px;color:#183c6b"></i> <p style="margin-left:40%;text-size:14px">TERCEROS</p></a>
                        </div>
                        <div class="col-md-3">
                           <a type="button" title="Persona Jurídica" href="{{asset('massivesVinculation/legalPerson/create')}}"><i class='glyphicon glyphicon-home' style="margin-left:20%;font-size:48px;color:#183c6b"></i> <p style="margin-left:10%;text-size:14px">PERSONA JURÍDICA</p></a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="closeModal" type="button" class="btn btn-default registerForm" data-dismiss="modal" style="float:left">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<div class="hidden">
    <form action="{{asset('/sales/payments/create')}}" method="POST" target="_blank">
        {{ csrf_field() }}
        <input type="hidden" id="chargeId" name="chargeId" value="">
        <input id="formBtn" type="submit" class="btn btn-info" style="float:right" value="SI">
    </form>
</div>
<script>
    document.getElementById('pagination').onchange = function () {
        document.getElementById('items').value = this.value;
        document.getElementById('btnFilterForm').click();
    };
</script>
@endsection
