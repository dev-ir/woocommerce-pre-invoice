<?php 
/*
*	@ Author	: 	Black_Sky
*	@ Version	: 	1.0
*	@ Hook 		:	https://developer.wordpress.org/reference/functions/add_submenu_page/
*	@ Functions	: 	Add Submenu   
*	@ Description : This function takes a capability which will be used to determine whether or not a page is included in the menu
*
*/
function wpi_admin_menu(){
    add_menu_page( 
		__( 'Woo Pre Invoice ', WPI_LANG ),
		__( 'Woo Pre Invoice', WPI_LANG ),
        'manage_options', __( WPI_FILE_PREFIX, WPI_LANG ),
        WPI_PREFIX.'_intro',
		esc_url( plugins_url( 'assets/images/icon.png', __DIR__ ) ),
        59
    );

    if (class_exists('WooCommerce')) {
        add_submenu_page(
            __( WPI_FILE_PREFIX, WPI_LANG ),
            Null,
            __( 'List Pre Invoice', WPI_LANG ),
            'manage_options',
            WPI_FILE_PREFIX.'-list-pre-invoice',
            WPI_PREFIX.'_list_pre_invoice' , 1
        );
        add_submenu_page(
            __( WPI_FILE_PREFIX, WPI_LANG ),
            Null,
            __( 'Add Pre Invoice', WPI_LANG ),
            'manage_options',
            WPI_FILE_PREFIX.'-add-pre-invoice',
            WPI_PREFIX.'_add_pre_invoice' ,
            2
        );

    }

	add_submenu_page(
		__( WPI_FILE_PREFIX, WPI_LANG ),
		Null,
		__( 'Settings', WPI_LANG ),
		'manage_options',
		WPI_FILE_PREFIX.'-settings',
		WPI_PREFIX.'_settings',
        3
	);

}
add_action( 'admin_menu', 'wpi_admin_menu' );

function wpi_intro() {
	require "pages/".WPI_PREFIX."-intro.php";
}
function wpi_settings() {
	require "pages/".WPI_PREFIX."-settings.php";
}
function wpi_add_pre_invoice() {
	wp_safe_redirect(add_query_arg( array(
        'wpi_order_status' => 'wc-preinvoice',
        'post_type' => 'shop_order',
    ), admin_url('post-new.php') ));
}
function wpi_list_pre_invoice() {
	wp_safe_redirect(add_query_arg( array(
        'post_status' => 'wc-preinvoice',
        'post_type' => 'shop_order',
    ), admin_url('edit.php') ));
}
add_action('admin_enqueue_scripts','wpi_set_order_status');
function wpi_set_order_status(){
    if(isset($_GET['wpi_order_status'])){
        $screen = get_current_screen();
        if ( is_null( $screen ) || $screen->id != 'shop_order' && $screen->action !='add') return false;
        ob_start();
        ?>
        /* set order status : pre invoice */
        jQuery(document).ready(function($){
        if($('select[name=order_status] option[value=wc-preinvoice]').length){
            $('select[name=order_status] option[value=wc-preinvoice]').prop('selected',true);
        }
        });
<?php
        $inline_js = ob_get_clean();
        wp_add_inline_script( 'jquery', $inline_js);
    }
}