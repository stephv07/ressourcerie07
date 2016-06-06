<?php
    $hidden_entry = $bdd->prepare(
	   'UPDATE valorization 
		SET visible = 0
		WHERE id = ?
		');
    $hidden_entry->execute([$_POST['id']]);
    $hidden_entry->closeCursor();
?>