

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(assets('js/registerCustom.js')); ?>"></script>
<script src="<?php echo e(assets('js/sales/R4/create.js')); ?>"></script>
<link href="<?php echo e(assets('css/sales/create.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
    /* .form-group{
        margin-top:25px !important;
        margin-bottom: 25px !important;
    } */
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
/*    #vehiclesTable {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }*/
</style>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<div class="container-fluid" style="font-size:14px !important;padding-bottom: 15px;">
    <!--<div class="row justify-content-center border" style="margin-left:20%;">-->

    <div class="col-md-10 col-md-offset-1 border">
        <div class="row">
            <div class="col-xs-12 registerForm" style="margin:12px;">
                <center>
                    <h4 style="font-weight:bold">Registro de Nueva Venta</h4>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-2 wizard_inicial"><div style="margin-left:-10px" id="zeroStepWizard" class="wizard_inactivo registerForm">Ramo</div></div>
            <div class="col-xs-12 col-md-2 wizard_medio"><div id="firstStepWizard" class="wizard_activo registerForm">Cliente</div></div>
            <div class="col-xs-12 col-md-3 wizard_medio"><div id="secondStepWizard" class="wizard_inactivo registerForm">Propiedades</div></div>
            <div class="col-xs-12 col-md-3 wizard_medio"><div id="thirdStepWizard" class="wizard_inactivo registerForm">Producto</div></div>
            <div class="col-xs-12 col-md-2 wizard_final"><div style="margin-right:-10px;" id="fourthStepWizard" class="wizard_inactivo registerForm">Resumen</div></div>
        </div>
        <div class="col-md-12">
            <form name="salesForm" method="POST" action="/user" id="salesForm">
                <input type="hidden" name="sale_movement" id="sale_movement" value="<?php echo e($sale_movement); ?>">
                <input type="hidden" name="sale_id" id="sale_id" value="<?php echo e($sale_id); ?>">

                <div id="firstStep" class="col-md-12">
                    <div class="col-md-12" style="margin-top:5px;margin-bottom: 5px;padding-top:15px;">
                        <div class="row" style="float:left">
                            <a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>"> Cancelar </a>
                        </div>
                        <div class="row" style="float:right">
                            <a id="secondStepBtnBackTop" class="btn btn-back registerForm" align="right" <?php if($disabled == null): ?> href="<?php echo e(asset('/sales/product/select')); ?>" <?php else: ?> href="#" disabled="disabled" <?php endif; ?> ><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                            <a id="secondStepBtnNextTop" class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="firstStepBtnNext()"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                        <div class="wizard_activo registerForm titleDivBorderTop" onclick="fadeToggle('resumeDiv')">
                            <span class="titleLink">Datos del Cliente</span>
                            <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                        <div id="customerAlert" class="alert alert-danger registerForm titleDivBorderTop hidden" style="margin-top:5px;border-radius:0px !important;">
                            <center><strong>??Alerta!</strong> Revise los campos </center>
                        </div>
                        <?php echo e(csrf_field()); ?>

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
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document"> C??dula</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <!--<input type="text" class="form-control registerForm" name="document" id="document" placeholder="C??dula" value="<?php echo e(old('document')); ?>" required="required">-->
                                        <div class="form-inline">
                                            <input autocomplete="off" type="text" class="form-control registerForm" name="document" id="document" value="<?php echo e($customer->document); ?>" <?php if($disabled): ?> disabled="disabled" <?php else: ?> <?php endif; ?> placeholder="C??dula" required="required" tabindex="1" style="width:89%">
                                            <button type="button" class="btn btn-info" onclick="documentBtn()" <?php if($disabled): ?> disabled="disabled" <?php else: ?> <?php endif; ?> style="width:10%"><span class="glyphicon glyphicon-search"></span></button>
                                            <div id="suggesstion-box"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="document_id" name="document_id" class="form-control registerForm" value="<?php echo e(old('document_id')); ?>" required tabindex="2" disabled="disabled">
                                            <option selected="true" value="0">--Escoja Una---</option>
                                            <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($document->id == $customer->document_id): ?> selected="true" <?php else: ?> <?php endif; ?> value="<?php echo e($document->id); ?>"><?php echo e($document->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" style="list-style-type:disc;" for="first_name"> Primer Nombre</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="first_name" id="first_name" placeholder="Primer Nombre" value="<?php echo e($customer->first_name); ?>" required="required" tabindex="3" disabled="disabled" maxlength="30">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" style="list-style-type:disc;" for="second_name"> Segundo Nombre</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="second_name" id="second_name" placeholder="Segundo Nombre" value="<?php echo e($customer->second_name); ?>" required="required" tabindex="4" disabled="disabled" maxlength="30">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="last_name"> Primer Apellido</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="last_name" id="last_name" placeholder="Primer Apellido" value="<?php echo e($customer->last_name); ?>" required tabindex="5" disabled="disabled" maxlength="30">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="second_last_name"> Segundo Apellido</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="second_last_name" id="second_last_name" placeholder="Segundo Apellido" value="<?php echo e($customer->second_last_name); ?>" required tabindex="6" disabled="disabled" maxlength="30">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="birthdate"> Fecha de Nacimiento </label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="date" class="form-control registerForm" name="birthdate" id="birthdate" data-date-format="dd/mm/yyyy" placeholder="Fecha de Nacimiento" value="<?php echo e($customer->birthdate); ?>" required tabindex="7" style="line-height: 14px;">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="city"> Celular</label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><label class="own"><span class="glyphicon glyphicon-info-sign" style="color:#0099ff"><span class="own1" style="float:left">El celular debe tener 10 caracteres</span></span></label>
                                        <input type="text" class="form-control registerForm" name="mobile_phone" id="mobile_phone" placeholder="Celular" value="<?php echo e($customer->mobile_phone); ?>" required tabindex="8" maxlength="10">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document"> Tel??fono </label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><label class="own"><span class="glyphicon glyphicon-info-sign" style="color:#0099ff"><span class="own1" style="float:left">El telefono debe tener 9 caracteres</span></span></label>
                                        <input type="text" class="form-control registerForm" name="phone" id="phone" placeholder="Tel??fono" value="<?php echo e($customer->phone); ?>" required tabindex="9">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="city"> Direcci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="string" class="form-control registerForm" name="address" id="address" placeholder="Direcci??n" required tabindex="10" value="<?php echo e($customer->address); ?>" maxlength="200">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="correo"> Correo</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="email" class="form-control registerForm" name="email" id="email" placeholder="Correo" value="<?php echo e($customer->email); ?>" required tabindex="11" maxlength="100">
                                        <p id="emailError" style="color:red;font-weight: bold; display: none;"></p>    
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                        <?php if($errors->any()): ?>
                                        <span style="color:red;font-weight:bold"><?php echo e($errors->first()); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="country"> Pa??s</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select name="country" id="country" class="form-control registerForm" required tabindex="12">
                                            <option selected="true" value="0">--Escoja Una---</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($country->id == $cusCountry->id): ?> selected="true" <?php else: ?> <?php endif; ?> value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="province"> Provincia</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select name="province" class="form-control registerForm" id="province" required tabindex="13">
                                            <?php if($cusProvinceList): ?>
                                            <option id="provinceSelect" selected="true" value="<?php echo e($cusProvince->id); ?>"><?php echo e($cusProvince->name); ?></option>
                                            <?php else: ?>
                                            <option id="provinceSelect" selected="true" disabled="disabled" value="0">--Escoja Una---</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="city"> Cant??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select name="city" class="form-control registerForm" id="city" required tabindex="14">
                                            <?php if($cusCityList): ?>
                                            <option id="citySelect" selected="true" value="<?php echo e($cusCity->id); ?>"><?php echo e($cusCity->name); ?></option>
                                            <?php else: ?>
                                            <option id="citySelect" selected="true" disabled="disabled" value="0">--Escoja Uno---</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </form>        
                        </div>    
                    </div>
                    <div class="col-md-12" style="padding-bottom:15px">
                        <div class="row" style="float:left">
                            <a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" tabindex="17"> Cancelar </a>
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" <?php if($disabled == null): ?> href="<?php echo e(asset('/sales/product/select')); ?>" <?php else: ?> href="#" disabled="disabled" <?php endif; ?>  tabindex="16"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="firstStepBtnNext()" tabindex="15"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                </div>
                <div id="secondStep" class="col-md-12 hidden">
                    <div class="col-md-12" style="margin-top:5px;padding-top:15px;">
                        <div class="row" style="float:left">
                            <a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" tabindex="20"> Cancelar </a>
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('secondStep', 'firstStep')" tabindex="19"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="secondStepBtnNext()" tabindex="18"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                    <!-- Direcci??n del bien-->
                    <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                        <div class="wizard_activo registerForm titleDivBorderTop">
                            <span class="titleLink">Direcci??n del bien</span>
                            <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                        <div id="customerAlert1" class="alert alert-danger registerForm titleDivBorderTop hidden" style="margin-top:5px;border-radius:0px !important;">
                            <center><strong>??Alerta!</strong> Revise los campos </center>
                        </div>
                        <form action="" style="margin-top: 25px;">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="principal_street"> Calle  Principal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" class="form-control registerForm" name="principal_street" id="principal_street" placeholder="Calle principal" required tabindex="21" value="" maxlength="90">
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="secondary_street"> Calle Secundaria</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" class="form-control registerForm" name="secondary_street" id="secondary_street" placeholder="Calle secundaria" required tabindex="22" value="" maxlength="50">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="number"> N??mero</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" class="form-control registerForm" name="number" id="number" placeholder="N??mero" required tabindex="23" value="" maxlength="30">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="registerForm" for="aparment"> Departamento/Oficina</label>
                                    <input type="text" class="form-control registerForm" name="aparment" id="aparment" placeholder="N??mero de departamenteo/oficina" required tabindex="24" value="" maxlength="30">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="province"> Provincia</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select name="provinces" id="provinces" class="form-control registerForm" required tabindex="25">
                                        <option selected="true" value="0">--Escoja Una---</option>
                                        <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option  value="<?php echo e($pro->id); ?>"><?php echo e($pro->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="city"> Canton</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select name="cities" id="cities" class="form-control registerForm" required tabindex="26">
                                        <option selected="true" value="0">--Escoja Uno---</option>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ci): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option  value="<?php echo e($ci->province_id); ?>"><?php echo e($ci->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Valores de rubros-->
                    <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-top:15px;">
                        <div class="wizard_activo registerForm titleDivBorderTop">
                            <span class="titleLink">Valores Asegurados</span>
                            <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                        <div id="Alert" class="alert alert-danger hidden registerForm titleDivBorderTop" style="margin-top:5px;border-radius:0px !important;">
                            <center><strong>??Alerta!</strong> No tiene valores asegurados.</center>
                        </div>
                        <form action="" style="margin-top: 25px;">    
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="entry"> Rubro</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select name="rubros" id="rubros" class="form-control registerForm" required tabindex="27">
                                            <option selected="true" value="0">--Escoja Una---</option>
                                            <?php $__currentLoopData = $rubros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rubro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($rubro->description); ?>"><?php echo e($rubro->description); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                        <?php $__currentLoopData = $rubros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rubro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="hidden" name="<?php echo e($rubro->cod); ?>" id="max_<?php echo e($rubro->description); ?>" value="<?php echo e($rubro->max_value); ?>">
                                        <input type="hidden" name="<?php echo e($rubro->cod); ?>" id="min_<?php echo e($rubro->description); ?>" value="<?php echo e($rubro->min_value); ?>">
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="entryValue"> Valor Asegurado</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text2" class="form-control registerForm" name="ValueRubro" id="ValueRubro" tabindex="28" placeholder="Valor Asegurado" value="" required min="1" max="999999999999999" onchange="currencyFormat(this.id)">
                                </div>
                            </div>
                            <div class="col-md-6 col-md-offset-6">
                                <div class="form-group">
                                    <a  id="btnRubros" <?php if($disabled != null): ?> disabled="disabled" <?php else: ?> <?php endif; ?> class="btn btn-success registerForm" align="right" href="#" style="float:right;margin-right: 0px;padding: 5px;width:100px" tabindex="29"><span class="glyphicon glyphicon-plus"></span>Agregar </a>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 15px;">
                                <table id="rubrosTable" class="table table-striped table-bordered" style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th style="background-color:#b3b0b0; width: 70%;">Rubro</th>
                                            <th style="background-color:#b3b0b0; width: 15%;">Valor Asegurado</th>
                                            <th style="background-color:#b3b0b0; width: 15%; margin-right: -15px;">Acci??n</th>
                                        </tr>
                                    </thead>
                                    <tbody id="rubrosBodyTable" style="word-break: break-all">
                                        <?php echo $rubrosBodyTable; ?>

                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12" style="padding-bottom:15px">
                        <div class="row" style="float:left">
                            <a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" tabindex="32"> Cancelar </a>
                        </div>
                        <div class="row" style="float:right">
                            <a  class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('secondStep', 'firstStep')" tabindex="31"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px" onclick="secondStepBtnNext()" tabindex="30"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                        </div>
                    </div>
                </div>
                <div id="thirdStep" class="col-md-12 hidden">
                    <div class="col-md-12" style="margin-top:5px;padding-top:15px;">
                        <div class="row" style="float:left">
                            <a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" tabindex="34"> Cancelar </a>
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right"  href="#" onclick="nextStep('thirdStep', 'secondStep')" tabindex="33"> <span class="glyphicon glyphicon-step-backward"></span>Anterior </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                        <div class="wizard_activo registerForm titleDivBorderTop">
                            <span class="titleLink">Productos</span>
                            <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                        <div id="productAlert" class="alert alert-danger hidden registerForm titleDivBorderTop" style="margin-top:5px;border-radius:0px !important;">
                            <center><strong>??Alerta!</strong> Debe seleccionar un producto</center>
                        </div>
                        <!-- Contenedor -->
                        <div id="productsDiv" class="pricing-wrapper clearfix" style="padding: 5% 0 5% 0;">
                        </div>
                        <div class="pricing-wrapper clearfix" style="padding: 5% 0 5% 0;">
                            
                            <!-- Modal -->
                            <div id="productModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <!-- Modal content-->
                                    <div id="modalProductContent" class="modal-content">
                                        
                                        
                                    </div>

                                </div>
                            </div>

                        </div>
                        <input type="hidden" id="productCheckBox"name="productCheckBox" value="">
                        <input type="hidden" id="productNameCheckBox"name="productNameCheckBox" value="">
                        <input type="hidden" id="productValueCheckBox"name="productValueCheckBox" value="">
                    </div> 
                    <div class="col-md-12" style="padding-bottom:15px">
                        <div class="row" style="float:left">
                            <a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" tabindex="36"> Cancelar </a>
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right"  href="#" onclick="nextStep('thirdStep', 'secondStep')" tabindex="35"> <span class="glyphicon glyphicon-step-backward"></span>Anterior </a>
                        </div>
                    </div>
                </div>
                <div id="fourthStep" class="col-md-12 hidden">
                    <div class="col-md-12" style="margin-top:5px;padding-top:15px;">
                        <div class="row" style="float:left">
                            <a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" tabindex="39"> Cancelar </a>
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('fourthStep', 'thirdStep')" tabindex="38"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px;width:95px;" onclick="executeSale()" tabindex="37"> Cotizar </a>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                        <div class="wizard_activo registerForm titleDivBorderTop">
                            <span class="titleLink">Resumen</span>
                            <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                        </div>
                        <form action="" style="margin-top:25px;">
                        <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="registerForm" for="documentResume"> Identificaci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" class="form-control registerForm" name="documentResume" id="documentResume" placeholder="Identificaci??n" value="<?php echo e(old('documentResume')); ?>" disabled="disabled">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="registerForm" for="customerResume"> Cliente</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" class="form-control registerForm" name="customerResume" id="customerResume" placeholder="Cliente" value="<?php echo e(old('model')); ?>" disabled="disabled">                                
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="registerForm" for="mobile_phoneResume"> Tel??fono Movil </label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" class="form-control registerForm" name="mobile_phoneResume" id="mobile_phoneResume" placeholder="Tel??fono Movil" value="<?php echo e(old('model')); ?>" disabled="disabled">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="registerForm" for="emailResume"> Email</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="email" class="form-control registerForm" name="emailResume" id="emailResume" placeholder="Email" value="<?php echo e(old('year')); ?>" disabled="disabled">                             
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-2">
                                <table id="vehiclesTableResume" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="background-color:#b3b0b0;width:60%">Producto</th>
                                            <th style="background-color:#b3b0b0;width:25%">Prima Neta</th>
                                        </tr>
                                    </thead>
                                    <tbody id="R4TableBodyResume">
                                    </tbody>
                                </table>
                            </div>
                            <div id="taxTableResume" class="col-md-6 col-md-offset-4" style="margin-top:-20px">
                                <table class="table table-bordered">
                                    <tbody id="taxTableBodyResume">
                                    </tbody>
                                </table>
                            </div>
                            <div id="benefitsTable" class="col-md-4 col-md-offset-4 hidden">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr id="benefitsTableBody">
                                            <td align="center" style="background-color:#b3b0b0;font-weight: bold">
                                                Beneficios Adicionales
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6 col-md-offset-3">
                                <center>
                                    <label class="registerForm">
                                        Enviar Cotizaci??n al correo del cliente. <input type="checkbox" class="chkBoxSendQuotation" name="sendQuotation" data-toggle="toggle"  data-on="Enviar" data-off="No Enviar" data-width="100px" id="sendQuotation" value="" checked="checked" tabindex="40">
                                    </label>
                                </center>
                            </div>
                        </div>
                    </form>
                    <div class="col-md-12" style="padding-bottom:15px">
                        <div class="row" style="float:left">
                            <a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" tabindex="43"> Cancelar </a>
                        </div>
                        <div class="row" style="float:right">
                            <a class="btn btn-back registerForm" align="right" href="#" onclick="nextStep('fourthStep', 'thirdStep')" tabindex="42"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                            <a class="btn btn-info registerForm" align="right" href="#" style="padding: 5px;width:95px;" onclick="executeSale()" tabindex="41"> Cotizar </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\magnussucre\resources\views\sales\R4\create.blade.php ENDPATH**/ ?>