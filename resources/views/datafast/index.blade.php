@extends('layouts.app')

@section('content')
<!--<div class="se-pre-con"></div>-->
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="{{ assets('js/datafast/index.js') }}"></script>
<link href="{{assets('css/DateTimePicker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="screen">
<script type="text/javascript" src="{{assets('js/DateTimePicker/bootstrap-datetimepicker.js')}}" charset="UTF-8"></script>
<script type="text/javascript" src="{{assets('js/DateTimePicker/locales/bootstrap-datetimepicker.es.js')}}" charset="UTF-8"></script>
<link href="{{ assets('FullCalendar/packages/core/main.css')}}" rel='stylesheet' />
<link href="{{ assets('FullCalendar/packages/daygrid/main.css')}}" rel='stylesheet' />
<link href="{{ assets('FullCalendar/packages/timegrid/main.css')}}" rel='stylesheet' />
<link href="{{ assets('FullCalendar/packages/list/main.css')}}" rel='stylesheet' />
<!--<link href="{{ asset('css/payments/index.css')}}" rel="stylesheet" type="text/css"/>-->
<div class="container" style="width: 100%">
    <div>
        <div class="col-md-12 border" id="filter" style="margin-top:10px;margin-left:0;margin-right:15px; display: none;">
            <form method="POST" action="{{asset('/datafast')}}">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="document">#Transacción(id_cart)</label>
                            <input type="text" class="form-control" name="id_cart" id="id_cart" placeholder="#Transacción(id_cart)" value="{{ session('datafastIdCart') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="first_name">Referencia Orden</label>
                            <input type="text" class="form-control" name="order" id="order" placeholder="Referencia Orden" value="{{ session('datafastOrder') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="last_name"># Lote</label>
                            <input type="text" class="form-control" name="lot" id="lot" placeholder="# Lote" value="{{ session('datafastLot') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="last_name"># Referencia</label>
                            <input type="text" class="form-control" name="reference" id="reference" placeholder="# Referencia" value="{{ session('datafastReference') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="list-style-type:disc;" for="beginDate">Fecha Inicio</label>
                            <input type="date" class="form-control" name="beginDate" id="beginDate" placeholder="fecha" style="line-height:14px" value="{{session('datafastBeginDate')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="list-style-type:disc;" for="endDate">Fecha Fin</label>
                            <input type="date" class="form-control" name="endDate" id="endDate" placeholder="fecha" style="line-height:14px" onchange="endDateChange()" value="{{session('datafastEndDate')}}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="list-style-type:disc;" for="auth_code">Auth Code</label>
                            <input type="text" class="form-control" name="auth_code" id="auth_code" placeholder="Auth Code" style="line-height:14px" value="{{session('datafastAuthCode')}}">
                        </div>
                    </div>
                </div>
                <input type="hidden" id="items" name="items" value="{{$items}}">
                <input type="button" id="btnCancel" class="btn btn-default" value="Cancelar">
                <input type="button" id="btnClearBenefits" class="btn btn-default" value="Limpiar">
                <input id="btnFilterForm" type="submit" class="btn btn-primary" value="Aplicar" onclick="return val()">
            </form>
        </div>
        <div class="col-md-12" style="margin-left: -15px">
            <h4>Log de Datafast</h4>
            <button class="border btnTable" type="button" id="filterButton"><img id="filterImg" src="{{asset('/images/filter.png')}}" width="24" height="24" alt=""></button> 
            @include('pagination.items')
        </div>
        <div id="tableData">
            @include('pagination.datafast')
        </div>
    </div>
</div>
<form method="post" action="{{asset('/customer/edit')}}">
    {{ csrf_field() }}
    <input type="hidden" name="customerId" id="customerId" value="">
    <button type="submit" class="hidden" id="customerBtn"></button> 
</form>
<!-- MODAL -->
<!-- MODAL RESUMEN-->
<!-- Trigger the modal with a button -->
<button id="modalAgencyResume" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Resumen de Clientes y Ventas</h4>
            </div>
            <div id="modalResumeBody" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>

    </div>
</div>
<script>
    document.getElementById('pagination').onchange = function () {
        document.getElementById('items').value = this.value;
        document.getElementById('btnFilterForm').click();
    };
</script>
@endsection
