

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(assets('js/registerCustom.js')); ?>"></script>
<script src="<?php echo e(assets('js/legalPersonVinculation/create.js')); ?>"></script>
<link href="<?php echo e(assets('css/sales/create.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(assets('css/sales/index.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<?php if($beneficiaryName == null): ?>
<script>
    $(document).ready(function () {
    var div = document.getElementById('beneficiaryDataDiv');
    $(div).fadeOut();
    });
</script>
<?php endif; ?>

<?php if($civil_state == 2 || $civil_state == 5): ?>
<script>
    $(document).ready(function () {
    var div = document.getElementById('spouseFullDiv');
    $(div).fadeIn();
    var div = document.getElementById('formDocumentSpouse');
    $(div).fadeIn();
    });</script>
<?php else: ?>
<script>
    $(document).ready(function () {
    var div = document.getElementById('spouseFullDiv');
    $(div).fadeOut();
    var div = document.getElementById('formDocumentSpouse');
    $(div).fadeOut();
    });</script>
<?php endif; ?>
<?php if($vinFormVersion==4): ?>
<script>
    $(document).ready(function () {
    var div = document.getElementById('formSri');
    $(div).fadeIn();
    });
</script>
<?php else: ?>
<script>
     $(document).ready(function () {
    var div = document.getElementById('formSri');
    $(div).fadeOut();
    });
</script>
<?php endif; ?>
<style>
    .form-group{
        height:70px;
        margin-top:5px !important;
        margin-bottom:5px !important;
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
    .glyphicon.glyphicon-asterisk{
        font-size:12px;
    }
    #economic_activity{
        width:89%;
    }
    @media  only screen and (max-width: 600px) {
        .row{
            margin-top: 10px;
            margin-bottom: 0px;
        }
        .wizardActivo{
            height:55px;
        }
        #economic_activity{
            width:80%;
        }
    }
