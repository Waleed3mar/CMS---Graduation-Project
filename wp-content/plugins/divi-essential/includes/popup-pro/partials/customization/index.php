<?php

$dnxteppro_post_id = get_the_ID();

$dnxte_popup_pro_overlay_bg_color = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_overlay_bg_color', true
);
$dnxte_popup_pro_overlay_zindex   = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_overlay_zindex', true
);

$dnxte_pp_enable_overlay_blur = get_post_meta(
	$dnxteppro_post_id, 'dnxte_pp_enable_overlay_blur', true
);

if ( empty( $dnxte_pp_enable_overlay_blur ) ) {
	$dnxte_pp_enable_overlay_blur = 'true';
}

$dnxte_custom_hide_close_btn = get_post_meta(
	$dnxteppro_post_id, 'dnxte_custom_hide_close_btn', true
);

if ( empty( $dnxte_custom_hide_close_btn ) ) {
	$dnxte_custom_hide_close_btn = 'false';
}

$dnxte_custom_close_btn_outside = get_post_meta(
	$dnxteppro_post_id, 'dnxte_custom_close_btn_outside', true
);

if ( empty( $dnxte_custom_close_btn_outside ) ) {
	$dnxte_custom_close_btn_outside = 'false';
}

$open_animation_effect_name          = "open_animation_name";
$open_animation_effect_name_selected = get_post_meta(
	$dnxteppro_post_id, $open_animation_effect_name, true
);

$dnxte_pop_up_pro_open_animation_options = array(
	''                => esc_html__( 'Select', 'dnxte-divi-essential' ),
	'popup_load'      => esc_html__( 'Popup Load', 'dnxte-divi-essential' ),
	'zoom_center'     => esc_html__( 'Zoom Center', 'dnxte-divi-essential' ),
	'zoom_center_rev' => esc_html__( 'Zoom Center Rev', 'dnxte-divi-essential' ),
	'slide_left'      => esc_html__( 'Slide Left', 'dnxte-divi-essential' ),
	'slide_left_rev'  => esc_html__( 'Slide Right Rev', 'dnxte-divi-essential' ),
	'slide_up'        => esc_html__( 'Slide Up', 'dnxte-divi-essential' ),
	'slide_up_rev'    => esc_html__( 'Slide Up Rev', 'dnxte-divi-essential' ),
	'slide_down'      => esc_html__( 'Slide Down', 'dnxte-divi-essential' ),
	'slide_down_rev'  => esc_html__( 'Slide Down Rev', 'dnxte-divi-essential' ),
	'fade_in_rev'     => esc_html__( 'Fade In Rev', 'dnxte-divi-essential' ),
);

$closing_animation_effect_name            = "closing_animation_name";
$closing_animation_effect_name_selected   = get_post_meta(
	$dnxteppro_post_id, $closing_animation_effect_name, true
);
$dnxte_pop_up_pro_close_animation_options = array(
	''                => esc_html__( 'Select', 'dnxte-divi-essential' ),
	'popup_load'      => esc_html__( 'Popup Load', 'dnxte-divi-essential' ),
	'zoom_center'     => esc_html__( 'Zoom Center', 'dnxte-divi-essential' ),
	'zoom_center_rev' => esc_html__( 'Zoom Center Rev', 'dnxte-divi-essential' ),
	'slide_left'      => esc_html__( 'Slide Left', 'dnxte-divi-essential' ),
	'slide_left_rev'  => esc_html__( 'Slide Right Rev', 'dnxte-divi-essential' ),
	'slide_up'        => esc_html__( 'Slide Up', 'dnxte-divi-essential' ),
	'slide_up_rev'    => esc_html__( 'Slide Up Rev', 'dnxte-divi-essential' ),
	'slide_down'      => esc_html__( 'Slide Down', 'dnxte-divi-essential' ),
	'slide_down_rev'  => esc_html__( 'Slide Down Rev', 'dnxte-divi-essential' ),
	'fade_in_rev'     => esc_html__( 'Fade In Rev', 'dnxte-divi-essential' ),
);

