<?php
	session_start();
	include('../../model/bdd_connection.php');
	// contrôle que les menus déroulant et zones de saisies soient renseignés
	include('../../model/format_input_pages/presence_input_data.php');
	// formatage de l'entrée type d'objet collecté en deux champs distinct pour la BDD et contrôle du format champs poids 
	include('../../model/format_input_pages/format_input_collect.php');
	// formatage de l'entrée type d'objet valorisé en deux champs distinct pour la BDD
	include('../../model/format_input_pages/format_input_valorization.php');
	if($token_collect == true and $token_object_type == true and $token_valorization_type == true AND $_SESSION['site'] != 'Administration'){
		// envoi de la valorisation en base de données
		include('../../model/valorization/send_valorization_to_bdd.php');
		// Variable globale permettant d'afficher la confirmation d'envoi à la BDD dans la page view collect
		$_SESSION['confirmation_message'] = 'Votre pesée de ' . $_POST['object_type'] . ' valorisé en ' . $_POST['valorization_type'] . ' pour un poids de ' . $_POST['object_weight'] . 'kg a bien été prise en compte';
	}
	elseif($_SESSION['site'] == 'Administration'){
		$_SESSION['confirmation_message'] = 'Vous êtes connecté au compte administrateur qui n\'est relié à aucun site';
	}
	else{
	// sauvegarde des valeurs précédemment saisie dans les menus
		$_SESSION['object_type_value'] = $_POST['object_type'];
		$_SESSION['valorization_type_value'] = $_POST['valorization_type'];
		$_SESSION['object_weight_value'] = $_POST['object_weight'];
	}
	include('../../redirects/to_valorization.php');
?>