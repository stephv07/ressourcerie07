<?php
	$hidden_last_entry = $bdd->prepare(
		   'UPDATE shop 
			SET shop.visible = 0
			WHERE shop.id_order = ?
		   ');
	    $hidden_last_entry->execute([$_SESSION['last_order']]);
	    $hidden_last_entry->closeCursor();

	$_SESSION['confirmation_message'] = "Vous avez bien annulée la dernière vente"
?>