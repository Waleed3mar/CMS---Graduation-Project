<?php

class Next_Text_Divider extends ET_Builder_Module {

	public $slug       = 'dnxte_text_divider';
	public $vb_support = 'on';
	public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-text-divider/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name 		= esc_html__( 'Next Text Divider', 'dnxte-divi-essential' );
		$this->icon_path    = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->folder_name 	= 'et_pb_divi_essential';

		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'				=> array(
					'divider_settings' 	=> esc_html__( 'Divider Settings', 'dnxte-divi-essential' ),
					'divider_text_background'	=> array(
						'title'		=>	esc_html__( 'Background Text', 'dnxte-divi-essential' ),
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
				'toggles'			=> array(
					'divider_fonts' => array(
						'title'     => esc_html__('Fonts', 'dnxte-divi-essential'),
						'priority'  => 2,
					),
				),
			)			
		);

		// Custom CSS Field
		$this->custom_css_fields = array(
			'divider_wrapper' => array(
				'label'    => esc_html__('Divider Wrapper', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dnxt-text-divider-wrapper',
			),
			'divider_text' => array(
				'label'    => esc_html__('Divider Text', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dnxt-text-divider-spacing',
			),
		);
	}

	public function get_fields() {
		return array(
			// Divider Text
			'dnxt_divider_text'	  => array(
				'label'           => esc_html__( 'Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Text entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'main_content',
				//'default'         => 'Text Divider',
			),
			// Heading Tag
			'heading_tag'         => array(
				'label'           => esc_html__('Select Tag', 'dnxte-divi-essential'),
				'type'            => 'select',
				'option_category' => 'basic_option',
				'description'     => esc_html__('Select the tag, which you would like to use', 'dnxte-divi-essential'),
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
				'default'         => 'span',
			),
			// Text Divider Style
			'text_divider_style' 	=> array(
				'label'             => esc_html__( 'Divider Style', 'dnxte-divi-essential' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'description' 		=> esc_html__( 'Divider support various different styles, each of which will change the shape of the divider element.', 'dnxte-divi-essential' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'divider_settings',
				'options'           => et_builder_get_border_styles(),
			),
			// Text Divider Color
			'text_divider_color'  => array(
				'label'           => esc_html__( 'Color', 'dnxte-divi-essential' ),
				'type'            => 'color-alpha',
				'description'     => esc_html__( 'This will adjust the color of the 1px divider line.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'divider_settings',
				'default'         => et_builder_accent_color(),
				'default'		  => '#0077FF'
			),
			// Text Divider Weight
			'text_divider_weight' 	=> array(
				'label'             => esc_html__( 'Divider Weight', 'dnxte-divi-essential' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'depends_show_if'   => 'on',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'divider_settings',
				'default_unit'      => 'px',
				'default'           => '1px',
			),
			// Text Divider Weight
			'text_divider_gap' => array(
				'label'             => esc_html__( 'Text Gap', 'dnxte-divi-essential' ),
				'type'              => 'range',
				'option_category'   => 'layout',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'divider_settings',
				'default_unit'      => 'px',
				'default'           => '10px',
			),
			// Divider Aligment
			'divider_text_aligment'	=> array(
				'label'           	=> esc_html__( 'Text Alignment', 'dnxte-divi-essential' ),
				'type'            	=> 'select',
				'option_category' 	=> 'layout',
				'description'     	=> esc_html__( 'This controls how your text is aligned within the module.', 'dnxte-divi-essential' ),
				'options'         	=> array(
					'left'    	=> esc_html__( 'Left', 'dnxte-divi-essential' ),
					'center' 	=> esc_html__( 'Center', 'dnxte-divi-essential' ),
					'right' 	=> esc_html__( 'Right', 'dnxte-divi-essential' ),
				),
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'text',
				'default'           => 'center',
			),
			// Divider Text Background 
			'text_bg_show_hide'   => array(
				'label'           => esc_html__( 'Background Text Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'divider_text_background',
				'sub_toggle'	  => 'sub_toggle_color',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'divider_text_bg',
				),
				'default_on_front' => 'off',
			),
			// Divider Text BG Color
			'divider_text_bg'        => array(
				'label'          => esc_html__('Select Background Color', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'divider_text_background',
				'sub_toggle'	 => 'sub_toggle_color',
				'hover'    		 => 'tabs',
				'default'        => '#0077FF',
				'depends_show_if'=> 'on',
			),
			// Background Text Gradient 
			'text_gradient_show_hide'  => array(
				'label'           => esc_html__( 'Gradient Content Color', 'dnxte-divi-essential'),
				'type'            => 'yes_no_button',                
				'toggle_slug'     => 'divider_text_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'             => array(
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'affects'         => array(
					'text_gradient_color_one',
					'text_gradient_color_two',
					'text_gradient_type',
					'text_gradient_start_position',
					'text_gradient_end_position'
				),
				'default_on_front' => 'off',
			),
			'text_gradient_color_one'	=> array(
				'label'          => esc_html__('Select Color One', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'divider_text_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#0077FF',
				'depends_show_if'=> 'on',
			),
			'text_gradient_color_two'	=> array(
				'label'          => esc_html__('Select Color Two', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'toggle_slug'    => 'divider_text_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'default'        => '#772ADB',
				'depends_show_if'=> 'on',
			),
			'text_gradient_type'  => array(
				'label'           => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
				'type'            => 'select',
				'description'     => esc_html__('Select the types of gradient', 'dnxte-divi-essential'),
				'option_category' => 'basic_option',
				'toggle_slug'     => 'divider_text_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'options'         => array(
					'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
					'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
				),
				'default'         => 'linear-gradient',
				'depends_show_if' => 'on',
			),
			'text_gradient_type_linear_direction'   => array(
				'label'           => esc_html__('Linear direction', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category'=> 'basic_option',
				'toggle_slug'    => 'divider_text_background',
				'sub_toggle'	 => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 360,
				),
				'default'         => '180deg',
				'fixed_unit'      => 'deg',
				'validate_unit'   => true,
				'show_if' => array(
					'text_gradient_show_hide' => 'on',
					'text_gradient_type' => 'linear-gradient'
				),
			),
			'text_gradient_type_radial_direction'   => array(
				'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
				'type'            	=> 'select',
				'description'     	=> esc_html__('Select the types of gradient', 'dnxte-divi-essential'),                
				'option_category'	=> 'basic_option',
				'toggle_slug'    	=> 'divider_text_background',
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
					'content_gradient_show_hide' 	=> 'on',
					'content_gradient_type'			=> 'radial-gradient'
				),
			),
			'text_gradient_start_position'           => array(
				'label'           => esc_html__('Start Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'divider_text_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '0%',
				'fixed_unit'      => '%',
				'validate_unit'   => true,
				'depends_show_if' => 'on',
			),
			'text_gradient_end_position'             => array(
				'label'           => esc_html__('End Position', 'dnxte-divi-essential'),
				'type'            => 'range',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'divider_text_background',
				'sub_toggle'	  => 'sub_toggle_gradient',
				'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
				),
				'default'         => '100%',
				'fixed_unit'      => '%',
				'validate_unit'   => true,
				'depends_show_if' => 'on',
			),
		);
	}

	public function get_advanced_fields_config() {
		$advanced_fields = array();

		$advanced_fields = array(
			'fonts'      => array(
				'dnxt_divider_fonts' => array(
					'toggle_slug' 	 => 'divider_fonts',
					'tab_slug'    	 => 'advanced',
					'hide_text_align'=> true,
					'css'      		 => array(
						'main'  => "%%order_class%% .dnxt-text-divider-spacing",
						'hover' => "%%order_class%% .dnxt-text-divider-spacing:hover .dnxt-text-divider-spacing",
					),
					'font_size'   => array(
						'default' => '30px',
					),
				),
			),
			'background' => array(
				'settings'	=> array(
					'color' => 'alpha',
					'css'   => array(
						'main' => "%%order_class%% .dnxt-text-divider-spacing",
						'important' => true,
					),
				),
			),
			'borders'	=> array(
				'default'	=> array(
					'css'	=> array(
						'main'	=> array(
							'border_radii'        => '%%order_class%% .dnxt-text-divider-spacing',
							'border_radii_hover'  => '%%order_class%%:hover .dnxt-text-divider-spacing',
							'border_styles'       => '%%order_class%% .dnxt-text-divider-spacing',
							'border_styles_hover' => '%%order_class%%:hover .dnxt-text-divider-spacing',
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
			'text'       => array(
				'use_text_orientation'  => false,
				'css' => array(
					'text_orientation' => '%%order_class%%',
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main' => "%%order_class%% .dnxt-text-divider-spacing",
					'important' => 'all',
				),	
			),
			'box_shadow'            => array(
				'default' => array(
					'css'                 => array(
						'main'        => '%%order_class%% .dnxt-text-divider-spacing',
						'hover'       => '%%order_class%%:hover .dnxt-text-divider-spacing',
						'overlay'     => 'inset',
					),
				),
			)
		);
		return $advanced_fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		wp_enqueue_style( 'dnext_text_divider' );
		$dnxt_divider_text     = $this->props['dnxt_divider_text'];
		$heading_tag		   = $this->props['heading_tag'];
		$divider_text_aligment = $this->props['divider_text_aligment'];

		// Divider Text	
		$dnxt_divider_text = sprintf(
			'<%1$s class="dnxt-text-divider-spacing">%2$s</%1$s>',
			esc_attr( $heading_tag ),
			et_core_esc_previously( $dnxt_divider_text )
		);

		$divider_text_aligment = " ";		
		switch ($this->props['divider_text_aligment']) {
			case 'left':
				$divider_text_aligment .="dnxt-text-divider-alignment-left";
				break;
			case 'right':
				$divider_text_aligment .="dnxt-text-divider-alignment-right";				
				break;
			default:
			$divider_text_aligment = ' ';
				break;
		}


		$this->apply_css($render_slug);
		return sprintf( 
			'<div class="dnxt-text-divider-wrapper %2$s">
				<div class="dnxt-text-divider-before dnxt-text-divider"></div>
				%1$s
				<div class="dnxt-text-divider-after dnxt-text-divider"></div>
			</div>', 
			$dnxt_divider_text,
			$divider_text_aligment
		);
	}

	public function apply_css($render_slug){
		// Text Divider Style
		if ( '' !== $this->props['text_divider_style'] ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .dnxt-text-divider',
				'declaration' => sprintf(
					'border-top-style: %1$s;',
					esc_attr( $this->props['text_divider_style'] )
				),
			) );
		}
		// Text Divider Color
		if ( '' !== $this->props['text_divider_color'] ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .dnxt-text-divider',
				'declaration' => sprintf(
					'border-top-color: %1$s;',
					esc_attr( $this->props['text_divider_color'] )
				),
			) );
		}
		// Text Divider Weight
		if ( '' !== $this->props['text_divider_weight'] ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .dnxt-text-divider',
				'declaration' => sprintf(
					'border-top-width: %1$s;',
					esc_attr( $this->props['text_divider_weight'] )
				),
			) );
		}
		// Text Divider Gap
		if ( '' !== $this->props['text_divider_gap'] ) {
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .dnxt-text-divider',
				'declaration' => sprintf(
					'margin: %1$s;',
					esc_attr( $this->props['text_divider_gap'] )
				),
			) );
		}

		// Button Background One
		$divider_text_bg             = '';
		$text_gradient_apply         = '';
		$text_gradient_color_one 	 = '';
		$text_gradient_color_two 	 = '';
		$text_gradient_type	   		 = '';
		$text_gl             		 = '';
		$text_gr             		 = '';
		$text_gradient_start_position= '';
		$text_gradient_end_position  = '';

		// Divider Text BG Color
		if ('' !== $this->props['divider_text_bg']) {
			$divider_text_bg = $this->props['divider_text_bg'];
		}
		// checking gradient type
		if ('' !== $this->props['text_gradient_type']) {
			$text_gradient_type = $this->props['text_gradient_type'];
		}
		// Button Linear Gradient Direction
		if ('' !== $this->props['text_gradient_type_linear_direction']) {
			$text_gl = $this->props['text_gradient_type_linear_direction'];
		}
		// Button Radial Gradient Direction
		if ('' !== $this->props['text_gradient_type_radial_direction']) {
			$text_gr = $this->props['text_gradient_type_radial_direction'];
		}
		// Apply gradient direcion
		if ('radial-gradient' === $this->props['text_gradient_type']) {
			$text_gradient_apply = sprintf('%1$s', $text_gr);
		} else if ('linear-gradient' === $this->props['text_gradient_type']) {
			$text_gradient_apply = sprintf('%1$s', $text_gl);
		}
		// Gradient color one for content
		if ('' !== $this->props['text_gradient_color_one']) {
			$text_gradient_color_one = $this->props['text_gradient_color_one'];
		}
		// Gradient color two for content 
		if ('' !== $this->props['text_gradient_color_two']) {
			$text_gradient_color_two = $this->props['text_gradient_color_two'];
		}

		// Gradient color start position 
		if ('' !== $this->props['text_gradient_start_position']) {
			$text_gradient_start_position = $this->props['text_gradient_start_position'];
		}

		// Gradient color end position
		if ('' !== $this->props['text_gradient_end_position']) {
			$text_gradient_end_position = $this->props['text_gradient_end_position'];
		}

		// Divider Text BG Color
		if ('off' !== $this->props['text_bg_show_hide']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-text-divider-spacing",
				'declaration' => "background: $divider_text_bg;",
			));
		}

		// Gradient setting up
		if ('off' !== $this->props['text_gradient_show_hide']){
			ET_Builder_Element::set_style($render_slug, array(
				'selector'    => "%%order_class%% .dnxt-text-divider-spacing",
				'declaration' => "background: {$text_gradient_type}($text_gradient_apply, $text_gradient_color_one $text_gradient_start_position, $text_gradient_color_two $text_gradient_end_position);",
			));
		}
	}
}

new Next_Text_Divider;