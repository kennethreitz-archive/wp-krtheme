<?php
/**
*   Template Name: Single
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
    <body class="single">
        <div id="screen">
            <?php @include('inc_body_header.php'); ?>
        
            <section class="G4 GR GS" id="content">
                <?php while (have_posts()): the_post(); ?>
                <article>
                    <header>
                        <h1><?php the_title(); ?></h1>
                        <h2><time datetime="<?php the_time('c') ?>" pubdate="pubdate"><?php the_date() ?></time></h2>
                        <nav>
                            <ul>
                                <?php if(get_previous_post()): ?>
                                <li><?php previous_post_link('%link', __('&laquo; Previous', 'ia3')); ?></li>
                        	    <?php else: ?>
                                <li><?php _e('&laquo; Previous;', 'ia3'); ?></li>
                        	    <?php endif; ?>
                        	    
                        	    <?php edit_post_link(__('Edit', 'ia3'), '<li>', '</li>'); ?>
                        	    
                        	    <?php if(get_next_post()): ?>
                                <li><?php next_post_link('%link',  __('Next &raquo;', 'ia3')); ?></li>
                        	    <?php else: ?>
                                <li><?php _e('Next &raquo;', 'ia3'); ?></li>
                        	    <?php endif; ?>
                        	</ul>
                        </nav>
                    </header>
                    <div class="formatted">
                        <?php the_content(); ?>
                    </div><!-- .formatted -->
                </article>
                
                <?php comments_template(); ?>
                
                <?php endwhile; ?>
            </section><!-- #content.G4.GR.GS -->
            <hr class="implied" />
        
            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>