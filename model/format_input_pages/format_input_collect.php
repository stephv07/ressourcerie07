<?php
	// remplacer les virgules par des points dans le champs de saisi des poids
	$object_weight = preg_replace('([,])', '.', $_POST['object_weight']);
	$token_object_type = false;
 
	if($_POST['object_weight'] == 0){
		$_SESSION['error_object_weight'] = 'Poids invalide';
	}
	elseif(intval($_POST['object_weight'] > '10000')){
		$_SESSION['error_object_weight'] = 'Poids maximum fixé à 10 000kg';
	}
	elseif(intval($object_weight < '0.001')){
		$_SESSION['error_object_weight'] = 'Poids minimal fixé à 1g';
	}
	else{

		// controle que le champ de saisi des poids soit bien des valeurs comprisent entre 0 et 9 sinon le poids est invalide
		if(preg_match("#^[0-9][0-9.]{0,9}$#", $object_weight) AND substr($object_weight, -1,1) != '.'){
			$token_object_type = true;
			$object_weight = floatval($object_weight);
		}
		elseif($_POST['object_weight'] != ''){
			$_SESSION['error_object_weight'] = 'Poids invalide';
		}

		// formattage du type et du sous type (on éclate la concaténation) pour injection dans la bdd grace au tableau $_SESSION['menu_object_type']
		// initialisé à l'ouverture de la session. On met le sous type à blanc pour ceux qui en n'ont pas
		foreach ($_SESSION['menu_object_type'] as $line) { 
			if($_POST['object_type'] == $line[3]){ 	// colonne 3 => concatenation du type et sous type
				$object_type = $line[1]; 			// colonne 1 => colonne type d'objet
				if(isset($line[2]))	{				// colonne 2 => colonne sous type d'objet
					$object_sub_type = $line[2];
				}
				else{
					$object_sub_type = '';		
				}
			}		
		}

		if(!isset($_POST['object_type'])){
			$token_object_type = false;
			$_SESSION['error_object'] = 'Le type d\'objet est invalide';
		}
	}
 ?>