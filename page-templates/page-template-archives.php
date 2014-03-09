<?php
/* 
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div class="row">
  <div class="col-md-8">

	<h1 class="wpbs-very-muted"><i class="fa fa-calendar"></i> <?php wp_title(" "); ?> </h1>
     
    <?php the_post(); the_content();  ?>
      
    <h2 class="wpbs-muted">10 Recent Posts</h2> 
    <ul class="list-group">
    <?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 10, 'before' => '<li class="list-group-item">', 'after' => '</li>', 'format' => 'custom' ) ); ?>
    </ul>
    
      
    <div class="row">
    <div class="col-md-4">
    <h2 class="wpbs-muted">Categories</h2> 
    <?php wp_list_categories(array('show_count' => true, 'style' => 'none')); ?>
    </div>
    <div class="col-md-4">
    <h2 class="wpbs-muted">Tag Cloud</h2>
    <?php wp_tag_cloud(); ?>
    </div>  
    </div>
      
    <br/>
      
    <div class="row">
    <div class="col-md-6">
    <h2 class="wpbs-muted">Week</h2>
    <?php wp_get_archives( array( 'type' => 'weekly', 'show_post_count' => true, 'before' => '<li class="list-group-item">', 'after' => '</li>', 'format' => 'custom' ) ); ?>    
    </div>
    <div class="col-md-4">
    <h2 class="wpbs-muted">Month</h2>  
    <?php wp_get_archives( array( 'type' => 'monthly', 'show_post_count' => true, 'before' => '<li class="list-group-item">', 'after' => '</li>', 'format' => 'custom' ) ); ?>    
    </div>
    <div class="col-md-2">
    <h2 class="wpbs-muted">Year</h2>
    <?php wp_get_archives( array( 'type' => 'yearly', 'show_post_count' => true, 'before' => '<li class="list-group-item">', 'after' => '</li>', 'format' => 'custom' ) ); ?>    
    </div>
    </div>  
    
    
  </div>
  <div class="col-md-4">
	<?php get_sidebar(); ?>	
  </div>

</div>
<?php get_footer(); ?>