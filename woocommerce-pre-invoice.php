<?php
/*
	Plugin Name: WooCommerce Pre Invoices
	Description: Create, print & email PDF Pre invoices .
	Version: 3.3
	Author: DeveloperMen Team
	Author URI: http://developermen.ir
	Text Domain: wpi_lang
	Domain Path: /languages
	PREFIX: wpi
*/

# Load instance after load plugin.
add_action('plugin_loaded', ['wc_pre_invoice', 'instance']);

if (!defined('ABSPATH')) exit;

if (!class_exists('wc_pre_invoice')) {
	class wc_pre_invoice
	{

		public function __construct()
		{
			$this->requires();
			$this->set_define();
			$this->plugin_data();
			$this->init_module();
		}

		private function requires()
		{
			if (!function_exists('get_plugin_data')) {
				require_once(ABSPATH . 'wp-admin/includes/plugin.php');
			}
		}

		public function instance()
		{
			$instance = null;
			if ($instance == null) {
				return new wc_pre_invoice();
			}
		}

		private function set_define()
		{
			if (!defined('WPI_PATH')) {
				define('WPI_PATH', plugin_dir_path(__FILE__));
			}

			if (!defined('WPI_URL')) {
				define('WPI_URL', plugin_dir_url(__FILE__));
			}

			if (!defined('WPI_INC_PATH')) {
				define('WPI_INC_PATH', WPI_PATH . 'inc' . DIRECTORY_SEPARATOR);
			}

			if (!defined('WPI_TPL_PATH')) {
				define('WPI_TPL_PATH', WPI_PATH . 'templates' . DIRECTORY_SEPARATOR);
			}

			if (!defined('WPI_VER')) {
				define('WPI_VER', $this->plugin_data()->Version);
			}

			if (!defined('WPI_LANG')) {
				define('WPI_LANG', $this->plugin_data()->TextDomain);
			}

			if (!defined('WPI_OPTIONS')) {
				define('WPI_OPTIONS', 'wpi_settings');
			}

			if (!defined('WPI_FILE_PREFIX')) {
				define('WPI_FILE_PREFIX', 'woocommerce-pre-invoice');
			}

			if (!defined('WPI_PREFIX')) {
				define('WPI_PREFIX', 'wpi');
			}

			if (!defined('WPI_FILE')) {
				define('WPI_FILE', plugin_dir_url(__FILE__));
			}
		}

		public function plugin_data()
		{
			if (!empty(get_plugin_data(__FILE__))) {
				return (object) get_plugin_data(__FILE__);
			}
		}

		public function init_module()
		{
			$include = [
				'hooks',
				'admin-menu',
				'enqueue',
				'guard',
				'required',
				'core'
			];
			if (!empty($include)) {
				foreach ($include as $item) {
					require_once(WPI_INC_PATH . WPI_PREFIX . '-' . $item . '.php');
				}
			}
		}
	}
}
