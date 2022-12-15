<?php

class Zhaket_Guard_SDK {

	/**
     * Your plugin or theme name. It will be used in admin notices
	 * @var mixed
	 */
	private $name;
	/**
     * Registration page slug
	 * @var mixed
	 */
	private $slug;
	/**
     * Parent menu slug
     * More info: https://developer.wordpress.org/reference/functions/add_submenu_page/
	 * @var mixed
	 */
	private $parent_slug;
	/**
     * Your plugin or theme text domain
     * This wil be used to translate Zhaket Guard SDK strings with you theme or plugin translation file
	 * @var mixed
	 */
	private $text_domain;
	/**
     * Name of option that save info
	 * @var mixed
	 */
	private static $option_name;
	/**
     * Your product token in zhaket.com
	 * @var mixed
	 */
	private $product_token;
	/**
     * Zhaket guard API url
	 * @var string
	 */
	public static $api_url = 'guard.zhaket.com/api/';

	/**
     * Single instance of class
	 * @var null
	 */
	private static $instance = null;

	/**
	 * Zhaket_Guard_SDK constructor.
	 */
	public function __construct(array $settings) {

	    // Initial settings
		$defaults = [
			'name'          => '',
			'slug'          => 'zhk_guard_register',
			'parent_slug'   => 'options-general.php',
			'text_domain'   => '',
			'product_token' => '',
			'option_name'   => 'zhk_guard_register_settings'
		];
		foreach ( $settings as $key => $setting ) {
			if( array_key_exists($key, $defaults) && !empty($setting) ) {
				$defaults[$key] = $setting;
			}
		}
		$this->name = $defaults['name'];
		$this->slug = $defaults['slug'];
		$this->parent_slug = $defaults['parent_slug'];
		$this->text_domain = $defaults['text_domain'];
		self::$option_name = $defaults['option_name'];
		$this->product_token = $defaults['product_token'];

		add_action('admin_menu', array($this, 'admin_menu'));

		add_action('wp_ajax_'.$this->slug, array($this, 'wp_starter'));

		add_action('wp_ajax_'.$this->slug.'_revalidate', array($this, 'revalidate_starter'));

		add_action('init', array($this, 'schedule_programs'));

		add_action( $this->slug.'_daily_validator', array($this, 'daily_event') );

		add_action( 'admin_notices', array($this, 'admin_notice') );

	}


	/**
	 * Add submenu page for display registration form
	 */
	public function admin_menu() {
		add_submenu_page(
			$this->parent_slug,
			__('Register version', $this->text_domain),
			__('Register version', $this->text_domain),
			'manage_options',
			$this->slug,
			array($this, 'menu_content')
		);
	}

