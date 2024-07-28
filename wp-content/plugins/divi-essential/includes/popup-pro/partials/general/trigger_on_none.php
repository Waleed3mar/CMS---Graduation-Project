<?php
$dnxte_manual_custom_css_selector = get_post_meta(
	$post->ID, 'dnxte_manual_custom_css_selector', true
);

$dnxte_closing_css_selector = get_post_meta(
	$post->ID, 'dnxte_closing_css_selector', true
);

?>

<div class="dnxte_pp-sub">
	<label
		for="trigger_manual-manual-trigger"
		class="dnxte_popup-pro-sub-lbl"
	>
		<?php esc_html_e( 'Manual Trigger', 'dnxte-divi-essential' ); ?>
	</label>
	<div class="dnxte_pp-sub-val-container">
		<div class="dnxte_pp-sub-input-container">
			<label class="dnxte_pp-sub-val readonly dxnte-manual-trigger-id-label"
			       name="trigger_manual-manual-trigger"
			>popup_<?php esc_attr_e( $post->ID ) ?></label>
			<span class="dashicons dashicons-clipboard dnxte-copy-class"></span>
		</div>
		<p class="dnxte_pp-sub-descr"><?php esc_html_e( 'CSS ID', 'dnxte-divi-essential' ); ?></p>
	</div>
</div>
<div class="dnxte_pp-sub">
	<label
		for="dnxte_manual_custom_css_selector"
		class="dnxte_popup-pro-sub-lbl"
	>
		<?php esc_html_e( 'Manual Trigger CSS Custom Selector', 'dnxte-divi-essential' ); ?>
	</label>
	<div class="dnxte_pp-sub-val-container">
		<input class="dnxte_pp-sub-val"
		       type="text"
		       name="dnxte_manual_custom_css_selector"
		       value="<?php echo esc_attr( $dnxte_manual_custom_css_selector ); ?>"
		/>
		<p class="dnxte_pp-sub-descr"><?php esc_html_e( 'Enter custom CSS class or id (e.g., .popup_class or #popup_id)', 'dnxte-divi-essential' ); ?></p>
	</div>
</div>
<div class="dnxte_pp-sub">
	<label
		for="dnxte_closing_css_selector"
		class="dnxte_popup-pro-sub-lbl"
	>
		<?php esc_html_e( 'Closing CSS Selector', 'dnxte-divi-essential' ); ?>
	</label>
	<div class="dnxte_pp-sub-val-container">
		<input class="dnxte_pp-sub-val"
		       type="text"
		       name="dnxte_closing_css_selector"
		       value="<?php echo esc_attr( $dnxte_closing_css_selector ); ?>"
		/>
		<p class="dnxte_pp-sub-descr"><?php esc_html_e( 'CSS selector to close popup', 'dnxte-divi-essential' ); ?></p>
	</div>
</div>
