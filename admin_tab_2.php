<ul id="isIa3Tabs">
    <li class="firstChild"><a href="?page=ia3&amp;tab=1"><?php _e('Navigation', 'ia3'); ?></a></li>
    <li class="lastChild"><strong><a href="?page=ia3&amp;tab=2"><?php _e('Miscellaneous', 'ia3'); ?></a></strong></li>
</ul><!-- #isIa3Tabs -->

<div id="isIa3Content">
    <form action="admin.php?page=ia3&amp;tab=2&amp;save=1" method="post">
        <table class="isFormTable">
            <tr>
                <td class="isColLabel">
                    <label for="Colours-1"><?php _e('Theme Highlight Colour', 'ia3'); ?>:</label>
                </td>
                <td class="isColInput">
                    <input class="isInputMono isInputText" id="Colours-1" name="Colours-1" value="<?php echo ia3_helpers::get_option('Colours-1', '#CC0000'); ?>" />
                    
                    <p><em><?php _e('Specify the highlight colour used throughout the theme, as either a hexadecimal or RGB colour code.', 'ia3'); ?></em></p> 
                </td>
            </tr>
            <tr>
                <td class="isColLabel">
                    <label for="Colours-2"><?php _e('Theme Lowlight Colour', 'ia3'); ?>:</label>
                </td>
                <td class="isColInput">
                    <input class="isInputMono isInputText" id="Colours-2" name="Colours-2" value="<?php echo ia3_helpers::get_option('Colours-2', '#AA0000'); ?>" />
                    
                    <p><em><?php _e('Specify the lowlight colour used throughout the theme, as either a hexadecimal or RGB colour code.', 'ia3'); ?></em></p> 
                </td>
            </tr>
            <tr>
                <td class="isColLabel">
                    <label for="Colours-2"><?php _e('Theme Logo Image', 'ia3'); ?>:</label>
                </td>
                <td class="isColInput">
                    <input class="isInputMono isInputText isInputTextLong" id="Logo" name="Logo" value="<?php echo ia3_helpers::get_option('Logo', 'http://www.placeholder-image.com/image/144x87'); ?>" />
                    
                    <p><em><?php _e('Specify the image you wish to use in the theme header. The optimal size is 142 pixels wide and 55 pixels tall.', 'ia3'); ?></em></p> 
                </td>
            </tr>
            <tr class="lastChild">
                <td class="isColLabel">
                    &nbsp;
                </td>
                <td class="isColInput">
                    <button type="submit"><?php _e('Save Settings', 'ia3'); ?></button>
                </td>
            </tr>
        </table>
    </form>
</div><!-- #isIa3Content -->