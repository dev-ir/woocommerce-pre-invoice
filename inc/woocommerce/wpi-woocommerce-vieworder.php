<?php
add_action('wp', function () {

    if (isset(get_option(WPI_OPTIONS)['invoice-page_id'])) {
        if (is_page(get_option(WPI_OPTIONS)['invoice-page_id'])) {
            if( get_option(WPI_OPTIONS)['invoice-templates'] ){
                require_once(WPI_PATH . 'templates/'. get_option(WPI_OPTIONS)['invoice-templates'] .DIRECTORY_SEPARATOR. WPI_PREFIX . '-print.php');
                exit;
            }
        }
    }
});

add_action('init', function () {
    function wpi_order_details_btn($order)
    {
        if (!is_user_logged_in()) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            if (!isset($_SESSION['wpi']['order_keys'])) {
                $_SESSION['wpi']['order_keys'][] = $order->get_order_key();
            } elseif (!in_array($order->get_id(), $_SESSION['wpi']['order_keys'])) {
                $_SESSION['wpi']['order_keys'][] = $order->get_order_key();
            }
        }

        echo '<a href="' . esc_url(wpi_print_url() . '?wpi-id=' . intval($order->get_id())) . '" class="button" target="_blank">' . __('Print Now', WPI_LANG) . '</a>';
    }
    is_user_logged_in() ?  add_action('woocommerce_order_details_after_customer_details', 'wpi_order_details_btn') : add_action('woocommerce_order_details_after_order_table', 'wpi_order_details_btn');
});