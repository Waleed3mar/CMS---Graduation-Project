<?php
$dnxte_pp_display_site_area    = get_post_meta($post->ID, 'display_site_area', true);
$dnxte_config_display          = get_post_meta($post->ID, 'dnxte_config_display', true);
$dnxte_pp_sub_setting_name     = "dnxte_sub_set_sitearea_settings";
$dnxte_pp_sub_setting_selected = get_post_meta($post->ID, $dnxte_pp_sub_setting_name, true);


$post_types                        = get_post_types(
    array(
        "public"   => true,
        "_builtin" => false
    ),
    "objects"
);
$selectable_post_types             = array();
$selectable_post_types['sitewide'] = "Sitewide";
$selectable_post_types['page']     = "Pages";
$selectable_post_types['post']     = "Posts";

foreach ($post_types as $post_type_key => $post_type_value) {
    $selectable_post_types[$post_type_value->name] = $post_type_value->label;
}
$dnxte_post_type_selected = '';
$pp_post_type                = wp_json_encode($selectable_post_types);

$condition_data = json_decode($dnxte_config_display);

if ($condition_data) {
    $con_count = count($condition_data) + 1;
} else {
    $con_count = 2;
}
wp_localize_script('popup-pro-backend-js', 'display_sitearea_obj', array(
    'dnxte_post_type' => $pp_post_type,
    'condition_count' => $con_count
));
?>

<?php
global $wp_roles;
if (!isset($dnxte_roles)) {
    $dnxte_roles = new WP_Roles();
}

$user_role_selected          = false;
$limitation_user_roles_all   = get_post_meta(
    $post->ID,
    "dnxte_limitation_user_roles_all",
    true
);
$limitation_user_roles_guest = get_post_meta(
    $post->ID,
    "dnxte_limitation_user_roles_guest",
    true
);
if ($limitation_user_roles_guest === 'on') {
    $user_role_selected = true;
} else {
    foreach ($dnxte_roles->role_names as $wp_role_key => $wp_role_value) {
        if (get_post_meta($post->ID, "dnxte_limitation_user_roles_$wp_role_key", true) === "on") {
            $user_role_selected = true;
            break;
        }
    }
}

if (empty($limitation_user_roles_all) && !$user_role_selected) {
    $limitation_user_roles_all = 'on';
}

