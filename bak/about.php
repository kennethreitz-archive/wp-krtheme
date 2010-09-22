<?php
/*
Template Name: About
*/
add_action('wp_head', 'page_head');
get_header();

function page_head() {
	?>
	<style type="text/css" media="all">
	.contentBody h1.contentTitle {
		margin-top: .4em;
	}

	.vcard dl {
		margin-bottom: 1.5em;
	}

	.vcard dt {
		clear: left;
		float: left;
		margin-right: .5em;
	}

	.vcard p {
		margin-bottom: 0;
	}

	div.map {
		padding-top: 10px;
		_overflow: hidden;
	}

	div.map img {
		border: 1px solid #d9d9d9;
	}

	@media screen and (max-device-width: 320px){
		.contentBody h1.contentTitle {
			margin-top: 1.5em;
		}
	}
	</style>
	<?php
}
?>

<div class="contentBody wide">
	<div class="lf w6c">
		<div class="lu w2c first-child">
			<?php if (have_posts()): while (have_posts()): the_post(); ?>
			<article>
				<h1 class="contentTitle"><?php the_title(); ?></h1>
				<div class="content vcard">
					<?php the_content(); ?>
				</div>
			</article>
			<?php endwhile; endif; ?>
		<!--/.lu .w2c--></div>
		<div class="lu w4c map">
			<figure>
				<img src="<?php bloginfo('template_url'); ?>/img/contact/map.png" width="630" height="552" />
			</figure>
			<a href="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=35.67444360601648,+139.71123307943344&amp;sll=35.674555,139.711289&amp;sspn=0.010162,0.019827&amp;ie=UTF8&amp;ll=35.674537,139.711289&amp;spn=0.010093,0.019827&amp;z=16">View in Google Maps</a>
		<!--/.lu .w4c .map--></div>
	<!--/.lf .w6c--></div>
</div><!-- /.contentBody -->
<?php get_footer(); ?>