	/**
	 * Submenu content
	 */
	public function menu_content() {
		$option = get_option(self::$option_name);
		$now = json_decode(get_option($option));
		$starter = (isset($now->starter) && !empty($now->starter)) ? base64_decode($now->starter) : '';
		if( isset($_GET['debugger']) && !empty($_GET['debugger']) && $_GET['debugger'] === 'show' ) {
			$data_show = $option;
		} else {
			$data_show = '';
		}
		?>
        <style>
            form.register_version_form,
            .current_license {
                width: 30%;
                background: #fff;
                margin: 0 auto;
                padding: 20px 30px;
            }
            form.register_version_form  .license_key {
                padding: 5px 10px;
                width: calc( 100% - 100px );
            }

            form.register_version_form button {
                width: 80px;
                text-align: center;
            }

            form.register_version_form .result,
            .current_license .check_result {
                width: 100%;
                padding: 30px 0 15px;
                text-align: center;
                display: none;
            }
            .current_license .check_result {
                padding: 20px 0;
                float: right;
                width: 100%;
            }
            form.register_version_form .result .spinner,
            .current_license .check_result .spinner {
                width: auto;
                background-position: right center;
                padding-right: 30px;
                margin: 0;
                float: none;
                visibility: visible;
                display: none;
            }
            .current_license.waiting .check_result .spinner,
            form.register_version_form .result.show .spinner {
                display: inline-block;
            }
            .current_license {
                width: 40%;
                text-align: center;
            }
            .current_license > .current_label {
                line-height: 25px;
                height: 25px;
                display: inline-block;
                font-weight: bold;
                margin-left: 10px;
            }
            .current_license > code {
                line-height: 25px;
                height: 25px;
                padding: 0 5px;
                color: #c7254e;
                margin-left: 10px;
                display: inline-block;
                -webkit-transform: translateY(2px);
                -moz-transform: translateY(2px);
                -ms-transform: translateY(2px);
                -o-transform: translateY(2px);
                transform: translateY(2px);
            }
            .current_license .action {
                color: #fff;
                line-height: 25px;
                height: 25px;
                padding: 0 5px;
                display: inline-block;
            }
            .current_license .last_check {
                line-height: 25px;
                height: 25px;
                padding: 0 5px;
                display: inline-block;
            }
            .current_license .action.active {
                background: #4CAF50;
            }
            .current_license .action.inactive {
                background: #c7254e;
            }

            .current_license .keys {
                float: right;
                width: 100%;
                text-align: center;
                padding-top: 20px;
                border-top: 1px solid #ddd;
                margin-top: 20px;
            }
            .current_license .keys .wpmlr_revalidate {
                margin-left: 30px;
            }
            .current_license .register_version_form {
                display: none;
                padding: 0;
                float: right;
                width: 80%;
                margin: 20px 10%;
            }
            .zhk_guard_notice {
                background: #fff;
                border: 1px solid rgba(0,0,0,.1);
                border-right: 4px solid #00a0d2;
                padding: 5px 15px;
                margin: 5px;
            }
            .zhk_guard_danger {
                background: #fff;
                border: 1px solid rgba(0,0,0,.1);
                border-right: 4px solid #DC3232;
                padding: 5px 15px;
                margin: 5px;
            }
            .zhk_guard_success {
                background: #fff;
                border: 1px solid rgba(0,0,0,.1);
                border-right: 4px solid #46b450;
                padding: 5px 15px;
                margin: 5px;
            }
            @media (max-width: 1024px) {
                form.register_version_form,
                .current_license {
                    width: 90%;
                }
            }
        </style>
        <div class="wrap wpmlr_wrap" data-show="<?php echo $data_show ?>">
            <h1><?php _e('Register version', $this->text_domain); ?></h1>
			<?php if( isset($now) && !empty($now) ): ?>
                <p><?php _e('You already register your license key. to re validate it, you can use this form.', $this->text_domain); ?></p>
                <div class="current_license">
                    <span class="current_label"><?php _e('Your current license:', $this->text_domain); ?></span>
                    <code><?php echo $starter; ?></code>
                    <div class="action <?php echo ($now->action == 1) ? 'active' : 'inactive'; ?>">
						<?php if( $now->action == 1 ): ?>
                            <span class="dashicons dashicons-yes"></span>
							<?php echo $now->message; ?>
						<?php else: ?>
                            <span class="dashicons dashicons-no-alt"></span>
							<?php echo $now->message; ?>
						<?php endif; ?>
                    </div>
                    <div class="keys">
                        <a href="#" class="button button-primary wpmlr_revalidate" data-key="<?php echo $starter; ?>"><?php _e('Revalidate', $this->text_domain); ?></a>
                        <a href="#" class="button zhk_guard_new_key"><?php _e('Delete and submit another license', $this->text_domain); ?></a>
                    </div>

                    <form action="#" method="post" class="register_version_form">
                        <input type="text" class="license_key" placeholder="<?php _e('New license key', $this->text_domain); ?>">
                        <button class="button button-primary"><?php _e('Register version', $this->text_domain); ?></button>
                        <div class="result">
                            <div class="spinner"><?php _e('Please wait...', $this->text_domain); ?></div>
                            <div class="result_text"></div>
                        </div>
                    </form>

                    <div class="check_result">
                        <div class="spinner"><?php _e('Please wait...', $this->text_domain); ?></div>
                        <div class="result_text"></div>
                    </div>
                    <div class="clear"></div>
                </div>
			<?php else: ?>
                <p><?php _e('Please activate plugin with your license key to all features work.', $this->text_domain); ?></p>
                <form action="#" method="post" class="register_version_form">
                    <input type="text" class="license_key" placeholder="<?php _e('License key', $this->text_domain); ?>">
                    <button class="button button-primary"><?php _e('Register version', $this->text_domain); ?></button>
                    <div class="result">
                        <div class="spinner"><?php _e('Please wait...', $this->text_domain); ?></div>
                        <div class="result_text"></div>
                    </div>
                </form>
			<?php endif; ?>
            <script>
                jQuery(document).ready(function($) {
                    var ajax_url = "<?php echo admin_url('admin-ajax.php'); ?>";
                    jQuery(document).on('submit', '.register_version_form', function(event) {
                        event.preventDefault();
                        var starter = jQuery(this).find('.license_key').val(),
                            thisEl = jQuery(this);
                        thisEl.addClass('waiting');
                        thisEl.find('.result').slideDown(300).addClass('show');
                        thisEl.find('.button').addClass('disabled');
                        thisEl.find('.result_text').slideUp(300).html('');
                        jQuery.ajax({
                            url: ajax_url,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                action: '<?php echo $this->slug; ?>',
                                starter: starter
                            },
                        })
                            .done(function(result) {
                                thisEl.find('.result_text').append(result.data).slideDown(150)
                            })
                            .fail(function(result) {
                                thisEl.find('.result_text').append('<div class="zhk_guard_danger"><?php _e('Something goes wrong please try again.', $this->text_domain); ?></div>').slideDown(150)
                            })
                            .always(function(result) {
                                console.log(result);
                                thisEl.removeClass('waiting');
                                thisEl.find('.result').removeClass('show');
                                thisEl.find('.button').removeClass('disabled');
                            });
                    });

                    $(document).on('click', '.wpmlr_revalidate', function(event) {
                        event.preventDefault();
                        var starter = $(this).data('key'),
                            thisEl = $(this).parents('.current_license');
                        thisEl.addClass('waiting');
                        thisEl.find('.check_result').slideDown(300);
                        thisEl.find('.button').addClass('disabled');
                        thisEl.find('.result_text').slideUp(300).html('');
                        thisEl.find('.register_version_form').slideUp(300)
                        $.ajax({
                            url: ajax_url,
                            type: 'POST',
                            dataType: 'json',
                            data: {
                                action: '<?php echo $this->slug; ?>_revalidate',
                                starter: starter
                            },
                        })
                            .done(function(result) {
                                thisEl.find('.check_result .result_text').append(result.data).slideDown(150)
                            })
                            .fail(function(result) {
                                thisEl.find('.check_result .result_text').append('<div class="wpmlr_danger"><?php _e('Something goes wrong please try again.', $this->text_domain); ?></div>').slideDown(150)
                            })
                            .always(function(result) {
                                thisEl.removeClass('waiting');
                                thisEl.find('.button').removeClass('disabled');
                            });
                    });


                    $(document).on('click', '.zhk_guard_new_key', function(event) {
                        event.preventDefault();
                        var thisEl = $(this).parents('.current_license');
                        thisEl.find('.result_text').slideUp(300).html('');
                        thisEl.find('.register_version_form').slideDown(300)
                    });
                });
            </script>

