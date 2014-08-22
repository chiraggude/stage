<?php
/*
Template Name: Home Page - Banner
*/
?>

<?php get_header(); ?>
</div>

<div class="parallax-background">
	<div class="container">
    <div class="parallax-content">
    <h1 class="parallax-h1"><  S T A G E  ></h1>
    <h3 class="parallax-h3">“Stage makes front-end development on WordPress faster and easier. It's made for devices of all shapes and projects of all sizes”</h3>
    <a class="btn btn-success btn-lg" href="https://github.com/chiraggude/wordpress-bootstrap" role="button"><i class="fa fa-github fa-lg"></i> Download from GitHub</a>
	</div> 	      
	</div> 
  </div> 

<div class="container">

 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	
	<?php the_content(); ?>


<?php endwhile; else: ?>
	<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

</div>


<div><!-- for <div> at start of footer.php  -->
 <?php get_footer(); ?>