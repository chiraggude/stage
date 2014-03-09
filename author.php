<?php get_header(); ?>

<div class="row">
  <div class="col-md-8">
    
    <br/>
    <div class="row">
    <div class="col-md-3">
    <br/>
    <?php echo get_avatar( $user->user_email, '150' ); ?>    
    </div>
        
        
    <div class="col-md-9">
    <h1 class="wpbs-very-muted"><?php wp_title("",true); ?> </h1>
    <p><a href="<?php the_author_meta( 'user_url' ); ?>" class="btn btn-primary" role="button"><?php the_author_meta( 'user_url' ); ?></a></p>
    <?php if ( get_the_author_meta( 'description' ) ) : ?>
    <div class="author-description"><?php the_author_meta( 'description' ); ?></div>
	<?php endif; ?>    
    </div>
    </div>

    
    <br/>  
    <h3 class="wpbs-very-muted">Recent Articles</h3>
    <br/><br/>
      
    <div class="list-group">
  
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        
    <a href="<?php the_permalink(); ?>" class="list-group-item">
    <br/>
    <h4 class="list-group-item-heading"><?php the_title(); ?></h4> 
        
    <p class="wpbs-very-muted">
    <i class="fa fa-bookmark"></i> <?php  foreach((get_the_category()) as $category) { echo $category->cat_name . ' | '; }  ?> 
    <i class="fa fa-clock-o"></i> <?php echo get_the_date('', $post->ID); ?>
    </p>
        
    <p class="list-group-item-text"><?php echo excerpt(32);?></p>
    <br/>
    </a>
        
     
    <?php endwhile; else: ?>
    <?php _e('Sorry, there are no posts.'); ?>
    <?php endif; ?>
      
    </div>

      
            
      <?php wpbs_pagination();?>

  </div>

    <div class="col-md-4">
	<?php get_sidebar(); ?>	
    </div>

</div>
<?php get_footer(); ?>