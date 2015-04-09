<?php

// ** PATH-Declarations */
/** Define Management-URL */
define( 'MNG_SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/muemlingfischer/admin/management' );

/** Absolute path to this directory. */
if ( !defined('MNG_ABSPATH') )
	define( 'MNG_ABSPATH', dirname(__FILE__) . '/' );

/** Sets up vars and included files */
require_once( MNG_ABSPATH . 'mng-settings.php' );
