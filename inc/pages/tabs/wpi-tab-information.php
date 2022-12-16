<?php
if (isset($_POST['wpi_submit']) || isset($_POST['wpi_reset'])) {
   if (get_option(WPI_OPTIONS)) {
      $wpi_option = get_option(WPI_OPTIONS);
   } else {
      $wpi_option = array();
   }
   if (isset($_POST['wpi_submit'])) {
      $list = [
         'invoice-name'             => $_POST['wpi_services']['invoice-name'],
         'invoice-shopname'         => $_POST['wpi_services']['invoice-shopname'],
         'invoice-logo'             => wpi_logo_url($_FILES['dv-preinvoice-logo']),
         'invoice-digital-logo'     => wpi_logo_url($_FILES['dv-preinvoice-digital-logo']),
         'invoice-slogan'           => $_POST['wpi_services']['invoice-slogan'],
         'invoice-underline'        => $_POST['wpi_services']['invoice-underline'],
         'invoice-cellphone'        => $_POST['wpi_services']['invoice-cellphone'],
         'invoice-mobile'           => $_POST['wpi_services']['invoice-mobile'],
         'invoice-fax'              => $_POST['wpi_services']['invoice-fax'],
         'invoice-email'            => $_POST['wpi_services']['invoice-email'],
         'invoice-address'          => $_POST['wpi_services']['invoice-address'],
         'invoice-urlshop'          => $_POST['wpi_services']['invoice-urlshop'],
         'invoice-is_login'         => isset($_POST['wpi_services']['invoice-is_login']) ? $_POST['wpi_services']['invoice-is_login'] : null,
         'invoice-random_text'      => isset($_POST['wpi_services']['invoice-random_text']) ? $_POST['wpi_services']['invoice-random_text'] :  null,
         'invoice-signature'        => isset($_POST['wpi_services']['invoice-signature']) ? $_POST['wpi_services']['invoice-signature'] :  null,
         'invoice-templates'        => isset($_POST['wpi_services']['invoice-templates']) ? $_POST['wpi_services']['invoice-templates'] :  null,
         'invoice-preinvoice'       => isset($_POST['wpi_services']['invoice-preinvoice']) ? $_POST['wpi_services']['invoice-preinvoice'] :  null,
         'invoice-preinvoice-digital-logo'    => (isset($_POST['wpi_services']['invoice-preinvoice-digital-logo']) ? $_POST['wpi_services']['invoice-preinvoice-digital-logo'] :  null)
      ];
      foreach ($list as $key => $value) {
         $wpi_option[$key] = $value;
      }
   } elseif (isset($_POST['wpi_reset'])) {
      if ($wpi_option) {
         foreach ($wpi_option as $key => $value) {
            if ($key != 'invoice-page_id') {
               $wpi_option[$key] = null;
            }
         }
      }
   }
   if (!empty($wpi_option) && is_array($wpi_option)) {
      update_option(WPI_OPTIONS, $wpi_option);
   }
}

