<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class WCMigration_File_List_Table extends WP_List_Table {
	/**
	 * @since 0.1
	 */
	public function __construct() {
		parent::__construct( array(
			'singular' => 'migration',
			'plural'   => 'migrations',
			'ajax'     => false,
		) );

		$this->_column_headers = array( $this->get_columns(), array(), array() );
	}

	/**
	 * Get columns.
	 *
	 * @return array
	 */
	public function get_columns() {
		return array(
			'location' => __( 'File Location', 'woochef-migration' ),
			'module'   => __( 'Module', 'woochef-migration' ),
			'status'   => __( 'Status', 'woochef-migration' ),
			'action'   => __( 'Action', 'woochef-migration' ),
		);
	}

	/**
	 * Prepare customer list items.
	 */
	public function prepare_items() {
		$this->items = array();

		foreach ( WCMigration::get_wcmigration_migration_files() as $value ) {
			$this->items[] = array(
				'location' => basename( $value ),
				'module'   => 'woochef-migration',
				'status'   => '<mark style="max-width: 100%; border-radius: 4px; padding: 10px; line-height: 2.5em; border-bottom: 1px solid rgba(0, 0, 0, .05); background: #f8dda7;color: #94660c;"><span>new</span></mark>',
				'action'   => sprintf( '<a href="admin.php?page=wcmigration&action=wcmigration-migrate&item=%s" class="button button-primary">Migrate</button>', $value )
			);
		}

		$this->set_pagination_args( array(
			'total_items' => 0,
			'per_page'    => 20
		) );
	}

	/**
	 * @since  0.1
	 *
	 * @param  array $item
	 *
	 * @return string
	 */
	public function column_location( $item ) {
		return $item['location'];
	}

	/**
	 * @since  0.1
	 *
	 * @param  array $item
	 *
	 * @return string
	 */
	public function column_module( $item ) {
		return $item['module'];
	}

	/**
	 * @since  0.1
	 *
	 * @param  array $item
	 *
	 * @return string
	 */
	public function column_status( $item ) {
		return $item['status'];
	}

	/**
	 * @since  0.1
	 *
	 * @param  array $item
	 *
	 * @return string
	 */
	public function column_action( $item ) {
		return $item['action'];
	}
}
