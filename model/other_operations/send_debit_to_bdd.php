<?php
	// Préparation de la requête et envoi des data à la BDD
	$send_total = $bdd->prepare(
	   'INSERT INTO shop(
	   		debit,
	   		site,
	   		sale_date
	   		)
		VALUES(
			:debit,
			:site,
			now())');
	// éxecution de la requête
	$send_total->execute(array(
		'debit'=> $debit,
		'site' => $_SESSION['site']));
	$send_total->closeCursor();
 ?>