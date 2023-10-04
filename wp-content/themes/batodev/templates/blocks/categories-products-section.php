<?php
$background = get_field('background');
$subtitle = get_field('subtitle');
$description = get_field('description');
$link = get_field('link');
?>
<section class="categories-products">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="categories-products__left" style="background-image: url(<?php echo $background; ?>)">
                    <div>
                        <p class="categories-products__left-subtitle"><?php echo $subtitle; ?></p>
                        <div class="categories-products__left-description">
                            <?php if($description): ?>
                            <?php echo $description; ?>
                            <?php endif; ?>
                        </div>
                        <a class="button" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="categories-products__all">
                    <div class="block">
                        <h2>Featured Products</h2>
                        <?php
                $featured_args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'product_cat' => 'featured-products', // Замените на фактический слаг вашей категории "Featured Products"
                    'orderby' => 'date',
                    'order' => 'DESC',
                );

                $featured_query = new WP_Query($featured_args);

                if ($featured_query->have_posts()) :
                    while ($featured_query->have_posts()) :
                        $featured_query->the_post(); ?>
                        <div class="categories-products__all-block">
                            <?php echo the_post_thumbnail(); ?>
                            <div>
                                <p><?php the_title(); ?></p>
                                <?php global $product;
                                echo '<p class="price">' . $product->get_price_html() . '</p>'; ?>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                else :
                    echo 'No featured products found.';
                endif;
                ?>
                    </div>
                    <div>
                        <h2>New Products</h2>
                        <?php
                    $new_args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 3,
                    'product_cat' => 'new-products', // Замените на фактический слаг вашей категории "New Products"
                    'orderby' => 'date',
                    'order' => 'DESC',
                    );

                 $new_query = new WP_Query($new_args);

                    if ($new_query->have_posts()) :
                        while ($new_query->have_posts()) :
                            $new_query->the_post(); ?>
                        <div class="categories-products__all-block">
                            <?php echo the_post_thumbnail(); ?>
                            <div>
                                <p><?php the_title(); ?></p>
                                <?php global $product;
                                echo '<p class="price">' . $product->get_price_html() . '</p>'; ?>
                            </div>
                        </div>
                        <?php endwhile;
                        wp_reset_postdata();
                    else :
                        echo 'No new products found.';
                    endif;
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>