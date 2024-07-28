<?php
include_once(DIVI_ESSENTIAL_PATH.'/includes/modules/base/Common.php');

class Next_Image_Icon extends ET_Builder_Module {

	public $slug       = 'dnxte_image_icon';
	public $vb_support = 'on';
	public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-image-icon-effect/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name        = esc_html__( 'Next Image Icon Effect', 'dnxte-divi-essential' );
		$this->icon_path   = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->folder_name = 'et_pb_divi_essential';

		$this->settings_modal_toggles = array(
			'general'   => array(
				'toggles' => array(
					'dnxtiep_iie_img'	=> array(
						'title'		=> esc_html__( 'Image', 'dnxte-divi-essential' ),
						'priority'	=>	10,
					),
					'dnxtiep_iie_icon_image' => array(
						'title'		=> esc_html__( 'Icon', 'dnxte-divi-essential' ),
						'priority'	=>	11,
					),
					'dnxtiep_iie_background' => array(
						'title'		=> esc_html__( 'Background Bottom', 'dnxte-divi-essential' ),
						'priority'	=>	13,
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
					'dnxtiep_iie_background_around' => array(
						'title'		=> esc_html__( 'Background Around', 'dnxte-divi-essential' ),
						'priority'	=>	13,
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
				)
			),
			'advanced'  => array(
				'toggles' => array(
					'dnxtiep_iie_hover_effect' => esc_html__( 'Hover Effect', 'dnxte-divi-essential' ),
					'dnxtiep_iie_fonts'	=> array(
						"title"		=>	esc_html__( 'Fonts', 'dnxte-divi-essential' ),
						'sub_toggles'       => array(
                            'sub_toggle_heading'   => array(
								'name' => esc_html__( 'Heading', 'dnxte-divi-essential' )
                            ),
                            'sub_toggle_focus'   => array(
								'name' => esc_html__( 'Focus', 'dnxte-divi-essential' )
                            )
                        ),
                        'tabbed_subtoggles' => true,
					),
					'dnxtiep_iie_icon_settings' => esc_html__( 'Icon Settings', 'dnxte-divi-essential' ),
				)
			)
		);

		$this->custom_css_fields = array(
			'dnxtiep_iie_heading_text' => array(
				'label'    => esc_html__( 'Heading', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnext-neip-main-heading',
			),
			'dnxtiep_iie_heading_bold' => array(
				'label'    => esc_html__( 'Focus Text', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .dnext-neip-focus-text',
			),
			'dnxtiep_iie_icon_image_select_one' => array(
				'label'    => esc_html__( 'Icon 1', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% figcaption p a i.dnxtiep_iie_icon1',
			),
			'dnxtiep_iie_icon_image_select_two' => array(
				'label'    => esc_html__( 'Icon 2', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% figcaption p a i.dnxtiep_iie_icon2',
			),
			'dnxtiep_iie_icon_image_select_three' => array(
				'label'    => esc_html__( 'Icon 3', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% figcaption p a i.dnxtiep_iie_icon3',
			),
			'dnxtiep_iie_icon_image_select_four' => array(
				'label'    => esc_html__( 'Icon 4', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% figcaption p a i.dnxtiep_iie_icon4',
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'background'            => array(
				'use_background_pattern'    => false,
				'use_background_mask'       => false,
				'css'   => array(
					'main' => "%%order_class%% figure",
					'important' => true,
				),
			),
			'fonts'                => array(
				'hover_text_fonts' => array(
					'label'    		=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   => 'dnxtiep_iie_fonts',
					'sub_toggle'    => 'sub_toggle_heading',
					'tab_slug'		=> 'advanced',
					'css'      => array(
						'main' => "%%order_class%% .dnext-neip-main-heading",
						'text_align' => "%%order_class%% .dnext-neip-iie-des-heading, %%order_class%% .dnext-neip-iie-heading",
						'important' => 'all'
					),
				),
				'hover_text_heading_bold' => array(
					'label'    		=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   => 'dnxtiep_iie_fonts',
					'sub_toggle'    => 'sub_toggle_focus',
					'tab_slug'		=> 'advanced',
					'css'      => array(
						'main' => "%%order_class%% .dnext-neip-focus-text",
						'important' => 'all'
					),
				),
				'hover_text_icon' => array(
					'label'    		=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   => 'dnxtiep_iie_icon_settings',
					'tab_slug'		=> 'advanced',
					'hide_font'		=> true,
					'hide_text_align' => true,
					'hide_text_color' => true,
					'hide_font_size'  => true,
					'hide_letter_spacing' => true,
					'hide_line_height' => true,
					'css'      => array(
						'main' => "%%order_class%% .et-pb-icon",
						'important' => 'all'
					),
				),
			),
			'text'              => false,
			'margin_padding'    => array(
				'css' => array(
					'margin' => "%%order_class%% .dnext-neip-iie-grid figure",
					'padding' => "%%order_class%% .dnext-neip-iie-grid figure",
					'important' => 'all',
				),
			),
			'borders'               => array(
				'default' => array(
					'css'	=> array(
						'main'	=> array(
							'border_radii'  => "%%order_class%% .dnext-neip-iie-grid figure",
							'border_styles' => "%%order_class%% .dnext-neip-iie-grid figure",
						),
						'important' => 'all'
					)
				),
				'dnxtiep_icon_border' => array(
					'label'    		=> esc_html__( 'Icon Border', 'dnxte-divi-essential' ),
					'toggle_slug'   => 'dnxtiep_iie_icon_settings',
					'tab_slug'		=> 'advanced',
					'css'      => array(
						'main'	=> array(
							'border_radii'  => "%%order_class%% figcaption p a i,%%order_class%% figcaption p a span",
							'border_styles' => "%%order_class%% figcaption p a i,%%order_class%% figcaption p a span",
						),
						'important' => 'all'
					),
				)
			),
			'box_shadow'	=> array(
				'default' => array(
					'css'             => array(
						'main'        => "%%order_class%% .dnext-neip-iie-grid figure",
					),
				),
			),
		);	
	}


	public function get_fields() {
		return array(
			// Heading Text
			'dnxtiep_iie_heading_text'	=> array(
				'label'           	=> esc_html__( 'Heading Text', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'dynamic_content' 	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Heading Text entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'main_content',
			),
			// Heading Text
			'dnxtiep_iie_heading_bold'	=> array(
				'label'           	=> esc_html__( 'Focus Text', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'dynamic_content' 	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Heading bold text entered here will appear inside the module after the heading text.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'main_content',
			),
			//Heading Tag
			'dnxtiep_iie_heading_tag'	=> array(
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
			// Image
			'dnxtiep_iie_image'			=> array(
				'label'              	=> esc_html__( 'Image', 'dnxte-divi-essential' ),
				'type'               	=> 'upload',
				'option_category'    	=> 'basic_option',
				'upload_button_text' 	=> esc_attr__( 'Upload an image', 'dnxte-divi-essential' ),
				'choose_text'        	=> esc_attr__( 'Choose an Image', 'dnxte-divi-essential' ),
				'update_text'        	=> esc_attr__( 'Set As Image', 'dnxte-divi-essential' ),
				'description'        	=> esc_html__( 'Upload an image to display at the top of your blurb.', 'dnxte-divi-essential' ),
				'toggle_slug'        	=> 'dnxtiep_iie_img',
				'dynamic_content'    	=> 'image',
				'data_type'				=> 'image',
				'mobile_options'	 	=> true,
				'hover'					=> 'tabs',
			),
			// Image alt
			'dnxtiep_iie_alt'		=> array(
				'label'           	=> esc_html__( 'Image Alt Text', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Define the HTML ALT text for your image here.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'dnxtiep_iie_img',
				'dynamic_content' 	=> 'text',
			),
			'dnxtiep_iie_image_hover_effect'=> array(
				'label'             	=> esc_html__( 'Select Image Hover', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_iie_hover_effect',
				'description'           => esc_html__( 'Here you can adjust the hover effect.', 'dnxte-divi-essential' ),
				'options'               => array(
					'zoe'   				=>  esc_html__( 'Zoe', 'dnxte-divi-essential' ),
					'hera'   				=>  esc_html__( 'Hera', 'dnxte-divi-essential' ),
					'winston'   				=>  esc_html__( 'Winston', 'dnxte-divi-essential' ),
					'terry'   				=>  esc_html__( 'Terry', 'dnxte-divi-essential' ),
					'phoebe'   				=>  esc_html__( 'Phoebe', 'dnxte-divi-essential' ),
					'kira'   				=>  esc_html__( 'Kira', 'dnxte-divi-essential' ),
				),
				'default'               => 'zoe'
			),
			'dnxtiep_iie_bottom_bg'	 => array(
				'label'          => esc_html__( 'Bottom Background Color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_iie_background',
				'sub_toggle'     => 'sub_toggle_color',
				'default'        => '#29c4a9',
				'mobile_options' => true,
				'responsive'	 => true,
				'show_if'        => array(
					'dnxtiep_iie_image_hover_effect' => "zoe"
				)
			),
			//Background Overlay Gradient 
			'dnxtiep_iie_bottom_bg_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Background Overlay Gradient', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'dnxtiep_iie_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_iie_bottom_bg_gradient_color_one',
					'dnxtiep_iie_bottom_bg_gradient_color_two',
					'dnxtiep_iie_bottom_bg_gradient_type',
					'dnxtiep_iie_bottom_bg_gradient_start_position',
					'dnxtiep_iie_bottom_bg_gradient_end_position'
				),
				'default_on_front' => 'off',
				'show_if'        => array(
					'dnxtiep_iie_image_hover_effect' => "zoe"
				)
			),
			'dnxtiep_iie_bottom_bg_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_iie_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxtiep_iie_bottom_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_image_hover_effect' => "zoe"
				)
			),
			'dnxtiep_iie_bottom_bg_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_iie_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxtiep_iie_bottom_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_image_hover_effect' => "zoe"
				)
			),
			'dnxtiep_iie_bottom_bg_gradient_type'		=> array(
				'label'           => esc_html__( 'Select Gradient Type', 'dnxte-divi-essential' ),
				'type'            => 'select',
				'description'     => esc_html__( 'Select the types of gradient', 'dnxte-divi-essential' ),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_iie_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'dnxte-divi-essential' ),
					'radial-gradient' => esc_html__( 'Radial', 'dnxte-divi-essential' ),
				),
				'default'         => 'linear-gradient',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxtiep_iie_bottom_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_image_hover_effect' => "zoe"
				)
			),
			'dnxtiep_iie_bottom_bg_gradient_type_linear_direction'   => array(
				'label'           => esc_html__( 'Linear direction', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxtiep_iie_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'dnxtiep_iie_bottom_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_bottom_bg_gradient_type' 		 => 'linear-gradient',
					'dnxtiep_iie_image_hover_effect' => "zoe"
				),
			),
			'dnxtiep_iie_bottom_bg_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__( 'Radial Direction', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the types of gradient', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxtiep_iie_background',
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
					'dnxtiep_iie_bottom_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_bottom_bg_gradient_type'		=> 'radial-gradient',
					'dnxtiep_iie_image_hover_effect' => "zoe"
				),
			),
			'dnxtiep_iie_bottom_bg_gradient_start_position'           => array(
				'label'           => esc_html__( 'Start Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_iie_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '0%',
				'fixed_unit'      => '%',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxtiep_iie_bottom_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_image_hover_effect' => "zoe"
				)
			),
			'dnxtiep_iie_bottom_bg_gradient_end_position'             => array(
				'label'           => esc_html__( 'End Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_iie_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '100%',
				'depends_show_if'=> 'on',
				'fixed_unit'      => '%',
				'show_if'        => array(
					'dnxtiep_iie_bottom_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_image_hover_effect' => "zoe"
				)
			),
			'dnxtiep_iie_icon_bg'	 => array(
				'label'          => esc_html__( 'Background Color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_iie_background_around',
				'sub_toggle'     => 'sub_toggle_color',
				'default'        => '#000000',
				'mobile_options' => true,
				'responsive'	 => true,
				'show_if'        => array(
					'dnxtiep_iie_image_hover_effect' => array("terry", "kira")
				)
			),
			//Icon Background Gradient 
			'dnxtiep_iie_icon_bg_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Background Gradient', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'dnxtiep_iie_background_around',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_iie_icon_bg_gradient_color_one',
					'dnxtiep_iie_icon_bg_gradient_color_two',
					'dnxtiep_iie_icon_bg_gradient_type',
					'dnxtiep_iie_icon_bg_gradient_start_position',
					'dnxtiep_iie_icon_bg_gradient_end_position'
				),
				'default_on_front' => 'off',
				'show_if'        => array(
					'dnxtiep_iie_image_hover_effect' => array("terry", "kira")
				)
			),
			'dnxtiep_iie_icon_bg_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_iie_background_around',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxtiep_iie_icon_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_image_hover_effect' => array("terry", "kira")
				)
			),
			'dnxtiep_iie_icon_bg_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_iie_background_around',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxtiep_iie_icon_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_image_hover_effect' => array("terry", "kira")
				)
			),
			'dnxtiep_iie_icon_bg_gradient_type'		=> array(
				'label'           => esc_html__( 'Select Gradient Type', 'dnxte-divi-essential' ),
				'type'            => 'select',
				'description'     => esc_html__( 'Select the types of gradient', 'dnxte-divi-essential' ),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_iie_background_around',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'dnxte-divi-essential' ),
					'radial-gradient' => esc_html__( 'Radial', 'dnxte-divi-essential' ),
				),
				'default'         => 'linear-gradient',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxtiep_iie_icon_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_image_hover_effect' => array("terry", "kira")
				)
			),
			'dnxtiep_iie_icon_bg_gradient_type_linear_direction'   => array(
				'label'           => esc_html__( 'Linear direction', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxtiep_iie_background_around',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'dnxtiep_iie_icon_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_icon_bg_gradient_type' 		 => 'linear-gradient',
					'dnxtiep_iie_image_hover_effect' => array("terry", "kira")
				),
			),
			'dnxtiep_iie_icon_bg_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__( 'Radial Direction', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the types of gradient', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxtiep_iie_background_around',
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
					'dnxtiep_iie_icon_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_icon_bg_gradient_type'		=> 'radial-gradient',
					'dnxtiep_iie_image_hover_effect' => array("terry", "kira")
				),
			),
			'dnxtiep_iie_icon_bg_gradient_start_position'           => array(
				'label'           => esc_html__( 'Start Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_iie_background_around',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '0%',
				'fixed_unit'      => '%',
				'depends_show_if'=> 'on',
				'show_if'        => array(
					'dnxtiep_iie_icon_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_image_hover_effect' => array("terry", "kira")
				)
			),
			'dnxtiep_iie_icon_bg_gradient_end_position'             => array(
				'label'           => esc_html__( 'End Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_iie_background_around',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '100%',
				'depends_show_if'=> 'on',
				'fixed_unit'      => '%',
				'show_if'        => array(
					'dnxtiep_iie_icon_bg_gradient_show_hide' => 'on',
					'dnxtiep_iie_image_hover_effect' => array("terry", "kira")
				)
			),
			//Icon ONE
			'dnxtiep_iie_icon_show_hide_one'  => array(
				'label'           => esc_html__( 'Use Icon 1', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'dnxtiep_iie_icon_image',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_iie_icon_image_link_one',
					'dnxtiep_iie_icon_image_select_one',
				),
				'default_on_front' => 'off'
			),
			'dnxtiep_iie_icon_image_link_one'	=> array(
				'label'           	=> esc_html__( 'Icon 1 Link', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'default'           => '#',
				'description'     	=> esc_html__( 'When clicked the module will link to this URL.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'dnxtiep_iie_icon_image',
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_one' => 'on'
				)
			),
			'dnxtiep_iie_icon_image_link_target_one'   => array(
				'label'           	=> esc_html__( 'Icon 1 Link Target', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the link target', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxtiep_iie_icon_image',
				'options'       	=> array(
					'_self'       => esc_html__(	'In The Same Window', 'dnxte-divi-essential' ),
					'_blank'       => esc_html__(	'In The New Tab', 'dnxte-divi-essential' ),

				),
				'default'         => '_self',
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_one' => 'on'
				)
			),
			'dnxtiep_iie_icon_image_select_one' => array(
				'label'           => esc_html__( 'Icon 1', 'dnxte-divi-essential' ),
				'type'            => 'select_icon',
				'class'           => array('et-pb-font-icon'),
				'default'         => '',
				'toggle_slug'     => 'dnxtiep_iie_icon_image',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_one' => 'on'
				)
			),
			//Icon TWO
			'dnxtiep_iie_icon_show_hide_two'  => array(
				'label'           => esc_html__( 'Use Icon 2', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'dnxtiep_iie_icon_image',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_iie_icon_image_select_two',
				),
				'default_on_front' => 'off'
			),
			'dnxtiep_iie_icon_image_link_two'	=> array(
				'label'           	=> esc_html__( 'Icon 2 Link', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'default'           => '#',
				'description'     	=> esc_html__( 'When clicked the module will link to this URL.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'dnxtiep_iie_icon_image',
				'mobile_options'    => true,
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_two' => 'on'
				)
			),
			'dnxtiep_iie_icon_image_link_target_two'   => array(
				'label'           	=> esc_html__( 'Icon 2 Link Target', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the link target', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxtiep_iie_icon_image',
				'options'       	=> array(
					'_self'       => esc_html__(	'In The Same Window', 'dnxte-divi-essential' ),
					'_blank'       => esc_html__(	'In The New Tab', 'dnxte-divi-essential' ),

				),
				'default'         => '_self',
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_two' => 'on'
				)
			),
			'dnxtiep_iie_icon_image_select_two' => array(
				'label'           => esc_html__( 'Icon 2', 'dnxte-divi-essential' ),
				'type'            => 'select_icon',
				'class'           => array('et-pb-font-icon'),
				'default'         => '',
				'toggle_slug'     => 'dnxtiep_iie_icon_image',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_two' => 'on'
				)
			),
			//Icon three
			'dnxtiep_iie_icon_show_hide_three'  => array(
				'label'           => esc_html__( 'Use Icon 3', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'dnxtiep_iie_icon_image',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_iie_icon_image_select_three',
				),
				'default_on_front' => 'off'
			),
			'dnxtiep_iie_icon_image_link_three'	=> array(
				'label'           	=> esc_html__( 'Icon 3 Link', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'default'           => '#',
				'description'     	=> esc_html__( 'When clicked the module will link to this URL.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'dnxtiep_iie_icon_image',
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_three' => 'on'
				)
			),
			'dnxtiep_iie_icon_image_link_target_three'   => array(
				'label'           	=> esc_html__( 'Icon 3 Link Target', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the link target', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxtiep_iie_icon_image',
				'options'       	=> array(
					'_self'       => esc_html__(	'In The Same Window', 'dnxte-divi-essential' ),
					'_blank'       => esc_html__(	'In The New Tab', 'dnxte-divi-essential' ),

				),
				'default'         => '_self',
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_three' => 'on'
				)
			),
			'dnxtiep_iie_icon_image_select_three' => array(
				'label'           => esc_html__( 'Icon 3', 'dnxte-divi-essential' ),
				'type'            => 'select_icon',
				'class'           => array('et-pb-font-icon'),
				'default'         => '',
				'toggle_slug'     => 'dnxtiep_iie_icon_image',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_three' => 'on'
				)
			),
			//Icon three
			'dnxtiep_iie_icon_show_hide_four'  => array(
				'label'           => esc_html__( 'Use Icon 4', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'dnxtiep_iie_icon_image',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_iie_icon_image_select_four',
				),
				'default_on_front' => 'off'
			),
			'dnxtiep_iie_icon_image_link_four'	=> array(
				'label'           	=> esc_html__( 'Icon 4 Link', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'default'           => '#',
				'description'     	=> esc_html__( 'When clicked the module will link to this URL.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'dnxtiep_iie_icon_image',
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_four' => 'on'
				)
			),
			'dnxtiep_iie_icon_image_link_target_four'   => array(
				'label'           	=> esc_html__( 'Icon 4 Link Target', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the link target', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxtiep_iie_icon_image',
				'options'       	=> array(
					'_self'       => esc_html__(	'In The Same Window', 'dnxte-divi-essential' ),
					'_blank'       => esc_html__(	'In The New Tab', 'dnxte-divi-essential' ),

				),
				'default'         => '_self',
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_four' => 'on'
				)
			),
			'dnxtiep_iie_icon_image_select_four' => array(
				'label'           => esc_html__( 'Icon 4', 'dnxte-divi-essential' ),
				'type'            => 'select_icon',
				'class'           => array('et-pb-font-icon'),
				'default'         => '',
				'toggle_slug'     => 'dnxtiep_iie_icon_image',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_four' => 'on'
				)
			),
			'dnxtiep_iie_icon_color_one'	 => array(
				'label'          => esc_html__( 'Icon 1 color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dnxtiep_iie_icon_settings',
				'default'        => '#ffffff',
				'hover'	 		 => 'tabs',
				'mobile_options' => true,
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_one' => 'on'
				)
			),
			'dnxtiep_iie_icon_color_two'	 => array(
				'label'          => esc_html__( 'Icon 2 color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dnxtiep_iie_icon_settings',
				'default'        => '#ffffff',
				'hover'	 		 => 'tabs',
				'mobile_options' => true,
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_two' => 'on'
				)
			),
			'dnxtiep_iie_icon_color_three'	 => array(
				'label'          => esc_html__( 'Icon 3 color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dnxtiep_iie_icon_settings',
				'default'        => '#ffffff',
				'hover'	 		 => 'tabs',
				'mobile_options' => true,
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_three' => 'on'
				)
			),
			'dnxtiep_iie_icon_color_four'	 => array(
				'label'          => esc_html__( 'Icon 4 color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dnxtiep_iie_icon_settings',
				'default'        => '#ffffff',
				'hover'	 		 => 'tabs',
				'mobile_options' => true,
				'show_if'         => array(
					'dnxtiep_iie_icon_show_hide_four' => 'on'
				)
			),
			'dnxtiep_iie_heading_margin'	=> array(
				'label'           		=> esc_html__('Heading Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
			),
			'dnxtiep_iie_heading_padding'	=> array(
				'label'           		=> esc_html__('Heading Padding', 'dnxte-divi-essential'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiep_iie_focus_padding'	=> array(
				'label'           		=> esc_html__('Focus Text Padding', 'dnxte-divi-essential'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiep_iie_icon_margin'	=> array(
				'label'           		=> esc_html__('Icon Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
			),
			'dnxtiep_iie_icon_padding'	=> array(
				'label'           		=> esc_html__('Icon Padding', 'dnxte-divi-essential'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiep_iie_icon_font_size'   => array(
				'label'           => esc_html__( 'Icon Size', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dnxtiep_iie_icon_settings',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 1000,
				),
				'default'         => '35px',
				'fixed_unit'      => 'px',
				'mobile_options'  => true,
				'responsive'      => true
			),
			'dnxtiep_iie_icon_letter_spacing'   => array(
				'label'           => esc_html__( 'Icon Spacing', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dnxtiep_iie_icon_settings',
				'range_settings'  => array(
					'step' => .1,
					'min'  => 0,
					'max'  => 10,
				),
				'default'         => '0em',
				'fixed_unit'      => 'em',
				'mobile_options'  => true,
				'responsive'      => true
			),
			'dnxtiep_iie_icon_line_height'   => array(
				'label'           => esc_html__( 'Icon Line Height', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dnxtiep_iie_icon_settings',
				'range_settings'  => array(
					'step' => .1,
					'min'  => 0,
					'max'  => 10,
				),
				'default'         => '1em',
				'fixed_unit'      => 'em',
				'mobile_options'  => true,
				'responsive'      => true
			),
			'dnxtiep_iie_icon_background_show_hide'  => array(
				'label'           => esc_html__( 'Use Icon Background', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',                
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxtiep_iie_icon_settings',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_iie_icon_background',
				),
				'default_on_front' => 'off'
			),
			'dnxtiep_iie_icon_background'	 => array(
				'label'          => esc_html__( 'Icon Background Color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxtiep_iie_icon_settings',
				'sub_toggle'     => 'sub_toggle_color',
				'default'        => '#29c4a9',
				'mobile_options' => true,
				'responsive'	 => true,
				'hover'          => true
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		wp_enqueue_style( 'dnext_image_icon' );
		$multi_view 						= et_pb_multi_view_options( $this );
		$dnxtiep_iie_image					=	$this->props['dnxtiep_iie_image'];
		$dnxtiep_iie_alt					=	esc_attr($this->props['dnxtiep_iie_alt']);

		$dnxtiep_iie_heading_text			=	esc_html($this->props['dnxtiep_iie_heading_text']);
		$dnxtiep_iie_heading_bold			=	esc_html($this->props['dnxtiep_iie_heading_bold']);
		$dnxtiep_iie_heading_tag			=	esc_attr($this->props['dnxtiep_iie_heading_tag']);

		$dnxtiep_iie_hover_effect       	=   esc_attr($this->props['dnxtiep_iie_image_hover_effect']);

		$icon_background_effect  = array(
			"terry",
			"kira"
		);

		$dnxtiep_iie_img_pathinfo 	= pathinfo( $dnxtiep_iie_image );
		$is_dnxtiep_iie_img_svg 	= isset( $dnxtiep_iie_img_pathinfo['extension'] ) ? 'svg' === $dnxtiep_iie_img_pathinfo['extension'] : false;
		

		$image_html = Common::get_image_html(
			'dnxtiep_iie_image', // image_slug
			$dnxtiep_iie_alt, // alt_text
			$dnxtiep_iie_heading_text, // title
			$multi_view, // multi_view
			$this // context
		);

		// Image
		$dnxtiep_iie_img = sprintf(
			'%1$s',
			$image_html
		);

		// Heading Text
		$dnxtiepheadingtext = '';
		if ( '' !== $dnxtiep_iie_heading_text ){
			if($dnxtiep_iie_hover_effect === "zoe") {
				$dnxtiepheadingtext = sprintf(
					'<%1$s class="dnext-neip-iie-des-heading"><span class="dnext-neip-main-heading">%2$s</span> <span class="dnext-neip-focus-text">%3$s</span></%1$s>',
					et_pb_process_header_level( $dnxtiep_iie_heading_tag, 'span' ),
					et_core_esc_previously( $dnxtiep_iie_heading_text ),
					et_core_esc_previously( $dnxtiep_iie_heading_bold )
				);
			}else{
				$dnxtiepheadingtext = sprintf(
				'<%1$s class="dnext-neip-iie-heading"><span class="dnext-neip-main-heading">%2$s</span> <span class="dnext-neip-focus-text">%3$s</span></%1$s>',
				et_pb_process_header_level( $dnxtiep_iie_heading_tag, 'span' ),
				et_core_esc_previously( $dnxtiep_iie_heading_text ),
				et_core_esc_previously( $dnxtiep_iie_heading_bold )
			);
			}
		}

		// ICON
		$iconlinks1 = "";
		$iconlinks2 = "";
		$iconlinks3 = "";
		$iconlinks4 = "";
		// Link
		$linkone = esc_url($this->props['dnxtiep_iie_icon_image_link_one']);
		$linktwo = esc_url($this->props['dnxtiep_iie_icon_image_link_two']);
		$linkthree = esc_url($this->props['dnxtiep_iie_icon_image_link_three']);
		$linkfour = esc_url($this->props['dnxtiep_iie_icon_image_link_four']);

		// Link Target
		$linktargetone = esc_attr($this->props['dnxtiep_iie_icon_image_link_target_one']);
		$linktargettwo = esc_attr($this->props['dnxtiep_iie_icon_image_link_target_two']);
		$linktargetthree = esc_attr($this->props['dnxtiep_iie_icon_image_link_target_three']);
		$linktargetfour = esc_attr($this->props['dnxtiep_iie_icon_image_link_target_four']);

		$icon = "";

		$is_effect_zoe = $dnxtiep_iie_hover_effect === "zoe" ? "icon-links" : "";

		if('off' !== esc_attr($this->props['dnxtiep_iie_icon_show_hide_one'])) {
			$icon_one_css_property = array(
				'selector'    => '%%order_class%% .et-pb-icon.dnxtiep_iie_icon.dnxtiep_iie_icon1',
				'class'       => 'et-pb-icon dnxtiep_iie_icon dnxtiep_iie_icon1'
			);
			$icon_one = Common::get_icon_html( 'dnxtiep_iie_icon_image_select_one', $this, $render_slug, $multi_view, $icon_one_css_property );

			$iconlinks1 = sprintf(
				'<a href="%2$s" target="%3$s">%1$s</a>',
				$icon_one,
				$linkone,
				$linktargetone
			);
		}

		if('off' !== esc_attr($this->props['dnxtiep_iie_icon_show_hide_two'])) {
			$icon_two_css_property = array(
				'selector'    => '%%order_class%% .et-pb-icon.dnxtiep_iie_icon.dnxtiep_iie_icon2',
				'class'       => 'et-pb-icon dnxtiep_iie_icon dnxtiep_iie_icon2'
			);
			$icon_two = Common::get_icon_html( 'dnxtiep_iie_icon_image_select_two', $this, $render_slug, $multi_view, $icon_two_css_property );

			$iconlinks2 = sprintf(
				'<a href="%2$s" target="%3$s">%1$s</a>',
				$icon_two,
				$linktwo,
				$linktargettwo
			);
		}

		if('off' !== esc_attr($this->props['dnxtiep_iie_icon_show_hide_three'])) {
			$icon_three_css_property = array(
				'selector'    => '%%order_class%% .et-pb-icon.dnxtiep_iie_icon.dnxtiep_iie_icon3',
				'class'       => 'et-pb-icon dnxtiep_iie_icon dnxtiep_iie_icon3'
			);
			$icon_three = Common::get_icon_html( 'dnxtiep_iie_icon_image_select_three', $this, $render_slug, $multi_view, $icon_three_css_property );

			$iconlinks3 = sprintf(
				'<a href="%2$s" target="%3$s">%1$s</a>',
				$icon_three,
				$linkthree,
				$linktargetthree
			);
		}

		if('off' !== esc_attr($this->props['dnxtiep_iie_icon_show_hide_four'])) {
			$icon_four_css_property = array(
				'selector'    => '%%order_class%% .et-pb-icon.dnxtiep_iie_icon.dnxtiep_iie_icon4',
				'class'       => 'et-pb-icon dnxtiep_iie_icon dnxtiep_iie_icon4'
			);
			$icon_four = Common::get_icon_html( 'dnxtiep_iie_icon_image_select_four', $this, $render_slug, $multi_view, $icon_four_css_property );

			$iconlinks4 = sprintf(
				'<a href="%2$s" target="%3$s">%1$s</a>',
				$icon_four,
				$linkfour,
				$linktargetfour
			);
		}
		
		$icon = sprintf(
			'<p class="%5$s">
				%1$s
				%2$s
				%3$s
				%4$s
			</p>',
			$iconlinks1,
			$iconlinks2,
			$iconlinks3,
			$iconlinks4,
			$is_effect_zoe
		);
		



		// DOWN BACKGROUND START
		$dnxtiep_iie_bottom_bg = esc_attr($this->props['dnxtiep_iie_bottom_bg']);
		$dnxtiep_iie_bottom_bg_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_iie_bottom_bg' );
		$dnxtiep_iie_bottom_bg_tablet = isset( $dnxtiep_iie_bottom_bg_values['tablet']) ? $dnxtiep_iie_bottom_bg_values['tablet'] : '';
		$dnxtiep_iie_bottom_bg_phone = isset( $dnxtiep_iie_bottom_bg_values['phone'] ) ?  $dnxtiep_iie_bottom_bg_values['phone'] : '';



		if($dnxtiep_iie_hover_effect === "zoe") {
			$dnxtiep_iie_bottom_bg_style = sprintf('background: %1$s !important;', esc_attr( $dnxtiep_iie_bottom_bg ));
			$dnxtiep_iie_bottom_bg_style_tablet = sprintf('background: %1$s !important;', esc_attr( $dnxtiep_iie_bottom_bg_tablet ));
			$dnxtiep_iie_bottom_bg_style_phone = sprintf('background: %1$s !important;', esc_attr( $dnxtiep_iie_bottom_bg_phone ));

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% figure.effect-zoe figcaption",
				'declaration' => $dnxtiep_iie_bottom_bg_style,
			) );
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% figure.effect-zoe figcaption",
				'declaration' => $dnxtiep_iie_bottom_bg_style_tablet,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% figure.effect-zoe figcaption",
				'declaration' => $dnxtiep_iie_bottom_bg_style_phone,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );
		}
		// DOWN BACKGROUND END

		// BACKGROUND BOTTOM  GRADIENT COLOR START 
		$dnxtiep_iie_bottom_bg_gradient_color_one = $this->props['dnxtiep_iie_bottom_bg_gradient_color_one'];
		$dnxtiep_iie_bottom_bg_gradient_color_two = $this->props['dnxtiep_iie_bottom_bg_gradient_color_two'];

		$dnxtiep_iie_bottom_bg_gradient_type      = $this->props['dnxtiep_iie_bottom_bg_gradient_type'];
		$dnxtiep_iie_bottom_bg_gradient_start     = $this->props['dnxtiep_iie_bottom_bg_gradient_start_position'];
		$dnxtiep_iie_bottom_bg_gradient_end       = $this->props['dnxtiep_iie_bottom_bg_gradient_end_position'];

		$dnxtiep_iie_bottom_bg_gradient_direction = $dnxtiep_iie_bottom_bg_gradient_type === 'linear-gradient' ? $this->props['dnxtiep_iie_bottom_bg_gradient_type_linear_direction'] : $this->props['dnxtiep_iie_bottom_bg_ontent_gradient_type_radial_direction'];


		if($dnxtiep_iie_hover_effect === "zoe" && 'off' !== esc_attr($this->props['dnxtiep_iie_bottom_bg_gradient_show_hide'])) {
			
			$dnxtiep_iie_bottom_bg_gradient = sprintf(
				'background: %1$s(%2$s, %3$s %5$s, %4$s %6$s) !important;',
				esc_html($dnxtiep_iie_bottom_bg_gradient_type), 
				esc_html($dnxtiep_iie_bottom_bg_gradient_direction), 
				esc_html($dnxtiep_iie_bottom_bg_gradient_color_one), 
				esc_html($dnxtiep_iie_bottom_bg_gradient_color_two), 
				esc_html($dnxtiep_iie_bottom_bg_gradient_start), 
				esc_html($dnxtiep_iie_bottom_bg_gradient_end)
			);

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% figure.effect-zoe figcaption",
				'declaration' => $dnxtiep_iie_bottom_bg_gradient,
			) );
		}
		// BACKGROUND BOTTOM GRADIENT COLOR END

		// ICON BACKGROUND COLOR START
		$dnxtiep_iie_icon_bg = esc_attr($this->props['dnxtiep_iie_icon_bg']);
		$dnxtiep_iie_icon_bg_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_iie_icon_bg' );
		$dnxtiep_iie_icon_bg_tablet = isset( $dnxtiep_iie_icon_bg_values['tablet']) ? $dnxtiep_iie_icon_bg_values['tablet'] : '';
		$dnxtiep_iie_icon_bg_phone = isset( $dnxtiep_iie_icon_bg_values['phone'] ) ?  $dnxtiep_iie_icon_bg_values['phone'] : '';


		if($dnxtiep_iie_hover_effect === "terry") {
			$dnxtiep_iie_icon_bg_style = sprintf('border-color: %1$s !important;', esc_attr__( $dnxtiep_iie_icon_bg ));
			$dnxtiep_iie_icon_bg_tablet_style = '' !== $dnxtiep_iie_icon_bg_tablet ? sprintf( 'border-color: %1$s !important;' , esc_attr( $dnxtiep_iie_icon_bg_tablet ) ) : '';
			$dnxtiep_iie_icon_bg_phone_style = '' !== $dnxtiep_iie_icon_bg_phone ? sprintf( 'border-color: %1$s !important;' , esc_attr( $dnxtiep_iie_icon_bg_phone ) ) : '';

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% figure.effect-terry figcaption::before,%%order_class%% figure.effect-terry figcaption::after",
				'declaration' => $dnxtiep_iie_icon_bg_style,
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% figure.effect-terry figcaption::before,%%order_class%% figure.effect-terry figcaption::after",
				'declaration' => $dnxtiep_iie_icon_bg_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% figure.effect-terry figcaption::before,%%order_class%% figure.effect-terry figcaption::after",
				'declaration' => $dnxtiep_iie_icon_bg_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

		}else if($dnxtiep_iie_hover_effect === "kira") {
			$dnxtiep_iie_icon_bg_style = sprintf('background: %1$s;', esc_attr__( $dnxtiep_iie_icon_bg ));
			$dnxtiep_iie_icon_bg_tablet_style = '' !== $dnxtiep_iie_icon_bg_tablet ? sprintf( 'background: %1$s !important;' , esc_attr( $dnxtiep_iie_icon_bg_tablet ) ) : '';
			$dnxtiep_iie_icon_bg_phone_style = '' !== $dnxtiep_iie_icon_bg_phone ? sprintf( 'background: %1$s !important;' , esc_attr( $dnxtiep_iie_icon_bg_phone ) ) : '';

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% figure.effect-kira figcaption::before,%%order_class%% figure.effect-kira figcaption::after",
				'declaration' => $dnxtiep_iie_icon_bg_style,
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% figure.effect-terry figcaption::before,%%order_class%% figure.effect-terry figcaption::after",
				'declaration' => $dnxtiep_iie_icon_bg_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% figure.effect-terry figcaption::before,%%order_class%% figure.effect-terry figcaption::after",
				'declaration' => $dnxtiep_iie_icon_bg_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );
		}
		// ICON BACKGROUND  COLOR END

		// ICON BACKGROUND GRADIENT COLOR START
		$dnxtiep_iie_icon_bg_gradient_color_one = $this->props['dnxtiep_iie_icon_bg_gradient_color_one'];
		$dnxtiep_iie_icon_bg_gradient_color_two = $this->props['dnxtiep_iie_icon_bg_gradient_color_two'];

		$dnxtiep_iie_icon_bg_gradient_type      = $this->props['dnxtiep_iie_icon_bg_gradient_type'];
		$dnxtiep_iie_icon_bg_gradient_start     = $this->props['dnxtiep_iie_icon_bg_gradient_start_position'];
		$dnxtiep_iie_icon_bg_gradient_end     	= $this->props['dnxtiep_iie_icon_bg_gradient_end_position'];

		$dnxtiep_iie_icon_bg_gradient_direction = $dnxtiep_iie_icon_bg_gradient_type === 'linear-gradient' ? $this->props['dnxtiep_iie_icon_bg_gradient_type_linear_direction'] : $this->props['dnxtiep_iie_icon_bg_ontent_gradient_type_radial_direction'];


		if( in_array($dnxtiep_iie_hover_effect, $icon_background_effect) && 'off' !== $this->props['dnxtiep_iie_icon_bg_gradient_show_hide']) {
			
			if($dnxtiep_iie_hover_effect === "terry") {
				$dnxtiep_iie_icon_bg_gradient = sprintf(
					'border-image-source: %1$s(%2$s, %3$s %5$s, %4$s %6$s) !important;border-image-slice:1 !important;',
					esc_html($dnxtiep_iie_icon_bg_gradient_type), 
					esc_html($dnxtiep_iie_icon_bg_gradient_direction), 
					esc_html($dnxtiep_iie_icon_bg_gradient_color_one), 
					esc_html($dnxtiep_iie_icon_bg_gradient_color_two), 
					esc_html($dnxtiep_iie_icon_bg_gradient_start), 
					esc_html($dnxtiep_iie_icon_bg_gradient_end)
				);

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% figure.effect-terry figcaption::before,%%order_class%% figure.effect-terry figcaption::after",
					'declaration' => $dnxtiep_iie_icon_bg_gradient,
				) );
			}else if($dnxtiep_iie_hover_effect === "kira") {
				$dnxtiep_iie_icon_bg_gradient = sprintf('background: %1$s(%2$s, %3$s %5$s, %4$s %6$s) !important;',$dnxtiep_iie_icon_bg_gradient_type, $dnxtiep_iie_icon_bg_gradient_direction, esc_attr($dnxtiep_iie_icon_bg_gradient_color_one), esc_attr($dnxtiep_iie_icon_bg_gradient_color_two), $dnxtiep_iie_icon_bg_gradient_start, $dnxtiep_iie_icon_bg_gradient_end);

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% figure.effect-kira figcaption::before,%%order_class%% figure.effect-kira figcaption::after",
					'declaration' => $dnxtiep_iie_icon_bg_gradient,
				) );
			}
		}

		// 	ICON COLOR START
		$dnxtiep_iie_icon_color_one = esc_attr($this->props['dnxtiep_iie_icon_color_one']);
		$dnxtiep_iie_icon_color_one_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_iie_icon_color_one' );
		$dnxtiep_iie_icon_color_one_tablet = isset( $dnxtiep_iie_icon_color_one_values['tablet'] ) ? $dnxtiep_iie_icon_color_one_values['tablet'] : '';
		$dnxtiep_iie_icon_color_one_phone = isset( $dnxtiep_iie_icon_color_one_values['phone'] ) ? $dnxtiep_iie_icon_color_one_values['phone'] : '';


		$dnxtiep_iie_icon_color_two = esc_attr($this->props['dnxtiep_iie_icon_color_two']);
		$dnxtiep_iie_icon_color_two_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_iie_icon_color_two' );
		$dnxtiep_iie_icon_color_two_tablet = isset( $dnxtiep_iie_icon_color_two_values['tablet'] ) ? $dnxtiep_iie_icon_color_two_values['tablet'] : '';
		$dnxtiep_iie_icon_color_two_phone = isset( $dnxtiep_iie_icon_color_two_values['phone'] ) ? $dnxtiep_iie_icon_color_two_values['phone'] : '';


		$dnxtiep_iie_icon_color_three = esc_attr($this->props['dnxtiep_iie_icon_color_three']);
		$dnxtiep_iie_icon_color_three_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_iie_icon_color_three' );
		$dnxtiep_iie_icon_color_three_tablet = isset( $dnxtiep_iie_icon_color_three_values['tablet'] ) ? $dnxtiep_iie_icon_color_three_values['tablet'] : '';
		$dnxtiep_iie_icon_color_three_phone = isset( $dnxtiep_iie_icon_color_three_values['phone'] ) ? $dnxtiep_iie_icon_color_three_values['phone'] : '';


		$dnxtiep_iie_icon_color_four = esc_attr($this->props['dnxtiep_iie_icon_color_four']);
		$dnxtiep_iie_icon_color_four_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_iie_icon_color_four' );
		$dnxtiep_iie_icon_color_four_tablet = isset( $dnxtiep_iie_icon_color_four_values['tablet'] ) ? $dnxtiep_iie_icon_color_four_values['tablet'] : '';
		$dnxtiep_iie_icon_color_four_phone = isset( $dnxtiep_iie_icon_color_four_values['phone'] ) ? $dnxtiep_iie_icon_color_four_values['phone'] : '';

		  	// icon hover 
		$dnxtiep_iie_icon_color_one_hover = esc_attr($this->get_hover_value( 'dnxtiep_iie_icon_color_one' ));
		$dnxtiep_iie_icon_color_two_hover = esc_attr($this->get_hover_value( 'dnxtiep_iie_icon_color_two' ));
		$dnxtiep_iie_icon_color_three_hover = esc_attr($this->get_hover_value( 'dnxtiep_iie_icon_color_three' ));
		$dnxtiep_iie_icon_color_four_hover = esc_attr($this->get_hover_value( 'dnxtiep_iie_icon_color_four' ));

		if('' !== $dnxtiep_iie_icon_color_one){
			$dnxtiep_iie_icon_color_one_style = sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_one ) );
			$dnxtiep_iie_icon_color_one_tablet_style 	= '' !== $dnxtiep_iie_icon_color_one_tablet ? sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_one_tablet ) ) : '';
			$dnxtiep_iie_icon_color_one_phone_style  	= '' !== $dnxtiep_iie_icon_color_one_phone ? sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_one_phone ) ) : '';
			
			$dnxtiep_iie_icon_color_one_hover_style  = '';

			if( et_builder_is_hover_enabled( 'dnxtiep_iie_icon_color_one', $this->props ) ) {
				$dnxtiep_iie_icon_color_one_hover_style = sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_one_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon1",
				'declaration' => $dnxtiep_iie_icon_color_one_style,
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon1",
				'declaration' => $dnxtiep_iie_icon_color_one_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon1",
				'declaration' => $dnxtiep_iie_icon_color_one_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if( '' !== $dnxtiep_iie_icon_color_one_hover_style ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxtiep_iie_icon1:hover" ),
					'declaration' => $dnxtiep_iie_icon_color_one_hover_style ,
				) );
			}
		}

		if('' !== $dnxtiep_iie_icon_color_two){
			$dnxtiep_iie_icon_color_two_style = sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_two ) );
			$dnxtiep_iie_icon_color_two_tablet_style 	= '' !== $dnxtiep_iie_icon_color_two_tablet ? sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_two_tablet ) ) : '';
			$dnxtiep_iie_icon_color_two_phone_style  	= '' !== $dnxtiep_iie_icon_color_two_phone ? sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_two_phone ) ) : '';
			
			$dnxtiep_iie_icon_color_two_hover_style  = '';

			if( et_builder_is_hover_enabled( 'dnxtiep_iie_icon_color_two', $this->props ) ) {
				$dnxtiep_iie_icon_color_two_hover_style = sprintf(
					'color: %1$s;', 
					esc_attr( $dnxtiep_iie_icon_color_two_hover ) 
				);
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon2",
				'declaration' => $dnxtiep_iie_icon_color_two_style,
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon2",
				'declaration' => $dnxtiep_iie_icon_color_two_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon2",
				'declaration' => $dnxtiep_iie_icon_color_two_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if( '' !== $dnxtiep_iie_icon_color_two_hover_style ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxtiep_iie_icon2:hover" ),
					'declaration' => $dnxtiep_iie_icon_color_two_hover_style ,
				) );
			}
		}

		if('' !== $dnxtiep_iie_icon_color_three){
			$dnxtiep_iie_icon_color_three_style = sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_three ) );
			$dnxtiep_iie_icon_color_three_tablet_style 	= '' !== $dnxtiep_iie_icon_color_three_tablet ? sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_three_tablet ) ) : '';
			$dnxtiep_iie_icon_color_three_phone_style  	= '' !== $dnxtiep_iie_icon_color_three_phone ? sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_three_phone ) ) : '';
			
			$dnxtiep_iie_icon_color_three_hover_style  = '';

			if( et_builder_is_hover_enabled( 'dnxtiep_iie_icon_color_three', $this->props ) ) {
				$dnxtiep_iie_icon_color_three_hover_style = sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_three_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon3",
				'declaration' => $dnxtiep_iie_icon_color_three_style,
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon3",
				'declaration' => $dnxtiep_iie_icon_color_three_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon3",
				'declaration' => $dnxtiep_iie_icon_color_three_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if( '' !== $dnxtiep_iie_icon_color_three_hover_style ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxtiep_iie_icon3:hover" ),
					'declaration' => $dnxtiep_iie_icon_color_three_hover_style ,
				) );
			}
		}

		if('' !== $dnxtiep_iie_icon_color_four){
			$dnxtiep_iie_icon_color_four_style = sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_four ) );
			$dnxtiep_iie_icon_color_four_tablet_style 	= '' !== $dnxtiep_iie_icon_color_four_tablet ? sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_four_tablet ) ) : '';
			$dnxtiep_iie_icon_color_four_phone_style  	= '' !== $dnxtiep_iie_icon_color_four_phone ? sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_four_phone ) ) : '';
			
			$dnxtiep_iie_icon_color_four_hover_style  = '';

			if( et_builder_is_hover_enabled( 'dnxtiep_iie_icon_color_four', $this->props ) ) {
				$dnxtiep_iie_icon_color_four_hover_style = sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_color_four_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon4",
				'declaration' => $dnxtiep_iie_icon_color_four_style,
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon4",
				'declaration' => $dnxtiep_iie_icon_color_four_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxtiep_iie_icon4",
				'declaration' => $dnxtiep_iie_icon_color_four_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if( '' !== $dnxtiep_iie_icon_color_four_hover_style ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxtiep_iie_icon4:hover" ),
					'declaration' => $dnxtiep_iie_icon_color_four_hover_style ,
				) );
			}
		}
		// ICON COLOR END

		// ICON FONT SETTINGS START

		// icon size
		$dnxtiep_iie_icon_size = esc_attr($this->props['dnxtiep_iie_icon_font_size']);
		$dnxtiep_iie_icon_size_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_iie_icon_font_size' );

		$dnxtiep_iie_icon_size_tablet = isset($dnxtiep_iie_icon_size_values['tablet']) ? $dnxtiep_iie_icon_size_values['tablet'] : '';
		$dnxtiep_iie_icon_size_phone = isset($dnxtiep_iie_icon_size_values['phone']) ? $dnxtiep_iie_icon_size_values['phone'] : '';

		// icon letter spacing
		$dnxtiep_iie_icon_letter_spacing = esc_attr($this->props['dnxtiep_iie_icon_letter_spacing']);
		$dnxtiep_iie_icon_letter_spacing_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_iie_icon_letter_spacing' );
		$dnxtiep_iie_icon_letter_spacing_tablet = isset($dnxtiep_iie_icon_letter_spacing_values['tablet']) ? $dnxtiep_iie_icon_letter_spacing_values['tablet'] : '';
		$dnxtiep_iie_icon_letter_spacing_phone = isset($dnxtiep_iie_icon_letter_spacing_values['phone']) ? $dnxtiep_iie_icon_letter_spacing_values['phone'] : '';

		// icon line height
		$dnxtiep_iie_icon_line_height = esc_attr($this->props['dnxtiep_iie_icon_line_height']);
		$dnxtiep_iie_icon_line_height_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_iie_icon_line_height' );

		$dnxtiep_iie_icon_line_height_tablet = isset($dnxtiep_iie_icon_line_height_values['tablet']) ? $dnxtiep_iie_icon_line_height_values['tablet'] : '';
		$dnxtiep_iie_icon_line_height_phone = isset($dnxtiep_iie_icon_line_height_values['phone']) ? $dnxtiep_iie_icon_line_height_values['phone'] : '';

		$icon_font_style = sprintf(
			'font-size: %1$s !important;letter-spacing: %2$s !important; line-height: %3$s !important;', 
			esc_attr($dnxtiep_iie_icon_size), 
			esc_attr($dnxtiep_iie_icon_letter_spacing), 
			esc_attr($dnxtiep_iie_icon_line_height)
		);

		$icon_font_style_tablet = sprintf(
			'font-size: %1$s !important;letter-spacing: %2$s !important; line-height: %3$s !important;', 
			esc_attr($dnxtiep_iie_icon_size_tablet), 
			esc_attr($dnxtiep_iie_icon_letter_spacing_tablet), 
			esc_attr($dnxtiep_iie_icon_line_height_tablet)
		);

		$icon_font_style_phone = sprintf(
			'font-size: %1$s !important;letter-spacing: %2$s !important; line-height: %3$s !important;', 
			esc_attr($dnxtiep_iie_icon_size_phone), 
			esc_attr($dnxtiep_iie_icon_letter_spacing_phone), 
			esc_attr($dnxtiep_iie_icon_line_height_phone)
		);

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .et-pb-icon",
			'declaration' => $icon_font_style ,
		) );

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .et-pb-icon",
			'declaration' => $icon_font_style_tablet,
			'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
		) );

		ET_Builder_Element::set_style( $render_slug, array(
			'selector'    => "%%order_class%% .et-pb-icon",
			'declaration' => $icon_font_style_phone,
			'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
		) );

		// ICON FONT SETTINGS END

		// ICON BACKGROUND COLOR START

		if( "off" !== esc_attr($this->props['dnxtiep_iie_icon_background_show_hide'])) {
			$dnxtiep_iie_icon_background = esc_attr($this->props['dnxtiep_iie_icon_background']);
			$dnxtiep_iie_icon_background_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_iie_icon_background' );

			$dnxtiep_iie_icon_background_tablet = isset($dnxtiep_iie_icon_background_values['tablet']) ? $dnxtiep_iie_icon_background_values['tablet'] : '';

			$dnxtiep_iie_icon_background_phone = isset($dnxtiep_iie_icon_background_values['phone']) ? $dnxtiep_iie_icon_background_values['phone'] : '';



			$dnxtiep_iie_icon_background_style = sprintf( 'background-color: %1$s', esc_attr__( $dnxtiep_iie_icon_background ));

			$dnxtiep_iie_icon_background_tablet_style = '' !== $dnxtiep_iie_icon_background_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_iie_icon_background_tablet ) ) : '';

			$dnxtiep_iie_icon_background_phone_style = '' !== $dnxtiep_iie_icon_background_phone ? sprintf( 'background-color: %1$s;', esc_attr( $dnxtiep_iie_icon_background_phone ) ) : '';
			
			$dnxtiep_iie_icon_background_hover_style  = '';

			if( et_builder_is_hover_enabled( 'dnxtiep_iie_icon_background', $this->props ) ) {
				$dnxtiep_iie_icon_background_hover_style = sprintf( 'color: %1$s;', esc_attr( $dnxtiep_iie_icon_background_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .et-pb-icon",
				'declaration' => $dnxtiep_iie_icon_background_style,
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .et-pb-icon",
				'declaration' => $dnxtiep_iie_icon_background_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .et-pb-icon",
				'declaration' => $dnxtiep_iie_icon_background_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );


		}

		// ICON BACKGROUND COLOR END

		$this->apply_css($render_slug);
		return sprintf(
			'<div class="dnext-neip-iie-grid">
                <figure class="effect-%3$s">
                    %1$s
                    <figcaption>
                        %2$s
                        %4$s
                    </figcaption>			
                </figure>
            </div>',
            $dnxtiep_iie_img,
            $dnxtiepheadingtext,
            $dnxtiep_iie_hover_effect,
            $icon
		);
	}

	public function apply_css($render_slug){

			/**
	         * Custom Padding Margin Output
	         *
	        */
			Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_iie_heading_margin", "%%order_class%% .dnext-neip-iie-des-heading,%%order_class%% .dnext-neip-iie-heading", "margin");
	        Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_iie_heading_padding", "%%order_class%% .dnext-neip-iie-des-heading, %%order_class%% .dnext-neip-iie-heading", "padding");
	        Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_iie_focus_padding", "%%order_class%% dnext-neip-focus-text", "padding");

			Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_iie_icon_margin", "%%order_class%% figcaption p a i, %%order_class%% figcaption p a span", "margin");
	        Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_iie_icon_padding", "%%order_class%% figcaption p a i, %%order_class%% figcaption p a span", "padding");
	}
	public function multi_view_filter_value( $raw_value, $args, $multi_view ) {
		$name = isset( $args['name'] ) ? $args['name'] : '';

		if ( $raw_value && in_array( $name, array( 'dnxtiep_iie_icon_image_select_one', 'dnxtiep_iie_icon_image_select_two', 'dnxtiep_iie_icon_image_select_three', 'dnxtiep_iie_icon_image_select_four' ) ) ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}
		return $raw_value;
	}
}

new Next_Image_Icon;