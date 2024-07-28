<?php

class NextTextTilt extends ET_Builder_Module {

	public $slug       = 'dnxte_text_tilt';
	public $vb_support = 'on';
	public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-text-tilt/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name 		= esc_html__( 'Next Text Tilt', 'dnxte-divi-essential' );
		$this->icon_path    = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->folder_name 	= 'et_pb_divi_essential';

		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'		=>	array(
					'dnxt_tilt_content_background'	=> array(
						'title'		=>	esc_html__( 'Background Content', 'dnxte-divi-essential' ),
						'priority'	=>	78,
						'sub_toggles'       => array(
                            'sub_toggle_color'   => array(
								'name' => esc_html__('Color', 'dnxte-divi-essential')
                            ),
                            'sub_toggle_gradient'   => array(
								'name' => esc_html__('Gradient', 'dnxte-divi-essential')
                            )
                        ),
                        'tabbed_subtoggles' => true,
					),

				),
			),
			'advanced'	=> array(
				'toggles'	=>	array(	
					'dnxt_tilt_text'	=> array(
						"title"		=>	esc_html__( 'Title Text', 'dnxte-divi-essential' ),
						'sub_toggles'       => array(
                            'sub_toggle_heading'   => array(
                                'name' => 'Heading',
                            ),
                            'sub_toggle_post' => array(
                                'name' => 'Body',
							),
                        ),
                        'tabbed_subtoggles' => true,
					),				
					'dnxt_tilt_effect'	=> array(
						"title"		=>	esc_html__( 'Tilt Effect', 'dnxte-divi-essential' ),
					),
					'dnxt_tilt_content_box_shadow'	=> array(
						"title"		=>	esc_html__( 'Content Box Shadow', 'dnxte-divi-essential' ),
						'priority'	=>	102,
					),
					'dnxt_tilt_content_border'	=> array(
						"title"		=>	esc_html__( 'Content Border', 'dnxte-divi-essential' ),
						'priority'	=>	100,
					),
					'dnxt_tilt_content_space'	=> array(
						"title"		=>	esc_html__( 'Content Spacing', 'dnxte-divi-essential' ),
						'priority'	=>	91,
					)
				), 
			),
		);

		// Custom CSS Field
		$this->custom_css_fields = array(
			'tilt_body'    => array(
				'label'    => esc_html__('Tilt', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dnxt-txt-parallax-effect',
			),
			'heading'      => array(
				'label'    => esc_html__('Heading', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dnxt-txt-parallax-effect-3d',
			),
			'tilt_heading' => array(
				'label'    => esc_html__('Tilt Heading', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dnxt-txt-parallax-effect .dnxt-txt-parallax-mini-heading',
			),  
			'text_body'    => array(
				'label'    => esc_html__('Text Body', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dnxt-txt-parallax-effect-3d p',
			),
		);
	}

	public function get_fields() {
		return array(
			// Tilt Text
			'tilt_text' => array(
				'label'           => esc_html__( 'Heading', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Heading Text here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'main_content',
			),
			// Heading Tag
			'heading_tag'     => array(
                'label'           => esc_html__('Select Heading Tag', 'dnxte-divi-essential'),
                'type'            => 'select',
                'description'     => esc_html__('Select the heading tag, which you would like to use', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug'     => 'main_content',
                'options'         => array(
                    'h1'	  => esc_html__('H1', 'dnxte-divi-essential'),
                    'h2'	  => esc_html__('H2', 'dnxte-divi-essential'),
                    'h3'	  => esc_html__('H3', 'dnxte-divi-essential'),
                    'h4'	  => esc_html__('H4', 'dnxte-divi-essential'),
                    'h5'	  => esc_html__('H5', 'dnxte-divi-essential'),
                    'h6'	  => esc_html__('H6', 'dnxte-divi-essential'),
                    'p'	      => esc_html__('P', 'dnxte-divi-essential'),
                    'span'	  => esc_html__('Span', 'dnxte-divi-essential'),
                ),
				'default'         => 'h2',
			),
			// Body Switch
			'body_switch'  => array(
				'label'           => esc_html__('Body Enable', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',  
				'description'     => esc_html__('Enable body for the text tilt to add extra information to your text tilt heading', 'dnxte-divi-essential'),              
				'toggle_slug'     => 'main_content',
				'options'         => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'affects'         => array(
					'tilt_body',
				),
				'default_on_front' => 'on',
			),
			'tilt_body' => array(
				'label'           => esc_html__( 'Body', 'dnxte-divi-essential' ),
				'type'            => 'tiny_mce',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Description entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'main_content',
			),
			// Content Background 
			'tilt_content_bg_show_hide'  => array(
				'label'           => esc_html__( 'Background Content Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button', 
				'description'     => esc_html__( 'Enable this to add background color to your text.', 'dnxte-divi-essential' ),               
				'toggle_slug'     => 'dnxt_tilt_content_background',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'tilt_content_bg',
				),
				'default_on_front' => 'off',
			),
			// Content BG Color
			'tilt_content_bg'    => array(
				'label'          => esc_html__('Select Background Color', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Select a suitable background color from color picker for the text.', 'dnxte-divi-essential' ),               
				'toggle_slug'    => 'dnxt_tilt_content_background',
				'sub_toggle'	 => 'sub_toggle_color',
				'hover'    		 => 'tabs',
				'default'        => '#0077FF',
				'depends_show_if'=> 'on',
			),
			// Background Content Gradient 
			'tilt_content_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Gradient Description Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'description'     => esc_html__( 'Enable this to add gradient background color to your tilt text.', 'dnxte-divi-essential' ),                
				'toggle_slug'     => 'dnxt_tilt_content_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'tilt_content_gradient_color_one',
					'tilt_content_gradient_color_two',
					'tilt_content_gradient_type',
					'tilt_content_gradient_start_position',
					'tilt_content_gradient_end_position'
				),
				'default_on_front' => 'off',
			),
			'tilt_content_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'description'     => esc_html__( 'Choose the first color to blend with the second color from the color picker that suits your tilt text.', 'dnxte-divi-essential' ),
				'toggle_slug'    => 'dnxt_tilt_content_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#0077FF',
				'depends_show_if'=> 'on',
			),
			'tilt_content_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'description'     => esc_html__( 'Choose the second color to blend with the first color from the color picker that suits your tilt text.', 'dnxte-divi-essential' ),
				'toggle_slug'    => 'dnxt_tilt_content_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#772ADB',
				'depends_show_if'=> 'on',
			),
			'tilt_content_gradient_type'		=> array(
				'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
				'type'            => 'select',
				'description'     => esc_html__('Select a type for your gradient here.', 'dnxte-divi-essential'),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_tilt_content_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
					'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
				),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'tilt_content_gradient_type_linear_direction'   => array(
				'label'           => esc_html__('Linear direction', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust the direction of the gradient for the tilt text.', 'dnxte-divi-essential' ),
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'dnxt_tilt_content_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'tilt_content_gradient_show_hide' => 'on',
					'tilt_content_gradient_type' => 'linear-gradient'
				),
			),
			'tilt_content_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__('Adjust the direction of the gradient for the tilt text.', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'dnxt_tilt_content_background',
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
					'tilt_content_gradient_show_hide' 		=> 'on',
					'tilt_content_gradient_type'	=> 'radial-gradient'
				),
			),
			'tilt_content_gradient_start_position'           => array(
				'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust the position for the beginning of the gradient color.', 'dnxte-divi-essential' ),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_tilt_content_background',
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
			'tilt_content_gradient_end_position'             => array(
				'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust the position for the ending of the gradient color.', 'dnxte-divi-essential' ),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'dnxt_tilt_content_background',
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
			// Data Tilt Glare Enable
			'dnxt_tilt_text_glare'=> array(
				'label'           => esc_html__('Glare Enable', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'description'     => esc_html__( 'Enable this to get a slightly lowered opacity effect above the tilt text when hovered upon with the cursor.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'affects'         => array(
					'dnxt_tilt_text_max_glare'
				),
				'default_on_front'=> 'off',
			),
			// Data Tilt Max Glare
			'dnxt_tilt_text_max_glare' => array(
				'label'           => esc_html__('Max Glare', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust the glare to the tilt text; the higher the value the lower the opacity.', 'dnxte-divi-essential' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
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
			),
			// Data Tilt 3D Enable
			'dnxt_tilt_text_3d'   => array(
				'label'           => esc_html__('3D Enable', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'description'     => esc_html__( 'Enable this to get a 3D effect on the tilt text.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'affects'         => array(
					'dnxt_tilt_text_3d_transform'
				),
				'default_on_front'=> 'off',
			),
			// Data Tilt 3D Transform
			'dnxt_tilt_text_3d_transform' => array(
				'label'           => esc_html__('3D Transform', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust to control the 3D effect enabled using this tool.', 'dnxte-divi-essential' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '50px',				
                'fixed_unit'      => 'px',
				'validate_unit'   => true,
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
			),
			// Data Tilt Reverse
			'dnxt_tilt_text_reverse' => array(
				'label'           => esc_html__('Tilt Reverse', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'description'     => esc_html__( 'Enabling this helps the tilt effect to occur on the opposite direction.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
				'options'   => array(
					'off'     => esc_html__('Off', 'dnxte-divi-essential'),
					'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'default'           => 'off',
			),
			// Data Tilt Perspective
			'dnxt_tilt_text_perspective' => array(
				'label'           => esc_html__('Tilt Perspective', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust the perspective to the tilt text; the higher the value the lower the space taken.', 'dnxte-divi-essential' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
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
			),
			// Data Tilt Max
			'dnxt_tilt_text_max' => array(
				'label'           => esc_html__('Tilt Max', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust this to lessen the excessive movement; the higher the value the faster the tilt effect when hovered on with cursor.', 'dnxte-divi-essential' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
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
			),
			// Data Tilt Speed
			'dnxt_tilt_text_speed'=> array(
				'label'           => esc_html__('Tilt Speed', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust the tilt speed using this slider below; the higher the value the faster the motion.', 'dnxte-divi-essential' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
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
			),
			// Data Tilt StartX
			'dnxt_tilt_text_startx' => array(
				'label'           => esc_html__('Tilt StartX', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust the vertical angle to tilt text.', 'dnxte-divi-essential' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
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
			),
			// Data Tilt StartY
			'dnxt_tilt_text_starty' => array(
				'label'           => esc_html__('Tilt StartY', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust the horizontal angle to the tilt text.', 'dnxte-divi-essential' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
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
			),
			// Data Tilt Scale
			'dnxt_tilt_text_scale'=> array(
				'label'           => esc_html__('Tilt Scale', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Increase or decrease the scale of the text using the slider below.', 'dnxte-divi-essential' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_effect',
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
			),
			'tilt_content_margin' =>	array(
				'label'           => esc_html__('Content Margin', 'dnxte-divi-essential'),
				'type'            => 'custom_margin',
				'description'     => esc_html__( 'Description entered here will appear inside the module.', 'dnxte-divi-essential' ),
                'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_tilt_content_space',
			),
			'tilt_content_padding'=>	array(
				'label'           => esc_html__('Content Padding', 'dnxte-divi-essential'),
				'type'            => 'custom_padding',
				'description'     => esc_html__( 'Description entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'mobile_options'  => true,
				'hover'           => 'tabs',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' => 'layout',
				'tab_slug'        => 'advanced',				
				'toggle_slug'     => 'dnxt_tilt_content_space',
			),
		);
	}

	public function get_advanced_fields_config() {
		$advanced_fields = array();
		$advanced_fields = array(
			'fonts'         	=> array(
				'default' 		=> array(
					'label'     => esc_html__( 'Heading', 'dnxte-divi-essential' ),
					'css'       => array(
						'main'  => '%%order_class%% .dnxt-txt-parallax-mini-heading',
						'hover' => '%%order_class%%:hover .dnxt-txt-parallax-mini-heading',
					),
					'font_size'   => array(
						'default' => '26px',
					),
				),
				'tilt_body'   		 => array(
					'label'          => esc_html__( 'Body', 'dnxte-divi-essential' ),
					'css'            => array(
						'line_height'=> "%%order_class%% .dnxt-txt-parallax-effect-3d p",
						'text_align' => "%%order_class%% .dnxt-txt-parallax-effect-3d p",
						'text_shadow'=> "%%order_class%% .dnxt-txt-parallax-effect-3d p",
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'css'               => array(
							'main' => "%%order_class%% .dnxt-txt-parallax-effect-3d",
						),
					),
				)
			),
			'box_shadow'        => array(
				'default' 		=> array(
					'css'       => array(
						'main'  => '%%order_class%% .dnxt-txt-parallax-effect',
						'hover' => '%%order_class%%:hover .dnxt-txt-parallax-effect',
					),
				),
				'dnxt_content_boxshadow'   => array(
					'label'           => esc_html__( 'Content Box Shadow', 'dnxte-divi-essential' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dnxt_tilt_content_box_shadow',
					'css'             => array(
						'main'        => '%%order_class%% .dnxt-txt-parallax-effect-3d',
						'hover'       => '%%order_class%%:hover .dnxt-txt-parallax-effect-3d',
						'overlay'     => 'inset',
					),
					'default_on_fronts'  => array(
						'color'    => '',
						'position' => '',
					),
				),
			),
			'borders'               => array(
				'default' => array(
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-txt-parallax-effect",
							'border_radii_hover'  	=> '%%order_class%%:hover .dnxt-txt-parallax-effect',
							'border_styles' 		=> "%%order_class%% .dnxt-txt-parallax-effect",
							'border_styles_hover' 	=> '%%order_class%%:hover .dnxt-txt-parallax-effect',
						),
					),
				),
				'dnxt_content_borders'     => array(
					'tab_slug'     		=> 'advanced',
					'toggle_slug'  		=> 'dnxt_tilt_content_border',
					'css'          => array(
						'main'     => array(
							'border_radii'  		=> "%%order_class%% .dnxt-txt-parallax-effect-3d",
							'border_radii_hover'  	=> '%%order_class%%:hover .dnxt-txt-parallax-effect-3d',
							'border_styles' 		=> "%%order_class%% .dnxt-txt-parallax-effect-3d",
							'border_styles_hover' 	=> '%%order_class%%:hover .dnxt-txt-parallax-effect-3d',
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
				'css'             => array(
					'main'        => '%%order_class%% .dnxt-text-parallax-effect-image',
					'important'   => true,
				),
				'use_background_pattern'    => false,
                'use_background_mask'       => false,
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%% .dnxt-txt-parallax-effect',
					'important' => 'all',
				),	
			),
			'text'                  => true,
		);
		return $advanced_fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		wp_enqueue_style( 'dnext_text_tilt' );
		wp_enqueue_script( 'dnxtblrb_divinextblurb-public' );
		$tilt_text				=	$this->props['tilt_text'];
		$heading_tag			=	$this->props['heading_tag'];
		$body_switch			=	$this->props['body_switch'];
		$tilt_body				=	$this->props['tilt_body'];
		$tilt_text_max_glare	=	$this->props['dnxt_tilt_text_max_glare'];
		$tilt_text_reverse		=	'on' === $this->props['dnxt_tilt_text_reverse'] ? 'true' : 'false';
		$tilt_text_perspective	=	$this->props['dnxt_tilt_text_perspective'];
		$tilt_text_max			=	$this->props['dnxt_tilt_text_max'];
		$tilt_text_speed		=	$this->props['dnxt_tilt_text_speed'];
		$tilt_text_startx		=	$this->props['dnxt_tilt_text_startx'];
		$tilt_text_starty		=	$this->props['dnxt_tilt_text_starty'];
		$tilt_text_scale		=	$this->props['dnxt_tilt_text_scale'];

		// Heading text
		if('' !== $tilt_text ) {
			$tilt_text = sprintf(
				'<%2$s class="dnxt-txt-parallax-mini-heading">%1$s</%2$s>',
				esc_html($tilt_text),
				$heading_tag	
			);
		}
		// Body Text
		$tilt_body_text	= '';
		if('off' !== $body_switch ) {
			$tilt_body_text = sprintf(
				'<p>%1$s</p>',
				$tilt_body
			);
		}
		// Tilt Effect
		$tilt_text_enable = 'data-tilt';
		$tilt_text_glare_enable = "";
		$tilt_text_max_glare_value = "";
		if ('off' !== $this->props['dnxt_tilt_text_glare']){
			$tilt_text_glare_enable = "data-tilt-glare";
			$tilt_text_max_glare_value = 'data-tilt-max-glare="'.intval($tilt_text_max_glare).'"';
		}
		$tilt = 'data-tilt-reverse="'.$tilt_text_reverse.'" data-tilt-perspective="'.intval($tilt_text_perspective).'" data-tilt-max="'.intval($tilt_text_max).'" data-tilt-speed="'.intval($tilt_text_speed).'" data-tilt-startX="'.intval($tilt_text_startx).'" data-tilt-startY="'.intval($tilt_text_starty).'" data-tilt-scale="'.$tilt_text_scale.'" data-tilt-gyroscope="false"';

		$this->apply_css($render_slug);
		return sprintf( 
			'<div class="dnxt-txt-parallax-effect" %3$s %4$s %5$s %6$s>
				<div class ="dnxt-text-parallax-effect-image">
					<div class="dnxt-txt-parallax-effect-3d">
						%1$s 
						%2$s
					</div>
				</div>
			</div>',
			$tilt_text,
			$this->process_content($tilt_body_text),
			$tilt_text_enable,
			$tilt_text_glare_enable,
			$tilt_text_max_glare_value,
			$tilt
		);
	}

	public function apply_css($render_slug){
		/**
         * Custom Padding Margin Output
         *
         */

        Common::dnxt_set_style($render_slug, $this->props, "tilt_content_margin", "%%order_class%% .dnxt-txt-parallax-effect-3d", "margin");
		Common::dnxt_set_style($render_slug, $this->props, "tilt_content_padding", "%%order_class%% .dnxt-txt-parallax-effect-3d", "padding");
		
		if ( 'off' !== $this->props['dnxt_tilt_text_3d'] ) {
			$transform_value = $this->props['dnxt_tilt_text_3d_transform'];
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-txt-parallax-effect-3d",
				'declaration' => "transform: translateZ($transform_value);"
			));
		}

		// Tilt Content Background Color & Gradient
		$tilt_content_bg             			= '';
		$tilt_content_gradient_apply        	= '';
		$tilt_content_gradient_color_one 		= '';
		$tilt_content_gradient_color_two 		= '';
		$tilt_content_gradient_type	   			= '';
		$tilt_content_gl             			= '';
		$tilt_content_gr             			= '';
		$tilt_content_gradient_start_position	= '';
		$tilt_content_gradient_end_position  	= '';

		// Content Background color
		if ('' !== $this->props['tilt_content_bg']) {
			$tilt_content_bg = $this->props['tilt_content_bg'];
		}
		// Checking Content Background Gradient Type
		if ('' !== $this->props['tilt_content_gradient_type']) {
			$tilt_content_gradient_type = $this->props['tilt_content_gradient_type'];
		}
		// Content Linear Gradient Direction
		if ('' !== $this->props['tilt_content_gradient_type_linear_direction']) {
			$tilt_content_gl = $this->props['tilt_content_gradient_type_linear_direction'];
		}

		// Content Radial Gradient Direction
		if ('' !== $this->props['tilt_content_gradient_type_radial_direction']) {
			$tilt_content_gr = $this->props['tilt_content_gradient_type_radial_direction'];
		}
			
		// Apply Content gradient direcion
		if ('radial-gradient' === $this->props['tilt_content_gradient_type']) {
			$tilt_content_gradient_apply = sprintf('%1$s', $tilt_content_gr);
		} else if ('linear-gradient' === $this->props['tilt_content_gradient_type']) {
			$tilt_content_gradient_apply = sprintf('%1$s', $tilt_content_gl);
		}

		// Content Gradient color one for content
		if ('' !== $this->props['tilt_content_gradient_color_one']) {
			$tilt_content_gradient_color_one = $this->props['tilt_content_gradient_color_one'];
		}

		// Content Gradient color two for content 
		if ('' !== $this->props['tilt_content_gradient_color_two']) {
			$tilt_content_gradient_color_two = $this->props['tilt_content_gradient_color_two'];
		}

		// Content Gradient color start position 
		if ('' !== $this->props['tilt_content_gradient_start_position']) {
			$tilt_content_gradient_start_position = $this->props['tilt_content_gradient_start_position'];
		}

		// Content Gradient color end position
		if ('' !== $this->props['tilt_content_gradient_end_position']) {
			$tilt_content_gradient_end_position = $this->props['tilt_content_gradient_end_position'];
		}
		// Content Color
		if ('off' !== $this->props['tilt_content_bg_show_hide']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-txt-parallax-effect-3d",
				'declaration' => "background: $tilt_content_bg;",
			));
		}
		// Content Gradient setting up
		if ('off' !== $this->props['tilt_content_gradient_show_hide']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-txt-parallax-effect-3d",
				'declaration' => "background: {$tilt_content_gradient_type}($tilt_content_gradient_apply, $tilt_content_gradient_color_one $tilt_content_gradient_start_position, $tilt_content_gradient_color_two $tilt_content_gradient_end_position);",
			));
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

new NextTextTilt;