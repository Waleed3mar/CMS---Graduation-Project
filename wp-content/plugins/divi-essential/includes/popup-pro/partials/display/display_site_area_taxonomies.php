<?php 
    $_post_type = $selectable_option_value;
    $taxonomies = get_object_taxonomies($_post_type, 'object');

    foreach($taxonomies as $key => $taxonmy) {
        if(!$taxonmy->public) continue;
        if($key == 'post_format') continue;
        $selected_terms = array();
        $selected = false;
        $terms = get_terms($key, array('hide_empty' => false));

        $all_term_name = "display_site_area_all_".$key;
        $all_term_value = get_post_meta($post->ID, $all_term_name, true);
        $term_selected = false;
        
        foreach( $terms as $tem ){
            $term_name = "dnxte_display_site_area_$key-$tem->slug";
            if( get_post_meta($post->ID, $term_name, true) === "on"){
                $term_selected = true;
                break;
            }
        }
        if(empty($all_term_value) && !$term_selected){
            $all_term_value = 'on';
        }

?>
    <div class="dnxte-pp-sub">
        <label for="dnxte_site_area" class="dnxte-popup-sub-lbl">
            <?php esc_html_e($taxonmy->label); ?>
        </label>
        <div class="dnxte-pp-sub-val-container">
            <div class="dnxte-pp-sub-val-radio-grp tag-style">
                <div class="dnxte-pp-sub-val-radio-container<?php if ( $all_term_value === "on" ) { ?> allchecked<?php } ?>">
                    <input
                        type="checkbox"
                        class="allcheckbox"
                        name="<?php esc_attr_e($all_term_name)?>"
                        <?php if ( $all_term_value === "on" ) { ?> checked<?php } ?>
                    >
                    <label for="<?php esc_attr_e($all_term_name)?>"><?php esc_html_e($taxonmy->labels->all_items) ?></label>

                </div>
                <?php 
                    foreach( $terms as $tem ){
                        $term_name = "dnxte_display_site_area_$key-$tem->slug";
                        $term_value = get_post_meta($post->ID, $term_name, true);
                    
                ?>
                <div class="dnxte-pp-sub-val-raido-container">
                    <input 
                        type="checkbox"
                        name="<?php esc_attr_e($term_name); ?>"
                        <?php if($term_value === "on"){?> checked<?php } ?>
                    />
                    <label for="<?php esc_attr_e($term_name); ?>"><?php esc_html_e($tem->name); ?></label>
                </div>
                <?php }?>
            </div>
        </div>
    </div>

<?php  } ?>