<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "itsolve_opt";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'itsolve' ),
        'page_title'           => esc_html__( 'Theme Options', 'itsolve' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */



    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */


    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('General', 'itsolve'),
        'id'        => 'main_logo_id',
        'desc'      => esc_html__('Wellcome Our Theme Option', 'itsolve'),
        'customizer_width' => '400px',
        'icon'      => 'el-icon-cog',
    ) );


/*========================
itsolve Typography FIELD
=========================*/
    Redux::setSection( $opt_name, array(
         'title'     => esc_html__('Typography Area', 'itsolve'),
        'id'         => 'itsolve_tyfo_page',  
        'icon'       => 'el-icon-picture',
        'fields'    => array(
			
				array(
					'id'          => 'itsolve_body_typography',
					'type'        => 'typography', 
					'title'       => esc_html__('Body Typography Style', 'itsolve'),
					'google'      => true, 
					'font-backup' => true,
					'line-height'   => false,
					'output'      => array('
						body,p						
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
					'default'     => array(
						'color'       => '', 
						'font-style'  => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '',						
					),
				),
				array(
					'id'          => 'itsolve_heading_all_typography',
					'type'        => 'typography', 
					'title'       => esc_html__('Headibg Typography Style', 'itsolve'),
					'google'      => true, 
					'font-backup' => true,
					'line-height'   => false,
					'font-style'  => false, 					
					'output'      => array('
						h1, h2, h3, h4, h5, h6					
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
					'default'     => array(
						'color'       => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '',						
					),
				),
				
				array(
					'id'          => 'itsolve_heading_typographyh1',
					'type'        => 'typography', 
					'title'       => esc_html__('Heading Typography H1', 'itsolve'),
					'google'      => true, 
					'font-backup' => true,
					'line-height'   => false,
					'font-style'  => false, 					
					'output'      => array('
						h1				
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
					'default'     => array(
						'color'       => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '',						
					),
				),
				array(
					'id'          => 'itsolve_heading_typographyh2',
					'type'        => 'typography', 
					'title'       => esc_html__('Heading Typography H2', 'itsolve'),
					'google'      => true, 
					'font-backup' => true,
					'line-height'   => false,
					'font-style'  => false, 					
					'output'      => array('
						h2				
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
					'default'     => array(
						'color'       => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '',						
					),
				),
				array(
					'id'          => 'itsolve_heading_typographyh3',
					'type'        => 'typography', 
					'title'       => esc_html__('Heading Typography H3', 'itsolve'),
					'google'      => true, 
					'font-backup' => true,
					'line-height'   => false,
					'font-style'  => false, 					
					'output'      => array('
						h3			
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
					'default'     => array(
						'color'       => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '',						
					),
				),
				array(
					'id'          => 'itsolve_heading_typographyh4',
					'type'        => 'typography', 
					'title'       => esc_html__('Heading Typography H4', 'itsolve'),
					'google'      => true, 
					'font-backup' => true,
					'line-height'   => false,
					'font-style'  => false, 					
					'output'      => array('
						h4				
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
					'default'     => array(
						'color'       => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '',						
					),
				),
				array(
					'id'          => 'itsolve_heading_typographyh5',
					'type'        => 'typography', 
					'title'       => esc_html__('Heading Typography H5', 'itsolve'),
					'google'      => true, 
					'font-backup' => true,
					'line-height'   => false,
					'font-style'  => false, 					
					'output'      => array('
						h5					
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
					'default'     => array(
						'color'       => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '',						
					),
				),
				array(
					'id'          => 'itsolve_heading_typographyh6',
					'type'        => 'typography', 
					'title'       => esc_html__('Heading Typography H6', 'itsolve'),
					'google'      => true, 
					'font-backup' => true,
					'line-height'   => false,
					'font-style'  => false, 					
					'output'      => array('
						h6					
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
					'default'     => array(
						'color'       => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '',						
					),
				),					
							
            ),
			
    ) );
	
/*========================
END itsolve Typography FIELD
=========================*/
	
	//total header area
     Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Header area', 'itsolve'),
        'id'        => 'itsolve_header_area',
        'desc'      => esc_html__('Header options', 'itsolve'),
        'icon'      => 'el-icon-tasks',      
        'fields'    => array(
		
             array(
                    'id'        => 'itsolve_header_display_none_hide',
					'desc'      => esc_html__('All Menu OFF/ON section', 'itsolve'),					
                    'type'      => 'switch',
                    'title'     => esc_html__('All Header Hide', 'itsolve'),
                    'default'   => false,
                ),			
             array(
                    'id'        => 'itsolve_header_top_hide',
					'desc'      => esc_html__('If you ON this section. It will show header top section all your single page. But If you want to only show header top in home and others page, Please goes to your page, there you can see header top OFF/ON section. Please set It', 'itsolve'),
                    'type'      => 'switch',
                    'title'     => esc_html__('Header Top', 'itsolve'),
                    'default'   => false,
                ),
                array(
                    'id'        => 'itsolve_box_layout',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Header Top layout', 'itsolve'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'htopt_box' => esc_html__('Box Layout','itsolve'),
                        'htopt_full' => esc_html__('Full Layout','itsolve'),
                    ),
                    'default'   => 'htopt_box'
                ),			
                array(
                    'id'        => 'itsolve_main_box_layout',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Header layout', 'itsolve'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'hmenul_box' => esc_html__('Box Layout','itsolve'),
                        'hmenu_full' => esc_html__('Full Layout','itsolve'),
                    ),
                    'default'   => 'hmenul_box'
                ),

				
            )
        ));	
	
     //Header Top
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Header Top Style ', 'itsolve'),
        'id'        => 'itsolve_header_top',
        'desc'      => esc_html__('Insert header top info', 'itsolve'),
		'icon'		=> 'el el-circle-arrow-right',
        'subsection' => true,     
        'fields'    => array(
                array(
                    'id'        => 'itsolve_top_right_layout',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Your Top Header Style', 'itsolve'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'header_top_1' => esc_html__('Left Address Right Icon','itsolve'),
                        'header_top_2' => esc_html__('Left Icon Right Address','itsolve'),
                        'header_top_3' => esc_html__(' Left Opening Middle Icon Right Login','itsolve'),
                        'header_top_4' => esc_html__('Left Address Right Icon & Search','itsolve'),
                    ),
                    'default'   => 'header_top_1'
                ),				
				array(
                    'id'       => 'itsolve_header_top_road',
                    'type'     => 'text',
                    'title'    => esc_html__('Insert Company Location', 'itsolve'),
                    'desc' => esc_html__('insert address ex:- house, road-4.', 'itsolve'),
					'default'	=> esc_html__('1st Floor New World.', 'itsolve'),
                ),		
                array(
                    'id'       => 'itsolve_header_top_email',
                    'type'     => 'text',
                    'title'    => esc_html__('Insert Email Address', 'itsolve'),
                    'desc' => esc_html__('Insert email address', 'itsolve'),
					'default'	=> esc_html__('example@example.com', 'itsolve'),					
                ),		
                array(
                    'id'       => 'itsolve_header_top_mobile',
                    'type'     => 'text',
                    'title'    => esc_html__('Insert Phone Number', 'itsolve'),
                    'desc' => esc_html__('Insert phone number', 'itsolve'),
					'default'	=> esc_html__('+880 320 432 242', 'itsolve'),					
                ),
				
                array(
                    'id'       => 'itsolve_header_top_opening',
                    'type'     => 'text',
                    'title'    => esc_html__('Opening Hour Text', 'itsolve'),
                    'desc' => esc_html__('Insert text', 'itsolve'),
					'default'	=> esc_html__('Open hours: 9.00-24.00 Mon-Sat', 'itsolve'),					
                ),				
                array(								
                    'id'        => 'itsolve_header_top_icon_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Header Top Icon Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'color' => '.top-address p span i, .top-address p a
					')
                ),				
                array(								
                    'id'        => 'itsolve_header_top_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Header Top Address Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'color' => '.top-address p a,
								.top-right-menu ul.social-icons li a,
								.top-address p span,
								.top-address.menu_18 span,
								.em-quearys-menu i,
								.top-form-control button.top-quearys-style
					')
                ),
                array(								
                    'id'        => 'itsolve_header_top_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Address Icon Hover Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.top-right-menu .social-icons li a:hover,
								.top-right-menu .social-icons li a i:hover,
								.top-address p a i,
								.top-address p span i
					')
                ),
                array(								
                    'id'        => 'itsolve_header_opening_bg_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Opening BG Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'background-color' => '.top-address.menu_18 span,.em-quearys-menu i',
					'border-color' => '.em-quearys-form'
					)
                ),				
                array(								
                    'id'        => 'itsolve_hoeder_top_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Header Top Section BG Color', 'itsolve'),
                    'default'  => '',
                    'output'    => array('
						.itsolve-header-top
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),							
				array(
					'id'             => 'itsolve_header_top_section_spacing',
					'type'           => 'spacing',
					'output'         => array('.itsolve-header-top'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Padding Option', 'itsolve'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing padding they want.', 'itsolve'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'itsolve'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),							
				
            ),
    ) );

    //Header social Icon
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( ' Header Social Icon', 'itsolve' ),
        'id'         => 'itsolve_social_section',
		'icon'		=> 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array(	
                array(
                    'id'       => 'itsolve_social_icons',
                    'type'     => 'sortable',
                    'title'    => esc_html__('Insert Social Icons', 'itsolve'),
                    'subtitle' => esc_html__('Enter social links', 'itsolve'),
                    'mode'     => 'text',
					'label'    => true,
                    'options'  => array(        
                        'facebook'     => '',
                        'twitter'      => '',
                        'instagram'    => '',
                        'tumblr'       => '',
                        'pinterest'    => '',
                        'linkedin'     => '',
                        'behance'      => '',
                        'dribbble'     => '',
                        'youtube'      => '',
                        'vimeo'        => '',
                        'rss'          => '',
                    ),
					'default' => array(
						'facebook'     => esc_url('https://www.facebook.com/'),
						'twitter'     => esc_url('https://twitter.com/'),
						'instagram'	=> esc_url('https://instagram.com/'),
						'tumblr'     => '',
						'pinterest'     => '',
						'linkedin'     => '',
						'behance'     => '',
						'dribbble'     => esc_url('https://dribbble.com/'),
						'youtube'     => '',
						'vimeo'     => '',
						'rss'     => '',
					),
                ),
            )
    ) );
    //Header Logo
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Header Logo', 'itsolve'),
        'id'        => 'itsolve_header_logo',
        'desc'      => esc_html__('Header Logo', 'itsolve'),
		'icon'		=> 'el el-circle-arrow-right',
        'subsection' => true,     
        'fields'    => array( 
                array(
                    'id'        => 'itsolve_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Default Logo', 'itsolve'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here.ex: - it is work in default menu.', 'itsolve'),
                ),
                array(
                    'id'        => 'itsolve_onepage_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('One Page Menu Logo', 'itsolve'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here. ex:- it is work in one page menu', 'itsolve'),
                ),
                array(
                    'id'        => 'itsolve_ts_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Transparent Menu Logo', 'itsolve'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here. ex: - it is work in transparent menu', 'itsolve'),
                ),
                array(
                    'id'        => 'itsolve_retina_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Retina Logo', 'itsolve'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here. ex: - it is work in Retina Logo', 'itsolve'),
                ),
                array(
                    'id'        => 'itsolve_mobile_top_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Mobile Logo', 'itsolve'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here. recommend size:- 1801x48px.', 'itsolve'),
                ),				
                array(
                    'id'        => 'itsolve_logo_height',
                    'type'      => 'text',
                    'title'     => esc_html__('Logo Height', 'itsolve'),
                    'mode'      => false,
                    'desc'      => esc_html__('Set height ex-100px', 'itsolve'),
                ),	
                array(
                    'id'        => 'itsolve_logo_widget',
                    'type'      => 'text',
                    'title'     => esc_html__('Logo Width', 'itsolve'),
                    'mode'      => false,
                    'desc'      => esc_html__('Set Width ex-100px', 'itsolve'),
                ),
                array(
                    'id'        => 'itsolve_line_height',
                    'type'      => 'text',
                    'title'     => esc_html__('Create logo spacing massing', 'itsolve'),
                    'mode'      => false,
                    'desc'      => esc_html__('Set number default-15px', 'itsolve'),
					'default'   =>'15px',
                ),
                array(
                    'id'       => 'itsolve_mobile_image_logo',
                    'type'     => 'text',
					'mode'      => false,
                    'title'    => esc_html__('Logo Text', 'itsolve'),
                    'desc' => esc_html__('Insert text ex: - "itsolve", Must be use "" for logo text ', 'itsolve'),
					'default'	=> esc_html__('"itsolve"', 'itsolve'),	
                ),
				array(								
                    'id'        => 'itsolve_mobilebg_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Mobile Menu BG Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'background-color' => '.mean-container .mean-bar,.mean-container .mean-nav',
					)
                ),
				array(								
                    'id'        => 'itsolve_mobileicon_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Mobile Menu Icon Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'background-color' => '.mean-container a.meanmenu-reveal span',
						'color' => '.mean-container a.meanmenu-reveal,.mean-container .mean-bar::before,.meanmenu-reveal.meanclose:hover'
					)
                ),					
				
            ),
    ) );

    //Header Menu
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Header Menu', 'itsolve'),
        'id'        => 'itsolve_menu',
		'icon'		=> 'el el-circle-arrow-right',
        'subsection'=> true,      
        'fields'    => array(
				
                array(
                    'id'        => 'itsolve_defaulth_menu_layout',
					'desc'      => esc_html__('Please set a menu for your all single page. But, For your home and others main page menu, Please goes to your page, there you can see header menu section. Please set a  menu style there', 'itsolve'),						
                    'type'      => 'select',
                    'title'     => esc_html__('Select Default Menu For All Single Page', 'itsolve'),
                    'customizer_only'   => false,
                    'options'   => array(
						'111' => esc_html__( 'Select Default Menu', 'itsolve' ),				
						'1' => esc_html__( '1 Header Menu With Stiky', 'itsolve' ),				
						'2' => esc_html__( '2 Header Transparent Without Top Menu ', 'itsolve' ),
						'3' => esc_html__( '3 Header Transparent With Top Menu', 'itsolve' ),						
                    ),
                    'default'   => '111'
                ),	
                array(
                    'id'       => 'itsolve_header_button',
                    'type'     => 'text',
                    'title'    => esc_html__('Button Text', 'itsolve'),
                    'desc' => esc_html__('Insert text', 'itsolve'),
					'default'	=> esc_html__('Get A Quote', 'itsolve'),					
                ),
                array(
                    'id'       => 'itsolve_header_button_url',
                    'type'     => 'text',
                    'title'    => esc_html__('Button URL', 'itsolve'),
                    'desc' => esc_html__('Insert url ex: - http://webitkurigram.com/', 'itsolve'),					
                ),
                array(								
                    'id'        => 'itsolve_Button_colorm',
                    'type'      => 'color',
                    'title'     => esc_html__('Menu Button & Search Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => 'a.dtbtn,.creative_header_button .dtbtn,.em-quearys-menu i,.top-form-control button.top-quearys-style'
					)
                ),
                array(								
                    'id'        => 'itsolve_Button_colorurl',
                    'type'      => 'color',
                    'title'     => esc_html__('Menu Button & Search BG Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'background-color' => 'a.dtbtn,.creative_header_button .dtbtn,.em-quearys-menu i',
					'border-color' => '.em-quearys-form'
					)
                ),
              array(								
                    'id'        => 'itsolve_Buttonht_colorm',
                    'type'      => 'color',
                    'title'     => esc_html__('Menu Hover Button Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => 'a.dtbtn:hover,.creative_header_button > a:hover'
					)
                ),
                array(								
                    'id'        => 'itsolve_Buttonhtb_colorurl',
                    'type'      => 'color',
                    'title'     => esc_html__('Menu Hover Button BG Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'background-color' => 'a.dtbtn:hover,.creative_header_button > a:hover'
					)
                ),							
                array(								
                    'id'        => 'itsolve_menu_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Main Menu Section BG Color', 'itsolve'),
                    'default'  => '',
                    'output'    => array('
						.itsolve_nav_area
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),	
		
				array(
					'id'          => 'itsolve_menu_typography',
					'type'        => 'typography', 
					'title'       => esc_html__('Main Menu Text style', 'itsolve'),
					'google'      => true, 
					'font-backup' => true,
					'output'      => array('
						.itsolve_menu > ul > li > a,
						.heading_style_2 .itsolve_menu > ul > li > a,
						.heading_style_3 .itsolve_menu > ul > li > a,
						.heading_style_4 .itsolve_menu > ul > li > a,
						.heading_style_3.tr_btn  .itsolve_menu > ul > li > a,
						.heading_style_3.tr_white_btn .itsolve_menu > ul > li > a,
						.heading_style_5 .itsolve_menu > ul > li > a
					'),
					'line-height'   => false,
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
					'default'     => array(
						'color'       => '', 
						'font-style'  => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '', 
						'line-height' => ''
					),
				),		
                array(								
                    'id'        => 'itsolve_menu_texts_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Main Menu Hover Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.itsolve_menu > ul > li:hover > a,.itsolve_menu > ul > li.current > a',
					'background-color' => '.itsolve_menu > ul > li > a::before,.itsolve_menu > ul > li.current:hover > a::before,.itsolve_menu > ul > li.current > a:before'
					)
                ),
                array(								
                    'id'        => 'itsolve_menu_bg_sticky_color',
                    'type'      => 'color_rgba',
                    'title'     => esc_html__('Main Menu Sticky BG Color', 'itsolve'),
					'default'   => array(
						'color'     => '#000000',
						'alpha'     => 1
					),
					'output'    => array(
					'background-color' => '
					.itsolve_nav_area.prefix,
					.hbg2
					'
					)
                ),														
                array(								
                    'id'        => 'itsolve_menu_sticky_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Main Menu Sticky Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.itsolve_nav_area.prefix .itsolve_menu > ul > li > a,.hbg2 .itsolve_menu > ul > li > a,
					.itsolve_nav_area.prefix .itsolve_menu > ul > li.current > a
					',
					'background-color' => '
					.itsolve_nav_area.prefix .itsolve_menu > ul > li > a::before,
					.hbg2 .itsolve_menu > ul > li > a::before
					
					'
					)
                ),	
                array(								
                    'id'        => 'itsolve_menu_text_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Main Menu Sticky Current Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.itsolve_nav_area.prefix .itsolve_menu > ul > li.current > a,
					.hbg2 .itsolve_menu > ul > li.current > a
					',
					'background-color' => '
						.itsolve_nav_area.prefix .itsolve_menu > ul > li.current > a::before					
					'
					)
                ),	
				
                array(								
                    'id'        => 'itsolve_submenu_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Sub Menu BG Color', 'itsolve'),
                    'default'  => '',
                    'output'    => array('
						.itsolve_menu ul .sub-menu
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),
			
				array(
					'id'          => 'itsolve_sub_menu_typography',
					'type'        => 'typography', 
					'title'       => esc_html__('Sub Menu Font style', 'itsolve'),
					'google'      => true, 
					'font-backup' => true,
					'output'      => array('
						.itsolve_menu ul .sub-menu li a
					'),
					'units'       =>'px',
					'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
					'default'     => array(
						'color'       => '', 
						'font-style'  => '', 
						'font-family' => '', 
						'google'      => true,
						'font-size'   => '', 
						'line-height' => ''
					),
				),
				
                array(								
                    'id'        => 'itsolve_submenu_hover_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Sub Menu Hover Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '
						.itsolve_menu ul .sub-menu li:hover > a,
						.itsolve_menu ul .sub-menu .sub-menu li:hover > a,
						.itsolve_menu ul .sub-menu .sub-menu .sub-menu li:hover > a,
						.itsolve_menu ul .sub-menu .sub-menu .sub-menu .sub-menu li:hover > a																'
					)
                ),				
				array(
					'id'             => 'menu_spacing',
					'type'           => 'spacing',
					'output'         => array('.itsolve_nav_area'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Section Padding Option', 'itsolve'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing or padding they want.', 'itsolve'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'itsolve'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),
					
            ),
    ) );

