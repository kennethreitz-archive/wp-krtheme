<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=320" />
	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
	<meta name="description" content="<?php
	if(is_home()):
	echo 'Description for top page';
	else: if (have_posts()): while (have_posts()): the_post();
	echo strip_tags(get_the_excerpt()); endwhile; endif; endif;?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed (<?php bloginfo('language'); ?>)" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/img/apple-touch-icon.png" />

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/base.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/typography.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/list.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/frame.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/header.css" type="text/css" media="all" />
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/footer.css" type="text/css" media="all" />
	
	<?php if ($is_iphone): ?>
		<style type="text/css" media="screen">
			@import url(<?php bloginfo('template_url'); ?>/css/iphone.css) screen and (max-device-width: 320px);
		</style>		
	<?php endif ?>

	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.4.2.min.js"></script>	
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/libs.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.browser.addEnvClass.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.color.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.initInput.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.addFileInfo.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.incrementalFilter.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/init.js"></script>

	<?php if (get_post_meta(get_the_ID(), 'topup', false)): ?>
		<script type="text/javascript" src="http://gettopup.com/releases/latest/top_up-min.js"></script>
	<?php endif ?>

	<script type="text/javascript">tyntVariables = {"ap":"Read more: "};</script>
	<script type="text/javascript" src="http://tcr.tynt.com/javascripts/Tracer.js?user=czbFhGDRKr352eadbi-bnq"></script>

	<?php wp_head(); ?>

	<style type="text/css">
		nav a:visited,
		a.keepfresh:visited,
		a:link,
		a.keepfresh:visited,
		a.keepfresh:visited:hover,
		a.underlined:link:hover,
		a.underlined:visited:hover,
		a.underlined:hover span.acontent,
		.more:visited,
		.more-link:visited,
		.quickSearchBlock .countIndicator .zero,
		.topAside h3,
		header nav.mainNav ul li,
		header nav.langSelector ul li,
		footer h3,
		.superiorTitle,
		.red12px,
		ul.tile li a:hover,
		ul.tile li a:hover img { color:<?php echo ia3_get_option('ia3_highlight_color'); ?>; }
		a.pdf .fileType { background-color:<?php echo ia3_get_option('ia3_highlight_color'); ?>; }
		a:visited,
		a.file .originalText.notFound,
		nav.bigBlogSerial a .excerpt,
		div.entry .icaption,
		.contentBody .comment-meta a,
		#respond .loggedin,
		header nav ul li li em a,
		header nav ul li li em span.emcontent,
		dl.entryList dd .asideBlock,
		dl.entryList.small dd .asideBlock,
		dl.link dt a:visited,
		ul.link li a:visited { color:<?php echo ia3_get_option('ia3_lowlight_color'); ?>; }
		a.file:hover .fileType { background-color:<?php echo ia3_get_option('ia3_lowlight_color'); ?>; }
	</style>
</head>
<body>
<header>
	<div class="lf w6c">
		<div class="lu w2c first-child">
			<h1 class="siteid"><a href="<?php bloginfo('siteurl'); ?>/" class="sprite"><span class="rptext"><?php bloginfo('name'); ?></span></a></h1>
		</div>
		<div class="lu w3c">
			<a href="#" id="iMenu" class="forRMB">Menu</a>
			<nav class="mainNav">
				<ul class="lf w3c">
					<li class="lu w1c first-child"><span class="category"><?php echo ia3_get_layout_text('ia3_header_t1'); ?></span>
						<ul>
							<li><?php echo ia3_get_layout_select('ia3_header_11'); ?></li>
							<li><?php echo ia3_get_layout_select('ia3_header_12'); ?></li>
							<li><?php echo ia3_get_layout_select('ia3_header_13'); ?></li>
						</ul>
					</li>
					<li class="lu w1c"><span class="category"><?php echo ia3_get_layout_text('ia3_header_t2'); ?></span>
						<ul>
							<li><?php echo ia3_get_layout_select('ia3_header_21'); ?></li>
							<li><?php echo ia3_get_layout_select('ia3_header_22'); ?></li>
							<li><?php echo ia3_get_layout_select('ia3_header_23'); ?></li>
						</ul>
					</li>
					<li class="lu w1c"><span class="category"><?php echo ia3_get_layout_text('ia3_header_t3'); ?></span>
						<ul>
							<li><?php echo ia3_get_layout_select('ia3_header_31'); ?></li>
							<li><?php echo ia3_get_layout_select('ia3_header_32'); ?></li>
							<li><?php echo ia3_get_layout_select('ia3_header_33'); ?></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
		<div class="lu w1c">
			<a href="#" id="iLang" class="forRMB"><?php echo ia3_get_layout_text('ia3_header_t4'); ?></a>
			<nav class="langSelector">
				<ul>
					<li><span class="category">Related Site</span>
						<ul>
							<li><?php echo ia3_get_layout_text('ia3_header_41', TRUE); ?></li>
							<li><?php echo ia3_get_layout_text('ia3_header_42', TRUE); ?></li>
							<li><?php echo ia3_get_layout_text('ia3_header_43', TRUE); ?></li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</div>
</header>