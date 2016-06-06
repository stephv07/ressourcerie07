<?php
	$create_new_site = $bdd->prepare(
	   'INSERT INTO sites(site_name) VALUES(:site_name)');
	$create_new_site->execute(array(
		'site_name' => $_POST['site_name']));
	$create_new_site->closeCursor();

	$_SESSION['confirmation_message'] = "Le site " . $_POST['site_name'] . " a bien été ajouté";
?>