<?php
	// Préparation de la requête et envoi des data à la BDD
	$create_new_sale = $bdd->prepare(
	   'INSERT INTO shop(
	   		id_order,
	   		object_type,
	   		object_sub_type,
	   		object_quantity,
	   		object_price,
	   		object_weight,
			payment_type,
	   		site,
	   		sale_date)
		VALUES(
			:id_order,
			:object_type,
			:object_sub_type,
			:object_quantity,
   			:object_price,
   			:object_weight,
			:payment_type,
   			:site,
			now())');
	// éxecution de la requête
	$create_new_sale->execute(array(
		'id_order' => $_SESSION['articles'][$article]['id_order'],
		'object_type' => $_SESSION['articles'][$article]['type'],
		'object_sub_type' => $_SESSION['articles'][$article]['sub_type'],
		'object_quantity' => $_SESSION['articles'][$article]['quantity'],
		'object_price' => $_SESSION['articles'][$article]['price'],
		'object_weight' => $_SESSION['articles'][$article]['weight'],
		'payment_type'=> $_POST['payment_type'],
		'site' => $_SESSION['site']));
	$create_new_sale->closeCursor();
?>