<?php
	session_start();
	include('../../model/bdd_connection.php');

	//Contrôle des données saisies dans la page boutique
	if($_SESSION['articles'] > 0 AND $_SESSION['site'] != 'Administration'){
		for($article = 0; $article  < count($_SESSION['articles']); $article ++){ 
			include('../../model/shop/send_sale_to_bdd.php');
		}
		$_SESSION['confirmation_message'] = 'Votre vente totale de ' . $_SESSION['total'] . ' €' . ' a bien été prise en compte';
	}
	elseif($_SESSION['articles'] == 0){
		$_SESSION['confirmation_message'] = 'Votre panier est vide !';
	}
	elseif($_SESSION['site'] == 'Administration'){
		$_SESSION['confirmation_message'] = 'Vous êtes connecté au compte administrateur qui n\'est relié à aucun site';
	}
	$_SESSION['last_order'] = $_SESSION['id_order'];

	//Desinitialisation des variables de session
	unset($_SESSION['subtype']);
	unset($_SESSION['articles']);
	unset($_SESSION['giving_change']);
	unset($_SESSION['total']);
	unset($_SESSION['id_order']);
	include('../../redirects/to_shop.php');
?>