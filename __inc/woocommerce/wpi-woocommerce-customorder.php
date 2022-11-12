<?php 
 
add_action('init', function() {
    register_post_status('wc-preinvoice ', [
        'label' => __( 'Pre Invoice', WPI_LANG ),
        'public' => true,
        'exclude_from_search' => false,
        'show_in_admin_all_list' => true,
        'show_in_admin_status_list' => true,
        'label_count' => _n_noop('Pre Invoice <span class="count">(%s)</span>', 'Pre Invoice<span class="count">(%s)</span>')
		]);
	}
);

add_filter('wc_order_statuses', function ( $order_statuses ) {
	
    $order_statuses['wc-preinvoice'] = __( 'Pre Invoice', WPI_LANG );

    return $order_statuses;
});

add_filter( 'bulk_actions-edit-shop_order',function ( $actions ) {
    $new_actions = array();
    foreach ($actions as $key => $action) {
        if ('mark_processing' === $key)
            $new_actions['mark_preinvoice'] = __( 'Change status to Pre Invoice', WPI_LANG );

        $new_actions[$key] = $action;
    }
    return $new_actions;
}, 50, 1 );

add_filter( 'woocommerce_admin_order_actions',function ( $actions, $order ) {
    if ( $order->has_status( array( 'on-hold', 'processing', 'pending' ) ) ) {
        $action_slug = 'preinvoice';
        $actions[$action_slug] = array(
            'url'       => wp_nonce_url( admin_url( 'admin-ajax.php?action=woocommerce_mark_order_status&status='.$action_slug.'&order_id='.$order->get_id() ), 'woocommerce-mark-order-status' ),
            'name'      => __( 'Pre Invoice', WPI_LANG ),
            'action'    => $action_slug,
        );
    }
    return $actions;
}, 100, 2 );