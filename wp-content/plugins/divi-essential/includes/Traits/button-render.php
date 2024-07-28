<?php

/**
 * Button renderer trait
 */
namespace Divi_Essential\Includes\Traits;

defined( 'ABSPATH' ) || exit;

trait Button_Render {
	/**
	 * Helper method for rendering button markup which works compatible 
	 *
	 *
	 * @param array $args button settings.
	 *
	 * @return string rendered button HTML
	 */

     public function render_button_icon($args = array()) {
        $defaults = array(
			'dnxte_button_id'           => '',
			'dnxte_button_classname'    => array(),
			'dnxte_button_custom'       => '',
			'dnxte_button_rel'          => '',
			'dnxte_button_text'         => '',
			'dnxte_button_text_escaped'	=> false,
			'dnxte_button_url'          => '',
			'dnxte_custom_icon'         => '',
			'dnxte_custom_icon_tablet'  => '',
			'dnxte_custom_icon_phone'   => '',
			'dnxte_display_button'      => true,
			'dnxte_has_wrapper'         => true,
			'dnxte_url_new_window'      => '',
			'dnxte_multi_view_data'     => '',
        );

		$args = wp_parse_args($args, $defaults);

		// Do not proceed if dnxte_display_button argument is false.
		if ( ! $args['dnxte_display_button'] ) {
			return '';
		}

		$button_text = $args['dnxte_button_text_escaped'] ? $args['dnxte_button_text'] : esc_html( $args['dnxte_button_text'] );
		
		// Do not proceed if button_text argument is empty and not having multi view value.
		if ( '' === $button_text && ! $args['dnxte_multi_view_data'] ) {
			return '';
		}

		// Button classname.
		$button_classname = array( 'dnxte-button' );

		// Add multi view CSS hidden helper class when button text is empty on desktop mode.
		if ( '' === $button_text && $args['dnxte_multi_view_data'] ) {
			$button_classname[] = 'et_multi_view_hidden';
		}

		if ( ! empty( $args['dnxte_button_classname'] ) ) {
			$button_classname = array_merge( $button_classname, $args['dnxte_button_classname'] );
		}

		$use_data_icon = '' !== $args['dnxte_custom_icon'] && 'on' === $args['dnxte_button_custom'];
		if( et_pb_maybe_extended_icon( $args['dnxte_custom_icon'] ) ) {
			$args['dnxte_custom_icon'] = esc_attr( et_pb_get_extended_font_icon_value( $args['dnxte_custom_icon'] ) );
		}
		$data_icon = sprintf(
			'data-icon="%1$s"',
			esc_attr( et_pb_process_font_icon( $args['dnxte_custom_icon']) )
		);

		$use_data_icon_tablet = '' !== $args['dnxte_custom_icon_tablet'] && 'on' === $args['dnxte_button_custom'];
		if( et_pb_maybe_extended_icon( $args['dnxte_custom_icon_tablet'] ) ) {
			$args['dnxte_custom_icon_tablet'] = esc_attr( et_pb_get_extended_font_icon_value( $args['dnxte_custom_icon_tablet'] ) );
		}
		$data_icon_tablet = sprintf(
			'data-icon-tablet="%1$s"',
			esc_attr( et_pb_process_font_icon( $args['dnxte_custom_icon_tablet']) )
		);

		$use_data_icon_phone = '' !== $args['dnxte_custom_icon_phone'] && 'on' === $args['dnxte_button_custom'];
		if( et_pb_maybe_extended_icon( $args['dnxte_custom_icon_phone'] ) ) {
			$args['dnxte_custom_icon_phone'] = esc_attr( et_pb_get_extended_font_icon_value( $args['dnxte_custom_icon_phone'] ) );
		}
		$data_icon_phone = sprintf(
			'data-icon-phone="%1$s"',
			esc_attr( et_pb_process_font_icon( $args['dnxte_custom_icon_phone']) )
		);

		return sprintf(
			'%9$s<a class="%4$s" href="%2$s"%3$s%5$s%6$s%7$s%8$s>%1$s</a>%10$s',
			et_core_esc_previously( $button_text ),
			esc_url( $args['dnxte_button_url'] ),
			( 'on' === $args['dnxte_url_new_window'] ? ' target="_blank"' : '' ),
			esc_attr( implode( ' ', array_unique( $button_classname ) ) ),
			et_core_esc_previously( $args['dnxte_multi_view_data'] ), //5
			et_core_esc_previously( $data_icon ),
			et_core_esc_previously( $data_icon_tablet ),
			et_core_esc_previously( $data_icon_phone ),
			$args['dnxte_has_wrapper'] ? '<div class="dnxte_button_wrapper">' : '',
			$args['dnxte_has_wrapper'] ? '</div>' : ''
		);
		
     }

}