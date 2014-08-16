<?php

/**
  ReduxFramework Sample Config File
  For full documentation, please visit: https://docs.reduxframework.com
 * */

if (!class_exists('Redux_Framework_sample_config')) {

    class Redux_Framework_sample_config {

        public $args        = array();
        public $sections    = array();
        public $theme;
        public $ReduxFramework;

        public function __construct() {

            if (!class_exists('ReduxFramework')) {
                return;
            }

            // This is needed. Bah WordPress bugs.  ;)
            if (strpos(Redux_Helpers::cleanFilePath(__FILE__), Redux_Helpers::cleanFilePath(get_stylesheet_directory())) !== false) {
                $this->initSettings();
            } else {
                add_action('plugins_loaded', array($this, 'initSettings'), 10);
            }
        }

        public function initSettings() {

            // Just for demo purposes. Not needed per say.
            $this->theme = wp_get_theme();

            // Set the default arguments
            $this->setArguments();

            // Set a few help tabs so you can see how it's done
            $this->setHelpTabs();

            // Create the sections and fields
            $this->setSections();

            if (!isset($this->args['opt_name'])) { // No errors please
                return;
            }

            // If Redux is running as a plugin, this will remove the demo notice and links
            add_action( 'redux/loaded', array( $this, 'remove_demo' ) );
            
            // Function to test the compiler hook and demo CSS output.
            // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
            //add_filter('redux/options/'.$this->args['opt_name'].'/compiler', array( $this, 'compiler_action' ), 10, 2);
            
            // Change the arguments after they've been declared, but before the panel is created
            //add_filter('redux/options/'.$this->args['opt_name'].'/args', array( $this, 'change_arguments' ) );
            
            // Change the default value of a field after it's been set, but before it's been useds
            //add_filter('redux/options/'.$this->args['opt_name'].'/defaults', array( $this,'change_defaults' ) );
            
            // Dynamically add a section. Can be also used to modify sections/fields
            //add_filter('redux/options/' . $this->args['opt_name'] . '/sections', array($this, 'dynamic_section'));

            $this->ReduxFramework = new ReduxFramework($this->sections, $this->args);
        }

        /**

          This is a test function that will let you see when the compiler hook occurs.
          It only runs if a field	set with compiler=>true is changed.

         * */
        function compiler_action($options, $css) {
            //echo '<h1>The compiler hook has run!';
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )

            /*
              // Demo of how to use the dynamic CSS and write your own static CSS file
              $filename = dirname(__FILE__) . '/style' . '.css';
              global $wp_filesystem;
              if( empty( $wp_filesystem ) ) {
                require_once( ABSPATH .'/wp-admin/includes/file.php' );
              WP_Filesystem();
              }

              if( $wp_filesystem ) {
                $wp_filesystem->put_contents(
                    $filename,
                    $css,
                    FS_CHMOD_FILE // predefined mode settings for WP files
                );
              }
             */
        }

        /**

          Custom function for filtering the sections array. Good for child themes to override or add to the sections.
          Simply include this function in the child themes functions.php file.

          NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
          so you must use get_template_directory_uri() if you want to use any of the built in icons

         * */
        function dynamic_section($sections) {
            //$sections = array();
            $sections[] = array(
                'title' => __('Section via hook', 'redux-framework-demo'),
                'desc' => __('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo'),
                'icon' => 'el-icon-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }

        /**

          Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.

         * */
        function change_arguments($args) {
            //$args['dev_mode'] = true;

            return $args;
        }

        /**

          Filter hook for filtering the default value of any given field. Very useful in development mode.

         * */
        function change_defaults($defaults) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }

        // Remove the demo link and the notice of integrated demo from the redux-framework plugin
        function remove_demo() {

            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if (class_exists('ReduxFrameworkPlugin')) {
                remove_filter('plugin_row_meta', array(ReduxFrameworkPlugin::instance(), 'plugin_metalinks'), null, 2);

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
            }
        }

        public function setSections() {

            /**
              Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
             * */
            // Background Patterns Reader
            $sample_patterns_path   = ReduxFramework::$_dir . '../sample/patterns/';
            $sample_patterns_url    = ReduxFramework::$_url . '../sample/patterns/';
            $sample_patterns        = array();

            if (is_dir($sample_patterns_path)) :

                if ($sample_patterns_dir = opendir($sample_patterns_path)) :
                    $sample_patterns = array();

                    while (( $sample_patterns_file = readdir($sample_patterns_dir) ) !== false) {

                        if (stristr($sample_patterns_file, '.png') !== false || stristr($sample_patterns_file, '.jpg') !== false) {
                            $name = explode('.', $sample_patterns_file);
                            $name = str_replace('.' . end($name), '', $sample_patterns_file);
                            $sample_patterns[]  = array('alt' => $name, 'img' => $sample_patterns_url . $sample_patterns_file);
                        }
                    }
                endif;
            endif;

            ob_start();

            $ct             = wp_get_theme();
            $this->theme    = $ct;
            $item_name      = $this->theme->get('Name');
            $tags           = $this->theme->Tags;
            $screenshot     = $this->theme->get_screenshot();
            $class          = $screenshot ? 'has-screenshot' : '';

            $customize_title = sprintf(__('Customize &#8220;%s&#8221;', 'redux-framework-demo'), $this->theme->display('Name'));
            
            ?>
            <div id="current-theme" class="<?php echo esc_attr($class); ?>">
            <?php if ($screenshot) : ?>
                <?php if (current_user_can('edit_theme_options')) : ?>
                        <a href="<?php echo wp_customize_url(); ?>" class="load-customize hide-if-no-customize" title="<?php echo esc_attr($customize_title); ?>">
                            <img src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                        </a>
                <?php endif; ?>
                    <img class="hide-if-customize" src="<?php echo esc_url($screenshot); ?>" alt="<?php esc_attr_e('Current theme preview'); ?>" />
                <?php endif; ?>

                <h4><?php echo $this->theme->display('Name'); ?></h4>

                <div>
                    <ul class="theme-info">
                        <li><?php printf(__('By %s', 'redux-framework-demo'), $this->theme->display('Author')); ?></li>
                        <li><?php printf(__('Version %s', 'redux-framework-demo'), $this->theme->display('Version')); ?></li>
                        <li><?php echo '<strong>' . __('Tags', 'redux-framework-demo') . ':</strong> '; ?><?php printf($this->theme->display('Tags')); ?></li>
                    </ul>
                    <p class="theme-description"><?php echo $this->theme->display('Description'); ?></p>
            <?php
            if ($this->theme->parent()) {
                printf(' <p class="howto">' . __('This <a href="%1$s">child theme</a> requires its parent theme, %2$s.') . '</p>', __('http://codex.wordpress.org/Child_Themes', 'redux-framework-demo'), $this->theme->parent()->display('Name'));
            }
            ?>

                </div>
            </div>

            <?php
            $item_info = ob_get_contents();

            ob_end_clean();

            $sampleHTML = '';
            if (file_exists(dirname(__FILE__) . '/info-html.html')) {
                /** @global WP_Filesystem_Direct $wp_filesystem  */
                global $wp_filesystem;
                if (empty($wp_filesystem)) {
                    require_once(ABSPATH . '/wp-admin/includes/file.php');
                    WP_Filesystem();
                }
                $sampleHTML = $wp_filesystem->get_contents(dirname(__FILE__) . '/info-html.html');
            }




            // ACTUAL DECLARATION OF SECTIONS
			//CPG
			
            $this->sections[] = array(
                'icon' => 'el-icon-website',
                'title' => __('Styling Options', 'redux-framework-demo'),
                'fields' => array(
                    
                   			
					array(
                        'id' => 'stylesheet',
                        'type' => 'radio',
                        'title' => __('Theme Stylesheet', 'redux-framework-demo'),
                        'subtitle' => __('Select your color and design scheme.', 'redux-framework-demo'),
                        'desc' => __('Credits for theme styles: <a href="https://github.com/twbs/bootstrap/">Bootstrap</a> and <a href="https://github.com/thomaspark/bootswatch/">Bootswatch</a>'),
                        'options' => array(
								'bootstrap' => 'Bootstrap (Original)',
								'amelia' => 'Amelia',
								'cerulean' => 'Cerulean',
								'cosmo' => 'Cosmo',
								'cyborg' => 'Cyborg',
								'darkly' => 'Darkly',
								'flatly' => 'Flatly',
								'lumen' => 'Lumen',
								'simplex' => 'Simplex',
								'slate' => 'Slate',
								'superhero' => 'Superhero',
								'yeti' => 'Yeti'
								), 
                        'default' => 'bootstrap'
                    ),
					
					array( 'id' => 'section-start', 'type' => 'section', 'title' => __('Navigation', 'redux-framework-demo'), 'indent' => true  ),
					
					array(
                        'id' => 'stage-navbar-style',
                        'type' => 'radio',
                        'title' => __('Navbar Style', 'redux-framework-demo'),
                        'subtitle' => __('Select a style for your top navigation bar', 'redux-framework-demo'),
                        'options' => array('navbar-default' => 'Nav Default', 'navbar-inverse' => 'Nav Inverse'), 
                        'default' => 'navbar-default'
                    ),
					
					array( 
						'id'       => 'side-menu-toggle',
						'type'     => 'color_rgba',
						'title'    => __('Off-canvas Menu Toggle Color', 'redux-framework-demo'),
						'subtitle' => __('Select the color for the button used to toggle the off-canvas side menu.', 'redux-framework-demo'),
						'default'  => array (  'color' => '#777',  'alpha' => '1.0' ), 
						'output'   => array('.left-navbar-toggle'),
						'mode'     => 'color',
						'transparent' => false,
						),	
					
					array( 'id'     => 'section-end', 'type'   => 'section', 'indent' => false, ),
					
					array( 'id' => 'section-start', 'type' => 'section', 'title' => __('Main Content', 'redux-framework-demo'), 'indent' => true  ),
										
					array(
                        'id' => 'content-background-color',
                        'type' => 'color',
                        'title' => __('Content Background Color', 'redux-framework-demo'),
                        'subtitle' => __('Pick a background color for the main content area.', 'redux-framework-demo'),
                        
						'output' => array('body'),
						'mode' => 'background',
                        'validate' => 'color',
						'transparent' => false,
                    ),
					
					array(
                        'id' => 'content-font-color',
                        'type' => 'color',
                        'title' => __('Content Background Font Color', 'redux-framework-demo'),
                        'subtitle' => __('Pick a font color for the main content area.', 'redux-framework-demo'),
                        
						'output' => array('body'),
                        'validate' => 'color',
						'transparent' => false,
                    ),
					
					array( 'id'     => 'section-end', 'type'   => 'section', 'indent' => false, ),
					
					array( 'id' => 'section-start', 'type' => 'section', 'title' => __('Footer Menu', 'redux-framework-demo'), 'indent' => true  ),
					
					array(
                        'id' => 'footer-menu-background',
                        'type' => 'color',
                        'title' => __('Footer Menu Background Color', 'redux-framework-demo'),
                        'subtitle' => __('Pick a background color for the footer menu.', 'redux-framework-demo'),
                        'default' => '#34495e',
						'output' => array('.footer-menu'),
						'mode' => 'background',
                        'validate' => 'color',
						'transparent' => false,
                    ),
					
					array( 'id'     => 'section-end', 'type'   => 'section', 'indent' => false, ),
					
					array( 'id' => 'section-start', 'type' => 'section', 'title' => __('Footer Widget Area', 'redux-framework-demo'), 'indent' => true  ),
					
					array(
                        'id' => 'footer-widget-area-background',
                        'type' => 'color',
                        'title' => __('Footer Widget Area Background Color', 'redux-framework-demo'),
                        'subtitle' => __('Pick a background color for the footer widget area.', 'redux-framework-demo'),
                        'default' => '#ecf0f1',
						'output' => array('.footer-widgets-panel'),
						'mode' => 'background',
                        'validate' => 'color',
						'transparent' => false,
                    ),
					
					array(
                        'id' => 'footer-widget-area-font',
                        'type' => 'color',
                        'title' => __('Footer Widget Area Font Color', 'redux-framework-demo'),
                        'subtitle' => __('Pick a background font color for the footer widget area.', 'redux-framework-demo'),
                        'default' => '#333',
						'output' => array('.footer-widgets-panel'),
                        'validate' => 'color',
						'transparent' => false,
                    ),
					
					array( 'id'     => 'section-end', 'type'   => 'section', 'indent' => false, ),
					
					array( 'id' => 'section-start', 'type' => 'section', 'title' => __('Footer Copyright Area', 'redux-framework-demo'), 'indent' => true  ),
					
					array(
						'id'       => 'footer-copyright-text',
						'type'     => 'text',
						'title'    => __('Footer Copyright Text', 'redux-framework-demo'),
						'default'  => 'Built with STAGE'
					),
					
					array(
                        'id' => 'footer-copyright-text-background',
                        'type' => 'color',
                        'title' => __('Footer Copyright Background Color', 'redux-framework-demo'),
                        'subtitle' => __('Pick a background color for the footer copyright area.', 'redux-framework-demo'),
                        'default' => '#fafafa',
						'output' => array('.footer-credits'),
						'mode' => 'background',
                        'validate' => 'color',
						'transparent' => false,
                    ),
					
					array(
                        'id' => 'footer-copyright-text-font',
                        'type' => 'color',
                        'title' => __('Footer Copyright Text Color', 'redux-framework-demo'),
                        'subtitle' => __('Pick a font color for the footer copyright text area.', 'redux-framework-demo'),
                        'default' => '#333',
						'output' => array('.footer-credits'),
						'validate' => 'color',
						'transparent' => false,
                    ),
					
					array( 'id'     => 'section-end', 'type'   => 'section', 'indent' => false, ),
					
                                 
                 
                )
            );
			
			
			
			
			$this->sections[] = array(
				'title'   => 'General Settings',
				'icon'    => 'el-icon-cogs',
				'heading' => 'General Settings',
				'fields'  => array(
					
					
					array(
                        'id' => 'css-code',
                        'type' => 'ace_editor',
                        'title' => __('CSS Code', 'redux-framework-demo'),
                        'subtitle' => __('Paste your Custom CSS code here.', 'redux-framework-demo'),
                        'mode' => 'css',
                        'theme' => 'clouds',
                        'desc' => 'If your CSS changes are not showing up on the frontend, try using the !important declaration.',
                        
                    ),
					
					 array(
                        'id' => 'tracking-code',
                        'type' => 'ace_editor',
                        'title' => __('JS Tracking Code', 'redux-framework-demo'),
                        'subtitle' => __('Paste your Google Analytics (or other) tracking code here. This will be added into the footer of your theme.', 'redux-framework-demo'),
                        'mode' => 'javascript',
                        'theme' => 'chrome',
                        'desc' => 'Dont include the < script > and < /script > tags.',
                        //'default' => "jQuery(document).ready(function(){\n\n});"
                    ),
					
		
					
				),
			);
            
          
			$this->sections[] = array(
                'type' => 'divide',
            );


            $theme_info = '<div class="redux-framework-section-desc">';
            $theme_info .= '<p class="redux-framework-theme-data description theme-uri">' . __('<strong>Theme URL:</strong> ', 'redux-framework-demo') . '<a href="' . $this->theme->get('ThemeURI') . '" target="_blank">' . $this->theme->get('ThemeURI') . '</a></p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-author">' . __('<strong>Author:</strong> ', 'redux-framework-demo') . $this->theme->get('Author') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-version">' . __('<strong>Version:</strong> ', 'redux-framework-demo') . $this->theme->get('Version') . '</p>';
            $theme_info .= '<p class="redux-framework-theme-data description theme-description">' . $this->theme->get('Description') . '</p>';
            $tabs = $this->theme->get('Tags');
            if (!empty($tabs)) {
                $theme_info .= '<p class="redux-framework-theme-data description theme-tags">' . __('<strong>Tags:</strong> ', 'redux-framework-demo') . implode(', ', $tabs) . '</p>';
            }
            $theme_info .= '</div>';

            if (file_exists(dirname(__FILE__) . '/../README.md')) {
                $this->sections['theme_docs'] = array(
                    'icon' => 'el-icon-list-alt',
                    'title' => __('Documentation', 'redux-framework-demo'),
                    'fields' => array(
                        array(
                            'id' => '17',
                            'type' => 'raw',
                            'markdown' => true,
                            'content' => file_get_contents(dirname(__FILE__) . '/../README.md')
                        ),
                    ),
                );
            }//if
           

           

            $this->sections[] = array(
                'icon' => 'el-icon-info-sign',
                'title' => __('Theme Information', 'redux-framework-demo'),
                'desc' => __('<p class="description">  </p>', 'redux-framework-demo'),
                'fields' => array(
                    array(
                        'id' => 'raw_new_info',
                        'type' => 'raw',
                        'content' => $item_info,
                    )
                ),
            );

            if (file_exists(trailingslashit(dirname(__FILE__)) . 'README.html')) {
                $tabs['docs'] = array(
                    'icon' => 'el-icon-book',
                    'title' => __('Documentation', 'redux-framework-demo'),
                    'content' => nl2br(file_get_contents(trailingslashit(dirname(__FILE__)) . 'README.html'))
                );
            }
        }

       
		public function setHelpTabs() {

            // Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-1',
                'title' => __('GitHub', 'redux-framework-demo'),
                'content' => __('<p>Contribute to the development of STAGE on <a href="https://github.com/chiraggude/wordpress-bootstrap">GitHub</a></p>', 'redux-framework-demo')
            );

            $this->args['help_tabs'][] = array(
                'id' => 'redux-opts-2',
                'title' => __('Report Issues', 'redux-framework-demo'),
                'content' => __('<p>Got suggestions? Found a bug? Report all issues on <a href="https://github.com/chiraggude/wordpress-bootstrap/issues">GitHub</a></p>', 'redux-framework-demo')
            );

            // Set the help sidebar
            $this->args['help_sidebar'] = __('<p>The STAGE theme is hosted and updated on GitHub.</p>', 'redux-framework-demo');
        }
		

        /**

          All the possible arguments for Redux.
          For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments

         * */
        public function setArguments() {

            $theme = wp_get_theme(); // For use with some settings. Not necessary.

            $this->args = array(
                // TYPICAL -> Change these values as you need/desire
                'opt_name'          => 'redux_demo',            // This is where your data is stored in the database and also becomes your global variable name.
                'display_name'      => $theme->get('Name'),     // Name that appears at the top of your panel
                'display_version'   => $theme->get('Version'),  // Version that appears at the top of your panel
                'menu_type'         => 'menu',                  //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
                'allow_sub_menu'    => true,                    // Show the sections below the admin menu item or not
                'menu_title'        => __('STAGE Options', 'redux-framework-demo'),
                'page_title'        => __('STAGE Options', 'redux-framework-demo'),
                
                // You will need to generate a Google API key to use this feature.
                // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
                'google_api_key' => '', // Must be defined to add google fonts to the typography module
                
                'async_typography'  => true,                    // Use a asynchronous font on the front end or font string
                'admin_bar'         => true,                    // Show the panel pages on the admin bar
                'global_variable'   => '',                      // Set a different name for your global variable other than the opt_name
                'dev_mode'          => false,                    // Show the time the page took to load, etc
                'customizer'        => true,                    // Enable basic customizer support
                
                // OPTIONAL -> Give you extra features
                'page_priority'     => null,                    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
                'page_parent'       => 'themes.php',            // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
                'page_permissions'  => 'manage_options',        // Permissions needed to access the options panel.
                'menu_icon'         => '',                      // Specify a custom URL to an icon
                'last_tab'          => '',                      // Force your panel to always open to a specific tab (by id)
                'page_icon'         => 'icon-themes',           // Icon displayed in the admin panel next to your menu_title
                'page_slug'         => '_options',              // Page slug used to denote the panel
                'save_defaults'     => true,                    // On load save the defaults to DB before user clicks save or not
                'default_show'      => false,                   // If true, shows the default value next to each field that is not the default value.
                'default_mark'      => '',                      // What to print by the field's title if the value shown is default. Suggested: *
                
                // CAREFUL -> These options are for advanced use only
                'transient_time'    => 60 * MINUTE_IN_SECONDS,
                'output'            => true,                    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
                'output_tag'        => true,                    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
                'footer_credit'     => ' ',                   // Disable the footer credit of Redux. Please leave if you can help it.
                
                // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
                'database'              => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
                'show_import_export'    => true, // REMOVE
                'system_info'           => false, // REMOVE

                // HINTS
                'hints' => array(
                    'icon'          => 'icon-question-sign',
                    'icon_position' => 'right',
                    'icon_color'    => 'lightgray',
                    'icon_size'     => 'normal',
                    'tip_style'     => array(
                        'color'         => 'light',
                        'shadow'        => true,
                        'rounded'       => false,
                        'style'         => '',
                    ),
                    'tip_position'  => array(
                        'my' => 'top left',
                        'at' => 'bottom right',
                    ),
                    'tip_effect'    => array(
                        'show'          => array(
                            'effect'        => 'slide',
                            'duration'      => '500',
                            'event'         => 'mouseover',
                        ),
                        'hide'      => array(
                            'effect'    => 'slide',
                            'duration'  => '500',
                            'event'     => 'click mouseleave',
                        ),
                    ),
                )
            );


            // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.		
            $this->args['share_icons'][] = array(
                'url' => 'https://github.com/chiraggude/wordpress-bootstrap',
                'title' => 'STAGE on GitHub',
                'icon' => 'el-icon-github'
               
            );
           /* 
		   $this->args['share_icons'][] = array(
                'url' => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
                'title' => 'Like us on Facebook',
                'icon' => 'el-icon-facebook'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://twitter.com/reduxframework',
                'title' => 'Follow us on Twitter',
                'icon' => 'el-icon-twitter'
            );
            $this->args['share_icons'][] = array(
                'url' => 'http://www.linkedin.com/company/redux-framework',
                'title' => 'Find us on LinkedIn',
                'icon' => 'el-icon-linkedin'
            );
			*/



            // Panel Intro text -> before the form
            if (!isset($this->args['global_variable']) || $this->args['global_variable'] !== false) {
                if (!empty($this->args['global_variable'])) {
                    $v = $this->args['global_variable'];
                } else {
                    $v = str_replace("-", "_", $this->args['opt_name']);
                }
                $this->args['intro_text'] = sprintf(__('<p> </p>', 'redux-framework-demo'), $v);
            } else {
                $this->args['intro_text'] = __('<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo');
            }

            // Add content after the form.
            $this->args['footer_text'] = __('<p> </p>', 'redux-framework-demo');
        }

    }

    global $reduxConfig;
    $reduxConfig = new Redux_Framework_sample_config();
}


/**
  Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')):
    function redux_my_custom_field($field, $value) {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
endif;

/**

  Custom function for the callback validation referenced above

 * */
if (!function_exists('redux_validate_callback_function')):

    function redux_validate_callback_function($field, $value, $existing_value) {
        $error = false;
        $value = 'just testing';
        /*
          do your validation

          if(something) {
          $value = $value;
          } elseif(something else) {
          $error = true;
          $value = $existing_value;
          $field['msg'] = 'your custom error message';
          }
         */

        $return['value'] = $value;
        if ($error == true) {
            $return['error'] = $field;
        }
        return $return;
    }


endif;
