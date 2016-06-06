<?php
    $delete_user = $bdd->prepare(
       'DELETE FROM sites WHERE id = ?');
    $delete_user->execute([$_POST['id']]);
    $delete_user->closeCursor();

    $delete_cash_float = $bdd->prepare(
	   'DELETE FROM shop WHERE is_cash_float = 1 AND site = ?');
    $delete_cash_float->execute([$_SESSION['nom_site']]);
	$delete_cash_float->closeCursor();

    $_SESSION['confirmation_message'] = "Le site de " . $_SESSION['nom_site'] . " a bien été supprimé";
?>