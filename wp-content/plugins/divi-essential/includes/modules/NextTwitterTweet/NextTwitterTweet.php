<?php

class NextTwitterTweet extends ET_Builder_Module
{
    public $slug = 'dnxte_twitter_tweet';
    public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-twitter-tweet/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init(){
        $this->name        = esc_html__('Next Twitter Tweet', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';

        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'dnxte_twitter_elements' => esc_html__('Tweet Elements', 'dnxte-divi-essential')
                )
            )
        );
    }

    public function get_advanced_fields_config(){
        return array(
            'text' => false,
            'fonts' => false,
            'borders' => false,
            'box_shadow' => false,
            'margin_padding' => array(
                'use_padding' => false,
            ),
            'max_width' => false
        );
    }

    public function get_fields() {
        return array(
            'dnxte_twitter_id'     => array(
                'label'             => esc_html__('Tweet ID', 'dnxte-divi-essential'),
                'type'              => 'text',
                'option_category'   => 'basic_option',
                'description'       => esc_html__('Input Tweet ID.', 'dnxte-divi-essential'),
                'toggle_slug'       => 'dnxte_twitter_elements',
            ),
            'dnxte_twitter_lang'     => array(
                'label'             => esc_html__('Language Code', 'dnxte-divi-essential'),
                'type'              => 'text',
                'option_category'   => 'basic_option',
                'default'           => 'en',
                'description'       => esc_html__('Input your language code.default is English.', 'dnxte-divi-essential'),
                'toggle_slug'       => 'dnxte_twitter_elements',
            ),
            'dnxte_twitter_show_cards' => array(
                'label'             => esc_html__( 'Show Cards', 'dnxte-divi-essential'),
                'description' => esc_html__('Choose Yes or No to display Cards or Picture attached to tweet.', 'dnxte-divi-essential'),
				'type'              => 'yes_no_button',
				'toggle_slug'       => 'dnxte_twitter_elements',
				'options'           => array(
					'on'            => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off'           => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'default_on_front'  => 'on',
            ),
            'dnxte_twitter_show_conversation' => array(
                'label'             => esc_html__( 'Show Coversation', 'dnxte-divi-essential'),
                'description'       => esc_html__('When set to none, only the cited Tweet will be displayed even if it is in reply to another Tweet.', 'dnxte-divi-essential'),
				'type'              => 'yes_no_button',
				'toggle_slug'       => 'dnxte_twitter_elements',
				'options'           => array(
					'on'            => esc_html__( 'Yes', 'dnxte-divi-essential' ),
					'off'           => esc_html__( 'No', 'dnxte-divi-essential' ),
				),
				'default_on_front'  => 'on',
            ),
            'dnxte_twitter_align'   => array(
				'label'             => esc_html__( 'Align', 'dnxte-divi-essential' ),
				'description'       => esc_html__( 'Align tweet to the left, right or center.', 'dnxte-divi-essential' ),
				'type'              => 'align',
				'option_category'   => 'layout',
				'options'           => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'toggle_slug'       => 'dnxte_twitter_elements',
				'mobile_options'    => true,
				'responsive'	    => true,
            ),
            'dnxte_twitter_theme'	=> array(
				'label'				=> esc_html__( 'Theme', 'dnxte-divi-essential' ),
				'description'       => esc_html__( 'Choose tweet theme.', 'dnxte-divi-essential' ),
				'type'              => 'select',
				'option_category'	=> 'layout',
				'toggle_slug'       => 'dnxte_twitter_elements',
				'option_category'   => 'layout',
				'options'           => array(
					'light'		    => esc_html__( 'Light', 'dnxte-divi-essential' ),
					'dark'			=> esc_html__( 'Dark', 'dnxte-divi-essential' ),
				),
				'default'             => 'light',
            ),
            'dnxte_twitter_width'        => array(
                'label'                     => esc_html__( 'Width', 'dnxte-divi-essential' ),
                'type'                      => 'range',
                'option_category'           => 'basic_option',
                'range_settings'            => array(
                    'step'                  => 1,
                    'min'                   => 250,
                    'max'                   => 550,
                ),
                'default'                   => '325',
                'fixed_unit'                => '',
                'validate_unit'             => false,
                'unitless'                  => true,
                'toggle_slug'               => 'dnxte_twitter_elements',
                'computed_affects'          => array(
					'__twittertweet',
				),
            ),
            '__twittertweet'                => array(
				'type'                      => 'computed',
				'computed_callback'         => array( 'NextTwitterTweet' ),
				'computed_depends_on'       => array(
					'dnxte_twitter_width'
				),
			),
        );
    }

    public function render($attrs, $content, $render_slug){
        wp_enqueue_style( 'dnext_twitter_tweet' );
        wp_enqueue_script( 'dnext_twitter_widgets' );
        wp_enqueue_script( 'dnext_twitter_activation' );
        return sprintf('
        <div class="dnxte-twitter-tweet" data-id="%1$s" data-theme-name="%2$s" data-show-cards="%3$s" data-show-conversation="%4$s" data-width="%5$s" data-align="%6$s" data-lang="%7$s">
        </div>',
        $this->props['dnxte_twitter_id'],
        $this->props['dnxte_twitter_theme'],
        $this->props['dnxte_twitter_show_cards'],
        $this->props['dnxte_twitter_show_conversation'],
        $this->props['dnxte_twitter_width'],
        $this->props['dnxte_twitter_align'],
        $this->props['dnxte_twitter_lang']
    );
    }

}

new NextTwitterTweet;