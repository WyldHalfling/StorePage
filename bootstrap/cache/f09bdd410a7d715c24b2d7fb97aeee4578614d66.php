
<?php $__env->startSection('title', 'Your Shopping Cart'); ?>
<?php $__env->startSection('data-page-id', 'cart'); ?>

<?php $__env->startSection('content'); ?>
    <div class="shopping_cart" id="shopping_cart" style="padding: 6rem;">

        <div class="text-center">
            <img v-show="loading" src="/images/loading.gif">
        </div>
        

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phil\Desktop\StorePage\resources\views/cart.blade.php ENDPATH**/ ?>