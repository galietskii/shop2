<?php
$subtitle = get_field('subtitle');
$description = get_field('description');
$featured_category_id = get_field('featured_category_id');
$featured_product_count = get_field('featured_product_count');
$white_white = get_field('white_white');
$white_black = get_field('white_black');
$black_black = get_field('black_black');
?>

<section class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                $categories = get_terms($args);
                $products_container = 'products__container';
                if ($white_white) {
                    $products_container .= ' white-white';
                } elseif($white_black) {
                    $products_container .= ' white-black';
                } elseif($black_black) {
                    $products_container .= ' black-black';
                }
            
                echo '<div class="' . $products_container . '">';
                ?>
                    <?php
                    $selected_categories = array('tristique-justo', 'tristique-justo-2');

                    foreach ($selected_categories as $category_slug) {
                        $category = get_term_by('slug', $category_slug, 'product_cat'); 
                        if (!$category) {
                            continue; 
                        }

                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $thumbnail = wp_get_attachment_image($thumbnail_id, 'full');

                        echo '<div class="category-div" data-category="' . $category->slug . '">';
                        echo '<div class="category-image">' . $thumbnail . '</div>';
                        echo '<div class="category-details">';
                        echo '<h2>' . $category->name . '</h2>';
                        echo '<p>' . $category->description . '</p>';
                        echo '</div>';
                        echo '</div>';

                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => $featured_product_count,
                            'product_cat' => $category->slug,
                        );

                        $products_query = new WP_Query($args);

                        if ($products_query->have_posts()) {
                            echo '<div class="products-in-category responsive">'; 
                            while ($products_query->have_posts()) {
                                $products_query->the_post();
                                echo '<div class="products__post">';
                                echo '<div class="image">' . get_the_post_thumbnail() . '</div>';
                                echo '<p class="products__post-title">' . get_the_title() . '</p>';
                                echo '<p class="description">' . get_the_excerpt() . '</p>';
                                global $product;
                                echo '<p class="price">' . $product->get_price_html() . '</p>';
                                echo '<div class="products__post-window">';
                                do_action('woocommerce_after_shop_loop_item');
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M11.0887 4C15.0017 4 18.1774 7.17574 18.1774 11.0887C18.1774 15.0017 15.0017 18.1774 11.0887 18.1774C7.17574 18.1774 4 15.0017 4 11.0887C4 7.17574 7.17574 4 11.0887 4ZM11.0887 16.6021C14.1345 16.6021 16.6021 14.1345 16.6021 11.0887C16.6021 8.04214 14.1345 5.57527 11.0887 5.57527C8.04214 5.57527 5.57527 8.04214 5.57527 11.0887C5.57527 14.1345 8.04214 16.6021 11.0887 16.6021ZM17.7718 16.6581L20 18.8855L18.8855 20L16.6581 17.7718L17.7718 16.6581Z" fill="#777777"/>
                                </svg>';
                                echo '</div>';
                                echo '</div>';
                            }
                            echo '</div>'; 
                            wp_reset_postdata();
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>