<?php 
/*
	Plugin Name: WooCommerce Pre Invoices
	Description: Create, print & email PDF Pre invoices .
	Version: 2.9
	Author: DeveloperMen Team
	Author URI: http://developermen.ir
	Text Domain: wpi_lang
	Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit;

if( !function_exists('get_plugin_data') ){
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
if( ! defined('WPI_PATH') ){
	define( 'WPI_PATH',dirname(__FILE__) );
}
if( ! defined('WPI_INC_PATH') ){
	define('WPI_INC_PATH',WPI_PATH.DIRECTORY_SEPARATOR .'inc'.DIRECTORY_SEPARATOR);
}
if( ! defined('WPI_TPL_PATH') ){
	define('WPI_TPL_PATH',WPI_PATH.DIRECTORY_SEPARATOR .'templates'.DIRECTORY_SEPARATOR);
}
# Define Constans */
$define = [
	"WPI_URL"			=> plugin_dir_url( __FILE__ ) . '/',
	"WPI_VER"			=> get_plugin_data( __FILE__ )['Version'],
	"WPI_PREFIX"		=> "wpi",
	"WPI_LANG"			=> get_plugin_data( __FILE__ )['TextDomain'],
	"WPI_LANG_PATH" 	=> "wpi",
	"WPI_PREFIX_LANG"	=> dirname( plugin_basename( __FILE__ ) ) .get_plugin_data( __FILE__ )['TextDomain'].'/',
	"WPI_PAGES"			=> WPI_INC_PATH.DIRECTORY_SEPARATOR .'pages'.DIRECTORY_SEPARATOR,
	"WPI_FILE"			=> __FILE__,
	"WPI_FILE_PREFIX"	=> "woocommerce-pre-invoice",
	"WPI_OPTIONS"		=> "wpi_settings",
];

if( is_array($define) ){
	foreach( $define as $name => $value ){
		defined("$name") or define("$name","$value");
	}
}
$include = [
	'hooks',
	'admin-menu',
	'enqueue',
	'guard',
	'required',
	'core'
];
foreach( $include as $item )
	include ( WPI_INC_PATH.WPI_PREFIX.'-'.$item.'.php' );