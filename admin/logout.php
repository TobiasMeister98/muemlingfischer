<?php

unset( $_SESSION );

session_destroy();

header( 'location: ?section=redirect' );
