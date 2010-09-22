<?php
/**
*   Template Name: Page
**/
?>
<!DOCTYPE html>
<!--[if IE 6 ]><html class="ie ielt9 ielt8 ielt7 ie6" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if IE 7 ]><html class="ie ielt9 ielt8 ie7" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if IE 8 ]><html class="ie ielt9 ie8" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="<?php bloginfo('language'); ?>"><!--<![endif]-->
    <head>
        <?php @include('inc_head.php'); ?>
    </head>
    <body class="page">
        <div id="screen">
            <?php @include('inc_body_header.php'); ?>

            <article class="G4 GR GS" id="content">
                <?php while (have_posts()): the_post(); ?>
                <header>
                    <h1><?php the_title(); ?></h1>
                </header>
                <div class="formatted">
                    <?php the_content(); ?>
                </div><!-- .formatted -->
                <?php endwhile; ?>
            </article><!-- #content.G4.GR.GS -->
            <hr class="implied" />

            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>