/*========================
END itsolve HEADER FIELD
=========================*/


/*========================
itsolve BREADCRUMB FIELD
=========================*/
    Redux::setSection( $opt_name, array(
         'title'     => esc_html__('Breadcrumb Area', 'itsolve'),
        'id'         => 'itsolve_bread_page',  
        'icon'       => 'el-icon-picture',
        'fields'    => array(
    array(
     'id'   => 'info_normal',
     'type' => 'info',
     'desc' => esc_html__('Notice:- If you want to more breadrucmb control. Please see every page bottom area. We Added More Field Here','itsolve')
    ),    
	array(
		'id'        => 'itsolve_breadcrumb_bg',
		'type'      => 'background',
		'output'    => array('.breadcumb-area,.breadcumb-blog-area'),
		'title'     => esc_html__('Breadcrumb Background', 'itsolve'),
		'subtitle'  => esc_html__('Breadcrumb background with image, color.', 'itsolve'),
		'default'  => array(
			'background-color' => '',
		)
	),
	array(        
		'id'        => 'itsolve_bread_title_page_color',
		'type'      => 'color',
		'title'     => esc_html__('Breadcrumb Title Color', 'itsolve'),
		'default'  => '',
		'output'    => array(
			'color' => '.brpt h2,.breadcumb-inner h2'
		)
    ),  
					
    array(
     'id'          => 'itsolve_breadcrumb_typography',
     'type'        => 'typography', 
     'title'       => esc_html__('Breadcrumb Text And Font style', 'itsolve'),
     'google'      => true, 
     'font-backup' => true,
     'line-height'   => false,
     'text-align'   => false,
     'output'      => array('
      .breadcumb-inner ul,     
      .breadcumb-inner li,
      .breadcumb-inner li a      
     '),
     'units'       =>'px',
     'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'itsolve'),
     'default'     => array(
		  'color'       => '', 
		  'font-style'  => '', 
		  'font-family' => '', 
		  'google'      => true,
		  'font-size'   => '', 
		 ),
	),
					
	array(        
		'id'        => 'itsolve_bread_current_page_color',
		'type'      => 'color',
		'title'     => esc_html__('Breadcrumb Current Text Color', 'itsolve'),
		'default'  => '',
		'output'    => array(
			'color' => '.breadcumb-inner li:nth-last-child(-n+1)'
		)
	),     
    array(
     'id'             => 'spacing',
     'type'           => 'spacing',
     'output'         => array('.breadcumb-area'),
     'mode'           => 'padding',
     'units'          => array('em', 'px'),
     'units_extended' => 'false',
     'title'          => esc_html__('Padding Option', 'itsolve'),
     'subtitle'       => esc_html__('Allow your users to choose the spacing or margin they want.', 'itsolve'),
     'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'itsolve'),
     'default'            => array(
      'padding-top'     => '', 
      'padding-right'   => '', 
      'padding-bottom'  => '', 
      'padding-left'    => '',
      'units'          => 'px', 
     )
    ),    
        
            ),
    ) );
/*========================
END itsolve BREADCRUMB FIELD
=========================*/


/*========================
itsolve circle FIELD
=========================*/
    Redux::setSection( $opt_name, array(
         'title'     => esc_html__('Default Color', 'itsolve'),
        'id'         => 'itsolve_tm_defaultpage',  
        'icon'       => 'el el-circle-arrow-right',
        'fields'    => array(
				array(
				 'id'   => 'thdfinfo_normal',
				 'type' => 'info',
				 'desc' => esc_html__('Notice:- we set our all color in our adns, But only carousel Arrow, contact button and scroll button color will be change by below option','itsolve')
				),  
				array(        
					'id'        => 'thdft',
					'type'      => 'color',
					'title'     => esc_html__('Text Color', 'itsolve'),
					'default'  => '',
					'output'    => array(
						'color' => '.curosel-style .owl-nav div,.slick-prev:before, .slick-next:before'
					)
				),
				array(        
					'id'        => 'thdftbt',
					'type'      => 'color',
					'title'     => esc_html__('BG Color', 'itsolve'),
					'default'  => '',
					'output'    => array(
						'background-color' => '.curosel-style .owl-nav div,.slick-prev, .slick-next,.em-slick-slider-new.em-image-sliderslick .slick-dots li button,.mc4wp-form-fields button',
						'border-color' => '.curosel-style .owl-nav div'
					)
				),   				
				array(        
					'id'        => 'thdefhbg',
					'type'      => 'color',
					'title'     => esc_html__('Hover BG Color', 'itsolve'),
					'default'  => '',
					'output'    => array(
						'background' => '.curosel-style .owl-nav .owl-prev:hover,.curosel-style .owl-nav .owl-next:hover,#scrollUp,.slick-prev:hover,.slick-prev:focus,.slick-next:hover,.slick-next:focus ,.em-slick-slider-new.em-image-sliderslick .slick-dots .slick-active button,.mc4wp-form-fields button:hover',
						'border-color' => '.curosel-style .owl-nav .owl-prev:hover,.curosel-style .owl-nav .owl-next:hover,#scrollUp,.slick-prev:hover,.slick-next:hover'
					)
				),
				array(        
					'id'        => 'tmdfht',
					'type'      => 'color',
					'title'     => esc_html__('Hover Text Color', 'itsolve'),
					'default'  => '',
					'output'    => array(
						'color' => '.curosel-style .owl-nav .owl-prev:hover,.curosel-style .owl-nav .owl-next:hover,#scrollUp i,.slick-prev:hover:before, .slick-next:hover:before'
					)
				),


				array(        
					'id'        => 'thdefhbgctc',
					'type'      => 'color',
					'title'     => esc_html__('Contact Button Text Color', 'itsolve'),
					'default'  => '',
					'output'    => array(
						'color' => '.home-2 .sbuton,.sbuton'
					)
				),
				array(        
					'id'        => 'thdefhbgcbtbgh',
					'type'      => 'color',
					'title'     => esc_html__('Contact Button BG Color', 'itsolve'),
					'default'  => '',
					'output'    => array(
						'background' => '.home-2 .sbuton,.sbuton',
						'border-color' => '.home-2 .sbuton,.sbuton'
					)
				),				array(        
					'id'        => 'thdefhbgcbth',
					'type'      => 'color',
					'title'     => esc_html__('Contact Button Hover BG Color', 'itsolve'),
					'default'  => '',
					'output'    => array(
						'background' => '.home-2 .sbuton:hover,.sbuton:hover',
						'border-color' => '.home-2 .sbuton:hover,.sbuton:hover'
					)
				),
				array(        
					'id'        => 'tmdfhtcbtnht',
					'type'      => 'color',
					'title'     => esc_html__('Contact Button Hover Text Color', 'itsolve'),
					'default'  => '',
					'output'    => array(
						'color' => '.home-2 .sbuton:hover,.sbuton:hover'
					)
				),
                array(								
                    'id'        => 'itsolve_menu_bg_videocolor',
                    'type'      => 'color_rgba',
                    'title'     => esc_html__('EM Video Widget Ovelrlay Color', 'itsolve'),
					'default'   => array(
						'color'     => '#000000',
						'alpha'     => .3
					),
					'output'    => array(
					'background-color' => '
					.single-video::before
					'
					)
                ),						
				
				

        ),
    ) );
/*========================
END itsolve circle FIELD
=========================*/

/*========================
itsolve BLOG FIELD
=========================*/
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Area', 'itsolve' ),
        'id'          => 'itsolve_blog_section_area',
		'icon'		=> 'el el-circle-arrow-right',
        'fields'     => array(
                array(
                    'id'        => 'itsolve_blog_bgcolor',
                    'type'      => 'background',
                    'output'    => array('.itsolve-single-blog'),
                    'title'     => esc_html__('Blog Item BG Color', 'itsolve'),
                    'subtitle'  => esc_html__('BG color', 'itsolve'),
                    'default'  => array(
                        'background-color' => '',
                    )
                ),

                array(								
                    'id'        => 'itsolve_blog_title_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Blog Title Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '
						.blog-content h1, .blog-content h2, .blog-content h3, .blog-content h4, .blog-content h5, .blog-content h6,					
						.single-blog-content h1, .single-blog-content h2, .single-blog-content h3, .single-blog-content h4, .single-blog-content h5, .single-blog-content h6,
						.blog-content h2 a,.blog-left-side .widget h2,.blog-page-title a,.itsolve-single-blog-title h2						
					')
                ),	
                array(								
                    'id'        => 'itsolve_blog_title_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Blog Title Hover Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.blog-content h2 a:hover,
					.blog-page-title h2 a:hover
					')
                ),
                array(								
                    'id'        => 'itsolve_blog_icon_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Blog Post Meta Icon Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.itsolve-blog-meta-left i
					')
                ),
                array(								
                    'id'        => 'itsolve_blog_text_meta_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Blog Post Meta Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '
					.itsolve-blog-meta.txp-meta .itsolve-blog-meta-left a, .itsolve-blog-meta.txp-meta .itsolve-blog-meta-left span,
					
					')
                ),
               				
                array(								
                    'id'        => 'itsolve_blog_btn_txt_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Blog btn Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.blog_readmore_btn
					
					
					')
                ),
				 array(								
                    'id'        => 'itsolve_blog_btn_border_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Blog btn Border Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'border-color' => '.blog_readmore_btn
					
					
					')
                ),
                array(								
                    'id'        => 'itsolve_blog_btnhover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Blog btn Hover Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.itsolve-single-blog:hover .blog_readmore_btn, .itsolve-blog-meta-left a, .itsolve-blog-meta-left span
					
					
					')
                ),				
				array(								
                    'id'        => 'itsolve_blog_btnhover_colorbg',
                    'type'      => 'color',
                    'title'     => esc_html__('Blog Btn Hover BG & Border Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'border-color' => '.itsolve-single-blog:hover .blog_readmore_btn',
					'background-color' => '.itsolve-single-blog:hover .blog_readmore_btn ,.itsolve-blog-meta-left',
					)
                ),

				
                array(
                    'id'        => 'itsolve_blog_widget_bgcolor',
                    'type'      => 'background',
                    'output'    => array('.blog-left-side.widget > div'),
                    'title'     => esc_html__('Blog Sidebar BG Color', 'itsolve'),
                    'subtitle'  => esc_html__('BG color', 'itsolve'),
                    'default'  => array(
                        'background-color' => '',
                    )
                ),
				 array(	
                    'id'        => 'itsolve_sidebar_widgett_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Sidebar Title Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'color' => '.blog-left-side .widget h2'
					)
                ),
                array(								
                    'id'        => 'itsolve_sidebar_widget_li_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Sidebar Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'color' => '
							.blog-left-side .widget ul li,
							.blog-left-side .widget ul li a,
							.blog-left-side .widget ul li::before,
							.tagcloud a,
							caption,
							table,
							 table td a,
							cite,
							.rssSummary,
							span.rss-date,
							span.comment-author-link,
							.textwidget p,
							.widget .screen-reader-text
						')
                ),	
                array(								
                    'id'        => 'itsolve_sidebar_widget_li_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Sidebar Text Hover Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'color' => '
							.blog-left-side .widget ul li a:hover,
							.blog-left-side .widget ul li:hover::before
						')
                ),					
                array(								
                    'id'        => 'itsolve_blog_social_icon_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Single Blog Social Icon & Title bar Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.itsolve-single-icon-inner a,.reply_date span.span_right,.itsolve_btn',
					'border-color' => '.itsolve-single-icon-inner a,.itsolve_btn',
					'background' => '.blog-left-side .widget h2::before,.commment_title h3::before,table#wp-calendar td#today,.footer-middle .widget h2::before',
					)
                ),
				array(								
                    'id'        => 'itsolve_blog_social_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Single Blog Social Icon Hover Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'background-color' => '.itsolve-single-icon-inner a:hover,.itsolve_btn:hover',
					'border-color' => '.itsolve-single-icon-inner a:hover,.itsolve_btn:hover',
					)
                ),
				
				array(								
                    'id'        => 'itsolve_blog_pagina_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Pagination Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.paginations a',
					'border-color' => '.paginations a',
					)
                ),				
				
				array(								
                    'id'        => 'itsolve_blog_pagina_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Pagination Hover Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'background-color' => '.paginations a:hover, .paginations a.current, .page-numbers span.current',
					'border-color' => '.paginations a:hover, .paginations a.current, .page-numbers span.current',
					)
                ),					
				array(
                    'id'        => 'itsolve_blog_socialsharesh_hide',
                    'type'      => 'switch',
                    'title'     => esc_html__('Blog Social share Show/Hide', 'itsolve'),
                    'default'   => true,
                ),												
            )
    ) );		
