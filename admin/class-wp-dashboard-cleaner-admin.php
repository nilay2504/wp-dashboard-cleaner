<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WP_Dashboard_Cleaner
 * @subpackage WP_Dashboard_Cleaner/admin
 * @author     Nilay Patel <gr8nilay@gmail.com>
 */
class WP_Dashboard_Cleaner_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wp_dashboard_cleaner    The ID of this plugin.
	 */
	private $wp_dashboard_cleaner;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $wp_dashboard_cleaner       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_dashboard_cleaner, $version ) {

		$this->wp_dashboard_cleaner = $wp_dashboard_cleaner;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Dashboard_Cleaner_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Dashboard_Cleaner_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->wp_dashboard_cleaner, plugin_dir_url( __FILE__ ) . 'css/wp-dashboard-cleaner-admin.css', array(), $this->version, 'all' );
		
	    wp_enqueue_style( 'thickbox' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in WP_Dashboard_Cleaner_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WP_Dashboard_Cleaner_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		 wp_register_script( "wpdc_ajax_data", plugin_dir_url( __FILE__ ) . 'js/wp-dashboard-cleaner-admin.js', array('jquery'), $this->version, false );
   		 wp_localize_script( 'wpdc_ajax_data', 'wpdcAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'wpdcurl' => menu_page_url("wp_dashboard_cleaner_admin_area",false)));   
		 wp_enqueue_script( 'wpdc_ajax_data' );
		 wp_enqueue_script( 'thickbox' );

	}
	
		public function add_admin_menu() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woo_Additional_Fee_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woo_Additional_Fee_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		add_menu_page( 'WP Dashboard Cleaner', 'WP Dashboard Cleaner', 'manage_options', 'wp_dashboard_cleaner_admin_area', 'wp_dashboard_cleaner_admin_area', plugins_url( '/wp-dashboard-cleaner/admin/css/wpdc_icon.jpg' ), 110 ); 
		
		require_once 'partials/wp-dashboard-cleaner-admin-display.php';

	}
	
	
	public function save_wpdc_form_data(){
		
		/**
		 * This function is used to save submitted settings data
		 */

		if ( !wp_verify_nonce( $_REQUEST['wpdc_nonce'], "save_wpdc_value")) {
		  exit("You are not authorize to stay here.");
		} 
		
		update_option('_wpdc_saved_values',$_REQUEST);
	}
	
	public function save_wpdc_form_other_data(){
		
		/**
		 * This function is used to save submitted settings data
		 */

		if ( !wp_verify_nonce( $_REQUEST['wpdc_nonce_other'], "save_wpdc_other_value")) {
		  exit("You are not authorize to stay here.");
		} 
		
		update_option('_wpdc_other_saved_values',$_REQUEST);
	}
	
	
	
	public function wpdc_force_login(){
	  echo "Only admin user can save the data";
	  die();	
	
	}
		
	public function wpdc_remove_dashboard_widgets(){
		
		if(is_admin()){
			$wpdc_option_values = get_option('_wpdc_saved_values');
			$wpdc_option_values_other = get_option('_wpdc_other_saved_values');
			
			global $wp_meta_boxes;

	
		//	remove_meta_box( '', 'dashboard', 'side' );
			
			
			if($wpdc_option_values['_wpdc_atglance'] == 1){
				unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
				remove_meta_box( 'dashboard_right_now', 'dashboard', 'side' );
			}
			
			if($wpdc_option_values['_wpdc_activity'] == 1){
				unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
			    remove_meta_box( 'dashboard_activity', 'dashboard', 'side' );
			}
			
			if($wpdc_option_values['_wpdc_event_news'] == 1){
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
				remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
			}
			
			if($wpdc_option_values['_wpdc_quick_draft'] == 1){
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
				remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
			}
			
			
			if($wpdc_option_values_other){
					
				if($wpdc_option_values_other['_wpdc_yoastseo'] == 1){
					unset($wp_meta_boxes['dashboard']['side']['core']['wpseo-dashboard-overview']);
					remove_meta_box( 'wpseo-dashboard-overview', 'dashboard', 'side' );
				}
				
				if($wpdc_option_values_other['_wpdc_gforms'] == 1){
					unset($wp_meta_boxes['dashboard']['side']['core']['rg_forms_dashboard']);
					remove_meta_box( 'rg_forms_dashboard', 'dashboard', 'side' );
				}
				
				if($wpdc_option_values_other['_wpdc_wordfence'] == 1){
					unset($wp_meta_boxes['dashboard']['side']['core']['wordfence_activity_report_widget']);
					remove_meta_box( 'wordfence_activity_report_widget', 'dashboard', 'side' );
				}
				
				if($wpdc_option_values_other['_wpdc_borkenlinkchecker'] == 1){
					unset($wp_meta_boxes['dashboard']['normal']['core']['blc_dashboard_widget']);
					remove_meta_box( 'blc_dashboard_widget', 'dashboard', 'side' );
				}
				
				if($wpdc_option_values_other['_wpdc_woostatus'] == 1){
					unset($wp_meta_boxes['dashboard']['normal']['core']['woocommerce_dashboard_status']);
					remove_meta_box( 'woocommerce_dashboard_status', 'dashboard', 'side' );
				}
				
				if($wpdc_option_values_other['_wpdc_woorevies'] == 1){
					unset($wp_meta_boxes['dashboard']['normal']['core']['woocommerce_dashboard_recent_reviews']);
					remove_meta_box( 'woocommerce_dashboard_recent_reviews', 'dashboard', 'side' );
				}	
				
						
			}
			
		}
		
	}

}


function wpdc_checkOptionValue($wpdc_option){
	
	$wpdc_option_values = get_option('_wpdc_saved_values');
	if (@array_key_exists($wpdc_option,$wpdc_option_values)){
		$option_value = $wpdc_option_values[$wpdc_option];	
		if($option_value){
			echo __('checked="checked"','wpdc');	
		}
	}
}

function wpdc_checkOptionValueOther($wpdc_option_other){
	
	$wpdc_option_values_other = get_option('_wpdc_other_saved_values');
	if (@array_key_exists($wpdc_option_other,$wpdc_option_values_other)){
		$option_value_other = $wpdc_option_values_other[$wpdc_option_other];	
		if($option_value_other){
			echo __('checked="checked"','wpdc');	
		}
	}
}