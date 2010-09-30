<meta charset="utf-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php bloginfo('name'); ?><?php wp_title('&ndash;'); ?></title>

<meta name="description" content="<?php if (have_posts() && !is_home()): while (have_posts()): the_post(); echo strip_tags(get_the_excerpt()); endwhile; else: echo get_bloginfo('description'); endif;?>" />
<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">

<link rel="shortcut icon" href="/favicon.ico">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/style.css?v=1">
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/style-ia3-1.0.2.css?v=1">
<link rel="stylesheet" href="<?php echo get_bloginfo('template_directory'); ?>/assets/css/style-fancybox-1.3.1.css?v=1">

<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/modernizr-1.5.min.js"></script>


<!-- Custom Colours -->
<style>
    a,
    a:hover,
    label,
    .HSC,
    .index #content section.G6 h1 {
    color:<?php echo ia3_helpers::get_option('Colours-1', '#CC0000'); ?>;
    }
    
    a:visited {
    color:<?php echo ia3_helpers::get_option('Colours-2', '#AA0000'); ?>;
    }
</style>

<?php wp_head(); ?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/extras.js"></script>