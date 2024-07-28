<?php
    $dnxte_trigger_on_inactivity_delay = get_post_meta(
        $post->ID, 'dnxte_trigger_on_inactivity_delay', true
    );
    if (empty($dnxte_trigger_on_inactivity_delay)) {
        $dnxte_trigger_on_inactivity_delay = '0';
    }
?>
<div class="dnxte-ppro-sub">
	<label
		for="dnxte_trigger_on_inactivity_delay"
		class="dnxte-ppro-sub-lbl"
	>
		<?php esc_html_e('Inactivity Delay', 'dnxte-divi-essential'); ?>
	</label>
    <div class="dnxte_popup-sub-val-container" >
        <input class="dnxte-pp-sub-val" 
            type="text"
            name="dnxte_trigger_on_inactivity_delay"
            size = 5
            style="padding-right: 3em;"
            value="<?php esc_attr_e($dnxte_trigger_on_inactivity_delay); ?>"
        />
        <span class="dnxte-pp-sub-suf"><?php esc_html_e("sec", "dnxte-divi-essential"); ?></span>
        <p class="dnxte-pp-sub-descr"><?php esc_html_e("Seconds", "dnxte-divi-essential") ?></p>
    </div>
</div>

<div></div> <!--Need to add this empty element to show bottom border-->