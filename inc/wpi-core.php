<?php 
$include = [
	'text'
];
foreach( $include as $item )
	include ( WPI_INC_PATH.'/core/'.WPI_PREFIX.'-core-'.$item.'.php' );