/*========================
END itsolve BLOG FIELD
=========================*/
	 
/*========================
itsolve 404 FIELD
=========================*/	 
    Redux::setSection( $opt_name, array(
         'title'     => esc_html__('404 Area', 'itsolve'),
        'id'         => 'itsolve_error_page',  
        'desc'       => esc_html__('Use this section to upload background images, select background color', 'itsolve'),
        'icon'       => 'el-icon-picture',
        'fields'    => array(
                array(
                    'id'        => 'itsolve_background_404',
                    'type'      => 'background',
                    'output'    => array('.not-found-area'),
                    'title'     => esc_html__('404 Page Background Color', 'itsolve'),
                    'subtitle'  => esc_html__('404 background with image, color.', 'itsolve'),
                    'default'  => array(
                        'background-color' => '',
                    )
                ),
                array(								
                    'id'        => 'itsolve_not_title',
                    'type'      => 'color',
                    'title'     => esc_html__('Title Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.not-found-inner h2,.not-found-inner'
					)
                ),	
                array(								
                    'id'        => 'itsolve_sub_not_title',
                    'type'      => 'color',
                    'title'     => esc_html__('Sub Title Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.not-found-inner p,.not-found-inner strong'
					)
                ),
                array(								
                    'id'        => 'itsolve_not_link_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Return Link Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.not-found-inner a'
					)
                ),					
                array(
                    'id'        => '404_info',
                    'type'      => 'editor',
                    'title'     => esc_html__('404 Information', 'itsolve'),
                    'subtitle'  => esc_html__('HTML tags allowed: a, br, em, strong', 'itsolve'),
                    'default'   => esc_html__('404 Oops! The page you are Looking for does not exist. ', 'itsolve'),
                ), 
				array(
					'id'             => 'itsolve_notfound_spacing',
					'type'           => 'spacing',
					'output'         => array('.not-found-area'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Section Padding Option', 'itsolve'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing or padding they want.', 'itsolve'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'itsolve'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),

				
            ),
    ) );

