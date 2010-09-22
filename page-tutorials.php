<?php
/**
*   Template Name: Tutorials
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
                    
                    <?php
                    
                    $tags = array();
                    $tagnames = array();

                    $posts = get_posts('cat=160&numberposts=-1&order=DEC'); //get all posts in category

                    foreach ($posts as $post){
                        $posttags = get_the_tags($post->ID); //check for tags
                        if ($posttags){
                            foreach ($posttags as $posttag){
                                    $tags[$posttag->term_id] = $posttag; // add to array of tag ids => names
                    				// $tagnames[$posttag->term_id] = $posttag->name;
                            }
                        }
                    }
                    ?>
                
                    
                	<?php foreach ($tags as $tag): ?>
            			<h2 style="font-size: 130%;"><?php echo $tag->name ?></h2>
            			<?php wp_reset_query(); ?>
            			<?php $posts = get_posts('cat=160&tag='.$tag->slug); ?>
            			<ol>
            			<?php foreach ($posts as $post): ?>
            				<li style="font-style: normal;"><a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title ?></a></li>
            			<?php endforeach ?> 
            			</ol>
            		<?php endforeach ?>
        			
                    
                </div><!-- .formatted -->
                <?php endwhile; ?>
            </article><!-- #content.G4.GR.GS -->
            <hr class="implied" />

            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>