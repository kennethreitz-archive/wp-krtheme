<?php
/**
*   Template Name: Tweets
**/
?>
<!DOCTYPE html>
<!--[if IE 6 ]><html class="ie ielt9 ielt8 ielt7 ie6" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if IE 7 ]><html class="ie ielt9 ielt8 ie7" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if IE 8 ]><html class="ie ielt9 ie8" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="<?php bloginfo('language'); ?>"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="<?php bloginfo('language'); ?>"><!--<![endif]-->
    <head>
        <?php @include('inc_head.php'); ?>
    </head>
    <body class="tweets">
        <div id="screen">
            <?php @include('inc_body_header.php'); ?>
        
            <section class="G4 GR GS" id="content">
                <header>
                    <h1><?php _e('Tweets', 'ia3'); ?></h1>
                </header>
                
                <ol id="containsTweets"></ol><!-- #containsTweets -->
                
                <ul class="containsGrid" id="containsTwoosers">
                    <li class="G1 GS">
                        <hgroup>
                            <h2><a class="twooser" href="http://twitter.com/iA">iA</a></h2>
                            <h3>Oliver Reichenstein</h3>
                            <h4><abbr>CEO</abbr>, Founder</h4>
                        </hgroup>
                        <img alt="iA" class="twooser" src="http://purl.org/net/spiurl/iA" />
                    </li>
                    <li class="G1">
                        <hgroup>
                            <h2><a class="twooser" href="http://twitter.com/iA_Chris">iA_Chris</a></h2>
                            <h3>Chris Luscher</h3>
                            <h4>Partner</h4>
                        </hgroup>
                        <img alt="iA_Chris" src="http://purl.org/net/spiurl/iA_Chris" />
                    </li>                            
                    <li class="G1">
                        <hgroup>
                            <h2><a class="twooser" href="http://twitter.com/beseku">beseku</a></h2>
                            <h3>Ben Sekulowicz</h3>
                            <h4><abbr title="Chief Technology Officer">CTO</abbr></h4>
                        </hgroup>
                        <img alt="beseku" src="http://purl.org/net/spiurl/beseku" />
                    </li>
                    <li class="G1">
                        <hgroup>
                            <h2><a class="twooser" href="http://twitter.com/iA2">iA2</a></h2>
                            <h3>Takeshi Tanaka</h3>
                            <h4>Information Designer</h4>
                        </hgroup>
                        <img alt="iA2" src="http://purl.org/net/spiurl/iA2" />
                    </li>
                    <li class="G1 GS">
                        <hgroup>
                            <h2><a class="twooser" href="http://twitter.com/iA_Ralf">iA_Ralf</a></h2>
                            <h3>Ralf Ressman</h3>
                            <h4>Project Manager</h4>
                        </hgroup>
                        <img alt="iA2" src="http://purl.org/net/spiurl/iA_Ralf" />
                    </li>
                    <li class="G1">
                        <hgroup>
                            <h2><a class="twooser" href="http://twitter.com/tputh">tputh</a></h2>
                            <h3>Tputh</h3>
                            <h4>iA Service</h4>
                        </hgroup>
                        <img alt="tputh" src="http://purl.org/net/spiurl/tputh" />
                    </li>
                    <li class="G1">
                        <hgroup>
                            <h2><a class="twooser" href="http://twitter.com/webtrendmap">webtrendmap</a></h2>
                            <h3>Web Trend Map</h3>
                            <h4>iA Service</h4>
                        </hgroup>
                        <img alt="webtrendmap" src="http://purl.org/net/spiurl/webtrendmap" />
                    </li>
                </ul><!-- .containsGrid#containsTwoosers -->
                
                <?php while (have_posts()): the_post(); ?>
                <div class="formatted">
                    <?php the_content(); ?>
                </div><!-- .formatted -->
                <?php endwhile; ?>
            </section><!-- .G4.GR.GS -->
            <hr class="implied" />
        
            <?php @include('inc_body_footer.php'); ?>
            <script>
                $(document).ready(function() {
                    $(document).trigger('CORE:FOUND_TWEETLIST');
                });
            </script>
        </div><!-- #screen -->
    </body>
</html>    
