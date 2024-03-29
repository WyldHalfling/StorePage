<?php $categories = \App\Models\Category::with('subCategories')->get() ?>

<header class="navigation">

<div class="title-bar toggle" data-responsive-toggle="main-menu" data-hide-for="medium">
    <button class="menu-icon" type="button" data-toggle="main-menu"></button>
    <a href="/" class="float-right small-logo">STORE</a>
  </div>
  
  <div class="top-bar menu" id="main-menu" data-dropdown-menu 
        data-responsive-menu="drilldown meduim-dropdown" data-click-open="true"
        data-disable-hover="true"  data-close-on-click-inside="false">
        <div class="top-bar-title show-for-medium">
            <a href="/" class="logo"></a>
        </div>

        <div class="top-bar-left">
            <ul class="dropdown menu vertical medium-horizontal" data-dropdown-menu>
                <li><a href="#">Products</a></li>
                <?php if(count($categories)): ?>
                    <li>
                        <a href="#">Categories</a>
                        <ul class="menu vertical sub dropdown">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <a href="#"><?php echo e($category->name); ?></a>
                                <?php if(count($category->subCategories)): ?>
                                    <ul class="menu sub vertical">
                                        <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="#"><?php echo e($subCategory->name); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        
        <div class="top-bar-right">
            <ul class="dropdown menu vertical medium-horizontal">
                <li><a href="#">Username</a></li>
                <li><a href="#">Sign In</a> </li>
                <li><a href="#">Register</a> </li>
                <li><a href="/cart">Cart</a> </li>
            </ul>
        </div>
    </div>

    </div>
    </header><?php /**PATH C:\Users\PHIL\Desktop\StorePage\resources\views/includes/nav.blade.php ENDPATH**/ ?>