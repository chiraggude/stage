<?php
/*
Template Name: Left Sidebar
*/
?>

<?php get_header(); ?>

<div class="row">
    <div class="col-md-4">
	
	<?php get_sidebar('left'); ?>	
	
  </div>
  
  <div class="col-md-8">
  
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h1 class="wpbs-very-muted"> <?php wp_title(" "); ?> </h1>
	  	<?php the_content(); ?>

	<?php endwhile; else: ?>
		<p><?php _e('Sorry, this page does not exist.'); ?></p>
	<?php endif; ?>
	
  </div>

</div>
<?php get_footer(); ?>