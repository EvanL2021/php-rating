<?php
    require( "connect-db.php" );
    
    if ( isset( $GLOBALS[ "dbh" ] ) ) {
        function add_avis( $departement = "", $promo = "", $module = "", $etudiant = "", $commentaire = "", $note = 0 ) {
            $query = $GLOBALS[ "dbh" ]->prepare( "INSERT INTO avis values( nextval( 'avis_id_seq' ), :departement, :promo, :module, :etudiant, :commentaire, :note, CURRENT_DATE )" );
            $query->bindValue( ':departement', $departement, PDO::PARAM_STR );
            $query->bindValue( ':promo', $promo, PDO::PARAM_STR );
            $query->bindValue( ':module', $module, PDO::PARAM_STR );
            $query->bindValue( ':etudiant', $etudiant, PDO::PARAM_STR );
            $query->bindValue( ':commentaire', $commentaire, PDO::PARAM_STR );
            $query->bindValue( ':note', $note, PDO::PARAM_INT );
            
            try {
                $query->execute();
                return 0;
            } catch( Exception $e ) {
                print_r( $e );
                return 6;
            }
        }

        function get_departements() {
            $query = $GLOBALS[ "dbh" ]->prepare( "SELECT distinct(departement) FROM avis" );
            $query->execute();
            $departements = $query->fetchall( PDO::FETCH_ASSOC );

            return $departements;
        };
    };
?>