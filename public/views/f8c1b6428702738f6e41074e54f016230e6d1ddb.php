

<?php $__env->startSection('content'); ?>
<script src="<?php echo e(assets('js/registerCustom.js')); ?>"></script>
<script src="<?php echo e(assets('js/vinculation/pj/terceros_juridica.js')); ?>"></script>
<link href="<?php echo e(assets('css/sales/create.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(assets('css/sales/index.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<?php if($secondary_email == null): ?>
<script>
$(document).ready(function () {
var div = document.getElementById('emailSecondaryForm');
$(div).fadeOut();
});</script>
<?php endif; ?>
<?php if($economic_activity != 6): ?>
<script>
    $(document).ready(function () {
    var div = document.getElementById('otherEconomicActivityDiv');
    $(div).fadeOut();
    });</script>
<?php endif; ?>
<?php if($other_monthly_income == null): ?>
<script>
    $(document).ready(function () {
    var div = document.getElementById('otherIncomeDiv');
    $(div).fadeOut();
    });</script>
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
<?php if($customer->document_id != 3): ?>
<script>
    $(document).ready(function () {
    var div = document.getElementById('passportFullDiv');
    $(div).fadeOut();
    });
</script>
<?php endif; ?>
<?php if($beneficiaryName == null): ?>
<script>
    $(document).ready(function () {
    var div = document.getElementById('beneficiaryDataDiv');
    $(div).fadeOut();
    div = document.getElementById('representanteDiv');
    $(div).fadeOut();
    div = document.getElementById('conyugueDiv');
    $(div).fadeOut();
    div = document.getElementById('tercerosDiv');
    $(div).fadeOut();
    div = document.getElementById('picturesDiv');
    $(div).fadeOut();
    
   
    
    });
