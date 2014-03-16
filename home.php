<?php get_header(); ?>

<div class="row">
  <div class="col-md-8">

	<h1 class="wpbs-very-muted"><i class="fa fa-list-alt"></i> <?php wp_title("",true); ?> </h1>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	
    <?php wpbs_list_post_thumbnail(); ?>
    <br/><br/>
    <p class="wpbs-muted"><i class="fa fa-bookmark"></i> <?php the_category(', ') ?>
    <a href="<?php comments_link(); ?>" class="pull-right"><?php comments_number( '<span class="badge">0</span> <i class="fa fa-comment-o"></i>', '<span class="badge">1</span> <i class="fa fa-comment"></i>', '<span class="badge">%</span> <i class="fa fa-comments"></i>' ); ?></a> 
    </p>
    <?php the_excerpt(); ?>
    <br/>
      
    <?php endwhile; else: ?>
      <p><?php _e('Sorry, there are no posts.'); ?></p>
    <?php endif; ?>
      
            
      <?php wpbs_pagination();?>

  </div>
  <div class="col-md-4">
	<?php get_sidebar(); ?>	
  </div>

</div>
<?php get_footer(); ?>
