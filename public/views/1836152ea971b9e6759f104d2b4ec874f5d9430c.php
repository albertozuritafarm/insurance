

<?php $__env->startSection('content'); ?>
<!--<div class="se-pre-con"></div>-->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<link href="<?php echo e(assets('css/sales/productSelect.css')); ?>" rel="stylesheet" type="text/css"/>
<!--<script src="<?php echo e(assets('js/sales/productSelect.js')); ?>"></script>-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
<link href="<?php echo e(assets('css/fontawesome.min.css')); ?>" rel="stylesheet" type="text/css"/>
<link href="<?php echo e(assets('css/solid.min.css')); ?>" rel="stylesheet" type="text/css"/>
<!--<script src="https://kit.fontawesome.com/fd8222181b.js" crossorigin="anonymous"></script>-->

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xs-12 registerForm" style="margin:12px;">
                <center>
                    <h4 style="font-weight:bold">Registro de Nueva Venta</h4>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-md-3 wizard_inicial"><div class="wizard_inactivo registerForm"></div></div>
            <div class="col-xs-12 col-md-1 wizard_medio"><div class="wizard_inactivo registerForm"></div></div>
            <div class="col-xs-12 col-md-4 wizard_medio"><div class="wizard_activo registerForm">Seleccione un Ramo</div></div>
            <div class="col-xs-12 col-md-1 wizard_medio"><div class="wizard_inactivo registerForm"></div></div>
            <div class="col-xs-12 col-md-3 wizard_final"><div class="wizard_inactivo registerForm"></div></div>
        </div>
    </div>
    <div class="col-md-12" style="margin-top: 20px;">
        <div class="col-md-12 border" style="padding-top: 20px;padding-bottom: 20px;">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="avatar">
                            <i class="fa fa-car" style="font-size:60px;padding-top: 10%;"></i>
                            <!--<img src="<?php echo e(assets('fonts/solid/car.svg')); ?>" style="font-size:60px;width:50%;color:white;">-->
                        </div>
                        <div class="cardTitle">
                            <h3>Veh??culos</h3>

                        </div>
                        <div class="content">
                            <p>Nuestro seguro de veh??culo protege tu vida y ampara a tu familia en caso de siniestro.</p>
                            <p style="align-content: center"><a href="<?php echo e(asset('sales/create')); ?>" class="btn btn-default registerForm">Cotizar</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="avatar">
                            <i class="fas fa-heartbeat" style="font-size:60px;padding-top: 10%;"></i>
                        </div>
                        <div class="cardTitle">
                            <h3>Vida</h3>

                        </div>
                        <div class="content">
                            <p>Sabemos que quieres protegerlos, juntos cuidemos su futuro.</p>
                            <br>
                            <p style="align-content: center"><a href="<?php echo e(asset('sales/R2/create')); ?>" class="btn btn-default registerForm">Cotizar</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                         <div class="avatar">
                            <i class="fas fa-home" style="font-size:60px;padding-top: 10%;"></i>
                        </div>
                        <div class="cardTitle">
                            <h3>Casa Habitaci??n</h3>
                        </div>
                        <div class="content">
                            <p>Nos anticipamos a cualquier eventualidad, aseguramos tu patrimonio.</p>
                            <br>
                            <p style="align-content: center"><a href="<?php echo e(asset('sales/R4/create')); ?>" class="btn btn-default registerForm">Cotizar</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="card">
                        <div class="avatar">
                            <i class="fas fa-user-md" style="font-size:60px;padding-top: 10%;"></i>
                        </div>
                        <div class="cardTitle">
                            <h3>Accidentes Personales</h3>

                        </div>
                        <div class="content">
                            <p>En caso de accidente, te damos cobertura y en caso de muerte amparamos a tu familia.</p>
                            <p style="align-content: center;"><a href="<?php echo e(asset('sales/R3/create')); ?>" class="btn btn-default registerForm">Cotizar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<img class="src-image"  src="<?php echo e(assets('images/car.jpeg')); ?>"/>

<img class="src-image"  src="data:image/jpg;base64,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"/>

<img class="src-image"  src="data:image/jpeg;base64,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"/>

<img class="src-image"  src="data:image/jpeg;base64,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"/>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel\magnussucre\resources\views/sales/productSelect.blade.php ENDPATH**/ ?>