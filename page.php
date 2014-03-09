<?php get_header(); ?>

<div class="row">
  <div class="col-md-8">

	<?php while ( have_posts() ) : the_post(); ?>
		<h1><?php the_title(); ?></h1>
	  	<?php the_content(); ?>
      
      <hr>  
      <p>Last updated on: <?php the_time('l, F jS, Y'); ?></p>

	<?php endwhile; ?>
		

  </div>
  <div class="col-md-4">
	<?php get_sidebar(); ?>	
  </div>

</div>
<?php get_footer(); ?>
