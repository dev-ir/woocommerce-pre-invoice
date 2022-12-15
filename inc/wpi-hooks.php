<?php
if (!function_exists('wpi_plugin_row_meta')) {
    function wpi_plugin_row_meta($links_array, $plugin_file_name, $plugin_data, $status)
    {
        if (strpos($plugin_file_name, basename(WPI_FILE))) {
            $links_array[] = '<a href="' . admin_url('admin.php?page=woocommerce-pre-invoice-settings&tab=company') . '">' . __('Configure', WPI_LANG) . '</a>';
        }
        return $links_array;
    }

    add_filter('plugin_row_meta', 'wpi_plugin_row_meta', 10, 4);
}


add_action('admin_notices', function () {

    if (!class_exists('WooCommerce')) {
        add_action('admin_notices', function () {
            printf('<div class="error notice">%s</div>', __('<p><b>WooCommerce Pre Invoices requires the WooCommerce plugin to be installed and active. You can download <a href="https://wordpress.org/plugins/woocommerce/">WooCommerce</a> here.</b></p>', WPI_LANG));
        });
    }

    if (!defined('PWOOSMS_VERSION')) {
        add_action('admin_notices', function () {
            printf('<div class="updated  notice">%s</div>', __('<p><b>WooCommerce Pre Invoices requires the for send message Persian Woocommerce  SMS plugin to be installed and active. You can download <a href="https://wordpress.org/plugins/persian-woocommerce-sms/">WooCommerce</a> here.</b></p>', WPI_LANG));
        });
    }
});

add_action('plugins_loaded', function () {

    load_plugin_textdomain(WPI_LANG, false, WPI_PREFIX);
});


function wpi_view_page()
{
    $wpi_op = get_option(WPI_OPTIONS);
    if (!isset($wpi_op['invoice-page_id'])) {
        if ($p_id = wp_insert_post(array(
            'post_title' => __('Pre Invoice Woocommerce', WPI_LANG),
            'post_status' => 'publish',
            'post_type' => 'page',
        ))) {
            $wpi_op['invoice-page_id'] = $p_id;
            update_option('wpi_settings', $wpi_op);
        }
    }
}

add_action('admin_init', 'wpi_view_page');

register_activation_hook(WPI_FILE, function () {
    // code here
});
register_deactivation_hook(WPI_FILE, function () {
    // code here
});

function wpi__rp($url)
{
    $disallowed = array('http://', 'https://');
    foreach ($disallowed as $d) {
        if (strpos($url, $d) === 0) {
            return str_replace($d, '', $url);
        }
    }
    return $url;
}

function wpi_update_option($args)
{
}

function wpi_uploader($file)
{

    if (!function_exists('wp_handle_upload')) {
        require_once(ABSPATH . 'wp-admin/includes/file.php');
    }

    $upload_overrides = array('test_form' => false);

    $movefile = wp_handle_upload($file, $upload_overrides);

    if ($movefile && !isset($movefile['error'])) {

        return $movefile['url'];
    }
}

/**
 * Filters the default post display states used in the posts list table.
 */
add_filter('display_post_states', 'wpi_add_post_state', 10, 2);
function wpi_add_post_state($post_states, $post)
{
    if (isset(get_option(WPI_OPTIONS)['invoice-page_id'])) {
        if (absint(get_option(WPI_OPTIONS)['invoice-page_id'])) {
            if ($post->ID == get_option(WPI_OPTIONS)['invoice-page_id']) {
                $post_states[] = __('Pre Invoice Woocommerce', WPI_LANG);
            }
        }
    }
    return $post_states;
}


/*** wpi print function */
if (!function_exists('wpi_print_init')) {
    add_action('wpi_print_init', 'wpi_print_init');
    function wpi_print_init()
    {
        if (!isset(get_option(WPI_OPTIONS)['invoice-name'])) {
            $setting_link = '<a href="' . admin_url() . 'admin.php?page=woocommerce-pre-invoice-settings&tab=company" >' . __('settings', WPI_LANG) . ' </a>';
            wp_die(sprintf(__('Sorry, plugin  %s could not be found', WPI_LANG), $setting_link));
        }
        if (wpi_type() == 'cart') {
            $GLOBALS['order'] = WC()->cart;
            if (!$GLOBALS['order']->get_cart()) wp_die(__('Cart is empty', WPI_LANG));
        } else {
            if (get_option(WPI_OPTIONS)['invoice-is_login'] && !is_user_logged_in()) {
                wp_die(__('you must be logged.', WPI_LANG));
            }
            if (!intval($_GET['wpi-id'])) wp_die(__('You Should Select One Invoice', WPI_LANG));
            $GLOBALS['order'] = wc_get_order(intval($_GET['wpi-id']));
            if (!$GLOBALS['order']->get_id()) wp_die(__('this invoice is not exist.', WPI_LANG));

            if (is_user_logged_in()) {
                if (!wpi_get_owner_orders(get_current_user_id())) wp_die(__('this invoice is not owned.', WPI_LANG));
            } else {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (!in_array(wc_get_order($_GET['wpi-id'])->get_order_key(), $_SESSION['wpi']['order_keys'])) wp_die(__('this invoice is not owned.', WPI_LANG));
            }
        }
    }
}

if (!function_exists('wpi_print_head')) {
    add_action('wpi_print_head', 'wpi_print_head');
    function wpi_print_head()
    {
        ob_start();
?>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php wpi_page_title(); ?></title>
        <!-- Font : IRANSans -->
        <link rel="stylesheet" href="<?php echo WPI_URL; ?>assets/css/IRANSans.css?ver=<?php echo WPI_VER; ?>" />
        <!-- main stylesheet -->
        <link rel="stylesheet" href="<?php echo WPI_URL; ?>assets/css/woocommerce-pre-invoice.css?ver=<?php echo WPI_VER; ?>" />
<?php
        echo ob_get_clean();
    }
}

if (!function_exists('wpi_autoptimize_set')) {
    add_action('wpi_print_init', 'wpi_autoptimize_set');
    function wpi_autoptimize_set()
    {
        wpi_autoptimize_imgopt_set('wpi-preinvoice-logo');
    }
}


if (!function_exists('wpi_print_body')) {
    add_action('wpi_print_body', 'wpi_print_body');
    function wpi_print_body()
    {
        wpi_get_template_part('template-' . wpi_get_template());
    }
}


add_action('wpi_print_body', 'wpi_print_actions');
add_action('wpi_print_before_body', 'wpi_print_container_open');
add_action('wpi_print_after_body', 'wpi_print_container_close');