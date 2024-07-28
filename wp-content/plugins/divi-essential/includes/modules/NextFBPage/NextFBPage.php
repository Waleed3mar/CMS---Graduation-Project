<?php

class NextFBPage extends ET_Builder_Module
{
    public $slug = 'dnxte_fb_page';
    public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-facebook-page/',
        'author'     => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init(){
        $this->name        = esc_html__('Next FB Page', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'dnxte_fb_page_elements'  => esc_html__('Page Elements', 'dnxte-divi-essential')
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
                            'border_radii'  => "%%order_class%% .fb-page",
                            'border_styles' => "%%order_class%% .fb-page",
                        ),
                        'important'         => 'all'
                    ),
                ),
            ),
            'box_shadow'                    => array(
                'default'                   => array(
                    'css'                   => array(
                        'main'              => '%%order_class%% .fb-page',
                        'custom_style'      => true,
                    ),
                    'default_on_fronts'     => array(
                        'color'             => '',
                        'position'          => '',
                    ),
                ),
            ),
            'margin_padding' => array(
                'css' => array(
                    'margin' => '%%order_class%% .fb-page',
                    'padding' => '%%order_class%% .fb-page',
                ),
            )
        );
    }

    public function get_fields() {
        return array(
            'dnxte_fb_page_url'          => array(
                'label'                     => esc_html__('Page URL', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('Input Post URL.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_fb_page_elements',
                'dynamic_content'           => 'text',
            ),
            'dnxte_fb_page_tabs'         => array(
                'label'                     => esc_html__('Tabs', 'dnxte-divi-essential'),
                'type'                      => 'select',
                'option_category'           => 'basic_option',
                'options'                   => array(
                    'timeline'               => esc_html__('Timeline', 'dnxte-divi-essential'),
                    'events'                => esc_html__('Events', 'dnxte-divi-essential'),
                    'messages'              => esc_html__('Messages', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'timeline',
                'toggle_slug'               => 'dnxte_fb_page_elements',
            ),
            'dnxte_fb_page_hide_cover'    => array(
                'label'                     => esc_html__('Hide Cover Photo', 'dnxte-divi-essential'),
                'type'                      => 'yes_no_button',
                'toggle_slug'               => 'dnxte_fb_page_elements',
                'options'                   => array(
                    'on'                   => esc_html__('On', 'dnxte-divi-essential'),
                    'off'                   => esc_html__('Off', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'off',
            ),
            'dnxte_fb_page_facepile'    => array(
                'label'                     => esc_html__('Show Profile Photo', 'dnxte-divi-essential'),
                'description'               => esc_html__('Show profile photos when friends like this.', 'dnxte-divi-essential'),
                'type'                      => 'yes_no_button',
                'toggle_slug'               => 'dnxte_fb_page_elements',
                'options'                   => array(
                    'on'                   => esc_html__('On', 'dnxte-divi-essential'),
                    'off'                   => esc_html__('Off', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'on',
            ),
            'dnxte_fb_page_small_header'    => array(
                'label'                     => esc_html__('Use Small Header', 'dnxte-divi-essential'),
                'description'               => esc_html__('Use the small header instead.', 'dnxte-divi-essential'),
                'type'                      => 'yes_no_button',
                'toggle_slug'               => 'dnxte_fb_page_elements',
                'options'                   => array(
                    'on'                   => esc_html__('On', 'dnxte-divi-essential'),
                    'off'                   => esc_html__('Off', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'off',
            ),
            'dnxte_fb_page_container_width'    => array(
                'label'                     => esc_html__('Fit in Container', 'dnxte-divi-essential'),
                'description'               => esc_html__('Try to fit inside the container width.', 'dnxte-divi-essential'),
                'type'                      => 'yes_no_button',
                'toggle_slug'               => 'dnxte_fb_page_elements',
                'options'                   => array(
                    'on'                   => esc_html__('On', 'dnxte-divi-essential'),
                    'off'                   => esc_html__('Off', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'on',
            ),
            'dnxte_fb_page_width'        => array(
                'label'                     => esc_html__( 'Width', 'dnxte-divi-essential' ),
                'type'                      => 'range',
                'option_category'           => 'basic_option',
                'range_settings'            => array(
                    'step'                  => 1,
                    'min'                   => 180,
                    'max'                   => 500,
                ),
                'default'                   => '340',
                'fixed_unit'                => '',
                'validate_unit'             => false,
                'unitless'                  => true,
                'toggle_slug'               => 'dnxte_fb_page_elements',
                'computed_affects'          => array(
					'__fbpage',
				),
            ),
            'dnxte_fb_page_height'        => array(
                'label'                     => esc_html__( 'Height', 'dnxte-divi-essential' ),
                'type'                      => 'range',
                'option_category'           => 'basic_option',
                'range_settings'            => array(
                    'step'                  => 1,
                    'min'                   => 70,
                    'max'                   => 1000,
                ),
                'default'                   => '500',
                'fixed_unit'                => '',
                'validate_unit'             => false,
                'unitless'                  => true,
                'toggle_slug'               => 'dnxte_fb_page_elements',
                'computed_affects'          => array(
					'__fbpage',
				),
            ),
            '__fbpage'                => array(
				'type'                      => 'computed',
				'computed_callback'         => array( 'NextFBPage' ),
				'computed_depends_on'       => array(
					'dnxte_fb_page_width',
					'dnxte_fb_page_height'
				),
			),
        );
    }

    public function render($attrs, $content, $render_slug){
        wp_enqueue_script( 'dnext_facebook_sdk' );
        $adapt_container_width = $this->props['dnxte_fb_page_container_width'] == "on";
        $hide_cover_photo = $this->props['dnxte_fb_page_hide_cover'] == "on";
        $show_profile_photo = $this->props['dnxte_fb_page_facepile'] == "on";
        
        if(!$this->props['border_style_all']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'      => "%%order_class%% .fb-page",
                'declaration'   => sprintf('border-style: %s', esc_attr('solid !important;')),
            ));
        }

        return sprintf('
        <div class="fb-page" data-href="%1$s" data-tabs="%2$s" data-width="%3$s" data-height="%4$s" data-small-header="%5$s" data-adapt-container-width="%6$s" data-hide-cover="%7$s" data-show-facepile="%8$s">
            <blockquote cite="%1$s" class="fb-xfbml-parse-ignore">
            </blockquote>
        </div>',
        esc_url($this->props['dnxte_fb_page_url']),
        esc_attr($this->props['dnxte_fb_page_tabs']),
        esc_attr($this->props['dnxte_fb_page_width']),
        esc_attr($this->props['dnxte_fb_page_height']),
        esc_attr($this->props['dnxte_fb_page_small_header']),
        esc_attr($adapt_container_width),
        esc_attr($hide_cover_photo),
        esc_attr($show_profile_photo)
    );
    }

}

new NextFBPage;