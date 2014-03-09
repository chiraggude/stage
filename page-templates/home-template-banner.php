<?php
/*
Template Name: Home Page - Banner
*/
?>

<?php get_header(); ?>
</div>

<div id="parallax1">
	<div class="container">
    <div class="parallax-content">
    <h1 class="parallax-h1">The WordPress Bootstrap Theme</h1>
    <h3 class="parallax-h3">“Bootstrap makes front-end web development faster and easier. It's made for folks of all skill levels, devices of all shapes, and projects of all sizes”</h3>
    <a class="btn btn-success btn-lg" href="https://github.com/chiraggude/wordpress-bootstrap" role="button"><i class="fa fa-github fa-lg"></i> Download from GitHub</a>
	</div> 	      
	</div> 
  </div> <!-- Parallax End -->

<div class="container">

 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	
	<?php the_content(); ?>


<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div>


<div><!-- for <div> at start of footer.php  -->
 <?php get_footer(); ?>