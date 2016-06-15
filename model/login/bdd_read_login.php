<?php
	/*----------------------------------------------------------------------------------------------
	| Preparation et sauvegarde de la requete SQL dans la variable $request_login.
	| L'objet $request_login est alimente avec des valeurs uniquement si les marqueurs :user_name
	| et :user_password sont presents dans la BDD
	----------------------------------------------------------------------------------------------*/
	$request_login = $bdd->prepare(
	   'SELECT * FROM users WHERE user_name = :user_name AND user_password = :user_password');

	// execution de la requete en affectant aux marqueurs les valeurs de $_POST['user'] et $user_password
	$request_login->execute(array(
		'user_name' => $_POST['user'],
		'user_password' => $user_password));

	// si le couple identifiant mdp est present en BDD, stockage de ces derniers dans $validation_login
	$validation_login = $request_login->fetch();

	// libere la connexion au serveur pour d'autres requetes
	$request_login->closeCursor();
?>