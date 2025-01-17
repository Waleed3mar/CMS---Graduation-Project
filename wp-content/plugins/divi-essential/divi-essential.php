<?php
/*
Plugin Name: Divi Essential
Plugin URI:  www.diviessential.com
Description: Unleash the Full Potential of Divi with Divi Essential: 64+ design Modules with 600+ Layouts and 3 Extensions all in one!
Version:     4.9.7
Author:      Divi Next
Author URI:  www.divinext.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: dnxte-divi-essential
Update URI:  https://elegantthemes.com
Domain Path: /languages

Divi Essential is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Divi Essential. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

if (!defined('ABSPATH')) {
    exit;
}


final class Divi_Essential {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '4.9.7';
    private static $instance;

    /**
     * Class construcotr
     */
    private function __construct() {

        $this->define_constants();
        register_activation_hook( __FILE__, array($this, 'activate' ) );
        add_action( 'plugins_loaded', array( $this, 'init_plugin' ) );

    }

    /**
     * Initializes a singleton instance
     *
     * @return \Divi_Essential
     */
    public static function instance() {

        if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Divi_Essential ) ) {
            self::$instance = new Divi_Essential();
            self::$instance->init();
            self::$instance->includes();
        }

        return self::$instance;
    }

    private function init() {
        add_action( 'divi_extensions_init', array( $this, 'initialize_extension' ) );
    }


    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'DIVI_ESSENTIAL_VERSION', self::version );
        define( 'DIVI_ESSENTIAL_FILE', __FILE__ );
        define( 'DIVI_ESSENTIAL_DIR', plugin_dir_path( __FILE__ ) );
        define( 'DIVI_ESSENTIAL_PATH', __DIR__ );
        define( 'DIVI_ESSENTIAL_URL', plugins_url( '', DIVI_ESSENTIAL_FILE ) );
        define( 'DIVI_ESSENTIAL_ASSETS', DIVI_ESSENTIAL_URL . '/assets/' );
        define( 'DIVI_ESSENTIAL_ICON', DIVI_ESSENTIAL_URL . '/includes/modules/' );
		define( 'DIVI_ESSENTIAL_POPUP',DIVI_ESSENTIAL_DIR.'includes/popup-pro');

        /**
         * 
         * 1. required plugin license start
         */
        // this is the URL our updater / license checker pings. This should be the URL of the site with EDD installed
        define('DNEXT_ESSENTIAL_STORE_URL', 'https://www.divinext.com/'); // you should use your own CONSTANT name, and be sure to replace it throughout this file

        // the download ID for the product in Easy Digital Downloads
        define('DNEXT_ESSENTIAL_ITEM_ID', 243636); // you should use your own CONSTANT name, and be sure to replace it throughout this file

        // the name of the product in Easy Digital Downloads
        define('DNEXT_ESSENTIAL_ITEM_NAME', 'Divi Essential'); // you should use your own CONSTANT name, and be sure to replace it throughout this file

        // the name of the settings page for the license input to be displayed
        define('DNEXT_ESSENTIAL_PLUGIN_LICENSE_PAGE', 'divi-next-essential-license');
        /**
         * 
         * 1. the required plugin license end
         */
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {
        new Divi_Essential\Includes\Admin();
        new Divi_Essential\Includes\AssetsManager();

        $visibility_feature = get_option('dnxte_inactive_extensions', array() );
        if( ! in_array( 'popup-pro-extension', $visibility_feature) ){
            new Divi_Essential\Includes\DnxtePopupPro();
        }
    }

    private function includes() {
        
        require_once DIVI_ESSENTIAL_DIR . 'includes/admin.php';
        require_once DIVI_ESSENTIAL_DIR . 'includes/assets-manager.php';
        require_once DIVI_ESSENTIAL_DIR . 'includes/functions.php';
        require_once DIVI_ESSENTIAL_DIR . 'includes/Traits/button-render.php';
        $visibility_feature = get_option('dnxte_inactive_extensions', array() );
        if( ! in_array( 'popup-pro-extension', $visibility_feature) ){
            require_once DIVI_ESSENTIAL_DIR . 'includes/popup-pro.php';
        }

        /**
         * 
         * 2. the required plugin license Plugin_Updater_Class start
         */
        if (!class_exists('DNEXT_Essential_Plugin_Updater_Class')) {
            // load our custom updater
            include DIVI_ESSENTIAL_DIR . '/divi-essential-updater.php';
        }
        
        /**
         * 
         * 2. the required plugin license Plugin_Updater_Class end
         */
    }

    public function initialize_extension() {
        require_once DIVI_ESSENTIAL_DIR . 'includes/DiviEssential.php';
    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installed = get_option( 'divi_essential_installed' );

        if ( ! $installed ) {
            update_option( 'divi_essential_installed', time() );
        }

        $inactive_extensions = get_option('dnxte_inactive_extensions');
        
        if( $inactive_extensions === false ) {
            $inactive_extensions = array(
                'popup-pro-extension'
            );
            update_option('dnxte_inactive_extensions', $inactive_extensions);
        }
       

        update_option( 'divi_essential_version', DIVI_ESSENTIAL_VERSION );
    }
}


/**
 * Initializes the main plugin
 *
 * @return \Divi_Essential
 */
function divi_essential() {
    return Divi_Essential::instance();
}

// Kick--Off the plugin
divi_essential();


