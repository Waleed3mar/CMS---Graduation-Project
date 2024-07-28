<?php


class NextComment extends ET_Builder_Module
{
    public $slug = 'dnxte_comment';
    public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-embedded-comment/',
        'author'     => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init(){
        $this->name        = esc_html__('Next FB Comment', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';

        $this->settings_modal_toggles           = array(
            'general'                           => array(
                'toggles'                       => array(
                    'dnxte_comments_elements'   => esc_html__('Comments Elements', 'dnxte-divi-essential')
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
                            'border_radii'  => "%%order_class%% .fb-comments",
                            'border_styles' => "%%order_class%% .fb-comments",
                        ),
                        'important'         => 'all'
                    ),
                ),
            ),
            'box_shadow'                    => array(
                'default'                   => array(
                    'css'                   => array(
                        'main'              => '%%order_class%% .fb-comments',
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
            'dnxte_comment_url'             => array(
                'label'                     => esc_html__('URL', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('Input Comments URL.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_comments_elements',
                'dynamic_content'           => 'text',
            ),
            'dnxte_comment_number_post'     => array(
                'label'                     => esc_html__( 'Number Of Post', 'dnxte-divi-essential' ),
                'type'                      => 'range',
                'option_category'           => 'basic_option',
                'range_settings'            => array(
                    'step'                  => 1,
                    'min'                   => 1,
                    'max'                   => 10,
                ),
                'default'                   => '5',
                'fixed_unit'                => '',
                'validate_unit'             => false,
                'unitless'                  => true,
                'toggle_slug'               => 'dnxte_comments_elements',
                'computed_affects'          => array(
					'__embeddedpost',
				),
            ),
            'dnxte_comment_width'           => array(
                'label'                     => esc_html__( 'Width', 'dnxte-divi-essential' ),
                'type'                      => 'range',
                'option_category'           => 'basic_option',
                'range_settings'            => array(
                    'step'                  => 1,
                    'min'                   => 1,
                    'max'                   => 1000,
                ),
                'default'                   => '750',
                'fixed_unit'                => '',
                'validate_unit'             => false,
                'unitless'                  => true,
                'toggle_slug'               => 'dnxte_comments_elements',
                'computed_affects'          => array(
					'__comment',
				),
            ),
            'dnxte_comment_orderby'         => array(
                'label'                     => esc_html__('Order By', 'dnxte-divi-essential'),
                'type'                      => 'select',
                'option_category'           => 'basic_option',
                'options'                   => array(
                    'social'                => esc_html__('Normal', 'dnxte-divi-essential'),
                    'time'                  => esc_html__('Time', 'dnxte-divi-essential'),
                    'reverse-time'          => esc_html__('Reverse Time', 'dnxte-divi-essential'),
                ),
                'default'                   => 'light',
                'toggle_slug'               => 'dnxte_comments_elements',
            ),
            '__comment'                     => array(
				'type'                      => 'computed',
				'computed_callback'         => array( 'NextComment' ),
				'computed_depends_on'       => array(
					'dnxte_comment_width'
				),
			),
        );
    }

    public function render($attrs, $content, $render_slug){
        wp_enqueue_style( 'dnext_comment' );
        wp_enqueue_script( 'dnext_facebook_sdk' );
        if(!$this->props['border_style_all']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector'                  => "%%order_class%% .fb-comments",
                'declaration'               => sprintf('border-style: %s',esc_attr('solid !important;')),
            ));
        }

        return sprintf('
            <div class="fb-comments" data-href="%1$s" data-numposts="%2$s" data-width="%3$s" data-order-by="%4$s">
            </div>
            <div id="fb-root">
            </div>',
            esc_url($this->props['dnxte_comment_url']),
            esc_attr($this->props['dnxte_comment_number_post']),
            esc_attr($this->props['dnxte_comment_width']),
            esc_attr($this->props['dnxte_comment_orderby'])
        );
    }

}

new NextComment;