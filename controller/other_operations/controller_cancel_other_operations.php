<?php
	session_start();
	include('../../model/bdd_connection.php');
	include('../../model/other_operations/delete_last_operation.php');
	$_SESSION['confirmation_message'] = 'La dernière opération a bien été supprimée';
	include('../../redirects/to_other_operations.php');
?>