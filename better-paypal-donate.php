<?php
/*
Plugin Name: Better PayPal Donate
Plugin URI: https://github.com/caleb531/better-paypal-donate
Description: Better PayPal Donate is a WordPress plugin I created because other PayPal donate plugins were too complicated or feature-lacking for my needs. Features include a fully-customizable widget and shortcode, with all options per-instance rather than global. Available options include email, description, purpose, and default dollar amount (in USD).
Author: Caleb Evans
Author URI: https://calebevans.me/
Version: 0.3.0
License: GNU General Public License v2.0 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// Define constant for plugin directory path
define( 'BPD_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once BPD_PLUGIN_DIR . '/frontend-form.php';
require_once BPD_PLUGIN_DIR . '/widget.php';

/**
 * Class for managing all plugin features (i.e. widget and shortcode)
 */
class Better_PayPal_Donate_Plugin {

	function __construct() {
		add_action( 'widgets_init', array( $this, 'widgets_init' ) );
		add_shortcode( 'donate-button', array( $this, 'do_shortcode' ) );
		add_action( 'init', array( $this, 'init_shortcode_button' ) );
	}

	/**
	 * Initialize/register all plugin widgets
	 */
	public function widgets_init() {
		register_widget( 'Better_PayPal_Donate_Widget' );
	}

	/**
	 * Evaluate the donate button shortcode
	 */
	public function do_shortcode( $args, $content = '' ) {
		ob_start();
		bpd_frontend_form( $args, $content );
		return ob_get_clean();
	}


	/**
	 * Add a toolbar button to the visual editor for inserting the shortcode
	 */
	public function init_shortcode_button() {
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( get_user_option( 'rich_editing' ) !== 'true' ) {
			return;
		}
		add_filter( 'mce_buttons_2', array( $this, 'register_button_name' ) );
		add_filter( 'mce_external_plugins', array( $this, 'register_button_script' ) );
	}

	/**
	 * Register the toolbar button name
	 */
	public function register_button_name( $buttons ) {
	    array_push( $buttons, 'better_paypal_donate' );
	    return $buttons;
	}

	/**
	 * Register the JavaScript for the toolbar button
	 */
	public function register_button_script( $plugins ) {
	    $plugins['better_paypal_donate'] = plugins_url( '/tinymce/button.js', __FILE__ );
	    return $plugins;
	}

}

$bpd_plugin = new Better_PayPal_Donate_Plugin();
