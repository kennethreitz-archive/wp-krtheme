<?php /* Template Name: Single */

get_header(); ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
<div class="contentBody blogEntry">
	<nav class="blogSerial asideBlock">
		<?php ia3_prevnext(); ?>
	</nav>
	<article>
		<hgroup>
			<h1 class="contentTitle"><?php the_title(); ?></h1>
			<h2 class="postDate date"><?php echo date('l, F jS, Y', strtotime($post->post_date)); ?><?php edit_post_link('&raquo; Edit This Post', '&nbsp;&nbsp;&nbsp;'); ?></h2>
		</hgroup>
		<div class="asideBlock">

		</div>
		<div class="content entry">
			<?php the_content(); ?>
		</div>
	</article>

	<?php if(comments_open()): ?>
	<section id="comments">
		<?php comments_template(); ?>
	</section>
	<?php endif; ?>
</div>

<?php endwhile; endif; get_footer(); ?>