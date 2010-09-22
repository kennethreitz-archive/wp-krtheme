<header>
    <h1 class="G2 GS">
        <a href="<?php echo (defined('WP_SITEURL'))? WP_SITEURL: get_bloginfo('url'); ?>"><img alt="iA" src="<?php echo ia3_helpers::get_option('Logo', 'http://www.placeholder-image.com/image/142x55'); ?>" /></a>
    </h1><!-- .G2.GS -->
    <nav>
        <ul class="containsGrid G3" id="headerOne">
            <li class="G1 GS">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Header-1-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-1-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-1-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-1-4', ''); ?></li>
                </ul>
            </li>
            <li class="G1">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Header-2-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-2-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-2-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-2-4', ''); ?></li>
                </ul>
            </li>
            <li class="G1">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Header-3-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-3-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-3-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-3-4', ''); ?></li>
                </ul>
            </li>
        </ul><!-- .containsGrid.G3#headerOne -->
        <ul class="containsGrid G1" id="headerTwo">
            <li class="G1 GS">
                <h2 class="HSC"><?php echo ia3_helpers::get_nav_cell('Header-4-1', ''); ?></h2>
                <ul>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-4-2', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-4-3', ''); ?></li>
                    <li><?php echo ia3_helpers::get_nav_cell('Header-4-4', ''); ?></li>
                </ul>
            </li>
        </ul><!-- .containsGrid.G1x#headerTwo -->
    </nav>
</header>
<hr class="implied" />
