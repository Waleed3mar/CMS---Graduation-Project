<?php
include_once(DIVI_ESSENTIAL_PATH.'/includes/modules/base/Common.php');

class Divi_Nxte3dCubeSliderChild extends ET_Builder_Module
{
    public $slug = 'dnxte_3dcubeslider_child';
    public $vb_support = 'on';
    public $type = 'child';
    public $child_title_var = 'title';
    public $child_title_fallback_var = 'cubeslider_alt';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-3d-cube-slider/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name = esc_html__('Slider Item', 'dnxte-divi-essential');

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'cubeslider_image_toggle' => esc_html__('Image', 'dnxte-divi-essential'),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'cubeslider_heading_settings' => esc_html__('Heading Settings', 'dnxte-divi-essential'),
                    'cubeslider_content_settings' => esc_html__('Content Settings', 'dnxte-divi-essential')
                )
            )
        );

        $this->custom_css_fields = array(
            'image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .img-fluid',
            ),
            'heading' => array(
                'label' => esc_html__('Heading', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-3dcubeslider-heading',
            ),
            'content' => array(
                'label' => esc_html__('Content', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-3dcubeslider-pra',
            ),
        );

    }
    public function get_advanced_fields_config()
    {
        return array(
            'text' => false,
            'fonts' => array(
                'header' => array(
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-3dcubeslider-heading',
                        'important' => 'all'
                    ),
                    'header_level' => array(
                        'default' => 'h3',
                    ),
                    'toggle_slug' => 'cubeslider_heading_settings'
                ),
                'content' => array(
                    'label_prefix' => esc_html__("Content", 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-3dcubeslider-pra',
                        'important' => 'all'
                    ),
                    'toggle_slug' => 'cubeslider_content_settings'
                )
            ),
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
                'heading' => array(
                    'label_prefix' => esc_html__("Heading", 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => array(
                            "border_radii" => "%%order_class%% .dnxte-3dcubeslider-heading",
                            'border_styles' => '%%order_class%% .dnxte-3dcubeslider-heading',
                        ),
                        'important' => 'all'
                    ),
                    'toggle_slug' => 'cubeslider_heading_settings'
                ),
                'content' => array(
                    'label_prefix' => esc_html__("Content", 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => array(
                            "border_radii" => "%%order_class%% .dnxte-3dcubeslider-pra",
                            'border_styles' => '%%order_class%% .dnxte-3dcubeslider-pra',
                        ),
                        'important' => 'all'
                    ),
                    'toggle_slug' => 'cubeslider_content_settings'
                )
            ),
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% .img-fluid',
                        'important' => 'all',
                    ),
                ),
                'heading' => array(
                    'label_prefix' => esc_html__("Heading", 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-3dcubeslider-heading',
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'cubeslider_heading_settings'
                ),
                'content' => array(
                    'label_prefix' => esc_html__("Content", 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-3dcubeslider-pra',
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'cubeslider_content_settings'
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'main' => '%%order_class%% .img-fluid',
                ),
                'important' => 'all',
            ),
            'background' => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
                // 'css' => array(
                //     'main' => "%%order_class%% .img-fluid",
                //     'important' => 'all',
                // ),
            ),
            'max_width' => false,
        );
    }

    public function get_fields()
    {
        return array(
            'cubeslider_title' => array(
                'label' => esc_html__('Heading', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input Pre Heading text', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
            ),
            'cubeslider_content' => array(
                'label' => esc_html__('Content', 'dnxte-divi-essential'),
                'type' => 'tiny_mce',
                'option_category' => 'basic_option',
                'toggle_slug' => 'main_content',
            ),
            'cubeslider_image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'dnxte-divi-essential'),
                'choose_text' => esc_attr__('Choose an Image', 'dnxte-divi-essential'),
                'update_text' => esc_attr__('Set As Image', 'dnxte-divi-essential'),
                'description' => esc_html__('Upload an image to display at the top of your blurb.', 'dnxte-divi-essential'),
                'toggle_slug' => 'cubeslider_image_toggle',
                'dynamic_content' => 'image',
                'data_type' => 'image',
                'mobile_options' => true,
            ),
            'cubeslider_alt' => array(
                'label' => esc_html__('Image Alt', 'dnxte-divi-essential'),
                'type' => 'text',
                'dynamic_content' => 'text',
                'default' => 'Slider Item',
                'option_category' => 'basic_option',
                'description' => esc_html__('Text entered here will appear as title.', 'dnxte-divi-essential'),
                'toggle_slug' => 'cubeslider_image_toggle',
            ),
            'cubeslider_content_horizontal' => array(
                'label' => esc_html__('Horizontal Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the position of the offer.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'cubeslider_content_settings',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '0%',
                'default_unit' => '%',
                'default_on_front' => '0%',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '-100',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'cubeslider_content_vertical' => array(
                'label' => esc_html__('Vertical Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the position of the offer.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'cubeslider_content_settings',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '50%',
                'default_unit' => '%',
                'default_on_front' => '50%',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'cubeslider_heading_margin' => array(
                'label' => esc_html__('Heading Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'cubeslider_heading_padding' => array(
                'label' => esc_html__('Heading Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'cubeslider_content_margin' => array(
                'label' => esc_html__('Content Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'cubeslider_content_padding' => array(
                'label' => esc_html__('Content Padding', 'dnxte-divi-essential'),
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
        $multi_view         = et_pb_multi_view_options($this);
        $content            = $this->props['cubeslider_content'];
        
        $cubeslider_title   = "";
        if($multi_view->has_value('cubeslider_title')) {
            $cubeslider_title = $multi_view->render_element(array(
                'tag' => et_pb_process_header_level($this->props['header_level'], 'h3'),
                'content' => '{{cubeslider_title}}',
                'attrs' => array(
                    'class' => 'dnxte-3dcubeslider-heading'
                )
            ));
        }

        $cubeslider_content = "";
        if($multi_view->has_value('cubeslider_content')) {
            $cubeslider_content = $multi_view->render_element(array(
                'content' => '{{cubeslider_content}}',
                'tag' => 'div',
                'attrs'  => array(
                    'class' => 'dnxte-3dcubeslider-pra'
                )
            ));
        }

        // Content Position
        $content_horizontal = $this->props['cubeslider_content_horizontal'];
        $content_horizontal_values = et_pb_responsive_options()->get_property_values($this->props, 'cubeslider_content_horizontal');
        $content_horizontal_tablet = isset($content_horizontal_values['tablet']) ? $content_horizontal_values['tablet'] : '';
        $content_horizontal_phone = isset($content_horizontal_values['phone']) ? $content_horizontal_values['phone'] : '';
        $content_horizontal_hover = $this->get_hover_value('cubeslider_content_horizontal');

        $content_vertical = $this->props['cubeslider_content_vertical'];
        $content_vertical_values = et_pb_responsive_options()->get_property_values($this->props, 'cubeslider_content_vertical');
        $content_vertical_tablet = isset($content_vertical_values['tablet']) ? $content_vertical_values['tablet'] : '';
        $content_vertical_phone = isset($content_vertical_values['phone']) ? $content_vertical_values['phone'] : '';
        $content_vertical_hover = $this->get_hover_value('cubeslider_content_vertical');

        if ("" !== $content_horizontal || "" !== $content_vertical) {
            $content_position_style = sprintf('left: %1$s;top: %2$s;', esc_attr($content_horizontal), esc_attr($content_vertical));
            $content_position_style_tablet = sprintf('left: %1$s;top: %2$s;', esc_attr($content_horizontal_tablet), esc_attr($content_vertical_tablet));

            $content_position_style_phone = sprintf('left: %1$s;top: %2$s;', esc_attr($content_horizontal_phone), esc_attr($content_vertical_phone));
            $content_position_style_hover = "";

            if (et_builder_is_hover_enabled('cubeslider_content_horizontal', $this->props) || et_builder_is_hover_enabled('cubeslider_content_vertical', $this->props)) {
                $content_position_style_hover = sprintf('left: %1$s;top: %2$s;', esc_attr($content_horizontal_hover), esc_attr($content_vertical_hover));
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-3dcubeslider-multitext",
                'declaration' => $content_position_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-3dcubeslider-multitext",
                'declaration' => $content_position_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-3dcubeslider-multitext",
                'declaration' => $content_position_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $content_position_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $this->add_hover_to_order_class("%%order_class%% .dnxte-3dcubeslider-multitext:hover"),
                    'declaration' => $content_position_style_hover,
                ));
            }
        }
        // Content position end
        
        $this->apply_css($render_slug);
        $image_attachment_class = Common::get_image_attachments_class('cubeslider_image', $this->props);
        return sprintf(
            '<img class="img-fluid swiper-lazy %5$s" alt="%2$s" src="%1$s"/>
            <div class="dnxte-3dcubeslider-multitext">
                %3$s
                %4$s
            </div>
            ',
            $this->props['cubeslider_image'],
            esc_attr($this->props['cubeslider_alt']),
            $cubeslider_title,
            $cubeslider_content !== '' ? $this->process_content($cubeslider_content) : '',
            esc_attr($image_attachment_class)
        );
    }

    public function apply_css($render_slug)
    {

        /**
         * Custom Padding Margin Output
         *
         */
        Common::dnxt_set_style($render_slug, $this->props, "cubeslider_heading_margin", "%%order_class%% .dnxte-3dcubeslider-heading", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "cubeslider_heading_padding", "%%order_class%% .dnxte-3dcubeslider-heading", "padding");

        Common::dnxt_set_style($render_slug, $this->props, "cubeslider_content_margin", "%%order_class%% .dnxte-3dcubeslider-pra", "margin");
        Common::dnxt_set_style($render_slug, $this->props, "cubeslider_content_padding", "%%order_class%% .dnxte-3dcubeslider-pra", "padding");
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

new Divi_Nxte3dCubeSliderChild;
