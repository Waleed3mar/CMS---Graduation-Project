<?php
include_once(DIVI_ESSENTIAL_PATH.'/includes/modules/base/Common.php');

class Next_Mega_Image_Effect extends ET_Builder_Module {

	public $slug       = 'dnxte_mega_image_effect';
	public $vb_support = 'on';
	public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-mega-image-effect/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name 		= esc_html__( 'Next Mega Image Effect', 'dnxte-divi-essential' );
		$this->icon_path 	= plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->folder_name = 'et_pb_divi_essential';

		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'		=>	array(
					'dnxtiep_img'	=> array(
						'title'		=> esc_html__( 'Image', 'dnxte-divi-essential' ),
						'priority'	=>	10,
					),
					'dnxtiep_btn'	=> array(
						'title'		=> esc_html__( 'Button', 'dnxte-divi-essential' ),
						'priority'	=>	20,
					),
					'dnxtiep_background'	=> array(
						'title'		=>	esc_html__( 'Hover Background', 'dnxte-divi-essential' ),
						'priority'	=>	30,
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
					'dnxtiep_btn_bg'	=> array(
						'title'		=>	esc_html__( 'Button Background', 'dnxte-divi-essential' ),
						'priority'	=>	30,
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
				),
			),
			'advanced'	=> array(
				'toggles'	=>	array(
					'dnxtiep_hover_effect'	=> esc_html__( 'Hover Effect', 'dnxte-divi-essential' ),
					'dnxtiep_button_icon'	=> array(
						"title"		=>	esc_html__( 'Button Icon', 'dnxte-divi-essential' ),
						'priority'	=>	61,
					),
					'dnxtiep_btn_border'	=> array(
						'title'		=> esc_html__( 'Button Border', 'dnxte-divi-essential' ),
						'priority'	=> 61,
					),
					'dnxtiep_fonts'	=> array(
						"title"		=>	esc_html__( 'Heading Fonts', 'dnxte-divi-essential' ),
					),
					'dnxtiep_btn_font'	=> array(
						"title"		=>	esc_html__( 'Button Text', 'dnxte-divi-essential' ),
						'priority'	=>	60,
					),
					'dnxtiep_btn_alingment'	=> array(
						"title"		=>	esc_html__( 'Button Alignment', 'dnxte-divi-essential' ),
						'priority'	=>	60,
					),
				), 
			),			
			'custom_css' => array(
				'toggles' => array(),
			),
		);

		// Custom CSS Field
		$this->custom_css_fields = array(
			'dnxtiep_image' => array(
				'label'    => esc_html__( 'Image', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnxtiep-imghvr-wrapper img',
			),
			'dnxtiep_caption' => array(
				'label'    => esc_html__( 'Hover Content', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% [class^="imghvr-"] figcaption',
			),
			'dnxtiep_heading' => array(
				'label'    => esc_html__( 'Heading', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnxtiep-heading',
			),
			'dnxtiep_description' => array(
				'label'    => esc_html__( 'Description', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% [class^="imghvr-"] figcaption p',
			),
			'dnxtiep_hover_btn' => array(
				'label'    => esc_html__( 'Button', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnxt-nie-uih-btn',
			),
		);
	}

	public function get_advanced_fields_config() {
		$advanced_fields = array();
		$advanced_fields = array(
			'fonts' => array(
				'hover_text_fonts' => array(
					'label'    		=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   => 'dnxtiep_fonts',
					'tab_slug'		=> 'advanced',
					'css'      => array(
						'main' => "%%order_class%% .dnxtiep-heading",
					),
				),
				'dnxtiep_body'   => array(
					'label'          => esc_html__( 'Description', 'dnxte-divi-essential' ),
					'css'            => array(
						'line_height' => "%%order_class%% .dnxtiep-description p",
						'text_align'  => "%%order_class%% .dnxtiep-description",
						'text_shadow' => "%%order_class%% .dnxtiep-description p",
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'css'               => array(
							'main' => "%%order_class%% .dnxtiep-description p",
						),
					),
				),
				'dnxtiep_btn_text' => array(
					'label'    			=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   	=> 'dnxtiep_btn_font',
					'hide_text_align'	=> 'true',
					'tab_slug'			=> 'advanced',
					'css'      => array(
						'main' => "%%order_class%% .dnxtiep-imghvr-content .dnxt-nie-uih-btn",
						'text_align'  => "%%order_class%% .dnxtiep-button",
					),
				),
			),
			'text'	=> false,
			'margin_padding' => array(
				'css' => array(
					'main' => "%%order_class%% .dnxtiep-imghvr-wrapper",
					'important' => 'all',
				),	
			),
			'borders'               => array(
				'default' => array(
					'css'	=> array(
						'main'	=> array(
							'border_radii'  => '%%order_class%% .dnxtiep-imghvr-wrapper',
							'border_styles' => '%%order_class%% .dnxtiep-imghvr-wrapper',
						),
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#0077FF',
							'style' => 'solid',
						),
					),
				),
				'button_border'     => array(
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dnxtiep_btn_border',
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-nie-uih-btn",
							'border_radii_hover'  	=> '%%order_class%%:hover .dnxt-nie-uih-btn',
							'border_styles' 		=> "%%order_class%% .dnxt-nie-uih-btn",
							'border_styles_hover' 	=> '%%order_class%%:hover .dnxt-nie-uih-btn',
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
			'background'            => array(
				'settings' => array(
					'color' => 'alpha',
				),
				// 'css'   => array(
				// 	'main' => "%%order_class%% .dnxtiep-imghvr-wrapper",
				// 	'important' => true,
				// ),
			),
			'box_shadow'	=> array(
				'default' => array(
					'css'                 => array(
						'main'        => "%%order_class%% .dnxtiep-imghvr-wrapper",
						'hover'       => '%%order_class%%:hover .dnxtiep-imghvr-wrapper',
						'overlay'     => 'inset',
					),
				),
			),
			'height' => array(
				'css' => array(
					'main'     => "%%order_class%% .dnxtiep-imghvr-wrapper",
					'important' => 'all',                
				),	
			),

		);

		return $advanced_fields;
	}

	public function get_fields() {
		return array(
			// Image
			'dnxtiep_image'				=> array(
				'label'              	=> esc_html__( 'Image', 'dnxte-divi-essential' ),
				'type'               	=> 'upload',
				'option_category'    	=> 'basic_option',
				'upload_button_text' 	=> esc_attr__( 'Upload an image', 'dnxte-divi-essential' ),
				'choose_text'        	=> esc_attr__( 'Choose an Image', 'dnxte-divi-essential' ),
				'update_text'        	=> esc_attr__( 'Set As Image', 'dnxte-divi-essential' ),
				'description'        	=> esc_html__( 'Upload an image to display at the top of your blurb.', 'dnxte-divi-essential' ),
				'toggle_slug'        	=> 'dnxtiep_img',
				'dynamic_content'    	=> 'image',
				'mobile_options'    	=> true,
				'hover'					=> 'tabs',
			),
			// Image alt
			'dnxtiep_alt'			=> array(
				'label'           	=> esc_html__( 'Image Alt Text', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Define the HTML ALT text for your image here.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'dnxtiep_img',
				'dynamic_content' 	=> 'text',
			),
			// Heading Text
			'dnxtiep_heading_text'	=> array(
				'label'           	=> esc_html__( 'Heading Text', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'dynamic_content' 	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Heading Text entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'main_content',
			),
			//Heading Tag
			'dnxtiep_heading_tag'	=> array(
				'label'           		=> esc_html__( 'Select Heading Tag', 'dnxte-divi-essential' ),
				'type'            		=> 'select',
				'description'     		=> esc_html__( 'Select heading tag, which you would like to use', 'dnxte-divi-essential' ),
				'option_category' 		=> 'basic_option',
				'toggle_slug'     		=> 'main_content',
				'options'         		=> array(
					'h1'	  	  		=> esc_html__( 'H1', 'dnxte-divi-essential' ),
					'h2'	  	  		=> esc_html__( 'H2', 'dnxte-divi-essential' ),
					'h3'	  	  		=> esc_html__( 'H3', 'dnxte-divi-essential' ),
					'h4'	  	  		=> esc_html__( 'H4', 'dnxte-divi-essential' ),
					'h5'	  	  		=> esc_html__( 'H5', 'dnxte-divi-essential' ),
					'h6'	  	  		=> esc_html__( 'H6', 'dnxte-divi-essential' ),
					'p'	      	  		=> esc_html__( 'P', 'dnxte-divi-essential' ),
					'span'	  	  		=> esc_html__( 'Span', 'dnxte-divi-essential' ),
				),
				'default'         => 'h2',
			),
			// Content
			'dnxtiep_description' 	=> array(
				'label'           	=> esc_html__( 'Content', 'dnxte-divi-essential' ),
				'type'            	=> 'tiny_mce',
				'dynamic_content' 	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'main_content',
			),
			'dnxtiep_btn_show_hide' => array(
				'label'           	=> esc_html__( 'Button Show Hide', 'dnxte-divi-essential' ),
				'type'            	=> 'yes_no_button',
				'options'         	=> array(
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'toggle_slug'     	=> 'dnxtiep_btn',
				'affects'         	=> array(
					'dnxtiep_button_text',
					'dnxtiep_button_link',
					'dnxtiep_button_link_new_window',
					'dnxtiep_btn_switch',
					'dnxtiep_btn_bg_show_hide',
					'dnxtiep_btn_gradient_show_hide',
					'dnxtiep_btn_margin',
					'dnxtiep_btn_padding',
					'dnxtiep_btn_align'
				),
				'default_on_front'	=> 'off',
			),
			// Button Title Field
			'dnxtiep_button_text'      		=> array(
				'label'           	=> esc_html__( 'Button Text', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'dynamic_content' 	=> 'text',
				'default'         	=> 'Button Text',
				'option_category' 	=> 'basic_option',
				'toggle_slug'     	=> 'dnxtiep_btn',
				'depends_show_if' 	=> 'on',
			),
			// Button Link Field
			'dnxtiep_button_link'   => array(
				'label'           	=> esc_html__( 'Button Link', 'dnxte-divi-essential' ),
				'description'     	=> esc_html__( 'When clicked the module will link to this URL.', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'option_category' 	=> 'configuration',
				'toggle_slug'     	=> 'dnxtiep_btn',
				'dynamic_content' 	=> 'url',
				'depends_show_if' 	=> 'on',
			),
			// Button Link Target Field
			'dnxtiep_button_link_new_window'=> array(
				'label'						=> esc_html__( 'Button Link Target', 'dnxte-divi-essential' ),
				'description'      			=> esc_html__( 'Here you can choose whether or not your link opens in a new window', 'dnxte-divi-essential' ),
				'type'             			=> 'select',
				'option_category'  			=> 'configuration',
				'options'         			=> array(
					'off' => esc_html__( 'In The Same Window', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'In The New Tab', 'dnxte-divi-essential' ),
				),
				'toggle_slug'      			=> 'dnxtiep_btn',
				'default_on_front' 			=> 'off',
				'depends_show_if'  			=> 'on',
			),
			// Button Show & Hide
			'dnxtiep_btn_switch'	=> array(
				'label'           	=> esc_html__( 'Show Icon', 'dnxte-divi-essential' ),
				'description'     	=> esc_html__( 'When enabled, this will add a custom icon within the button.', 'dnxte-divi-essential' ),
				'type'            	=> 'yes_no_button',
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'dnxtiep_button_icon',
				'default'         	=> 'on',
				'options'         	=> array(
					'on'      => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off'     => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         	=> array(
					"dnxtiep_btn_icon",
					"dnxtiep_btn_icon_color",
					"dnxtiep_btn_icon_placement",
					"dnxtiep_btn_on_hover",
				),
				'depends_show_if' => 'on',
			),
			// Button Icon
			'dnxtiep_btn_icon'			=> array(
				'label'               	=> esc_html__( 'Button Icon', 'dnxte-divi-essential' ),
				'description'         	=> esc_html__( 'Pick a color to be used for the button icon.', 'dnxte-divi-essential' ),
				'type'                	=> 'select_icon',
				'tab_slug'            	=> 'advanced',
				'toggle_slug'         	=> 'dnxtiep_button_icon',
				'class'               	=> array( 'et-pb-font-icon' ),
				'default'             	=> '$',
				'mobile_options'    	=> true,
				'depends_show_if_not' 	=> 'off',
				'responsive'			=> true,
				'mobile_options' 		=> true
			),
			// Button Icon Color
			'dnxtiep_btn_icon_color'	=>	array(
				'label'               	=> esc_html__( 'Button Icon Color', 'dnxte-divi-essential' ),
				'description'         	=> esc_html__( 'Here you can define a custom color for the button icon.', 'dnxte-divi-essential' ),
				'type'                	=> 'color-alpha',
				'tab_slug'            	=> 'advanced',
				'toggle_slug'         	=> 'dnxtiep_button_icon',
				'custom_color'        	=> true,
				'default'			  	=> '#2857b6',
				'hover'             	=> 'tabs',
				'mobile_options'    	=> true,
				'depends_show_if_not' 	=> 'off',
			),
			// Button Icon Placement
			'dnxtiep_btn_icon_placement'	=>	array(
				'label'               => esc_html__( 'Button Icon Placement', 'dnxte-divi-essential' ),
				'description'         => esc_html__( 'Choose where the button icon should be displayed within the button.', 'dnxte-divi-essential' ),
				'type'                => 'select',
				'tab_slug'            => 'advanced',
				'toggle_slug'         => 'dnxtiep_button_icon',
				'options'             => array(
					'right' => esc_html__( 'Right', 'dnxte-divi-essential' ),
					'left'  => esc_html__( 'Left', 'dnxte-divi-essential' ),
				),
				'default'             => 'right',
				'depends_show_if_not' => 'off',
			),
			// Button Icon On Hover
			'dnxtiep_btn_on_hover'	=>	array(
				'label'               => esc_html__( 'Only Show Icon On Hover for Button', 'dnxte-divi-essential' ),
				'description'         => esc_html__( 'By default, button icons are displayed on hover. If you would like button icons to always be displayed, then you can enable this option.', 'dnxte-divi-essential' ),
				'type'                => 'yes_no_button',
				'tab_slug'            => 'advanced',
				'toggle_slug'         => 'dnxtiep_button_icon',
				'default'             => 'on',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'depends_show_if_not' => 'off',
			),
			// Image Hover Effect
			'dnxtiep_image_hover_effect'=> array(
				'label'             	=> esc_html__( 'Select Image Hover', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_hover_effect',
				'default'           	=> 'push-up',
				'description'       	=> esc_html__( 'Here you can adjust the hover effect.', 'dnxte-divi-essential' ),
				'options'           	=> array(
					'push-up'   				=>  esc_html__( 'Push Up', 'dnxte-divi-essential' ),
					'push-down'					=>  esc_html__( 'Push Down', 'dnxte-divi-essential' ),
					'push-left'   				=>  esc_html__( 'Push Left', 'dnxte-divi-essential' ),
					'push-right'   				=>  esc_html__( 'Push Right', 'dnxte-divi-essential' ),
					'slide-up'   				=>  esc_html__( 'Slide Up', 'dnxte-divi-essential' ),
					'slide-down'   				=>  esc_html__( 'Slide Down', 'dnxte-divi-essential' ),
					'slide-left'   				=>  esc_html__( 'Slide Left', 'dnxte-divi-essential' ),
					'slide-right'   			=>  esc_html__( 'Slide Right', 'dnxte-divi-essential' ),
					'slide-top-left'   			=>  esc_html__( 'Slide Top Left', 'dnxte-divi-essential' ),
					'slide-top-right'   		=>  esc_html__( 'Slide Top Right', 'dnxte-divi-essential' ),
					'slide-bottom-left' 		=>  esc_html__( 'Slide Bottom Left', 'dnxte-divi-essential' ),
					'slide-bottom-right'		=>  esc_html__( 'Slide Bottom Right', 'dnxte-divi-essential' ),
					'reveal-up'   				=>  esc_html__( 'Reveal Up', 'dnxte-divi-essential' ),
					'reveal-down'   			=>  esc_html__( 'Reveal Down', 'dnxte-divi-essential' ),
					'reveal-left'   			=>  esc_html__( 'Reveal Left', 'dnxte-divi-essential' ),
					'reveal-right'   			=>  esc_html__( 'Reveal Right', 'dnxte-divi-essential' ),
					'reveal-top-left'   		=>  esc_html__( 'Reveal Top Left', 'dnxte-divi-essential' ),
					'reveal-top-right'  		=>  esc_html__( 'Reveal Top Right', 'dnxte-divi-essential' ),
					'reveal-bottom-left'		=>  esc_html__( 'Reveal Bottom Left', 'dnxte-divi-essential' ),
					'reveal-bottom-right'		=>  esc_html__( 'Reveal Bottom Right', 'dnxte-divi-essential' ),
					'fade'   					=>  esc_html__( 'Fade', 'dnxte-divi-essential' ),
					'fade-in-up'   				=>  esc_html__( 'Fade In Up', 'dnxte-divi-essential' ),
					'fade-in-down'   			=>  esc_html__( 'Fade In Down', 'dnxte-divi-essential' ),
					'fade-in-left'   			=>  esc_html__( 'Fade In Left', 'dnxte-divi-essential' ),
					'fade-in-right'   			=>  esc_html__( 'Fade In Right', 'dnxte-divi-essential' ),
					'hinge-up'   				=>  esc_html__( 'Hinge Up', 'dnxte-divi-essential' ),
					'hinge-down'   				=>  esc_html__( 'Hinge Down', 'dnxte-divi-essential' ),
					'hinge-left'   				=>  esc_html__( 'Hinge Left', 'dnxte-divi-essential' ),
					'hinge-right'   			=>  esc_html__( 'Hinge Right', 'dnxte-divi-essential' ),
					'flip-horiz'   				=>  esc_html__( 'Flip Horizontal', 'dnxte-divi-essential' ),
					'flip-vert'   				=>  esc_html__( 'Flip Vertical', 'dnxte-divi-essential' ),
					'flip-diag-1'   			=>  esc_html__( 'Flip Diag 1', 'dnxte-divi-essential' ),
					'flip-diag-2'   			=>  esc_html__( 'Flip Diag 2', 'dnxte-divi-essential' ),
					'shutter-out-horiz'   		=>  esc_html__( 'Shutter Out Horizontal', 'dnxte-divi-essential' ),
					'shutter-out-vert'   		=>  esc_html__( 'Shutter Out Vertical', 'dnxte-divi-essential' ),
					'shutter-out-diag-1'   		=>  esc_html__( 'Shutter Out Diag 1', 'dnxte-divi-essential' ),
					'shutter-out-diag-2'   		=>  esc_html__( 'Shutter Out Diag 2', 'dnxte-divi-essential' ),
					'shutter-in-horiz'   		=>  esc_html__( 'Shutter In Horizontal', 'dnxte-divi-essential' ),
					'shutter-in-vert'   		=>  esc_html__( 'Shutter In Vertical', 'dnxte-divi-essential' ),
					'shutter-in-out-horiz'   	=>  esc_html__( 'Shutter In Out Horizontal', 'dnxte-divi-essential' ),
					'shutter-in-out-vert'   	=>  esc_html__( 'Shutter In Out Vertical', 'dnxte-divi-essential' ),
					'shutter-in-out-diag-1'   	=>  esc_html__( 'Shutter In Out Diag 1', 'dnxte-divi-essential' ),
					'shutter-in-out-diag-2'   	=>  esc_html__( 'Shutter In Out Diag 2', 'dnxte-divi-essential' ),
					'fold-up'   				=>  esc_html__( 'Fold Up', 'dnxte-divi-essential' ),
					'fold-down'   				=>  esc_html__( 'Fold Down', 'dnxte-divi-essential' ),
					'fold-left'   				=>  esc_html__( 'Fold Left', 'dnxte-divi-essential' ),
					'fold-right'   				=>  esc_html__( 'Fold Right', 'dnxte-divi-essential' ),
					'zoom-in'   				=>  esc_html__( 'Zoom In', 'dnxte-divi-essential' ),
					'zoom-out'   				=>  esc_html__( 'Zoom Out', 'dnxte-divi-essential' ),
					'zoom-out-up'   			=>  esc_html__( 'Zoom Out Up', 'dnxte-divi-essential' ),
					'zoom-out-down'   			=>  esc_html__( 'Zoom Out Down', 'dnxte-divi-essential' ),
					'zoom-out-left'   			=>  esc_html__( 'Zoom Out Left', 'dnxte-divi-essential' ),
					'zoom-out-right'   			=>  esc_html__( 'Zoom Out Right', 'dnxte-divi-essential' ),
					'zoom-out-flip-horiz'   	=>  esc_html__( 'Zoom Out Flip Horizontal', 'dnxte-divi-essential' ),
					'zoom-out-flip-vert'   		=>  esc_html__( 'Zoom Out Flip Vertical', 'dnxte-divi-essential' ),
					'blur'   					=>  esc_html__( 'Blur', 'dnxte-divi-essential' ),
					'blocks-rotate-left'   		=>  esc_html__( 'Blocks Rotate Left', 'dnxte-divi-essential' ),
					'blocks-rotate-right'   	=>  esc_html__( 'Blocks Rotate Right', 'dnxte-divi-essential' ),
					'blocks-rotate-in-left'   	=>  esc_html__( 'Blocks Rotate  In Left', 'dnxte-divi-essential' ),
					'blocks-rotate-in-right'   	=>  esc_html__( 'Blocks Rotate  In Right', 'dnxte-divi-essential' ),
					'blocks-in'   				=>  esc_html__( 'Blocks In', 'dnxte-divi-essential' ),
					'blocks-out'   				=>  esc_html__( 'Blocks Out', 'dnxte-divi-essential' ),
					'blocks-float-up'   		=>  esc_html__( 'Blocks Float Up', 'dnxte-divi-essential' ),
					'blocks-float-down'   		=>  esc_html__( 'Blocks Float Down', 'dnxte-divi-essential' ),
					'blocks-float-left'   		=>  esc_html__( 'Blocks Float Left', 'dnxte-divi-essential' ),
					'blocks-float-right'   		=>  esc_html__( 'Blocks Float Right', 'dnxte-divi-essential' ),
					'blocks-zoom-top-left'   	=>  esc_html__( 'Blocks Zoom Top Left', 'dnxte-divi-essential' ),
					'blocks-zoom-top-right'   	=>  esc_html__( 'Blocks Zoom Top Right', 'dnxte-divi-essential' ),
					'blocks-zoom-bottom-left'   =>  esc_html__( 'Blocks Zoom Bottom Left', 'dnxte-divi-essential' ),
					'blocks-zoom-bottom-right'  =>  esc_html__( 'Blocks Zoom Bottom Right', 'dnxte-divi-essential' ),
					'strip-shutter-up'   		=>  esc_html__( 'Strip Shutter Up', 'dnxte-divi-essential' ),
					'strip-shutter-down'   		=>  esc_html__( 'Strip Shutter Down', 'dnxte-divi-essential' ),
					'strip-shutter-left'   		=>  esc_html__( 'Strip Shutter Left', 'dnxte-divi-essential' ),
					'strip-shutter-right'   	=>  esc_html__( 'Strip Shutter Right', 'dnxte-divi-essential' ),
					'strip-horiz-up'   			=>  esc_html__( 'Strip Horizontal Up', 'dnxte-divi-essential' ),
					'strip-horiz-down'   		=>  esc_html__( 'Strip Horizontal Down', 'dnxte-divi-essential' ),
					'strip-horiz-top-left'   	=>  esc_html__( 'Strip Horizontal Top Left', 'dnxte-divi-essential' ),
					'strip-horiz-top-right'   	=>  esc_html__( 'Strip Horizontal Top Right', 'dnxte-divi-essential' ),
					'strip-horiz-bottom-left'   =>  esc_html__( 'Strip Horizontal Bottom Left', 'dnxte-divi-essential' ),
					'strip-horiz-bottom-right'  =>  esc_html__( 'Strip Horizontal Bottom Right', 'dnxte-divi-essential' ),
					'strip-vert-left'   		=>  esc_html__( 'Strip Vertical Left', 'dnxte-divi-essential' ),
					'strip-vert-right'   		=>  esc_html__( 'Strip Vertical Right', 'dnxte-divi-essential' ),
					'strip-vert-top-left'   	=>  esc_html__( 'Strip Vertical Top Left', 'dnxte-divi-essential' ),
					'strip-vert-top-right'   	=>  esc_html__( 'Strip Vertical Top Right', 'dnxte-divi-essential' ),
					'strip-vert-bottom-left'   	=>  esc_html__( 'Strip Vertical Bottom Left', 'dnxte-divi-essential' ),
					'strip-vert-bottom-right'   =>  esc_html__( 'Strip Vertical Bottom Right', 'dnxte-divi-essential' ),
					'pixel-up'   				=>  esc_html__( 'Pixel Up', 'dnxte-divi-essential' ),
					'pixel-down'   				=>  esc_html__( 'Pixel Down', 'dnxte-divi-essential' ),
					'pixel-left'   				=>  esc_html__( 'Pixel Left', 'dnxte-divi-essential' ),
					'pixel-right'   			=>  esc_html__( 'Pixel Right', 'dnxte-divi-essential' ),
					'pixel-top-left'   			=>  esc_html__( 'Pixel Top Left', 'dnxte-divi-essential' ),
					'pixel-top-right'   		=>  esc_html__( 'Pixel Top Right', 'dnxte-divi-essential' ),
					'pixel-bottom-left'   		=>  esc_html__( 'Pixel Bottom Left', 'dnxte-divi-essential' ),
					'pixel-bottom-right'   		=>  esc_html__( 'Pixel Bottom Right', 'dnxte-divi-essential' ),
					'pivot-in-top-left'   		=>  esc_html__( 'Pivot In Top Left', 'dnxte-divi-essential' ),
					'pivot-in-top-right'   		=>  esc_html__( 'Pivot In Top Right', 'dnxte-divi-essential' ),
					'pivot-in-bottom-left'   	=>  esc_html__( 'Pivot In Bottom Left', 'dnxte-divi-essential' ),
					'pivot-in-bottom-right'   	=>  esc_html__( 'Pivot In Bottom Right', 'dnxte-divi-essential' ),
					'pivot-out-top-left'   		=>  esc_html__( 'Pivot Out Top Left', 'dnxte-divi-essential' ),
					'pivot-out-top-right'   	=>  esc_html__( 'Pivot Out Top Right', 'dnxte-divi-essential' ),
					'pivot-out-bottom-left'   	=>  esc_html__( 'Pivot Out Bottom Left', 'dnxte-divi-essential' ),
					'pivot-out-bottom-right'   	=>  esc_html__( 'Pivot Out Bottom Right', 'dnxte-divi-essential' ),
					'throw-in-up'   			=>  esc_html__( 'Throw In Up', 'dnxte-divi-essential' ),
					'throw-in-down'   			=>  esc_html__( 'Throw In Down', 'dnxte-divi-essential' ),
					'throw-in-left'   			=>  esc_html__( 'Throw In Left', 'dnxte-divi-essential' ),
					'throw-in-right'   			=>  esc_html__( 'Throw In Right', 'dnxte-divi-essential' ),
					'throw-out-up'   			=>  esc_html__( 'Throw Out Up', 'dnxte-divi-essential' ),
					'throw-out-down'   			=>  esc_html__( 'Throw Out Down', 'dnxte-divi-essential' ),
					'throw-out-left'   			=>  esc_html__( 'Throw Out Left', 'dnxte-divi-essential' ),
					'throw-out-right'   		=>  esc_html__( 'Throw Out Right', 'dnxte-divi-essential' ),
					'blinds-horiz'   			=>  esc_html__( 'Blinds Horizontal', 'dnxte-divi-essential' ),
					'blinds-vert'   			=>  esc_html__( 'Blinds Vertical', 'dnxte-divi-essential' ),
					'blinds-up'   				=>  esc_html__( 'Blinds Up', 'dnxte-divi-essential' ),
					'blinds-down'   			=>  esc_html__( 'Blinds Down', 'dnxte-divi-essential' ),
					'blinds-left'   			=>  esc_html__( 'Blinds Left', 'dnxte-divi-essential' ),
					'blinds-right'   			=>  esc_html__( 'Blinds Right', 'dnxte-divi-essential' ),
					'border-reveal'   			=>  esc_html__( 'Border Reveal', 'dnxte-divi-essential' ),
					'border-reveal-vert'   		=>  esc_html__( 'Border Reveal Vertical', 'dnxte-divi-essential' ),
					'border-reveal-horiz'   	=>  esc_html__( 'Border Reveal Horizontal', 'dnxte-divi-essential' ),
					'border-reveal-corners-1'   =>  esc_html__( 'Border Reveal Corners 1', 'dnxte-divi-essential' ),
					'border-reveal-corners-2'   =>  esc_html__( 'Border Reveal Corners 2', 'dnxte-divi-essential' ),
					'border-reveal-top-left'   	=>  esc_html__( 'Border Reveal Top Left', 'dnxte-divi-essential' ),
					'border-reveal-top-right'   =>  esc_html__( 'Border Reveal Top Right', 'dnxte-divi-essential' ),
					'border-reveal-bottom-left' =>  esc_html__( 'Border Reveal Bottom Left', 'dnxte-divi-essential' ),
					'border-reveal-bottom-right'=>  esc_html__( 'Border Reveal Bottom Right', 'dnxte-divi-essential' ),
					'border-reveal-cc-1'   		=>  esc_html__( 'Border Reveal Corner 1', 'dnxte-divi-essential' ),
					'border-reveal-ccc-1'   	=>  esc_html__( 'Border Reveal Corner 2', 'dnxte-divi-essential' ),
					'border-reveal-cc-2'   		=>  esc_html__( 'Border Reveal Corner 3', 'dnxte-divi-essential' ),
					'border-reveal-ccc-2'   	=>  esc_html__( 'Border Reveal Corner 4', 'dnxte-divi-essential' ),
					'border-reveal-cc-3'   		=>  esc_html__( 'Border Reveal Corner 5', 'dnxte-divi-essential' ),
					'border-reveal-ccc-3'   	=>  esc_html__( 'Border Reveal Corner 6', 'dnxte-divi-essential' ),
					'image-zoom-center'   		=>  esc_html__( 'Image Zoom Center', 'dnxte-divi-essential' ),
					'image-zoom-out'   			=>  esc_html__( 'Image Zoom Out', 'dnxte-divi-essential' ),
					'image-rotate-left'   		=>  esc_html__( 'Image Rotate Left', 'dnxte-divi-essential' ),
					'image-rotate-right'   		=>  esc_html__( 'Image Rotate Right', 'dnxte-divi-essential' ),
					'book-open-horiz'   		=>  esc_html__( 'Book Open Horizontal', 'dnxte-divi-essential' ),
					'book-open-vert'   			=>  esc_html__( 'Book Open Vertical', 'dnxte-divi-essential' ),
					'book-open-up'   			=>  esc_html__( 'Book Open Up', 'dnxte-divi-essential' ),
					'book-open-down'   			=>  esc_html__( 'Book Open Down', 'dnxte-divi-essential' ),
					'book-open-left'   			=>  esc_html__( 'Book Open Left', 'dnxte-divi-essential' ),
					'book-open-right'   		=>  esc_html__( 'Book Open Right', 'dnxte-divi-essential' ),
					'circle-up'   				=>  esc_html__( 'Circle Up', 'dnxte-divi-essential' ),
					'circle-down'   			=>  esc_html__( 'Circle Down', 'dnxte-divi-essential' ),
					'circle-left'   			=>  esc_html__( 'Circle Left', 'dnxte-divi-essential' ),
					'circle-right'   			=>  esc_html__( 'Circle Right', 'dnxte-divi-essential' ),
					'circle-top-left'   		=>  esc_html__( 'Circle Top Left', 'dnxte-divi-essential' ),
					'circle-top-right'   		=>  esc_html__( 'Circle Top Right', 'dnxte-divi-essential' ),
					'circle-bottom-left'   		=>  esc_html__( 'Circle Bottom Left', 'dnxte-divi-essential' ),
					'circle-bottom-right'   	=>  esc_html__( 'Circle Bottom Right', 'dnxte-divi-essential' ),
					'shift-top-left'   			=>  esc_html__( 'Shift Top Left', 'dnxte-divi-essential' ),
					'shift-top-right'   		=>  esc_html__( 'Shift Top Right', 'dnxte-divi-essential' ),
					'shift-bottom-left'   		=>  esc_html__( 'Shift Bottom Left', 'dnxte-divi-essential' ),
					'shift-bottom-right'   		=>  esc_html__( 'Shift Bottom Right', 'dnxte-divi-essential' ),
					'bounce-in'   				=>  esc_html__( 'Bounce In', 'dnxte-divi-essential' ),
					'bounce-in-up'   			=>  esc_html__( 'Bounce In Up', 'dnxte-divi-essential' ),
					'bounce-in-down'   			=>  esc_html__( 'Bounce In Down', 'dnxte-divi-essential' ),
					'bounce-in-left'   			=>  esc_html__( 'Bounce In Left', 'dnxte-divi-essential' ),
					'bounce-in-right'   		=>  esc_html__( 'Bounce In Right', 'dnxte-divi-essential' ),
					'bounce-out'   				=>  esc_html__( 'Bounce Out', 'dnxte-divi-essential' ),
					'bounce-out-up'   			=>  esc_html__( 'Bounce Out Up', 'dnxte-divi-essential' ),
					'bounce-out-down'   		=>  esc_html__( 'Bounce Out Down', 'dnxte-divi-essential' ),
					'bounce-out-left'   		=>  esc_html__( 'Bounce Out Left', 'dnxte-divi-essential' ),
					'bounce-out-right'   		=>  esc_html__( 'Bounce Out Right', 'dnxte-divi-essential' ),
					'fall-away-horiz'   		=>  esc_html__( 'Fall Away Horizontal', 'dnxte-divi-essential' ),
					'fall-away-vert'   			=>  esc_html__( 'Fall Away Vertical', 'dnxte-divi-essential' ),
					'fall-away-cc'   			=>  esc_html__( 'Fall Away Corner 1', 'dnxte-divi-essential' ),
					'fall-away-ccc'   			=>  esc_html__( 'Fall Away Corner 2', 'dnxte-divi-essential' ),
					'modal-slide-up'   			=>  esc_html__( 'Modal Slide Up', 'dnxte-divi-essential' ),
					'modal-slide-down'   		=>  esc_html__( 'Modal Slide Down', 'dnxte-divi-essential' ),
					'modal-slide-left'   		=>  esc_html__( 'Modal Slide Left', 'dnxte-divi-essential' ),
					'modal-slide-right'   		=>  esc_html__( 'Modal Slide Right', 'dnxte-divi-essential' ),
					'modal-hinge-up'   			=>  esc_html__( 'Modal Hinge Up', 'dnxte-divi-essential' ),
					'modal-hinge-down'   		=>  esc_html__( 'Modal Hinge Down', 'dnxte-divi-essential' ),
					'modal-hinge-left'   		=>  esc_html__( 'Modal Hinge Left', 'dnxte-divi-essential' ),
					'modal-hinge-right'   		=>  esc_html__( 'Modal Hinge Right', 'dnxte-divi-essential' ),
					'lightspeed-in-left'   		=>  esc_html__( 'Lightspeed In Left', 'dnxte-divi-essential' ),
					'lightspeed-in-right'   	=>  esc_html__( 'Lightspeed In Right', 'dnxte-divi-essential' ),
					'lightspeed-out-left'   	=>  esc_html__( 'Lightspeed Out Left', 'dnxte-divi-essential' ),
					'lightspeed-out-right'   	=>  esc_html__( 'Lightspeed Out Right', 'dnxte-divi-essential' ),
					'grad-radial-in'   			=>  esc_html__( 'Grad Radial In', 'dnxte-divi-essential' ),
					'grad-radial-out'   		=>  esc_html__( 'Grad Radial Out', 'dnxte-divi-essential' ),
					'grad-up'   				=>  esc_html__( 'Grad Up', 'dnxte-divi-essential' ),
					'grad-down'   				=>  esc_html__( 'Grad Down', 'dnxte-divi-essential' ),
					'grad-left'   				=>  esc_html__( 'Grad Left', 'dnxte-divi-essential' ),
					'grad-right'   				=>  esc_html__( 'Grad Right', 'dnxte-divi-essential' ),
					'grad-top-left'   			=>  esc_html__( 'Grad Top Left', 'dnxte-divi-essential' ),
					'grad-top-right'   			=>  esc_html__( 'Grad Top Right', 'dnxte-divi-essential' ),
					'grad-bottom-left'   		=>  esc_html__( 'Grad Bottom Left', 'dnxte-divi-essential' ),
					'grad-bottom-right'   		=>  esc_html__( 'Grad Bottom Right', 'dnxte-divi-essential' ),
					'parallax-up'   			=>  esc_html__( 'Parallax Up', 'dnxte-divi-essential' ),
					'parallax-down'   			=>  esc_html__( 'Parallax Down', 'dnxte-divi-essential' ),
					'parallax-left'   			=>  esc_html__( 'Parallax Left', 'dnxte-divi-essential' ),
					'parallax-right'   			=>  esc_html__( 'Parallax Right', 'dnxte-divi-essential' ),
					'stack-up'   				=>  esc_html__( 'Stack Up', 'dnxte-divi-essential' ),
					'stack-down'   				=>  esc_html__( 'Stack Down', 'dnxte-divi-essential' ),
					'stack-left'   				=>  esc_html__( 'Stack Left', 'dnxte-divi-essential' ),
					'stack-right'   			=>  esc_html__( 'Stack Right', 'dnxte-divi-essential' ),
					'cube-up'   				=>  esc_html__( 'Cube Up', 'dnxte-divi-essential' ),
					'cube-down'   				=>  esc_html__( 'Cube Down', 'dnxte-divi-essential' ),
					'cube-left'   				=>  esc_html__( 'Cube Left', 'dnxte-divi-essential' ),
					'cube-right'   				=>  esc_html__( 'Cube Right', 'dnxte-divi-essential' ),
					'dive'   					=>  esc_html__( 'Dive', 'dnxte-divi-essential' ),
					'dive-cc'   				=>  esc_html__( 'Dive Corner 1', 'dnxte-divi-essential' ),
					'dive-ccc'   				=>  esc_html__( 'Dive Corner 2', 'dnxte-divi-essential' ),
					'flash-top-left'   			=>  esc_html__( 'Flash Top Left', 'dnxte-divi-essential' ),
					'flash-top-right'   		=>  esc_html__( 'Flash Top Right', 'dnxte-divi-essential' ),
					'flash-bottom-left'   		=>  esc_html__( 'Flash Bottom Left', 'dnxte-divi-essential' ),
					'flash-bottom-right'   		=>  esc_html__( 'Flash Bottom Right', 'dnxte-divi-essential' ),
				),
			),
			// Hover Border Effect Color
			'dnxtiep_border_effect_color'	 => array(
				'label'          => esc_html__( 'Select Border Color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dnxtiep_hover_effect',
				'default'        => '#29c4a9',
				'mobile_options' => true,
				'responsive'	 => true,
				'show_if'		 => array(
					'dnxtiep_image_hover_effect'	=> array(
						"border-reveal",
						"border-reveal-vert",
						"border-reveal-horiz",
						"border-reveal-corners-1",
						"border-reveal-corners-2",
						"border-reveal-top-left",
						"border-reveal-top-right",
						"border-reveal-bottom-left",
						"border-reveal-bottom-right",
						"border-reveal-cc-1",
						"border-reveal-ccc-1",
						"border-reveal-cc-2",
						"border-reveal-ccc-2",
						"border-reveal-cc-3",
						"border-reveal-ccc-3",
					)
				)
			),
			// Text Effect
			'dnxtiep_text_effect'     	=> array(
				'label'             	=> esc_html__( 'Select Text Effect', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_hover_effect',
				'default'           	=> '',
				'description'       	=> esc_html__( 'Here you can adjust the hover effect.', 'dnxte-divi-essential' ),
				'options'           	=> array(
					''   				=>  esc_html__( 'Select', 'dnxte-divi-essential' ),
					'ih-fade'   		=>  esc_html__( 'Fade', 'dnxte-divi-essential' ),
					'ih-fade-up'   		=>  esc_html__( 'Fade Up', 'dnxte-divi-essential' ),
					'ih-fade-down'   	=>  esc_html__( 'Fade Down', 'dnxte-divi-essential' ),
					'ih-fade-left'   	=>  esc_html__( 'Fade Left', 'dnxte-divi-essential' ),
					'ih-fade-right'   	=>  esc_html__( 'Fade Right', 'dnxte-divi-essential' ),
					'ih-fade-up-big'   	=>  esc_html__( 'Fade Up Big', 'dnxte-divi-essential' ),
					'ih-fade-down-big'  =>  esc_html__( 'Fade Down Big', 'dnxte-divi-essential' ),
					'ih-fade-left-big'  =>  esc_html__( 'Fade Left Big', 'dnxte-divi-essential' ),
					'ih-fade-right-big' =>  esc_html__( 'Fade Right Big', 'dnxte-divi-essential' ),
					'ih-zoom-in' 		=>  esc_html__( 'Zoom In', 'dnxte-divi-essential' ),
					'ih-zoom-out' 		=>  esc_html__( 'Zoom Out', 'dnxte-divi-essential' ),
					'ih-flip-x' 		=>  esc_html__( 'Flip X', 'dnxte-divi-essential' ),
					'ih-flip-y' 		=>  esc_html__( 'Flip Y', 'dnxte-divi-essential' ),
				
				),
			),
			// Text Delay Effect
			'dnxtiep_text_delay'     	=> array(
				'label'             	=> esc_html__( 'Select Text Delay', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_hover_effect',
				'default'           	=> '',
				'description'       	=> esc_html__( 'Here you can adjust the hover effect.', 'dnxte-divi-essential' ),
				'options'           	=> array(
					''   				=>  esc_html__( 'Select', 'dnxte-divi-essential' ),
					'ih-delay-xs'   	=>  esc_html__( 'X Small', 'dnxte-divi-essential' ),
					'ih-delay-sm'   	=>  esc_html__( 'Small', 'dnxte-divi-essential' ),
					'ih-delay-md'   	=>  esc_html__( 'Medium', 'dnxte-divi-essential' ),
					'ih-delay-lg'   	=>  esc_html__( 'Large', 'dnxte-divi-essential' ),
					'ih-delay-xl'   	=>  esc_html__( 'X Large', 'dnxte-divi-essential' ),
					'ih-delay-xxl'   	=>  esc_html__( 'XX Large', 'dnxte-divi-essential' ),
				
				),
			),
			// Hover Background 
			'dnxtiep_hover_bg_show_hide'  => array(
				'label'           => esc_html__( 'Hover Background Color', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'dnxtiep_background',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'         =>  array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_hover_bg',
				),
				'default_on_front' => 'off',
			),
			// Hover BG Color
			'dnxtiep_hover_bg'	 => array(
				'label'          => esc_html__( 'Select Background Color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_background',
				'sub_toggle'	 => 'sub_toggle_color',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
				'mobile_options' => true,
				'responsive'	 => true,
			),
			// Hover Background Gradient 
			'dnxtiep_hover_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Gradient Hover Color', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'dnxtiep_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_hover_gradient_color_one',
					'dnxtiep_hover_gradient_color_two',
					'dnxtiep_hover_gradient_type',
					'dnxtiep_hover_gradient_start_position',
					'dnxtiep_hover_gradient_end_position'
				),
				'default_on_front' => 'off',
			),
			'dnxtiep_hover_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
			),
			'dnxtiep_hover_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
			),
			'dnxtiep_hover_gradient_type'		=> array(
				'label'           => esc_html__( 'Select Gradient Type', 'dnxte-divi-essential' ),
				'type'            => 'select',
				'description'     => esc_html__( 'Select the types of gradient', 'dnxte-divi-essential' ),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'dnxte-divi-essential' ),
					'radial-gradient' => esc_html__( 'Radial', 'dnxte-divi-essential' ),
				),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'dnxtiep_hover_gradient_type_linear_direction'   => array(
				'label'           => esc_html__( 'Linear direction', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxtiep_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'dnxtiep_hover_gradient_show_hide'	=> 'on',
					'dnxtiep_hover_gradient_type' 		=> 'linear-gradient'
				),
			),
			'dnxtiep_hover_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__( 'Radial Direction', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the types of gradient', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxtiep_background',
				'sub_toggle'	 	=> 'sub_toggle_gradient',
				'options'       	=> array(
					'circle at center'       => esc_html__(	'Center', 'dnxte-divi-essential' ),
					'circle at left'         => esc_html__(	'Top Left', 'dnxte-divi-essential' ),
					'circle at top'          => esc_html__(	'Top',	'dnxte-divi-essential' ),
					'circle at top right'    => esc_html__(	'Top Right', 'dnxte-divi-essential' ),
					'circle at right'        => esc_html__(	'Right', 'dnxte-divi-essential' ),
					'circle at bottom right' => esc_html__(	'Bottom Right', 'dnxte-divi-essential' ),
					'circle at bottom'       => esc_html__(	'Bottom', 'dnxte-divi-essential' ),
					'circle at bottom left'  => esc_html__(	'Bottom Left', 'dnxte-divi-essential' ),
					'circle at left'         => esc_html__(	'Left', 'dnxte-divi-essential' ),

				),
				'default'         => 'circle at center',
				'show_if'         => array(
					'dnxtiep_hover_gradient_show_hide'	=> 'on',
					'dnxtiep_hover_gradient_type'		=> 'radial-gradient'
				),
			),
			'dnxtiep_hover_gradient_start_position'           => array(
				'label'           => esc_html__( 'Start Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_background',
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
			'dnxtiep_hover_gradient_end_position'             => array(
				'label'           => esc_html__( 'End Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_background',
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
			// Button Background 
			'dnxtiep_btn_bg_show_hide'  => array(
				'label'           => esc_html__( 'Button Background Color', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'dnxtiep_btn_bg',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'         =>  array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_btn_bg_color',
				),
				'default_on_front' => 'off',
			),
			// Button BG Color
			'dnxtiep_btn_bg_color'	 => array(
				'label'          => esc_html__( 'Select Background Color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_btn_bg',
				'sub_toggle'	 => 'sub_toggle_color',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
				'hover'			 => 'tabs',
				'mobile_options' => true,
				'responsive'	 => true,
			),
			// Button Background Gradient 
			'dnxtiep_btn_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Gradient Button Color', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'dnxtiep_btn_bg',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_btn_gradient_color_one',
					'dnxtiep_btn_gradient_color_two',
					'dnxtiep_btn_gradient_type',
					'dnxtiep_btn_gradient_start_position',
					'dnxtiep_btn_gradient_end_position'
				),
				'default_on_front' => 'off',
			),
			'dnxtiep_btn_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_btn_bg',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
			),
			'dnxtiep_btn_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_btn_bg',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
			),
			'dnxtiep_btn_gradient_type'		=> array(
				'label'           => esc_html__( 'Select Gradient Type', 'dnxte-divi-essential' ),
				'type'            => 'select',
				'description'     => esc_html__( 'Select the types of gradient', 'dnxte-divi-essential' ),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_btn_bg',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'dnxte-divi-essential' ),
					'radial-gradient' => esc_html__( 'Radial', 'dnxte-divi-essential' ),
				),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'dnxtiep_btn_gradient_type_linear_direction'   => array(
				'label'           => esc_html__( 'Linear direction', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxtiep_btn_bg',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'dnxtiep_btn_gradient_show_hide'	=> 'on',
					'dnxtiep_btn_gradient_type' 		=> 'linear-gradient'
				),
			),
			'dnxtiep_btn_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__( 'Radial Direction', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the types of gradient', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxtiep_btn_bg',
				'sub_toggle'	 	=> 'sub_toggle_gradient',
				'options'       	=> array(
					'circle at center'       => esc_html__(	'Center', 'dnxte-divi-essential' ),
					'circle at left'         => esc_html__(	'Top Left', 'dnxte-divi-essential' ),
					'circle at top'          => esc_html__(	'Top',	'dnxte-divi-essential' ),
					'circle at top right'    => esc_html__(	'Top Right', 'dnxte-divi-essential' ),
					'circle at right'        => esc_html__(	'Right', 'dnxte-divi-essential' ),
					'circle at bottom right' => esc_html__(	'Bottom Right', 'dnxte-divi-essential' ),
					'circle at bottom'       => esc_html__(	'Bottom', 'dnxte-divi-essential' ),
					'circle at bottom left'  => esc_html__(	'Bottom Left', 'dnxte-divi-essential' ),
					'circle at left'         => esc_html__(	'Left', 'dnxte-divi-essential' ),

				),
				'default'         => 'circle at center',
				'show_if'         => array(
					'dnxtiep_btn_gradient_show_hide'	=> 'on',
					'dnxtiep_btn_gradient_type'		=> 'radial-gradient'
				),
			),
			'dnxtiep_btn_gradient_start_position'           => array(
				'label'           => esc_html__( 'Start Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_btn_bg',
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
			'dnxtiep_btn_gradient_end_position'             => array(
				'label'           => esc_html__( 'End Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_btn_bg',
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
			'dnxtiep_caption_margin'	=> array(
				'label'           		=> esc_html__('Content Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
			),
			'dnxtiep_caption_padding'	=> array(
				'label'           		=> esc_html__('Content Padding', 'dnxte-divi-essential'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiep_heading_margin'	=> array(
				'label'           		=> esc_html__('Heading Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
			),
			'dnxtiep_heading_padding'	=> array(
				'label'           		=> esc_html__('Heading Padding', 'dnxte-divi-essential'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiep_description_margin'	=> array(
				'label'           			=> esc_html__('Description Margin', 'dnxte-divi-essential'),
                'type'            			=> 'custom_margin',
                'mobile_options'  			=> true,
				'hover'           			=> 'tabs',
				'allowed_units'   			=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 			=> 'layout',
                'tab_slug'        			=> 'advanced',
				'toggle_slug'     			=> 'margin_padding', 
			),
			'dnxtiep_description_padding'	=> array(
				'label'           			=> esc_html__('Description Padding', 'dnxte-divi-essential'),
				'type'            			=> 'custom_padding',
				'mobile_options'  			=> true,
				'hover'           			=> 'tabs',
				'allowed_units'   			=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 			=> 'layout',
				'tab_slug'        			=> 'advanced',				
				'toggle_slug'     			=> 'margin_padding',
			),
			'dnxtiep_btn_margin'			=> array(
				'label'           			=> esc_html__('Button Margin', 'dnxte-divi-essential'),
                'type'            			=> 'custom_margin',
                'mobile_options'  			=> true,
				'hover'           			=> 'tabs',
				'allowed_units'   			=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 			=> 'layout',
                'tab_slug'        			=> 'advanced',
				'toggle_slug'     			=> 'margin_padding', 
			),
			'dnxtiep_btn_padding'			=> array(
				'label'           			=> esc_html__('Button Padding', 'dnxte-divi-essential'),
				'type'            			=> 'custom_padding',
				'mobile_options'  			=> true,
				'hover'           			=> 'tabs',
				'allowed_units'   			=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 			=> 'layout',
				'tab_slug'        			=> 'advanced',				
				'toggle_slug'     			=> 'margin_padding',
			),
			'dnxtiep_btn_align'		=> array(
				'label'           	=> esc_html__( 'Button Alignment', 'dnxte-divi-essential' ),
				'description'     	=> esc_html__( 'Align Button to the left, right or center.', 'dnxte-divi-essential' ),
				'type'            	=> 'align',
				'option_category' 	=> 'layout',
				'options'         	=> et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'        	=> 'advanced',
				'mobile_options'  	=> true,
				'toggle_slug'     	=> 'dnxtiep_btn_alingment',
				'default'         	=> 'left',
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		wp_enqueue_style( 'dnext_mega_image_effect' );
		$multi_view              		= 	et_pb_multi_view_options( $this );
		$dnxtiep_image					=	$this->props['dnxtiep_image'];
		$dnxtiep_alt					=	$this->props['dnxtiep_alt'];

		$dnxtiep_heading_text			=	$this->props['dnxtiep_heading_text'];
		$dnxtiep_heading_tag			=	$this->props['dnxtiep_heading_tag'];
		$dnxtiep_description			=	et_core_esc_previously($this->props['dnxtiep_description']);

		$dnxtiep_btn_show_hide			=	$this->props['dnxtiep_btn_show_hide'];
		$dnxtiep_button_text			=	$this->props['dnxtiep_button_text'];
		$dnxtiep_button_link			=	$this->props['dnxtiep_button_link'];
		$dnxtiep_button_link_new_window	=	$this->props['dnxtiep_button_link_new_window'];

		$dnxtiep_btn_switch				=	$this->props['dnxtiep_btn_switch'];
		$dnxtiep_btn_icon				=	$this->props['dnxtiep_btn_icon'];

		$dnxtiep_image_hover_effect		=	$this->props['dnxtiep_image_hover_effect'];
		$dnxtiep_text_effect			=	$this->props['dnxtiep_text_effect'];
		$dnxtiep_text_delay				=	$this->props['dnxtiep_text_delay'];


		$blocks_effects = array(
			"blocks-rotate-left",
			"blocks-rotate-right",
			"blocks-rotate-in-left",
			"blocks-rotate-in-right",
			"blocks-in",
			"blocks-out",
			"blocks-float-up",
			"blocks-float-down",
			"blocks-float-left",
			"blocks-float-right",
			"blocks-zoom-top-left",
			"blocks-zoom-top-right",
			"blocks-zoom-bottom-left",
			"blocks-zoom-bottom-right",
		);

		$strip_effects = array(
			"strip-shutter-up",   		
			"strip-shutter-down",  		
			"strip-shutter-left",   		
			"strip-shutter-right",   	 
			"strip-horiz-up",   			 
			"strip-horiz-down",   		
			"strip-horiz-top-left",   	
			"strip-horiz-top-right",   	
			"strip-horiz-bottom-left",   
			"strip-horiz-bottom-right", 
			"strip-vert-left",   		 
			"strip-vert-right",   		
			"strip-vert-top-left",   	
			"strip-vert-top-right",   	
			"strip-vert-bottom-left",   	
			"strip-vert-bottom-right",
		);

		$pixel_effects = array(
			"pixel-up",   				
			"pixel-down",   				
			"pixel-left",   				
			"pixel-right",   			
			"pixel-top-left",   			
			"pixel-top-right",   		
			"pixel-bottom-left",   		
			"pixel-bottom-right",
		);

		$border_effects = array(
			"border-reveal",
			"border-reveal-vert",
			"border-reveal-horiz",
			"border-reveal-corners-1",
			"border-reveal-corners-2",
			"border-reveal-top-left",
			"border-reveal-top-right",
			"border-reveal-bottom-left",
			"border-reveal-bottom-right",
			"border-reveal-cc-1",
			"border-reveal-ccc-1",
			"border-reveal-cc-2",
			"border-reveal-ccc-2",
			"border-reveal-cc-3",
			"border-reveal-ccc-3",
		);

		$blind_effects = array(
			"blinds-horiz",
			"blinds-vert",
			"blinds-up",
			"blinds-down",
			"blinds-left",
			"blinds-right",
		);

		$book_effects = array(
			"book-open-horiz",
			"book-open-vert",
			"book-open-up",
			"book-open-down",
			"book-open-left",
			"book-open-right",
		);

		$circle_effects = array(
			"circle-up",
			"circle-down",
			"circle-left",
			"circle-right",
			"circle-top-left",
			"circle-top-right",
			"circle-bottom-left",
			"circle-bottom-right",
		);

		$grad_effects = array(
			"grad-radial-in",
			"grad-radial-out",
			"grad-up",
			"grad-down",
			"grad-left",
			"grad-right",
			"grad-top-left",
			"grad-top-right",
			"grad-bottom-left",
			"grad-bottom-right",
		);

		$flash_effects = array(
			"flash-top-left",
			"flash-top-right",
			"flash-bottom-left",
			"flash-bottom-right",
		);

		$dnxtiep_image_hover_effects = array();
		if ( ! empty( $dnxtiep_image_hover_effect ) ) {
			array_push( $dnxtiep_image_hover_effects, sprintf( 'imghvr-%1$s', esc_attr( $dnxtiep_image_hover_effect ) ) );
        }
		$dnxtiep_image_hover_effect_classes = join( ' ', $dnxtiep_image_hover_effects );

		$dnxtiep_image_pathinfo = pathinfo( $dnxtiep_image );
		$is_dnxtiep_image_svg 	= isset( $dnxtiep_image_pathinfo['extension'] ) ? 'svg' === $dnxtiep_image_pathinfo['extension'] : false;

		$image_html = Common::get_image_html(
			'dnxtiep_image', // image_slug
			$dnxtiep_alt, // alt_text
			'', // title
			$multi_view, // multi_view
			$this, // context
			'img-fluid'
		);

		$dnxtiep_img = "";
		if ( "" !== $dnxtiep_image ) {
			$dnxtiep_img = sprintf(
				'%1$s',
				$image_html
			);
		}


		//Heading Text
		$dnxtiepheadingtext = '';
		if ( '' !== $dnxtiep_heading_text ){
			$dnxtiepheadingtext = sprintf(
				'<%1$s class="dnxtiep-heading">%2$s</%1$s>',
				et_pb_process_header_level( $dnxtiep_heading_tag, 'span' ),
				et_core_esc_previously( $dnxtiep_heading_text )
			);
		}

		
		// Description
		$description = "";
		if ( '' !== $dnxtiep_description ) {
			$description = sprintf(
				'<div class="dnxtiep-description">%1$s</div>',
				et_core_esc_previously( $dnxtiep_description )
			);
		}

		$button 		= "";
		$button_target	= "";
		$icon_fontawesome = explode('||', $this->props['dnxtiep_btn_icon']);
		$icon_fontawesome_values = et_pb_responsive_options()->get_property_values($this->props, 'dnxtiep_btn_icon');
		$icon_fontawesome_tablet = isset($icon_fontawesome_values['tablet']) ? explode( '||', $icon_fontawesome_values['tablet'] ) : '';
		$icon_fontawesome_phone = isset($icon_fontawesome_values['phone']) ? explode( '||', $icon_fontawesome_values['phone'] ) : '';

		if ( 'off' !== $dnxtiep_btn_show_hide ) {

			$button_target 	= 'on' === $dnxtiep_button_link_new_window ? '_blank' : '_self';

			$button_icon = isset($icon_fontawesome[0]) && 'off' !== $dnxtiep_btn_switch ? $icon_fontawesome[0] : '';
			$button_icon_weight = isset($icon_fontawesome[2]) && 'off' !== $dnxtiep_btn_switch ? $icon_fontawesome[2] : '';
			$button_icon_tablet = isset($icon_fontawesome_tablet[0]) && 'off' !== $dnxtiep_btn_switch ? $icon_fontawesome_tablet[0] : $button_icon;
			$button_icon_weight_tablet = isset($icon_fontawesome_tablet[2]) && 'off' !== $dnxtiep_btn_switch ? $icon_fontawesome_tablet[2] : $button_icon_weight;
			$button_icon_phone = isset($icon_fontawesome_phone[0]) && 'off' !== $dnxtiep_btn_switch ? $icon_fontawesome_phone[0] : $button_icon_tablet;
			$button_icon_weight_phone = isset($icon_fontawesome_phone[2]) && 'off' !== $dnxtiep_btn_switch ? $icon_fontawesome_phone[2] : $button_icon_weight_tablet;

			//Button On Hover class inner
			$btnIconOnHover = 'on' === esc_attr($this->props['dnxtiep_btn_on_hover']) ? "dnxtiep-btn-icon-on-hover" : "";

			$button = sprintf(
				'<div class="dnxtiep-button">
					<a href="%1$s" target="%7$s" class="dnxt-nie-uih-btn ih-fade-up ih-delay-lg %2$s" data-icon="%3$s" data-icon-tablet="%5$s" data-icon-phone="%6$s">
						%4$s
					</a>
				</div>',
				esc_url( $dnxtiep_button_link),
				esc_attr($btnIconOnHover),
				esc_attr( et_pb_process_font_icon( $button_icon )),
				et_core_esc_previously( $dnxtiep_button_text ),
				esc_attr( et_pb_process_font_icon( $button_icon_tablet ) ),
				esc_attr( et_pb_process_font_icon( $button_icon_phone ) ),
				esc_attr( et_pb_process_font_icon( $button_target ) ) // #7

			);
		}

		$font_name = array('fa' => 'FontAwesome', 'divi' => 'ETmodules');
		$font_styles = isset($icon_fontawesome[1]) && array_key_exists($icon_fontawesome[1], $font_name) ? sprintf('font-family: %1$s !important;font-weight: %2$s !important;', esc_attr($font_name[$icon_fontawesome[1]]), esc_attr($button_icon_weight)) : esc_html('font-family: ETmodules !important;');
		$font_styles_tablet = isset($icon_fontawesome_tablet[1]) && array_key_exists($icon_fontawesome_tablet[1], $font_name) ? sprintf('font-family: %1$s !important;font-weight: %2$s !important;', esc_attr($font_name[$icon_fontawesome_tablet[1]]), esc_attr($button_icon_weight_tablet)) : esc_html('font-family: ETmodules !important;');
		$font_styles_phone = isset($icon_fontawesome_phone[1]) && array_key_exists($icon_fontawesome_phone[1], $font_name) ? sprintf('font-family: %1$s !important;font-weight: %2$s !important;', esc_attr($font_name[$icon_fontawesome_phone[1]]), esc_attr($button_icon_weight_phone)) : esc_html('font-family: ETmodules !important;');
		


		if ( 'right' === esc_attr($this->props['dnxtiep_btn_icon_placement']) ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    	=> "%%order_class%% .dnxt-nie-uih-btn::after",
				'declaration'	=> $font_styles
			) );

			ET_Builder_Element::set_style($render_slug, array(
				'selector'    	=> "%%order_class%% .dnxt-nie-uih-btn::after",
				'declaration'	=> $font_styles_tablet,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    	=> "%%order_class%% .dnxt-nie-uih-btn::after",
				'declaration'	=> $font_styles_phone,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );
		}else if ('left' === $this->props['dnxtiep_btn_icon_placement']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    	=> "%%order_class%% .dnxt-nie-uih-btn::before",
				'declaration'	=> $font_styles
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    	=> "%%order_class%% .dnxt-nie-uih-btn::before",
				'declaration'	=> $font_styles_tablet,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    	=> "%%order_class%% .dnxt-nie-uih-btn::before",
				'declaration'	=> $font_styles_phone,
				'media_query' 	=> 	ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );
		}



		$dnxtiep_btn_icon_color			=	esc_attr($this->props['dnxtiep_btn_icon_color']);
		$dnxtiep_btn_icon_color_hover   =	$this->get_hover_value( 'dnxtiep_btn_icon_color' );
		$dnxtiep_btn_icon_color_values  =	et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_btn_icon_color' );
		$dnxtiep_btn_icon_color_tablet  =	isset( $dnxtiep_btn_icon_color_values['tablet'] ) ? $dnxtiep_btn_icon_color_values['tablet'] : '';
		$dnxtiep_btn_icon_color_phone   =	isset( $dnxtiep_btn_icon_color_values['phone'] ) ? $dnxtiep_btn_icon_color_values['phone'] : '';
		// Button Icon Color
		if ( '' !== $dnxtiep_btn_icon_color ) {
			$dnxtiep_btn_icon_color_style 			= sprintf( 'color: %1$s;', esc_attr( $dnxtiep_btn_icon_color ) );
			$dnxtiep_btn_icon_color_tablet_style 	= '' !== $dnxtiep_btn_icon_color_tablet ? sprintf( 'color: %1$s;', esc_attr( $dnxtiep_btn_icon_color_tablet ) ) : '';
			$dnxtiep_btn_icon_color_phone_style  	= '' !== $dnxtiep_btn_icon_color_phone ? sprintf( 'color: %1$s;', esc_attr( $dnxtiep_btn_icon_color_phone ) ) : '';
			
			$dnxtiep_btn_icon_color_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'dnxtiep_btn_icon_color', $this->props ) ) {
				$dnxtiep_btn_icon_color_style_hover = sprintf( 'color: %1$s;', esc_attr( $dnxtiep_btn_icon_color_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-nie-uih-btn::after, %%order_class%% .dnxt-nie-uih-btn::before",
				'declaration' => $dnxtiep_btn_icon_color_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-nie-uih-btn::after, %%order_class%% .dnxt-nie-uih-btn::before",
				'declaration' => $dnxtiep_btn_icon_color_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-nie-uih-btn::after, %%order_class%% .dnxt-nie-uih-btn::before",
				'declaration' => $dnxtiep_btn_icon_color_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if ( "" !== $dnxtiep_btn_icon_color_style_hover ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxt-nie-uih-btn:hover:before,%%order_class%% .dnxt-nie-uih-btn:hover:after" ),
					'declaration' => $dnxtiep_btn_icon_color_style_hover ,
				) );
			}
		}

		// Hover BG Color
		$dnxtiep_hover_bg_color			= esc_attr($this->props['dnxtiep_hover_bg']);
		$dnxtiep_hover_bg_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_hover_bg' );
		$dnxtiep_hover_bg_color_tablet	= isset( $dnxtiep_hover_bg_color_values['tablet'] ) ? $dnxtiep_hover_bg_color_values['tablet'] : '';
		$dnxtiep_hover_bg_color_phone	= isset( $dnxtiep_hover_bg_color_values['phone'] ) ? $dnxtiep_hover_bg_color_values['phone'] : '';
		
		$dnxtiep_border_effect_color		= esc_attr($this->props['dnxtiep_border_effect_color']);
		$dnxtiep_border_effect_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_border_effect_color' );
		$dnxtiep_border_effect_color_tablet	= isset( $dnxtiep_border_effect_color_values['tablet'] ) ? $dnxtiep_border_effect_color_values['tablet'] : '';
		$dnxtiep_border_effect_color_phone	= isset( $dnxtiep_border_effect_color_values['phone'] ) ? $dnxtiep_border_effect_color_values['phone'] : '';

		if ( 'off' !== esc_attr($this->props['dnxtiep_hover_bg_show_hide']) ) {
			$dnxtiep_hover_bg_color_style 		 = sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_hover_bg_color ) );
			$dnxtiep_hover_bg_color_tablet_style = '' !== $dnxtiep_hover_bg_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_hover_bg_color_tablet ) ) : '';
			$dnxtiep_hover_bg_color_phone_style  = '' !== $dnxtiep_hover_bg_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_hover_bg_color_phone ) ) : '';
			
			if ( in_array( $dnxtiep_image_hover_effect, $blocks_effects, true ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-blocks']:before, %%order_class%% [class^='imghvr-blocks']:after, %%order_class%% [class^='imghvr-blocks'] figcaption:before, %%order_class%% [class^='imghvr-blocks'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-blocks']:before, %%order_class%% [class^='imghvr-blocks']:after, %%order_class%% [class^='imghvr-blocks'] figcaption:before, %%order_class%% [class^='imghvr-blocks'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-blocks']:before, %%order_class%% [class^='imghvr-blocks']:after, %%order_class%% [class^='imghvr-blocks'] figcaption:before, %%order_class%% [class^='imghvr-blocks'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );

			} else if ( in_array( $dnxtiep_image_hover_effect, $strip_effects, true ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-strip']:before, %%order_class%% [class^='imghvr-strip']:after, %%order_class%% [class^='imghvr-strip'] figcaption:before, %%order_class%% [class^='imghvr-strip'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-strip']:before, %%order_class%% [class^='imghvr-strip']:after, %%order_class%% [class^='imghvr-strip'] figcaption:before, %%order_class%% [class^='imghvr-strip'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-strip']:before, %%order_class%% [class^='imghvr-strip']:after, %%order_class%% [class^='imghvr-strip'] figcaption:before, %%order_class%% [class^='imghvr-strip'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );
			} else if ( in_array( $dnxtiep_image_hover_effect, $pixel_effects, true ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-pixel']:before, %%order_class%% [class^='imghvr-pixel']:after, %%order_class%% [class^='imghvr-pixel'] figcaption:before, %%order_class%% [class^='imghvr-pixel'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-pixel']:before, %%order_class%% [class^='imghvr-pixel']:after, %%order_class%% [class^='imghvr-pixel'] figcaption:before, %%order_class%% [class^='imghvr-pixel'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-pixel']:before, %%order_class%% [class^='imghvr-pixel']:after, %%order_class%% [class^='imghvr-pixel'] figcaption:before, %%order_class%% [class^='imghvr-pixel'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );
			} else if ( in_array( $dnxtiep_image_hover_effect, $border_effects, true ) ) {
				$dnxtiep_border_effect_color_style 		  = sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_border_effect_color ) );
				$dnxtiep_border_effect_color_tablet_style = '' !== $dnxtiep_border_effect_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_border_effect_color_tablet ) ) : '';
				$dnxtiep_border_effect_color_phone_style  = '' !== $dnxtiep_border_effect_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_border_effect_color_phone ) ) : '';
				
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-']",
					'declaration' => $dnxtiep_hover_bg_color_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-']",
					'declaration' => $dnxtiep_hover_bg_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-']",
					'declaration' => $dnxtiep_hover_bg_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-border']:before, %%order_class%% [class^='imghvr-border']:after, %%order_class%% [class^='imghvr-border'] figcaption:before, %%order_class%% [class^='imghvr-border'] figcaption:after",
					'declaration' => $dnxtiep_border_effect_color_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-border']:before, %%order_class%% [class^='imghvr-border']:after, %%order_class%% [class^='imghvr-border'] figcaption:before, %%order_class%% [class^='imghvr-border'] figcaption:after",
					'declaration' => $dnxtiep_border_effect_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-border']:before, %%order_class%% [class^='imghvr-border']:after, %%order_class%% [class^='imghvr-border'] figcaption:before, %%order_class%% [class^='imghvr-border'] figcaption:after",
					'declaration' => $dnxtiep_border_effect_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );

			} else if ( in_array( $dnxtiep_image_hover_effect, $blind_effects, true ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-blinds']:before, %%order_class%% [class^='imghvr-blinds']:after, %%order_class%% [class^='imghvr-blinds'] figcaption:before, %%order_class%% [class^='imghvr-blinds'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-blinds']:before, %%order_class%% [class^='imghvr-blinds']:after, %%order_class%% [class^='imghvr-blinds'] figcaption:before, %%order_class%% [class^='imghvr-blinds'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-blinds']:before, %%order_class%% [class^='imghvr-blinds']:after, %%order_class%% [class^='imghvr-blinds'] figcaption:before, %%order_class%% [class^='imghvr-blinds'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );
			} else if ( in_array( $dnxtiep_image_hover_effect, $book_effects, true ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-book']:before, %%order_class%% [class^='imghvr-book']:after, %%order_class%% [class^='imghvr-book'] figcaption:before, %%order_class%% [class^='imghvr-book'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-book']:before, %%order_class%% [class^='imghvr-book']:after, %%order_class%% [class^='imghvr-book'] figcaption:before, %%order_class%% [class^='imghvr-book'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-book']:before, %%order_class%% [class^='imghvr-book']:after, %%order_class%% [class^='imghvr-book'] figcaption:before, %%order_class%% [class^='imghvr-book'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );
			}  else if ( in_array( $dnxtiep_image_hover_effect, $circle_effects, true ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-circle']:before, %%order_class%% [class^='imghvr-circle']:after, %%order_class%% [class^='imghvr-circle'] figcaption:before, %%order_class%% [class^='imghvr-circle'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-circle']:before, %%order_class%% [class^='imghvr-circle']:after, %%order_class%% [class^='imghvr-circle'] figcaption:before, %%order_class%% [class^='imghvr-circle'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-circle']:before, %%order_class%% [class^='imghvr-circle']:after, %%order_class%% [class^='imghvr-circle'] figcaption:before, %%order_class%% [class^='imghvr-circle'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );
			} else if ( in_array( $dnxtiep_image_hover_effect, $grad_effects, true ) ) {
				$dnxtiep_hover_bg_gradient_style 		 = sprintf( 'background: %1$s;', esc_attr( $dnxtiep_hover_bg_color ) );
				$dnxtiep_hover_bg_gradient_tablet_style	 = '' !== $dnxtiep_hover_bg_color_tablet ? sprintf( 'background: %1$s;', esc_attr( $dnxtiep_hover_bg_color_tablet ) ) : '';
				$dnxtiep_hover_bg_gradient_phone_style   = '' !== $dnxtiep_hover_bg_color_phone ? sprintf( 'background: %1$s;', esc_attr( $dnxtiep_hover_bg_color_phone ) ) : '';
				
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-grad']:before, %%order_class%% [class^='imghvr-grad']:after, %%order_class%% [class^='imghvr-grad'] figcaption:before, %%order_class%% [class^='imghvr-grad'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_gradient_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-grad']:before, %%order_class%% [class^='imghvr-grad']:after, %%order_class%% [class^='imghvr-grad'] figcaption:before, %%order_class%% [class^='imghvr-grad'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_gradient_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-grad']:before, %%order_class%% [class^='imghvr-grad']:after, %%order_class%% [class^='imghvr-grad'] figcaption:before, %%order_class%% [class^='imghvr-grad'] figcaption:after",
					'declaration' => $dnxtiep_hover_bg_gradient_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );
			} else {

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before, %%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after, %%order_class%% [class^='imghvr-flash-']:before, %%order_class%% [class^='imghvr-flash-']:after",
					'declaration' => $dnxtiep_hover_bg_color_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before, %%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after, %%order_class%% [class^='imghvr-flash-']:before, %%order_class%% [class^='imghvr-flash-']:after",
					'declaration' => $dnxtiep_hover_bg_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'] figcaption, %%order_class%% [class^='imghvr-reveal-']:before, %%order_class%% [class^='imghvr-shutter-out-']:before, %%order_class%% [class^='imghvr-shutter-in-']:before, %%order_class%% [class^='imghvr-shutter-in-']:after, %%order_class%% [class^='imghvr-flash-']:before, %%order_class%% [class^='imghvr-flash-']:after",
					'declaration' => $dnxtiep_hover_bg_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );
			}
		}

		// Hover Background Icon Gradient
		$dnxtiep_hover_gradient_apply      		= '';
		$dnxtiep_hover_gradient_color_one 		= '';
		$dnxtiep_hover_gradient_color_two 		= '';
		$dnxtiep_hover_gradient_type	   		= '';
		$dnxtiep_hover_gl             			= '';
		$dnxtiep_hover_gr             			= '';
		$dnxtiep_hover_gradient_start_position	= '';
		$dnxtiep_hover_gradient_end_position  	= '';

		// checking gradient type
		if ( '' !== $this->props['dnxtiep_hover_gradient_type']){
			$dnxtiep_hover_gradient_type = $this->props['dnxtiep_hover_gradient_type'];
		}
		// Hover Image Linear Gradient Direction
		if ( '' !== $this->props['dnxtiep_hover_gradient_type_linear_direction']){
			$dnxtiep_hover_gl = $this->props['dnxtiep_hover_gradient_type_linear_direction'];
		}
		// Hover Image Radial Gradient Direction
		if ( '' !== $this->props['dnxtiep_hover_gradient_type_radial_direction']) {
			$dnxtiep_hover_gr = $this->props['dnxtiep_hover_gradient_type_radial_direction'];
		}	
		// Apply gradient direcion
		if ( 'radial-gradient' === $this->props['dnxtiep_hover_gradient_type']) {
			$dnxtiep_hover_gradient_apply = sprintf('%1$s', $dnxtiep_hover_gr);
		} else if ( 'linear-gradient' === $this->props['dnxtiep_hover_gradient_type']) {
			$dnxtiep_hover_gradient_apply = sprintf('%1$s', $dnxtiep_hover_gl);
		}
		// Gradient color one for Hover Background Image
		if ( '' !== $this->props['dnxtiep_hover_gradient_color_one']) {
			$dnxtiep_hover_gradient_color_one = $this->props['dnxtiep_hover_gradient_color_one'];
		}
		// Gradient color two for Hover Background Image
		if ( '' !== $this->props['dnxtiep_hover_gradient_color_two']) {
			$dnxtiep_hover_gradient_color_two = $this->props['dnxtiep_hover_gradient_color_two'];
		}
		// Hover Background Image Gradient color start position 
		if ( '' !== $this->props['dnxtiep_hover_gradient_start_position']){
			$dnxtiep_hover_gradient_start_position = $this->props['dnxtiep_hover_gradient_start_position'];
		}
		// Hover Background Image Gradient color end position
		if ( '' !== $this->props['dnxtiep_hover_gradient_end_position']){
			$dnxtiep_hover_gradient_end_position = $this->props['dnxtiep_hover_gradient_end_position'];
		}
		// Hover Background Image Gradient setting up
		if ( 'off' !== $this->props['dnxtiep_hover_gradient_show_hide']){
			$declaration = sprintf(
				'background: %s(%s, %s %s, %s %s);',
				esc_html($dnxtiep_hover_gradient_type),                 
				esc_html($dnxtiep_hover_gradient_apply),                
				esc_html($dnxtiep_hover_gradient_color_one),            
				esc_html($dnxtiep_hover_gradient_start_position),       
				esc_html($dnxtiep_hover_gradient_color_two),            
				esc_html($dnxtiep_hover_gradient_end_position)           
			);
			if ( in_array( $dnxtiep_image_hover_effect, $blocks_effects, true ) ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-blocks']:before, %%order_class%% [class^='imghvr-blocks']:after, %%order_class%% [class^='imghvr-blocks'] figcaption:before, %%order_class%% [class^='imghvr-blocks'] figcaption:after",
					'declaration' => $declaration,
				) );
			} else if ( in_array( $dnxtiep_image_hover_effect, $strip_effects, true ) ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-strip']:before, %%order_class%% [class^='imghvr-strip']:after, %%order_class%% [class^='imghvr-strip'] figcaption:before, %%order_class%% [class^='imghvr-strip'] figcaption:after",
					'declaration' => $declaration,
				) );
			} else if ( in_array( $dnxtiep_image_hover_effect, $pixel_effects, true ) ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-pixel']:before, %%order_class%% [class^='imghvr-pixel']:after, %%order_class%% [class^='imghvr-pixel'] figcaption:before, %%order_class%% [class^='imghvr-pixel'] figcaption:after",
					'declaration' => $declaration,
				) );
			} else if ( in_array( $dnxtiep_image_hover_effect, $border_effects, true ) ) {
				$dnxtiep_border_effect_color_style 		  = sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_border_effect_color ) );
				$dnxtiep_border_effect_color_tablet_style = '' !== $dnxtiep_border_effect_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_border_effect_color_tablet ) ) : '';
				$dnxtiep_border_effect_color_phone_style  = '' !== $dnxtiep_border_effect_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_border_effect_color_phone ) ) : '';

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-border']:before, %%order_class%% [class^='imghvr-border']:after, %%order_class%% [class^='imghvr-border'] figcaption:before, %%order_class%% [class^='imghvr-border'] figcaption:after",
					'declaration' => $dnxtiep_border_effect_color_style,
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-border']:before, %%order_class%% [class^='imghvr-border']:after, %%order_class%% [class^='imghvr-border'] figcaption:before, %%order_class%% [class^='imghvr-border'] figcaption:after",
					'declaration' => $dnxtiep_border_effect_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );
	
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-border']:before, %%order_class%% [class^='imghvr-border']:after, %%order_class%% [class^='imghvr-border'] figcaption:before, %%order_class%% [class^='imghvr-border'] figcaption:after",
					'declaration' => $dnxtiep_border_effect_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );

				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-']",
					'declaration' => $declaration,
				) );

			} else if ( in_array( $dnxtiep_image_hover_effect, $blind_effects, true ) ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-blinds']:before, %%order_class%% [class^='imghvr-blinds']:after, %%order_class%% [class^='imghvr-blinds'] figcaption:before, %%order_class%% [class^='imghvr-blinds'] figcaption:after",
					'declaration' => $declaration,
				) );
			} else if ( in_array( $dnxtiep_image_hover_effect, $book_effects, true ) ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-book']:before, %%order_class%% [class^='imghvr-book']:after, %%order_class%% [class^='imghvr-book'] figcaption:before, %%order_class%% [class^='imghvr-book'] figcaption:after",
					'declaration' => $declaration,
				) );
			} else if ( in_array( $dnxtiep_image_hover_effect, $circle_effects, true ) ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-circle']:before, %%order_class%% [class^='imghvr-circle']:after, %%order_class%% [class^='imghvr-circle'] figcaption:before, %%order_class%% [class^='imghvr-circle'] figcaption:after",
					'declaration' => $declaration,
				) );
			} else if ( in_array( $dnxtiep_image_hover_effect, $grad_effects, true ) ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'], %%order_class%% [class^='imghvr-grad']:before, %%order_class%% [class^='imghvr-grad']:after, %%order_class%% [class^='imghvr-grad'] figcaption:before, %%order_class%% [class^='imghvr-grad'] figcaption:after",
					'declaration' => $declaration,
				) );
			} else {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    => "%%order_class%% [class^='imghvr-'] figcaption",
					'declaration' => $declaration,
				) );
			}
		}

		// Button BG Color
		$dnxtiep_btn_bg_color			= esc_attr($this->props['dnxtiep_btn_bg_color']);
		$dnxtiep_btn_bg_color_hover   	= $this->get_hover_value( 'dnxtiep_btn_bg_color' );
		$dnxtiep_btn_bg_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_btn_bg_color' );
		$dnxtiep_btn_bg_color_tablet	= isset( $dnxtiep_btn_bg_color_values['tablet'] ) ? $dnxtiep_btn_bg_color_values['tablet'] : '';
		$dnxtiep_btn_bg_color_phone		= isset( $dnxtiep_btn_bg_color_values['phone'] ) ? $dnxtiep_btn_bg_color_values['phone'] : '';

		if ( 'off' !== esc_attr($this->props['dnxtiep_btn_bg_show_hide']) ) {
			$dnxtiep_btn_bg_color_style 		 = sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_btn_bg_color ) );
			$dnxtiep_btn_bg_color_tablet_style = '' !== $dnxtiep_btn_bg_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_btn_bg_color_tablet ) ) : '';
			$dnxtiep_btn_bg_color_phone_style  = '' !== $dnxtiep_btn_bg_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_btn_bg_color_phone ) ) : '';
			
			$dnxtiep_btn_bg_color_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'dnxtiep_btn_bg_color', $this->props ) ) {
				$dnxtiep_btn_bg_color_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_btn_bg_color_hover ) );
			}
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-nie-uih-btn",
				'declaration' => $dnxtiep_btn_bg_color_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-nie-uih-btn",
				'declaration' => $dnxtiep_btn_bg_color_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-nie-uih-btn",
				'declaration' => $dnxtiep_btn_bg_color_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if ( "" !== $dnxtiep_btn_bg_color_style_hover ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxt-nie-uih-btn:hover" ),
					'declaration' => $dnxtiep_btn_bg_color_style_hover ,
				) );
			}
		}

		$this->apply_css($render_slug);
		return sprintf( 
			'<figure class="%5$s dnxtiep-imghvr-wrapper">
				%1$s
				<figcaption class="%6$s %7$s dnxtiep-imghvr-content">
					%2$s
					%3$s
					%4$s
				</figcaption>
			</figure>',
			$dnxtiep_img, 
			$dnxtiepheadingtext,
			$this->process_content( $description ),
			et_core_sanitized_previously( $button ),
			esc_attr( $dnxtiep_image_hover_effect_classes ), //5
			esc_attr( $dnxtiep_text_effect ),
			esc_attr( $dnxtiep_text_delay )
		);
	}

	public function apply_css($render_slug){


		/**
         * Custom Padding Margin Output
         *
        */

        Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_caption_margin", "%%order_class%% [class^='imghvr-'] figcaption", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_caption_padding", "%%order_class%% [class^='imghvr-'] figcaption", "padding");
		
		Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_heading_margin", "%%order_class%% .dnxtiep-heading", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_heading_padding", "%%order_class%% .dnxtiep-heading", "padding");

		Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_description_margin", "%%order_class%% .dnxtiep-description", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_description_padding", "%%order_class%% .dnxtiep-description", "padding");
		
		Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_btn_margin", "%%order_class%% .dnxt-nie-uih-btn", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_btn_padding", "%%order_class%% .dnxt-nie-uih-btn", "padding");



		if( "off" !== esc_attr($this->props['dnxtiep_btn_icon']) && 'off' !== esc_attr($this->props['dnxtiep_btn_switch']) ) {
			// Button Icon Placement
			if ( 'right' === $this->props['dnxtiep_btn_icon_placement'] ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    	=> "%%order_class%% .dnxt-nie-uih-btn::after",
					'declaration'	=> sprintf('content: %1$s;opacity: %2$s;',esc_attr('attr(data-icon)'),esc_attr('1'))
				) );
			}else if( 'left' === $this->props['dnxtiep_btn_icon_placement'] ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    	=> "%%order_class%% .dnxt-nie-uih-btn::before",
					'declaration'	=> sprintf('content: %1$s;opacity: %2$s;',esc_attr('attr(data-icon)'),esc_attr('1')),
				) );
			}

			if( 'on' === $this->props['dnxtiep_btn_on_hover'] && 'right' === $this->props['dnxtiep_btn_icon_placement']) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    	=> "%%order_class%% .dnxtiep-btn-icon-on-hover:hover:after",
					'declaration'	=> sprintf('left: %1$s;margin-left: %2$s;opacity: %3$s !important;',esc_attr('auto'),esc_attr('.3em'),esc_attr('1'))
				) );
			} else if ( 'on' === $this->props['dnxtiep_btn_on_hover'] && 'left' === $this->props['dnxtiep_btn_icon_placement'] ) {
				ET_Builder_Element::set_style($render_slug, array(
					'selector'    	=> "%%order_class%% .dnxtiep-btn-icon-on-hover:hover:before",
					'declaration'	=> sprintf('right: %1$s;margin-right: %2$s;opacity: %3$s !important;',esc_attr('auto'),esc_attr('.3em'),esc_attr('1')),
				) );
			}
		}


		// Button Gradient
		$dnxtiep_btn_bg_gradient_apply      	= '';
		$dnxtiep_btn_bg_gradient_color_one 		= '';
		$dnxtiep_btn_bg_gradient_color_two 		= '';
		$dnxtiep_btn_bg_gradient_type	   		= '';
		$dnxtiep_btn_bg_gl             			= '';
		$dnxtiep_btn_bg_gr             			= '';
		$dnxtiep_btn_bg_gradient_start_position	= '';
		$dnxtiep_btn_bg_gradient_end_position  	= '';

		// checking gradient type
		if ( '' !== $this->props['dnxtiep_btn_gradient_type']){
			$dnxtiep_btn_bg_gradient_type = $this->props['dnxtiep_btn_gradient_type'];
		}
		// Button Linear Gradient Direction
		if ( '' !== $this->props['dnxtiep_btn_gradient_type_linear_direction']){
			$dnxtiep_btn_bg_gl = $this->props['dnxtiep_btn_gradient_type_linear_direction'];
		}

		// Button Radial Gradient Direction
		if ( '' !== $this->props['dnxtiep_btn_gradient_type_radial_direction']){
			$dnxtiep_btn_bg_gr = $this->props['dnxtiep_btn_gradient_type_radial_direction'];
		}	
		// Button Apply gradient direcion
		if ( 'radial-gradient' === $this->props['dnxtiep_btn_gradient_type']){
			$dnxtiep_btn_bg_gradient_apply = sprintf('%1$s', $dnxtiep_btn_bg_gr);
		} else if ( 'linear-gradient' === $this->props['dnxtiep_btn_gradient_type']){
			$dnxtiep_btn_bg_gradient_apply = sprintf('%1$s', $dnxtiep_btn_bg_gl);
		}

		// Gradient color one for Button
		if ( '' !== $this->props['dnxtiep_btn_gradient_color_one']) {
			$dnxtiep_btn_bg_gradient_color_one = $this->props['dnxtiep_btn_gradient_color_one'];
		}
		// Gradient color two for Button
		if ( '' !== $this->props['dnxtiep_btn_gradient_color_two']){
			$dnxtiep_btn_bg_gradient_color_two = $this->props['dnxtiep_btn_gradient_color_two'];
		}
		// Button Gradient color start position 
		if ( '' !== $this->props['dnxtiep_btn_gradient_start_position']){
			$dnxtiep_btn_bg_gradient_start_position = $this->props['dnxtiep_btn_gradient_start_position'];
		}
		// Button Gradient color end position
		if ( '' !== $this->props['dnxtiep_btn_gradient_end_position']) {
			$dnxtiep_btn_bg_gradient_end_position = $this->props['dnxtiep_btn_gradient_end_position'];
		}
		// Button Gradient setting up
		if ( 'off' !== $this->props['dnxtiep_btn_gradient_show_hide']){
			$declaration = sprintf(
				'background: %s(%s, %s %s, %s %s);',
				esc_html($dnxtiep_btn_bg_gradient_type),                 
				esc_html($dnxtiep_btn_bg_gradient_apply),                
				esc_html($dnxtiep_btn_bg_gradient_color_one),            
				esc_html($dnxtiep_btn_bg_gradient_start_position),       
				esc_html($dnxtiep_btn_bg_gradient_color_two),            
				esc_html($dnxtiep_btn_bg_gradient_end_position)           
			);
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-nie-uih-btn",
				'declaration' => $declaration,
			) );
		}


		if ( 'center' === esc_attr($this->props['dnxtiep_btn_align_tablet']) ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('justify-content: %1$s',esc_attr('center;')),
			) );
		} else if ( 'right'=== esc_attr($this->props['dnxtiep_btn_align_tablet']) ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('justify-content: %1$s',esc_attr('flex-end;')),
			) );
		} else if ( 'left'=== esc_attr($this->props['dnxtiep_btn_align_tablet']) ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('justify-content: %1$s',esc_attr('flex-start;')),
			) );
		}

		if ( 'center' === esc_attr($this->props['dnxtiep_btn_align_phone']) ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('justify-content: %1$s',esc_attr('center;')),
			) );
		} else if ( 'right' ===esc_attr($this->props['dnxtiep_btn_align_phone']) ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('justify-content: %1$s',esc_attr('flex-end;')),
			) );
		} else if ( 'left' === esc_attr($this->props['dnxtiep_btn_align_phone']) ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('justify-content: %1$s',esc_attr('flex-start;')),
			) );
		} 


		if ( 'center'=== $this->props['dnxtiep_btn_align']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('justify-content: %1$s',esc_attr('center;')),
			) );
		} else if ( 'right'=== $this->props['dnxtiep_btn_align']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('justify-content: %1$s',esc_attr('flex-end;')),
			) );
		} else if ( 'on|tablet' === $this->props['dnxtiep_btn_align_last_edited']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('%1$s',esc_attr($this->props['dnxtiep_btn_align_tablet'])),
			) );
		} else if ( 'on|phone' === $this->props['dnxtiep_btn_align_last_edited'] ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('%1$s',esc_attr($this->props['dnxtiep_btn_align_phone'])),
			) );
		} else {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep-button",
				'declaration' => sprintf('justify-content: %1$s',esc_attr('flex-start;')),
			) );
		}
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

new Next_Mega_Image_Effect;