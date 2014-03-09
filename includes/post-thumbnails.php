<?php
/*
 * Display Image from the_post_thumbnail or the first image of a post else display a default Image
 * Chose the size from "thumbnail", "medium", "large", "full" or your own defined size using filters.
 * USAGE: <?php echo my_image_display(); ?>
 */
 
function wpbs_list_post_thumbnail() {
	if ( has_post_thumbnail() ) {
	    echo '<a href=" '. get_permalink( $post_id ) .'" class="img-thumbnail" title="' . esc_attr( get_the_title( $post_id ) ) . '" >';
        the_post_thumbnail('full', array('class' => 'img-responsive')); 
        echo '</a>';
    }
    else {
	   echo '<a href=" '. get_permalink( $post_id ) .'" title="' . esc_attr( get_the_title( $post_id ) ) . '"> <img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/images/default-post-image.gif" class="img-thumbnail img-responsive" /> </a>';
    }
}


function wpbs_grid_post_thumbnail() {
	if ( has_post_thumbnail() ) {
	   echo '<a href=" '. get_permalink( $post_id ) .'" class=" " title="' . esc_attr( get_the_title( $post_id ) ) . '" >';
    the_post_thumbnail('full', array('class' => 'img-responsive')); 
        echo '</a>';
    }
    else {
	   echo '<a href=" '. get_permalink( $post_id ) .'" title="' . esc_attr( get_the_title( $post_id ) ) . '"> <img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/images/default-post-image.gif" class="img-responsive" /> </a>';
    }
}


function wpbs_single_post_thumbnail() {
	if ( has_post_thumbnail() ) {
	   the_post_thumbnail('full', array('class' => 'img-responsive img-thumbnail')); 
    }
    else {
	   echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/assets/images/default-post-image.gif" class="img-thumbnail img-responsive" />';
    }
}