<?php
/**
*   Template Name: Home
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
                    
                    
                
                    <nav class="similarEntries" style="margin-top: 3em;">
                    <h1 style="padding-top:1.5em; margin-bottom: 0.65em;">Latest Articles:</h1>

                    <?php $posts = get_posts('numberposts=3&order=DEC'); ?>

                    <?php foreach ($posts as $post): ?>
                    	<dl class="entryList small"><dt><span style="font-size: 1.2em; margin-top: 4em;"><a href="<?php echo get_permalink($post->ID) ?>" rel="bookmark"><?php echo $post->post_title ?></a></dt></span>
                    	<dd>
                    		<?php echo showBrief(strip_tags($post->post_content), 40) ?>&nbsp;<span class="grey">[<a class="black" href="<?php echo get_permalink($post->ID) ?>">...</a>]</span>
                    	</dd>
                    	<div style="height: 1em;"></div>
                    <?php endforeach ?>

                    </nav>

                    <p><a href="/blog/">More Articles</a></p>
        			
                    
                </div><!-- .formatted -->
                <?php endwhile; ?>
            </article><!-- #content.G4.GR.GS -->
            <hr class="implied" />

            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>