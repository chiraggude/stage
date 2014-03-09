<?php
/**
 * The template for displaying search forms 
 */
?>

<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <div class="input-group">
		<input type="search" class="form-control" id="searchform" placeholder="Search …" value="" name="s" title="Search for:" />
        <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><i class="fa fa-search fa-fw"></i></button>
        </span>
    </div><!-- /input-group -->
</form>




      
     