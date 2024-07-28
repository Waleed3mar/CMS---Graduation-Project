<?php
$trigger_autotrigger_options = "trigger_on_load trigger_on_scroll trigger_on_exit trigger_on_inactivity";

// Periodicity
$trigger_autotrigger_periodicity = get_post_meta(
	$post->ID, 'trigger_autotrigger-periodicity', true
);
if (empty($trigger_autotrigger_periodicity)) {
	$trigger_autotrigger_periodicity = 'every_time';
}

$trigger_autotrigger_periodicity_hours = get_post_meta(
	$post->ID, 'trigger_autotrigger-periodicity-hours', true
);
if (empty($trigger_autotrigger_periodicity_hours)) {
	$trigger_autotrigger_periodicity_hours = '24';
}
// Activity
$dnxte_auto_trigger_activity = get_post_meta(
	$post->ID, 'dnxte_auto_trigger_activity', true
);
if(empty($dnxte_auto_trigger_activity)) {
	$dnxte_auto_trigger_activity = 'always';
}
$dnxte_auto_trigger_activity_certain_perion_from = get_post_meta(
	$post->ID, 'dnxte_auto_trigger_activity_certain_perion_from', true
);
$dnxte_auto_trigger_activity_certain_perion_to = get_post_meta(
	$post->ID, 'dnxte_auto_trigger_activity_certain_perion_to', true
);

?>


<?php printf('<div id="%1$s" class="%2$s-tabs %3$s">',
	"trigger_autotrigger_settings",
	esc_attr($dnxteppro_sub_setting_name),
	esc_attr($trigger_autotrigger_options)
);
?>
<div class="dnxte-ppro-sub">
	<label
		for="trigger_autotrigger-periodicity"
		class="dnxte-ppro-sub-lbl"
	>
		<?php esc_html_e('Periodicity', 'dnxte-divi-essential'); ?>
	</label>
	<div class="dnxte_ppro-sub-val-container raido">
		<div
			class="dnxte_ppro-sub-val-radio-grp"
			data-radioshowhideblock="1"
		>
			<div class="dnxte_ppro-sub-val-radio-container">
				<input
					onchange="dnxte_trigger_check(this.value)"
					type="radio"
					name="trigger_autotrigger-periodicity"
					value="every_time"
					<?php if( $trigger_autotrigger_periodicity == 'every_time'){ ?> checked<?php } ?>
					data-showhideblock=".periodicity-every_time"
				>
				<label><?php esc_html_e('Every Time', 'dnxte-divi-essential'); ?></label>
			</div>
			<div class="dnxte_ppro-sub-val-radio-container">
				<input
					onchange="dnxte_trigger_check(this.value)"
					type="radio"
					name="trigger_autotrigger-periodicity"
					value="once_per_period"
					<?php if( $trigger_autotrigger_periodicity == 'once_per_period'){ ?> checked<?php } ?>
					data-showhideblock=".periodicity-once_per_period"
				>
				<label><?php esc_html_e('Once Per Period', 'dnxte-divi-essential'); ?></label>
			</div>
			<div class="dnxte_ppro-sub-val-radio-container">
				<input
					onchange="dnxte_trigger_check(this.value)"
					type="radio"
					name="trigger_autotrigger-periodicity"
					value="once_only"
					<?php if( $trigger_autotrigger_periodicity == 'once_only'){ ?> checked<?php } ?>
					data-showhideblock=".periodicity-once_only"
				>
				<label><?php esc_html_e('Once Only', 'dnxte-divi-essential'); ?></label>
			</div>
		</div>
		<p class="dnxte_ppro-sub-descr"><?php esc_html_e('Periodicity mode', 'dnxte-divi-essential'); ?></p>
	</div>

	<div
		class="dnxte_ppro-sub-val-container
                    showhideblock
                    periodicity-once_per_period
                    <?php if ( $trigger_autotrigger_periodicity == "once_per_period" ) { echo 'dnxte-show'; }else{ echo 'dnxte-hide'; } ?>"
	>

		<input class="dnxte_ppro-sub-val"
		    type="text"
		    name="trigger_autotrigger-periodicity-hours"
		    style="padding-right: 3em;"
		    size = 3
		    value="<?php echo esc_attr($trigger_autotrigger_periodicity_hours); ?>"
		/>
		<span class="dnxte_ppro-sub-suf" style="margin-left: -3em;"><?php esc_html_e('hrs', 'dnxte-divi-essential'); ?></span>
	</div>
