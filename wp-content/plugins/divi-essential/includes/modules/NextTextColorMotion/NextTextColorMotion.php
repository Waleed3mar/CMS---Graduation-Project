<?php

class Next_Text_Color_Motion extends ET_Builder_Module {

	public $slug       = 'dnxte_text_color_motion';
	public $vb_support = 'on';
	public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-text-color-motion/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name 		= esc_html__( 'Next Text Color Motion', 'dnxte-divi-essential' );
		$this->icon_path    = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->folder_name 	= 'et_pb_divi_essential';
		
		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'		=>	array(
					'dnxt_blurb_heading'	=> esc_html__( 'Text', 'dnxte-divi-essential' ),					
				),
			),
			'advanced'	=> array(
				'toggles'	=>	array(					
					'dnxt_text_font'	=> array(
						"title"		=>	esc_html__( 'Text', 'dnxte-divi-essential' ),						
					),			
					'dnxt_color_motion_styles'	=> array(
						'title'		=>	esc_html__( 'Color Motion Style', 'dnxte-divi-essential' ),												                                                
					),	
					'dnxt_color_motion_color'	=> array(
						'title'		=>	esc_html__( 'Colors', 'dnxte-divi-essential' ),	
					),
				), 
			),			
		);
	}

	public function get_fields() {
		return array(
			//Text Field
			'text_color_motion' => array(
				'label'           => esc_html__( 'Color Motion Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				//'default'         => 'Heading',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'main_content',

			),
			//Heading Tag
			'heading_tag'         => array(
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
			//Color Motion Styles
			'text_color_motion_style'         => array(
				'label'           => esc_html__('Color Motion Style', 'dnxte-divi-essential'),
				'type'            => 'select',
				'description'     => esc_html__( 'Choose a Gradient animated style from the list below.', 'dnxte-divi-essential' ),
				'tab_slug'	  	  => 'advanced',
				'toggle_slug'     => 'dnxt_color_motion_styles',
				'options'         => array(
					'dnxt-grdnt-text-animation'	  => esc_html__('Style1', 'dnxte-divi-essential'),
					'dnxt-grdnt-text-animation-2'	  => esc_html__('Style2', 'dnxte-divi-essential')				
				),
				'default'         => 'dnxt-grdnt-text-animation',
			),
			// Color Motion Duration 
			'color_motion_text_duration' => array(
                'label'           => esc_html__('Motion Duration', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust color two to the right of the text you have entered and see how it looks.', 'dnxte-divi-essential' ),
                'tab_slug'	  	  => 'advanced',
				'toggle_slug'     => 'dnxt_color_motion_styles',
                'range_settings'  => array(
                    'step' => 0.5,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0',
                'fixed_unit'      => 's',
				'validate_unit'   => true                
			),
			//Color Motion Color
			'color_motion_color_one'	=> array(
				'label'          	=> esc_html__('Select Color One', 'dnxte-divi-essential'),
				'type'           	=> 'color-alpha',
				'description'     	=> esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'    	=> 'dnxt_color_motion_color',				
				'default'        	=> '#0077FF',
			),
			'color_motion_color_two'	=> array(
				'label'          	=> esc_html__('Select Color Two', 'dnxte-divi-essential'),
				'type'           	=> 'color-alpha',
				'description'     	=> esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'    	=> 'dnxt_color_motion_color',			
				'default'        	=> '#772ADB',
			),
			'color_motion_color_three'	=> array(
				'label'          	=> esc_html__('Select Color Three', 'dnxte-divi-essential'),
				'type'           	=> 'color-alpha',
				'option_category'	=> 'layout',
				'description'     	=> esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'    	=> 'dnxt_color_motion_color',				
				'default'        	=> '#00e1ff',
			),
			'color_motion_color_four'	=> array(
				'label'          	=> esc_html__('Select Color Four', 'dnxte-divi-essential'),
				'type'           	=> 'color-alpha',
				'description'    	=> esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'    	=> 'dnxt_color_motion_color',			
				'default'        	=> '#ff23da',
			),
			'color_motion_type'		=> array(
                'label'           	=> esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type'            	=> 'select',
				'description'     	=> esc_html__('Select the types of gradient', 'dnxte-divi-essential'),
				'option_category' 	=> 'layout',				
				'tab_slug'        	=> 'advanced',
				'toggle_slug'     	=> 'dnxt_color_motion_color',		
                'options'         	=> array(
                    'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
                    'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
                ),
				'default'         	=> 'linear-gradient'				
			),
			'color_motion_type_linear_direction'   => array(
                'label'          	=> esc_html__('Linear direction', 'dnxte-divi-essential'),
                'type'           	=> 'range',
				'option_category'	=> 'layout',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'tab_slug'          => 'advanced',
				'toggle_slug'    	=> 'dnxt_color_motion_color',			
                'range_settings'  	=> array(
							'step' 	=> 1,
							'min'  	=> 1,
							'max'  	=> 90,
                ),
                'default'         	=> '45deg',
                'fixed_unit'      	=> 'deg',
                'validate_unit'   	=> true,
				'show_if' 			=> array(				
				'color_motion_type' => 'linear-gradient'
				),
			),
			'color_motion_type_radial_direction'   => array(
                'label'           	=> esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type'            	=> 'select',
				'description'     	=> esc_html__('Select the types of gradient', 'dnxte-divi-essential'),                                
				'option_category'	=> 'layout',
				'tab_slug'          => 'advanced',
				'toggle_slug'    	=> 'dnxt_color_motion_color',
                'options'       	=>  array(
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
					'color_motion_type'	=> 'radial-gradient'
                ),
			),

			'color_motion_color_one_position'           => array(
                'label'           => esc_html__('Color One Position', 'dnxte-divi-essential'),
                'type'            => 'range',                
				'option_category' => 'layout',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'tab_slug'     	  => 'advanced',
				'toggle_slug'     => 'dnxt_color_motion_color',		
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

			'color_motion_color_two_position'           => array(
                'label'           => esc_html__('Color Two Position', 'dnxte-divi-essential'),
                'type'            => 'range',                
				'option_category' => 'layout',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'tab_slug'     	  => 'advanced',
				'toggle_slug'     => 'dnxt_color_motion_color',		
                'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
                ),
                'default'         => '30%',
                'fixed_unit'      => '%',
				'validate_unit'   => true,
				'depends_show_if' => 'on',
			),

			'color_motion_color_three_position'           => array(
                'label'           => esc_html__('Color Three Position', 'dnxte-divi-essential'),
                'type'            => 'range',                
				'option_category' => 'layout',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'tab_slug'     	  => 'advanced',
				'toggle_slug'     => 'dnxt_color_motion_color',		
                'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
                ),
                'default'         => '50%',
                'fixed_unit'      => '%',
				'validate_unit'   => true,
				'depends_show_if' => 'on',
			),
			'color_motion_color_four_position'           => array(
                'label'           => esc_html__('Color Four Position', 'dnxte-divi-essential'),
                'type'            => 'range',                
				'option_category' => 'layout',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'tab_slug'     	  => 'advanced',
				'toggle_slug'     => 'dnxt_color_motion_color',		
                'range_settings'  => array(
					'step' => 1,
					'min'  => 1,
					'max'  => 100,
                ),
                'default'         => '90%',
                'fixed_unit'      => '%',
				'validate_unit'   => true,
				'depends_show_if' => 'on',
			),
		);
	}

	public function get_advanced_fields_config() {
		$advanced_fields = array();
		$advanced_fields['fonts'] = false;		
		$advanced_fields = array(
			'fonts'               		 => array(
				'dnxt_color_motion_fonts'=> array(
					'label'		  		 => esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug' 		 => 'dnxt_text_font',
					'hide_text_color' 	 => true,
					'tab_slug'	  		 => 'advanced',
					'css'      	  		 => array(
						'main' => "%%order_class%% .dnxt-grdnt-text-animation_font",
						'text_align'  => "%%order_class%% .dnxt-grdnt-text-animation_font",
					),
					'font_size'   => array(
						'default' => '100px',
					),
				)
			),
			'text' => false,
		);
		return $advanced_fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		wp_enqueue_style( 'dnext_text_color_motion' );
		$this->apply_css($render_slug);

		$headingTag  = $this->props['heading_tag'];
		$gradientAnimText = $this->props['text_color_motion'];
		$gradientAnimTextClass = $this->props['text_color_motion_style'];

		return sprintf( 
			'<div>
				<%1$s class="%2$s dnxt-grdnt-text-animation_font">
					%3$s
				</%1$s>
			</div>',
			$headingTag,
			$gradientAnimTextClass,
			$gradientAnimText
		);
	}

	public function apply_css($render_slug){		
		switch ($this->props['text_color_motion_style']) {
			case 'dnxt-grdnt-text-animation':
				// Gradient Animation Color
				if ('linear-gradient' === $this->props['color_motion_type']) {
					if (
						'' !== $this->props['color_motion_color_one'] ||
						'' !== $this->props['color_motion_color_two'] ||
						'' !== $this->props['color_motion_color_three'] ||
						'' !== $this->props['color_motion_color_four']
					) {
						
					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => '%%order_class%% .dnxt-grdnt-text-animation',
						'declaration' => "background: linear-gradient({$this->props['color_motion_type_linear_direction']},{$this->props['color_motion_color_one']} {$this->props['color_motion_color_one_position']},{$this->props['color_motion_color_two']} {$this->props['color_motion_color_two_position']},{$this->props['color_motion_color_three']} {$this->props['color_motion_color_three_position']},{$this->props['color_motion_color_four']} {$this->props['color_motion_color_four_position']});
										background-size: 300% 300%;
										color: transparent;
										background-clip: text;
										-webkit-background-clip: text;
										-webkit-text-fill-color: transparent;
										animation: dnxtgradient {$this->props['color_motion_text_duration']} ease-in-out infinite;
										-webkit-animation: dnxtgradient {$this->props['color_motion_text_duration']} ease-in-out infinite;",
					) );
						
			}
		}
		if ('radial-gradient' === $this->props['color_motion_type']) {
			if (
				'' !== $this->props['color_motion_color_one'] ||
				'' !== $this->props['color_motion_color_two'] ||
				'' !== $this->props['color_motion_color_three'] ||
				'' !== $this->props['color_motion_color_four']
			) {				
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .dnxt-grdnt-text-animation',
				'declaration' => "background: radial-gradient({$this->props['color_motion_type_radial_direction']},{$this->props['color_motion_color_one']} {$this->props['color_motion_color_one_position']},{$this->props['color_motion_color_two']} {$this->props['color_motion_color_two_position']},{$this->props['color_motion_color_three']} {$this->props['color_motion_color_three_position']},{$this->props['color_motion_color_four']} {$this->props['color_motion_color_four_position']});
				 			background-size: 300% 300%;
				 			color: transparent;
				 			background-clip: text;
				 			-webkit-background-clip: text;
							 -webkit-text-fill-color: transparent;
							 animation: dnxtgradient {$this->props['color_motion_text_duration']} ease-in-out infinite;
							-webkit-animation: dnxtgradient {$this->props['color_motion_text_duration']} ease-in-out infinite;",
			) );				
	}
}				
				break;
			case 'dnxt-grdnt-text-animation-2':			

				if ('linear-gradient' === $this->props['color_motion_type']) {
					if (
						'' !== $this->props['color_motion_color_one'] ||
						'' !== $this->props['color_motion_color_two'] ||
						'' !== $this->props['color_motion_color_three'] ||
						'' !== $this->props['color_motion_color_four']
					) {						
					ET_Builder_Element::set_style( $render_slug, array(
						'selector'    => '%%order_class%% .dnxt-grdnt-text-animation-2',
						'declaration' => "background: linear-gradient({$this->props['color_motion_type_linear_direction']},{$this->props['color_motion_color_one']} {$this->props['color_motion_color_one_position']},{$this->props['color_motion_color_two']} {$this->props['color_motion_color_two_position']},{$this->props['color_motion_color_three']} {$this->props['color_motion_color_three_position']},{$this->props['color_motion_color_four']} {$this->props['color_motion_color_four_position']});
						color: transparent;
						background-size: 200% auto;
						background-clip: text;
						-webkit-background-clip: text;
						-webkit-text-fill-color: transparent;
						-webkit-animation: textclip {$this->props['color_motion_text_duration']} linear infinite;
 						 animation: textclip {$this->props['color_motion_text_duration']} linear infinite;",
					) );
						
			}
		}
		if ('radial-gradient' === $this->props['color_motion_type']) {
			if (
				'' !== $this->props['color_motion_color_one'] ||
				'' !== $this->props['color_motion_color_two'] ||
				'' !== $this->props['color_motion_color_three'] ||
				'' !== $this->props['color_motion_color_four']
			) {				
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .dnxt-grdnt-text-animation-2',
				'declaration' => "background: radial-gradient({$this->props['color_motion_type_radial_direction']},{$this->props['color_motion_color_one']} {$this->props['color_motion_color_one_position']},{$this->props['color_motion_color_two']} {$this->props['color_motion_color_two_position']},{$this->props['color_motion_color_three']} {$this->props['color_motion_color_three_position']},{$this->props['color_motion_color_four']} {$this->props['color_motion_color_four_position']});
				color: transparent;
				background-size: 200% auto;
				background-clip: text;
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
				-webkit-animation: textclip {$this->props['color_motion_text_duration']} linear infinite;
				animation: textclip {$this->props['color_motion_text_duration']} linear infinite;",
			) );				
			}
			}				
				break;
			default:
			if (
				'' !== $this->props['color_motion_color_one'] ||
				'' !== $this->props['color_motion_color_two'] ||
				'' !== $this->props['color_motion_color_three'] ||
				'' !== $this->props['color_motion_color_four']
			) {
				
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => '%%order_class%% .dnxt-grdnt-text-animation',
				'declaration' => "background: linear-gradient({$this->props['color_motion_type_linear_direction']},{$this->props['color_motion_color_one']} {$this->props['color_motion_color_one_position']},{$this->props['color_motion_color_two']} {$this->props['color_motion_color_two_position']},{$this->props['color_motion_color_three']} {$this->props['color_motion_color_three_position']},{$this->props['color_motion_color_four']} {$this->props['color_motion_color_four_position']});
								background-size: 300% 300%;
								color: transparent;
								background-clip: text;
								-webkit-background-clip: text;
								-webkit-text-fill-color: transparent;
								animation: dnxtgradient {$this->props['color_motion_text_duration']} ease-in-out infinite;
								-webkit-animation: dnxtgradient {$this->props['color_motion_text_duration']} ease-in-out infinite;",
			) );
				
	}
				break;
		}
		
		
	}
}

new Next_Text_Color_Motion;