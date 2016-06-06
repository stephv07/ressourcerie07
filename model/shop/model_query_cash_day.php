<?php
	$query_parameters = [];
	$where = "WHERE visible > 0 ";
	// Preparation de la requête sql et interrogation de la BDD
	if($_SESSION['site'] != ""){
		$where = $where . "AND site = ? ";
		array_push($query_parameters, $_SESSION['site']);
	}

	$_SESSION['query_bilan'] = 'SELECT * FROM shop ' . $where;
	$_SESSION['parameters'] = $query_parameters;

	$receive_cash_day = $bdd->prepare(
	  'SELECT sale_date,
	  		SUM(cash_float) as sum_cash_float,
	  		SUM(debit) as sum_debit,
	  		SUM(repayment) as sum_repayment,
	  		SUM(donation) as sum_donation,
	  		SUM(object_quantity*object_price) as sum_shop,
	  		(SUM(cash_float) + SUM(debit) + SUM(repayment) + SUM(donation) + SUM(object_quantity*object_price)) as sum_cash_day
	   FROM shop ' .
	   $where . '
	   AND CURDATE() = sale_date
	   GROUP BY sale_date');
	$receive_cash_day->execute($query_parameters);
	$line_cash_day = $receive_cash_day->fetch();

		include('../../views/pages/cash_day/views_cash_day.php');
	
	$receive_cash_day->closeCursor();
?>