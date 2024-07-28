<?php
    $dnxte_trigger_on_scroll_offset = get_post_meta(
        $post->ID, 'dnxte_trigger_on_scroll_offset', true
    );
    if (empty($dnxte_trigger_on_scroll_offset)) {
        $dnxte_trigger_on_scroll_offset = '0';
    }
    $dnxte_trigger_on_scroll_offset_units = get_post_meta(
        $post->ID, 'dnxte_trigger_on_scroll_offset_units', true
    );
    if (empty($dnxte_trigger_on_scroll_offset_units)) {
        $dnxte_trigger_on_scroll_offset_units = 'px';
    }
?>

<div class="dnxte-ppro-sub">
	<label
		for="dnxte_trigger_on_scroll_offset"
		class="dnxte-ppro-sub-lbl"
	>
		<?php esc_html_e('Set Scrolling Offset', 'dnxte-divi-essential'); ?>
	</label>
    <div class="dnxte-pp-sub-val-container" >
        <input class="dnxte-pp-sub-val" 
            type="text"
            name="dnxte_trigger_on_scroll_offset"
            size = 5
            value="<?php esc_attr_e($dnxte_trigger_on_scroll_offset); ?>"
        />
        <p class="dnxte-pp-sub-descr"><?php esc_html_e('Offset', 'dnxte-divi-essential'); ?></p>
    </div>
    <div class="dnxte_popup-sub-val-container raido" >
        <div class="dnxte_pp-sub-val-radio-grp">
            <div class="dnxte-pp-sub-val-radio-container">
            <input
                    type="radio"
                    name="dnxte_trigger_on_scroll_offset_units"
                    value="px"
                    <?php if ( $dnxte_trigger_on_scroll_offset_units == 'px' ) { ?> checked<?php } ?>
                >
                <label><?php esc_html_e('px', 'dnxte-divi-essential') ?></label>
            </div>
            <div class="dnxte-pp-sub-val-radio-container">
            <input type="radio"
                name="dnxte_trigger_on_scroll_offset_units"
                value="%"
                <?php if ( $dnxte_trigger_on_scroll_offset_units == '%' ) { ?> checked<?php } ?>
            >
            <label>%</label>
        </div>

        </div>

        <p class="dnxte_popup-sub-descr"><?php esc_html_e("Units", "dnxte-divi-essential") ?></p>
    </div>
</div>

<div></div> <!--Need to add this empty element to show bottom border-->