<?php
	$read_user_existence = $bdd->prepare(
	   'SELECT id FROM users WHERE user_name = :user_name');
	$read_user_existence->execute(array(
		'user_name' => $_POST['user']
	));
	$user_valid = $read_user_existence->fetch();
?>