/*========================
itsolve FOOTER FIELD
=========================*/	 
	
    //Footer area
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Footer Area', 'itsolve'),
        'id'        => 'footer_area_id',
        'desc'      => esc_html__('Customize Your Footer', 'itsolve'),
        'icon'      => 'el-icon-cog',
        'fields'    => array(      
                 
				 array(
                    'id'       => 'itsolve_address_hide',
                    'type'     => 'switch',
                    'title'    => esc_html__('Footer Address Section Show/Hide', 'itsolve'),
                    'default'  => false,
                ),
				 array(
                    'id'       => 'itsolve_widget_hide',
                    'type'     => 'switch',
                    'title'    => esc_html__('Widget Section Hide/show', 'itsolve'),
                    'default'  => false,
                ),				
				array(
                    'id'       => 'itsolve_copyright_hide',
                    'type'     => 'switch',
                    'title'    => esc_html__('Copyright Section Show/Hide', 'itsolve'),
                    'default'  => true,
                ),
				array(
                    'id'       => 'itsolve_social_hide',
                    'type'     => 'switch',
                    'title'    => esc_html__('Social Section Show/Hide', 'itsolve'),
                    'default'  => false,
                ),

                array(
                    'id'        => 'itsolve_footer_box_layout',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Footer layout', 'itsolve'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'footer_box' => esc_html__('Box Layout','itsolve'),
                        'footer_full' => esc_html__('Full Layout','itsolve'),
                    ),
                    'default'   => 'footer_box'
                ),							
								
            )
    ) );
