<?php

/** Define and load the HTML-Configuration */
define( 'MNG_HTML_CONFIG', MNG_ABSPATH . INCLUDES . '/html-config.php' );

require( MNG_HTML_CONFIG );


/** Define and initialize the HTML-Page */
define( 'MNG_HTML_INIT', MNG_ABSPATH . INCLUDES . '/html-init.php' );

require( MNG_HTML_INIT );