</script>
<?php endif; ?>
<style>
    .form-row{
        margin-top: 15px;
        margin-bottom: 15px;
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
    td#tipo_empresa{
        font-size:12px;
        color:#003b71;
        padding:0px;
        background:white;
    }
    .move-left {
        width: auto;
        box-shadow: none;
        
    }
    #referenceTable td {
        border: 0.5px ridge rgb(204, 204, 204);
        text-align: center;
        font-size :10px !important;
        background:white;
    }
    #referenceTable th {
        border: 0.5px ridge rgb(204, 204, 204);
        text-align: center;
        
    }
    #referenceTable input{
        font-size :10px !important;
    }
    
    .row{
        margin-right:0px;
        margin-left:0px;

    }
    h4#declaracion{
        margin-top:30px !important;
    }

    .col-sm-4#firma,#firma_representante,#firma_representante_cedula,#firma_responsable_comercial, #fecha_firma_responsable_comercial{
        text-align:center !important;
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
    <div class="col-xs-12 col-md-10 col-md-offset-1 border">
        <div class="form-row">
            <div class="col-xs-12 registerForm" style="margin:12px;">
                <center>
                    <h4 style="font-weight:bold">FORMULARIO DE VINCULACI??N A TERCEROS <br>PERSONA JUR??DICA</h4>
                    <hr>
                    <h5>LA ENTREGA DE LA INFORMACI??N Y DOCUMENTACI??N SOLICITADA ES OBLIGATORIA</h5>
                </center>
            </div>
        </div>
       
        <div class="row">
            <div class="col-xs-12 col-md-3 wizard_inicial" style="padding-left:0px !important"><div id="firstStepWizard" class="wizard_activo registerForm">Informaci??n</div></div>
            <div class="col-xs-12 col-md-3 wizard_medio" style="padding-left:0px !important"><div id="secondStepWizard" class="wizard_inactivo registerForm">Actividad Econ??mica</div></div>
            <div class="col-xs-12 col-md-3 wizard_medio" style="padding-left:0px !important"><div id="thirdStepWizard" class="wizard_inactivo registerForm">Declaraci??n</div></div>
            <div class="col-xs-12 col-md-3 wizard_final" style="padding-right:0px !important"><div id="fourthStepWizard" class="wizard_inactivo registerForm">Documentaci??n</div></div>
        </div>

        <div id="firstStep" class="" style="margin-top:30px">
            <form id="firstStepForm" name="firstStepForm" method="POST" action="<?php echo e(asset('/user')); ?>" id="salesForm">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="documentId" name="documentId" value="<?php echo e($customer->id); ?>">
                <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                <div id="productAlert" class="alert alert-danger hidden">
                    <strong>??Alerta!</strong> Debe seleccionar un producto
                </div>
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px;margin-top:30px;">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('personalDiv')">
                        <a href="#" class="titleLink">DATOS DE LA COMPA????A</a>
                        <span style="float:left;margin-left:60%;margin-top: 4px;">Fecha: ___/___/___/</span>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="personalDiv" class="col-md-12">
                        <?php if($customer == false): ?>
                        <input type="hidden" id="customerCheck" value="0">
                        <?php else: ?>
                        <input type="hidden" id="customerCheck" value="1">
                        <?php endif; ?>
                     <div class="">
                            <div class="form-row">
                                    <!--<div class="form-group col-md-6">
                                        <label class="registerForm" for="first_name"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Nombre </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="first_name" name="first_name" class="form-control registerForm" required tabindex="1" placeholder="Nombre(s)" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                    </div>-->
                                    <div class="form-group col-md-6">
                                    <label class="registerForm" for="spouse_document_id"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Fecha de Constituci??n: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="fecha_constitucion" name="fecha_constitucion" class="form-control registerForm" required tabindex="5" placeholder="fecha de constituci??n" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                        <!--<label class="registerForm" for="document_id"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Tipo Documento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="document_id" name="document_id" class="form-control registerForm" required tabindex="5" onchange="removeInputRedFocus(this.id)" <?php if($customer != false): ?> disabled="disabled" <?php endif; ?> >
                                            <option value="">--Escoja Una---</option>
                                            <?php $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($customer != false): ?>
                                            <?php if($customer->document_id == $doc->id): ?>
                                            <option value="<?php echo e($doc->id); ?>" selected="selected"><?php echo e($doc->name); ?></option>
                                            <?php else: ?>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            <option value="<?php echo e($doc->id); ?>"><?php echo e($doc->name); ?></option>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select> -->
                                    </div>
                                   
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="ruc"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Ruc N??</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input  type="text" id="ruc" name="ruc" class="form-control registerForm" required tabindex="6" placeholder="N??mero de Identificaci??n" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                    <label class="registerForm" for="razon_social"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Raz??n Social:  </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="razon_social" name="razon_social" class="form-control registerForm" required tabindex="7" placeholder="razon_social" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <!--<div class="form-group col-md-6">
                                    <label class="registerForm" for="spouse_document_id"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Ingresos brutos anuales de la compa????a:  </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="ingresos_brutos" name="ingresos_brutos" class="form-control registerForm" required tabindex="9" placeholder="fecha de constituci??n" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                    </div>-->
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="actividad_economica"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Actividad Econ??mica: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input  type="text" id="actividad_economica" name="actividad_economica" class="form-control registerForm" required tabindex="8" placeholder="N??mero de Identificaci??n" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                   <!-- <div class="form-group col-md-6">
                                        <label class="registerForm" for="nationality"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Pa??s de Nacimiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <?php if($nationality_id == null ): ?>
                                            <select id="nationality" name="nationality" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)" tabindex="16" <?php echo e($disable_status); ?>>
                                        <?php else: ?>
                                            <input type="hidden" id="nationality" name="nationality" value="<?php echo e($nationality_id); ?>">
                                            <select class="form-control registerForm" required onchange="removeInputRedFocus(this.id)" disabled="disabled" tabindex="17">
                                        <?php endif; ?>
                                            <option value="">--Escoja Una--</option>
                                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($cou->id == $nationality_id): ?> selected="true" <?php endif; ?> value="<?php echo e($cou->id); ?>"><?php echo e($cou->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>-->
                                  <!--  <div class="form-group col-md-6">
                                        <label class="registerForm" for="actividad_economica"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Su empresa es: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <table><tr>
                                        <td id="tipo_empresa">Sociedad An??nima</td><td id="tipo_empresa"> <input  type="checkbox"   id="sociedad_anonima" name="sociedad_anonima" value="Sociedad An??nima" class="form-control move-left" required tabindex="10" placeholder="Sociedad An??nima" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td></td><td></td><td></td><td></td>
                                        </tr> 
                                        <tr>
                                        <td id="tipo_empresa">C??a. Limitada</td><td id="tipo_empresa"> <input  type="checkbox"   id="cia_limitada" name="cia_limitada" value="Compania Limitada" class="form-control move-left" required tabindex="11" placeholder="Compania Limitada" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td>
                                        </tr>
                                        <tr>
                                        <td id="tipo_empresa">Sociedad de Hecho</td><td id="tipo_empresa"> <input  type="checkbox"   id="sociedad_hecho" name="sociedad_hecho" value="Sociedad Hecho" class="form-control move-left" required tabindex="12" placeholder="Sociedad Hecho" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        <tr>
                                        <td id="tipo_empresa">P??blica</td><td id="tipo_empresa"> <input  type="checkbox"   id="publica" name="publica" value="Empresa P??blica" class="form-control move-left" required tabindex="13" placeholder="Empresa P??blica" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td>
                                        </tr>
                                        <tr>
                                        <td id="tipo_empresa">Privada</td><td id="tipo_empresa"> <input  type="checkbox"   id="privada" name="privada" value="Empresa Privada" class="form-control move-left" required tabindex="14" placeholder="Empresa Privada" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        <tr>
                                        <td id="tipo_empresa">ONG's</td><td id="tipo_empresa"> <input  type="checkbox"   id="ong" name="ong" value="ONG's" class="form-control move-left" required tabindex="15" placeholder="ONG" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td>
                                        </tr></table>

                                    </div>-->
                                </div>
                            </div>
                           <!-- <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="birth_date"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Fecha de Nacimiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="date" id="birth_date" name="birth_date" class="form-control registerForm" style="line-height: 15px !important" onchange="removeInputRedFocus(this.id)" value="<?php echo e($birth_date); ?>" <?php if($birth_date != null): ?> readonly="readonly" <?php endif; ?> tabindex="9" <?php echo e($disable_status); ?>>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="birth_city"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Ciudad de Nacimiento </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <?php if($birth_place == null): ?>
                                            <select id="birth_city" name="birth_city" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)" tabindex="18" <?php echo e($disable_status); ?>>
                                        <?php else: ?>
                                            <input type="hidden" id="birth_city" name="birth_city" value="<?php echo e($birth_place); ?>">
                                            <select class="form-control registerForm" required onchange="removeInputRedFocus(this.id)" disabled="disabled" tabindex="19">
                                        <?php endif; ?>
                                            <option value="">--Escoja Una---</option>
                                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($cit->id == $birth_place): ?> selected="true" <?php endif; ?> value="<?php echo e($cit->id); ?>"><?php echo e($cit->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <input type="hidden" id="birth_place" name="birth_place" value="<?php echo e($birth_place); ?>">
                                    </div>
                                </div>
                            </div>-->
                            <div class="form-row">
                                <div class="form-group">
                                <div class="form-group col-md-6">
                                        <label class="registerForm" for="country"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Pa??s</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="country" name="country" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)" tabindex="11" <?php echo e($disable_status); ?>>
                                            <option value="">--Escoja Una---</option>
                                            <?php $__currentLoopData = $countriesResidence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($cou->id == $country_id): ?> selected="true" <?php endif; ?> value="<?php echo e($cou->id); ?>"><?php echo e($cou->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                   <!-- <div class="form-group col-md-6">
                                        <label class="registerForm" for="civilState"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Estado Civil</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="civilState" name="civilState" class="form-control registerForm" required tabindex="10" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                            <option value="">--Escoja Una---</option>
                                            <?php $__currentLoopData = $civilStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($sta->id == $civil_state): ?> selected <?php endif; ?> value="<?php echo e($sta->id); ?>"><?php echo e($sta->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>-->
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                <div class="form-group col-md-6">
                                        <label class="registerForm" for="document_id"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Cant??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="canton" name="canton" class="form-control registerForm" required tabindex="13" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                            <option value="">--Escoja Una---</option>
                                            <?php if($addressCities != null): ?>
                                            <?php $__currentLoopData = $addressCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($cit->id == $city_id): ?> selected <?php endif; ?> value="<?php echo e($cit->id); ?>"><?php echo e($cit->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="document_id"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Provincia  </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="province" name="province" class="form-control registerForm" required tabindex="12" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                            <option selected="true" value="" disabled="disabled">--Escoja Una---</option>
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($prov->id == $province_id): ?> selected <?php endif; ?> value="<?php echo e($prov->id); ?>"><?php echo e($prov->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                           
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="numero_calle"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> N??</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="numero_calle" name="numero_calle" class="form-control registerForm" required tabindex="15" placeholder="N??" maxlength="10" onchange="removeInputRedFocus(this.id)" value="<?php echo e($address_number); ?>" <?php echo e($disable_status); ?> maxlength="30">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="parroquia"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Parroquia</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="parroquia" name="parroquia" class="form-control registerForm" required tabindex="15" placeholder="N??" maxlength="10" onchange="removeInputRedFocus(this.id)" value="<?php echo e($address_number); ?>" <?php echo e($disable_status); ?> maxlength="30">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                <div class="form-group col-md-6">
                                        <label class="registerForm" for="sector"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Sector</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="sector" name="sector" class="form-control registerForm" required tabindex="17" placeholder="Sector" maxlength="20" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="30">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="calle_principal"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Calle Principal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text2" id="calle_principal" name="calle_principal" class="form-control registerForm" required tabindex="14" placeholder="Calle Principal" onchange="removeInputRedFocus(this.id)" value="<?php echo e($main_road); ?>" <?php echo e($disable_status); ?> maxlength="90">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="calle_transversal"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Calle Transversal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="calle_transversal" name="calle_transversal" class="form-control registerForm" required tabindex="16" placeholder="Calle Transversal" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="50">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="phones"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Tel??fonos</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="phones" name="phones" class="form-control registerForm" required tabindex="19" placeholder="Tel??fonos" onchange="removeInputRedFocus(this.id)" value="<?php echo e($mobile_phone); ?>" <?php echo e($disable_status); ?> maxlength="10">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="celular"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Celular</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="celular" name="celular" class="form-control registerForm" required tabindex="22" placeholder="celular" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="9">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="email"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Email</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="email" id="email" name="email" class="form-control registerForm" required tabindex="18" placeholder="Correo" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="100">
                                        <p id="emailError" style="color:red;font-weight: bold"></p>  
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
              
                <hr>
                <div id="passportFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('passportDiv')">
                        <a href="#" class="titleLink">Pasaporte</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="passportDiv" class="col-md-12">
                        <div class="col-md-12" style="margin-bottom: -25px">
                            <div class="form-group col-md-6 form-group" style="margin-left:-15px">
                                <label class="registerForm" for="passportNumber"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> N??mero de Pasaporte</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="text" id="passportNumber" name="passportNumber" class="form-control registerForm" required tabindex="20" placeholder="N??mero de Pasaporte" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="registerForm" for="passportBeginDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Fecha de Emisi??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="date" id="passportBeginDate" name="passportBeginDate" class="form-control registerForm" required tabindex="21"  style="line-height: 15px !important;width:96%" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label class="registerForm" for="passportEndDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Fecha de Caducidad</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="date" id="passportEndDate" name="passportEndDate" class="form-control registerForm" required tabindex="22"  style="line-height: 15px !important" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                            </div>
                        </div>
                        <div class="col-md-12" style="margin-top: -25px">
                            <div id=""  class="form-group col-md-6 form-group" style="margin-left:-15px">
                                <label class="registerForm" for="migratoryState"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>  Estado migratorio o C??digo de VISA:</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <select id="migratoryState" name="migratoryState" class="form-control registerForm" required tabindex="23" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                    <option selected="true" value="">--Escoja Una---</option>
                                    <?php $__currentLoopData = $migratoryStates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($sta->id); ?>"><?php echo e($sta->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>   
                            </div>
                            <div class="form-group col-md-6 form-group" style="float:right; margin-right: -15px;width:52%">                                
                                <label class="registerForm" for="passportEntryDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Fecha de Ingreso al pa??s</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                <input type="date" id="passportEntryDate" name="passportEntryDate" class="form-control registerForm" required tabindex="24"  style="line-height: 15px !important;width:96%" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                            </div>
                        </div>
                    </div>
                </div>
              <!--  <div id="spouseFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px">
                    <div class="wizard_activo registerForm titleDiv " onclick="fadeToggle('spouseDiv')">
                        <a href="#" class="titleLink">Datos del C??nyuge o Conviviente</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="spouseDiv" class="col-md-12">
                        <div class="">
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="passportBeginDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Documento de Identidad C??nyuge</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="spouseDocument" name="spouseDocument" class="form-control registerForm" required tabindex="25"  style="line-height: 15px !important;width:96%" value="<?php echo e($spouse_document); ?>" placeholder="Documento de Identidad C??nyuge" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                    </div>
                                   
                                   
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="passportEndDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Nombre(s) del C??nyuge</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="spouseFirstName" name="spouseFirstName" class="form-control registerForm" required tabindex="27"  style="line-height: 15px !important" value="<?php echo e($spouse_name); ?>" placeholder="Nombre del C??nyuge" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?> maxlength="60">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="passportEndDate"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Apellido(s) del C??nyuge </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="spouseLastName" name="spouseLastName" class="form-control registerForm" required tabindex="28"  style="line-height: 15px !important" value="<?php echo e($spouse_last_name); ?>" placeholder="Apellido(s) del C??nyuge" onchange="removeInputRedFocus(this.id)" value="<?php echo e($spouse_last_name); ?>" <?php echo e($disable_status); ?> maxlength="60">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
                <hr>
                <br>
                
                <div id="beneficiaryFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('representanteDiv')">
                        <a href="#" class="titleLink">Datos del Representante Legal o Apoderado:</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="representanteDiv" class="col-md-12">
                    
                    <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                    <label class="registerForm" for="representante_apellidos"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Apellidos </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="representante_apellidos" name="representante_apellidos" class="form-control registerForm" required tabindex="5" placeholder="apellidos" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                      
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_nombres"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Nombres</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="representante_nombres" name="representante_nombres" class="form-control registerForm" required tabindex="6" placeholder="nombres" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                    <label class="registerForm" for="lugar_nacimiento"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Lugar de nacimiento</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="representante_lugar_nacimiento" name="representante_lugar_nacimiento" class="form-control registerForm" required tabindex="7" placeholder="Lugar de nacimiento" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="fecha_nacimiento"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Fecha de nacimiento </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input  type="text" id="representante_fecha_nacimiento" name="representante_fecha_nacimiento" class="form-control registerForm" required tabindex="8" placeholder="fecha de nacimiento" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    --<div class="form-group col-md-6">
                                        <label class="registerForm" for="actividad_economica"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>C??dula /Pasaporte: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <table><tr>
                                        <td id="tipo_empresa">C??dula</td><td id="tipo_empresa"> <input  type="checkbox"   id="cedula" name="cedula" value="cedula" class="form-control move-left" required tabindex="10" placeholder="cedula" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td></td><td></td>
                                        </tr> 
                                        <tr>
                                        <td id="tipo_empresa">Pasaporte</td><td id="tipo_empresa"> <input  type="checkbox"   id="pasaporte" name="pasaporte" value="pasaporte" class="form-control move-left" required tabindex="11" placeholder="pasaporte" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td>
                                        </tr>
                                      </table>

                                    </div>
                                    <div class="form-group col-md-6">
                                    <label class="registerForm" for="representante_cedula_pasaporte"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>C??dula /Pasaporte No.:   </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="representante_cedula_pasaporte" name="representante_cedula_pasaporte" class="form-control registerForm" required tabindex="9" placeholder="cedula/pasaporte" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                <div class="form-group col-md-6">
                                    <label class="registerForm" for="representante_nacionalidad"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Nacionalidad:   </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="representante_nacionalidad" name="representante_nacionalidad" class="form-control registerForm" required tabindex="9" placeholder="representante_nacionalidad" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="actividad_economica"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Estado Civil: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <table><tr>
                                        <td id="tipo_empresa">Soltero/a:</td><td id="tipo_empresa"> <input  type="checkbox"   id="soltero" name="soltero" value="Sociedad An??nima" class="form-control move-left" required tabindex="10" placeholder="soltero" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td></td><td></td><td></td><td></td>
                                        </tr> 
                                        <tr>
                                        <td id="tipo_empresa">Uni??n de Hecho:</td><td id="tipo_empresa"> <input  type="checkbox"   id="union_de_hecho" name="union_de_hecho" value="union_de_hecho" class="form-control move-left" required tabindex="11" placeholder="Compania Limitada" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td>
                                        </tr>
                                        <tr>
                                        <td id="tipo_empresa">Casado/a:</td><td id="tipo_empresa"> <input  type="checkbox"   id="casado" name="casado" value="Sociedad Hecho" class="form-control move-left" required tabindex="12" placeholder="casado" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        <tr>
                                        <td id="tipo_empresa">Divorciado/a:</td><td id="tipo_empresa"> <input  type="checkbox"   id="divorciado" name="divorciado" value="Empresa P??blica" class="form-control move-left" required tabindex="13" placeholder="divorciado" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td>
                                        </tr>
                                        <tr>
                                        <td id="tipo_empresa">Viudo/a:</td><td id="tipo_empresa"> <input  type="checkbox"   id="viudo" name="viudo" value="Empresa Privada" class="form-control move-left" required tabindex="14" placeholder="viudo" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        </table>

                                </div>
                                    
                                   
                            </div>
                                <!--<div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                    <label class="registerForm" for="representante_fecha_nombramiento"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Fecha Nombramiento: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="representante_fecha_nombramiento" name="representante_fecha_nombramiento" class="form-control registerForm" required tabindex="7" placeholder="fecha de nombramiento" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_profesion"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Profesi??n:  </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="representante_profesion" name="representante_profesion" class="form-control registerForm" required tabindex="8" placeholder="profesi??n" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>">
                                    </div>
                                </div>
                            </div>-->
                            </div>
                           
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="country"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Pa??s</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="representante_pais" name="representante_pais" class="form-control registerForm" required onchange="removeInputRedFocus(this.id)" tabindex="11" <?php echo e($disable_status); ?>>
                                            <option value="">--Escoja Una---</option>
                                            <?php $__currentLoopData = $countriesResidence; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cou): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($cou->id == $country_id): ?> selected="true" <?php endif; ?> value="<?php echo e($cou->id); ?>"><?php echo e($cou->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_provincia"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Provincia  </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="representante_provincia" name="representante_provincia" class="form-control registerForm" required tabindex="12" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                            <option selected="true" value="" disabled="disabled">--Escoja Una---</option>
                                            <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($prov->id == $province_id): ?> selected <?php endif; ?> value="<?php echo e($prov->id); ?>"><?php echo e($prov->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                           
                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="document_id"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Cant??n</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <select id="representante_canton" name="representante_canton" class="form-control registerForm" required tabindex="13" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?>>
                                            <option value="">--Escoja Una---</option>
                                            <?php if($addressCities != null): ?>
                                            <?php $__currentLoopData = $addressCities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($cit->id == $city_id): ?> selected <?php endif; ?> value="<?php echo e($cit->id); ?>"><?php echo e($cit->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_parroquia"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Parroquia</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="representante_parroquia" name="representante_parroquia" class="form-control registerForm" required tabindex="15" placeholder="representante_parroquia" maxlength="10" onchange="removeInputRedFocus(this.id)" value="<?php echo e($address_number); ?>" <?php echo e($disable_status); ?> maxlength="30">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group">
                                <div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_calle_principal"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Calle Principal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text2" id="representante_calle_principal" name="representante_calle_principal" class="form-control registerForm" required tabindex="14" placeholder="Calle Principal" onchange="removeInputRedFocus(this.id)" value="<?php echo e($main_road); ?>" <?php echo e($disable_status); ?> maxlength="90">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_numero_calle"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> No</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="representante_numero_calle" name="representante_numero_calle" class="form-control registerForm" required tabindex="16" placeholder="No" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="50">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-row">
                                <div class="form-group">
                                <!--<div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_transversal"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Transversal</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text2" id="representante_transversal" name="representante_transversal" class="form-control registerForm" required tabindex="14" placeholder="transversal" onchange="removeInputRedFocus(this.id)" value="<?php echo e($main_road); ?>" <?php echo e($disable_status); ?> maxlength="90">
                                </div>-->
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_sector"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Sector </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="email" id="representante_sector" name="representante_sector" class="form-control registerForm" required tabindex="18" placeholder="sector" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="100">
                                        <p id="emailError" style="color:red;font-weight: bold"></p>  
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                <!--<div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_cargo_actual"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span> Cargo Actual: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text2" id="representante_cargo_actual" name="representante_cargo_actual" class="form-control registerForm" required tabindex="14" placeholder="cargo_actual" onchange="removeInputRedFocus(this.id)" value="<?php echo e($main_road); ?>" <?php echo e($disable_status); ?> maxlength="90">
                                </div>-->
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_email"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Email: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="email" id="representante_email" name="representante_email" class="form-control registerForm" required tabindex="18" placeholder="email" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="100">
                                        <p id="emailError" style="color:red;font-weight: bold"></p>  
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                <div class="form-group col-md-6">
                                        <label class="registerForm" for="representante_telefono"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Tel??fono Residencial: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text2" id="representante_telefono" name="representante_telefono" class="form-control registerForm" required tabindex="14" placeholder="telefono_residencial" onchange="removeInputRedFocus(this.id)" value="<?php echo e($main_road); ?>" <?php echo e($disable_status); ?> maxlength="90">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="celular"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Celular No.: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="email" id="representante_celular" name="representante_celular" class="form-control registerForm" required tabindex="18" placeholder="celular" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="100">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                               
                                    
                                </div>
                            </div>
                           

    
                           
                    </div>
                </div>
                <hr>
                <br>

                
               <!-- <div id="beneficiaryFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('conyugueDiv')">
                        <a href="#" class="titleLink">Datos del C??nyuge o Conviviente del Representante Legal o Apoderado (si aplica):</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="conyugueDiv" class="col-md-12">
                    
                    <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                    <label class="registerForm" for="conyugue_apellidos"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Apellidos </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="conyugue_apellidos" name="conyugue_apellidos" class="form-control registerForm" required tabindex="5" placeholder="apellidos" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                      
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="conyugue_nombres"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Nombres</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input  type="text" id="conyugue_nombres" name="conyugue_nombres" class="form-control registerForm" required tabindex="6" placeholder="nombres" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <div class="form-group col-md-6">
                                    <label class="registerForm" for="lugar_nacimiento"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>C??dula /Pasaporte No.: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="conyugue_cedula" name="conyugue_cedula" class="form-control registerForm" required tabindex="7" placeholder="conyugue_cedula" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="registerForm" for="fecha_nacimiento"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Nacionalidad </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="conyugue_nacionalidad" name="conyugue_nacionalidad" class="form-control registerForm" required tabindex="8" placeholder="conyugue_nacionalidad" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>">
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                </div> -->
                
             
                
                
                <div class="col-xs-12 col-md-12" style="padding-left:0px !important;">
                    <div class="form-row">
                        <div class="form-group">
                            <div class="form-group">
                            </div>
                            <div class="form-group" style="float:right">
                                <a id="firstStepBtnNext" class="btn btn-info registerForm" align="right" tabindex="36" href="#"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="secondStep" class="hidden" style="margin-top:30px">
            <form id="secondStepForm" name="secondStepForm" method="POST" action="<?php echo e(asset('/user')); ?>" id="salesForm">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="documentId" name="documentId" value="<?php echo e($customer->id); ?>">
                <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                <div id="beneficiaryFullDiv" class="col-xs-12 col-md-12 border" style="padding-left:0px !important;">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('tercerosDiv')">
                        <a href="#" class="titleLink">SITUACI??N FINANCIERA</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="tercerosDiv" class="col-md-12">
                        <div class="">
                            
                        </div>
                        <span id="tercerosDataDiv" style="margin-top:-25px;">
                            <div class="">
                                <div class="form-row">
                                    <div class="form-group">
                                        <div class="form-group col-md-12">
                                           
                                            <br>
                                            
                                            <div class="form-group">
                                            <div class="form-group col-md-6">
                                                <label class="registerForm" for="ingresos_brutos_terceros"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Ingresos brutos anuales declarados en el a??o anterior:  </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                                <input type="text" id="ingresos_brutos_terceros" name="ingresos_brutos_terceros" class="form-control registerForm" required tabindex="5" placeholder="ingresos_brutos" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->first_name); ?>" maxlength="30">
                                      
                                            </div>
                                         
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                              
                               
                            </div>
                            <div class="col-md-12" style="text-align: justify;">
                            </div>
                        </span>
                    </div>
                </div>
        
            
              
                
                            <div class="form-row" style="float:right">
                                <a id="secondStepBtnBack" class="btn btn-back registerForm" align="right" href="#"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                                <a id="secondStepBtnNext" class="btn btn-info registerForm" align="right" href="#"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                            </div>
               
           
               
            </form>
        </div>
        <div id="thirdStep" class="hidden" style="margin-top:30px">
            <form id="thirdStepForm" name="thirdStepForm" method="POST" action="<?php echo e(asset('/user')); ?>" id="salesForm">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" id="documentId" name="documentId" value="<?php echo e($customer->id); ?>">
                <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px;margin-top:30px;">
                    <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('pepDeclarationDiv')">
                        <a href="#" class="titleLink">Declaraci??n y Autorizaci??n</a>
                        <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                    </div>
                    <div id="pepDeclarationDiv" class="col-md-12">
                        <div class="" style="text-align: justify; font-size: 14px;margin-bottom: 10px;">
                            <div class="col-md-12" style="margin-top:10px;">
                                <div class="form-group">
                                    <h4 id="declaracion" class="declaracion">Declaraci??n</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                Declaro que la informaci??n contenida en este formulario, as?? como toda la documentaci??n presentada, es verdadera, completa y proporciona la informaci??n de modo confiable y actualizada. Adem??s, declaro conocer y aceptar que es mi obligaci??n como cliente actualizar anualmente estos datos, as?? como el comunicar y documentar de manera inmediata a la compa????a cualquier cambio en la informaci??n que hubiere proporcionado. Durante la vigencia de la relaci??n con Seguros Sucre S.A., me comprometo a proveer de la documentaci??n e informaci??n que me sea solicitada.
                            </div>
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                El asegurado declara expresamente que el seguro aqu?? convenido ampara bienes de procedencia l??cita, no ligados con actividades de narcotr??fico, lavado de dinero o cualquier otra actividad tipificada en la Ley Org??nica de Prevenci??n, Detecci??n y Erradicaci??n del Delito de Lavado de Activos y del Financiamiento de Delitos. Igualmente, la prima a pagar por este concepto tiene origen l??cito y ninguna relaci??n con las actividades mencionadas anteriormente. Eximo a Seguros Sucre S.A. de toda responsabilidad, inclusive respecto a terceros, si esta declaraci??n fuese falsa o err??nea. En caso de que se inicien investigaciones sobre mi persona, relacionadas con las actividades antes se??aladas o de producirse transacciones inusuales o injustificadas, Seguros Sucre S.A., podr?? proporcionar a las autoridades competentes toda la informaci??n que tenga sobre las mismas o que le sea requerida. En tal sentido renuncio a presentar en contra de Seguros Sucre S.A., sus funcionarios o empleados, cualquier reclamo o acci??n legal, judicial, extrajudicial, administrativa, civil penal o arbitral en la eventualidad de producirse tales hechos.
                            </div>  
                            <hr>
                            <?php if($person_exposed == null): ?>
                                <div class="col-md-12" style="margin-bottom:15px;">
                                    Declaraci??n sobre la condici??n de Persona Expuesta Pol??ticamente PEP (Persona que desempe??a o ha desempe??ado funciones p??blicas en el pa??s o en el exterior). Informo que he le??do la Lista M??nima de Cargos P??blicos a ser considerados "Personas Expuestas Pol??ticamente" y declaro bajo juramento que <label class="radio-inline" style="padding-left:5px;padding-right: 5px;">Si <input type="radio" name="optradio3" value="yes" style="margin-left:5px;margin-top: 0px;" <?php echo e($disable_status); ?>></label> <label class="radio-inline" style="padding-left:5px; padding-right:15px;">No <input type="radio" name="optradio3" value="no" checked style="margin-left:5px;margin-top: 0px;" <?php echo e($disable_status); ?>></label><br> me encuentro ejerciendo uno de los cargos incluidos en la lista o lo ejerc?? hace un a??o atr??s. En el caso de que la respuesta sea positiva, indicar: Cargo/Funci??n/Jerarqu??a:  <input type="text2" id="pep_client" name="pep_client" class="form-control registerForm" required tabindex="2" placeholder="Cargo/Funci??n/Jerarqu??a" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?>>
                                    Nota: La presente declaraci??n no constituye una autoincriminaci??n de ninguna clase, ni conlleva ninguna responsabilidad administrativa, civil o penal.
                                </div>
                            <?php else: ?>
                                <div class="col-md-12" style="margin-bottom:15px;">
                                    Declaraci??n sobre la condici??n de Persona Expuesta Pol??ticamente PEP (Persona que desempe??a o ha desempe??ado funciones p??blicas en el pa??s o en el exterior). Informo que he le??do la Lista M??nima de Cargos P??blicos a ser considerados "Personas Expuestas Pol??ticamente" y declaro bajo juramento que <label class="radio-inline" style="padding-left:5px;padding-right: 5px;">Si <input type="radio" name="optradio3" value="yes" <?php if($person_exposed == 'yes'): ?> checked <?php endif; ?> style="margin-left:5px;margin-top: 0px;"<?php echo e($disable_status); ?>></label> <label class="radio-inline" style="padding-left:5px; padding-right:15px;" <?php echo e($disable_status); ?>>No <input type="radio" name="optradio3" value="no" <?php if($person_exposed == 'no'): ?> checked <?php endif; ?> style="margin-left:5px;margin-top: 0px;"></label><br> me encuentro ejerciendo uno de los cargos incluidos en la lista o lo ejerc?? hace un a??o atr??s. En el caso de que la respuesta sea positiva, indicar: Cargo/Funci??n/Jerarqu??a:  <input type="text2" id="pep_client" name="pep_client" class="form-control registerForm" required tabindex="2" placeholder="Cargo/Funci??n/Jerarqu??a" onchange="removeInputRedFocus(this.id)" value="<?php echo e($pep_client); ?>" <?php echo e($disable_status); ?>>
                                    Nota: La presente declaraci??n no constituye una autoincriminaci??n de ninguna clase, ni conlleva ninguna responsabilidad administrativa, civil o penal.
                                </div>
                            <?php endif; ?>
                            <hr>
                            <br>
                            <div class="col-md-12" style="margin-top:-25px;">
                                <div class="form-group">
                                    <h4 id="declaracion">Autorizaci??n</h4>
                                </div>
                            </div>  
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                Siendo conocedor de las disposiciones legales, autorizo expresamente en forma libre, voluntaria e irrevocable a Seguros Sucre S. A., a realizar el an??lisis y las verificaciones que considere necesarias para corroborar la licitud de fondos y bienes comprendidos en el contrato de seguro e informar a las autoridades competentes si fuera el caso; adem??s autorizo expresa, voluntaria e irrevocablemente a todas las personas naturales o jur??dicas de derecho p??blico o privado a facilitar a Seguros Sucre S.A. toda la informaci??n que ??sta les requiera  y revisar los bur?? de cr??dito sobre mi informaci??n de riesgos crediticios. 
                            </div>

                          

                            <div class="row">
                                
                                    <div class="col-sm-4">
                                       
                                    </div>
                                    <div  id="firma" class="col-sm-4">
                                        <input type="text" id="firma_representante" name="firma_representante" class="form-control registerForm" required tabindex="18" placeholder="firma_representante" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="100">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        
                                    </div>
                                
                            </div>
                            <div class="row">
                                
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div id="firma" class="col-sm-4">
                                        <label class="registerForm" for="firma_representante"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Firma </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="firma_representante_cedula" name="firma_representante_cedula" class="form-control registerForm" required tabindex="18" placeholder="firma_representante_cedula" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="100">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        
                                    </div>
                                
                            </div>
                            <div class="row">
                                
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div  id="firma" class="col-sm-4">
                                        <label class="registerForm" for="celular"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>C.I </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        
                                    </div>
                                
                            </div>

                            

                           

                           

                            
                            
                            
                        </div>
                        
                   

                    <div id="sucreExclusivoDiv" class="col-md-12">
                        <div class="" style="text-align: justify; font-size: 14px;margin-bottom: 10px;">
                            <div class="col-md-12" style="margin-top:10px;">
                                <div class="form-group">
                                    <h4 id="declaracion" class="declaracion">USO EXCLUSIVO DE SEGUROS SUCRE S.A.</h4>
                                    <h5>Datos de la Relaci??n Comercial:</h5>
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                                <div class="form-group col-md-6">
                                        <table><tr>
                                        <td id="tipo_empresa"> Nueva:</td><td id="tipo_empresa"> <input  type="checkbox"   id="datos_nueva" name="datos_nueva" value="datos_nueva" class="form-control move-left" required tabindex="10" placeholder="datos_nueva" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td></td><td></td><td></td><td></td>
                                        </tr> 
                                        <tr>
                                        <td id="tipo_empresa">Renovaci??n:</td><td id="tipo_empresa"> <input  type="checkbox"   id="datos_renovacion" name="datos_renovacion" value="udatos_renovacion" class="form-control move-left" required tabindex="11" placeholder="datos_renovacion" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td>
                                        </tr>
                                        <tr>
                                        <td id="tipo_empresa">Ramo:</td><td id="tipo_empresa"> <input  type="checkbox"   id="datos_ramo" name="datos_ramo" value="datos_ramo" class="form-control move-left" required tabindex="12" placeholder="datos_ramo" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        <tr>
                                        <td id="tipo_empresa">Suma Asegurada</td><td id="tipo_empresa"> <input  type="checkbox"   id="datos_suma_asegurada" name="datos_suma_asegurada" value="datos_suma_asegurada" class="form-control move-left" required tabindex="13" placeholder="datos_suma_asegurada" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td><td id="tipo_empresa"></td>
                                        </tr>
                                        <tr>
                                        <td id="tipo_empresa">Canal de Vinculaci??n:</td><td id="tipo_empresa"> <input  type="checkbox"   id="datos_canal_vinculacion" name="datos_canal_vinculacion" value="datos_canal_vinculacion" class="form-control move-left" required tabindex="14" placeholder="datos_canal_vinculacion" disabled="disabled" onchange="removeInputRedFocus(this.id)" value="<?php echo e($customer->document); ?>"></td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        </table>

                                </div>

                            </div>
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                            </div>  
                            
                      
                            <br>
                            <div class="col-md-12" style="margin-top:-25px;">
                                <div class="form-group">
                                    <h4 id="declaracion">Nombre y firma del Ejecutivo que verifica la documentaci??n e informaci??n:</h4>
                                </div>
                            </div>
                            <br>  

                            <div class="col-md-12">
                                <div class="form-group">
                                <label class="registerForm" for="representante_telefono"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Nombres Completos: </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="nombres_ejecutivo" name="nombres_ejecutivo" class="form-control registerForm" required tabindex="14" placeholder="nombres_ejecutivo" onchange="removeInputRedFocus(this.id)" value="<?php echo e($main_road); ?>" <?php echo e($disable_status); ?> maxlength="90">
                                </div>
                            </div>
                            <hr>
                            <div class="col-md-12" style="margin-bottom:15px;">
                            Confirmo que he revisado la razonabilidad de la informaci??n proporcionada por el pagador y declaro que he verificado la documentaci??n e informaci??n solicitada de acuerdo a lo establecido en la pol??tica "Conozca su Cliente" y he analizado la informaci??n respecto a la actividad econ??mica e ingresos, los cuales concuerdan con los productos solicitados.                            </div>

                          

                            <div class="row">
                                
                                    <div class="col-sm-4">
                                       
                                    </div>
                                    <div  id="firma" class="col-sm-4">
                                        <input type="text" id="firma_responsable_comercial" name="firma_responsable_comercial" class="form-control registerForm" required tabindex="18" placeholder="firma_responsable_comercial" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="100">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        
                                    </div>
                                
                            </div>
                            <div class="row">
                                
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div id="firma" class="col-sm-4">
                                        <label class="registerForm" for="firma_responsable_comercial"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Firma del Responsable Comercial  </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        <input type="text" id="fecha_firma_responsable_comercial" name="fecha_firma_responsable_comercial" class="form-control registerForm" required tabindex="18" placeholder="fecha" onchange="removeInputRedFocus(this.id)" value="" <?php echo e($disable_status); ?> maxlength="100">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        
                                    </div>
                                
                            </div>
                            <div class="row">
                                
                                    <div class="col-sm-4">
                                        
                                    </div>
                                    <div  id="firma" class="col-sm-4">
                                        <label class="registerForm" for="fecha"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff"></span>Fecha </label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        
                                        
                                    </div>
                                
                            </div>

                            

                           
</div>
                           

                            
                            
                            
                        </div>
                        
                    </div>
                    <input type="hidden" id="exposedPersonInput" name="exposedPersonInput" value="<?php echo e($person_exposed); ?>">
                </div>
                <div class="col-md-12" style="margin-top:5px;padding-top:15px;padding-bottom:15px">
                    <div class="form-row" style="float:left">
                        <!--<a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" style="margin-left: -30px;"> Cancelar </a>-->
                    </div>
                    <div class="form-row" style="float:right">
                        <a id="thirdStepBtnBack" class="btn btn-back registerForm" align="right" href="#"><span class="glyphicon glyphicon-step-backward"></span> Anterior </a>
                        <a id="thirdStepBtnNext" class="btn btn-info registerForm" align="right" href="#"> Siguiente <span class="glyphicon glyphicon-step-forward"></span></a>
                    </div>
                </div>
            </form>
        </div>
        <div id="fourthStep" class="hidden" style="margin-top:30px">
            <!--<form id="fourthStepForm" name="fourthtepForm" method="POST" action="<?php echo e(asset('/user')); ?>" id="salesForm">-->
            <?php echo e(csrf_field()); ?>

            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($customer->id); ?>">
            <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
            <div class="col-xs-12 col-md-12 border" style="padding-left:0px !important;margin-bottom: 5px;margin-top:30px;">
                <div class="wizard_activo registerForm titleDiv" onclick="fadeToggle('picturesDiv')">
                    <a href="#" class="titleLink">DOCUMENTOS REQUERIDOS - PERSONA JUR??DICA</a>
                    <span style="float:right;margin-right:1%;margin-top: 4px;" class="glyphicon glyphicon-chevron-down"></span>
                </div>
                <div id="picturesDiv" class="col-md-12" style="margin-top:25px;">
                    <div class="col-md-6" style="margin: 5px 0;">
                            <?php echo e(csrf_field()); ?>    
                            <center><label class="registerForm">DOCUMENTOS REQUERIDOS - PERSONA JUR??DICA</label></center>
                            <input type="hidden" id="documentId" name="documentId" value="<?php echo e($customer->id); ?>">
                            <input type="hidden" id="saleId" name="saleId" value="<?php echo e($sales_id); ?>">
                            
                            <div class="form-group">
                                <ul>
                                    <li>Copia del registro ??nico de contribuyentes (RUC) o n??mero an??logo.</li>
                                    <li>Copia del documento de identificaci??n del representante legal o apoderado.</li>
                                    <li>Copia certificada del nombramiento del representante legal o apoderado.</li>
                                </ul>
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
        <div id="fifthStep" class="hidden" style="margin-top:30px">
            <div class="col-xs-12 col-md-12 border" style="margin-top:30px">
                <div id="fifthStepAlert" class="alert hidden">
                    <center> <strong>Se ha completado el Formulario de Vinculaci??n, su asesor de venta pronto se pondra en contacto con usted.</strong></center>
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
                <div class="form-row" style="float:left">
                    <!--<a class="btn btn-default registerForm" align="right" href="<?php echo e(asset('/sales')); ?>" style="margin-left: -30px;"> Cancelar </a>-->
                </div>
                <div class="form-row" style="float:right">
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
                <h4 class="modal-title">Activades Economicas</h4>
            </div>
            <div class="modal-body">
                
                <form id="modalForm">
                    <div class="form-row">
                        <div class="col-md-12 input-group">
                            <label class="registerForm"><span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span> Busqueda de Actividad Economica</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
                            <input type="text2" id="searchEconomicActivity" name="searchEconomicActivity" class="form-control registerForm" required  placeholder="Busqueda de Actividad Economica" onchange="removeInputRedFocus(this.id)" <?php echo e($disable_status); ?> maxlength="15" style="margin-right:5px;">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info" <?php if($disable_status): ?> disabled="disabled" <?php else: ?> <?php endif; ?> onclick="economicActivitySearch()" style="margin-top:22px"><span class="glyphicon glyphicon-search"></span></button>
                            </span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 input-group">
                            <span class="glyphicon glyphicon-asterisk" style="color:#0099ff">&ensp;</span><label class="registerForm"> Actividad Economica</label><span name="spanRequired" class="hidden" style="color:red;font-weight:bold"> * Requerido</span>
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

<?php echo $__env->make('layouts.remote_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\magnussucre\resources\views/massivesVinculation/tercerosPerson/create.blade.php ENDPATH**/ ?>