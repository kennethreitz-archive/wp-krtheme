<?php
/**
*   Template Name: 404
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

            <section class="G4 GR GS" id="content">
                <article>
                    <header>
                        <h1><?php _e('File Not Found'); ?></h1>
                    </header>
                    <div class="formatted">
                        <h2><?php _e('Oops, Not Found!'); ?></h2>
            			<p><?php _e('Sorry, we were unable to find the page you were looking for.'); ?></p>
            			<ul>
            			    <li><a href="<?php echo (defined('WP_SITEURL'))? WP_SITEURL: get_bloginfo('url'); ?>"><?php _e('Return to the home page.'); ?></a></li>
            			</ul>
                    </div><!-- .formatted -->
                </article>
            </section><!-- #content.G4.GR.GS -->
            <hr class="implied" />

            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>