        </div>
		<?php

	}

	/**
	 *
	 */
	public function wp_starter() {
		$starter = sanitize_text_field($_POST['starter']);
		if( empty($starter) ) {
			wp_send_json_error('<div class="zhk_guard_danger">'.__('Please insert your license code', $this->text_domain).'</div>');
		}

		$private_session = get_option(self::$option_name);
		delete_option($private_session);

		$product_token = $this->product_token;
		$result = self::install($starter, $product_token);
		$output = '';

		if ($result->status=='successful') {
			$rand_key = md5(wp_generate_password(12, true, true));
			update_option(self::$option_name, $rand_key);
			$result = array(
				'starter' => base64_encode($starter),
				'action' => 1,
				'message' => __('License code is valid.', $this->text_domain),
				'timer' => time(),
			);
			update_option($rand_key, json_encode($result));
			$output = '<div class="zhk_guard_success">'.__('Thanks! Your license activated successfully.', $this->text_domain).'</div>';
			wp_send_json_success($output);
		} else {
			if (!is_object($result->message)) {
				$output = '<div class="zhk_guard_danger">'.$result->message.'</div>';
				wp_send_json_error($output);
			} else {
				foreach ($result->message as $message) {
					foreach ($message as $msg) {
						$output .= '<div class="zhk_guard_danger">'.$msg.'</div>';
					}
				}
				wp_send_json_error($output);
			}
		}
	}

	/**
	 * Show admin notice for registration problems
	 */
	public function admin_notice() {
		$private_session = get_option(self::$option_name);
		$now = json_decode(get_option($private_session));
		?>
		<?php if( empty($now) ): ?>
            <div class="notice notice-error">
                <p>
					<?php printf(__( 'To activating your %s please insert you license key', $this->text_domain ), $this->name); ?>
                    <a href="<?php echo admin_url( 'admin.php?page='.$this->slug ); ?>" class="button button-primary"><?php _e('Register Now', $this->text_domain); ?></a>
                </p>
            </div>
		<?php elseif( $now->action != 1 ): ?>
            <div class="notice notice-error">
                <p>
					<?php printf(__( 'There is something wrong with your %s license. please check it.', $this->text_domain ), $this->name); ?>
                    <a href="<?php echo admin_url( 'admin.php?page='.$this->slug ); ?>" class="button button-primary"><?php _e('Check Now', $this->text_domain); ?></a>
                </p>
            </div>
		<?php endif; ?>
		<?php
	}

	/**
	 *  Ajax callback for check license action
	 */
	public function revalidate_starter() {
		$starter = sanitize_text_field($_POST['starter']);
		if( empty($starter) ) {
			wp_send_json_error('<div class="zhk_guard_danger">'.__('Please insert your license code', $this->text_domain).'</div>');
		}

		$result = self::is_valid($starter);
		if ($result->status=='successful') {
			$rand_key = md5(wp_generate_password(12, true, true));
			update_option(self::$option_name, $rand_key);
			$how = array(
				'starter' => base64_encode($starter),
				'action' => 1,
				'message' => $result->message,
				'timer' => time(),
			);
			update_option($rand_key, json_encode($how));
			$output = '<div class="zhk_guard_success">'.__('Thanks! Your license activated successfully.', $this->text_domain).'</div>';
			wp_send_json_success($output);
		} else {
			$rand_key = md5(wp_generate_password(12, true, true));
			update_option(self::$option_name, $rand_key);
			$how = array(
				'starter' => base64_encode($starter),
				'action' => 0,
				'timer' => time(),
			);
			if (!is_object($result->message)) {
				$how['message'] = $result->message;
			} else {
				foreach ($result->message as $message) {
					foreach ($message as $msg) {
						$how['message'] = $msg;
					}
				}
			}
			update_option($rand_key, json_encode($how));
			$output = '<div class="zhk_guard_danger">'.$how['message'].'</div>';
			wp_send_json_success($output);
		}

	}

	/**
	 * Set a schedule event for daily checking
	 */
	public function schedule_programs() {
		if (! wp_next_scheduled ( $this->slug.'_daily_validator' )) {
			wp_schedule_event(time(), 'daily', $this->slug.'_daily_validator');
		}
	}

	/**
	 * Check license status every day
	 */
	public function daily_event() {
		$private_session = get_option(self::$option_name);
		$now = json_decode(get_option($private_session));
		if( isset($now) && !empty($now) ) {
			$starter = (isset($now->starter) && !empty($now->starter)) ? base64_decode($now->starter) : '';
			$result = self::is_valid($starter);
			if( $result != null ) {
				if ($result->status=='successful') {
					delete_option($private_session);
					$rand_key = md5(wp_generate_password(12, true, true));
					update_option(self::$option_name, $rand_key);
					$how = array(
						'starter' => base64_encode($starter),
						'action' => 1,
						'message' => $result->message,
						'timer' => time(),
					);
					update_option($rand_key, json_encode($how));
				} else {

					delete_option($private_session);
					$rand_key = md5(wp_generate_password(12, true, true));
					update_option(self::$option_name, $rand_key);
					$how = array(
						'starter' => base64_encode($starter),
						'action' => 0,
						'timer' => time(),
					);
					if (!is_object($result->message)) {
						$how['message'] = $result->message;
					} else {
						foreach ($result->message as $message) {
							foreach ($message as $msg) {
								$how['message'] = $msg;
							}
						}
					}
					update_option($rand_key, json_encode($how));
				}
			}
		}
	}

	/**
     * Check license status
     * If you want add an interrupt in your plugin or theme simply can use this static method: Zhaket_Guard_SDK::is_activated
     * This will return true or false for license status
	 * @return bool
	 */
	public static function is_activated() {
		$private_session = get_option(self::$option_name);
		$now = json_decode(get_option($private_session));
		if( empty($now) ) {
			return false;
		} elseif($now->action != 1) {
			return false;
		} else {
			return true;
		}
	}

	/**
	 * @param $method
	 * @param array $params
	 *
	 * @return array|mixed|object
	 */
    public static function send_request($method, $params = array(), $https = false)
    {
        $param_string = http_build_query($params);
        $protocol = ($https) ? 'https://' : 'http://';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,
            $protocol . self::$api_url . $method . '?' . $param_string
        );
        $content = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode === 0) {
            if ($https) {
                $message = sprintf(__('your server curl has problem, return code:%s, please ticket to host to fix curl problem for url %s', 'zhaket-guard'), $httpCode, $protocol . self::$api_url);
                return json_decode(json_encode(['status' => 'error', 'message' => $message]));
            } else {
                return self::send_request($method, $params, true);
            }
        }
        return json_decode($content);
    }

	/**
	 * @param $license_token
	 *
	 * @return array|mixed|object
	 */
	public static function is_valid($license_token)	{
		$result = self::send_request('validation-license',array('token'=>$license_token,'domain'=>self::get_host()));
		return $result;
	}

	/**
	 * @param $license_token
	 * @param $product_token
	 *
	 * @return array|mixed|object
	 */
	public static function install($license_token, $product_token) {
		$result = self::send_request('install-license',array('product_token'=>$product_token,'token'=>$license_token,'domain'=>self::get_host()));
		return $result;
	}

	/**
	 * @return string
	 */
	public static function get_host() {
		$possibleHostSources = array('HTTP_X_FORWARDED_HOST', 'HTTP_HOST', 'SERVER_NAME', 'SERVER_ADDR');
		$sourceTransformations = array(
			"HTTP_X_FORWARDED_HOST" => function($value) {
				$elements = explode(',', $value);
				return trim(end($elements));
			}
		);
		$host = '';
		foreach ($possibleHostSources as $source)
		{
			if (!empty($host)) break;
			if (empty($_SERVER[$source])) continue;
			$host = $_SERVER[$source];
			if (array_key_exists($source, $sourceTransformations))
			{
				$host = $sourceTransformations[$source]($host);
			}
		}

		// Remove port number from host
		$host = preg_replace('/:\d+$/', '', $host);
		// remove www from host
		$host = str_ireplace('www.', '', $host);

		return trim($host);
	}

	public static function instance($settings) {
		// Check if instance is already exists
		if(self::$instance == null) {
			self::$instance = new self($settings);
		}
		return self::$instance;
	}

}
add_action('init', function () {
	$settings = [
		'name'          => __( 'Woo Pre Invoice ', WPI_LANG ),
		'slug'          => 'wpi_register',
		'parent_slug'   => 'options-general.php', 
		'text_domain'   => WPI_LANG,
		'product_token' => '2c4f965a-3f83-463a-9a8a-e6d3fdc32529',
		'option_name'   => 'wpi_guard_token'
	];
	Zhaket_Guard_SDK::instance($settings);
});

add_action("init",function (){
	if( !class_exists('Zhaket_Guard_SDK') ){
		wp_die( __('Really ? This Plugin Protected by Zhaket Guardian.' , WPI_LANG ));
	}
	if( Zhaket_Guard_SDK::is_activated() === true ) {
		$include = [
			'customorder',
			'functions',
			'method',
			'vieworder',
			'myaccount',
		];
		foreach( $include as $item ){
			require_once ( WPI_INC_PATH.'/woocommerce/'.WPI_PREFIX.'-woocommerce-'.$item.'.php' );
		}
	}
});