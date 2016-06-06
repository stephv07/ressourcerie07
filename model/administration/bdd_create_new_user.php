<?php
	$create_new_user = $bdd->prepare(
	   'INSERT INTO users(user_name, user_password, user_privilege) VALUES(:user_name, :user_password, :user_privilege)');
	$create_new_user->execute(array(
		'user_name' => $_POST['user_name'],
		'user_password' => $user_password,
		'user_privilege' => $_POST['user_privilege']));
	$create_new_user->closeCursor();

	$_SESSION['confirmation_message'] = "Le compte de " . $_POST['user_name'] . " a bien été ajouté pour le site de " . $_POST['user_privilege'] ;
?>