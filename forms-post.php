<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by KCMS to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/kubeecms/forms-post/
 * @since             1.0
 * @package           forms-post
 *
 * @wordpress-plugin
 * Plugin Name: Forms Post
 * Plugin URI: https://github.com/KubeeCMS/Forms-Post
 * Description: Allows you to create new posts through Forms.
 * Version: 1.0
 * Author: Kubee CMS
 * Author URI: https://github.com/KubeeCMS/
 * License: GNU GENERAL PUBLIC LICENSE
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       gravityformsadvancedpostcreation
 * Domain Path:       /languages
 */


defined( 'ABSPATH' ) || die();

define( 'GF_ADVANCEDPOSTCREATION_VERSION', '1.0-beta-5' );

// If Gravity Forms is loaded, bootstrap the Advanced Post Creation Add-On.
add_action( 'gform_loaded', array( 'GF_PostCreation_Bootstrap', 'load' ), 5 );

/**
 * Class GF_PostCreation_Bootstrap
 *
 * Handles the loading of the Advanced Post Creation Add-On and registers with the Add-On framework.
 */
class GF_PostCreation_Bootstrap {

	/**
	 * If the Feed Add-On Framework exists, Advanced Post Creation Add-On is loaded.
	 *
	 * @access public
	 * @static
	 */
	public static function load() {

		if ( ! method_exists( 'GFForms', 'include_feed_addon_framework' ) ) {
			return;
		}

		require_once( 'class-gf-advancedpostcreation.php' );

		GFAddOn::register( 'GF_Advanced_Post_Creation' );

	}

}

/**
 * Returns an instance of the GF_Advanced_Post_Creation class
 *
 * @see    GF_Advanced_Post_Creation::get_instance()
 *
 * @return GF_Advanced_Post_Creation
 */
function gf_advancedpostcreation() {
	return GF_Advanced_Post_Creation::get_instance();
}