$dnxte_pop_up_pro_place_name          = "dnxte_popup_pro_place_name";
$dnxte_pop_up_pro_place_name_selected = get_post_meta(
	$dnxteppro_post_id, $dnxte_pop_up_pro_place_name, true
);

$dnxte_pop_up_pro_pos_place_options = array(
	'top_left'      => esc_html__( 'Top Left', 'dnxte-divi-essential' ),
	'top_center'    => esc_html__( 'Top Center', 'dnxte-divi-essential' ),
	'top_right'     => esc_html__( 'Top Right', 'dnxte-divi-essential' ),
	'center_left'   => esc_html__( 'Center Left', 'dnxte-divi-essential' ),
	'center_center' => esc_html__( 'Center', 'dnxte-divi-essential' ),
	'center_right'  => esc_html__( 'Center Right', 'dnxte-divi-essential' ),
	'bottom_left'   => esc_html__( 'Bottom Left', 'dnxte-divi-essential' ),
	'bottom_center' => esc_html__( 'Bottom Center', 'dnxte-divi-essential' ),
	'bottom_right'  => esc_html__( 'Bottom Right', 'dnxte-divi-essential' ),
);

$dnxte_popup_pro_close_btn_color                      = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_color', true
);
$dnxte_popup_pro_close_btn_bg_color                   = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_bg_color', true
);
$dnxte_popup_pro_close_btn_icon_size                  = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_icon_size', true
);
$dnxte_popup_pro_close_btn_top_padding                = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_top_padding', true
);
$dnxte_popup_pro_close_btn_bottom_padding             = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_bottom_padding', true
);
$dnxte_popup_pro_close_btn_left_padding               = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_left_padding', true
);
$dnxte_popup_pro_close_btn_right_padding              = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_right_padding', true
);
$dnxte_popup_pro_close_btn_top_margin                 = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_top_margin', true
);
$dnxte_popup_pro_close_btn_bottom_margin              = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_bottom_margin', true
);
$dnxte_popup_pro_close_btn_left_margin                = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_left_margin', true
);
$dnxte_popup_pro_close_btn_right_margin               = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_right_margin', true
);
$dnxte_popup_pro_close_btn_border_radius              = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_border_radius', true
);
$dnxte_popup_pro_close_btn_border_radius              = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_border_radius', true
);
$dnxte_popup_pro_close_btn_border_radius              = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_border_radius', true
);
$dnxte_popup_pro_close_btn_top_left_border_radius     = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_top_left_border_radius', true
);
$dnxte_popup_pro_close_btn_top_right_border_radius    = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_top_right_border_radius', true
);
$dnxte_popup_pro_close_btn_bottom_right_border_radius = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_bottom_right_border_radius', true
);
$dnxte_popup_pro_close_btn_bottom_left_border_radius  = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_pro_close_btn_bottom_left_border_radius', true
);

$dnxte_pop_up_pro_close_btn_position        = "dnxte_pop_up_pro_close_btn_position";
$dnxte_pop_up_pro_close_button_selected     = get_post_meta(
	$dnxteppro_post_id, $dnxte_pop_up_pro_close_btn_position, true
);
$dnxte_pop_up_pro_close_btn_position_option = array(
	'top_right'     => esc_html__( 'Top Right', 'dnxte-divi-essential' ),
	'top_center'    => esc_html__( 'Top Center', 'dnxte-divi-essential' ),
	'top_left'      => esc_html__( 'Top Left', 'dnxte-divi-essential' ),
	'bottom_right'  => esc_html__( 'Bottom Right', 'dnxte-divi-essential' ),
	'bottom_center' => esc_html__( 'Bottom Center', 'dnxte-divi-essential' ),
	'bottom_left'   => esc_html__( 'Bottom Left', 'dnxte-divi-essential' ),
);

