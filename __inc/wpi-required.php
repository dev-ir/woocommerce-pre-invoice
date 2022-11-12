<?php 
add_action('plugins_loaded', 'check_for_woocommerce');
function check_for_woocommerce() {
    if (!defined('WC_VERSION')) {
	add_action( 'admin_notices', function () {
		$message = '<p><b>WooCommerce Pre Invoices requires the WooCommerce plugin to be installed and active. You can download <a href="https://wordpress.org/plugins/woocommerce/">WooCommerce</a> here.</b></p>';
		echo '<div class="notice notice-error"> '.__($message , WPI_LANG ).' </div>';
	} );
    }
}