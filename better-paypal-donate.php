<?php
/*
Plugin Name: Better PayPal Donate
Plugin URI: https://github.com/caleb531/better-paypal-donate
Description: Better PayPal Donate is a WordPress plugin I created because other PayPal donate plugins were too complicated or feature-lacking for my needs. Features include a fully-customizable widget and shortcode, with all options per-instance rather than global. Available options include email, description, purpose, and default dollar amount (in USD).
Author: Caleb Evans
Author URI: https://calebevans.me/
Version: 0.2.0
License: GNU General Public License v2.0
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

}

$bpd_plugin = new Better_PayPal_Donate_Plugin();
