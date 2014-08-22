<br/>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Sidebar</h3>
    </div>
    <div class="panel-body">
        <?php if ( !function_exists('dynamic_sidebar')  || !dynamic_sidebar( 'left-sidebar' ) ) :  ?>
                        <div class="alert alert-warning">
                            <strong>NO WIDGETS FOUND!</strong>
                            <p>Go to Appearance > Widgets and add some widgets to the "Left Sidebar" </p>
                        </div>
         <?php endif; ?>
    </div>
</div>