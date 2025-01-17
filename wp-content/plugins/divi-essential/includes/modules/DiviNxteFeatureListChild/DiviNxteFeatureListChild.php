<?php
include_once(DIVI_ESSENTIAL_PATH.'/includes/modules/base/Common.php');

class Divi_NxteFeatureListChild extends ET_Builder_Module
{
    public $slug = 'dnxte_feature_list_child';
    public $vb_support = 'on';
    public $type = 'child';
    public $child_title_var = 'dnxte_feature_list_title';
    public $child_title_fallback_var = 'dnxte_feature_list_title';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-feature-list/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init() {
        $this->name = esc_html__('Feature List Item', 'dnxte-divi-essential');

        $this->settings_modal_toggles = array(
            'advanced' => array(
                'toggles' => array(
                    'dnxte_feature_list_icon_settings' => esc_html__('Icon Settings', 'dnxte-divi-essential'),
                    'dnxte_feature_list_title_settings' => esc_html__('Title Settings', 'dnxte-divi-essential'),
                    'dnxte_feature_list_image_settings' => esc_html__('Image Settings', 'dnxte-divi-essential'),
                ),
            ),
            'custom_css' => array(
				'toggles' => array(
					'dnxte_featurelist_attributes' => array(
						'title'    => esc_html__( 'Attributes', 'dnxte-divi-essential' ),
						'priority' => 95,
					),
				),
			),
        );

        $this->custom_css_fields = array(
            'feature_list_icon' => array(
                'label' => esc_html__('Icon/Number', 'dnxte-divi-essential'),
                'selector' => "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb",
            ),
            'feature_list_image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'selector' => "%%order_class%% .dnxte-feature-list-img img",
            ),
            'feature_list_title' => array(
                'label' => esc_html__('Title', 'dnxte-divi-essential'),
                'selector' => "%%order_class%% .dnxte-feature-list-content",
            ),
        );
    }

    public function get_advanced_fields_config()
    {
        return array(
            'text' => false,
            'borders' => array(
                'default' => array(),
                'icon' => array(
                    'label_prefix' => esc_html__('Icon', 'dnxte-divi-essential'),
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb",
                            'border_styles' => "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb",
                        ),
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'dnxte_feature_list_icon_settings',
                ),
            ),
            'box_shadow' => array(
                'icon' => array(
                    'label' => esc_html__('Icon Box Shadow', 'dnxte-divi-essential'),
                    'option_category' => 'layout',
                    'tab_slug' => 'advanced',
                    'toggle_slug' => 'dnxte_feature_list_icon_settings',
                    'css' => array(
                        'main' => '%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb',
                        'custom_style' => true,
                        'important' => 'all',
                    ),
                    'default_on_fronts' => array(
                        'color' => '',
                        'position' => '',
                    ),
                ),
            ),
        );
    }

    public function get_fields()
    {
        return array(
            'dnxte_feature_list_title' => array(
                'label' => esc_html__('Title', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input Pre Heading text', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
            ),
            'dnxte_feature_list_use_number' => array(
                'label' => esc_html__('Use Number Index', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'description' => esc_html__('Toggle Yes or No to use number index in feature list, if you want to use image, disable this button.', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
                    'dnxte_feature_list_number',
                ),
                'show_if' => array(
                    'dnxte_feature_list_use_image' => 'off',
                ),
                'default' => 'off',
                'default_on_front' => 'off',
            ),
            'dnxte_feature_list_number' => array(
                'label' => esc_html__('Number', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'description' => esc_html__('Input Pre Heading text', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
                'show_if' => array(
                    'dnxte_feature_list_use_number' => 'on',
                ),
            ),
            'dnxte_feature_list_use_image' => array(
                'label' => esc_html__('Use Image', 'dnxte-divi-essential'),
                'type' => 'yes_no_button',
                'description' => esc_html__('Toggle Yes or No to use image instead of icon or number index, To use number index,disable this button, you will see the number option.', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
                'options' => array(
                    'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects' => array(
                    'dnxte_feature_list_image',
                ),
                'default' => 'off',
                'default_on_front' => 'off',
                'show_if' => array(
                    'dnxte_feature_list_use_number' => 'off',
                ),
            ),
            'dnxte_feature_list_image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'type' => 'upload',
                //'option_category' => 'layout',
                'upload_button_text' => esc_attr__('Upload an image', 'dnxte-divi-essential'),
                'choose_text' => esc_attr__('Choose an Image', 'dnxte-divi-essential'),
                'update_text' => esc_attr__('Set As Image', 'dnxte-divi-essential'),
                'description' => esc_html__('Upload an image to display at the top of your team person.', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
            ),
            // Image alt
			'dnxte_feature_list_alt' => array(
				'label'           => esc_html__( 'Image Alt Text', 'dnxte-divi-essential' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'dnxte-divi-essential' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'dnxte_featurelist_attributes',
				'dynamic_content' => 'text',
			),
            'dnxte_feature_list_icon' => array(
                'label' => esc_html__('Use Icon', 'dnxte-divi-essential'),
                'type' => 'select_icon',
                'class' => array('et-pb-font-icon'),
                'default' => 'N',
                'toggle_slug' => 'main_content',
                'option_category' => 'basic_option',
                'mobile_options' => true,
                'show_if' => array(
                    'dnxte_feature_list_use_number' => 'off',
                    'dnxte_feature_list_use_image' => 'off',
                ),
            ),
            'dnxte_feature_list_icon_color' => array(
                'label' => esc_html__('Icon Color', 'dnxte-divi-essential'),
                'description' => esc_html__('Select the color of the icon.', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'custom_color' => true,
                'default' => 'transparent',
                'default_on_front' => '',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_feature_list_icon_settings',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'dnxte_feature_list_icon_bg_color' => array(
                'label' => esc_html__('Icon Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('Select the background color of the icon.', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'custom_color' => true,
                'default' => 'transparent',
                'default_on_front' => '',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_feature_list_icon_settings',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'dnxte_feature_list_icon_margin' => array(
                'label' => esc_html__('Icon Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'dnxte_feature_list_icon_padding' => array(
                'label' => esc_html__('Icon Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'dnxte_feature_list_image_width' => array(
                'label' => esc_html__('Image Width', 'dnxte-divi-essential'),
                'description' => esc_html__('Adjust the width of the image.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_feature_list_image_settings',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'default' => '20px',
                'default_unit' => 'px',
                'default_on_front' => '20px',
                'allow_empty' => true,
                'range_settings' => array(
                    'min' => '0',
                    'max' => '1000',
                    'step' => '1',
                ),
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'dnxte_feature_list_text_alignment' => array(
                'label' => esc_html__('Text Vertical Alignment', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the alignment type.It will show when image position is center.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'module',
                'options' => array(
                    'top' => esc_html__('Top', 'dnxte-divi-essential'),
                    'center' => esc_html__('Center', 'dnxte-divi-essential'),
                    'bottom' => esc_html__('Bottom', 'dnxte-divi-essential'),
                ),
                'default' => 'center',
                'show_if'   => array(
                    'dnxte_feature_list_image_position' => 'center'
                )
            ),
            'dnxte_feature_list_image_position' => array(
                'label' => esc_html__('Image Position', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Select the image position.', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxte_feature_list_image_settings',
                'options' => array(
                    'top' => esc_html__('Top', 'dnxte-divi-essential'),
                    'center' => esc_html__('Center', 'dnxte-divi-essential'),
                    'bottom' => esc_html__('Bottom', 'dnxte-divi-essential'),
                ),
                'default' => 'center',
            ),
            'dnxte_feature_list_image_alignment' => array(
				'label'           => esc_html__( 'Image Alignment', 'dnxte-divi-essential' ),
				'description'     => esc_html__( 'Align image to the left, right or center.', 'dnxte-divi-essential' ),
				'type'            => 'align',
				'option_category' => 'layout',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dnxte_feature_list_image_settings',
                'mobile_options'  => true,
                'show_if'         => array(
                    'dnxte_feature_list_image_position' => array(
                        'top',
                        'bottom'
                    )
                )
            ),
        );
    }

    public function render($attrs, $content, $render_slug)
    {
        $multi_view = et_pb_multi_view_options($this);
        $dnxte_feature_list_title = $this->props['dnxte_feature_list_title'];
        $dnxte_feature_list_use_image = $this->props['dnxte_feature_list_use_image'];
        $dnxte_feature_list_use_number = $this->props['dnxte_feature_list_use_number'];
        $dnxte_feature_list_alt = $this->props['dnxte_feature_list_alt'];


        $dnxte_feature_list_content_alignment_classes = Common::get_alignment("dnxte_feature_list_text_alignment", $this);

        $dnxte_feature_list_image_position_classes = Common::get_alignment("dnxte_feature_list_image_position", $this);

        $dnxte_feature_list_image_alignment_classes = Common::get_alignment("dnxte_feature_list_image_alignment", $this);

        $title = $multi_view->render_element(array(
            'tag' => 'div',
            'content' => '{{dnxte_feature_list_title}}',
            'attrs' => array(
                'class' => 'dnxte-feature-list-content '. $dnxte_feature_list_content_alignment_classes,
            ),
        ));

        $icon = "";
        if ($dnxte_feature_list_use_image === "off" && $dnxte_feature_list_use_number === "off") {
            $icon_css_property = array(
				'selector'    => '%%order_class%% .dnxte-feature-list-icon',
				'class'       => 'dnxte-feature-list-icon',
			);
			$icon = Common::get_icon_html( 'dnxte_feature_list_icon', $this, $render_slug, $multi_view, $icon_css_property, 'i' );
        } else if ($dnxte_feature_list_use_image === "on") {
            $icon = Common::get_image_html(
                'dnxte_feature_list_image', // image_slug
                $dnxte_feature_list_alt, // alt_text
                '', // title
                $multi_view, // multi_view
                $this, // context
                'img-fluid'
            );
            
        } else if ($dnxte_feature_list_use_number === "on") {
            $icon = $multi_view->render_element(array(
                'tag' => 'div',
                'content' => '{{dnxte_feature_list_number}}',
                'attrs' => array(
                    'class' => 'dnxte-feature-list-numb',
                ),
            ));
        }

        $this->apply_css($render_slug);
        return sprintf(
            '<div
                class="dnxte-feature-list-wrap dnxte-feature-list-left-img %3$s"
            >
                <div class="dnxte-feature-list-img %4$s">
                    %2$s
                </div>
                %1$s
            </div>',
            et_core_esc_previously($title),
            $icon,
            $dnxte_feature_list_image_position_classes,
            $dnxte_feature_list_image_alignment_classes
        );
    }

    public function apply_css($render_slug)
    {
        // Custom Css
        $icon_color_css_property = 'color: %1$s !important;';
        $icon_color_css_selector = array(
            'desktop' => "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb",
            'hover'   => "%%order_class%% .dnxte-feature-list-img i:hover, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb:hover"
        );
        Common::set_css("dnxte_feature_list_icon_color", $icon_color_css_property, $icon_color_css_selector, $render_slug, $this);

        $icon_bg_css_property = 'background-color: %1$s !important;';
        $icon_bg_css_selector = array(
            'desktop' => "%%order_class%% .dnxte-feature-list-img i, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb",
            'hover'   => "%%order_class%% .dnxte-feature-list-img i:hover, %%order_class%% .dnxte-feature-list-img .dnxte-feature-list-numb:hover"
        );
        Common::set_css("dnxte_feature_list_icon_bg_color", $icon_bg_css_property, $icon_bg_css_selector, $render_slug, $this);

        $image_width_css_property = 'width: %1$s;';
        $image_width_css_selector = array(
            'desktop' => "%%order_class%% .img-fluid",
            'hover' => "%%order_class%% .img-fluid:hover"
        );
        Common::set_css("dnxte_feature_list_image_width", $image_width_css_property, $image_width_css_selector, $render_slug, $this);

        /**
         * Custom Padding Margin Output
         *
         */
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_feature_list_icon_margin", "%%order_class%% .dnxte-feature-list-img .dnxte-feature-list-icon", "margin", true);
        Common::dnxt_set_style($render_slug, $this->props, "dnxte_feature_list_icon_padding", "%%order_class%% .dnxte-feature-list-img .dnxte-feature-list-icon", "padding", true);

    }
    
    public function multi_view_filter_value( $raw_value, $args, $multi_view ) {
		$name = isset( $args['name'] ) ? $args['name'] : '';
		$mode = isset( $args['mode'] ) ? $args['mode'] : '';

		if ( $raw_value && 'dnxte_feature_list_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}
		return $raw_value;
	}
}

new Divi_NxteFeatureListChild;
