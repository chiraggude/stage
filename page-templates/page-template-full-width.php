<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>


    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
        <h1 class="wpbs-very-muted"> <?php wp_title(" "); ?> </h1>
	  	<?php the_content(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, this page does not exist.'); ?></p>

	<?php endif; ?>
	
  
<?php get_footer(); ?>