<?php
$subtitle = get_field('subtitle');
$description = get_field('description');
?>

<section class="blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog__description">
                    <div class="blog__description-subtitle">
                        <?php if($subtitle): ?>
                        <p><?php echo $subtitle; ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if($description): ?>
                    <?php echo $description; ?>
                    <?php endif; ?>
                </div>
                <div class="blog__posts responsive">
                    <?php
                    $featured_posts = get_field('posts');
                    if( $featured_posts ): ?>
                    <?php foreach( $featured_posts as $featured_post ): 
                        $permalink = get_permalink( $featured_post->ID );
                        $title = get_the_title( $featured_post->ID );
                        $content = get_the_content( '', false, $featured_post->ID );
                        $title = get_field( 'title', $featured_post->ID );
                        $thumbnail = get_the_post_thumbnail( $featured_post->ID)
                        ?>
                    <div class="blog__posts-block">
                        <div class="blog__posts-block-image">
                            <?php if($thumbnail): ?>
                            <?php echo $thumbnail; ?>
                            <?php endif; ?>
                            <p><?php echo date('j'); ?><span><?php echo date('M'); ?></span></p>
                            <?php if($title): ?>
                            <div><?php echo $title; ?></div>
                            <?php endif; ?>
                        </div>
                        <?php if($title): ?>
                        <h3><?php echo $title; ?></h3>
                        <?php endif; ?>
                        <p class="author">Posted by
                            <?php echo get_avatar( $post_author_id, 30 ); ?><?php echo get_the_author_meta('display_name', $author_id); ?>
                        </p>
                        <div class="blog__posts-block-description">
                            <?php if($content): ?>
                                <?php echo $content; ?>
                            <?php endif; ?>
                        </div>
                        <a href="<?php echo $permalink; ?>">Continue reading</a>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>