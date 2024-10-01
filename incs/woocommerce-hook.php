<?php 

// сброс стандартных стилей вукомерса
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

// 

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action('woocommerce_shop_loop_item_title', function(){
    
    global $product;
    echo '<a class="h6 text-decoration-none text-truncate" href="' . $product->get_permalink() . '">'. $product->get_title() .'</a>';
});
