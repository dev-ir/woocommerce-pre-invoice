<?php global $order; ?>

<div class="wpi-preinvoice-content">
    <div class="wpi-preinvoice-head wpi-preinvoice-spacing">
        <div class="wpi-preinvoice-first">
            <?php if (get_option(WPI_OPTIONS)['invoice-logo']) : ?>
                <div class="wpi-preinvoice-logo-img">
                    <img class="wpi-preinvoice-logo" src="<?php echo get_option(WPI_OPTIONS)['invoice-logo']; ?>" />
                </div>
            <?php endif; ?>
            <div class="wpi-preinvoice-first-text">
                <span> <?php echo get_option(WPI_OPTIONS)['invoice-underline']; ?> </span>
            </div>
        </div>
        <div class="wpi-preinvoice-center">
            <div class="wpi-preinvoice-title"><?php echo get_option(WPI_OPTIONS)['invoice-name']; ?></div>
            <div class="wpi-preinvoice-shop-title"><?php echo get_option(WPI_OPTIONS)['invoice-shopname']; ?></div>
        </div>
        <div class="wpi-preinvoice-last">
            <div class="wpi-preinvoice-datetime"><?php _e('date', WPI_LANG); ?> :
                <span class="ltr d-inline-block"><?php echo date_i18n(get_option('date_format'), strtotime(date('Y-m-d H:i:s'))); ?></span>
            </div>
            <?php if (get_option(WPI_OPTIONS)['invoice-preinvoice']) : ?>
                <div class="wpi-preinvoice-order-id">
                    <?php _e('Invoice number', WPI_LANG); ?>:
                    <span><?php echo (wpi_type() == 'order' ? intval($_GET['wpi-id']) : __('Preview Pre Invoice', WPI_LANG)); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="wpi-preinvoice-cat-title">
        <?php echo get_option(WPI_OPTIONS)['invoice-slogan']; ?>
    </div>
    <div class="wpi-preinvoice-contact wpi-preinvoice-spacing">

        <div class="wpi-preinvoice-address-ph">
            <?php if (isset(get_option(WPI_OPTIONS)['invoice-address'])) : ?>

                <div class="wpi-preinvoice-address">
                    <?php _e('Address', WPI_LANG); ?>:

                    <?php echo get_option(WPI_OPTIONS)['invoice-address']; ?>
                </div>
            <?php endif; ?>

            <div class="wpi-preinvoice-tell">
                <?php if (isset(get_option(WPI_OPTIONS)['invoice-cellphone'])) : ?>
                    <?php _e('Phone', WPI_LANG); ?>:
                    <span class="wpi-preinvoice-number"><?php echo get_option(WPI_OPTIONS)['invoice-cellphone']; ?> - <?php echo get_option(WPI_OPTIONS)['invoice-mobile']; ?></span>
                <?php endif; ?>
                <?php if (isset(get_option(WPI_OPTIONS)['invoice-fax'])) : ?>
                    &nbsp;<?php _e('Fax', WPI_LANG); ?>:
                    <span class="wpi-preinvoice-number"> <?php echo get_option(WPI_OPTIONS)['invoice-fax']; ?></span>
                <?php endif; ?>
                <?php if (isset(get_option(WPI_OPTIONS)['invoice-postal_code'])) : ?>
                    &nbsp;<?php _e('Zip Code', WPI_LANG); ?>:
                    <span class="wpi-preinvoice-number"> <?php echo get_option(WPI_OPTIONS)['invoice-postal_code']; ?></span>
                <?php endif; ?>
            </div>
            <div class="wpi-preinvoice-tell">
                <?php if (isset(get_option(WPI_OPTIONS)['invoice-natural_id'])) : ?>
                    &nbsp;<?php _e('Natural ID Company', WPI_LANG); ?>:
                    <span class="wpi-preinvoice-number"> <?php echo get_option(WPI_OPTIONS)['invoice-natural_id']; ?></span>
                <?php endif; ?>
                <?php if (isset(get_option(WPI_OPTIONS)['invoice-register_id'])) : ?>
                    &nbsp;<?php _e('Register Number', WPI_LANG); ?>:
                    <span class="wpi-preinvoice-number"> <?php echo get_option(WPI_OPTIONS)['invoice-register_id']; ?></span>
                <?php endif; ?>
                <?php if (isset(get_option(WPI_OPTIONS)['invoice-economical_id'])) : ?>
                    &nbsp;<?php _e('Economical ID', WPI_LANG); ?>:
                    <span class="wpi-preinvoice-number"> <?php echo get_option(WPI_OPTIONS)['invoice-economical_id']; ?></span>
                <?php endif; ?>
            </div>
        </div>

        <div class="wpi-preinvoice-address-elec ltr">
            <?php if (!empty(get_option(WPI_OPTIONS)['invoice-urlshop'])) : ?>
                <div class="wpi-preinvoice-website">
                    <?php echo __('Website', WPI_LANG); ?> :
                    <span><?php echo !isset(get_option(WPI_OPTIONS)['invoice-urlshop']) ? parse_url(get_home_url())['host'] : get_option(WPI_OPTIONS)['invoice-urlshop']; ?></span>
                </div>
            <?php endif; ?>
            <div class="wpi-preinvoice-email ">
                <?php echo __('Email', WPI_LANG); ?> :
                <span><?php echo get_option(WPI_OPTIONS)['invoice-email']; ?></span>
            </div>
        </div>
    </div>
    <hr>
    <?php if (wpi_type() == 'order') { ?>
        <div class="wpi-preinvoice-customer-info wpi-preinvoice-spacing">
            <div class="wpi-preinvoice-customer-info-row">
                <div class="wpi-preinvoice-customer-full-name">
                    <?php echo __('Dear buyer', WPI_LANG); ?> :
                    <span><?php echo @$order->data['billing']['first_name'] . ' ' . @$order->data['billing']['last_name']; ?></span>
                </div>
                <div class="wpi-preinvoice-customer-tell"><?php echo __('Phone', WPI_LANG); ?> :
                    <span class="wpi-preinvoice-number"><?php echo @$order->data['billing']['phone']; ?></span>
                </div>
                <div class="wpi-preinvoice-customer-code">
                    <?php echo __('Postal code', WPI_LANG); ?> : <span><?php echo @$order->data['billing']['postcode']; ?></span>
                </div>
            </div>
            <div class="wpi-preinvoice-customer-address"><?php echo __('Address', WPI_LANG); ?> :
                <span><?php echo @$order->data['billing']['city'] . ' - ' . @$order->data['billing']['address_1']; ?></span>
            </div>

        </div>
        <hr>
    <?php } ?>

    <?php
    $th_labels = array(
        __('Row', WPI_LANG),
        __('ID', WPI_LANG),
        __('Explanation', WPI_LANG),
        __('the amount of', WPI_LANG),
        __('Price', WPI_LANG),
        __('Total', WPI_LANG)
    );
    ?>
    <div class="wpi-preinvoice-order-info wpi-preinvoice-spacing">
        <div class="wpi-preinvoice-order-items">
            <table width="100%" class="wpi-preinvoice-order-table" border="1">
                <thead>
                    <tr>
                        <?php $th_row = 0;
                        foreach ($th_labels as $label) {
                            if ($th_row == 5 && wpi_type() != 'cart') continue;
                            echo ' <th >' . $label . '</th>';
                            $th_row++;
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                        $_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
                        $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

                        if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
                            $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
                    ?>
                            <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
                                <td class="product-row"><?php echo $i; ?></td>
                                <td class="product-id"><?php echo $product_id; ?></td>
                                <td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
                                    <?php
                                    if (!$product_permalink) {
                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                                    } else {
                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                                    }

                                    do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                                    echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

                                    if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                                        echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
                                    }
                                    ?>
                                </td>
                                <td class="product-quantity text-center" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
                                    <?php echo $cart_item['quantity']; ?>
                                </td>

                                <td class="product-price text-center" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
                                    <?php echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); ?>
                                    <?php echo WC()->cart->get_product_price($_product); ?>
                                </td>

                                <td class="product-subtotal text-center" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
                                    <?php echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok. 
                                    ?>
                                    <?php echo WC()->cart->get_product_subtotal($_product, $cart_item['quantity']); ?>
                                </td>

                            </tr>
                    <?php
                        }
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <div class="wpi-preinvoice-order-bottom-info">
            <div class="wpi-preinvoice-order-details">
                <span>
                    <?php _e('Collect the main items', WPI_LANG); ?> :<?php echo ($i - 1); ?></span>
                <?php if (wpi_type() == 'order') { ?>
                    <div class="wpi-preinvoice-order-details-desc col-12">
                        <div><?php _e('Description', WPI_LANG); ?> :</div>
                        <div>
                            <?php echo ($order->get_customer_note()); ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="wpi-preinvoice-order-calc">
                <table>
                    <tbody>
                        <tr class="cart-subtotal">
                            <td><?php esc_html_e('Subtotal', 'woocommerce'); ?></td>
                            <td data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>"><?php wc_cart_totals_subtotal_html(); ?></td>
                        </tr>
                        <?php
                        add_filter('woocommerce_cart_totals_coupon_html', function ($coupon_html) {
                            return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $coupon_html);
                        }, 10, 3);
                        ?>
                        <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
                            <tr class="cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
                                <td><?php wc_cart_totals_coupon_label($coupon); ?></td>
                                <td data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>">
                                    <?php wc_cart_totals_coupon_html($coupon); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>

                            <?php do_action('woocommerce_cart_totals_before_shipping'); ?>

                            <?php wc_cart_totals_shipping_html(); ?>

                            <?php do_action('woocommerce_cart_totals_after_shipping'); ?>

                        <?php elseif (WC()->cart->needs_shipping() && 'yes' === get_option('woocommerce_enable_shipping_calc')) : ?>

                            <tr class="shipping">
                                <td><?php esc_html_e('Shipping', 'woocommerce'); ?></td>
                                <td data-title="<?php esc_attr_e('Shipping', 'woocommerce'); ?>"><?php woocommerce_shipping_calculator(); ?></td>
                            </tr>

                        <?php endif; ?>

                        <?php foreach (WC()->cart->get_fees() as $fee) : ?>
                            <tr class="fee">
                                <td><?php echo esc_html($fee->name); ?></td>
                                <td data-title="<?php echo esc_attr($fee->name); ?>"><?php wc_cart_totals_fee_html($fee); ?></td>
                            </tr>
                        <?php endforeach; ?>

                        <?php
                        if (wc_tax_enabled() && !WC()->cart->display_prices_including_tax()) {
                            $taxable_address = WC()->customer->get_taxable_address();
                            $estimated_text  = '';

                            if (WC()->customer->is_customer_outside_base() && !WC()->customer->has_calculated_shipping()) {
                                /* translators: %s location. */
                                $estimated_text = sprintf(' <small>' . esc_html__('(estimated for %s)', 'woocommerce') . '</small>', WC()->countries->estimated_for_prefix($taxable_address[0]) . WC()->countries->countries[$taxable_address[0]]);
                            }

                            if ('itemized' === get_option('woocommerce_tax_total_display')) {
                                foreach (WC()->cart->get_tax_totals() as $code => $tax) {
                        ?>
                                    <tr class="tax-rate tax-rate-<?php echo esc_attr(sanitize_title($code)); ?>">
                                        <td><?php echo esc_html($tax->label) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                            ?></td>
                                        <td data-title="<?php echo esc_attr($tax->label); ?>"><?php echo wp_kses_post($tax->formatted_amount); ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr class="tax-total">
                                    <td><?php echo esc_html(WC()->countries->tax_or_vat()) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
                                        ?></td>
                                    <td data-title="<?php echo esc_attr(WC()->countries->tax_or_vat()); ?>"><?php wc_cart_totals_taxes_total_html(); ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                        <?php do_action('woocommerce_cart_totals_before_order_total'); ?>

                        <tr class="order-total">
                            <td><?php esc_html_e('Total', 'woocommerce'); ?></td>
                            <td data-title="<?php esc_attr_e('Total', 'woocommerce'); ?>"><?php wc_cart_totals_order_total_html(); ?></td>
                        </tr>

                        <?php do_action('woocommerce_cart_totals_after_order_total'); ?>

                    </tbody>
                </table>

            </div>
            <?php if (get_option(WPI_OPTIONS)['invoice-signature'] == 'on') : ?>
                <div class="col-12 text-center">
                    <?php _e('seal and signature', WPI_LANG); ?>
                </div>
            <?php endif; ?>
            <?php if (get_option(WPI_OPTIONS)['invoice-preinvoice-digital-logo']  == 'on') : ?>
                <div class='col-12 text-center'>
                    <img src='<?php echo get_option(WPI_OPTIONS)['invoice-digital-logo']; ?>'>
                </div>
            <?php endif; ?>

            <?php if (get_option(WPI_OPTIONS)['invoice-description'] != null) : ?>
                <div class='col-12 border border-top'>
                    <hr>
                    <span><?php echo get_option(WPI_OPTIONS)['invoice-description']; ?></span>
                </div>
            <?php endif; ?>

        </div>
        <?php
        if (get_option(WPI_OPTIONS)['invoice-random_text'] == 'on') {
            echo "<hr><div class='text-center'>" . wpi_randon_text() . '</div>';
        }
        ?>
    </div>


</div>