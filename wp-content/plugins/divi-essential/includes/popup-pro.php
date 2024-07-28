<?php

namespace Divi_Essential\Includes;

defined( 'ABSPATH' ) || die();


/**
 * The Popup class.
 *
 * This class is responsible for rendering a custom post type and custom meta box in WordPress with user-defined fields/options.
 *
 * @since             1.0.0
 * @package           popup
 *
 */
class DnxtePopupPro {


	const MODULES_NONCE = 'dnxte_nonce';

	const popup_icon = "data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHZpZXdCb3g9IjAgMCAyMCAyMCIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPGcgY2xpcC1wYXRoPSJ1cmwoI2NsaXAwXzY5OTVfMTQzMCkiPgo8cGF0aCBkPSJNMTYuNjM3NiAxNi42MjUyVjIwSDBWMy4zNjI0M0gzLjM3NDg0VjQuNjA3NzZIMS4yNDUzM1YxOC43NTQ3SDE1LjM5MjNWMTYuNjI1MkgxNi42Mzc2WiIgZmlsbD0iI0E3QUFBRCIvPgo8cGF0aCBkPSJNNC42MDc3MyAwVjE1LjM5MjNIMjBWMEg0LjYwNzczWk0xOC43NTQ3IDE0LjE0NjlINS44NTMwNlYxLjI0NTMzSDE4Ljc1NDdWMTQuMTQ2OVoiIGZpbGw9IiNBN0FBQUQiLz4KPHBhdGggZD0iTTEwLjk3MDUgNy43NzEyOUw3LjA4MTY1IDExLjc1NjNMNy45NzI5MiAxMi42MjYxTDExLjg2MTggOC42NDEwNEwxMC45NzA1IDcuNzcxMjlaIiBmaWxsPSIjQTdBQUFEIi8+CjxwYXRoIGQ9Ik0xMi4zNDgyIDcuMjk3NjdINy44NjUwMVY4LjU0M0gxMi4zNDgyVjcuMjk3NjdaIiBmaWxsPSIjQTdBQUFEIi8+CjxwYXRoIGQ9Ik0xMi4zNTM3IDguNTE4MDdIMTEuMTA4NFYxMS42NTYzSDEyLjM1MzdWOC41MTgwN1oiIGZpbGw9IiNBN0FBQUQiLz4KPC9nPgo8ZGVmcz4KPGNsaXBQYXRoIGlkPSJjbGlwMF82OTk1XzE0MzAiPgo8cmVjdCB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIGZpbGw9IndoaXRlIi8+CjwvY2xpcFBhdGg+CjwvZGVmcz4KPC9zdmc+Cg==";

	/**
	 * Popup constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
//        Don't Remove this line
        if ( defined( 'POPR_POPUP_PRO_VERSION' ) ) {
            return;
        }

		// Register the Custom Post Type
		add_action( 'init', array( $this, 'register_dnexte_popup' ) );

		/* Add Custom Column in Post Type */
		add_filter( 'manage_edit-dnxte_popup_columns', array( $this, 'my_edit_dnxte_popup_columns' ) );

		/* Add Custom Post Type Columns Management */
		add_action( 'manage_dnxte_popup_posts_custom_column', array( $this, 'my_manage_dnxte_popup_columns' ), 10, 2 );


		/* Add Custom Meta Box */
		add_action( 'add_meta_boxes', array( $this, 'dnxte_popup_meta_box' ) );

		/* Add Save Custom Meta Box Fields */
		add_action( 'save_post', array( $this, 'dnxte_popup_pro_settings_save_details' ), 10, 2 );

		add_action( 'wp_enqueue_scripts', array( $this, 'popup_pro_enqueue_assets' ) );

		add_action( 'admin_enqueue_scripts', array( $this, 'popup_pro_admin_enqueue_assets' ) );

		add_filter( 'et_builder_post_types', array( $this, 'popup_pro_enable_builder' ) );

		add_action( 'do_meta_boxes', array( $this, 'remove_default_custom_fields_meta_box' ), 1, 3 );

		add_action( 'quick_edit_custom_box', array( $this, 'dnxte_popup_pro_custom_edit_box' ), 10, 3 );
		add_filter( 'post_row_actions', array( $this, 'dnxte_popup_pro_preview_link' ), 10, 2 );
		add_action( 'admin_print_footer_scripts-edit.php', array( $this, 'dnxte_popup_quick_edit_js' ) );
		add_action( 'admin_init', array( $this, 'dnxte_change_active_func' ) );

		add_action( 'wp_footer', array( $this, 'popup_pro_print_markup' ) );

		add_filter( 'et_builder_load_actions', function ( $builder_load_requests ) {
			$builder_load_requests[] = 'popup_pro_print_markup';

			return $builder_load_requests;
		} );

