<?php
	$save_entry = $bdd->prepare(
	   'SELECT * FROM shop
		WHERE id = ?
		');
    $save_entry->execute([$_POST['id']]);
    $line = $save_entry->fetch();
    $save_entry->closeCursor();
    $total_line = $line['object_price'] * $line['object_quantity'];
    $hidden_entry = $bdd->prepare(
	   'UPDATE shop
		SET visible = 0
		WHERE id = ?
		');
    $hidden_entry->execute([$_POST['id']]);
    $hidden_entry->closeCursor();
?>