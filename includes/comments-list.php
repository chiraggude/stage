<?php
/**
 * Custom template tags for Comments   */


 if ( ! function_exists( 'wpbs_comments' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function wpbs_comments( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;

        if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

        <li class="media" id="comment-<?php comment_ID(); ?>" <?php comment_class( 'media' ); ?>>
                <div class="comment-body">
                        <?php _e( 'Pingback:', '_tk' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', '_tk' ), '<span class="edit-link">', '</span>' ); ?>
                </div>

        <?php else : ?>
        <ul class="media-list"> 
        <li class="media" id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
                <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media">
                        
                <div class="panel panel-default">
                <div class="panel-body">        
                
                
                <a class="pull-left" href="#">
                <?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?> 
                </a>    
                <div class="media-body tz-comment-meta">
                <h4 class="media-heading"><?php printf( __( '%s ', '_tk' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?></h4>
                <p class="text-muted"><?php printf( _x( '%1$s at %2$s', '1: date, 2: time', '_tk' ), get_comment_date(), get_comment_time() ); ?></p>
                </div>
                <?php if ( '0' == $comment->comment_approved ) : ?>
                <br/>
                <p class="text-danger"><?php _e( 'Your comment is awaiting moderation', '_tk' ); ?></p>
                <?php endif; ?>
                                        
                <br/>
                <?php comment_text(); ?>
                
                <?php edit_comment_link( __( '<span style="margin-left: 5px;" class="glyphicon glyphicon-edit"></span> Edit', '_tk' ), '<span class="edit-link">', '</span>' ); ?>
                                                                                
                                        <?php comment_reply_link(
                                                array_merge(
                                                        $args, array(
                                                                'add_below' => 'div-comment',
                                                                'reply_text' => '<i class="fa fa-reply"></i> Reply',
                                                                'depth'         => $depth,
                                                                'max_depth' => $args['max_depth'],
                                                                'before'         => '<span class="pull-right">',
                                                                'after'         => '</span> '
                                                        )
                                                )
                                        ); ?>

                                
                        
                </div>
                </div>
                </article><!-- .comment-body -->
        </li>
</ul>
        <?php
        endif;
}
endif; // ends check for wpbs_comments()

?>
           




            
<?php            
            add_action('comment_form', 'wpbs_comment_button' );
function wpbs_comment_button() {
    echo '<button class="btn btn-primary" type="submit"><i class="fa fa-check-circle"></i>' . __( ' Submit' ) . '</button>';
}
?>
            
            