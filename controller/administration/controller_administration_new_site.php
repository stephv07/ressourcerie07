<?php
	session_start();
	include('../../model/bdd_connection.php');
	$token_new_site = true;
		
	// Contrôle saisie nom du nouveau site pour l'administration
		if($_POST['site_name'] == ''){
			$_SESSION['error_site_name'] = 'Veuillez saisir un nom de site !';
			$token_new_site  = false;
		}else{
			include('../../model/administration/bdd_create_new_site_with_cash_float.php');
			$_SESSION['confirmation_message'] = 'Le site ' . $_POST['site_name'] . ' a bien été créé';
		}

	include('../../redirects/to_administration.php');
?>