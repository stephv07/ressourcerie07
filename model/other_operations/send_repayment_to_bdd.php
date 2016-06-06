<?php
	// Préparation de la requête et envoi des data à la BDD
	$send_total = $bdd->prepare(
	   'INSERT INTO shop(
	   		repayment,
	   		site,
	   		sale_date
	   		)
		VALUES(
			:repayment,
			:site,
			now())');
	// éxecution de la requête
	$send_total->execute(array(
		'repayment'=> $repayment,
		'site' => $_SESSION['site']));
	$send_total->closeCursor();
 ?>