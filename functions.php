<?php 


// Добавляем поддержку WooCommerce в теме
add_action('after_setup_theme', function() {
    // декларируем вукомерс для того чтобы дать возможность переобределять шаблоны
    add_theme_support('woocommerce');

    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    add_theme_support('title-tag');

    load_theme_textdomain('wooeshop', get_template_directory() . '/lang');

    register_nav_menus(
        array(
            'header' => __('Header Menu', 'wooeshop'),
		    'footer' => __('Footer Menu', 'wooeshop'),
        )
    );  
});

add_action('wp_enqueue_scripts', function(){
    wp_enqueue_style('wooeshop-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap');
    wp_enqueue_style('wooeshop-google-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css');
    wp_enqueue_style('wooeshop-Libraries', get_template_directory_uri() . '/lib/animate/animate.min.css');
    wp_enqueue_style('wooeshop-owlcarousel', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css');
    wp_enqueue_style('wooeshop-Customized-Bootstrap', get_template_directory_uri() . '/css/style.css');




    wp_enqueue_script('jquery');
    wp_enqueue_script('wooershop-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array());
    wp_enqueue_script('wooershop-easing', get_template_directory_uri() . '/lib/easing/easing.min.js', array());
    wp_enqueue_script('wooershop-owlcarousel', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', array());
    wp_enqueue_script('wooershop-Validation', get_template_directory_uri() . '/mail/jqBootstrapValidation.min.js', array());
    wp_enqueue_script('wooershop-contact', get_template_directory_uri() . '/mail/contact.js', array());
    wp_enqueue_script('wooershop-Template', get_template_directory_uri() . '/js/main.js', array());
});


function dump($data){
    echo "<pre>". print_r($data, 1) . "</pre>";
}

require_once get_template_directory() . '/incs/woocommerce-hook.php';
require_once get_template_directory() . '/incs/class-wooeshop-header.php';
require_once get_template_directory() . '/incs/costamazer.php';
require_once get_template_directory() . '/incs/cpt.php';

add_action('widgets_init', function() {
    register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'wooeshop' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'wooeshop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
});