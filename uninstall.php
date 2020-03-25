<?php
/*
 * since      1.0.0
 *
 * @package    WP_Dashboard_Cleaner
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option('wpdc_activated_on');
delete_option('wpdc_deactivated_on');
delete_option('_wpdc_saved_values');
delete_option('_wpdc_other_saved_values');