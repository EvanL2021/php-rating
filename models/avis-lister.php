<?php
    require( "connect-db.php" );
    
    if ( isset( $GLOBALS[ "dbh" ] ) ) {
        function get_avis( $tri = 'id', $max = 5, $offset = 2, $departement = "" ) {
            $query = "";
            if ( ( !isset( $departement ) ) || ( $departement == "" ) ) {
                $query = $GLOBALS[ "dbh" ]->prepare( "SELECT * FROM avis ORDER BY $tri LIMIT :max OFFSET :offset" );
                $query->bindValue( ':max', intval( $max ), PDO::PARAM_INT );
                $query->bindValue( ':offset', intval( $offset ), PDO::PARAM_INT );
            } else {
                $query = $GLOBALS[ "dbh" ]->prepare( "SELECT * FROM avis WHERE departement like :departement ORDER BY $tri LIMIT :max OFFSET :offset" );
                $query->bindValue( ':departement', $departement, PDO::PARAM_STR );
                $query->bindValue( ':max', intval( $max ), PDO::PARAM_INT );
                $query->bindValue( ':offset', intval( $offset ), PDO::PARAM_INT );
            }

            $query->execute();
            $avis = $query->fetchall( PDO::FETCH_ASSOC );

            return $avis;
        };

        function get_departements() {
            $query = $GLOBALS[ "dbh" ]->prepare( "SELECT distinct(departement) FROM avis" );
            $query->execute();
            $departements = $query->fetchall( PDO::FETCH_ASSOC );

            return $departements;
        };

        function count_avis() {
            $query = $GLOBALS[ "dbh" ]->prepare( "SELECT COUNT( * ) FROM avis" );
            $query->execute();
            $nbAvis = $query->fetchall( PDO::FETCH_ASSOC );

            return $nbAvis[ 0 ][ "count" ];
        };
    };
?>