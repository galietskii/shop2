<?php
$background = get_field('background');
$subtitle = get_field('subtitle');
$title = get_field('title');
$description = get_field('description');
$button_shop = get_field('button_shop');
$button_more = get_field('button_more');
?>
 
<section class="hero" style="background-image: url('<?php echo $background; ?>')">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="hero__block">
                    <?php if($subtitle): ?>
                    <p class="hero__block-subtitle"><?php echo $subtitle; ?></p>
                    <?php endif; ?>
                    <?php if($title): ?>
                    <h1><?php echo $title; ?></h1>
                    <?php endif; ?>
                    <?php if($description): ?>
                    <p><?php echo $description; ?></p>
                    <?php endif; ?>
                    <div class="hero__block-links">
                        <?php if($button_shop): ?>
                        <a href="<?php echo $button_shop['url']; ?>"><?php echo $button_shop['title']; ?></a>
                        <?php endif; ?>
                        <?php if($button_more): ?>
                            <a href="<?php echo $button_more['url']; ?>"><?php echo $button_more['title']; ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>