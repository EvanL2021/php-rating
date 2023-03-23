<?php
    $title = "Suppression avis Avis";

    $content = '
    <h1>Supprimer un avis</h1>

    <form action="index.php?controller=avis-supprimer&id=' . $id . '" method="post">
            <div class="container align-self-center">
                <div class="mb-3" align="center">
                    <label class="form-label" for="Oui">Voulez-vous vraiment supprimer l\'avis n°' . $id . '</label>
                    <br><input type="submit" class="btn btn-primary" name = "Oui" value="Oui">
                    <input type="submit" class="btn btn-primary" name = "Non" value="Non">
                </div>
            </div>
        </form>
    </div>
    ';

    require "gabarit.php";
?>