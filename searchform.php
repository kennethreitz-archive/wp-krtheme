<form action="<?php echo (defined('WP_SITEURL'))? WP_SITEURL: get_bloginfo('url'); ?>" method="get">  	
    <fieldset>
        <label class="HSC" for="luke-skywalker"><?php _e('Search', 'ia3'); ?></label>
        <input id="luke-skywalker" name="s" placeholder="" type="text" value="<?php the_search_query(); ?>" />
        <input type="submit" value="<?php _e('Search', 'ia3'); ?>" />
    </fieldset>
</form>