<?php
/**
 * Plugin Name:       WP Dashboard Cleaner
 * Plugin URI:        http://store.wphound.com/wp-dashboard-cleaner
 * Description:       The Admin can remove unwanted widgets / sections from your WordPress Dashboard
 * Version:           1.0.0
 * Author:            Nilay Patel
 * Author URI:        http://nilaypatel.info
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-dashboard-cleaner
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define("WPDC_DEMO_IMAGE_PATH",plugin_dir_url( __FILE__ ) . 'admin/images/');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-dashboard-cleaner-activator.php
 */
function activate_wp_dashboard_cleaner() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-dashboard-cleaner-activator.php';
	WP_Dashboard_Cleaner_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-dashboard-cleaner-deactivator.php
 */
function deactivate_wp_dashboard_cleaner() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-dashboard-cleaner-deactivator.php';
	WP_Dashboard_Cleaner_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_dashboard_cleaner' );
register_deactivation_hook( __FILE__, 'deactivate_wp_dashboard_cleaner' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-dashboard-cleaner.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_dashboard_cleaner() {

	$plugin = new WP_Dashboard_Cleaner();
	$plugin->run();

}
run_wp_dashboard_cleaner();
