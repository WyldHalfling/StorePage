<div class="row expanded">
    <?php if(isset($errors) && count((array)$errors)): ?>
        <div class="callout alert" data-closable>
            <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_array): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $error_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($error_item); ?> <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <button class="close-button" aria-label="Dismiss Message" type="button" data-close>
                <span arial-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

    <?php if(isset($success) && count((array)$success)): ?>
        <div class="callout success" data-closable>
            <?php echo e($success); ?>

            <button class="close-button" aria-label="Dismiss Message" type="button" data-close>
                <span arial-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

</div><?php /**PATH C:\Users\Phil\Desktop\StorePage\resources\views/includes/message.blade.php ENDPATH**/ ?>