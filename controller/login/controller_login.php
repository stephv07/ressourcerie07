<?php
	session_start();
	include('../../model/bdd_connection.php');
	// verification login
		// avec le salage SHA1
		$user_password = sha1($_POST['user_password'] . 'z' . substr($_POST['user_password'], 0, 1));
		include('../../model/login/bdd_read_login.php');
	// initialisation de la session utilisateur et des variables utilisateurs et traitement des erreurs
		if($validation_login){
			$_SESSION['user_name'] = $validation_login['user_name'];
		    $_SESSION['site'] = $validation_login['user_privilege'];

	// Appel des requêtes à la BDD pour sauvegarder dans des tableaux les valeurs des différents menu
	    include('../../model/format_input_pages/query_all_menu.php');
	    include('../../redirects/to_home.php');
		}else{
			include('../../model/login/bdd_read_user_existence.php');
			$user_valid ? $_SESSION['error_login'] =  'Mot de passe incorrect' : $_SESSION['error_login'] = 'Nom d\'utilisateur incorrect';
			include ("../../redirects/to_index.php");
		}
?>