<?php
    $message = $ERROR_MESS[ $ERROR ];

    $content = "<h1>Erreur</h1>";
    $content .= $PROD ? "<h3>Contactez le webmaster par email: $WEBMST</h3>" : "<h3>Code d'erreur: $ERROR</h3><h4>$message</h4>";

    $title = "Error Page";

    require "gabarit.php";
?>