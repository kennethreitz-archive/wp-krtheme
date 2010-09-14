<?php
/*
Template Name: Page-template
*/
get_header();
?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
<div class="contentBody">
	<article>
		<h1 class="contentTitle"><?php the_title(); ?></h1>
		<div class="content">
			<?php the_content(); ?>
		</div>
	</article>

	<?php if(comments_open()): ?>
	<section id="comments">
		<?php comments_template(); ?>
	</section>
	<?php endif; ?>
</div><!-- /.contentBody -->
<?php endwhile; endif; get_footer(); ?>