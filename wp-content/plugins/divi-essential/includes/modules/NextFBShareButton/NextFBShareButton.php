<?php

class NextFBShareButton extends ET_Builder_Module
{
    public $slug = 'dnxte_fb_share_button';
    public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-facebook-share/',
        'author'     => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init(){
        $this->name        = esc_html__('Next FB Share Button', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';

        $this->settings_modal_toggles = array(
            'general'                           => array(
                'toggles'                       => array(
                    'dnxte_fb_share_elements' => esc_html__( 'Share Button Elements', 'dnxte-divi-essential')
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
                            'border_radii'  => "%%order_class%% .fb-share-button",
                            'border_styles' => "%%order_class%% .fb-share-button",
                        ),
                        'important'         => 'all'
                    ),
                ),
            ),
            'box_shadow'                    => array(
                'default'                   => array(
                    'css'                   => array(
                        'main'              => '%%order_class%% .fb-share-button',
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
                    'margin' => '%%order_class%% .fb-share-button',
                    'padding' => '%%order_class%% .fb-share-button',
                ),
            )
        );
    }

    public function get_fields() {
        return array(
            'dnxte_fb_share_url'            => array(
                'label'                     => esc_html__('Post URL', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('Input post URL.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_fb_share_elements',
                'dynamic_content'           => 'text',
            ),
            'dnxte_fb_share_size'           => array(
                'label'                     => esc_html__('Size', 'dnxte-divi-essential'),
                'type'                      => 'select',
                'option_category'           => 'basic_option',
                'options'                   => array(
                    'small'                 => esc_html__('Small', 'dnxte-divi-essential'),
                    'large'                 => esc_html__('Large', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'small',
                'toggle_slug'               => 'dnxte_fb_share_elements',
            ),
            'dnxte_fb_share_layout'         => array(
                'label'                     => esc_html__('Layout', 'dnxte-divi-essential'),
                'type'                      => 'select',
                'option_category'           => 'basic_option',
                'options'                   => array(
                    'button_count'          => esc_html__('Button Count', 'dnxte-divi-essential'),
                    'box_count'             => esc_html__('Box Count', 'dnxte-divi-essential'),
                    'button'                => esc_html__('Button', 'dnxte-divi-essential'),
                ),
                'default_on_front'          => 'button_count',
                'toggle_slug'               => 'dnxte_fb_share_elements',
            ),
        );
    }

    public function render($attrs, $content, $render_slug){
        wp_enqueue_script( 'dnext_facebook_sdk' );
        if(!$this->props['border_style_all']){
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => "%%order_class%% .fb-share-button",
                'declaration' => sprintf('border-style: %s',esc_attr('solid !important;')),
            ));
        }

        return sprintf('<div class="fb-share-button" data-href="%1$s" data-layout="%2$s" data-size="%3$s"></div>',
        esc_url($this->props['dnxte_fb_share_url']),    
        esc_attr($this->props['dnxte_fb_share_layout']),    
        esc_attr($this->props['dnxte_fb_share_size'])    
    );
    }

}

new NextFBShareButton;