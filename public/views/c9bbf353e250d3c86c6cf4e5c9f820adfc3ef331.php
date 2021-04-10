<div class="col-md-12 border" style="margin-top:10px">
    <div id="tableDiv">
        <table id="newPaginatedTable" class="table table-striped row-border table-responsive hover stripe borderTable">
            <thead>
                <tr>
                    <th align="center">Nombre</th>
                    <th align="center">Ciudad</th>
                    <th align="center">Contacto</th>
                    <th align="center">Télefono</th>
                    <th align="center">Celular</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $providersBranch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td align="center"><?php echo e($pro->name); ?></td>
                    <td align="center"><?php echo e($pro->citName); ?></td>
                    <td align="center"><?php echo e($pro->contact); ?></td>
                    <td align="center"><?php echo e($pro->phone); ?></td>
                    <td align="center"><?php echo e($pro->mobile_phone); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <div id="tableUsers_paginate" class="dataTables_paginate paging_simple_numbers paginationsUsersMargin" style="display:inline">
            <p>Mostrando <?php echo e(count($providersBranch)); ?> resultados de <?php echo e($providersBranch->total()); ?> totales</p>
            <span style="float:right;margin-top:-45px; padding:0">
                <?php echo e($providersBranch->links('pagination::bootstrap-4')); ?>                        
            </span>
        </div>
    </div>
</div><?php /**PATH C:\wamp64\www\magnussucre\resources\views\pagination\providers_branch.blade.php ENDPATH**/ ?>