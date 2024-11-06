<?php

defined( 'ABSPATH' ) || exit;

get_header();

?>
 
<?php do_action( 'woocommerce_before_main_content' ); ?>

<?php $content_class = is_search() ? 'col-lg-12' : 'col-lg-9' ?>

	<div class="container-fluid">
		<div class="row px-xl-5">
			<?php if( ! is_search() ): ?>
				<!-- Shop Sidebar Start -->
				<div class="col-lg-3">			
					<?php do_action( 'woocommerce_sidebar' ); ?>
				</div>
				<!-- Shop Sidebar End -->
			<?php endif; ?>
			<div class="<?php echo $content_class; ?>"> <!-- col-lg-9-->
				<div class="row">
					<div class="col-lg-12">
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							<h1 class="woocommerce-products-header__title page-title section-title position-relative text-uppercase mb-3 h4">
								<span class="bg-secondary pr-3"><?php woocommerce_page_title(); ?></span>
								
							</h1>
						<?php endif; ?>
					
					</div><!--col-lg-12 -->

					<?php if($shop_img = wooeshop_get_shop_thumb()): ?>
						<div class="col-4 col-sm-2">
							<?php echo $shop_img; ?>
						</div>
						<div class="col-8 col-sm-10">
							<?php do_action( 'woocommerce_archive_description' ); ?>
						</div>
						<div class="col-12">
							<hr>
						</div>
					<?php else: ?>
						<?php do_action( 'woocommerce_archive_description' ); ?>
						<div class="col-12">
							<hr>
						</div>
					<?php endif; ?>				
					
				</div><!--row-->
					
				<?php 													
						if ( woocommerce_product_loop() ) { ?>

							<div class="d-flex justify-content-between wooeshop-ordering mb-3">
								<?php do_action( 'woocommerce_before_shop_loop' ); ?>
							</div>	

						<?php	woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							
							do_action( 'woocommerce_after_shop_loop' );
						} else {
							
							
							do_action( 'woocommerce_no_products_found' );
						}
					?>	

			</div><!--col-lg-9 -->

		</div><!--row px-xl-5-->
	</div><!--container-fluid-->

<?php do_action( 'woocommerce_after_main_content' ); ?>

<!-- /**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */ -->



<?php get_footer(); ?>


