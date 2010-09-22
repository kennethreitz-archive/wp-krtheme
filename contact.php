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
                    <p><a href="http://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=209+W+Boscawen+St,+Winchester,+VA+22601&sll=39.18566,-78.163334&sspn=0.115226,0.264187&ie=UTF8&hq=&hnear=209+W+Boscawen+St,+Winchester,+Virginia+22601&t=h&z=17"><?php _e('View in Google Maps', 'ia3'); ?></a></p>
                </section><!-- G4 GR -->
                <section class="G2 GS">
                    <dl class="containsAddress">
                        <dt><?php _e('Mail', 'ia3'); ?>:</dt>
                        <dd class="email"><a href="mailto:ping@kennethreitz.com">ping@kennethreitz.com</a></dd>
                        <dt><?php _e('Phone', 'ia3'); ?>:</dt>
                        <dd class="tel">+1.540.200.8536</dd>
                        <dt><?php _e('Twitter', 'ia3'); ?>:</dt>
                        <dd class="twitter"><a class="twooser" href="http://twitter.com/kennethreitz">@kennethreitz</a></dd>
                        <dt><?php _e('LinkedIn', 'ia3'); ?>:</dt>
                        <dd class="linkedin"><a href="http://www.linkedin.com/in/kennethreitz">Kenneth Reitz</a></dd>
                        <dt class="url"><a href="http://kennethreitz.com/" class="org">Kenneth Reitz</a></dt>
                        <dd class="address">
                            <address>
                                209 West Boscawen Street<br />
                                Suite 300<br />
                                Winchester, Virginia<br /> 
                                22601-4141<br />
                                USA
                            </address>
                        </dd>
                    </dl>
                    <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=kennethreitz', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
                        <fieldset>
                            <label class="HSC" for="darth-vader"><?php _e('Newsletter', 'ia3'); ?>:</label>
                            <input type="hidden" value="kennethreitz" name="uri"><input type="hidden" name="loc" value="en_US">
                            
                            <input id="darth-vader" name="email" type="text" />
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