<?php

$section = isset( $_GET['section'] ) ? $_GET['section'] : 'index';
$section = $section === 'home' ? 'index' : $section;

if ( file_exists( MNG_ABSPATH . MNG_CONTENT . '/sites/' . $section . '.html' ) ) {
    $file_extension = 'html';
} else if ( file_exists( MNG_ABSPATH . MNG_CONTENT . '/sites/' . $section . '.php' ) ) {
    $file_extension = 'php';
}

if ( isset( $file_extension ) ) {
    $include_path = MNG_ABSPATH . MNG_CONTENT . '/sites/' . $section . '.' . $file_extension;
}

if ( isset( $include_path ) ) {
    include( $include_path );
} else {
    echo '<span style="color: #f00;">An error has occured!</span>';
}
