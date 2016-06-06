<?php
	$total_sum = $bdd->prepare(
	  'SELECT 
	   SUM(object_weight) AS sum, 
	   SUM(object_price * object_quantity) AS sum2
	   FROM shop ' .
	   $where3);
	$total_sum->execute($query_parameters3);
	$sum = $total_sum->fetch();																																																																																																																																																																																																															
	$total_sum->closeCursor();

	$total_sum_donation = $bdd->prepare(
	  'SELECT 
	   SUM(donation) AS sum_donation
	   FROM shop ' .
	   $where2);
	$total_sum_donation->execute($query_parameters2);
	$sum_donation = $total_sum_donation->fetch();																																																																																																																																																																																																															
	$total_sum_donation->closeCursor();
?>