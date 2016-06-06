<?php
	$password = 'tri07connexion';
	$password_sha1 = sha1($password . 'z' . substr($password, 0, 1));
	include('model/bdd_connection.php');
	$create_admin = $bdd->prepare(
	   'INSERT INTO users(user_name, user_password, user_privilege)
		VALUES(:user_name, :user_password, :user_privilege)');
	$create_admin->execute(array(
		'user_name' => 'admin',
		'user_password' => $password_sha1,
		'user_privilege' => 'Administration'));
	$create_admin->closeCursor();
?>