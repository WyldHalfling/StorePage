
<?php $__env->startSection('title', 'Homepage'); ?>
<?php $__env->startSection('data-page-id', 'home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="home">
        <section class="hero">
            <div class="hero-slider">
                <div> <img src="/images/sliders/slide_1.jpg" alt="PK E-Store"> </div>
                <div> <img src="/images/sliders/slide_2.jpg" alt="PK E-Store"> </div>
                <div> <img src="/images/sliders/slide_3.jpg" alt="PK E-Store"> </div>
            </div>
        </section>

        <section class="display-products" id="root">
            <h2>Featured Products</h2>
            <div class="grid-x grid-padding-x medium-up-2 large-up-4">
                <div class="cell small-12" v-for="feature in featured">
                    <a :href="'/product' + feature.id">
                        <div class="card" data-equalizer-watch>
                            <div class="card-section">
                                <img :src="'/' + feature.image_path" width="100%" height="200">
                            </div>
                            <div class="card-section">
                                <p>
                                    {{ stringLimit(feature.name, 18) }}
                                </p>
                                <a :href="'/product' + feature.id" class="button more expanded">
                                    See More
                                </a>
                                <a :href="'/product' + feature.id" class="button cart expanded">
                                    ${{ feature.price }} - Add to cart
                                </a>
                            </div>
                          </div>
                    </a>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Phil\Desktop\StorePage\resources\views/home.blade.php ENDPATH**/ ?>