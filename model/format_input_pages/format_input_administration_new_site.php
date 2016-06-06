<?php
	$site_name = true;
	// Contrôle saisie nom de site pour l'administration
	if($_SESSION['nav'] == 'administration'){
		if($_POST['site_name'] == ''){
			$_SESSION['error_site_name'] = 'Veuillez saisir un nom de site !';
			$user_name = false;
		}
	}
 ?>