		add_action( 'wp_ajax_get_post_sitearea', [ $this, 'get_post_sitearea' ] );
		add_action( 'wp_ajax_nopriv_get_post_sitearea', [ $this, 'get_post_sitearea' ] );

	}

    // Check if Popup Pro is active then disable Popup Pro Extensio

	public function remove_default_custom_fields_meta_box( $post_type, $context, $post ) {
		remove_meta_box( 'postcustom', 'dnxte_popup', $context );
	}


	public function popup_pro_admin_enqueue_assets() {
		$screen = get_current_screen();
		if ( $screen->post_type !== 'dnxte_popup' ) {
			return;
		}
		wp_enqueue_style( 'popup-pro-style', DIVI_ESSENTIAL_ASSETS . 'admin/css/popup-pro.css', time() );
		wp_register_style( 'popup-pro-wp-color-picker', DIVI_ESSENTIAL_ASSETS . 'admin/css/wp-color-picker.css', array( 'wp-color-picker' ), '1.0.0', 'all' );

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'popup-pro-wp-color-picker' );
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_style( 'popup-pro-date-picker', '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css', null, 'all' );
		wp_enqueue_style( 'popup-pro-timepicker', '//cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.css', null, 'all' );
		
		wp_enqueue_style( 'popup-pro-select2', DIVI_ESSENTIAL_ASSETS . 'admin/css/select2.min.css', time() );
		wp_enqueue_style( 'popup-pro-select2-bootstrap', DIVI_ESSENTIAL_ASSETS . 'admin/css/select2-bootstrap.min.css', time() );

		wp_enqueue_style( 'wp-color-picker' );

		wp_enqueue_style( 'popup-pro-wp-color-picker' );


		wp_register_script( 'popup-pro-wp-color-picker', DIVI_ESSENTIAL_ASSETS . 'admin/js/cs-wp-color-picker.min.js', array(
			'jquery',
			'wp-color-picker'
		), '1.0.0', true );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'popup-pro-wp-color-picker' );
		wp_enqueue_script( 'popup-pro-select2-js', DIVI_ESSENTIAL_ASSETS . 'admin/js/select2.full.min.js', array( 'jquery' ), time(), true );
		wp_enqueue_script( 'popup-pro-datetimepicker-js', '//code.jquery.com/ui/1.11.0/jquery-ui.min.js', array( 'jquery', 'jquery-ui-datepicker' ), time(), true );
		wp_enqueue_script( 'popup-pro-timepicker-addon-js', '//cdnjs.cloudflare.com/ajax/libs/jquery-ui-timepicker-addon/1.6.3/jquery-ui-timepicker-addon.min.js', array( 'jquery', 'jquery-ui-datepicker' ), time(), true );
		wp_enqueue_script( 'popup-pro-backend-js', DIVI_ESSENTIAL_ASSETS . 'admin/js/popup-pro.js', array(
			'jquery',
			'jquery-ui-datepicker',
			'wp-color-picker'
		), time(), true );

	}

	public function popup_pro_enqueue_assets() {
		if ( is_front_page() || is_singular() ) {
			wp_enqueue_style( 'popup-pro-magnific-popup-style', DIVI_ESSENTIAL_ASSETS . 'css/magnific-popup.css', time() );
			wp_enqueue_style( 'popup-pro-animate-css', DIVI_ESSENTIAL_ASSETS . 'css/animate.min.css', time() );
			wp_enqueue_style( 'popup-pro-custom-animate', DIVI_ESSENTIAL_ASSETS . 'css/popupanimation.css', time() );

			wp_enqueue_style( 'popup-pro-hover-style', DIVI_ESSENTIAL_ASSETS . 'css/hover-common.css', time() );
			wp_enqueue_style( 'popup-pro-front-end-style', DIVI_ESSENTIAL_ASSETS . 'css/popup-pro.css', time() );

			wp_enqueue_script( 'popup-pro-magnific-popup', DIVI_ESSENTIAL_ASSETS . 'js/magnific-popup.min.js', array( 'jquery' ), time(), true );
			//wp_enqueue_script('dnext_wow-public');
			//wp_enqueue_script('dnext_wow-activation');
			wp_enqueue_script( 'popup-pro-frontend-js', DIVI_ESSENTIAL_ASSETS . 'js/popup-pro.js', array(
				'jquery',
				'popup-pro-magnific-popup'
			), time(), true );

			wp_localize_script(
				'popup-pro-frontend-js',
				'Dnxte_Essential',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( self::MODULES_NONCE ),
					'action'  => self::MODULES_NONCE,
				)
			);
		}
	}

	public function get_post_sitearea() {
		$popup_nonce = wp_create_nonce( 'dnxte-popup-nonce' );

		$post_q = isset( $_POST['q'] ) || wp_verify_nonce( sanitize_key( $popup_nonce ), 'get_post_sitearea' ) ? sanitize_text_field( wp_unslash( $_POST['q'] ) ) : '';

		if ( $post_q ) {

			$q = stripslashes( $post_q );

		} else {

			return;
		}


		if ( isset( $_POST['json'] ) ) {

			$json = (int) $_POST['json'];

		} else {

			$json = 0;
		}

		$sitearea = isset( $_POST['select_page'] ) || wp_verify_nonce( sanitize_key( $popup_nonce ), 'get_post_sitearea' ) ? sanitize_text_field( wp_unslash( $_POST['select_page'] ) ) : '';

		if ( $sitearea === 'sitewide' ) {
			$post_types = get_post_types( array( 'public' => true ) );
		} else {
			$post_types = array( $sitearea );
		}


		$excluded_post_types = array(
			'attachment',
			'revision',
			'nav_menu_item',
			'custom_css',
			'et_pb_layout',
		);

		$post_types = array_diff( $post_types, $excluded_post_types );

		$posts = array();

		$total_count = 0;

		$args = array(
			's'              => $q,
			'post_type'      => $post_types,
			'search_columns' => ['post_title'],
			'cache_results'  => false,
			'posts_per_page' => 15,
			'orderby'        => 'id',
			'order'          => 'DESC'
		);

		$query = new \WP_Query( $args );

		$get_posts = $query->get_posts();

		$posts = array_merge( $posts, $get_posts );

		$total_count = (int) $query->found_posts;

		$posts = $this->dnxte_keyslower( $posts );

		if ( $json ) {

			header( 'Content-type: application/json' );
			$data = array(
				'total_count' => $total_count,
				'items'       => $posts

			);

			die( wp_json_encode( $data ) );
		}

		return $posts;
	}

	public function dnxte_keyslower( &$obj ) {
		$type = (int) is_object( $obj ) - (int) is_array( $obj );
		if ( $type === 0 ) {
			return $obj;
		}
		foreach ( $obj as $key => &$val ) {
			$element = $this->dnxte_keyslower( $val );
			switch ( $type ) {
				case 1:
					if ( ! is_int( $key ) && $key !== ( $keyLowercase = strtolower( $key ) ) ) {
						unset( $obj->{$key} );
						$key = $keyLowercase;
					}
					$obj->{$key} = $element;
					break;
				case - 1:
					if ( ! is_int( $key ) && $key !== ( $keyLowercase = strtolower( $key ) ) ) {
						unset( $obj[ $key ] );
						$key = $keyLowercase;
					}
					$obj[ $key ] = $element;
					break;
			}
		}

		return $obj;
	}


	public function register_dnexte_popup() {
		$labels = array(
			"name"               => __( "Popup", "dnxte-divi-essential" ),
			"singular_name"      => __( "Popup", "dnxte-divi-essential" ),
			'add_new'            => __( 'Add New', 'dnxte-divi-essential' ),
			'add_new_item'       => __( 'Add New', 'dnxte-divi-essential' ),
			'edit_item'          => __( 'Edit Popup', 'dnxte-divi-essential' ),
			'new_item'           => __( 'New Popup', 'dnxte-divi-essential' ),
			'view_item'          => __( 'View Popup', 'dnxte-divi-essential' ),
			'search_items'       => __( 'Search Popup', 'dnxte-divi-essential' ),
			'not_found'          => __( 'No Popup Found', 'dnxte-divi-essential' ),
			'not_found_in_trash' => __( 'No Popup found in Trash', 'dnxte-divi-essential' ),
			'parent_item_colon'  => __( 'Parent Popup:', 'dnxte-divi-essential' ),
			'menu_name'          => __( 'Popup Pro', 'dnxte-divi-essential' ),
		);

		$args = array(
			"label"               => __( "Popup Pro", "dnxte-divi-essential" ),
			"labels"              => $labels,
			"description"         => "",
			"hierarchical"        => false,
			"supports"            => array( "title", 'editor', "author" ),
			"public"              => true,
			"show_ui"             => true,
			"show_in_menu"        => true,
			"menu_position"       => 200,
			"menu_icon"           => self::popup_icon,
			"show_in_nav_menus"   => true,
			"exclude_from_search" => true,
			"has_archive"         => false,
			"query_var"           => true,
			'can_export'          => true,
			//"rewrite"           => true,
			"capability_type"     => "post",
			'show_in_rest'        => false,
		);

		register_post_type( "dnxte_popup", $args );
		flush_rewrite_rules();
	}

	public function my_edit_dnxte_popup_columns( $columns ) {
		$columns = array(
			'cb'                 => '<input type="checkbox" />',
			'title'              => __( 'Title' ),
			'unique_indentifier' => __( 'CSS ID' ),
			'active_status'      => __( 'Status' ),
			'triggering_setting' => __( 'Trigger Mode' ),
			'author'             => __( 'Author' ),
			'date'               => __( 'Date' )
		);

		return $columns;
	}

	public function my_manage_dnxte_popup_columns( $columns, $post_id ) {
		global $post;

		switch ( $columns ) {
			/* If displaying the 'unique-indentifier' column. */
			case 'unique_indentifier'   :
				/* Get the post meta. */
				$post_slug = "popup_$post->ID";
				echo esc_html( $post_slug );
				break;
			case 'active_status' :
				/* Get the post meta. */
				$dnxte_popup_active = get_post_meta(
					$post->ID, 'dnxte_popup-active', true
				);
				if ( empty( $dnxte_popup_active ) ) {
					$dnxte_popup_active = 'true';
				}
				if ( $dnxte_popup_active == 'true' ) {
					echo '<span class="active">Active</span>';
				} else {
					echo '<span class="inactive">Inactive</span>';
				}
				break;
			case 'triggering_setting' :
				$dnxteppro_sub_setting_name_selected = get_post_meta(
					$post->ID, 'dnxteppro_sub_triggering_settings', true
				);
				if ( $dnxteppro_sub_setting_name_selected ):
					$dnxteppro_sub_setting_options = array(
						'trigger_on_none'       => esc_html__( 'Click', 'dnxte-divi-essential' ),
						'trigger_on_load'       => esc_html__( 'On Load', 'dnxte-divi-essential' ),
						'trigger_on_scroll'     => esc_html__( 'On Scroll', 'dnxte-divi-essential' ),
						'trigger_on_exit'       => esc_html__( 'On Exit', 'dnxte-divi-essential' ),
						'trigger_on_inactivity' => esc_html__( 'On Inactivity', 'dnxte-divi-essential' ),
					);
					echo sprintf(
						'<span class="%1$s">%2$s</span>',
						esc_attr( $dnxteppro_sub_setting_name_selected ),
						esc_html( $dnxteppro_sub_setting_options[ $dnxteppro_sub_setting_name_selected ] )
					);
					break;
				endif;
		}
	}

	public function dnxte_popup_pro_custom_edit_box( $column_name, $post_type ) {
		global $post;
		switch ( $post_type ) {
			case 'dnxte_popup':
				if ( $column_name === 'active_status' ) : ?>

					<fieldset class="inline-edit-col-left" id="#edit-">
						<div class="inline-edit-col">
							<label class="alignleft">
								<input type="checkbox" name="dnxte_popup-active-checkbox">
								<span
									class="checkbox-title"><?php esc_html_e( 'Active', 'dnxte-divi-essential' ) ?></span>
							</label>
						</div>
					</fieldset>
				<?php
				endif;

				break;

			default:
				break;
		}
	}

	// Column Management Activate/Deactive
	public function dnxte_popup_pro_preview_link( $actions, $post ) {
		if ( $post->post_type === 'dnxte_popup' ) {
			$dnxte_popup_pro_active = get_post_meta(
				$post->ID, 'dnxte_popup-active', true
			);

			if ( empty( $dnxte_popup_pro_active ) ) {
				$dnxte_popup_pro_active = 'true';
			}

			$url = add_query_arg(
				array(
					'post_id'            => $post->ID,
					'dnxte_popup_action' => $dnxte_popup_pro_active,
					'dnxte_popup_nonce'  => wp_create_nonce( 'dnxte_popup_pro_nonce' )
				)
			);

			$actions['active_status'] = sprintf(
				'<a href="%1$s" target="_self">%2$s</a>',
				esc_url( $url ),
				$dnxte_popup_pro_active == 'true' ? 'Deactivate' : 'Activate'
			);
		}

		return $actions;
	}


	public function dnxte_change_active_func( $post_id ) {

		$nonce   = isset( $_REQUEST['dnxte_popup_nonce'] ) ? sanitize_text_field( $_REQUEST['dnxte_popup_nonce'] ) : '';
		$action  = isset( $_REQUEST['dnxte_popup_action'] ) ? sanitize_text_field( $_REQUEST['dnxte_popup_action'] ) : '';
		$post_id = isset( $_REQUEST['post_id'] ) || wp_verify_nonce( sanitize_key( $nonce ), $action ) ? sanitize_text_field( $_REQUEST['post_id'] ) : '';

		update_post_meta(
			$post_id,
			'dnxte_popup-active',
			sanitize_text_field( $action ) === 'true' ? 'false' : 'true'
		);


		return;
	}

	public function dnxte_popup_quick_edit_js() {

		$current_screen = get_current_screen();

		if ( $current_screen->id != 'edit-dnxte_popup' || $current_screen->post_type !== 'dnxte_popup' ) {
			return;
		}

		wp_enqueue_script( 'jquery' );
		?>
		<!-- add JS script -->
		<script type="text/javascript">
            jQuery(function ($) {

                var $dnxte_popup_inline_editor = inlineEditPost.edit;

                inlineEditPost.edit = function (id) {

                    $dnxte_popup_inline_editor.apply(this, arguments);
                    // get the post ID
                    var $post_id = 0;
                    if (typeof (id) == 'object') {
                        $post_id = parseInt(this.getId(id));

                    }

                    // if we have our post
                    if ($post_id != 0) {

                        // define the edit row
                        var $edit_row = $('#edit-' + $post_id);
                        var $post_row = $('#post-' + $post_id);

                        // get the data
                        var $active_status = $('.column-active_status span', $post_row).text();
                        // populate the data
                        if ($active_status === "Active") {

                            $(':input[name="dnxte_popup-active-checkbox"]', $edit_row).prop('checked', true);
                            $(':input[name="dnxte_popup-active-checkbox"]', $edit_row).val("true")
                        } else {
                            $(':input[name="dnxte_popup-active-checkbox"]', $edit_row).val("false")
                        }
                        $(':input[name="dnxte_popup-active-checkbox"]', $edit_row).change(
                            function () {
                                if ($(this).is(':checked')) {
                                    $(this).val("true")
                                } else {
                                    $(this).val("false")
                                }
                            });
                    }
                }

            });
		</script>
		<?php
	}

	/**
	 * Adds meta boxes to appropriate WordPress screens.
	 *
	 * @return void
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function dnxte_popup_meta_box() {

		$screen = get_current_screen();

		if ( $screen->post_type == 'dnxte_popup' ) {
			add_meta_box(
				'dnxte-popup-custom-meta_box',/* The id of our meta box. */
				esc_html__( 'Popup Pro Settings', 'dnxte-divi-essential' ),/* The title of our meta box. */
				array( $this, 'dnxte_popup_pro_metabox_fields' ),/* The callback function that renders the metabox. */
				'dnxte_popup' /* The screen on which to show the box. */
			);
		}
	}

	/**
	 * Renders the Meta Box and its fields.
	 *
	 * @param WP_Post $post The post object.
	 *
	 * @return void
	 * @since 1.0.0
	 * @access public
	 *
	 */

	public function dnxte_popup_pro_metabox_fields( $post ) {

		$screen = get_current_screen();
		wp_nonce_field( 'dnxte-popup-pro', 'dnxte-popup-pro-meta-box-nonce' );
		include_once( 'popup-pro/popup-pro-meta-box.php' );
	}

	public function popup_pro_enable_builder( $post_types ) {
		$post_types[] = 'dnxte_popup';

		return $post_types;
	}

	public static function handle_post_meta( $request, $post_id, $meta_key ) {
		if ( isset( $request[ $meta_key ] ) ) {
			update_post_meta(
				$post_id,
				$meta_key,
				sanitize_text_field( $request[ $meta_key ] )
			);
		} else {
			delete_post_meta( $post_id, $meta_key );
		}

	}

	/**
	 * Called when this metabox is saved.
	 *
	 * Saves the new meta values of our metabox.
	 *
	 * @param int $post_id The post ID.
	 *
	 * @return int The post ID.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function dnxte_popup_pro_settings_save_details( $post_id, $post ) {
		$nonce = isset( $_POST['dnxte-popup-pro-meta-box-nonce'] ) ? sanitize_text_field( $_POST['dnxte-popup-pro-meta-box-nonce'] ) : '';

		/**
		 * Check if nonce is not set
		 */
		if ( $nonce == '' ) {
			return $post_id;
		}
		/**
		 * Verify that the request came from our screen with the proper authorization
		 */
		if ( ! wp_verify_nonce( $nonce, 'dnxte-popup-pro' ) ) {
			return $post_id;
		}

		global $pagenow;
		if ( 'post.php' != $pagenow ) {
			return $post_id;
		}

		if ( 'dnxte_popup' !== get_post_type() ) {
			return $post_id;
		}

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}


		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup-active' );
		/* Triggering settings */
		self::handle_post_meta( $_POST, $post_id, 'dnxteppro_sub_triggering_settings' );
		/* -- Triggering settings -> Manual */
		self::handle_post_meta( $_POST, $post_id, 'trigger_manual-custom_css_selector' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_remove_link' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_close_overlay_click' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_clickable_under_overlay' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_hide_popup_slug_url' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_prevent_page_scrolling' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_manual_custom_css_selector' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_closing_css_selector' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_close_clicking_back_button' );
		self::handle_post_meta( $_POST, $post_id, 'trigger_on_load-delay-start' );
		self::handle_post_meta( $_POST, $post_id, 'trigger_on_load-delay-end' );
		self::handle_post_meta( $_POST, $post_id, 'trigger_autotrigger-periodicity' );
		self::handle_post_meta( $_POST, $post_id, 'trigger_autotrigger-periodicity-hours' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_overlay_bg_color' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_overlay_zindex' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_color' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_bg_color' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_icon_size' );
		self::handle_post_meta( $_POST, $post_id, 'open_animation_name' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_pp_enable_overlay_blur' );
		self::handle_post_meta( $_POST, $post_id, 'closing_animation_name' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_place_name' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_layout' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_custom_hide_close_btn' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_custom_close_btn_outside' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_pop_up_pro_close_btn_position' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_top_padding' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_bottom_padding' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_left_padding' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_right_padding' );

		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_top_margin' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_bottom_margin' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_left_margin' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_right_margin' );

		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_top_left_border_radius' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_top_right_border_radius' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_bottom_right_border_radius' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_popup_pro_close_btn_bottom_left_border_radius' );

		self::handle_post_meta( $_POST, $post_id, 'dnxte_limitation_user_roles_all' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_limitation_user_roles_guest' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_auto_trigger_activity' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_auto_trigger_activity_certain_perion_from' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_auto_trigger_activity_certain_perion_to' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_trigger_auto_resp_disable_phone' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_trigger_auto_resp_disable_tablet' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_trigger_auto_resp_disable_desktop' );

		self::handle_post_meta( $_POST, $post_id, 'dnxte_trigger_on_scroll_offset' );
		self::handle_post_meta( $_POST, $post_id, 'dnxte_trigger_on_scroll_offset_units' );

		self::handle_post_meta( $_POST, $post_id, 'dnxte_trigger_on_inactivity_delay' );

		self::handle_post_meta( $_POST, $post_id, 'dnxte_sub_set_sitearea_settings' );

		global $wp_roles;
		if ( ! isset( $dnxte_roles ) ) {
			$dnxte_roles = new \WP_Roles();
		}

		foreach ( $dnxte_roles->role_names as $wp_role_key => $wp_role_value ) {
			self::handle_post_meta( $_POST, $post_id, "dnxte_limitation_user_roles_$wp_role_key" );
		}

		$_post_type = isset( $_POST['dnxte_sub_set_sitearea_settings'] ) ? sanitize_text_field( $_POST['dnxte_sub_set_sitearea_settings'] ) : '';
		$taxonomies = get_object_taxonomies( $_post_type, 'object' );


		foreach ( $taxonomies as $key => $taxonomy ) {
			if ( ! $taxonomy->public ) {
				continue;
			}
			if ( $key == 'post_format' ) {
				continue;
			}
			$terms         = get_terms( $key, array( 'hide_empty' => false ) );
			$all_term_name = "display_site_area_all_" . $key;
			if ( isset( $_POST[ $all_term_name ] ) ) {
				update_post_meta(
					$post_id,
					$all_term_name,
					sanitize_text_field( $_POST[ $all_term_name ] )
				);
			} else {
				delete_post_meta( $post_id, $all_term_name );
			}
			foreach ( $terms as $term ) {
				$term_name  = "dnxte_display_site_area_$key-$term->slug";
				$term_value = isset( $_POST[ $term_name ] ) ? sanitize_text_field( $_POST[ $term_name ] ) : '';
				if ( isset( $term_value ) ) {
					update_post_meta(
						$post_id, $term_name,
						sanitize_text_field( $term_value )
					);
				} else {
					delete_post_meta( $post_id, $term_name );
				}
			}
		}

		if ( isset( $_POST['dnxte_config_display'] ) ) {
			update_post_meta(
				$post_id,
				'dnxte_config_display',
				wp_json_encode( rest_sanitize_array( $_POST['dnxte_config_display'] ) ) // phpcs:ignore
			);
		} else {
			update_post_meta( $post_id, 'dnxte_config_display', '' );
		}

	}

	public function render_library_layout( $post_data ) {
		$divi_library_shortcode = do_shortcode( $post_data->post_content );
		$this->popup_pro_styles( $post_data->ID );

		return $divi_library_shortcode;
	}

	public function popup_pro_print_markup() {
		if ( function_exists( 'et_builder_is_frontend' ) && ! et_builder_is_frontend() ) {
			return;
		}

		global $post;

		$current_post_type = get_post_type( get_the_ID() ); // get the post type from the currently visited post
		$global_post_id    = get_the_ID();

		$args = array(
			'post_type'  => 'dnxte_popup',
			'posts_per_page'   => -1,
			'post_status' => 'publish',
			'meta_query' => array(
				array(
					'key'     => 'dnxte_popup-active',
					'value'   => 'true',
					'compare' => '='
				)
			)
		);

		$popups = get_posts( $args );

		$dnxte_content         = '';
		$trigger_event         = '';
		$dnxte_custom_selector = '';
		$popup_arr             = array(
			'popup_ids' => []
		);
		$trigger_values = [];
		foreach ( $popups as $popup ) {

			$post_id                             = $popup->ID;
			$dnxteppro_sub_setting_name_selected = get_post_meta(
				$post_id, 'dnxteppro_sub_triggering_settings', true
			);
			//                echo $post_id.$dnxteppro_sub_setting_name_selected;
			$status                            = get_post_meta( $post_id, 'dnxte_popup-active' )[0];
			$opening_animation                 = $this->get_post_meta_content( $post_id, 'open_animation_name' );
			$closing_animation                 = $this->get_post_meta_content( $post_id, 'closing_animation_name' );
			$close_btn_position                = $this->get_post_meta_content( $post_id, 'dnxte_pop_up_pro_close_btn_position' );
			$popup_position                    = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_place_name' );
			$dnxte_limitation_user_roles_all   = $this->get_post_meta_content( $post_id, 'dnxte_limitation_user_roles_all' );
			$dnxte_limitation_user_roles_guest = $this->get_post_meta_content( $post_id, 'dnxte_limitation_user_roles_guest' );
			$dnxte_custom_hide_close_btn       = $this->get_post_meta_content( $post_id, 'dnxte_custom_hide_close_btn' );
			$dnxte_custom_close_btn_outside    = $this->get_post_meta_content( $post_id, 'dnxte_custom_close_btn_outside' );
			$dnxte_pp_enable_overlay_blur      = $this->get_post_meta_content( $post_id, 'dnxte_pp_enable_overlay_blur' );
			$dnxte_close_overlay_click         = $this->get_post_meta_content( $post_id, 'dnxte_close_overlay_click' );
			$dnxte_remove_link                 = $this->get_post_meta_content( $post_id, 'dnxte_remove_link' );
			$dnxte_closing_css_selector        = $this->get_post_meta_content( $post_id, 'dnxte_closing_css_selector' );
			$dnxte_close_clicking_back_button  = $this->get_post_meta_content( $post_id, 'dnxte_close_clicking_back_button' );
			$dnxte_clickable_under_overlay     = $this->get_post_meta_content( $post_id, 'dnxte_clickable_under_overlay' );
			$dnxte_prevent_page_scrolling      = $this->get_post_meta_content( $post_id, 'dnxte_prevent_page_scrolling' );
			$dnxte_disable_phone               = $this->get_post_meta_content( $post_id, 'dnxte_trigger_auto_resp_disable_phone' );
			$dnxte_disable_tablet              = $this->get_post_meta_content( $post_id, 'dnxte_trigger_auto_resp_disable_tablet' );
			$dnxte_disable_desktop             = $this->get_post_meta_content( $post_id, 'dnxte_trigger_auto_resp_disable_desktop' );


			// Trigger Event
			$trigger_event = $this->get_post_meta_content( $post_id, 'dnxteppro_sub_triggering_settings' );

			$trigger_delay_start = 'trigger_on_load' === $trigger_event ? $this->get_post_meta_content( $post_id, 'trigger_on_load-delay-start' ) : '';
			$trigger_delay_end   = 'trigger_on_load' === $trigger_event ? $this->get_post_meta_content( $post_id, 'trigger_on_load-delay-end' ) : '';

			$clickable_under_overlay = "true" === $dnxte_clickable_under_overlay ? "dnxte-clickable-under-overlay" : "";


			$popup_data = array(
				'opening_animation'          => esc_attr( $opening_animation ),
				'closing_animation'          => esc_attr( $closing_animation ),
				'close_btn_position'         => esc_attr( $close_btn_position ),
				'trigger_event'              => esc_attr( $trigger_event ),
				'trigger_delay_start'        => esc_attr( $trigger_delay_start ),
				'trigger_delay_end'          => esc_attr( $trigger_delay_end ),
				'hide_close_button'          => esc_attr( $dnxte_custom_hide_close_btn ),
				'close_btn_outside'          => esc_attr( $dnxte_custom_close_btn_outside ),
				'close_overlay_click'        => esc_attr( $dnxte_close_overlay_click ),
				'remove_link'                => esc_attr( $dnxte_remove_link ),
				'closing_css_selector'       => esc_attr( $dnxte_closing_css_selector ),
				'close_clicking_back_button' => esc_attr( $dnxte_close_clicking_back_button ),
				'prevent_page_scrolling'     => esc_attr( $dnxte_prevent_page_scrolling ),
				'clickable_under_overlay'    => esc_attr( $clickable_under_overlay ),
				'dnxte_disable_tablet'       => esc_attr( $dnxte_disable_tablet ),
				'dnxte_disable_desktop'      => esc_attr( $dnxte_disable_desktop ),
				'dnxte_disable_phone'        => esc_attr( $dnxte_disable_phone ),
			);

			$popup_data_json = wp_json_encode( $popup_data );

			$current_user_role = 'guest';
			$frontend_display  = false;

			if ( is_user_logged_in() ) {
				$current_user      = wp_get_current_user();
				$current_user_role = $current_user->roles[0];
			}
			$dnxte_limitation_user_roles_all = get_post_meta( $post_id, 'dnxte_limitation_user_roles_all', true );

			if ( $dnxte_limitation_user_roles_all === 'on' ) {
				$frontend_display = true;
			} else if ( get_post_meta( $post_id, "dnxte_limitation_user_roles_$current_user_role", true ) === 'on' ) {
				$frontend_display = true;
			}

			// Site Area start -------------------------------
			if ( $frontend_display ) {

				$dnxte_config_display = get_post_meta( $post_id, 'dnxte_config_display', true );
				$condition_data       = json_decode( $dnxte_config_display );

				$includes = [];
				$excludes = [];
				if ( $condition_data ) {
					foreach ( $condition_data as $condition ) {
						if ( $condition->display_condition == 'include' ) {
							$includes[] = $condition->display_config_post_type;
							if ( isset( $condition->dnxte_display_page ) ) {
								$includes[ $condition->display_config_post_type ] = array_filter( $condition->dnxte_display_page, function ( $value ) {
									return ! is_null( $value ) && $value !== '';
								} );
							}
						} elseif ( $condition->display_condition == 'exclude' ) {
							$excludes[] = $condition->display_config_post_type;
							if ( isset( $condition->dnxte_display_page ) ) {
								$excludes[ $condition->display_config_post_type ] = array_filter( $condition->dnxte_display_page, function ( $value ) {
									return ! is_null( $value ) && $value !== '';
								} );
							}
						}
					}

					$sitewide = in_array( 'sitewide', $includes );

					if ( ! $sitewide ) { // include not sitewide
						$exits_post_type = in_array( $current_post_type, $includes ); // current post type is include or not
						if ( $exits_post_type ) { // if post type exits in include then enter condition
							if ( count( $includes[ $current_post_type ] ) ) {
								$post_id_exits = in_array( $global_post_id, $includes[ $current_post_type ] );
							} else {
								$post_id_exits = true; // Means all tag selected in dropdown
							}
							if ( $post_id_exits ) {  // if post id match with include
								$exits_post_type_exclude = in_array( $current_post_type, $excludes ); // post type exclude
								if ( $exits_post_type_exclude && count($excludes) > 1 ) { // if post type exclude then it will disclude
									$exclude_post_exits = in_array( $global_post_id, $excludes[ $current_post_type ] );
									if ( $exclude_post_exits || !count($excludes[ $current_post_type ])) {
										$frontend_display = false;
									} else {
										$frontend_display = true;
									}
								} else { // Other the will show
									$frontend_display = true;
								}
							} else {
								$frontend_display = false;
							}
						} else {
							$frontend_display = false;
						}
					} else {
						$exits_post_type_exclude = in_array( $current_post_type, $excludes ); // post type exclude
						if ( $exits_post_type_exclude && count($excludes) > 1) { // if post type exclude then it will disclude
							$exclude_post_exits = in_array( $global_post_id, $excludes[ $current_post_type ] );
							if ( $exclude_post_exits || !count($excludes[ $current_post_type ])) {
								$frontend_display = false;
							} else {
								$frontend_display = true;
							}
						} else { // Other the will show
							$frontend_display = true;
						}
					}
				}
			}
			// Site area end --------------------------------

			// Activity start -- Convert metabox to json to access from js files
			$dnxte_auto_trigger_activity = get_post_meta(
				$post_id, 'dnxte_auto_trigger_activity', true
			);
			if ( empty( $dnxte_auto_trigger_activity ) ) {
				$dnxte_auto_trigger_activity = 'always';
			}
			$dnxte_activity_from = get_post_meta(
				$post_id, 'dnxte_auto_trigger_activity_certain_perion_from', true
			);
			$dnxte_activity_to   = get_post_meta(
				$post_id, 'dnxte_auto_trigger_activity_certain_perion_to', true
			);

			$today           = gmdate( 'Y-m-d', time() );
			$activity_status = false;
			if ( 'always' != $dnxte_auto_trigger_activity && ( $today >= gmdate( 'Y-m-d', strtotime( $dnxte_activity_from ) ) ) && ( $today <= gmdate( 'Y-m-d', strtotime( $dnxte_activity_to ) ) ) ) {
				$activity_status = true;
			} else if ( 'always' == $dnxte_auto_trigger_activity ) {
				$activity_status = true;
			}
			// End of activity functionality . Output $activity_status = true means popup will be shown
			/* periodicity functionality working start */

			$popup_show = true;
			if ( $activity_status ) // If activity status is enabled
			{
				if ( isset( $_COOKIE[ "dxnteHours" . $post_id ] ) ):
					$popup_show = false;
				else:
					$popup_show = true;
				endif;
			} else {  // If activity status is disabled
				$popup_show = false;
			}

			/** @var  $trigger_autotrigger_periodicity */
			$trigger_autotrigger_periodicity = get_post_meta(
				$post_id, 'trigger_autotrigger-periodicity', true
			);

			$trigger_autotrigger_periodicity_hours = get_post_meta(
				$post_id, 'trigger_autotrigger-periodicity-hours', true
			);

			if ( empty( $trigger_autotrigger_periodicity ) ) {
				$trigger_autotrigger_periodicity = 'every_time';
			}

			if ( 'every_time' == $trigger_autotrigger_periodicity ) {
				$trigger_autotrigger_periodicity_hours = 0;
			}

			if ( $trigger_autotrigger_periodicity === 'once_only' ) {
				$trigger_autotrigger_periodicity_hours = 24 * 365;
			}

			if ( isset( $_COOKIE[ "dxnteHours" . $post_id ] ) && 'every_time' != $trigger_autotrigger_periodicity ) {
				$popup_show = false;
			};

			$dnxte_custom_selector = get_post_meta(
				$post_id, 'dnxte_manual_custom_css_selector', true
			);

			$dnxte_popup_layout = get_post_meta(
				$post_id, 'dnxte_popup_layout', true
			);

			$css_class = $css_id = '';
			if ( strpos( $dnxte_custom_selector, '.' ) === 0 ) {
				$css_class = substr( $dnxte_custom_selector, 1 );
			} else if ( strpos( $dnxte_custom_selector, '#' ) === 0 ) {
				$css_id = substr( $dnxte_custom_selector, 1 );
			}

			// periodicity and activity functionality end here
			if ( $status === 'true' && $frontend_display && $popup_show ) { //&& $frontend_display
				if('full_width' == $dnxte_popup_layout)
					$popup_position = '';

				$dnxte_content .= sprintf( '<div id="dnxte_popup_%1$s" data-id="%1$s" class="clr-both dnxte_popups_counting active dnxte_popup_pro_%3$s dnxte_popup_content dnxte_popup_content_%1$s dnxte_popup_pro_position_%5$s dnxte_popup_pro_layout_%8$s" data-popup=%4$s><div id="page-container">%2$s</div></div>',
					esc_attr( $post_id ),
					$this->render_library_layout( $popup ),
					esc_attr( $opening_animation ),
					$popup_data_json,
					esc_attr( $popup_position ), //5
					esc_attr( $css_id ),
					esc_attr( $css_class ),
					esc_attr( $dnxte_popup_layout )

				);

				$popup_arr[ "json_data" . $post_id ]          = $popup_data_json;
				$popup_arr[ "custom_selector" . $post_id ]    = $dnxte_custom_selector;
				$popup_arr["popup_ids"][]                     = $post_id;
				$popup_arr[ "popup_show" . $post_id ]         = $popup_show;
				$popup_arr[ "popup_perodicity" . $post_id ]   = $trigger_autotrigger_periodicity;
				$popup_arr[ "periodicity_cookie" . $post_id ] = (int) $trigger_autotrigger_periodicity_hours * 3600 * 1000; // in miliseconds
			}
			//        scroll offset Start
			$scroll_offset       = get_post_meta(
				$post_id, 'dnxte_trigger_on_scroll_offset', true
			);
			$scroll_offset_units = get_post_meta(
				$post_id, 'dnxte_trigger_on_scroll_offset_units', true
			);
//        Scroll offset End

//            inacvity start
			$inacvity_delays = get_post_meta(
				$post_id, 'dnxte_trigger_on_inactivity_delay', true
			);
//            Inacvity end

			$trigger_values[ $post_id ] = array(
				'onload'                => [],
				'onscroll_offset'       => $scroll_offset,
				'onscroll_offset_units' => $scroll_offset_units,
				'onexit'                => '',
				'oninactivity_delays'   => $inacvity_delays,
			);

		}

		$dnxte_popup_show    = wp_json_encode( $popup_arr );
		$trigger_values_json = wp_json_encode( $trigger_values );

		wp_localize_script( 'popup-pro-frontend-js', 'popup_frontend', array(
			'custom_css_selector' => $dnxte_custom_selector,
			'dnxte_popup_show'    => $dnxte_popup_show,
			'trigger_event'       => $trigger_values_json
		) );

		// Activity End
		print ' <div id="dnxtePopup" style="display: none;clear:both">' . $dnxte_content . '</div>'; // phpcs:ignore


	}

	protected function get_post_meta_content( $post_id, $meta_key ) {
		$overlay_bg_color = get_post_meta( $post_id, $meta_key );
		if ( count( $overlay_bg_color ) > 0 ) {
			return $overlay_bg_color[0];
		}

		return '';
	}

	protected function popup_pro_styles( $post_id ) {
		$overlay_bg_color                         = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_overlay_bg_color' );
		$close_btn_color                          = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_color' );
		$close_btn_bg_color                       = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_bg_color' );
		$close_btn_icon_size                      = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_icon_size' );
		$dnxte_popup_pro_close_btn_top_padding    = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_top_padding' );
		$dnxte_popup_pro_close_btn_bottom_padding = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_bottom_padding' );
		$dnxte_popup_pro_close_btn_left_padding   = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_left_padding' );
		$dnxte_popup_pro_close_btn_right_padding  = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_right_padding' );

		$dnxte_popup_pro_close_btn_top_margin    = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_top_margin' );
		$dnxte_popup_pro_close_btn_bottom_margin = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_bottom_margin' );
		$dnxte_popup_pro_close_btn_left_margin   = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_left_margin' );
		$dnxte_popup_pro_close_btn_right_margin  = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_right_margin' );

		$dnxte_popup_pro_close_btn_top_left_border_radius     = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_top_left_border_radius' );
		$dnxte_popup_pro_close_btn_top_right_border_radius    = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_top_right_border_radius' );
		$dnxte_popup_pro_close_btn_bottom_right_border_radius = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_bottom_right_border_radius' );
		$dnxte_popup_pro_close_btn_bottom_left_border_radius  = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_close_btn_bottom_left_border_radius' );
		$dnxte_pp_enable_overlay_blur                         = $this->get_post_meta_content( $post_id, 'dnxte_pp_enable_overlay_blur' );

		$dnxte_popup_pro_overlay_zindex = $this->get_post_meta_content( $post_id, 'dnxte_popup_pro_overlay_zindex' );
		
		print '<style type="text/css">';
		$style = print sprintf( '.mfp-bg.dnxte_popup_custom_%1$s {
            background-color: %2$s !important;
            z-index: %18$s !important;
            %19$s
        }
        .mfp-wrap.dnxte_popup_custom_%1$s button.mfp-close{
            color: %3$s !important;
            background: %4$s !important;
            font-size: %5$spx !important;
            padding-top: %6$spx !important;
            padding-bottom: %7$spx !important;
            padding-left: %8$spx !important;
            padding-right: %9$spx !important;
            margin-top: %10$spx !important;
            margin-bottom: %11$spx !important;
            margin-left: %12$spx !important;
            margin-right: %13$spx !important;
            border-top-left-radius: %14$s !important;
            border-top-right-radius: %15$s !important;
            border-bottom-right-radius: %16$s !important;
            border-bottom-left-radius: %17$s !important;
        }', esc_attr( $post_id ),
			esc_attr( $overlay_bg_color ),
			esc_attr( $close_btn_color ),
			esc_attr( $close_btn_bg_color ),
			esc_attr( $close_btn_icon_size ),
			esc_attr( $dnxte_popup_pro_close_btn_top_padding ),
			esc_attr( $dnxte_popup_pro_close_btn_bottom_padding ),
			esc_attr( $dnxte_popup_pro_close_btn_left_padding ),
			esc_attr( $dnxte_popup_pro_close_btn_right_padding ),
			esc_attr( $dnxte_popup_pro_close_btn_top_margin ), // 10
			esc_attr( $dnxte_popup_pro_close_btn_bottom_margin ),
			esc_attr( $dnxte_popup_pro_close_btn_left_margin ),
			esc_attr( $dnxte_popup_pro_close_btn_right_margin ),
			esc_attr( $dnxte_popup_pro_close_btn_top_left_border_radius ) . '%',
			esc_attr( $dnxte_popup_pro_close_btn_top_right_border_radius ) . '%',
			esc_attr( $dnxte_popup_pro_close_btn_bottom_right_border_radius ) . '%',
			esc_attr( $dnxte_popup_pro_close_btn_bottom_left_border_radius ) . '%',
			esc_attr( $dnxte_popup_pro_overlay_zindex ),
			esc_html("true") === $dnxte_pp_enable_overlay_blur ? esc_attr("backdrop-filter: blur(1px);") : ""
		);

		print '</style>';
		return $style;
	}

}

if ( class_exists( 'DnxtePopupPro' ) ) {
	new DnxtePopupPro();
}