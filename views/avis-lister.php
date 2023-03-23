<?php
    $title = "Liste des avis";
    
    $content= '<div class="table-responsive-sm"><table class="table table-hover table-striped table-bordered>"';
    $first = true;
    
    foreach( $avis as $rows ){
        if ( $first ) {
            $content .= "<tr>";

            foreach( $rows as $col => $_ )
                if ( $col != "id" )
                    $content .= "<th class=first><a href=\"index.php?controller=avis-lister&tri=$col\">$col</a></th>";

            $content .= "<th>Action</th>";
            $content .= "</tr>";
            $first = false;
        }
      
        $content .= "<tr>";

        foreach( $rows as $key => $col ) {
            $id = $key == "id" ? $col : $id;

            if ( $key != "id" ) {
                $column = $key != "commentaire" ? $col : substr( $col, 0, 50 ) . ' <a href="index.php?controller=avis-detail&id=' . $id . '">Voir plus</a>';
            
                if ( $key == "note" ) {
                    $column = "";
                    for ( $i = 1; $i <= $col; $i++ )
                        $column .= '<img src="images/star.png" width="25", height="25">';
                }

                $content .= "<td>$column</td>";
            }
        }

        $content .= '<td><a href="index.php?controller=avis-modifier&id=' . $rows[ 'id' ] . '">Modifier</a> / ';
        $content .= '<a href="index.php?controller=avis-supprimer&id=' . $rows[ 'id' ] . '">Supprimer</a></td>';
        $content .= "</tr>";
    }

    $content .= "</table></div>";
    
    $newURLParams = isset( $departement ) ? "&departement=" . $departement : "";
    $newURLParams = isset( $tri ) ? "&tri=" . $tri : "id";

    $maxPage = ceil( $nbAvis / $max );

    $content .= '
    <nav>
        <ul class="nav" id="pageNav">
            <li class="nav-item"><a href="index.php?controller=avis-lister' . $newURLParams . '&offset=' . max( 0, $offset - $max ) . '&max=' . $max . '">Précédent</a></li>
            <li class="nav-item"><a href="index.php?controller=avis-lister' . $newURLParams . '&offset=' . min( $offset + $max, $nbAvis - $max ) . '&max=' . $max . '">Suivant</a></li>';

    for ( $i = 1; $i <= $maxPage; $i++ ) {
        $content .= '<li class="nav-item"><a href="index.php?controller=avis-lister' . $newURLParams . '&offset=' . max( 0, ( $i * $max ) - ( ( $i - 1 ) * $max ) ) . '&max=' . ( $i * $max ) . '">' . $i . '</a></li>';
    }

    $content .= '
            <li class="nav-item"><a href="index.php?controller=avis-lister' . $newURLParams . '&offset=0&max=' . $max . '">Premier</a></li>
            <li class="nav-item"><a href="index.php?controller=avis-lister' . $newURLParams . '&offset=' . max( 0, ( $maxPage * $max ) - ( ( $maxPage - 1 ) * $max ) ) . '&max=' . ( $maxPage * $max ) . '">Dernier</a></li>
        </ul>
    <nav>
    </br></br>';

    $content .= '
    <div class="container">
        <form action="index.php" method="get">
            <input type="hidden" name="controller" value="avis-lister">';
    
    if ( ( isset( $tri ) ) && ( strlen( $tri ) != 0 ) )
        $content .= '<input type="hidden" name="tri" value="' . $tri . '">';

    if ( ( isset( $offset ) ) && ( strlen( $offset ) != 0 ) )
        $content .= '<input type="hidden" name="offset" value="' . $offset . '">';

        $content .= '
            <div class="container border border-primary rounded align-self-center">
                <div class="mb-3">
                    <label for="maxAvis" class="form-label">Nombre maximum d\'avis</label>
                    <input type="number" class="form-control" id="maxAvis" placeholder="5" name="max">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Envoyer">
                </div>
            </div>
        </form>
        <br>
    ';

    $content .= '
        <form action="index.php" method="get">
            <input type="hidden" name="controller" value="avis-lister">';
    
    if ( ( isset( $tri ) ) && ( strlen( $tri ) != 0 ) )
        $content .= '<input type="hidden" name="tri" value="' . $tri . '">';

    if ( ( isset( $offset ) ) && ( strlen( $offset ) != 0 ) )
        $content .= '<input type="hidden" name="offset" value="' . $offset . '">';

    if ( ( isset( $offset ) ) && ( strlen( $offset ) != 0 ) )
        $content .= '<input type="hidden" name="max" value="' . $max . '">';

    $content .= '
            <div class="container border border-primary rounded align-self-center">
                <div class="mb-3">
                    <label for="departement" class="form-label">Filtrer par département</label>
                    <select name="departement" class="form-control">';
    
    foreach( $tbl_departements as $dep )
        $content .= '<option value="' . $dep[ "departement" ] . '"> ' . $dep[ "departement" ] . '</option>';

    $content .= '
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Envoyer">
                </div>
            </div>
        </form>
    </div>
    <br>
    ';

    $content .= '<button id="AddAvis" style="position: absolute; left: 50%; transform: translate( -50%, 0 )" class="btn btn-primary" type="button" onclick="addAvis()">Ajouter un avis</button>';
    $content .= '
    <script>
        function addAvis() {
            let location = document.location;
            document.location.assign( "index.php?controller=avis-ajouter" );
        }
    </script>';

    require "gabarit.php";
?>