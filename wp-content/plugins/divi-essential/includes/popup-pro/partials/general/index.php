<div id="tabs-trigger-settings" class="animated">
	<?php

	$dnxteppro_post_id                   = get_the_ID();
	$dnxteppro_sub_setting_name_selected = get_post_meta(
		$dnxteppro_post_id, 'dnxteppro_sub_triggering_settings', true
	);
	$dnxteppro_sub_setting_name          = "dnxteppro_sub_triggering_settings";
	$dnxteppro_sub_setting_options       = array(
		'trigger_on_none'          => esc_html__( 'Click', 'dnxte-divi-essential' ),
		'trigger_on_load'       => esc_html__( 'On Load', 'dnxte-divi-essential' ),
		'trigger_on_scroll'     => esc_html__( 'On Scroll', 'dnxte-divi-essential' ),
		'trigger_on_exit'       => esc_html__( 'On Exit', 'dnxte-divi-essential' ),
		'trigger_on_inactivity' => esc_html__( 'On Inactivity', 'dnxte-divi-essential' ),
	);

	?>
	<div class="dnxte-ppro-subs">
		<?php include_once( "trigger_general.php" ); ?>
		<div class="dnxte-ppro-sub">
			<label
				for=<?php echo esc_attr( $dnxteppro_sub_setting_name ) ?>
				class="dnxte-ppro-sub-lbl"
			>
				<?php esc_html_e( 'Trigger Mode', 'dnxte-divi-essential' ); ?>
			</label>
			<select
				id=<?php echo esc_attr( $dnxteppro_sub_setting_name ) ?>
				name=<?php echo esc_attr( $dnxteppro_sub_setting_name ) ?>
				class="popup-sub-sel dnxte-ppro-sub-val"
				onchange="showContent(this.value)"
			>
				<?php
				foreach ( $dnxteppro_sub_setting_options as $dnxteppro_sub_setting_option_value => $dnxteppro_sub_setting_option_name ) {
					printf( '<option value="%2$s"%3$s>%1$s</option>',
						esc_html( $dnxteppro_sub_setting_option_name ),
						esc_attr( $dnxteppro_sub_setting_option_value ),
						selected(
							$dnxteppro_sub_setting_option_value,
							$dnxteppro_sub_setting_name_selected,
							false
						)
					);
				} ?>
			</select>
		</div>

		<?php
		foreach ( $dnxteppro_sub_setting_options as $dnxteppro_sub_setting_option_value => $dnxteppro_sub_setting_option_name ) {
			$dnxteppro_sub_setting_option_value  ? trim($dnxteppro_sub_setting_option_value) : '';
			$dnxteppro_sub_setting_name_selected ? trim($dnxteppro_sub_setting_name_selected) : '';
			if (("" == $dnxteppro_sub_setting_name_selected && 'trigger_on_none' == $dnxteppro_sub_setting_option_value) || ($dnxteppro_sub_setting_option_value  == $dnxteppro_sub_setting_name_selected ) ):
				printf( '<div id="%1$s" class="%2$s-tabs %1$s dnxte_popup_trigger" style="display: block">',
					esc_attr( $dnxteppro_sub_setting_option_value ),
					esc_attr( $dnxteppro_sub_setting_option_name )
				);
			else:
				printf( '<div id="%1$s" class="%2$s-tabs %1$s dnxte_popup_trigger" style="display: none">',
					esc_attr( $dnxteppro_sub_setting_option_value ),
					esc_attr( $dnxteppro_sub_setting_option_name )
				);
			endif;
			include_once( "{$dnxteppro_sub_setting_option_value}.php" );
			printf( '</div>' );
		}
		printf( '<div style="clear: both"></div></div>' );

		// Start of autotrigger section condition
		if ( 'trigger_on_none' == $dnxteppro_sub_setting_name_selected ) {
			printf( '<div id="dnxte-autotrigger" style="display: none">' );
		} else {
			printf( '<div id="dnxte-autotrigger">' );
		}

		include_once( "trigger_autotrigger.php" );
		printf( '<div style="clear: both"></div></div>' );
		// end of autotrigger display statement
		include_once( "trigger_common.php" );
		?>

	</div>
</div>
