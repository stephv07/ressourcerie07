<?php 
	session_start();

	include('../../model/bdd_connection.php');
	$token = true;

	if($_POST['cash_float'] == ''){
		$_SESSION['confirmation_message'] = 'Veuillez remplir le champ !';
		$token = false;
	}
	elseif(preg_match("#.[0-9]{3}$#", $_POST['cash_float'])){
		$token = false;
		$_SESSION['confirmation_message'] = "Veuillez saisir un nombre valide !";
	
	}
	if ($token == true) {
		include('../../model/other_operations/send_cash_float_to_bdd.php');
		$_SESSION['confirmation_message'] = "Votre fond de caisse est maintenant de  " . $_POST['cash_float'] . "€ ";
	}
	include('../../redirects/to_other_operations.php');
?>