<?php
	try
	{
		$bdd = new PDO('mysql:host=193.37.145.62;dbname=resso654787', 'resso654787', 'wDmxfhV6', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	};
?>
