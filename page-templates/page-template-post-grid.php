<?php
/*
Template Name: Post Grid
*/
?>

<?php get_header(); ?>
         
    <h1 class="wpbs-very-muted"><i class="fa fa-table"></i> <?php wp_title(" "); ?> </h1><br/><br/>
    
    <?php 

    // Next, get the current page
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

 
    $args=array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'paged'       =>  $paged,
    'posts_per_page' => 6
    );

    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
    echo '';
    $count = 0; ?>
         
    <div class="row">
   
    <?php while ($my_query->have_posts()) : $my_query->the_post();  ?>
    
                      
            <div class="col-md-4">
            <p class="wpbs-very-muted" id="category"><i class="fa fa-bookmark"></i> <?php the_category(', ') ?></p>
            <div class="panel panel-default">
                <div class="panel-thumbnail"> <?php wpbs_grid_post_thumbnail(); ?> </div>
                <div class="panel-body">
                <h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                <p class="wpbs-very-muted"><i class="fa fa-clock-o"></i> <?php echo get_the_date(); ?></p>
                </div>
            </div>
            </div>
        
                
    <?php 
    $count++; 
    if ($count==3 ||$my_query->found_posts==0) :  echo '</div><div class="row">';  
    $count=0; 
    endif; ?>
   
    <?php endwhile; ?>
        
    </div>
       
            <?php wpbs_grid_pagination($my_query); ?>
               
       
  <?php  }  ?>
        
      
<?php wp_reset_query(); ?> 

<?php get_footer(); ?>