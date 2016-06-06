<?php 
	$receive_shop = $bdd->prepare(
	  'SELECT *
	   FROM shop ' .
	   $where . '
	   ORDER BY sale_date DESC');
	$receive_shop->execute($query_parameters);
	while($line_shop = $receive_shop->fetch())
	    {
	    	include('../../views/pages/bilan/bilan_results_shop.php');
	    }
	$receive_shop->closeCursor();
?>