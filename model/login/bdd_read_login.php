<?php
	$request_login = $bdd->prepare(
	   'SELECT * FROM users WHERE user_name = :user_name AND user_password = :user_password');
	$request_login->execute(array(
		'user_name' => $_POST['user'],
		'user_password' => $user_password));
	$validation_login = $request_login->fetch();
	$request_login->closeCursor();
?>