$dnxte_layout_values = array(
	'box'        => esc_html__( 'Box Width', 'dnxte-divi-essential' ),
	'full_width' => esc_html__( 'Full Width', 'dnxte-divi-essential' ),
);

$dnxte_popup_layout = get_post_meta(
	$dnxteppro_post_id, 'dnxte_popup_layout', true
);
?>


<div id="dnxte-ppro-tab-design" class="meta-options">
    <div class="dnxte_pp-sub">
        <label for="dnxte_popup_pro_overlay_bg_color" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Overlay Background Color', 'dnxte-divi-essential' ) ?>
        </label>
        <input
                class="cs-wp-color-picker"
                type="text"
                name="dnxte_popup_pro_overlay_bg_color"
                value="<?php echo esc_attr( $dnxte_popup_pro_overlay_bg_color ); ?>"

        />
    </div>
    <div class="dnxte_pp-sub">
        <label
                for=<?php esc_attr_e( $dnxte_pop_up_pro_close_btn_position ) ?>
                class="dnxte_pp-sub-lbl"
        >
			<?php esc_html_e( 'Layout', 'dnxte-divi-essential' ); ?>
        </label>
        <select
                id="dnxte-layout-dropdown"
                name='dnxte_popup_layout'
                class="popup-sub-sel dnxte_pp-sub-val">
			<?php
			foreach ( $dnxte_layout_values as $layout_key => $layout_value ) {
				printf( '<option value="%2$s"%3$s>%1$s</option>',
					esc_html( $layout_value ),
					esc_attr( $layout_key ),
					selected(
						$layout_key,
						$dnxte_popup_layout,
						false
					)
				);
			} ?>
        </select>
    </div>
    <div class="dnxte_pp-sub dnxte-popup-position <?php if ( $dnxte_popup_layout == 'full_width' ) {
		echo 'dnxte-hide';
	} ?>">
        <label
                for=<?php esc_attr_e( $dnxte_pop_up_pro_place_name ) ?>
                class="dnxte_pp-sub-lbl"
        >
			<?php esc_html_e( 'Popup Position', 'dnxte-divi-essential' ); ?>
        </label>

        <div class="dnxte-pp-control">
			<?php
			if ( '' == $dnxte_pop_up_pro_place_name_selected ) {
				$dnxte_pop_up_pro_place_name_selected = 'center_center';
			}

			foreach ( $dnxte_pop_up_pro_pos_place_options as $dnxte_pop_up_pro_pos_place_option_value => $dnxte_pop_up_pro_pos_place_option_name ) {
				printf(
					'<label class="dnxte-popup-pro-position-control-item" for="dnxte-popup-pro-position-control-input-%3$s">
							<input id="dnxte-popup-pro-position-control-input-%3$s" class="dnxte-popup-position" name="%1$s" value="%3$s" %4$s type="radio" />
							<span class="checkmark"></span>
						</label>',
					esc_html( $dnxte_pop_up_pro_place_name ),
					esc_html( $dnxte_pop_up_pro_pos_place_option_name ),
					esc_attr( $dnxte_pop_up_pro_pos_place_option_value ),
					checked(
						$dnxte_pop_up_pro_pos_place_option_value,
						$dnxte_pop_up_pro_place_name_selected,
						false
					)
				);
			}

			?>

        </div>

    </div>

    <div class="dnxte_pp-sub">
        <label for="dnxte_pp_enable_overlay_blur" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Enable Overlay Blur', 'dnxte-divi-essential' ) ?>
        </label>
        <div class="dnxte-pp-sub-val-container raido">
            <div class="dnxte-ppro-toggle__button">
                <input
                        type="hidden"
                        name="dnxte_pp_enable_overlay_blur"
                        value="false"
                >
                <input
                        class="dnxte-ppro-toggle__switch"
                        type="checkbox"
                        name="dnxte_pp_enable_overlay_blur"
                        value="true"
					<?php if ( $dnxte_pp_enable_overlay_blur === 'true' ) { ?> checked<?php } ?>
                >
                <div class="dnxte-ppro-toggle__slider"></div>
                <label class="for-checked"><?php esc_html_e( "Yes", "dnxte-divi-essential" ); ?></label>
                <label class="for-unchecked"><?php esc_html_e( "No", "dnxte-divi-essential" ); ?></label>
            </div>
        </div>
    </div>
    <div class="dnxte_pp-sub">
        <label
                for=<?php esc_attr_e( $dnxte_pop_up_pro_close_btn_position ) ?>
                class="dnxte_pp-sub-lbl"
        >
			<?php esc_html_e( 'Close Button Position', 'dnxte-divi-essential' ); ?>
        </label>
        <select
                id=<?php esc_attr_e( $dnxte_pop_up_pro_close_btn_position ) ?>
                name=<?php esc_attr_e( $dnxte_pop_up_pro_close_btn_position ) ?>
                class="popup-sub-sel dnxte_pp-sub-val">
			<?php
			foreach ( $dnxte_pop_up_pro_close_btn_position_option as $dnxte_pop_up_pro_close_btn_position_option_value => $dnxte_pop_up_pro_close_btn_position_option_name ) {
				printf( '<option value="%2$s"%3$s>%1$s</option>',
					esc_html( $dnxte_pop_up_pro_close_btn_position_option_name ),
					esc_attr( $dnxte_pop_up_pro_close_btn_position_option_value ),
					selected(
						$dnxte_pop_up_pro_close_btn_position_option_value,
						$dnxte_pop_up_pro_close_button_selected,
						false
					)
				);
			} ?>
        </select>
    </div>
    <div class="dnxte_pp-sub">
        <label
                for="<?php esc_attr_e( $dnxte_popup_pro_overlay_zindex ) ?>"
                class="dnxte_pp-sub-lbl"
        >
			<?php esc_html_e( 'Overlay Z Index', 'dnxte-divi-essential' ); ?>
        </label>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_overlay_zindex"
                   size=10
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_overlay_zindex ); ?>"
            />
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Integer', 'dnxte-divi-essential' ) ?></p>
        </div>
    </div>
    <div class="dnxte_pp-sub">
        <label
                for=<?php esc_attr_e( $open_animation_effect_name ) ?>
                class="dnxte_pp-sub-lbl"
        >
			<?php esc_html_e( 'Opening Animation Effect', 'dnxte-divi-essential' ); ?>
        </label>
        <select
                id=<?php esc_attr_e( $open_animation_effect_name ) ?>
                name=<?php esc_attr_e( $open_animation_effect_name ) ?>
                class="popup-sub-sel dnxte_pp-sub-val">
			<?php
			foreach ( $dnxte_pop_up_pro_open_animation_options as $dnxte_pop_up_pro_open_animation_option_value => $dnxte_pop_up_pro_open_animation_option_name ) {
				printf( '<option value="%2$s"%3$s>%1$s</option>',
					esc_html( $dnxte_pop_up_pro_open_animation_option_name ),
					esc_attr( $dnxte_pop_up_pro_open_animation_option_value ),
					selected(
						$dnxte_pop_up_pro_open_animation_option_value,
						$open_animation_effect_name_selected,
						false
					)
				);
			} ?>
        </select>
    </div>
    <div class="dnxte_pp-sub">
        <label
                for=<?php esc_attr_e( $closing_animation_effect_name ) ?>
                class="dnxte_pp-sub-lbl"
        >
			<?php esc_html_e( 'Closing Animation Effect', 'dnxte-divi-essential' ); ?>
        </label>
        <select
                id=<?php esc_attr_e( $closing_animation_effect_name ) ?>
                name=<?php esc_attr_e( $closing_animation_effect_name ) ?>
                class="popup-sub-sel dnxte_pp-sub-val">
			<?php
			foreach ( $dnxte_pop_up_pro_close_animation_options as $dnxte_pop_up_pro_close_animation_option_value => $dnxte_pop_up_pro_close_animation_option_name ) {
				printf( '<option value="%2$s"%3$s>%1$s</option>',
					esc_html( $dnxte_pop_up_pro_close_animation_option_name ),
					esc_attr( $dnxte_pop_up_pro_close_animation_option_value ),
					selected(
						$dnxte_pop_up_pro_close_animation_option_value,
						$closing_animation_effect_name_selected,
						false
					)
				);
			} ?>
        </select>
    </div>

    <div class="dnxte_pp-sub">
        <label for="dnxte_pp_hide_close_button" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Hide Close Button', 'dnxte-divi-essential' ) ?>
        </label>
        <div class="dnxte-pp-sub-val-container raido">
            <div class="dnxte-ppro-toggle__button">
                <input
                        type="hidden"
                        name="dnxte_custom_hide_close_btn"
                        value="false"
                >
                <input
                        class="dnxte-ppro-toggle__switch"
                        type="checkbox"
                        name="dnxte_custom_hide_close_btn"
                        value="true"
					<?php if ( $dnxte_custom_hide_close_btn === 'true' ) { ?> checked<?php } ?>
                >
                <div class="dnxte-ppro-toggle__slider"></div>
                <label class="for-checked"><?php esc_html_e( "Yes", "dnxte-divi-essential" ); ?></label>
                <label class="for-unchecked"><?php esc_html_e( "No", "dnxte-divi-essential" ); ?></label>
            </div>
        </div>
    </div>
    <div class="dnxte_pp-sub">
        <label for="dnxte_pp_hide_close_button_outside" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Close Button Outside', 'dnxte-divi-essential' ) ?>
        </label>
        <div class="dnxte-pp-sub-val-container raido">
            <div class="dnxte-ppro-toggle__button">
                <input
                        type="hidden"
                        name="dnxte_custom_close_btn_outside"
                        value="false"
                >
                <input
                        class="dnxte-ppro-toggle__switch"
                        type="checkbox"
                        name="dnxte_custom_close_btn_outside"
                        value="true"
					<?php if ( $dnxte_custom_close_btn_outside === 'true' ) { ?> checked<?php } ?>
                >
                <div class="dnxte-ppro-toggle__slider"></div>
                <label class="for-checked"><?php esc_html_e( "Yes", "dnxte-divi-essential" ); ?></label>
                <label class="for-unchecked"><?php esc_html_e( "No", "dnxte-divi-essential" ); ?></label>
            </div>
        </div>
    </div>
    <div class="dnxte_pp-sub">
        <label for="dnxte_popup_pro_close_btn_color" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Close Button Icon Color', 'dnxte-divi-essential' ) ?>
        </label>
        <input
                class="cs-wp-color-picker"
                type="text"
                name="dnxte_popup_pro_close_btn_color"
                value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_color ); ?>"
        />
    </div>
    <div class="dnxte_pp-sub">
        <label for="dnxte_popup_pro_close_btn_bg_color" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Close Button Background Color', 'dnxte-divi-essential' ) ?>
        </label>
        <input
                class="cs-wp-color-picker"
                type="text"
                name="dnxte_popup_pro_close_btn_bg_color"
                value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_bg_color ); ?>"
        />
    </div>


    <div class="dnxte_pp-sub">
        <label
                for="<?php esc_attr_e( $dnxte_popup_pro_close_btn_icon_size ) ?>"
                class="dnxte_pp-sub-lbl"
        >
			<?php esc_html_e( 'Close Button Icon Size', 'dnxte-divi-essential' ); ?>
        </label>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_icon_size"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_icon_size ); ?>"
            />
            <span class="dnxte_pp-sub-suf"><?php esc_html_e( 'px', 'dnxte-divi-essential' ) ?></span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Pixels', 'dnxte-divi-essential' ) ?></p>
        </div>
    </div>
    <div class="dnxte_pp-sub">
        <label
                class="dnxte_pp-sub-lbl"
        >
			<?php esc_html_e( 'Close Button Padding', 'dnxte-divi-essential' ); ?>
        </label>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_top_padding"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_top_padding ); ?>"
            />
            <span class="dnxte_pp-sub-suf"><?php esc_html_e( 'px', 'dnxte-divi-essential' ) ?></span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Top', 'dnxte-divi-essential' ) ?></p>
        </div>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_bottom_padding"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_bottom_padding ); ?>"
            />
            <span class="dnxte_pp-sub-suf"><?php esc_html_e( 'px', 'dnxte-divi-essential' ) ?></span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Bottom', 'dnxte-divi-essential' ) ?></p>
        </div>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_left_padding"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_left_padding ); ?>"
            />
            <span class="dnxte_pp-sub-suf"><?php esc_html_e( 'px', 'dnxte-divi-essential' ) ?></span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Left', 'dnxte-divi-essential' ) ?></p>
        </div>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_right_padding"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_right_padding ); ?>"
            />
            <span class="dnxte_pp-sub-suf"><?php esc_html_e( 'px', 'dnxte-divi-essential' ) ?></span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Right', 'dnxte-divi-essential' ) ?></p>
        </div>
    </div>
    <div class="dnxte_pp-sub">
        <label class="dnxte_pp-sub-lbl">
			<?php esc_html_e( 'Close Button Margin', 'dnxte-divi-essential' ); ?>
        </label>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_top_margin"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_top_margin ); ?>"
            />
            <span class="dnxte_pp-sub-suf"><?php esc_html_e( 'px', 'dnxte-divi-essential' ) ?></span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Top', 'dnxte-divi-essential' ) ?></p>
        </div>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_bottom_margin"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_bottom_margin ); ?>"
            />
            <span class="dnxte_pp-sub-suf"><?php esc_html_e( 'px', 'dnxte-divi-essential' ) ?></span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Bottom', 'dnxte-divi-essential' ) ?></p>
        </div>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_left_margin"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_left_margin ); ?>"
            />
            <span class="dnxte_pp-sub-suf"><?php esc_html_e( 'px', 'dnxte-divi-essential' ) ?></span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Left', 'dnxte-divi-essential' ) ?></p>
        </div>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_right_margin"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_right_margin ); ?>"
            />
            <span class="dnxte_pp-sub-suf"><?php esc_html_e( 'px', 'dnxte-divi-essential' ) ?></span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Right', 'dnxte-divi-essential' ) ?></p>
        </div>
    </div>
    <div class="dnxte_pp-sub">
        <label
                class="dnxte_pp-sub-lbl"
        >
			<?php esc_html_e( 'Close Button Border Radius', 'dnxte-divi-essential' ); ?>
        </label>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_top_left_border_radius"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_top_left_border_radius ); ?>"
            />
            <span class="dnxte_pp-sub-suf">%</span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Top Left', 'dnxte-divi-essential' ) ?></p>
        </div>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_top_right_border_radius"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_top_right_border_radius ); ?>"
            />
            <span class="dnxte_pp-sub-suf">%</span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Top Right', 'dnxte-divi-essential' ) ?></p>
        </div>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_bottom_right_border_radius"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_bottom_right_border_radius ); ?>"
            />
            <span class="dnxte_pp-sub-suf">%</span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Bottom Right', 'dnxte-divi-essential' ) ?></p>
        </div>
        <div class="dnxte_pp-sub-val-container">
            <input class="dnxte_pp-sub-val"
                   type="text"
                   name="dnxte_popup_pro_close_btn_bottom_left_border_radius"
                   size=5
                   style="padding-right: 3em;"
                   value="<?php esc_attr_e( $dnxte_popup_pro_close_btn_bottom_left_border_radius ); ?>"
            />
            <span class="dnxte_pp-sub-suf">%</span>
            <p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Bottom Left', 'dnxte-divi-essential' ) ?></p>
        </div>
    </div>

</div>