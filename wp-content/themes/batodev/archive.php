<?php
get_header();
?>

<main id="main" class="site-main">
    <header class="page-header">
        <h1 class="page-title">
            <?php
            if (is_category()) :
                single_cat_title();
            elseif (is_tag()) :
                single_tag_title();
            elseif (is_author()) :
                the_post();
                echo 'Архив автора: ' . get_the_author();
                rewind_posts();
            elseif (is_day()) :
                echo 'Архив за ' . get_the_date();
            elseif (is_month()) :
                echo 'Архив за ' . get_the_date(_x('F Y', 'monthly archives date format'));
            elseif (is_year()) :
                echo 'Архив за ' . get_the_date(_x('Y', 'yearly archives date format'));
            else :
                echo 'Архивы';
            endif;
            ?>
        </h1>
    </header><!-- .page-header -->

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();

        endwhile;

        the_posts_pagination();
    else :

        echo 'Извините, ничего не найдено.';
    endif;
    ?>
</main>

<?php
get_sidebar(); 
get_footer();
?>