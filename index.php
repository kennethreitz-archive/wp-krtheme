<?php
/**
*   Template Name: Index
**/

$featured_id = 0;
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
    <body class="index">
        <div id="screen">
            <?php @include('inc_body_header.php'); ?>
            
            <div id="content">
                <?php query_posts('category_name=Featured&showposts=1'); if (have_posts()): ?>
                <section class="G6 GS">
                    <h1 class="implied"><?php _e('Featured Article'); ?></h1>
                    <?php while (have_posts()): the_post(); 
                    $featured_id = get_the_ID();
                    ?>
                    <a href="<?php the_permalink() ?>">
                        <?php if (has_post_thumbnail()): ?>
                        <img alt="<?php the_title(); ?>" src="<?php $f = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); echo isset($f[0])? $f[0]: 'http://www.placeholder-image.com/image/942x504';?>" />
                        <?php else: ?> 
                        <img alt="<?php the_title(); ?>" src="<?php $f = get_post_custom_values('featured_image'); echo isset($f[0])? $f[0]: 'http://www.placeholder-image.com/image/942x504';?>" />   
                        <?php endif; ?>                           
                    </a>
                    <hgroup>
                        <h1><time datetime="<?php the_time('c') ?>" pubdate="pubdate"><?php the_date(); ?></time></h1>
                        <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>                        
                    </hgroup>
                    <div class="formatted">
                        <?php the_content('Read more'); ?>
                    </div><!-- .formatted -->
                    <?php endwhile; wp_reset_query(); ?>
                </section><!-- G6 GS -->
                <hr class="implied" />
                <?php endif; ?>
                
                <section class="G2 GS">
                    <?php if ((!function_exists('dynamic_sidebar')) || (!dynamic_sidebar())): ?>
                    <div>
                        <h1 class="HSC"><?php _e('About'); ?> <?php bloginfo('name'); ?></h1>
                        <p><em><?php echo trim(get_bloginfo('description'), '.'); ?></em>. <a href="<?php echo (defined('WP_SITEURL'))? WP_SITEURL: get_bloginfo('url'); ?>/profile/"><?php _e('Learn more'); ?></a></p>
                    </div>
                    <?php endif; ?>
                </section><!-- .ia.ia-2.ia-s -->
                
                <?php query_posts(array('post__not_in' => array($featured_id), 'showposts' => 3)); if (have_posts()): ?> 
                <section class="G4">
                    <h1 class="HSC"><?php _e('Latest Articles'); ?></h1>
                    <dl class="containsArticles">
                        <?php while(have_posts()): the_post(); ?>
    					<dt><a class="title" href="<?php the_permalink() ?>"><?php the_title(); ?></a></dt>
                        <dd>
                            <?php echo preg_replace('/<p>(.+?)<\/p>/','$1',get_the_excerpt()); ?> <a href="<?php the_permalink() ?>" class="more-link"><?php _e('Read more', 'ia3'); ?><span class="implied"> &ndash; &lsquo;<?php the_title(); ?>&rsquo;</span>.</a>
                        </dd>
                        <?php endwhile; wp_reset_query(); ?>
                    </dl><!-- .containsArticles -->
                    <p><a href="<?php echo (defined('WP_SITEURL'))? WP_SITEURL: get_bloginfo('url'); ?>/articles/"><?php _e('All Articles'); ?></a></p>
                </section><!-- G4 GR -->
                <?php endif; ?>
                <hr class="implied" />
            </div><!-- #content -->
            <hr class="implied" />

            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>