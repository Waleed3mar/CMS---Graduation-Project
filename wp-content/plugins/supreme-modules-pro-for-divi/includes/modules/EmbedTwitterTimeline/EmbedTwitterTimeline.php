<?php

class DSM_TwitterEmbeddedTimeline extends ET_Builder_Module {

	public $slug       = 'dsm_embed_twitter_timeline';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Embed Twitter Timeline ', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';
		// Toggle settings.
		$this->settings_modal_toggles = array(
			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Twitter Timeline Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'text'       => false,
			'fonts'      => false,
			'height'     => false,
			'background' => array(
				'css'     => array(
					'main' => '%%order_class%%',
				),
				'options' => array(
					'parallax_method' => array(
						'default' => 'off',
					),
				),
			),
			'max_width'  => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'twitter_username'  => array(
				'label'            => esc_html__( 'Twitter Username', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'XDevelopers',
				'description'      => esc_html__( 'Enter the Twitter Username without the hashtag @', 'dsm-supreme-modules-pro-for-divi' ),
				'dynamic_content'  => 'text',
			),
			'limit_tweet'       => array(
				'label'            => esc_html__( 'Limit Tweets', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Limiting the number of Tweets displayed.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'off',
			),
			'tweet_number'      => array(
				'label'           => esc_html__( 'Number of Tweets', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'toggle_slug'     => 'main_content',
				'validate_unit'   => false,
				'unitless'        => true,
				'default'         => '3',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '20',
					'step' => '1',
				),
				'show_if'         => array(
					'limit_tweet' => 'on',
				),
			),
			'theme'             => array(
				'label'            => esc_html__( 'Theme', 'et_builder' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'light' => esc_html__( 'Light', 'et_builder' ),
					'dark'  => esc_html__( 'Dark', 'et_builder' ),
				),
				'default_on_front' => 'Dark',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose whether the Twitter Widget will appear in light or dark theme.', 'et_builder' ),
			),
			/*
			'link_color' => array(
				'label'             => esc_html__( 'Link Color', 'et_builder' ),
				'type'              => 'color',
				'custom_color'      => true,
				'toggle_slug'     => 'main_content',
				'default_on_front' => '#1b95e0',
			),
			*/
			'header'            => array(
				'label'            => esc_html__( 'Show Header', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Hides the timeline header. Implementing sites must add their own Twitter attribution, link to the source timeline, and comply with other Twitter display requirements.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'on',
			),
			'footer'            => array(
				'label'            => esc_html__( 'Show Footer', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Hides the timeline footer and Tweet composer link, if included in the timeline widget type.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'on',
			),
			'borders'           => array(
				'label'            => esc_html__( 'Show Border', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Removes all borders within the widget including borders surrounding the widget area and separating Tweets.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'on',
			),
			'scrollbar'         => array(
				'label'            => esc_html__( 'Show Scrollbar', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Crops and hides the main timeline scrollbar, if visible. Please consider that hiding standard user interface components can affect the accessibility of your website.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'on',
			),
			'remove_background' => array(
				'label'            => esc_html__( "Remove Widget's Background color", 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Removes the widget’s background color.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'off',
			),
			'twitter_height'    => array(
				'label'           => esc_html__( 'Twitter Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'toggle_slug'     => 'main_content',
				'default_unit'    => '',
				'default'         => '800px',
				'range_settings'  => array(
					'min'  => '200',
					'max'  => '1000',
					'step' => '1',
				),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$twitter_username = $this->props['twitter_username'];
		$limit_tweet      = $this->props['limit_tweet'];
		$tweet_number     = floatval( $this->props['tweet_number'] );
		$theme            = $this->props['theme'];
		$header           = $this->props['header'];
		$footer           = $this->props['footer'];
		$borders          = $this->props['borders'];
		$scrollbar        = $this->props['scrollbar'];
		$height           = floatval( $this->props['twitter_height'] );
		// $link_color = $this->props['link_color'];
		$remove_background = $this->props['remove_background'];

		wp_enqueue_script( 'dsm-twitter-embed' );
		// Render module content.
		$output = sprintf(
			'<div class="dsm-twitter-timeline">
				<a class="twitter-timeline" data-height="%9$s" data-theme="%8$s" href="https://twitter.com/%1$s" data-chrome="%2$s%3$s%4$s%5$s%6$s"%7$s>Tweets by @%1$s</a>
			</div>',
			esc_attr( $twitter_username ),
			'on' !== $header ? 'noheader' : '',
			'on' !== $footer ? ' nofooter' : '',
			'on' !== $borders ? ' noborders' : '',
			'on' !== $scrollbar ? ' noscrollbar' : '',
			'off' !== $remove_background ? ' transparent' : '',
			'off' !== $limit_tweet ? esc_attr( " data-tweet-limit={$tweet_number}" ) : '',
			esc_attr( $theme ),
			esc_attr( $height )
		);

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-embed-twitter-timeline', plugin_dir_url( __DIR__ ) . 'EmbedTwitterTimeline/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}
		return $output;
	}

	/**
	 * Force load global styles.
	 *
	 * @param array $assets_list Current global assets on the list.
	 *
	 * @return array
	 */
	public function dsm_load_required_divi_assets( $assets_list, $assets_args, $instance ) {
		$assets_prefix     = et_get_dynamic_assets_path();
		$all_shortcodes    = $instance->get_saved_page_shortcodes();
		$this->_cpt_suffix = et_builder_should_wrap_styles() && ! et_is_builder_plugin_active() ? '_cpt' : '';

		if ( ! isset( $assets_list['et_jquery_magnific_popup'] ) ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "{$assets_prefix}/css/magnific_popup.css",
			);
		}

		if ( ! isset( $assets_list['et_pb_overlay'] ) ) {
			$assets_list['et_pb_overlay'] = array(
				'css' => "{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
			);
		}

		// EmbedTwitterTimeline.
		if ( ! isset( $assets_list['dsm_embed_twitter_timeline'] ) ) {
			$assets_list['dsm_embed_twitter_timeline'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'EmbedTwitterTimeline/style.css',
			);
		}

		return $assets_list;
	}
}

new DSM_TwitterEmbeddedTimeline();
