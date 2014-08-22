<?php
// Display navigation to next/previous post when applicable (single.php).
function wpbs_post_nav() {
        // Don't print empty markup if there's nowhere to navigate.
        $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
        $next     = get_adjacent_post( false, '', false );

        if ( ! $next && ! $previous ) {
            return;
        }
                if ( is_attachment() ) :
                    previous_post_link( '<strong>%link</strong>', __( '<div class="well well-sm"><p class="wpbs-muted">Publised in</p>%title</div>', 'twentyfourteen' ) );
                else :
                    previous_post_link( '<strong>%link</strong>', __( '<div class="well well-sm"><p class="wpbs-muted">Previous Post</p>%title</div>', 'twentyfourteen' ) );
                    next_post_link( '<strong>%link</strong>', __( '<div class="well well-sm"><p class="wpbs-muted">Next Post</p>%title</div>', 'twentyfourteen' ) );
                endif;	
}



// Display multi-page pagination (home.php, archive.php, category.php, author.php, search.php, tag.php)
function wpbs_pagination($pages = '', $range = 2) {
    
    $showitems = ($range * 2)+1;
    global $paged;
    if(empty($paged)) $paged = 1;
        if($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if(!$pages) {
            $pages = 1;
            }
        }

    if(1 != $pages) {
        echo "<div class='pagination pagination-centered'><ul class='pagination'>";
        
        if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
            echo "<li><a href='".get_pagenum_link(1)."'>&laquo;</a></li>";
        if($paged > 1 && $showitems < $pages) 
            echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a></li>";

        for ($i=1; $i <= $pages; $i++)  {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
                echo ($paged == $i)? "<li class='active'><span class='current'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
                }
        }

        if ($paged < $pages && $showitems < $pages) 
            echo "<li><a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a></li>";
        if ($paged < $pages-1 && $paged+$range-1 < $pages && $showitems < $pages) 
            echo "<li><a href='".get_pagenum_link($pages)."'>&raquo;</a></li>";
            echo "</ul></div>\n";
    }
}



// Display multi-page pagination on Post Grids (page-template-post-grid.php)
function wpbs_grid_pagination( $query=null ) {
 
  global $wp_query;
  $query = $query ? $query : $wp_query;
  $big = 999999999;
  $paginate = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'type' => 'array',
    'total' => $query->max_num_pages,
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'prev_next' => false,
  ));
 
  if ($query->max_num_pages > 1) :
        echo '<ul class="pagination">';
        foreach ( $paginate as $page ) {
            echo "<li>" . $page . "</li>";
            }
        echo "</ul>";
        endif;
}