<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class WCMigration_View_Admin {
	public function action_index() {
		?>
		<div class="wrap woocommerce">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		</div>
		<?php
	}
}
