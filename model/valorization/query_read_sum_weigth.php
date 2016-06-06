<?php 
	$receive_valorization_total_weight = $bdd->prepare(
	  'SELECT SUM(object_weight) AS total_weight
	   FROM valorization ' .
	   $where);
	$receive_valorization_total_weight->execute($query_parameters);
	$line_valorization = $receive_valorization_total_weight->fetch();
	$receive_valorization_total_weight->closeCursor();

	$total_sum = $bdd->prepare(
	   'SELECT SUM(object_weight) AS sum
		FROM valorization ' .
		$where2);
	$total_sum->execute($query_parameters2);
	$sum = $total_sum->fetch();																																																																																																																																																																																																															
	$total_sum->closeCursor();
 ?>