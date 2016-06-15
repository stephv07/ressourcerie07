<?php
	session_start();
	// Connexion a la BDD en PDO par l'appel du fichier bdd_connection.php
	include('../../model/bdd_connection.php');

	/*----------------------------------------------------------------------------------------------
	| Hashage du mot de passe saisi sur la page login par l'operateur avec la fonction sha1 + 
	| sallage du mot de passe en ajoutant un z plus la premiere lettre du mot de passe
	----------------------------------------------------------------------------------------------*/
	$user_password = sha1($_POST['user_password'] . 'z' . substr($_POST['user_password'], 0, 1));

	// Controle la validite du login et mdp en faisant une requete a la base de donnees
	include('../../model/login/bdd_read_login.php');

	/*----------------------------------------------------------------------------------------------
	| Si le couple login et mdp est valide ($validation_login n'est pas vide),
	| 	sauvegarde de user_name et site dans des variables de SESSION
	|	chargement des valeurs des differents menu dans des variables de SESSION
	|	redirection à la page d'accueil
	| Sinon, 
	|	controle si le user_name existe en BDD
	|	Si le user_name existe
	|		message d'erreur "mdp incorrect"
	|	Sinon,
	|		message d'erreur "user_name incorrect"
	|	redirection à la page login
	----------------------------------------------------------------------------------------------*/
	if($validation_login){
		$_SESSION['user_name'] = $validation_login['user_name'];
	    $_SESSION['site'] = $validation_login['user_privilege'];
	    include('../../model/format_input_pages/query_all_menu.php');
	    include('../../redirects/to_home.php');
	}else{
		include('../../model/login/bdd_read_user_existence.php');
		$user_valid ? $_SESSION['error_login'] =  'Mot de passe incorrect' : $_SESSION['error_login'] = 'Nom d\'utilisateur incorrect';
		include ("../../redirects/to_index.php");
	}
?>