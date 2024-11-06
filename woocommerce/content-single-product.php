<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

?>

 <div class="col-12">
	<?php
		/**
		 * Hook: woocommerce_before_single_product.
		 *
		 * @hooked woocommerce_output_all_notices - 10
		 */
		do_action( 'woocommerce_before_single_product' );
	?>
 </div>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'col-12 product-content-wrapper', $product ); ?>>
	
	<div class="row">
		<div class="col-lg-5 mb-30">
			<div class="col-lg-12">
				<?php
		

					do_action( 'woocommerce_before_single_product_summary' );
				?>
			</div>
			<!-- 	вывод кастомного слайдера	
			<div id="product-carousel" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-inner bg-light">
					<?php 
						$product_img_id = $product->get_image_id();
						if($product_img_id){
							$main_img = wp_get_attachment_url($product_img_id);
						}else{
							$main_img = wp_placholder_img_src('full');
						}

						$product_gallyri = $product->get_gallery_image_ids();
					?>
					
		
					<div class="carousel-item active">
						<img class="w-100 h-100" src="<?php echo $main_img ?>" alt="Image">
					</div>

					<?php if($product_gallyri):  ?>
							<?php foreach($product_gallyri as $product_img_id): ?>
								<div class="carousel-item">
									<img class="w-100 h-100" src="<?php echo wp_get_attachment_url($product_img_id) ?>" alt="Image">
								</div>
							<?php endforeach; ?>
					<?php endif; ?>
					
				</div>
				<a class="carousel-control-prev" href="#product-carousel" data-bs-slide="prev">
					<i class="fa fa-2x fa-angle-left text-dark"></i>
				</a>
				<a class="carousel-control-next" href="#product-carousel" data-bs-slide="next">
					<i class="fa fa-2x fa-angle-right text-dark"></i>
				</a>
			</div> -->

		</div><!--col-lg-5 mb-30-->

			<div class="col-lg-7 h-auto mb-30">
				<div class="h-100 bg-light p-30 product-content">
					<?php woocommerce_show_product_sale_flash(); ?>
					<?php do_action( 'woocommerce_single_product_summary' ); ?>
				</div><!--h-100 bg-light p-30-->
			</div><!--col-lg-5 mb-30-->

	</div><!--row px-xl-5-->

	<div class="row">
		<div class="col">
			<div class="bg-light p-30">
				<?php do_action( 'woocommerce_after_single_product_summary' ); ?>							
			</div>
		</div>
	</div>
	
	<?php 
		woocommerce_upsell_display();
		woocommerce_output_related_products();
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
