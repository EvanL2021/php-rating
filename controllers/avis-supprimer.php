<?php
    $id = $_REQUEST[ "id" ];

    if ( isset( $id ) ) {
        if ( $_SERVER[ 'REQUEST_METHOD' ] == "GET" ) { // Premier appel de la page
            require( "views/avis-supprimer.php" );
        } else {
            require( "models/avis-supprimer.php" );

            if ( isset( $_POST[ "Oui" ] ) ) {
                $deletedRows = delete_avis( $id );

                if ( $deletedRows == 1 ) {
                    header( "Location: http://localhost/rating/index.php?controller=avis-lister" );
                } else {
                    $ERROR = 7;
                    require( "controllers/error.php" );
                }
            } else
                header( "Location: http://localhost/rating/index.php?controller=avis-lister" );
        }
    } else {
        $ERROR = 4;
        require( "controllers/error.php" );
    }
?>