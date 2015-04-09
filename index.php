<!DOCTYPE html>

<?php

/** Define and load the Website-Configuration */
define( 'CONFIG', dirname(__FILE__) . '/pg-config.php' );

require( CONFIG );


/** 
 * Define and load the Website-Info-Page
 * Fetch Website-Title from database
 */
define( 'INFO', ABSPATH . 'pg-info.php' );

require( INFO );


/** Initialize the session */
session_start();


/** Initialize the main panel */
define( 'PANEL', ABSPATH . 'panel.php' );

require( PANEL );
