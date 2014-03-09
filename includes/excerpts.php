<?php

/* Post/Page Content Excerpts  */

function custom_excerpt_length( $length ) {
	return 50;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more($more) {
       global $post;
	return '...<br /><br /><p class="wpbs-very-muted pull-left"><i class="fa fa-clock-o"></i> '.get_the_date('', $post->ID).'</p><a href="'. get_permalink($post->ID) . '" class="pull-right"><button type="button" class="btn btn-default">Continue reading</button></a><br/><hr>';
}
add_filter('excerpt_more', 'new_excerpt_more');


add_filter('get_avatar','change_avatar_css');

function change_avatar_css($class) {
$class = str_replace("class='avatar", "class='media-object img-circle ", $class) ;
return $class;
}


/* Highlighted Excerpts for Search Results */

function search_excerpt_highlight() {
    $excerpt = wp_trim_words( get_the_excerpt(), 35, '...' );
    $keys = implode('|', explode(' ', get_search_query()));
    $excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $excerpt);

    echo '<p>' . $excerpt . '</p>';
}

function search_title_highlight() {
    $title = get_the_title();
    $keys = implode('|', explode(' ', get_search_query()));
    $title = preg_replace('/(' . $keys .')/iu', '<strong class="search-highlight">\0</strong>', $title);

    echo $title;
}


// Custom Excerpt to customize exact number of returned words. Usage:  echo excerpt(25); 
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }    
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }    
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

