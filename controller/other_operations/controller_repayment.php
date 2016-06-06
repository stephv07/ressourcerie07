<?php 
	session_start();

	include('../../model/bdd_connection.php');
	$token = true;

	if($_POST['repayment'] == ''){
		$_SESSION['confirmation_message'] = 'Veuillez remplir le champ !';
		$token = false;
	}
	elseif(preg_match("#.[0-9]{3}$#", $_POST['repayment'])){
		$token = false;
		$_SESSION['confirmation_message'] = "Veuillez saisir un nombre valide !";	
	}

	if ($_POST['repayment'] < 0) {
		$repayment = $_POST['repayment'];
	}
	else {
	$repayment = ($_POST['repayment'])* -1;
	}

	if ($token == true) {
		echo $repayment;
		include('../../model/other_operations/send_repayment_to_bdd.php');
		$_SESSION['confirmation_message'] = "Votre remboursement de " . ($repayment * -1) . "€ a bien été prise en compte";
	}
	include('../../redirects/to_other_operations.php');
?>