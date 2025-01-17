<?php

class NextTwitterShare extends ET_Builder_Module
{
    public $slug        = 'dnxte_twitter_share';
    public $vb_support  = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri'    => 'https://www.diviessential.com/divi-twitter-button/',
        'author'        => 'Divi Next',
        'author_uri'    => 'www.divinext.com',
    );

    public function init(){
        $this->name         = esc_html__('Next Twitter Tweet Button', 'dnxte-divi-essential');
        $this->icon_path    = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name  = 'et_pb_divi_essential';

        $this->settings_modal_toggles               = array(
           'general'                                => array(
               'toggles'                            => array(
                    'dnxte_twitter_tweet_elements'  => esc_html__('Tweet Share Elements', 'dnxte-divi-essential'),
                    'dnxte_twitter_button_settings' => esc_html__('Tweet Button Settings', 'dnxte-divi-essential'),
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
            'twitter_tweet_text'   => array(
                'label'                     => esc_html__('Tweet Text', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'default'                   => 'Divi Essential',
                'description'               => esc_html__('Input twitter tweet text here.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_twitter_tweet_elements',
            ),
            'twitter_tweet_url'   => array(
                'label'                     => esc_html__('Tweet URL', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('URL included with the Tweet.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_twitter_tweet_elements',
            ),
            'twitter_tweet_hashtags'   => array(
                'label'                     => esc_html__('Hashtags', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('Input a comma-separated list of hashtags to be appended to default Tweet text.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_twitter_tweet_elements',
            ),
            'twitter_tweet_via'   => array(
                'label'                     => esc_html__('Via', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('Attribute the source of a Tweet to a Twitter username.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_twitter_tweet_elements',
            ),
            'twitter_tweet_related'   => array(
                'label'                     => esc_html__('Related Accounts', 'dnxte-divi-essential'),
                'type'                      => 'text',
                'option_category'           => 'basic_option',
                'description'               => esc_html__('Input a comma-separated list of accounts related to the content of the shared URI.', 'dnxte-divi-essential'),
                'toggle_slug'               => 'dnxte_twitter_tweet_elements',
            ),
            'twitter_button_size'	    => array(
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
            'twitter_button_lang'   => array(
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
        return sprintf('
        <a class="twitter-share-button dnxte-twitter-tweet" href="https://twitter.com/intent/tweet" data-size="%1$s" data-text="%2$s"
        data-url="%3$s" data-hashtags="%4$s" data-via="%5$s"
        data-related="%6$s" data-lang="%7$s">
        </a>',
        $this->props['twitter_button_size'],
        $this->props['twitter_tweet_text'],
        $this->props['twitter_tweet_url'],
        $this->props['twitter_tweet_hashtags'],
        $this->props['twitter_tweet_via'],
        $this->props['twitter_tweet_related'],
        $this->props['twitter_button_lang']
    );
    }

}

new NextTwitterShare;