?>
<form enctype="multipart/form-data" method="post">
   <section class="ac-container">
      <div>
         <input id="ac-6" name="accordion-6" type="radio" class='input'>
         <label for="ac-6" class='label'> عناوین اصلی </label>
         <article class="ac-small">
            <div class="dv-form-setting">
               <table class="form-table" role="presentation">
                  <tbody>
                     <tr>
                        <th scope="row">
                           <label for='wpi_services[invoice-name]'> <?php _e('Invoice title', WPI_LANG); ?> </label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-name', __('Sales Invoice', WPI_LANG)); ?>" class="regular-text" id='wpi_services[invoice-name]' name='wpi_services[invoice-name]'>
                        </td>
                        <th scope="row">
                           <label for='wpi_services[invoice-shopname]'> <?php _e('Store Name', WPI_LANG); ?> </label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo   wpi_get_option('invoice-shopname', get_bloginfo('name')); ?>" class="regular-text " id='wpi_services[invoice-shopname]' name='wpi_services[invoice-shopname]'>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <label for='wpi_services[invoice-slogan]'><?php echo __('Slogan', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-slogan', __('Slogan', WPI_LANG)); ?>" class="regular-text " id='wpi_services[invoice-slogan]' name='wpi_services[invoice-slogan]'>
                        </td>
                        <th scope="row">
                           <label for='wpi_services[invoice-underline]'><?php echo __('The text below the logo', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-underline', ''); ?>" class="regular-text " id='wpi_services[invoice-underline]' name='wpi_services[invoice-underline]'>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </article>
      </div>
      <div>
         <input id="ac-1" name="accordion-1" type="radio" class='input'>
         <label for="ac-1" class='label'> عمومی </label>
         <article class="ac-small">
            <div class="dv-form-setting">
               <table class="form-table" role="presentation">
                  <tbody>
                     <tr>
                        <th scope="row">
                           <label for='wpi_services[invoice-templates]'> <?php _e('Invoice Template', WPI_LANG); ?> </label>
                        </th>
                        <td>
                           <select name="wpi_services[invoice-templates]">
                              <option value="-1" disabled>انتخاب کنید</option>
                              <option value="default" <?php echo (wpi_get_option('invoice-templates', '') == 'default') ? 'selected' : ''; ?>> پیشفرض </option>
                              <option value="digikala" <?php echo (wpi_get_option('invoice-templates', '') == 'digikala') ? 'selected' : ''; ?>> دیجیکالا </option>
                           </select>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </article>
      </div>

      <div>
         <input id="ac-2" name="accordion-1" type="radio" class='input'>
         <label for="ac-2" class='label'> اطلاعات شما / شرکت </label>
         <article class="ac-medium">
            <div class="dv-form-setting">
               <table class="form-table" role="presentation">
                  <tbody>
                     <tr>
                        <th scope="row">
                           <label for='wpi_services[invoice-cellphone]'><?php echo __('Company Name', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-cellphone', ''); ?>" class="regular-text wpi-phone-number" id='wpi_services[invoice-cellphone]' name='wpi_services[invoice-cellphone]'>
                           <div>
                              <code><?php echo __('Please put all landlines on one line', WPI_LANG); ?></code>
                           </div>
                        </td>
                        <th scope="row">
                           <label for='wpi_services[invoice-mobile]'><?php echo __('Meli Code Company', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-mobile', ''); ?>" class="regular-text wpi-phone-number " id="wpi_services[invoice-mobile]" name='wpi_services[invoice-mobile]'>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <label for='wpi_services[invoice-cellphone]'><?php echo __('Register Number', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-cellphone', ''); ?>" class="regular-text wpi-phone-number" id='wpi_services[invoice-cellphone]' name='wpi_services[invoice-cellphone]'>
                           <div>
                              <code><?php echo __('Please put all landlines on one line', WPI_LANG); ?></code>
                           </div>
                        </td>
                        <th scope="row">
                           <label for='wpi_services[invoice-mobile]'><?php echo __('Economical number', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-mobile', ''); ?>" class="regular-text wpi-phone-number " id="wpi_services[invoice-mobile]" name='wpi_services[invoice-mobile]'>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <label for='wpi_services[invoice-cellphone]'><?php echo __('Landline phone numbers', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-cellphone', ''); ?>" class="regular-text wpi-phone-number" id='wpi_services[invoice-cellphone]' name='wpi_services[invoice-cellphone]'>
                           <div>
                              <code><?php echo __('Please put all landlines on one line', WPI_LANG); ?></code>
                           </div>
                        </td>
                        <th scope="row">
                           <label for='wpi_services[invoice-mobile]'><?php echo __('Mobile number', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-mobile', ''); ?>" class="regular-text wpi-phone-number " id="wpi_services[invoice-mobile]" name='wpi_services[invoice-mobile]'>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <label for='wpi_services[invoice-fax]'><?php echo __('Fax number', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-fax', ''); ?>" class="regular-text " id='wpi_services[invoice-fax]' name='wpi_services[invoice-fax]'>
                        </td>
                        <th scope="row">
                           <label for="wpi_services[invoice-email]"><?php echo __('Email', WPI_LANG); ?> </label>
                        </th>
                        <td>
                           <input type="text" value="<?php bloginfo('admin_email'); ?>" class="regular-text code" id='wpi_services[invoice-email]' name='wpi_services[invoice-email]'>
                        </td>
                     </tr>
                     <tr>

                        <th scope="row">
                           <label for="wpi_services[invoice-urlshop]"><?php echo __('Website', WPI_LANG); ?> </label>
                        </th>
                        <td>
                           <input type="text" value="<?php echo wpi_get_option('invoice-urlshop', ''); ?>" class="regular-text code" id='wpi_services[invoice-urlshop]' name='wpi_services[invoice-urlshop]'>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <label for='wpi_services[invoice-address]'><?php echo __('Store Location', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <textarea type="text" rows='5' class="regular-text w-100" id='wpi_services[invoice-address]' name='wpi_services[invoice-address]'><?php echo wpi_get_option('invoice-address', ''); ?></textarea>
                        </td>
                        <th scope="row">
                           <label for='wpi_services[invoice-address]'><?php echo __('Description', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <textarea type="text" rows='5' class="regular-text w-100" id='wpi_services[invoice-address]' name='wpi_services[invoice-address]'><?php echo wpi_get_option('invoice-address', ''); ?></textarea>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </article>
      </div>
      <div>
         <input id="ac-3" name="accordion-1" type="radio" class='input'>
         <label for="ac-3" class='label'> تصاویر </label>
         <article class="ac-large">
            <div class="dv-form-setting">
               <table class="form-table" role="presentation">
                  <tbody>
                     <tr>
                        <th scope="row">
                           <label for="dv-preinvoice-logo"><?php echo __('Store Logo', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <div class="dv-logo-row regular-text">
                              <div class="">
                                 <label for="dv-preinvoice-logo" class="button button-primary"><?php echo __('choose New Image', WPI_LANG); ?></label>
                                 <input type="file" id="dv-preinvoice-logo" data-toggle="ImgUp" data-preview-id="dv-preinvoice-logo-preview" name="dv-preinvoice-logo" class="custom-file-input">
                                 <input type="hidden" id="dv-preinvoice-logo-def" name="dv-preinvoice-logo-def" value="<?php
                                                                                                                        echo wpi_get_option('invoice-logo', WPI_URL . 'assets/images/wpi_logo.png'); ?>">
                              </div>
                              <div class="dv-img-preview ">
                                 <img src="<?php echo wpi_get_option('invoice-logo', WPI_URL . 'assets/images/wpi_logo.png'); ?>" id="dv-preinvoice-logo-preview" />
                                 <i data-toggle="removeImg" data-input-id="dv-preinvoice-logo">&times;</i>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <tr>
                        <th scope="row">
                           <label for="dv-preinvoice-digital-logo"> مهر و امضای دیجیتال </label>
                        </th>
                        <td>
                           <div class="dv-logo-row regular-text">
                              <div class="">
                                 <label for="dv-preinvoice-digital-logo" class="button button-primary">
                                    <?php echo __('choose New Image', WPI_LANG); ?>
                                 </label>
                                 <input type="file" id="dv-preinvoice-digital-logo" data-toggle="ImgUp" data-preview-id="dv-preinvoice-digital-logo-preview" name="dv-preinvoice-digital-logo" class="custom-file-input">
                                 <input type="hidden" id="dv-preinvoice-digital-logo-def" name="dv-preinvoice-digital-logo-def" value="<?php echo wpi_get_option('invoice-digital-logo', WPI_URL . 'assets/images/stamp.png'); ?>">
                              </div>

                              <div class="dv-img-preview ">
                                 <img src="<?php echo wpi_get_option('invoice-digital-logo', WPI_URL . 'assets/images/stamp.png'); ?>" id="dv-preinvoice-digital-logo-preview" />
                                 <i data-toggle="removeImg" data-input-id="dv-preinvoice-digital-logo">&times;</i>
                              </div>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </article>
      </div>
      <div>
         <input id="ac-4" name="accordion-1" type="radio" class='input'>
         <label for="ac-4" class='label'> ویژگی ها</label>
         <article class="ac-large">
            <div class="dv-form-setting">
               <table class="form-table" role="presentation">
                  <tbody>
                     <tr>
                        <th scope="row">
                           <label><?php _e('Miscellaneous settings', WPI_LANG); ?></label>
                        </th>
                        <td>
                           <p>
                              <input type="checkbox" name='wpi_services[invoice-is_login]' id="wpi_services[invoice-is_login]" <?php checked(wpi_get_option('invoice-is_login', ''), 'on', true); ?>>
                              <label for="wpi_services[invoice-is_login]"><?php _e('Ability to register a pre-invoice only for site members', WPI_LANG); ?></label>
                           </p>
                           <p>
                              <input type="checkbox" name='wpi_services[invoice-random_text]' id="wpi_services[invoice-random_text]" <?php checked(wpi_get_option('invoice-random_text', ''), 'on', true); ?>>
                              <label for='wpi_services[invoice-random_text]'><?php echo __('Display random sentences', WPI_LANG); ?></label>
                           </p>
                           <p>
                              <input type="checkbox" name='wpi_services[invoice-signature]' id="wpi_services[invoice-signature]" <?php checked(wpi_get_option('invoice-signature', ''), 'on', true); ?>>
                              <label for='wpi_services[invoice-signature]'><?php _e('Place of seal and signature', WPI_LANG); ?></label>
                           </p>
                           <p>
                              <input type="checkbox" name='wpi_services[invoice-preinvoice]' id="wpi_services[invoice-preinvoice]" <?php checked(wpi_get_option('invoice-preinvoice', ''), 'on', true); ?>>
                              <label for='wpi_services[invoice-preinvoice]'><?php _e('Place pre invoice Number', WPI_LANG); ?></label>
                           </p>
                           <p>
                              <input type="checkbox" name='wpi_services[invoice-preinvoice-digital-logo]' id="wpi_services[invoice-preinvoice-digital-logo]" <?php checked(wpi_get_option('invoice-preinvoice-digital-logo', ''), 'on', true); ?>>
                              <label for='wpi_services[invoice-preinvoice-digital-logo]'><?php _e('Place of Digital stamp and signature', WPI_LANG); ?></label>
                           </p>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </article>
      </div>

   </section>
   <p class="wpi_form_actions">
      <input type="submit" name="wpi_submit" id="submit" class="button button-primary" value="<?php echo __('save', WPI_LANG); ?>">
      <input type="submit" name="wpi_reset" id="submit" class="button button-error" value="<?php echo __('reset', WPI_LANG); ?>">
   </p>
</form>