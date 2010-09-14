<ul id="isIa3Tabs">
    <li class="firstChild"><strong><a href="?page=ia3&amp;tab=1"><?php _e('Navigation', 'ia3'); ?></a></strong></li>
    <li class="lastChild"><a href="?page=ia3&amp;tab=2"><?php _e('Miscellaneous', 'ia3'); ?></a></li>
</ul><!-- #isIa3Tabs -->

<div id="isIa3Content">
    <form action="admin.php?page=ia3&amp;tab=1&amp;save=1" method="post">
        <div class="isIa3Nav">
            <h3><?php _e('Header', 'ia3'); ?></h3>
            <table class="isIa3NavTable">
                <tr>
                    <th>
                        <div style="margin-right:38px">
                            <input class="isInputText" name="I-Header-1-1" value="<?php echo htmlentities(stripslashes(ia3_helpers::get_option('Header-1-1', __('Section Title', 'ia3')))); ?>" />
                        </div>
                    </th>
                    <th>
                        <div style="margin-right:38px">
                            <input class="isInputText" name="I-Header-2-1" value="<?php echo htmlentities(stripslashes(ia3_helpers::get_option('Header-2-1', __('Section Title', 'ia3')))); ?>" />
                        </div>
                    </th>
                    <th>
                        <div style="margin-right:38px">
                            <input class="isInputText" name="I-Header-3-1" value="<?php echo htmlentities(stripslashes(ia3_helpers::get_option('Header-3-1', __('Section Title', 'ia3')))); ?>" />
                        </div>
                    </th>
                    <th>
                        <div style="margin-right:38px;">
                            <input class="isInputText" name="I-Header-4-1" value="<?php echo htmlentities(stripslashes(ia3_helpers::get_option('Header-4-1', __('Section Title', 'ia3')))); ?>" />
                        </div>
                    </th>
                </tr>
                <tr>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-1-2'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-2-2'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-3-2'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-4-2'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-1-3'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-2-3'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-3-3'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-4-3'); ?>
                    </td>
                </tr>
                <tr class="lastChild">
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-1-4'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-2-4'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-3-4'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Header-4-4'); ?>
                    </td>
                </tr>
            </table><!-- .isIa3NavTable -->
        </div><!-- .isIa3Nav -->
    
        <div class="isIa3Nav">
            <h3><?php _e('Contact', 'ia3'); ?></h3>
            
            <table class="isIa3NavTable">
                <tr>
                    <th>
                        <div style="margin-right:38px">
                            <input class="isInputText" name="I-Contact-1-1" value="<?php echo htmlentities(stripslashes(ia3_helpers::get_option('Contact-1-1', __('Section Title', 'ia3')))); ?>" />
                        </div>
                    </th>
                    <th>
                        <div style="margin-right:38px">
                            <input class="isInputText" name="I-Contact-2-1" value="<?php echo htmlentities(stripslashes(ia3_helpers::get_option('Contact-2-1', __('Section Title', 'ia3')))); ?>" />
                        </div>
                    </th>
                    <th>
                        <div style="margin-right:38px">
                            <input class="isInputText" name="I-Contact-3-1" value="<?php echo htmlentities(stripslashes(ia3_helpers::get_option('Contact-3-1', __('Section Title', 'ia3')))); ?>" />
                        </div>
                    </th>
                    <th>
                        <div style="margin-right:38px">
                            <input class="isInputText" name="I-Contact-4-1" value="<?php echo htmlentities(stripslashes(ia3_helpers::get_option('Contact-4-1', __('Section Title', 'ia3')))); ?>" />
                        </div>
                    </th>
                </tr>
                <tr>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-1-2'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-2-2'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-3-2'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-4-2'); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-1-3'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-2-3'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-3-3'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-4-3'); ?>
                    </td>
                </tr>
                <tr class="lastChild">
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-1-4'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-2-4'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-3-4'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Contact-4-4'); ?>
                    </td>
                </tr>
            </table><!-- .isIa3NavTable -->
        </div><!-- .isIa3Nav -->
            
        <div class="isIa3Nav">
            <h3><?php _e('Footer', 'ia3'); ?></h3>
            <table class="isIa3NavTable">
                <tr class="lastChild">
                    <td>
                        <?php ia3_helpers::put_nav_cell('Footer-1-1'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Footer-2-1'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Footer-3-1'); ?>
                    </td>
                    <td>
                        <?php ia3_helpers::put_nav_cell('Footer-4-1'); ?>
                    </td>
                </tr>
            </table><!-- .isIa3NavTable -->
        </div><!-- .isIa3Nav -->
        
        <button style="margin-bottom:24px;" type="submit"><?php _e('Save Settings', 'ia3'); ?></button>
    </form>
</div><!-- #isIa3Content -->