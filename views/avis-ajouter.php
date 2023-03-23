<?php
    $title = "Ajout Avis";

    $content = '<h1>Ajouter un avis</h1>';

    $content .= '
    <div class="container" align="center">
        <form action="index.php?controller=avis-ajouter" method="post">
            <div class="container border border-primary rounded align-self-center">
                <label for="etudiant" class="form-label">NOM/Prenom</br><input class="form-control" name="etudiant" value="';

        if ( isset( $_POST[ "etudiant" ] ) )
            $content .= $_POST[ "etudiant" ];
            
        $content .= '"></br>';

    $content .= '<label for="promo" class="form-label">Promo</br><input class="form-control" name="promo" value="';

    if ( isset( $_POST[ "promo" ] ) )
        $content .= $_POST[ "promo" ];

    $content .= '"></select></br><label for="module" class="form-label">Module</br><input class="form-control" name="module" value="';
    
    if ( isset( $_POST[ "module" ] ) )
        $content .= $_POST[ "module" ];

    $content .= '"></br><label for="commentaire" class="form-label">Votre commentaire</br><input class="form-control" name="commentaire" value="';
    
    if ( isset( $_POST[ "commentaire" ] ) )
        $content .= $_POST[ "commentaire" ];

    $content .= '"></br><label class="form-label" for="note">Votre note</br><input type="number" name="note" class="form-control" value="';
    
    if ( isset( $_POST[ "avis" ] ) )
        $content .= $_POST[ "avis" ];

    $content .= '"></br><label for="departement" class="form-label">Département</br><select name="departement" class="form-control">';

    foreach( $tbl_departements as $dep )
        $content .= '<option value="' . $dep[ "departement" ] . '"> ' . $dep[ "departement" ] . '</option>';

    $content .= '</select>';

    $content .= '
                <br><input type="submit" class="btn btn-primary" value="Envoyer">
            </div>
        </form>
    </div>
    ';

    require "gabarit.php";
?>