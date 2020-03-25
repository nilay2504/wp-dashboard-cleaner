<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    WP_Dashboard_Cleaner
 * @subpackage WP_Dashboard_Cleaner/includes
 * @author     Nilay Patel <gr8nilay@gmail.com>
 */
class WP_Dashboard_Cleaner_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		update_option('wpdc_activated_on',@date("d-m-Y h:i:s"));
	}

}