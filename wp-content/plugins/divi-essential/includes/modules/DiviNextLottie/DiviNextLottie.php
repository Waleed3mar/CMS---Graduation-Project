<?php
include_once(DIVI_ESSENTIAL_PATH.'/includes/modules/base/Common.php');

class DiviNextLottie extends ET_Builder_Module {
    public $slug = 'dnxte_lottie';
    public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-lottie/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init(){
        $this->name        = esc_html__('Next Lottie', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'dnxte_lottie_elements' => esc_html__('Lottie Elements', 'dnxte-divi-essential'),
                    'dnxte_lottie_settings' => esc_html__('Lottie Settings', 'dnxte-divi-essential')
                )
            ),
            'advanced' => array(
                'toggles' => array(
                    'dnxte_lottie_advanced_settings' => esc_html__('Lottie', 'dnxte-divi-essential'),
                    'dnxte_lottie_title_settings' => esc_html__('Title', 'dnxte-divi-essential'),
                    'dnxte_lottie_desc_settings' => esc_html__('Description', 'dnxte-divi-essential'),
                    'dnxte_lottie_btn_settings' => esc_html__('Button', 'dnxte-divi-essential'),
                )
            )
        );

        $this->custom_css_fields = array(
            'lottie_title' => array(
                'label' => esc_html__('Title', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-lottie-heading',
            ),
            'lottie_desc' => array(
                'label' => esc_html__('Description', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-lottie-content',
            ),
            'lottie_button' => array(
                'label' => esc_html__('Button', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-lottie-button',
            ),
        );
    }

    public function get_advanced_fields_config(){
        return array(
            'text' => false,
            'fonts' => array(
                'header' => array(
                    'label' => esc_html__('Title', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => "%%order_class%% h4.dnxte-lottie-heading, %%order_class%% h1.dnxte-lottie-heading, %%order_class%% h2.dnxte-lottie-heading, %%order_class%% h3.dnxte-lottie-heading, %%order_class%% h5.dnxte-lottie-heading, %%order_class%% h6.dnxte-lottie-heading",
                        'important' => 'plugin-only',
                    ),
                    'header_level' => array(
                        'default' => 'h4',
                    ),
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_lottie_title_settings',
                ),
                'description' => array(
                    'label' => esc_html__('Description', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => "%%order_class%% .dnxte-lottie-content",
                        'important' => 'plugin-only',
                    ),
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_lottie_desc_settings',
                ),
                'button' => array(
                    'label' => esc_html__('Button', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => "%%order_class%% .dnxte-lottie-button",
                        'important' => 'plugin-only',
                    ),
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_lottie_btn_settings',
                ),
            ),
            'borders' => array(
                'default' => array(),
                'title' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-lottie-heading",
                            'border_styles' => "%%order_class%% .dnxte-lottie-heading",
                        ),
                    ),
                    'label_prefix' => esc_html__('Title', 'dnxte-divi-essential'),
                    'toggle_slug' => 'dnxte_lottie_title_settings',
                ),
                'description' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-lottie-content",
                            'border_styles' => "%%order_class%% .dnxte-lottie-content",
                        ),
                    ),
                    'label_prefix' => esc_html__('Description', 'dnxte-divi-essential'),
                    'toggle_slug' => 'dnxte_lottie_desc_settings',
                ),
                'button' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-lottie-button",
                            'border_styles' => "%%order_class%% .dnxte-lottie-button",
                        ),
                    ),
                    'label_prefix' => esc_html__('Button', 'dnxte-divi-essential'),
                    'toggle_slug' => 'dnxte_lottie_btn_settings',
                ),
            ),
            'box_shadow' => array(
                'default' => array(),
                'title' => array(
                    'label' => esc_html__('Title Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_lottie_title_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-lottie-heading',
                        'custom_style' => true,
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
                'description' => array(
                    'label' => esc_html__('Description Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_lottie_desc_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-lottie-content',
                        'custom_style' => true,
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
                'button' => array(
                    'label' => esc_html__('Button Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_lottie_btn_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-lottie-button',
                        'custom_style' => true,
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
            )
        );
    }

    public function get_fields() {
        return array(
            'lottie_upload' => array(
                'label' => esc_html__("Lottie JSON File", 'dnxte-divi-essential'),
                'type' => 'upload',
                'toggle_slug' => 'dnxte_lottie_elements',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_html__('Upload a file', 'dnxte-divi-essential'),
                'choose_text' => esc_attr__('Choose a file', 'dnxte-divi-essential'),
                'update_text' => esc_attr__('Update file', 'dnxte-divi-essential'),
                'data_type' => 'json'
            ),
            'lottie_title' => array(
                'label' => esc_html__('Title', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input title text', 'dnxte-divi-essential'),
                'toggle_slug' => 'dnxte_lottie_elements',
                'dynamic_content' => 'text',
            ),
            'lottie_content' => array(
                'label' => esc_html__('Content', 'dnxte-divi-essential'),
                'type' => 'tiny_mce',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input the main text content for your module here.', 'dnxte-divi-essential'),
                'toggle_slug' => 'dnxte_lottie_elements',
                'dynamic_content' => 'text',
            ),
            'lottie_use_button' => array(
                'label' => esc_html__('Use Button', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'dnxte_lottie_elements',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
                    'lottie_button_text',
                    'lottie_button_link',
                    'lottie_button_target',
                ),
                'default_on_front' => 'on',
            ),
            'lottie_button_text' => array(
                'label' => esc_html__('Button Text', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input button text', 'dnxte-divi-essential'),
                'toggle_slug' => 'dnxte_lottie_elements',
                'dynamic_content' => 'text',
                'mobile_options' => true,
                'hover' => 'tabs',
                'show_if' => array(
                    'lottie_use_button' => 'on',
                ),
            ),
            'lottie_button_link' => array(
                'label' => esc_html__('Link', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'default' => '#',
                'description' => esc_html__('When clicked the module will link to this URL.', 'dnxte-divi-essential'),
                'toggle_slug' => 'dnxte_lottie_elements',
                'show_if' => array(
                    'lottie_use_button' => 'on',
                ),
            ),
            'lottie_button_target' => array(
                'label' => esc_html__('Link Target', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the link target', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug' => 'dnxte_lottie_elements',
                'options' => array(
                    '_self' => esc_html__('In The Same Window', 'dnxte-divi-essential'),
                    '_blank' => esc_html__('In The New Tab', 'dnxte-divi-essential'),

                ),
                'default' => '_self',
                'show_if' => array(
                    'lottie_use_button' => 'on',
                ),
            ),
            'lottie_loop'               => array(
				'label'            => esc_html__( 'Loop', 'dnxte-divi-essential' ),
				'type'             => 'yes_no_button',
                'option_category'  => 'configuration',
                'toggle_slug' => 'dnxte_lottie_settings',
				'options'          => array(
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'default_on_front' => 'on',
				'description'      => esc_html__( 'Here you can choose whether or not your Lottie will animate in loop.', 'dnxte-divi-essential' ),
            ),
            'lottie_autoplay'               => array(
				'label'            => esc_html__( 'Autoplay', 'dnxte-divi-essential' ),
				'type'             => 'yes_no_button',
                'option_category'  => 'configuration',
                'toggle_slug' => 'dnxte_lottie_settings',
				'options'          => array(
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'default_on_front' => 'on',
				'description'      => esc_html__( 'Here you can choose whether or not your Lottie will animate in loop.', 'dnxte-divi-essential' ),
            ),
            'lottie_play_on_hover'               => array(
				'label'            => esc_html__( 'Play On Hover', 'dnxte-divi-essential' ),
				'type'             => 'yes_no_button',
                'option_category'  => 'configuration',
                'toggle_slug' => 'dnxte_lottie_settings',
				'options'          => array(
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'default_on_front' => 'on',
                'description'      => esc_html__( 'Here you can choose whether or not your Lottie will animate in loop.', 'dnxte-divi-essential' ),
                'show_if'          => array(
                    'lottie_autoplay' => 'off'
                )
            ),
            'lottie_stop_on_hover'               => array(
				'label'            => esc_html__( 'Stop On Hover', 'dnxte-divi-essential' ),
				'type'             => 'yes_no_button',
                'option_category'  => 'configuration',
                'toggle_slug' => 'dnxte_lottie_settings',
				'options'          => array(
					'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
				),
				'default_on_front' => 'on',
                'description'      => esc_html__( 'Here you can choose whether or not your Lottie will animate in loop.', 'dnxte-divi-essential' ),
                'show_if'          => array(
                    'lottie_autoplay' => 'on'
                )
            ),
            'lottie_speed'              => array(
				'label'            => esc_html__( 'Speed', 'dnxte-divi-essential' ),
                'type'             => 'range',
                'toggle_slug'      => 'dnxte_lottie_settings',
				'option_category'  => 'configuration',
				'default_on_front' => '1',
				'validate_unit'    => false,
				'unitless'         => true,
				'description'      => esc_html__( 'The speed of the animation.', 'dnxte-divi-essential' ),
				'range_settings'   => array(
					'min'  => '0.1',
					'max'  => '2.5',
					'step' => '0.1',
				),
            ),
            'lottie_start_frame'              => array(
				'label'            => esc_html__( 'Start Frame', 'dnxte-divi-essential' ),
                'type'             => 'range',
                'toggle_slug'      => 'dnxte_lottie_settings',
				'option_category'  => 'configuration',
				'default_on_front' => '1',
				'validate_unit'    => false,
				'unitless'         => true,
				'description'      => esc_html__( 'The start frame of the animation.', 'dnxte-divi-essential' ),
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
                ),
                'show_if'          => array(
                    'lottie_autoplay' => 'off',
                    'lottie_play_on_hover' => 'on'
                )
            ),
            'lottie_direction'    => array(
                'label'           => esc_html__('Direction', 'dnxte-divi-essential'),
                'type'            => 'select',
                'description'     => esc_html__('Select the animation direction.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug'     => 'dnxte_lottie_settings',
                'options'         => array(
                    '1'           => esc_html__('forward', 'dnxte-divi-essential'),
                    '-1'          => esc_html__('reverse', 'dnxte-divi-essential'),

                ),
                'default'         => '1',
            ),
            'lottie_alignment' => array(
				'label'           => esc_html__( 'Alignment', 'dnxte-divi-essential' ),
				'description'     => esc_html__( 'Align animation to the left, right or center.', 'dnxte-divi-essential' ),
				'type'            => 'align',
				'option_category' => 'layout',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxte_lottie_advanced_settings',
				'mobile_options'  => true,
				'responsive'	  => true,
            ),
            'lottie_width' 	  => array(
				'label'           => esc_html__( 'Lottie Width', 'dnxte-divi-essential' ),
				'description'     => esc_html__( 'Control the size of the animation  by increasing or decreasing the range.', 'dnxte-divi-essential' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxte_lottie_advanced_settings',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'range_settings'  => array(
					'min'  		  => '1',
					'max'  		  => '100',
					'step' 		  => '1',
                ),
                'default'         => '100%',
				'default_unit'    => '%',
				'default_on_front'=> '100%',
				'mobile_options'  => true,
				'responsive'	  => true,
            ),
            'lottie_button_alignment'=> array(
				'label'            => esc_html__( 'Button Alignment', 'dnxte-divi-essential' ),
				'description'      => esc_html__( 'Align your button to the left, right or center of the module.', 'dnxte-divi-essential' ),
				'type'             => 'text_align',
				'option_category'  => 'configuration',
				'options'          => et_builder_get_text_orientation_options( array('justified') ),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'dnxte_lottie_btn_settings',
				'mobile_options'   => true,
				'description'      => esc_html__( 'Here you can define the alignment of Button', 'dnxte-divi-essential' ),
            ),
            'lottie_title_margin' => array(
                'label' => esc_html__('Title Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'lottie_title_padding' => array(
                'label' => esc_html__('Title Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'lottie_desc_margin' => array(
                'label' => esc_html__('Description Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'lottie_desc_padding' => array(
                'label' => esc_html__('Description Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'lottie_btn_margin' => array(
                'label' => esc_html__('Button Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'lottie_btn_padding' => array(
                'label' => esc_html__('Button Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
        );
    }

    public function render($attrs, $content, $render_slug) {
        wp_enqueue_style( 'dnext_lottie' );
        wp_enqueue_script( 'dnext_bodymovin' );
        wp_enqueue_script( 'dnext_lottie_activation' );
        $multi_view = et_pb_multi_view_options($this);
        $lottie_loop = $this->props['lottie_loop'];
        $lottie_path = $this->props['lottie_upload'];
        $autoplay    = $this->props['lottie_autoplay'];
        $speed       = $this->props['lottie_speed'];
        $direction   = $this->props['lottie_direction'];
        $start_frame = $this->props['lottie_start_frame'];
        $play_on_hover = $this->props['lottie_play_on_hover'];
        $stop_on_hover = $this->props['lottie_stop_on_hover'];

        $button_link = $this->props['lottie_button_link'];
        $button_target = $this->props['lottie_button_target'];
        $dnxte_lottie_title = "";

        
        if ($multi_view->has_value('lottie_title')) {
            $dnxte_lottie_title = $multi_view->render_element(array(
                'tag' => et_pb_process_header_level($this->props['header_level'], 'h4'),
                'content' => '{{lottie_title}}',
                'attrs' => array(
                    'class' => 'dnxte-lottie-heading',
                ),
            ));
        }

        $dnxte_lottie_content = $multi_view->render_element( array(
            'tag' => 'div',
            'content' => $this->process_content('{{lottie_content}}'),
            'attrs' => array(
                'class' => 'dnxte-lottie-content',
            )
        ));

        // Button Alignments
		$button_alignment_classes = Common::get_alignment("lottie_button_alignment", $this);

        $dnxte_lottie_button = "";
        if($this->props['lottie_use_button'] === "on") {
            $dnxte_lottie_button = $multi_view->render_element(array(
                'tag' => 'a',
                'content' => '{{lottie_button_text}}',
                'attrs' => array(
                    'href' => $button_link,
                    'target' => $button_target,
                    'class' => 'dnxte-lottie-button',
                ),
            ));

            $dnxte_lottie_button = sprintf('<div class="dnxte-lottie-button-container '. $button_alignment_classes .'">%1$s</div>', $dnxte_lottie_button);
        }

        // Lottie Alignments
		$lottie_alignment_classes = Common::get_alignment("lottie_alignment", $this, "dnext");

        // Lottie Width
        $lottie_width = esc_attr($this->props['lottie_width']);
		$lottie_width_values = et_pb_responsive_options()->get_property_values($this->props, 'lottie_width');
		$lottie_width_tablet = isset($lottie_width_values['tablet']) ? esc_attr($lottie_width_values['tablet']) : '';
		$lottie_width_phone = isset($lottie_width_values['phone']) ? esc_attr($lottie_width_values['phone']) : '';

		if ("" !== $lottie_width) {
			$lottie_width_style = sprintf('width: %1$s;', $lottie_width);
			$lottie_width_style_tablet = sprintf('width: %1$s;', $lottie_width_tablet);

			$lottie_width_style_phone = sprintf('width: %1$s;', $lottie_width_phone);

			ET_Builder_Element::set_style($render_slug, array(
				'selector' => "%%order_class%% .dnxte-lottie",
				'declaration' => $lottie_width_style,
			));

			ET_Builder_Element::set_style($render_slug, array(
				'selector' => "%%order_class%% .dnxte-lottie",
				'declaration' => $lottie_width_style_tablet,
				'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
			));

			ET_Builder_Element::set_style($render_slug, array(
				'selector' => "%%order_class%% .dnxte-lottie",
				'declaration' => $lottie_width_style_phone,
				'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
			));
		}
		// Lottie Width End

        $this->apply_css($render_slug);
        return sprintf(
            '<div>
                <div class="dnext_lottie_wrapper '. $lottie_alignment_classes .'">
                    <div class="dnxte-lottie" data-loop="%1$s" data-path="%2$s" data-autoplay="%3$s" data-speed="%4$s" data-direction="%5$s" data-start-frame="%6$s" data-play-hover="%7$s" data-stop-hover="%8$s" height="400" width="300"></div>
                </div>
                <div class="dnxte-lottie-content-setion">
                    %9$s
                    %10$s
                    %11$s
                </div>
            </div>',
            $lottie_loop,
            $lottie_path,
            $autoplay,
            $speed,
            $direction,
            $start_frame,
            $play_on_hover,
            $stop_on_hover,
            $dnxte_lottie_title,
            $this->process_content($dnxte_lottie_content),
            $dnxte_lottie_button
        );
    }

    public function apply_css( $render_slug ) {
        /**
         * Custom Padding Margin Output
         *
         */
        Common::dnxt_set_style($render_slug, $this->props, "lottie_title_margin", "%%order_class%% .dnxte-lottie-heading", "margin", false);
        Common::dnxt_set_style($render_slug, $this->props, "lottie_title_padding", "%%order_class%% .dnxte-lottie-heading", "padding", false);

        Common::dnxt_set_style($render_slug, $this->props, "lottie_desc_margin", "%%order_class%% .dnxte-lottie-content", "margin", false);
        Common::dnxt_set_style($render_slug, $this->props, "lottie_desc_padding", "%%order_class%% .dnxte-lottie-content", "padding", false);

        Common::dnxt_set_style($render_slug, $this->props, "lottie_btn_margin", "%%order_class%% .dnxte-lottie-button", "margin", false);
        Common::dnxt_set_style($render_slug, $this->props, "lottie_btn_padding", "%%order_class%% .dnxte-lottie-button", "padding", false);
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

new DiviNextLottie;