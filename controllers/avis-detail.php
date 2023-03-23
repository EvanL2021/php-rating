<?php
    require( "models/avis-detail.php" );

    $id = $_GET[ 'id' ];
    
    if ( function_exists( "get_avis_by_id" ) ) {
        if ( isset( $id ) ) {
            $avis = get_avis_by_id( $id );
            $avis = isset( $avis ) ? $avis[ 0 ] : [];
            require( "views/avis-detail.php" );
        } else {
            $ERROR = 4;
            require( "controllers/error.php" );
        }
    };
?>