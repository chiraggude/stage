<?php

// Register Menu Locations
register_nav_menus( array(
      'primary-menu' => __( 'Primary Menu' ),
      'side-menu' => __( 'Side Menu' ),
      'footer-menu' => __( 'Footer Menu' )
));

//Register 2 Sidebars and 4 footer widget areas.
function wpbs_widgets_init() {

// Register the Main Sidebar (right) and a Left Sidebar  */
register_sidebar(array(
	    'name' => 'Main Sidebar',
		'description' => 'This is the default sidebar that appears on the right',
		'before_widget' => '',
		'after_widget' => '<hr>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

register_sidebar(array(
		'name' => 'Left Sidebar',
		'id' => 'left-sidebar',
		'description' => 'Appears as the sidebar on the left of the page',
		'before_widget' => '',
		'after_widget' => '<hr>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));


// Register Footer Widget Areas  
register_sidebar(array(
      'name' => __( 'Footer Column 1' ),
      'id' => 'footer-column-1',
      'description' => __( 'Widgets in this area will be shown on the Footer column 1' ),
      'before_title' => '<h3>',
      'after_title' => '</h3>',
      'before_widget' => '',
      'after_widget' => '',
    ));

register_sidebar(array(
      'name' => __( 'Footer Column 2' ),
      'id' => 'footer-column-2',
      'description' => __( 'Widgets in this area will be shown on the Footer column 2' ),
      'before_title' => '<h3>',
      'after_title' => '</h3>',
      'before_widget' => '',
      'after_widget' => '',
    ));

register_sidebar(array(
      'name' => __( 'Footer Column 3' ),
      'id' => 'footer-column-3',
      'description' => __( 'Widgets in this area will be shown on the Footer column 3' ),
      'before_title' => '<h3>',
      'after_title' => '</h3>',
      'before_widget' => '',
      'after_widget' => '',
    ));

register_sidebar(array(
      'name' => __( 'Footer Column 4' ),
      'id' => 'footer-column-4',
      'description' => __( 'Widgets in this area will be shown on the Footer column 4' ),
      'before_title' => '<h3>',
      'after_title' => '</h3>',
      'before_widget' => '',
      'after_widget' => '',
    ));
    
    }
add_action( 'widgets_init', 'wpbs_widgets_init' );