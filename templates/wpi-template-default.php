<?php global $order;?>
<div class="wpi-preinvoice-content">
    <div class="wpi-preinvoice-head wpi-preinvoice-spacing">
        <div class="wpi-preinvoice-first">
            <?php if (get_option(WPI_OPTIONS)['invoice-logo']) : ?>
                <div class="wpi-preinvoice-logo-img">
                    <img class="wpi-preinvoice-logo" src="<?php echo get_option(WPI_OPTIONS)['invoice-logo']; ?>"/>
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
            <div class="wpi-preinvoice-datetime"><?php _e('date',WPI_LANG);?> :
                <span class="ltr d-inline-block"><?php echo date_i18n(get_option('date_format'), strtotime(date('Y-m-d'))); ?></span></div>
			<?php if (get_option(WPI_OPTIONS)['invoice-preinvoice']) : ?>
            <div class="wpi-preinvoice-order-id">
                <?php _e('Invoice number',WPI_LANG);?>:
                <span><?php echo(wpi_type() == 'order' ? intval($_GET['wpi-id']) : __('Preview Pre Invoice', WPI_LANG)); ?></span>
            </div>
			<?php endif ; ?>
        </div>
    </div>
    <div class="wpi-preinvoice-cat-title">
        <?php echo get_option(WPI_OPTIONS)['invoice-slogan']; ?>
    </div>
    <div class="wpi-preinvoice-contact wpi-preinvoice-spacing">

        <div class="wpi-preinvoice-address-ph">
				<?php if( isset( get_option(WPI_OPTIONS)['invoice-address'] ) ) : ?>

            <div class="wpi-preinvoice-address">
                <?php _e('Address',WPI_LANG);?>:

                <?php echo get_option(WPI_OPTIONS)['invoice-address']; ?>
            </div>
               <?php endif; ?>

            <div class="wpi-preinvoice-tell">
				<?php if( isset( get_option(WPI_OPTIONS)['invoice-cellphone'] ) ) : ?>
                <?php _e('Phone',WPI_LANG);?>:
                <span class="wpi-preinvoice-number"><?php echo get_option(WPI_OPTIONS)['invoice-cellphone']; ?> - <?php echo get_option(WPI_OPTIONS)['invoice-mobile']; ?></span>
               <?php endif; ?>
				<?php if( isset( get_option(WPI_OPTIONS)['invoice-fax'] ) ) : ?>			   
			   &nbsp;<?php _e('Fax',WPI_LANG);?>:
                <span class="wpi-preinvoice-number"> <?php echo get_option(WPI_OPTIONS)['invoice-fax']; ?></span>
               <?php endif; ?>
            </div>

        </div>

        <div class="wpi-preinvoice-address-elec ltr">
			
			<?php if( !empty(get_option(WPI_OPTIONS)['invoice-urlshop']) ) : ?>
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
    <?php if (wpi_type() == 'order' ) { ?>
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
    $th_labels=array(
        __('Row',WPI_LANG),
        __('ID',WPI_LANG),
        __('Explanation',WPI_LANG),
        __('the amount of',WPI_LANG),
        __('Price',WPI_LANG),
        __('Discount',WPI_LANG),
        __('Total',WPI_LANG)
    );
    ?>
    <div class="wpi-preinvoice-order-info wpi-preinvoice-spacing">
        <div class="wpi-preinvoice-order-items">
            <table width="100%" class="wpi-preinvoice-order-table" border="1">
                <thead>
                <tr>
                    <?php $th_row=0; foreach($th_labels as $label ) {
                        if($th_row==5 && wpi_type() != 'cart' ) continue;
                        echo ' <th >'.$label.'</th>';
                        $th_row++; }
                    ?>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1;
                foreach (wpi_have_products($order) as $order_item_id => $order_item) {
                    if (wpi_type() == 'order') {
                        $p_data = $order_item->get_data();
                        $_p_id = $p_data['id'];
                        $_p_title = $p_data['name'];;
                        $_p_quantity = $p_data['quantity'];
                        $_p_total = number_format($p_data['total'] / $_p_quantity);
                        $_p_discount=null;
                        $_p_subtotal = number_format($p_data['subtotal']);

                    } else {
                        $_product = wc_get_product($order_item['data']);
                        $_p_id = $_product->get_id();
                        $_p_title = $_product->get_title();
                        $_p_quantity = $order_item['quantity'];
                        $_p_total = number_format($order_item['data']->get_price());
                        $_p_discount = number_format($order_item['data']->get_regular_price() - $order_item['data']->get_price());
                        $_p_subtotal = number_format($order_item['line_total']);
                    }
                    echo '<tr class="'.($i %2==0  ? "odd" : "even" ) .'">';
                    $td_values=array(
                        $i ,
                        $_p_id ,
                        $_p_title ,
                        $_p_quantity ,
                        $_p_total ,
                        $_p_discount ,
                        $_p_subtotal ,
                    );
                    $td_row=0;
                    foreach($td_values as $td_value ) {
                        if($td_row==5 && wpi_type() != 'cart' ) continue;
                        ?>
                        <td ><span><?php echo $th_labels[$td_row] ;?>: </span> <span><?php echo $td_value;?></span></td>
                        <?php
                        $td_row++; }

                    echo '</tr>';
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="wpi-preinvoice-order-bottom-info">
            <div class="wpi-preinvoice-order-details">
                    <span>
                        <?php _e('Collect the main items',WPI_LANG);?> :<?php echo($i - 1); ?></span>
                <?php if (wpi_type()=='order') { ?>
                    <div class="wpi-preinvoice-order-details-desc col-12">
                        <div><?php _e('Description',WPI_LANG);?> :</div>
                        <div>
                            <?php echo($order->get_customer_note()); ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <div class="wpi-preinvoice-order-calc">
                <table>
                    <tbody>
                    <tr>
                        <td> <?php _e('Taxation',WPI_LANG);?></td>
                        <td> <?php wpi_total_tax($order); ?></td>
                    </tr>
                    <tr>
                        <td> <?php _e('Total',WPI_LANG);?></td>
                        <td> <?php wpi_total($order); ?>
                            &nbsp;
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
<?php if( get_option(WPI_OPTIONS)['invoice-signature'] == 'on' ) : ?>
            <div class="col-12 text-center">
                <?php _e('seal and signature',WPI_LANG);?>				
            </div>
<?php endif ; ?>
<?php if( get_option(WPI_OPTIONS)['invoice-preinvoice-digital-logo']  == 'on'  ) : ?>
			<div class='col-12 text-center'>
				<img src='<?php echo get_option(WPI_OPTIONS)['invoice-digital-logo']; ?>'>
			</div>
<?php endif ; ?>

        </div>
        <?php
        if( get_option(WPI_OPTIONS)['invoice-random_text'] == 'on' ){
            echo "<hr><div class='text-center'>".wpi_randon_text().'</div>';
        }
        ?>
    </div>


</div>