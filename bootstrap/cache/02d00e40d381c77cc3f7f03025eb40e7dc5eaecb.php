<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Panel - <?php echo $__env->yieldContent('title'); ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/public/css/all.css">
    </head>
    <body>
        <div class="off-canvas position-left reveal-for-large" id="offCanvas" data-off-canvas>
            <!-- Side Bar -->
            <ul class="vertical menu">
                <li><a href="#">Foundation</a></li>
                <li><a href="#">Dot</a></li>
                <li><a href="#">ZURB</a></li>
                <li><a href="#">Com</a></li>
                <li><a href="#">Slash</a></li>
                <li><a href="#">Sites</a></li>
            </ul>
            <!-- end Side Bar -->
        </div>

        <div class="off-canvas-content" data-off-canvas-content>
            <!-- Your page content lives here -->
            <?php echo $__env->yieldContent('content'); ?>
        </div>

        <script src="/public/js/all.js"></script>      
    </body>
</html><?php /**PATH C:\Users\Phil\Desktop\StorePage\resources\views/admin/layout/base.blade.php ENDPATH**/ ?>