//footer Address Section 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Address Section', 'itsolve' ),
        'id'          => 'itsolve_address_section',
        'subsection' => true,
		'icon'		=> 'el el-circle-arrow-right',
        'fields'     => array(
		
                array(
                    'id'        => 'itsolve_address_logo_style',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Logo Style', 'itsolve'),
                    'customizer_only'   => false,
                    'options'   => array(
                        's_logo_s1' => esc_html__('Show Text Logo','itsolve'),
                        's_logo_s2' => esc_html__('Show Image Logo','itsolve'),
                    ),
                    'default'   => 's_logo_s1'
                ),				
						
                array(
                    'id'        => 'itsolve_address_title_text',
                    'type'      => 'text',
                    'title'     => esc_html__('Address Title Text Logo', 'itsolve'),
                    'default'   => esc_html__('itsolve', 'itsolve'),
                    'desc'      => esc_html__('Please set this way for different color. ex-  T<span>H</span>E<span>M</span>E<span>X</span>P', 'itsolve'),				
                ),
                array(
                    'id'        => 'itsolve_address_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Address Image Logo', 'itsolve'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here. recommend size:- 220x50px. Notice:- If you upload this logo, Title text logo will be hide ', 'itsolve'),
                ),	
				array(
                    'id'       => 'itsolve_address_title',
                    'type'     => 'text',
                    'title'    => esc_html__('Address Title', 'itsolve'),
                    'desc' => esc_html__('insert area name ex:- Our Address', 'itsolve'),
					'default'	=> esc_html__('Company Address', 'itsolve'),
                ),					
                array(
                    'id'       => 'itsolve_address_road',
                    'type'     => 'text',
                    'title'    => esc_html__('Type Your Address Here', 'itsolve'),
                    'desc' => esc_html__('insert area name ex:- house, road-4.', 'itsolve'),
					'default'	=> esc_html__('1st Floor New World Tower Rang.', 'itsolve'),
                ),	
				array(
                    'id'       => 'itsolve_email_title',
                    'type'     => 'text',
                    'title'    => esc_html__('Email Title', 'itsolve'),
                    'desc' => esc_html__('insert area name ex:- Email Address', 'itsolve'),
					'default'	=> esc_html__('Email Address', 'itsolve'),
                ),	
                array(
                    'id'       => 'itsolve_address_email',
                    'type'     => 'text',
                    'title'    => esc_html__('Email Number', 'itsolve'),
                    'desc' => esc_html__('Insert email number', 'itsolve'),
					'default'	=> esc_html__('demo@example.com', 'itsolve'),					
                ),	
				array(
                    'id'       => 'itsolve_address_telephone_title',
                    'type'     => 'text',
                    'title'    => esc_html__('Telephone Title', 'itsolve'),
                    'desc' => esc_html__('insert area name ex:- Telephone Number', 'itsolve'),
					'default'	=> esc_html__('Telephone Number', 'itsolve'),
                ),					
                array(
                    'id'       => 'itsolve_address_mobile',
                    'type'     => 'text',
                    'title'    => esc_html__('Phone Number', 'itsolve'),
                    'desc' => esc_html__('Insert phone number', 'itsolve'),
					'default'	=> esc_html__('+848 556 778 345', 'itsolve'),					
                ),			
                array(								
                    'id'        => 'itsolve_address_title_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Address Title Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-top-address h2'
					)
                ),
                array(								
                    'id'        => 'itsolve_address_title2_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Address Title Text Color 2', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-top-address h2 span'
					)
                ),				
                array(								
                    'id'        => 'itsolve_address_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Address Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.top_address_content a,.top_address_content span'
					)
                ),				
                array(								
                    'id'        => 'itsolve_address_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Address Section BG Color', 'itsolve'),
                    'default'  => '',
                    'output'    => array('
						.top-address-area
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),							
				array(
					'id'             => 'itsolve_address_section_spacing',
					'type'           => 'spacing',
					'output'         => array('.top-address-area'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Padding Option', 'itsolve'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing padding they want.', 'itsolve'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'itsolve'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),						
            )
    ) );
    //footer social section
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( ' Footer Social Section', 'itsolve' ),
        'id'         => 'itsolve_footer_social_section',
		'icon'		=> 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'     => array(
                array(
                    'id'        => 'itsolve_social_logo_style',
                    'type'      => 'select',
                    'title'     => esc_html__('Select Logo Style', 'itsolve'),
                    'customizer_only'   => false,
                    'options'   => array(
                        's_logo_s1' => esc_html__('Show Text Logo','itsolve'),
                        's_logo_s2' => esc_html__('Show Image Logo','itsolve'),
                    ),
                    'default'   => 's_logo_s1'
                ),				
						
                array(
                    'id'        => 'itsolve_social_title_text',
                    'type'      => 'text',
                    'title'     => esc_html__('Social Title Text Logo', 'itsolve'),
                    'default'   => esc_html__('itsolve', 'itsolve'),
                    'desc'      => esc_html__('Please set this way for different color. ex-  T<span>H</span>E<span>M</span>E<span>X</span>P', 'itsolve'),
                ),
                array(
                    'id'        => 'itsolve_social_logo',
                    'type'      => 'media',
                    'title'     => esc_html__('Social Image Logo', 'itsolve'),
                    'compiler'  => 'true',
                    'mode'      => false,
                    'desc'      => esc_html__('Upload logo here. recommend size:- 220x50px. Notice:- If you upload this logo, Title text logo will be hide ', 'itsolve'),
                ),				
                array(
                    'id'        => 'itsolve_social_text',
                    'type'      => 'editor',
                    'title'     => esc_html__('Social information', 'itsolve'),
                    'default'	=> esc_html__('Lorem ipsum dolor sit amet, consectetur ahkl adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud' , 'itsolve'),
                    'args'      => array(
                        'teeny'            => true,
                        'textarea_rows'    => 5,
                        'media_buttons' => false,
                    )
                ),		
                array(								
                    'id'        => 'itsolve_social_title_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Title Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'color' => '.footer-top-inner h2'
					)
                ),
                array(								
                    'id'        => 'itsolve_social_title2_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Title Text Color 2', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'color' => '.footer-top-inner h2 span'
					)
                ),				
                array(								
                    'id'        => 'itsolve_social_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social section Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-top-inner p'
					)
                ),
                array(								
                    'id'        => 'itsolve_social_icon_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-social-icon a i,.footer-social-icon.htop-menu-s a i,.em_slider_social a',
					)
                ),
                array(								
                    'id'        => 'itsolve_social_icon_bgcolor',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon BG Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'border-color' => '.footer-social-icon a i,.footer-social-icon.htop-menu-s a i,.em_slider_social a',
					'background-color' => '.footer-social-icon a i,.footer-social-icon.htop-menu-s a i,.em_slider_social a',
					)
                ),
                array(								
                    'id'        => 'itsolve_social_icon_thbgcolor',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon hover Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.footer-social-icon a i:hover,.footer-social-icon.htop-menu-s a i:hover,.em_slider_social a:hover',
					)
                ),					
                array(								
                    'id'        => 'itsolve_social_icon_hbgcolor',
                    'type'      => 'color',
                    'title'     => esc_html__('Social Icon hover BG Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'border-color' => '.footer-social-icon a i:hover,.footer-social-icon.htop-menu-s a i:hover,.em_slider_social a:hover,.em_slider_social a:hover',
					'background-color' => '.footer-social-icon a i:hover,.footer-social-icon.htop-menu-s a i:hover,.em_slider_social a:hover,.em_slider_social a:hover',
					)
                ),					
                array(								
                    'id'        => 'itsolve_social_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Social Section BG Color', 'itsolve'),
                    'default'  => '',
                    'output'    => array('
						.footer-top
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),							
				array(
					'id'             => 'itsolve_social_section_spacing',
					'type'           => 'spacing',
					'output'         => array('.footer-top'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Padding Option', 'itsolve'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing padding they want.', 'itsolve'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'itsolve'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),					
				
            )
    ) );
	// footer widget area 
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Widget Section', 'itsolve' ),
        'id'          => 'itsolve_widget_section',
        'subsection' => true,
		'icon'		=> 'el el-circle-arrow-right',
        'fields'     => array(
                array(
                    'id'        => 'itsolve_widget_column_count',
                    'type'      => 'select',
                    'title'     => esc_html__('Widget Column Count', 'itsolve'),
                    'customizer_only'   => false,
                    'options'   => array(
                        '1' => esc_html__('Column 1','itsolve'),
                        '2' => esc_html__('Column 2','itsolve'),
                        '3' => esc_html__('Column 3','itsolve'),
                        '4' => esc_html__('Column 4','itsolve'),
                        '6' => esc_html__('Column 6','itsolve'),
                    ),
                    'default'   =>'4'
                ),		
				 array(	
                    'id'        => 'itsolve_widgett_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Widget Title Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'color' => '.footer-middle .widget h2'
					)
                ),
                array(								
                    'id'        => 'itsolve_copyright_widget_li_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Widget Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'color' => '
							.footer-middle .widget ul li,
							.footer-middle .widget ul li a,
							.footer-middle .widget ul li::before,
							.footer-middle .tagcloud a,
							.footer-middle caption,
							.footer-middle table,
							.footer-middle table td a,
							.footer-middle cite,
							.footer-middle .rssSummary,
							.footer-middle span.rss-date,
							.footer-middle span.comment-author-link,
							.footer-middle .textwidget p,
							.footer-middle .widget .screen-reader-text,
							mc4wp-form-fields p,
							.mc4wp-form-fields,
							.footer-m-address p,
							.footer-m-address,
							.footer-widget.address,
							.footer-widget.address p,
							.mc4wp-form-fields p
						')
                ),			
                array(								
                    'id'        => 'itsolve_copyright_widget_li_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Widget Text Hover Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
						'color' => '
							.footer-middle .widget ul li a:hover,
							.footer-middle .widget ul li:hover::before,
							.footer-middle .sub-menu li a:hover, 
							.footer-middle .nav .children li a:hover,
							.footer-middle .recent-post-text > h4 a:hover,
							.footer-middle .tagcloud a:hover,
							#today
						')
                ),		
                array(								
                    'id'        => 'itsolve_widget_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Widget Section BG Color', 'itsolve'),
                    'default'  => '',
                    'output'    => array('
									.footer-middle
								'),
					'default'  => array(
						'background-color' => '',
					)					
                ),	
				array(
					'id'             => 'itsolve_widget_section_spacing',
					'type'           => 'spacing',
					'output'         => array('.footer-middle'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Padding Option', 'itsolve'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing padding they want.', 'itsolve'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'itsolve'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),
				
            )
    ) );	
    //footer copyright text
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__('Footer Copyright Info', 'itsolve'),
        'id'        => 'itsolve_copyright',
        'desc'      => esc_html__('Insert your copyright style', 'itsolve'),
		'icon'		=> 'el el-circle-arrow-right',
        'subsection' => true,
        'fields'    => array(
                array(
                    'id'        => 'itsolve_footer_copyright_style',
                    'type'      => 'select',
                    'title'     => esc_html__('Copyright Style Layout', 'itsolve'),
                    'customizer_only'   => false,
                    'options'   => array(
                        'copy_s1' => esc_html__('Copyright Text Style','itsolve'),
                        'copy_s2' => esc_html__('Copyright Text and Right Menu','itsolve'),
                        'copy_s3' => esc_html__('Copyright Text and Left Menu','itsolve'),
                        'copy_s4' => esc_html__('Copyright Text and Social Icon','itsolve'),
                    ),
                    'default'   => 'copy_s2'
                ),		
                array(
                    'id'        => 'itsolve_copyright_text',
                    'type'      => 'editor',
                    'title'     => esc_html__('Copyright information', 'itsolve'),
                    'subtitle'  => esc_html__('HTML tags allowed: a, br, em, strong', 'itsolve'),
                    'default'	=> esc_html__('Copyright &copy; itsolve all rights reserved.', 'itsolve'),
                    'args'      => array(
                        'teeny'            => true,
                        'textarea_rows'    => 5,
                        'media_buttons' => false,
                    )
                ),
                array(								
                    'id'        => 'itsolve_copyright_text_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Copyright Text Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.copy-right-text p,.footer-menu ul li a'
					)
                ),
                array(								
                    'id'        => 'itsolve_copyright_text_hover_color',
                    'type'      => 'color',
                    'title'     => esc_html__('Copyright Text Hover Color', 'itsolve'),
                    'default'  => '',
					'output'    => array(
					'color' => '.copy-right-text a, .footer-menu ul li a:hover'
					)
                ),				
                array(								
                    'id'        => 'itsolve_copyright_bg_color',
                    'type'      => 'background',
                    'title'     => esc_html__('Copyright Section BG Color', 'itsolve'),
                    'default'  => '',
                    'output'    => array('
					.footer-bottom
					'),
					'default'  => array(
						'background-color' => '',
					)					
                ),						
				array(
					'id'             => 'itsolve_copyright_section_spacing',
					'type'           => 'spacing',
					'output'         => array('.footer-bottom'),
					'mode'           => 'padding',
					'units'          => array('em', 'px'),
					'units_extended' => 'false',
					'title'          => esc_html__('Padding Option', 'itsolve'),
					'subtitle'       => esc_html__('Allow your users to choose the spacing padding they want.', 'itsolve'),
					'desc'           => esc_html__('You can enable or disable any piece of this field. Top, Right, Bottom, Left, or Units.', 'itsolve'),
					'default'            => array(
						'padding-top'     => '', 
						'padding-right'   => '', 
						'padding-bottom'  => '', 
						'padding-left'    => '',
						'units'          => 'px', 
					)
				),				
            ),
    ) );
			
