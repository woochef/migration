<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class WCMigration {
	/**
	 * @var string
	 */
	const WCMIGRATION_BASE_MIGRATION_PATH = 'db/migrations';

	/**
	 * @var string
	 */
	protected $base_migration_path;
	protected $wcmigration_migration_path;
	
	/**
	 * @since 0.1
	 *
	 * @param string $filename
	 */
	public function __construct() {
		$this->base_migration_path        = apply_filters( 'wcmigration_set_base_migration_path', self::WCMIGRATION_BASE_MIGRATION_PATH );
		$this->wcmigration_migration_path = apply_filters( 'wcmigration_migration_path', WCMIGRATION_PATH . $this->base_migration_path );
	}

	/**
	 * @since  0.1
	 *
	 * @return array
	 */
	public static function get_wcmigration_migration_files() {
		return (new self)->wcmigration_migration_files();
	}

	/**
	 * @since  0.1
	 *
	 * @return array
	 */
	public function wcmigration_migration_files() {
		if ( ! is_dir( $this->wcmigration_migration_path ) ) {
			return array();
		}

		return glob( $this->wcmigration_migration_path . '/*.php' );
	}
}
