<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo e($_ENV['APP_NAME']); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/all.css">
    <script src="https://use.fontawesome.com/f4ec21d8eb.js"></script>
    <!-- Vue 2 --> <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script> <!-- -->
    <!-- Vue 3 - -> <script src="https://unpkg.com/vue@next"></script> <!-- -->
</head>
<body data-page-id="<?php echo $__env->yieldContent('data-page-id'); ?>">
    
<?php echo $__env->yieldContent('body'); ?>

<script async src="/js/all.js"></script>
</body>
</html><?php /**PATH C:\Users\PHIL\Desktop\StorePage\resources\views/layouts/base.blade.php ENDPATH**/ ?>