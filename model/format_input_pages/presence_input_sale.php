<?php
	$token_sale = true;

	// Contrôle de la saisie de tous les champs pour la page boutique
	if($_POST['object_type'] == ''){
		$_SESSION['error_object'] = 'Veuillez saisir un type d\'objet !';
		$token_sale = false;
	}
	if($_POST['object_quantity'] == ''){
		$_SESSION['error_object_quantity'] = 'Veuillez saisir la quantité !';
		$token_sale = false;
	}
	if($_POST['object_price'] == ''){
		$_SESSION['error_object_price'] = 'Veuillez saisir le prix !';
		$token_sale = false;
	}
?>