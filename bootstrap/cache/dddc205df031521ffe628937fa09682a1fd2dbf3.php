

<?php $__env->startSection('body'); ?>

<!-- Navigation -->
<?php echo $__env->make('includes.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- Site Wrapper -->
<div class="site_wrapper">
    <?php echo $__env->yieldContent('content'); ?>

    <div class="notify text-center"></div>
</div>
    <?php echo $__env->yieldContent('footer'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phil\Desktop\StorePage\resources\views/layouts/app.blade.php ENDPATH**/ ?>