<?php

class DNEXT_IMAGE_REVEAL extends ET_Builder_Module {

	public $slug       = 'dnxte_image_reveal';
	public $vb_support = 'on';
	public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-image-reveal/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name 		= esc_html__( 'Next Image Reveal', 'dnxte-divi-essential' );
		$this->icon_path	= plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->folder_name 	= 'et_pb_divi_essential';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'dnext_image_reveal'       	=> esc_html__( 'Image', 'dnxte-divi-essential' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					//Text Reveal Effect
                    'dnext_image_reveal_effect' => array(
                        'title' =>	esc_html__( 'Reveal Color', 'dnxte-divi-essential' ),
                        'sub_toggles' => array(
                            'sub_toggle_color' => array(
                                'name' => esc_html__('Single Color', 'dnxte-divi-essential'),
                            ),
                            'sub_toggle_gradient' => array(
                                'name' => esc_html__('Gradient Color', 'dnxte-divi-essential')
                            ),
                        ),
                        'tabbed_subtoggles' => true,
                    ),
				),
			),
			'custom_css' => array(
				'toggles' 	=> array(),
			),
		);
	}
	

	public function get_fields() {
		return array(
			'dnext_img_reveal' => array(
				'label'              => esc_html__( 'Upload Image', 'dnxte-divi-essential' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_html__( 'Upload an image', 'dnxte-divi-essential' ),
				'choose_text'        => esc_html__( 'Choose an Image', 'dnxte-divi-essential' ),
				'update_text'        => esc_html__( 'Set As Image', 'dnxte-divi-essential' ),
				'depends_show_if'    => 'off',
				'description'        => esc_html__( 'Upload an image to display your image reveal effect.', 'dnxte-divi-essential' ),
				'toggle_slug'        => 'dnext_image_reveal',
				'dynamic_content'    => 'image',
				'mobile_options'     => true,
				'hover'              => 'tabs',
			),
			'dnext_img_reveal_alt' => array(
				'label'           => esc_html__( 'Image Alt Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			// reveal effects
			'dnext_image_color_switch'  => array(
				'label'           => esc_html__( 'Single Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button', 
				'tab_slug'	  	  => 'advanced',               				
				'toggle_slug'     => 'dnext_image_reveal_effect',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'         => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnext_single_color',
				),
				'default_on_front' => 'on',			
            ),
			// Single Color
			'dnext_single_color'   	=> array(
				'label'          	=> esc_html__('Single', 'dnxte-divi-essential'),
				'type'           	=> 'color-alpha',
				'description'     	=> esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),				
				'tab_slug'	  	  	=> 'advanced',
				'toggle_slug'     	=> 'dnext_image_reveal_effect',
				'sub_toggle'	  	=> 'sub_toggle_color',
				'hover'    		 	=> 'tabs',
				'default'        	=> '#0077FF',
				'depends_show_if'	=> 'on',
			),
			// Gradient Color tab Switch
			'dnext_gradient_color_switch'  => array(
				'label'           		=> esc_html__( 'Gradient', 'dnxte-divi-essential'),
				'type'            		=> 'yes_no_button',                
				'tab_slug'	  	  		=> 'advanced',
				'toggle_slug'     		=> 'dnext_image_reveal_effect',
				'sub_toggle'	  		=> 'sub_toggle_gradient',
				'options'             	=> array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'dnxt_color_tab_gradient_one',
					'dnxt_color_tab_gradient_two',
					'dnext_gradient_type_img_reveal',
					'dnext_gradient_type_linear_direction_img_reveal',
					'dnext_gradient_type_radial_direction_img_reveal',
					'dnext_gradient_start_position_img_reveal',
					'dnext_gradient_end_position_img_reveal',
				),
				'default_on_front' => 'off',				
			),
			// Gradient Color One Select One
			'dnxt_color_tab_gradient_one' => array(
				'label'          	=> esc_html__('Select Color One', 'dnxte-divi-essential'),
				'type'           	=> 'color-alpha',
				'tab_slug'       	=> 'advanced',
				'description'     	=> esc_html__( 'Choose the first color to blend with the second color from the color picker that suits your title text.', 'dnxte-divi-essential' ),
				'toggle_slug'    	=> 'dnext_image_reveal_effect',
				'sub_toggle'	  	=> 'sub_toggle_gradient',
				'default'        	=> '#0077FF',
				'depends_show_if'	=> 'on',
			),
			// Gradient Color Two Select Two
			'dnxt_color_tab_gradient_two' => array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'tab_slug'       => 'advanced',
				'description'     => esc_html__( 'Choose the second color to blend with the first color from the color picker that suits your title text.', 'dnxte-divi-essential' ),
				'toggle_slug'    => 'dnext_image_reveal_effect',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'default'        => '#772ADB',
				'depends_show_if'=> 'on',
			),
			// Gradient type text
			'dnext_gradient_type_img_reveal'  => array(
				'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
				'type'            => 'select',
				'description'     => esc_html__('Select a type of gradient for the Title Text.', 'dnxte-divi-essential'),
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnext_image_reveal_effect',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
					'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
				),
				'default'         => 'linear-gradient',
				'depends_show_if'=> 'on',
			),
			// Gradient Linear Type Direction
			'dnext_gradient_type_linear_direction_img_reveal' => array(
				'label'           => esc_html__('Linear direction', 'dnxte-divi-essential'),
				'type'            => 'range',
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Adjust the direction of the gradient for the title text.', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'dnext_image_reveal_effect',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
							'step' => 1,
							'min'  => 1,
							'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'validate_unit'   => true,
				'show_if'         => array(
					'dnext_gradient_type_img_reveal' 	=> 'linear-gradient',
					'dnext_gradient_color_switch' 		=> 'on',
				),
			),
			// Gradient Radial Type Selection
			'dnext_gradient_type_radial_direction_img_reveal' => array(
				'label'           => esc_html__('Radial Direction', 'dnxte-divi-essential'),
				'type'            => 'select',
				'description'     => esc_html__( 'Adjust the direction of the gradient for the title text.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnext_image_reveal_effect',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'center center'       => esc_html__('Center', 'dnxte-divi-essential'),
					'top'          => esc_html__('Top', 'dnxte-divi-essential'),
					'top left'     => esc_html__('Top Left Corner', 'dnxte-divi-essential'),
					'top right'    => esc_html__('Top Right Corner', 'dnxte-divi-essential'),
					'right'        => esc_html__('Right', 'dnxte-divi-essential'),
					'bottom right' => esc_html__('Bottom Right', 'dnxte-divi-essential'),
					'bottom'       => esc_html__('Bottom', 'dnxte-divi-essential'),
					'bottom left'  => esc_html__('Bottom Left', 'dnxte-divi-essential'),
					'left'         => esc_html__('Left', 'dnxte-divi-essential'),

				),
				'default'         => 'center center',
				'show_if'         => array(
					'dnext_gradient_type_img_reveal'  	=> 'radial-gradient',
					'dnext_gradient_color_switch' 		=> 'on',
				),
			),
			// Gradient Start Position
			'dnext_gradient_start_position_img_reveal' => array(
				'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust the position for the beginning of the gradient color.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnext_image_reveal_effect',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '0%',
				'fixed_unit'      => '%',
				'validate_unit'   => true,
				'show_if'         => array(
					'dnext_gradient_color_switch' => 'on',
				),
			),
			// Gradient End Position
			'dnext_gradient_end_position_img_reveal' => array(
				'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust the position for the ending of the gradient color.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnext_image_reveal_effect',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
						'step' => 1,
						'min'  => 1,
						'max'  => 100,
				),
				'default'         => '100%',
				'fixed_unit'      => '%',
				'validate_unit'   => true,
				'show_if'         => array(
					'dnext_gradient_color_switch' => 'on',
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		$advanced_fields = array();

		$advanced_fields = array(
			'width_height' => array(
				'css' => array(
					'main'     => "%%order_class%% .dnext-imr-reveal-effect",
					'important' => 'all',                
				),	
			),
			'margin_padding' => array(
				'css' => array(
					'main' => "%%order_class%% .dnext-imr-reveal-effect",
					'important' => 'all',
				),	
			),
			// change default Border settings
			'borders'	=> array(
				'default' => array(
					'css'	=> array(
						'main'	=> array(
							'border_radii'  => '%%order_class%% .dnext-imr-reveal-effect img',
							'border_styles' => '%%order_class%% .dnext-imr-reveal-effect img',
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
			),
			'box_shadow'            => array(
				'default' => array(
					'css'                 => array(
						'main'        => '%%order_class%% .dnext-imr-reveal-effect',
						'overlay'     => 'inset',
					),
				),
			),
			'text'		=> false,
			'fonts'		=> false,			
		);
		
		return $advanced_fields;
	}
	
	public function render( $attrs, $content, $render_slug ) {
		wp_enqueue_style( 'dnext_image_reveal' );
		wp_enqueue_script( 'dnext_wow-public' );
		wp_enqueue_script( 'dnext_wow-activation' );
		wp_enqueue_style( 'dnext_reveal_animation' );

		$multi_view				= et_pb_multi_view_options( $this );
		$dnext_img_reveal		= $this->props['dnext_img_reveal'];
		$dnext_img_reveal_alt	= $this->props['dnext_img_reveal_alt'];

		// Handle svg image behaviour
		$dnext_img_reveal_pathinfo = pathinfo( $dnext_img_reveal );
		$is_dnext_img_reveal_svg 	= isset( $dnext_img_reveal_pathinfo['extension'] ) ? 'svg' === $dnext_img_reveal_pathinfo['extension'] : false;
		
		$dnext_imr_image = Common::get_image_html(
			'dnext_img_reveal', // image_slug
			$dnext_img_reveal_alt, // alt_text
			'', // title
			$multi_view, // multi_view
			$this, // context
			'img-fluid'
		);

		$this->apply_css($render_slug);

		return sprintf( 
			'<figure class="dnext-imr-reveal-effect dnext-imr-masker wow">
				%1$s
			</figure>',
			$dnext_imr_image
		);
	}
	
	public function apply_css( $render_slug ) {

		// Image Background Color
		$dnext_img_reveal_color 			= '';
		$dnext_imr_gradient_type 			= '';
		$dnext_imr_gradient_linear 			= '';
		$dnext_imr_gradient_radial 			= '';
		$dnext_imr_gradient_apply 			= '';
		$dnext_imr_gradient_color_one 		= '';
		$dnext_imr_gradient_color_two 		= '';
		$dnext_imr_gradient_start_position 	= '';
		$dnext_imr_gradient_end_position 	= '';

		// Image BG Color
		if ( '' !== $this->props['dnext_single_color'] ) {
			$dnext_img_reveal_color = $this->props['dnext_single_color'];
		}

		// checking gradient type
		if ( '' !== $this->props['dnext_gradient_type_img_reveal'] ) {
			$dnext_imr_gradient_type = $this->props['dnext_gradient_type_img_reveal'];
		}

		// Linear Gradient Direction
		if ( '' !== $this->props['dnext_gradient_type_linear_direction_img_reveal'] ) {
			$dnext_imr_gradient_linear = $this->props['dnext_gradient_type_linear_direction_img_reveal'];
		}

		// Radial Gradient Direction
		if ( '' !== $this->props['dnext_gradient_type_radial_direction_img_reveal'] ) {
			$dnext_imr_gradient_radial = $this->props['dnext_gradient_type_radial_direction_img_reveal'];
		}

		// Apply gradient direcion
		if ( 'radial-gradient' === $this->props['dnext_gradient_type_img_reveal'] ) {
			$dnext_imr_bg_gradient_apply = sprintf('%1$s', $dnext_imr_gradient_radial);
		} else if ( 'linear-gradient' === $this->props['dnext_gradient_type_img_reveal'] ) {
			$dnext_imr_bg_gradient_apply = sprintf('%1$s ;', esc_attr($dnext_imr_gradient_linear));
		}

		// Gradient color one Image BG Color
		if ( '' !== $this->props['dnxt_color_tab_gradient_one'] ) {
			$dnext_imr_gradient_color_one = $this->props['dnxt_color_tab_gradient_one'];
		}

		// Gradient color two Image BG Color
		if ( '' !== $this->props['dnxt_color_tab_gradient_two'] ) {
			$dnext_imr_gradient_color_two = $this->props['dnxt_color_tab_gradient_two'];
		}

		// Gradient color start position 
		if ( '' !== $this->props['dnext_gradient_start_position_img_reveal'] ) {
			$dnext_imr_gradient_start_position = $this->props['dnext_gradient_start_position_img_reveal'];
		}

		// Gradient color end position
		if ( '' !== $this->props['dnext_gradient_end_position_img_reveal'] ) {
			$dnext_imr_gradient_end_position = $this->props['dnext_gradient_end_position_img_reveal'];
		}

		// Image BG Color
		if ( 'off' !== $this->props['dnext_image_color_switch'] ){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnext-imr-reveal-effect.dnext-imr-masker::after",
				'declaration' => sprintf('background-color: %1$s;', esc_attr($dnext_img_reveal_color)),
			));
		}

		$gradient_declaration = sprintf(
			'background: %s(%s, %s %s, %s %s);',
			esc_html($dnext_imr_gradient_type),
			esc_html($dnext_imr_bg_gradient_apply),
			esc_html($dnext_imr_gradient_color_one),
			esc_html($dnext_imr_gradient_start_position),
			esc_html($dnext_imr_gradient_color_two),
			esc_html($dnext_imr_gradient_end_position)
		);

		// Gradient setting up
		if ( 'off' !== $this->props['dnext_gradient_color_switch'] ){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnext-imr-reveal-effect.dnext-imr-masker::after",
				'declaration' => $gradient_declaration,
			));
		}
		
	}
}

new DNEXT_IMAGE_REVEAL;