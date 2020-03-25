<?php
/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    WP_Dashboard_Cleaner
 * @subpackage WP_Dashboard_Cleaner/includes
 * @author     Nilay Patel <gr8nilay@gmail.com>
 */
class WP_Dashboard_Cleaner_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		update_option('wpdc_deactivated_on',@date("d-m-Y h:i:s"));
	}

}