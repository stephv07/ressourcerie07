<?php
	$token_collect = true;
	
	// Contrôle des données saisies pour la collecte
	if($_SESSION['nav'] == 'collect'){
		if($_POST['collect_source'] == ''){
			$_SESSION['error_collect'] = 'Veuillez saisir la source de collecte !';
			$token_collect = false;
		}
	}
	// Contrôle des données saisies pour la valorisation
	elseif($_SESSION['nav'] == 'valorization'){
		if($_POST['valorization_type'] == ''){
			$_SESSION['error_valorization'] = 'Veuillez saisir un type de valorisation !';
			$token_collect = false;
		}
	}

	// Contrôle des données communes à la collecte et valorisation
	if($_POST['object_type'] == ''){
		$_SESSION['error_object'] = 'Veuillez saisir un type d\'objet !';
		$token_collect = false;
	}
	if($_POST['object_weight'] == ''){
		$_SESSION['error_object_weight'] = 'Veuillez saisir le poids de la collecte !';
		$token_collect = false;
	}
?>