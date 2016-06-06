<?php
	$token_valorization_type = true;

	// formattage du type et du sous type (on éclate la concaténation) pour injection dans la bdd grace au tableau $_SESSION['menu_object_type']
	// initialisé à l'ouverture de la session. On met le sous type à blanc pour ceux qui en n'ont pas
	foreach ($_SESSION['menu_valorization_type'] as $line) { 
		if($_POST['valorization_type'] == $line[3]){ 	// colonne 3 => concatenation du type et sous type
			$valorization_type = $line[1]; 			// colonne 1 => colonne type d'objet
			if(isset($line[2]))	{				// colonne 2 => colonne sous type d'objet
				$valorization_sub_type = $line[2];
			}
			else{
				$valorization_sub_type = '';		
			}
		}
	}
	if(!isset($_POST['valorization_type'])){
		$token_valorization_type = false;
		$_SESSION['error_valorization'] = 'Le type de valorisation est invalide';
	}	
 ?>