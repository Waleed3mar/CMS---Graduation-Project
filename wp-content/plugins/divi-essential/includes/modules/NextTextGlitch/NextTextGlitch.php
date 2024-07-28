<?php

class Next_Text_Glitch extends ET_Builder_Module {

	public $slug       = 'dnxte_text_glitch';
	public $vb_support = 'on';
	public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-glitch-text/',
		'author'     =>  'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name 		= esc_html__( 'Next Text Glitch', 'dnxte-divi-essential' );
		$this->icon_path    = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->folder_name 	= 'et_pb_divi_essential';
		
		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'		=>	array(
					'dnxt_blurb_heading'	=> esc_html__( 'Text', 'dnxte-divi-essential' ),
					'dnxt_image'			=> esc_html__( 'Image', 'dnxte-divi-essential' )
				),
			),
			'advanced'	=> array(
				'toggles'	=>	array(					
					'dnxt_text_font'	=> array(
						"title"		=>	esc_html__( 'Text', 'dnxte-divi-essential' ),						
					),
					'dnxt_glitch_styles'	=> array(
						'title'		=>	esc_html__( 'Glitch Style', 'dnxte-divi-essential' ),												                                                
					),	
					'dnxt_text_color'	=> array(
						'title'		=>	esc_html__( 'Colors', 'dnxte-divi-essential' ),	
					),	
					'dnxt_glitch_position'	=> array(
						'title'		=>	esc_html__( 'Glitch Position', 'dnxte-divi-essential' ),	
					)
				), 
			),
		);
	}

	public function get_fields() {
		return array(
			//Text Field
			'glitch_text' => array(
				'label'           => esc_html__( 'Glitch Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				//'default'         => 'Glitch',
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
			//Glitch Styles
			'glitch_style'         => array(
				'label'           => esc_html__('Select Glitch Style', 'dnxte-divi-essential'),
				'type'            => 'select',
				'description'     => esc_html__( 'Choose an animated glitch style from the list below.', 'dnxte-divi-essential' ),
				'tab_slug'	  	  => 'advanced',
				'toggle_slug'     => 'dnxt_glitch_styles',
				'options'         => array(
					'1'	  => esc_html__('Style1', 'dnxte-divi-essential'),
					'2'	  => esc_html__('Style2', 'dnxte-divi-essential'),
					'3'	  => esc_html__('Style3', 'dnxte-divi-essential'),
					'4'	  => esc_html__('Style4', 'dnxte-divi-essential'),
					'5'	  => esc_html__('Style5', 'dnxte-divi-essential'),
					'6'	  => esc_html__('Style6', 'dnxte-divi-essential'),
					'7'	  => esc_html__('Style7', 'dnxte-divi-essential')					
				),
				'default'         => '1',
			),
			// Select Text Color
			'glitch_text_color'  => array(
				'label'          => esc_html__('Text Color', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'description'     => esc_html__( 'Select a color for the text used for the glitch style.', 'dnxte-divi-essential' ),				
				'tab_slug'	  	  => 'advanced',
				'toggle_slug'     => 'dnxt_text_color',
				'default'        => '#0077FF'
			),
			// Select Glitch Color One
			'glitch_color_text_one'        => array(
				'label'          => esc_html__('Glitch Color One', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',
				'description'     => esc_html__( 'Select color one to use for the top part of the text with the glitch effect.', 'dnxte-divi-essential' ),				
				'tab_slug'	  	  => 'advanced',
				'toggle_slug'     => 'dnxt_text_color',
				'default'        => '#772ADB'
			),
			// Select Glitch Color Two
			'glitch_color_text_two'        => array(
				'label'          => esc_html__('Glitch Color Two', 'dnxte-divi-essential'),
				'type'           => 'color-alpha',	
				'description'     => esc_html__( 'Select color two to use for the bottom part of the text with the glitch effect.', 'dnxte-divi-essential' ),			
				'tab_slug'	  	  => 'advanced',
				'toggle_slug'     => 'dnxt_text_color',
				'default'        => '#00e1ff'
			),
			// Glitch Position Left 
			'glitch_position_left'=> array(
                'label'           => esc_html__('Glitch Left', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust color one to the left of the text you have entered and see how it looks.', 'dnxte-divi-essential' ),
                'tab_slug'	  	  => 'advanced',
				'toggle_slug'     => 'dnxt_glitch_position',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0px',
                'fixed_unit'      => 'px',				
				'validate_unit'   => true,
                'mobile_options'  => true,
			),
			// Glitch Position Right 
			'glitch_position_right' => array(
                'label'          	=> esc_html__('Glitch Right', 'dnxte-divi-essential'),
				'type'            	=> 'range',
				'description'     	=> esc_html__( 'Adjust color two to the right of the text you have entered and see how it looks.', 'dnxte-divi-essential' ),
                'tab_slug'	  	  	=> 'advanced',
				'toggle_slug'     	=> 'dnxt_glitch_position',
                'range_settings'  	=> array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0px',
                'fixed_unit'      => 'px',
				'validate_unit'   => true,
                'mobile_options'    => true,
			),
			// Glitch Position Top 
			'glitch_position_top' => array(
                'label'           => esc_html__('Glitch Top', 'dnxte-divi-essential'),
				'type'            => 'range',
				'description'     => esc_html__( 'Adjust and drag the glitch effect to the bottom of the text and see how it looks.', 'dnxte-divi-essential' ),
                'tab_slug'	  	  => 'advanced',
				'toggle_slug'     => 'dnxt_glitch_position',
                'range_settings'  => array(
                    'step' => 1,
                    'min'  => 1,
                    'max'  => 100,
                ),
                'default'         => '0px',
                'fixed_unit'      => 'px',
				'validate_unit'   => true,
                'mobile_options'  => true,
			),
		);
	}

	public function get_advanced_fields_config() {
		$advanced_fields = array();
		$advanced_fields['fonts'] = false;			
		$advanced_fields = array(
			'fonts'               	  => array(
				'dnxt_glitch_fonts'   => array(
					'label'		  	  => esc_html__( '', 'dnxte-divi-essential' ),
					'toggle_slug' 	  => 'dnxt_text_font',
					'hide_text_color' => true,
					'tab_slug'	  	  => 'advanced',
					'css'      	  	  => array(
						'main' => "%%order_class%% .dnxt-glitch-text_heading",
						'text_align'  => "%%order_class%% .dnxt-glitch-text_heading",
					),
					'font_size'   => array(
						'default' => '200px',
					),
				)
			),
			'background'   => array(
				'settings' => array(
					'color'=> 'alpha',
				),
				// 'css'      => array(
				// 	'main' => "%%order_class%% .dnxt-txt-glitch-wrap",
				// ),
			),
			'text' => false,			
		);
		$advanced_fields['margin_padding'] = array(
			'css' => array(
				'main'     => "%%order_class%% .dnxt-txt-glitch-wrap",
				'important' => 'all',                
			),	
		);
		return $advanced_fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		wp_enqueue_style( 'dnext_text_glitch' );
		$animationStyle = " ";		
		switch ($this->props['glitch_style']) {
			case 1:
				$animationStyle .="dnxt-glitch-animation-1";
				break;
			case 2:
				$animationStyle .="dnxt-glitch-animation-2";				
				break;
			case 3:
				$animationStyle .="dnxt-glitch-animation-3";
				break;
			case 4:
				$animationStyle .="dnxt-glitch-animation-4";
				break;
			case 5:
				$animationStyle .="dnxt-glitch-animation-5";
				break;
			case 6:
				$animationStyle .="dnxt-glitch-animation-6";
				break;
			case 7:
				$animationStyle .="dnxt-glitch-animation-7";
				break;
			default:
				$animationStyle += '-1';
				break;
		}

		$headingTag  = $this->props['heading_tag'];
		$glitchText = $this->props['glitch_text'];
		$this->apply_css($render_slug);
		return sprintf( 
			'<div class="dnxt-txt-glitch-wrap">
				<div class= "dnxt-glitch-text %1$s">
					<%2$s class="dnxt-glitch-text_heading" data-text="%3$s">
							%4$s
					</%2$s>
				</div>
			</div>', 
		$animationStyle,
		$headingTag,
		$glitchText,			
		$this->props['glitch_text']
		);
	}
	public function apply_css($render_slug){
		
		$glitch_text_color 		= '';
		$glitch_color_text_one 	= '';
		$glitch_color_text_two 	= '';
		$glitch_position_left 	= '';
		$glitch_position_right 	= '';
		$glitch_position_top 	= '';

		if ('' !== $this->props['glitch_text_color']) {
            $glitch_text_color = $this->props['glitch_text_color'];
		}
		if ('' !== $this->props['glitch_color_text_one']) {
            $glitch_color_text_one = $this->props['glitch_color_text_one'];
		}
		if ('' !== $this->props['glitch_color_text_two']) {
            $glitch_color_text_two = $this->props['glitch_color_text_two'];
		}
		if ('' !== $this->props['glitch_position_left']) {			
            $glitch_position_left = $this->props['glitch_position_left'];
		}
		if ('' !== $this->props['glitch_position_right']) {
            $glitch_position_right = $this->props['glitch_position_right'];
		}
		if ('' !== $this->props['glitch_position_top']) {
            $glitch_position_top = $this->props['glitch_position_top'];
        }
		// Text color
		ET_Builder_Element::set_style($render_slug, array(
            'selector'    => "%%order_class%% .dnxt-glitch-text_heading",
            'declaration' => "color:{$glitch_text_color} ",
		));
				
		// Glitch Color
	
			switch ($this->props['glitch_style']) {
				case '1':
					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-1 > *::after",
						'declaration' => "color:{$glitch_color_text_two};",
					));							
					break;
				case '2':
					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-2 > *::before",
						'declaration' => "color:{$glitch_color_text_one};",
					));	

					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-2 > *::after",
						'declaration' => "color:{$glitch_color_text_two};",
					));	
					break;
				case '3':
					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-3 > *::before",
						'declaration' => "color:{$glitch_color_text_one};",
					));	

					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-3 > *::after",
						'declaration' => "color:{$glitch_color_text_two};",
					));	
					break;
				case '4':
					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-3 > *::before",
						'declaration' => "color:{$glitch_color_text_one};",
					));	

					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-3 > *::after",
						'declaration' => "color:{$glitch_color_text_two};",
					));	
					break;
				case '5':
					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-5 > *::before",
						'declaration' => "color:{$glitch_color_text_one};",
					));	

					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-5 > *::after",
						'declaration' => "color:{$glitch_color_text_two};",
					));	
					break;
				case '6':
					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-6 > *::before",
						'declaration' => "color:{$glitch_color_text_one};",
					));	

					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-6 > *::after",
						'declaration' => "color:{$glitch_color_text_two};",
					));	
					break;
				case '7':
					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-7 > *::before",
						'declaration' => "color:{$glitch_color_text_one};",
					));	

					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-7 > *::after",
						'declaration' => "color:{$glitch_color_text_two};",
					));	
					break;
				default:
					break;
			}
		
		// Glitch Position
		if (
			'' !== $glitch_position_left ||
			'' !== $glitch_position_right ||
			'' !== $glitch_position_top
		) {
			switch ($this->props['glitch_style']) {
				case 2:					
					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-2 > *::before",
						'declaration' => "left: {$glitch_position_left}; top: {$glitch_position_top}",
					));	

					ET_Builder_Element::set_style($render_slug, array(
						'selector'    => "%%order_class%% .dnxt-glitch-animation-2 > *::after",
						'declaration' => "left: {$glitch_position_right}; top: {$glitch_position_top};",
					));					
					break;
					case 3:
						ET_Builder_Element::set_style($render_slug, array(
							'selector'    => "%%order_class%% .dnxt-glitch-animation-3 > *:before",
							'declaration' => "left: {$glitch_position_left}; top: {$glitch_position_top}",
						));	
	
						ET_Builder_Element::set_style($render_slug, array(
							'selector'    => "%%order_class%% .dnxt-glitch-animation-3 > *:after",
							'declaration' => "left: {$glitch_position_right}; top: {$glitch_position_top};",
						));						
					break;
					case 4:
						ET_Builder_Element::set_style($render_slug, array(
							'selector'    => "%%order_class%% .dnxt-glitch-animation-4 > *:before",
							'declaration' => "left: {$glitch_position_left}; top: {$glitch_position_top}",
						));	
	
						ET_Builder_Element::set_style($render_slug, array(
							'selector'    => "%%order_class%% .dnxt-glitch-animation-4 > *:after",
							'declaration' => "left: {$glitch_position_right}; top: {$glitch_position_top};",
						));						
					break;
					case 5:
						ET_Builder_Element::set_style($render_slug, array(
							'selector'    => "%%order_class%% .dnxt-glitch-animation-5 > *:before",
							'declaration' => "left: {$glitch_position_left}; top: {$glitch_position_top}",
						));	
	
						ET_Builder_Element::set_style($render_slug, array(
							'selector'    => "%%order_class%% .dnxt-glitch-animation-5 > *:after",
							'declaration' => "left: {$glitch_position_right}; top: {$glitch_position_top};",
						));
												
					break;
					case 6:
						ET_Builder_Element::set_style($render_slug, array(
							'selector'    => "%%order_class%% .dnxt-glitch-animation-6 > *:before",
							'declaration' => "left: {$glitch_position_left}; top: {$glitch_position_top}",
						));	
	
						ET_Builder_Element::set_style($render_slug, array(
							'selector'    => "%%order_class%% .dnxt-glitch-animation-6 > *:after",
							'declaration' => "left: {$glitch_position_right}; top: {$glitch_position_top};",
						));						
					break;
					case 7:
						ET_Builder_Element::set_style($render_slug, array(
							'selector'    => "%%order_class%% .dnxt-glitch-animation-7 > *:before",
							'declaration' => "left: {$glitch_position_left}; top: {$glitch_position_top}",
						));	
	
						ET_Builder_Element::set_style($render_slug, array(
							'selector'    => "%%order_class%% .dnxt-glitch-animation-7 > *:after",
							'declaration' => "left: {$glitch_position_right}; top: {$glitch_position_top};",
						));												
					break;
					default:
				break;
			}
		}
	}
}

new Next_Text_Glitch;