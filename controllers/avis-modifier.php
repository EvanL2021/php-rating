<?php
    if ( $_SERVER[ 'REQUEST_METHOD' ] == "GET" ) { // Premier appel de la page
        require( "models/avis-modifier.php" );
        $avis = get_avis_by_id( $_REQUEST[ "id" ] );

        if ( $avis == 6 ) {
            $ERROR = 6;
            require( "controllers/error.php" );
        } else {
            $avis = $avis[ 0 ];
            $tbl_departements = get_departements();

            $etudiant = $avis[ "etudiant" ];
            $promo = $avis[ "promo" ];
            $module = $avis[ "module" ];
            $commentaire = $avis[ "commentaire" ];
            $note = $avis[ "note" ];
            $departement = $avis[ "departement" ];
        }

        require( "views/avis-modifier.php" );
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

        require( "models/avis-modifier.php" );

        if ( sizeof( $invalidChamps ) === 0 ) {
            $modified = update_avis( $_REQUEST[ "id" ], $_POST[ "departement" ], $_POST[ "promo" ], $_POST[ "module" ], $_POST[ "etudiant" ], $_POST[ "commentaire" ], $_POST[ "note" ] );

            if ( $modified == 0 ) {
                header( "Location: http://localhost/rating/index.php?controller=avis-lister" );
            } else {
                $ERROR = $modified;
                require( "controllers/error.php" );
            }
        } else {
            $tbl_departements = get_departements();
            $avis = get_avis_by_id( $_REQUEST[ "id" ] )[ 0 ];
            
            $etudiant = $avis[ "etudiant" ];
            $promo = $avis[ "promo" ];
            $module = $avis[ "module" ];
            $commentaire = $avis[ "commentaire" ];
            $note = $avis[ "note" ];
            $departement = $avis[ "departement" ];

            require( "views/avis-modifier.php" );
        }
    }
?>