$dnxte_trigger_auto_resp_disable_phone   = get_post_meta(
    $post->ID,
    'dnxte_trigger_auto_resp_disable_phone',
    true
);
$dnxte_trigger_auto_resp_disable_tablet  = get_post_meta(
    $post->ID,
    'dnxte_trigger_auto_resp_disable_tablet',
    true
);
$dnxte_trigger_auto_resp_disable_desktop = get_post_meta(
    $post->ID,
    'dnxte_trigger_auto_resp_disable_desktop',
    true
);
?>
<div class="dnxte-display-tab">
    <label for="dnxte_popup_pro_user_role" class="dnxte-display-lbl">
        <?php esc_html_e('User Roles', 'dnxte-divi-essential') ?>
    </label>
    <div class="dnxte-display-content">
        <div class="dnxte_popup-sub-val-radio-grp tag-style">
            <div class="dnxte_pp-sub-val-radio-container dnxte-pp-user-cap dnxte-display-inline-block<?php if ($limitation_user_roles_all === 'on') { ?> allchecked <?php } ?>">
                <input type="checkbox" class="allcheckboxlimituser" name="dnxte_limitation_user_roles_all" <?php if ($limitation_user_roles_all === 'on') { ?> checked<?php } ?>>
                <label>
                    <?php esc_html_e('All User Role', 'dnxte-divi-essential'); ?>
                </label>
            </div>
            <div class="dnxte_pp-sub-val-radio-container dnxte-pp-user-cap dnxte-display-inline-block">
                <input type="checkbox" class="guestCheckbox" name="dnxte_limitation_user_roles_guest" <?php if (get_post_meta($post->ID, "dnxte_limitation_user_roles_guest", true) === "on") { ?> checked <?php } ?>>
                <label>
                    <?php esc_html_e('Guest', 'dnxte-divi-essential'); ?>
                </label>
            </div>
            <?php foreach ($dnxte_roles->role_names as $wp_role_key => $wp_role_value) { ?>
                <div class="dnxte_pp-sub-val-radio-container dnxte-pp-user-cap dnxte-display-inline-block">
                    <input type="checkbox" class="dnxt-permissions-section" name="dnxte_limitation_user_roles_<?php esc_attr_e($wp_role_key) ?>" <?php if (get_post_meta($post->ID, "dnxte_limitation_user_roles_$wp_role_key", true) === "on") { ?> checked <?php } ?>>
                    <label>
                        <?php esc_html_e($wp_role_value, 'dnxte-divi-essential'); ?>
                    </label>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="dnxte-display-tab">
    <label for="dnxte_disable_on" class="dnxte-display-lbl">
        <?php esc_html_e('Hide On Device', 'dnxte-divi-essential'); ?>
    </label>
    <div class="dnxte-display-content">
        <div class="dnxte-pp-sub-val-radio-grp">
            <div class="dnxte-pp-sub-val-radio-container dnxte-display-inline-block">
                <input type="checkbox" name="dnxte_trigger_auto_resp_disable_phone" <?php if ($dnxte_trigger_auto_resp_disable_phone == 'on') { ?> checked<?php } ?>>
                <label><span class="dashicons dashicons-smartphone"></span></label>
            </div>

            <div class="dnxte-pp-sub-val-radio-container dnxte-display-inline-block">
                <input type="checkbox" name="dnxte_trigger_auto_resp_disable_tablet" <?php if ($dnxte_trigger_auto_resp_disable_tablet == 'on') { ?> checked<?php } ?>>
                <label><span class="dashicons dashicons-tablet"></span></label>
            </div>
            <div class="dnxte-pp-sub-val-radio-container dnxte-display-inline-block">
                <input type="checkbox" name="dnxte_trigger_auto_resp_disable_desktop" <?php if ($dnxte_trigger_auto_resp_disable_desktop == 'on') { ?> checked<?php } ?>>
                <label><span class="dashicons dashicons-desktop"></span></label>
            </div>

        </div>
    </div>
</div>
<div class="dnxte-sitearea">
    <div class="dnxte-condition-text">
        <h4><?php esc_html_e('Popup Location', 'dnxte-divi-essential') ?></h4>
        <p><?php esc_html_e('Specify the area where you want to display the popup, such as including or excluding specific pages, posts, project posts, or popups', 'dnxte-divi-essential') ?></p>
    </div>
    <?php
    $i               = 1;
    $post_types_post = '';
    $query = '';
    if ($condition_data) :
        foreach ($condition_data as $condition) :
            $dnxte_post_type_selected = $condition->display_config_post_type;

            if (isset($condition->dnxte_display_page) && !empty(array_filter($condition->dnxte_display_page))) {
                $arguments = array(
                    'post_type' => $dnxte_post_type_selected,
                    'post__in' => $condition->dnxte_display_page
                );

                $query = new WP_Query($arguments);
            }
            // var_dump($query);
    ?>
            <div class="dnxte_pp-sub dnxte_pp-sub<?php echo esc_attr_e($i); ?>">
                <div class="type">
                    <select class="include" name="dnxte_config_display[<?php echo esc_attr_e($i); ?>][display_condition]">
                        <option value="include" <?php echo $condition->display_condition == 'include' ? 'selected' : '' ?>>
                            <?php esc_html_e('Include', 'dnxte-divi-essential') ?>
                        </option>
                        <option value="exclude" <?php echo $condition->display_condition == 'exclude' ? 'selected' : '' ?>>
                            <?php esc_html_e('Exclude', 'dnxte-divi-essential') ?>
                        </option>
                    </select>
                </div>
                <div class="dnxte-post-type">
                    <select data-id="<?php echo esc_attr_e($i); ?>" class="dnxte-pp-sub-sel" name="dnxte_config_display[<?php echo esc_attr_e($i); ?>][display_config_post_type]">
                        <?php
                        foreach ($selectable_post_types as $selectable_option_value => $selectable_option_name) {
                            printf(
                                '<option value="%2$s" %3$s>%1$s</option>',
                                esc_html($selectable_option_name),
                                esc_attr($selectable_option_value),
                                selected($selectable_option_value, $dnxte_post_type_selected, false)
                            );
                        }
                        ?>
                    </select>
                </div>
                <div class="dnxte-ppro-multiple-select dnxte-multiple-select-sitearea<?php echo esc_attr_e($i) . ' ';
                                                                                        if ($dnxte_post_type_selected == 'sitewide') {
                                                                                            echo 'dnxte-hide';
                                                                                        } ?>">

                    <select multiple="multiple" name="dnxte_config_display[<?php echo esc_attr_e($i); ?>][dnxte_display_page][]" class="dnxte-condition-render dnxte-condition-render<?php echo esc_attr_e($i); ?>">

                        <?php
                        if ($query) {
                            while ($query->have_posts()) {
                                $query->the_post();
                        ?>
                                <option value="<?php echo esc_attr(get_the_ID()); ?>" selected="selected"><?php echo esc_attr(get_the_title()); ?></option>
                            <?php }
                            /* Restore original Post Data */
                            wp_reset_postdata();
                        } else {
                            ?>
                            <option value="" selected="selected"><?php esc_html_e('all', 'dnxte-divi-essential') ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <?php if ($i != 1) : ?>
                    <span class="dashicons dashicons-trash dnxte-remove-row"></span>
                <?php endif; ?>
            </div>
        <?php
            $i++;
        endforeach;
    else :
        ?>
        <div class="dnxte_pp-sub dnxte_pp-sub1">
            <div class="type">
                <select class="include" name="dnxte_config_display[1][display_condition]">
                    <option value="include" selected="">
                        <?php esc_html_e('Include', 'dnxte-divi-essential') ?>
                    </option>
                    <option value="exclude">
                        <?php esc_html_e('Exclude', 'dnxte-divi-essential') ?>
                    </option>
                </select>
            </div>
            <div class="dnxte-post-type">
                <select data-id="1" class="dnxte-pp-sub-sel" name="dnxte_config_display[1][display_config_post_type]">
                    <?php
                    foreach ($selectable_post_types as $selectable_option_value => $selectable_option_name) {
                        printf(
                            '<option value="%2$s">%1$s</option>',
                            esc_html($selectable_option_name),
                            esc_attr($selectable_option_value)
                        );
                    }
                    ?>
                </select>
            </div>
            <div class="dnxte-ppro-multiple-select dnxte-multiple-select-sitearea1  dnxte-hide">

                <select multiple="multiple" name="dnxte_config_display[1][dnxte_display_page][]" class="dnxte-condition-render dnxte-condition-render1">
                    <option value=""><?php esc_html_e('all', 'dnxte-divi-essential') ?></option>
                </select>
            </div>
        </div>
    <?php endif; ?>
</div>
<div class="dnxte-sitearea-btn-wrap">
    <button id="dnxte-sitearea-add-button" type="button"><?php esc_html_e('Add', 'dnxte-divi-essential') ?></button>
</div>