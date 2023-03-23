<?php
    $title = "Modification Avis";

    $content = '<h1>Modifier un avis</h1>';
    
    $content .= '
    <div class="container" align="center">
        <form action="index.php?controller=avis-modifier&id=' . $_REQUEST[ "id" ] . '" method="post">
            <div class="container border border-primary rounded align-self-center">
                <label for="etudiant" class="form-label">NOM/Prenom
                </br><input class="form-control" name="etudiant" value="' . $etudiant . '">

                </br><label for="promo" class="form-label">Promo
                </br><input class="form-control" name="promo" value="' . $promo . '">

                </select></br><label for="module" class="form-label">Module
                </br><input class="form-control" name="module" value="' . $module . '">

                </br><label for="commentaire" class="form-label">Votre commentaire
                </br><input class="form-control" name="commentaire" value="' . $commentaire . '">

                </br><label class="form-label" for="note">Votre note
                </br><input type="number" name="note" class="form-control" value="' . $note . '">

                </br><label for="departement" class="form-label">Département
                </br><select name="departement" class="form-control">';

    foreach( $tbl_departements as $dep ) {
        $content .= '<option value="' . $dep[ "departement" ] . '"';

        if ( $dep[ "departement" ] == $departement )
            $content .= " selected";

        $content .= ' >' . $dep[ "departement" ] . '</option>';
    }

    $content .= '</select>

                <br><input type="submit" class="btn btn-primary" value="Modifier">
            </div>
        </form>
    </div>
    ';

    require "gabarit.php";
?>