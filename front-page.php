<?php get_header(); ?>


    <!-- Carousel Start -->
     

    <div class="container-fluid mb-3">
        <div class="row px-xl-5">
            <div class="col-lg-8">
            <?php
                global $post;
                $slider = get_posts( array(
                    'post_type' => 'slider',
                    // 'order' => 'ASC',
                ) );
            ?>
            
        <?php if($slider): ?> 
            
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                  <?php for($i = 0; $i < count($slider); $i++): ?>
                    <li data-bs-target="#header-carousel" data-bs-slide-to="<?php echo $i ?>" <?php if($i == 0): ?> class="active" <?php endif; ?>></li>
                  <?php endfor; ?>
                </ol>
                <div class="carousel-inner">
                    <?php $i = 0; foreach ($slider as $post): setup_postdata($post); ?>
                        <div class="carousel-item position-relative <?php if($i == 0): ?> active <?php endif; ?>" style="height: 430px;">
                            <img class="position-absolute w-100 h-100" src="<?php the_post_thumbnail_url( 'full' ); ?>" style="object-fit: cover;">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown"><?php the_title(); ?></h1>
                                    <p class="mx-md-5 px-5 animate__animated animate__bounceIn"><?php the_content( '' ); ?></p>
                                    <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    <?php $i++; endforeach; ?>
                    
                </div>
                
            </div>
        <?php endif; ?>            
            </div>
            <div class="col-lg-4">
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri()  ?>/img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
                <div class="product-offer mb-30" style="height: 200px;">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri()  ?>/img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid home-categoris pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"><?php _e( 'Categories', 'wooeshop' ) ?></span></h2>
        
            <?php echo do_shortcode( '[product_categories hide_empty="1"]' ) ?>
           
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"><?php _e('Featured products', 'wooeshop') ?></span></h2>
        <!-- <div class="row px-xl-5"> -->
            <?php echo do_shortcode('[featured_products limit= "8"]'); ?>                    
            
            
        <!-- </div> -->
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri()  ?>/img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="<?php echo get_template_directory_uri()  ?>/img/offer-2.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">Save 20%</h6>
                        <h3 class="text-white mb-3">Special Offer</h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3"><?php _e('Recent Products', 'wooeshop'); ?></span></h2>
        
            <?php echo do_shortcode('[wooeshop_recent_products limit="4"]'); ?>           
        
    </div>
    <!-- Products End -->


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="<?php echo get_template_directory_uri()  ?>/img/vendor-1.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo get_template_directory_uri()  ?>/img/vendor-2.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo get_template_directory_uri()  ?>/img/vendor-3.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo get_template_directory_uri()  ?>/img/vendor-4.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo get_template_directory_uri()  ?>/img/vendor-5.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo get_template_directory_uri()  ?>/img/vendor-6.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo get_template_directory_uri()  ?>/img/vendor-7.jpg" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="<?php echo get_template_directory_uri()  ?>/img/vendor-8.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
        <?php get_footer(); ?>
    <!-- Footer End -->
