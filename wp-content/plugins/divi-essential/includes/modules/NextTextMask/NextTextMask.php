<?php

class Next_Text_Mask extends ET_Builder_Module {

	public $slug       = 'dnxte_text_mask';
	public $vb_support = 'on';
	public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-text-mask/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

	public function init() {
		$this->name 		= esc_html__( 'Next Text Mask', 'dnxte-divi-essential' );
		$this->icon_path    = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->folder_name 	= 'et_pb_divi_essential';

		$this->settings_modal_toggles = array(
			'general'	=> array(
				'toggles'		=>	array(
					'text'			=> esc_html__( 'Text', 'dnxte-divi-essential' ),
					'image_mask'	=>	array(
						'title'			=>	esc_html__( 'Image Mask', 'dnxte-divi-essential' ),
						'priority'		=>	48
					)
				),
			),
			'advanced'	=> array(
				'toggles'		=>	array(
					'heading_mask'	=>	array(
						'title'		=>	esc_html__( 'Fonts', 'dnxte-divi-essential' ),
						'priority'	=>	1
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
			'gradient_title_css' => array(
				'label'    => esc_html__('Text Mask CSS', 'dnxte-divi-essential'),
				'selector' => '%%order_class%% .dn-dtm-text-masking',
			)
		);
	}

	public function get_fields() {

		return array(
			//Thumbnail Image Mask
			'thumbnail_image_mask'	=> array(
				'label'           	=> esc_html__( 'Thumbnail Image Mask', 'dnxte-divi-essential' ),
				'type'            	=> 'upload',
				'data_type'		  	=> 'image',
				'description'     	=> esc_html__( 'Image entered here will appear inside the module.', 'dnxte-divi-essential' ),
				'upload_button_text'=>	esc_html__( 'Upload Image', 'dnxte-divi-essential' ),
				'choose_text'		=>	esc_html__( 'Choose Image', 'dnxte-divi-essential' ),
				'update_text'		=>	esc_html__( 'Update Image', 'dnxte-divi-essential' ),
				'option_category' 	=> 'basic_option',
				'toggle_slug'     	=> 'image_mask',
				'hide_metadata'		=>	true,
			),
			//Background Image Size
			'background_image_size'	=> array(
				'label'				=> esc_html__( 'Background Image Size', 'dnxte-divi-essential' ),
				'type'				=> 'select',
				'description'     	=> esc_html__( 'Choose between Cover, Fit and Actual size and check how it looks as a background to your text.', 'dnxte-divi-essential' ),
				'option_category'	=> 'basic_option',
				'toggle_slug'		=> 'image_mask',
				'options'       	=> array(
						'cover'		=> esc_html__( 'Cover', 'dnxte-divi-essential' ),
						'contain'	=> esc_html__( 'Fit', 'dnxte-divi-essential' ),
						'initial'	=> esc_html__( 'Actual Size', 'dnxte-divi-essential' ),
				),
				'default'         	=> 'cover',
			),
			//Background Image Position
			'background_image_position' =>	array(
				'label'				=> esc_html__( 'Background Image Position', 'dnxte-divi-essential' ),
				'type'				=> 'select',
				'description'     	=> esc_html__( 'Choose a position from the options below and see what best fits your text.', 'dnxte-divi-essential' ),
				'option_category'	=> 'basic_option',
				'toggle_slug'		=> 'image_mask',
				'options'       	=> array(
					'top left'      => esc_html__( 'Top Left', 'dnxte-divi-essential' ),
					'top center'    => esc_html__( 'Top Center', 'dnxte-divi-essential' ),
					'top right'     => esc_html__( 'Top Right', 'dnxte-divi-essential' ),
					'center left'   => esc_html__( 'Center Left', 'dnxte-divi-essential' ),
					'center'        => esc_html__( 'Center', 'dnxte-divi-essential' ),
					'center right'  => esc_html__( 'Center Right', 'dnxte-divi-essential' ),
					'bottom left'   => esc_html__( 'Bottom Left', 'dnxte-divi-essential' ),
					'bottom center' => esc_html__( 'Bottom Center', 'dnxte-divi-essential' ),
					'bottom right'  => esc_html__( 'Bottom Right', 'dnxte-divi-essential' ),
				),
				'default'         	=> 'top left',
			),
			//Background Image Repeat
			'background_image_repeat'	=>	array(
				'label'				=> esc_html__( 'Background Image Repeat', 'dnxte-divi-essential' ),
				'type'				=> 'select',
				'description'     	=> esc_html__( 'Adjust the repetition of the image you picked and see whether it suits your text.', 'dnxte-divi-essential' ),
				'option_category'	=> 'basic_option',
				'toggle_slug'		=> 'image_mask',
				'options'       	=> array(
						'no-repeat' => esc_html__( 'No Repeat', 'dnxte-divi-essential' ),
						'repeat'    => esc_html__( 'Repeat', 'dnxte-divi-essential' ),
						'repeat-x'  => esc_html__( 'Repeat X (horizontal)', 'dnxte-divi-essential' ),
						'repeat-y'  => esc_html__( 'Repeat Y (vertical)', 'dnxte-divi-essential' ),
						'space'     => esc_html__( 'Space', 'dnxte-divi-essential' ),
						'round'     => esc_html__( 'Round', 'dnxte-divi-essential' ),
				),
				'default'         	=> 'no-repeat',
			),
			//Title Text
			'text_mask'			  =>	array(
				'label'           => esc_html__( 'Title', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'dynamic_content' => 'text',
				'description'     => esc_html__( 'Title entered here will appear inside the module.', 'dnxte-divi-essential' ),
				//'default'         => 'Text Mask',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				
			),
			//Heading Tag
			'heading_tag'		  =>	array(
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
				),
				'default'         => 'h2',
			),
			// Rotate Text Vertically
			'text_switch'			=>	array(
				'label'				=> esc_html__( 'Rotate Text Vertically', 'dnxte-divi-essential' ),
				'type'				=> 'yes_no_button',
				'description'		=> esc_html__( 'Turn this on for rotated text effect', 'dnxte-divi-essential' ),
				'toggle_slug'		=> 'main_content',
				'options'			=> array(
							'off'	=> 'Off',
							'on'	=>	'On',		  
				),
				'default'           => 'off',
			),
			// Rotate Text Vertically Flip
			'text_vertically_flip'	=>	array(
				'label'				=> esc_html__( 'Rotate Text Vertically Flip', 'dnxte-divi-essential' ),
				'type'				=> 'yes_no_button',
				'description'		=> esc_html__( 'Turn this on for rotated text effect flip', 'dnxte-divi-essential' ),
				'toggle_slug'		=> 'main_content',
				'options'			=> array(
							'off'	=> 'Off',
							'on'	=>	'On',		  
				),
				'default'           => 'off',
				'show_if'             => array(
                    'text_switch' => 'on',
				)
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
				'show_if'         => array(
                    'text_switch' => 'off',
				)
			),
            // Select Hover Effect
            'dnxt_text_hover_effect_select'           => array(
                'label'             => esc_html__( 'Select Hover Effect', 'dnxte-divi-essential' ),
                'type'              => 'select',
                'option_category'   => 'configuration',
                'tab_slug'          => 'advanced',
                'toggle_slug'       => 'dnxt_text_hover_effect',
                'default'           => 'grow',
                'description'       => esc_html__( 'Here you can adjust the hover effect.' ),
                'options'           => array(
                    'backward'               =>  esc_html__( 'Backward', 'dnxte-divi-essential' ),
                    'bob'                    =>  esc_html__( 'Bob', 'dnxte-divi-essential' ),
                    'bounce-in'              =>  esc_html__( 'Bounce In', 'dnxte-divi-essential' ),
                    'bounce-out'             =>  esc_html__( 'Bounce Out', 'dnxte-divi-essential' ),
                    'buzz'                   =>  esc_html__( 'Buzz', 'dnxte-divi-essential' ),
                    'buzz-out'               =>  esc_html__( 'Buzz Out', 'dnxte-divi-essential' ),
                    'float'                  =>  esc_html__( 'Float', 'dnxte-divi-essential' ),
                    'forward'                =>  esc_html__( 'Forward', 'dnxte-divi-essential' ),
                    'grow'                   =>  esc_html__( 'Grow', 'dnxte-divi-essential' ),
                    'grow-rotate'            =>  esc_html__( 'Grow Rotate', 'dnxte-divi-essential' ),
                    'hang'                   =>  esc_html__( 'Hang', 'dnxte-divi-essential' ),
                    'pop'                    =>  esc_html__( 'Pop', 'dnxte-divi-essential' ),
                    'pulse'                  =>  esc_html__( 'Pulse', 'dnxte-divi-essential' ),
                    'pulse-grow'             =>  esc_html__( 'Pulse Grow', 'dnxte-divi-essential' ),
                    'pulse-shrink'           =>  esc_html__( 'Pulse Shrink', 'dnxte-divi-essential' ),
                    'push'                   =>  esc_html__( 'Push', 'dnxte-divi-essential' ),
                    'rotate'                 =>  esc_html__( 'Rotate', 'dnxte-divi-essential' ),
                    'shrink'                 =>  esc_html__( 'Shrink', 'dnxte-divi-essential' ),
                    'sink'                   =>  esc_html__( 'Sink', 'dnxte-divi-essential' ),
                    'skew'                   =>  esc_html__( 'Skew', 'dnxte-divi-essential' ),
                    'skew-backward'          =>  esc_html__( 'Skew Backward', 'dnxte-divi-essential' ),
                    'skew-forward'           =>  esc_html__( 'Skew Forward', 'dnxte-divi-essential' ),
                    'wobble-bottom'          =>  esc_html__( 'Wobble Bottom', 'dnxte-divi-essential' ),
                    'wobble-horizontal'      =>  esc_html__( 'Wobble Horizontal', 'dnxte-divi-essential' ),
                    'wobble-skew'            =>  esc_html__( 'Wobble Skew', 'dnxte-divi-essential' ),
                    'wobble-top'             =>  esc_html__( 'Wobble Top', 'dnxte-divi-essential' ),
                    'wobble-to-bottom-right' =>  esc_html__( 'Wobble To Bottom Right', 'dnxte-divi-essential' ),
                    'wobble-to-top-right'    =>  esc_html__( 'Wobble To Top Right', 'dnxte-divi-essential' ),
                    'wobble-vertical'        =>  esc_html__( 'Wobble Vertical', 'dnxte-divi-essential' ),
				),
                'mobile_options'      => true,
                'show_if'             => array(
                    'dnxt_text_hover_effect_switch' => 'on',
				)
            ),
		);
	}

	public function get_advanced_fields_config() {
		$advanced_fields = array();

		$advanced_fields['text'] 		= false;
		$advanced_fields['text_shadow'] = false;
		$advanced_fields['fonts'] 		= false;


		$advanced_fields['fonts'] = array(
            //Text
            'text_mask'   => array(
					'label'       => esc_html__('', 'dnxte-divi-essential'),
					'toggle_slug' => 'heading_mask',
					'tab_slug'    => 'advanced',
					'line_height' => array(
						'default' => '1em',
					),
					'font_size'   => array(
						'default' => '70px',
					),
					'css'         => array(
						'main' => "%%order_class%% .dn-dtm-text-masking",
					),
				),
			);
		return $advanced_fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		wp_enqueue_style( 'dnext_text_mask' );
		wp_enqueue_style('dnext_hvr_common_css');
		$headingTag  				= $this->props['heading_tag'];
		$thumbnail_image_mask		= $this->props['thumbnail_image_mask'];
		$background_image_size  	= $this->props['background_image_size'];
		$background_image_position	= $this->props['background_image_position'];
		$background_image_repeat	= $this->props['background_image_repeat'];

		$text_vertically = '';
		if ( 'on' === $this->props['text_switch'] && 'off' === $this->props['text_vertically_flip'] ) {
            $text_vertically = " dn-dtm-text-masking text_bg dnxt-text-writting-mode";
        } else if ( 'on' === $this->props['text_switch'] && 'on' === $this->props['text_vertically_flip'] ){
			$text_vertically = " dn-dtm-text-masking text_bg dnxt-text-writting-mode dnxt-text-transform";
		} else {
            $text_vertically = "dn-dtm-text-masking text_bg";
		}
		 
        if ( '' !== $thumbnail_image_mask ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'		=>	"%%order_class%% .dn-dtm-text-masking",
				'declaration'	=>	"background-image: url({$thumbnail_image_mask});"
			));
		}

		if ( '' !== $background_image_size ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'		=>	"%%order_class%% .dn-dtm-text-masking",
				'declaration'	=>	"background-size: {$background_image_size};"
			));
		}

		if ( '' !== $background_image_position ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'		=>	"%%order_class%% .dn-dtm-text-masking",
				'declaration'	=>	"background-position: {$background_image_position};"
			));
		}
		
		if ( '' !== $background_image_repeat ) {
			ET_Builder_Element::set_style($render_slug, array(
				'selector'		=>	"%%order_class%% .dn-dtm-text-masking",
				'declaration'	=>	"background-repeat: {$background_image_repeat};"
			));
		}

		$text_hover_effect_enable = '';
        if ( 'on' === $this->props['dnxt_text_hover_effect_switch'] ) {
            $text_hover_effect_enable = $this->props['dnxt_text_hover_effect_select'];
        } else {
            $text_hover_effect_enable = "";
		}
		
		return sprintf(
			'<%3$s class="%1$s dnxt-hover-%4$s">
				%2$s
			</%3$s>',
			$text_vertically,
			$this->props['text_mask'],
			$headingTag,
			$text_hover_effect_enable  
		 );
	}
}

new Next_Text_Mask;