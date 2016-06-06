<?php	
	$receive_collects_total_weight = $bdd->prepare(
	   'SELECT SUM(object_weight) AS total_weight
		FROM collects ' .
		$where);
	$receive_collects_total_weight->execute($query_parameters);
	$line_collects = $receive_collects_total_weight->fetch();
	$receive_collects_total_weight->closeCursor();

	$total_sum = $bdd->prepare(
	   'SELECT SUM(object_weight) AS sum
		FROM collects ' .
		$where2);
	$total_sum->execute($query_parameters2);
	$sum = $total_sum->fetch();																																																																																																																																																																																																															
	$total_sum->closeCursor();

?>