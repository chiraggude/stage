<?php get_header(); ?>

<div class="row">
    <div class="col-md-8">

		<?php if ( have_posts() ) : ?>
        <br/>
        <?php get_search_form(); ?>
        <br/>
        <h4><?php /* Search Count */ $allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count; _e('<p class="wpbs-very-muted">');  echo $count . ' '; wp_reset_query(); ?><?php printf( __( ' Relevant Results found for</p> <span class="wpbs-muted"> %s</span>', 'twentyfourteen' ), get_search_query() ); ?></h4><br/>
                
    
               
			
            <?php while ( have_posts() ) : the_post();     ?>
						 
            <h4><a href="<?php the_permalink(); ?>"><?php search_title_highlight(); ?></a></h4>
            <?php search_excerpt_highlight(); ?>
            <p class="wpbs-very-muted pull-left"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></p>
    
            <?php if($post->post_type == 'post') :?>
                 <p class="wpbs-muted pull-right">Published under: <?php the_category(', ') ?></p>
                 <br/><hr>
            <?php else :  ?>
                 <p class="wpbs-muted pull-right"><?php echo get_post_type( get_the_ID() ); ?></p>
                 <br/><hr>
            <?php endif;?>
                
            <?php endwhile;
			wpbs_pagination();
			else :  ?>
    
                <h1 class="text-danger">No relevant results Found</h1>
                <p class="text-muted">It seems we can’t find what you’re looking for. Perhaps you should try again with a different search term.</p>
                <div class="well">
                <?php get_search_form(); ?>
                </div>

            <?php  endif; ?>

    </div>
    
    <div class="col-md-4">
	<?php get_sidebar(); ?>	
    </div>

</div>
<?php get_footer(); ?>
