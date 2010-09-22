<?php
    /**
    *
    *   iA³ (Back) generates the options pages within the Wordpress Administration area and allows users to
    *   modify several aspects of the iA³ theme. Currently, these are the header/footer navigation items, the
    *   type of search they want to use and the Twitter accounts used by the Tweets template. And the colour
    *   used for links and (some) headings.
    *
    *   @author Ben Sekulowicz-Barclay (iA).
    *
    **/

    class ia3_back {

        /**
		*	@access	public
    	*	@return	void
		*
		*/

		public function do_setup() {
		    add_menu_page('iA³', 'iA³', 'administrator', 'ia3', array('ia3_back', 'display_admin_page'));
            add_option('ia3_options', '', '', 'yes');
		}

		/**
		*	@access	public
    	*	@return	void
		*
		*/

		public function display_admin_page() {
            // If we are saving from somewhere ...
		    if (isset($_GET['save']) && $_GET['save'] == 1) {

		        // Saving from tab #1: Navigation
		        if (isset($_GET['tab']) && $_GET['tab'] == 1) {
		            ia3_back::save_tab_1();

		        // Saving from tab #2: Miscellaneous
		        } elseif (isset($_GET['tab']) && $_GET['tab'] == 2) {
		            ia3_back::save_tab_2();
		        }
		    }

            @include('admin_page.php');
		}

		/**
		*	@access	public
    	*	@return	void
		*
		*/

		static function save_tab_1() {
		    $fields = array(array('Header', 4, 4), array('Contact', 4, 4), array('Footer', 4, 1));

		    foreach($fields as $field) {
		        for($i = 1; $i <= $field[1]; $i++) {
                    for($j = 1; $j <= $field[2]; $j++) {

                        $key = $field[0] . '-' . $i . '-' . $j;

                        if ((isset($_POST['S-' . $key])) && ($_POST['S-' . $key] != '-1')) {
                            ia3_helpers::set_option($key, $_POST['S-' . $key]);
                        } else {
                            ia3_helpers::set_option($key, $_POST['I-' . $key]);
                        }
                    }
    		    }
		    }

		    // Display an error/success message here?
		    echo '<div class="updated" id="message"><p>' . __('Your navigation settings have been successfully updated') . '</p></div>';

			return true;
		}

		/**
		*	@access	public
    	*	@return	void
		*
		*/

		static function save_tab_2() {
            ia3_helpers::set_option('Colours-1', $_POST['Colours-1']);
            ia3_helpers::set_option('Colours-2', $_POST['Colours-2']);
            ia3_helpers::set_option('Logo', $_POST['Logo']);

            // Display an error/success message here?
		    echo '<div class="updated" id="message"><p>' . __('Your miscellaneous settings have been successfully updated') . '</p></div>';

		    return true;
		}
    }

    if (function_exists('add_action')) {
        add_action('admin_menu', array('ia3_back', 'do_setup'));
    }

    /**
    *
    *   iA³ (Helpers) contains several helpers that allow the theme to perform
    *   as it should, as well as adding a few extra pieces of functionality when needed.
    *
    *   @author Ben Sekulowicz-Barclay (iA).
    *
    **/

    class ia3_helpers {

        /**
        *	@param	string
        *	@return string
        *	@author Ben Sekulowicz-Barclay
        *
        *	Returns the page based on the ID, (key) passed to it.
        *
        **/

        static function get_category($key = '') {
        	$cs = get_categories();

        	foreach($cs as $c) {
        		if ($c->cat_ID == $key) return $c;
        	}

        	return $cs[0];
        }

        /**
        *	@param	string
        *	@return string
        *	@author Ben Sekulowicz-Barclay
        *
        *	Returns the page based on the ID, (key) passed to it.
        *
        **/

        static function get_page($key = '') {
        	$ps = get_pages();

        	foreach($ps as $p) {
        		if ($p->ID == $key) return $p;
        	}

        	return $ps[0];
        }

        /**
		*	@access	static
		*	@param	string
		*	@param	string
    	*	@return	string
		*
		*/

		static function get_option($key, $default = '') {
		    $array = get_option('ia3_options');

            return (is_array($array) && isset($array[$key]))? $array[$key]: $default;
		}

		/**
		*	@access	static
		*	@param	string
    	*	@return	string
		*
		*/

		static function set_option($key, $value) {
		    $array = get_option('ia3_options');
		    if (!is_array($array)) $array = array();

		    $array[$key] = $value;

		    update_option('ia3_options', $array);
		}

		/**
		*	@access	static
		*	@param	string
    	*	@return	string
		*
		*/

		static function get_nav_cell($key = '', $default = '') {
		    $array = array();
		    $value = ia3_helpers::get_option($key);
		    
		    if ($value == '') return $default;

		    if (preg_match("/^c\-(.*)/", $value, $array)) {
		        $item = ia3_helpers::get_category($array[1]);

        		$item_i = isset($item->cat_ID)? $item->cat_ID: 0;
        		$item_n = isset($item->name)? $item->name: __('Unknown');
        		$item_l = get_category_link($item_i);
        		
        		if (strpos($item_l . '***', $_SERVER['REQUEST_URI'] . '***')) {
                    return '<strong><a href="' . $item_l . '">' . $item_n . '</a></strong>';
                } else {
                    return '<a href="' . $item_l . '">' . $item_n . '</a>';
                }

        	} else if (preg_match("/^p\-(.*)/", $value, $array)) {
        	    $item = ia3_helpers::get_page($array[1]);

        		$item_i = isset($item->ID)? $item->ID: 0;
        		$item_n = isset($item->post_title)? $item->post_title: __('Unknown');
        		$item_l = get_page_link($item_i);
        		
        		if (strpos($item_l . '***', $_SERVER['REQUEST_URI'] . '***')) {
                    return '<strong><a href="' . $item_l . '">' . $item_n . '</a></strong>';
                } else {
                    return '<a href="' . $item_l . '">' . $item_n . '</a>';
                }
        	} else {
        	    $item_l = stripslashes($value);
        	    $item_u = array();
                
        	    if (preg_match("/^<a(.+)href=\"(.+)\"(.+)<\/a>$/", $item_l, $item_u)) {
        	        
        	        if (isset($item_u[2]) && strpos($item_u[2] . '***', $_SERVER['REQUEST_URI'] . '***')) {
                        return '<strong>' . $item_l . '</strong>';
                    } else {
                        return $item_l;
                    }
        	    }
                
                return $item_l;
		    }
		}

		/**
		*	@access	static
		*	@param	string
    	*	@return	void
		*
		*/

		static function put_nav_cell($key = '') {
		    $cs = get_categories();
		    $ps = get_pages();

		    $selected = FALSE;
		    ?>
		    <div style="margin-bottom:6px;margin-right:24px">
		        <select name="S-<?php echo $key; ?>">
                    <option value="-1"></option>
                    <optgroup label="<?php _e('Categories'); ?>">
						<?php
						foreach($cs as $c):
						if (ia3_helpers::get_option($key) == "c-" . $c->term_id):

						$selected = TRUE;
						?>
						<option value="c-<?php echo $c->term_id; ?>" selected="selected"><?php echo $c->name; ?></option>
						<?php else: ?>
						<option value="c-<?php echo $c->term_id; ?>"><?php echo $c->name; ?></option>
						<?php endif; endforeach; ?>
					</optgroup>
					<optgroup label="<?php _e('Pages'); ?>">
						<?php
						foreach($ps as $p):
						if (ia3_helpers::get_option($key) == "p-" . $p->ID):

						$selected = TRUE;
						?>
						<option value="p-<?php echo $p->ID; ?>" selected="selected"><?php echo $p->post_title; ?></option>
						<?php else: ?>
						<option value="p-<?php echo $p->ID; ?>"><?php echo $p->post_title; ?></option>
						<?php endif; endforeach; ?>
					</optgroup>
                </select>
            </div>
            <div style="margin-right:38px">
                <?php if($selected == TRUE): ?>
                <input class="isInputText isInputMono" name="I-<?php echo $key; ?>" value="" />
                <?php else: ?>
                <input class="isInputText isInputMono" name="I-<?php echo $key; ?>" value="<?php echo htmlspecialchars(stripslashes(ia3_helpers::get_option($key, '<a href="#">' . __('Page Name') . '</a>'))); ?>" />
                <?php endif; ?>
            </div>
            <?php
		    return;
		}
    }
    
    /**
    *
    *   Prevent Wordpress loading it's own version of jQuery, (use Google's instead)...
    *   - http://www.mogmachine.com/stop-wordpress-loading-jquery-in-wp_head/
    *
    **/
    
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', ('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js'), false, '1.4.2');
        wp_enqueue_script('jquery');
    }
    
    /**
    *
    *   Setup any other functionality that occurs outside of the class structure.
    *
    **/

    if (function_exists('register_sidebar')) {
        register_sidebar(array('before_widget' => '', 'after_widget' => '', 'before_title' => '<h1>', 'after_title' => '</h1>'));
    }
    
    if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
    }
    
    
    header('Server: Muffins', true);
    header('X-Consulting: Semantics are everything. me@kennethreitz.com for more info.');
    header('X-Powered-By: The Interwebz');

    $time = microtime(); 
    $time = explode(" ", $time); 
    $time = $time[1] + $time[0]; 
    $finish = $time; 
    $totaltime = ($finish - $start); 
    header("X-runtime:".$totaltime);
    
    add_filter('body_class','browser_body_class');
    function browser_body_class($classes) {
    	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

    	if($is_lynx) $classes[] = 'lynx';
    	elseif($is_gecko) $classes[] = 'gecko';
    	elseif($is_opera) $classes[] = 'opera';
    	elseif($is_NS4) $classes[] = 'ns4';
    	elseif($is_safari) $classes[] = 'safari';
    	elseif($is_chrome) $classes[] = 'chrome';
    	elseif($is_IE) $classes[] = 'ie';
    	else $classes[] = 'unknown';

    	if($is_iphone) $classes[] = 'iphone';
    	return $classes;
    }
    
    add_filter( 'the_generator', create_function('$a', "return null;") );

    function showBrief($str, $length) {
      $str = strip_tags($str);
      $str = explode(" ", $str);
      return implode(" " , array_slice($str, 0, $length));
    }
    
?>