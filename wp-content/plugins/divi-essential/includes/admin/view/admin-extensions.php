<?php

defined( 'ABSPATH' ) || die();

$extensions             = self::get_extensions_map();
$active_extensions    = self::get_inactive('extensions');
$total_extensions_count = count( $extensions );
?>

<div class="dnxte-admin-panel">
	<div class="dnxte-extensions-body">
        <form class="dnxte-extensions-admin" id="dnxte-admin-extensions-form">
            <div class="dnxte-row dnxte-pad-30">
                <div class="dnxte-col">
                    <div class="dnxte-extensions-filter-search">
                        <input id="dnxte-extensions-filter-search-input" type="text" placeholder="<?php echo esc_attr__('Search extensions', 'dnxte-divi-essential') ?>">
                        <div class="dnxte-extensions-filter-search-icon">
                            <svg width="19" height="19" viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.075 3.075a7.5 7.5 0 0110.95 10.241l3.9 3.902a.5.5 0 01-.707.707l-3.9-3.901A7.5 7.5 0 013.074 3.075zm.707.707a6.5 6.5 0 109.193 9.193 6.5 6.5 0 00-9.193-9.193z" fill="#46D39A" fill-rule="nonzero"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dnxte-col">
				<div class="dnxte-admin-extensions">
                    <?php foreach ( $extensions as $extension_key => $extension_data ) : 
                        $titles     = isset( $extension_data['title'] ) ? $extension_data['title'] : '';
                        $icon       = isset( $extension_data['icon'] ) ? $extension_data['icon'] : '';
                        $is_pro     = isset( $extension_data['is_pro'] ) && $extension_data['is_pro'] ? true : false;
                        $demo_url   = isset( $extension_data['demo'] ) && $extension_data['demo'] ? $extension_data['demo'] : '';
                        
                        $class_attr = 'dnxte-admin-extensions-item'; 
                        
                        $class_attr = 'dnxte-admin-extensions-item';
                        
                        if ( $is_pro ) {
                            $class_attr .= ' dnxte-extension-is-pro';
                        }

                        $checked = '';
                        
                        if ( ! in_array( $extension_key, $active_extensions )) {
                            $checked = 'checked="checked"';
                        }

                        $is_placeholder = $is_pro;

                        if ( $is_placeholder ) {
                            $class_attr .= ' dnxte-extension-is-placeholder';
                            $checked     = 'disabled="disabled"';
                        }
                    ?>
                        <div class="<?php echo esc_attr( $class_attr ); ?>">
                            <span class="dnxte-admin-extensions-item-icon">
                                <img src="<?php echo esc_url( $icon ); ?>" alt="">
                            </span>
                            <h3 class="dnxte-admin-extensions-item-title">
                                <label for="dnxte-extension-<?php echo esc_attr( $extension_key ); ?>"><?php echo esc_html( $titles ); ?></label>
                                <?php if ( $demo_url ) : ?>
                                    <a href="<?php echo esc_url( $demo_url ); ?>"
										target="_blank"
										rel="noopener"
										data-tooltip="<?php echo esc_attr_e( 'Click and view demo', 'dnxte-divi-essential' ); ?>"
										class="dnxte-admin-extensions-item-preview">
										<img class="dnxte-img-fluid dnxte-item-icon-size" src="<?php echo  esc_attr(DIVI_ESSENTIAL_ASSETS . 'images/admin/desktop.svg'); ?>" alt="demo-link">
									</a>
                                <?php endif; ?>
                            </h3>
                            <div class="dnxte-admin-extensions-item-toggle dnxte-toggle">
                                <input id="dnxte-extension-<?php echo esc_attr($extension_key); ?>" <?php esc_attr_e($checked); ?>
                                    type="checkbox"
                                    class="dnxte-toggle-check"
                                    name="extensions[]"
                                    value="<?php echo  esc_attr($extension_key) ; ?>"
                                >
                                <b class="dnxte-toggle-switch"></b>
                                <b class="dnxte-toggle-track"></b>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="dnxte-row dnxte-admin-button-panel">
                <div class="dnxte-col">
                    <button disabled class="dnxte-btn dnxte-btn-save dnxte-btn-lg dnxte-ext-switch" type="submit">
                        <?php esc_html_e( 'Save Settings', 'dnxte-divi-essential' ); ?>
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>