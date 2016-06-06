<?php
	$receive_last_5_other_operations = $bdd->prepare(
	  'SELECT *
	   FROM shop
	   WHERE visible = 1 AND site = ? AND id_order = 0 AND is_cash_float = 0
	   ORDER BY id
	   DESC LIMIT 5');
	$receive_last_5_other_operations->execute([$_SESSION['site']]);
		while ($id = $receive_last_5_other_operations->fetch())
	    {
			include('../../views/pages/other_operations/results_last_5_other_operations.php');
	    }
	$receive_last_5_other_operations->closeCursor();
?>