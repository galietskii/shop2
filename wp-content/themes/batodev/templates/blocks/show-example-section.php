<?php
$image = get_field('image');
$subtitle = get_field('subtitle');
$description = get_field('description');
$link_now = get_field('link_now');
$link_more = get_field('link_more');
?>

<section class="show-example">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <?php if($image): ?>
                <div class="show-example__image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <div class="show-example__description">
                    <?php if($subtitle): ?>
                    <p class="subtitle"><?php echo $subtitle; ?></p>
                    <?php endif; ?>
                    <?php if($description): ?>
                    <?php echo $description; ?>
                    <?php endif; ?>
                    <div class="show-example__description-links">
                        <?php if($link_now): ?>
                        <a class="button" href="<?php echo $link_now['url']; ?>"><?php echo $link_now['title']; ?></a>
                        <?php endif; ?>
                        <?php if($link_more): ?>
                        <a class="button" href="<?php echo $link_more['url']; ?>"><?php echo $link_more['title']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>