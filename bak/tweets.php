<?php
/*
Template Name: Tweets
*/

add_action('wp_head', 'page_head');
get_header();

function page_head(){
	?>
	<style type="text/css" media="all">
	.contentBody ul {
	color: #000;
	list-style: none;
	background-position: top;
	}

	.contentBody ul li {
	margin: 0;
	padding: .5em 0;
	background-position: bottom;
	}

	.contentBody figure.twitterIcon {
	margin: 0 10px 0 0;
	padding: 0;
	float: left;
	}

	.contentBody .lf {
	margin-bottom: 5em;
	}

	.contentBody a.tweetsHead {
	margin: 0 0 10px;
	color: #000;
	text-decoration: none;
	}

	.contentBody a.tweetsHead:hover * {
	text-decoration: underline;
	}

	.contentBody a.tweetsHead h2 {
	font-size: 150%;
	/*display: inline-block;*/
	margin: 0 0 5px;
	padding: 0px;
	line-height: 1;
	}

	.contentBody a.tweetsHead ul {
	margin: 0;
	float: left;
	font-size: 90%;
	}

	.contentBody a.tweetsHead ul li {
	padding: 0;
	line-height: 1.3;
	}

	.content.tweets {
	clear: left;
	font-size:14px;
	margin: .7em 0 0;
	word-wrap: break-word;
	}

	.tweetPosted a {
	color: #999;
	text-decoration: none;
	}

	@media screen and (max-device-width: 320px){
	.contentBody .lf {
	margin-bottom: 0;
	}
	}
	</style>
	<?php
}
?>

<?php
function ia_tweet($username, $fullname, $title){?>
	<a href="http://twitter.com/<?php echo $username ?>" class="tweetsHead">
		<figure class="twitterIcon">
			<img src="http://img.tweetimag.es/i/<?php echo $username?>_n" width="56" height="56" />
		</figure>
		<h2><?php echo $username?></h2>
		<ul>
			<li class="fullname"><?php echo $fullname?></li>
			<li class="jobtitle"><?php echo $title?></li>
		</ul>
	</a>
	<div class="content tweets">
		<?php if (function_exists('twitter_messages')) twitter_messages($username, 5, true, true, 'update'); ?>
	<!-- /.content .tweet--></div>
<?php } ?>

<?php if (have_posts()): while (have_posts()): the_post(); ?>
<div class="contentBody wide">
	<article>
		<h1 class="contentTitle"><?php the_title(); ?></h1>
		<div class="content">
			<?php the_content(); ?>

			<div class="lf w6c">
				<div class="lu w2c">
					<?php ia_tweet("iA","Oliver Reichenstein", "CEO, Founder")?>
				<!--/.lu .w2c--></div>

				<div class="lu w2c">
					<?php ia_tweet("iA_Chris","Chris Lüscher", "Partner")?>
				<!--/.lu .w2c--></div>

				<div class="lu w2c">
					<?php ia_tweet("iA_Cyrill","Cyrill Treptow", "Partner")?>
				<!--/.lu .w2c--></div>
			<!--/.lf .w6c--></div>

			<div class="lf w6c">
				<div class="lu w2c">
					<?php ia_tweet("iA2","Takeshi Tanaka", "Information Designer")?>
				<!--/.lu .w2c--></div>

				<div class="lu w2c">
					<?php ia_tweet("johanprag","Johan Prag", "Information Designer")?>
				<!--/.lu .w2c--></div>

				<div class="lu w2c">
					<?php ia_tweet("beseku","Ben Sekulowicz-Barclay", "CTO")?>
				<!--/.lu .w2c--></div>
			<!--/.lf .w6c--></div>

			<div class="lf w6c">
				<div class="lu w2c">
					<?php ia_tweet("webtrendmap","Trending Links", "iA Service")?>
				<!--/.lu .w2c--></div>

				<div class="lu w2c">
					<?php ia_tweet("tputh","Tputh", "iA Service")?>
				<!--/.lu .w2c--></div>
			<!--/.lf .w6c--></div>
		</div>
	</article>
</div><!-- /.contentBody -->
<?php endwhile; endif; get_footer(); ?>