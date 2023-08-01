<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://wordpress.com/
 * @since      1.0.0
 *
 * @package    Books_Mgmt
 * @subpackage Books_Mgmt/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Books_Mgmt
 * @subpackage Books_Mgmt/includes
 * @author     rjtdev007 <rjtdev007@gmail.com>
 */
class Books_Mgmt_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'books-mgmt',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
