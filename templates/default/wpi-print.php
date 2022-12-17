<?php
do_action('wpi_print_init');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <?php do_action('wpi_print_head');?>
</head>
<body <?php wpi_body_class('');?>>
<?php do_action('wpi_print_before_body');?>
<?php do_action('wpi_print_body');?>
<?php do_action('wpi_print_after_body');?>
</body>
</html>