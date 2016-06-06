 <?php
	session_start();
	include('../../model/bdd_connection.php');
	//Contrôle des données saisies pour la collecte
	include('../../model/format_input_pages/presence_input_data.php');
	include('../../model/format_input_pages/format_input_collect.php');

	// envoi de la collecte en base de données
	if($token_collect == true AND $token_object_type == true AND $_SESSION['site'] != 'Administration'){
		include('../../model/collect/send_collect_to_bdd.php');
	// Variable globale permettant d'afficher la confirmation d'envoi à la BDD dans la page view collect
		$_SESSION['confirmation_message'] = 'Votre pesée de ' . $object_weight . 'kg de ' . $object_type . ' ' . $object_sub_type . ' a bien été prise en compte';
	}
	elseif($_SESSION['site'] == 'Administration'){
		$_SESSION['confirmation_message'] = 'Vous êtes connecté au compte administrateur qui n\'est relié à aucun site';
	}
	else{
	// sauvegarde des valeurs précédemment saisie dans les menus
		$_SESSION['collect_source_value'] = $_POST['collect_source'];
		$_SESSION['object_type_value'] = $_POST['object_type'];
		$_SESSION['object_weight_value'] = $_POST['object_weight'];
	}
	include('../../redirects/to_collect.php');
?>