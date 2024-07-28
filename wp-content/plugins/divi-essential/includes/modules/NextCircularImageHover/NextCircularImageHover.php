<?php
include_once(DIVI_ESSENTIAL_PATH.'/includes/modules/base/Common.php');

class Next_Circular_Image_Hover extends ET_Builder_Module {

	public $slug       = 'dnxte_circular_image_hover';
	public $vb_support = 'on';
	public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-circular-image-effect/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name        = esc_html__( 'Next Circular Image Hover', 'dnxte-divi-essential' );
		$this->icon_path   = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->folder_name = 'et_pb_divi_essential';

		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'		=>	array(
					'dnxtiep_cih_img'	=> array(
						'title'		=> esc_html__( 'Image', 'dnxte-divi-essential' ),
						'priority'	=>	10,
					),
					'dnxtiep_cih_background'	=> array(
						'title'		=>	esc_html__( 'Caption Background', 'dnxte-divi-essential' ),
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
			'advanced' => array(
				'toggles'     => array(
					'dnxtiep_cih_hover_effect' => esc_html__( 'Hover Effect', 'dnxte-divi-essential' ),
					'dnxtiep_cih_fonts'	=> array(
						"title"		=>	esc_html__( 'Heading Text', 'dnxte-divi-essential' ),
					),
					'dnxtiep_cih_image_design' => esc_html__( 'Image Round Edge', 'dnxte-divi-essential')
 				)
			),
		);

