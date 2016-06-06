<?php
	$receive_last_5_shop = $bdd->prepare(
	  'SELECT *
	   FROM shop
	   WHERE visible = 1 AND site = ? AND id_order != 0
	   ORDER BY id
	   DESC LIMIT 5');
	$receive_last_5_shop->execute([$_SESSION['site']]);
		while ($id = $receive_last_5_shop->fetch())
	    {
			include('../../views/pages/shop/results_last_5_shop.php');
	    }
	$receive_last_5_shop->closeCursor();
?>