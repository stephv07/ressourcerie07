<?php
    $delete_user = $bdd->prepare(
       'DELETE FROM users WHERE id = ?');
    $delete_user->execute([$_POST['id']]);
    $delete_user->closeCursor();

    $_SESSION['confirmation_message'] = "Le compte utilisateur ". $_SESSION['nom_utilisateur']. " pour le site de ". $_SESSION['nom_site_utilisateur'] ." a bien été supprimé";
?>