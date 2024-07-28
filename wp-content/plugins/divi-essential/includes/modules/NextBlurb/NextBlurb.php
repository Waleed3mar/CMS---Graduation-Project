<?php
include_once(DIVI_ESSENTIAL_PATH . '/includes/modules/base/Common.php');

class Next_Blurb extends ET_Builder_Module {

	public $slug       = 'dnxte_blurb';
	public $vb_support = 'on';
	public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-next-blurb/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name        = esc_html__( 'Next Blurb', 'dnxte-divi-essential' );
		$this->icon_path   = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->folder_name = 'et_pb_divi_essential';

		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'		=>	array(
					'dnxt_blurb_heading'			=> esc_html__( 'Text', 'dnxte-divi-essential' ),
					'dnxt_blurb_image_icon'		 	=> esc_html__( 'Image & Icon', 'dnxte-divi-essential' ),
					'dnxt_blurb_button_text'	  	=> esc_html__( 'Button', 'dnxte-divi-essential' ),
					'dnxt_blurb_heading_background'	=> array(
						'title'		=>	esc_html__( 'Background Heading', 'dnxte-divi-essential' ),
						'priority'	=>	78,
						'sub_toggles'       => array(
                            'sub_toggle_color'   => array(
								'name' => esc_html__( 'Color', 'dnxte-divi-essential' )
                            ),
                            'sub_toggle_gradient'   => array(
								'name' => esc_html__( 'Gradient', 'dnxte-divi-essential' )
                            )
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_content_background'	=> array(
						'title'		=>	esc_html__( 'Background Description', 'dnxte-divi-essential' ),
						'priority'	=>	78,
						'sub_toggles'       => array(
                            'sub_toggle_color'   => array(
								'name' => esc_html__( 'Color', 'dnxte-divi-essential' )
                            ),
                            'sub_toggle_gradient'   => array(
								'name' => esc_html__( 'Gradient', 'dnxte-divi-essential' )
                            )
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_background_image_icon'	=> array(
						'title'		=>	esc_html__( 'Background Image & Icon', 'dnxte-divi-essential' ),
						'priority'	=>	78,
						'sub_toggles'       => array(
                            'sub_toggle_image'   => array(
								'name' => esc_html__( 'Image', 'dnxte-divi-essential' )
                            ),
                            'sub_toggle_icon'   => array(
								'name' => esc_html__( 'Icon', 'dnxte-divi-essential' )
                            )
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_image_background'	=> array(
						'title'		=>	esc_html__( 'Background Image', 'dnxte-divi-essential' ),
						'priority'	=>	79,
						'sub_toggles'       => array(
                            'sub_toggle_color'   => array(
								'name' => esc_html__( 'Color', 'dnxte-divi-essential' )
                            ),
                            'sub_toggle_gradient'   => array(
								'name' => esc_html__( 'Gradient', 'dnxte-divi-essential' )
                            )
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_icon_background'	=> array(
						'title'		=>	esc_html__( 'Background Icon', 'dnxte-divi-essential' ),
						'priority'	=>	79,
						'sub_toggles'       => array(
                            'sub_toggle_color'   => array(
								'name' => esc_html__( 'Color', 'dnxte-divi-essential' )
                            ),
                            'sub_toggle_gradient'   => array(
								'name' => esc_html__( 'Gradient', 'dnxte-divi-essential' )
                            )
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_button_background'	=> array(
						'title'		=>	esc_html__( 'Background Button', 'dnxte-divi-essential' ),
						'priority'	=>	79,
						'sub_toggles'       => array(
                            'sub_toggle_color'   => array(
								'name' => esc_html__( 'Color', 'dnxte-divi-essential' )
                            ),
                            'sub_toggle_gradient'   => array(
								'name' => esc_html__( 'Gradient', 'dnxte-divi-essential' )
                            )
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_image_mask' => esc_html__('Image Mask', 'dnxte-divi-essential')
				),
			),
			'advanced'	=> array(
				'toggles'	=>	array(					
					'dnxt_blurb_image_design'	=> esc_html__( 'Image', 'dnxte-divi-essential' ),
					'dnxt_blurb_icon_design'	=> esc_html__( 'Icon', 'dnxte-divi-essential' ),
					'dnxt_blurb_hover_effect'	=> array(
						"title"		=>	esc_html__( 'Hover Effect', 'dnxte-divi-essential' ),
						'sub_toggles'       => array(
                            'sub_toggle_2d_effect'   => array(
                                'name' => esc_html__( '2d Effect', 'dnxte-divi-essential' ),
							),
							'sub_toggle_tilt_effect'   => array(
                                'name' => esc_html__( "Tilt Effect", 'dnxte-divi-essential' ),
							),
						),
						'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_title_design'	=> array(
						"title"		=>	esc_html__( 'Title Text', 'dnxte-divi-essential' ),
						'sub_toggles'       => array(
                            'sub_toggle_pre'   => array(
                                'name' => esc_html__( "Pre", 'dnxte-divi-essential' )
                            ),
                            'sub_toggle_heading'   => array(
                                'name' => esc_html__( "Heading", 'dnxte-divi-essential' ),
                            ),
                            'sub_toggle_post' => array(
                                'name' => esc_html__( 'Post', 'dnxte-divi-essential' ),
							),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_image_icon_space'	=> array(
						"title"		=>	esc_html__( 'Image/Icon Spacing', 'dnxte-divi-essential' ),
						'priority'	=>	91,
						'sub_toggles'       => array(
                            'sub_toggle_image_space'   => array(
                                'name' => esc_html__( 'Image', 'dnxte-divi-essential' ),
                            ),
                            'sub_toggle_icon_space'   => array(
                                'name' => esc_html__( 'Icon', 'dnxte-divi-essential' ),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_header_space'	=> array(
						"title"		=>	esc_html__( 'Header Spacing', 'dnxte-divi-essential' ),
						'priority'	=>	92,
						'sub_toggles'       => array(
                            'sub_toggle_pre_space'   => array(
                                'name' => esc_html__( 'Pre', 'dnxte-divi-essential' ),
                            ),
                            'sub_toggle_header_space'   => array(
                                'name' => esc_html__( 'Header', 'dnxte-divi-essential' ),
                            ),
                            'sub_toggle_post_space'   => array(
                                'name' => esc_html__( 'Post', 'dnxte-divi-essential' ),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_body_content_space'	=> array(
						"title"		=>	esc_html__( 'Body/Description Spacing', 'dnxte-divi-essential' ),
						'priority'	=>	93,
						'sub_toggles'       => array(
                            'sub_toggle_body_space'   => array(
                                'name' => esc_html__( 'Body', 'dnxte-divi-essential' ),
                            ),
                            'sub_toggle_content_space'   => array(
                                'name' => esc_html__( 'Content', 'dnxte-divi-essential' ),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
					), 
					'dnxt_blurb_button_space'	=> array(
						"title"		=>	esc_html__( 'Button Spacing', 'dnxte-divi-essential' ),
						'priority'	=>	94,
					),
					'dnxt_blurb_post_border'	=> array(
						"title"		=>	esc_html__( 'Post Heading Border', 'dnxte-divi-essential' ),
						'priority'	=>	100,
					), 
					'dnxt_blurb_header_border'	=> array(
						"title"		=>	esc_html__( 'Heading Border', 'dnxte-divi-essential' ),
						'priority'	=>	100,
					), 
					'dnxt_blurb_pre_border'	=> array(
						"title"		=>	esc_html__( 'Pre Heading Border', 'dnxte-divi-essential' ),
						'priority'	=>	100,
					),
					'dnxt_blurb_body_border'	=> array(
						"title"		=>	esc_html__( 'Body Border', 'dnxte-divi-essential' ),
						'priority'	=>	100,
					), 
					'dnxt_blurb_content_border'	=> array(
						"title"		=>	esc_html__( 'Description Border', 'dnxte-divi-essential' ),
						'priority'	=>	100,
					), 
					'dnxt_blurb_button_border'	=> array(
						"title"		=>	esc_html__( 'Button Border', 'dnxte-divi-essential' ),
						'priority'	=>	100,
					),
					'dnxt_blurb_button_font'	=> array(
						"title"		=>	esc_html__( 'Button Text', 'dnxte-divi-essential' ),
						'priority'	=>	60,
					),
					'dnxt_blurb_button_icon'	=> array(
						"title"		=>	esc_html__( 'Button Icon', 'dnxte-divi-essential' ),
						'priority'	=>	61,
					),
					'button_hover'      => array(
                        'title'             => esc_html__( 'Button Hover', 'dnxte-divi-essential' ),
                        'priority'          => 62,
                        'sub_toggles'       => array(
                            'sub_toggle_2d'   => array(
                                'name' => esc_html__( '2D', 'dnxte-divi-essential' ),
                            ),
                            'sub_toggle_bg'   => array(
                                'name' => esc_html__( 'BG', 'dnxte-divi-essential' ),
                            ),
                            'sub_toggle_border' => array(
                                'name' => esc_html__( 'Stroke', 'dnxte-divi-essential' ),
							),
							'sub_toggle_icons' => array(
                                'name' => esc_html__( 'Icon', 'dnxte-divi-essential' ),
                            ),
                        ),

                        'tabbed_subtoggles' => true,
					),
					'dnxt_blurb_button_box_shadow'	=> array(
						"title"		=>	esc_html__( 'Button Box Shadow', 'dnxte-divi-essential' ),
						'priority'	=>	102,
					),
					'dnxt_blurb_description_box_shadow'	=> array(
						"title"		=>	esc_html__( 'Body Box Shadow', 'dnxte-divi-essential' ),
						'priority'	=>	102,
					),
				), 
			),			
			'custom_css' => array(
				'toggles' => array(
					'dnxt_blurb_attributes' => array(
						'title'    => esc_html__( 'Attributes', 'dnxte-divi-essential' ),
						'priority' => 95,
					),
					'dnxt_blurb_zindex' => array(
						'title'    => esc_html__( 'Zindex', 'dnxte-divi-essential' ),
						'priority' => 100,
					),
				),
			),
		);

		// Custom CSS Field
		$this->custom_css_fields = array(
			'image_wrapper' => array(
				'label'    => esc_html__( 'Image', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnxt-blurb-image .img-fluid',
			),
			'icon_wrapper'  => array(
				'label'    => esc_html__( 'Icon', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnxt-blurb-icon span',
			),
			'pre_heading_wrapper'  => array(
				'label'    => esc_html__( 'Pre Heading', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnxt-blurb-pre-heading',
			),
			'heading_wrapper'  => array(
				'label'    => esc_html__( 'Heading', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnxt-blurb-heading',
			),
			'post_heading_wrapper'  => array(
				'label'    => esc_html__( 'Post Heading', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnxt-blurb-post-heading',
			),
			'body_wrapper'  => array(
				'label'    => esc_html__( 'Description', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnxt-blurb-container',
			),
			'button_wrapper'  => array(
				'label'    => esc_html__( 'Button', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnxt-button-wrapper .dnxt-blurb-btn',
			),
		);
	}

	public function get_fields() {
		return array(
			// Pre Heading Switch
			'blurb_pre_switch'	  => array(
				'label'           => esc_html__( 'Pre Heading Enable', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'dnxt_blurb_heading',
				'options'   => array(
					'off'     => esc_html__( 'Off', 'dnxte-divi-essential' ),
					'on'      => esc_html__( 'On', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'blurb_pre_heading',
					'pre_heading_tag'
				),
				'default_on_front'=> 'off',
			),
			// Pre Heading Text Field
			'blurb_pre_heading'   => array(
				'label'           => esc_html__( 'Pre Heading Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				//'default'         => 'Pre Heading',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Pre Heading Text entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'dnxt_blurb_heading',
				'depends_show_if' => 'on',
			),
			// Pre Heading Tag
			'pre_heading_tag'     => array(
                'label'           => esc_html__( 'Select Pre Heading Tag', 'dnxte-divi-essential' ),
                'type'            => 'select',
                'description'     => esc_html__( 'Select the Pre heading tag, which you would like to use', 'dnxte-divi-essential' ),
                'option_category' => 'basic_option',
                'toggle_slug'     => 'dnxt_blurb_heading',
                'options'         => array(
                    'h1'	  => esc_html__( 'H1', 'dnxte-divi-essential' ),
                    'h2'	  => esc_html__( 'H2', 'dnxte-divi-essential' ),
                    'h3'	  => esc_html__( 'H3', 'dnxte-divi-essential' ),
                    'h4'	  => esc_html__( 'H4', 'dnxte-divi-essential' ),
                    'h5'	  => esc_html__( 'H5', 'dnxte-divi-essential' ),
                    'h6'	  => esc_html__( 'H6', 'dnxte-divi-essential' ),
                    'p'	      => esc_html__( 'P', 'dnxte-divi-essential' ),
                    'span'	  => esc_html__( 'Span', 'dnxte-divi-essential' ),
                ),
				'default'         => 'span',
				'depends_show_if' => 'on',
			),
			// Main Heading Text Field
			'blurb_heading'      	=> array(
				'label'           	=> esc_html__( 'Heading Text', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'dynamic_content' 	=> 'text',
				//'default'         	=> 'Heading',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Main Heading entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'dnxt_blurb_heading',
			),
			//Heading Tag
			'heading_tag'         => array(
				'label'           => esc_html__( 'Select Heading Tag', 'dnxte-divi-essential' ),
				'type'            => 'select',
				'description'     => esc_html__( 'Select the heading tag, which you would like to use', 'dnxte-divi-essential' ),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_heading',
				'options'         => array(
					'h1'	  => esc_html__( 'H1', 'dnxte-divi-essential' ),
					'h2'	  => esc_html__( 'H2', 'dnxte-divi-essential' ),
					'h3'	  => esc_html__( 'H3', 'dnxte-divi-essential' ),
					'h4'	  => esc_html__( 'H4', 'dnxte-divi-essential' ),
					'h5'	  => esc_html__( 'H5', 'dnxte-divi-essential' ),
					'h6'	  => esc_html__( 'H6', 'dnxte-divi-essential' ),
					'p'	      => esc_html__( 'P', 'dnxte-divi-essential' ),
					'span'	  => esc_html__( 'Span', 'dnxte-divi-essential' ),
				),
				'default'         => 'h2',
			),
			// Post Heading Switch
			'blurb_post_switch'		=> array(
				'label'           	=> esc_html__( 'Post Heading Enable', 'dnxte-divi-essential' ),
				'type'            	=> 'yes_no_button',  
				'toggle_slug'     	=> 'dnxt_blurb_heading',
				'options'         	=> array(
					'off'     		=> esc_html__('Off', 'dnxte-divi-essential'),
					'on'      		=> esc_html__('On', 'dnxte-divi-essential'),
				),
				'affects'         	=> array(
					'blurb_post_heading',
					'post_heading_tag'
				),
				'default_on_front' => 'off',
			),
			// Post Heading Text Field
			'blurb_post_heading'  => array(
				'label'           => esc_html__( 'Post Heading Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				//'default'         => 'Post Heading',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Post Heading Text entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'dnxt_blurb_heading',
				'depends_show_if' => 'on',
			),
			//Post Heading Tag
			'post_heading_tag'    => array(
				'label'           => esc_html__('Select Post Heading Tag', 'dnxte-divi-essential'),
				'type'            => 'select',
				'description'     => esc_html__('Select the Post heading tag, which you would like to use', 'dnxte-divi-essential'),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_heading',
				'options'         => array(
					'h1'	  	  => esc_html__('H1', 'dnxte-divi-essential'),
					'h2'	  	  => esc_html__('H2', 'dnxte-divi-essential'),
					'h3'	  	  => esc_html__('H3', 'dnxte-divi-essential'),
					'h4'	  	  => esc_html__('H4', 'dnxte-divi-essential'),
					'h5'	  	  => esc_html__('H5', 'dnxte-divi-essential'),
					'h6'	  	  => esc_html__('H6', 'dnxte-divi-essential'),
					'p'	      	  => esc_html__('P', 'dnxte-divi-essential'),
					'span'	  	  => esc_html__('Span', 'dnxte-divi-essential'),
				),
				'default'         => 'span',
				'depends_show_if' => 'on',
			),
			'blurb_description' 	=> array(
				'label'           	=> esc_html__( 'Description', 'dnxte-divi-essential' ),
				'type'            	=> 'tiny_mce',
				'dynamic_content' 	=> 'text',
				'option_category' 	=> 'basic_option',
				//'description'     	=> esc_html__( 'Description entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'dnxt_blurb_heading',
			),
			'dnxt_use_icon' 	  => array(
				'label'           => esc_html__( 'Use Icon', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',
				'options'         => array(
					'off' 		  => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  		  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'toggle_slug'     => 'dnxt_blurb_image_icon',
				'description' 	  => esc_html__( 'Here you can choose whether icon set below should be used.', 'dnxte-divi-essential' ),
				'default_on_front'=> 'off',
				'affects'         => array(
					'border_radii_image',
					'border_styles_image',
					'dnxt_font_icon',
					'font_icon_placement',
					'image_max_width',
					'use_icon_font_size',
					'use_circle',
					'icon_color',
				),
			),
			// Button Icon
			'dnxt_font_icon' 		  =>	array(
				'label'               => esc_html__( 'Icon', 'dnxte-divi-essential' ),
				'type'                => 'select_icon',
				'option_category'     => 'basic_option',
				'class'               => array( 'et-pb-font-icon' ),
				'toggle_slug'         => 'dnxt_blurb_image_icon',
				'description'         => esc_html__( 'Choose an icon to display with your blurb.', 'dnxte-divi-essential' ),
				'default'             => '!||divi',
				'depends_show_if'     => 'on',
				'mobile_options'      => true,
				'hover'               => 'tabs',
			),
			// Button Icon Placement
			'font_icon_placement'	=> array(
				'label'				=> esc_html__( 'Button Icon Placement', 'dnxte-divi-essential' ),
				'description'       => esc_html__( 'Choose where the button icon should be displayed within the button.', 'dnxte-divi-essential' ),
				'type'              => 'select',
				'option_category'	=> 'layout',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'dnxt_blurb_icon_design',
				'option_category'   => 'layout',
				'options'           => array(
					'dnxt-blurb-wrapper-two-top-left'		=> esc_html__( 'Top Left', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-top-center'		=> esc_html__( 'Top Center', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-top-right'		=> esc_html__( 'Top Right', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-left-top'		=> esc_html__( 'Left Top', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-left-center'	=> esc_html__( 'Left Center', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-left-bottom'	=> esc_html__( 'Left Bottom', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-bottom-left'	=> esc_html__( 'Bottom Left', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-bottom-center'	=> esc_html__( 'Bottom Center', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-bottom-right'	=> esc_html__( 'Bottom Right', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-right-top'		=> esc_html__( 'Right Top', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-right-center'	=> esc_html__( 'Right Center', 'dnxte-divi-essential' ),
					'dnxt-blurb-wrapper-two-right-bottom'	=> esc_html__( 'Right Bottom', 'dnxte-divi-essential' ),
				),
				'default'             => 'right',
			),
			'font_icon_color' 		=> array(
				'label'             => esc_html__( 'Icon Color', 'dnxte-divi-essential' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color for your icon.', 'dnxte-divi-essential' ),
				'tab_slug'          => 'advanced',
				'default'			=> '#666',
				'toggle_slug'       => 'dnxt_blurb_icon_design',
				'mobile_options'	=> true,
				'responsive'		=> true,
				'hover'             => 'tabs',
			),
			'font_icon_size' 	  => array(
				'label'           => esc_html__( 'Icon Font Size', 'dnxte-divi-essential' ),
				'description'     => esc_html__( 'Control the size of the icon by increasing or decreasing the font size.', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_icon_design',
				'default'         => '96px',
				'default_unit'    => 'px',
				'default_on_front'=> '',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'range_settings'  => array(
					'min'  		  => '1',
					'max'  		  => '120',
					'step' 		  => '1',
				),
				'mobile_options'  => true,
				'responsive'	  => true,
				'hover'           => 'tabs',
			),
			'use_font_icon_bg_color' => array(
				'label'           	 => esc_html__( 'Use Icon Font Background Color', 'dnxte-divi-essential' ),
				'description'        => esc_html__( 'If you would like to control the background color of the icon, you must first enable this option.', 'dnxte-divi-essential' ),
				'type'            	 => 'yes_no_button',
				'options'         	 => array(
					'off' 			 => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  			 => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'depends_show_if'  	 => 'on',
				'toggle_slug'      	 => 'dnxt_blurb_icon_background',
				'sub_toggle'	  	 => 'sub_toggle_color',
				'default_on_front' 	 => 'off',
				'affects'     		 => array(
					'font_icon_bg_color',
				),
			),
			'font_icon_bg_color' 	=> array(
				'label'             => esc_html__( 'Icon Background Color', 'dnxte-divi-essential' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom color for your icon.', 'dnxte-divi-essential' ),
				'toggle_slug'       => 'dnxt_blurb_icon_background',
				'sub_toggle'	  	=> 'sub_toggle_color',
				'hover'             => 'tabs',
				'mobile_options'	=> true,
				'responsive'		=> true,
				'depends_show_if' 	=> 'on',
			),
			'use_font_icon_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Background Gradient Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button', 
				'toggle_slug'     => 'dnxt_blurb_icon_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'font_icon_gradient_color_one',
					'font_icon_gradient_color_two',
					'font_icon_gradient_type',
					'font_icon_gradient_start_position',
					'font_icon_gradient_end_position'
				),
				'default_on_front' => 'off',
				'depends_show_if' 	=> 'on',
			),
			'font_icon_gradient_color_one'	=> array(
                'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_icon_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
			),
			'font_icon_gradient_color_two'	=> array(
                'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_icon_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
			),
			'font_icon_gradient_type'		=> array(
                'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type'            => 'select',
				'description'     => esc_html__('Select the types of gradient', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_icon_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'options'         => array(
                    'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
                    'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
                ),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'font_icon_gradient_type_linear_direction'   => array(
                'label'           => esc_html__('Gradient direction', 'dnxte-divi-essential'),
                'type'            => 'range',
                'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxt_blurb_icon_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 360,
                ),
                'default'         => '180deg',
                'fixed_unit'      => 'deg',
				'show_if' => array(
					'use_font_icon_gradient_show_hide' => 'on',
					'font_icon_gradient_type' => 'linear-gradient'
				),
			),
			'font_icon_gradient_type_radial_direction'   => array(
                'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type'            	=> 'select',
				'description'     	=> esc_html__('Select the types of gradient', 'dnxte-divi-essential'),                
                'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxt_blurb_icon_background',
				'sub_toggle'	 	=> 'sub_toggle_gradient',
                'options'       	=> array(
                    'circle at center'       => esc_html__(	'Center', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__(	'Top Left', 'dnxte-divi-essential'),
                    'circle at top'          => esc_html__(	'Top',	'dnxte-divi-essential'),
                    'circle at top right'    => esc_html__(	'Top Right', 'dnxte-divi-essential'),
                    'circle at right'        => esc_html__(	'Right', 'dnxte-divi-essential'),
                    'circle at bottom right' => esc_html__(	'Bottom Right', 'dnxte-divi-essential'),
                    'circle at bottom'       => esc_html__(	'Bottom', 'dnxte-divi-essential'),
                    'circle at bottom left'  => esc_html__(	'Bottom Left', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__(	'Left', 'dnxte-divi-essential'),

                ),
                'default'         => 'circle at center',
				'show_if'         => array(
					'use_font_icon_gradient_show_hide' => 'on',
					'font_icon_gradient_type'		=> 'radial-gradient'
                ),
			),
			'font_icon_gradient_start_position'           => array(
                'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_icon_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0%',
                'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			'font_icon_gradient_end_position'             => array(
                'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_icon_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '100%',
                'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			'use_image_bg_color' => array(
				'label'           => esc_html__( 'Use Image Background Color', 'dnxte-divi-essential' ),
				'description'     => esc_html__( 'If you would like to control the background color of the icon, you must first enable this option.', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'affects'     => array(
					'image_bg_color',
				),
				'depends_show_if'  	=> 'on',
				'toggle_slug'      	=> 'dnxt_blurb_image_background',
				'sub_toggle'	  	=> 'sub_toggle_color',
				'default_on_front' 	=> 'off',
			),
			'image_bg_color' => array(
				'label'             => esc_html__( 'Image Background Color', 'dnxte-divi-essential' ),
				'type'              => 'color-alpha',
				'description'       => esc_html__( 'Here you can define a custom background color for your image.', 'dnxte-divi-essential' ),
				'toggle_slug'       => 'dnxt_blurb_image_background',
				'sub_toggle'	  	=> 'sub_toggle_color',
				'hover'             => 'tabs',
				'mobile_options'	=> true,
				'responsive'		=> true,
				'depends_show_if' 	=> 'on',
			),
			'bg_img_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Background Gradient Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button', 
				'toggle_slug'     => 'dnxt_blurb_image_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'bg_img_gradient_color_one',
					'bg_img_gradient_color_two',
					'bg_img_gradient_type',
					'bg_img_gradient_start_position',
					'bg_img_gradient_end_position'
				),
				'default_on_front' => 'off',
				'depends_show_if' 	=> 'on',
			),
			'bg_img_gradient_color_one'	=> array(
                'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_image_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
			),
			'bg_img_gradient_color_two'	=> array(
                'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_image_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
			),
			'bg_img_gradient_type'=> array(
                'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type'            => 'select',
				'description'     => esc_html__('Select the types of gradient', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_image_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'options'         => array(
                    'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
                    'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
                ),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'bg_img_gradient_type_linear_direction'   => array(
                'label'           => esc_html__('Gradient direction', 'dnxte-divi-essential'),
                'type'            => 'range',
                'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxt_blurb_image_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 360,
                ),
                'default'         => '180deg',
                'fixed_unit'      => 'deg',
				'show_if' => array(
					'bg_img_gradient_show_hide' => 'on',
					'bg_img_gradient_type' => 'linear-gradient'
				),
			),
			'bg_img_gradient_type_radial_direction'   => array(
                'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type'            	=> 'select',
				'description'     	=> esc_html__('Select the types of gradient', 'dnxte-divi-essential'),                
                'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxt_blurb_image_background',
				'sub_toggle'	 	=> 'sub_toggle_gradient',
                'options'       	=> array(
                    'circle at center'       => esc_html__(	'Center', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__(	'Top Left', 'dnxte-divi-essential'),
                    'circle at top'          => esc_html__(	'Top',	'dnxte-divi-essential'),
                    'circle at top right'    => esc_html__(	'Top Right', 'dnxte-divi-essential'),
                    'circle at right'        => esc_html__(	'Right', 'dnxte-divi-essential'),
                    'circle at bottom right' => esc_html__(	'Bottom Right', 'dnxte-divi-essential'),
                    'circle at bottom'       => esc_html__(	'Bottom', 'dnxte-divi-essential'),
                    'circle at bottom left'  => esc_html__(	'Bottom Left', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__(	'Left', 'dnxte-divi-essential'),

                ),
                'default'         => 'circle at center',
				'show_if'         => array(
					'bg_img_gradient_show_hide' => 'on',
					'bg_img_gradient_type'		=> 'radial-gradient'
                ),
			),
			'bg_img_gradient_start_position'	=> array(
                'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_image_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0%',
                'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			'bg_img_gradient_end_position'	=> array(
                'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_image_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '100%',
                'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			// Image
			'dnxt_image' 			 =>	array(
				'label'              => esc_html__( 'Image', 'dnxte-divi-essential' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_html__( 'Upload an image', 'dnxte-divi-essential' ),
				'choose_text'        => esc_html__( 'Choose an Image', 'dnxte-divi-essential' ),
				'update_text'        => esc_html__( 'Set As Image', 'dnxte-divi-essential' ),
				'description'        => esc_html__( 'Upload an image to display at the top of your blurb.', 'dnxte-divi-essential' ),
				'toggle_slug'        => 'dnxt_blurb_image_icon',
				'dynamic_content'    => 'image',
				'hover'              => 'tabs',
				'mobile_options'	 => true,
			),
			// Image alt
			'dnxt_alt' 			  => array(
				'label'           => esc_html__( 'Image Alt Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'dnxt_blurb_attributes',
				'dynamic_content' => 'text',
			),
			// Image Placement 
			'image_placement'		=>	array(
				'label'				=> esc_html__( 'Image Placement', 'dnxte-divi-essential' ),
				'description'       => esc_html__( 'Choose where the image should be displayed within the button.', 'dnxte-divi-essential' ),
				'type'              => 'select',
				'option_category'	=> 'layout',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'dnxt_blurb_image_design',
				'options'           => array(
					'top-left'		=> esc_html__( 'Top Left', 'dnxte-divi-essential' ),
					'top-center'	=> esc_html__( 'Top Center', 'dnxte-divi-essential' ),
					'top-right'		=> esc_html__( 'Top Right', 'dnxte-divi-essential' ),
					'left-top'		=> esc_html__( 'Left Top', 'dnxte-divi-essential' ),
					'left-center'	=> esc_html__( 'Left Center', 'dnxte-divi-essential' ),
					'left-bottom'	=> esc_html__( 'Left Bottom', 'dnxte-divi-essential' ),
					'bottom-left'	=> esc_html__( 'Bottom Left', 'dnxte-divi-essential' ),
					'bottom-center'	=> esc_html__( 'Bottom Center', 'dnxte-divi-essential' ),
					'bottom-right'	=> esc_html__( 'Bottom Right', 'dnxte-divi-essential' ),
					'right-top'		=> esc_html__( 'Right Top', 'dnxte-divi-essential' ),
					'right-center'	=> esc_html__( 'Right Center', 'dnxte-divi-essential' ),
					'right-bottom'	=> esc_html__( 'Right Bottom', 'dnxte-divi-essential' ),
				),
				'default'            => 'top-left',
				'mobile_options'	 => true,
			),
			'dnxt_image_max_width'	=> array(
				'label'           	=> esc_html__( 'Image Width', 'dnxte-divi-essential' ),
				'description'     	=> esc_html__( 'Adjust the width of the image within the blurb.', 'dnxte-divi-essential' ),
				'type'            	=> 'range',
				'option_category' 	=> 'layout',
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'width',
				'allowed_units'   	=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'         	=> '100%',
				'default_unit'    	=> '%',
				'default_on_front'	=> '',
				'allow_empty'     	=> true,
				'range_settings'  	=> array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options'	=> true,
				'responsive'      	=> true,
				'hover'             => 'tabs',
			),
			'dnxt_content_max_width' 	=> array(
				'label'           		=> esc_html__( 'Text Container Width', 'dnxte-divi-essential' ),
				'description'     		=> esc_html__( 'Adjust the width of the text container width within the blurb.', 'dnxte-divi-essential' ),
				'type'            		=> 'range',
				'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'width',
				'default'         		=> '100%',
				'default_unit'    		=> '%',
				'default_on_front'		=> '',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'allow_empty'     		=> true,
				'range_settings'  		=> array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'mobile_options'		=> true,
				'responsive'      		=> true,
				'hover'             	=> 'tabs',
			),
			'dnxt_img_margin'	  => array(
				'label'           => esc_html__('Image Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_image_icon_space', 
				'sub_toggle'	  => 'sub_toggle_image_space'
			),
			'dnxt_img_padding'	  => array(
				'label'           => esc_html__('Image Padding', 'dnxte-divi-essential'),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
				'tab_slug'        => 'advanced',				
				'toggle_slug'     => 'dnxt_blurb_image_icon_space', 
				'sub_toggle'	  => 'sub_toggle_image_space'
			),
			'dnxt_icon_margin'	  => array(
				'label'           => esc_html__('Icon Margin', 'dnxte-divi-essential'),
				'type'            => 'custom_margin',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_image_icon_space', 
				'sub_toggle'	  => 'sub_toggle_icon_space'
			),
			'dnxt_icon_padding'	  => array(
				'label'           => esc_html__('Icon Padding', 'dnxte-divi-essential'),
				'type'            => 'custom_padding',
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_image_icon_space', 
				'sub_toggle'	  => 'sub_toggle_icon_space'
			),
			'dnxt_pre_margin'	  =>	array(
				'label'           => esc_html__('Pre Heading Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_header_space', 
				'sub_toggle'	  => 'sub_toggle_pre_space'
			),
			'dnxt_pre_padding'	  =>	array(
				'label'           => esc_html__('Pre Heading Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_header_space', 
				'sub_toggle'	  => 'sub_toggle_pre_space'
			),
			'dnxt_header_margin'  =>	array(
				'label'           => esc_html__('Header Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_header_space', 
				'sub_toggle'	  => 'sub_toggle_header_space'
			),
			'dnxt_header_padding' =>	array(
				'label'           => esc_html__('Header Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_header_space', 
				'sub_toggle'	  => 'sub_toggle_header_space'
			),
			'dnxt_post_margin' 	  =>	array(
				'label'           => esc_html__('Post Header Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_header_space', 
				'sub_toggle'	  => 'sub_toggle_post_space'
			),
			'dnxt_post_padding'   =>	array(
				'label'           => esc_html__('Post Header Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_header_space', 
				'sub_toggle'	  => 'sub_toggle_post_space'
			),
			'dnxt_body_margin' 	  =>	array(
				'label'           => esc_html__('Body Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_body_content_space', 
				'sub_toggle'	  => 'sub_toggle_body_space'
			),
			'dnxt_body_padding' =>		array(
				'label'           => esc_html__('Body Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_body_content_space', 
				'sub_toggle'	  => 'sub_toggle_body_space'
			),
			'dnxt_content_margin' =>	array(
				'label'           => esc_html__('Description Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_body_content_space', 
				'sub_toggle'	  => 'sub_toggle_content_space'
			),
			'dnxt_content_padding' =>	array(
				'label'           => esc_html__('Description Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_body_content_space', 
				'sub_toggle'	  => 'sub_toggle_content_space'
			),
			'dnxt_button_margin' =>		array(
				'label'           => esc_html__('Button Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_button_space',
				'depends_show_if'  	=> 'on', 
			),
			'dnxt_button_padding' =>	array(
				'label'           => esc_html__('Button Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_button_space',
				'depends_show_if'  	=> 'on', 
			),
			'dnxt_btn_show_hide' => array(
				'label'           => esc_html__( 'Button Show Hide', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',
				'options'         => array(
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'toggle_slug'     => 'dnxt_blurb_button_text',
				'affects'         => array(
					'button_text',
					'button_link',
					'button_link_new_window',
					'btn_one_show_hide',
					'btn_one_gradient_show_hide',
					'dnxt_btn_text',
					'btn_show_hide',
					'dnxt_hover_2d',
					'dnxt_hover_bg',
					'dnxt_hover_border',
					'dnxt_hover_icons',
					'dnxt_radial_out_bg_color',
					'dnxt_hover_bg_color',
					'dnxt_hover_border_bg_color',
					'dnxt_button_margin',
					'dnxt_button_padding',
				),
				'default_on_front'=> 'off',
			),
            // Button Title Field
			'button_text'      => array(
				'label'           => esc_html__( 'Button Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
                'default'         => 'Button Text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_button_text',
				'depends_show_if' 	=> 'on',
			),
			// Button Link Field
			'button_link'      => array(
				'label'           => esc_html__( 'Button Link', 'dnxte-divi-essential' ),
				'description'     => esc_html__( 'When clicked the module will link to this URL.', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'toggle_slug'     => 'dnxt_blurb_button_text',
				'dynamic_content' => 'url',
				'depends_show_if' 	=> 'on',
			),
			// Button Link Target Field
			'button_link_new_window'		=> array(
				'label'				=> esc_html__( 'Button Link Target', 'dnxte-divi-essential' ),
				'description'      	=> esc_html__( 'Here you can choose whether or not your link opens in a new window', 'dnxte-divi-essential' ),
				'type'             	=> 'select',
				'option_category'  	=> 'configuration',
				'options'         	=> array(
					'off' => esc_html__( 'In The Same Window', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'In The New Tab', 'dnxte-divi-essential' ),
				),
				'toggle_slug'      => 'dnxt_blurb_button_text',
				'default_on_front' => 'off',
				'depends_show_if' 	=> 'on',
			),
			// Button Background 
			'btn_one_show_hide'  => array(
				'label'           => esc_html__( 'Button Background Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',  
				'toggle_slug'     => 'dnxt_blurb_button_background',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'button_bg_one',
				),
				'default_on_front' => 'off',
				'depends_show_if' 	=> 'on',
			),
			// Button BG Color
			'button_bg_one'        => array(
				'label'          => esc_html__('Select Background Color', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_button_background',
				'sub_toggle'	 => 'sub_toggle_color',
				'hover'    		 => 'tabs',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
			),
			// Button Background
			'btn_one_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Button Gradient Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button', 
				'toggle_slug'     => 'dnxt_blurb_button_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'bg_one_gradient_color_one',
					'bg_one_gradient_color_two',
					'bg_one_gradient_type',
					'bg_one_gradient_start_position',
					'bg_one_gradient_end_position'
				),
				'default_on_front' => 'off',
				'depends_show_if' 	=> 'on',
			),
			'bg_one_gradient_color_one'	=> array(
                'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_button_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
			),
			'bg_one_gradient_color_two'	=> array(
                'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_button_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
			),
			'bg_one_gradient_type'		=> array(
                'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type'            => 'select',
				'description'     => esc_html__('Select the types of gradient', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_button_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'options'         => array(
                    'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
                    'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
                ),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'bg_one_gradient_type_linear_direction'   => array(
                'label'           => esc_html__('Gradient direction', 'dnxte-divi-essential'),
                'type'            => 'range',
                'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxt_blurb_button_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 360,
                ),
                'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'btn_one_gradient_show_hide' => 'on',
					'bg_one_gradient_type' => 'linear-gradient'
				),
			),
			'bg_one_gradient_type_radial_direction'   => array(
                'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type'            	=> 'select',
				'description'     	=> esc_html__('Select the types of gradient', 'dnxte-divi-essential'),                
                'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxt_blurb_button_background',
				'sub_toggle'	 	=> 'sub_toggle_gradient',
                'options'       	=> array(
                    'circle at center'       => esc_html__(	'Center', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__(	'Top Left', 'dnxte-divi-essential'),
                    'circle at top'          => esc_html__(	'Top',	'dnxte-divi-essential'),
                    'circle at top right'    => esc_html__(	'Top Right', 'dnxte-divi-essential'),
                    'circle at right'        => esc_html__(	'Right', 'dnxte-divi-essential'),
                    'circle at bottom right' => esc_html__(	'Bottom Right', 'dnxte-divi-essential'),
                    'circle at bottom'       => esc_html__(	'Bottom', 'dnxte-divi-essential'),
                    'circle at bottom left'  => esc_html__(	'Bottom Left', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__(	'Left', 'dnxte-divi-essential'),

                ),
                'default'         => 'circle at center',
				'show_if'         => array(
					'btn_one_gradient_show_hide' 		=> 'on',
					'bg_one_gradient_type'	=> 'radial-gradient'
                ),
			),
			'bg_one_gradient_start_position'           => array(
                'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_button_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0%',
				'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			'bg_one_gradient_end_position'             => array(
                'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_button_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '100%',
				'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			// Heading Background 
			'heading_bg_show_hide'  => array(
				'label'           => esc_html__( 'Background Heading Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',  
				'toggle_slug'     => 'dnxt_blurb_heading_background',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'heading_bg',
				),
				'default_on_front' => 'off',
			),
			// Heading BG Color
			'heading_bg'		 => array(
				'label'          => esc_html__('Select Background Color', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'toggle_slug'    => 'dnxt_blurb_heading_background',
				'sub_toggle'	 => 'sub_toggle_color',
				'hover'    		 => 'tabs',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
				'mobile_options' => true,
				'responsive'	 => true,
			),
			// Background Heading Gradient 
			'heading_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Gradient Heading Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',  
				'toggle_slug'     => 'dnxt_blurb_heading_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'heading_gradient_color_one',
					'heading_gradient_color_two',
					'heading_gradient_type',
					'heading_gradient_start_position',
					'heading_gradient_end_position'
				),
				'default_on_front' => 'off',
			),
			'heading_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_heading_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
			),
			'heading_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_heading_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
			),
			'heading_gradient_type'		=> array(
				'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
				'type'            => 'select',
				'description'     => esc_html__('Select the types of gradient', 'dnxte-divi-essential'),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_heading_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
					'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
				),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'heading_gradient_type_linear_direction'   => array(
				'label'           => esc_html__('Linear direction', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxt_blurb_heading_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'heading_gradient_show_hide' => 'on',
					'heading_gradient_type' => 'linear-gradient'
				),
			),
			'heading_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__('Select the types of gradient', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxt_blurb_heading_background',
				'sub_toggle'	 	=> 'sub_toggle_gradient',
				'options'       	=> array(
					'circle at center'       => esc_html__(	'Center', 'dnxte-divi-essential'),
					'circle at left'         => esc_html__(	'Top Left', 'dnxte-divi-essential'),
					'circle at top'          => esc_html__(	'Top',	'dnxte-divi-essential'),
					'circle at top right'    => esc_html__(	'Top Right', 'dnxte-divi-essential'),
					'circle at right'        => esc_html__(	'Right', 'dnxte-divi-essential'),
					'circle at bottom right' => esc_html__(	'Bottom Right', 'dnxte-divi-essential'),
					'circle at bottom'       => esc_html__(	'Bottom', 'dnxte-divi-essential'),
					'circle at bottom left'  => esc_html__(	'Bottom Left', 'dnxte-divi-essential'),
					'circle at left'         => esc_html__(	'Left', 'dnxte-divi-essential'),

				),
				'default'         => 'circle at center',
				'show_if'         => array(
					'heading_gradient_show_hide'	=> 'on',
					'heading_gradient_type'			=> 'radial-gradient'
				),
			),
			'heading_gradient_start_position'           => array(
				'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_heading_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '0%',
				'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			'heading_gradient_end_position'             => array(
				'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_heading_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '100%',
				'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			// Content Background 
			'content_bg_show_hide'  => array(
				'label'           => esc_html__( 'Background Description Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'dnxt_blurb_content_background',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'content_bg',
				),
				'default_on_front' => 'off',
			),
			// Content BG Color
			'content_bg'        => array(
				'label'          => esc_html__('Select Background Color', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_content_background',
				'sub_toggle'	 => 'sub_toggle_color',
				'hover'    		 => 'tabs',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
				'mobile_options' => true,
				'responsive'	 => true,
			),
			// Background Content Gradient 
			'content_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Gradient Description Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',  
				'toggle_slug'     => 'dnxt_blurb_content_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'content_gradient_color_one',
					'content_gradient_color_two',
					'content_gradient_type',
					'content_gradient_start_position',
					'content_gradient_end_position'
				),
				'default_on_front' => 'off',
			),
			'content_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_content_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
			),
			'content_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxt_blurb_content_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
			),
			'content_gradient_type'		=> array(
				'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
				'type'            => 'select',
				'description'     => esc_html__('Select the types of gradient', 'dnxte-divi-essential'),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_content_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
					'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
				),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'content_gradient_type_linear_direction'   => array(
				'label'           => esc_html__('Gradient direction', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxt_blurb_content_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'content_gradient_show_hide' => 'on',
					'content_gradient_type' => 'linear-gradient'
				),
			),
			'content_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__('Select the types of gradient', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxt_blurb_content_background',
				'sub_toggle'	 	=> 'sub_toggle_gradient',
				'options'       	=> array(
					'circle at center'       => esc_html__(	'Center', 'dnxte-divi-essential'),
					'circle at left'         => esc_html__(	'Top Left', 'dnxte-divi-essential'),
					'circle at top'          => esc_html__(	'Top',	'dnxte-divi-essential'),
					'circle at top right'    => esc_html__(	'Top Right', 'dnxte-divi-essential'),
					'circle at right'        => esc_html__(	'Right', 'dnxte-divi-essential'),
					'circle at bottom right' => esc_html__(	'Bottom Right', 'dnxte-divi-essential'),
					'circle at bottom'       => esc_html__(	'Bottom', 'dnxte-divi-essential'),
					'circle at bottom left'  => esc_html__(	'Bottom Left', 'dnxte-divi-essential'),
					'circle at left'         => esc_html__(	'Left', 'dnxte-divi-essential'),

				),
				'default'         => 'circle at center',
				'show_if'         => array(
					'content_gradient_show_hide' 		=> 'on',
					'content_gradient_type'	=> 'radial-gradient'
				),
			),
			'content_gradient_start_position'           => array(
				'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_content_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '0%',
				'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			'content_gradient_end_position'             => array(
				'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_blurb_content_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '100%',
				'fixed_unit'      => '%',
				'depends_show_if' => 'on',
			),
			// Button Show & Hide
			'btn_show_hide'		=> array(
				'label'           => esc_html__( 'Show Icon', 'dnxte-divi-essential' ),
				'description'     => esc_html__( 'When enabled, this will add a custom icon within the button.', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_button_icon',
				'default'         => 'on',
				'options'         => array(
					'on'      => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off'     => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					"btn_icon_color",
					"btn_icon_placement",
					"btn_on_hover",
					"btn_icon",
				),
				'depends_show_if' => 'on',
			),
			// Button Icon
			'btn_icon'	=> array(
				'label'               => esc_html__( 'Button Icon', 'dnxte-divi-essential' ),
				'description'         => esc_html__( 'Pick a color to be used for the button icon.', 'dnxte-divi-essential' ),
				'type'                => 'select_icon',
				'tab_slug'            => 'advanced',
				'toggle_slug'         => 'dnxt_blurb_button_icon',
				'class'               => array( 'et-pb-font-icon' ),
				'default'             => '$',
				'mobile_options'      => true,
				'depends_show_if_not' => 'off',
			),
			// Button Icon Color
			'btn_icon_color'	=>	array(
				'label'               => esc_html__( 'Button Icon Color', 'dnxte-divi-essential'),
				'description'         => esc_html__( 'Here you can define a custom color for the button icon.', 'dnxte-divi-essential' ),
				'type'                => 'color-alpha',
				'tab_slug'            => 'advanced',
				'toggle_slug'         => 'dnxt_blurb_button_icon',
				'custom_color'        => true,
				'default'			  => '#2857b6',
				'hover'               => 'tabs',
				'depends_show_if_not' => 'off',
			),
			// Button Icon Placement
			'btn_icon_placement'	=>	array(
				'label'               => esc_html__( 'Button Icon Placement', 'dnxte-divi-essential' ),
				'description'         => esc_html__( 'Choose where the button icon should be displayed within the button.', 'dnxte-divi-essential' ),
				'type'                => 'select',
				'tab_slug'            => 'advanced',
				'toggle_slug'         => 'dnxt_blurb_button_icon',
				'options'             => array(
					'right' => esc_html__( 'Right', 'dnxte-divi-essential' ),
					'left'  => esc_html__( 'Left', 'dnxte-divi-essential' ),
				),
				'default'             => 'right',
				'depends_show_if_not' => 'off',
			),
			// Button Icon On Hover
			'btn_on_hover'	=>	array(
				'label'               => esc_html__( 'Only Show Icon On Hover for Button', 'dnxte-divi-essential' ),
				'description'         => esc_html__( 'By default, button icons are displayed on hover. If you would like button icons to always be displayed, then you can enable this option.', 'dnxte-divi-essential' ),
				'type'                => 'yes_no_button',
				'tab_slug'            => 'advanced',
				'toggle_slug'         => 'dnxt_blurb_button_icon',
				'default'             => 'on',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'depends_show_if_not' => 'off',
			),
			// Hover Effect Switch
			'blurb_hover_switch'  => array(
				'label'           => esc_html__('Hover Effect Enable', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_2d_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'affects'         => array(
					'dnxt_hover_effect',
				),
				'default_on_front'=> 'off',
			),
			// 2D Hover Effect
			'dnxt_hover_effect'     => array(
				'label'             => esc_html__( 'Select 2D Hover Effect', 'dnxte-divi-essential' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'dnxt_blurb_hover_effect',
				'sub_toggle'        => 'sub_toggle_2d_effect',
				'default'           => '',
				'description'       => esc_html__( 'Here you can adjust the hover effect.', 'dnxte-divi-essential' ),
				'options'           => array(
					'dnxt-hover-backward'               =>  esc_html__( 'Backward', 'dnxte-divi-essential' ),
					'dnxt-hover-bob'                    =>  esc_html__( 'Bob', 'dnxte-divi-essential' ),
					'dnxt-hover-bounce-in'              =>  esc_html__( 'Bounce In', 'dnxte-divi-essential' ),
					'dnxt-hover-bounce-out'             =>  esc_html__( 'Bounce Out', 'dnxte-divi-essential' ),
					'dnxt-hover-buzz'                   =>  esc_html__( 'Buzz', 'dnxte-divi-essential' ),
					'dnxt-hover-buzz-out'               =>  esc_html__( 'Buzz Out', 'dnxte-divi-essential' ),
					'dnxt-hover-float'                  =>  esc_html__( 'Float', 'dnxte-divi-essential' ),
					'dnxt-hover-forward'                =>  esc_html__( 'Forward', 'dnxte-divi-essential' ),
					'dnxt-hover-grow'                   =>  esc_html__( 'Grow', 'dnxte-divi-essential' ),
					'dnxt-hover-grow-rotate'            =>  esc_html__( 'Grow Rotate', 'dnxte-divi-essential' ),
					'dnxt-hover-hang'                   =>  esc_html__( 'Hang', 'dnxte-divi-essential' ),
					'dnxt-hover-pop'                    =>  esc_html__( 'Pop', 'dnxte-divi-essential' ),
					'dnxt-hover-pulse'                  =>  esc_html__( 'Pulse', 'dnxte-divi-essential' ),
					'dnxt-hover-pulse-grow'             =>  esc_html__( 'Pulse Grow', 'dnxte-divi-essential' ),
					'dnxt-hover-pulse-shrink'           =>  esc_html__( 'Pulse Shrink', 'dnxte-divi-essential' ),
					'dnxt-hover-push'                   =>  esc_html__( 'Push', 'dnxte-divi-essential' ),
					'dnxt-hover-rotate'                 =>  esc_html__( 'Rotate', 'dnxte-divi-essential' ),
					'dnxt-hover-shrink'                 =>  esc_html__( 'Shrink', 'dnxte-divi-essential' ),
					'dnxt-hover-sink'                   =>  esc_html__( 'Sink', 'dnxte-divi-essential' ),
					'dnxt-hover-skew'                   =>  esc_html__( 'Skew', 'dnxte-divi-essential' ),
					'dnxt-hover-skew-backward'          =>  esc_html__( 'Skew Backward', 'dnxte-divi-essential' ),
					'dnxt-hover-skew-forward'           =>  esc_html__( 'Skew Forward', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-bottom'          =>  esc_html__( 'Wobble Bottom', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-horizontal'      =>  esc_html__( 'Wobble Horizontal', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-skew'            =>  esc_html__( 'Wobble Skew', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-top'             =>  esc_html__( 'Wobble Top', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-to-bottom-right' =>  esc_html__( 'Wobble To Bottom Right', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-to-top-right'    =>  esc_html__( 'Wobble To Top Right', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-vertical'        =>  esc_html__( 'Wobble Vertical', 'dnxte-divi-essential' ),
				),
				'depends_show_if' => 'on',
			),
			// Tilt Effect Enable
			'dnxt_blurb_tilt_switch'  => array(
				'label'           => esc_html__('Tilt Effect Enable', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'affects'         => array(
					'dnxt_tilt_hover_effect',
					'dnxt_blurb_tilt_glare',
					'dnxt_tilt_reverse',
					'dnxt_tilt_perspective',
					'dnxt_tilt_max',
					'dnxt_tilt_speed',
					'dnxt_tilt_startx',
					'dnxt_tilt_starty',
					'dnxt_tilt_scale',
				),
				'default_on_front'=> 'off',
			),
			// Data Tilt Glare Enable
			'dnxt_blurb_tilt_glare'  => array(
				'label'           => esc_html__('Glare Enable', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'affects'         => array(
					'dnxt_tilt_max_glare'
				),
				'depends_show_if_not' => 'off',
				'default_on_front'=> 'off',
			),
			// Data Tilt Max Glare
			'dnxt_tilt_max_glare' => array(
				'label'           => esc_html__('Max Glare', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_tilt_effect',
				'range_settings'  => array(
					'step' => .5,
					'min'  => 0.5,
					'max'  => 100,
				),
				'default'         => '0.8',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'depends_show_if_not' => 'off',
			),
			// Data Tilt Reverse
			'dnxt_tilt_reverse' => array(
				'label'           => esc_html__('Tilt Reverse', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('False', 'dnxte-divi-essential'),
					'on'      => esc_html__('True', 'dnxte-divi-essential'),
				),
				'default'           => 'off',
				'depends_show_if_not' => 'off',
			),
			// Data Tilt Perspective
			'dnxt_tilt_perspective' => array(
				'label'           => esc_html__('Tilt Perspective', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 1000,
				),
				'default'         => '1000',
				'depends_show_if_not' => 'off',
			),
			// Data Tilt Max
			'dnxt_tilt_max' => array(
				'label'           => esc_html__('Tilt Max', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_tilt_effect',
				'default_unit'    => '',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '35',
				'depends_show_if_not' => 'off',
			),
			// Data Tilt Speed
			'dnxt_tilt_speed' => array(
				'label'           => esc_html__('Tilt Speed', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 500,
				),
				'default'         => '300',
				'depends_show_if_not' => 'off',
			),
			// Data Tilt StartX
			'dnxt_tilt_startx' => array(
				'label'           => esc_html__('Tilt StartX', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 500,
				),
				'default'         => '0',
				'depends_show_if_not' => 'off',
			),
			// Data Tilt StartY
			'dnxt_tilt_starty' => array(
				'label'           => esc_html__('Tilt StartY', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 500,
				),
				'default'         => '0',
				'depends_show_if_not' => 'off',
			),
			// Data Tilt Scale
			'dnxt_tilt_scale' => array(
				'label'           => esc_html__('Tilt Scale', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_blurb_hover_effect',
				'sub_toggle'      => 'sub_toggle_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 500,
				),
				'default'         => '1',
				'depends_show_if_not' => 'off',
			),
			// Button Hover 2D
			'dnxt_hover_2d'     => array(
				'label'             => esc_html__( 'Select 2D Hover Effect', 'dnxte-divi-essential' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'button_hover',
				'sub_toggle'		=> 'sub_toggle_2d',
				'default'           => '',
				'description'       => esc_html__( 'Here you can adjust the hover effect.', 'dnxte-divi-essential' ),
				'options'           => array(
					''               					=>  esc_html__( 'Select', 'dnxte-divi-essential' ),
					'dnxt-hover-backward'               =>  esc_html__( 'Backward', 'dnxte-divi-essential' ),
					'dnxt-hover-bob'                    =>  esc_html__( 'Bob', 'dnxte-divi-essential' ),
					'dnxt-hover-bounce-in'              =>  esc_html__( 'Bounce In', 'dnxte-divi-essential' ),
					'dnxt-hover-bounce-out'             =>  esc_html__( 'Bounce Out', 'dnxte-divi-essential' ),
					'dnxt-hover-buzz'                   =>  esc_html__( 'Buzz', 'dnxte-divi-essential' ),
					'dnxt-hover-buzz-out'               =>  esc_html__( 'Buzz Out', 'dnxte-divi-essential' ),
					'dnxt-hover-float'                  =>  esc_html__( 'Float', 'dnxte-divi-essential' ),
					'dnxt-hover-forward'                =>  esc_html__( 'Forward', 'dnxte-divi-essential' ),
					'dnxt-hover-grow'                   =>  esc_html__( 'Grow', 'dnxte-divi-essential' ),
					'dnxt-hover-grow-rotate'            =>  esc_html__( 'Grow Rotate', 'dnxte-divi-essential' ),
					'dnxt-hover-hang'                   =>  esc_html__( 'Hang', 'dnxte-divi-essential' ),
					'dnxt-hover-pop'                    =>  esc_html__( 'Pop', 'dnxte-divi-essential' ),
					'dnxt-hover-pulse'                  =>  esc_html__( 'Pulse', 'dnxte-divi-essential' ),
					'dnxt-hover-pulse-grow'             =>  esc_html__( 'Pulse Grow', 'dnxte-divi-essential' ),
					'dnxt-hover-pulse-shrink'           =>  esc_html__( 'Pulse Shrink', 'dnxte-divi-essential' ),
					'dnxt-hover-push'                   =>  esc_html__( 'Push', 'dnxte-divi-essential' ),
					'dnxt-hover-rotate'                 =>  esc_html__( 'Rotate', 'dnxte-divi-essential' ),
					'dnxt-hover-shrink'                 =>  esc_html__( 'Shrink', 'dnxte-divi-essential' ),
					'dnxt-hover-sink'                   =>  esc_html__( 'Sink', 'dnxte-divi-essential' ),
					'dnxt-hover-skew'                   =>  esc_html__( 'Skew', 'dnxte-divi-essential' ),
					'dnxt-hover-skew-backward'          =>  esc_html__( 'Skew Backward', 'dnxte-divi-essential' ),
					'dnxt-hover-skew-forward'           =>  esc_html__( 'Skew Forward', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-bottom'          =>  esc_html__( 'Wobble Bottom', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-horizontal'      =>  esc_html__( 'Wobble Horizontal', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-skew'            =>  esc_html__( 'Wobble Skew', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-top'             =>  esc_html__( 'Wobble Top', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-to-bottom-right' =>  esc_html__( 'Wobble To Bottom Right', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-to-top-right'    =>  esc_html__( 'Wobble To Top Right', 'dnxte-divi-essential' ),
					'dnxt-hover-wobble-vertical'        =>  esc_html__( 'Wobble Vertical', 'dnxte-divi-essential' ),
				),
				'depends_show_if' 	=> 'on',
			),
			// Button Hover Effect
			'dnxt_hover_bg'     => array(
				'label'             => esc_html__( 'Select Background Hover Effect', 'dnxte-divi-essential' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'button_hover',
				'sub_toggle'		=> 'sub_toggle_bg',
				'default'           => '',
				'description'       => esc_html__( 'Here you can adjust the hover effect.', 'dnxte-divi-essential' ),
				'options'           => array(
					''									=>  esc_html__( 'Select', 'dnxte-divi-essential' ),
					'dnxt-hover-fade'					=>  esc_html__( 'Fade', 'dnxte-divi-essential' ),
					'dnxt-hover-sweep-to-right'         =>  esc_html__( 'Sweep To Right', 'dnxte-divi-essential' ),
					'dnxt-hover-sweep-to-left'          =>  esc_html__( 'Sweep To Left', 'dnxte-divi-essential' ),
					'dnxt-hover-sweep-to-bottom'        =>  esc_html__( 'Sweep To Bottom', 'dnxte-divi-essential' ),
					'dnxt-hover-sweep-to-top'           =>  esc_html__( 'Sweep To Top', 'dnxte-divi-essential' ),
					'dnxt-hover-bounce-to-right'        =>  esc_html__( 'Bounce To Right', 'dnxte-divi-essential' ),
					'dnxt-hover-bounce-to-left'         =>  esc_html__( 'Bounce To Left', 'dnxte-divi-essential' ),
					'dnxt-hover-bounce-to-bottom'       =>  esc_html__( 'Bounce To Bottom', 'dnxte-divi-essential' ),
					'dnxt-hover-bounce-to-top'          =>  esc_html__( 'Bounce To Top', 'dnxte-divi-essential' ),
					'dnxt-hover-radial-out'             =>  esc_html__( 'Radial Out', 'dnxte-divi-essential' ),
					'dnxt-hover-radial-in'              =>  esc_html__( 'Radial In', 'dnxte-divi-essential' ),
					'dnxt-hover-rectangle-in'           =>  esc_html__( 'Rectangle In', 'dnxte-divi-essential' ),
					'dnxt-hover-rectangle-out'          =>  esc_html__( 'Rectangle Out', 'dnxte-divi-essential' ),
					'dnxt-hover-shutter-in-horizontal'  =>  esc_html__( 'Shutter In Horizontal', 'dnxte-divi-essential' ),
					'dnxt-hover-shutter-out-horizontal' =>  esc_html__( 'Shutter Out Horizontal', 'dnxte-divi-essential' ),
					'dnxt-hover-shutter-in-vertical'    =>  esc_html__( 'Shutter In Vertical', 'dnxte-divi-essential' ),
					'dnxt-hover-shutter-out-vertical'  =>  esc_html__( 'Shutter Out Vertical', 'dnxte-divi-essential' ),
				),
				'depends_show_if' 	=> 'on',
			),
			// Button BG Color
			'dnxt_radial_out_bg_color'        => array(
				'label'          => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Background.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_bg',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_bg' => 'dnxt-hover-radial-out',
				),
				'depends_show_if' 	=> 'on',
			),
			'dnxt_radial_in_bg_color'        => array(
				'label'          => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Background.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_bg',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_bg' => 'dnxt-hover-radial-in',
				),
			),
			'dnxt_rectangle_in_bg_color'        => array(
				'label'          => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Background.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_bg',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_bg' => 'dnxt-hover-rectangle-in',
				),
			),
			'dnxt_rectangle_out_bg_color'        => array(
				'label'          => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Background.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_bg',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_bg' => 'dnxt-hover-rectangle-out',
				),
			),
			'dnxt_shutter_in_bg_color'        => array(
				'label'          => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Background.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_bg',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_bg' => 'dnxt-hover-shutter-in-horizontal',
				),
			),
			'dnxt_shutter_out_bg_color'        => array(
				'label'          => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Background.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_bg',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_bg' => 'dnxt-hover-shutter-out-horizontal',
				),
			),
			'dnxt_shutter_in_v_bg_color'        => array(
				'label'          => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Background.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_bg',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_bg' => 'dnxt-hover-shutter-in-vertical',
				),
			),
			'dnxt_shutter_out_v_bg_color'        => array(
				'label'          => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Background.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_bg',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_bg' => 'dnxt-hover-shutter-out-vertical',
				),
			),
			// Button Hover BG Color
			'dnxt_hover_bg_color'        => array(
				'label'          => esc_html__('Select Background Hover Color', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_bg',
				'default'        => '#29c4a9',
				'depends_show_if' 	=> 'on',
			),
			// Button Hover Strock
			'dnxt_hover_border'     => array(
				'label'             => esc_html__( 'Select Stroke Hover Effect', 'dnxte-divi-essential' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'button_hover',
				'sub_toggle'		=> 'sub_toggle_border',
				'default'           => '',
				'description'       => esc_html__( 'Here you can adjust the hover effect.', 'dnxte-divi-essential' ),
				'options'           => array(
					''									=>  esc_html__( 'Select', 'dnxte-divi-essential' ),
					'dnxt-hover-trim'         			=>  esc_html__( 'Trim', 'dnxte-divi-essential' ),
					'dnxt-hover-ripple-out'         	=>  esc_html__( 'Ripple Out', 'dnxte-divi-essential' ),
					'dnxt-hover-ripple-in'        		=>  esc_html__( 'Ripple In', 'dnxte-divi-essential' ),
					'dnxt-hover-underline-from-left'    =>  esc_html__( 'Underline From Left', 'dnxte-divi-essential' ),
					'dnxt-hover-underline-from-center'  =>  esc_html__( 'Underline From Center', 'dnxte-divi-essential' ),
					'dnxt-hover-underline-from-right'   =>  esc_html__( 'Underline From Right', 'dnxte-divi-essential' ),
					'dnxt-hover-reveal'              	=>  esc_html__( 'Reveal', 'dnxte-divi-essential' ),
					'dnxt-hover-underline-reveal'       =>  esc_html__( 'Underline Reveal', 'dnxte-divi-essential' ),
					'dnxt-hover-overline-reveal'        =>  esc_html__( 'Overline Reveal', 'dnxte-divi-essential' ),
					'dnxt-hover-overline-from-left'  	=>  esc_html__( 'Overline From Left', 'dnxte-divi-essential' ),
					'dnxt-hover-overline-from-center' 	=>  esc_html__( 'Overline From Center', 'dnxte-divi-essential' ),
					'dnxt-hover-overline-from-right'    =>  esc_html__( 'Overline From Right', 'dnxte-divi-essential' ),
				),
				'depends_show_if' 	=> 'on',
			),
			'dnxt_hover_border_bg_color'        => array(
				'label'          => esc_html__('Select Background Hover Color', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => '#29c4a9',
				'depends_show_if' 	=> 'on',
			),
			// Button Trim Border Color
			'dnxt_trim_border_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-trim',
				),
			),
			// Button Hover Ripple Out Border Color
			'dnxt_ripple_out_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-ripple-out',
				),
			),
			// Button Hover Ripple In Border Color
			'dnxt_ripple_in_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-ripple-in',
				),
			),
			// Button Hover Underline From Left Border Color
			'dnxt_underline_from_left_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-underline-from-left',
				),
			),
			// Button Hover Underline From Center Border Color
			'dnxt_underline_from_center_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-underline-from-center',
				),
			),
			// Button Hover Underline From Right Border Color
			'dnxt_underline_from_right_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-underline-from-right',
				),
			),
			// Button Hover Overline From Left Border Color
			'dnxt_overline_left_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-overline-from-left',
				),
			),
			// Button Hover Overline From Center Border Color
			'dnxt_overline_center_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-overline-from-center',
				),
			),
			// Button Hover Overline From Right Border Color
			'dnxt_overline_right_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-overline-from-right',
				),
			),
			// Button Hover Reveal Border Color
			'dnxt_reveal_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-reveal',
				),
			),
			// Button Hover Underline Reveal Border Color
			'dnxt_underline_reveal_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-underline-reveal',
				),
			),
			// Button Hover Overline Reveal Border Color
			'dnxt_overline_reveal_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'         => array(
					'dnxt_hover_border' => 'dnxt-hover-overline-reveal',
				),
			),
			// Button Hover Overline Reveal Border Color
			'dnxt_overline_reveal_color'        => array(
				'label'          => esc_html__( 'Border Color', 'dnxte-divi-essential'),
				'description'    => esc_html__( 'The color of the Border.', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'button_hover',
				'sub_toggle'	 => 'sub_toggle_border',
				'default'        => 'rgba(0,0,0,0.3)',
				'show_if'        => array(
					'dnxt_hover_border' => 'dnxt-hover-overline-reveal',
				),
			),
			// Button Icons Hover Effect
			'dnxt_hover_icons'     => array(
				'label'             => esc_html__( 'Select Icons Hover Effect', 'dnxte-divi-essential' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'button_hover',
				'sub_toggle'		=> 'sub_toggle_icons',
				'default'           => '',
				'description'       => esc_html__( 'Here you can adjust the hover effect.', 'dnxte-divi-essential' ),
				'options'           => array(
					''									=>  esc_html__( 'Select', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-back'				=>  esc_html__( 'Icon Back', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-forward'       	=>  esc_html__( 'Icon Forward', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-down'         		=>  esc_html__( 'Icon Down', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-up'         		=>  esc_html__( 'Icon Up', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-drop'        		=>  esc_html__( 'Icon Drop', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-float-away'    	=>  esc_html__( 'Icon Float Away', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-sink-away'    		=>  esc_html__( 'Icon Sink Away', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-grow'  			=>  esc_html__( 'Icon Grow', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-shrink'   			=>  esc_html__( 'Icon Shrink', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-pulse'         	=>  esc_html__( 'Icon pulse', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-pulse-grow'    	=>  esc_html__( 'Icon Pulse Grow', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-pulse-shrink'  	=>  esc_html__( 'Icon Pulse Shrink', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-push'  			=>  esc_html__( 'Icon Push', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-pop' 				=>  esc_html__( 'Icon Pop', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-bounce'    		=>  esc_html__( 'Icon Bounce', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-rotate'    		=>  esc_html__( 'Icon Rotate', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-grow-rotate'   	=>  esc_html__( 'Icon Grow Rotate', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-float'    			=>  esc_html__( 'Icon Float', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-sink'    			=>  esc_html__( 'Icon Sink', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-bob'    			=>  esc_html__( 'Icon Bob', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-hang'    			=>  esc_html__( 'Icon Hang', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-wobble-horizontal' =>  esc_html__( 'Icon Wobble Horizontal', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-wobble-vertical'   =>  esc_html__( 'Icon Wobble Vertical', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-buzz'    			=>  esc_html__( 'Icon Buzz', 'dnxte-divi-essential' ),
					'dnxt-hover-icon-buzz-out'    		=>  esc_html__( 'Icon Buzz Out', 'dnxte-divi-essential' ),
				),
				'mobile_options'    => true,
				'depends_show_if' 	=> 'on',
			),
			// Img Zindex
			'img_zindex'		=>	array(
				'label'            => esc_html__( 'Image Z Index', 'dnxte-divi-essential' ),
				'type'             => 'range',
				'range_settings'   => array(
					'min'  => 0,
					'max'  => 999,
					'step' => 1,
				),
				'option_category'  => 'layout',
				'tab_slug'         => 'custom_css',
				'toggle_slug'      => 'dnxt_blurb_zindex',
				'hover'            => 'tabs',
				'description'      => esc_html__( 'Here you can control element position on the z axis. Elements with higher z-index values will sit atop elements with lower z-index values.', 'dnxte-divi-essential' ),
			),	
			// Icon Zindex
			'icon_zindex'		=>	array(
				'label'            => esc_html__( 'Icon Z Index', 'dnxte-divi-essential' ),
				'type'             => 'range',
				'range_settings'   => array(
					'min'  => 0,
					'max'  => 999,
					'step' => 1,
				),
				'option_category'  => 'layout',
				'tab_slug'         => 'custom_css',
				'toggle_slug'      => 'dnxt_blurb_zindex',
				'hover'            => 'tabs',
				'description'      => esc_html__( 'Here you can control element position on the z axis. Elements with higher z-index values will sit atop elements with lower z-index values.', 'dnxte-divi-essential' ),
			),
			// Heading Zindex
			'heading_zindex'		=>	array(
				'label'            => esc_html__( 'Heading Z Index', 'dnxte-divi-essential' ),
				'type'             => 'range',
				'range_settings'   => array(
					'min'  => 0,
					'max'  => 999,
					'step' => 1,
				),
				'option_category'  => 'layout',
				'tab_slug'         => 'custom_css',
				'toggle_slug'      => 'dnxt_blurb_zindex',
				'hover'            => 'tabs',
				'description'      => esc_html__( 'Here you can control element position on the z axis. Elements with higher z-index values will sit atop elements with lower z-index values.', 'dnxte-divi-essential' ),
			),
			// Button Zindex
			'button_zindex'		=>	array(
				'label'            => esc_html__( 'Button Z Index', 'dnxte-divi-essential' ),
				'type'             => 'range',
				'range_settings'   => array(
					'min'  => 0,
					'max'  => 999,
					'step' => 1,
				),
				'option_category'  => 'layout',
				'tab_slug'         => 'custom_css',
				'toggle_slug'      => 'dnxt_blurb_zindex',
				'hover'            => 'tabs',
				'description'      => esc_html__( 'Here you can control element position on the z axis. Elements with higher z-index values will sit atop elements with lower z-index values.', 'dnxte-divi-essential' ),
			),
			'dnxt_blurb_use_mask' => array(
                'label' => esc_html__('Use Image Mask', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'dnxt_blurb_image_mask',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
                    'dnxt_blurb_mask_shape',
                    'dnxt_blurb_mask_size',
                    'dnxt_blurb_image_horizontal',
                    'dnxt_blurb_image_vertical'
                ),
                'default_on_front' => 'off',
            ),
            'dnxt_blurb_mask_shape' => array(
                'label' => esc_html__('Select Shape', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the shape.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug' => 'dnxt_blurb_image_mask',
                'options' => array(
                    'none' => esc_html__('None', 'dnxte-divi-essential'),
                    'shape1' => esc_html__('Shape 1', 'dnxte-divi-essential'),
                    'shape2' => esc_html__('Shape 2', 'dnxte-divi-essential'),
                    'shape3' => esc_html__('Shape 3', 'dnxte-divi-essential'),
                    'shape4' => esc_html__('Shape 4', 'dnxte-divi-essential'),
                    'shape5' => esc_html__('Shape 5', 'dnxte-divi-essential'),
                    'shape6' => esc_html__('Shape 6', 'dnxte-divi-essential'),
                    'shape7' => esc_html__('Shape 7', 'dnxte-divi-essential'),
                    'shape8' => esc_html__('Shape 8', 'dnxte-divi-essential'),
                    'shape9' => esc_html__('Shape 9', 'dnxte-divi-essential'),
                    'shape10' => esc_html__('Shape 10', 'dnxte-divi-essential'),
                    'shape11' => esc_html__('Shape 11', 'dnxte-divi-essential'),
                    'shape12' => esc_html__('Shape 12', 'dnxte-divi-essential'),
                    'shape13' => esc_html__('Shape 13', 'dnxte-divi-essential'),
                    'shape14' => esc_html__('Shape 14', 'dnxte-divi-essential'),
                    'shape15' => esc_html__('Shape 15', 'dnxte-divi-essential'),
                ),
                'default' => 'none',
                'depends_show_if' => 'on'
            ),
            'dnxt_blurb_use_mask_upload' => array(
                'label' => esc_html__('Use Upload Mask', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'dnxt_blurb_image_mask',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
                    'dnxt_blurb_upload_mask',
                    'dnxt_blurb_mask_size',
                    'dnxt_blurb_image_horizontal',
                    'dnxt_blurb_image_vertical'
                ),
                'default_on_front' => 'off',
                'show_if' => array(
                    'dnxt_blurb_use_mask' => 'off'
                )
            ),
            'dnxt_blurb_upload_mask' => array(
                'label' => esc_html__("Upload Mask", 'dnxte-divi-essential'),
                'type' => 'upload',
                'toggle_slug' => 'dnxt_blurb_image_mask',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_html__('Upload a file', 'dnxte-divi-essential'),
                'choose_text' => esc_html__('Choose a file', 'dnxte-divi-essential'),
                'update_text' => esc_html__('Update file', 'dnxte-divi-essential'),
                'depends_show_if' => 'on'
            ),
            'dnxt_blurb_mask_size' => array(
                'label' => esc_html__('Select Mask Size', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the mask size.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug' => 'dnxt_blurb_image_mask',
                'options' => array(
                    'contain' => esc_html__('Contain', 'dnxte-divi-essential'),
                    'cover' => esc_html__('Cover', 'dnxte-divi-essential'),
                ),
                'default' => 'contain',
                'depends_show_if' => 'on',
            ),
            'dnxt_blurb_image_horizontal' => array(
                'label' => esc_html__('Image Horizontal Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the position of the image.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'toggle_slug' => 'dnxt_blurb_image_mask',
                'default' => '0',
                'default_on_front' => '0',
                'validate_unit' => false,
                'unitless'  => true,
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '-50',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
                'depends_show_if' => 'on'
            ),
            'dnxt_blurb_image_vertical' => array(
                'label' => esc_html__('Image Vertical Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the position of the image.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'toggle_slug' => 'dnxt_blurb_image_mask',
                'default' => '0',
                'default_on_front' => '0',
                'allow_empty' => true,
                'validate_unit' => false,
                'unitless' => true,
                'range_settings' => array(
                    'min' => '-50',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
                'depends_show_if' => 'on'
            ),
		);
	}

	public function get_advanced_fields_config() {
		$advanced_fields = array();
		$advanced_fields['fonts'] 	   = false;
		$advanced_fields = array(
			'fonts'                 => array(
				'dnxt_pre_header' => array(
					'label'    		=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   => 'dnxt_blurb_title_design',
					'sub_toggle'	=> 'sub_toggle_pre',
					'tab_slug'		=> 'advanced',
					'css'      => array(
						'main' => "%%order_class%% .dnxt-blurb-pre-heading",
						'hover' => "%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-pre-heading",
					),
				),
				'dnxt_heading' => array(
					'label'    		=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   => 'dnxt_blurb_title_design',
					'sub_toggle'	=> 'sub_toggle_heading',
					'tab_slug'		=> 'advanced',
					'css'      => array(
						'main' => "%%order_class%% .dnxt-blurb-heading",
						'hover' => "%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-heading",
					),
				),
				'dnxt_post_heading' => array(
					'label'    		=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   => 'dnxt_blurb_title_design',
					'sub_toggle'	=> 'sub_toggle_post',
					'tab_slug'		=> 'advanced',
					'css'      => array(
						'main' => "%%order_class%% .dnxt-blurb-post-heading",
						'hover' => "%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-post-heading",
					),
				),
				'dnxt_body'   => array(
					'label'          => esc_html__( 'Description', 'dnxte-divi-essential' ),
					'css'            => array(
						'main' => "%%order_class%% .dnxt-blurb-description",
						'hover' => "%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-description",
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'css'               => array(
							'main' => "%%order_class%% .dnxt-blurb-description",
							'hover' => "%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-description",
						),
					),
				),
				'dnxt_btn_text' => array(
					'label'    			=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   	=> 'dnxt_blurb_button_font',
					'tab_slug'			=> 'advanced',
					'css'      => array(
						'main' => "%%order_class%% .dnxt-button-wrapper .dnxt-blurb-btn",
						'hover' => "%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-button-wrapper .dnxt-blurb-btn",
						'text_align'  => "%%order_class%% .dnxt-button-wrapper",
					),
				),
			),
			'background'            => array(
				// 'css' => array(
				// 	'main' => '%%order_class%% .dnxt-blurb-wrapper-outer'
				// ),
				'settings' => array(
					'color' => 'alpha',
				),
			),
			'borders'               => array(
				'default' => array(
					'css' => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-blurb-wrapper-outer",
							'border_radii_hover'  	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-wrapper-outer',
							'border_styles' 		=> "%%order_class%% .dnxt-blurb-wrapper-outer",
							'border_styles_hover' 	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-wrapper-outer',
						),
					)
				),
				'font_icon_border'     => array(
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dnxt_blurb_icon_design',
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-blurb-icon span",
							'border_radii_hover'  	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-icon span',
							'border_styles' 		=> "%%order_class%% .dnxt-blurb-icon span",
							'border_styles_hover' 	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-icon span',
						),
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#2857b6',
							'style' => 'solid',
						),
					),
				),
				'dnxt_img_borders'     => array(
					'tab_slug'     		=> 'advanced',
					'toggle_slug'  		=> 'dnxt_blurb_image_design',
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-blurb-image img",
							'border_radii_hover'  	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-image img',
							'border_styles' 		=> "%%order_class%% .dnxt-blurb-image img",
							'border_styles_hover' 	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-image img',
						),
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#2857b6',
							'style' => 'solid',  
						),
					),
				),
				'dnxt_pre_borders'     => array(
					'tab_slug'     		=> 'advanced',
					'toggle_slug'  		=> 'dnxt_blurb_pre_border',
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-blurb-pre-heading",
							'border_radii_hover'  	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-pre-heading',
							'border_styles' 		=> "%%order_class%% .dnxt-blurb-pre-heading",
							'border_styles_hover' 	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-pre-heading',
						),
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#2857b6',
							'style' => 'solid',
						),
					),
				),
				'dnxt_header_borders'     => array(
					'tab_slug'     		=> 'advanced',
					'toggle_slug'  		=> 'dnxt_blurb_header_border',
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-blurb-heading",
							'border_radii_hover'  	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-heading',
							'border_styles' 		=> "%%order_class%% .dnxt-blurb-heading",
							'border_styles_hover' 	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-heading',
						),
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#2857b6',
							'style' => 'solid',
						),
					),
				),
				'dnxt_post_borders'     => array(
					'tab_slug'     		=> 'advanced',
					'toggle_slug'  		=> 'dnxt_blurb_post_border',
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-blurb-post-heading",
							'border_radii_hover'  	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-post-heading',
							'border_styles' 		=> "%%order_class%% .dnxt-blurb-post-heading",
							'border_styles_hover' 	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-post-heading',
						),
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#2857b6',
							'style' => 'solid',
						),
					),
				),
				'dnxt_body_borders'     => array(
					'tab_slug'     		=> 'advanced',
					'toggle_slug'  		=> 'dnxt_blurb_body_border',
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-blurb-container",
							'border_radii_hover'  	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-container',
							'border_styles' 		=> "%%order_class%% .dnxt-blurb-container",
							'border_styles_hover' 	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-container',
						),
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#2857b6',
							'style' => 'solid',
						),
					),
				),
				'dnxt_content_borders'     => array(
					'tab_slug'     		=> 'advanced',
					'toggle_slug'  		=> 'dnxt_blurb_content_border',
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-blurb-description",
							'border_radii_hover'  	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-description',
							'border_styles' 		=> "%%order_class%% .dnxt-blurb-description",
							'border_styles_hover' 	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-description',
						),
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#2857b6',
							'style' => 'solid',
						),
					),
				),
				'dnxt_button_borders'   => array(
					'tab_slug'     		=> 'advanced',
					'depends_on'      	=> array( 'dnxt_btn_show_hide' ),
					'depends_show_if' 	=> 'on',
					'toggle_slug'  		=> 'dnxt_blurb_button_border',
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-blurb-btn",
							'border_radii_hover'  	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-btn',
							'border_styles' 		=> "%%order_class%% .dnxt-blurb-btn",
							'border_styles_hover' 	=> '%%order_class%% .dnxt-blurb-wrapper-outer:hover .dnxt-blurb-btn',
						),
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#2857b6',
							'style' => 'solid',
						),
					),
				),
			),
			'box_shadow'            => array(
				'default' => array(
					'css' 	=> array(
						'main'	=> "%%order_class%% .dnxt-blurb-wrapper-outer"
					)
				),
				'dnxt_image_shadow'   => array(
					'label'               => esc_html__( 'Image Box Shadow', 'dnxte-divi-essential' ),
					'option_category'     => 'layout',
					'tab_slug'            => 'advanced',
					'toggle_slug'         => 'dnxt_blurb_image_design',
					'css'                 => array(
						'main'        => '%%order_class%% .dnxt-blurb-image img',
						'hover'       => '%%order_class%% .dnxt-blurb-wrapper-outer:hover:hover .dnxt-blurb-image img',
						'overlay'     => 'inset',
					),
					'default_on_fronts'  => array(
						'color'    => '',
						'position' => '',
					),
				),
				'dnxt_icon'   => array(
					'label'               => esc_html__( 'Icon Box Shadow', 'dnxte-divi-essential' ),
					'option_category'     => 'layout',
					'tab_slug'            => 'advanced',
					'toggle_slug'         => 'dnxt_blurb_icon_design',
					'css'                 => array(
						'main'        => '%%order_class%% .dnxt-blurb-icon span',
						'hover'       => '%%order_class%% .dnxt-blurb-wrapper-outer:hover:hover .dnxt-blurb-icon span',
						'overlay'     => 'inset',
					),
					'default_on_fronts'  => array(
						'color'    => '',
						'position' => '',
					),
				),
				'dnxt_description_boxshadow'   => array(
					'label'           => esc_html__( 'Description Box Shadow', 'dnxte-divi-essential' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dnxt_blurb_description_box_shadow',
					'css'             => array(
						'main'        => '%%order_class%% .dnxt-blurb-container',
						'hover'       => '%%order_class%% .dnxt-blurb-wrapper-outer:hover:hover .dnxt-blurb-container',
						'overlay'     => 'inset',
					),
					'default_on_fronts'  => array(
						'color'    => '',
						'position' => '',
					),
				),
				'dnxt_button_boxshadow'   => array(
					'label'               => esc_html__( 'Button Box Shadow', 'dnxte-divi-essential' ),
					'option_category'     => 'layout',
					'tab_slug'            => 'advanced',
					'toggle_slug'         => 'dnxt_blurb_button_box_shadow',
					'css'                 => array(
						'main'        => '%%order_class%% .dnxt-button-wrapper .dnxt-blurb-btn',
						'hover'       => '%%order_class%% .dnxt-blurb-wrapper-outer:hover:hover .dnxt-button-wrapper .dnxt-blurb-btn',
						'overlay'     => 'inset',
					),
					'default_on_fronts'  => array(
						'color'    => '',
						'position' => '',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main' => "%%order_class%% .dnxt-blurb-wrapper-outer",
					'important' => 'all',
				),
					
			),
			'height'	=> array(
				'css'	=> array(
					'main'	=> "%%order_class%% .dnxt-blurb-wrapper-outer"
				)
			),
			'text'                  => array(
				'use_background_layout' => true,
				'css'              => array(
					'text_shadow' => "%%order_class%% .et_pb_blurb_container",
				),
				'options' => array(
					'background_layout' => array(
						'default_on_front' => 'light',
						'hover' => 'tabs',
					),
					'text_orientation' => array(
						'default_on_front' => 'left',
					),
				),
			),
			'filters'              => array(
				'css'              => array(
					'main'  => '%%order_class%%',
				),
			),
			'button'              => false,
			'text'                => false,
		);
		return $advanced_fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		wp_enqueue_style( 'dnext_blurb' );
		wp_enqueue_style('dnext_hvr_common_css');
		wp_enqueue_script( 'dnext_svg_shape_frontend' );
		wp_enqueue_script('dnxtblrb_divinextblurb-public');
		$multi_view 						= et_pb_multi_view_options( $this );
		$blurb_pre_switch					= sanitize_text_field($this->props['blurb_pre_switch']);
		$blurbpreheading  					= sanitize_text_field($this->props['blurb_pre_heading']);
		$blurb_post_switch					= sanitize_text_field($this->props['blurb_post_switch']);
		$blurbpostheading 					= sanitize_text_field($this->props['blurb_post_heading']);
		$blurbheading 						= sanitize_text_field($this->props['blurb_heading']);
		$blurb_description					= $this->props['blurb_description'];
		
		$dnxt_blurb_image					= sanitize_text_field($this->props['dnxt_image']);
		$dnxt_blurb_alt						= sanitize_text_field($this->props['dnxt_alt']);

		$dnxt_image_max_width    			= sanitize_text_field($this->props['dnxt_image_max_width']);
		$dnxt_image_max_width_hover 	  	= $this->get_hover_value( 'dnxt_image_max_width' );
		$dnxt_image_max_width_tablet   		= sanitize_text_field($this->props['dnxt_image_max_width_tablet']);
		$dnxt_image_max_width_phone  		= sanitize_text_field($this->props['dnxt_image_max_width_phone']);
		$dnxt_image_max_width_last_edited  	= sanitize_text_field($this->props['dnxt_image_max_width_last_edited']);

		$dnxt_content_max_width				= sanitize_text_field($this->props['dnxt_content_max_width']);
		$dnxt_content_max_width_hover		= $this->get_hover_value('dnxt_content_max_width');
		$dnxt_content_max_width_tablet		= sanitize_text_field($this->props['dnxt_content_max_width_tablet']);
		$dnxt_content_max_width_phone		= sanitize_text_field($this->props['dnxt_content_max_width_phone']);
		$dnxt_content_max_width_last_edited	= sanitize_text_field($this->props['dnxt_content_max_width_last_edited']);

		$font_icon_size 					= sanitize_text_field($this->props['font_icon_size']);
		$font_icon_size_hover				= $this->get_hover_value('font_icon_size');
		$font_icon_size_tablet 				= sanitize_text_field($this->props['font_icon_size_tablet']);
		$font_icon_size_phone 				= sanitize_text_field($this->props['font_icon_size_phone']);
		$font_icon_size_last_edited 		= sanitize_text_field($this->props['font_icon_size_last_edited']);

		$dnxt_use_icon						= sanitize_text_field($this->props['dnxt_use_icon']);
		$pre_heading_tag					= sanitize_text_field($this->props['pre_heading_tag']);
		$heading_tag						= sanitize_text_field($this->props['heading_tag']);
		$post_heading_tag					= sanitize_text_field($this->props['post_heading_tag']);
		$button_link						= sanitize_text_field($this->props['button_link']);

		$use_shape = sanitize_text_field($this->props['dnxt_blurb_use_mask']);
        $use_mask_upload = sanitize_text_field($this->props['dnxt_blurb_use_mask_upload']);
        
        $shape_name = "on" == $use_shape && "none" != $this->props['dnxt_blurb_mask_shape'] ? sanitize_text_field($this->props['dnxt_blurb_mask_shape']) : "";
        $shape_size = sanitize_text_field($this->props['dnxt_blurb_mask_size']);
        $uploaded_mask = "on" == $use_mask_upload ? sanitize_text_field($this->props['dnxt_blurb_upload_mask']) : "";


		if ( '' !== $dnxt_image_max_width ) { 
			$dnxt_image_max_width_responsive_active = et_pb_get_responsive_status( $dnxt_image_max_width_last_edited );
		
			$dnxt_image_max_width_values = array(
				'desktop' => $dnxt_image_max_width,
				'tablet'  => $dnxt_image_max_width_responsive_active ? $dnxt_image_max_width_tablet : '',
				'phone'   => $dnxt_image_max_width_responsive_active ? $dnxt_image_max_width_phone : '',
			);
			$dnxt_image_max_width_selector	= "%%order_class%% .dnxt-blurb-image";
			et_pb_responsive_options()->generate_responsive_css( $dnxt_image_max_width_values, $dnxt_image_max_width_selector, 'max-width', $render_slug );
			
			if ( et_builder_is_hover_enabled( 'dnxt_image_max_width', $this->props ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dnxt-blurb-image:hover' ),
					'declaration' => sprintf(
						'max-width: %1$s;',
						esc_att( $dnxt_image_max_width_hover )
					),
				) );
			}
		}

		// Pre Heading
		if ( 'on' === $blurb_pre_switch ){
			$blurbpreheading = sprintf(
				'<%1$s class="dnxt-blurb-pre-heading">%2$s</%1$s>',
				esc_attr( $pre_heading_tag ),
				et_core_esc_previously( $blurbpreheading )
			);
		} else {
			$blurbpreheading = "";
		}

		// Post Heading
		if ( 'on' === $blurb_post_switch ) {
			$blurbpostheading = sprintf(
				'<%1$s class="dnxt-blurb-post-heading">%2$s</%1$s>',
				esc_attr( $post_heading_tag ),
				et_core_esc_previously( $blurbpostheading )
			);
		} else {
			$blurbpostheading = "";
		}

		// Heading
		if ( '' !== $blurbheading ){
			$blurbheading = sprintf(
				'<%1$s class="dnxt-blurb-heading">%2$s</%1$s>',
				esc_attr( $heading_tag ),
				et_core_esc_previously( $blurbheading )
			);
		}
		
		$description = "";
		if ( '' !== $blurb_description ) {
			$description = sprintf(
				'<div class="dnxt-blurb-description">%1$s</div>',
				$this->process_content($blurb_description)
			);
		}

		// Description
		if ( '' !== $dnxt_content_max_width ) { 
			$dnxt_content_max_width_style 		 	= sprintf( 'max-width: %1$s;', esc_attr( $dnxt_content_max_width ) );
			$dnxt_content_max_width_tablet_style 	= '' !== $dnxt_content_max_width_tablet ? sprintf( 'max-width: %1$s;', esc_attr( $dnxt_content_max_width_tablet ) ) : '';
			$dnxt_content_max_width_phone_style  	= '' !== $dnxt_content_max_width_phone ? sprintf( 'max-width: %1$s;', esc_attr( $dnxt_content_max_width_phone ) ) : '';
			
			$dnxt_content_max_width_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'dnxt_content_max_width', $this->props ) ) {
				$dnxt_content_max_width_style_hover = sprintf( 'max-width: %1$s;', esc_attr( $dnxt_content_max_width_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-container",
				'declaration' => $dnxt_content_max_width_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-container",
				'declaration' => $dnxt_content_max_width_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-container",
				'declaration' => $dnxt_content_max_width_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if ( '' !== $dnxt_content_max_width_style_hover ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dnxt-blurb-container' ),
					'declaration' => $dnxt_content_max_width_style_hover,
				) );
			}
		}



		if ( '' !== $font_icon_size ) {

			$font_icon_size_responsive_active = et_pb_get_responsive_status( $font_icon_size_last_edited );
			$font_icon_size_values = array(
				'desktop' => $font_icon_size,
				'tablet'  => $font_icon_size_responsive_active ? $font_icon_size_tablet : '',
				'phone'   => $font_icon_size_responsive_active ? $font_icon_size_phone : '',
			);

			$font_icon_size_selector = "%%order_class%% .dnxt-blurb-icon span";
			et_pb_responsive_options()->generate_responsive_css( $font_icon_size_values, $font_icon_size_selector, 'font-size', $render_slug );

			if ( et_builder_is_hover_enabled( 'font_icon_size', $this->props ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( '%%order_class%% .dnxt-blurb-icon span' ),
					'declaration' => sprintf(
						'font-size: %1$s;',
						esc_attr( $font_icon_size_hover )
					),
				) );
			}
		}
  		// Font Icon Color
		$font_icon_color		= $this->props['font_icon_color'];
		$font_icon_color_hover 	= $this->get_hover_value( 'font_icon_color' );
		$font_icon_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'font_icon_color' );
		$font_icon_color_tablet	= isset( $font_icon_color_values['tablet'] ) ? $font_icon_color_values['tablet'] : '';
		$font_icon_color_phone	= isset( $font_icon_color_values['phone'] ) ? $font_icon_color_values['phone'] : '';

		// Font Icon Color
		if ( '' !== $font_icon_color ) {
			$font_icon_color_style 		 	= sprintf( 'color: %1$s;', esc_attr( $font_icon_color ) );
			$font_icon_color_tablet_style 	= '' !== $font_icon_color_tablet ? sprintf( 'color: %1$s;', esc_attr( $font_icon_color_tablet ) ) : '';
			$font_icon_color_phone_style  	= '' !== $font_icon_color_phone ? sprintf( 'color: %1$s;', esc_attr( $font_icon_color_phone ) ) : '';
			
			$font_icon_color_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'font_icon_color', $this->props ) ) {
				$font_icon_color_style_hover = sprintf( 'color: %1$s;', esc_attr( $font_icon_color_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-icon span",
				'declaration' => $font_icon_color_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-icon span",
				'declaration' => $font_icon_color_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-icon span",
				'declaration' => $font_icon_color_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if ( "" !== $font_icon_color_style_hover ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxt-blurb-icon span" ),
					'declaration' => $font_icon_color_style_hover,
				) );
			}
		}

		// Font Icon BG Color
		$font_icon_bg_color			= $this->props['font_icon_bg_color'];
		$font_icon_bg_color_hover 	= $this->get_hover_value( 'font_icon_bg_color' );
		$font_icon_bg_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'font_icon_bg_color' );
		$font_icon_bg_color_tablet	= isset( $font_icon_bg_color_values['tablet'] ) ? $font_icon_bg_color_values['tablet'] : '';
		$font_icon_bg_color_phone	= isset( $font_icon_bg_color_values['phone'] ) ? $font_icon_bg_color_values['phone'] : '';

		if ( 'off' !== $this->props['use_font_icon_bg_color'] && 'off' !== $this->props['dnxt_use_icon'] ) {
			$font_icon_bg_color_style 		 	= sprintf( 'background-color: %1$s;', esc_attr( $font_icon_bg_color ) );
			$font_icon_bg_color_tablet_style 	= '' !== $font_icon_bg_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $font_icon_bg_color_tablet ) ) : '';
			$font_icon_bg_color_phone_style  	= '' !== $font_icon_bg_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $font_icon_bg_color_phone ) ) : '';
			
			$font_icon_bg_color_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'font_icon_bg_color', $this->props ) ) {
				$font_icon_bg_color_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $font_icon_bg_color_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-icon span",
				'declaration' => $font_icon_bg_color_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-icon span",
				'declaration' => $font_icon_bg_color_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-icon span",
				'declaration' => $font_icon_bg_color_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if ( "" !== $font_icon_bg_color_style_hover ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxt-blurb-icon span" ),
					'declaration' => $font_icon_bg_color_style_hover,
				) );
			}
		}

		// Icon Placement Setup
		$fonticonplace = '';
		$fontclass = '';
		if ( 'dnxt-blurb-wrapper-two-top-left' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-top-left';
			$fontclass = 'dnxt-blurb-icon-top-left';
		}else if ( 'dnxt-blurb-wrapper-two-top-center' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-top-center';
			$fontclass = 'dnxt-blurb-icon-top-center';
		}else if (  'dnxt-blurb-wrapper-two-top-right' === $this->props['font_icon_placement']  ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-top-right';
			$fontclass = 'dnxt-blurb-icon-top-right';
		}else if( 'dnxt-blurb-wrapper-two-left-top' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-left-top';
		}else if ( 'dnxt-blurb-wrapper-two-left-center' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-left-center';
		}else if ( 'dnxt-blurb-wrapper-two-left-bottom' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-left-bottom';
		}else if ( 'dnxt-blurb-wrapper-two-bottom-left' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-bottom-left';
			$fontclass = 'dnxt-blurb-icon-bottom-left';
		}else if ( 'dnxt-blurb-wrapper-two-bottom-center' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-bottom-center';
			$fontclass = 'dnxt-blurb-icon-bottom-center';
		}else if ( 'dnxt-blurb-wrapper-two-bottom-right' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-bottom-right';
			$fontclass = 'dnxt-blurb-icon-bottom-right';
		}else if ( 'dnxt-blurb-wrapper-two-right-top' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-right-top';
		}else if ( 'dnxt-blurb-wrapper-two-right-center' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-right-center';
		}else if ( 'dnxt-blurb-wrapper-two-right-bottom' === $this->props['font_icon_placement'] ) {
			$fonticonplace = 'dnxt-blurb-wrapper-two-right-bottom';
		}

		
		if(substr($this->props['image_placement'], 0 , strlen("right")) === "right" || substr($this->props['image_placement'], 0 , strlen("left")) === "left") {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-image",
				'declaration' => sprintf('width: %s',esc_attr('auto;')),
			) );
		}

		$image_placement = Common::get_alignment("image_placement",$this, "dnxt-blurb-wrapper-one");
		$img_class = Common::get_alignment("image_placement", $this, "dnxt-blurb-image");
		// Font Icon Styles.
		$icon_css_property = array(
			'selector'    => '%%order_class%% .dnxt-blurb-icon span',
			'class'       => 'et-pb-icon'
		);
		$font = Common::get_icon_html( 'dnxt_font_icon', $this, $render_slug, $multi_view, $icon_css_property );
		// Icon Font Size
		if ( 'off' !== $dnxt_use_icon ) {
			$fonticon = sprintf('<div class="dnxt-blurb-icon %1$s">%2$s</div>',
			esc_attr($fontclass),
			$font
		);
		} else {
			$fonticon = "";
		}
		
		$dnxt_hover_effect = '';
		if ( 'off' !== $this->props['blurb_hover_switch'] ) {
			$dnxt_hover_effect = esc_attr($this->props['dnxt_hover_effect']);
		}

		$button_text	= "";
		$rightItag		= '';
		$leftItag 		= '';
		$button 		= '';
		$icon_two_css_property = array(
			'selector'    => '%%order_class%% .dnxt-btn-icon i',
			'class'       => 'et-pb-icon'
		);
		
		if ( 'off' !== $this->props['dnxt_btn_show_hide'] ) {
			$button_text = esc_attr($this->props['button_text']);

			if ( 'right' === $this->props['btn_icon_placement'] ) {
				$rightItag = Common::get_icon_html( 'btn_icon', $this, $render_slug, $multi_view, $icon_two_css_property, 'i' );
			}else if ( 'left' === $this->props['btn_icon_placement'] ) {
				$leftItag = Common::get_icon_html( 'btn_icon', $this, $render_slug, $multi_view, $icon_two_css_property, 'i' );
			}

			// Button Hover 2d
			$btnHover2d = '';
			if ( '' !== $this->props['dnxt_hover_2d'] ) {
				$btnHover2d = esc_attr($this->props['dnxt_hover_2d']);
			}

			// Button Hover Background
			$btnHoverBg = '';
			if ( '' !== $this->props['dnxt_hover_bg'] ) {
				$btnHoverBg = esc_attr($this->props['dnxt_hover_bg']);
			}

			// Button Hover Stock
			$btnHoverBorder = '';
			if ( '' !== $this->props['dnxt_hover_border'] ) {
				$btnHoverBorder = esc_attr($this->props['dnxt_hover_border']);
			}

			// Button Hover Icons
			$btnHoverIcons = '';
			if ( '' !== $this->props['dnxt_hover_icons'] ) {
				$btnHoverIcons = esc_attr($this->props['dnxt_hover_icons']);
			}
			
			//Button On Hover class inner
			$btnIconOnHover = 'off' === $this->props['btn_on_hover'] ? "dnxt-btn-icon-on-hover" : "";
			
			$buttonTarget = 'on' === $this->props['button_link_new_window'] ? '_blank' : '';

			$button = '<div class="dnxt-button-wrapper"><a href="'.esc_url($button_link).'" class="dnxt-blurb-btn dnxt-btn-icon '.esc_attr($btnIconOnHover).'  '.esc_attr($btnHover2d).' '.esc_attr($btnHoverBg).' '.esc_attr($btnHoverBorder).' '.esc_attr($btnHoverIcons).' '.esc_attr($dnxt_hover_effect) .'" target="'.esc_attr($buttonTarget).'">'.$leftItag.$button_text.$rightItag.'</a></div>';
		}

		// Tilt Effect
		$max_glare_value 	= sanitize_text_field($this->props['dnxt_tilt_max_glare']);
		$tilt_reverse		= sanitize_text_field($this->props['dnxt_tilt_reverse']);
		$tilt_perspective	= sanitize_text_field($this->props['dnxt_tilt_perspective']);
		$tilt_max			= sanitize_text_field($this->props['dnxt_tilt_max']);
		$tilt_speed			= sanitize_text_field($this->props['dnxt_tilt_speed']);
		$tilt_startx		= sanitize_text_field($this->props['dnxt_tilt_startx']);
		$tilt_starty		= sanitize_text_field($this->props['dnxt_tilt_starty']);
		$tilt_scale			= sanitize_text_field($this->props['dnxt_tilt_scale']);

		$tilt_enable = "";
		$tilt_glare_enable = "";
		$tilt_max_glare_value = "";
		$tilt = "";

		if ( 'off' !== $this->props['dnxt_blurb_tilt_switch'] ) {
			$tilt_enable = 'data-tilt';
			if ('off' !== $this->props['dnxt_blurb_tilt_glare']){
				$tilt_glare_enable = "data-tilt-glare";
				$tilt_max_glare_value = 'data-tilt-max-glare="'.intval($max_glare_value).'"';
			}

			if ('off' !== $tilt_reverse) {
				$tilt_reverse_value = 'true';
			}else if('on' !== $tilt_reverse) {
				$tilt_reverse_value = 'false';
			}

			$tilt = 'data-tilt-reverse="'.$tilt_reverse_value.'" data-tilt-perspective="'.intval($tilt_perspective).'" data-tilt-max="'.intval($tilt_max).'" data-tilt-speed="'.intval($tilt_speed).'" data-tilt-startX="'.intval($tilt_startx).'" data-tilt-startY="'.intval($tilt_starty).'" data-tilt-scale="'.intval($tilt_scale).'"';
		}

		// Handle svg image behaviour
		$dnxt_blurb_image_pathinfo 	= pathinfo( $dnxt_blurb_image );
		$is_dnxt_blurb_image_svg 	= isset( $dnxt_blurb_image_pathinfo['extension'] ) ? 'svg' === $dnxt_blurb_image_pathinfo['extension'] : false;
		

		

		$image_html = Common::get_image_html(
			'dnxt_image', // image_slug
			$dnxt_blurb_alt, // alt_text
			'', // title
			$multi_view, // multi_view
			$this, // context
			'img-fluid'
		);


		// Blurb Image
		$dnxt_image = sprintf(
			'<div class="dnxt-blurb-image %2$s" data-svg-shape="%3$s" data-shape-size="%4$s" data-use-upload="%5$s" data-uploaded-mask="%6$s">%1$s</div>',
			$image_html,
			esc_attr($img_class),
			esc_attr($shape_name),
			esc_attr($shape_size),
			esc_attr($use_mask_upload),
			$uploaded_mask
		);
		
		$positionArr = array(
            "horizontal_slug" => "dnxt_blurb_image_horizontal",
            "vertical_slug"=> "dnxt_blurb_image_vertical",
            "css_selector" => array(
                "desktop" => '%%order_class%% .dnxt-blurb-image img',
                "hover" => '%%order_class%% .dnxt-blurb-image img:hover'
            ),
            "use_shape" => $use_shape,
            "use_mask_upload" => $use_mask_upload,
        );
		
        Common::shape_image_position($positionArr, $render_slug, $this);

		// Background layout data attributes.
		$data_background_layout = et_pb_background_layout_options()->get_background_layout_attrs( $this->props );

		$this->apply_css($render_slug);
		
		return sprintf( 
			'<div class="dnxt-blurb-wrapper-outer %14$s" %10$s %11$s %12$s %13$s>
				<div class="dnxt-blurb-wrapper %7$s">
					%5$s
					<div class="%6$s">
						%8$s
						<div class="dnxt-blurb-container">
							<div class="dnxt-blurb-heading-wrapper">
								%2$s
								%1$s
								%3$s
							</div>
							%4$s
							%9$s
						</div>
					</div>
				</div>
			</div>', 
			$blurbheading,
			$blurbpreheading,
			$blurbpostheading,
			wpautop($description),
			$dnxt_image, // #5
			$fonticonplace,
			$image_placement,
			$fonticon,
			$button, // #9
			$tilt_enable,
			$tilt_glare_enable,
			$tilt_max_glare_value, // #12
			$tilt,
			$dnxt_hover_effect // #14
		);
	}

	public function apply_css($render_slug){

		/**
         * Custom Padding Margin Output
         *
        */

        Common::dnxt_set_style($render_slug, $this->props, "dnxt_img_margin", "%%order_class%% .dnxt-blurb-image", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxt_img_padding", "%%order_class%% .dnxt-blurb-image", "padding");

        Common::dnxt_set_style($render_slug, $this->props, "dnxt_icon_margin", "%%order_class%% .dnxt-blurb-icon", "margin");
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_icon_padding", "%%order_class%% .dnxt-blurb-icon span", "padding");
		
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_pre_margin", "%%order_class%% .dnxt-blurb-pre-heading", "margin");
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_pre_padding", "%%order_class%% .dnxt-blurb-pre-heading", "padding");
		
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_header_margin", "%%order_class%% .dnxt-blurb-heading", "margin");
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_header_padding", "%%order_class%% .dnxt-blurb-heading", "padding");
		
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_post_margin", "%%order_class%% .dnxt-blurb-post-heading", "margin");
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_post_padding", "%%order_class%% .dnxt-blurb-post-heading", "padding");
		
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_body_margin", "%%order_class%% .dnxt-blurb-container", "margin");
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_body_padding", "%%order_class%% .dnxt-blurb-container", "padding");
		
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_content_margin", "%%order_class%% .dnxt-blurb-description", "margin");
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_content_padding", "%%order_class%% .dnxt-blurb-description", "padding");
		
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_button_margin", "%%order_class%% .dnxt-blurb-btn", "margin");
		Common::dnxt_set_style($render_slug, $this->props, "dnxt_button_padding", "%%order_class%% .dnxt-blurb-btn", "padding");
		
		// Button Background One
		$button_bg_one             		= '';
		$bg_one_gradient_apply          = '';
		$bg_one_gradient_color_one 		= '';
		$bg_one_gradient_color_two 		= '';
		$bg_one_gradient_type	   		= '';
		$btn_bg_one_gl             		= '';
		$btn_bg_one_gr             		= '';
		$bg_one_gradient_start_position = '';
		$bg_one_gradient_end_position   = '';

		// Button color
		if ('' !== $this->props['button_bg_one']) {
			$button_bg_one = $this->props['button_bg_one'];
		}

		// checking gradient type
		if ('' !== $this->props['bg_one_gradient_type']) {
			$bg_one_gradient_type = $this->props['bg_one_gradient_type'];
		}

		// Button Linear Gradient Direction
		if ('' !== $this->props['bg_one_gradient_type_linear_direction']) {
			$btn_bg_one_gl = $this->props['bg_one_gradient_type_linear_direction'];
		}

		// Button Radial Gradient Direction
		if ('' !== $this->props['bg_one_gradient_type_radial_direction']) {
			$btn_bg_one_gr = $this->props['bg_one_gradient_type_radial_direction'];
		}
			
		// Apply gradient direcion
		if ('radial-gradient' === $this->props['bg_one_gradient_type']) {
			$bg_one_gradient_apply = sprintf('%1$s', $btn_bg_one_gr);
		} else if ('linear-gradient' === $this->props['bg_one_gradient_type']) {
			$bg_one_gradient_apply = sprintf('%1$s', $btn_bg_one_gl);
		}

		// Gradient color one for button
		if ('' !== $this->props['bg_one_gradient_color_one']) {
			$bg_one_gradient_color_one = $this->props['bg_one_gradient_color_one'];
		}

		// Gradient color two for button 
		if ('' !== $this->props['bg_one_gradient_color_two']) {
			$bg_one_gradient_color_two = $this->props['bg_one_gradient_color_two'];
		}

		// Button Gradient color start position 
		if ('' !== $this->props['bg_one_gradient_start_position']) {
			$bg_one_gradient_start_position = $this->props['bg_one_gradient_start_position'];
		}

		// Button Gradient color end position
		if ('' !== $this->props['bg_one_gradient_end_position']) {
			$bg_one_gradient_end_position = $this->props['bg_one_gradient_end_position'];
		}
		// Button Color
		if ('on' === $this->props['btn_one_show_hide']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-button-wrapper .dnxt-blurb-btn",
				'declaration' => sprintf('background-color: %1$s;',esc_attr($button_bg_one)),
			) );
		}
		// Button Gradient setting up
		$button_declaration = sprintf(
			'background: %s(%s, %s %s, %s %s);',
			esc_html($bg_one_gradient_type),
			esc_html($bg_one_gradient_apply),
			esc_html($bg_one_gradient_color_one),
			esc_html($bg_one_gradient_start_position),
			esc_html($bg_one_gradient_color_two),
			esc_html($bg_one_gradient_end_position)
		);
		if ('on' === $this->props['btn_one_gradient_show_hide']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-button-wrapper .dnxt-blurb-btn",
				'declaration' => $button_declaration,
			) );
		}

		// Heading Background
		$heading_gradient_apply         = '';
		$heading_gradient_color_one 	= '';
		$heading_gradient_color_two 	= '';
		$heading_gradient_type	   		= '';
		$heading_gl             		= '';
		$heading_gr             		= '';
		$heading_gradient_start_position= '';
		$heading_gradient_end_position  = '';

		// Checking Heading Background Gradient Type
		if ('' !== $this->props['heading_gradient_type']) {
			$heading_gradient_type = $this->props['heading_gradient_type'];
		}
		// Heading Linear Gradient Direction
		if ('' !== $this->props['heading_gradient_type_linear_direction']) {
			$heading_gl = $this->props['heading_gradient_type_linear_direction'];
		}

		// Heading Radial Gradient Direction
		if ('' !== $this->props['heading_gradient_type_radial_direction']) {
			$heading_gr = $this->props['heading_gradient_type_radial_direction'];
		}
			
		// Apply Heading gradient direcion
		if ( 'radial-gradient' === $this->props['heading_gradient_type'] ) {
			$heading_gradient_apply = sprintf('%1$s', $heading_gr);
		} else if ( 'linear-gradient' === $this->props['heading_gradient_type'] ) {
			$heading_gradient_apply = sprintf('%1$s', $heading_gl);
		}

		// Heading Gradient color one for content
		if ( '' !== $this->props['heading_gradient_color_one'] ) {
			$heading_gradient_color_one = $this->props['heading_gradient_color_one'];
		}

		// Heading Gradient color two for content 
		if ( '' !== $this->props['heading_gradient_color_two'] ) {
			$heading_gradient_color_two = $this->props['heading_gradient_color_two'];
		}

		// Heading Gradient color start position 
		if ( '' !== $this->props['heading_gradient_start_position'] ) {
			$heading_gradient_start_position = $this->props['heading_gradient_start_position'];
		}

		// Heading Gradient color end position
		if ( '' !== $this->props['heading_gradient_end_position'] ) {
			$heading_gradient_end_position = $this->props['heading_gradient_end_position'];
		}

		// Heading Gradient setting up
		$heading_declaration = sprintf(
			'background: %s(%s, %s %s, %s %s);',
			esc_html($heading_gradient_type),
			esc_html($heading_gradient_apply),
			esc_html($heading_gradient_color_one),
			esc_html($heading_gradient_start_position),
			esc_html($heading_gradient_color_two),
			esc_html($heading_gradient_end_position)
		);
		if ( 'off' !== $this->props['heading_gradient_show_hide'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-heading-wrapper",
				'declaration' => $heading_declaration,
			) );
		}

		// Heading BG Color
		$heading_bg_color			= $this->props['heading_bg'];
		$heading_bg_color_hover 	= $this->get_hover_value( 'heading_bg' );
		$heading_bg_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'heading_bg' );
		$heading_bg_color_tablet	= isset( $heading_bg_color_values['tablet'] ) ? $heading_bg_color_values['tablet'] : '';
		$heading_bg_color_phone		= isset( $heading_bg_color_values['phone'] ) ? $heading_bg_color_values['phone'] : '';

		if ( 'off' !== $this->props['heading_bg_show_hide'] ) {
			$heading_bg_color_style 		= sprintf( 'background-color: %1$s;', esc_attr( $heading_bg_color) );
			$heading_bg_color_tablet_style 	= '' !== $heading_bg_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $heading_bg_color_tablet ) ) : '';
			$heading_bg_color_phone_style  	= '' !== $heading_bg_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $heading_bg_color_phone) ) : '';
			
			$heading_bg_color_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'heading_bg', $this->props ) ) {
				$heading_bg_color_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $heading_bg_color_hover ));
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-heading-wrapper",
				'declaration' => $heading_bg_color_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-heading-wrapper",
				'declaration' => $heading_bg_color_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-heading-wrapper",
				'declaration' => $heading_bg_color_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if ( "" !== $heading_bg_color_style_hover ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxt-blurb-heading-wrapper:hover" ),
					'declaration' => $heading_bg_color_style_hover,
				) );
			}
		}

		// Content Background
		$content_gradient_apply         = '';
		$content_gradient_color_one 	= '';
		$content_gradient_color_two 	= '';
		$content_gradient_type	   		= '';
		$content_gl             		= '';
		$content_gr             		= '';
		$content_gradient_start_position= '';
		$content_gradient_end_position  = '';

		// Checking Content Background Gradient Type
		if ('' !== $this->props['content_gradient_type']) {
			$content_gradient_type = $this->props['content_gradient_type'];
		}
		// Content Linear Gradient Direction
		if ('' !== $this->props['content_gradient_type_linear_direction']) {
			$content_gl = $this->props['content_gradient_type_linear_direction'];
		}

		// Content Radial Gradient Direction
		if ('' !== $this->props['content_gradient_type_radial_direction']) {
			$content_gr = $this->props['content_gradient_type_radial_direction'];
		}
			
		// Apply Content gradient direcion
		if ( 'radial-gradient' === $this->props['content_gradient_type'] ) {
			$content_gradient_apply = sprintf('%1$s', $content_gr);
		} else if ( 'linear-gradient' === $this->props['content_gradient_type'] ) {
			$content_gradient_apply = sprintf('%1$s', $content_gl);
		}

		// Content Gradient color one for content
		if ( '' !== $this->props['content_gradient_color_one'] ) {
			$content_gradient_color_one = $this->props['content_gradient_color_one'];
		}

		// Content Gradient color two for content 
		if ( '' !== $this->props['content_gradient_color_two'] ) {
			$content_gradient_color_two = $this->props['content_gradient_color_two'];
		}

		// Content Gradient color start position 
		if ( '' !== $this->props['content_gradient_start_position'] ) {
			$content_gradient_start_position = $this->props['content_gradient_start_position'];
		}

		// Content Gradient color end position
		if ( '' !== $this->props['content_gradient_end_position'] ) {
			$content_gradient_end_position = $this->props['content_gradient_end_position'];
		}

		// Content Gradient setting up
		$content_declaration = sprintf(
			'background: %s(%s, %s %s, %s %s);',
			esc_html($content_gradient_type),
			esc_html($content_gradient_apply),
			esc_html($content_gradient_color_one),
			esc_html($content_gradient_start_position),
			esc_html($content_gradient_color_two),
			esc_html($content_gradient_end_position)
		);
		if ( 'off' !== $this->props['content_gradient_show_hide'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-container",
				'declaration' => $content_declaration,
			) );
		}

		// Content BG Color
		$content_bg_color			= $this->props['content_bg'];
		$content_bg_color_hover 	= $this->get_hover_value( 'content_bg' );
		$content_bg_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'content_bg' );
		$content_bg_color_tablet	= isset( $content_bg_color_values['tablet'] ) ? $content_bg_color_values['tablet'] : '';
		$content_bg_color_phone		= isset( $content_bg_color_values['phone'] ) ? $content_bg_color_values['phone'] : '';

		if ( 'off' !== $this->props['content_bg_show_hide'] ) {
			$content_bg_color_style 		= sprintf( 'background-color: %1$s;', esc_attr( $content_bg_color ) );
			$content_bg_color_tablet_style 	= '' !== $content_bg_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $content_bg_color_tablet ) ) : '';
			$content_bg_color_phone_style  	= '' !== $content_bg_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $content_bg_color_phone ) ) : '';
			
			$content_bg_color_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'content_bg', $this->props ) ) {
				$content_bg_color_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $content_bg_color_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-container",
				'declaration' => $content_bg_color_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-container",
				'declaration' => $content_bg_color_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-container",
				'declaration' => $content_bg_color_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if ( "" !== $content_bg_color_style_hover ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxt-blurb-container:hover" ),
					'declaration' => $content_bg_color_style_hover,
				) );
			}
		}

		// Background Image Background
		$bg_img_gradient_apply      	= '';
		$bg_img_gradient_color_one 		= '';
		$bg_img_gradient_color_two 		= '';
		$bg_img_gradient_type	   		= '';
		$bg_img_gl             			= '';
		$bg_img_gr             			= '';
		$bg_img_gradient_start_position	= '';
		$bg_img_gradient_end_position  	= '';

		// checking gradient type
		if ( '' !== $this->props['bg_img_gradient_type'] ) {
			$bg_img_gradient_type = $this->props['bg_img_gradient_type'];
		}

		// Background Image Linear Gradient Direction
		if ( '' !== $this->props['bg_img_gradient_type_linear_direction'] ) {
			$bg_img_gl = $this->props['bg_img_gradient_type_linear_direction'];
		}

		// Background Image Radial Gradient Direction
		if ( '' !== $this->props['bg_img_gradient_type_radial_direction'] ) {
			$bg_img_gr = $this->props['bg_img_gradient_type_radial_direction'];
		}
			
		// Apply gradient direcion
		if ( 'radial-gradient' === $this->props['bg_img_gradient_type'] ) {
			$bg_img_gradient_apply = sprintf('%1$s', $bg_img_gr);
		} else if ('linear-gradient' === $this->props['bg_img_gradient_type']) {
			$bg_img_gradient_apply = sprintf('%1$s', $bg_img_gl);
		}

		// Gradient color one for Background Image
		if ( '' !== $this->props['bg_img_gradient_color_one'] ) {
			$bg_img_gradient_color_one = $this->props['bg_img_gradient_color_one'];
		}
		// Gradient color two for Background Image
		if ( '' !== $this->props['bg_img_gradient_color_two'] ) {
			$bg_img_gradient_color_two = $this->props['bg_img_gradient_color_two'];
		}
		// Background Image Gradient color start position 
		if ( '' !== $this->props['bg_img_gradient_start_position'] ) {
			$bg_img_gradient_start_position = $this->props['bg_img_gradient_start_position'];
		}
		// Background Image Gradient color end position
		if ( '' !== $this->props['bg_img_gradient_end_position'] ) {
			$bg_img_gradient_end_position = $this->props['bg_img_gradient_end_position'];
		}

		// 
		
		$bg_img_declaration = sprintf(
			'background: %s(%s, %s %s, %s %s);',
			esc_html($bg_img_gradient_type),
			esc_html($bg_img_gradient_apply),
			esc_html($bg_img_gradient_color_one),
			esc_html($bg_img_gradient_start_position),
			esc_html($bg_img_gradient_color_two),
			esc_html($bg_img_gradient_end_position)
		);
		if ( 'on' === $this->props['bg_img_gradient_show_hide'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-image",
				'declaration' => $bg_img_declaration,
			) );
		}

	 // Image BG Color
	$image_bg_color			= $this->props['image_bg_color'];
	$image_bg_color_hover 	= $this->get_hover_value( 'image_bg_color' );
	$image_bg_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'image_bg_color' );
	$image_bg_color_tablet	= isset( $image_bg_color_values['tablet'] ) ? $image_bg_color_values['tablet'] : '';
	$image_bg_color_phone	= isset( $image_bg_color_values['phone'] ) ? $image_bg_color_values['phone'] : '';

	if ( 'off' !== $this->props['use_image_bg_color'] ) {
		$image_bg_color_style 		    = sprintf( 'background-color: %1$s;', esc_attr( $image_bg_color ) );
		$image_bg_color_tablet_style 	= '' !== $image_bg_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $image_bg_color_tablet ) ) : '';
		$image_bg_color_phone_style  	= '' !== $image_bg_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $image_bg_color_phone ) ) : '';
		
		$image_bg_color_style_hover  = '';

		if ( et_builder_is_hover_enabled( 'image_bg_color', $this->props ) ) {
			$image_bg_color_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $image_bg_color_hover ) );
		}

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .dnxt-blurb-image",
			'declaration' => $image_bg_color_style,
		) );
		
		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .dnxt-blurb-image",
			'declaration' => $image_bg_color_tablet_style,
			'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
		) );

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .dnxt-blurb-image",
			'declaration' => $image_bg_color_phone_style,
			'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
		) );

		if ( "" !== $image_bg_color_style_hover ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxt-blurb-image" ),
				'declaration' => $image_bg_color_style_hover,
			) );
		}
	}

		// Background Icon Gradient
		$font_icon_gradient_apply      		= '';
		$font_icon_gradient_color_one 		= '';
		$font_icon_gradient_color_two 		= '';
		$font_icon_gradient_type	   		= '';
		$font_icon_gl             			= '';
		$font_icon_gr             			= '';
		$font_icon_gradient_start_position	= '';
		$font_icon_gradient_end_position  	= '';

		// checking gradient type
		if ( '' !== $this->props['font_icon_gradient_type'] ) {
			$font_icon_gradient_type = $this->props['font_icon_gradient_type'];
		}
		// Background Image Linear Gradient Direction
		if ( '' !== $this->props['font_icon_gradient_type_linear_direction'] ) {
			$font_icon_gl = $this->props['font_icon_gradient_type_linear_direction'];
		}

		// Background Image Radial Gradient Direction
		if ( '' !== $this->props['font_icon_gradient_type_radial_direction'] ) {
			$font_icon_gr = $this->props['font_icon_gradient_type_radial_direction'];
		}	
		// Apply gradient direcion
		if ( 'radial-gradient' === $this->props['font_icon_gradient_type'] ) {
			$font_icon_gradient_apply = sprintf('%1$s', $font_icon_gr);
		} else if ( 'linear-gradient' === $this->props['font_icon_gradient_type'] ) {
			$font_icon_gradient_apply = sprintf('%1$s', $font_icon_gl);
		}

		// Gradient color one for Background Image
		if ( '' !== $this->props['font_icon_gradient_color_one'] ) {
			$font_icon_gradient_color_one = $this->props['font_icon_gradient_color_one'];
		}
		// Gradient color two for Background Image
		if ( '' !== $this->props['font_icon_gradient_color_two'] ) {
			$font_icon_gradient_color_two = $this->props['font_icon_gradient_color_two'];
		}
		// Background Image Gradient color start position 
		if ( '' !== $this->props['font_icon_gradient_start_position'] ) {
			$font_icon_gradient_start_position = $this->props['font_icon_gradient_start_position'];
		}
		// Background Image Gradient color end position
		if ( '' !== $this->props['font_icon_gradient_end_position'] ) {
			$font_icon_gradient_end_position = $this->props['font_icon_gradient_end_position'];
		}
		// Icon Gradient setting up
		$front_icon_declaration = sprintf(
			'background: %s(%s, %s %s, %s %s);',
			esc_html($font_icon_gradient_type),
			esc_html($font_icon_gradient_apply),
			esc_html($font_icon_gradient_color_one),
			esc_html($font_icon_gradient_start_position),
			esc_html($font_icon_gradient_color_two),
			esc_html($font_icon_gradient_end_position)
		);
		if ( 'off' !== $this->props['use_font_icon_gradient_show_hide'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-icon span",
				'declaration' => $front_icon_declaration,
			) );
		}

		// Icon Placement
		if ( 'right' === $this->props['font_icon_placement'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    	=> "%%order_class%% .dnxt-blurb-icon span",
				'declaration'	=> sprintf('align-self: %1$s',esc_attr('flex-end;'))
			) );
		}else if( 'center' === $this->props['font_icon_placement'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    	=> "%%order_class%% .dnxt-blurb-icon span",
				'declaration'	=> sprintf('align-self: %1$s',esc_attr('center;'))
			) );
		}else if( 'left' === $this->props['font_icon_placement'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    	=> "%%order_class%% .dnxt-blurb-icon span",
				'declaration'	=> sprintf('align-self: %1$s',esc_attr('flex-start;'))
			) );
		}

		if( "on" === $this->props['btn_show_hide'] ) {
			
			// Button Icon Color
			if ( '' !== $this->props['btn_icon_color'] ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% .dnxt-btn-icon i",
					'declaration' => sprintf('color: %1$s;', esc_attr($this->props['btn_icon_color']))
				) );
			}
			// Button Icon Color Hover
			$btn_icon_color_hover = isset($this->props['btn_icon_color__hover_enabled']) ? "on|hover" : "off|hover";

			if ( "on|hover" === $btn_icon_color_hover ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% .dnxt-btn-icon:hover i",
					'declaration' => sprintf('color: %1$s;', esc_attr($this->props['btn_icon_color__hover']))
				) );
			}

			// Button Icon On Hover
			if ( 'on' === $this->props['btn_on_hover'] && 'right' === $this->props['btn_icon_placement'] ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% .dnxt-btn-icon:hover i",
					'declaration' => sprintf('opacity: %s; visibility: %s; margin-left: %s; padding-left: %s;',esc_attr('1'), esc_attr('visible'),esc_attr('0'),esc_attr('0.4em;')),
				) );
			}else if( 'on' === $this->props['btn_on_hover'] ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% .dnxt-btn-icon:hover i",
					'declaration' => sprintf('opacity: %s;visibility: %s;',esc_attr('1'), esc_attr('visible')),
				) );
			}
			if ( 'on' === $this->props['btn_on_hover'] && 'left' === $this->props['btn_icon_placement'] ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% .dnxt-btn-icon:hover i",
					'declaration' => sprintf('opacity: %s;visibility: %s;padding-right: %s;margin-left: %s;', esc_attr('1'),esc_attr('visible'),esc_attr('0.4em'),esc_attr('0')),
				) );
			}else if( 'on' === $this->props['btn_on_hover'] ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% .dnxt-btn-icon:hover i",
					'declaration' => sprintf('opacity: %s;visibility: %s;',esc_attr('1'),esc_attr('visible')),
				) );
			}
			// Button Icon Placement
			if ( 'off' === $this->props['btn_on_hover'] && 'left' === $this->props['btn_icon_placement'] ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% .dnxt-btn-icon.dnxt-btn-icon-on-hover i",
					'declaration' => sprintf('opacity: %s;visibility: %s;margin-left: %s;padding-right: %s;',esc_attr('1'),esc_attr('visible'),esc_attr('0'),esc_attr('0.4em')),
				) );
			}else if( 'off' === $this->props['btn_on_hover'] && 'right' === $this->props['btn_icon_placement'] ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% .dnxt-btn-icon.dnxt-btn-icon-on-hover i",
					'declaration' => sprintf("opacity: %s;visibility: %s;margin-left: %s;padding-left: %s;",esc_attr('1'),esc_attr('visible'),esc_attr('0'),esc_attr('0.4em'))
				) );
			}
		}

		// Button Hover Background Color dnxt_hover_border_bg_color
		if ( '' !== $this->props['dnxt_hover_bg_color'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => sprintf("%%order_class%% .%s:before",esc_attr($this->props['dnxt_hover_bg'])),
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_hover_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => sprintf("%%order_class%% .%s:hover:before",esc_attr($this->props['dnxt_hover_bg'])),
				'declaration' => sprintf("transform: %s",esc_attr('scaleX(1)!important;')),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-fade:hover",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_hover_bg_color'])),
			) );
		}
		// Button Hover Background Color Radial Out
		if ( 'dnxt-hover-radial-out' === $this->props['dnxt_hover_bg'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-radial-out",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_radial_out_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-radial-out:before",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_hover_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-radial-out:hover:before",
				'declaration' => sprintf("transform: %s",esc_attr('scale(2)!important;')),
			) );
		}
		// Button Hover Background Color Radial In
		if ( 'dnxt-hover-radial-in' === $this->props['dnxt_hover_bg'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-radial-in",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_hover_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-radial-in:before",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_radial_in_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-radial-in:hover:before",
				'declaration' => sprintf("transform: %s",esc_attr('scale(0)!important;')),
			) );
		}
		// Button Hover Background Color Rectangle In
		if ( 'dnxt-hover-rectangle-in' === $this->props['dnxt_hover_bg'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-rectangle-in",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_hover_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-rectangle-in:before",
				'declaration' => sprintf("background: %s!important;",esc_attr($this->props['dnxt_rectangle_in_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-rectangle-in:hover:before",
				'declaration' => sprintf("transform: %s",esc_attr('scale(0)!important;')),
			) );
		}
		// Button Hover Background Color Rectangle Out
		if ( 'dnxt-hover-rectangle-out' === $this->props['dnxt_hover_bg'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-rectangle-out",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_rectangle_out_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-rectangle-out:before",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_hover_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-rectangle-out:hover:before",
				'declaration' => sprintf("transform: %s",esc_attr('scale(1)!important;')),
			) );
		}
		// Button Hover Background Color Shutter In
		if ( 'dnxt-hover-shutter-in-horizontal' === $this->props['dnxt_hover_bg'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-in-horizontal",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_hover_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-in-horizontal:before",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_shutter_in_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-in-horizontal:hover:before",
				'declaration' => sprintf("transform: %s",esc_attr('scaleX(0)!important;')),
			) );
		}
		// Button Hover Background Color Shutter Out
		if ( 'dnxt-hover-shutter-out-horizontal' === $this->props['dnxt_hover_bg'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-out-horizontal",
				'declaration' => sprintf("background: %s!important;",esc_attr($this->props['dnxt_shutter_out_bg_color']))
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-out-horizontal:before",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_hover_bg_color']))
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-out-horizontal:hover:before",
				'declaration' => sprintf("transform: %s",esc_attr('scaleX(1)!important;')),
			) );
		}
		// Button Hover Background Color Shutter In Vertical
		if ( 'dnxt-hover-shutter-in-vertical' === $this->props['dnxt_hover_bg'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-in-vertical",
				'declaration' => sprintf("background: %s!important;",esc_attr($this->props['dnxt_hover_bg_color'])),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-in-vertical:before",
				'declaration' => sprintf("background: %s!important;",esc_attr($this->props['dnxt_shutter_in_v_bg_color']))
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-in-vertical:hover:before",
				'declaration' => sprintf("transform: %s",esc_attr('scaleY(0)!important;'))
			) );
		}
		// Button Hover Background Color Shutter Out Vertical
		if ( 'dnxt-hover-shutter-out-vertical' === $this->props['dnxt_hover_bg'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-out-vertical",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_shutter_out_v_bg_color']))
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-out-vertical:before",
				'declaration' => sprintf("background: %s !important;",esc_attr($this->props['dnxt_hover_bg_color']))
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-shutter-out-vertical:hover:before",
				'declaration' => sprintf("transform: %s",esc_attr('scaleY(1)!important;'))
			) );
		}
		// Button Hover Background Color
		if ( '' !== $this->props['dnxt_hover_border_bg_color'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .{$this->props['dnxt_hover_border']}",
				'declaration' => sprintf("background: %s!important;",esc_attr($this->props['dnxt_hover_border_bg_color']))
			) );
		}
		// Hover Trim Border Color
		if ( 'dnxt-hover-trim' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-trim:before",
				'declaration' => sprintf("border: %s solid 4px;",esc_attr($this->props['dnxt_trim_border_color']))
			) );
		}
		// Hover Ripple In Border Color
		if ( 'dnxt-hover-ripple-out' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-ripple-out:before",
				'declaration' => sprintf("border: %s solid 6px;",esc_attr($this->props['dnxt_ripple_out_color']))
			) );
		}
		// Hover Ripple Out Border Color
		if ( 'dnxt-hover-ripple-in' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-ripple-in:before",
				'declaration' => sprintf("border: %s solid 6px;",esc_attr($this->props['dnxt_ripple_in_color']))
			) );
		}
		// Hover Underline From Left Color
		if ( 'dnxt-hover-underline-from-left' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-underline-from-left:before",
				'declaration' => sprintf("background: %s ;",esc_attr($this->props['dnxt_underline_from_left_color']))
			) );
		}
		// Hover Underline From Center Color
		if ( 'dnxt-hover-underline-from-center' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-underline-from-center:before",
				'declaration' => sprintf("background: %s;",esc_attr($this->props['dnxt_underline_from_center_color'])),
			) );
		}
		// Hover Underline From Right Color
		if ('dnxt-hover-underline-from-right' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-underline-from-right:before",
				'declaration' => sprintf("background: %s;",esc_attr($this->props['dnxt_underline_from_right_color'])),
			) );
		}
		// Hover Overline From Left Color
		if ( 'dnxt-hover-overline-from-left' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-overline-from-left:before",
				'declaration' => sprintf("background: %s;",esc_attr($this->props['dnxt_overline_left_color'])),
			) );
		}
		// Hover Overline From Center Color
		if ( 'dnxt-hover-overline-from-center' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-overline-from-center:before",
				'declaration' => sprintf("background: %s;",esc_attr($this->props['dnxt_overline_center_color'])),
			) );
		}
		// Hover Overline From Center Color
		if ('dnxt-hover-overline-from-right' === $this->props['dnxt_hover_border']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-overline-from-right:before",
				'declaration' => sprintf("background: %s;",esc_attr($this->props['dnxt_overline_right_color'])),
			) );
		}
		// Hover Reveal Color
		if ( 'dnxt-hover-reveal' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-reveal:before",
				'declaration' => sprintf("border-color: %s;",esc_attr($this->props['dnxt_reveal_color'])),
			) );
		}
		// Hover Underline Reveal Color
		if ( 'dnxt-hover-underline-reveal' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-underline-reveal:before",
				'declaration' => sprintf("background: %s;",esc_attr($this->props['dnxt_underline_reveal_color'])),
			) );
		}
		// Hover Underline overline Color
		if ( 'dnxt-hover-overline-reveal' === $this->props['dnxt_hover_border'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-hover-overline-reveal:before",
				'declaration' => sprintf("background: %s;",esc_attr($this->props['dnxt_overline_reveal_color'])),
			) );
		}

		// Image Zindex
		$img_zindex = intval($this->props['img_zindex']);
		if ( '' !== $img_zindex ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-image img",
				'declaration' => sprintf("position: %s; z-index: %s",esc_attr('relative'),esc_attr($img_zindex)),
			) );
		}
		// Icon Zindex
		$icon_zindex = intval($this->props['icon_zindex']);
		if( '' !== $icon_zindex ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-icon span",
				'declaration' => sprintf("position: %s; z-index: %s",esc_attr('relative'),esc_attr($icon_zindex)),
			) );
		}
		// Heading Zindex
		$heading_zindex = intval($this->props['heading_zindex']);
		if ( '' !== $heading_zindex ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-blurb-heading-wrapper",
				'declaration' => sprintf("position: %s; z-index: %s",esc_attr('relative'),esc_attr($heading_zindex)),
			) );
		}
		// Button Zindex
		$button_zindex = intval($this->props['button_zindex']);
		if ( '' !== $button_zindex ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-button-wrapper .dnxt-blurb-btn",
				'declaration' => sprintf("position: %s; z-index: %s",esc_attr('relative'),esc_attr($button_zindex)),
			));
		}
	}
	/**
	 * Filter multi view value.
	 *
	 * @since 3.27.1
	 *
	 * @see ET_Builder_Module_Helper_MultiViewOptions::filter_value
	 *
	 * @param mixed                                     $raw_value Props raw value.
	 * @param array                                     $args {
	 *                                         Context data.
	 *
	 *     @type string $context      Context param: content, attrs, visibility, classes.
	 *     @type string $name         Module options props name.
	 *     @type string $mode         Current data mode: desktop, hover, tablet, phone.
	 *     @type string $attr_key     Attribute key for attrs context data. Example: src, class, etc.
	 *     @type string $attr_sub_key Attribute sub key that availabe when passing attrs value as array such as styes. Example: padding-top, margin-botton, etc.
	 * }
	 * @param ET_Builder_Module_Helper_MultiViewOptions $multi_view Multiview object instance.
	 *
	 * @return mixed
	 */
	public function multi_view_filter_value( $raw_value, $args, $multi_view ) {
		$name = isset( $args['name'] ) ? $args['name'] : '';

		if ( $raw_value && in_array( $name, array('dnxt_font_icon', 'btn_icon') )){
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}
		return $raw_value;
	}

	protected function sanitize_content($content){
		return preg_replace('/^<\/p>(.*)<p>/s', '$1', $content);
	}

	protected function process_content($content){
		$content = $this->sanitize_content($content);
		$content = str_replace(["&#91;", "&#93;"], ["[", "]"], $content);
		$content = do_shortcode($content);
		$content = str_replace(
			["<p><div", "</div></p>", "</div> <!-- .et_pb_section --></p>"],
			["<div", "</div>", "</div>"],
			$content
		);
		return $content;
	}
}

new Next_Blurb;