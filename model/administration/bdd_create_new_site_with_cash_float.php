<?php
	$create_new_site = $bdd->prepare(
	   'INSERT INTO sites(site_name) VALUES(:site_name)');
	$create_new_site->execute(array(
		'site_name' => $_POST['site_name']));
	$create_new_site->closeCursor();

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
		'site' => $_POST['site_name']));
	$create_new_cash_float->closeCursor();

	$_SESSION['confirmation_message'] = "Le site " . $_POST['site_name'] . " a bien été ajouté";
?>