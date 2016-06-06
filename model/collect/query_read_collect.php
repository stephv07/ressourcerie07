<?php 
	$receive_collects = $bdd->prepare(
	   'SELECT *
		FROM collects ' .
		$where . '
		ORDER BY id DESC');
	$receive_collects->execute($query_parameters);
	while($line_collects = $receive_collects->fetch()){
		include('../../views/pages/bilan/bilan_results_collect.php');
	}
	$receive_collects->closeCursor();
 ?>