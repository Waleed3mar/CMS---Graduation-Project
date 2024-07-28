<?php
    $at_pages = get_post_meta( $post->ID, 'dnxte_at_pages', true );
    $selectedpages = get_post_meta( $post->ID, 'dnxte_at_pages_selected' );
	$selectedexceptpages = get_post_meta(
        $post->ID, 'dnxte_at_exception_selected'
    );
    if( $at_pages == '' ) {
        $at_pages = 'all';
    }
$dnxte_pp_sub_setting_name     = "dnxte_sub_set_sitearea_settings";
?>
<div class="dnxte-pp-sub">
    <label
        for=<?php echo esc_attr($dnxte_pp_sub_setting_name) ?>
        class="dnxte-pp-sub-lbl"
    >
        <?php esc_html_e("Posts", "dnxte-divi-essential"); ?>
    </label>
    <div class="dnxte-at-pages">
        <select
            name="dnxte_at_pages"
            class="at_pages chosen do-filter-by-pages popup-sub-sel dnxte_pp-sub-val"
            data-dropdownshowhideblock="1"
            id="dnxte_sitearea_at_pages"
        >
            <option
                value="all"<?php if ( $at_pages == 'all' ) { ?>
                selected="selected"<?php } ?>
                data-showhideblock=".dnxte-list-exceptionpages-container"
            >
                <?php esc_html_e(" All pages", 'dnxte-divi-essential'); ?>
            </option>
            <option
                value="specific"<?php if ( $at_pages == 'specific' ) { ?>
                selected="selected"<?php } ?>
                data-showhideblock=".dnxte-list-pages-container"
            >
                <?php esc_html_e("Only specific pages", 'dnxte-divi-essential'); ?>
            </option>
        </select>
        <div
            class="dnxte-list-pages-container dnxte-add-popup-selected
                <?php if ( $at_pages == 'specific' ) { ?>dnxte-show<?php } ?>
            "
        >
                <select
                    name="dnxte_at_pages_selected[]"
                    class="dnxte-list-pages"
                    id="dnxte_sitearea_at_pages_suggestion"
                    data-placeholder="Choose posts or pages..."
                    multiple tabindex="3"
                >
          <?php
               if ( isset( $selectedpages[0] ) && is_array( $selectedpages[0]) ) {

                   foreach( $selectedpages[0] as $selectedidx => $selectedvalue ) {

                       $post_title = get_the_title( $selectedvalue );

                       print '<option value="' . esc_attr($selectedvalue) . '" selected="selected">' . esc_attr($post_title) . '</option>';
                   }
               }
           ?>
           </select>

        </div>
        <div
            class="dnxte-list-exceptionpages-container dnxte-add-exeption
              <?php if ( $at_pages == 'all' ) { ?>dnxte-show<?php } ?>
            "
        >
            <h4 class="do-exceptedpages"><?php esc_html_e('Add Exceptions:', 'dnxte-divi-essential'); ?></h4>
            <select
                name="dnxte_at_exception_selected[]"
                class="dnxte-list-exceptionpages"
                data-placeholder="Choose posts or pages..."
                multiple
                style="width: 300px;"
                tabindex="3"
                id="dnxte-add-exeption-select"
            >
              <?php
                   if ( isset( $selectedexceptpages[0] ) && !empty($selectedexceptpages[0]) ) {
                       foreach( $selectedexceptpages[0] as $selectedidx => $selectedvalue ) {

                           $post_title = get_the_title( $selectedvalue );

                           print '<option value="' . esc_attr($selectedvalue) . '" selected="selected">' . esc_attr($post_title) . '</option>';
                       }
                   }
               ?>
            </select>
        </div>
    </div>
    <div class="clear"></div> 
</div>