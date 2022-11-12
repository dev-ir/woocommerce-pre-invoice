<?php
/**
 * wpi get option
 * @param $key
 * @param null $default_value
 * @return false|mixed
 */
function wpi_get_option($key, $default_value =null)
{


    if (isset(get_option(WPI_OPTIONS)[$key])) {
        if(!empty(get_option(WPI_OPTIONS)[$key])) return get_option(WPI_OPTIONS)[$key] ;
    } elseif ($default_value) {
        return $default_value;
    }
    return false;

}

/**
 * get template by url address
 */
function wpi_get_template()
{
    if (isset($_GET['template'])) {
        return esc_attr($_GET['template']);
    }
    return 'default';
}
/**
 * check template name
 */
function wpi_is_template($name = null)
{
    if (wpi_get_template() == $name) return true;
    return false;
}


/**
 * get template (found template in template direcotry or plugin templates )
 * @param string $file
 * @return string|void
 */
function wpi_get_template_part(string $file)
{
    # check Not empty
    if (!$file) return;
    $file = DIRECTORY_SEPARATOR . WPI_PREFIX . '-' . $file . '.php';
    if (file_exists(STYLESHEETPATH . DIRECTORY_SEPARATOR . 'woocommerce' . DIRECTORY_SEPARATOR . $file)) {
        require STYLESHEETPATH . DIRECTORY_SEPARATOR . 'woocommerce' . DIRECTORY_SEPARATOR . $file;
    } elseif (file_exists(TEMPLATEPATH . DIRECTORY_SEPARATOR . 'woocommerce' . DIRECTORY_SEPARATOR . $file)) {
        require TEMPLATEPATH . $file;
    } elseif (file_exists(WPI_TPL_PATH . $file)) {
        require WPI_TPL_PATH . $file;
    } else {
        return 'file not exist.';
    }
}

function wpi_print_url($echo = false)
{
    if (isset(get_option(WPI_OPTIONS)['invoice-page_id'])) {
        if ($echo) {
            echo get_the_permalink(get_option(WPI_OPTIONS)['invoice-page_id']);
        } else {
            return get_the_permalink(get_option(WPI_OPTIONS)['invoice-page_id']);
        }
    }
}

function wpi_total_price_item($price, $count = '1')
{

    if (isset($price, $count)) {

        return number_format($price * $count);
    }
}

function wpi_get_owner_orders($customer_user_id = null)
{

    $customer_orders = wc_get_orders(array(
        'meta_key' => '_customer_user',
        'meta_value' => $customer_user_id,
        'post_status' => array('wc-wpi'),
        'numberposts' => -1
    ));


    if (is_array($customer_orders)) {

        if (count($customer_orders) > 0) {

            foreach ($customer_orders as $order) {

                // Iterating through current orders items
                foreach ($order->get_items() as $item_id => $item) {

                    // The corresponding product ID (Added Compatibility with WC 3+)
                    $product_id[] = method_exists($item, 'get_product_id') ? $item->get_product_id() : $item['product_id'];

                }
            }

            return $product_id;
        }

    }
    return false;
}

add_action('woocommerce_proceed_to_checkout', 'wpi_cart_button');
function wpi_cart_button()
{
    echo '<a href="' . esc_url(add_query_arg('wpi-id', "cart", wpi_print_url())) . '" class="checkout-button button alt wc-forward wpi_btn_print">' . __('Preview Pre Invoice', WPI_LANG) . '</a>';
}


function wpi_type()
{
    if ($_GET['wpi-id'] == 'cart') {
        return 'cart';
    } else {
        return 'order';
    }
}


function wpi_have_products($order)
{
    $wpi_products = wpi_type() == 'cart' ? $order->get_cart() : $order->get_items();
    if (!count($wpi_products) > 0) return false;
    return $wpi_products;
}

