<?php 
$image = get_field('image');
$description = get_field('description');
$link = get_field('link');
?>
<section class="special-offer">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-6">
                <div class="special-offer__image">
                    <?php if($image): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="special-offer__right">
                    <?php if($description): ?>
                    <?php echo $description; ?>
                    <?php endif; ?>
                    <?php if($link): ?>
                    <div class="special-offer__right-link">
                        <a class="button" href="<?php echo $link['url']; ?>"><?php echo $link['title']; ?></a>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>