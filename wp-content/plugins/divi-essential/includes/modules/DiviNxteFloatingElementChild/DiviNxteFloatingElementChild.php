<?php

class Divi_NxteFloatingElementChild extends ET_Builder_Module
{
    public $slug = 'dnxte_floating_element_child';
    public $vb_support = 'on';
    public $type = 'child';
    public $child_title_var = 'floting_shape_alt';
    public $child_title_fallback_var = 'floting_shape_alt';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-floating-elements/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name = esc_html__('Floating Item', 'dnxte-divi-essential');

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'floting_shape_content_toggle' => esc_html__('Content', 'dnxte-divi-essential'),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'floting_shape_animation_settings' => esc_html__('Animation Settings', 'dnxte-divi-essential'),
                    'floting_shape_image_settings' => esc_html__('Image Settings', 'dnxte-divi-essential'),
                    'floting_shape_title_settings' => esc_html__('Title Settings', 'dnxte-divi-essential'),
                ),
            ),
        );

        $this->custom_css_fields = array(
            'image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-floting-image',
            ),
            'title' => array(
                'label' => esc_html__('Text', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte-floting-text',
            ),
        );
    }

    public function get_advanced_fields_config()
    {
        return array(
            'text' => false,
            'fonts' => array(
                'text' => array(
                    'label' => esc_html__('Title', 'dnxte-divi-essential'),
                    'hide_text_align' => true,
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-floting-text',
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'floting_shape_title_settings',
                ),
            ),
            'borders' => array(
                'image' => array(
                    'label_prefix' => esc_html__('Image', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-floting-image",
                            'border_styles' => "%%order_class%% .dnxte-floting-image",
                        ),
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'floting_shape_image_settings',
                ),
                'title' => array(
                    'label_prefix' => esc_html__('Title', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-floting-text",
                            'border_styles' => "%%order_class%% .dnxte-floting-text",
                        ),
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'floting_shape_title_settings',
                ),
            ),
            'box_shadow' => array(
                'image' => array(
                    'label_prefix' => esc_html__('Image', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'floting_shape_image_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-floting-image',
                        'important' => true,
                        'custom_style' => true,
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
                'title' => array(
                    'label_prefix' => esc_html__('Title', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'floting_shape_title_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-floting-text',
                        'important' => true,
                        'custom_style' => true,
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
            ),
            'background' => false,
            'max_width' => array(
                'options' => array(
                    'max_width' => array(
                        'default' => '50%',
                    ),
                ),
            ),
            'height' => array(
                'css' => array(
                    'main' => '%%order_class%% img',
                    'important' => true,
                ),
            ), 
            'margin_padding' => false,
        );
    }

    public function get_fields()
    {
        return array(
            'floting_shape_use_image' => array(
                'label' => esc_html__('Use Image', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'floting_shape_content_toggle',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
                    'floting_shape_image',
                    'floting_shape_alt',
                    'dnxte_floting_shape_image_margin',
                    'dnxte_floting_shape_image_padding',
                ),
                'default' => 'on',
                'default_on_front' => 'on',
            ),
            'floting_shape_image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'dnxte-divi-essential'),
                'choose_text' => esc_attr__('Choose an Image', 'dnxte-divi-essential'),
                'update_text' => esc_attr__('Set As Image', 'dnxte-divi-essential'),
                'description' => esc_html__('Upload an image to display at the top of your blurb.', 'dnxte-divi-essential'),
                'toggle_slug' => 'floting_shape_content_toggle',
                'dynamic_content' => 'image',
                'data_type' => 'image',
                'mobile_options' => true,

            ),
            'floting_shape_alt' => array(
                'label' => esc_html__('Image Alt', 'dnxte-divi-essential'),
                'type' => 'text',
                'dynamic_content' => 'text',
                'default' => 'Floating Item',
                'option_category' => 'basic_option',
                'description' => esc_html__('Text entered here will appear as title.', 'dnxte-divi-essential'),
                'toggle_slug' => 'floting_shape_content_toggle',

            ),
            'floting_shape_use_text' => array(
                'label' => esc_html__('Use Text', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'toggle_slug' => 'floting_shape_content_toggle',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
                    'floting_shape_text',
                    'dnxte_floting_shape_title_margin',
                    'dnxte_floting_shape_title_padding',
                ),
                'default' => 'off',
                'default_on_front' => 'off',
                'show_if' => array(
                    'floting_shape_use_image' => 'off',
                ),
            ),
            'floting_shape_text' => array(
                'label' => esc_html__('Text', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input text', 'dnxte-divi-essential'),
                'toggle_slug' => 'floting_shape_content_toggle',
                'dynamic_content' => 'text',
            ),
            'dnxte_floting_shape_default_effects' => array(
                'label' => esc_html__('Use Default Animation', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the floting shape effect', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'floting_shape_animation_settings',
                'options' => array(
                    'one' => esc_html__('Effect 1', 'dnxte-divi-essential'),
                    'two' => esc_html__('Effect 2', 'dnxte-divi-essential'),
                    'three' => esc_html__('Up Down', 'dnxte-divi-essential'),
                    'four' => esc_html__('Move Left/Right', 'dnxte-divi-essential'),
                    'five' => esc_html__('Pulse', 'dnxte-divi-essential'),
                    'six' => esc_html__('Left/Right', 'dnxte-divi-essential'),
                    'seven' => esc_html__('Rotate', 'dnxte-divi-essential'),
                    'custom' => esc_html__('Custom', 'dnxte-divi-essential'),
                ),
                'default' => 'three',
            ),
            'dnxte_floting_shape_effects' => array(
                'label' => esc_html__('Floting Effect', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the floting shape effect', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'floting_shape_animation_settings',
                'options' => array(
                    'dnxtefltmoveone' => esc_html__('Effect 1', 'dnxte-divi-essential'),
                    'dnxtefltmovetwo' => esc_html__('Effect 2', 'dnxte-divi-essential'),
                    'dnxtefltmoveupdown' => esc_html__('Up Down', 'dnxte-divi-essential'),
                    'dnxtefltmovelftright' => esc_html__('Move Left/Right', 'dnxte-divi-essential'),
                    'dnxtefltpulse' => esc_html__('Pulse', 'dnxte-divi-essential'),
                    'dnxtefltleftright' => esc_html__('Left/Right', 'dnxte-divi-essential'),
                    'dnxtefltrotate' => esc_html__('Rotate', 'dnxte-divi-essential'),
                ),
                'default' => 'dnxtefltmoveone',
                'show_if' => array(
                    'dnxte_floting_shape_default_effects' => 'custom',
                ),
            ),
            'dnxte_floting_shape_effects_count_number' => array(
                'label' => esc_html__('Iteration Count Number', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the iteration count number of the animation', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'floting_shape_animation_settings',
                'unitless' => true,
                'fixed_unit' => '',
                'validate_unit' => false,
                'default' => '10',
                'default_on_front' => '',
                'allow_empty' => false,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
                'show_if' => array(
                    'dnxte_floting_shape_effects_count' => 'number',
                ),
            ),
            'dnxte_floting_shape_effects_horizontal' => array(
                'label' => esc_html__('Horizontal Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the horizontal position of animation item.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'floting_shape_animation_settings',
                'allowed_units' => array('em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '0rem',
                'default_unit' => 'rem',
                'default_on_front' => '0rem',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'dnxte_floting_shape_effects_vertical' => array(
                'label' => esc_html__('Vertical Position', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the vertical position of animation item.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'floting_shape_animation_settings',
                'allowed_units' => array('em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '0rem',
                'default_unit' => 'rem',
                'default_on_front' => '0rem',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'dnxte_floting_shape_effects_duration' => array(
                'label' => esc_html__('Animation Duration', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the duration of the animation', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'floting_shape_animation_settings',
                'allowed_units' => array('s', 'ms'),
                'default' => '30s',
                'default_unit' => 's',
                'default_on_front' => '30s',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
                'show_if' => array(
                    'dnxte_floting_shape_default_effects' => 'custom',
                ),
            ),
            'dnxte_floting_shape_effects_direction' => array(
                'label' => esc_html__('Animation Direction', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select direction of the floting shape effect', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'floting_shape_animation_settings',
                'options' => array(
                    'normal' => esc_html__('Normal', 'dnxte-divi-essential'),
                    'reverse' => esc_html__('Reverse', 'dnxte-divi-essential'),
                    'alternate' => esc_html__('Alternate', 'dnxte-divi-essential'),
                    'alternate-reverse' => esc_html__('Alternate Reverse', 'dnxte-divi-essential'),
                    'initial' => esc_html__('Initial', 'dnxte-divi-essential'),
                    'inherit' => esc_html__('Inherit', 'dnxte-divi-essential'),
                ),
                'default' => 'alternate',
                'show_if' => array(
                    'dnxte_floting_shape_default_effects' => 'custom',
                ),
            ),
            'dnxte_floting_shape_effects_count' => array(
                'label' => esc_html__('Animation Iteration Count', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select direction of the floting shape effect', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'floting_shape_animation_settings',
                'options' => array(
                    'number' => esc_html__('Number', 'dnxte-divi-essential'),
                    'infinite' => esc_html__('Infinite', 'dnxte-divi-essential'),
                    'initial' => esc_html__('Initial', 'dnxte-divi-essential'),
                    'inherit' => esc_html__('Inherit', 'dnxte-divi-essential'),
                ),
                'default' => 'infinite',
                'show_if' => array(
                    'dnxte_floting_shape_default_effects' => 'custom',
                ),
            ),
            'dnxte_floting_shape_effects_count_number' => array(
                'label' => esc_html__('Iteration Count Number', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the iteration count number of the animation', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'floting_shape_animation_settings',
                'unitless' => true,
                'fixed_unit' => '',
                'validate_unit' => false,
                'default' => '10',
                'default_on_front' => '',
                'allow_empty' => false,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '100',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
                'show_if' => array(
                    'dnxte_floting_shape_effects_count' => 'number',
                ),
            ),
            'dnxte_floting_shape_effects_timing' => array(
                'label' => esc_html__('Animation Timing Effect', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select direction of the floting shape effect', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'floting_shape_animation_settings',
                'options' => array(
                    'ease' => esc_html__('Ease', 'dnxte-divi-essential'),
                    'ease-in' => esc_html__('Ease In', 'dnxte-divi-essential'),
                    'ease-out' => esc_html__('Ease Out', 'dnxte-divi-essential'),
                    'ease-in-out' => esc_html__('Ease In Out', 'dnxte-divi-essential'),
                    'linear' => esc_html__('Linear', 'dnxte-divi-essential'),
                ),
                'default' => 'linear',
                'show_if' => array(
                    'dnxte_floting_shape_default_effects' => 'custom',
                ),
            ),
        );
    }

    public function render($attrs, $content, $render_slug)
    {
        $dnxte_floting_shape_use_image = $this->props['floting_shape_use_image'];
        $dnxte_floting_shape_use_text = $this->props['floting_shape_use_text'];
        $dnxte_floting_shape_default_animation = $this->props['dnxte_floting_shape_default_effects'];

        $dnxte_floting_shape_image = $this->props['floting_shape_image'];
        $dnxte_floting_shape_image_alt = $this->props['floting_shape_alt'];
        $dnxte_floting_shape_text = $this->props['floting_shape_text'];

        // Animation settings
        $dnxte_floting_shape_effect = $this->props['dnxte_floting_shape_effects'];
        $dnxte_floting_shape_effect_duration = $this->props['dnxte_floting_shape_effects_duration'];
        $dnxte_floting_shape_effect_direction = $this->props['dnxte_floting_shape_effects_direction'];
        $dnxte_floting_shape_effect_timing = $this->props['dnxte_floting_shape_effects_timing'];
        $dnxte_floting_shape_effect_count = "";

        if ($this->props['dnxte_floting_shape_effects_count'] === "number") {
            $dnxte_floting_shape_effect_count = (int) $this->props['dnxte_floting_shape_effects_count_number'];
        } else {
            $dnxte_floting_shape_effect_count = $this->props['dnxte_floting_shape_effects_count'];
        }

        $dnxte_floting_shape_animation_style = sprintf('-webkit-animation: %1$s %2$s %3$s %4$s %5$s;
          animation: %1$s %2$s %3$s %4$s %5$s;', esc_attr($dnxte_floting_shape_effect), esc_attr($dnxte_floting_shape_effect_duration), esc_attr($dnxte_floting_shape_effect_direction), $dnxte_floting_shape_effect_count, esc_attr($dnxte_floting_shape_effect_timing));

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => "%%order_class%% .dnxte-fltshape",
            'declaration' => $dnxte_floting_shape_animation_style,
        ));
        // Animation settings end

        $handle_classes = "dnxte-fltshape";

        if ($dnxte_floting_shape_default_animation !== "custom") {
            $handle_classes .= "-" . $dnxte_floting_shape_default_animation;
        }

        if ($dnxte_floting_shape_use_image === "on") {
            $handle_classes .= " dnxte-floting-image";
        } else {
            $handle_classes .= " dnxte-floting-text";
        }

        $floting_item = "";
        if ($dnxte_floting_shape_use_image === "on") {
            $floating_item_attachment_class = Common::get_image_attachments_class('floting_shape_image', $this->props);
            $floting_item = sprintf('<img class="%3$s %4$s" src="%1$s" alt="%2$s" />', esc_attr($dnxte_floting_shape_image), esc_attr($dnxte_floting_shape_image_alt), esc_attr($handle_classes), esc_attr($floating_item_attachment_class));
        } elseif ($dnxte_floting_shape_use_text === "on") {
            $floting_item = sprintf('<div class="%2$s">%1$s</div>', esc_html__($dnxte_floting_shape_text, 'dnxte-divi-essential'), esc_attr($handle_classes));
        }

        // Animation Item Position
        $floating_item_horizontal = $this->props['dnxte_floting_shape_effects_horizontal'];
        $floating_item_horizontal_values = et_pb_responsive_options()->get_property_values($this->props, 'dnxte_floting_shape_effects_horizontal');
        $floating_item_horizontal_tablet = isset($floating_item_horizontal_values['tablet']) ? $floating_item_horizontal_values['tablet'] : '';
        $floating_item_horizontal_phone = isset($floating_item_horizontal_values['phone']) ? $floating_item_horizontal_values['phone'] : '';
        $floating_item_horizontal_hover = $this->get_hover_value('dnxte_floting_shape_effects_horizontal');

        $floating_item_vertical = $this->props['dnxte_floting_shape_effects_vertical'];
        $floating_item_vertical_values = et_pb_responsive_options()->get_property_values($this->props, 'dnxte_floting_shape_effects_vertical');
        $floating_item_vertical_tablet = isset($floating_item_vertical_values['tablet']) ? $floating_item_vertical_values['tablet'] : '';
        $floating_item_vertical_phone = isset($floating_item_vertical_values['phone']) ? $floating_item_vertical_values['phone'] : '';
        $floating_item_vertical_hover = $this->get_hover_value('dnxte_floting_shape_effects_vertical');

        if ("" !== $floating_item_horizontal || "" !== $floating_item_vertical) {
            $floating_item_position_style = sprintf('left: %1$s;top: %2$s;', esc_attr($floating_item_horizontal), esc_attr($floating_item_vertical));
            $floating_item_position_style_tablet = sprintf('left: %1$s;top: %2$s;', esc_attr($floating_item_horizontal_tablet), esc_attr($floating_item_vertical_tablet));

            $floating_item_position_style_phone = sprintf('left: %1$s;top: %2$s;', esc_attr($floating_item_horizontal_phone), esc_attr($floating_item_vertical_phone));
            $floating_item_position_style_hover = "";

            if (et_builder_is_hover_enabled('dnxte_floting_shape_effects_horizontal', $this->props) || et_builder_is_hover_enabled('dnxte_floting_shape_effects_vertical', $this->props)) {
                $floating_item_position_style_hover = sprintf('left: %1$s;top: %2$s;', esc_attr($floating_item_horizontal_hover), esc_attr($floating_item_vertical_hover));
            }

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-fltshape,%%order_class%% .dnxte-fltshape-one,%%order_class%% .dnxte-fltshape-two,%%order_class%% .dnxte-fltshape-three,%%order_class%% .dnxte-fltshape-four,%%order_class%% .dnxte-fltshape-five,%%order_class%% .dnxte-fltshape-six,%%order_class%% .dnxte-fltshape-seven",
                'declaration' => $floating_item_position_style,
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-fltshape,%%order_class%% .dnxte-fltshape-one,%%order_class%% .dnxte-fltshape-two,%%order_class%% .dnxte-fltshape-three,%%order_class%% .dnxte-fltshape-four,%%order_class%% .dnxte-fltshape-five,%%order_class%% .dnxte-fltshape-six,%%order_class%% .dnxte-fltshape-seven",
                'declaration' => $floating_item_position_style_tablet,
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));

            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxte-fltshape,%%order_class%% .dnxte-fltshape-one,%%order_class%% .dnxte-fltshape-two,%%order_class%% .dnxte-fltshape-three,%%order_class%% .dnxte-fltshape-four,%%order_class%% .dnxte-fltshape-five,%%order_class%% .dnxte-fltshape-six,%%order_class%% .dnxte-fltshape-seven",
                'declaration' => $floating_item_position_style_phone,
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));

            if ("" !== $floating_item_position_style_hover) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector' => $this->add_hover_to_order_class("%%order_class%% .dnxte-fltshape:hover,%%order_class%% .dnxte-fltshape-one:hover,%%order_class%% .dnxte-fltshape-two:hover,%%order_class%% .dnxte-fltshape-three:hover,%%order_class%% .dnxte-fltshape-four:hover,%%order_class%% .dnxte-fltshape-five:hover,%%order_class%% .dnxte-fltshape-six:hover,%%order_class%% .dnxte-fltshape-seven:hover"),
                    'declaration' => $floating_item_position_style_hover,
                ));
            }
        }
        // Animation Item position end

        return sprintf('%1$s', $floting_item);
    }
}

new Divi_NxteFloatingElementChild;
