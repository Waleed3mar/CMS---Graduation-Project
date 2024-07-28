<?php
$dnxte_remove_link = get_post_meta(
	$post->ID, 'dnxte_remove_link', true
);
if ( empty( $dnxte_remove_link ) ) {
	$dnxte_remove_link = 'true';
}

$dnxte_close_overlay_click = get_post_meta(
	$post->ID, 'dnxte_close_overlay_click', true
);
if ( empty( $dnxte_close_overlay_click ) ) {
	$dnxte_close_overlay_click = 'true';
}

$dnxte_clickable_under_overlay = get_post_meta(
	$post->ID, 'dnxte_clickable_under_overlay', true
);
if ( empty( $dnxte_clickable_under_overlay ) ) {
	$dnxte_clickable_under_overlay = 'false';
}

$dnxte_close_clicking_back_button = get_post_meta(
	$post->ID, 'dnxte_close_clicking_back_button', true
);
if ( empty( $dnxte_close_clicking_back_button ) ) {
	$dnxte_close_clicking_back_button = 'true';
}

$dnxte_prevent_page_scrolling = get_post_meta(
	$post->ID, 'dnxte_prevent_page_scrolling', true
);
if ( empty( $dnxte_prevent_page_scrolling ) ) {
	$dnxte_prevent_page_scrolling = 'false';
}

?>

<div id="trigger_common_settings">

	<div class="dnxte_pp-sub">
		<label for="dnxte_remove_link" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Remove Link', 'dnxte-divi-essential' ) ?>
		</label>
		<div class="dnxte-pp-sub-val-container raido">
			<div class="dnxte-ppro-toggle__button">
				<input
					type="hidden"
					name="dnxte_remove_link"
					value = "false"
				>
				<input
					class="dnxte-ppro-toggle__switch"
					type="checkbox"
					name="dnxte_remove_link"
					value="true"
					<?php if ( $dnxte_remove_link === 'true' ) { ?> checked<?php } ?>
				>
				<div class="dnxte-ppro-toggle__slider"></div>
				<label class="for-checked"><?php esc_html_e( "Yes", "dnxte-divi-essential" ); ?></label>
				<label class="for-unchecked"><?php esc_html_e( "No", "dnxte-divi-essential" ); ?></label>
			</div>
			<p class="dnxte-ppro-sub-descr"><?php esc_html_e( "Remove link from element with selector", "dnxte-divi-essential" ); ?></p>
		</div>
	</div>
	<div class="dnxte_pp-sub">
		<label for="dnxte_close_overlay_click" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Close on Overlay Click', 'dnxte-divi-essential' ) ?>
		</label>
		<div class="dnxte-pp-sub-val-container raido">
			<div class="dnxte-ppro-toggle__button">
				<input
					type="hidden"
					name="dnxte_close_overlay_click"
					value="false"
				>
				<input
					class="dnxte-ppro-toggle__switch"
					type="checkbox"
					name="dnxte_close_overlay_click"
					value="true"
					<?php if ( $dnxte_close_overlay_click === 'true' ) { ?> checked<?php } ?>
				>
				<div class="dnxte-ppro-toggle__slider"></div>
				<label class="for-checked"><?php esc_html_e( "Yes", "dnxte-divi-essential" ); ?></label>
				<label class="for-unchecked"><?php esc_html_e( "No", "dnxte-divi-essential" ); ?></label>
			</div>
			<p class="dnxte-ppro-sub-descr"><?php esc_html_e( "Close popup when user click the background overlay", "dnxte-divi-essential" ); ?></p>
		</div>
	</div>
	<div class="dnxte_pp-sub">
		<label for="dnxte_clickable_under_overlay" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Clickable Under Overlay', 'dnxte-divi-essential' ) ?>
		</label>
		<div class="dnxte-pp-sub-val-container raido">
			<div class="dnxte-ppro-toggle__button">
				<input
					type="hidden"
					name="dnxte_clickable_under_overlay"
					value="false"
				>
				<input
					class="dnxte-ppro-toggle__switch"
					type="checkbox"
					name="dnxte_clickable_under_overlay"
					value="true"
					<?php if ( $dnxte_close_overlay_click === 'true' ) { ?> disabled<?php } ?>
					<?php if ( $dnxte_clickable_under_overlay === 'true' ) { ?> checked<?php } ?>
				>
				<div class="dnxte-ppro-toggle__slider"></div>
				<label class="for-checked"><?php esc_html_e( "Yes", "dnxte-divi-essential" ); ?></label>
				<label class="for-unchecked"><?php esc_html_e( "No", "dnxte-divi-essential" ); ?></label>
			</div>
			<p class="dnxte-ppro-sub-descr"><?php esc_html_e( "Make website elements clickable when popup is opened", "dnxte-divi-essential" ); ?></p>
			<p id="dnxte-close-msg"><?php if ( $dnxte_close_overlay_click === 'true' ) { esc_html_e('This option won\'t work if the "Close On Overlay Click" option is enabled.', 'dnxte-divi-essential'); } ?></p>
		</div>
	</div>
	<div class="dnxte_pp-sub">
		<label for="dnxte_prevent_page_scrolling" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Prevent Page Scrolling', 'dnxte-divi-essential' ) ?>
		</label>
		<div class="dnxte-pp-sub-val-container raido">
			<div class="dnxte-ppro-toggle__button">
				<input
					type="hidden"
					name="dnxte_prevent_page_scrolling"
					value="false"
				>
				<input
					class="dnxte-ppro-toggle__switch"
					type="checkbox"
					name="dnxte_prevent_page_scrolling"
					value="true"
					<?php if ( $dnxte_prevent_page_scrolling === 'true' ) { ?> checked<?php } ?>
				>
				<div class="dnxte-ppro-toggle__slider"></div>
				<label class="for-checked"><?php esc_html_e( "Yes", "dnxte-divi-essential" ); ?></label>
				<label class="for-unchecked"><?php esc_html_e( "No", "dnxte-divi-essential" ); ?></label>
			</div>
		</div>
	</div>
	<div class="dnxte_pp-sub">
		<label for="dnxte_close_clicking_back_button" class="dnxte_popup-pro-sub-lbl">
			<?php esc_html_e( 'Close by Clicking Back Button', 'dnxte-divi-essential' ) ?>
		</label>
		<div class="dnxte-pp-sub-val-container raido">
			<div class="dnxte-ppro-toggle__button">
				<input
					type="hidden"
					name="dnxte_close_clicking_back_button"
					value="false"
				>
				<input
					class="dnxte-ppro-toggle__switch"
					type="checkbox"
					name="dnxte_close_clicking_back_button"
					value="true"
					<?php if ( $dnxte_close_clicking_back_button === 'true' ) { ?> checked<?php } ?>
				>
				<div class="dnxte-ppro-toggle__slider"></div>
				<label class="for-checked"><?php esc_html_e( "Yes", "dnxte-divi-essential" ); ?></label>
				<label class="for-unchecked"><?php esc_html_e( "No", "dnxte-divi-essential" ); ?></label>
			</div>
			<p class="dnxte-ppro-sub-descr dnxte-ppro-sub-under-descr"><?php esc_html_e( "Close popup when browser back button is clicked.", "dnxte-divi-essential" ); ?></p>
		</div>
	</div>
</div>