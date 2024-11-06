<?php 

// сброс стандартных стилей вукомерса
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// 

// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

add_action('woocommerce_shop_loop_item_title', function(){
    
    global $product;
    echo '<a class="h6 text-decoration-none text-truncate" href="' . $product->get_permalink() . '">'. $product->get_title() .'</a>';
});

remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
add_filter( 'woocommerce_product_get_rating_html', function ( $html, $rating, $count ) {
	$html = '';
	/* translators: %s: rating */
	$label = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );
	$html  = '<div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div>';
	return $html;
}, 10, 3 );


// custom shortcode
add_shortcode( 'wooeshop_recent_products', 'wooeshop_recent_products' );
function wooeshop_recent_products( $atts ){
	global $woocommerce_loop, $woocommerce;

	extract( shortcode_atts( array(
		'limit' => '12',
		'orderby' => 'date',
		'order' => 'DESC',
	), $atts ) );

	$args = array(
		'post_status' => 'publish',
		'post_type' => 'product',
		'orderby' => $orderby,
		'order' => $order,
		'posts_per_page' => $limit,
	);

	ob_start();

	$products = new WP_Query( $args );

	if ( $products->have_posts() ) : ?>

		<?php while ( $products->have_posts() ) : $products->the_post(); ?>

			<?php wc_get_template_part( 'content', 'recent-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php endif;

	wp_reset_postdata();

	return '<div class="woocommerce"><div class="row px-xl-5"><div class="owl-carousel recent-product">' . ob_get_clean() . '</div></div></div>';
	
}

add_filter( 'woocommerce_add_to_cart_fragments', function ( $fragments ) {
	$fragments['span.cart-bage'] = '<span class="badge text-secondary border border-secondary rounded-circle cart-bage" style="padding-bottom: 2px;">' . count( WC()->cart->get_cart() ) . '</span>';
	return $fragments;
} );


// https://woo.com/document/customise-the-woocommerce-breadcrumb/
add_filter( 'woocommerce_breadcrumb_defaults', function () {
	return array(
		'delimiter'   => '',
		'wrap_before' => '<div class="container-fluid"><div class="row px-xl-5"><div class="col-12"><nav class="breadcrumb bg-light mb-30"><ul class="breadcrumb__list">',
		'wrap_after'  => '</ul></nav></div></div></div>',
		'before'      => '<li class="breadcrumb-item text-dark">',
		'after'       => '</li>',
		'home'        => __( 'Home', 'wooeshop' ),
	);
} );

// https://woo.com/document/woocommerce-display-category-image-on-category-archive/
function wooeshop_get_shop_thumb() {
	$html = '';
	if ( is_product_category() ){
		global $wp_query;
		$cat = $wp_query->get_queried_object();
		$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
		$image = wp_get_attachment_url( $thumbnail_id );
		if ( $image ) {
			$html .= '<img src="' . $image . '" alt="' . $cat->name . '" class="img-thumbnail">';
		}
	}
	return $html;
}

remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);

remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10);

add_action('woocommerce_shop_loop_subcategory_title', function($category) {
	echo "<h5 class='mt-2 text-center'>{$category->name}</h5>";
});

remove_action('woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10);

remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);


add_filter( 'woocommerce_default_address_fields' , function ( $fields ) {
	unset( $fields['company'], $fields['address_2'], $fields['postcode'] );
	return $fields;
} );

add_filter('woocommerce_order_button_html', function($button){
	$btn = str_replace('button alt', 'button alt btn-primary font-weight-bold py-3 w-100', $button);
	return '<div class="w-100 mt-3">'. $btn .'</div>';
});	