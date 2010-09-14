<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');

if (post_password_required()) {
	?><p class="nocomments">This post is password protected. Enter the password to view comments.</p><?php
	return;
}
?>
<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
<h2 id="comments" class="superiorTitle"><?php comments_number('NO FEEDBACKS', 'ONE FEEDBACK', '% FEEDBACKS' );?></h2>
<div class="navigation">
	<div class="alignleft"><?php previous_comments_link() ?></div>
	<div class="alignright"><?php next_comments_link() ?></div>
</div>

<ol class="commentlist">
	<?php wp_list_comments(); ?>
</ol>

<div class="navigation">
	<div class="alignleft"><?php previous_comments_link() ?></div>
	<div class="alignright"><?php next_comments_link() ?></div>
</div>
<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
	<!-- If comments are open, but there are no comments. -->
	<p>Not commented yet.</p>

 	<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>

<?php if (comments_open()): ?>
<div id="respond">
	<h2 class="superiorTitle">LEAVE A COMMENT</h2>
	<div class="cancel-comment-reply">
		<small><?php cancel_comment_reply_link(); ?></small>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

	<?php if ( is_user_logged_in() ) : ?>
	<p class="loggedin">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
	<?php else : ?>

	<p>
		<label for="author" class="asideHeading">Name <?php if ($req) echo "(required)"; ?></label>
		<input type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
	</p>
	<p>
		<label for="email" class="asideHeading">Mail <?php if ($req) echo "(required)"; ?> <span class="note">will not be published</span></label>
		<input type="text" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
	</p>
	<p>
		<label for="url" class="asideHeading">Website</label>
		<input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
	</p>
	<?php endif; ?>

	<p>
		<label for="comment" class="asideHeading">Comment</label>
		<textarea name="comment" id="comment" cols="70" rows="10" tabindex="4"></textarea>
	</p>
	<p><input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" /></p>
	<?php comment_id_fields(); ?>
	<?php do_action('comment_form', $post->ID); ?>
	</form>
<?php endif; // If registration required and not logged in ?>
</div>

<?php endif; // if you delete this the sky will fall on your head ?>