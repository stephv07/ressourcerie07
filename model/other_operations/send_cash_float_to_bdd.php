<?php
	// Préparation de la requête et envoi des data à la BDD
	$send_cash_float = $bdd->prepare(
	   'UPDATE shop 
	   	SET cash_float = ?,
	   		sale_date = now()
	    WHERE is_cash_float = 1 AND site = ?');
	$send_cash_float->execute([$_POST['cash_float'],$_SESSION['site']]);
	$send_cash_float->closeCursor();
 ?>