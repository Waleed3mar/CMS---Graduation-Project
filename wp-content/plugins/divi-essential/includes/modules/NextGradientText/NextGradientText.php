<?php

class Next_Gradient_Text extends ET_Builder_Module
{

    public $slug = 'dnxte_gradient_text';
    public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-gradient-text/',
        'author'     => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name        = esc_html__('Next Text Gradient', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'dnxt_gradient_text' => esc_html__('Text', 'dnxte-divi-essential'),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'title_font' => array(
                        'title' => esc_html__('Fonts', 'dnxte-divi-essential'),
                        'priority' => 1,
                    ),
                    //Gradient Toggles
                    'gradient_text' => array(
                        'title' => esc_html__('Gradient Color', 'dnxte-divi-essential'),
                        'priority' => 2,
                    ),
                    //Text Reveal Effect
                    'text_reveal_effect' => array(
                        'title' => esc_html__('Reveal Effect', 'dnxte-divi-essential'),
                        'priority' => 3,
                    ),
                    // Hover Effect
                    'dnxt_text_hover_effect' => array(
                        'title' => esc_html__('Hover Effect', 'dnxte-divi-essential'),
                        'priority' => 4,
                    ),
                    // Border Toggles
                    'title_border' => array(
                        'title' => esc_html__('Border', 'dnxte-divi-essential'),
                        'priority' => 5,
                    ),
                ),
            ),
        );
        // Custom CSS Field
        $this->custom_css_fields = array(
            'gradient_title_css' => array(
                'label' => esc_html__('Title CSS', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxt-gradient-text',
            ),
        );
    }

    public function get_fields()
    {

        return array(
            // Title Field
            'gradient_title' => array(
                'label' => esc_html__('Gradient Title', 'dnxte-divi-essential'),
                'type' => 'text',
                'dynamic_content' => 'text',
                //'default'         => 'Gradient Heading Text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Title entered here will appear with gradient color.', 'dnxte-divi-essential'),
                'toggle_slug' => 'dnxt_gradient_text',
            ),
            // Heading Tag Option
            'heading_tag' => array(
                'label' => esc_html__('Select Heading Tag', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the heading tag, which you would like to use', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'toggle_slug' => 'dnxt_gradient_text',
                'options' => array(
                    'h1' => esc_html__('H1', 'dnxte-divi-essential'),
                    'h2' => esc_html__('H2', 'dnxte-divi-essential'),
                    'h3' => esc_html__('H3', 'dnxte-divi-essential'),
                    'h4' => esc_html__('H4', 'dnxte-divi-essential'),
                    'h5' => esc_html__('H5', 'dnxte-divi-essential'),
                    'h6' => esc_html__('H6', 'dnxte-divi-essential'),
                    'p' => esc_html__('P', 'dnxte-divi-essential'),
                    'span' => esc_html__('Span', 'dnxte-divi-essential'),
                ),
                'default' => 'h2',
            ),
            // Gradient Color One Select One
            'gradient_color_one_select_text' => array(
                'label' => esc_html__('Select Color One', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'tab_slug' => 'advanced',
                'description' => esc_html__('Choose the first color to blend with the second color from the color picker that suits your title text.', 'dnxte-divi-essential'),
                'toggle_slug' => 'gradient_text',
                'default' => '#0077FF',
            ),
            // Gradient Color Two Select Two
            'gradient_color_two_select_text' => array(
                'label' => esc_html__('Select Color Two', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'tab_slug' => 'advanced',
                'description' => esc_html__('Choose the second color to blend with the first color from the color picker that suits your title text.', 'dnxte-divi-essential'),
                'toggle_slug' => 'gradient_text',
                'default' => '#772ADB',
            ),
            // Gradient type text
            'gradient_type_text' => array(
                'label' => esc_html__('Select Gradient Type', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select a type of gradient for the Title Text.', 'dnxte-divi-essential'), 'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'gradient_text',
                'options' => array(
                    'linear-gradient' => esc_html__('Linear', 'dnxte-divi-essential'),
                    'radial-gradient' => esc_html__('Radial', 'dnxte-divi-essential'),
                ),
                'default' => 'linear-gradient',
            ),
            // Gradient Linear Type Direction
            'gradient_type_linear_direction_text' => array(
                'label' => esc_html__('Gradient direction', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'description' => esc_html__('Adjust the direction of the gradient for the title text.', 'dnxte-divi-essential'),
                'toggle_slug' => 'gradient_text',
                'range_settings' => array(
                    'step' => 1,
                    'min' => 1,
                    'max' => 360,
                ),
                'default' => '180deg',
                'fixed_unit' => 'deg',
                'validate_unit' => true,
                'show_if' => array(
                    'gradient_type_text' => 'linear-gradient',
                ),
            ),
            // Gradient Radial Type Selection
            'gradient_type_radial_direction_text' => array(
                'label' => esc_html__('Radial Direction', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Adjust the direction of the gradient for the title text.', 'dnxte-divi-essential'),
                'tab_slug' => 'advanced',
                'toggle_slug' => 'gradient_text',
                'options' => array(
                    'circle at center' => esc_html__('Center', 'dnxte-divi-essential'),
                    'circle at left' => esc_html__('Top Left', 'dnxte-divi-essential'),
                    'circle at top' => esc_html__('Top', 'dnxte-divi-essential'),
                    'circle at top right' => esc_html__('Top Right', 'dnxte-divi-essential'),
                    'circle at right' => esc_html__('Right', 'dnxte-divi-essential'),
                    'circle at bottom right' => esc_html__('Bottom Right', 'dnxte-divi-essential'),
                    'circle at bottom' => esc_html__('Bottom', 'dnxte-divi-essential'),
                    'circle at bottom left' => esc_html__('Bottom Left', 'dnxte-divi-essential'),
                    'circle at left' => esc_html__('Left', 'dnxte-divi-essential'),

                ),
                'default' => 'circle at center',
                'show_if' => array(
                    'gradient_type_text' => 'radial-gradient',
                ),
            ),
            // Gradient Start Position
            'gradient_start_position_text' => array(
                'label' => esc_html__('Start Position', 'dnxte-divi-essential'),
                'type' => 'range',
                'description' => esc_html__('Adjust the position for the beginning of the gradient color.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'gradient_text',
                'range_settings' => array(
                    'step' => 1,
                    'min' => 1,
                    'max' => 100,
                ),
                'default' => '0%',
                'fixed_unit' => '%',
                'validate_unit' => true,
            ),
            // Gradient End Position
            'gradient_end_position_text' => array(
                'label' => esc_html__('End Position', 'dnxte-divi-essential'),
                'type' => 'range',
                'description' => esc_html__('Adjust the position for the ending of the gradient color.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'gradient_text',
                'range_settings' => array(
                    'step' => 1,
                    'min' => 1,
                    'max' => 100,
                ),
                'default' => '100%',
                'fixed_unit' => '%',
                'validate_unit' => true,
            ),
            // Text Reveal Effect Switch
            'text_reveal_effect' => array(
                'label' => esc_html__('Enable Reveal Effect', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'description' => esc_html__('Select to turn Reveal Effect on.', 'dnxte-divi-essential'),
                'tab_slug' => 'advanced',
                'toggle_slug' => 'text_reveal_effect',
                'options' => array(
                    'off' => esc_html__('Off', 'dnxte-divi-essential'),
                    'on' => esc_html__('On', 'dnxte-divi-essential'),
                ),
                'default' => 'off',
            ),
            // Text Reveal Color Before
            'text_reveal_color_before' => array(
                'label' => esc_html__('Reveal Effect Color', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'description' => esc_html__('Choose a custom color to reveal your text with the function of reveal effect.', 'dnxte-divi-essential'),
                'tab_slug' => 'advanced',
                'toggle_slug' => 'text_reveal_effect',
                'default' => '#0077FF',
                'show_if' => array(
                    'text_reveal_effect' => 'on',
                ),
            ),
            // Text Hover Switch
            'dnxt_text_hover_effect_switch' => array(
                'label' => esc_html__('Text Hover Effect', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'description' => esc_html__('Select if you would like to use text hover effect', 'dnxte-divi-essential'),
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxt_text_hover_effect',
                'options' => array(
                    'off' => esc_html__('Off', 'dnxte-divi-essential'),
                    'on' => esc_html__('On', 'dnxte-divi-essential'),
                ),
                'default' => 'off',

            ),
            // Select Hover Effect
            'dnxt_text_hover_effect_select' => array(
                'label' => esc_html__('Select Hover Effect', 'dnxte-divi-essential'),
                'type' => 'select',
                'option_category' => 'configuration',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxt_text_hover_effect',
                'default' => 'dnxt-hover-grow',
                'description' => esc_html__('Here you can adjust the hover effect.'),
                'options' => array(
                    'dnxt-hover-backward' => esc_html__('Backward', 'dnxte-divi-essential'),
                    'dnxt-hover-bob' => esc_html__('Bob', 'dnxte-divi-essential'),
                    'dnxt-hover-bounce-in' => esc_html__('Bounce In', 'dnxte-divi-essential'),
                    'dnxt-hover-bounce-out' => esc_html__('Bounce Out', 'dnxte-divi-essential'),
                    'dnxt-hover-buzz' => esc_html__('Buzz', 'dnxte-divi-essential'),
                    'dnxt-hover-buzz-out' => esc_html__('Buzz Out', 'dnxte-divi-essential'),
                    'dnxt-hover-float' => esc_html__('Float', 'dnxte-divi-essential'),
                    'dnxt-hover-forward' => esc_html__('Forward', 'dnxte-divi-essential'),
                    'dnxt-hover-grow' => esc_html__('Grow', 'dnxte-divi-essential'),
                    'dnxt-hover-grow-rotate' => esc_html__('Grow Rotate', 'dnxte-divi-essential'),
                    'dnxt-hover-hang' => esc_html__('Hang', 'dnxte-divi-essential'),
                    'dnxt-hover-pop' => esc_html__('Pop', 'dnxte-divi-essential'),
                    'dnxt-hover-pulse' => esc_html__('Pulse', 'dnxte-divi-essential'),
                    'dnxt-hover-pulse-grow' => esc_html__('Pulse Grow', 'dnxte-divi-essential'),
                    'dnxt-hover-pulse-shrink' => esc_html__('Pulse Shrink', 'dnxte-divi-essential'),
                    'dnxt-hover-push' => esc_html__('Push', 'dnxte-divi-essential'),
                    'dnxt-hover-rotate' => esc_html__('Rotate', 'dnxte-divi-essential'),
                    'dnxt-hover-shrink' => esc_html__('Shrink', 'dnxte-divi-essential'),
                    'dnxt-hover-sink' => esc_html__('Sink', 'dnxte-divi-essential'),
                    'dnxt-hover-skew' => esc_html__('Skew', 'dnxte-divi-essential'),
                    'dnxt-hover-skew-backward' => esc_html__('Skew Backward', 'dnxte-divi-essential'),
                    'dnxt-hover-skew-forward' => esc_html__('Skew Forward', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-bottom' => esc_html__('Wobble Bottom', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-horizontal' => esc_html__('Wobble Horizontal', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-skew' => esc_html__('Wobble Skew', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-top' => esc_html__('Wobble Top', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-to-bottom-right' => esc_html__('Wobble To Bottom Right', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-to-top-right' => esc_html__('Wobble To Top Right', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-vertical' => esc_html__('Wobble Vertical', 'dnxte-divi-essential'),
                ),
                'show_if' => array(
                    'dnxt_text_hover_effect_switch' => 'on',
                ),
            ),
        );
    }

    public function get_advanced_fields_config()
    {
        $advanced_fields = array();

        $advanced_fields['fonts'] = false;

        $advanced_fields['fonts'] = array(
            //Font Title
            'gradient_fonts' => array(
                'label' => esc_html__('Title', 'dnxte-divi-essential'),
                'toggle_slug' => 'title_font',
                'tab_slug' => 'advanced',
                'hide_text_color' => true,
                'hide_text_align' => true,
                'line_height' => array(
                    'default' => '1em',
                ),
                'font_size' => array(
                    'default' => '26px',
                ),
                'css' => array(
                    'main' => "%%order_class%% .dnxt-gradient-text",
                ),
            ),
        );
        $advanced_fields['borders'] = array(
            'title_border' => array(
                'label_prefix' => esc_html__("Text", 'dnxte-divi-essential'),
                'tab_slug' => 'advanced',
                'toggle_slug' => 'title_border',
                'css' => array(
                    'main' => array(
                        'border_radii' => "%%order_class%% .dnxt-gradient-text",
                        'border_styles' => "%%order_class%% .dnxt-gradient-text",
                    ),
                ),
            ),
        );
        $advanced_fields['margin_padding'] = array(
            'css' => array(
                'main' => "%%order_class%% .dnxt-reveal-text-container",
                'important' => 'all',
            ),
        );
        $advanced_fields['background'] = array(
            'settings' => array(
                'color' => 'alpha',
            ),
            // 'css' => array(
            //     'main' => "%%order_class%% .dnxt-reveal-text-container",
            //     'important' => 'all',
            // ),
        );
        return $advanced_fields;
    }

    public function render($attrs, $content, $render_slug)
    {   
        wp_enqueue_style( 'dnext_gradient_text' );
        wp_enqueue_script( 'dnext_wow-public' );
        wp_enqueue_script( 'dnext_wow-activation' );
        wp_enqueue_style('dnext_hvr_common_css');
        wp_enqueue_style( 'dnext_reveal_animation' );

        $headingTag = $this->props['heading_tag'];

        $this->apply_css($render_slug);

        $text_reveal_enable = '';
        if ('on' === $this->props['text_reveal_effect']) {
            $text_reveal_enable = esc_html("reveal-effect masker wow");
        } else {
            $text_reveal_enable = "";
        }

        $text_hover_effect_enable = '';
        if ('on' === $this->props['dnxt_text_hover_effect_switch']) {
            $text_hover_effect_enable = esc_attr($this->props['dnxt_text_hover_effect_select']);
        } else {
            $text_hover_effect_enable = "";
        }

        return sprintf(
            '<div class="dnxt-text-reveal">
            <div class="dnxt-reveal-text-container">
                <div class="%2$s">
                    <%1$s class="dnxt-gradient-text dnxt-gradient-text-color %4$s ">%3$s</%1$s>
                </div>
            </div>
        </div>',
            $headingTag,
            $text_reveal_enable,
            esc_attr($this->props['gradient_title']),
            $text_hover_effect_enable
        );
    }

    public function apply_css($render_slug)
    {

        //Gradient Text Color CSS T1 Start
        $gradient_type_text = '';
        $gradient_type_direction_apply_text = '';
        $gradient_linear_direction_text = '';
        $gradient_radial_diretion_text = '';
        $gradient_color_one_select_text = '';
        $gradient_color_two_select_text = '';
        $gradient_start_position_text = '';
        $gradient_end_position_text = '';

        // checking gradient type
        if ('' !== $this->props['gradient_type_text']) {
            $gradient_type_text = $this->props['gradient_type_text'];
        }

        // Linear gradient direction
        if ('' !== $this->props['gradient_type_linear_direction_text']) {
            $gradient_linear_direction_text = $this->props['gradient_type_linear_direction_text'];
        }

        // Gradient Radial Direction text
        if ('' !== $this->props['gradient_type_radial_direction_text']) {
            $gradient_radial_diretion_text = $this->props['gradient_type_radial_direction_text'];
        }

        // Apply gradient direcion
        if ('radial-gradient' === $this->props['gradient_type_text']) {
            $gradient_type_direction_apply_text = sprintf('%1$s', $gradient_radial_diretion_text);
        } elseif ('linear-gradient' === $this->props['gradient_type_text']) {
            $gradient_type_direction_apply_text = sprintf('%1$s', $gradient_linear_direction_text);
        }

        // Gradient color one for text
        if ('' !== $this->props['gradient_color_one_select_text']) {
            $gradient_color_one_select_text = $this->props['gradient_color_one_select_text'];
        }

        // Gradient color two for text
        if ('' !== $this->props['gradient_color_two_select_text']) {
            $gradient_color_two_select_text = $this->props['gradient_color_two_select_text'];
        }

        // Gradient color start position text
        if ('' !== $this->props['gradient_start_position_text']) {
            $gradient_start_position_text = $this->props['gradient_start_position_text'];
        }

        // Gradient color end position t1
        if ('' !== $this->props['gradient_end_position_text']) {
            $gradient_end_position_text = $this->props['gradient_end_position_text'];
        }

        // Gradient setting up

        $declaration = sprintf(
            'background: %s(%s, %s %s, %s %s);',
            esc_html($gradient_type_text),                 
            esc_html($gradient_type_direction_apply_text),                
            esc_html($gradient_color_one_select_text),            
            esc_html($gradient_start_position_text),       
            esc_html($gradient_color_two_select_text),            
            esc_html($gradient_end_position_text)           
        );
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => "%%order_class%% .dnxt-gradient-text.dnxt-gradient-text-color",
            'declaration' => sprintf("%s;-webkit-background-clip: %s;-webkit-text-fill-color: %s",$declaration,esc_attr('text'),esc_attr('transparent;')),
        ));

        //Text Reveal Effect CSS Start
        $text_reveal_effect = '';
        $text_reveal_color_before = '';

        // Reveal Effect for color before
        if ('' !== $this->props['text_reveal_color_before']) {
            $text_reveal_color_before = $this->props['text_reveal_color_before'];
        }

        // Text Reveal Effect setting up
        if ('on' === $this->props['text_reveal_effect']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .reveal-effect.masker:after",
                'declaration' => sprintf("background: %s;",$text_reveal_color_before),
            ));
        }

        /**
         * Border one default color
         *
         */
        if (('' === $this->props['border_color_top_title_border']) && ('' === $this->props['border_color_all_title_border'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-gradient-text",
                'declaration' => sprintf("border-top-color: %s;",esc_attr('#333333')),
            ));
        }

        if (('' === $this->props['border_color_bottom_title_border']) && ('' === $this->props['border_color_all_title_border'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-gradient-text",
                'declaration' => sprintf("border-bottom-color: %s;",esc_attr('#333333')),
            ));
        }

        if (('' === $this->props['border_color_left_title_border']) && ('' === $this->props['border_color_all_title_border'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-gradient-text",
                'declaration' => sprintf("border-left-color: %s;",esc_attr('#333333')),
            ));
        }

        if (('' === $this->props['border_color_right_title_border']) && ('' === $this->props['border_color_all_title_border'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-gradient-text",
                'declaration' => sprintf("border-right-color: %s;",esc_attr('#333333')),
            ));
        }

        //  Border one default style
        if (('' === $this->props['border_style_top_title_border']) && ('' === $this->props['border_style_all_title_border'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-gradient-text",
                'declaration' => sprintf("border-top-style: %s;", esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_bottom_title_border']) && ('' === $this->props['border_style_all_title_border'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-gradient-text",
                'declaration' => sprintf("border-bottom-style: %s;",esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_left_title_border']) && ('' === $this->props['border_style_all_title_border'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-gradient-text",
                'declaration' => sprintf("border-left-style: %s;",esc_attr('solid')),
            ));
        }

        if (('' === $this->props['border_style_right_title_border']) && ('' === $this->props['border_style_all_title_border'])) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-gradient-text",
                'declaration' => sprintf("border-right-style: %s;",esc_attr('solid')),
            ));
        }

        // Text Alignment
        $this->props['text_orientation_last_edited'] = "";
        if ('' !== $this->props['text_orientation']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-text-reveal",
                'declaration' => sprintf("text-align: %s;",esc_attr($this->props['text_orientation'])),
            ));
        }
        if ('on|tablet' === $this->props['text_orientation_last_edited']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-text-reveal",
                'declaration' => sprintf("text-align:  %s !important;",esc_attr($this->props['text_orientation_tablet'])),
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));
        }
        if ('on|phone' === $this->props['text_orientation_last_edited']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .dnxt-text-reveal",
                'declaration' => sprintf("text-align: %s !important;",esc_attr($this->props['text_orientation_phone'])),
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));
        }
    }
}

new Next_Gradient_Text;