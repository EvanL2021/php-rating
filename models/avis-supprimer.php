<?php
    require( "connect-db.php" );
    
    if ( isset( $GLOBALS[ "dbh" ] ) ) {
        function delete_avis( $id ) {
            if ( isset( $id ) ) {
                $query = $GLOBALS[ "dbh" ]->prepare( "DELETE FROM avis WHERE id = :id_avis" );
                $query->bindValue( ':id_avis', $id, PDO::PARAM_INT );
                $query->execute();
                $rowCount = $query->rowCount();
    
                return $rowCount;
            }
        }
    };
?>