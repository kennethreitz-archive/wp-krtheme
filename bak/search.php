<?php
/*
Template Name: Search
*/
get_header();
?>

<div class="contentBody">
	<h1 class="contentTitle">Search Results</h1>
	<?php if (have_posts()) : ?>
	<?php get_search_form(); ?>

	<div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>

	<dl class="entryList">
		<?php while (have_posts()) : the_post(); ?>
		<dt id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></dt>
		<dd class="postmetadata"><div class="asideBlock date"><?php the_time('F jS, Y') ?></div><?php the_excerpt() ?><?php the_tags('Tags: ', ', ', '<br />'); ?> </dd>
		<?php endwhile; ?>
	</dl>

	<div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>

	<?php else : ?>
	<p>No posts found. Try a different search?</p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</div><!-- /.contentBody -->
<?php get_footer(); ?>