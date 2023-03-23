<?php
    if ( $_SERVER[ 'REQUEST_METHOD' ] == "GET" ) { // Premier appel de la page
        require( "models/avis-ajouter.php" );
        $tbl_departements = get_departements();

        require( "views/avis-ajouter.php" );
    } else {
        $FormVals = array( "departement", "promo", "module", "etudiant", "commentaire", "note" );
        $invalidChamps = array();

        foreach( $FormVals as $_ => $champ ) {
            $gotchamp = $_POST[ $champ ];

            if ( !isset( $gotchamp ) ) {
                $ERROR = 4;
                require( "controllers/error.php" );
                break;
            } elseif ( $gotchamp == "" ) {
                array_push( $invalidChamps, "empty " . $champ );
            }

            if ( ( $champ == "note" ) && ( ( $gotchamp > 5 ) || ( $gotchamp < 0 ) ) )
                array_push( $invalidChamps, "invalid note" );
            elseif ( ( $champ == "commentaire" ) && ( strlen( $gotchamp ) < 300 ) )
                array_push( $invalidChamps, "invalid commentaire" );
        }

        require( "models/avis-ajouter.php" );

        if ( sizeof( $invalidChamps ) === 0 ) {
            $inserted = add_avis( $_POST[ "departement" ], $_POST[ "promo" ], $_POST[ "module" ], $_POST[ "etudiant" ], $_POST[ "commentaire" ], $_POST[ "note" ] );

            if ( $inserted == 0 ) {
                header( "Location: http://localhost/rating/index.php?controller=avis-lister" );
            } else {
                $ERROR = $inserted;
                require( "controllers/error.php" );
            }
        } else {
            $tbl_departements = get_departements();
            
            require( "views/avis-ajouter.php" );
        }
    }
?>