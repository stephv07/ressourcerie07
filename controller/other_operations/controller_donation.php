<?php 
	session_start();

	include('../../model/bdd_connection.php');
	$token = true;

	if($_POST['donation'] == ''){
		$_SESSION['confirmation_message'] = 'Veuillez remplir le champ !';
		$token = false;
	}
	elseif(preg_match("#.[0-9]{3}$#", $_POST['donation'])){
		$token = false;
		$_SESSION['confirmation_message'] = "Veuillez saisir un nombre valide !";
	
	}
	if ($token == true) {
		include('../../model/other_operations/send_donation_to_bdd.php');
		$_SESSION['confirmation_message'] = "Votre don d'une valeur de " . $_POST['donation'] . "€ a bien été prise en compte";
	}
	include('../../redirects/to_other_operations.php');
?>