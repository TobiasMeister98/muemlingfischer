<?php

$section = isset( $_GET['section'] ) ? $_GET['section'] : 'index';
$section = $section === 'home' ? 'index' : $section;
$resource = isset( $_GET['resource'] ) ? $_GET['resource'] : null;

if ( $section === 'redirect' ) {
    if ( file_exists( ABSPATH . INCLUDES . '/' . $section . '.php' ) ) {
        $include_path = ABSPATH . INCLUDES . '/' . $section . '.php';
    }
} else if ( $section === 'notloggedin' ) {
    if ( file_exists( ABSPATH . ADMIN . '/' . $section . '.php' ) ) {
        $include_path = ABSPATH . ADMIN . '/' . $section . '.php';
    }
} else {
    if ( $resource === null ) {
        if ( file_exists( ABSPATH . CONTENT . '/sites/' . $section . '.html' ) ) {
            $file_extension = 'html';
        } else if ( file_exists( ABSPATH . CONTENT . '/sites/' . $section . '.php' ) ) {
            $file_extension = 'php';
        }

        if ( isset( $file_extension ) ) {
            $include_path = ABSPATH . CONTENT . '/sites/' . $section . '.' . $file_extension;
        }
    } else if ( $resource === 'auth' ) {
        if ( file_exists( ABSPATH . ADMIN . '/' . $section . '.html' ) ) {
            $file_extension = 'html';
        } else if ( file_exists( ABSPATH . ADMIN . '/' . $section . '.php' ) ) {
            $file_extension = 'php';
        }

        if ( isset( $file_extension ) ) {
            $include_path = ABSPATH . ADMIN . '/' . $section . '.' . $file_extension;
        }
    }
}

if ( isset( $include_path ) ) {
    include( $include_path );
} else {
    echo '<span style="color: #f00;">An error has occured!</span>';
}
