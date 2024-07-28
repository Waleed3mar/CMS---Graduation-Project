<?php

class Next_Minimal_Image_Hover extends ET_Builder_Module
{

    public $slug = 'dnxte_minimal_image_hover';
    public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-minimal-image-hover-effect/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name        = esc_html__('Next Minimal Image', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'main_content' => esc_html__('Image', 'dnxte-divi-essential'),
                    'link' => esc_html__('Link', 'dnxte-divi-essential'),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'dnxtmih_hover_effect' => esc_html__('Hover Effect', 'dnxte-divi-essential'),
                ),
            ),
            'custom_css' => array(
                'toggles' => array(
                    'animation' => array(
                        'title' => esc_html__('Animation', 'dnxte-divi-essential'),
                        'priority' => 90,
                    ),
                    'attributes' => array(
                        'title' => esc_html__('Attributes', 'dnxte-divi-essential'),
                        'priority' => 95,
                    ),
                ),
            ),
        );

        $this->advanced_fields = array(
            'margin_padding' => array(
                'css' => array(
                    'main' => "%%order_class%% figure",
                ),
            ),
            'borders' => array(
                'default' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% figure",
                            'border_styles' => "%%order_class%% figure",
                        ),
                    ),
                ),
            ),
            'background' => array(
                'settings' => array(
                    'color' => 'alpha',
                ),
                // 'css' => array(
                //     'main' => "%%order_class%% figure",
                //     'important' => true,
                // ),
            ),
            'box_shadow' => array(
                'default' => array(
                    'css' => array(
                        'main' => '%%order_class%% figure',
                        'overlay' => 'inset',
                    ),
                ),
            ),
            'max_width' => array(
                'options' => array(
                    'width' => array(
                        'depends_show_if' => 'off',
                    ),
                    'max_width' => array(
                        'depends_show_if' => 'off',
                    ),
                ),
            ),
            'height' => array(
                'css' => array(
                    'main' => '%%order_class%% figure',
                ),
            ),
            'fonts' => false,
            'text' => false,
            'button' => false,
        );
    }

    public function get_fields()
    {
        return array(
            'image' => array(
                'label' => esc_html__('Image', 'dnxte-divi-essential'),
                'type' => 'upload',
                'option_category' => 'basic_option',
                'upload_button_text' => esc_attr__('Upload an image', 'dnxte-divi-essential'),
                'choose_text' => esc_attr__('Choose an Image', 'dnxte-divi-essential'),
                'update_text' => esc_attr__('Set As Image', 'dnxte-divi-essential'),
                'hide_metadata' => true,
                'description' => esc_html__('Upload your desired image, or type in the URL to the image you would like to display.', 'dnxte-divi-essential'),
                'toggle_slug' => 'main_content',
                'dynamic_content' => 'image',
                'mobile_options' => true,
                'hover' => 'tabs',
            ),
            'alt' => array(
                'label' => esc_html__('Image Alternative Text', 'dnxte-divi-essential'),
                'type' => 'text',
                'option_category' => 'basic_option',
                'depends_show_if' => 'on',
                'depends_on' => array(
                    'hello_src',
                ),
                'description' => esc_html__('This defines the HTML ALT text. A short description of your image can be placed here.', 'dnxte-divi-essential'),
                'tab_slug' => 'custom_css',
                'toggle_slug' => 'attributes',
                'dynamic_content' => 'text',
            ),
            // Image Hover Effect
            'dnxtmih_image_hover_effect' => array(
                'label' => esc_html__('Select Image Hover', 'dnxte-divi-essential'),
                'type' => 'select',
                'option_category' => 'configuration',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'dnxtmih_hover_effect',
                'default' => 'push-up',
                'description' => esc_html__('Here you can adjust the hover effect.', 'dnxte-divi-essential'),
                'options' => array(
                    'effect1' => esc_html__('Zoom In', 'dnxte-divi-essential'),
                    'effect2' => esc_html__('Zoom Out', 'dnxte-divi-essential'),
                    'effect3' => esc_html__('Zoom Out In', 'dnxte-divi-essential'),
                    'effect4' => esc_html__('Scale Out Rotate', 'dnxte-divi-essential'),
                    'effect5' => esc_html__('Slide', 'dnxte-divi-essential'),
                    'effect6' => esc_html__('Rotate Zoom Out', 'dnxte-divi-essential'),
                    'effect7' => esc_html__('Blur', 'dnxte-divi-essential'),
                    'effect8' => esc_html__('Flashing', 'dnxte-divi-essential'),
                    'effect9' => esc_html__('Shine', 'dnxte-divi-essential'),
                    'effect10' => esc_html__('Circle', 'dnxte-divi-essential'),
                ),
            ),
        );
    }

    public function render($attrs, $content, $render_slug)
    {
        wp_enqueue_style( 'dnext_minimal_image_hover' );
        $multi_view = et_pb_multi_view_options($this);
        $image = $this->props['image'];

        $dnxtmih_image_hover_effect = $this->props['dnxtmih_image_hover_effect'];

        // Handle svg image behaviour
        $image_pathinfo = pathinfo($image);
        $is_image_svg = isset($image_pathinfo['extension']) ? 'svg' === $image_pathinfo['extension'] : true;

        $image_html = Common::get_image_html(
                'image', // image_slug
                esc_attr($this->props['alt'] ), // alt_text
                '', // title
                $multi_view, // multi_view
                $this, // context
                'img-fluid' // custom classes
            );

        $dnxtmih_img = "";
        if ("" !== $image) {
            $dnxtmih_img = sprintf(
                '<figure>%1$s</figure>',
                $image_html
            );
        }

        return sprintf(
            '<div class="dnext-neip-mih-hover-effect dnext-neip-mih-%2$s">
				%1$s
			</div>',
            $dnxtmih_img,
            esc_attr($dnxtmih_image_hover_effect)
        );
    }
}

new Next_Minimal_Image_Hover;