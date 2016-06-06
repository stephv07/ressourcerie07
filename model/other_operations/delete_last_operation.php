<?php
	$hidden_last_entry = $bdd->prepare(
		   'UPDATE shop 
			SET visible = 0
			WHERE donation != 0 OR repayment != 0 OR cash_float != 0 OR debit != 0
			ORDER BY id DESC LIMIT 1
			');
	    $hidden_last_entry->execute();
	    $hidden_last_entry->closeCursor();

	$_SESSION['confirmation_message'] = "Vous avez bien annulé la dernière saisie";
?>