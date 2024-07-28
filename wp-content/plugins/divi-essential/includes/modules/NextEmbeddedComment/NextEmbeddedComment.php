<?php


class NextEmbeddedComment extends ET_Builder_Module
{
    public $slug = 'dnxte_embedded_comment';
    public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-facebook-comment/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init(){
        $this->name        = esc_html__('Next FB Embedded Comment', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';

        $this->settings_modal_toggles = array(
            'general'                                 => array(
                'toggles'                             => array(
                    'dnxte_embedded_comment_elements' => esc_html__( 'Comment Elements', 'dnxte-divi-essential')
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
                            'border_radii'  => "%%order_class%% .fb-comment-embed",
                            'border_styles' => "%%order_class%% .fb-comment-embed",
                        ),
                        'important'         => 'all'
                    ),
                ),
            ),
            'box_shadow'                    => array(
                'default'                   => array(
                    'css'                   => array(
                        'main'              => '%%order_class%% .fb-comment-embed',
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
            'dnxte_embed_comment_url'   => array(
                'label'                 => esc_html__('Comment URL', 'dnxte-divi-essential'),
                'type'                  => 'text',
                'option_category'       => 'basic_option',
                'description'           => esc_html__('Input Comment URL', 'dnxte-divi-essential'),
                'toggle_slug'           => 'dnxte_embedded_comment_elements',
                'dynamic_content'       => 'text',
            ),
            'dnxte_embed_comment_parent'=> array(
                'label'                 => esc_html__('Show Parent Comment', 'dnxte-divi-essential'),
                'type'                  => 'yes_no_button',
                'toggle_slug'           => 'dnxte_embedded_comment_elements',
                'options'               => array(
                    'on'                => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off'               => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'default_on_front'      => 'off',
            ),
            'dnxte_embed_comment_lazy'  => array(
                'label'                 => esc_html__('Lazy Loading', 'dnxte-divi-essential'),
                'type'                  => 'yes_no_button',
                'toggle_slug'           => 'dnxte_embedded_comment_elements',
                'options'               => array(
                    'on'                => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off'               => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'default_on_front'      => 'off',
            ),
            'dnxte_embed_comment_width' => array(
                'label'                 => esc_html__('Width', 'dnxte-divi-essential'),
                'type'                  => 'range',
                'option_category'       => 'basic_option',
                'range_settings'        => array(
                    'step'              => 1,
                    'min'               => 1,
                    'max'               => 1000,
                ),
                'default'               => '550',
                'fixed_unit'            => '',
                'validate_unit'         => false,
                'unitless'              => true,
                'toggle_slug'           => 'dnxte_embedded_comment_elements',
                'computed_affects'      => array(
					'__embeddedcomment',
				),
            ),
            '__embeddedcomment' => array(
				'type'                  => 'computed',
				'computed_callback'     => array( 'NextEmbeddedComment' ),
				'computed_depends_on'   => array(
					'dnxte_embed_comment_width'
				),
			),
        );
    }

    public function render($attrs, $content, $render_slug){
        wp_enqueue_script( 'dnext_facebook_sdk' );
        if(!$this->props['border_style_all']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .fb-comment-embed",
                'declaration' => sprintf('border-style: solid !important;'),
            ));
        }

        $show_parent = "on" === $this->props['dnxte_embed_comment_parent'];
        $loading_lazy = "on" === $this->props['dnxte_embed_comment_lazy'];

            
        return sprintf('
            <div class="fb-comment-embed"
                data-href="%1$s"
                data-include-parent="%2$s" data-lazy="%3$s" data-width="%4$s"></div>
                <div id="fb-root"></div>',
                    esc_url($this->props['dnxte_embed_comment_url']),
                    esc_attr($show_parent),
                    esc_attr($loading_lazy),
                    esc_attr($this->props['dnxte_embed_comment_width'])
            );
        }

}

new NextEmbeddedComment;