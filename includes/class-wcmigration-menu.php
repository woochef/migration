<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class WCMigration_Menu {
	/*
	 * @since 0.1
	 */
	public function register_admin_menu() {
		add_menu_page(
			__( 'Database Migration', 'woochef-migration' ),
			__( 'Database Migration', 'woochef-migration' ),
			'manage_options',
			'wcmigration',
			array( 'WCMigration_View_Admin', 'action_index' )
		);
	}
}
