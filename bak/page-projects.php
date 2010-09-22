<?php /* Template Name: Projects */ ?>

<?php
add_action('wp_head', 'page_head');
add_action('wp_footer', 'page_foot');
get_header();
function page_head(){?><?php }
function page_foot(){?><?php }?>

<div class="contentBody">
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
		<article>
			<h1 class="contentTitle"><?php the_title(); ?></h1>
			<div class="content">
				<?php the_content(); ?>
			</div>
			
			<div id="projects">
				<?php $api = new clAPI('http://github.com/api/v1/xml/kennethreitz') ?>
				<?php if ($api->parse('1 hour')): ?>
					<?php foreach($api->xpath('//repository') as $repo): ?>
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
									<a href="http://github.com/kennethreitz/<?php echo $repo->name ?>/zipball/HEAD" class="file zip grey"><span class="fileType">ZIP</span></a>
									<a href="http://github.com/kennethreitz/<?php echo $repo->name ?>/tarball/HEAD" class="file tar grey"><span class="fileType">TAR</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
									
									Watchers: <?php echo $repo->watchers ?> &nbsp;&nbsp;&nbsp;&nbsp;
									Issues: <a class="test" href="#"><?php echo $repo->open-issues ?></a>
									
								<span>
							</p>

						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
			
			
			
		
		</article>
	<?php endwhile; endif; ?>

	


</div>
<?php get_footer(); ?>