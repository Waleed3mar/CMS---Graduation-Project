<?php

class NextEmbeddedVideo extends ET_Builder_Module
{
    public $slug = 'dnxte_embedded_video';
    public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits   = array(
        'module_uri'            => 'https://www.diviessential.com/divi-facebook-embedded-video/',
        'author'                => 'Divi Next',
        'author_uri'            => 'www.divinext.com',
    );

    public function init(){
        $this->name        = esc_html__('Next FB Embedded Video', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'dnxte_embed_video_elements' => esc_html__('Video Elements', 'dnxte-divi-essential')
                )
            )
        );
    }

    public function get_advanced_fields_config(){
        return array(
            'text'                          => false,
            'fonts'                         => false,
            'borders'                       => array(
                'default'                   => array(
                    'css'                   => array(
                        'main'              => array(
                            'border_radii'  => "%%order_class%% .fb-video iframe",
                            'border_styles' => "%%order_class%% .fb-video iframe",
                        ),
                        'important'         => 'all'
                    ),
                ),
            ),
            'box_shadow'                    => array(
                'default'                   => array(
                    'css'                   => array(
                        'main'              => '%%order_class%% .fb-video',
                        'custom_style'      => true,
                    ),
                    'default_on_fronts'     => array(
                        'color'             => '',
                        'position'          => '',
                    ),
                ),
            )
        );
    }

    public function get_fields() {
        return array(
            'dnxte_embed_video_url'         => array(
                'label'                     => esc_html__('Video URL', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('Input Video URL.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_embed_video_elements',
                'dynamic_content'           => 'text',
            ),
            'dnxte_embed_video_include_text'=> array(
                'label'                     => esc_html__('Include Full Post', 'dnxte-divi-essential'),
                'type'                      => 'yes_no_button',
                'toggle_slug'               => 'dnxte_embed_video_elements',
                'options'                   => array(
                    'on'                    => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off'                   => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'on',
            ),
            'dnxte_embed_video_fullscreen'  => array(
                'label'                     => esc_html__('Allow Fullscreen', 'dnxte-divi-essential'),
                'type'                      => 'yes_no_button',
                'toggle_slug'               => 'dnxte_embed_video_elements',
                'options'                   => array(
                    'on'                    => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off'                   => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'on',
            ),
            'dnxte_embed_video_autoplay'    => array(
                'label'                     => esc_html__('Autoplay', 'dnxte-divi-essential'),
                'type'                      => 'yes_no_button',
                'toggle_slug'               => 'dnxte_embed_video_elements',
                'options'                   => array(
                    'on'                    => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off'                   => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'off',
            ),
            'dnxte_embed_video_show_captions'=> array(
                'label'                     => esc_html__('Show Captions', 'dnxte-divi-essential'),
                'type'                      => 'yes_no_button',
                'toggle_slug'               => 'dnxte_embed_video_elements',
                'options'                   => array(
                    'on'                    => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off'                   => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'off',
            ),
            'dnxte_embed_video_width'       => array(
                'label'                     => esc_html__( 'Width', 'dnxte-divi-essential' ),
                'type'                      => 'range',
                'option_category'           => 'basic_option',
                'range_settings'            => array(
                    'step'                  => 1,
                    'min'                   => 1,
                    'max'                   => 1000,
                ),
                'default'                   => 'auto',
                'fixed_unit'                => '',
                'validate_unit'             => false,
                'unitless'                  => true,
                'toggle_slug'               => 'dnxte_embed_video_elements',
                'computed_affects'          => array(
					'__embeddedvideo',
				),
            ),
            '__embeddedvideo'               => array(
				'type'                      => 'computed',
				'computed_callback'         => array( 'NextEmbeddedVideo' ),
				'computed_depends_on'       => array(
					'dnxte_embed_video_width'
				),
			),
        );
    }

    public function render($attrs, $content, $render_slug){
        wp_enqueue_style( 'dnext_embedded_video' );
        wp_enqueue_script( 'dnext_facebook_sdk' );
        $showText           = $this->props['dnxte_embed_video_include_text'] == "on";
        $allowFullScreen    = $this->props['dnxte_embed_video_fullscreen'] == "on";
        $autoplay           = $this->props['dnxte_embed_video_autoplay'] == "on";
        $showCaptions       = $this->props['dnxte_embed_video_show_captions'] == "on";

        if(!$this->props['border_style_all']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .fb-video iframe",
                'declaration' => sprintf('border-style: solid !important;'),
            ));
        }

        return sprintf('
        <div class="fb-video" data-href="%1$s" data-show-text="%2$s"
            data-width="%3$s" data-allowfullscreen="%4$s" data-autoplay="%5$s" data-show-captions="%6$s">
            <blockquote cite="%1$s"
                class="fb-xfbml-parse-ignore">
            </blockquote>
        </div>
        <div id="fb-root">
        </div>
        ',
        esc_url($this->props['dnxte_embed_video_url']),
        esc_attr($showText),
        esc_attr($this->props['dnxte_embed_video_width']),
        esc_attr($allowFullScreen),
        esc_attr($autoplay),
        esc_attr($showCaptions)
    );
    }

}

new NextEmbeddedVideo;