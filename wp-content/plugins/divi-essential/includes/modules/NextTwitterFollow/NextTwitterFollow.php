<?php

class NextTwitterFollow extends ET_Builder_Module
{
    public $slug        = 'dnxte_twitter_follow';
    public $vb_support  = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri'    => 'https://www.diviessential.com/divi-twitter-follow/',
        'author'        => 'Divi Next',
        'author_uri'    => 'www.divinext.com',
    );

    public function init(){
        $this->name         = esc_html__('Next Twitter Follow Button', 'dnxte-divi-essential');
        $this->icon_path    = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name  = 'et_pb_divi_essential';

        $this->settings_modal_toggles   = array(
            'general'                   => array(
                'toggles'               => array(
                    'dnxte_twitter_follow_elements' => esc_html__('Twitter Follow Elements', 'dnxte-divi-essential'),
                    'dnxte_twitter_button_settings' => esc_html__('Twitter Button Settings', 'dnxte-divi-essential')
                )
            )
        );
    }

    public function get_advanced_fields_config(){
        return array(
            'text'              => false,
            'fonts'             => false,
            'height'            => false,
            'margin_padding'    => false,
            'borders'           => false,      
            'box_shadow'        => false      
        );
    }

    public function get_fields() {
        return array(
            'twitter_follow_username'       => array(
                'label'                     => esc_html__('Username', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('Input twitter username here.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_twitter_follow_elements',
            ),
            'twitter_follow_show_screen_name'=> array(
                'label'                     => esc_html__( 'Show Username', 'dnxte-divi-essential'),
                'description'               => esc_html__('Choose Yes or No to show Username in follow button.', 'dnxte-divi-essential'),
				'type'                      => 'yes_no_button',
				'toggle_slug'               => 'dnxte_twitter_follow_elements',
				'options'                   => array(
					'on'                    => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off'                   => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'default_on_front'          => 'off',
            ),
            'twitter_follow_show_count'     => array(
                'label'                     => esc_html__( 'Show Count', 'dnxte-divi-essential'),
                'description'               => esc_html__('Choose Yes or No to show number of accounts following the specified account.', 'dnxte-divi-essential'),
				'type'                      => 'yes_no_button',
				'toggle_slug'               => 'dnxte_twitter_follow_elements',
				'options'                   => array(
					'on'                    => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off'                   => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'default_on_front'          => 'off',
            ),
            'twitter_button_size'	        => array(
				'label'				        => esc_html__( 'Button Size', 'dnxte-divi-essential' ),
				'description'               => esc_html__( 'Choose tweet button size.', 'dnxte-divi-essential' ),
				'type'                      => 'select',
				'option_category'	        => 'layout',
				'toggle_slug'               => 'dnxte_twitter_button_settings',
				'option_category'           => 'layout',
				'options'                   => array(
					'large'		            => esc_html__( 'Large', 'dnxte-divi-essential' ),
					'small'			        => esc_html__( 'Small', 'dnxte-divi-essential' ),
				),
				'default'                   => 'large',
            ),
            'twitter_button_lang'           => array(
                'label'                     => esc_html__('Button Language', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('Input your language code. Default is en for English.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_twitter_button_settings',
                'default'                   => 'en'
            ),
        );
    }

    public function render($attrs, $content, $render_slug){
        wp_enqueue_script( 'dnext_twitter_widgets' );
        wp_enqueue_script( 'dnext_twitter_activation' );
        return sprintf('
            <div class="dnxte-twitter-follow" data-username="%1$s" data-size="%2$s" data-show-screen-name="%3$s" data-show-count="%4$s" data-lang="%5$s">
            </div>',
            $this->props['twitter_follow_username'],
            $this->props['twitter_button_size'],
            $this->props['twitter_follow_show_screen_name'],
            $this->props['twitter_follow_show_count'],
            $this->props['twitter_button_lang']
        );
    }

}

new NextTwitterFollow;