<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
do_action( 'woocommerce_before_main_content' ); 
?>

		<?php if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! 		is_user_logged_in() ): ?>
				
			<div class="container-fluid">
				<div class="col-12 px-xl-5">
						<?php 
							echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );							
						?>
				</div>
			</div>
		<?php else: ?>
			<div class="container-fluid">
				<div class="col-12 px-xl-5">
					<div class="bg-white p-3">
						<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
					</div>
				</div>
			</div>
<!--  -->
			<div class="container-fluid mt-4">
				<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

					<div class="row px-xl-5">
						<div class="col-lg-8">
							<div class="bg-white p-3">
								<?php if ( $checkout->get_checkout_fields() ) : ?>

								<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
								<?php do_action( 'woocommerce_checkout_billing' ); ?>
								<?php do_action( 'woocommerce_checkout_shipping' ); ?>
								<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>



								<?php endif; ?>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="bg-light p-3 mb-5">
								<h5 id="order_review_heading" class="section-title position-relative text-uppercase mb-3"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h5>

								<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>

								<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

								<div id="order_review" class="woocommerce-checkout-review-order">
									<?php do_action( 'woocommerce_checkout_order_review' ); ?>
								</div>

								<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
							</div>
						</div> 
					</div>
				</form>
			</div>

		<?php endif; ?>







<?php do_action( 'woocommerce_after_main_content' ); ?>
	
