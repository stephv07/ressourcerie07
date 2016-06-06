<?php
	$receive_valorization = $bdd->prepare(
	  'SELECT *
	   FROM valorization ' .
	   $where . '
	   ORDER BY id DESC');
	$receive_valorization->execute($query_parameters);
	while($line_valorization = $receive_valorization->fetch()){
	    include('../../views/pages/bilan/bilan_results_valorization.php');
	}
	$receive_valorization->closeCursor();
?>