</style>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<div class="container" style="margin-top:15px; font-size:14px !important">
    <!--<div class="row justify-content-center border" style="margin-left:20%;">-->
    <div class="col-md-10 col-md-offset-1 border" style="padding: 15px;">
        <div class="row">
            <div class="col-xs-12 registerForm" style="margin:12px;">
                <center>
                    <h4 style="font-weight:bold">FORMULARIO DE VINCULACI??N DE CLIENTES PERSONA JUR??DICA</h4>
                    <!--<h5>Datos del Cliente.</h5>-->
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-2 wizard_inicial" style="padding-left:0px !important"><div id="firstStepWizard" class="wizard_activo registerForm">Informaci??n</div></div>
            <div class="col-xs-12 col-md-3 wizard_inicial" style="padding-left:0px !important"><div id="secondStepWizard" class="wizard_inactivo registerForm">Actividad Econ??mica</div></div>
            <div class="col-xs-12 col-md-2 wizard_medio" style="padding-left:0px !important"><div id="thirdStepWizard" class="wizard_inactivo registerForm">Declaraci??n</div></div>
            <div class="col-xs-12 col-md-2 wizard_medio" style="padding-left:0px !important"><div id="fourthStepWizard" class="wizard_inactivo registerForm">Documentaci??n</div></div>
            <div class="col-xs-12 col-md-2 wizard_medio" style="padding-right: 0px !important"><div id="fifthStepWizard" class="wizard_inactivo registerForm">Firma</div></div>
            <div class="col-xs-12 col-md-1 wizard_final" style="padding-right:0px; !important"><div id="fifthStepWizard" class="wizard_inactivo registerForm"></div></div>
        
        </div>
        <div id="firstStep" class="col-md-12" style="margin-top:10px">
            <form id="firstStepForm" name="firstStepForm" method="POST" action="<?php echo e(asset('/user')); ?>" id="salesForm">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                <input type="hidden" id="companyd" name="companyId" value="<?php echo e($company->id); ?>">
                <input type="hidden" id="vinFormVersion" name="vinFormVersion" value="<?php echo e($vinFormVersion); ?>">
                <div id="productAlert" class="alert alert-danger hidden">
                    <strong>??Alerta!</strong> Debe seleccionar un producto
                </div>
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('personalDiv')">
                        <a href="#" class="titleLink">Datos de la Compa????a</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="personalDiv" class="col-md-12">
                         <?php if($company == false): ?>
                        <input type="hidden" id="companyCheck" value="0">
                        <?php else: ?>
                        <input type="hidden" id="companyCheck" value="1">
                        <?php endif; ?>
                        <?php if($legalRepresentative == false): ?>
                        <input type="hidden" id="customerCheck" value="0">
                        <?php else: ?>
                        <input type="hidden" id="customerCheck" value="1">
                        <?php endif; ?>
                        <div class="">
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="business"> Raz??n Social </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" id="business_name" name="business_name" class="form-control registerForm" required tabindex="1" placeholder="Raz??n Social"   value="<?php echo e($company->business_name); ?>" maxlength="60" disabled="disabled">
                                    <lavel id="business_name_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar la Raz??n Social</lavel>
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document"> RUC </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" id="documentCompany" name="documentCompany" class="form-control registerForm" required tabindex="2" placeholder="RUC"  value="<?php echo e($company->document); ?>" maxlength="20" disabled="disabled">
                                    <lavel id="documentCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el RUC</lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> <label class="registerForm" for="ocupat">Actividad Econ??mica </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                 <div class="input-group">
                                    <select id="occupation" name="occupation" class="form-control registerForm" required tabindex="3" style="float:left;width:99%" disabled="disabled" >
                                        <option value="0">--Escoja Una---</option>
                                        <?php $__currentLoopData = $economicActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eco): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($eco->id == $economic_activity_id ): ?> selected <?php endif; ?> value="<?php echo e($eco->id); ?>"><?php echo e($eco->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                
                                    </select>
                                    <span class="input-group-btn">
                                        <button id="btnModalSearch" type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" <?php echo e($disable_status); ?>><span class="glyphicon glyphicon-search"></span></button>
                                    </span>
                                </div>
                                    <label id="occupation_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar la Actividad Econ??mica</label>
                               </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="constitution_date"> Fecha de Constituci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="date" id="constitution_dateCompany" name="constitution_dateCompany" class="form-control registerForm" required tabindex="4" style="line-height: 15px !important"  value="<?php echo e($company->constitution_date); ?>" <?php echo e($disable_status); ?>>
                                    <lavel id="constitution_dateCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;">Debe seleccionar la Fecha de Constituci??n</lavel>
                                 </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="main_road"> Direcci??n/Calle Principal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" id="main_roadCompany" name="main_roadCompany" class="form-control registerForm" required tabindex="5" placeholder="Direcci??n/Calle Principapl" value="<?php echo e($company->address); ?>" <?php echo e($disable_status); ?> maxlength="30">
                                    <lavel id="main_roadCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar la Direcci??n</lavel>
                                    <lavel id="main_roadCompany_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">La Direcci??n debe tener m??ximo 30 caracteres</lavel>
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="main_road"> Transversal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" id="secondary_roadCompany" name="secondary_roadCompany" class="form-control registerForm" required tabindex="6" placeholder="Calle Transversal"  value="<?php echo e($company->cross_street); ?>" <?php echo e($disable_status); ?> maxlength="30">
                                    <lavel id="secondary_roadCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar la calle Transversal</lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="sector"> N??</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" id="numberCompany" name="numberCompany" class="form-control registerForm" required tabindex="7" placeholder="N??"  value="<?php echo e($company->address_number); ?>" <?php echo e($disable_status); ?> maxlength="30">
                                    <lavel id="numberCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el N??mero</lavel>
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="country"> Pa??s</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select id="countryCompany" name="countryCompany" class="form-control registerForm" required tabindex="8"<?php echo e($disable_status); ?>>
                                         <option value="0">--Escoja Una---</option>
                                         <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($cou->id==1): ?>                        
                                            <option <?php if($cou->id == $country_id): ?> selected="true" <?php endif; ?> value="<?php echo e($cou->id); ?>"><?php echo e($cou->name); ?></option>
                                            <?php endif; ?>                                        
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <lavel id="countryCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar el Pa??s</lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Provincia  </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select id="provinceCompany" name="provinceCompany" class="form-control registerForm" required tabindex="9" <?php echo e($disable_status); ?>>
                                        <option selected="true" value="0" disabled="disabled">--Escoja Una---</option>
                                        <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($prov->country_id==1): ?>
                                            <option <?php if($prov->id == $province_id): ?> selected <?php endif; ?> value="<?php echo e($prov->id); ?>"><?php echo e($prov->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <lavel id="provinceCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar la Provincia</lavel>
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Cant??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select id="cityCompany" name="cityCompany" class="form-control registerForm" required tabindex="10" <?php echo e($disable_status); ?> >
                                        <option value="0">--Escoja Una---</option>
                                        <?php if($addressCities != null): ?>
                                            <?php $__currentLoopData = $addressCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($cit->id == $city_id): ?> selected <?php endif; ?> value="<?php echo e($cit->id); ?>"><?php echo e($cit->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           <?php else: ?>
                                            <?php endif; ?>
                                    </select>
                                    <lavel id="cityCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar el Cant??n</lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="" style="color:#0099ff">&ensp;</span><label class="registerForm" for="sector"> Parroquia</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" id="parroquiaCompany" name="parroquiaCompany" class="form-control registerForm" required tabindex="11" placeholder="Parroquia"  value="<?php echo e($company->parroquia); ?>" <?php echo e($disable_status); ?> maxlength="30" >
                                    <lavel id="parroquiaCompany_validation" class="hidden"style="color:#FFFFFF;font-size: 12px;margin:0;"> Parroquia</lavel>
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="sector"> Sector</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" id="sectorCompany" name="sectorCompany" class="form-control registerForm" required tabindex="12" placeholder="Sector" value="<?php echo e($company->sector); ?>"<?php echo e($disable_status); ?> maxlength="30">
                                    <lavel id="sectorCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el Sector </lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="phone">Tel??fono </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><label class="own"> <span class="glyphicon glyphicon-info-sign" style="color:#0099ff"><span class="own1" style="float:left"> El tel??fono debe tener 9 caracteres</span></span></label>
                                    <input type="text" id="phoneCompany" name="phoneCompany" class="form-control registerForm" required tabindex="13" placeholder="Tel??fono"  value="<?php echo e($company->phone); ?>" <?php echo e($disable_status); ?> maxlength="9">
                                    <lavel id="phoneCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el N??mer de Tel??fono</lavel>
                                    <lavel id="phoneCompany_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">El N??mer de Tel??fono debe tener 9 d??gitos</lavel>
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="mobile_phone"> Celular </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><label class="own"> <span class="glyphicon glyphicon-info-sign" style="color:#0099ff"><span class="own1" style="float:left"> El celular debe tener 10 caracteres</span></span></label>
                                    <input type="text" id="mobile_phoneCompany" name="mobile_phoneCompany" class="form-control registerForm" required tabindex="14" placeholder="Celular"  value="<?php echo e($company->mobile_phone); ?>" <?php echo e($disable_status); ?> maxlength="10">
                                    <lavel id="mobile_phoneCompany_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el N??mer de Celular</lavel>
                                    <lavel id="mobile_phoneCompany_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">El N??mer de Celular debe tener 10 d??gitos</lavel>
                                 </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="correo"> Email</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="email" class="form-control registerForm" name="emailCompany" id="emailCompany" placeholder="Email" value="<?php echo e($company->email); ?>" required tabindex="15" maxlength="100" <?php echo e($disable_status); ?>>
                                        <lavel id="emailCompany_validation" class="hidden" style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el Email</lavel>
                                        <lavel id="emailCompany_error" class="hidden" style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar un Email valido</lavel>
                                        <p id="emailError" style="color:red;font-weight: bold; display: none;"></p>    
                                        <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
                                        <?php if($errors->any()): ?>
                                        <span style="color:red;font-weight:bold"><?php echo e($errors->first()); ?></span>
                                        <?php endif; ?>
                                  </div>
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
                        <div class="">
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                      <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document"> C??dula</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <!--<input type="text" class="form-control registerForm" name="document" id="document" placeholder="C??dula" value="<?php echo e(old('document')); ?>" required="required">-->
                                    <div class="form-inline">
                                        <input autocomplete="off" type="text" class="form-control registerForm" name="document" id="document" placeholder="C??dula" style="float:left;width:100%" required tabindex="16" <?php if($legalRepresentative != false): ?> disabled="disabled" value="<?php echo e($legalRepresentative->document); ?>" <?php endif; ?>>
                                                                                
                                    </div>
                                    <lavel id="document_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0; ">Debe el N??mero de C??dula </lavel>
                                </div>
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document_id"> Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="document_id" name="document_id" class="form-control registerForm" value="" required tabindex="17" disabled="disabled">
                                            <option value="0">--Escoja Una---</option>
                                            <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($legalRepresentative != false): ?>
                                            <?php if($legalRepresentative->document_id == $doc->id): ?>
                                            <option value="<?php echo e($doc->id); ?>" selected="selected"><?php echo e($doc->name); ?></option>
                                            <?php else: ?>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            <option value="<?php echo e($doc->id); ?>"><?php echo e($doc->name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>                                        
                                        <lavel id="document_id_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar el Tipo de Documento </lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" style="list-style-type:disc;" for="first_name"> Primer Nombre</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="first_name" id="first_name" placeholder="Primer Nombre"  <?php if($legalRepresentative != false): ?> value="<?php echo e($legalRepresentative->first_name); ?>" disabled="disabled" <?php endif; ?>  required tabindex="18" maxlength="30" >
                                        <lavel id="first_name_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el Primer Nombre</lavel>                                
                                </div>
                                <div class="form-group col-md-6">
                                      <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="last_name"> Primer Apellido</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="last_name" id="last_name" placeholder="Primer Apellido" <?php if($legalRepresentative != false): ?> value="<?php echo e($legalRepresentative->last_name); ?>" disabled="disabled"  <?php endif; ?>  required tabindex="19" maxlength="30">                                       
                                        <lavel id="last_name_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el Primer Apellido</lavel>
                                  </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon " style="color:#0099ff">&ensp;</span><label class="registerForm" style="list-style-type:disc;" for="second_name"> Segundo Nombre</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" class="form-control registerForm" name="second_name" id="second_name" placeholder="Segundo Nombre" <?php if($legalRepresentative != false): ?> value="<?php echo e($legalRepresentative->second_name); ?>" disabled="disabled" <?php endif; ?> required tabindex="20">
                                    <lavel id="second_name_validation" class="hidden"style="color:#FFFFFF;font-size: 12px;margin:0;">Segundo Nombre</lavel>
                                </div>
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="second_last_name"> Segundo Apellido</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="second_last_name" id="second_last_name" placeholder="Segundo Apellido" <?php if($legalRepresentative != false): ?> value="<?php echo e($legalRepresentative->second_last_name); ?>" disabled="disabled"  <?php endif; ?> required tabindex="21">
                                        <lavel id="second_last_name_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el Segundo Apellido</lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" style="list-style-type:disc;" for="nationality">Nacionalidad</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select name="nationality" id="nationality" class="form-control registerForm" required tabindex="22" <?php echo e($disable_status); ?> >
                                        <option value="0">--Escoja Una---</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($cou->id == $nationality_id): ?> selected="true" <?php endif; ?> value="<?php echo e($cou->id); ?>"><?php echo e($cou->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                      
                                    </select>
                                    <lavel id="nationality_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar la Nacionalidad</lavel>
                                
                                </div>
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="country"> Pa??s de Nacimiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select name="birthCountry" id="birthCountry" class="form-control registerForm" required tabindex="23" <?php echo e($disable_status); ?>>
                                        <option value="0">--Escoja Una---</option>
                                        <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($country->id == $country_id): ?> selected="true" <?php endif; ?> value="<?php echo e($country->id); ?>"><?php echo e($country->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <lavel id="birthCountry_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar el Pa??s de Nacimiento</lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="birthProvince"> Provincia de Nacimiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select name="birthProvince" class="form-control registerForm" id="birthProvince" required tabindex="24" <?php echo e($disable_status); ?> >
                                            <option  value="0">--Escoja Una---</option>
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($provin->id == $provincePlace_id): ?> selected="true" <?php endif; ?> value="<?php echo e($provin->id); ?>"><?php echo e($provin->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                            
                                        </select>
                                        <lavel id="birthProvince_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar la Provincia de Nacimiento</lavel>
                                 </div>
                                <div class="form-group col-md-6">                                    
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="birthCity"> Ciudad de Nacimiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select name="birthCity" class="form-control registerForm" id="birthCity" required tabindex="25" <?php echo e($disable_status); ?>>
                                        <option value="0">--Escoja Una---</option>
                                        <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($cit->id == $birth_place): ?> selected="true" <?php endif; ?> value="<?php echo e($cit->id); ?>"><?php echo e($cit->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <lavel id="birthCity_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar la Ciudad de Nacimiento</lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="birthdate"> Fecha de Nacimiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="date" id="birthdate" name="birthdate" class="form-control registerForm" style="line-height: 15px !important"  value="<?php echo e($legalRepresentative->birth_date); ?>"  required tabindex="26" <?php echo e($disable_status); ?> >
                                        <lavel id="birth_date_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar la Fecha de Nacimiento</lavel>
                                
                                 </div>
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="civilState">Estado Civil</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="civilState" name="civilState" class="form-control registerForm" required tabindex="27" <?php echo e($disable_status); ?>>
                                            <option value="0">--Escoja Una---</option>
                                            <?php $__currentLoopData = $civilStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($sta->id == $civil_state): ?> selected <?php endif; ?> value="<?php echo e($sta->id); ?>"><?php echo e($sta->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <lavel id="civilState_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar el Estado Civil</lavel>
                                
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="city"> Direcci??n/Calle Principal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <input type="text" class="form-control registerForm" name="address" id="address" placeholder="Direcci??n/Calle Principal" required tabindex="28" value="<?php echo e($legalRepresentative->address); ?>" maxlength="30" <?php echo e($disable_status); ?> >
                                    <lavel id="address_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar la Direcci??n</lavel>
                                    <lavel id="address_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">La Direcci??n debe tener m??ximo 30 caracteres</lavel>
                                
                                 </div>
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="country"> Pa??s</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select name="country" id="country" class="form-control registerForm" required tabindex="29" <?php echo e($disable_status); ?>>
                                            <option value="0">--Escoja Una---</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $countryl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($countryl->id==1): ?> 
                                            <option <?php if($countryl->id == $countryLegalRepresentative_id): ?> selected="true" <?php endif; ?> value="<?php echo e($countryl->id); ?>"><?php echo e($countryl->name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <lavel id="country_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar el Pa??s</lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                     <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="province"> Provincia</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                    <select name="province" class="form-control registerForm" id="province" required tabindex="30" <?php echo e($disable_status); ?> >
                                        <option value="0">--Escoja Una---</option>
                                        <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $provi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <?php if($provi->country_id==1): ?>
                                            <option <?php if($provi->id == $provinceLegalRepresentative_id): ?> selected="true" <?php endif; ?> value="<?php echo e($provi->id); ?>"><?php echo e($provi->name); ?></option>
                                          <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                    </select>
                                    <lavel id="province_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar la Provincia</lavel>
                                 </div>
                                <div class="form-group col-md-6">
                                      <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="city"> Cant??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select name="city" class="form-control registerForm" id="city" required tabindex="31" <?php echo e($disable_status); ?> >
                                            <option id="citySelect" selected="true" disabled="disabled" value="0">--Escoja Una---</option>
                                            <?php if($cityLegalRepresentative_id!= null): ?>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $citl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($citl->id == $cityLegalRepresentative_id): ?> selected="true" <?php endif; ?> value="<?php echo e($citl->id); ?>"><?php echo e($citl->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </select>
                                        <lavel id="city_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar el Cant??n</lavel>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon " style="color:#0099ff">&ensp;</span><label class="registerForm" for="document"> Parroquia</label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="parroquia" id="parroquia" placeholder="Parroquia" value="<?php echo e($legalRepresentative->parroquia); ?>" required tabindex="32" maxlength="30" <?php echo e($disable_status); ?>>
                                        <lavel id="parroquia_validation" class="hidden"style="color:#FFFFFF;font-size: 12px;margin:0;">Debe ingrear la Parroquia</lavel>
                                 </div>
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document">Sector </label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" class="form-control registerForm" name="sector" id="sector" placeholder="Sector" value="<?php echo e($legalRepresentative->sector); ?>" required tabindex="33" maxlength="30" <?php echo e($disable_status); ?>>
                                        <lavel id="sector_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingrear el Sector</lavel>                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                         <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="document"> Tel??fono</label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><label class="own"><span class="glyphicon glyphicon-info-sign" style="color:#0099ff"><span class="own1" style="float:left">El tel??fono debe tener 9 caracteres</span></span></label>
                                        <input type="text" class="form-control registerForm" name="phone" id="phone" placeholder="Tel??fono" value="<?php echo e($legalRepresentative->phone); ?>"maxlength="9" required tabindex="34" <?php echo e($disable_status); ?> >
                                        <lavel id="phone_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingrear en N??mero de Tel??fono</lavel>
                                        <lavel id="phone_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">El N??mer de Tel??fono debe tener 9 d??gitos</lavel>
                                    
                                    </div>
                                <div class="form-group col-md-6">
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="city"> Celular</label> <span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><label class="own"><span class="glyphicon glyphicon-info-sign" style="color:#0099ff"><span class="own1" style="float:left">El celular debe contener 10 caracteres</span></span></label>
                                        <input type="text" class="form-control registerForm" name="mobile_phone" id="mobile_phone" placeholder="Celular" value="<?php echo e($legalRepresentative->mobile_phone); ?>" required tabindex="35" maxlength="10" <?php echo e($disable_status); ?> >                                        
                                        <lavel id="mobile_phone_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingrear en N??mero de Celular</lavel>
                                        <lavel id="mobile_phone_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">El N??mer de Celular debe tener 10 d??gitos</lavel>
                                    </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="correo"> Email</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="email" class="form-control registerForm" name="email" id="email" placeholder="Email" value="<?php echo e($legalRepresentative->email); ?>" required tabindex="36" maxlength="100" <?php echo e($disable_status); ?>>
                                        <lavel id="email_validation" class="hidden" style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el Email</lavel>
                                        <lavel id="email_error" class="hidden" style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar un Email valido</lavel>
                                        <?php if($errors->any()): ?>
                                        <span style="color:red;font-weight:bold"><?php echo e($errors->first()); ?></span>
                                        <?php endif; ?>
                            </div>
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
                    <br>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="spouseDocument"> Documento de Identidad C??nyuge</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="spouseDocument" name="spouseDocument" class="form-control registerForm" required tabindex="37"  style="line-height: 15px !important;" value="<?php echo e($spouse_document); ?>"  placeholder="Documento de Identidad C??nyuge"onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                <lavel id="spouseDocument_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el Documento de Identidad del C??nyuge</lavel>
                            </div>
                            <div class="form-group col-md-6">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> <label class="registerForm" for="spouse_document_id">Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="spouse_document_id" name="spouse_document_id" class="form-control registerForm" onchange="removeInputRedFocus(this.id)" required tabindex="38" <?php echo e($disable_status); ?>>
                                    <option selected="true" value="">--Escoja Una---</option>
                                    <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($doc->id == $spouse_document_id): ?> selected="true" <?php endif; ?> value="<?php echo e($doc->id); ?>"><?php echo e($doc->name); ?></option>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <lavel id="spouse_document_id_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar el Tipo Documento</lavel>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="passportEndDate"> Nombre(s) del C??nyuge</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="spouseFirstName" name="spouseFirstName" class="form-control registerForm" required tabindex="39"  style="line-height: 15px !important" value="<?php echo e($spouse_name); ?>" placeholder="Nombre del C??nyuge" onchange="removeInputRedFocus(this.id)" maxlength="60" <?php echo e($disable_status); ?>>
                                <lavel id="spouseFirstName_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar los Nombre(s) del C??nyuge</lavel>
                                <lavel id="spouseFirstName_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Los Nombre(s) deben tener m??ximo 60 caracteres</lavel>
                            </div>
                            <div class="form-group col-md-6">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> <label class="registerForm" for="passportEndDate">Apellido(s) del C??nyuge </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="spouseLastName" name="spouseLastName" class="form-control registerForm" required tabindex="40"  style="line-height: 15px !important" value="<?php echo e($spouse_last_name); ?>" placeholder="Apellido(s) del C??nyuge" onchange="removeInputRedFocus(this.id)" maxlength="30"<?php echo e($disable_status); ?>>
                                <lavel id="spouseLastName_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar los Apellido(s) del C??nyuge</lavel>
                                <lavel id="spouseLastName_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Los Apellido(s) deben tener m??ximo 60 caracteres</lavel>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="beneficiaryFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px;">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('beneficiaryDiv')">
                        <a href="#" class="titleLink">V??nculos Existentes entre el Contratante y Beneficiario</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="beneficiaryDiv" class="col-md-12">
                    <br>
                        <div class="">
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label class="registerForm" for="is_beneficiary"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> ??Es usted el beneficiario de la p??liza?</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span><br>
                                        <input id="is_beneficiary" name="is_beneficiary" class="is_beneficiaryCheckBox" type="checkbox" <?php if($beneficiaryName == null): ?> checked="checked" <?php endif; ?> data-toggle="toggle" tabindex="41" data-on="Si" data-off="No" onchange="isBeneficiaryChange(this)" <?php echo e($disable_status); ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span id="beneficiaryDataDiv" style="margin-top:-25px;">
                            <div class="">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <span>Si respondi?? NO, indique a continuaci??n los datos del beneficiario y su relaci??n</span>
                                        <br>
                                        <span>Ingresar beneficiario de mayor porcentaje</span>
                                        <div class="form-group">
                                            <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiaryName"> Nombres Completos o Raz??n Social</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                            <input type="text2" id="beneficiaryName" name="beneficiaryName" checked class="form-control registerForm" required tabindex="42"  style="line-height: 15px !important" value="<?php echo e($beneficiaryName); ?>" placeholder="Nombres Completos o Raz??n Social" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?> maxlength="200">
                                            <lavel id="beneficiaryName_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar los Nombres o Raz??n Social del Beneficiario</lavel>
                                            <lavel id="beneficiaryName_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Los Nombres o Raz??n Social del Beneficiario debe tener m??ximo 200 caracteres</lavel>
                        
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <br>
                                        <br>
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> <label class="registerForm" for="beneficiary_document">Documento de Identidad</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text2" id="beneficiary_document" name="beneficiary_document" class="form-control registerForm" required tabindex="43"  style="line-height: 15px !important" value="<?php echo e($beneficiary_document); ?>" placeholder="Documento" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                       <lavel id="beneficiary_document_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el Documento de Identificaci??n</lavel>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <br>
                                        <br>
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> <label class="registerForm" for="beneficiary_document_id">Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="beneficiary_document_id" name="beneficiary_document_id" class="form-control registerForm" required tabindex="44" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                                <option value="0">--Escoja Una---</option>
                                                <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($beneficiary_document_id == $doc->id): ?> selected="true" <?php endif; ?> value="<?php echo e($doc->id); ?>"><?php echo e($doc->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        <lavel id="beneficiary_document_id_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar el Tipo de Documento</lavel>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <br>
                                        <br>
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiary_nationality"> Nacionalidad</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="beneficiary_nationality" name="beneficiary_nationality" class="form-control registerForm" required tabindex="45" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                                <option value="">--Escoja Una---</option>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option <?php if($beneficiary_nationality == $cou->id): ?> selected="true" <?php endif; ?> value="<?php echo e($cou->id); ?>"><?php echo e($cou->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        <lavel id="beneficiary_nationality_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe seleccionar la Nacionalidad</lavel>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <br>
                                        <br>
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiary_address"> Direcci??n de Domicilio</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text2" id="beneficiary_address" name="beneficiary_address" class="form-control registerForm" required tabindex="46"  style="line-height: 15px !important" value="<?php echo e($beneficiary_address); ?>" placeholder="Direcci??n de Domicilio" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?> maxlength="100">
                                        <lavel id="beneficiary_address_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar la Direcci??n</lavel>
                                        <lavel id="beneficiary_address_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">La Direcci??n debe tener m??ximo 200 caracteres</lavel>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <br>
                                        <br>
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiary_phone"> Tel??fono</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text2" id="beneficiary_phone" name="beneficiary_phone" class="form-control registerForm" required tabindex="47"  style="line-height: 15px !important" value="<?php echo e($beneficiary_phone); ?>" placeholder="Tel??fono" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?> maxlength="10">
                                        <lavel id="beneficiary_phone_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar el N??mero de Tel??fono</lavel>
                                        <lavel id="beneficiary_phone_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">El N??mero de Tel??fono debe tener 10 d??gitos</lavel>
                                    </div>
                                    <div class="form-group col-md-6">
                                          <br>
                                        <br>
                                        <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="beneficiary_relationship"> Relaci??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text2" id="beneficiary_relationship" name="beneficiary_relationship" class="form-control registerForm" required tabindex="48"  style="line-height: 15px !important" value="<?php echo e($beneficiary_relationship); ?>" placeholder="Relaci??n" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?> maxlength="20">
                                        <lavel id="beneficiary_relationship_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar la Relaci??n</lavel>
                                        <lavel id="beneficiary_relationship_validation_length" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">La Relaci??n debe tener m??ximo 20 caracteres</lavel>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align: justify;">
                                        <br>
                                        <br>
                                * Cuando en la p??liza de seguro de vida o de accidentes personales con la cobertura de muerte, los asegurados hubiesen designado como beneficiarios a sus parientes hasta el cuarto grado de consanguinidad o segundo grado de afinidad, o a su c??nyuge o conviviente en uni??n de hecho, no se requerir?? la informaci??n de tales beneficiarios. Si fuesen otras personas las designadas como beneficiarios, la documentaci??n referente a estos deber?? ser presentada, obligatoriamente, mediante formulario de vinculaci??n de clientes. 
                            </div>
                        </span>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:5px;padding-top:15px;padding-bottom:15px">
                    <div class="row" style="float:left">
                        <!--<a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" style="margin-left: -30px;"> Cancelar </a>-->
                    </div>
                    <div class="row" style="float:right">
                        <a id="firstStepBtnNext" class="btn btn-info registerForm" align="right" tabindex="49" href="#"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                    </div>
                </div>
            </form>
        </div>
        <div id="secondStep" class="col-md-12 hidden" style="margin-top:20px">
            <form id="secondStepForm" name="secondStepForm" method="POST" action="<?php echo e(asset('/user')); ?>" id="salesForm">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                <input type="hidden" id="companyd" name="companyId" value="<?php echo e($company->id); ?>">
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('occupationDiv')">
                        <a href="#" class="titleLink">Situaci??n Financiera</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <br>
                    <div id="occupationDiv" class="col-md-12">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm" for="annual_income"> Ingresos brutos anuales declarados en el a??o anterior</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text2" id="annual_income" name="annual_income" class="form-control registerForm" required tabindex="1" placeholder="Ingresos Anuales"  value="<?php echo e($annual_income); ?>" <?php echo e($disable_status); ?> maxlength="15" onchange="currencyFormat(this.id)">
                                <lavel id="annual_income_validation" class="hidden"style="color:#F31212;font-size: 12px;margin:0;">Debe ingresar los ingresos brutos anuales declarados en el a??o anterior </lavel>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
                <div class="col-md-12" style="margin-top:5px;padding-top:15px;padding-bottom:15px">
                    <div class="row" style="float:left">
                        <!--<a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" style="margin-left: -30px;"> Cancelar </a>-->
                    </div>
                    <div class="row" style="float:right">
                        <a id="secondStepBtnBack" class="btn btn-back registerForm" align="right" href="#" tabindex="2"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                        <a id="secondStepBtnNext" class="btn btn-info registerForm" align="right" href="#"tabindex="3"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                    </div>
                </div>
            </form>
        </div>
        <div id="thirdStep" class="col-md-12 hidden" style="margin-top:20px">
            <form id="thirdStepForm" name="thirdStepForm" method="POST" action="<?php echo e(asset('/user')); ?>" id="salesForm">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                <input type="hidden" id="companyd" name="companyId" value="<?php echo e($company->id); ?>">
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('pepDeclarationDiv')">
                        <a href="#" class="titleLink">Declaraci??n y Autorizaci??n</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="pepDeclarationDiv" class="col-md-12">
                        <div class="col-md-12" style="margin-top:15px;text-align: justify; font-size: 14px;margin-bottom: 10px;">
                            <div class="col-md-12" style="margin-top:-25px;">
                                <div class="form-group">
                                    <br>
                                    <br>
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
                            <?php if($person_exposed == null): ?>
                                <div class="col-md-12" style="margin-bottom:15px;">
                                    Declaraci??n sobre la condici??n de Persona Expuesta Pol??ticamente PEP (Persona que desempe??a o ha desempe??ado funciones p??blicas en el pa??s o en el exterior). Informo que he le??do la Lista M??nima de Cargos P??blicos a ser considerados "Personas Expuestas Pol??ticamente" y declaro bajo juramento que <label class="radio-inline" style="padding-left:5px;padding-right: 5px;">Si <input type="radio" name="optradio3" value="yes" style="margin-left:5px;margin-top: 0px;" <?php echo e($disable_status); ?>></label> <label class="radio-inline" style="padding-left:5px; padding-right:15px;">No <input type="radio" name="optradio3" value="no" checked style="margin-left:5px;margin-top: 0px;" <?php echo e($disable_status); ?>></label><br> me encuentro ejerciendo uno de los cargos incluidos en la lista o lo ejerc?? hace un a??o atr??s. En el caso de que la respuesta sea positiva, indicar: Cargo/Funci??n/Jerarqu??a:  <input type="text2" id="pep_client" name="pep_client" class="form-control registerForm" required tabindex="2" placeholder="Cargo/Funci??n/Jerarqu??a" onchange="removeInputRedFocus(this.id)" value="<?php echo e($pep_client); ?>" <?php echo e($disable_status); ?>>
                                    Nota: La presente declaraci??n no constituye una autoincriminaci??n de ninguna clase, ni conlleva ninguna responsabilidad administrativa, civil o penal.
                                </div>
                            <?php else: ?>
                                <div class="col-md-12" style="margin-bottom:15px;">
                                    Declaraci??n sobre la condici??n de Persona Expuesta Pol??ticamente PEP (Persona que desempe??a o ha desempe??ado funciones p??blicas en el pa??s o en el exterior). Informo que he le??do la Lista M??nima de Cargos P??blicos a ser considerados "Personas Expuestas Pol??ticamente" y declaro bajo juramento que <label class="radio-inline" style="padding-left:5px;padding-right: 5px;">Si <input type="radio" name="optradio3" value="yes" <?php if($person_exposed == 'yes'): ?> checked <?php endif; ?> style="margin-left:5px;margin-top: 0px;"<?php echo e($disable_status); ?>></label> <label class="radio-inline" style="padding-left:5px; padding-right:15px;" <?php echo e($disable_status); ?>>No <input type="radio" name="optradio3" value="no" <?php if($person_exposed == 'no'): ?> checked <?php endif; ?> style="margin-left:5px;margin-top: 0px;"></label><br> me encuentro ejerciendo uno de los cargos incluidos en la lista o lo ejerc?? hace un a??o atr??s. En el caso de que la respuesta sea positiva, indicar: Cargo/Funci??n/Jerarqu??a:  <input type="text2" id="pep_client" name="pep_client" class="form-control registerForm" required tabindex="2" placeholder="Cargo/Funci??n/Jerarqu??a" onchange="removeInputRedFocus(this.id)" value="<?php echo e($pep_client); ?>" <?php echo e($disable_status); ?>>
                                    Nota: La presente declaraci??n no constituye una autoincriminaci??n de ninguna clase, ni conlleva ninguna responsabilidad administrativa, civil o penal.
                                </div>
                            <?php endif; ?>
                            <hr>
                            <div class="col-md-12" style="margin-top:-15px;">
                                <div class="form-group">
                                    <h4>Autorizaci??n</h4>
                                </div>
                            </div>  
                            <div class="col-md-12" style="margin-bottom:15px;margin-top:-44px;">
                                Siendo conocedor de las disposiciones legales, autorizo expresamente en forma libre, voluntaria e irrevocable a Seguros Sucre S. A., a realizar el an??lisis y las verificaciones que considere necesarias para corroborar la licitud de fondos y bienes comprendidos en el contrato de seguro e informar a las autoridades competentes si fuera el caso; adem??s autorizo expresa, voluntaria e irrevocablemente a todas las personas naturales o jur??dicas de derecho p??blico o privado a facilitar a Seguros Sucre S.A. toda la informaci??n que ??sta les requiera  y revisar los bur?? de cr??dito sobre mi informaci??n de riesgos crediticios.
                            </div> 
                        </div>
                    </div>
                    <input type="hidden" id="exposedPersonInput" name="exposedPersonInput" value="">
                </div>
                <div class="col-md-12" style="margin-top:5px;padding-top:15px;padding-bottom:15px">
                    <div class="row" style="float:left">
                        <!--<a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" style="margin-left: -30px;"> Cancelar </a>-->
                    </div>
                    <div class="row" style="float:right">
                        <a id="thirdStepBtnBack" class="btn btn-back registerForm" align="right" href="#" tabindex="3"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                        <a id="thirdStepBtnNext" class="btn btn-info registerForm" align="right" href="#" tabindex="4"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                    </div>
                </div>
            </form>
        </div>
        <div id="fourthStep" class="hidden" style="margin-top:30px">
            <!--<form id="fourthStepForm" name="fourthtepForm" method="POST" action="<?php echo e(asset('/user')); ?>" id="salesForm">-->
            <?php echo e(csrf_field()); ?>

                <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
            <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px;margin-top:30px;">
                <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('picturesDivpicturesDiv')">
                    <a href="#" class="titleLink">Documentos Requeridos - Persona Jur??dica</a>
                    <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                </div>
                <div id="picturesDiv" class="col-md-12" style="margin-top:25px;">
                     <div class="col-md-6"  style="margin: 5px 0;">
                        <form class="col-md-12 border" method="post" id="upload_formDocumentRuc" name="upload_formDocumentRuc" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formDocumentRuc'" style="min-height:350px !important">
                            <?php echo e(csrf_field()); ?>  
                            <center><label class="registerForm">RUC</label></center>
                            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                            <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                            <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
                            <input type="hidden" id="uploadType" name="uploadType" value="DocumentRuc">
                            <input type="hidden" id="uploadedFileDocumentRuc" name="uploadedFileDocumentSpouse" value="<?php echo e($picture_ruc); ?>">
                           
                            <div class="form-group" style="text-align: center;">
                                <label class="registerForm">Copia del registro ??nico de contribuyentes (RUC) o n??mero an??logo.</label>
                            </div>
                                <div class="alert" id="messageDocumentRuc" style="display: none"></div>
                            <center>
                                <div style="width:100px !important;padding: 0" class="inside" id="fileNameDocumentRuc"></div>
                                <div class="inputWrapper"><span id="uploaded_imageDocumentRuc"><?php echo $picture_ruc; ?></span>
                                    <center>
                                        <img src="<?php echo e(asset('images/mas.png')); ?>" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                    </center>
                                    <input class="fileInput" type="file" name="select_fileDocumentRuc" tabindex="7" onchange="fileNameFunction('DocumentRuc')" id="select_fileDocumentRuc" <?php if($disable_status != null): ?> style="display:none" <?php endif; ?>>
                                </div>
                            </center>
                            <center>
                                <button type="submit" name="upload" id="uploadDocumentRuc" class="btn btn-primary <?php if($picture_ruc == null): ?> visible <?php else: ?> hidden <?php endif; ?>" tabindex="8" onclick="uploadPictureForm('DocumentRuc')">
                                    <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                </button>
                                <a class="<?php if($picture_ruc == null): ?> hidden <?php else: ?> visible <?php endif; ?>" id="deletePictureDocumentRuc" href="#" onclick="deletePictureForm('DocumentRuc','<?php echo e($legalRepresentative->id); ?>','<?php echo e($sales_id); ?>','<?php echo e($company->id); ?>')">
                                    <?php if($disable_status == null): ?>
                                        <img src="<?php echo e(asset('/images/menos.png')); ?>" style="width:20px;height:20px">
                                    <?php endif; ?>                                          </a>  
                            </center>
                        </form>
                    </div>
                    <div class="col-md-6" style="margin: 5px 0;">
                        <form class="col-md-12 border" method="post" id="upload_formDocumentApplicant" name="upload_formDocumentApplicant" enctype="multipart/form-data" style="min-height:350px !important">
                            <?php echo e(csrf_field()); ?>    
                            <center><label class="registerForm">Documento de Identidad</label></center>
                            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                            <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                            <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
                            <input type="hidden" id="uploadType" name="uploadType" value="DocumentApplicant">
                            <input type="hidden" id="uploadedFileDocumentApplicant" name="uploadedFileDocumentApplicant" value="<?php echo e($picture_document_applicant); ?>">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm">Fecha de Caducidad</label>
                                <input type="date" id="DocumentApplicantDate" name="DocumentApplicantDate" class="form-control" style="line-height:14px;" tabindex="1" required="required" value="<?php echo e($document_applicant_date); ?>" <?php echo e($disable_status); ?>>
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <label class="registerForm" style="word-wrap: break-word;">Copia del documento de identidad del contratante</label>
                            </div>
                            <div class="alert" id="messageDocumentApplicant" style="display: none"></div>
                            <center>
                                <div style="width:100px !important;padding: 0" class="inside" id="fileNameDocumentApplicant"></div>
                                <div class="inputWrapper"><span id="uploaded_imageDocumentApplicant"><?php echo $picture_document_applicant; ?></span>
                                    <center>
                                        <img src="<?php echo e(asset('images/mas.png')); ?>" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                    </center>
                                    <input class="fileInput" type="file" name="select_fileDocumentApplicant" tabindex="2" onchange="fileNameFunction('DocumentApplicant')" id="select_fileDocumentApplicant" <?php if($disable_status != null): ?> style="display:none" <?php endif; ?>>
                                </div>
                            </center>
                            <center>
                                <button type="submit" name="upload_file" id="uploadDocumentApplicant" class="btn btn-primary <?php if($picture_document_applicant == null): ?> visible <?php else: ?> hidden <?php endif; ?>" tabindex="2" onclick="uploadPictureForm('DocumentApplicant')">
                                    <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                </button>
                                <a class="<?php if($picture_document_applicant == null): ?> hidden <?php else: ?> visible <?php endif; ?>" id="deletePictureDocumentApplicant" href="#" onclick="deletePictureForm('DocumentApplicant','<?php echo e($legalRepresentative->id); ?>','<?php echo e($sales_id); ?>','<?php echo e($company->id); ?>')">
                                    <?php if($disable_status == null): ?>
                                        <img src="<?php echo e(asset('/images/menos.png')); ?>" style="width:20px;height:20px">
                                    <?php endif; ?>                                          </a>  
                            </center>
                        </form>
                    </div>
                    <div class="col-md-6" id="formDocumentSpouse" style="margin: 5px 0;">
                        <form class="col-md-12 border" method="post" id="upload_formDocumentSpouse" name="upload_formDocumentSpouse" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formDocumentSpouse'" style="min-height:350px !important">
                            <?php echo e(csrf_field()); ?>  
                            <center><label class="registerForm">Documento de Identidad del C??nyuge</label></center>
                            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                            <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                            <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
                            <input type="hidden" id="uploadType" name="uploadType" value="DocumentSpouse">
                            <input type="hidden" id="uploadedFileDocumentSpouse" name="uploadedFileDocumentSpouse" value="<?php echo e($picture_document_spouse); ?>">
                            <div class="form-group">
                                <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm">Fecha de Caducidad</label>
                                <input type="date" id="DocumentSpouseDate" name="DocumentSpouseDate" class="form-control" style="line-height:14px;" tabindex="6" value="<?php echo e($document_spouse_date); ?>" <?php echo e($disable_status); ?>>
                            </div>    
                            <div class="form-group" style="text-align: center;">
                                <label class="registerForm">Copia del documento de identidad del c??nyuge o conviviente legal del contratante</label>
                            </div>
                                <div class="alert" id="messageDocumentSpouse" style="display: none"></div>
                            <center>
                                <div style="width:100px !important;padding: 0" class="inside" id="fileNameDocumentSpouse"></div>
                                <div class="inputWrapper"><span id="uploaded_imageDocumentSpouse"><?php echo $picture_document_spouse; ?></span>
                                    <center>
                                        <img src="<?php echo e(asset('images/mas.png')); ?>" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                    </center>
                                    <input class="fileInput" type="file" name="select_fileDocumentSpouse" tabindex="7" onchange="fileNameFunction('DocumentSpouse')" id="select_fileDocumentSpouse" <?php if($disable_status != null): ?> style="display:none" <?php endif; ?>>
                                </div>
                            </center>
                            <center>
                                <button type="submit" name="upload" id="uploadDocumentSpouse" class="btn btn-primary <?php if($picture_document_spouse == null): ?> visible <?php else: ?> hidden <?php endif; ?>" tabindex="8" onclick="uploadPictureForm('DocumentSpouse')">
                                    <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                </button>
                                <a class="<?php if($picture_document_spouse == null): ?> hidden <?php else: ?> visible <?php endif; ?>" id="deletePictureDocumentSpouse" href="#" onclick="deletePictureForm('DocumentSpouse','<?php echo e($legalRepresentative->id); ?>','<?php echo e($sales_id); ?>','<?php echo e($company->id); ?>')">
                                    <?php if($disable_status == null): ?>
                                        <img src="<?php echo e(asset('/images/menos.png')); ?>" style="width:20px;height:20px">
                                    <?php endif; ?>                                          </a>  
                            </center>
                        </form>
                    </div>
                    <div class="col-md-6" style="margin: 5px 0;">
                        <form class="col-md-12 border" method="post" id="upload_formService" name="upload_formService" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formService'" style="min-height:350px !important">
                            <?php echo e(csrf_field()); ?>    
                            <center><label class="registerForm">Planillas Servicios B??sicos</label></center>                            
                            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                             <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                            <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
                            <input type="hidden" id="uploadType" name="uploadType" value="Service">
                            <input type="hidden" id="uploadedFileService" name="uploadedFileService" value="<?php echo e($picture_service); ?>">
                                <div class="form-group" style="text-align: center;">
                                    <label class="registerForm" style="padding-bottom: 5%;">Copia de una planilla de servicios basicos</label>
                                </div>
                                <div style="width:100px !important;padding: 0" class="inside" id="fileNameService"></div>
                            <div class="alert" id="messageService" style="display: none"></div>
                            <center>
                                <div class="inputWrapper"><span id="uploaded_imageService"><?php echo $picture_service; ?></span>
                                    <center>
                                        <img src="<?php echo e(asset('images/mas.png')); ?>" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                    </center>
                                    <input class="fileInput" type="file" name="select_fileService" tabindex="4" onchange="fileNameFunction('Service')" id="select_fileService" <?php if($disable_status != null): ?> style="display:none" <?php endif; ?>>
                                </div>
                            </center>
                            <center>
                                <button type="submit" name="upload" id="uploadService" class="btn btn-primary <?php if($picture_service == null): ?> visible <?php else: ?> hidden <?php endif; ?>" tabindex="5" onclick="uploadPictureForm('Service')">
                                    <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                </button>
                                <a class="<?php if($picture_service == null): ?> hidden <?php else: ?> visible <?php endif; ?>" id="deletePictureService" href="#" onclick="deletePictureForm('Service','<?php echo e($legalRepresentative->id); ?>','<?php echo e($sales_id); ?>','<?php echo e($company->id); ?>')">
                                    <?php if($disable_status == null): ?>
                                        <img src="<?php echo e(asset('/images/menos.png')); ?>" style="width:20px;height:20px">
                                    <?php endif; ?>                                        
                                </a>  
                            </center>
                        </form>
                    </div>
                    <div class="col-md-6"  style="margin: 5px 0;">
                        <form class="col-md-12 border" method="post" id="upload_formConstitutionDeed" name="upload_formConstitutionDeed" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formConstitutionDeed'" style="min-height:350px !important">
                            <?php echo e(csrf_field()); ?>  
                            <center><label class="registerForm">Escritura de Constituci??n</label></center>
                            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                            <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                            <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
                            <input type="hidden" id="uploadType" name="uploadType" value="ConstitutionDeed">
                            <input type="hidden" id="uploadedFileConstitutionDeed" name="uploadedFileConstitutionDeed" value="<?php echo e($picture_constitution_deed); ?>">
                           
                            <div class="form-group" style="text-align: center;">
                                <label class="registerForm">Copia de la escritura de constituci??n y de sus reformas, de existirlas.</label>
                            </div>
                                <div class="alert" id="messageConstitutionDeed" style="display: none"></div>
                            <center>
                                <div style="width:100px !important;padding: 0" class="inside" id="fileNameConstitutionDeed"></div>
                                <div class="inputWrapper"><span id="uploaded_imageConstitutionDeed"><?php echo $picture_constitution_deed; ?></span>
                                    <center>
                                        <img src="<?php echo e(asset('images/mas.png')); ?>" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                    </center>
                                    <input class="fileInput" type="file" name="select_fileConstitutionDeed" tabindex="7" onchange="fileNameFunction('ConstitutionDeed')" id="select_fileConstitutionDeed" <?php if($disable_status != null): ?> style="display:none" <?php endif; ?>>
                                </div>
                            </center>
                            <center>
                                <button type="submit" name="upload" id="uploadConstitutionDeed" class="btn btn-primary <?php if($picture_constitution_deed == null): ?> visible <?php else: ?> hidden <?php endif; ?>" tabindex="8" onclick="uploadPictureForm('ConstitutionDeed')">
                                    <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                </button>
                                <a class="<?php if($picture_constitution_deed == null): ?> hidden <?php else: ?> visible <?php endif; ?>" id="deletePictureConstitutionDeed" href="#" onclick="deletePictureForm('ConstitutionDeed','<?php echo e($legalRepresentative->id); ?>','<?php echo e($sales_id); ?>','<?php echo e($company->id); ?>')">
                                    <?php if($disable_status == null): ?>
                                        <img src="<?php echo e(asset('/images/menos.png')); ?>" style="width:20px;height:20px">
                                    <?php endif; ?>                                          </a>  
                            </center>
                        </form>
                    </div>
                    <div class="col-md-6"  style="margin: 5px 0;">
                        <form class="col-md-12 border" method="post" id="upload_formCertificateAppointment" name="upload_formCertificateAppointment" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formCertificateAppointment'" style="min-height:350px !important">
                            <?php echo e(csrf_field()); ?>  
                            <center><label class="registerForm">Nombramiento</label></center>
                            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                            <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                            <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
                            <input type="hidden" id="uploadType" name="uploadType" value="CertificateAppointment">
                            <input type="hidden" id="uploadedFileCertificateAppointment" name="uploadedFileCertificateAppointment" value="<?php echo e($picture_certificate_appointment); ?>">
                           
                            <div class="form-group" style="text-align: center;">
                                <label class="registerForm">Copia certificada del nombramiento del representante legal o apoderado.</label>
                            </div>
                                <div class="alert" id="messageCertificateAppointment" style="display: none"></div>
                            <center>
                                <div style="width:100px !important;padding: 0" class="inside" id="fileNameCertificateAppointment"></div>
                                <div class="inputWrapper" style="margin-top:50px;"><span id="uploaded_imageCertificateAppointment"><?php echo $picture_certificate_appointment; ?></span>
                                    <center>
                                        <img src="<?php echo e(asset('images/mas.png')); ?>" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                    </center>
                                    <input class="fileInput" type="file" name="select_fileCertificateAppointment" tabindex="7" onchange="fileNameFunction('CertificateAppointment')" id="select_fileCertificateAppointment" <?php if($disable_status != null): ?> style="display:none" <?php endif; ?>>
                                </div>
                            </center>
                            <center>
                                <button type="submit" name="upload" id="uploadCertificateAppointment" class="btn btn-primary <?php if($picture_certificate_appointment == null): ?> visible <?php else: ?> hidden <?php endif; ?>" tabindex="8" onclick="uploadPictureForm('CertificateAppointment')">
                                    <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                </button>
                                <a class="<?php if($picture_certificate_appointment == null): ?> hidden <?php else: ?> visible <?php endif; ?>" id="deletePictureCertificateAppointment" href="#" onclick="deletePictureForm('CertificateAppointment','<?php echo e($legalRepresentative->id); ?>','<?php echo e($sales_id); ?>','<?php echo e($company->id); ?>')">
                                    <?php if($disable_status == null): ?>
                                        <img src="<?php echo e(asset('/images/menos.png')); ?>" style="width:20px;height:20px">
                                    <?php endif; ?>                                          </a>  
                            </center>
                        </form>
                    </div>
                    <div class="col-md-6"  style="margin: 5px 0;">
                        <form class="col-md-12 border" method="post" id="upload_formShareholdersPayroll" name="upload_formShareholdersPayroll" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formShareholdersPayroll'" style="min-height:350px !important">
                            <?php echo e(csrf_field()); ?>  
                            <center><label class="registerForm">N??mina de Accionistas</label></center>
                            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                            <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                            <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
                            <input type="hidden" id="uploadType" name="uploadType" value="ShareholdersPayroll">
                            <input type="hidden" id="uploadedFileShareholdersPayroll" name="uploadedFileShareholdersPayroll" value="<?php echo e($picture_shareholders_payroll); ?>">
                           
                            <div class="form-group" style="text-align: center;">
                                <label class="registerForm">N??mina actualizada de accionistas o socios, en la que consten los montos de acciones o participaciones obtenida por el cliente en el ??rgano de control competente o registro competente que lo regule.</label>
                            </div>
                                <div class="alert" id="messageShareholdersPayroll" style="display: none"></div>
                            <center>
                                <div style="width:100px !important;padding: 0" class="inside" id="fileNameShareholdersPayroll"></div>
                                <div class="inputWrapper" style="margin-top:80px;"><span id="uploaded_imageShareholdersPayroll"><?php echo $picture_shareholders_payroll; ?></span>
                                    <center>
                                        <img src="<?php echo e(asset('images/mas.png')); ?>" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                    </center>
                                    <input class="fileInput" type="file" name="select_fileShareholdersPayroll" tabindex="7" onchange="fileNameFunction('ShareholdersPayroll')" id="select_fileShareholdersPayroll" <?php if($disable_status != null): ?> style="display:none" <?php endif; ?>>
                                </div>
                            </center>
                            <center>
                                <button type="submit" name="upload" id="uploadShareholdersPayroll" class="btn btn-primary <?php if($picture_shareholders_payroll == null): ?> visible <?php else: ?> hidden <?php endif; ?>" tabindex="8" onclick="uploadPictureForm('ShareholdersPayroll')">
                                    <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                </button>
                                <a class="<?php if($picture_shareholders_payroll == null): ?> hidden <?php else: ?> visible <?php endif; ?>" id="deletePictureShareholdersPayroll" href="#" onclick="deletePictureForm('ShareholdersPayroll','<?php echo e($legalRepresentative->id); ?>','<?php echo e($sales_id); ?>','<?php echo e($company->id); ?>')">
                                    <?php if($disable_status == null): ?>
                                        <img src="<?php echo e(asset('/images/menos.png')); ?>" style="width:20px;height:20px">
                                    <?php endif; ?>                                          </a>  
                            </center>
                        </form>
                    </div>
                    <div class="col-md-6"  style="margin: 5px 0;">
                        <form class="col-md-12 border" method="post" id="upload_formCertificateObligations" name="upload_formCertificateObligations" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formCertificateObligations'" style="min-height:350px !important">
                            <?php echo e(csrf_field()); ?>  
                            <center><label class="registerForm">Certificado de Cumplimiento de Obligaciones</label></center>
                            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                            <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                            <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
                            <input type="hidden" id="uploadType" name="uploadType" value="CertificateObligations">
                            <input type="hidden" id="uploadedFileCertificateObligations" name="uploadedFileCertificateObligations" value="<?php echo e($picture_certificate_obligations); ?>">
                           
                            <div class="form-group" style="text-align: center;">
                                <label class="registerForm">Certificado de cumplimiento de obligaciones otorgado por el ??rgano de control competente.</label>
                            </div>
                                <div class="alert" id="messageCertificateObligations" style="display: none"></div>
                            <center>
                                <div style="width:100px !important;padding: 0" class="inside" id="fileNameCertificateObligations"></div>
                                <div class="inputWrapper" style="margin-top:50px;"><span id="uploaded_imageCertificateObligations"><?php echo $picture_certificate_obligations; ?></span>
                                    <center>
                                        <img src="<?php echo e(asset('images/mas.png')); ?>" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                    </center>
                                    <input class="fileInput" type="file" name="select_fileCertificateObligations" tabindex="7" onchange="fileNameFunction('CertificateObligations')" id="select_fileCertificateObligations" <?php if($disable_status != null): ?> style="display:none" <?php endif; ?>>
                                </div>
                            </center>
                            <center>
                                <button type="submit" name="upload" id="uploadCertificateObligations" class="btn btn-primary <?php if($picture_certificate_obligations == null): ?> visible <?php else: ?> hidden <?php endif; ?>" tabindex="8" onclick="uploadPictureForm('CertificateObligations')">
                                    <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                </button>
                                <a class="<?php if($picture_certificate_obligations == null): ?> hidden <?php else: ?> visible <?php endif; ?>" id="deletePictureCertificateObligations" href="#" onclick="deletePictureForm('CertificateObligations','<?php echo e($legalRepresentative->id); ?>','<?php echo e($sales_id); ?>','<?php echo e($company->id); ?>')">
                                    <?php if($disable_status == null): ?>
                                        <img src="<?php echo e(asset('/images/menos.png')); ?>" style="width:20px;height:20px">
                                    <?php endif; ?>                                          </a>  
                            </center>
                        </form>
                    </div>
                    <div class="col-md-6"  style="margin: 5px 0;">
                        <form class="col-md-12 border" method="post" id="upload_formFinancialState" name="upload_formFinancialState" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formFinancialState'" style="min-height:350px !important">
                            <?php echo e(csrf_field()); ?>  
                            <center><label class="registerForm">Estados Financieros</label></center>
                            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                            <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                            <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
                            <input type="hidden" id="uploadType" name="uploadType" value="FinancialState">
                            <input type="hidden" id="uploadedFileFinancialState" name="uploadedFileFinancialState" value="<?php echo e($picture_financial_state); ?>">
                           
                            <div class="form-group" style="text-align: center;">
                                <label class="registerForm">Estados financieros, m??nimo de un a??o atr??s. (Si la suma asegurada supera los USD 200.000,00 se deber?? presentar los estados financieros auditados).</label>
                            </div>
                                <div class="alert" id="messageFinancialState" style="display: none"></div>
                            <center>
                                <div style="width:100px !important;padding: 0" class="inside" id="fileNameFinancialState"></div>
                                <div class="inputWrapper" style="margin-top:60px;"><span id="uploaded_imageFinancialState"><?php echo $picture_financial_state; ?></span>
                                    <center>
                                        <img src="<?php echo e(asset('images/mas.png')); ?>" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                    </center>
                                    <input class="fileInput" type="file" name="select_fileFinancialState" tabindex="7" onchange="fileNameFunction('FinancialState')" id="select_fileFinancialState" <?php if($disable_status != null): ?> style="display:none" <?php endif; ?>>
                                </div>
                            </center>
                            <center>
                                <button type="submit" name="upload" id="uploadFinancialState" class="btn btn-primary <?php if($picture_financial_state == null): ?> visible <?php else: ?> hidden <?php endif; ?>" tabindex="8" onclick="uploadPictureForm('FinancialState')">
                                    <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                </button>
                                <a class="<?php if($picture_financial_state == null): ?> hidden <?php else: ?> visible <?php endif; ?>" id="deletePictureFinancialState" href="#" onclick="deletePictureForm('FinancialState','<?php echo e($legalRepresentative->id); ?>','<?php echo e($sales_id); ?>','<?php echo e($company->id); ?>')">
                                    <?php if($disable_status == null): ?>
                                        <img src="<?php echo e(asset('/images/menos.png')); ?>" style="width:20px;height:20px">
                                    <?php endif; ?>                                          </a>  
                            </center>
                        </form>
                    </div>
                    <div class="col-md-6" style="margin: 5px 0;" id="formSri" >
                            <form class="col-md-12 border" method="post" id="upload_formSri" name="upload_formSri" enctype="multipart/form-data" onsubmit="uploadPictureForm('upload_formSri'" style="min-height:350px !important">
                                <?php echo e(csrf_field()); ?>    
                                <center><label class="registerForm">Confirmaci??n de pago - SRI</label></center>                            
                                <input type="hidden" id="documentId" name="documentId" value="<?php echo e($legalRepresentative->id); ?>">
                                <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                                <input type="hidden" id="companyId" name="companyId" value="<?php echo e($company->id); ?>">
                                <input type="hidden" id="uploadType" name="uploadType" value="Sri">
                                <input type="hidden" id="uploadedFileSri" name="uploadedFileSri" value="<?php echo e($picture_sri); ?>">
                                    <div class="form-group" style="text-align: center;">
                                        <label class="registerForm">Confirmaci??n del pago del impuesto a la renta del a??o inmediato anterior o constancia de la informaci??n publicada por el Servicio de Rentas Internas (SRI) a trav??s de la p??gina web.</label>
                                    </div>
                                    <div style="width:100px !important;padding: 0" class="inside" id="fileNameSri"></div>
                                <div class="alert" id="messageSri" style="display: none"></div>
                                <center>
                                    <div class="inputWrapper" style="margin-top:70px;"><span id="uploaded_imageSri"><?php echo $picture_sri; ?></span>
                                        <center>
                                            <img src="<?php echo e(asset('images/mas.png')); ?>" alt="Girl in a jacket" style="width:20px;height:20px;margin-bottom: -100px;">
                                        </center>
                                        <input class="fileInput" type="file" name="select_fileSri" onchange="fileNameFunction('Sri')" id="select_fileSri" <?php if($disable_status != null): ?> style="display:none" <?php endif; ?>>
                                    </div>
                                </center>
                                <center>
                                    <button type="submit" name="upload" id="uploadSri" class="btn btn-primary <?php if($picture_sri == null): ?> visible <?php else: ?> hidden <?php endif; ?>" onclick="uploadPictureForm('Sri')">
                                        <span class="glyphicon glyphicon-upload"></span>???Subir Foto
                                    </button>
                                    <a class="<?php if($picture_sri == null): ?> hidden <?php else: ?> visible <?php endif; ?>" id="deletePictureSri" href="#" onclick="deletePictureForm('Sri','<?php echo e($legalRepresentative->id); ?>','<?php echo e($sales_id); ?>','<?php echo e($company->id); ?>')">
                                        <?php if($disable_status == null): ?>
                                            <img src="<?php echo e(asset('/images/menos.png')); ?>" style="width:20px;height:20px">
                                        <?php endif; ?>                                        
                                    </a>  
                                </center>
                            </form>
                        </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('pepDeclarationDiv')">
                    <a href="#" class="titleLink">T??rminos y Condiciones</a>
                    <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                </div>
                <div id="pepDeclarationDiv" class="col-md-12">
                    <div class="col-md-12" style="margin-top:15px;text-align: justify; font-size: 14px;margin-bottom: 10px;">
                        <div class="col-md-12" style="margin-bottom:15px;">
                            <div id="termChkAlert" class="alert alert-danger hidden">
                                <strong>Alerta!</strong> Por favor acepte los t??rminos y condiciones.
                            </div>
                            <input type="checkbox" id="termChk" name="termChk" <?php if($checked != null): ?> checked disabled="disabled" <?php endif; ?>> He le??do y acepto las condiciones generales de venta. <a href="<?php echo e(asset('/Condiciones_Generales_De_Venta.pdf')); ?>" target="_blank">Condiciones generales de venta</a>
                        </div>
                        <hr>  
                    </div>
                </div>
            </div>
            <hr>
            <div class="col-md-12" style="margin-top:5px;padding-top:15px;padding-bottom:15px">
                <div class="form-row" style="float:left">
                    <!--<a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" style="margin-left: -30px;"> Cancelar </a>-->
                </div>
                <div class="form-row" style="float:right">
                    <a id="fourthStepBtnBack" class="btn btn-back registerForm" align="right" href="#"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                    <?php if($disable_status == null): ?>
                        <a id="fourthStepBtnNext" class="btn btn-info registerForm" align="right" href="#"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                    <?php endif; ?>
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
                    <!--<a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" style="margin-left: -30px;"> Cancelar </a>-->
                </div>
                <div class="row" style="float:right">
                    <a id="fifthStepBtnBack" class="btn btn-back registerForm" align="right" href="#"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                    <a id="fifthStepBtnNext" class="btn btn-info registerForm" align="right" href="#"> Validar </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg hidden" data-toggle="modal" data-target="#myModal">Open Modal</button>
<!-- Modal Actividades Economicas -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Activades Econ??micas</h4>
            </div>
            <div class="modal-body">
                
                <form id="modalForm">
                    <div class="form-row">
                        <div class="col-md-12 input-group">
                            <label class="registerForm"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Busqueda de Actividad Econ??mica</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                            <input type="text2" id="searchEconomicActivity" name="searchEconomicActivity" class="form-control registerForm" required  placeholder="Busqueda de Actividad Econ??mica" onchange="removeInputRedFocus(this.id)"  maxlength="15" style="margin-right:5px;">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info"  onclick="economicActivitySearch()" style="margin-top:22px"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 input-group">
                            <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm"> Actividad Econ??mica</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                            <select id="economic_activity_search" name="economic_activity_search" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)">
                                <option value="">--Escoja Una--</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="closeModal" type="button" class="btn btn-default registerForm" data-dismiss="modal" style="float:left">Cerrar</button>
                <button type="button" class="btn btn-info registerForm" style="float:right" onclick="selectEconomicActivity()">Seleccionar</button>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.remote_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\magnussucre\resources\views\legalPersonVinculation\create.blade.php ENDPATH**/ ?>