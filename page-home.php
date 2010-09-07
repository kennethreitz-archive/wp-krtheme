<?php
/*
Template Name: Home Page Template
*/
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
</article>
<?php endwhile; endif; ?>

<nav class="similarEntries" style="margin-top: 3em;">
<h2 class="superiorTitle">Latest Articles:</h2>

<?php $posts = get_posts('numberposts=3&order=DEC') ?>

<?php foreach ($posts as $post): ?>
	<dl class="entryList small"><dt><a href="<?php echo get_permalink($post->ID) ?>" rel="bookmark"><?php echo $post->post_title ?></a></dt>	
	<dd>
		<?php echo showBrief(strip_tags(Markdown($post->post_content)), 55) ?>&nbsp;<span class="grey">[<a class="black" href="<?php echo get_permalink($post->ID) ?>">...</a>]</span>
	</dd>
<?php endforeach ?>

</nav>

<p><a href="/blog/">More Articles</a></p>

</div><!-- /.contentBody -->
<?php get_footer(); ?>