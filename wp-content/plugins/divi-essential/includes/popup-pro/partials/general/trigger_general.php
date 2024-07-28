<?php
    $dnxte_popup = get_post_meta(
        $post->ID, 'dnxte_popup-active', true
    );
    if (empty($dnxte_popup)) {
        $dnxte_popup = 'true';
    }
?>

<div id="trigger_general_settings">
    <div class="dnxte-ppro-sub">
          <label
            for="dnxte_popup-active"
            class="dnxte-ppro-sub-lbl"
        >
            <?php esc_html_e( 'Enable (Yes/No)', 'dnxte-divi-essential' ); ?>
        </label>
        <div class="dnxte-ppro-sub-val-container raido" >
            <div class="dnxte-ppro-toggle__button">
                <input
                    type="hidden"
                    name="dnxte_popup-active"
                    value = "false"
                >
                <input
                    class="dnxte-ppro-toggle__switch"
                    type="checkbox"
                    name="dnxte_popup-active"
                    value = "true"
                    <?php if($dnxte_popup === 'true') {?> checked<?php } ?>
                >
                <div class="dnxte-ppro-toggle__slider"></div>
                <label class="for-checked"><?php esc_html_e('Yes', 'dnxte-divi-essential'); ?></label>  
                <label class="for-unchecked"><?php esc_html_e('No', 'dnxte-divi-essential'); ?></label>
            </div>
            <p class="dnxte-ppro-sub-descr"><?php esc_html_e('Enable/Disable Popup', 'dnxte-divi-essential'); ?></p>
        </div>
    </div>
</div>