<?php
    $title = "Détail avis";

    $content = "<div class='d-flex align-items-center justify-content-center'> <div class='col-xs-3 text-center'>";
    $content .= "<h1>Avis n°" . $avis[ 'id' ] . "</h1><br>";
    $content .= "<h4>" . $avis[ 'etudiant' ] . "( " . $avis[ 'promo' ] . " " . $avis[ 'departement' ] . " )</h4>";
    $content .= "<h4>A noté " . $avis[ 'module' ] . "</h3>";

    $content .= '<div id="image" style="width: 125px; margin-left: auto; margin-right: auto">';
    for ( $i = 1; $i <= $avis[ 'note' ]; $i++ )
        $content .= '<img src="images/star.png" width="25", height="25">';
    $content .= "</div>";

    $content .= "<br><h4>Commentaire</h4>";
    $content .= "<textarea disabled rows='5' cols='80'>" . $avis[ 'commentaire' ] . "</textarea><br><br>";
    $content .= "<h6>Créé le " . $avis[ 'date' ] . "</h6></div></div>";

    require "gabarit.php";
?>