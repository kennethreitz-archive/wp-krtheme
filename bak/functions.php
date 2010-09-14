<?php

header('Server: Muffins', true);
header('X-Consulting: Semantics are everything. me@kennethreitz.com for more info.');
header('X-Powered-By: The Interwebz');

$time = microtime(); 
$time = explode(" ", $time); 
$time = $time[1] + $time[0]; 
$finish = $time; 
$totaltime = ($finish - $start); 
header("X-runtime:".$totaltime); 


wp_deregister_script('prototype');
// wp_deregister_script('jquery');

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


$ia3_options = array(
	array(
		"name" 	=> __('Link &amp; Highlight Color'),
		"desc" 	=> __(''),
		"id" 	=> "ia3_highlight_color",
		"std" 	=> "#CC0000",
		"type" 	=> "text"
	),
	array(
		"name" 	=> __('Visited Link Color'),
		"desc" 	=> __(''),
		"id" 	=> "ia3_lowlight_color",
		"std" 	=> "#666666",
		"type" 	=> "text"
	),
);

$ia3_cache_categories = get_categories();
$ia3_cache_pages = get_pages();

/**
*	@param	integer
*	@return string
*	@author Ben Sekulowicz-Barclay
*
**/

function ia3_get_layout_text($column, $html = FALSE, $default = ' ') {
	$option = get_option($column);

	if ($html != TRUE) {
		$a = htmlspecialchars(strip_tags($option));
		$b = htmlspecialchars(strip_tags($default));

	} else {
		$a = stripslashes($option);
		$b = stripslashes($default);
	}

	return ($a !== '')? $a: $b;
}

/**
*	@param	integer
*	@param	integer
*	@return string
*	@author Ben Sekulowicz-Barclay
*
**/

function ia3_get_layout_select($column) {
	$option = get_option($column);
	$select = 0;

	if (preg_match("/^c\-(.*)/", $option, $select)) {
		$item = ia3_get_category($select[1]);

		$item_i = isset($item->cat_ID)? $item->cat_ID: 0;
		$item_n = isset($item->name)? $item->name: 'Unknown';

		return '<a href="' . get_category_link($item_i) . '">' . $item_n . '</a>';

	} else if (preg_match("/^p\-(.*)/", $option, $select)) {
		$item = ia3_get_page($select[1]);

		$item_i = isset($item->ID)? $item->ID: 0;
		$item_n = isset($item->post_title)? $item->post_title: 'Unknown';

		return '<a href="' . get_page_link($item_i) . '">' . $item_n . '</a>';
	}

	return ' ';
}

/**
*	@param	string
*	@return string
*	@author Ben Sekulowicz-Barclay
*
*	Returns the category based on the ID, (key) passed to it. Uses the cached array to improve performance.
*
**/

function ia3_get_category($key = '') {
	global $ia3_cache_categories;
	
	foreach($ia3_cache_categories as $c) {
		if ($c->cat_ID == $key) return $c;
	}
	
	return $ia3_cache_categories[0];
}

/**
*	@param	string
*	@return string
*	@author Ben Sekulowicz-Barclay
*
*	Returns the key's value form the above options array, if defined. Messy, due to the structure of the Wordpress options array.
*
**/

function ia3_get_option($key = '') {
	global $ia3_options;
	$default;

	foreach($ia3_options as $option) {
		if ($option['id'] == $key) {
			$default = $option['std'];
			continue;
		}
	}

	$option = get_option($key);

	return ($option !== FALSE)? $option: $default;
}

/**
*	@param	string
*	@return string
*	@author Ben Sekulowicz-Barclay
*
*	Returns the page based on the ID, (key) passed to it. Uses the cached array to improve performance.
*
**/

function ia3_get_page($key = '') {
	global $ia3_cache_pages;
	
	foreach($ia3_cache_pages as $p) {
		if ($p->ID == $key) return $p;
	}
	
	return $ia3_cache_pages[0];
}

function ia3_prevnext() {
	if(get_previous_post()):
		previous_post_link('%link', '&laquo; <span class="label">Previous</span>');
	else:
		?><span class="disabled">&laquo; Previous</span><?php
	endif;
	?>
	<span class="delimiter"> | </span>
	<?php if(get_next_post()):
		next_post_link('%link', '<span class="label">Next</span> &raquo;');
	else:
		?><span class="disabled">Next &raquo;</span><?php
	endif;
}

