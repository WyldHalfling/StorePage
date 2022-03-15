
<?php $__env->startSection('title', 'Product Categories'); ?>
<?php $__env->startSection('data-page-id', 'adminCategories'); ?>

<?php $__env->startSection('content'); ?>
    <div class="category">
        <div class="grid-x grid-padding-x">
            <h2>Product Categories</h2>
        </div>
        
        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
		<!-- Search bar -->
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-6 column">
                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" placeholder="Search by name">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Search">
                        </div>
                    </div>
                </form>
            </div>
			
			<!-- Create bar -->
            <div class="small-12 medium-5 end column">
                <form action="/admin/product/categories" method="post">
                    <div class="input-group">
                        <input type="text" class="input-group-field" name="name" placeholder="Category Name">
                        <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                        <div class="input-group-button">
                            <input type="submit" class="button" value="Create">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
		<!-- List of categories -->
        <div class="grid-x grid-padding-x">
            <div class="small-12 medium-11 column">
                <?php if(count($categories)): ?>
                    <table class="hover" data-form="deleteForm">
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($category['name']); ?></td>
                                    <td><?php echo e($category['slug']); ?></td>
                                    <td><?php echo e($category['added']); ?></td>
                                    <td width="100" class="text-right">

                                        <span data-tooltip tabindex="1" title="Add Subcategory">
                                            <a data-open="add-subcategory-<?php echo e($category['id']); ?>"><i class="fa fa-plus"></i></a>
                                        </span>
                                        <span data-tooltip class="has-tip top" tabindex="1" title="Edit Category">
                                            <a data-open="item-<?php echo e($category['id']); ?>"><i class="fa fa-edit"></i></a>
                                        </span>
                                        <span data-tooltip class="has-tip top" tabindex="1" title="Delete Category" style="display: inline-block">
                                            <form method="POST" action="/admin/product/categories/<?php echo e($category['id']); ?>/delete" 
                                                class="delete-item">
                                                <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                                                <button type="submit"><i class="fa fa-times delete"></i></button>
                                            </form>
                                        </span>
                                        
                                        <!-- Edit Categories Model -->
                                        <div class="reveal" id="item-<?php echo e($category['id']); ?>"
                                             data-reveal data-close-on-click="false" data-close-on-esc="false"
                                             data-animation-in="scale-in-up">
                                             <div class="notification callout primary"></div>
                                            <h2>Edit Category</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" name="name" id="item-name-<?php echo e($category['id']); ?>" value="<?php echo e($category['name']); ?>">
                                                    
                                                    <div>
                                                        <input type="submit" class="button update-category" id="<?php echo e($category['id']); ?>"
                                                               data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>"
                                                               value="Update">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        <!-- End Edit Categories Model -->

                                        <!-- Add Subcategories Model -->
                                        <div class="reveal" id="add-subcategory-<?php echo e($category['id']); ?>"
                                             data-reveal data-close-on-click="false" data-close-on-esc="false"
                                             data-animation-in="scale-in-up">
                                             <div class="notification callout primary"></div>
                                            <h2>Add Subcategory</h2>
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" name="name" id="subcategory-name-<?php echo e($category['id']); ?>">
                                                    
                                                    <div>
                                                        <input type="submit" class="button add-subcategory" id="<?php echo e($category['id']); ?>"
                                                               data-token="<?php echo e(\App\Classes\CSRFToken::_token()); ?>"
                                                               value="Create">
                                                    </div>
                                                </div>
                                            </form>
                                            <a href="/admin/product/categories" class="close-button" aria-label="Close modal" type="button">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                        <!-- End Add Subcategories Model -->

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    
                    <?php echo $links; ?>

                <?php else: ?>
                    <h3>You have not created any category</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('includes.delete-model', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phil\Desktop\StorePage\resources\views/admin/product/categories.blade.php ENDPATH**/ ?>