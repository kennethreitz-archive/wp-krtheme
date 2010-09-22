<?php
/*
Template Name: Gallery
*/
add_action('wp_head', 'page_head');
get_header();

function page_head() {
	?>
	<style type="text/css" media="all">
	.visualIndex {
		margin-top: 6em;
	}

	.visualIndex .asideHeading {
		margin-top: -.13em;
	}
	</style>
	<?php
}
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
<div class="contentBody">
	<article>
		<h1 class="contentTitle"><?php the_title(); ?></h1>
		<div class="content">
			<?php the_content(); ?>
		</div>
	</article>

	<nav class="visualIndex">
	<ul>
		<li><div class="asideHeading superiorTitle">CATEGORY</div>
			<ul class="tile has4col">
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
			</ul>
		</li>
		<li><div class="asideHeading superiorTitle">CATEGORY</div>
			<ul class="tile has4col">
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
			</ul>
		</li>
		<li><div class="asideHeading superiorTitle">CATEGORY</div>
			<ul class="tile has4col">
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
				<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy.png" width="136" height="90" alt="dummy" /></a></figure></li>
			</ul>
		</li>
	</ul>
	</nav>
</div><!-- /.contentBody -->

<?php endwhile; endif; get_footer(); ?>