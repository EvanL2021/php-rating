<?php
    require( "connect-db.php" );
    
    if ( isset( $GLOBALS[ "dbh" ] ) ) {
        function get_avis_by_id( $id ) {
            $query = $GLOBALS[ "dbh" ]->prepare( "SELECT * FROM avis where id = $id" );
            $query->execute();

            return $query->fetchall( PDO::FETCH_ASSOC );
        };
    };
?>