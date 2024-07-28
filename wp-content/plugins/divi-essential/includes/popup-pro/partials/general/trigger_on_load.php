<?php
    $trigger_on_load_delay_start = get_post_meta(
        $post->ID, 'trigger_on_load-delay-start', true
    );
    if (empty($trigger_on_load_delay_start)) {
        $trigger_on_load_delay_start = '0';
    }
    $trigger_on_load_delay_end = get_post_meta(
        $post->ID, 'trigger_on_load-delay-end', true
    );
    if (empty($trigger_on_load_delay_end)) {
        $trigger_on_load_delay_end = '0';
    }
?>
<div class="dnxte-ppro-sub">
    <label
        for="trigger_on_load-delay-start"
        class="dnxte-ppro-sub-lbl"
    >
        <?php esc_html_e('Time Duration', 'dnxte-divi-essential'); ?>
    </label>
    <div class="dnxte-ppro-sub-val-container" >
        <input class="dnxte-ppro-sub-val" 
            type="text"
            name="trigger_on_load-delay-start"
            size = 5
            style="padding-right: 3em;"
            value="<?php echo esc_attr($trigger_on_load_delay_start);?>"
        />
        <span class="dnxte-ppro-sub-suf"><?php esc_html_e('sec', 'dnxte-divi-essential'); ?></span>
        <p class="dnxte-ppro-sub-descr"><?php esc_html_e('Start Delay', 'dnxte-divi-essential'); ?></p>
    </div>
    <div class="dnxte-ppro-sub-val-container" >
        <input class="dnxte-ppro-sub-val" 
            type="text"
            name="trigger_on_load-delay-end"
            size = 5
            style="padding-right: 3em;"
            value="<?php echo esc_attr($trigger_on_load_delay_end); ?>"
        />
        <span class="dnxte-ppro-sub-suf"><?php esc_html_e('sec', 'dnxte-divi-essential'); ?></span>
        <p class="dnxte-ppro-sub-descr"><?php esc_html_e('End Delay', 'dnxte-divi-essential'); ?></p>
    </div>
</div>


