<?php
if (function_exists('acf_register_block_type')) {
    add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types()
{
    acf_register_block_type(
        array(
            'name' => 'Hero Section',
            'title' => __('Hero Section'),
            'render_template' => '/templates/blocks/hero-section.php',
            'icon' => 'block-default',
            'keywords' => array('hero section'),
        )
    );
    acf_register_block_type(
        array(
            'name' => 'Show example Section',
            'title' => __('Show example Section'),
            'render_template' => '/templates/blocks/show-example-section.php',
            'icon' => 'block-default',
            'keywords' => array('show example section'),
        )
    );
    acf_register_block_type(
        array(
            'name' => 'Featured products Section',
            'title' => __('Featured products Section'),
            'render_template' => '/templates/blocks/featured-products-section.php',
            'icon' => 'block-default',
            'keywords' => array('featured products section'),
        )
    );
    acf_register_block_type(
        array(
            'name' => 'Special offer Section',
            'title' => __('Special offer Section'),
            'render_template' => '/templates/blocks/special-offer-section.php',
            'icon' => 'block-default',
            'keywords' => array('special offer section'),
        )
    );
    acf_register_block_type(
        array(
            'name' => 'Discount Section',
            'title' => __('Discount Section'),
            'render_template' => '/templates/blocks/discount-section.php',
            'icon' => 'block-default',
            'keywords' => array('discount section'),
        )
    );
    acf_register_block_type(
        array(
            'name' => 'Categories products Section',
            'title' => __('Categories products Section'),
            'render_template' => '/templates/blocks/categories-products-section.php',
            'icon' => 'block-default',
            'keywords' => array('categories products section'),
        )
    );
    acf_register_block_type(
        array(
            'name' => 'Blog section',
            'title' => __('Blog section'),
            'render_template' => '/templates/blocks/blog-section.php',
            'icon' => 'block-default',
            'keywords' => array('blog section'),
        )
    );

}
?>