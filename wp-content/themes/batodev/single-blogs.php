<?php
get_header();
?>

<main id="main" class="site-main">
    <?php
    while (have_posts()) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="entry-meta">
                    <?php
                    ?>
                </div>
            </header>

            <div class="entry-content">
                <?php
                the_content();
                ?>
            </div>

            <footer class="entry-footer">
                <?php
                ?>
            </footer>
        </article><!-- #post-<?php the_ID(); ?> -->

    <?php endwhile; ?>

    <nav class="post-navigation">
        <?php
        ?>
    </nav>

    <?php
    if (comments_open() || get_comments_number()) :
        comments_template();
    endif;
    ?>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>