		// Custom CSS Field
		$this->custom_css_fields = array(
			'dnxtiep_cih_heading_text' => array(
				'label'    => esc_html__( 'Heading', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .neip-cih-heading',
			),
			'dnxtiep_cih_description' => array(
				'label'    => esc_html__( 'Description', 'dnxte-divi-essential' ),
				'selector' => '%%order_class%% .neip-cih-desc',
			)
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts' => array(
				'hover_text_fonts' => array(
					'label'    		=> esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug'   => 'dnxtiep_cih_fonts',
					'tab_slug'		=> 'advanced',
					'css'      => array(
						'main' => "%%order_class%% .neip-cih-heading",
						'important' => 'all'
					),
				),
				'dnxtiep_cih_body'   => array(
					'label'          => esc_html__( 'Description', 'dnxte-divi-essential' ),
					'css'            => array(
						'main'     => "%%order_class%% .neip-cih-desc",
						'important' => 'all'
					)
				)
			),
			'text' => false,
			'margin_padding' => array(
				'css' => array(
					'main' => "%%order_class%% .dnext-neip-cih-item",
					'important' => 'all',
				),
			),
			'box_shadow'	=> array(
				'default' => array(
					'css'             => array(
						'main'        => "%%order_class%% .dnext-neip-cih-item .neip-cih-img",
					),
				),
			),
			'borders'               => array(
				'default' => array(
					'css'	=> array(
						'main'	=> array(
							'border_radii'  => "%%order_class%% .dnext-neip-cih-item .neip-cih-img",
							'border_styles' => "%%order_class%% .dnext-neip-cih-item .neip-cih-img",
						),
						'important' => 'all'
					),
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '0px',
							'color' => '#0077FF',
							'style' => 'solid',
						),
					),
				)
			),
			'background'           => array(
				// 'css'     => array(
				// 	'main'   => "%%order_class%% .dnext-neip-cih-item"
				// )
				'settings' => array(
					'color' => 'alpha',
				),
			)
		);
	}

	public function get_fields() {
		return array(
			'dnxtiep_cih_image'			=> array(
				'label'              	=> esc_html__( 'Image', 'dnxte-divi-essential' ),
				'type'               	=> 'upload',
				'option_category'    	=> 'basic_option',
				'upload_button_text' 	=> esc_attr__( 'Upload an image', 'dnxte-divi-essential' ),
				'choose_text'        	=> esc_attr__( 'Choose an Image', 'dnxte-divi-essential' ),
				'update_text'        	=> esc_attr__( 'Set As Image', 'dnxte-divi-essential' ),
				'description'        	=> esc_html__( 'Upload an image to display at the top of your blurb.', 'dnxte-divi-essential' ),
				'toggle_slug'        	=> 'dnxtiep_cih_img',
				'dynamic_content'    	=> 'image',
				'mobile_options'	 	=> true,
				'hover'					=> 'tabs',
			),
			// Image alt
			'dnxtiep_cih_alt'		=> array(
				'label'           	=> esc_html__( 'Image Alt Text', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Define the HTML ALT text for your image here.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'dnxtiep_cih_img',
				'dynamic_content' 	=> 'text',
			),
			// Heading Text
			'dnxtiep_cih_heading_text'	=> array(
				'label'           	=> esc_html__( 'Heading Text', 'dnxte-divi-essential' ),
				'type'            	=> 'text',
				'dynamic_content' 	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Heading Text entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'main_content',
			),
			//Heading Tag
			'dnxtiep_cih_heading_tag'	=> array(
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
			'dnxtiep_cih_description' 	=> array(
				'label'           	=> esc_html__( 'Content', 'dnxte-divi-essential' ),
				'type'            	=> 'tiny_mce',
				'dynamic_content' 	=> 'text',
				'option_category' 	=> 'basic_option',
				'description'     	=> esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     	=> 'main_content',
			),
			'dnxtiep_cih_image_hover_effect'=> array(
				'label'             	=> esc_html__( 'Select Image Hover', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_cih_hover_effect',
				'description'           => esc_html__( 'Here you can adjust the hover effect.', 'dnxte-divi-essential' ),
				'options'               => array(
					'effect1'   				=>  esc_html__( 'Effect 1', 'dnxte-divi-essential' ),
					'effect2'   				=>  esc_html__( 'Effect 2', 'dnxte-divi-essential' ),
					'effect3'   				=>  esc_html__( 'Effect 3', 'dnxte-divi-essential' ),
					'effect4'   				=>  esc_html__( 'Effect 4', 'dnxte-divi-essential' ),
					'effect5'   				=>  esc_html__( 'Effect 5', 'dnxte-divi-essential' ),
					'effect6'   				=>  esc_html__( 'Effect 6', 'dnxte-divi-essential' ),
					'effect7'   				=>  esc_html__( 'Effect 7', 'dnxte-divi-essential' ),
					'effect8'   				=>  esc_html__( 'Effect 8', 'dnxte-divi-essential' ),
					'effect9'   				=>  esc_html__( 'Effect 9', 'dnxte-divi-essential' ),
					'effect10'   				=>  esc_html__( 'Effect 10', 'dnxte-divi-essential' ),
					'effect11'   				=>  esc_html__( 'Effect 11', 'dnxte-divi-essential' ),
					'effect12'   				=>  esc_html__( 'Effect 12', 'dnxte-divi-essential' ),
					'effect13'   				=>  esc_html__( 'Effect 13', 'dnxte-divi-essential' ),
					'effect14'   				=>  esc_html__( 'Effect 14', 'dnxte-divi-essential' ),
					'effect15'   				=>  esc_html__( 'Effect 15', 'dnxte-divi-essential' ),
					'effect16'   				=>  esc_html__( 'Effect 16', 'dnxte-divi-essential' ),
					'effect17'   				=>  esc_html__( 'Effect 17', 'dnxte-divi-essential' ),
					'effect18'   				=>  esc_html__( 'Effect 18', 'dnxte-divi-essential' ),
					'effect19'   				=>  esc_html__( 'Effect 19', 'dnxte-divi-essential' ),
				),
				'default'               => 'effect1'
			),
			'dnxtiep_cih_image_hover_direction1'  => array(
				'label'             	=> esc_html__( 'Select Image Hover Direction', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_cih_hover_effect',
				'description'           => esc_html__( 'Here you can adjust the hover effect direction.', 'dnxte-divi-essential' ),
				'show_if'               => array(
					'dnxtiep_cih_image_hover_effect' => array(
						'effect1',
						'effect2',
						'effect3',
						'effect6',
						'effect7',
						'effect8',
						'effect10',
						'effect11',
						'effect13',
						'effect17',
					),
				),
				'options'               => array(
					'left_to_right'   	 			=>  esc_html__( 'Left to Right', 'dnxte-divi-essential' ),
					'right_to_left'   	 			=>  esc_html__( 'Right to Left', 'dnxte-divi-essential' ),
					'top_to_bottom'   	 			=>  esc_html__( 'Top to Bottom', 'dnxte-divi-essential' ),
					'bottom_to_top'   				=>  esc_html__( 'Bottom to Top', 'dnxte-divi-essential' ),
				),
				'default' => 'left_to_right'
			),
			'dnxtiep_cih_image_hover_direction2'  => array(
				'label'             	=> esc_html__( 'Select Image Hover Direction', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_cih_hover_effect',
				'description'           => esc_html__( 'Here you can adjust the hover effect direction.', 'dnxte-divi-essential' ),
				'show_if'               => array(
					'dnxtiep_cih_image_hover_effect' => array('effect5')
				),
				'options'               => array(
					'scale_up'   		=>  esc_html__( 'Scale Up', 'dnxte-divi-essential' ),
					'scale_down'   		=>  esc_html__( 'Scale Down', 'dnxte-divi-essential' ),
					'scale_down_up'   	=>  esc_html__( 'Scale Down Up', 'dnxte-divi-essential' )
				),
				'default' => 'scale_up'
			),
			'dnxtiep_cih_image_hover_direction3'  => array(
				'label'             	=> esc_html__( 'Select Image Hover Direction', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_cih_hover_effect',
				'description'           => esc_html__( 'Here you can adjust the hover effect direction.', 'dnxte-divi-essential' ),
				'show_if'               => array(
					'dnxtiep_cih_image_hover_effect' => array('effect15')
				),
				'options'               => array(
					'left_to_right'   	 			=>  esc_html__( 'Left to Right', 'dnxte-divi-essential' ),
					'right_to_left'   	 			=>  esc_html__( 'Right to Left', 'dnxte-divi-essential' ),
				),
				'default' => 'left_to_right'
			),
			'dnxtiep_cih_image_hover_direction4'  => array(
				'label'             	=> esc_html__( 'Select Image Hover Direction', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_cih_hover_effect',
				'description'           => esc_html__( 'Here you can adjust the hover effect direction.', 'dnxte-divi-essential' ),
				'show_if'               => array(
					'dnxtiep_cih_image_hover_effect' => array('effect9','effect19')
				),
				'options'               => array(
					'top_to_bottom'   	 			=>  esc_html__( 'Top to Bottom', 'dnxte-divi-essential' ),
					'bottom_to_top'   				=>  esc_html__( 'Bottom to Top', 'dnxte-divi-essential' ),
				),
				'default' => 'top_to_bottom'
			),
			'dnxtiep_cih_image_hover_direction5'  => array(
				'label'             	=> esc_html__( 'Select Image Hover Direction', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_cih_hover_effect',
				'description'           => esc_html__( 'Here you can adjust the hover effect direction.', 'dnxte-divi-essential' ),
				'show_if'               => array(
					'dnxtiep_cih_image_hover_effect' => array('effect12')
				),
				'options'               => array(
					'from_left_and_right'   	 			=>  esc_html__( 'From Left and Right', 'dnxte-divi-essential' ),
					'top_to_bottom'   				=>  esc_html__( 'Top to Bottom', 'dnxte-divi-essential' ),
					'bottom_to_top'   				=>  esc_html__( 'Bottom to Top', 'dnxte-divi-essential' ),
				),
				'default' => 'from_left_and_right'
			),
			'dnxtiep_cih_image_hover_direction6'  => array(
				'label'             	=> esc_html__( 'Select Image Hover Direction', 'dnxte-divi-essential' ),
				'type'              	=> 'select',
				'option_category'   	=> 'configuration',
				'tab_slug'          	=> 'advanced',
				'toggle_slug'       	=> 'dnxtiep_cih_hover_effect',
				'description'           => esc_html__( 'Here you can adjust the hover effect direction.', 'dnxte-divi-essential' ),
				'show_if'               => array(
					'dnxtiep_cih_image_hover_effect' => array('effect14')
				),
				'options'               => array(
					'left_to_right'   	 			=>  esc_html__( 'Left to Right', 'dnxte-divi-essential' ),
				),
				'default' => 'left_to_right'
			),
			// Hover Background 
			'dnxtiep_cih_hover_bg_show_hide'  => array(
				'label'           => esc_html__( 'Caption Background Color', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'dnxtiep_cih_background',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'         =>  array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_cih_hover_bg',
				),
				'default_on_front' => 'off',
			),
			// Hover BG Color
			'dnxtiep_cih_hover_bg'	 => array(
				'label'          => esc_html__( 'Select Background Color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_cih_background',
				'sub_toggle'	 => 'sub_toggle_color',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
				'mobile_options' => true,
				'responsive'	 => true,
			),
			// Hover Background Gradient 
			'dnxtiep_cih_hover_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Caption Gradient Color', 'dnxte-divi-essential' ),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'dnxtiep_cih_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxtiep_cih_hover_gradient_color_one',
					'dnxtiep_cih_hover_gradient_color_two',
					'dnxtiep_cih_hover_gradient_type',
					'dnxtiep_cih_hover_gradient_start_position',
					'dnxtiep_cih_hover_gradient_end_position'
				),
				'default_on_front' => 'off',
			),
			'dnxtiep_cih_hover_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_cih_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#2b87da',
				'depends_show_if'=> 'on',
			),
			'dnxtiep_cih_hover_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'dnxtiep_cih_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#29c4a9',
				'depends_show_if'=> 'on',
			),
			'dnxtiep_cih_hover_gradient_type'		=> array(
				'label'           => esc_html__( 'Select Gradient Type', 'dnxte-divi-essential' ),
				'type'            => 'select',
				'description'     => esc_html__( 'Select the types of gradient', 'dnxte-divi-essential' ),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_cih_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__( 'Linear', 'dnxte-divi-essential' ),
					'radial-gradient' => esc_html__( 'Radial', 'dnxte-divi-essential' ),
				),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'dnxtiep_cih_hover_gradient_type_linear_direction'   => array(
				'label'           => esc_html__( 'Linear direction', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxtiep_cih_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'dnxtiep_cih_hover_gradient_show_hide'	=> 'on',
					'dnxtiep_cih_hover_gradient_type' 		=> 'linear-gradient'
				),
			),
			'dnxtiep_cih_hover_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__( 'Radial Direction', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__( 'Select the types of gradient', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxtiep_cih_background',
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
					'dnxtiep_cih_hover_gradient_show_hide'	=> 'on',
					'dnxtiep_cih_hover_gradient_type'		=> 'radial-gradient'
				),
			),
			'dnxtiep_cih_hover_gradient_start_position'           => array(
				'label'           => esc_html__( 'Start Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_cih_background',
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
			'dnxtiep_cih_hover_gradient_end_position'             => array(
				'label'           => esc_html__( 'End Position', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxtiep_cih_background',
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
			'dnxtiep_cih_heading_margin'	=> array(
				'label'           		=> esc_html__('Heading Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
				'toggle_slug'     		=> 'margin_padding', 
			),
			'dnxtiep_cih_heading_padding'	=> array(
				'label'           		=> esc_html__('Heading Padding', 'dnxte-divi-essential'),
				'type'            		=> 'custom_padding',
				'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
				'tab_slug'        		=> 'advanced',				
				'toggle_slug'     		=> 'margin_padding',
			),
			'dnxtiep_cih_description_margin'	=> array(
				'label'           			=> esc_html__('Description Margin', 'dnxte-divi-essential'),
                'type'            			=> 'custom_margin',
                'mobile_options'  			=> true,
				'hover'           			=> 'tabs',
				'allowed_units'   			=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 			=> 'layout',
                'tab_slug'        			=> 'advanced',
				'toggle_slug'     			=> 'margin_padding', 
			),
			'dnxtiep_cih_description_padding'	=> array(
				'label'           			=> esc_html__('Description Padding', 'dnxte-divi-essential'),
				'type'            			=> 'custom_padding',
				'mobile_options'  			=> true,
				'hover'           			=> 'tabs',
				'allowed_units'   			=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 			=> 'layout',
				'tab_slug'        			=> 'advanced',				
				'toggle_slug'     			=> 'margin_padding',
			),
			'dnxtiep_cih_box_shadow_horizontal'        => array(
				'label'                     => esc_html__('Box Shadow Horizontal Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category'=> 'layout',
				'tab_slug'     => 'advanced',
				'toggle_slug'    => 'dnxtiep_cih_image_design',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 80,
				),
				'default'         => '0px',
				'fixed_unit'      => 'px',
			),
			'dnxtiep_cih_box_shadow_vertical'        => array(
				'label'                     => esc_html__('Box Shadow Vertical Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category'=> 'layout',
				'tab_slug'     => 'advanced',
				'toggle_slug'    => 'dnxtiep_cih_image_design',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 80,
				),
				'default'         => '0px',
				'fixed_unit'      => 'px',
			),
			'dnxtiep_cih_box_shadow_blur_strength'        => array(
				'label'                     => esc_html__('Box Shadow Blur Strength', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category'=> 'layout',
				'tab_slug'     => 'advanced',
				'toggle_slug'    => 'dnxtiep_cih_image_design',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 80,
				),
				'default'         => '0px',
				'fixed_unit'      => 'px',
			),
			'dnxtiep_cih_box_shadow_spread_strength'        => array(
				'label'                     => esc_html__('Box Shadow Spread Strength', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category'=> 'layout',
				'tab_slug'     => 'advanced',
				'toggle_slug'    => 'dnxtiep_cih_image_design',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 80,
				),
				'default'         => '0px',
				'fixed_unit'      => 'px',
			),
			'dnxtiep_cih_box_shadow_color'	 => array(
				'label'          => esc_html__( 'Shadow Color', 'dnxte-divi-essential' ),
				'type'           => 'color-alpha',
				'tab_slug'     => 'advanced',
				'toggle_slug'    => 'dnxtiep_cih_image_design',
				'default'        => '#29c4a9',
				'mobile_options' => true,
				'responsive'	 => true,
			)
		);
	}
	
	public function render( $attrs, $content, $render_slug ) {
		wp_enqueue_style( 'dnext_circular_image_hover' );
		$multi_view 						=   et_pb_multi_view_options( $this );
		$dnxtiep_cih_image					=	sanitize_text_field($this->props['dnxtiep_cih_image']);
		$dnxtiep_cih_alt					=	sanitize_text_field($this->props['dnxtiep_cih_alt']);

		$dnxtiep_cih_heading_text			=	sanitize_text_field($this->props['dnxtiep_cih_heading_text']);
		$dnxtiep_cih_heading_tag			=	sanitize_text_field($this->props['dnxtiep_cih_heading_tag']);
		$dnxtiep_cih_description			=	sanitize_text_field($this->props['dnxtiep_cih_description']);

		$dnxtiep_cih_hover_effect       	=   sanitize_text_field($this->props['dnxtiep_cih_image_hover_effect']);



		$dnxtiep_cih_hover_direction_class       = "";

		$dnxtiep_cih_effect1 = array(
			'effect1',
			'effect2',
			'effect3',
			'effect6',
			'effect7',
			'effect8',
			'effect10',
			'effect11',
			'effect13',
			'effect17'
		);
		$dnxtiep_cih_info_back = array(
			'effect4',
			'effect17',
			'effect19'
		);
		$dnxtiep_cih_effect2 = 'effect5';
		$dnxtiep_cih_effect3 = 'effect15';
		$dnxtiep_cih_effect4 = array(
			'effect9',
			'effect19'
		);
		$dnxtiep_cih_effect5 = 'effect12';
		$dnxtiep_cih_effect6 = 'effect14';


		if ( in_array($dnxtiep_cih_hover_effect, $dnxtiep_cih_effect1) ) {
			$dnxtiep_cih_hover_direction_class = "neip-cih-".esc_attr($this->props['dnxtiep_cih_image_hover_direction1']);
		}
		if( $dnxtiep_cih_effect2 === $dnxtiep_cih_hover_effect ) {
			$dnxtiep_cih_hover_direction_class = "neip-cih-".esc_attr($this->props['dnxtiep_cih_image_hover_direction2']);
		}
		if( $dnxtiep_cih_effect5 === $dnxtiep_cih_hover_effect ) {
			$dnxtiep_cih_hover_direction_class = "neip-cih-".esc_attr($this->props['dnxtiep_cih_image_hover_direction5']);
		}
		if( $dnxtiep_cih_effect3 === $dnxtiep_cih_hover_effect ) {
			$dnxtiep_cih_hover_direction_class = "neip-cih-".esc_attr($this->props['dnxtiep_cih_image_hover_direction3']);
		}
		if( in_array($dnxtiep_cih_hover_effect, $dnxtiep_cih_effect4) ) {
			$dnxtiep_cih_hover_direction_class = "neip-cih-".esc_attr($this->props['dnxtiep_cih_image_hover_direction4']);
		}
		if( $dnxtiep_cih_effect6 === $dnxtiep_cih_hover_effect ) {
			$dnxtiep_cih_hover_direction_class = "neip-cih-".esc_attr($this->props['dnxtiep_cih_image_hover_direction6']);
		}
		
		$image_html = Common::get_image_html(
			'dnxtiep_cih_image', // image_slug
			esc_attr($dnxtiep_cih_alt), // alt_text
			'', // title
			$multi_view, // multi_view
			$this, // context
			'img-fluid'
		);

		// Image 
		if( $dnxtiep_cih_hover_effect === 'effect7' ) {
			$dnxtiep_cih_img = sprintf(
				'<div class="neip-cih-img-container"><div class="neip-cih-img">%1$s</div></div>',
				$image_html
			);
		}else{
			$dnxtiep_cih_img = sprintf(
				'<div class="neip-cih-img">%1$s</div>',
				$image_html
			);
		}

		// Heading Text
		$dnxtiepheadingtext = '';
		if ( '' !== $dnxtiep_cih_heading_text ){
			$dnxtiepheadingtext = sprintf(
				'<%1$s class="neip-cih-heading">%2$s</%1$s>',
				et_pb_process_header_level( $dnxtiep_cih_heading_tag, 'span' ),
				et_core_esc_previously( $dnxtiep_cih_heading_text )
			);
		}

		$description = $multi_view->render_element( array(
			'tag' => 'div',
			'content' => '{{dnxtiep_cih_description}}',
			'attrs' => array(
			'class' => esc_attr('neip-cih-desc'),
			)
		));

		// Content section
		$content = "";
			if( in_array($dnxtiep_cih_hover_effect, $dnxtiep_cih_info_back) ) {
				$content = sprintf(
					'<div class="neip-cih-info">
		                <div class="neip-cih-info-back">
		                    %1$s
		                    %2$s
		                </div>
		            </div>',
		            $dnxtiepheadingtext,
		            $this->process_content( $description )
				);
			} elseif( $dnxtiep_cih_hover_effect == 'effect7' ) {
				$content = sprintf(
		             '<div class="neip-cih-info-container">
						<div class="neip-cih-info">
		                    %1$s
		                    %2$s
		                </div>
		            </div>',
		            $dnxtiepheadingtext,
		            $this->process_content( $description )
				);
			}else{
				$content = sprintf(
		             '<div class="neip-cih-info">
		                    %1$s
		                    %2$s
		                </div>',
		            $dnxtiepheadingtext,
		            $this->process_content( $description )
				);
			}


		// Hover BG Color
		$dnxtiep_cih_hover_bg_color			= sanitize_text_field($this->props['dnxtiep_cih_hover_bg']);
		$dnxtiep_cih_hover_bg_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_cih_hover_bg' );
		$dnxtiep_cih_hover_bg_color_tablet	= isset( $dnxtiep_cih_hover_bg_color_values['tablet'] ) ? sanitize_text_field($dnxtiep_cih_hover_bg_color_values['tablet']) : '';
		$dnxtiep_cih_hover_bg_color_phone	= isset( $dnxtiep_cih_hover_bg_color_values['phone'] ) ? sanitize_text_field($dnxtiep_cih_hover_bg_color_values['phone']) : '';

		if ( 'off' !== $this->props['dnxtiep_cih_hover_bg_show_hide'] ) {
			$dnxtiep_cih_hover_bg_color_style = sprintf( 'background: %1$s;', esc_attr( $dnxtiep_cih_hover_bg_color ) );
			$dnxtiep_cih_hover_bg_color_tablet_style = '' !== $dnxtiep_cih_hover_bg_color_tablet ? sprintf( 'background: %1$s;', esc_attr( $dnxtiep_cih_hover_bg_color_tablet ) ) : '';
			$dnxtiep_cih_hover_bg_color_phone_style  = '' !== $dnxtiep_cih_hover_bg_color_phone ? sprintf( 'background: %1$s;', esc_attr( $dnxtiep_cih_hover_bg_color_phone ) ) : '';
			
			if( in_array($dnxtiep_cih_hover_effect, $dnxtiep_cih_info_back ) ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% .dnext-neip-cih-item.neip-cih-{$dnxtiep_cih_hover_effect} .neip-cih-info .neip-cih-info-back",
					'declaration' => $dnxtiep_cih_hover_bg_color_style,
				) );

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% .dnext-neip-cih-item.neip-cih-{$dnxtiep_cih_hover_effect} .neip-cih-info .neip-cih-info-back",
					'declaration' => $dnxtiep_cih_hover_bg_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% .dnext-neip-cih-item.neip-cih-{$dnxtiep_cih_hover_effect} .neip-cih-info .neip-cih-info-back",
					'declaration' => $dnxtiep_cih_hover_bg_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );
			} else {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% .dnext-neip-cih-item.neip-cih-{$dnxtiep_cih_hover_effect} .neip-cih-info",
					'declaration' => $dnxtiep_cih_hover_bg_color_style,
				) );

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% .dnext-neip-cih-item.neip-cih-{$dnxtiep_cih_hover_effect} .neip-cih-info",
					'declaration' => $dnxtiep_cih_hover_bg_color_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				) );

				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => "%%order_class%% .dnext-neip-cih-item.neip-cih-{$dnxtiep_cih_hover_effect} .neip-cih-info",
					'declaration' => $dnxtiep_cih_hover_bg_color_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				) );
			}
		}

		//GRADIENT COLOR 
			$dnxtiep_cih_hover_gradient_color_one = esc_attr($this->props['dnxtiep_cih_hover_gradient_color_one']);
			$dnxtiep_cih_hover_gradient_color_two = esc_attr($this->props['dnxtiep_cih_hover_gradient_color_two']);
			// Other gradient options
			$dnxtiep_cih_hover_gradient_type = esc_attr($this->props['dnxtiep_cih_hover_gradient_type']);
			$dnxtiep_cih_hover_gradient_start = esc_attr($this->props['dnxtiep_cih_hover_gradient_start_position']);
			$dnxtiep_cih_hover_gradient_end = esc_attr($this->props['dnxtiep_cih_hover_gradient_end_position']);

			$dnxtiep_cih_hover_gradient_direction = $dnxtiep_cih_hover_gradient_type === 'linear-gradient' ? esc_attr($this->props['dnxtiep_cih_hover_gradient_type_linear_direction']) : esc_attr($this->props['dnxtiep_cih_hover_gradient_type_radial_direction']);

			if('off' !== $this->props['dnxtiep_cih_hover_gradient_show_hide']) {
				$dnxtiep_cih_hover_bg_gradient = sprintf('background: %1$s(%2$s, %3$s %5$s, %4$s %6$s)', $dnxtiep_cih_hover_gradient_type, $dnxtiep_cih_hover_gradient_direction, esc_attr($dnxtiep_cih_hover_gradient_color_one), esc_attr($dnxtiep_cih_hover_gradient_color_two), $dnxtiep_cih_hover_gradient_start, $dnxtiep_cih_hover_gradient_end);

				if( in_array($dnxtiep_cih_hover_effect, $dnxtiep_cih_info_back ) ) {
					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => "%%order_class%% .dnext-neip-cih-item.neip-cih-{$dnxtiep_cih_hover_effect} .neip-cih-info .neip-cih-info-back",
						'declaration' => $dnxtiep_cih_hover_bg_gradient,
					) );
				}else{
					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => "%%order_class%% .dnext-neip-cih-item.neip-cih-{$dnxtiep_cih_hover_effect} .neip-cih-info",
						'declaration' => $dnxtiep_cih_hover_bg_gradient,
					) );
				}
			}
			// Gradient hover bg end



			// Image round edge
			$dnxtiep_cih_box_shadow_horizontal 		= esc_attr($this->props['dnxtiep_cih_box_shadow_horizontal']);
			$dnxtiep_cih_box_shadow_vertical 		= esc_attr($this->props['dnxtiep_cih_box_shadow_vertical']);
			$dnxtiep_cih_box_shadow_blur_strength 	= esc_attr($this->props['dnxtiep_cih_box_shadow_blur_strength']);
			$dnxtiep_cih_box_shadow_spread_strength = esc_attr($this->props['dnxtiep_cih_box_shadow_spread_strength']);


			$dnxtiep_cih_box_shadow_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxtiep_cih_box_shadow_color' );
			$dnxtiep_cih_box_shadow_color_tablet = isset( $dnxtiep_cih_box_shadow_color_values['tablet'] ) ? $dnxtiep_cih_box_shadow_color_values['tablet'] : '';
			$dnxtiep_cih_box_shadow_color_phone	= isset( $dnxtiep_cih_box_shadow_color_values['phone'] ) ? $dnxtiep_cih_box_shadow_color_values['phone'] : '';


			$dnxtiep_cih_box_shadow_color 	= esc_attr($this->props['dnxtiep_cih_box_shadow_color']);

			$dnxtiep_cih_box_shadow = sprintf(
				'box-shadow: inset %1$s %2$s %3$s %4$s %5$s,0 1px 2px rgba(0, 0, 0, 0.3) !important;', 
				$dnxtiep_cih_box_shadow_horizontal, 
				$dnxtiep_cih_box_shadow_vertical, 
				$dnxtiep_cih_box_shadow_blur_strength, 
				$dnxtiep_cih_box_shadow_spread_strength, 
				$dnxtiep_cih_box_shadow_color
			);

			$dnxtiep_cih_box_shadow_tablet_style = '' !== $dnxtiep_cih_box_shadow_color_tablet ? sprintf(
				'box-shadow: inset %1$s %2$s %3$s %4$s %5$s,0 1px 2px rgba(0, 0, 0, 0.3) !important;', $dnxtiep_cih_box_shadow_horizontal, 
					$dnxtiep_cih_box_shadow_vertical, 
					$dnxtiep_cih_box_shadow_blur_strength, 
					$dnxtiep_cih_box_shadow_spread_strength, 
					$dnxtiep_cih_box_shadow_color_tablet) : '';

			$dnxtiep_cih_box_shadow_phone_style = '' !== $dnxtiep_cih_box_shadow_color_phone ? 
				sprintf('box-shadow: inset %1$s %2$s %3$s %4$s %5$s,0 1px 2px rgba(0, 0, 0, 0.3) !important;', 
					$dnxtiep_cih_box_shadow_horizontal, 
					$dnxtiep_cih_box_shadow_vertical, 
					$dnxtiep_cih_box_shadow_blur_strength, 
					$dnxtiep_cih_box_shadow_spread_strength, 
					$dnxtiep_cih_box_shadow_color_phone) : '';

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnext-neip-cih-item .neip-cih-img::before",
				'declaration' => $dnxtiep_cih_box_shadow,
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnext-neip-cih-item .neip-cih-img::before",
				'declaration' => $dnxtiep_cih_box_shadow_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnext-neip-cih-item .neip-cih-img::before",
				'declaration' => $dnxtiep_cih_box_shadow_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			// Image round edge end

		$this->apply_css($render_slug);
		return sprintf(
			'<div class="dnext-neip-cih-item neip-cih-%3$s %4$s"><div class="dnext-neip-cih-hvr">
		            %1$s
		            %2$s
		        </div>
		    </div>',
		    $dnxtiep_cih_img,
		    $content,
		    esc_attr($dnxtiep_cih_hover_effect),
		    esc_attr($dnxtiep_cih_hover_direction_class)
		);
	}

	public function apply_css($render_slug){


			/**
	         * Custom Padding Margin Output
	         *
	        */
			Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_cih_heading_margin", "%%order_class%% .neip-cih-heading", "margin");
	        Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_cih_heading_padding", "%%order_class%% .neip-cih-heading", "padding");

			Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_cih_description_margin", "%%order_class%% .neip-cih-desc", "margin");
	        Common::dnxt_set_style($render_slug, $this->props, "dnxtiep_cih_description_padding", "%%order_class%% .neip-cih-desc", "padding");
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

new Next_Circular_Image_Hover;