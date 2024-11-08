<?php
/**
 * Cart Page
 */


defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_main_content' );
?>
		

       <div class="container-fluid">
			<div class="col-12 px-xl-5">
				<?php do_action( 'woocommerce_before_cart' ); ?>
			</div>
            <div class="row px-xl-5">
				<div class="col-lg-8 table-responsive mb-5">
					<form class="woocommerce-cart-form " action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
						<?php do_action( 'woocommerce_before_cart_table' ); ?>
						<table class="table table-light table-borderless table-hover text-center mb-0 shop_table shop_table_responsive cart woocommerce-cart-form__contents">
							<thead class="thead-dark">
								<tr>
								<th class="product-thumbnail"><?php esc_html_e( 'Thumbnail image', 'woocommerce' ); ?></th>
								<th class="product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
								<th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
								<th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
								<th class="product-remove"><?php esc_html_e( 'Remove item', 'woocommerce' ); ?></th>
									
								</tr>
							</thead>
							<tbody class="align-middle">
								<?php do_action( 'woocommerce_before_cart_contents' ); ?>
								<?php
								foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
									$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
									/**
									 * Filter the product name.
									 *
									 * @since 2.1.0
									 * @param string $product_name Name of the product in the cart.
									 * @param array $cart_item The product in the cart.
									 * @param string $cart_item_key Key for the product in the cart.
									 */
									$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

									if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
										$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
										?>

								<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

									<td class="align-middle product-thumbnail">
										<?php
											$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

											if ( ! $product_permalink ) {
												echo $thumbnail; // PHPCS: XSS ok.
											} else {
												printf( '<div class="product-thumbnail-customImg" href="%s">%s</div>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
											}
										?>
									</td>
									<!--  -->
									<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( $product_name . '&nbsp;' );
										} else {
											/**
											 * This filter is documented above.
											 *
											 * @since 2.1.0
											 */
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<div class="product-name-custom"><a href="%s">%s</a></div>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
										}
										?>
										</td>
									<!--  -->
								
									<td class="product-quantity align-middle" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
										<?php
										if ( $_product->is_sold_individually() ) {
											$min_quantity = 1;
											$max_quantity = 1;
										} else {
											$min_quantity = 0;
											$max_quantity = $_product->get_max_purchase_quantity();
										}

										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $max_quantity,
												'min_value'    => $min_quantity,
												'product_name' => $product_name,
											),
											$_product,
											false
										);

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
										?>
									</td>
									<!--  -->
									<!-- <td class="align-middle">
										<div class="input-group quantity mx-auto" style="width: 100px;">
											<div class="input-group-btn">
												<button class="btn btn-sm btn-primary btn-minus" >
												<i class="fa fa-minus"></i>
												</button>
											</div>
											<input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="1">
											<div class="input-group-btn">
												<button class="btn btn-sm btn-primary btn-plus">
													<i class="fa fa-plus"></i>
												</button>
											</div>
										</div>
									</td> -->
									<!--  -->
									<td class="product-price align-middle" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
										<?php
											echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>
									</td>
									
									<td class="align-middle product-remove">
										<?php
											echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												'woocommerce_cart_item_remove_link',
												sprintf(
													'<a href="%s" class="remove btn btn-sm btn-danger" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fa fa-times"></i></a>',
													esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
													/* translators: %s is the product name */
													esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
													esc_attr( $product_id ),
													esc_attr( $_product->get_sku() )
												),
												$cart_item_key
											);
										?>
									</td>
								</tr>

								<?php 
								}
								}
								?>
								
							</tbody>
							<tfoot>
								<?php do_action( 'woocommerce_cart_contents' ); ?>
								<tr>
									<td colspan="6" class="actions">	
										<button type="submit" class="updateCart button btn btn-sm btn-danger<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>

										<?php do_action( 'woocommerce_cart_actions' ); ?>

										<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
									</td>
								</tr>
								<?php do_action( 'woocommerce_after_cart_contents' ); ?>
							</tfoot>
						</table>
						<?php do_action( 'woocommerce_after_cart_table' ); ?>
					</form>
				</div>

				<!--  -->

				<div class="col-lg-4">
					<!-- <form class="mb-30" action="">
						<div class="input-group">
							<input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
							<div class="input-group-append">
								<button class="btn btn-primary">Apply Coupon</button>
							</div>
						</div>
					</form> -->
					<!-- <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
					<div class="bg-light p-30 mb-5">
						<div class="border-bottom pb-2">
							<div class="d-flex justify-content-between mb-3">
								<h6>Subtotal</h6>
								<h6>$150</h6>
							</div>
							<div class="d-flex justify-content-between">
								<h6 class="font-weight-medium">Shipping</h6>
								<h6 class="font-weight-medium">$10</h6>
							</div>
						</div>
						<div class="pt-2">
							<div class="d-flex justify-content-between mt-2">
								<h5>Total</h5>
								<h5>$160</h5>
							</div>
							<button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
						</div>
					</div> -->
					
					<?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

					
						<?php
							/**
							 * Cart collaterals hook.
							 *
							 * @hooked woocommerce_cross_sell_display
							 * @hooked woocommerce_cart_totals - 10
							 */
							do_action( 'woocommerce_cart_collaterals' );
						?>
					
				</div><!--col-lg-4-->


            </div><!-- row px-xl-5 -->
       </div><!-- container-fluid -->

<?php do_action( 'woocommerce_after_main_content' ); ?>
