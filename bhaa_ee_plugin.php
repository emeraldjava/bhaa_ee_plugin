<?php
/**
 * @package           bhaa_ee_plugin
 *
 * @wordpress-plugin
 * Plugin Name:       bhaa_ee_plugin
 * Plugin URI:        https://github.com/emeraldjava/bhaa_ee_plugin
 * Description:       A plugin to handle event expresso customisations for the BHAA wordpress site.
 * Version:           2018.06.10
 * Author:            emeraldjava
 * Author URI:        https://github.com/emeraldjava
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bhaa_ee_plugin
 * Domain Path:       /languages
 */

namespace BHAA_EE;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

/**
 * Currently plugin version.
 */
define( 'BHAA_EE_PLUGIN_VERSION', '1.0.0' );
/**
 * The code that runs during plugin activation.
 */
function activate_plugin_name() {
    utils\Activator::activate();
}
/**
 * The code that runs during plugin deactivation.
 */
function deactivate_plugin_name() {
    utils\Deactivator::deactivate();
}
register_activation_hook( __FILE__, '\BHAA_EE\activate_plugin_name' );
register_deactivation_hook( __FILE__, '\BHAA_EE\deactivate_plugin_name' );
/**
 * Begins execution of the plugin.
 */
function run_bhaa_ee_plugin() {
    $plugin = new Main();
    $plugin->run();
}
run_bhaa_ee_plugin();
?>