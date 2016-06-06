<?php
	// controle du poids saisi
	// remplacer les virgules par des points dans le champs de saisi des poids
	$object_weight = preg_replace('([,])', '.', $_POST['object_weight']);
	$token_control_input = true;

	// controle que le champ de saisi des poids soit bien des valeurs comprisent entre 0 et 9
	if(preg_match("#^[0-9][0-9.]{0,9}$#", $object_weight) AND substr($object_weight, -1,1) != '.'){
		$object_weight = floatval($object_weight);
	}
	else{
		$token_control_input = false;
		if($_POST['object_weight'] != ''){
			$_SESSION['error_object_weight'] = 'Poids invalide';
		}
	}
	// controle du prix saisi
	// remplacer les virgules par des points dans le champs de saisi des poids
	$object_price = preg_replace('([,])', '.', $_POST['object_price']);

	// controle que le champ de saisi des poids soit bien des valeurs comprisent entre 0 et 9
	if(preg_match("#^[0-9][0-9.]{0,9}$#", $object_price) AND substr($object_price, -1,1) != '.'){
	$object_price = floatval($object_price);
	}
	else{
		$token_object_price = false;
		if($_POST['object_price'] != ''){
			$_SESSION['error_object_price'] = 'Prix invalide';
		}
	}
?>