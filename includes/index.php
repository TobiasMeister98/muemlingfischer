<?php

/** Define and load the HTML-Configuration */
define( 'HTML_CONFIG', ABSPATH . INCLUDES . '/html-config.php' );

require( HTML_CONFIG );


/** Define and initialize the HTML-Page */
define( 'HTML_INIT', ABSPATH . INCLUDES . '/html-init.php' );

require( HTML_INIT );
