<footer>
    <nav>
        <ul class="containsGrid G6 GS" id="footerOne">
            <li class="G2 GS">
                <h2 class="implied"><?php _e('Search', 'ia3'); ?> <?php bloginfo('name'); ?></h2>
                <?php get_search_form(); ?>
            </li>
            <li class="G1">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-1-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-1-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-1-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-1-4', ''); ?></li>
                </ul>
            </li>
            <li class="G1">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-2-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-2-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-2-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-2-4', ''); ?></li>
                </ul>
            </li>
            <li class="G1">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-3-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-3-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-3-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-3-4', ''); ?></li>
                </ul>
            </li>
            <li class="G1">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Contact-4-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-4-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-4-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Contact-4-4', ''); ?></li>
                </ul>
            </li>
        </ul><!-- .containsGrid.G6GS#footerOne -->
        
        <ul class="G6 GS" id="footerTwo">
            <li><?php echo ia3_helpers::get_nav_cell('Footer-1-1', ''); ?></li>
            <li><?php echo ia3_helpers::get_nav_cell('Footer-2-1', ''); ?></li>
            <li><?php echo ia3_helpers::get_nav_cell('Footer-3-1', ''); ?></li>
            <li><?php echo ia3_helpers::get_nav_cell('Footer-4-1', ''); ?></li>
            <li>© <?php echo date('Y') ?> Kenneth Reitz <em>&amp;</em> Co.</li>
        </ul><!-- G6.GS#footerOne -->
    </nav>
</footer>

<script src="http://platform.twitter.com/anywhere.js?id=5tkByG68UteUZBFKSFryA&amp;v=1"></script>

<script>!window.jQuery && document.write('<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/jquery-1.4.2.min.js"><\/script>');</script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/jquery.fancybox-1.3.1.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/external/jquery.timeago-0.9.min.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/assets/js/ia3.js?v=1"></script>
<script>
    window.BASE_URL = '<?php echo (defined('WP_SITEURL'))? WP_SITEURL: get_bloginfo('url'); ?>';

    $(document).ready(function() {
        $(document).trigger('CORE:HAS_INITIALIZED');
    });
    
    $(window).resize(function() {
        $(document).trigger('CORE:HAS_RESIZED');
    });
</script>

<?php wp_footer(); ?>