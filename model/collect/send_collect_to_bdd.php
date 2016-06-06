<?php
	// Préparation de la requête et envoi des data à la BDD
	$create_new_collect = $bdd->prepare(
		'INSERT INTO collects(collect_site, collect_source, object_type, object_sub_type, object_weight, collect_date) 
		 VALUES(:collect_site, :collect_source, :object_type, :object_sub_type, :object_weight, now())');
	$create_new_collect->execute(array(
		'collect_site' => $_SESSION['site'],
		'collect_source' => $_POST['collect_source'],
		'object_type' => $object_type,
		'object_sub_type' => $object_sub_type,
		'object_weight' => $object_weight));
	$create_new_collect->closeCursor();
?>