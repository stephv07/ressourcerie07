<?php
	session_start();
	if(!isset($_SESSION['id_order'])){
		$_SESSION['id_order'] = time();
	}
	if(!isset($_SESSION['articles'])){
		$_SESSION['articles'] = [];
	}
	if ($_POST["object_weight"] == ""){
		$_POST["object_weight"] = "0";
	}
	include('../../model/format_input_pages/presence_input_sale.php');
	include('../../model/format_input_pages/format_input_sale.php');

	if($token_sale == true AND $token_control_input == true){
		foreach ($_SESSION['menu_shop_type'] as $line) { 
			if($_POST['object_type'] == $line[3]){ 	// colonne 3 => concatenation du type et sous type
				$object_type = $line[1]; 			// colonne 1 => colonne type d'objet
				if(isset($line[2]))	{				// colonne 2 => colonne sous type d'objet
					$sub_type = $line[2];
				}
				else{
					$sub_type = '';		
				}
			}
		}
		array_push($_SESSION['articles'], ['type' => $object_type,
										'type_concat' => $_POST['object_type'],
										'sub_type' => $sub_type,
										'quantity' => $_POST['object_quantity'],
										'price' => $_POST['object_price'],
										'weight' => $_POST['object_weight'],
										'id_order' => $_SESSION['id_order']
										]);
	}else{
		$_SESSION['object_type_value'] = $_POST['object_type'];
		$_SESSION['object_quantity_value'] = $_POST['object_quantity'];
		$_SESSION['object_price_value'] = $_POST['object_price'];
		$_SESSION['object_weight_value'] = $_POST['object_weight'];
	}
	include('../../redirects/to_shop.php');
?>