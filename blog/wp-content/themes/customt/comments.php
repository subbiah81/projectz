<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0
 *
 * This file is here for Backwards compatibility with old themes and will be removed in a future version
 *
 */
_deprecated_file(
	/* translators: %s: template name */
	sprintf( __( 'Theme without %s' ), basename( __FILE__ ) ),
	'3.0',
	null,
	/* translators: %s: template name */
	sprintf( __( 'Please include a %s template in your theme.' ), basename( __FILE__ ) )
);

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>
	<h4 id="comments">
		<?php
			if ( 1 == get_comments_number() ) {
				/* translators: %s: post title */
				//printf( __( '1 response to %s' ),  '&#8220;' . get_the_title() . '&#8221;' );
				printf( __( 'Comments' ));
			} else {
				/* translators: 1: number of comments, 2: post title */
				/* printf( _n( '%1$s response to %2$s', '%1$s responses to %2$s', get_comments_number() ),
					number_format_i18n( get_comments_number() ),  '&#8220;' . get_the_title() . '&#8221;' ); */
				printf( __( 'Comments' ));
			}
		?>
	</h4>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
	<?php wp_list_comments();?>
	</ol>

	<div class="navigation">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.'); ?></p>

	<?php endif; ?>
<?php endif; 

$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$fields =  array(

  'author' =>
    '<p class="comment-form-author"><label for="author">' . __( 'Name', 'domainreference' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input type="text" class="form-control" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) .
    '" size="30"' . $aria_req . ' /></p>',

  'email' =>
    '<p class="comment-form-email"><label for="email">' . __( 'Email', 'domainreference' ) . '</label> ' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input type="text" class="form-control" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>',
	
	'url' =>
    '',	
	
);
?>
<?php $comments_args = array(
        // change the title of send button 
        'label_submit'=>'Submit',
		'class_submit'=>'btn btn-lg commentsubmit',
        // change the title of the reply section
        'title_reply'=>'Leave a Comment or Reply',
		'title_reply_before' => '<h4 id="reply-title" class="comment-reply-title">',
		'title_reply_after' => '</h4>',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea class="form-control" rows="5" id="comment" name="comment" aria-required="true"></textarea></p>',
		'fields' => apply_filters( 'comment_form_default_fields', $fields ),
); ?>

<br>
<?php comment_form($comments_args); ?>