function wpi_total($order)
{
    if (wpi_type() == 'cart') {
        echo WC()->cart->get_total();
    } else {
        echo number_format($order->get_total()) . '&nbsp' . wpi_currency();
    }
}

function wpi_currency()
{
    return get_woocommerce_currency_symbol();
}

function wpi_total_tax($order)
{
    if (wpi_type() == 'cart') {
        echo WC()->cart->get_total_tax() . '&nbsp' . wpi_currency();
    } else {
        echo number_format($order->get_total_tax()) . '&nbsp' . wpi_currency();
    }
}


function wpi_page_title()
{
    echo __('Invoice Number', WPI_LANG) . ': ' . (wpi_type() == 'order' ? intval($_GET['wpi-id']) : __('Preview Pre Invoice', WPI_LANG));
}

function wpi_autoptimize_imgopt_set($class_name = 'wpi-preinvoice-logo')
{
    if ($autoptimize = get_option('autoptimize_imgopt_settings')) {
        if (array_key_exists('autoptimize_imgopt_text_field_5', $autoptimize)) {
            if (strpos($autoptimize['autoptimize_imgopt_text_field_5'],$class_name) === false )  {
                $autoptimize['autoptimize_imgopt_text_field_5'] = !empty($autoptimize['autoptimize_imgopt_text_field_5']) ? $autoptimize['autoptimize_imgopt_text_field_5'] . ',' . $class_name : $class_name . ',';
                update_option('autoptimize_imgopt_settings', $autoptimize);
            }
        } else {
            $autoptimize['autoptimize_imgopt_text_field_5'] = $class_name . ',';
            update_option('autoptimize_imgopt_settings', $autoptimize);
        }
    } else {
        $autoptimize['autoptimize_imgopt_text_field_5'] = $class_name . ',';
        update_option('autoptimize_imgopt_settings', $autoptimize);
    }
}

if (!function_exists('wpi_print_actions')) {
    function wpi_print_actions()
    {
        ob_start();
        ?>
        <div class="wpi-preinvoice-actions wpi-preinvoice-d-print-none">
            <a href="#" class="button green" onclick="print()"><?php _e('Print Now', WPI_LANG); ?></a>
            <?php echo wpi_type() == 'cart' ? '<a href="' . esc_url(wc_get_page_permalink('checkout')) . '?wpi_print_learn=true" class="button green">' . __('Save as Pre Invoice', WPI_LANG) . '</a>' : null; ?>
            <a href="#" onclick="location.href = document.referrer; return false;"
               class="button"><?php _e('Back', WPI_LANG); ?></a>
        </div>
        <?php
        echo ob_get_clean();
    }
}
if (!function_exists('wpi_body_class')) {
    function wpi_body_class($class = '')
    {
        if (is_rtl()) {
            $classes[] = 'rtl';
        }
        if (wpi_get_template()) {
            $classes[] = 'wpi-template-'.wpi_get_template();
        }
        $classes[] = is_user_logged_in() ? esc_attr('wpi-user-logged') : esc_attr('wpi-user-logout') ;

        // Separates class names with a single space, collates class names for body element.
        echo 'class="' . esc_attr(implode(' ', apply_filters('wpi_body_class', $classes, $class))) . '"';
    }
}


if (!function_exists('wpi_print_container_open')) {
    function wpi_print_container_open()
    {
        echo '<div class="'.apply_filters('wpi-container_class', 'wpi-container',$classes).'">';
    }
}

if (!function_exists('wpi_print_container_close')) {
    function wpi_print_container_close()
    {
        echo '</div>';
    }
}

/**
 * upload logo img
 */
function wpi_logo_url($file)
{
    if (!empty($file['name'])) {
        return wpi_uploader($file);
    } else {
        if(isset($_POST['dv-preinvoice-logo-def'])){
            if (!empty($_POST['dv-preinvoice-logo-def'])) {
                return $_POST['dv-preinvoice-logo-def'];
            }
        }else {
            return '';
        }
        return '';
    }

}
