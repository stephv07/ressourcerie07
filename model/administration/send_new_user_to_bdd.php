<?php
	if($user_name == true and $user_password == true and $user_privilige=true){
		// include('../../model/format_input_pages/format_input_administration_new_user.php');

		// Préparation de la requête et envoi des data à la BDD
			$create_new_user = $bdd->prepare(
			   'INSERT INTO users(user_name, user_password, user_privilege) VALUES(:user_name, :user_password, :user_privilege)');
			$create_new_user->execute(array(
				'user_name' => $_POST['user_name'],
				'user_password' => $_POST['user_password'],
				'user_privilege' => $_POST['user_privilege'],
			$create_new_user->closeCursor(),

		// Variable globale permettant d'afficher la confirmation d'envoi à la BDD dans la page view collect
			$_SESSION['confirmation_send_user'] = 'L\'utilisateur ' . $user_name . ' avec le mot de passe ' . $user_password . ' pour le site de ' . $user_privilege . ' a bien été prise en compte';
		}
	}
 ?>