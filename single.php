<?php get_header(); ?>

<div class="row">
  <div class="col-md-8">

	<?php while ( have_posts() ) : the_post(); ?>
       
        <h1><?php the_title(); ?></h1>

        <p class="wpbs-muted"><i class="fa fa-bookmark"></i> <?php the_category(', ') ?>

        <a href="<?php comments_link(); ?>" class="pull-right"><?php comments_number( '<span class="badge">0</span> <i class="fa fa-comment-o"></i>', '<span class="badge">1</span> <i class="fa fa-comment"></i>', '<span class="badge">%</span> <i class="fa fa-comments"></i>' ); ?></a> </p>
      
		<?php wpbs_single_post_thumbnail(); ?><br/><br/>

        <p class="wpbs-very-muted"><i class="fa fa-clock-o"></i> <?php the_time('jS F, Y'); ?></p>
        
        <?php the_content(); ?><br/>

        <div class="row">
            <div class="col-md-6">
                <p class="wpbs-very-muted"><i class="fa fa-user"></i> Published by <?php the_author_posts_link(); ?> </p><br/>  
                <p class="wpbs-very-muted"><?php the_tags('<i class="fa fa-tags"></i> ', ', ', ''); ?> </p>
            </div>        
            <div class="col-md-6">
                <div id="sharebutton" class="pull-right"> </div>
            </div>
        </div><br/><br/>

        <?php wpbs_post_nav(); ?><br/>
      
		<?php // If comments are open or we have at least one comment, load up the comment template.
		 if ( comments_open() || get_comments_number() ) {
            comments_template();
         }  ?>
	   <?php endwhile;  ?>
		
  </div>
  
<div class="col-md-4">
	<?php get_sidebar(); ?>	
  </div>

</div>
<?php get_footer(); ?>