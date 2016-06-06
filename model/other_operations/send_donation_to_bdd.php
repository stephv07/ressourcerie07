<?php
	// Préparation de la requête et envoi des data à la BDD
	$send_total = $bdd->prepare(
	   'INSERT INTO shop(
	   		donation,
	   		site,
	   		sale_date
	   		)
		VALUES(
			:donation,
			:site,
			now())');
	// éxecution de la requête
	$send_total->execute(array(
		'donation'=> $_POST['donation'],
		'site' => $_SESSION['site']));
	$send_total->closeCursor();
 ?>