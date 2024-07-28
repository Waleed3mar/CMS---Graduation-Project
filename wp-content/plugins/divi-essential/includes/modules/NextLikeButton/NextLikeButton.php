<?php

class NextLikeButton extends ET_Builder_Module
{
    public $slug = 'dnxte_like_button';
    public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-facebook-like/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init(){
        $this->name        = esc_html__('Next FB Like Button', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';

        $this->settings_modal_toggles           = array(
            'general'                           => array(
                'toggles'                       => array(
                    'dnxte_embed_like_elements' => esc_html__('Like Elements', 'dnxte-divi-essential')
                )
            )
        );
    }

    public function get_advanced_fields_config(){
        return array(
            'text' => false,
            'fonts' => false,
            'borders'                       => array(
                'default'                   => array(
                    'css'                   => array(
                        'main'              => array(
                            'border_radii'  => "%%order_class%% .fb-like",
                            'border_styles' => "%%order_class%% .fb-like",
                        ),
                        'important'         => 'all'
                    ),
                ),
            ),
            'box_shadow'                    => array(
                'default'                   => array(
                    'css'                   => array(
                        'main'              => '%%order_class%% .fb-like',
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
                    'margin' => '%%order_class%% .fb-like',
                    'padding' => '%%order_class%% .fb-like',
                ),
            )
        );
    }

    public function get_fields() {
        return array(
            'dnxte_embed_like_url'          => array(
                'label'                     => esc_html__('Page URL', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('Input Page URL.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_embed_like_elements',
            ),
            'dnxte_embed_like_include_share'=> array(
                'label'                     => esc_html__('Include Share Button', 'dnxte-divi-essential'),
                'type'                      => 'yes_no_button',
                'toggle_slug'               => 'dnxte_embed_like_elements',
                'options'                   => array(
                    'on'                    => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off'                   => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'on',
            ),
            'dnxte_embed_like_width'        => array(
                'label'                     => esc_html__( 'Width', 'dnxte-divi-essential' ),
                'type'                      => 'range',
                'option_category'           => 'basic_option',
                'range_settings'            => array(
                    'step'                  => 1,
                    'min'                   => 1,
                    'max'                   => 1000,
                ),
                'default'                   => '550',
                'fixed_unit'                => '',
                'validate_unit'             => false,
                'unitless'                  => true,
                'toggle_slug'               => 'dnxte_embed_like_elements',
                'computed_affects'          => array(
					'__embeddedlike',
				),
            ),
            'dnxte_embed_like_layout'       => array(
                'label'                     => esc_html__('Layout', 'dnxte-divi-essential'),
                'type'                      => 'select',
                'description'               => esc_html__('Select the layout of the like button', 'dnxte-divi-essential'),
                'option_category'           => 'basic_option',
                'toggle_slug'               => 'dnxte_embed_like_elements',
                'options'                   => array(
                    'standard'              => esc_html__('Default', 'dnxte-divi-essential'),
                    'button_count'          => esc_html__('Button Count', 'dnxte-divi-essential'),
                    'button'                => esc_html__('Button', 'dnxte-divi-essential'),
                    'box_count'             => esc_html__('Box Count', 'dnxte-divi-essential'),
                ),
                'default'                   => 'standard',
            ),
            'dnxte_embed_like_action'       => array(
                'label'                     => esc_html__('Action', 'dnxte-divi-essential'),
                'type'                      => 'select',
                'description'               => esc_html__('Select the action of the like button', 'dnxte-divi-essential'),
                'option_category'           => 'basic_option',
                'toggle_slug'               => 'dnxte_embed_like_elements',
                'options'                   => array(
                    'like'                  => esc_html__('Like', 'dnxte-divi-essential'),
                    'recommend'             => esc_html__('Recommend', 'dnxte-divi-essential'),
                ),
                'default'                   => 'like',
            ),
            'dnxte_embed_like_size'         => array(
                'label'                     => esc_html__('Size', 'dnxte-divi-essential'),
                'type'                      => 'select',
                'description'               => esc_html__('Select the size of the like button', 'dnxte-divi-essential'),
                'option_category'           => 'basic_option',
                'toggle_slug'               => 'dnxte_embed_like_elements',
                'options'                   => array(
                    'small'                 => esc_html__('Small', 'dnxte-divi-essential'),
                    'large'                 => esc_html__('Large', 'dnxte-divi-essential'),
                ),
                'default'                   => 'small',
            ),
            '__embeddedlike'                => array(
				'type'                      => 'computed',
				'computed_callback'         => array( 'NextLikeButton' ),
				'computed_depends_on'       => array(
					'dnxte_embed_like_width'
				),
			),
        );
    }

    public function render($attrs, $content, $render_slug){
        wp_enqueue_script( 'dnext_facebook_sdk' );
        $includeShare = esc_attr($this->props['dnxte_embed_like_include_share']) == "on";

        if(!esc_attr($this->props['border_style_all'])){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'      => "%%order_class%% .fb-like",
                'declaration'   => sprintf('border-style: %1$s',esc_attr('solid !important;')),
            ));
        }

        return sprintf('
        <div class="fb-like" data-href="%1$s" data-width="%3$s" data-layout="%4$s" data-action="%5$s" data-size="%6$s" data-share="%2$s">
        </div>',
        esc_url($this->props['dnxte_embed_like_url']),
        $includeShare,
        esc_attr($this->props['dnxte_embed_like_width']),
        esc_attr($this->props['dnxte_embed_like_layout']),
        esc_attr($this->props['dnxte_embed_like_action']),
        esc_attr($this->props['dnxte_embed_like_size'])
    );
    }
}

new NextLikeButton;