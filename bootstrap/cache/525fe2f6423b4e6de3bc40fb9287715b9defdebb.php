
<?php $__env->startSection('title', 'Register Free Account'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>
    <div class="auth" id="auth">
        <section class="register_form">
            <div class="grid-x grid-padding-x">
                <div class="small-12 medium-7 medium-centered">
                    <h2 class="text-center">Create Account</h2>
                    <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form action="/register" method="post">
                        <input type="text" name="fullname" placeholder="Your Name"
                            value="<?php echo e(\App\Classes\Request::old('post', 'fullname')); ?>">

                        <input type="text" name="email" placeholder="Your Email Address"
                               value="<?php echo e(\App\Classes\Request::old('post', 'email')); ?>">

                        <input type="text" name="username" placeholder="Your Username"
                               value="<?php echo e(\App\Classes\Request::old('post', 'username')); ?>">

                        <input type="password" name="password" placeholder="Your Password">

                        <textarea name="address" placeholder="Your Address" value="<?php echo e(\App\Classes\Request::old('post', 'address')); ?>"></textarea>
                        <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">

                        <button class="button float-right">Register</button>
                    </form>
                    <p>Already Registered? <a href="/login">Login Here</a></p>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phil\Desktop\StorePage\resources\views/register.blade.php ENDPATH**/ ?>