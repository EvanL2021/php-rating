<?php
    require( "views/config.php" );

    if ( !isset( $_GET[ "controller" ] ) ) {
        $stylepage = file_exists( "css/error.css" ) ? "error" : "default";
        $ERROR = 1;
        require( "controllers/error.php" );
        return;
    }

    if ( !file_exists( "controllers/" . $_GET[ "controller" ] . ".php" ) ) {
        $stylepage = file_exists( "css/error.css" ) ? "error" : "default";
        $ERROR = 2;
        require( "controllers/error.php" );
        return;
    }

    $stylepage = file_exists( "css/" . $_GET[ "controller" ] . ".css" ) ? $_GET[ "controller" ] : "default";
    require( "controllers/" . $_GET[ "controller" ] . ".php" );
    return;
?>