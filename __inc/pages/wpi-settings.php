<?php 

function admin_page_settings() {

  $tab = isset($_GET['tab']) ? $_GET['tab'] : null;
  
?>
<div class="wrap">

    <h1> <?php echo __('General',WPI_LANG);?> </h1>

    <nav class="nav-tab-wrapper">
	  
      <a href="?page=<?php echo WPI_FILE_PREFIX; ?>-settings" class="nav-tab <?php if($tab===null):?>nav-tab-active<?php endif; ?>">
		<span class="dashicons dashicons-building"></span>&nbsp;<?php echo __('Settings',WPI_LANG);?> <?php echo __('General',WPI_LANG);?>
	  </a>
	  
	<?php if ( ! defined( 'PWOOSMS_VERSION' ) ) : ?>
      <a href="?page=<?php echo WPI_FILE_PREFIX; ?>-settings&tab=sms" class="nav-tab <?php if($tab==='sms'):?>nav-tab-active<?php endif; ?>">
		<span class="dashicons dashicons-lock"></span>&nbsp;<?php echo __('SMS',WPI_LANG);?>
	  </a>
	<?php endif; ?>

	  
      <a href="<?php echo admin_url( 'admin.php?page=wpi_register' ); ?>" class="nav-tab <?php if($tab==='registration'):?>nav-tab-active<?php endif; ?>">
		<span class="dashicons dashicons-cloud-saved"></span>&nbsp;<?php echo __('Registration',WPI_LANG);?>
	  </a>
	  
    </nav>

	<div class="tab-content">

		<?php 
			switch( $tab ){
				case 'sms' : 
					require 'tabs/wpi-tab-sms.php';
				break;
				default:
					require 'tabs/wpi-tab-information.php';
				break;
			}
		?>
		
	</div>
</div>
  <?php
}

admin_page_settings();
?>