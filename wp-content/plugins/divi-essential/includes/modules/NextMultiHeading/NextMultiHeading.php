<?php
include_once(DIVI_ESSENTIAL_PATH.'/includes/modules/base/Common.php');

class Next_Multi_Heading extends ET_Builder_Module {

	public $slug       = 'dnxte_multi_heading';
	public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-multi-heading/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name 		= esc_html__( 'Next Text Multi Heading', 'dnxte-divi-essential' );
		$this->icon_path    = plugin_dir_path( __FILE__ ) . 'icon.svg';
        $this->folder_name  = 'et_pb_divi_essential';

		// Toggles
		$this->settings_modal_toggles = array(

			'general' => array(
				'toggles' => array(
					'main_content'   => array(
						'title'      => esc_html__('Heading', 'dnxte-divi-essential'),
					),
					'background_one'       => array(
						'title'             => esc_html__('Text One Background', 'dnxte-divi-essential'),
						'sub_toggles'       => array(
							'sub_toggle_color'   => array(
								'name' => 'Color',
							),
							'sub_toggle_gradient'=> array(
								'name' => 'Gradient',
							),
						),
						'tabbed_subtoggles' => true,
					),
					'background_two'       => array(
						'title'             => esc_html__('Text Two Background', 'dnxte-divi-essential'),
						'sub_toggles'       => array(
							'sub_toggle_color'   => array(
								'name' => 'Color',
							),
							'sub_toggle_gradient'=> array(
								'name' => 'Gradient',
							),
						),
						'tabbed_subtoggles' => true,
					),
					'background_three'       => array(
						'title'             => esc_html__('Text Three Background', 'dnxte-divi-essential'),
						'sub_toggles'       => array(
							'sub_toggle_color'   => array(
								'name' => 'Color',
							),
							'sub_toggle_gradient'=> array(
								'name' => 'Gradient',
							),
						),
						'tabbed_subtoggles' => true,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text'   => array(
						'title'             => esc_html__('General', 'dnxte-divi-essential'),
						'priority'          => 1,
					),
					// Heading font Toggles
					'heading_fonts'       => array(
						'title'             => esc_html__('Fonts', 'dnxte-divi-essential'),
						'priority'          => 2,
						'sub_toggles'       => array(
							'sub_toogle_text_one'   => array(
								'name' => 'Text One',
							),
							'sub_toogle_text_two'   => array(
								'name' => 'Text Two',
							),
							'sub_toogle_text_three' => array(
								'name' => 'Text Three',
							),
						),
						'tabbed_subtoggles' => true,
					),
					'custom_spacing'      => array(
						'title'             => esc_html__('Heading Spacing', 'dnxte-divi-essential'),
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'spacing_text_1' => array(
								'name' => 'One',
							),
							'spacing_text_2' => array(
								'name' => 'Two',
							),
							'spacing_text_3' => array(
								'name' => 'Three',
							),
						),
					),
					//Gradient Toggles
					'gradient_text'       => array(
						'priority'          => 3,
						'sub_toggles'       => array(
							'sub_toogle_gradient_color_text_one'   => array(
								'name' => 'Text One',
							),
							'sub_toogle_gradient_color_text_two'   => array(
								'name' => 'Text Two',
							),
							'sub_toogle_gradient_color_text_three' => array(
								'name' => 'Text Three',
							),
						),
						'tabbed_subtoggles' => true,
						'title'             => 'Gradient Text Color',
					),
					//Text Reveal Effect
					'reveal_text'       => array(
						'priority'          => 3,
						'sub_toggles'       => array(
							'sub_toggle_reveal_text_one'   => array(
								'name' => 'Text One',
							),
							'sub_toggle_reveal_text_two'   => array(
								'name' => 'Text Two',
							),
							'sub_toggle_reveal_text_three' => array(
								'name' => 'Text Three',
							),
						),
						'tabbed_subtoggles' => true,
						'title'             => 'Reveal Effect',
					),
					// Border Toggles
					'toogle_border_one'   => array(
						'title' => esc_html__('Border Text One', 'dnxte-divi-essential'),
						'priority'          => 120,
					),
					'toogle_border_two'   => array(
						'title' => esc_html__('Border Text Two', 'dnxte-divi-essential'),
						'priority'          => 121,
					),
					'toogle_border_three' => array(
						'title' => esc_html__('Border Text Three', 'dnxte-divi-essential'),
						'priority'          => 122,
					),
					// Hover Effect
					'dnxt_text_hover_effect'	=> array(
						'title'             	=> esc_html__('Hover Effect', 'dnxte-divi-essential'),
						'priority'          	=> 4,
					),

				),
			),
		);
		// Custom CSS Field
		$this->custom_css_fields = array(
			'text_one' => array(
				'label'    => esc_html__('Heading Text one', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .wrapper .dnxt-text-one',
			),
			'text_two'  => array(
				'label'    => esc_html__('Heading Text Two', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .wrapper .dnxt-text-two',
			),
			'text_three'  => array(
				'label'    => esc_html__('Heading Text Three', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .wrapper .dnxt-text-three',
			),
		);
	}

    public function get_fields() {
        return array(
            'text_one'            => array(
                'label'           => esc_html__('Text One', 'dnxte-divi-essential'),
                'type'            => 'text',
                'dynamic_content' => 'text',
                'description'     => esc_html__('Type your first heading text here.', 'dnxte-divi-essential'),
                //'default'         => 'Multi',
                'option_category' => 'basic_option',
                'toggle_slug'     => 'main_content',
            ),
            'text_two'            => array(
                'label'           => esc_html__('Text Two', 'dnxte-divi-essential'),
                'type'            => 'text',
                'dynamic_content' => 'text',
                'description'     => esc_html__('Type your second heading text here.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug'     => 'main_content',
            ),
            'text_three'                                => array(
                'label'           => esc_html__('Text Three', 'dnxte-divi-essential'),
                'type'            => 'text',
                'dynamic_content' => 'text',
                'description'     => esc_html__('Type your third heading text here.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug'     => 'main_content',
            ),
            'heading_tag'                               => array(
                'label'           => esc_html__('Select Heading Tag', 'dnxte-divi-essential'),
                'type'            => 'select',
                'options'         => array(
                    'h1' => esc_html__('H1', 'dnxte-divi-essential'),
                    'h2' => esc_html__('H2', 'dnxte-divi-essential'),
                    'h3' => esc_html__('H3', 'dnxte-divi-essential'),
                    'h4' => esc_html__('H4', 'dnxte-divi-essential'),
                    'h5' => esc_html__('H5', 'dnxte-divi-essential'),
                    'h6' => esc_html__('H6', 'dnxte-divi-essential'),
                    'p' => esc_html__('P', 'dnxte-divi-essential'),
                    'span' => esc_html__('span', 'dnxte-divi-essential'),
                ),
                'default'         => 'h1',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Select the heading tag, which you would like to use', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'text',
            ),
            // Display Stack
            'display_type_select' => array(
                'label'           => esc_html__('Display Stacked', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'options'         => array(
                    'off' => esc_html__('Inline', 'dnxte-divi-essential'),
                    'on'  => esc_html__('Stack', 'dnxte-divi-essential'),
                ),
                'default'         => 'off',
                'description'     => esc_html__('Select how you would like to display the heading. Either inline or stacked.', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'text',
            ),
            // Spacing between heading
            'spacing_between_heading'   => array(
                'label'          => esc_html__('Spacing Between Heading', 'dnxte-divi-essential'),
                'type'           => 'range',
                'default'        => '0px',
                'validate_unit'  => true,
                'range_settings' => array(
                    'step' => 1,
                    'min'  => 0,
                    'max'  => 100,
                ),
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'text',
                'show_if' => array(
					'display_type_select' => 'off',
				),
            ),
            'inline_multi_align'   => array(
                'label'            => esc_html__( 'Text Alignment', 'dnxte-divi-essential' ),
                'description'      => esc_html__( 'This controls how your text is aligned within the module.', 'dnxte-divi-essential' ),
                'type'             => 'text_align',
                'option_category'  => 'layout',
                'options'          => et_builder_get_text_orientation_options( array( 'justified' ), array( 'justify' => 'Justified' ) ),
                'tab_slug'         => 'advanced',
                'toggle_slug'      => 'text',
                'advanced_fields'  => true,
                'mobile_options'   => true,
                'show_if'          => array(
					'display_type_select' => 'off',
				),
            ),
            'text_one_margin'     => array(
                'label'           => esc_html__('Text One Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'description'     => esc_html__('Text One Margin here.', 'dnxte-divi-essential'),
                'mobile_options'  => true,
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'custom_spacing',
                'sub_toggle'      => 'spacing_text_1',
            ),
            'text_one_padding'    => array(
                'label'           => esc_html__('Text One Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'description'     => esc_html__('Text One Padding here.', 'dnxte-divi-essential'),
                'mobile_options'  => true,
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'custom_spacing',
                'sub_toggle'      => 'spacing_text_1',
            ),
            'text_two_margin'     => array(
                'label'           => esc_html__('Text Two Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'description'     => esc_html__('Text Two Margin here.', 'dnxte-divi-essential'),
                'mobile_options'  => true,
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'custom_spacing',
                'sub_toggle'      => 'spacing_text_2',
            ),
            'text_two_padding'    => array(
                'label'           => esc_html__('Text Two Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'description'     => esc_html__('Text Two Padding here.', 'dnxte-divi-essential'),
                'mobile_options'  => true,
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'custom_spacing',
                'sub_toggle'      => 'spacing_text_2',
            ),
            'text_three_margin'   => array(
                'label'           => esc_html__('Text Three Margin', 'dnxte-divi-essential'),
                'type'            => 'custom_margin',
                'description'     => esc_html__('Text Three Margin here.', 'dnxte-divi-essential'),
                'mobile_options'  => true,
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'custom_spacing',
                'sub_toggle'      => 'spacing_text_3',

            ),
            // Text One Background Color
			'bg_one_background_show_hide'  => array(
				'label'           => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'background_one',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'bg_one_bg_color',
				),
				'default_on_front' => 'off',
				'depends_show_if' 	=> 'on',
            ),
            'bg_one_bg_color'  => array(
                'label'             => esc_html__('Text One Background Color', 'dnxte-divi-essential'),
                'type'              => 'color-alpha',
                'description'       => esc_html__('Add a background color that best suits your text here.', 'dnxte-divi-essential'),
                'mobile_options'    => true,
                'tab_slug'          => 'general',
                'toggle_slug'       => 'background_one',
                'sub_toggle'        => 'sub_toggle_color',
                'depends_show_if'   => 'on',
                'default'        	=> '#0077FF',
            ),
            // Text Two Background Color
			'bg_two_background_show_hide'  => array(
				'label'           => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'background_two',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'bg_two_bg_color',
				),
				'default_on_front' => 'off',
				'depends_show_if' 	=> 'on',
            ),
            'bg_two_bg_color'  => array(
                'label'          => esc_html__('Text Two Background Color', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     => esc_html__('Add a background color that best suits your text here.', 'dnxte-divi-essential'),
                'mobile_options' => true,
                'tab_slug'       => 'general',
                'toggle_slug'    => 'background_two',
                'sub_toggle'     => 'sub_toggle_color',
                'depends_show_if'=> 'on',
                'default'        	=> '#0077FF',
            ),
            // Text Three Background Color
			'bg_three_background_show_hide'  => array(
				'label'           => esc_html__( 'Background Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'background_three',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'bg_three_bg_color',
				),
				'default_on_front' => 'off',
				'depends_show_if' 	=> 'on',
            ),
            'bg_three_bg_color'  => array(
                'label'          => esc_html__('Text Three Background Color', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     => esc_html__('Add a background color that best suits your text here.', 'dnxte-divi-essential'),
                'mobile_options' => true,
                'tab_slug'       => 'general',
                'toggle_slug'    => 'background_three',
                'sub_toggle'     => 'sub_toggle_color',
                'depends_show_if'=> 'on',
                'default'        	=> '#0077FF',
            ),

            'bg_one_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Gradient Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'background_one',
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
                'description'     => esc_html__('Choose the first color to blend with the second color from the color picker that suits your first heading text.', 'dnxte-divi-essential'),
				'toggle_slug'    => 'background_one',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#0077FF',
				'depends_show_if'=> 'on',
            ),
            'bg_one_gradient_color_two'	=> array(
                'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     => esc_html__('Choose the second color to blend with the first color from the color picker that suits your first heading text.', 'dnxte-divi-essential'),
				'toggle_slug'    => 'background_one',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#772ADB',
				'depends_show_if'=> 'on',
            ),
            'bg_one_gradient_type'		=> array(
                'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type'            => 'select',
				'description'     => esc_html__('Choose a gradient type for the first heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'background_one',
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
                'description'     	=> esc_html__('Adjust the direction of the gradient for the first heading text.', 'dnxte-divi-essential'),
                'option_category'=> 'basic_option',
				'toggle_slug'    => 'background_one',
				'sub_toggle'	 => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 360,
                ),
                'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'bg_one_gradient_show_hide' => 'on',
					'bg_one_gradient_type' => 'linear-gradient'
				),
			),
			'bg_one_gradient_type_radial_direction'   => array(
                'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type'            	=> 'select',
				'description'     	=> esc_html__('Adjust the direction of the gradient for the first heading text.', 'dnxte-divi-essential'),
                'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'background_one',
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
					'bg_one_gradient_show_hide' 		=> 'on',
					'bg_one_gradient_type'	=> 'radial-gradient'
                ),
			),
			'bg_one_gradient_start_position'           => array(
                'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the beginning of the gradient color for the first heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'background_one',
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
                'description'     	=> esc_html__('Adjust the position for the ending of the gradient color for the first heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'background_one',
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
            'bg_two_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Gradient Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'background_two',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'bg_two_gradient_color_one',
					'bg_two_gradient_color_two',
					'bg_two_gradient_type',
					'bg_two_gradient_start_position',
					'bg_two_gradient_end_position'
				),
				'default_on_front' => 'off',
				'depends_show_if' 	=> 'on',
            ),
            'bg_two_gradient_color_one'	=> array(
                'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     	=> esc_html__('Choose the first color to blend with the second color from the color picker that suits your second heading text.', 'dnxte-divi-essential'),
				'toggle_slug'    => 'background_two',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        	=> '#0077FF',
				'depends_show_if'=> 'on',
            ),
            'bg_two_gradient_color_two'	=> array(
                'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     	=> esc_html__('Choose the second color to blend with the first color from the color picker that suits your second heading text.', 'dnxte-divi-essential'),
				'toggle_slug'    => 'background_two',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        	=> '#772ADB',
				'depends_show_if'=> 'on',
            ),
            'bg_two_gradient_type'		=> array(
                'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type'            => 'select',
				'description'     => esc_html__('Choose a gradient type for the second heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'background_two',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'options'         => array(
                    'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
                    'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
                ),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'bg_two_gradient_type_linear_direction'   => array(
                'label'           => esc_html__('Gradient direction', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the direction of the gradient for the second heading text.', 'dnxte-divi-essential'),
                'option_category'=> 'basic_option',
				'toggle_slug'    => 'background_two',
				'sub_toggle'	 => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 360,
                ),
                'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'bg_two_gradient_show_hide' => 'on',
					'bg_two_gradient_type' => 'linear-gradient'
				),
			),
			'bg_two_gradient_type_radial_direction'   => array(
                'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type'            	=> 'select',
				'description'     	=> esc_html__('Adjust the direction of the gradient for the second heading text.', 'dnxte-divi-essential'),
                'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'background_two',
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
					'bg_two_gradient_show_hide' 		=> 'on',
					'bg_two_gradient_type'	=> 'radial-gradient'
                ),
			),
			'bg_two_gradient_start_position'          => array(
                'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the beginning of the gradient color for the second heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'background_two',
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
			'bg_two_gradient_end_position'            => array(
                'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the ending of the gradient color for the second heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'background_two',
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
            'bg_three_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Gradient Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'toggle_slug'     => 'background_three',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'bg_three_gradient_color_one',
					'bg_three_gradient_color_two',
					'bg_three_gradient_type',
					'bg_three_gradient_start_position',
					'bg_three_gradient_end_position'
				),
				'default_on_front' => 'off',
				'depends_show_if' 	=> 'on',
            ),
            'bg_three_gradient_color_one'	=> array(
                'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     	=> esc_html__('Choose the first color to blend with the second color from the color picker that suits your third heading text.', 'dnxte-divi-essential'),
				'toggle_slug'    => 'background_three',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#0077FF',
				'depends_show_if'=> 'on',
            ),
            'bg_three_gradient_color_two'	=> array(
                'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     	=> esc_html__('Choose the second color to blend with the first color from the color picker that suits your third heading text.', 'dnxte-divi-essential'),
				'toggle_slug'    => 'background_three',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#772ADB',
				'depends_show_if'=> 'on',
            ),
            'bg_three_gradient_type'		=> array(
                'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type'            => 'select',
				'description'     => esc_html__('Choose a gradient type for the third heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'background_three',
				'sub_toggle'	  => 'sub_toggle_gradient',
                'options'         => array(
                    'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
                    'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
                ),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'bg_three_gradient_type_linear_direction'   => array(
                'label'           => esc_html__('Gradient direction', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the direction of the gradient for the third heading text.', 'dnxte-divi-essential'),
                'option_category'=> 'basic_option',
				'toggle_slug'    => 'background_three',
				'sub_toggle'	 => 'sub_toggle_gradient',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 360,
                ),
                'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'show_if' => array(
					'bg_three_gradient_show_hide' => 'on',
					'bg_three_gradient_type' => 'linear-gradient'
				),
			),
			'bg_three_gradient_type_radial_direction'   => array(
                'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type'            	=> 'select',
				'description'     	=> esc_html__('Adjust the direction of the gradient for the third heading text.', 'dnxte-divi-essential'),
                'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'background_three',
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
					'bg_three_gradient_show_hide'  => 'on',
					'bg_three_gradient_type'	    => 'radial-gradient'
                ),
			),
			'bg_three_gradient_start_position'          => array(
                'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the beginning of the gradient color for the third heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'background_three',
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
			'bg_three_gradient_end_position'            => array(
                'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the ending of the gradient color for the third heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
				'toggle_slug'     => 'background_three',
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
            'text_three_padding'                        => array(
                'label'           => esc_html__('Text Three Padding', 'dnxte-divi-essential'),
                'type'            => 'custom_padding',
                'description'     => esc_html__('Text Three Padding here.', 'dnxte-divi-essential'),
                'mobile_options'  => true,
                'option_category' => 'layout',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'custom_spacing',
                'sub_toggle'      => 'spacing_text_3',
            ),
            /**
             * Gradient Text Color Fields 1 Start
             *
             */
            // Gradient Color Switch 1
            'gradient_color_text_one'                   => array(
                'label'           => esc_html__('Gradient Color Text One', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'options'         => array(
                    'off' => esc_html__('Off', 'dnxte-divi-essential'),
                    'on'  => esc_html__('On', 'dnxte-divi-essential'),
                ),
                'default'         => 'off',
                'description'     => esc_html__('Select if you would like to use gradient text color.', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_one',
            ),
            // Gradient Color 1 Select 1
            'gradient_color_one_select_text_one'        => array(
                'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     => esc_html__('Choose the first color to blend with the second color from the color picker that suits your first heading text.', 'dnxte-divi-essential'),
                'default'        => '#2b87da',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'gradient_text',
                'sub_toggle'     => 'sub_toogle_gradient_color_text_one',
                'show_if'        => array(
                    'gradient_color_text_one' => 'on',
                ),
            ),
            // Gradient Color 2 Select 1
            'gradient_color_two_select_text_one'        => array(
                'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     => esc_html__('Choose the second color to blend with the first color from the color picker that suits your first heading text.', 'dnxte-divi-essential'),
                'default'        => '#29c4a9',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'gradient_text',
                'sub_toggle'     => 'sub_toogle_gradient_color_text_one',
                'show_if'        => array(
                    'gradient_color_text_one' => 'on',
                ),
            ),
            // Gradient type 1
            'gradient_type_text_one'                    => array(
                'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type'            => 'select',
                'options'         => array(
                    'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
                    'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
                ),
                'default'         => 'linear-gradient',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Choose a gradient type for the first heading text.', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_one',
                'show_if'         => array(
                    'gradient_color_text_one' => 'on',
                ),
            ),
            // Gradient Linear Type Direction 1
            'gradient_type_linear_direction_text_one'   => array(
                'label'           => esc_html__('Linear direction', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the direction of the gradient for the first heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 360,
                ),
                'default'         => '180deg',
                'fixed_unit'      => 'deg',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_one',
                'show_if'         => array(
                    'gradient_color_text_one' => 'on',
                    'gradient_type_text_one'  => 'linear-gradient',
                ),
            ),
            // Gradient Radial Type Selection 1
            'gradient_type_radial_direction_text_one'   => array(
                'label'           => esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type'            => 'select',
                'options'         => array(
                    'circle at center'       => esc_html__('Center', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__('Top Left', 'dnxte-divi-essential'),
                    'circle at top'          => esc_html__('Top', 'dnxte-divi-essential'),
                    'circle at top right'    => esc_html__('Top Right', 'dnxte-divi-essential'),
                    'circle at right'        => esc_html__('Right', 'dnxte-divi-essential'),
                    'circle at bottom right' => esc_html__('Bottom Right', 'dnxte-divi-essential'),
                    'circle at bottom'       => esc_html__('Bottom', 'dnxte-divi-essential'),
                    'circle at bottom left'  => esc_html__('Bottom Left', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__('Left', 'dnxte-divi-essential'),
                ),
                'default'         => 'circle at center',
                'option_category' => 'basic_option',
                'description'     	=> esc_html__('Adjust the direction of the gradient for the first heading text.', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_one',
                'show_if'         => array(
                    'gradient_color_text_one' => 'on',
                    'gradient_type_text_one'  => 'radial-gradient',
                ),
            ),
            // Gradient Start Position 1
            'gradient_start_postion_text_one'           => array(
                'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the beginning of the gradient color for the first heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0%',
                'fixed_unit'      => '%',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_one',
                'show_if'         => array(
                    'gradient_color_text_one' => 'on',
                ),
            ),
            // Gradient End Position 1
            'gradient_end_postion_text_one'             => array(
                'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the ending of the gradient color for the first heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '100%',
                'fixed_unit'      => '%',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_one',
                'show_if'         => array(
                    'gradient_color_text_one' => 'on',
                ),
            ),
            /**
             * Gradient Text Color Fields T1 END
             *
             */

            /**
             * Gradient Text Color Fields T2 Start
             *
             */
            // Gradient Color Switch T2
            'gradient_color_text_two'                   => array(
                'label'           => esc_html__('Gradient Color Text Two', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'options'         => array(
                    'off' => esc_html__('Off', 'dnxte-divi-essential'),
                    'on'  => esc_html__('On', 'dnxte-divi-essential'),
                ),
                'default'         => 'off',
                'description'     => esc_html__('Select if you would like to use gradient text color.', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_two',
            ),
            // Gradient Color 2 Select T2
            'gradient_color_one_select_text_two'        => array(
                'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     	=> esc_html__('Choose the first color to blend with the second color from the color picker that suits your second heading text.', 'dnxte-divi-essential'),
                'default'        => '#2b87da',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'gradient_text',
                'sub_toggle'     => 'sub_toogle_gradient_color_text_two',
                'show_if'        => array(
                    'gradient_color_text_two' => 'on',
                ),
            ),
            // Gradient Color 2 Select T2
            'gradient_color_two_select_text_two'        => array(
                'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     	=> esc_html__('Choose the second color to blend with the first color from the color picker that suits your second heading text.', 'dnxte-divi-essential'),
                'default'        => '#29c4a9',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'gradient_text',
                'sub_toggle'     => 'sub_toogle_gradient_color_text_two',
                'show_if'        => array(
                    'gradient_color_text_two' => 'on',
                ),
            ),
            // Gradient type T2
            'gradient_type_text_two'                    => array(
                'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type'            => 'select',
                'options'         => array(
                    'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
                    'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
                ),
                'default'         => 'linear-gradient',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Choose a gradient type for the second heading text.', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_two',
                'show_if'         => array(
                    'gradient_color_text_two' => 'on',
                ),
            ),
            // Gradient Linear Type Direction T2
            'gradient_type_linear_direction_text_two'   => array(
                'label'           => esc_html__('Linear direction', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the direction of the gradient for the second heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 360,
                ),
                'default'         => '180deg',
                'fixed_unit'      => 'deg',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_two',
                'show_if'         => array(
                    'gradient_color_text_two' => 'on',
                    'gradient_type_text_two'  => 'linear-gradient',
                ),
            ),
            // Gradient Radial Type Selection T2
            'gradient_type_radial_direction_text_two'   => array(
                'label'           => esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type'            => 'select',
                'description'     	=> esc_html__('Adjust the direction of the gradient for the second heading text.', 'dnxte-divi-essential'),
                'options'         => array(
                    'circle at center'       => esc_html__('Center', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__('Top Left', 'dnxte-divi-essential'),
                    'circle at top'          => esc_html__('Top', 'dnxte-divi-essential'),
                    'circle at top right'    => esc_html__('Top Right', 'dnxte-divi-essential'),
                    'circle at right'        => esc_html__('Right', 'dnxte-divi-essential'),
                    'circle at bottom right' => esc_html__('Bottom Right', 'dnxte-divi-essential'),
                    'circle at bottom'       => esc_html__('Bottom', 'dnxte-divi-essential'),
                    'circle at bottom left'  => esc_html__('Bottom Left', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__('Left', 'dnxte-divi-essential'),
                ),
                'default'         => 'circle at center',
                'option_category' => 'basic_option',
                //'description'     => esc_html__('Select the types of gradient', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_two',
                'show_if'         => array(
                    'gradient_color_text_two' => 'on',
                    'gradient_type_text_two'  => 'radial-gradient',
                ),
            ),
            // Gradient Start Position T2
            'gradient_start_postion_text_two'           => array(
                'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the beginning of the gradient color for the second heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0%',
                'fixed_unit'      => '%',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_two',
                'show_if'         => array(
                    'gradient_color_text_two' => 'on',
                ),
            ),
            // Gradient End Position T2
            'gradient_end_postion_text_two'             => array(
                'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the ending of the gradient color for the second heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '100%',
                'fixed_unit'      => '%',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_two',
                'show_if'         => array(
                    'gradient_color_text_two' => 'on',
                ),
            ),

            /**
             * Gradient Text Color Fields T2 END
             *
             */

            /**
             * Gradient Text Color Fields T3 Start
             *
             */
            // Gradient Color Switch T3
            'gradient_color_text_three'                 => array(
                'label'           => esc_html__('Linear Color Text Three', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'options'         => array(
                    'off' => esc_html__('Off', 'dnxte-divi-essential'),
                    'on'  => esc_html__('On', 'dnxte-divi-essential'),
                ),
                'default'         => 'off',
                'description'     => esc_html__('Select if you would like to use gradient text color.', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_three',
            ),
            // Gradient Color 1 Select T3
            'gradient_color_one_select_text_three'      => array(
                'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     	=> esc_html__('Choose the first color to blend with the second color from the color picker that suits your third heading text.', 'dnxte-divi-essential'),
                'default'        => '#2b87da',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'gradient_text',
                'sub_toggle'     => 'sub_toogle_gradient_color_text_three',
                'show_if'        => array(
                    'gradient_color_text_three' => 'on',
                ),
            ),
            // Gradient Color 2 Select T3
            'gradient_color_two_select_text_three'      => array(
                'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     	=> esc_html__('Choose the second color to blend with the first color from the color picker that suits your third heading text.', 'dnxte-divi-essential'),
                'default'        => '#29c4a9',
                'mobile_options' => true,
                'tab_slug'       => 'advanced',
                'toggle_slug'    => 'gradient_text',
                'sub_toggle'     => 'sub_toogle_gradient_color_text_three',
                'show_if'        => array(
                    'gradient_color_text_three' => 'on',
                ),
            ),
            // Gradient type T3
            'gradient_type_text_three'                  => array(
                'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type'            => 'select',
                'description'     => esc_html__('Choose a gradient type for the third heading text.', 'dnxte-divi-essential'),
                'options'         => array(
                    'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
                    'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
                ),
                'default'         => 'linear-gradient',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Select the types of gradient', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_three',
                'show_if'         => array(
                    'gradient_color_text_three' => 'on',
                ),
            ),
            // Gradient Linear Type Direction T3
            'gradient_type_linear_direction_text_three' => array(
                'label'           => esc_html__('Linear direction', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the direction of the gradient for the third heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 360,
                ),
                'default'         => '180deg',
                'fixed_unit'      => 'deg',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_three',
                'show_if'         => array(
                    'gradient_color_text_three' => 'on',
                    'gradient_type_text_three'  => 'linear-gradient',
                ),
            ),
            // Gradient Radial Type Selection T3
            'gradient_type_radial_direction_text_three' => array(
                'label'           => esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type'            => 'select',
                'description'     	=> esc_html__('Adjust the direction of the gradient for the third heading text.', 'dnxte-divi-essential'),
                'options'         => array(
                    'circle at center'       => esc_html__('Center', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__('Top Left', 'dnxte-divi-essential'),
                    'circle at top'          => esc_html__('Top', 'dnxte-divi-essential'),
                    'circle at top right'    => esc_html__('Top Right', 'dnxte-divi-essential'),
                    'circle at right'        => esc_html__('Right', 'dnxte-divi-essential'),
                    'circle at bottom right' => esc_html__('Bottom Right', 'dnxte-divi-essential'),
                    'circle at bottom'       => esc_html__('Bottom', 'dnxte-divi-essential'),
                    'circle at bottom left'  => esc_html__('Bottom Left', 'dnxte-divi-essential'),
                    'circle at left'         => esc_html__('Left', 'dnxte-divi-essential'),
                ),
                'default'         => 'circle at center',
                'option_category' => 'basic_option',
                //'description'     => esc_html__('Select the types of gradient', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_three',
                'show_if'         => array(
                    'gradient_color_text_three' => 'on',
                    'gradient_type_text_three'  => 'radial-gradient',
                ),
            ),
            // Gradient Start Position T3
            'gradient_start_postion_text_three'         => array(
                'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the beginning of the gradient color for the third heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0%',
                'fixed_unit'      => '%',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_three',
                'show_if'         => array(
                    'gradient_color_text_three' => 'on',
                ),
            ),
            // Gradient End Position T3
            'gradient_end_postion_text_three'           => array(
                'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
                'type'            => 'range',
                'description'     	=> esc_html__('Adjust the position for the ending of the gradient color for the third heading text.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '100%',
                'fixed_unit'      => '%',
                'validate_unit'   => true,
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'gradient_text',
                'sub_toggle'      => 'sub_toogle_gradient_color_text_three',
                'show_if'         => array(
                    'gradient_color_text_three' => 'on',
                ),
            ),
            // Text One Reveal Effect Switch
            'text_one_reveal_effect'  => array(
                'label'           => esc_html__('Enable Reveal Effect', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Select to turn Reveal Effect on.', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'reveal_text',
                'sub_toggle'      => 'sub_toggle_reveal_text_one',
                'options'         => array(
                        'off'     => esc_html__('Off', 'dnxte-divi-essential'),
                        'on'      => esc_html__('On', 'dnxte-divi-essential'),
                ),
                'default'         => 'off',
            ),
            // Text One Reveal Color Before
            'text_one_reveal_color_before'        => array(
                'label'          => esc_html__('Reveal Effect Color', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     => esc_html__('Choose a color from the color picker with which you can reveal your first heading text.', 'dnxte-divi-essential'),
                'tab_slug'       => 'advanced',
                'toggle_slug'     => 'reveal_text',
                'sub_toggle'      => 'sub_toggle_reveal_text_one',
                'default'        => '#FFFFFF',
                'show_if'        => array(
                    'text_one_reveal_effect' => 'on',
                ),
            ),
            // Text Two Reveal Effect Switch
            'text_two_reveal_effect'  => array(
                'label'           => esc_html__('Enable Reveal Effect', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Select to turn Reveal Effect on.', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'reveal_text',
                'sub_toggle'      => 'sub_toggle_reveal_text_two',
                'options'         => array(
                        'off'     => esc_html__('Off', 'dnxte-divi-essential'),
                        'on'      => esc_html__('On', 'dnxte-divi-essential'),
                ),
                'default'         => 'off',
            ),
            // Text Two Reveal Color Before
            'text_two_reveal_color_before'        => array(
                'label'          => esc_html__('Reveal Effect Color', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     => esc_html__('Choose a color from the color picker with which you can reveal your second heading text.', 'dnxte-divi-essential'),
                'tab_slug'       => 'advanced',
                'toggle_slug'     => 'reveal_text',
                'sub_toggle'      => 'sub_toggle_reveal_text_two',
                'default'        => '#FFFFFF',
                'show_if'        => array(
                    'text_two_reveal_effect' => 'on',
                ),
            ),
            // Text Three Reveal Effect Switch
            'text_three_reveal_effect'  => array(
                'label'           => esc_html__('Enable Reveal Effect', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'description'     => esc_html__('Select to turn Reveal Effect on.', 'dnxte-divi-essential'),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'reveal_text',
                'sub_toggle'      => 'sub_toggle_reveal_text_three',
                'options'         => array(
                        'off'     => esc_html__('Off', 'dnxte-divi-essential'),
                        'on'      => esc_html__('On', 'dnxte-divi-essential'),
                ),
                'default'         => 'off',
            ),
            // Text Three Reveal Color Before
            'text_three_reveal_color_before'        => array(
                'label'          => esc_html__('Reveal Effect Color', 'dnxte-divi-essential'),
                'type'           => 'color-alpha',
                'description'     => esc_html__('Choose a color from the color picker with which you can reveal your third heading text.', 'dnxte-divi-essential'),
                'tab_slug'       => 'advanced',
                'toggle_slug'     => 'reveal_text',
                'sub_toggle'      => 'sub_toggle_reveal_text_three',
                'default'        => '#FFFFFF',
                'show_if'        => array(
                    'text_three_reveal_effect' => 'on',
                ),
            ),
            // Text Hover Switch
			'dnxt_text_hover_effect_switch' => array(
				'label'           => esc_html__('Text Hover Effect', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',
				'description'     => esc_html__('Select if you would like to use text hover effect', 'dnxte-divi-essential'),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxt_text_hover_effect',
				'options'         => array(
						'off'     => esc_html__('Off', 'dnxte-divi-essential'),
						'on'      => esc_html__('On', 'dnxte-divi-essential'),
				),
				'default'         => 'off',

            ),
            // Select Hover Effect
            'dnxt_text_hover_effect_select'     => array(
                'label'             => esc_html__( 'Select Hover Effect', 'dnxte-divi-essential' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'dnxt_text_hover_effect',
                'default'           => 'dnxt-hover-grow',
                'description'       => esc_html__( 'Here you can adjust the hover effect.' ),
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
                'mobile_options'      => true,
                'show_if'             => array(
                    'dnxt_text_hover_effect_switch' => 'on',
                )
            ),
        );
	}

	// Get Advanced Fields
	public function get_advanced_fields_config() {
		$advanced_fields = array();
		$advanced_fields['text'] = false;
		// Background Advanced fields
		$advanced_fields['background'] = array(
            'settings' => array(
                'color'=> 'alpha',
            ),			
            // 'css'           => array(
			// 	'main'      => "%%order_class%% .header-level",
			// 	'important' => true,
			// ),
		);
		// Border Advanced Fields
		$advanced_fields['borders'] = array(
			//Border One
			'border_one'   => array(
				'css'      => array(
					'main' => array(
						'border_radii'  => "%%order_class%% .dnxt-text-one",
						'border_styles' => "%%order_class%% .dnxt-text-one",
					),
				),
				'label_prefix' => esc_html__("Border One", 'dnxte-divi-essential'),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'toogle_border_one',
			),
			//Border Two
			'border_two'   => array(
				'css'      => array(
					'main' => array(
						'border_radii'  => "%%order_class%% .dnxt-text-two",
						'border_styles' => "%%order_class%% .dnxt-text-two",
					),
				),
				'label_prefix' => esc_html__("Border Two", 'dnxte-divi-essential'),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'toogle_border_two',
			),
			//Border Three
			'border_three' => array(
				'css'      => array(
					'main' => array(
						'border_radii'  => "%%order_class%% .dnxt-text-three",
						'border_styles' => "%%order_class%% .dnxt-text-three",
					),
				),
				'label_prefix' => esc_html__("Border Three", 'dnxte-divi-essential'),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'toogle_border_three',
			),
		);
		// Fonts Advanced Fields
		$advanced_fields['fonts'] = array(
			//Text One
			'text_one'   => array(
				'label'       => esc_html__('Text One', 'dnxte-divi-essential'),
				'toggle_slug' => 'heading_fonts',
				'tab_slug'    => 'advanced',
				'sub_toggle'  => 'sub_toogle_text_one',
				'line_height' => array(
					'default' => '1em',
				),
				'font_size'   => array(
					'default' => '30px',
				),
				'css'         => array(
					'main'    => "%%order_class%% .dnxt-text-one",
				),
			),
			//Text Two
			'text_two'        => array(
				'label'       => esc_html__('Text Two', 'dnxte-divi-essential'),
				'toggle_slug' => 'heading_fonts',
				'tab_slug'    => 'advanced',
				'sub_toggle'  => 'sub_toogle_text_two',
				'line_height' => array(
					'default' => '1em',
				),
				'font_size'   => array(
					'default' => '30px',
				),
				'css'         => array(
					'main'    => "%%order_class%% .dnxt-text-two",
				),
			),
			//Text Three
			'text_three'      => array(
				'label'       => esc_html__('Text Three', 'dnxte-divi-essential'),
				'toggle_slug' => 'heading_fonts',
				'tab_slug'    => 'advanced',
				'sub_toggle'  => 'sub_toogle_text_three',
				'line_height' => array(
					'default' => '1em',
				),
				'font_size'   => array(
					'default' => '30px',
				),
				'css'         => array(
					'main'    => "%%order_class%% .dnxt-text-three",
				),
			),
		);
		// Spacing Advanced Fields
		$advanced_fields['margin_padding'] = array(
			'css' => array(
				'main' => "%%order_class%% .header-level",
				'important' => 'all',
			),
		);
		return $advanced_fields;
	}

    public function render($attrs, $content, $render_slug ){
        wp_enqueue_style( 'dnext_multi_heading' );
        wp_enqueue_script( 'dnext_wow-public' );
        wp_enqueue_script( 'dnext_wow-activation' );
        wp_enqueue_style('dnext_hvr_common_css');
        wp_enqueue_style( 'dnext_reveal_animation' );

        $this->apply_css($render_slug);
        $hover_effect_enable = '';
        if ('on' === $this->props['dnxt_text_hover_effect_switch']) {
            $hover_effect_enable = $this->props['dnxt_text_hover_effect_select'];
        } else {
            $hover_effect_enable = "";
        }

        $headingTagOpen  = '<' . esc_attr($this->props['heading_tag']) . " class='header-level " . $hover_effect_enable . "'" . '>';

        $headingTagClose = '</' . esc_attr($this->props['heading_tag']) . '>';
		if ('on' === $this->props['text_one_reveal_effect']) {
            $text_one_reveal_enable = "reveal-effect masker wow";
        } else {
            $text_one_reveal_enable = "";
        }

        // render the first text
        $render_text_one = '';
        if ('' !== $this->props['text_one'] || 'on' === $this->props['gradient_color_text_one']) {
            $render_text_one = sprintf(
                '<span class="dnxt-text-one %2$s"><span class="dnxt-gradient-text-color-1">%1$s</span></span>',
                esc_html($this->props['text_one']),
                esc_attr($text_one_reveal_enable)
            );
        } elseif ('' !== esc_html($this->props['text_one'])) {
            $render_text_one = sprintf(
                '<span class="dnxt-text-one">%1$s</span>',
                esc_html($this->props['text_one'])
            );
        }
		if ('on' === $this->props['text_two_reveal_effect']){
            $text_two_reveal_enable = "reveal-effect masker wow";
        } else {
            $text_two_reveal_enable = "";
        }
        // render the second text
        $render_text_two = '';
        if ('' !== $this->props['text_two'] || 'on' === $this->props['gradient_color_text_two']) {
            $render_text_two = sprintf(
                '<span class="dnxt-text-two %2$s"><span class="dnxt-gradient-text-color-2">%1$s</span></span>',
                esc_html($this->props['text_two']),
                esc_attr($text_two_reveal_enable)
            );
        } elseif ('' !== $this->props['text_two']){
            $render_text_two = sprintf(
                '<span class="dnxt-text-two">%1$s</span>',
                esc_html($this->props['text_two'])
            );
        }
		if ('on' === $this->props['text_three_reveal_effect']) {
            $text_three_reveal_enable = "reveal-effect masker wow";
        } else {
            $text_three_reveal_enable = "";
        }

        // render the third text
        $render_text_three = '';
        if ('' !== $this->props['text_three']  || 'on' === $this->props['gradient_color_text_three']) {
            $render_text_three = sprintf(
                '<span class="dnxt-text-three %2$s"><span class="dnxt-gradient-text-color-3">%1$s</span></span>',
                esc_html($this->props['text_three']),
                esc_attr($text_three_reveal_enable)
            );
        } elseif ('' !== $this->props['text_three']) {
            $render_text_three = sprintf(
                '<span class="dnxt-text-three">%1$s</span>',
                esc_html($this->props['text_three'])
            );
        }

        return sprintf('<div class="wrapper">%1$s%2$s%3$s%4$s%5$s</div>',
            $headingTagOpen,
            $render_text_one,
            $render_text_two,
            $render_text_three,
            $headingTagClose
        );
	}

	/**
	 * Additional CSS Styles
	 *
	 */

    public function apply_css($render_slug) {
        /**
         * Spacing between headings CSS
         *
         */
        if( 'on' !== esc_attr($this->props['spacing_between_heading']) ){
            $spacing_between_heading        = esc_attr($this->props['spacing_between_heading']);
            $spacing_between_heading_active = isset($this->props['spacing_between_heading_last_edited']) && et_pb_get_responsive_status(esc_attr($this->props['spacing_between_heading_last_edited']));
            $spacing_between_heading_values = array(
                'desktop' => $spacing_between_heading,
                'tablet'  => $spacing_between_heading_active && esc_attr($this->props['spacing_between_heading_tablet']) ? esc_attr($this->props['spacing_between_heading_tablet'])  : $spacing_between_heading,
                'phone'   => $spacing_between_heading_active && esc_attr($this->props['spacing_between_heading_phone']) ? esc_attr($this->props['spacing_between_heading_phone']) : $spacing_between_heading,
            );

            et_pb_responsive_options()->generate_responsive_css($spacing_between_heading_values, '%%order_class%% .dnxt-text-one', 'padding-right', $render_slug);

            et_pb_responsive_options()->generate_responsive_css($spacing_between_heading_values, '%%order_class%% .dnxt-text-two', 'padding-right', $render_slug);

        }

        /**
         * Custom Padding Margin Output
         *
         */

        Common::dnxt_set_style($render_slug, $this->props, "text_one_margin", "%%order_class%% .dnxt-text-one", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "text_one_padding", "%%order_class%% .dnxt-text-one", "padding");

        Common::dnxt_set_style($render_slug, $this->props, "text_two_margin", "%%order_class%% .dnxt-text-two", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "text_two_padding", "%%order_class%% .dnxt-text-two", "padding");

        Common::dnxt_set_style($render_slug, $this->props, "text_three_margin", "%%order_class%% .dnxt-text-three", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "text_three_padding", "%%order_class%% .dnxt-text-three", "padding");


        //Text Reveal Effect CSS Start
        $text_one_reveal_effect        = '';
        $text_one_reveal_color_before  = '';

        // Reveal Effect for color before
        if ('' !== $this->props['text_one_reveal_color_before']) {
            $text_one_reveal_color_before = $this->props['text_one_reveal_color_before'];
        }

        // Text Reveal Effect setting up
        if ('off' !== $this->props['text_one_reveal_effect']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'      => "%%order_class%% .dnxt-text-one.reveal-effect.masker:after",
                'declaration'   =>	sprintf('background: %1$s;',esc_attr($this->props['text_one_reveal_color_before']))
            ));
        }
        //Text Reveal Effect CSS Start
        $text_two_reveal_effect        = '';
        $text_two_reveal_color_before  = '';

        // Reveal Effect for color before
        if ('' !== $this->props['text_two_reveal_color_before']) {
            $text_two_reveal_color_before = $this->props['text_two_reveal_color_before'];
        }

        // Text Reveal Effect setting up
        if ('off' !== $this->props['text_two_reveal_effect']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two.reveal-effect.masker:after",
                'declaration' => sprintf('background: %1$s;',esc_attr($this->props['text_two_reveal_color_before'])),
            ));
        }
        //Text Reveal Effect CSS Start
        $text_three_reveal_effect        = '';
        $text_three_reveal_color_before  = '';

        // Reveal Effect for color before
        if ('' !== $this->props['text_three_reveal_color_before']) {
            $text_three_reveal_color_before = $this->props['text_three_reveal_color_before'];
        }

        // Text Reveal Effect setting up
        if ('off' !== esc_attr($this->props['text_three_reveal_effect'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three.reveal-effect.masker:after",
                'declaration'	=>	sprintf('background: %1$s;',esc_attr($this->props['text_three_reveal_color_before']))
            ));
        }
        /**
         * Dispaly Inline or Stacked
         *
         */
        if (('on' === esc_attr($this->props['display_type_select']))) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one,%%order_class%% .dnxt-text-two,%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('display: %1$s;',esc_attr('block;')),
            ));
        }

        if (('center' === esc_attr($this->props['text_one_text_align']))) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('max-width: %1$s; margin: %2$s;',esc_attr('max-content'),esc_attr('0 auto'))
            ));
        }else if (('right' === esc_attr($this->props['text_one_text_align']))) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('max-width: %1$s; margin-left: %2$s;',esc_attr('max-content'),esc_attr('auto')),
            ));
        }else{
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('max-width: %1$s; margin-right: %2$s;',esc_attr('max-content'),esc_attr('auto')),
            ));
        }
        if (('center' === esc_attr($this->props['text_two_text_align']))) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('max-width: %1$s; margin: %2$s;',esc_attr('max-content'),esc_attr('0 auto')),
            ));
        }else if (('right' === esc_attr($this->props['text_two_text_align']))) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('max-width: %1$s; margin-left: %2$s;',esc_attr('max-content'),esc_attr('auto')),
            ));
        }else{
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('max-width: %1$s; margin-right: %2$s;',esc_attr('max-content'),esc_attr('auto')),
            ));
        }
        if (('center' === esc_attr($this->props['text_three_text_align']))) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('max-width: %1$s; margin: %2$s;',esc_attr('max-content'),esc_attr('0 auto')),
            ));
        }else if (('right' === esc_attr($this->props['text_three_text_align']))) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('max-width: %1$s; margin-left: %2$s;',esc_attr('max-content'),esc_attr('auto')),
            ));
        }else{
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('max-width: %1$s; margin-right: %2$s;',esc_attr('max-content'),esc_attr('auto')),
            ));
        }

        if (('center' === $this->props['inline_multi_align'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .wrapper",
                'declaration' => sprintf('text-align: %1$s;',esc_attr('center')),
            ));
        }else if (('right' === $this->props['inline_multi_align'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .wrapper",
                'declaration' => sprintf('text-align: %1$s;',esc_attr('right')),
            ));
        }else if(('left' === $this->props['inline_multi_align']) || ('justify' === $this->props['inline_multi_align'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .wrapper",
                'declaration' => sprintf('text-align: %1$s;',esc_attr('left')),
            ));
        }
        $this->props['inline_multi_align_last_edited']  = "";
        if ( 'on|tablet' === $this->props['inline_multi_align_last_edited']){
            if (('center' === $this->props['inline_multi_align_tablet'])){
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .wrapper",
                    'declaration' => sprintf('text-align: %1$s;',esc_attr('center !important')),
                    'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
                ));
            }else if (('right' === $this->props['inline_multi_align_tablet'])){
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .wrapper",
                    'declaration' => sprintf('text-align: %1$s;',esc_attr('right !important')),
                    'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
                ));
            }else if (('left' === $this->props['inline_multi_align_tablet']) || ('justify' === $this->props['inline_multi_align_tablet'])) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .wrapper",
                    'declaration' => sprintf('text-align: %1$s;',esc_attr('left !important')),
                    'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
                ));
            }
		}
        if ( 'on|phone' === $this->props['inline_multi_align_last_edited']){
            if (('center' === $this->props['inline_multi_align_phone'])){
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .wrapper",
                    'declaration' => sprintf('text-align: %1$s;',esc_attr('center !important')),
                    'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
                ));
            }else if (('right' === $this->props['inline_multi_align_phone'])){
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .wrapper",
                    'declaration' => sprintf('text-align: %1$s;',esc_attr('right !important')),
                    'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
                ));
            }else if (('left' === $this->props['inline_multi_align_phone']) || ('justify' === $this->props['inline_multi_align_phone'])){
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .wrapper",
                    'declaration' => sprintf('text-align: %1$s;',esc_attr('left !important')),
                    'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
                ));
            }
		}

        /**
         * Background colors
         *
         */

        if ('off' !== $this->props['bg_one_background_show_hide']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('background-color: %1$s;',esc_attr($this->props['bg_one_bg_color'])),
            ));
        }
        if ('off' !== $this->props['bg_two_background_show_hide']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('background-color: %1$s;',esc_attr($this->props['bg_two_bg_color'])),
            ));
        }
        if ('off' !== $this->props['bg_three_background_show_hide']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('background-color: %1$s;',esc_attr($this->props['bg_three_bg_color'])),
            ));
        }

		// Button Background One
		$bg_one_gradient_apply          = '';
		$bg_one_gradient_color_one 		= '';
		$bg_one_gradient_color_two 		= '';
		$bg_one_gradient_type	   		= '';
		$bg_one_gl             		    = '';
		$bg_one_gr             		    = '';
		$bg_one_gradient_start_position = '';
		$bg_one_gradient_end_position   = '';

		// checking gradient type
		if ('' !== $this->props['bg_one_gradient_type']){
			$bg_one_gradient_type = $this->props['bg_one_gradient_type'];
		}

		// BG Linear Gradient Direction
		if ('' !== $this->props['bg_one_gradient_type_linear_direction']){
			$bg_one_gl = $this->props['bg_one_gradient_type_linear_direction'];
		}

		// Button Radial Gradient Direction
		if ('' !== $this->props['bg_one_gradient_type_radial_direction']){
			$bg_one_gr = $this->props['bg_one_gradient_type_radial_direction'];
		}

		// Apply gradient d)irecion
		if ('radial-gradient' === $this->props['bg_one_gradient_type']){
			$bg_one_gradient_apply = sprintf('%1$s', $bg_one_gr);
		} else if ('linear-gradient' === $this->props['bg_one_gradient_type']){
			$bg_one_gradient_apply = sprintf('%1$s', $bg_one_gl);
		}

		// Gradient color one for button
		if ('' !== $this->props['bg_one_gradient_color_one']){
			$bg_one_gradient_color_one = $this->props['bg_one_gradient_color_one'];
		}

		// Gradient color two for button
		if ('' !== $this->props['bg_one_gradient_color_two']){
			$bg_one_gradient_color_two = $this->props['bg_one_gradient_color_two'];
		}

		// Button Gradient c)olor start position
		if ('' !== $this->props['bg_one_gradient_start_position']){
			$bg_one_gradient_start_position = $this->props['bg_one_gradient_start_position'];
		}

		// Button Gradient c)olor end position
		if ('' !== $this->props['bg_one_gradient_end_position']){
			$bg_one_gradient_end_position = $this->props['bg_one_gradient_end_position'];
		}

		// Button Gradient s)etting up
        $declaration = sprintf(
            'background: %s(%s, %s %s, %s %s);',
            esc_html($bg_one_gradient_type),
            esc_html($bg_one_gradient_apply),
            esc_html($bg_one_gradient_color_one),
            esc_html($bg_one_gradient_start_position),
            esc_html($bg_one_gradient_color_two),
            esc_html($bg_one_gradient_end_position)
        );
		if ('off' !== $this->props['bg_one_gradient_show_hide']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-text-one",
				'declaration' => $declaration,
			));
        }

		// Button Background Two
		$bg_two_gradient_apply          = '';
		$bg_two_gradient_color_one 		= '';
		$bg_two_gradient_color_two 		= '';
		$bg_two_gradient_type	   		= '';
		$bg_two_gl             		    = '';
		$bg_two_gr             		    = '';
		$bg_two_gradient_start_position = '';
		$bg_two_gradient_end_position   = '';

		// checking gradient type
		if ('' !== $this->props['bg_two_gradient_type']){
			$bg_two_gradient_type = $this->props['bg_two_gradient_type'];
		}

		// BG Linear G)radient Direction
		if ('' !== $this->props['bg_two_gradient_type_linear_direction']){
			$bg_two_gl = $this->props['bg_two_gradient_type_linear_direction'];
		}

		// Button Radial Gradient Direction
		if ('' !== $this->props['bg_two_gradient_type_radial_direction']){
			$bg_two_gr = $this->props['bg_two_gradient_type_radial_direction'];
		}

		// Apply gradient direcion
		if ('radial-gradient' === $this->props['bg_two_gradient_type']){
			$bg_two_gradient_apply = sprintf('%1$s', $bg_two_gr);
		} else if ('linear-gradient' === $this->props['bg_two_gradient_type']){
			$bg_two_gradient_apply = sprintf('%1$s', $bg_two_gl);
		}

		// Gradient color one for button
		if ('' !== $this->props['bg_two_gradient_color_one']){
			$bg_two_gradient_color_one = $this->props['bg_two_gradient_color_one'];
		}

		// Gradient color two for button
		if ('' !== $this->props['bg_two_gradient_color_two']){
			$bg_two_gradient_color_two = $this->props['bg_two_gradient_color_two'];
		}

		// Button Gradient color start position
		if ('' !== $this->props['bg_two_gradient_start_position']){
			$bg_two_gradient_start_position = $this->props['bg_two_gradient_start_position'];
		}

		// Button Gradient color end position
		if ('' !== $this->props['bg_two_gradient_end_position']){
			$bg_two_gradient_end_position = $this->props['bg_two_gradient_end_position'];
		}

		// Button Gradient setting up
        $bg_two_gradient = sprintf(
            'background: %s(%s, %s %s, %s %s);',
            esc_html($bg_two_gradient_type),
            esc_html($bg_two_gradient_apply),
            esc_html($bg_two_gradient_color_one),
            esc_html($bg_two_gradient_start_position),
            esc_html($bg_two_gradient_color_two),
            esc_html($bg_two_gradient_end_position)
        );

		if ('off' !== $this->props['bg_two_gradient_show_hide']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-text-two",
				'declaration' => $bg_two_gradient,
			));
		}
		// Button Background Two
		$bg_three_gradient_apply          = '';
		$bg_three_gradient_color_one      = '';
		$bg_three_gradient_color_two      = '';
		$bg_three_gradient_type	   		  = '';
		$bg_three_gl             		  = '';
		$bg_three_gr             		  = '';
		$bg_three_gradient_start_position = '';
		$bg_three_gradient_end_position   = '';

		// checking gradient type
		if ('' !== $this->props['bg_three_gradient_type']){
			$bg_three_gradient_type = $this->props['bg_three_gradient_type'];
		}

		// BG Linear Gradient Direction
		if ('' !== $this->props['bg_three_gradient_type_linear_direction']){
			$bg_three_gl = $this->props['bg_three_gradient_type_linear_direction'];
		}

		// Button Radial Gradient Direction
		if ('' !== $this->props['bg_three_gradient_type_radial_direction']){
			$bg_three_gr = $this->props['bg_three_gradient_type_radial_direction'];
		}

		// Apply gradient direcion
		if ('radial-gradient' === $this->props['bg_three_gradient_type']){
			$bg_three_gradient_apply = sprintf('%1$s', $bg_three_gr);
		} else if ('linear-gradient' === $this->props['bg_three_gradient_type']){
			$bg_three_gradient_apply = sprintf('%1$s', $bg_three_gl);
		}

		// Gradient color one for button
		if ('' !== $this->props['bg_three_gradient_color_one']){
			$bg_three_gradient_color_one = $this->props['bg_three_gradient_color_one'];
		}

		// Gradient color two for button
		if ('' !== $this->props['bg_three_gradient_color_two']){
			$bg_three_gradient_color_two = $this->props['bg_three_gradient_color_two'];
		}

		// Button Gradient color start position
		if ('' !== $this->props['bg_three_gradient_start_position']){
			$bg_three_gradient_start_position = $this->props['bg_three_gradient_start_position'];
		}

		// Button Gradient color end position
		if ('' !== $this->props['bg_three_gradient_end_position']){
			$bg_three_gradient_end_position = $this->props['bg_three_gradient_end_position'];
		}

		// Button Gradient setting up
        $gradient_declaration = sprintf(
            'background: %s(%s, %s %s, %s %s);',
            esc_html($bg_three_gradient_type),
            esc_html($bg_three_gradient_apply),
            esc_html($bg_three_gradient_color_one),
            esc_html($bg_three_gradient_start_position),
            esc_html($bg_three_gradient_color_two),
            esc_html($bg_three_gradient_end_position)
        );

		if ('off' !== $this->props['bg_three_gradient_show_hide']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-text-three",
				'declaration' => $gradient_declaration,
			));
		}

        /**
         * Gradient Text Color CSS T1 Start
         *
         */
        $gradient_type_t1                 = '';
        $gradient_type_direction_apply_t1 = '';
        $gradient_linear_direction_t1     = '';
        $gradient_radial_diretion_t1      = '';
        $gradient_color_one_select_t1     = '';
        $gradient_color_two_select_t1     = '';
        $gradient_start_position_t1       = '';
        $gradient_end_position_t1         = '';

        // checking gradient type
        if ('' !== $this->props['gradient_type_text_one']){
            $gradient_type_t1 = $this->props['gradient_type_text_one'];
        }

        // Linear gradient direction
        if ('' !== $this->props['gradient_type_linear_direction_text_one']){
            $gradient_linear_direction_t1 = $this->props['gradient_type_linear_direction_text_one'];
        }

        // Gradient Radial Direction t1
        if ('' !== $this->props['gradient_type_radial_direction_text_one']){
            $gradient_radial_diretion_t1 = $this->props['gradient_type_radial_direction_text_one'];
        }

        // Apply gradient direcion
        if ('radial-gradient' === $this->props['gradient_type_text_one']){
            $gradient_type_direction_apply_t1 = sprintf('%1$s', $gradient_radial_diretion_t1);
        } elseif ('linear-gradient' === $this->props['gradient_type_text_one']){
            $gradient_type_direction_apply_t1 = sprintf('%1$s', $gradient_linear_direction_t1);
        }

        // Gradient color one for text one
        if ('' !== $this->props['gradient_color_one_select_text_one']){
            $gradient_color_one_select_t1 = $this->props['gradient_color_one_select_text_one'];
        }

        // Gradient color two for text one
        if ('' !== $this->props['gradient_color_two_select_text_one']){
            $gradient_color_two_select_t1 = $this->props['gradient_color_two_select_text_one'];
        }

        // Gradient color start position t1
        if ('' !== $this->props['gradient_start_postion_text_one']){
            $gradient_start_position_t1 = $this->props['gradient_start_postion_text_one'];
        }

        // Gradient color end position t1
        if ('' !== $this->props['gradient_end_postion_text_one']){
            $gradient_end_position_t1 = $this->props['gradient_end_postion_text_one'];
        }

        // Gradient setting up
        $gradient_t1 = sprintf(
            'background: %s(%s, %s %s, %s %s);',
            esc_html($gradient_type_t1),
            esc_html($gradient_type_direction_apply_t1),
            esc_html($gradient_color_one_select_t1),
            esc_html($gradient_start_position_t1),
            esc_html($gradient_color_two_select_t1),
            esc_html($gradient_end_position_t1)
        );
        if ('on' === $this->props['gradient_color_text_one']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one .dnxt-gradient-text-color-1",
                'declaration' => sprintf('%1$s;-webkit-background-clip: %2$s;-webkit-text-fill-color: %3$s;',$gradient_t1,esc_attr('text'),esc_attr('transparent')),
            ));
        }

        /**
         * Gradient Text Color CSS T1 END
         *
         */

        /**
         * Gradient Text Color CSS T2 Start
         *
         */
        $gradient_type_t2                 = '';
        $gradient_type_direction_apply_t2 = '';
        $gradient_linear_direction_t2     = '';
        $gradient_radial_diretion_t2      = '';
        $gradient_color_one_select_t2     = '';
        $gradient_color_two_select_t2     = '';
        $gradient_start_position_t2       = '';
        $gradient_end_position_t2         = '';

        // checking gradient type t2
        if ('' !== $this->props['gradient_type_text_two']) {
            $gradient_type_t2 = $this->props['gradient_type_text_two'];
        }

        // Linear gradient direction t2
        if ('' !== $this->props['gradient_type_linear_direction_text_two']){
            $gradient_linear_direction_t2 = $this->props['gradient_type_linear_direction_text_two'];
        }

        // Gradient Radial Direction t2
        if ('' !== $this->props['gradient_type_radial_direction_text_two']) {
            $gradient_radial_diretion_t2 = $this->props['gradient_type_radial_direction_text_two'];
        }

        // Apply gradient direcion t2
        if ('radial-gradient' === $this->props['gradient_type_text_two']){
            $gradient_type_direction_apply_t2 = sprintf('%1$s', $gradient_radial_diretion_t2);
        } elseif ('linear-gradient' === $this->props['gradient_type_text_two']){
            $gradient_type_direction_apply_t2 = sprintf('%1$s', $gradient_linear_direction_t2);
        }

        // Gradient color one for t2
        if ('' !== $this->props['gradient_color_one_select_text_two']){
            $gradient_color_one_select_t2 = $this->props['gradient_color_one_select_text_two'];
        }

        // Gradient color two for t2
        if ('' !== $this->props['gradient_color_two_select_text_two']){
            $gradient_color_two_select_t2 = $this->props['gradient_color_two_select_text_two'];
        }

        // Gradient color start position t2
        if ('' !== $this->props['gradient_start_postion_text_two']){
            $gradient_start_position_t2 = $this->props['gradient_start_postion_text_two'];
        }

        // Gradient color end position t2
        if ('' !== $this->props['gradient_end_postion_text_two']){
            $gradient_end_position_t2 = $this->props['gradient_end_postion_text_two'];
        }

        // Gradient setting up t2
        $gradient_declaration = sprintf(
            'background: %s(%s, %s %s, %s %s);',
            esc_html($gradient_type_t2),
            esc_html($gradient_type_direction_apply_t2),
            esc_html($gradient_color_one_select_t2),
            esc_html($gradient_start_position_t2),
            esc_html($gradient_color_two_select_t2),
            esc_html($gradient_end_position_t2)
        );
        if ('on' === $this->props['gradient_color_text_two']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two .dnxt-gradient-text-color-2",
                'declaration' => sprintf('%1$s;-webkit-background-clip: %2$s;-webkit-text-fill-color: %3$s;',$gradient_declaration,esc_attr('text'),esc_attr('transparent')),
            ));
        }

        /**
         * Gradient Text Color CSS T2 END
         *
         */

        /**
         * Gradient Text Color CSS T3 Start
         *
         */
        $gradient_type_t3                 = '';
        $gradient_type_direction_apply_t3 = '';
        $gradient_linear_direction_t3     = '';
        $gradient_radial_diretion_t3      = '';
        $gradient_color_one_select_t3     = '';
        $gradient_color_two_select_t3     = '';
        $gradient_start_position_t3       = '';
        $gradient_end_position_t3         = '';

        // checking gradient type T3
        if ('' !== $this->props['gradient_type_text_three']){
            $gradient_type_t3 = $this->props['gradient_type_text_three'];
        }

        // Linear gradient direction T3
        if ('' !== $this->props['gradient_type_linear_direction_text_three']){
            $gradient_linear_direction_t3 = $this->props['gradient_type_linear_direction_text_three'];
        }

        // Gradient Radial Direction T3
        if ('' !== $this->props['gradient_type_radial_direction_text_three']){
            $gradient_radial_diretion_t3 = $this->props['gradient_type_radial_direction_text_three'];
        }

        // Apply gradient direcion T3
        if ('radial-gradient' === $this->props['gradient_type_text_three']){
            $gradient_type_direction_apply_t3 = sprintf('%1$s', $gradient_radial_diretion_t3);
        } elseif ('linear-gradient' === $this->props['gradient_type_text_three']){
            $gradient_type_direction_apply_t3 = sprintf('%1$s', $gradient_linear_direction_t3);
        }

        // Gradient color one for T3
        if ('' !== $this->props['gradient_color_one_select_text_three']){
            $gradient_color_one_select_t3 = $this->props['gradient_color_one_select_text_three'];
        }

        // Gradient color two for T3
        if ('' !== $this->props['gradient_color_two_select_text_three']){
            $gradient_color_two_select_t3 = $this->props['gradient_color_two_select_text_three'];
        }

        // Gradient color start position T3
        if ('' !== $this->props['gradient_start_postion_text_three']){
            $gradient_start_position_t3 = $this->props['gradient_start_postion_text_three'];
        }

        // Gradient color end position T3
        if ('' !== $this->props['gradient_end_postion_text_three']){
            $gradient_end_position_t3 = $this->props['gradient_end_postion_text_three'];
        }

        // Gradient setting up T3
        $gradient_declaration = sprintf(
            'background: %s(%s, %s %s, %s %s);',
            esc_html($gradient_type_t3),
            esc_html($gradient_type_direction_apply_t3),
            esc_html($gradient_color_one_select_t3),
            esc_html($gradient_start_position_t3),
            esc_html($gradient_color_two_select_t3),
            esc_html($gradient_end_position_t3)
        );
        if ('on' === $this->props['gradient_color_text_three']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three .dnxt-gradient-text-color-3",
                'declaration' => sprintf('%1$s;-webkit-background-clip: %2$s;-webkit-text-fill-color: %3$s;',$gradient_declaration,esc_attr('text'),esc_attr('transparent')),
            ));
        }

        /**
         * Gradient Text Color CSS T3 END
         *
         */

        /**
         * Border one default color
         *
         */
        if (('' === $this->props['border_color_top_border_one']) &&
        ('' === $this->props['border_color_all_border_one'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('border-top-color: %1$s;',esc_attr('#333333')),
            ));
        }

        if (('' === $this->props['border_color_bottom_border_one']) &&
        ('' === $this->props['border_color_all_border_one'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('border-bottom-color: %1$s;',esc_attr('#333333')),
            ));
        }

        if (('' === $this->props['border_color_left_border_one']) &&
        ('' === $this->props['border_color_all_border_one'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('border-left-color: %1$s;',esc_attr('#333333')),
            ));
        }

        if (('' === $this->props['border_color_right_border_one']) &&
        ('' === $this->props['border_color_all_border_one'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('border-right-color: %1$s;',esc_attr('#333333')),
            ));
        }

        //  Border one default style
        if (('' === $this->props['border_style_top_border_one']) &&
        ('' === $this->props['border_style_all_border_one'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('border-top-style: %1$s;',esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_bottom_border_one']) &&
        ('' ===$this->props['border_style_all_border_one'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('border-bottom-style: %1$s;',esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_left_border_one']) &&
        ('' === $this->props['border_style_all_border_one'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('border-left-style: %1$s;',esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_right_border_one']) &&
        ('' === $this->props['border_style_all_border_one'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-one",
                'declaration' => sprintf('border-right-style: %1$s;',esc_attr('solid')),
            ));
        }
        /**
         * Border two default color
         *
         */
        if (('' === $this->props['border_color_top_border_two']) &&
        ('' === $this->props['border_color_all_border_two'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('border-top-color: %1$s;',esc_attr('#333333')),
            ));
        }
        if (('' === $this->props['border_color_bottom_border_two']) &&
        ('' === $this->props['border_color_all_border_two'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('border-bottom-color: %1$s;',esc_attr('#333333')),
            ));
        }
        if (('' === $this->props['border_color_left_border_two']) &&
        ('' === $this->props['border_color_all_border_two'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('border-left-color: %1$s;',esc_attr('#333333')),
            ));
        }
        if (('' === $this->props['border_color_right_border_two']) &&
        ('' === $this->props['border_color_all_border_two'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('border-right-color: %1$s;',esc_attr('#333333')),
            ));
        }

        /**
         * Border two default style
         *
         */
        if (('' === $this->props['border_style_top_border_two']) &&
        ('' === $this->props['border_style_all_border_two'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('border-top-style: %1$s;',esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_bottom_border_two']) &&
        ('' === $this->props['border_style_all_border_two'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('border-bottom-style: %1$s;',esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_left_border_two']) &&
        ('' === $this->props['border_style_all_border_two'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('border-left-style: %1$s;',esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_right_border_two']) &&
        ('' === $this->props['border_style_all_border_two'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-two",
                'declaration' => sprintf('border-right-style: %1$s;',esc_attr('solid')),
            ));
        }

        /**
         * Border three default color
         *
         */

        if (('' === $this->props['border_color_top_border_three']) &&
        ('' === $this->props['border_color_all_border_three'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('border-top-color: %1$s;',esc_attr('#333333')),
            ));
        }

        if (('' === $this->props['border_color_bottom_border_three']) &&
        ('' === $this->props['border_color_all_border_three'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('border-bottom-color: %1$s;',esc_attr('#333333')),
            ));
        }

        if (('' === $this->props['border_color_left_border_three']) &&
        ('' === $this->props['border_color_all_border_three'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('border-left-color: %1$s;',esc_attr('#333333')),
            ));
        }

        if (('' === $this->props['border_color_right_border_three']) &&
        ('' === $this->props['border_color_all_border_three'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('border-right-color: %1$s;',esc_attr('#333333')),
            ));
        }

        /**
         * Border three default style
         *
         */
        if (('' === $this->props['border_style_top_border_three']) &&
        ('' === $this->props['border_style_all_border_three'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('border-top-style: %1$s;',esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_bottom_border_three']) &&
        ('' === $this->props['border_style_all_border_three'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('border-bottom-style: %1$s;',esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_left_border_three']) &&
        ('' === $this->props['border_style_all_border_three'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('border-left-style: %1$s;',esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_right_border_three']) &&
        ('' === $this->props['border_style_all_border_three'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-text-three",
                'declaration' => sprintf('border-right-style: %1$s;',esc_attr('solid')),
            ));
        }

	}
}

new Next_Multi_Heading;