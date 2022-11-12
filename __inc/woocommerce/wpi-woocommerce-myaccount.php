<?php
add_filter( 'woocommerce_my_account_my_orders_actions',function( $actions , $orders ) {
    if( $orders->get_status() == 'preinvoice' ){
        $actions['wpi-print'] = array(
            'url'  => esc_url(add_query_arg( 'wpi-id', intval($orders->get_id()), wpi_print_url() )),
            "name" => __('Print Pre Invoice', WPI_LANG )
        );
    }
    return $actions;
}, 10, 2 );