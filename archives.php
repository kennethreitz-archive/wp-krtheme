<?php
/**
*   Template Name: Archives
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
    <body class="archives">
        <div id="screen">
            <?php @include('inc_body_header.php'); ?>
        
            <section class="G4 GR" id="content">
                <header>
                    <h1><?php the_title(); ?></h1>
                    <?php get_search_form(); ?>
                </header>
                <dl class="containsArticles">
                    <?php query_posts('orderby=date&order=DESC&posts_per_page=-1'); while(have_posts()): the_post(); ?>
                    <dt>
                        <hgroup>
                            <a class="title" href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                            <time class="date" datetime="<?php the_time('c') ?>" pubdate="pubdate"><?php the_date(); ?></time>
                        </hgroup>  
                    </dt>
                    <dd>
                        <?php echo preg_replace('/<p>(.+?)<\/p>/','$1',get_the_excerpt()); ?> <a href="<?php the_permalink() ?>" class="more-link"><?php _e('Read more', 'ia3'); ?><span class="implied"> &ndash; &lsquo;<?php the_title(); ?>&rsquo;</span>.</a>
                    </dd>
                    <?php endwhile; ?>
                </dl><!-- .containsArticles -->
            </section><!-- #content.ia.ia-4.ia-r.ia-s -->
            <hr class="implied" />
        
            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>