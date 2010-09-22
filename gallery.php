<?php
/**
*   Template Name: Gallery
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
    <body class="gallery">
        <div id="screen">
            <?php @include('inc_body_header.php'); ?>
        
            <section class="G4 GR GS" id="content">
                <?php while (have_posts()): the_post(); ?>
                <article>
                    <header>
                        <h1><?php the_title(); ?></h1>
                    </header>
                    <div class="formatted">
                        <?php the_content(); ?>                        
                    </div><!-- .formatted -->
                </article>
                <?php endwhile; ?>
                <nav>
                    <ul class="containsGalleries">
                        <li>
                            <h1>Category Name</h1>
                            <ul class="containsGallery">
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-1"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-1"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-1"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-1"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-1"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-1"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-1"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-1"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                            </ul><!-- .containsGallery -->
                        </li>
                        <li>
                            <h1>Category Name</h1>
                            <ul class="containsGallery">
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-2"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>                                
                            </ul><!-- .containsGallery -->
                        </li>
                        <li>
                            <h1>Category Name</h1>
                            <ul class="containsGallery">
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-3"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-3"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-3"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                                <li class="G1"><a href="http://www.placeholder-image.com/image/288x288" rel="gallery-3"><img alt="" src="http://www.placeholder-image.com/image/142x142" title="" /></a></li>
                            </ul><!-- .containsGallery -->
                        </li>
                    </ul><!-- .containsGalleries -->
                </nav>
            </section><!-- #content.G4.GR.GS -->
            <hr class="implied" />
        
            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>