function ia3_big_prevnext() {
	?>
	<nav class="bigBlogSerial">
		<div class="lf w4c">
			<div class="lu w2c prev">
				<?php if(get_previous_post()):
					$prevpost = get_previous_post();
					previous_post_link('%link', '<div class="linkLabel">&laquo; <span class="label">Previous Post</span></div><div class="postTitle">'.$prevpost->post_title.'</div><div class="excerpt">'.$prevpost->post_excerpt.'</div>');
				endif;
				?>
				&nbsp;
			<!--/.lu .w2c--></div>
			<div class="lu w2c next">
			<?php if(get_next_post()):
				$nextpost = get_next_post();
				next_post_link('%link', '<div class="linkLabel"><span class="label">Next Post</span> &raquo;</div><div class="postTitle">'.$nextpost->post_title.'</div><div class="excerpt">'.$nextpost->post_excerpt.'</div>');
			endif;
			?>
			<!--/.lu .w2c--></div>
		<!--/.lf .w4c--></div>
	</nav>
	<?php
}

function ia3_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar($comment, $size='32', $default = '<path_to_url>'); ?>
				<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
			<em><?php _e('Your comment is awaiting moderation.') ?></em>
			<br />
			<?php endif; ?>
			<div class="comment-meta commentmetadata">
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID) ) ?>">
					<?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
				</a>
				<?php edit_comment_link(__('(Edit)'),'  ','') ?>
			</div>
			<?php comment_text() ?>
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
		</div>
	<?php
}

function ia3_add_admin() {

	global $ia3_options;

	$alt_options = array_merge($ia3_options, array(
		array('id' => 'ia3_header_t1'),
		array('id' => 'ia3_header_t2'),
		array('id' => 'ia3_header_t3'),
		array('id' => 'ia3_header_t4'),
		array('id' => 'ia3_header_11'),
		array('id' => 'ia3_header_12'),
		array('id' => 'ia3_header_13'),
		array('id' => 'ia3_header_21'),
		array('id' => 'ia3_header_22'),
		array('id' => 'ia3_header_23'),
		array('id' => 'ia3_header_31'),
		array('id' => 'ia3_header_32'),
		array('id' => 'ia3_header_33'),
		array('id' => 'ia3_header_41'),
		array('id' => 'ia3_header_42'),
		array('id' => 'ia3_header_43'),
		array('id' => 'ia3_contact_t1'),
		array('id' => 'ia3_contact_t2'),
		array('id' => 'ia3_contact_t3'),
		array('id' => 'ia3_contact_t4'),
		array('id' => 'ia3_contact_11'),
		array('id' => 'ia3_contact_12'),
		array('id' => 'ia3_contact_13'),
		array('id' => 'ia3_contact_21'),
		array('id' => 'ia3_contact_22'),
		array('id' => 'ia3_contact_23'),
		array('id' => 'ia3_contact_31'),
		array('id' => 'ia3_contact_32'),
		array('id' => 'ia3_contact_33'),
		array('id' => 'ia3_contact_41'),
		array('id' => 'ia3_contact_42'),
		array('id' => 'ia3_contact_43'),
		array('id' => 'ia3_footer_1'),
		array('id' => 'ia3_footer_2'),
		array('id' => 'ia3_footer_3'),
		array('id' => 'ia3_footer_4'),
	));

	if ($_GET['page'] == basename(__FILE__)) {

		if ('save' == $_REQUEST['action']) {
			foreach ($alt_options as $value) {
				update_option($value['id'], $_REQUEST[ $value['id'] ] );
			}

			foreach ($alt_options as $value) {
				if (isset($_REQUEST[ $value['id']])) {
					update_option($value['id'], $_REQUEST[ $value['id']]);
				} else {
					delete_option($value['id']);
				}
			}

			header("Location: themes.php?page=functions.php&saved=true");
			die;

		} elseif ('reset' == $_REQUEST['action']) {
			foreach ($alt_options as $value) {
				delete_option($value['id']);
			}

			header("Location: themes.php?page=functions.php&reset=true");
			die;

		} elseif ('reset_widgets' == $_REQUEST['action']) {
			$null = null;
			update_option('sidebars_widgets',$null);
			header("Location: themes.php?page=functions.php&reset=true");
			die;
		}
	}

	add_theme_page("iA3 Options", "iA3 Options", 'edit_themes', basename(__FILE__), 'ia3_admin');
}

