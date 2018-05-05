<?php
/**
 * Plugin Name: WooChef: Migration
 * Plugin URI:  https://github.com/woochef/migration
 * Description: WooChef: Migration is a tool to analyze database, by querying and displaying it out at the WordPress admin page.
 * Version:     0.1
 * Author:      WooChef and contributors
 * Author URI:  https://github.com/woochef/migration/graphs/contributors
 * Text Domain: woochef-migration
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

final class WooChef_Migration {
	/**
	 * WooChef_Migration version.
	 *
	 * @var string
	 */
	public $version = '0.1';

	/**
	 * The single instance of the class.
	 *
	 * @since 0.1
	 *
	 * @var   WooChef_Migration
	 */
	protected static $instance = null;

	/**
	 * WooChef_Migration Instance.
	 *
	 * @since 0.1
	 *
	 * @static
	 *
	 * @return WooChef_Migration  the instance.
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * @since 0.1
	 */
	public function __construct() {
		do_action( 'woochef_migration_initiating' );

		define( 'WCMIGRATION_PATH' , plugin_dir_path( __FILE__ ) );

		$this->load_classes();

		add_action( 'admin_menu', array( 'WCMigration_Menu', 'register_admin_menu' ) );

		do_action( 'woochef_migration_initiated' );
	}

	/**
	 * @since 0.1
	 */
	public function load_classes() {
		if ( is_admin() ) {
			require WCMIGRATION_PATH . 'includes/list/class-wcmigration-file-list-table.php';
			require WCMIGRATION_PATH . 'includes/class-wcmigration-menu.php';
			require WCMIGRATION_PATH . 'views/admin/class-wcmigration-view-admin.php';
		}
	}
}

/**
 * @since  0.1
 *
 * @return WooChef_Migration  the instance.
 */
function woochef_migration() {
	return WooChef_Migration::instance();
}

woochef_migration();
