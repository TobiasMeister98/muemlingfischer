<?php

// ** USER CONFIGURATION ** //

// ** MySQL-Settings ** //
/** The name of the database for this website */
define( 'DB_NAME', 'muemlingfischer' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'DvsK*12G' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

// ** END OF USER CONFIGURATION! ** //

// ** PATH-Declarations */
/** Define Site-URL */
define( 'SITEURL', 'http://' . $_SERVER['HTTP_HOST'] . '/muemlingfischer' );

/** Absolute path to this directory. */
if ( !defined('ABSPATH') )
	define( 'ABSPATH', dirname(__FILE__) . '/' );

/** Sets up vars and included files */
require_once( ABSPATH . 'pg-settings.php' );
