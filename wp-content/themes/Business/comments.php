<?php
/**
 * @package WordPress
 * @subpackage Business Meeting
 * @since Business Meeting 1.0
 */
?>
<?php if (function_exists('wp_list_comments')) : ?>
<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>
<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
	<h2>Comments <span>(<?php comments_number('0', '1', '%');?>)</span>:</h2>	
	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
	<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->
	<?php endif; ?>
	<?php endif; ?>
<?php if ('open' == $post->comment_status) : ?>

<div class="respond"><a name="respond"></a>	<div class="cancel-comment-reply">		<?php cancel_comment_reply_link(); ?>		<div class="clr"></div>
	</div>	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( $user_ID ) : ?>				<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
		<?php else : ?>
		<p><label for="author">Name <span><?php if ($req) echo "*"; ?></span></label></p>		<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />

		<p><label for="email">E-mail <span><?php if ($req) echo "*"; ?></span></label></p>		<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
		<p><label for="url">Web Site</label></p>		<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />		<?php endif; ?>
		<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->				<p><textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea></p>
		<p class="m0"><button name="submit" type="submit" id="submit">Submit Comment!</button>
		<?php comment_id_fields(); ?>
		</p>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
<?php endif; // If registration required and not logged in ?>
</div>
<?php endif; // if you delete this the sky will fall on your head ?><?php else: ?><?php // Do not delete these lines
if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
	die ('Please do not load this page directly. Thanks!');
	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>
			<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
			<?php
			return;
		}
	}
/* This variable is for alternating comment background */
$oddcomment = 'comment1';
?>
<h2>Comments<?php comments_number('', ' (1)', ' (%)' );?></h2> 
<?php comments_number('<p>No Comments</p>', '', '' );?>
<?php if ($comments) : $first = true; ?>
<?php foreach ($comments as $comment) : ?>
<div class="<?php echo $oddcomment; ?><?php if ($first) { echo ' first'; $first = false; } ?>" id="comment-<?php comment_ID() ?>">
	<div class="commentdetails">
		<p class="commentauthor"><?php comment_author_link() ?></p>
		<?php if ($comment->comment_approved == '0') : ?>
			<em>Your comment is awaiting moderation.</em>
		<?php endif; ?>
			<p class="commentdate"><?php comment_date('F jS, Y') ?> at <?php comment_time() ?> <?php edit_comment_link('Edit Comment','',''); ?>
		</p>
	</div>
	<?php dp_gravatar(); ?>
	<br class="break" />
	<?php comment_text() ?>
</div>
<?php endforeach; /* end for each comment */ ?>
<?php endif; ?>
<h2 id="respond">d</h2>
<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<?php if ( $user_ID ) : ?>
	<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
	<?php else : ?>
		<p><input size="36" type="text" name="author" /> Name <span class="required">*</span></p>
		<p><input size="36" type="text" name="email" /> Mail <span class="required">*</span></p>
		<p><input size="36" type="text" name="url" /> Website</p>
	<?php endif; ?>
		<p><textarea rows="12" cols="42" name="comment"></textarea></p>
		<p><button name="submit" type="submit" id="submit" tabindex="5">Submit Comment</button>
		<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
		</p>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
	<?php endif; ?>
	<?php endif; ?>
	
<?php endif; ?>