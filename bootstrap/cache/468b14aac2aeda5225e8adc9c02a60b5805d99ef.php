

<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('data-page-id', 'adminDashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="dashbaord">
        <div class="row expanded">
            <h2>Dashboard</h2>
            <?php echo e(\App\Classes\CSRFToken::_token()); ?>

            <br>
            <?php echo e(\App\Classes\Session::get('token')); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phil\Desktop\StorePage\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>