</div>
<div class="dnxte-ppro-sub">
	<label
		for="dnxte_auto_trigger_activity"
		class="dnxte-ppro-sub-lbl"
	>
		<?php esc_html_e('Activity', 'dnxte-divi-essential'); ?>
	</label>
	<div class="dnxte_ppro-sub-val-container radio">
		<div
			class="dnxte_ppro-sub-val-radio-grp-activity dnxte_popup-sub-val-radio-grp"
			data-radioshowhideblock="1"
		>
			<div class="dnxte_pp-sub-val-radio-container">
				<input
					type="radio"
					name="dnxte_auto_trigger_activity"
					value="always"
					onchange="dnxte_activity_show_condition(this.value)"
					<?php if( $dnxte_auto_trigger_activity == 'always'){?> checked <?php } ?>
					data-showidblock=".activity-always"
				>
				<label><?php esc_html_e('Always', 'dnxte-divi-essential'); ?></label>
			</div>
			<div class="dnxte_pp-sub-val-radio-container">
				<input
					type="radio"
					name="dnxte_auto_trigger_activity"
					value="certain_period"
					onchange="dnxte_activity_show_condition(this.value)"
					<?php if( $dnxte_auto_trigger_activity == 'certain_period'){?> checked <?php } ?>
					data-showhideblock=".activity-certain-period"
				>
				<label><?php esc_html_e('Certain Period', 'dnxte-divi-essential'); ?></label>
			</div>
		</div>
		<p class="dnxte-pp-sub-descr"><?php esc_html_e('Activity', 'dnxte-divi-essential'); ?></p>
	</div>

	<div class="dxnte-activity-show <?php if( $dnxte_auto_trigger_activity != 'certain_period'){?> dnxte-hide <?php } ?>">
		<div
			class="dnxte_pp-sub-val-container
                showhideblock
                activity-certain_period
                <?php if ( $dnxte_auto_trigger_activity == "certain_period" ) { ?> dpm-show<?php } ?>"
		>
			<span class="dnxte_pp-sub-suf dashicons dashicons-calendar-alt"></span>
			<input
				type="text"
				class="dnxte_pp-sub-val dnxte-datetime-input"
				name="dnxte_auto_trigger_activity_certain_perion_from"
				value="<?php echo esc_attr($dnxte_auto_trigger_activity_certain_perion_from); ?>"
				autocomplete="off"
			/>
			<p class="dnxte_pp-sub-descr"><?php esc_html_e('From', 'dnxte-divi-essential'); ?></p>
		</div>
		<div
			class="dnxte_pp-sub-val-container
                showhideblock
                activity-certain_period
                <?php if ( $dnxte_auto_trigger_activity == "certain_period" ) { ?> dpm-show<?php } ?>"
		>
			<span class="dnxte_pp-sub-suf dashicons dashicons-calendar-alt"></span>
			<input
				type="text"
				class="dnxte_pp-sub-val dnxte-datetime-input"
				name="dnxte_auto_trigger_activity_certain_perion_to"
				value="<?php echo esc_attr($dnxte_auto_trigger_activity_certain_perion_to); ?>"
				autocomplete="off"
			/>
			<p class="dnxte_pp-sub-descr"><?php esc_html_e('To', 'dnxte-divi-essential'); ?></p>
		</div>
	</div>
</div>


</div>
