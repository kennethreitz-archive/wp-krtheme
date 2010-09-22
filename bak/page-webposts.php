<?php /* Template Name: State of the Web */ ?>

<?php
add_action('wp_head', 'page_head');
add_action('wp_footer', 'page_foot');
get_header();
function page_head(){
?>
<style type="text/css" media="all">
.contentBody {
	margin-bottom: 0;
}

.topAside {
	margin: 30px 0 45px;
	padding-top: 2em;
	font-size: 107.14%;
}

article.topFeatured hgroup,
article.topFeatured .content {
	margin-left: 324px;
}

.webkit article.topFeatured hgroup,
.webkit article.topFeatured .content,
.mozilla article.topFeatured hgroup,
.mozilla article.topFeatured .content {
	margin-left: 0;
}

article.topFeatured hgroup {
	margin-top: 2em;
	margin-bottom: 1em;
}

article.topFeatured h1 {
	font-size:40px;
	line-height: 1.075;
	/*letter-spacing: .05em;*/
}

article.topFeatured h1 a:visited, article.topFeatured h1 a {
	color: #000;
	text-decoration: none;
}

article.topFeatured .content {
	font-size: medium;
	margin-bottom: 1em;
}

article.topFeatured .content p {
	margin: 0;
	text-indent: 2em;
}

article.topFeatured .content p:first-child {
	text-indent: 0;
}

article.topFeatured .superiorTitle {
	font-size: 102%;
	letter-spacing: 0;
	margin: 0;
	text-transform: capitalize;
}

article.topFeatured .content h2 {
	font-size: 120%;
	line-height: 1.25;
	margin: .65em 0;
}

.webkit article.topFeatured .content,
.mozilla article.topFeatured .content {
	-webkit-column-count: 3;
	-webkit-column-gap: 18px;
	-moz-column-count: 3;
	-moz-column-gap: 18px;
	column-count: 3;
	column-gap: 18px;
}

.whitebg {
	border: 1px #fff solid !important;
}

#aboutia p {
	margin-top: 1.05em;
}

#latestArtilcles dl {
	margin: 0;
}

div.more-link {
	margin-top: 1em;
}
	
@media screen and (max-device-width: 320px){

	article.topFeatured hgroup,
	article.topFeatured .content {
		margin-left: 0;
	}

	.webkit article.topFeatured .content {
		-webkit-column-count: 1;
		-webkit-column-gap: 0;
		column-count: 1;
		column-gap: 0;
	}

	article.topFeatured h1 {
		font-size: 200%;
	}

	article.topFeatured .content p {
		margin-bottom: 1.5em;
		text-indent: 0;
	}

	#latestArtilcles {
		margin-top: 2.5em;
	}

	.contentBody figure img {
		margin-left: -10px;
		max-width: 320px;
	}

	.whitebg {
		border: none !important;
		background: #fff;
	}
}
</style>
<?php }
function page_foot(){?><?php }?>
<div class="contentBody ">
	<h1 style="font-size: 200%;">State of the Web</h1>
	<p>Musings &amp; Updates on What Powers the Internet.</p>
</div>

<div class="contentBody wide">


<aside class="lf w6c topAside">

<section class="lu w2c first-child" id="aboutia">
<h3>ABOUT KENNETH</h3>
<div class="content">
	<p><em>Kenneth Reitz</em> is a passionate <br />web developer from <br />Winchester, Virginia.</p>
	<div class="more-link"><a href="<?php bloginfo('siteurl'); ?>/about/">Learn more</a>.</div>
<!-- /.content --></div>
<!--/.lu .w2c--></section>

<section class="lu w4c" id="latestArtilcles">
<h3>LATEST ARTICLES</h3>
<div class="content">
<dl class="entryList small">
<?php
query_posts('showposts=5&cat=5');
if ( have_posts() ) : while ( have_posts() ) : the_post();
?><dt><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></dt>
<dd><?php echo preg_replace('/<p>(.+?)<\/p>/','$1',get_the_excerpt()); ?> <a href="<?php the_permalink() ?>" class="more-link">Read <span class="verbose">"<?php the_title(); ?>"</span> more</a></dd>
<?php
endwhile;endif;
wp_reset_query();
?></dl>

<div class="more-link"><a href="<?php bloginfo('siteurl'); ?>/cat/web/">Archive</a></div>

<!-- /.content --></div>
<!--/.lu .w2c--></section>

<!--/.lf .w6c　.topAside--></aside>

<!-- /.contentBody --></div>

<?php get_footer()?>