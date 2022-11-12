<?php

add_filter( 'woocommerce_payment_gateways', function ( $gateways ) {
    $gateways[] = 'WC_Gateway_WPI';
    return $gateways;
} );

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), function ( $links ) {

    $plugin_links = array(
        '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout&section=wc_wpi' ) . '">' . __( 'Configure', WPI_LANG ) . '</a>'
    );

    return array_merge( $plugin_links, $links );
} );

add_action( 'plugins_loaded', function () {

    if( class_exists('WC_Payment_Gateway') ) {
        class WC_Gateway_WPI extends WC_Payment_Gateway {

            public function __construct() {
                $this->id                 = 'wc_wpi';
                $this->method_title       = __('Pre Invoice', WPI_LANG);
                $this->method_description = __('settings of pre invoice woocommerce', WPI_LANG);
                $this->icon               = apply_filters('WC_WPI_logo', WPI_URL . 'assets/images/bill.png');
                $this->has_fields         = false;
                $this->init_form_fields();
                $this->init_settings();
                $this->title        = $this->get_option( 'title' );
                if(isset(get_option(WPI_OPTIONS)['invoice-is_login']) && !is_user_logged_in()){
                    $this->description  = $this->get_option( 'description-not-logged' );
                }else{
                    $this->description  = $this->get_option( 'description' );
                }
                $this->instructions = $this->get_option( 'instructions', $this->description );

                add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
                add_action( 'woocommerce_thankyou_' . $this->id, array( $this, 'thankyou_page' ) );
                add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
            }

            public function init_form_fields(){
                $this->form_fields = apply_filters('WC_WPI_Config', array(
                    'base_config' => array(
                        'title' => __('Setting Pre Invoice Method', WPI_LANG ),
                        'type' => 'title',
                        'description' => ''
                    ),
                    'enabled' => array(
                        'title' => __('Disable/Enabled', WPI_LANG),
                        'type' => 'checkbox',
                        'label' => __('Active Pre Invoice Method', WPI_LANG),
                        'default' => 'yes',
                        'desc_tip' => true
                    ),
                    'title' => array(
                        'title' => __('Title Method', WPI_LANG),
                        'type' => 'text',
                        'default' => __('Pre Invoice Woocommerce', WPI_LANG),
                        'desc_tip' => true
                    ),
                    'description' => array(
                        'title' => __('Description Method', WPI_LANG ),
                        'type' => 'text',
                        'desc_tip' => true,
                        'description' => __('You can easily register your pre-invoice.', WPI_LANG ),
                        'default' => __('You can easily register your pre-invoice.', WPI_LANG )
                    ),

                    'description-not-logged' => array(
                        'title' => __('Description Method Not Logged', WPI_LANG ),
                        'type' => 'text',
                        'desc_tip' => true,
                        'description' => __('you must be logged.', WPI_LANG ),
                        'default' => __('you must be logged.', WPI_LANG )
                    ),
                    'payment_logo' => array(
                        'title' => __('General Text', WPI_LANG),
                        'type' => 'title',
                        'description' => ''
                    ),
                    'success_massage' => array(
                        'title' => __('Pre Invoice Created.', WPI_LANG),
                        'type' => 'textarea',
                        'default' => __('Tanks for choose WPI Plugin woocommerce', WPI_LANG)
                    ),
                    'failed_massage' => array(
                        'title' => __('Pre Invoice Has been failed', WPI_LANG),
                        'type' => 'textarea',
                        'default' => __('Please contact us administrator', WPI_LANG)
                    )
                ));
                return $this->form_fields;
            }

            public function thankyou_page() {
                if ( $this->instructions ) {
                    echo wpautop( wptexturize( $this->instructions ) );
                }
            }

            public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {

                if ( $this->instructions && ! $sent_to_admin && $this->id === $order->payment_method && $order->has_status( 'on-hold' ) ) {
                    echo wpautop( wptexturize( $this->instructions ) ) . PHP_EOL;
                }
            }

            public function process_payment( $order_id ) {
                if(get_option(WPI_OPTIONS)['invoice-is_login'] && !is_user_logged_in()) {
                    $notice_text = $this->description;
                    $notice_text.='&nbsp;<a href="'.wc_get_page_permalink('myaccount').'">'.__('Login',WPI_LANG) .'</a>';
                    wc_add_notice($notice_text, 'error');
                    return array(
                        'result' 	=> 'failure',

                    );
                }
                $order = wc_get_order( $order_id );

                $order->update_status( 'preinvoice', __( 'Awaiting Pre invoice',WPI_LANG) );

                $order->reduce_order_stock();

                WC()->cart->empty_cart();

                return array(
                    'result' 	=> 'success',
                    'redirect'	=> $this->get_return_url( $order )
                );
            }

        }

    }
} , 11 );