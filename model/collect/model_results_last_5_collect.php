<?php
	$receive_last_5_collects = $bdd->prepare(
	  'SELECT *
	   FROM collects
	   WHERE visible = 1 AND collect_site = ?
	   ORDER BY id
	   DESC LIMIT 5');
	$receive_last_5_collects->execute([$_SESSION['site']]);
		while ($id = $receive_last_5_collects->fetch())
	    {
			include('../../views/pages/collect/results_last_5_collect.php');
	    }
	$receive_last_5_collects->closeCursor();
?>