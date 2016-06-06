<?php
	session_start();
	include('../../model/bdd_connection.php');
	include('../../model/collect/delete_last_collect.php');
	$_SESSION['confirmation_message'] = 'La dernière saisie a bien été supprimée';
	include('../../redirects/to_collect.php');
?>