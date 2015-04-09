<!DOCTYPE html>

<?php

/** Define and load the Management-Configuration */
define( 'MNG_CONFIG', dirname(__FILE__) . '/mng-config.php' );

require( MNG_CONFIG );


/**  */
define( 'HTML_MNG', MNG_ABSPATH . INCLUDES . '/index.php' );

require( HTML_MNG );
