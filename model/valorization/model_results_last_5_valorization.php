<?php
	$receive_last_5_valorization = $bdd->prepare(
	  'SELECT *
	   FROM valorization
	   WHERE visible = 1 AND site = ?
	   ORDER BY id
	   DESC LIMIT 5');
	$receive_last_5_valorization->execute([$_SESSION['site']]);
		while ($id = $receive_last_5_valorization->fetch())
	    {
			include('../../views/pages/valorization/results_last_5_valorization.php');
	    }
	$receive_last_5_valorization->closeCursor();
?>