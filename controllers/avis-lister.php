<?php
    require( "models/avis-lister.php" );

    $tri = $_GET[ 'tri' ] ?? 'id';
    $tri = $tri == "" ? 'id': $tri;

    $max = $_GET[ 'max' ] ?? 5;
    $max = $max == "" ? 5 : $max;

    $offset = $_GET[ 'offset' ] ?? 0;
    $offset = $offset == "" ? 0 : $offset;

    $departement = $_GET[ 'departement' ] ?? "";

    $tbl_departements = get_departements();
    $nbAvis = count_avis();
    
    if ( function_exists( "get_avis" ) ) {
        if ( ( $offset > -1 ) && ( $offset <= $nbAvis ) ) {
            $avis = get_avis( $tri, $max, $offset, $departement );
            require( "views/avis-lister.php" );
        } else {
            $ERROR = 5;
            require( "controllers/error.php" );
        }
    };
?>