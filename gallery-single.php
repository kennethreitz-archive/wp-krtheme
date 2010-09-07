<?php
/*
Template Name: Gallery (Single)
*/
function is_project_single() {
	return true;
}

add_action('wp_head', 'page_head');
get_header();

function page_head() {
	?>
	<style type="text/css" media="all">
	.visualIndex {
		margin-top: 6em;
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
			<li><div class="asideHeading superiorTitle">Category</div>
				<ul class="tile has6col">
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
				</ul>
			</li>
			<li><div class="asideHeading superiorTitle">Category</div>
				<ul class="tile has6col">
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
				</ul>
			</li>
			<li><div class="asideHeading superiorTitle">Category</div>
				<ul class="tile has6col">
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
					<li><figure><a href="#"><img src="<?php bloginfo('template_url')?>/img/gallery_dummy_small.png" width="93" height="59" alt="Dummy" /></a></figure></li>
				</ul>
			</li>
		</ul>
	</nav>

</div><!-- /.contentBody -->
<?php endwhile; endif; get_footer(); ?>