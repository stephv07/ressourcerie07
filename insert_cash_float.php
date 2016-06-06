<?php
//Outil pour inserer un fond de caisse de départ
	include('model/bdd_connection.php');
	$create_new_cash_float = $bdd->prepare(
	   'INSERT INTO shop(
	   			cash_float,
	   			is_cash_float,
	   			visible,
	   			site,
	   			sale_date
	   			)
	   	VALUES(
	   		:cash_float, 
	   		:is_cash_float,
	   		:visible,
	   		:site,
	   		now())');
	$create_new_cash_float->execute(array(
		'cash_float' => 0,
		'is_cash_float' => 1,
		'visible' => 1,
		'site' => "Les Ollières"));
	$create_new_cash_float->closeCursor();
?>