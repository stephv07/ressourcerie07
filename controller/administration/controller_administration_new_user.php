<?php
	session_start();
	include('../../model/bdd_connection.php');
	$token_new_user = true;
		
	// Contrôle saisie nom utilisateur pour l'administration

		if($_POST['user_name'] == ''){
			$_SESSION['error_user_name'] = 'Veuillez saisir un nom d\'utilisateur !';
			$token_new_user  = false;
		}

	// Contrôle saisie mot de passe pour l'administration

		if($_POST['user_password'] == ''){
			$_SESSION['error_user_password'] = 'Veuillez saisir un mot de passe !';
			$token_new_user  = false;
		}

	// Contrôle saisie site pour l'administration

		if($_POST['user_privilege'] == ''){
			$_SESSION['error_user_privilege'] = 'Veuillez choisir un nom de site !';
			$token_new_user  = false;
		}

		if($token_new_user == true){
			$user_password = sha1($_POST['user_password'] . 'z' . substr($_POST['user_password'], 0, 1));
			include('../../model/administration/bdd_create_new_user.php');
		}

	include('../../redirects/to_administration.php');
?>