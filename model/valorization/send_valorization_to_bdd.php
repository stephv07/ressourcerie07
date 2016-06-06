<?php
	// Preparation de la requête sql et envoi à la BDD
	$create_new_valorization = $bdd->prepare(
	   'INSERT INTO valorization(
	   		object_type,
	   		object_sub_type,
	   		valorization_type,
	   		valorization_sub_type,
	   		object_weight,
	   		site,
	   		valorization_date)
		VALUES(
			:object_type,
			:object_sub_type,
	   		:valorization_type,
	   		:valorization_sub_type,
			:object_weight,
			:site,
			now())');

	$create_new_valorization->execute(array(
		'object_type' => ($object_type),
		'object_sub_type' => ($object_sub_type),
		'valorization_type' => ($valorization_type),
		'valorization_sub_type' => ($valorization_sub_type),
		'object_weight' => $object_weight,
		'site' => $_SESSION['site']));
	$create_new_valorization->closeCursor();
?>