<?php 
    remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    add_action( 'woocommerce_before_main_content', function() {
        echo '<div class="container">';
    });
    add_action( 'woocommerce_after_main_content', function() {
        echo '</div>';
    });

    // REMOVE HOOKS

    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20); // remove breadcrumbs
    remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10); //remove sale
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10); // remove add to cart
    remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
    remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

    function custom_woocommerce_product_title() {
        echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() . '</h2>';
    }
    add_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title');

    // Update mini-cart

    add_filter('woocommerce_add_to_cart_fragments', function($fragments) {
        $fragments['.mini-cart-cnt'] = '<span class="mini-cart-cnt">' . count(WC()->cart->get_cart()) . '</span>';
        return $fragments;
    })
?>