<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>


<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>

	<h3 class="comments-title">
		<?php
			printf( _n( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'twentyfourteen' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h3>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	 <ul class="pager">
    <li class="previous wpbs-muted"><?php previous_comments_link( __( '<i class="fa fa-chevron-left fa-fw"></i> Older Comments', 'twentyfourteen' ) ); ?></li>
    <li class="next wpbs-muted"><?php next_comments_link( __( 'Newer Comments <i class="fa fa-chevron-right fa-fw"></i>', 'twentyfourteen' ) ); ?></li>
    </ul> <!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>

	<ul class="tz-comment-list">
		<?php
			wp_list_comments( array( 'callback' => 'wpbs_comments', 'style' => 'ul', 'avatar_size' => 60 ) );
		?>
	</ul><!-- .comment-list -->

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	  <ul class="pager">
		<li class="previous wpbs-muted"><?php previous_comments_link( __( '<i class="fa fa-chevron-left fa-fw"></i> Older Comments', 'twentyfourteen' ) ); ?></li>
		<li class="next wpbs-muted"><?php next_comments_link( __( 'Newer Comments <i class="fa fa-chevron-right fa-fw"></i>', 'twentyfourteen' ) ); ?></li>
	  </ul> <!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
	<p class="no-comments"><?php _e( 'Comments are closed.', 'twentyfourteen' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>
    
    <?php   $comments_args = array(
            
  'id_form'           => 'commentform',
  'id_submit'         => 'submit',
  'title_reply'       => __( 'Leave a comment' ),
  'title_reply_to'    => __( 'Reply to %s' ),
  'cancel_reply_link' => __( 'Cancel Reply' ),
  'label_submit'      => __( 'Submit Comment' ),

  

  'must_log_in' => '<p class="must-log-in">' .
    sprintf(
      __( 'You must be <a href="%s">logged in</a> to submit a comment.' ),
      wp_login_url( apply_filters( 'the_permalink', get_permalink() ) )
    ) . '</p>',

  'logged_in_as' => '<p class="logged-in-as">' .
    sprintf(
    __( '<a href="%1$s"><button type="button" class="btn btn-success"><i class="fa fa-user fa-fw"></i>%2$s</button></a>. <a href="%3$s" title="Log out of this account"><button type="button" class="btn btn-default"><i class="fa fa-sign-out fa-fw"></i>Logout</button></a>' ),
      admin_url( 'profile.php' ),
      $user_identity,
      wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
    ) . '</p>',

  'comment_notes_before' => '<p class="comment-notes">' .
    __( '<p class="text-muted">Your email address will not be published</p>' ) . ( $req ? $required_text : '' ) .
    '</p>',

  'comment_notes_after' => '</div><p class="text-muted">' .
    sprintf(
      __( 'We are glad you have chosen to leave a comment. Please keep in mind that comments are moderated according to our <a href="http://google.com/">Comments Policy</a>' ), ' '  
    ) . '</p>',
            
    'comment_field' =>  
    '<br/><div class="row"><div class="col-md-12">' .
    '<div class="wpbs-textarea"><textarea class="form-control" id="comment" name="comment" rows="8" aria-required="true" placeholder="Start commenting..."></textarea></div>' .
    '</div><br/>' ,  
    

  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<div class="row"><div class="col-md-6">' .
      '<div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>'.
      '<input class="form-control" placeholder="Your name" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"' . $aria_req . ' /></div>' .
      '</div>',

    'email' =>
      '<div class="col-md-6">' .
      '<div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i> </span>'.
      '<input class="form-control" placeholder="Your email" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"' . $aria_req . ' /></div>'.
      '</div></div>',

    'url' => ''
    )
  ),          
);   ?>
    
    
    
    

	<?php comment_form($comments_args); ?>

</div><!-- #comments -->