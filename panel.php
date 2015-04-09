<?php

/** Define panels */
define( 'HTML_MAIN', ABSPATH . INCLUDES . '/index.php' );
define( 'MNG_PANEL', ABSPATH . ADMIN . '/management/index.php' );

/** Get panel */
$panel = isset( $_GET['panel'] ) ? $_GET['panel'] : null;

/** Require panel */
if ( $panel === 'management' ) {
    require( MNG_PANEL );
} else {
    require( HTML_MAIN );
}
