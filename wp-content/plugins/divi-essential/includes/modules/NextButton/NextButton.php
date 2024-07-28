<?php
include_once(DIVI_ESSENTIAL_PATH.'/includes/modules/base/Common.php');

class Next_Button extends ET_Builder_Module {

	public $slug       = 'dnxte_button';
	public $vb_support = 'on';
    public $name;
	public $icon_path;
	public $folder_name;

	protected $module_credits = array(
		'module_uri' => 'https://www.diviessential.com/divi-next-button/',
		'author'     => 'Divi Next',
		'author_uri' => 'www.divinext.com',
	);

    public function init() {
        $this->name        = esc_html__('Next Button', 'dnxte-divi-essential');
        $this->icon_path   = plugin_dir_path( __FILE__ ) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';
        
        $this->settings_modal_toggles = array(
            'general'  => array(
                'toggles' => array(
                    'dnxt_button_text' => array(
                        'title'    => esc_html__('Text', 'dnxte-divi-essential'),
                        'priority' => 1,
                    ),
                    'dnxt_button_link' => array(
                        'title'    => esc_html__('Link', 'dnxte-divi-essential'),
                        'priority' => 3,
                    ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'button_font'       => array(
                        'title'    => esc_html__('Text', 'dnxte-divi-essential'),
                        'priority' => 1,
                    ),
                    'button_alignment'  => array(
                        'title'    => esc_html__('Alignment', 'dnxte-divi-essential'),
                        'priority' => 2,
                    ),
                    'button_hover'      => array(
                        'title'             => esc_html__('Hover', 'dnxte-divi-essential'),
                        'priority'          => 3,
                        'sub_toggles'       => array(
                            'sub_toggle_2d'     => array(
                                'name' => '2D ',
                            ),
                            'sub_toggle_bg'     => array(
                                'name' => 'BG',
                            ),
                            'sub_toggle_border' => array(
                                'name' => 'Stroke',
                            ),
                            'sub_toggle_icons'  => array(
                                'name' => 'Icon',
                            ),
                        ),
                        'tabbed_subtoggles' => true,
                    ),
                    'button_icon'       => array(
                        'title'    => esc_html__('Icon', 'dnxte-divi-essential'),
                        'priority' => 4,
                    ),
                    'button_border'     => array(
                        'title'    => esc_html__('Border', 'dnxte-divi-essential'),
                        'priority' => 6,
                    ),
                    'button_background' => array(
                        'title'    => esc_html__('Background', 'dnxte-divi-essential'),
                        'priority' => 7,
                    ),
                ),
            ),
        );

        // Custom CSS Field
        $this->custom_css_fields = array(
            'button_wrapper' => array(
                'label'    => esc_html__('Button Wrapper', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxt-button-wrapper',
            ),
            'button_link'    => array(
                'label'    => esc_html__('Button Link', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxt-button-wrapper a',
            ),
        );
    }

    public function get_fields() {
        $fields = array(
            // Title Field
            'button_text'         => array(
                'label'           => esc_html__('Button Text', 'dnxte-divi-essential'),
                'type'            => 'text',
                'dynamic_content' => 'text',
                'default'         => esc_html__('Button Text', 'dnxte-divi-essential'),
                'option_category' => 'basic_option',
                'description'     => esc_html__('Title entered here will appear inside the module.', 'dnxte-divi-essential'),
                'toggle_slug'     => 'dnxt_button_text',
            ),
            // Link Field
            'button_link'                      => array(
                'label'           => esc_html__('Button Link', 'dnxte-divi-essential'),
                'type'            => 'text',
                'option_category' => 'configuration',
                'toggle_slug'     => 'dnxt_button_link',
                'description'     => esc_html__('When clicked the module will link to this URL.', 'dnxte-divi-essential'),
                'dynamic_content' => 'url',
            ),
            // Link Target Field
            'button_link_new_window'           => array(
                'label'            => esc_html__('Button Link Target', 'dnxte-divi-essential'),
                'type'             => 'select',
                'option_category'  => 'configuration',
                'options'          => array(
                    'off' => esc_html__('In The Same Window', 'dnxte-divi-essential'),
                    'on'  => esc_html__('In The New Tab', 'dnxte-divi-essential'),
                ),
                'toggle_slug'      => 'dnxt_button_link',
                'description'      => esc_html__('Here you can choose whether or not your link opens in a new window', 'dnxte-divi-essential'),
                'default_on_front' => 'off',
            ),
            // Button Alignment
            'dnxt_button_alignment'            => array(
                'label'           => esc_html__('Button Alignment', 'dnxte-divi-essential'),
                'type'            => 'align',
                'option_category' => 'configuration',
                'options'         => et_builder_get_text_orientation_options(array('justified')),
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_alignment',
                'mobile_options'  => true,
                'description'     => esc_html__('Here you can define the alignment of Button', 'dnxte-divi-essential'),
            ),
            // Button Show & Hide
            'btn_show_hide'                    => array(
                'label'           => esc_html__('Show Icon', 'dnxte-divi-essential'),
                'description'     => esc_html__('When enabled, this will add a custom icon within the button.', 'dnxte-divi-essential'),
                'type'            => 'yes_no_button',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_icon',
                'default'         => 'on',
                'options'         => array(
                    'on'  => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'affects'         => array(
                    "btn_icon_color",
                    "btn_icon_placement",
                    "btn_on_hover",
                    "btn_icon",
                ),
                'depends_show_if' => 'on',
            ),
            // Button Icon
            'btn_icon'                         => array(
                'label'               => esc_html__('Button Icon', 'dnxte-divi-essential'),
                'description'         => esc_html__('Pick a color to be used for the button icon.', 'dnxte-divi-essential'),
                'type'                => 'select_icon',
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'button_icon',
                'option_category'     => 'button',
                'class'               => array('et-pb-font-icon'),
                'default'             => '$',
                'mobile_options'      => true,
                'depends_show_if_not' => 'off',
            ),
            // Button Icon Color
            'btn_icon_color'          => array(
                'label'               => esc_html__('Button Icon Color', 'dnxte-divi-essential'),
                'description'         => esc_html__('Here you can define a custom color for the button icon.', 'dnxte-divi-essential'),
                'type'                => 'color-alpha',
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'button_icon',
                'custom_color'        => true,
                'default'             => '#2857b6',
                'hover'               => 'tabs',
                'mobile_options'      => true,
                'depends_show_if_not' => 'off',
            ),
            // Button Icon Placement
            'btn_icon_placement'               => array(
                'label'               => esc_html__('Button Icon Placement', 'dnxte-divi-essential'),
                'description'         => esc_html__('Choose where the button icon should be displayed within the button.', 'dnxte-divi-essential'),
                'type'                => 'select',
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'button_icon',
                'option_category'     => 'button',
                'options'             => array(
                    'right' => esc_html__('Right', 'dnxte-divi-essential'),
                    'left'  => esc_html__('Left', 'dnxte-divi-essential'),
                ),
                'default'             => 'right',
                'depends_show_if_not' => 'off',
            ),
            // Button Icon On Hover
            'btn_on_hover'                     => array(
                'label'               => esc_html__('Only Show Icon On Hover for Button', 'dnxte-divi-essential'),
                'description'         => esc_html__('By default, button icons are displayed on hover. If you would like button icons to always be displayed, then you can enable this option.', 'dnxte-divi-essential'),
                'type'                => 'yes_no_button',
                'tab_slug'            => 'advanced',
                'toggle_slug'         => 'button_icon',
                'default'             => 'on',
                'options'             => array(
                    'on'  => esc_html__('Yes', 'dnxte-divi-essential'),
                    'off' => esc_html__('No', 'dnxte-divi-essential'),
                ),
                'depends_show_if_not' => 'off',
            ),
            // Button Hover 2D
            'dnxt_hover_2d'                    => array(
                'label'           => esc_html__('Select 2D Hover Effect', 'dnxte-divi-essential'),
                'type'            => 'select',
                'option_category' => 'configuration',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_hover',
                'sub_toggle'      => 'sub_toggle_2d',
                'default'         => '',
                'description'     => esc_html__('Here you can adjust the hover effect.', 'dnxte-divi-essential'),
                'options'         => array(
                    ''                                  => esc_html__('Select', 'dnxte-divi-essential'),
                    'dnxt-hover-backward'               => esc_html__('Backward', 'dnxte-divi-essential'),
                    'dnxt-hover-bob'                    => esc_html__('Bob', 'dnxte-divi-essential'),
                    'dnxt-hover-bounce-in'              => esc_html__('Bounce In', 'dnxte-divi-essential'),
                    'dnxt-hover-bounce-out'             => esc_html__('Bounce Out', 'dnxte-divi-essential'),
                    'dnxt-hover-buzz'                   => esc_html__('Buzz', 'dnxte-divi-essential'),
                    'dnxt-hover-buzz-out'               => esc_html__('Buzz Out', 'dnxte-divi-essential'),
                    'dnxt-hover-float'                  => esc_html__('Float', 'dnxte-divi-essential'),
                    'dnxt-hover-forward'                => esc_html__('Forward', 'dnxte-divi-essential'),
                    'dnxt-hover-grow'                   => esc_html__('Grow', 'dnxte-divi-essential'),
                    'dnxt-hover-grow-rotate'            => esc_html__('Grow Rotate', 'dnxte-divi-essential'),
                    'dnxt-hover-hang'                   => esc_html__('Hang', 'dnxte-divi-essential'),
                    'dnxt-hover-pop'                    => esc_html__('Pop', 'dnxte-divi-essential'),
                    'dnxt-hover-pulse'                  => esc_html__('Pulse', 'dnxte-divi-essential'),
                    'dnxt-hover-pulse-grow'             => esc_html__('Pulse Grow', 'dnxte-divi-essential'),
                    'dnxt-hover-pulse-shrink'           => esc_html__('Pulse Shrink', 'dnxte-divi-essential'),
                    'dnxt-hover-push'                   => esc_html__('Push', 'dnxte-divi-essential'),
                    'dnxt-hover-rotate'                 => esc_html__('Rotate', 'dnxte-divi-essential'),
                    'dnxt-hover-shrink'                 => esc_html__('Shrink', 'dnxte-divi-essential'),
                    'dnxt-hover-sink'                   => esc_html__('Sink', 'dnxte-divi-essential'),
                    'dnxt-hover-skew'                   => esc_html__('Skew', 'dnxte-divi-essential'),
                    'dnxt-hover-skew-backward'          => esc_html__('Skew Backward', 'dnxte-divi-essential'),
                    'dnxt-hover-skew-forward'           => esc_html__('Skew Forward', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-bottom'          => esc_html__('Wobble Bottom', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-horizontal'      => esc_html__('Wobble Horizontal', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-skew'            => esc_html__('Wobble Skew', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-top'             => esc_html__('Wobble Top', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-to-bottom-right' => esc_html__('Wobble To Bottom Right', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-to-top-right'    => esc_html__('Wobble To Top Right', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-vertical'        => esc_html__('Wobble Vertical', 'dnxte-divi-essential'),
                ),
            ),
            // Button Hover Effect
            'dnxt_hover_bg'                    => array(
                'label'           => esc_html__('Select Background Hover Effect', 'dnxte-divi-essential'),
                'type'            => 'select',
                'option_category' => 'configuration',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_hover',
                'sub_toggle'      => 'sub_toggle_bg',
                'default'         => '',
                'description'     => esc_html__('Here you can adjust the hover effect.', 'dnxte-divi-essential'),
                'options'         => array(
                    ''                                  => esc_html__('Select', 'dnxte-divi-essential'),
                    'dnxt-hover-fade'                   => esc_html__('Fade', 'dnxte-divi-essential'),
                    'dnxt-hover-sweep-to-right'         => esc_html__('Sweep To Right', 'dnxte-divi-essential'),
                    'dnxt-hover-sweep-to-left'          => esc_html__('Sweep To Left', 'dnxte-divi-essential'),
                    'dnxt-hover-sweep-to-bottom'        => esc_html__('Sweep To Bottom', 'dnxte-divi-essential'),
                    'dnxt-hover-sweep-to-top'           => esc_html__('Sweep To Top', 'dnxte-divi-essential'),
                    'dnxt-hover-bounce-to-right'        => esc_html__('Bounce To Right', 'dnxte-divi-essential'),
                    'dnxt-hover-bounce-to-left'         => esc_html__('Bounce To Left', 'dnxte-divi-essential'),
                    'dnxt-hover-bounce-to-bottom'       => esc_html__('Bounce To Bottom', 'dnxte-divi-essential'),
                    'dnxt-hover-bounce-to-top'          => esc_html__('Bounce To Top', 'dnxte-divi-essential'),
                    'dnxt-hover-radial-out'             => esc_html__('Radial Out', 'dnxte-divi-essential'),
                    'dnxt-hover-radial-in'              => esc_html__('Radial In', 'dnxte-divi-essential'),
                    'dnxt-hover-rectangle-in'           => esc_html__('Rectangle In', 'dnxte-divi-essential'),
                    'dnxt-hover-rectangle-out'          => esc_html__('Rectangle Out', 'dnxte-divi-essential'),
                    'dnxt-hover-shutter-in-horizontal'  => esc_html__('Shutter In Horizontal', 'dnxte-divi-essential'),
                    'dnxt-hover-shutter-out-horizontal' => esc_html__('Shutter Out Horizontal', 'dnxte-divi-essential'),
                    'dnxt-hover-shutter-in-vertical'    => esc_html__('Shutter In Vertical', 'dnxte-divi-essential'),
                    'dnxt-hover-shutter-out-vertical'   => esc_html__('Shutter Out Vertical', 'dnxte-divi-essential'),
                ),
            ),
            // Button BG Color
            'dnxt_radial_out_bg_color'         => array(
                'label'       => esc_html__('Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Background.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_bg',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_bg' => 'dnxt-hover-radial-out',
                ),
            ),
            'dnxt_radial_in_bg_color'          => array(
                'label'       => esc_html__('Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Background.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_bg',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_bg' => 'dnxt-hover-radial-in',
                ),
            ),
            'dnxt_rectangle_in_bg_color'       => array(
                'label'       => esc_html__('Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Background.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_bg',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_bg' => 'dnxt-hover-rectangle-in',
                ),
            ),
            'dnxt_rectangle_out_bg_color'      => array(
                'label'       => esc_html__('Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Background.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_bg',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_bg' => 'dnxt-hover-rectangle-out',
                ),
            ),
            'dnxt_shutter_in_bg_color'         => array(
                'label'       => esc_html__('Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Background.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_bg',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_bg' => 'dnxt-hover-shutter-in-horizontal',
                ),
            ),
            'dnxt_shutter_out_bg_color'        => array(
                'label'       => esc_html__('Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Background.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_bg',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_bg' => 'dnxt-hover-shutter-out-horizontal',
                ),
            ),
            'dnxt_shutter_in_v_bg_color'       => array(
                'label'       => esc_html__('Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Background.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_bg',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_bg' => 'dnxt-hover-shutter-in-vertical',
                ),
            ),
            'dnxt_shutter_out_v_bg_color'      => array(
                'label'       => esc_html__('Background Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Background.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_bg',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_bg' => 'dnxt-hover-shutter-out-vertical',
                ),
            ),
            // Button Hover BG Color
            'dnxt_hover_bg_color'              => array(
                'label'       => esc_html__('Select Background Hover Color', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_bg',
                'default'     => '#29c4a9',
            ),
            // Button Hover Strock
            'dnxt_hover_border'                => array(
                'label'           => esc_html__('Select Stroke Hover Effect', 'dnxte-divi-essential'),
                'type'            => 'select',
                'option_category' => 'configuration',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_hover',
                'sub_toggle'      => 'sub_toggle_border',
                'default'         => '',
                'description'     => esc_html__('Here you can adjust the hover effect.', 'dnxte-divi-essential'),
                'options'         => array(
                    ''                                 => esc_html__('Select', 'dnxte-divi-essential'),
                    'dnxt-hover-trim'                  => esc_html__('Trim', 'dnxte-divi-essential'),
                    'dnxt-hover-ripple-out'            => esc_html__('Ripple Out', 'dnxte-divi-essential'),
                    'dnxt-hover-ripple-in'             => esc_html__('Ripple In', 'dnxte-divi-essential'),
                    'dnxt-hover-underline-from-left'   => esc_html__('Underline From Left', 'dnxte-divi-essential'),
                    'dnxt-hover-underline-from-center' => esc_html__('Underline From Center', 'dnxte-divi-essential'),
                    'dnxt-hover-underline-from-right'  => esc_html__('Underline From Right', 'dnxte-divi-essential'),
                    'dnxt-hover-reveal'                => esc_html__('Reveal', 'dnxte-divi-essential'),
                    'dnxt-hover-underline-reveal'      => esc_html__('Underline Reveal', 'dnxte-divi-essential'),
                    'dnxt-hover-overline-reveal'       => esc_html__('Overline Reveal', 'dnxte-divi-essential'),
                    'dnxt-hover-overline-from-left'    => esc_html__('Overline From Left', 'dnxte-divi-essential'),
                    'dnxt-hover-overline-from-center'  => esc_html__('Overline From Center', 'dnxte-divi-essential'),
                    'dnxt-hover-overline-from-right'   => esc_html__('Overline From Right', 'dnxte-divi-essential'),
                ),
            ),
            // Button Trim Border Color
            'dnxt_trim_border_color'           => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-trim',
                ),
            ),
            // Button Hover Ripple Out Border Color
            'dnxt_ripple_out_color'            => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-ripple-out',
                ),
            ),
            // Button Hover Ripple In Border Color
            'dnxt_ripple_in_color'             => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-ripple-in',
                ),
            ),
            // Button Hover Underline From Left Border Color
            'dnxt_underline_from_left_color'   => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-underline-from-left',
                ),
            ),
            // Button Hover Underline From Center Border Color
            'dnxt_underline_from_center_color' => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-underline-from-center',
                ),
            ),
            // Button Hover Underline From Right Border Color
            'dnxt_underline_from_right_color'  => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-underline-from-right',
                ),
            ),
            // Button Hover Overline From Left Border Color
            'dnxt_overline_left_color'         => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-overline-from-left',
                ),
            ),
            // Button Hover Overline From Center Border Color
            'dnxt_overline_center_color'       => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-overline-from-center',
                ),
            ),
            // Button Hover Overline From Right Border Color
            'dnxt_overline_right_color'        => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-overline-from-right',
                ),
            ),
            // Button Hover Reveal Border Color
            'dnxt_reveal_color'                => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-reveal',
                ),
            ),
            // Button Hover Underline Reveal Border Color
            'dnxt_underline_reveal_color'      => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-underline-reveal',
                ),
            ),
            // Button Hover Overline Reveal Border Color
            'dnxt_overline_reveal_color'       => array(
                'label'       => esc_html__('Border Color', 'dnxte-divi-essential'),
                'description' => esc_html__('The color of the Border.', 'dnxte-divi-essential'),
                'type'        => 'color-alpha',
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_hover',
                'sub_toggle'  => 'sub_toggle_border',
                'default'     => 'rgba(0,0,0,0.3)',
                'show_if'     => array(
                    'dnxt_hover_border' => 'dnxt-hover-overline-reveal',
                ),
            ),
            // Button Icons Hover Effect
            'dnxt_hover_icons'                 => array(
                'label'           => esc_html__('Select Icons Hover Effect', 'dnxte-divi-essential'),
                'type'            => 'select',
                'option_category' => 'configuration',
                'tab_slug'        => 'advanced',
                'toggle_slug'     => 'button_hover',
                'sub_toggle'      => 'sub_toggle_icons',
                'default'         => '',
                'description'     => esc_html__('Here you can adjust the hover effect.', 'dnxte-divi-essential'),
                'options'         => array(
                    ''                                  => esc_html__('Select', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-back'              => esc_html__('Icon Back', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-forward'           => esc_html__('Icon Forward', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-down'              => esc_html__('Icon Down', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-up'                => esc_html__('Icon Up', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-drop'              => esc_html__('Icon Drop', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-float-away'        => esc_html__('Icon Float Away', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-sink-away'         => esc_html__('Icon Sink Away', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-grow'              => esc_html__('Icon Grow', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-shrink'            => esc_html__('Icon Shrink', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-pulse'             => esc_html__('Icon pulse', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-pulse-grow'        => esc_html__('Icon Pulse Grow', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-pulse-shrink'      => esc_html__('Icon Pulse Shrink', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-push'              => esc_html__('Icon Push', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-pop'               => esc_html__('Icon Pop', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-bounce'            => esc_html__('Icon Bounce', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-rotate'            => esc_html__('Icon Rotate', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-grow-rotate'       => esc_html__('Icon Grow Rotate', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-float'             => esc_html__('Icon Float', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-sink'              => esc_html__('Icon Sink', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-bob'               => esc_html__('Icon Bob', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-hang'              => esc_html__('Icon Hang', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-wobble-horizontal' => esc_html__('Icon Wobble Horizontal', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-wobble-vertical'   => esc_html__('Icon Wobble Vertical', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-buzz'              => esc_html__('Icon Buzz', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-buzz-out'          => esc_html__('Icon Buzz Out', 'dnxte-divi-essential'),
                ),
            ),
		);
		
		return $fields;
    }

	public function get_advanced_fields_config() {
        $advanced_fields = array();

        $advanced_fields['link_options'] = false;
        $advanced_fields['text']         = false;
        $advanced_fields['fonts']        = false;
        $advanced_fields['borders']      = false;
        //Button Text
        $advanced_fields['fonts'] = array(
            'btn_fonts' => array(
                'toggle_slug'     => 'button_font',
                'tab_slug'        => 'advanced',
                'hide_text_align' => true,
                'css'             => array(
                    'main' => "%%order_class%% .dnxt-button-wrapper a",

                ),
                'line_height'     => array(
                    'default' => '1em',
                ),
                'font_size'       => array(
                    'default' => '20px',
                ),
            ),
        );
        //Button Boxshadow
        $advanced_fields['box_shadow']['default'] = array(
            'css' => array(
                'main' => "%%order_class%% .dnxt-button-wrapper a",
            ),
        );
        //Button Background
        $advanced_fields['background'] = array(
            'use_background_pattern'    => false,
            'use_background_mask'       => false,
            'toggle_slug' => 'button_background',
            'tab_slug'    => 'basic_option',
            'hover'       => 'tabs',
            'css'         => array(
                'main' => "%%order_class%% .dnxt-button-wrapper a",
                "hover" => "%%order_class%% .dnxt-button-wrapper a:hover",
                'important'   => 'all',

            ), 
            'options'     => array(
                'background_color_gradient_start' => array(
                    'default' => et_builder_accent_color(),
                ),
                'background_color_gradient_end'   => array(
                    'default' => '#fff',
                ),
                'background_color_gradient_type'  => array(
                    'default' => 'radial',
                ),
            ),
        );
        //Button Borders
        $advanced_fields['borders'] = array(
            'btn_border' => array(
                'tab_slug'    => 'advanced',
                'toggle_slug' => 'button_border',
                'css'         => array(
                    'main' => array(
                        'border_radii'  => "%%order_class%% .dnxt-button-wrapper a",
                        'border_styles' => "%%order_class%% .dnxt-button-wrapper a",
                    ),
                ),
                'defaults'    => array(
                    'border_radii'  => 'on|3px|3px|3px|3px',
                    'border_styles' => array(
                        'width' => '2px',
                        'color' => '#2857b6',
                        'style' => 'solid',
                    ),
                ),
            ),
        );
        //Button Margin Padding
        $advanced_fields['margin_padding'] = array(
            'css'       => array(
                'margin'  => "%%order_class%% .dnxt-button-wrapper a",
                'padding' => "%%order_class%% .dnxt-button-wrapper a",
            ),
            'important' => 'all',
        );

        return $advanced_fields;
	}
	
	public function render( $attrs, $content, $render_slug ) {
        wp_enqueue_style( 'dnext_button' );
        wp_enqueue_style('dnext_hvr_common_css');

        $multi_view 						= et_pb_multi_view_options( $this );
        $dnxt_button_alignment_classes = Common::get_alignment( "dnxt_button_alignment" , $this);

        $buttonTarget = 'on' === $this->props['button_link_new_window'] ? '_blank' : '_self';

        //Button On Hover class inner
        $btnIconOnHover = 'off' === $this->props['btn_on_hover'] ? "dnxt-btn-icon-on-hover" : "";

        // Button Hover 2d
        $btnHover2d = '';
        if ('' !== $this->props['dnxt_hover_2d']) {
            $btnHover2d = sanitize_text_field($this->props['dnxt_hover_2d']);
        }

        // Button Hover Background
        $btnHoverBg = '';
        if ('' !== $this->props['dnxt_hover_bg']) {
            $btnHoverBg = sanitize_text_field($this->props['dnxt_hover_bg']);
        }

        // Button Hover Stock
        $btnHoverBorder = '';
        if ('' !== $this->props['dnxt_hover_border']) {
            $btnHoverBorder = sanitize_text_field($this->props['dnxt_hover_border']);
        }

        // Button Hover Icons
        $btnHoverIcons = '';
        if ('' !== $this->props['dnxt_hover_icons']) {
            $btnHoverIcons = sanitize_text_field($this->props['dnxt_hover_icons']);
        }

        $rightItag = '';
        $lefItag   = '';
        
        $icon_css_property = array(
            'selector'    => '%%order_class%% .dnxt-btn-icon i',
            'class'       => ''
        );

        if ('right' === $this->props['btn_icon_placement']) {
            $rightItag = Common::get_icon_html( 'btn_icon', $this, $render_slug, $multi_view, $icon_css_property, 'i' );
        } else if ('left' === $this->props['btn_icon_placement']) {
            $lefItag = Common::get_icon_html( 'btn_icon', $this, $render_slug, $multi_view, $icon_css_property, 'i' );
        }

        $this->apply_css($render_slug);
        return sprintf(
            '<div class="dnxt-button-wrapper %11$s">
				<a class="dnxt-btn-icon %5$s %6$s %7$s %8$s %4$s" href="%9$s" target="%10$s">%2$s%1$s%3$s</a>
			</div>',
            esc_html__($this->props['button_text'], 'dnxte-divi-essential'),
            $lefItag,
            $rightItag,
            $btnIconOnHover,
            $btnHover2d, //5
            $btnHoverBg,
            $btnHoverBorder,
            $btnHoverIcons,
            esc_attr($this->props['button_link']),
            esc_attr($buttonTarget), //10
            esc_attr( $dnxt_button_alignment_classes )
        );
	}
	
    public function apply_css($render_slug) {
        if ("on" === $this->props['btn_show_hide']) {

            // Button Icon Placement
            if ('right' === $this->props['btn_icon_placement']) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .dnxt-btn-icon i",
                    'declaration' => 'content: attr(data-icon);',
                ));
            } else if ('left' === $this->props['btn_icon_placement']) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .dnxt-btn-icon i",
                    'declaration' => 'content: attr(data-icon);',
                ));
            }

  		// Button Icon Color
          $btn_icon_color		    = $this->props['btn_icon_color'];
          $btn_icon_color_hover 	= $this->get_hover_value( 'btn_icon_color' );
          $btn_icon_color_values	= et_pb_responsive_options()->get_property_values( $this->props, 'btn_icon_color' );
          $btn_icon_color_tablet	= isset( $btn_icon_color_values['tablet'] ) ? $btn_icon_color_values['tablet'] : '';
          $btn_icon_color_phone	    = isset( $btn_icon_color_values['phone'] ) ? $btn_icon_color_values['phone'] : '';

		if ( '' !== $btn_icon_color ) {
			$btn_icon_color_style 		 	= sprintf( 'color: %1$s;', esc_attr( $btn_icon_color ) );
			$btn_icon_color_tablet_style 	= '' !== $btn_icon_color_tablet ? sprintf( 'color: %1$s;', esc_attr( $btn_icon_color_tablet ) ) : '';
			$btn_icon_color_phone_style  	= '' !== $btn_icon_color_phone ? sprintf( 'color: %1$s;', esc_attr( $btn_icon_color_phone ) ) : '';
			
			$btn_icon_color_style_hover  = '';

			if ( et_builder_is_hover_enabled( 'btn_icon_color', $this->props ) ) {
				$btn_icon_color_style_hover = sprintf( 'color: %1$s;', esc_attr( $btn_icon_color_hover ) );
			}

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-btn-icon i",
				'declaration' => $btn_icon_color_style,
			) );
			
			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-btn-icon i",
				'declaration' => $btn_icon_color_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			) );

			ET_Builder_Element::set_style( $render_slug, array(
				'selector'    => "%%order_class%% .dnxt-btn-icon i",
				'declaration' => $btn_icon_color_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			) );

			if ( "" !== $btn_icon_color_style_hover ) {
				ET_Builder_Element::set_style( $render_slug, array(
					'selector'    => $this->add_hover_to_order_class( "%%order_class%% .dnxt-btn-icon:hover i" ),
					'declaration' => $btn_icon_color_style_hover,
				) );
			}
		}

            // Button Icon On Hover
            if ('on' === $this->props['btn_on_hover'] && 'right' === $this->props['btn_icon_placement']) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .dnxt-btn-icon:hover i",
                    'declaration' => sprintf('opacity: %1$s; visibility: %2$s;margin-left: %3$s;padding-left: %4$s;',esc_attr( 1 ), esc_attr('visible'),esc_attr(0), esc_attr('0.4em') ),
                ));
            } else if ('on' === $this->props['btn_on_hover']) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .dnxt-btn-icon:hover i",
                    'declaration' => sprintf( 'opacity: %1$s; visibility: %2$s;', esc_attr( 1 ), esc_attr( 'visible' ) ),
                ));
            }

            if ('on' === $this->props['btn_on_hover'] && 'left' === $this->props['btn_icon_placement']) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .dnxt-btn-icon:hover i",
                    'declaration' => sprintf( 'opacity: %1$s; visibility: %2$s;padding-right: %3$s;margin-left: %4$s;',esc_attr( 1 ),esc_attr( 'visible' ), esc_attr( '0.4em'), esc_attr( 0 ) ),
                ));
            } else if ('on' === $this->props['btn_on_hover']) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .dnxt-btn-icon:hover i",
                    'declaration' => sprintf( 'opacity: %1$s;visibility: %2$s;', esc_attr( 1 ), esc_attr( 'visible' ) ),
                ));
            }

            // Button Icon Placement
            if ('off' === $this->props['btn_on_hover'] && 'left' === $this->props['btn_icon_placement']) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .dnxt-btn-icon.dnxt-btn-icon-on-hover i",
                    'declaration' => sprintf( 'opacity: %1$s; visibility: %2$s;margin-left: %3$s;padding-right: %4$s;',esc_attr( 1 ),esc_attr( 'visible' ), esc_attr( '0.4em' ), esc_attr( 0 ) ),
                ));
            } else if ('off' === $this->props['btn_on_hover'] && 'right' === $this->props['btn_icon_placement']) {
                ET_Builder_Element::set_style($render_slug, array(
                    'selector'    => "%%order_class%% .dnxt-btn-icon.dnxt-btn-icon-on-hover i",
                    'declaration' => sprintf( 'opacity: %1$s;visibility: %2$s;margin-left: %3$s;padding-left: %4$s;', esc_attr( 1 ), esc_attr( 'visible' ),esc_attr( 0 ),esc_attr( '0.4em')  ),
                ));
            }
        }

        // Button Hover Background Color
        if ('' !== $this->props['dnxt_hover_bg_color']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .{$this->props['dnxt_hover_bg']}:before",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr( $this->props['dnxt_hover_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .{$this->props['dnxt_hover_bg']}:hover:before",
                'declaration' => sprintf( 'transform: %1$s !important;',esc_attr( 'scaleX(1)' ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-fade:hover",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_hover_bg_color'] ) ),
            ));
        }

        // Button Hover Background Color Radial Out
        if ('dnxt-hover-radial-out' === $this->props['dnxt_hover_bg']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-radial-out",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_radial_out_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-radial-out:before",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_hover_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-radial-out:hover:before",
                'declaration' => sprintf( 'transform: %1$s !important;', esc_attr( 'scale(2)' ) ),
            ));
        }

        // Button Hover Background Color Radial In
        if ('dnxt-hover-radial-in' === $this->props['dnxt_hover_bg']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-radial-in",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_hover_bg_color'] ) ),
        ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-radial-in:before",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_radial_in_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-radial-in:hover:before",
                'declaration' => sprintf( 'transform: %1$s !important;', esc_attr( 'scale(0)' ) ),
            ));
        }                       

        // Button Hover Background Color Rectangle In
        if ('dnxt-hover-rectangle-in' === $this->props['dnxt_hover_bg']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-rectangle-in",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_hover_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-rectangle-in:before",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_rectangle_in_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-rectangle-in:hover:before",
                'declaration' => sprintf( 'transform: %1$s !important;', esc_attr( 'scale(0)' ) ),
            ));
        }

        // Button Hover Background Color Rectangle Out
        if ('dnxt-hover-rectangle-out' === $this->props['dnxt_hover_bg']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-rectangle-out",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_rectangle_out_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-rectangle-out:before",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_hover_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-rectangle-out:hover:before",
                'declaration' => sprintf( 'transform: %1$s !important;', esc_attr( 'scale(1)' ) ),
            ));
        }

        // Button Hover Background Color Shutter In
        if ('dnxt-hover-shutter-in-horizontal' === $this->props['dnxt_hover_bg']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-in-horizontal",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_hover_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-in-horizontal:before",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_shutter_in_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-in-horizontal:hover:before",
                'declaration' => sprintf( 'transform: %1$s !important;', esc_attr( 'scaleX(0)' ) ),
            ));
        }

        // Button Hover Background Color Shutter Out
        if ('dnxt-hover-shutter-out-horizontal' === $this->props['dnxt_hover_bg']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-out-horizontal",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_shutter_out_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-out-horizontal:before",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_hover_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-out-horizontal:hover:before",
                'declaration' => sprintf( 'transform: %1$s !important;', esc_attr( 'scaleX(1)' ) ),
            ));
        }

        // Button Hover Background Color Shutter In Vertical
        if ('dnxt-hover-shutter-in-vertical' === $this->props['dnxt_hover_bg']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-in-vertical",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_hover_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-in-vertical:before",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_shutter_in_v_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-in-vertical:hover:before",
                'declaration' => sprintf( 'transform: %1$s !important;', esc_attr( 'scaleY(0)' ) ),
            ));
        }

        // Button Hover Background Color Shutter Out Vertical
        if ('dnxt-hover-shutter-out-vertical' === $this->props['dnxt_hover_bg']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-out-vertical",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_shutter_out_v_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-out-vertical:before",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_hover_bg_color'] ) ),
            ));
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-shutter-out-vertical:hover:before",
                'declaration' => sprintf( 'transform: %1$s !important;', esc_attr( 'scaleY(1)' ) ),
            ));
        }

        // Hover Trim Border Color
        if ('dnxt-hover-trim' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-trim:before",
                'declaration' => sprintf( 'border: %1$s solid 4px;', esc_attr($this->props['dnxt_trim_border_color'] ) ),
            ));
        }

        // Hover Ripple In Border Color
        if ('dnxt-hover-ripple-out' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-ripple-out:before",
                'declaration' => sprintf( 'border: %1$s solid 6px;', esc_attr($this->props['dnxt_ripple_out_color'] ) ),
            ));
        }

        // Hover Ripple Out Border Color
        if ('dnxt-hover-ripple-in' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-ripple-in:before",
                'declaration' => sprintf( 'border: %1$s solid 6px;', esc_attr($this->props['dnxt_ripple_in_color'] ) ),
            ));
        }

        // Hover Underline From Left Color
        if ('dnxt-hover-underline-from-left' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-underline-from-left:before",
                'declaration' => sprintf( 'background: %1$s;', esc_attr($this->props['dnxt_underline_from_left_color'] ) ),
            ));
        }

        // Hover Underline From Center Color
        if ('dnxt-hover-underline-from-center' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-underline-from-center:before",
                'declaration' => sprintf( 'background: %1$s;', esc_attr($this->props['dnxt_underline_from_center_color'] ) ),
            ));
        }

        // Hover Underline From Right Color
        if ('dnxt-hover-underline-from-right' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-underline-from-right:before",
                'declaration' => sprintf( 'background: %1$s;', esc_attr($this->props['dnxt_underline_from_right_color'] ) ),
            ));
        }

        // Hover Overline From Left Color
        if ('dnxt-hover-overline-from-left' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-overline-from-left:before",
                'declaration' => sprintf( 'background: %1$s !important;', esc_attr($this->props['dnxt_overline_left_color'] ) ),
            ));
        }

        // Hover Overline From Center Color
        if ('dnxt-hover-overline-from-center' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-overline-from-center:before",
                'declaration' => sprintf( 'background: %1$s;', esc_attr($this->props['dnxt_overline_center_color'] ) ),
            ));
        }

        // Hover Overline From Center Color
        if ('dnxt-hover-overline-from-right' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-overline-from-right:before",
                'declaration' => sprintf( 'background: %1$s;', esc_attr($this->props['dnxt_overline_right_color'] ) ),
            ));
        }

        // Hover Reveal Color
        if ('dnxt-hover-reveal' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-reveal:before",
                'declaration' => sprintf( 'border-color: %1$s;', esc_attr($this->props['dnxt_reveal_color'] ) ),
            ));
        }

        // Hover Underline Reveal Color
        if ('dnxt-hover-underline-reveal' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-underline-reveal:before",
                'declaration' => sprintf( 'background: %1$s;', esc_attr($this->props['dnxt_underline_reveal_color'] ) ),
            ));
        }

        // Hover Underline overline Color
        if ('dnxt-hover-overline-reveal' === $this->props['dnxt_hover_border']) {
            ET_Builder_Element::set_style($render_slug, array(
                'selector'    => "%%order_class%% .dnxt-hover-overline-reveal:before",
                'declaration' => sprintf( 'background: %1$s;', esc_attr($this->props['dnxt_overline_reveal_color'] ) ),
            ));
        }
    }
    public function multi_view_filter_value( $raw_value, $args, $multi_view ) {
		$name = isset( $args['name'] ) ? $args['name'] : '';
		$mode = isset( $args['mode'] ) ? $args['mode'] : '';

		if ( $raw_value && 'btn_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}
		return $raw_value;
	}
}

new Next_Button;