<?php 
add_action('admin_enqueue_scripts', function (){
    $stylesheets = [
		WPI_FILE_PREFIX.'-css'		=> 'css/'.WPI_FILE_PREFIX.'-admin',
		WPI_FILE_PREFIX.'-iransans'	=> 'css/IRANSans',
    ];
    $scripts = [
        WPI_FILE_PREFIX.'-js'		=>'js/'.WPI_FILE_PREFIX.'-admin',       
    ];
    foreach ($stylesheets as $name => $file) {
        wp_enqueue_style($name, esc_url( plugins_url( '/assets/' . $file.'.css', __DIR__ ) ) , array(), WPI_VER, 'all');
    }
    foreach ($scripts as $name => $file) {
        wp_enqueue_script($name, esc_url( plugins_url( '/assets/' . $file.'.js', __DIR__ ) ) , array('jquery'), WPI_VER, true);
    } 
});
add_action('wp_enqueue_scripts', function (){	
    $stylesheets = [
        WPI_FILE_PREFIX.'-css' 		=> 'css/'.WPI_FILE_PREFIX.'-frontend',
    ];
    $scripts = [
        WPI_FILE_PREFIX.'-js'		=>'js/'.WPI_FILE_PREFIX.'-frontend',
    ];
    foreach ($stylesheets as $name => $file) {
        wp_enqueue_style($name, esc_url( plugins_url( '/assets/' . $file.'.css', __DIR__ ) ) , array(), WPI_VER, 'all');

    }
    foreach ($scripts as $name => $file) {
        wp_enqueue_script($name, esc_url( plugins_url( '/assets/' . $file.'.js', __DIR__ ) ) , array('jquery'), $ver, true);
    }
},12);