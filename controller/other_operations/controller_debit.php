<?php 
	session_start();

	include('../../model/bdd_connection.php');
	$token = true;

	if($_POST['debit'] == ''){
		$_SESSION['confirmation_message'] = 'Veuillez remplir le champ !';
		$token = false;
	}
	elseif(preg_match("#.[0-9]{3}$#", $_POST['debit'])){
		$token = false;
		$_SESSION['confirmation_message'] = "Veuillez saisir un nombre valide !";	
	}

	if ($_POST['debit'] < 0) {
		$debit = $_POST['debit'];
	}
	else {
	$debit = ($_POST['debit'])* -1;
	}

	if ($token == true) {
		include('../../model/other_operations/send_debit_to_bdd.php');
		$_SESSION['confirmation_message'] = "Vous avez prélevé " . ($debit * -1) . "€ de votre caisse";
	}
	include('../../redirects/to_other_operations.php');
?>