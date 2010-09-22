<?php
/*
Template Name: Archive
*/
add_action('wp_head', 'page_head');
get_header();

function page_head() {
	?>
	<script>
		$(function(){
			$('#quickFilter')
			.incrementalFilter({
				items: 'dl.entryList > dt',
				foundCounter: '#resultCount',
				totalCounter: '#totalCounter',
				minChars: 2
			})
			.focus();
		})
	</script>
	<?php
}
?>

<div class="contentBody">
	<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<article>
		<h1 class="contentTitle"><?php the_title(); ?></h1>
		<div class="content">
			<?php the_content(); ?>
		</div>
	</article>
	<?php endwhile; endif; ?>

	<div class="quickSearchBlock">
		<fieldset>
			<legend class="superiorTitle">Quick Search</legend>
			<input id="quickFilter" class="incrementalSearch" /> <span class="countIndicator"><span id="resultCount" class="resultCount"></span> / <span id="totalCounter" class="totalCount"></span></span>
		</fieldset>
	</div>

	<dl class="entryList">
		<?php
		query_posts('showposts=200');
		if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>
			<dt><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></dt>
			<dd>
				<div class="asideBlock date">
					<?php echo date('F jS, Y', strtotime($post->post_date)); ?>
				<!-- /.asideBlock --></div>
				<?php the_excerpt() ?>
			</dd>
		<?php
		endwhile;endif;
		wp_reset_query();
		?>
	</dl>
</div><!-- /.contentBody -->
<?php get_footer(); ?>