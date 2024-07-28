<?php
include_once DIVI_ESSENTIAL_PATH . '/includes/modules/base/Common.php';

class NextAdvancedTab extends ET_Builder_Module
{

    public $slug = 'dnxte_advanced_tab';
    public $vb_support = 'on';
    public $child_slug = 'dnxte_advanced_tab_item';
    public $name;
	public $icon_path;
	public $folder_name;

    protected $module_credits = array(
        'module_uri' => 'https://www.diviessential.com/divi-advanced-tab/',
        'author' => 'Divi Next',
        'author_uri' => 'www.divinext.com',
    );

    public function init()
    {
        $this->name = esc_html__('Next Advanced Tab', 'dnxte-divi-essential');
        $this->icon_path = plugin_dir_path(__FILE__) . 'icon.svg';
        $this->folder_name = 'et_pb_divi_essential';
        
        $this->settings_modal_toggles = array(
            'general' => array(
                'toggles' => array(
                    'tab_container_bg' => array(
                        'title' => esc_html__('Tab Container Background', 'dnxte-divi-essential'),
                    ),
                    'content_container_bg' => array(
                        'title' => esc_html__('Content Container Background', 'dnxte-divi-essential'),
                    ),
                ),
            ),
            'advanced' => array(
                'toggles' => array(
                    'tabs_settings' => array(
                        'title' => esc_html__('Tab Settings', 'dnxte-divi-essential'),
                    ),
                    'body_settings' => array(
                        'title' => esc_html__('Body Settings', 'dnxte-divi-essential'),
                    ),
                    'tab_fonts' => array(
                        'title' => esc_html__('Tab Text', 'dnxte-divi-essential'),
                        'sub_toggles' => array(
                            'tab_title' => array(
                                'name' => esc_html__('Title', 'dnxte-divi-essential'),
                            ),
                            'tab_subtitle' => array(
                                'name' => esc_html__('Subtitle', 'dnxte-divi-essential'),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
                    ),
                    'tab_active_fonts' => array(
                        'title' => esc_html__('Tab Active Text', 'dnxte-divi-essential'),
                        'sub_toggles' => array(
                            'tab_title' => array(
                                'name' => esc_html__('Title', 'dnxte-divi-essential'),
                            ),
                            'tab_subtitle' => array(
                                'name' => esc_html__('Subtitle', 'dnxte-divi-essential'),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
                    ),
                    'body_fonts' => array(
                        'title' => esc_html__('Body Text', 'dnxte-divi-essential'),
                        'sub_toggles' => array(
                            'body_title' => array(
                                'name' => esc_html__('Title', 'dnxte-divi-essential'),
                            ),
                            'body_description' => array(
                                'name' => esc_html__('Description', 'dnxte-divi-essential'),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
                    ),
                    'icon_settings' => array(
                        'title' => esc_html__('Icon Settings', 'dnxte-divi-essential'),
                        'sub_toggles' => array(
                            'tab' => array(
                                'name' => esc_html__('Tab', 'dnxte-divi-essential'),
                            ),
                            'body' => array(
                                'name' => esc_html__('Body', 'dnxte-divi-essential'),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
                    ),
                    'tab_body_borders' => array(
                        'title' => esc_html__('Tab & Body Border', 'dnxte-divi-essential'),
                        'sub_toggles' => array(
                            'tab' => array(
                                'name' => esc_html__('Tab', 'dnxte-divi-essential'),
                            ),
                            'body' => array(
                                'name' => esc_html__('Body', 'dnxte-divi-essential'),
                            ),
                        ),
                        'tabbed_subtoggles' => true,
                    ),
                    'tab_borders_active' => esc_html__('Tab Active Border', 'dnxte-divi-essential'),
                    'tab_active_settings' => esc_html__('Tab Active Styles', 'dnxte-divi-essential'),
                ),
            ),
        );

        $this->custom_css_fields = array(
            'tab_wrapper' => array(
                'label' => esc_html__('Tab Wrapper', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_tab_menu ul, %%order_class%% .RRT__tabs',
            ),
            'tab_item' => array(
                'label' => esc_html__('Tab Item', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_tab_menu ul li a.dnxte_tab_a, %%order_class%% .dnxte-ad-tab',
            ),
            'tab_item_active' => array(
                'label' => esc_html__('Tab Item Active', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_tab_menu ul li a.dnxte_active_a, %%order_class%% .RRT__tab--selected',
            ),
            'tab_title' => array(
                'label' => esc_html__('Tab Title', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_tab_nav_title',
            ),
            'tab_subtitle' => array(
                'label' => esc_html__('Tab Subtitle', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_tab_nav_pra',
            ),
            'tab_icon' => array(
                'label' => esc_html__('Tab Icon', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% span.dnxte_tab_nav_icon',
            ),
            'body_title' => array(
                'label' => esc_html__('Body Title', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_tab_content_slidebar_two .dnxte_tab_content_title',
            ),
            'body_description' => array(
                'label' => esc_html__('Body Description', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_tab_content_slidebar_two .dnxte_tab_content_pra',
            ),
            'body_icon' => array(
                'label' => esc_html__('Body Icon', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_tab_content_slidebar_one .dnxte_tab_content_icon',
            ),
            'body_image' => array(
                'label' => esc_html__('Body Image', 'dnxte-divi-essential'),
                'selector' => '%%order_class%% .dnxte_tab_content_slidebar_one img',
            ),
        );
    }

    public function get_advanced_fields_config()
    {
        return array(
            'fonts' => array(
                'tab_title' => array(
                    'label' => esc_html__('Tab Text', 'dnxte-divi-essential'),
                    'toggle_slug' => 'tab_fonts',
                    'sub_toggle' => 'tab_title',
                    'tab_slug' => 'advanced',
                    'css' => array(
                        'main' => "%%order_class%% .dnxte_tab_menu ul li a span > .dnxte_tab_nav_title, %%order_class%% .dnxte-ad-tab .dnxte_tab_nav_title",
                        'important' => 'plugin-only',
                    ),
                ),
                'tab_active_title' => array(
                    'label' => esc_html__('Tab Text', 'dnxte-divi-essential'),
                    'toggle_slug' => 'tab_active_fonts',
                    'sub_toggle' => 'tab_title',
                    'tab_slug' => 'advanced',
                    'css' => array(
                        'main' => "%%order_class%% .dnxte_tab_menu ul li a.dnxte_active_a span > .dnxte_tab_nav_title, %%order_class%% .RRT__tab--selected span .dnxte_tab_nav_title",
                        'important' => 'plugin-only',
                    ),
                ),
                'tab_subtitle' => array(
                    'label' => esc_html__('Tab Subtitle', 'dnxte-divi-essential'),
                    'toggle_slug' => 'tab_fonts',
                    'sub_toggle' => 'tab_subtitle',
                    'tab_slug' => 'advanced',
                    'css' => array(
                        'main' => "%%order_class%% .dnxte_tab_menu ul li a span > .dnxte_tab_nav_pra, %%order_class%% .dnxte-ad-tab span > .dnxte_tab_nav_pra",
                    ),
                ),
                'tab_active_subtitle' => array(
                    'label' => esc_html__('Tab Subtitle', 'dnxte-divi-essential'),
                    'toggle_slug' => 'tab_active_fonts',
                    'sub_toggle' => 'tab_subtitle',
                    'tab_slug' => 'advanced',
                    'css' => array(
                        'main' => "%%order_class%% .dnxte_tab_menu ul li a.dnxte_active_a span > .dnxte_tab_nav_pra, %%order_class%% .RRT__tab--selected span > .dnxte_tab_nav_pra",
                    ),
                ),
                'body_title' => array(
                    'label' => esc_html__('Body Title', 'dnxte-divi-essential'),
                    'toggle_slug' => 'body_fonts',
                    'sub_toggle' => 'body_title',
                    'tab_slug' => 'advanced',
                    'css' => array(
                        'main' => "%%order_class%% .dnxte_tab_content_slidebar_two .dnxte_tab_content_title",
                    ),
                ),
                'body_description' => array(
                    'label' => esc_html__('Body Description', 'dnxte-divi-essential'),
                    'toggle_slug' => 'body_fonts',
                    'sub_toggle' => 'body_description',
                    'tab_slug' => 'advanced',
                    'css' => array(
                        'main' => "%%order_class%% .dnxte_tab_content_slidebar_two .dnxte_tab_content_pra",
                    ),
                ),
            ),
            'borders' => array(
                'tab' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-ad-tab:not(.RRT__tab--selected),%%order_class%% .dnxte_tab_menu ul li a:not(a.dnxte_active_a)",
                            'border_styles' => "%%order_class%% .dnxte-ad-tab:not(.RRT__tab--selected),%%order_class%% .dnxte_tab_menu ul li a:not(a.dnxte_active_a)",
                        ),
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'tab_body_borders',
                    'sub_toggle' => 'tab',
                    'tab_slug' => 'advanced',
                ),
                'body' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .dnxte-ad-panel, %%order_class%% .dnxte_tab_content",
                            'border_styles' => "%%order_class%% .dnxte-ad-panel, %%order_class%% .dnxte_tab_content",
                        ),
                        'important' => 'all',
                    ),
                    'toggle_slug' => 'tab_body_borders',
                    'sub_toggle' => 'body',
                    'tab_slug' => 'advanced',
                ),
                'tab_active' => array(
                    'css' => array(
                        'main' => array(
                            'border_radii' => "%%order_class%% .RRT__tab--selected,%%order_class%% ul li a.dnxte_active_a",
                            'border_styles' => "%%order_class%% .RRT__tab--selected,%%order_class%% ul li a.dnxte_active_a",
                        ),
                        'important' => 'plugin_only',
                    ),
                    'toggle_slug' => 'tab_active_settings',
                    'tab_slug' => 'advanced',
                ),
            ),
            'box_shadow' => array(
                'tab_active' => array(
                    'css' => array(
                        'main' => "%%order_class%% .RRT__tabs .RRT__tab--selected,%%order_class%% ul li a.dnxte_active_a",
                        // 'custom_style' => true,
                    ),
                    'toggle_slug' => 'tab_active_settings',
                    'tab_slug' => 'advanced',
                ),
            ),
            'text' => false,
            'link_options' => false
        );
    }

    public function get_fields()
    {
        $fields = array(
            'hover_effect' => array(
                'label' => esc_html__('Select Hover Effect', 'dnxte-divi-essential'),
                'type' => 'select',
                'description' => esc_html__('Pick a hover effect from the collection.','dnxte-divi-essential'),
                'option_category' => 'configuration',
                'toggle_slug' => 'body_settings',
                'tab_slug' => 'advanced',
                'default' => '',
                'description' => esc_html__('Here you can adjust the hover effect.', 'dnxte-divi-essential'),
                'options' => array(
                    'none' => esc_html__('Select One', 'dnxte-divi-essential'),
                    'dnxt-hover-fadeIn ' => esc_html__('Fade In', 'dnxte-divi-essential'),
                    'dnxt-hover-pulse' => esc_html__('Pulse', 'dnxte-divi-essential'),
                    'dnxt-hover-pulse-grow' => esc_html__('Pulse Grow', 'dnxte-divi-essential'),
                    'dnxt-hover-pulse-shrink' => esc_html__('Pulse Shrink', 'dnxte-divi-essential'),
                    'dnxt-hover-push' => esc_html__('Push', 'dnxte-divi-essential'),
                    'dnxt-hover-pop' => esc_html__('Pop', 'dnxte-divi-essential'),
                    'dnxt-hover-bob' => esc_html__('Bob', 'dnxte-divi-essential'),
                    'dnxt-hover-bob-float' => esc_html__('Bob Float', 'dnxte-divi-essential'),
                    'dnxt-hover-hang' => esc_html__('Hang', 'dnxte-divi-essential'),
                    'dnxt-hover-hang-sink' => esc_html__('Hang Sink', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-horizontal' => esc_html__('Wobble Horizontal', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-vertical' => esc_html__('Wobble Vertical', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-to-bottom-right' => esc_html__('Wobble to Bottom Right', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-to-top-right' => esc_html__('Wobble to Top Right', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-top' => esc_html__('Wobble to Top', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-bottom' => esc_html__('Wobble Bottom', 'dnxte-divi-essential'),
                    'dnxt-hover-wobble-skew' => esc_html__('Wobble Skew', 'dnxte-divi-essential'),
                    'dnxt-hover-buzz' => esc_html__('Buzz', 'dnxte-divi-essential'),
                    'dnxt-hover-buzz-out' => esc_html__('Buzz Out', 'dnxte-divi-essential'),
                    'dnxt-hover-ripple-out' => esc_html__('Ripple Out', 'dnxte-divi-essential'),
                    'dnxt-hover-ripple-in' => esc_html__('Ripple In', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-down' => esc_html__('Icon Down', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-up' => esc_html__('Icon Up', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-drop' => esc_html__('Icon Drop', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-float-away' => esc_html__('Icon Float Away', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-sink-away' => esc_html__('Icon Sink Away', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-pulse' => esc_html__('Icon Pulse', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-pulse-grow' => esc_html__('Icon Pulse Grow', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-pulse-shrink' => esc_html__('Icon Pulse Shrink', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-push' => esc_html__('Icon Push', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-pop' => esc_html__('Icon Pop', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-bob' => esc_html__('Icon Bob', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-bob-float' => esc_html__('Icon Bob Float', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-hang' => esc_html__('Icon Hang', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-hang-sink' => esc_html__('Icon Hang Sink', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-wobble-horizontal' => esc_html__('Icon Wobble Horizontal', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-wobble-vertical' => esc_html__('Icon Wobble Vertical', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-buzz' => esc_html__('Icon Buzz', 'dnxte-divi-essential'),
                    'dnxt-hover-icon-buzz-out' => esc_html__('Icon Buzz Out', 'dnxte-divi-essential'),
                ),
                'depends_show_if' => 'on',
            ),
            'hover_animation_duration' => array(
                'label' => esc_html__('Animation Duration', 'dnxte-divi-essential'),
                'description' => esc_html__('Here you can adjust the hover animation duration.', 'dnxte-divi-essential'),
                'type' => 'range',
                'option_category' => 'basic_option',
                'range_settings' => array(
                    'step' => 0.1,
                    'min' => 1,
                    'max' => 10,
                ),
                'default' => 1,
                'fixed_unit' => '',
                'validate_unit' => false,
                'unitless' => true,
                'toggle_slug' => 'body_settings',
                'tab_slug' => 'advanced',
            ),
        );

        $tab_settings = array(
            'tab_hover_effect' => array(
                'label' => esc_html__('Select Hover Effect', 'dnxte-divi-essential'),
                'type' => 'select',
                'option_category' => 'configuration',
                'toggle_slug' => 'tabs_settings',
                'tab_slug' => 'advanced',
                'default' => '',
                'description' => esc_html__('Here you can adjust the hover effect.', 'dnxte-divi-essential'),
                'options' => array(
                    'none' => esc_html__('Select One', 'dnxte-divi-essential'),
                    'skew' => esc_html__('Skew', 'dnxte-divi-essential'),
                    'skew-forward' => esc_html__('Skew Forward', 'dnxte-divi-essential'),
                    'skew-backward' => esc_html__('Skew Backward', 'dnxte-divi-essential'),
                    'wobble-horizontal' => esc_html__('Wobble Horizontal', 'dnxte-divi-essential'),
                    'wobble-top' => esc_html__('Wobble Top', 'dnxte-divi-essential'),
                    'wobble-bottom' => esc_html__('Wobble Bottom', 'dnxte-divi-essential'),
                    'sweep-to-right' => esc_html__('Sweep to Right', 'dnxte-divi-essential'),
                    'sweep-to-right' => esc_html__('Sweep to Left', 'dnxte-divi-essential'),
                    'sweep-to-top' => esc_html__('Sweep to Top', 'dnxte-divi-essential'),
                    'sweep-to-bottom' => esc_html__('Sweep to Bottom', 'dnxte-divi-essential'),
                    'forward' => esc_html__('Forward', 'dnxte-divi-essential'),
                    'backward' => esc_html__('Backward', 'dnxte-divi-essential'),
                    // 'bubble-top'       => esc_html__('Bubble Top', 'dnxte-divi-essential'),
                    // 'bubble-bottom'       => esc_html__('Bubble Bottom', 'dnxte-divi-essential'),
                    // 'bubble-right'       => esc_html__('Bubble Right', 'dnxte-divi-essential'),
                    // 'bubble-left'       => esc_html__('Bubble Left', 'dnxte-divi-essential'),
                ),
            ),
            'tab_content_alignment' => array(
                'label' => esc_html__('Tab Content Alignment', 'dnxte-divi-essential'),
                'description' => esc_html__('Align inside content of the single tab to the left, right or center.', 'dnxte-divi-essential'),
                'type' => 'align',
                'option_category' => 'layout',
                'options' => et_builder_get_text_orientation_options(array('justified')),
                'tab_slug' => 'advanced',
                'toggle_slug' => 'tabs_settings',
                'default' => 'left',
                'mobile_options' => true,
                'responsive' => true,
            ),
        );

        $tab_settings['tabs_width'] = array(
            'label' => esc_html__('Tabs Item width', 'dnxte-divi-essential'),
            'type' => 'composite',
            'description' => esc_html__('Check the responsiveness using this feature.','dnxte-divi-essential'),
            'tab_slug' => 'advanced',
            'toggle_slug' => 'tabs_settings',
            'composite_type' => 'default',
            'composite_structure' => array(
                'desktop' => array(
                    'icon' => 'desktop',
                    'controls' => array(
                        'use_tabs_fullwidth' => array(
                            'label' => esc_html__('Use Fullwidth tabs', 'dnxte-divi-essential'),
                            'type' => 'yes_no_button',
                            'descriptions' => esc_html__('Switch to use full width tab.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'default' => 'on',
                            'options' => array(
                                'off' => esc_html__('No', 'dnxte-divi-essential'),
                                'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                            ),
                        ),
                        'use_tabs_wrap' => array(
                            'label' => esc_html__('Use Tab Wrap', 'dnxte-divi-essential'),
                            'type' => 'yes_no_button',
                            'descriptions' => esc_html__('Switch to wrap the tab background around the text.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'default' => 'off',
                            'options' => array(
                                'off' => esc_html__('No', 'dnxte-divi-essential'),
                                'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                            ),
                        ),
                        'tabs_min_width' => array(
                            'label' => esc_html__('Tabs Item Min Width', 'dnxte-divi-essential'),
                            'type' => 'range',
                            // 'option_category'   => 'font_option',
                            'default' => '100px',
                            'default_unit' => 'px',
                            'range_settings' => array(
                                'min' => '1',
                                'max' => '300',
                                'step' => '1',
                            ),
                            'show_if' => array('use_tabs_fullwidth' => 'off'),
                        ),
                        'tabs_max_width' => array(
                            'label' => esc_html__('Tabs Item Max Width', 'dnxte-divi-essential'),
                            'type' => 'range',
                            // 'option_category'   => 'font_option',
                            'default' => '200px',
                            'default_unit' => 'px',
                            'range_settings' => array(
                                'min' => '1',
                                'max' => '500',
                                'step' => '1',
                            ),
                            'show_if' => array('use_tabs_fullwidth' => 'off'),
                        ),
                    ),
                ),
                'tablet' => array(
                    'icon' => 'tablet',
                    'controls' => array(
                        'use_tabs_fullwidth_tablet' => array(
                            'label' => esc_html__('Use Fullwidth tabs', 'dnxte-divi-essential'),
                            'type' => 'yes_no_button',
                            'descriptions' => esc_html__('Switch to use full width tab for tablet devices.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'default' => 'on',
                            'options' => array(
                                'off' => esc_html__('No', 'dnxte-divi-essential'),
                                'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                            ),
                        ),
                        'use_tabs_wrap_tablet' => array(
                            'label' => esc_html__('Use Tab Wrap', 'dnxte-divi-essential'),
                            'type' => 'yes_no_button',
                            'descriptions' => esc_html__('Switch to wrap the tab background around the text.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'default' => 'off',
                            'options' => array(
                                'off' => esc_html__('No', 'dnxte-divi-essential'),
                                'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                            ),
                        ),
                        'tabs_min_width_tablet' => array(
                            'label' => esc_html__('Tabs Item Min Width', 'dnxte-divi-essential'),
                            'type' => 'range',
                            'option_category' => 'font_option',
                            'default' => '100px',
                            'default_unit' => 'px',
                            'range_settings' => array(
                                'min' => '1',
                                'max' => '300',
                                'step' => '1',
                            ),
                            'show_if' => array('use_tabs_fullwidth_tablet' => 'off'),
                        ),
                        'tabs_max_width_tablet' => array(
                            'label' => esc_html__('Tabs Item Max Width', 'dnxte-divi-essential'),
                            'type' => 'range',
                            'option_category' => 'font_option',
                            'default' => '200px',
                            'default_unit' => 'px',
                            'range_settings' => array(
                                'min' => '1',
                                'max' => '500',
                                'step' => '1',
                            ),
                            'show_if' => array('use_tabs_fullwidth_tablet' => 'off'),
                        ),
                    ),
                ),
                'phone' => array(
                    'icon' => 'phone',
                    'controls' => array(
                        'use_tabs_fullwidth_phone' => array(
                            'label' => esc_html__('Use Fullwidth tabs', 'dnxte-divi-essential'),
                            'type' => 'yes_no_button',
                            'descriptions' => esc_html__('Switch to use full width tab for small devices.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'default' => 'on',
                            'options' => array(
                                'off' => esc_html__('No', 'dnxte-divi-essential'),
                                'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                            ),
                        ),
                        'use_tabs_wrap_phone' => array(
                            'label' => esc_html__('Use Tab Wrap', 'dnxte-divi-essential'),
                            'type' => 'yes_no_button',
                            'descriptions' => esc_html__('Switch to wrap the tab background around the text.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'default' => 'off',
                            'options' => array(
                                'off' => esc_html__('No', 'dnxte-divi-essential'),
                                'on' => esc_html__('Yes', 'dnxte-divi-essential'),
                            ),
                        ),
                        'tabs_min_width_phone' => array(
                            'label' => esc_html__('Tabs Item Min Width', 'dnxte-divi-essential'),
                            'type' => 'range',
                            'option_category' => 'font_option',
                            'default' => '100px',
                            'default_unit' => 'px',
                            'range_settings' => array(
                                'min' => '1',
                                'max' => '300',
                                'step' => '1',
                            ),
                            'show_if' => array('use_tabs_fullwidth_phone' => 'off'),
                        ),
                        'tabs_max_width_phone' => array(
                            'label' => esc_html__('Tabs Item Max Width', 'dnxte-divi-essential'),
                            'type' => 'range',
                            'option_category' => 'font_option',
                            'default' => '200px',
                            'default_unit' => 'px',
                            'range_settings' => array(
                                'min' => '1',
                                'max' => '500',
                                'step' => '1',
                            ),
                            'show_if' => array('use_tabs_fullwidth_phone' => 'off'),
                        ),
                    ),
                ),
            ),
        );
        $tab_settings['tabs_placement'] = array(
            'label' => esc_html__('Tabs Placement', 'dnxte-divi-essential'),
            'type' => 'composite',
            'tab_slug' => 'advanced',
            'toggle_slug' => 'tabs_settings',
            'composite_type' => 'default',
            'composite_structure' => array(
                'desktop' => array(
                    'icon' => 'desktop',
                    'controls' => array(
                        'tab_item_placement' => array(
                            'label' => esc_html__('Tab Placement', 'dnxte-divi-essential'),
                            'type' => 'select',
                            'description' => esc_html__('Select a placement for the tab from the following.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'options' => array(
                                'center' => esc_html__('Top', 'dnxte-divi-essential'),
                                'bottom' => esc_html__('Bottom', 'dnxte-divi-essential'),
                                'left' => esc_html__('Left', 'dnxte-divi-essential'),
                                'right' => esc_html__('Right', 'dnxte-divi-essential'),
                            ),
                            'default' => 'center',
                        ),
                        'tabs_item_alignment' => array(
                            'label' => esc_html__('Tab Alignment', 'dnxte-divi-essential'),
                            'type' => 'select',
                            'description' => esc_html__('Select a alignment for the tab from the following.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'options' => array(
                                'flex-start' => esc_html__('Start', 'dnxte-divi-essential'),
                                'center' => esc_html__('Center', 'dnxte-divi-essential'),
                                'flex-end' => esc_html__('End', 'dnxte-divi-essential'),
                            ),
                            'default' => 'flex-start',
                        ),
                    ),
                ),
                'tablet' => array(
                    'icon' => 'tablet',
                    'controls' => array(
                        'tab_item_placement_tablet' => array(
                            'label' => esc_html__('Tab Placement', 'dnxte-divi-essential'),
                            'type' => 'select',
                            'description' => esc_html__('Select a placement for the tab from the following.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'options' => array(
                                'center' => esc_html__('Top', 'dnxte-divi-essential'),
                                'bottom' => esc_html__('Bottom', 'dnxte-divi-essential'),
                                'left' => esc_html__('Left', 'dnxte-divi-essential'),
                                'right' => esc_html__('Right', 'dnxte-divi-essential'),
                            ),
                            'default' => 'center',
                        ),
                        'tabs_item_alignment_tablet' => array(
                            'label' => esc_html__('Tab Alignment', 'dnxte-divi-essential'),
                            'type' => 'select',
                            'description' => esc_html__('Select a alignment for the tab from the following.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'options' => array(
                                'flex-start' => esc_html__('Start', 'dnxte-divi-essential'),
                                'center' => esc_html__('Center', 'dnxte-divi-essential'),
                                'flex-end' => esc_html__('End', 'dnxte-divi-essential'),
                            ),
                            'default' => 'flex-start',
                        ),
                    ),
                ),
                'phone' => array(
                    'icon' => 'phone',
                    'controls' => array(
                        'tab_item_placement_phone' => array(
                            'label' => esc_html__('Tab Placement', 'dnxte-divi-essential'),
                            'type' => 'select',
                            'description' => esc_html__('Select a placement for the tab from the following.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'options' => array(
                                'center' => esc_html__('Top', 'dnxte-divi-essential'),
                                'bottom' => esc_html__('Bottom', 'dnxte-divi-essential'),
                                'left' => esc_html__('Left', 'dnxte-divi-essential'),
                                'right' => esc_html__('Right', 'dnxte-divi-essential'),
                            ),
                            'default' => 'center',
                        ),
                        'tabs_item_alignment_phone' => array(
                            'label' => esc_html__('Tab Alignment', 'dnxte-divi-essential'),
                            'type' => 'select',
                            'description' => esc_html__('Select a alignment for the tab from the following.', 'dnxte-divi-essential'),
                            'option_category' => 'basic_option',
                            'options' => array(
                                'flex-start' => esc_html__('Start', 'dnxte-divi-essential'),
                                'center' => esc_html__('Center', 'dnxte-divi-essential'),
                                'flex-end' => esc_html__('End', 'dnxte-divi-essential'),
                            ),
                            'default' => 'flex-start',
                        ),
                    ),
                ),
            ),
        );

        $tab_icon_settings = array(
            'tab_icon_size' => array(
                'label' => esc_html__('Tabs Icon Size', 'dnxte-divi-essential'),
                'type' => 'range',
                'description' => esc_html__('Adjust the size of the icon using the slider.', 'dnxte-divi-essential'),
                'default' => '20px',
                'default_unit' => 'px',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'icon_settings',
                'sub_toggle' => 'tab',
                'mobile_options' => true,
                'responsive' => true,
                'range_settings' => array(
                    'min' => '1',
                    'max' => '300',
                    'step' => '1',
                ),
            ),
            'tab_icon_color' => array(
                'label' => esc_html__('Icon Color', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'description' => esc_html__('Select a color for the icon.', 'dnxte-divi-essential'),
                'toggle_slug' => 'icon_settings',
                'sub_toggle' => 'tab',
                'tab_slug' => 'advanced',
                'mobile_options' => true,
                'responsive' => true,
            ),
            'tab_icon_active_color' => array(
                'label' => esc_html__('Active Icon Color', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'description' => esc_html__('Select a a color for the active tab icon.', 'dnxte-divi-essential'),
                'toggle_slug' => 'icon_settings',
                'sub_toggle' => 'tab',
                'tab_slug' => 'advanced',
                'mobile_options' => true,
                'responsive' => true,
            ),
        );
        $body_icon_settings = array(
            'body_icon_size' => array(
                'label' => esc_html__('Body Icon Size', 'dnxte-divi-essential'),
                'type' => 'range',
                'description' => esc_html__('Adjust the size of the icon using the slider.', 'dnxte-divi-essential'),
                'default' => '20px',
                'default_unit' => 'px',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'icon_settings',
                'sub_toggle' => 'body',
                'mobile_options' => true,
                'responsive' => true,
                'range_settings' => array(
                    'min' => '1',
                    'max' => '300',
                    'step' => '1',
                ),
            ),
            'body_icon_color' => array(
                'label' => esc_html__('Icon Color', 'dnxte-divi-essential'),
                'type' => 'color-alpha',
                'description' => esc_html__('Select a color for the icon.', 'dnxte-divi-essential'),
                'toggle_slug' => 'icon_settings',
                'sub_toggle' => 'body',
                'tab_slug' => 'advanced',
                'mobile_options' => true,
                'responsive' => true,
            ),
        );

        $margin_padding = array(
            'tab_wrapper_margin' => array(
                'label' => esc_html__('Tab Wrapper Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'body_wrapper_margin' => array(
                'label' => esc_html__('Body Wrapper Margin', 'dnxte-divi-essential'),
                'type' => 'custom_margin',
                'mobile_options' => true,
                'hover' => 'tabs',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'layout',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
            'body_wrapper_padding' => array(
                'label' => esc_html__('Body Wrapper Padding', 'dnxte-divi-essential'),
                'type' => 'custom_padding',
                'mobile_options' => true,
                'hover' => 'tabs',
                'default' => '20px|20px|20px|20px',
                'allowed_units' => array('%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw'),
                'option_category' => 'basic',
                'tab_slug' => 'advanced',
                'toggle_slug' => 'margin_padding',
            ),
        );

        $background_opt = array(
            'hover' => 'tabs',
            'description' => esc_html__('Add a background fill color or gradient for the Content area.', 'dnxte-divi-essential'),
        );

        $tab_container_bg = Common::background_fields($this, "tab_container_", "Background Color", "tab_container_bg", "general", $background_opt);
        $tab_single_bg = Common::background_fields($this, "tab_single_", "Single tab Background Color", "tab_container_bg", "general", $background_opt);
        $tab_active_bg = Common::background_fields($this, "tab_active_", "Active tab Background Color", "tab_container_bg", "general", $background_opt);
        $content_container_bg = Common::background_fields($this, "content_container_", "Background Color", "content_container_bg", "general", $background_opt);

        return array_merge($fields, $tab_settings, $tab_icon_settings, $body_icon_settings, $margin_padding, $tab_container_bg, $tab_single_bg, $tab_active_bg, $content_container_bg);
    }

    public function before_render()
    {
        global $dnxte_ad_tabs;
        $dnxte_ad_tabs = [];
    }

    private function render_tab_html()
    {
        global $dnxte_ad_tabs;
        $tab_hover_effect = isset($this->props['tab_hover_effect']) ? $this->props['tab_hover_effect'] : '';
        // $arrow_svg = str_starts_with($tab_hover_effect, 'bubble') ? '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 255 127.5" width="30px"><g><polygon points="0 0 127.5 127.5 255 0 0 0"></polygon></g></svg>' : '';

        $ad_tab_html = '<ul>';
        foreach ($dnxte_ad_tabs as $key => $value) {

            $ad_tab_html .= sprintf('<li class="%1$s">
            <a href="#" class="dnxte_tab_a dnxt-hover-ad-%6$s"
                            data-id="%1$s" data-activeOnLoad="%5$s">
                            %4$s
                            %7$s
                            <span class="dnxte_tab_nav_content">
                                <div class="dnxte_tab_nav_title">%2$s</div>
                                <p class="dnxte_tab_nav_pra">%3$s</p>
                            </span>
                            </a>
                        </li>',
                $key,
                $value['title'],
                $value['subtitle'],
                $value['icon_html'],
                $value['active_on_load'],
                $tab_hover_effect,
                $value['active_icon_html']
                // $arrow_svg
            );
        }

        $ad_tab_html .= '</ul>';
        return $ad_tab_html;
    }

    public function render($attrs, $content, $render_slug)
    {
        // global $use_divi_libray;
        wp_enqueue_style( 'dnext_advanced_tab' );
        wp_enqueue_style( 'dnext_advanced_tab_item' );
        wp_enqueue_style('dnext_hvr_common_css');
        wp_enqueue_style('dnext_ad_tab_effects');
        wp_enqueue_script('dnext_scripts-public');

        $ad_tab_html = $this->render_tab_html();
        $tab_effect = isset($this->props['tab_hover_effect']) ? $this->props['tab_hover_effect'] : '';
        $content = $this->content;

        // $is_using_library_class = 'off' == $use_divi_libray ? 'dnxte_body_content_wrapper' : '';
        $tab_content_selector = '%%order_class%% ul li a.dnxte_tab_a span';
        $this->apply_alignment_css('tab_content_alignment', $tab_content_selector, 'text-align: %1$s', $render_slug);

        $this->apply_css($render_slug);
        $this->apply_spacing_css($render_slug);
        $this->apply_bg_css($render_slug);
        

        return sprintf('<div class="tab-container dnxte_tab_wrapper">
            <div class="dnxte_tab_menu" data-tab-effect="%3$s">
               %2$s
            </div>
            <div class="dnxte_body_content_wrapper">
                %1$s
            </div>
            </div>',
            $content,
            $ad_tab_html,
            $tab_effect
        );
    }

    protected function apply_spacing_css($render_slug)
    {
        $customMarginPadding = array(
            // No need to add "_margin" or "_padding" in the key
            'tab_wrapper' => array(
                'selector' => '%%order_class%% .dnxte_tab_menu ul',
                'type' => 'margin', //
            ),
            'body_wrapper' => array(
                'selector' => '%%order_class%% .dnxte_tab_content_active:not(.dnxte_tab_content_layout)',
                'type' => array('margin', 'padding'),
                'important' => false //
            ),
        );
        Common::apply_spacing($customMarginPadding, $render_slug, $this->props);
    }

    protected function apply_tab_placement_css($slug, $render_slug)
    {
        $selector_wrapper = "%%order_class%% .tab-container.dnxte_tab_wrapper";
        $selector_ul = "%%order_class%% .dnxte_tab_menu ul";

        $value = '' !== $this->props[$slug] ? $this->props[$slug] : 'center';
        $value_tablet = '' !== $this->props[$slug . '_tablet'] ? $this->props[$slug . '_tablet'] : 'center';
        $value_phone = '' !== $this->props[$slug . '_phone'] ? $this->props[$slug . '_phone'] : 'center';

        $flex_direction_arr_wrapper = array(
            'center' => 'column',
            'bottom' => 'column-reverse',
            'left' => 'row',
            'right' => 'row-reverse',
        );
        $flex_direction_arr_ul = array(
            'center' => 'row',
            'bottom' => 'row',
            'left' => 'column',
            'right' => 'column',
        );

        if ($value === 'right') {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $selector_wrapper,
                'declaration' => 'justify-content: space-between;',
            ));
        } else if ($value_tablet === 'right') {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $selector_wrapper,
                'declaration' => 'justify-content: space-between;',
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));
        } else if ($value_phone == 'right') {
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => $selector_wrapper,
                'declaration' => 'justify-content: space-between;',
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));
        }

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector_wrapper,
            'declaration' => sprintf('flex-direction: %1$s;', esc_attr($flex_direction_arr_wrapper[$value])),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector_ul,
            'declaration' => sprintf('flex-direction: %1$s;', esc_attr($flex_direction_arr_ul[$value])),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector_wrapper,
            'declaration' => sprintf('flex-direction: %1$s;', esc_attr($flex_direction_arr_wrapper[$value_tablet])),
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector_ul,
            'declaration' => sprintf('flex-direction: %1$s;', esc_attr($flex_direction_arr_ul[$value_tablet])),
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector_wrapper,
            'declaration' => sprintf('flex-direction: %1$s;', esc_attr($flex_direction_arr_wrapper[$value_phone])),
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector_ul,
            'declaration' => sprintf('flex-direction: %1$s;', esc_attr($flex_direction_arr_ul[$value_phone])),
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ));
    }

    protected function apply_composit_tabs_wrap($slug, $render_slug)
    {
        $tabs_wrap_css_ul = 'on' == $this->props[$slug] ? 'flex-wrap: wrap;' : 'flex-wrap: initial;';
        $tabs_wrap_css_li = 'on' == $this->props[$slug] ? 'width:auto;' : 'width: 100%;';

        $tabs_wrap_css_ul_tablet = 'on' == $this->props[$slug . '_tablet'] ? 'flex-wrap: wrap;' : 'flex-wrap: initial;';
        $tabs_wrap_css_li_tablet = 'on' == $this->props[$slug . '_tablet'] ? 'width:auto;' : 'width: 100%;';

        $tabs_wrap_css_ul_phone = 'on' == $this->props[$slug . '_phone'] ? 'flex-wrap: wrap;' : 'flex-wrap: initial;';
        $tabs_wrap_css_li_phone = 'on' == $this->props[$slug . '_phone'] ? 'width:auto;' : 'width: 100%;';

        // for desktop devices
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dnxte_tab_menu ul',
            'declaration' => $tabs_wrap_css_ul,
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dnxte_tab_menu ul li',
            'declaration' => $tabs_wrap_css_li,
        ));

        // for tablet devices
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dnxte_tab_menu ul',
            'declaration' => $tabs_wrap_css_ul_tablet,
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dnxte_tab_menu ul li',
            'declaration' => $tabs_wrap_css_li_tablet,
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ));

        // for small devices
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dnxte_tab_menu ul',
            'declaration' => $tabs_wrap_css_ul_phone,
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => '%%order_class%% .dnxte_tab_menu ul li',
            'declaration' => $tabs_wrap_css_li_phone,
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ));
    }

    protected function apply_composit_width_css($min_slug, $max_slug, $use_tab_slug, $render_slug)
    {
        // Destop size code starts
        $tabs_min_width = $this->props[$min_slug];
        $tabs_min_width = (isset($tabs_min_width) && '' != $tabs_min_width) ? $tabs_min_width : '100px';
        $tabs_max_width = $this->props[$max_slug];
        $tabs_max_width = (isset($tabs_max_width) && '' != $tabs_max_width) ? $tabs_max_width : '200px';
        $use_tabs_fullwidth = 'on' == $this->props[$use_tab_slug] ? '100%' : $tabs_min_width;

        if ('off' == $this->props[$use_tab_slug]):
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .dnxte_tab_menu ul li',
                'declaration' => sprintf('max-width: %1$s; width: %2$s;', esc_attr($tabs_max_width), esc_attr($use_tabs_fullwidth)),
            ));
        endif;
        // Destop size code ends

        // Tablet size code starts
        $tabs_min_width_tablet = $this->props[$min_slug . "_tablet"];
        $tabs_min_width_tablet = ('' !== $tabs_min_width_tablet) ? $tabs_min_width_tablet : '100px';
        $tabs_max_width_tablet = $this->props[$max_slug . "_tablet"];
        $tabs_max_width_tablet = ('' != $tabs_max_width_tablet) ? $tabs_max_width_tablet : '200px';
        $use_tabs_fullwidth_tablet = 'on' == $this->props[$use_tab_slug . "_tablet"] ? '100%' : $tabs_min_width_tablet;
        
        if ('off' == $this->props[$use_tab_slug . "_tablet"]):
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .dnxte_tab_menu ul li',
                'declaration' => sprintf('max-width: %1$s; width: %2$s;', esc_attr($tabs_max_width_tablet), esc_attr($use_tabs_fullwidth_tablet)),
                'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
            ));
        endif;
        // Tablet size code ends

        // Phone size code starts
        $tabs_min_width_phone = $this->props[$min_slug . "_phone"];
        $tabs_min_width_phone = '' !== $tabs_min_width_phone ? $tabs_min_width_phone : '100px';
        $tabs_max_width_phone = $this->props[$max_slug . "_phone"];
        $tabs_max_width_phone = ('' != $tabs_max_width_phone) ? $tabs_max_width_phone : '200px';
        $use_tabs_fullwidth_phone = 'on' == $this->props[$use_tab_slug . "_phone"] ? '100%' : $tabs_min_width_phone;

        if ('off' == $this->props[$use_tab_slug . "_phone"]):
            ET_Builder_Element::set_style($render_slug, array(
                'selector' => '%%order_class%% .dnxte_tab_menu ul li',
                'declaration' => sprintf('max-width: %1$s; width: %2$s;', esc_attr($tabs_max_width_phone), esc_attr($use_tabs_fullwidth_phone)),
                'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
            ));
        endif;
        // Phone size code ends
    }

    protected function apply_composit_placement_css($slug, $render_slug)
    {
        $selector = '%%order_class%% .dnxte_tab_menu ul';
        $value = '' !== $this->props[$slug] ? $this->props[$slug] : 'flex-start';
        $value_tablet = '' !== $this->props[$slug . '_tablet'] ? $this->props[$slug . '_tablet'] : 'flex-start';
        $value_phone = '' !== $this->props[$slug . '_phone'] ? $this->props[$slug . '_phone'] : 'flex-start';

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector,
            'declaration' => sprintf('justify-content: %1$s;', esc_attr($value)),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector,
            'declaration' => sprintf('justify-content: %1$s;', esc_attr($value_tablet)),
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector,
            'declaration' => sprintf('justify-content: %1$s;', esc_attr($value_phone)),
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ));
    }

    public function apply_css($render_slug)
    {
        $this->apply_composit_tabs_wrap('use_tabs_wrap', $render_slug);
        $this->apply_composit_width_css('tabs_min_width', 'tabs_max_width', 'use_tabs_fullwidth', $render_slug);
        $this->apply_composit_placement_css('tabs_item_alignment', $render_slug);
        $this->apply_tab_placement_css('tab_item_placement', $render_slug);
        $css_settings = array(
            'hover_effect' => array(
                'css' => 'animation-name: %1$s !important;-webkit-animation-name:%1$s !important;',
                'selector' => array(
                    'desktop' => '%%order_class%% .dnxte_tab_content_active',
                ),
            ),
            'hover_animation_duration' => array(
                'css' => 'animation-duration: %1$ss !important;-webkit-animation-duration:%1$ss !important;',
                'selector' => array(
                    'desktop' => '%%order_class%% .dnxte_tab_content_active',
                ),
            ),
            'tab_icon_size' => array(
                'css' => 'font-size: %1$s;',
                'selector' => array(
                    'desktop' => '%%order_class%% span.dnxte_tab_nav_icon',
                ),
            ),
            'tab_icon_color' => array(
                'css' => 'color: %1$s;',
                'selector' => array(
                    'desktop' => '%%order_class%% span.dnxte_tab_nav_icon',
                ),
            ),
            'tab_icon_active_color' => array(
                'css' => 'color: %1$s !important;',
                'selector' => array(
                    'desktop' => '%%order_class%% .dnxte_active_a span.dnxte_tab_nav_icon_active',
                ),
            ),
            'body_icon_size' => array(
                'css' => 'font-size: %1$s;',
                'selector' => array(
                    'desktop' => '%%order_class%% .dnxte_tab_content_slidebar_one .dnxte_tab_content_icon',
                ),
            ),
            'body_icon_color' => array(
                'css' => 'color: %1$s;',
                'selector' => array(
                    'desktop' => '%%order_class%% .dnxte_tab_content_slidebar_one .dnxte_tab_content_icon',
                ),
            ),
        );

        foreach ($css_settings as $key => $value) {
            Common::set_css($key, $value['css'], $value['selector'], $render_slug, $this);
        }
    }

    public function apply_bg_css($render_slug)
    {

        $before_added_effects = array(
            'sweep-to-right',
            'sweep-to-left',
            'sweep-to-top',
            'sweep-to-bottom',
            'bounce-to-right',
            'bounce-to-left',
            'bounce-to-top',
            'bounce-to-bottom',
            // 'bubble-bottom',
            // 'bubble-top',
            // 'bubble-right',
            // 'bubble-left',
        );
        $effect = isset($this->props['tab_hover_effect']) ? esc_attr($this->props['tab_hover_effect']) : '';
        // $effect = 'dnxt-hover-ad-bounce-to-bottom';
        $sweep_effect_selector = (isset($effect) && in_array($effect, $before_added_effects)) ? "%%order_class%% .et_pb_module_inner .dnxte_tab_wrapper .dnxte_tab_menu li a.dnxt-hover-ad-{$effect}:before" : '%%order_class%% .et_pb_module_inner .dnxte_tab_wrapper .dnxte_tab_menu li a.dnxte_active_a';

        $gradient_opt = array(
            'tab_container_' => array(
                "desktop" => "%%order_class%% .et_pb_module_inner .dnxte_tab_wrapper .dnxte_tab_menu",
                "hover" => "%%order_class%% .et_pb_module_inner .dnxte_tab_wrapper .dnxte_tab_menu:hover",
            ),
            'tab_single_' => array(
                "desktop" => "%%order_class%% .et_pb_module_inner .dnxte_tab_wrapper .dnxte_tab_menu li a",
                "hover" => "%%order_class%% .et_pb_module_inner .dnxte_tab_wrapper .dnxte_tab_menu li a:hover",
            ),
            'tab_active_' => array(
                "desktop" => $sweep_effect_selector,
                "hover" => "%%order_class%% .et_pb_module_inner .dnxte_tab_wrapper .dnxte_tab_menu li a.dnxte_active_a:hover",
            ),
            'content_container_' => array(
                "desktop" => "%%order_class%% .et_pb_module_inner .dnxte_tab_content",
                "hover" => "%%order_class%% .et_pb_module_inner .dnxte_tab_content:hover",
            ),
        );

        Common::apply_all_bg_css($gradient_opt, $render_slug, $this);
    }
    protected function apply_alignment_css($slug, $selector,$css, $render_slug)
    {
        $value = '' !== $this->props[$slug] ? $this->props[$slug] : 'center';
        $responsive_values = et_pb_responsive_options()->get_property_values($this->props, $slug);

        $value_tablet = (isset($responsive_values['tablet']) && '' !== $this->props[$slug . '_tablet']) ? $this->props[$slug . '_tablet'] : 'center';
        $value_phone = (isset($responsive_values['phone']) && '' !== $this->props[$slug . '_phone']) ? $this->props[$slug . '_phone'] : 'center';

        // $icon_alignment = array(
        //     'left' => 'flex-start',
        //     'center' => 'center',
        //     'right' => 'flex-end',
        // );

        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector,
            'declaration' => sprintf($css, esc_attr($value)),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector,
            'declaration' => sprintf($css, esc_attr($value_tablet)),
            'media_query' => ET_Builder_Element::get_media_query('max_width_980'),
        ));
        ET_Builder_Element::set_style($render_slug, array(
            'selector' => $selector,
            'declaration' => sprintf($css, esc_attr($value_phone)),
            'media_query' => ET_Builder_Element::get_media_query('max_width_767'),
        ));
    }
}

new NextAdvancedTab;