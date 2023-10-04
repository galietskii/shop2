<?php 
    $description = get_field('description');
    $link_shop = get_field('link_shop');
    $link_more = get_field('link_more');
    $image = get_field('image');
?>

<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php if($description): ?>
                <div class="discount__description">
                    <?php echo $description; ?>
                    <a class="button" href="<?php echo $link_shop['url']; ?>"><?php echo $link_shop['title']; ?></a>
                    <a class="button" href="<?php echo $link_more['url']; ?>"><?php echo $link_more['title']; ?></a>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <?php if($image): ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>