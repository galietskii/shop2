<?php

/**
 * Functions
 */

/******************************************************************************
 * Included Functions
 ******************************************************************************/


add_filter('show_admin_bar', '__return_false');

remove_action('wp_head',              'print_emoji_detection_script', 7);
remove_action('admin_print_scripts',  'print_emoji_detection_script');
remove_action('wp_print_styles',      'print_emoji_styles');
remove_action('admin_print_styles',   'print_emoji_styles');

remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');


/* Theme Setting Options */
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));



}

/* ADD Custom Menu */

function wpb_custom_new_menu() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'wpb_custom_new_menu' );


// Custom Logo
add_theme_support( 'custom-logo', array(
    'width'       => 400,
    'height'      => '150',
    'flex-height' => true,
    'flex-width'  => true,
    'unlink-homepage-logo' => true, 
) );

// Add woocommerce on theme

add_action( 'after_setup_theme', 'store_setup' );
function store_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnail');
   add_theme_support( 'woocommerce' );
}    
/* Gutenbergs Block */

require get_template_directory() . '/inc/template-functions.php';

/* Register Custom Post Type and Taxonomy*/
require get_template_directory() . '/inc/custom-post-type.php';

// Connect style and scripts

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method(){
    wp_deregister_script('jquery');
    wp_register_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery-3.6.4.min.js', false, null, true );
    wp_enqueue_script('jquery');
    wp_enqueue_style('mytheme-slick-style', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style( 'mytheme-fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' );
    wp_enqueue_style( 'style', get_template_directory_uri(). '/assets/css/style.css' );
    
    wp_enqueue_style('store-google-fonts', 'https://fonts.googleapis.com/css2?family=Lora:wght@400;500&family=Marcellus&display=swap'); 
    wp_enqueue_style( 'mytheme-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css' );
    wp_enqueue_script('mytheme-slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), false, true);
    wp_enqueue_script('mytheme-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js', array(), false, true);
    wp_enqueue_script('your-script-handle', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
   
    
}
add_action('wp_head', function() {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}, 5);


// END CONNECT STYLE AND SCRIPTS



function my_custom_widget_init() {
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'woocommerce_sidebar',
        'description'   => 'Sidebar from pages WooCommerce.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'my_custom_widget_init');

// COUNT PRODUCT ON CART

function update_cart_item_quantity() {
    $cart_item_key = sanitize_text_field($_POST['cart_item_key']);
    $quantity = intval($_POST['quantity']);

    if (WC()->cart->cart_contents_count > 0 && WC()->cart->find_product_in_cart($cart_item_key)) {
        WC()->cart->set_quantity($cart_item_key, $quantity);
        WC()->cart->calculate_totals();

        wp_send_json_success(array(
            'message' => __('Cart item quantity updated successfully.', 'text-domain'),
            'fragments' => apply_filters('woocommerce_add_to_cart_fragments', array(
                'div.widget_shopping_cart_content' => wc_get_template_part('cart/mini-cart'),
            )),
        ));
    } else {
        wp_send_json_error(array(
            'message' => __('Cart item not found.', 'text-domain'),
        ));
    }
}

add_action('wp_ajax_update_cart_item_quantity', 'update_cart_item_quantity');
add_action('wp_ajax_nopriv_update_cart_item_quantity', 'update_cart_item_quantity');

// WIDGET LATESTS BLOGS
function custom_recent_posts_query($args) {
    $args['category_name'] = 'blogs'; 
    return $args;
}
add_filter('widget_posts_args', 'custom_recent_posts_query');

