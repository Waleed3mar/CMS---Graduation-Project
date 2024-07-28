<?php

include_once(DIVI_ESSENTIAL_PATH.'/includes/modules/base/Common.php');
use Divi_Essential\Includes\Traits\Button_Render;

class Divi_NextThumbsGalleryChild extends ET_Builder_Module
{
    use Button_Render;

    public $slug = 'dnxte_thumbs_gallery_child';
    public $vb_support = 'on';
    public $type = 'child';
    public $child_title_var = 'title';
    public $child_title_fallback_var = 'thumbs_gallery_top_alt';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-gallery-slider/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name = esc_html__('Gallery Slider Item', 'dnxte-divi-essential');
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'thumbs_gallery_item_content' => array(
                        'title' => esc_html__('Content', 'dnxte-divi-essential'),
                    ),
                    'thumbs_gallery_image_toggle' => array(
                        'title' => esc_html__('Image', 'dnxte-divi-essential'),
                    ),
                ),
            ),
            'advanced'  => array(
                'toggles'   => array(
                    'dnxte_thumbs_title_text'       => array(
                        'title'    => esc_html__('Title Text', 'dnxte-divi-essential'),
                        'priority' => 2,
                    ),
                    'dnxte_thumbs_body'       => array(
                        'title'    => esc_html__('Body', 'dnxte-divi-essential'),
                        'priority' => 3,
                    ),
                    'dnxte_button'       => array(
                        'title'    => esc_html__('Button', 'dnxte-divi-essential'),
                        'priority' => 4,
                    ),


                ),
            ),
        );

        $this->custom_css_fields = array(
            'image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .img-fluid',
            ),
            'dnxte_content' => array(
                'label' => esc_html__('Content', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_thumbs_gallery_content',
            ),
            'dnxte_title' => array(
                'label' => esc_html__('Title', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_thumbs_gallery_title',
            ),
            'dnxte_desc' => array(
                'label' => esc_html__('Description', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_thumbs_gallery_description',
            ),
            'dnxte_button' => array(
                'label' => esc_html__('Button', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-button',
            ),
        );
    }

    public function get_advanced_fields_config()
    {
        return array(
            'fonts' => array(
                'header' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dnxte_thumbs_gallery_title',
                        'text_align' => '%%order_class%% .dnxte_thumbs_gallery_title',
                    ),
                    'toggle_slug' => 'dnxte_thumbs_title_text',
                    'font' => array(
                        'description' => esc_html__('Choose a font. All Google web fonts are available here. You can upload a custom font as well.', 'dnxte-divi-essential'),
                    ),
                    'font_size' => array(
                        'default' => '17px',
                    ),
                    'text_alignment ' => array(
                        'description' => esc_html__('Align the text to the left, right, center, or justify', 'dnxte-divi-essential'),
                    ),
                    'letter_spacing' => array(
                        'description' => esc_html__('Adjust the spacing between the letters of the text', 'dnxte-divi-essential'),
                    ),
                    'line_height' => array(
                        'description' => esc_html__('Adjust the space between multiple lines added to the design', 'dnxte-divi-essential'),
                    ),
                    'header_level' => array(
                        'default' => 'h3',
                    ),
                ),
                'dnxte_button_text' => array(
					'label'          => et_builder_i18n( 'Button' ),
                    'toggle_slug' => 'dnxte_button',
					'css'            => array(
						'main'         => ".dnxte-button%%order_class%%",
						'limited_main' => ".dnxte-button%%order_class%%",
                        'text_align' => '%%order_class%% .dnxte_button_wrapper',
                        'line_height' => ".dnxte-button%%order_class%%",
					),
					'box_shadow'     => false,
					'margin_padding' => false,
				),
                'dnxte_body'   => array(
					'label'          => et_builder_i18n( 'Body' ),
                    'toggle_slug' => 'dnxte_thumbs_body',
					'css'            => array(
						'main'        => "%%order_class%% .dnxte_thumbs_gallery_description",
						'line_height' => "%%order_class%% p",
						'text_align'  => "%%order_class%% .dnxte_thumbs_gallery_description",
						'text_shadow' => "%%order_class%% .dnxte_thumbs_gallery_description",
					),
				),
            ),
            'text' => false,
            'link_options' => false,
            'borders' => array(
                'default' => array(
                    'css' => array(
                        'main' => array(
                            "border_radii" => "%%order_class%% .img-fluid",
                            'border_styles' => '%%order_class%% .img-fluid',
                        ),
                        'important' => 'all',
                    ),
                ),
                'button_border' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => '%%order_class%% .dnxte-button',
                            'border_styles' => '%%order_class%% .dnxte-button',
                        ),
                    ),
                    'label_prefix' => esc_html__('Button', 'dnxte-divi-essential'),
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_button',
                    'depends_show_if' => 'off',
					'defaults'        => array(
						'border_radii'  => 'on|3px|3px|3px|3px',
						'border_styles' => array(
							'width' => '2px',
							'color' => '#2ea3f2',
							'style' => 'solid',
						),
					),
                ),
            ),
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% .img-fluid',
                        'important' => 'all',
                    ),
                ),
                'dnxte_button_box_shadow'   => array(
					'label'             => esc_html__( 'Button Box Shadow', 'dnxte-divi-essential' ),
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'dnxte_button',
					'show_if'           => array(
						'use_dnxte_custom_button_style' => 'on',
					),
					'css'               => array(
						'main'        => '%%order_class%% .dnxte-button',
						'hover'       => '%%order_class%% .dnxte-button:hover',
						'show_if_not' => array(
							'use_dnxte_custom_button_style' => 'off',
						),
						'overlay'     => 'inset',
					),
					'default_on_fronts' => array(
						'color'    => '',
						'position' => '',
					),
				),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main' => '%%order_class%%',
                    'important' => 'all',
                ),
            ),
            'background' => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
                'css' => array(
                    'main' => "%%order_class%% .dnxte_thumbs_gallery_content",
                    'important' => 'all',
                ),
            ),
            'max_width' => false,
        );
    }

    public function get_fields()
    {
        $fields = array(
            'dnxte_thumbs_gallery_title' => array(
                'label' => esc_html__('Title', 'dnxte-divi-essential'),
                'type' => 'text', 
                'option_category' => 'basic_option',
                'description' => esc_html__('Input the thumbs gallery title', 'dnxte-divi-essential'),
                'toggle_slug' => 'thumbs_gallery_item_content',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'dnxte_thumbs_gallery_content'  => array(
				'label'           => esc_html__('Content', 'dnxte-divi-essential'),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Here you can create the content that will be used within the module.', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'thumbs_gallery_item_content',
				'dynamic_content' => 'text',
				'mobile_options'  => true,
				'hover'           => 'tabs',
			),
            'thumbs_gallery_top_image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'dnxte-divi-essential'),
                'choose_text' => esc_attr__('Choose an Image', 'dnxte-divi-essential'),
                'update_text' => esc_attr__('Set As Image', 'dnxte-divi-essential'),
                'description' => esc_html__('Upload an image to display at the top of your blurb.', 'dnxte-divi-essential'),
                'toggle_slug' => 'thumbs_gallery_image_toggle',
                'dynamic_content' => 'image',
                'data_type' => 'image',
                'mobile_options' => true,
            ),
            'thumbs_gallery_top_alt' => array(
                'label' => esc_html__('Image Alt', 'dnxte-divi-essential'),
                'type' => 'text',
                'dynamic_content' => 'text',
                'default' => 'Logo Item',
                'option_category' => 'basic_option',
                'description' => esc_html__('Text entered here will appear as title.', 'dnxte-divi-essential'),
                'toggle_slug' => 'thumbs_gallery_image_toggle',
            ),
            'dnext_thumbs_gallery_content_margin'	=> array(
				'label'           		=> esc_html__('Content Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
                'toggle_slug'     		=> 'margin_padding',
            ),
            'dnext_thumbs_gallery_content_padding'	=> array(
				'label'           		=> esc_html__('Content Padding', 'dnxte-divi-essential'),
                'type'            		=> 'custom_padding',
                'default'               => '60px|0|0|0',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
                'toggle_slug'     		=> 'margin_padding',
            ),
            'dnext_thumbs_gallery_title_margin'	=> array(
				'label'           		=> esc_html__('Title Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
                'toggle_slug'     		=> 'margin_padding',
            ),
            'dnext_thumbs_gallery_title_padding'	=> array(
				'label'           		=> esc_html__('Title Padding', 'dnxte-divi-essential'),
                'type'            		=> 'custom_padding',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
                'toggle_slug'     		=> 'margin_padding',
            ),
            'dnext_thumbs_gallery_desc_margin'	=> array(
				'label'           		=> esc_html__('Description Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
                'toggle_slug'     		=> 'margin_padding',
            ),
            'dnext_thumbs_gallery_desc_padding'	=> array(
				'label'           		=> esc_html__('Description Padding', 'dnxte-divi-essential'),
                'type'            		=> 'custom_padding',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
                'toggle_slug'     		=> 'margin_padding',
            ),
            'dnext_thumbs_button_margin'	=> array(
				'label'           		=> esc_html__('Button Margin', 'dnxte-divi-essential'),
                'type'            		=> 'custom_margin',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
                'toggle_slug'     		=> 'margin_padding',
            ),
            'dnext_thumbs_button_padding'	=> array(
				'label'           		=> esc_html__('Button Padding', 'dnxte-divi-essential'),
                'type'            		=> 'custom_padding',
                'mobile_options'  		=> true,
				'hover'           		=> 'tabs',
				'allowed_units'   		=> array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
                'option_category' 		=> 'layout',
                'tab_slug'        		=> 'advanced',
                'toggle_slug'     		=> 'margin_padding',
            ),
        );
        $button_fields = array(
            'dnxte_thumbs_gallery_button_text'         => array(
                'label'           => esc_html__('Button Text', 'dnxte-divi-essential'),
                'type'            => 'text',
                'dynamic_content' => 'text',
                'option_category' => 'basic_option',
                'description'     => esc_html__('Thumbs Gallery Button text entered here.', 'dnxte-divi-essential'),
                'toggle_slug'     => 'thumbs_gallery_item_content',
                'mobile_options'  => true,
				'hover'           => 'tabs',
            ),
            'dnxte_thumbs_gallery_button_url'       => array(
				'label'           => esc_html__( 'Button Link URL', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the destination URL for your button.', 'dnxte-divi-essential' ),
				'toggle_slug'     => 'link_options',
				'dynamic_content' => 'url',
			),
			'dnxte_thumbs_gallery_url_new_window'   => array(
				'label'            => esc_html__( 'Button Link Target', 'dnxte-divi-essential' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'In The Same Window', 'dnxte-divi-essential' ),
					'on'  => esc_html__( 'In The New Tab', 'dnxte-divi-essential' ),
				),
				'toggle_slug'      => 'link_options',
				'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'dnxte-divi-essential' ),
				'default_on_front' => 'off',
			),
            'use_dnxte_custom_button_style' => array(
                'label'           => esc_html__( 'Use Custom Styles For Button', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'dnxte_button',
                'description'     => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),                                                
                'options'         => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'affects'         => array(
                    'use_dnxte_button_icon'
                ),
                'default'          => 'off',
                'default_on_front' => 'off',
            ),
            'use_dnxte_button_icon' => array(
                'label'       => esc_html__( 'Show Button Icon', 'dnxte-divi-essential'),
                'type'        => 'yes_no_button',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'dnxte_button',
                'description' => esc_html__( 'Content entered here will appear inside the module.', 'dnxte-divi-essential' ),
                'options'     => array(
                    'on'  => esc_html__( 'Yes', 'dnxte-divi-essential' ),
                    'off' => esc_html__( 'No', 'dnxte-divi-essential' ),
                ),
                'affects'         => array(
                    'dnxte_thumbs_button_icon',
                    'dnxte_thumbs_btn_icon_placement',
                    'dnxte_thumbs_btn_on_hover',
                    'button_bg_color_',
                    'dnxte_button_box_shadow',
                ),
                'default' => 'off',
                'default_on_front' => 'off',
            ),
			'dnxte_thumbs_button_icon' 	  => array(
				'label'               => esc_html__( 'Icon', 'dnxte-divi-essential' ),
				'type'                => 'select_icon',
				'default'             => '5||divi',
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'dnxte_button',
				'class'               => array( 'et-pb-font-icon' ),
				'description'         => esc_html__( 'Choose an icon to display with your blurb.', 'dnxte-divi-essential' ),
                'depends_show_if_not' => 'off',
                'mobile_options'      => true,
				'hover'               => 'tabs',
			),
            'dnxte_thumbs_btn_icon_placement' => array(
                'label'               => esc_html__('Button Icon Placement', 'dnxte-divi-essential'),
                'description'         => esc_html__('Choose where the button icon should be displayed within the button.', 'dnxte-divi-essential'),
                'type'                => 'select',
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'dnxte_button',
                'option_category'     => 'button',
                'options'             => array(
                    'right' => esc_html__('Right', 'dnxte-divi-essential'),
                    'left'  => esc_html__('Left', 'dnxte-divi-essential'),
                ),
                'default'             => 'right',
                'depends_show_if_not' => 'off',
            ),
            'dnxte_thumbs_btn_on_hover' => array(
                'label'               => esc_html__( 'Only Show Icon On Hover for Button', 'dnxte-divi-essential' ),
                'description'         => esc_html__( 'By default, button icons are displayed on hover. If you would like button icons to always be displayed, then you can enable this option.', 'dnxte-divi-essential' ),
                'type'                => 'yes_no_button',
                'option_category'     => 'button',
                'default'             => 'on',
                'options'             => array(
                    'on'  => et_builder_i18n( 'Yes' ),
                    'off' => et_builder_i18n( 'No' ),
                ),
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'dnxte_button',
                'depends_show_if_not' => 'off',
                'mobile_options'      => true,
            ),
        );

        $deps = array(
            'hover' => 'tabs',
            'description' => esc_html__('Adjust the background style of the button by customizing the background color and gradient.', 'dnxte-divi-essential'),
            'show_if' => array(
                'use_dnxte_custom_button_style' => 'on',
            ),
        );
        $button_bg = Common::background_fields(
            $this, 
            "button_bg_color_", 
            "Button Background Color", 
            "dnxte_button", 
            "advanced",
            $deps
        );

        

        return array_merge(
            $fields, 
            $button_fields,
            $button_bg
        );
    }

    private function render_bottom_slider($render_slug) {
        global $thumbs_gallery_bottom;
        $module_order_class = self::get_module_order_class( $render_slug );
        $attachment_class = Common::get_image_attachments_class('thumbs_gallery_top_image', $this->props);

        $bottom_slider = sprintf(
            '<div href="%1$s" class="dnext-thumbs-gallery-top-image-link" data-title="%3$s"><img class="img-fluid %4$s" alt="%2$s" src="%1$s"/></div>',
            $this->props['thumbs_gallery_top_image'],
            $this->props['thumbs_gallery_top_alt'],
            $this->props['dnxte_thumbs_gallery_title'],
            esc_attr($attachment_class)
        );

        $thumbs_gallery_bottom[$module_order_class] = $this->_render_module_wrapper($bottom_slider);
        
        return;
    }

    public function render($attrs, $content, $render_slug)
    {
        $multi_view	    = et_pb_multi_view_options( $this );
        $this->render_bottom_slider($render_slug);
        $dnxte_thumbs_gallery_title   = $this->props['dnxte_thumbs_gallery_title'];
        $button_text                  = $this->props['dnxte_thumbs_gallery_button_text'];
        $use_custom_button_style      = $this->props['use_dnxte_custom_button_style'];
        $use_dnxte_button_icon        = $this->props['use_dnxte_button_icon'];
        $button_url                   = $this->props['dnxte_thumbs_gallery_button_url'];
        $url_new_window               = $this->props['dnxte_thumbs_gallery_url_new_window'];
        $header_level                   = $this->props['header_level'];

        $custom_icon_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxte_thumbs_button_icon' );
		$custom_icon        = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
        $custom_icon_tablet = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone  = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';


        // Nothing to output if neither Button Text nor Button URL defined
	    if( $button_url !== null){
		    $button_url = trim( $button_url ?? '' ); // phpcs:ignore 
	    }

        // Render Button
		$dnxte_button = $this->render_button_icon(
			array(
				'dnxte_button_classname'    => array(self::get_module_order_class( $render_slug )),
				'dnxte_button_text'         => $button_text,
				'dnxte_button_url'          => $button_url,
				'dnxte_button_custom'       => $use_custom_button_style,
				'dnxte_button_text_escaped' => true,
                'dnxte_has_wrapper'         => true,
                'dnxte_custom_icon'         => 'on'=== $this->props['use_dnxte_button_icon'] ? $custom_icon : '',
				'dnxte_custom_icon_tablet'  => 'on'=== $this->props['use_dnxte_button_icon'] ? $custom_icon_tablet : '',
				'dnxte_custom_icon_phone'   => 'on'=== $this->props['use_dnxte_button_icon'] ? $custom_icon_phone : '' ,
				'dnxte_url_new_window'      => $url_new_window,
                'dnxte_multi_view_data'     => $multi_view->render_attrs(
					array(
                        'content'        => '{{dnxte_thumbs_gallery_button_text}}',
						'hover_selector' => '%%order_class%%.dnxte-button',
						'visibility'     => array(
							'dnxte_thumbs_gallery_button_text' => '__not_empty',
						),
					)
				),
			)
		);

        $desc = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '{{dnxte_thumbs_gallery_content}}',
			)
		);

        $this->dnxte_button_apply_css( $render_slug );
        $this->apply_background_css( $render_slug );

        $top_image_attachment_class = Common::get_image_attachments_class('thumbs_gallery_top_image', $this->props);
        $output = sprintf(
            '<a href="%1$s" class="dnext-thumbs-gallery-top-image-link" data-title="%3$s"><img class="img-fluid %7$s" alt="%2$s" src="%1$s"/></a>
            <div class="dnxte_thumbs_gallery_content">
                <%6$s class="dnxte_thumbs_gallery_title">%3$s</%6$s>
                <div class="dnxte_thumbs_gallery_description">%4$s</div>
                %5$s
            </div>',
            $this->props['thumbs_gallery_top_image'],
            $this->props['thumbs_gallery_top_alt'],
            et_core_esc_previously($dnxte_thumbs_gallery_title),
            $this->process_content($desc),
            $dnxte_button, //#5
            et_pb_process_header_level($header_level, 'h3'),
            esc_attr( $top_image_attachment_class ) 
        );
        return $output;
    }

    public function dnxte_button_apply_css( $render_slug ) {

        // If you use Button Icon
        if ( 'on' === $this->props['use_dnxte_custom_button_style'] ) {
            
            $icon_fontawesome = explode('||', $this->props['dnxte_thumbs_button_icon']);
            $icon_fontawesome_values = et_pb_responsive_options()->get_property_values( $this->props, 'dnxte_thumbs_button_icon' );
            $icon_fontawesome_tablet = (isset($icon_fontawesome_values['tablet']) ) ? explode( '||', $icon_fontawesome_values['tablet'] ) : '';
            $icon_fontawesome_phone = (isset($icon_fontawesome_values['phone']) && "" != $icon_fontawesome_values['phone']) ? explode( '||', $icon_fontawesome_values['phone'] ) : '';

            //var_dump($icon_fontawesome);
            $fontaswesome_style        = isset( $icon_fontawesome[2] ) ? sprintf('font-family: FontAwesome; font-weight: %1$s;content: attr(data-icon);', esc_attr($icon_fontawesome[2])) : '';
            $fontaswesome_style_tablet = isset( $icon_fontawesome_tablet[2] ) ? sprintf('font-family: FontAwesome; font-weight: %1$s;content: attr(data-icon-tablet);', esc_attr($icon_fontawesome_tablet[2])) : '';
            $fontaswesome_style_phone = isset($icon_fontawesome_phone[2]) ? sprintf('font-family: FontAwesome; font-weight: %1$s;content: attr(data-icon-phone);', esc_attr($icon_fontawesome_phone[2])) : '';
            
            $divifont_style = 'font-weight: 400;font-family: ETmodules;content: attr(data-icon);';
            $divifont_style_tablet = 'font-weight: 400;font-family: ETmodules;content: attr(data-icon-tablet);';
            $divifont_style_phone = 'font-weight: 400;font-family: ETmodules;content: attr(data-icon-phone);';

            $font_style = isset( $icon_fontawesome[1] ) && 'fa' === $icon_fontawesome[1] ? $fontaswesome_style : $divifont_style;
            $font_style_tablet = isset( $icon_fontawesome_tablet[1] ) && 'fa' === $icon_fontawesome_tablet[1] ? $fontaswesome_style_tablet : $divifont_style_tablet;
            $font_style_phone = isset( $icon_fontawesome_phone[1] ) && 'fa' === $icon_fontawesome_phone[1] ? $fontaswesome_style_phone : $divifont_style_phone;

            
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => '%%order_class%% .dnxte-button:before, %%order_class%% .dnxte-button:after',
                    'declaration' => $font_style,
                ) );
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => '%%order_class%% .dnxte-button:before, %%order_class%% .dnxte-button:after',
                    'declaration' => $font_style_tablet,
                    'media_query'   => ET_Builder_Element::get_media_query('max_width_980')
                ) );
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => '%%order_class%% .dnxte-button:before, %%order_class%% .dnxte-button:after',
                    'declaration' => $font_style_phone,
                    'media_query'   => ET_Builder_Element::get_media_query('max_width_767')
                ) );

            // Button Icon Placement for Before
            if ( 'right' === $this->props['dnxte_thumbs_btn_icon_placement'] ) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => '%%order_class%% .dnxte-button:before',
                    'declaration' => "display: none;"
                ) );
                if( 'on' === $this->props['use_dnxte_button_icon'] && 'off' === $this->props['dnxte_thumbs_btn_on_hover']){
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%:after',
                        'declaration' => "opacity: 1;margin-left: 0.3em;left: auto;"
                    ) );
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%',
                        'declaration' => "padding-right: 2em;padding-left: 0.7em;"
                    ) );
                    
                }else if('on' === $this->props['use_dnxte_button_icon'] && 'off' === $this->props['dnxte_thumbs_btn_on_hover']){
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%',
                        'declaration' => "padding: 0.3em 2em 0.3em 0.7em;"
                    ) );
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%:after',
                        'declaration' => "opacity: 1; margin-left: 0.3em;"
                    ) );
                }else if('on' === $this->props['use_dnxte_button_icon'] && 'on' === $this->props['dnxte_thumbs_btn_on_hover']) {
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%:hover',
                        'declaration' => "padding-left: 0.7em; padding-right: 2em;left-right:tf"
                    ) );
                }else if( 'off' === $this->props['use_dnxte_button_icon'] ){
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%',
                        'declaration' => "padding: 0.3em 1em!important"
                    ) );
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '%%order_class%% .dnxte-button:before',
                        'declaration' => "display: none;"
                    ) );
                }
            }

            // Button Icon Placement for After
            if ( 'left' === $this->props['dnxte_thumbs_btn_icon_placement']) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => '%%order_class%% .dnxte-button:after',
                    'declaration' => "display: none;"
                ) );
                if('on' === $this->props['use_dnxte_button_icon'] && 'off' === $this->props['dnxte_thumbs_btn_on_hover'] ){
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%:before',
                        'declaration' => "opacity: 1;margin-left: -1.3em;right: auto;"
                    ) );
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%',
                        'declaration' => "padding-right: 0.7em; padding-left: 2em;right-left:db;"
                    ) );
                }else if('on' === $this->props['use_dnxte_button_icon'] && 'off' === $this->props['dnxte_thumbs_btn_on_hover']){
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%',
                        'declaration' => "padding:.3em 0.7em .3em 2em;padding:db"
                    ) );
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%:before',
                        'declaration' => "opacity: 1; margin-left: -1.3em;"
                    ) );
                }else if('on' === $this->props['use_dnxte_button_icon'] && 'on' === $this->props['dnxte_thumbs_btn_on_hover']){
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%:hover',
                        'declaration' => "padding-right: 0.7em; padding-left: 2em;right-left-hover:db"
                    ) );
                }else if( 'off' === $this->props['use_dnxte_button_icon'] ){
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '.dnxte-button%%order_class%%',
                        'declaration' => "padding:0.3em 1em!important;"
                    ) );
                    ET_Builder_Element::set_style($render_slug, array(
                        'selector'    => '%%order_class%% .dnxte-button:after',
                        'declaration' => "display: none;"
                    ) );
                }
            }
        }else {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => '%%order_class%% .dnxte-button:after,%%order_class%% .dnxte-button:before',
                'declaration' => "display: none;"
            ) );
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => '.dnxte-button%%order_class%%',
                'declaration' => "padding: 0.3em 1em!important;"
            ) );
        }

        Common::dnxt_set_style($render_slug, $this->props, "dnext_thumbs_gallery_content_margin", "%%order_class%% .dnxte_thumbs_gallery_content", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnext_thumbs_gallery_content_padding", "%%order_class%% .dnxte_thumbs_gallery_content", "padding");
    
        Common::dnxt_set_style($render_slug, $this->props, "dnext_thumbs_gallery_title_margin", "%%order_class%% .dnxte_thumbs_gallery_title", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnext_thumbs_gallery_title_padding", "%%order_class%% .dnxte_thumbs_gallery_title", "padding");
    
        Common::dnxt_set_style($render_slug, $this->props, "dnext_thumbs_gallery_desc_margin", "%%order_class%% .dnxte_thumbs_gallery_description", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnext_thumbs_gallery_desc_padding", "%%order_class%% .dnxte_thumbs_gallery_description", "padding");
        
        Common::dnxt_set_style($render_slug, $this->props, "dnext_thumbs_button_margin", "%%order_class%% .dnxte-button", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "dnext_thumbs_button_padding", "%%order_class%% .dnxte-button", "padding");
        
    }


    public function apply_background_css($render_slug)
    {
        $gradient_opt = array(
            'button_bg_color_' => array(
                "desktop" => "%%order_class%% .dnxte-button",
                "hover" => "%%order_class%% .dnxte-button:hover",
            ),

        );
        Common::apply_all_bg_css($gradient_opt, $render_slug, $this);
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

new Divi_NextThumbsGalleryChild;