<?php
// initialisation du menu "type de valorisation"
	session_start();
	header("Content-Type: text/xml");
	echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

	echo "<list>";

		// Encodage de IdValorizationType avec htmlentities, $_POST["valo"] correspond à un champ de BDD
		$idValorizationType = (isset($_POST["valorization_type"])) ? $_POST["valorization_type"] : NULL;


		if ($idValorizationType) {
			echo "<item name='' />";	// insertion d'une ligne vide au début du chargement du deuxième menu
			foreach ($_SESSION['menu_valorization_type'] as $ligne) { 
				if($ligne[4] != 'filter'){
					echo "<item name=\"" . $ligne[3] . "\" />";	
				}
				elseif($ligne[3] == $idValorizationType){
					echo "<item name=\"" . $ligne[3] . "\" />";	
					
				}
			}
		}

	echo "</list>";
?>