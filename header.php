<?php global $redux_demo; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() . '/assets/images/favicon.png' ?>">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() . '/assets/images/apple-touch-icon.png' ?>">
    <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>

    <?php wp_enqueue_script("jquery"); ?>

    <?php if (class_exists('ReduxFramework')) {  ?>
	    <link rel="stylesheet" href="<?php echo  get_template_directory_uri() .'/bootstrap/css/'; echo $redux_demo['stylesheet'].'.min.css';?>" type="text/css"/>
        <style type="text/css"> <?php echo $redux_demo['css-code']; ?> </style>
    <?php } else {   ?>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <?php }  ?>

    <?php wp_head(); ?>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>

  <body <?php body_class($class); ?>>

  <div id="mmenu-wrapper">  <!--mmenu wrapper -->
  
    <!-- Primary Menu-->
    <?php if (class_exists('ReduxFramework')) {  ?>
    <nav class="navbar <?php echo  $redux_demo['stage-navbar-style'];?> navbar-fixed-top mm-fixed-top" role="navigation">
	<?php } else {   ?>
	<nav class="navbar navbar-default navbar-fixed-top mm-fixed-top" role="navigation">
	<?php }  ?>
      <div class="container">
        <div class="navbar-header">
           
           <?php if ( has_nav_menu( 'side-menu' ) ) { ?>
           <!--mmenu toggle --> 
           <a class="left-navbar-toggle" href="#menu-left"> <i class="fa fa-bars fa-2x"></i> </a>
           <?php } ?>
            
           <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           
            <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
            <a href="#search-modal" data-toggle="modal" class="visible-xs mobile-search"><i class="fa fa-search fa-lg"></i> </a>
        </div>

		<div class="navbar-collapse collapse">
        <?php wp_nav_menu( array(
                'menu'              => 'primary-menu',
                'theme_location'    => 'primary-menu',
                'depth'             => 2,
                'container'         => false,
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
         );?>
		
           
        <?php if ( is_user_logged_in() ) {
        global $current_user; get_currentuserinfo();
    
        echo ' <ul class="nav navbar-nav navbar-right">
                    <li><a href="#search-modal" data-toggle="modal" class="hidden-xs"><i class="fa fa-search fa-lg"></i> </a></li>
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><div class=user-photo>'.get_avatar( $current_user->user_email, 30 ).'</div>  Hi, '.$current_user->display_name.' <b class="caret"></b></a>
                 <ul class="dropdown-menu">
                    <li><a href="'.get_edit_user_link().'"><i class="fa fa-user fa-fw"></i> Your Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="'.wp_logout_url().'"><i class="fa fa-power-off fa-fw"></i> Logout</a></li>
                </ul>
                </li>
              </ul> ';
        
        } else {
        echo ' <ul class="nav navbar-nav navbar-right">
                    <li><a href="#search-modal" data-toggle="modal"><i class="fa fa-search fa-lg"></i> </a></li>
                    <li><a href="'.wp_login_url().'"><i class="fa fa-sign-in fa-fw fa-lg"></i> LOGIN</a></li>
                    <li><a href="'.wp_registration_url().'"><i class="fa fa-pencil-square-o fa-fw fa-lg"></i> SIGN UP</a></li>     
              </ul> ';
        } ?>
            
        </div>
      </div>
    </nav>

    <!--Search Modal -->
    <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Search <?php bloginfo('name'); ?></h4>
          </div>
          <div class="modal-body">
          <br/>
          <?php get_search_form(); ?>
          <br/><br/>
          </div>
        </div>
      </div>
    </div>
      
    <!-- Side Menu--> 
    <?php if ( has_nav_menu( 'side-menu' ) ) { ?>
    <nav id="menu-left">
       <?php wp_nav_menu( array(
            'theme_location'  => 'side-menu',
            'menu' => 'side-menu',
            'container' => false
        )); ?>
	</nav> 
     <?php } ?>

<div class="container" id="page-content">