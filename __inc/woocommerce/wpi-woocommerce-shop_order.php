<?php
/**
 * Set Default Query Shop Order Pre Invoice tab
 */
add_action('admin_init', 'wpi_set_order_sort');
function wpi_set_order_sort()
{
    if (function_exists('PW')) {
        if (isset($_GET['post_status'])) {
            if ($_GET['post_status'] == 'wc-preinvoice') {
                remove_filter('pre_get_posts', 'pw_sort_orders_list_by_pay_date');
            }
        }
    }
}
// $order = new WC_Order($order_id);
// $order->update_status('pending', 'order_note'); // order note is optional, if you want to  add a note to order
add_filter( 'manage_edit-shop_order_columns', function ($columns){
    $reordered_columns = array();
    foreach( $columns as $key => $column){
        $reordered_columns[$key] = $column;
        if( $key ==  'order_status' ){
            $reordered_columns['wpi-pre-invoice'] = __( 'Change Pre Invoice',WPI_LANG);
        }
    }
    return $reordered_columns;
}, 20 );


add_action( 'manage_shop_order_posts_custom_column' , function( $column, $post_id ){
	
	if( isset($_GET['post_id'] ) ){
		
		$order = wc_get_order( $_GET['post_id']);

		if($order){
		   $order->update_status( 'pending', '', true );
		}
		exit( wp_safe_redirect( admin_url().'edit.php?post_type=shop_order' ) );
	}

    switch ( $column ){
		case 'wpi-pre-invoice' :
			$order = wc_get_order( $post_id );
			$status = $order->data['status'];
			if( $status == 'preinvoice' ){
			echo "<a class='button button-primary' href='?post_type=shop_order&change_status=pending&post_id={$post_id}&return=true'>To Pending </a>";
			}else{
				echo __('No need to change',WPI_LANG);
			}
		break;
    }
}, 20, 2 );
