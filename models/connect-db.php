<?php
    global $dbh;

    try {
        require( "config-db.php" );
        $dbh = new PDO( "$DBDRIVER:host=$DBHOST;dbname=$DBNAME", $DBUSER, $DBPASSWORD );
    } catch ( PDOException $error ) {
        $stylepage = file_exists( "css/error.css" ) ? "error" : "default";
        $ERROR = 3;
        require( "controllers/error.php" );
        return;
    }
?>