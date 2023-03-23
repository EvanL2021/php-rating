<?php
    require( "connect-db.php" );
    
    if ( isset( $GLOBALS[ "dbh" ] ) ) {
        function get_avis_by_id( $id ) {
            $query = $GLOBALS[ "dbh" ]->prepare( "SELECT * FROM avis WHERE id = :idavis" );
            $query->bindValue( ':idavis', $id, PDO::PARAM_INT );

            try {
                $query->execute();
                $avis = $query->fetchall( PDO::FETCH_ASSOC );

                return $avis;
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

        function update_avis( $id, $departement = "", $promo = "", $module = "", $etudiant = "", $commentaire = "", $note = 0 ) {
            $query = $GLOBALS[ "dbh" ]->prepare( "UPDATE avis SET departement = :departement, promo = :promo, module = :module, etudiant = :etudiant, commentaire = :commentaire, note = :note, date = CURRENT_DATE WHERE id = :idavis" );
            $query->bindValue( ':departement', $departement, PDO::PARAM_STR );
            $query->bindValue( ':promo', $promo, PDO::PARAM_STR );
            $query->bindValue( ':module', $module, PDO::PARAM_STR );
            $query->bindValue( ':etudiant', $etudiant, PDO::PARAM_STR );
            $query->bindValue( ':commentaire', $commentaire, PDO::PARAM_STR );
            $query->bindValue( ':note', $note, PDO::PARAM_INT );
            $query->bindValue( ':idavis', $id, PDO::PARAM_INT );

            try {
                $query->execute();
                return 0;
            } catch( Exception $e ) {
                print_r( $e );
                return 6;
            }
        }
    };
?>