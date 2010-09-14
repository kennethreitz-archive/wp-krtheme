<?php
/**
*   Template Name: Contact
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
    <body class="contact">
        <div id="screen">
            <?php @include('inc_body_header.php'); ?>

            <section class="G6 GR" id="content">
                <header class="G4 GR">
                    <h1><?php _e('Contact', 'ia3'); ?></h1>
                </header><!-- G4 GR -->
                <section class="G4 GR">
                    <img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/map.png" />
                    <p><a href="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Information+Architects,+Inc.&amp;sll=35.674494,139.711289&amp;sspn=0.010389,0.010868&amp;ie=UTF8&amp;hq=Information+Architects,+Inc.&amp;hnear=&amp;ll=35.674494,139.711289&amp;spn=0.010389,0.010868&amp;z=17&amp;iwloc=A"><?php _e('View in Google Maps', 'ia3'); ?></a></p>
                </section><!-- G4 GR -->
                <section class="G2 GS">
                    <dl class="containsAddress">
                        <dt><?php _e('Mail', 'ia3'); ?>:</dt>
                        <dd class="email"><a href="mailto:contact@informationarchitects.jp">contact@informationarchitects.jp</a></dd>
                        <dt><?php _e('Phone', 'ia3'); ?>:</dt>
                        <dd class="tel">+81-3-5913-9841</dd>
                        <dt><?php _e('Twitter', 'ia3'); ?>:</dt>
                        <dd class="twitter"><a class="twooser" href="http://twitter.com/ia">@ia</a></dd>
                        <dt><?php _e('LinkedIn', 'ia3'); ?>:</dt>
                        <dd class="linkedin"><a href="http://www.linkedin.com/in/informationarchitect">Oliver Reichenstein</a></dd>
                        <dt class="url"><a href="http://informationarchitects.jp/" class="org">Information Architects, Inc.</a></dt>
                        <dd class="address">
                            <address>
                                Murayama Building 2F<br />
                                2-20-13
                                Jingu-mae,<br /> Shibuya-ku, 
                                Tokyo
                                150-0001<br />
                                Japan
                            </address>
                        </dd>
                    </dl>
                    <form action="" method="">
                        <fieldset>
                            <label class="HSC" for="darth-vader"><?php _e('Newsletter', 'ia3'); ?>:</label>
                            <input id="darth-vader" name="" type="text" value="" />
                            <input type="submit" value="<?php _e('Subscribe', 'ia3'); ?>" />
                        </fieldset>
                    </form>
                </section><!-- G2 GS -->
            </section><!-- #content.ia.ia-6.ia-r.ia-s -->
            <hr class="implied" />

            <?php @include('inc_body_footer.php'); ?>
        </div><!-- #screen -->
    </body>
</html>