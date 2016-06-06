<?php
	$query_parameters = [];
	$query_parameters2 = [];
	$query_parameters3 = [];
	$query_parameters4 = [];
	$where = "WHERE visible > 0 ";
	$where2 = "WHERE visible > 0 ";
	$where3 = "WHERE visible > 0 AND id_order > 0 ";
	$where4 = "WHERE visible > 0 AND id_order != 0 ";

	
	// Preparation de la requête sql et interrogation de la BDD
	if($_POST['site'] != ""){
		$where = $where . "AND site = ? ";
		array_push($query_parameters, $_POST['site']);
		$where2 = $where2 . "AND site = ? ";
		array_push($query_parameters2, $_POST['site']);
		$where3 = $where3 . "AND site = ? ";
		array_push($query_parameters3, $_POST['site']);
		$where4 = $where4 . "AND site = ? ";
		array_push($query_parameters4, $_POST['site']);

	}

	// Prise en compte dans la requete sql du type d'objet ou sous-type suivant le choix du menu
	if($_POST['object_type'] != ""){
		foreach ($_SESSION['menu_shop_type'] as $line) { 
			if($_POST['object_type'] == $line[1]){
				$where = $where . "AND object_type = ? ";
				array_push($query_parameters, $line[1]);
				break;

			} elseif($_POST['object_type'] == $line[3]){
				$where = $where . "AND object_sub_type = ? ";
				array_push($query_parameters, $line[2]);
			}
		}
	}

	// Prise en compte dans la requete sql du type de shop ou sous-type suivant le choix du menu
	if($_POST['payment_type'] != ""){
		$where = $where . "AND payment_type = ? ";
		array_push($query_parameters, $_POST['payment_type']);
		$where2 = $where2 . "AND payment_type = ? ";
		array_push($query_parameters2, $_POST['payment_type']);
		$where3 = $where3 . "AND payment_type = ? ";
		array_push($query_parameters3, $_POST['payment_type']);
		$where4 = $where4 . "AND payment_type = ? ";
		array_push($query_parameters4, $_POST['payment_type']);
	}

	if($_POST['date_start'] != "" AND $_POST['date_end'] != ""){
		$where = $where . "AND sale_date BETWEEN ? AND ?";
		array_push($query_parameters, $_POST['date_start'], $_POST['date_end']);
		$where2 = $where2 . "AND sale_date BETWEEN ? AND ?";
		array_push($query_parameters2, $_POST['date_start'], $_POST['date_end']);
		$where3 = $where3 . "AND sale_date BETWEEN ? AND ?";
		array_push($query_parameters3, $_POST['date_start'], $_POST['date_end']);
		$where4 = $where4 . "AND sale_date BETWEEN ? AND ?";
		array_push($query_parameters4, $_POST['date_start'], $_POST['date_end']);
	}
	$_SESSION['query_bilan'] = 'SELECT * FROM shop ' . $where;

	$_SESSION['query_bilan_2'] = 'SELECT 
			SUM(object_quantity * object_price) AS total_price,
	  		SUM(object_weight) AS total_weight,
			SUM(repayment) AS total_repayment,
			SUM(donation) AS total_donation,
			SUM(cash_float) AS total_cash_float,
			SUM(debit) AS total_debit,
			COUNT(DISTINCT (CASE WHEN id_order > 0 THEN id_order END)) AS count_order
	   FROM shop ' .
   $where;

	$_SESSION['query_bilan_3'] = 'SELECT AVG(average.sum_order) as average_amount
		FROM
			(SELECT SUM(object_quantity*object_price) AS sum_order
			FROM shop ' .
			$where4 . '
			GROUP BY id_order) 
		AS average
	   ';
	$_SESSION['query_bilan_4'] = 'SELECT 
	   object_type, 
	   SUM(object_weight) AS sum_object, 
	   SUM(object_price * object_quantity) AS sum_price
	   FROM shop ' .
	   $where3 .
	 ' GROUP BY object_type';

	$_SESSION['query_bilan_5'] = 'SELECT 
		object_type, 
		object_sub_type, 
		SUM(object_weight) AS sum_object_subtype, 
		SUM(object_price * object_quantity) AS sum_price
	FROM shop ' .
	$where3 .
  ' GROUP BY object_type, object_sub_type
	ORDER BY object_type';

	$_SESSION['parameters'] = $query_parameters;
	$_SESSION['parameters2'] = $query_parameters3;
	$_SESSION['parameters3'] = $query_parameters4;

	include('../../model/shop/query_read_sum_shop.php');
	include('../../model/shop/query_read_shop_global_results.php');

	$_SESSION['sum_weight_for_export'] = $sum['sum'];
	$_SESSION['sum_price_for_export'] = $sum['sum2'];
?>