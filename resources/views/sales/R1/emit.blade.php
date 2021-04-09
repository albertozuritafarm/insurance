<script src="{{ assets('js/sales/R1/emit.js') }}"></script>

@if($newVehicle == 'false')
<script>
$(document).ready(function () {
var div = document.getElementById('endosoFullDiv');
$(div).fadeOut();
var div = document.getElementById('adjuntosFullDiv');
$(div).fadeOut();
});
</script>
@else
<script>
$(document).ready(function () {
var div = document.getElementById('endosoDiv');
$(div).fadeOut();
});
</script>
@endif
<div class="col-md-8 col-md-offset-2 border">
    <div class="row">
        <div class="col-xs-12 registerForm" style="margin:12px;">
            <center>
                <h4 style="font-weight:bold">Emitir la Venta</h4>
            </center>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-3 wizard_inicial"><div style="margin-left:-10px" class="wizard_inactivo registerForm"></div></div>
        <div class="col-xs-12 col-md-3 wizard_medio"><div id="firstStepWizard" class="wizard_inactivo registerForm">Resumen</div></div>
        <div class="col-xs-12 col-md-3 wizard_medio"><div id="secondStepWizard" class="wizard_activo registerForm">Emisión</div></div>
        <div class="col-xs-12 col-md-3 wizard_final"><div style="margin-right:-10px" class="wizard_inactivo registerForm"></div></div>
    </div>
    <div id="secondStep" class="col-md-12">
        <input type='hidden' id='newVehicle' name='newVehicle' value="{{$newVehicle}}">
        <input type='hidden' id='insuredValue' name='insuredValue' value="{{$insuredValue}}">
        <div class="col-md-12">
            <div class="col-md-12" style="margin-top:5px;padding-top:15px;">
                <div class="row" style="float:left">
                    <a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}"> Cancelar </a>
                </div>
                <div class="row" style="float:right">
                    <a onclick="previous('{{$saleId}}','{{$document}}')" class="btn btn-back registerForm" align="right" href="#"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                    <a class="btn btn-info registerForm" align="right"  href="#" onclick="validateSecondStep()"> Pagar y Emitir </a>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                <div class="wizard_activo registerForm titleDivBorderTop" onclick="fadeToggle('secondStepDiv')">
                    <a href="#" class="titleLink">Datos de la Poliza</a>
                    <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                </div>
                <div id="secondStepDiv" class="col-md-12" style="padding-top: 25px;padding-bottom: 25px;">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beginDate"> Fecha Inicio Vigencia</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="date" class="form-control" name="beginDate" id="beginDate" placeholder="Correo" @if($newVehicle == 'false') value='{{$beginDate}}' @else value='' @endif style="line-height:14px" onchange="removeInputRedFocus('beginDate'), changeEndDate(this.value)" {{$disabled}}>
                            </div>
                            <div class="form-group col-md-6">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="endDate"> Fecha Fin Vigencia</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="date" class="form-control" name="endDate" id="endDate" placeholder="Correo" @if($newVehicle == 'false') value='{{$endDate}}' @else value='' @endif style="line-height:14px" onchange="removeInputRedFocus('endDate')" disabled="disabled">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="endosoFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                <div class="wizard_activo registerForm titleDivBorderTop" onclick="fadeToggle('secondStepDiv')">
                    <a href="#" class="titleLink">Datos de la Poliza</a>
                    <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                </div>
                <div id="secondStepDiv" class="col-md-12" style="padding-top: 25px;padding-bottom: 25px;">
                    <form>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="endosoSelect"> ¿Posee Endoso Beneficiario?</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select class="form-control" name="endosoSelect" id="endosoSelect" onchange="endosoSelectChange(this.value)">
                                        <option value="" disabled="disabled" selected="true">-- Escoja Una --</option>
                                        <option value="1">Si</option>
                                        <option value="0">NO</option>
                                    </select>
                                </div>
                            </div>
                            <div id="endosoDiv">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document"> RUC</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <!--<input type="text" class="form-control registerForm" name="document" id="document" placeholder="Cédula" value="{{ old('document') }}" required="required">-->
                                        <div class="form-inline">
                                            <input autocomplete="off" type="text" class="form-control registerForm" name="document" id="document" value="{{$customer->document}}" @if($disabled) disabled="disabled" @else @endif placeholder="Cédula" required="required"tabindex="1" style="width:89%" onclick="clearFormEndoso()" onchange="clearFormEndoso()">
                                            <button type="button" class="btn btn-info" onclick="documentBtn()" @if($disabled) disabled="disabled" @else @endif style="width:10%"><span class="glyphicon glyphicon-search"></span></button>
                                            <div id="suggesstion-box"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="businessName"> Razón Social</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control" name="businessName" id="businessName" value="" style="line-height:14px" onchange="" placeholder="Razón Social" readonly="readonly">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label class="registerForm" for="tradename"> Nombre Comercial</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control" name="tradename" id="tradename" value="" style="line-height:14px" onchange="" placeholder="Nombre Comercial">
                                    </div>
                                    <div class="col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="endorsementAmount"> Monto Endoso Beneficiario</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control" name="endorsementAmount" id="endorsementAmount"value="" style="line-height:14px" placeholder="Monto Endoso Beneficiario" maxlength="15" onchange="currencyFormat(this.id)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="adjuntosFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;; margin-top:10px;">
                <div class="wizard_activo registerForm titleDivBorderTop" onclick="fadeToggle('adjuntosDiv')">
                    <a href="#" class="titleLink">Documentos Adjuntos</a>
                    <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                </div>
                <div id="adjuntosDiv" class="col-md-12" style="padding-top: 25px;padding-bottom: 25px;">
                    
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <form method="post" id="upload_formFactura" name="upload_formFactura" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formFactura','Factura')">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="saleId" name="saleId" value="{{$saleId}}">
                                    <input type="hidden" id="insuranceBranch" name="insuranceBranch" value="1">
                                    <input type="hidden" id="type" name="type" value="Factura">
                                    <center>
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="bank_value"> Factura del Vehículo</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <div class="alert" id="messageFactura" style="display: none"></div>
                                        <div style="width:100px !important;padding: 0" class="inside" id="fileNameFactura"></div>
                                        <div class="inputWrapper"><span id="uploaded_imageFactura"></span>
                                            <center>
                                                <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                            </center>
                                            <input class="fileInput" type="file" name="select_fileFactura" onchange="fileNameFunction('Factura')" id="select_fileFactura">
                                        </div>
                                    </center>
                                    <center>
                                        <button type="submit" name="uploadFactura" id="uploadFactura" class="btn btn-primary"onclick="uploadPictureForm('upload_formFactura','Factura')">
                                            <span class="glyphicon glyphicon-upload"></span> Subir Foto
                                        </button>
                                        <a class="hidden" id="deletePictureFactura" href="#" onclick="deletePictureForm('Factura')">
                                            <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                        </a>  
                                    </center>
                                </form>
                            </div>
                            <div class="form-group col-md-6">
                                <form method="post" id="upload_formCarta" name="upload_formCarta" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formCarta','Carta')">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="saleId" name="saleId" value="{{$saleId}}">
                                    <input type="hidden" id="insuranceBranch" name="insuranceBranch" value="1">
                                    <input type="hidden" id="type" name="type" value="Carta">
                                    <center>
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="bank_value"> Carta del Concesionario</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <div class="alert" id="messageCarta" style="display: none"></div>
                                        <div style="width:100px !important;padding: 0" class="inside" id="fileNameCarta"></div>
                                        <div class="inputWrapper"><span id="uploaded_imageCarta"></span>
                                            <center>
                                                <img src="{{asset('images/mas.png')}}" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                            </center>
                                            <input class="fileInput" type="file" name="select_fileCarta" onchange="fileNameFunction('Carta')" id="select_fileCarta">
                                        </div>
                                    </center>
                                    <center>
                                        <button type="submit" name="uploadCarta" id="uploadCarta" class="btn btn-primary"onclick="uploadPictureForm('upload_formCarta','Carta')">
                                            <span class="glyphicon glyphicon-upload"></span> Subir Foto
                                        </button>
                                        <a class="hidden" id="deletePictureCarta" href="#" onclick="deletePictureForm('Carta')">
                                            <img src="{{asset('/images/menos.png')}}" style="width:20px;height:20px">
                                        </a>  
                                    </center>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-md-12" style="padding-bottom:15px">
                <div class="row" style="float:left">
                    <a class="btn btn-default registerForm" align="right" href="{{asset('/sales')}}"> Cancelar </a>
                </div>
                <div class="row" style="float:right">
                    <a onclick="previous('{{$saleId}}','{{$document}}')" class="btn btn-back registerForm" href="#"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                    <a class="btn btn-info registerForm" href="#" onclick="validateSecondStep()"> Pagar y Emitir </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hidden">
    <form action="{{asset('/sales/payments/create')}}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" id="chargeId" name="chargeId" value="">
        <input id="formBtn" type="submit" class="btn btn-info" style="float:right" value="SI">
    </form>
</div>
<!-- Trigger the modal with a button -->
<button id="vehiModalEditBtn" type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#vehiModalEditModal">Open Modal</button>

<!-- Modal -->
<div id="vehiModalEditModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div id="vehiModalEditModalBody">
      </div>
    </div>

  </div>
</div>