/* ========================
END itsolve FOOTER FIELD
=========================*/	
    Redux::setSection( $opt_name, array(
        'icon'            => 'el el-list-alt',
        'title'           => esc_html__( 'Customizer Only', 'itsolve' ),
        'desc'            => esc_html__( 'This Section should be visible only in Customizer', 'itsolve' ),
        'customizer_only' => true,
        'fields'          => array(
            array(
                'id'              => 'opt-customizer-only',
                'type'            => 'select',
                'title'           => esc_html__( 'Customizer Only Option', 'itsolve' ),
                'subtitle'        => esc_html__( 'The subtitle is NOT visible in customizer', 'itsolve' ),
                'desc'            => esc_html__( 'The field desc is NOT visible in customizer.', 'itsolve' ),
                'customizer_only' => true,
                //Must provide key => value pairs for select options
                'options'         => array(
                    '1' => esc_html__('Opt 1','itsolve'),
                    '2' => esc_html__('Opt 2','itsolve'),
                    '3' => esc_html__('Opt 3','itsolve')
                ),
                'default'         => '2'
            ),
        )
    ) );   	 	 
    /*
     * <--- END SECTIONS
     */

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
    
    if ( ! function_exists( 'itsolve_remove_demo' ) ) {
        function itsolve_remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
 */