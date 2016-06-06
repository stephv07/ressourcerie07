<?php
    $delete_user = $bdd->prepare(
       'DELETE FROM sites WHERE id = ?');
    $delete_user->execute([$_POST['id']]);
    $delete_user->closeCursor();

    $_SESSION['confirmation_message'] = "Le site de " . $_SESSION['nom_site'] . " a bien été supprimé";
?>