function ia3_admin() {

	global $ia3_options, $ia3_cache_categories, $ia3_cache_pages;

	if ($_REQUEST['saved']) echo '<div id="message" class="updated fade"><p><strong>iA3 ' . __('settings saved.', 'thematic') . '</strong></p></div>';
	if ($_REQUEST['reset']) echo '<div id="message" class="updated fade"><p><strong>iA3 ' . __('settings reset.', 'thematic') . '</strong></p></div>';
	if ($_REQUEST['reset_widgets']) echo '<div id="message" class="updated fade"><p><strong>iA3 ' . __('widgets reset.', 'thematic') . '</strong></p></div>';

	$header_options = array('cs' => array(), 'ps' => array());

	foreach($ia3_cache_categories as $c) $header_options['cs'][$c->cat_ID] = $c->cat_name;
	foreach($ia3_cache_pages as $p) $header_options['ps'][$p->ID] = $p->post_title;
	?>

	<style type="text/css">
		table.ia3-options-general
		{
			border-collapse:collapse;
			margin:20px 0 40px;
			width:100%;
		}

		table.ia3-options-general td,
		table.ia3-options-general th
		{
			padding-right:20px;
			width:25%;
		}

		table.ia3-options-general th
		{
			text-align:left;
		}

			table.ia3-options-general th input,
			table.ia3-options-general td input,
			table.ia3-options-general td select
			{
				width:100% !important;
			}

			table.ia3-options-general th input
			{
				font-weight:600;
			}

		table.ia3-options-general td.ia3-options-desc
		{
			color:#999;
			width:50%;
		}

		table.ia3-options-header td,
		table.ia3-options-header th
		{
			padding-bottom:5px;
		}
	</style>
	<div class="wrap">
		<?php if ( function_exists('screen_icon') ) screen_icon(); ?>
		<h2>iA 3 &ndash; Options</h2>
		<form method="post" action="">
			<h3>Header</h3>
			<p><strong>Warning</strong> &ndash; To take full advantage of the iA3 page templates, please ensure you have <a href="http://codex.wordpress.org/Pages#Page_Templates">them set up correctly</a>.

			<table class="ia3-options-general ia3-options-header">
				<thead>
					<tr>
						<th><input name="ia3_header_t1" id="ia3_header_t1" placeholder="HEADING 1" type="text" value="<?php if (get_option("ia3_header_t1") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_header_t1"))); } else { echo ""; } ?>" /></th>
						<th><input name="ia3_header_t2" id="ia3_header_t2" placeholder="HEADING 2" type="text" value="<?php if (get_option("ia3_header_t2") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_header_t2"))); } else { echo ""; } ?>" /></th>
						<th><input name="ia3_header_t3" id="ia3_header_t3" placeholder="HEADING 3" type="text" value="<?php if (get_option("ia3_header_t3") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_header_t3"))); } else { echo ""; } ?>" /></th>
						<th><input name="ia3_header_t4" id="ia3_header_t4" placeholder="Other sites" type="text" value="<?php if (get_option("ia3_header_t4") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_header_t4"))); } else { echo ""; } ?>" /></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
							<select name="ia3_header_11" id="ia3_header_11">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_header_11") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_header_11") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<select name="ia3_header_21" id="ia3_header_21">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_header_21") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_header_21") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<select name="ia3_header_31" id="ia3_header_31">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_header_31") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_header_31") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<input name="ia3_header_41" id="ia3_header_41" placeholder="&lt;a href=&quot;&quot;&gt;Link&lt;/a&gt;" type="text" value="<?php if (get_option("ia3_header_41") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_header_41"))); } else { echo ""; } ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<select name="ia3_header_12" id="ia3_header_12">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_header_12") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_header_12") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<select name="ia3_header_22" id="ia3_header_22">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_header_22") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_header_22") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<select name="ia3_header_32" id="ia3_header_32">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_header_32") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_header_32") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<input name="ia3_header_42" id="ia3_header_42" placeholder="&lt;a href=&quot;&quot;&gt;Link&lt;/a&gt;" type="text" value="<?php if (get_option("ia3_header_42") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_header_42"))); } else { echo ""; } ?>" />
						</td>
					</tr>
					<tr>
						<td>
							<select name="ia3_header_13" id="ia3_header_13">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_header_13") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_header_13") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<select name="ia3_header_23" id="ia3_header_23">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_header_23") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_header_23") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<select name="ia3_header_33" id="ia3_header_33">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_header_33") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_header_33") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<input name="ia3_header_43" id="ia3_header_43" placeholder="&lt;a href=&quot;&quot;&gt;Link&lt;/a&gt;" type="text" value="<?php if (get_option("ia3_header_43") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_header_43"))); } else { echo ""; } ?>" />
						</td>
					</tr>
				</tbody>
			</table>

			<h3>Contact</h3>
			<table class="ia3-options-general ia3-options-header">
				<thead>
					<tr>
						<th><input name="ia3_contact_t1" id="ia3_contact_t1" placeholder="CONTACT" type="text" value="<?php if (get_option("ia3_contact_t1") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_t1"))); } else { echo ""; } ?>" /></th>
						<th><input name="ia3_contact_t2" id="ia3_contact_t2" placeholder="CONTACT" type="text" value="<?php if (get_option("ia3_contact_t2") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_t2"))); } else { echo ""; } ?>" /></th>
						<th><input name="ia3_contact_t3" id="ia3_contact_t3" placeholder="CONTACT" type="text" value="<?php if (get_option("ia3_contact_t3") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_t3"))); } else { echo ""; } ?>" /></th>
						<th><input name="ia3_contact_t4" id="ia3_contact_t4" placeholder="CONTACT" type="text" value="<?php if (get_option("ia3_contact_t4") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_t4"))); } else { echo ""; } ?>" /></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><input name="ia3_contact_11" id="ia3_contact_11" placeholder="XXXXXX" type="text" value="<?php if (get_option("ia3_contact_11") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_11"))); } else { echo ""; } ?>" /></td>
                        <td><input name="ia3_contact_21" id="ia3_contact_21" placeholder="XXXXXX" type="text" value="<?php if (get_option("ia3_contact_21") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_21"))); } else { echo ""; } ?>" /></td>
                        <td><input name="ia3_contact_31" id="ia3_contact_31" placeholder="XXXXXX" type="text" value="<?php if (get_option("ia3_contact_31") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_31"))); } else { echo ""; } ?>" /></td>
                        <td><input name="ia3_contact_41" id="ia3_contact_41" placeholder="XXXXXX" type="text" value="<?php if (get_option("ia3_contact_41") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_41"))); } else { echo ""; } ?>" /></td>
					</tr>
					<tr>
						<td><input name="ia3_contact_12" id="ia3_contact_12" placeholder="+00-0-0000-0000" type="text" value="<?php if (get_option("ia3_contact_12") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_12"))); } else { echo ""; } ?>" /></td>
						<td><input name="ia3_contact_22" id="ia3_contact_22" placeholder="+00-0-0000-0000" type="text" value="<?php if (get_option("ia3_contact_22") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_22"))); } else { echo ""; } ?>" /></td>
						<td><input name="ia3_contact_32" id="ia3_contact_32" placeholder="+00-0-0000-0000" type="text" value="<?php if (get_option("ia3_contact_32") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_32"))); } else { echo ""; } ?>" /></td>
						<td><input name="ia3_contact_42" id="ia3_contact_42" placeholder="+00-0-0000-0000" type="text" value="<?php if (get_option("ia3_contact_42") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_42"))); } else { echo ""; } ?>" /></td>
					</tr>
					<tr>
						<td><input name="ia3_contact_13" id="ia3_contact_13" placeholder="&lt;a class=&quot;url&quot; href=&quot;&quot;&gt;Link&lt;/a&gt;" type="text" value="<?php if (get_option("ia3_contact_13") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_13"))); } else { echo ""; } ?>" /></td>
						<td><input name="ia3_contact_23" id="ia3_contact_23" placeholder="&lt;a class=&quot;url&quot; href=&quot;&quot;&gt;Link&lt;/a&gt;" type="text" value="<?php if (get_option("ia3_contact_23") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_23"))); } else { echo ""; } ?>" /></td>
						<td><input name="ia3_contact_33" id="ia3_contact_33" placeholder="&lt;a class=&quot;url&quot; href=&quot;&quot;&gt;Link&lt;/a&gt;" type="text" value="<?php if (get_option("ia3_contact_33") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_33"))); } else { echo ""; } ?>" /></td>
						<td><input name="ia3_contact_43" id="ia3_contact_43" placeholder="&lt;a class=&quot;url&quot; href=&quot;&quot;&gt;Link&lt;/a&gt;" type="text" value="<?php if (get_option("ia3_contact_43") != "") { echo stripslashes(htmlspecialchars(get_option("ia3_contact_43"))); } else { echo ""; } ?>" /></td>
					</tr>
				</tbody>
			</table>

			<h3>Footer</h3>
			<table class="ia3-options-general ia3-options-header">
				<tbody>
					<tr>
						<td>
							<select name="ia3_footer_1" id="ia3_footer_1">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_footer_1") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_footer_1") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<select name="ia3_footer_2" id="ia3_footer_2">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_footer_2") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_footer_2") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<select name="ia3_footer_3" id="ia3_footer_3">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_footer_3") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_footer_3") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
						<td>
							<select name="ia3_footer_4" id="ia3_footer_4">
								<option value=""> ... </option>
								<optgroup label="Categories">
									<?php foreach($header_options['cs'] as $id => $name): ?>
									<?php if (get_option("ia3_footer_4") == "c-" . $id): ?>
									<option value="c-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="c-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
								<optgroup label="Pages">
									<?php foreach($header_options['ps'] as $id => $name): ?>
									<?php if (get_option("ia3_footer_4") == "p-" . $id): ?>
									<option value="p-<?php echo $id; ?>" selected="selected"><?php echo $name?></option>
									<?php else: ?>
									<option value="p-<?php echo $id; ?>"><?php echo $name?></option>
									<?php endif; ?>
									<?php endforeach; ?>
								</optgroup>
							</select>
						</td>
					</tr>
				</tbody>
			</table>

			<h3>Other Options</h3>
			<table class="ia3-options-general">
				<?php foreach ($ia3_options as $value) {
					switch ($value['type']) {
						case 'text':
						?>
						<tr valign="top">
							<th>
								<label for="<?php echo $value['id']; ?>"><?php echo __($value['name'], 'thematic'); ?></label>
							</th>
							<td class="ia3-options-form">
								<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if (get_option( $value['id']) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
							</td>
							<td class="ia3-options-desc">
								<?php echo __($value['desc'], 'thematic'); ?>
							</td>
						</tr>
						<?php
						break;

						case 'select':
						?>
						<label for="<?php echo $value['id']; ?>"><?php echo __($value['name'], 'thematic'); ?></label>
						<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
							<?php foreach ($value['options'] as $option) { ?>
							<option<?php if (get_option( $value['id']) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
							<?php } ?>
						</select>
						<?php
						break;

						case 'textarea':
						$ta_options = $value['options'];
						?>
						<label for="<?php echo $value['id']; ?>"><?php echo __($value['name'], 'thematic'); ?></label>
						<textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" cols="<?php echo $ta_options['cols']; ?>" rows="<?php echo $ta_options['rows']; ?>">
							<?php
							if (get_option($value['id']) != "") {
								echo __(stripslashes(get_option($value['id'])), 'thematic');
							} else {
								echo __($value['std'], 'thematic');
							}
							?>
						</textarea>
						<?php echo __($value['desc'], 'thematic'); ?>
						<?php
						break;

						case 'radio':
						?>
						<?php echo __($value['name'], 'thematic'); ?>
						<?php foreach ($value['options'] as $key=>$option) {
							$radio_setting = get_option($value['id']);
							if ($radio_setting != '') {
								if ($key == get_option($value['id'])) {
									$checked = "checked=\"checked\"";
								} else {
									$checked = "";
								}
							} else {
								if ($key == $value['std']) {
									$checked = "checked=\"checked\"";
								} else {
									$checked = "";
								}
							}
							?>
							<input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] . $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> />
							<label for="<?php echo $value['id'] . $key; ?>"><?php echo $option; ?></label>
							<?php
						}
						break;

						case 'checkbox':
						?>
						<?php echo __($value['name'], 'thematic'); ?>
						<?php
							if (get_option($value['id'])){
								$checked = "checked=\"checked\"";
							} else {
								$checked = "";
							}
						?>
						<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
						<label for="<?php echo $value['id']; ?>"><?php echo __($value['desc'], 'thematic'); ?></label>
						<?php
						break;
					}
				}
				?>
			</table>

			<table class="ia3-options-general">
				<tr valign="top">
					<td>
						<button name="action" type="submit" value="save">
							Save Changes
						</button>
						<button name="action" type="submit" value="reset">
							Reset Options
						</button>
					</td>
				</tr>
			</table>
		</form>
	</div>
	<?php
}

add_action('admin_menu', 'ia3_add_admin');
?>