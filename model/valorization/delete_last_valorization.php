<?php
	$hidden_last_entry = $bdd->prepare(
		   'UPDATE valorization 
			SET visible = 0
			ORDER BY id DESC LIMIT 1
			');
	    $hidden_last_entry->execute();
	    $hidden_last_entry->closeCursor();

	$_SESSION['confirmation_message'] = "Vous avez bien annulé la dernière saisie"
?>