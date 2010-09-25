<?php
/**
*   Template Name: Project Archive
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
                    function cmp($a, $b) {
                        if ($a->watchers == $b->watchers) { return 0; }
                        return ($a->watchers < $b->watchers) ? -1 : 1;
                    } ?>
                    
                    <div id="projects">
        				<?php $api = new clAPI('http://github.com/api/v1/xml/kennethreitz') ?>
        				<?php if ($api->parse('1 hour')): ?>
        					<?php foreach(array_reverse($api->xpath('//repository')) as $repo): ?>
        						<div>
        							<h2 style="margin: 1em 0 0.3em -0.8em;">
        								&raquo; <a href="<?php echo $repo->url ?>" class="black">
        								<?php echo $repo->name ?> 
        								<?php if ($repo->fork == 'true'): ?>
        									<span class="grey">&nbsp;#fork</span>
        								<?php endif?>
        								</a>
        							</h2>
        							<p>
        								<?php echo $repo->description ?> <br />

        								<span class="grey">
        									<a href="http://github.com/kennethreitz/<?php echo $repo->name ?>/zipball/HEAD" class="file zip grey"><span class="fileType">ZIP</span></a> | 
        									<a href="http://github.com/kennethreitz/<?php echo $repo->name ?>/tarball/HEAD" class="file tar grey"><span class="fileType">TAR</span></a>&nbsp;&nbsp;&nbsp;&nbsp;

        									Watchers: <?php echo $repo->watchers ?> &nbsp;&nbsp;&nbsp;&nbsp;
        									Issues: <a class="test" href="#"><?php echo $repo->open-issues ?></a>

        								<span>
        							</p>

        						</div>
        					<?php endforeach; ?>
        				<?php endif; ?>
        			</div>
        			
                    
                </div><!-- .formatted -->
                <?php endwhile; ?>
            </article><!-- #content.G4.GR.GS -->
            <hr class="implied" />

            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>