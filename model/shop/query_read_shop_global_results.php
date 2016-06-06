<?php
	$receive_shop_total_amount = $bdd->prepare(
	  'SELECT SUM(object_quantity * object_price) AS total_price,
	  		SUM(object_weight) AS total_weight,
			SUM(repayment) AS total_repayment,
			SUM(donation) AS total_donation,
			SUM(cash_float) AS total_cash_float,
			SUM(debit) AS total_debit,
			COUNT(DISTINCT (CASE WHEN id_order > 0 THEN id_order END)) AS count_order
	   FROM shop ' .
	   $where);
	$receive_shop_total_amount->execute($query_parameters);
	$line_shop = $receive_shop_total_amount->fetch();
	$receive_shop_total_amount->closeCursor();

	$read_accounts = $bdd->prepare(
		'SELECT AVG(average.sum_order) as average_amount
		FROM
		(SELECT SUM(object_quantity*object_price) AS sum_order
			FROM shop ' .
			$where4 . '
			GROUP BY id_order) 
		AS average
	');
	$read_accounts->execute($query_parameters4);
	$line_account = $read_accounts->fetch();
	$read_accounts->closeCursor();
?>