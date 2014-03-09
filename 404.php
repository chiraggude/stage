<?php get_header(); ?>

<div class="row">
  <div class="col-md-8">
    <br/><br/>
	<div class="jumbotron">
        <div class="row">
            <div class="col-md-4">
        <h1><i class="fa fa-frown-o fa-3x"></i></h1>
                </div>
                <div class="col-md-8">
        <br/>
        <h2> Page not Found!</h2>
        <p class="text-muted">It looks like nothing was found at this location. Maybe try a search?</p>
        
        <?php get_search_form(); ?>
                    </div>
            </div>
       		
    </div>
      
  </div>
    
   <div class="col-md-4">
   <?php get_sidebar(); ?>	
   </div>


</div>
<?php get_footer(); ?>


