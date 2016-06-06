<?php
	$view_cash_float = $bdd->prepare(
	  'SELECT *
	   FROM shop
	   WHERE is_cash_float = 1 AND site = ? AND id_order = 0
	   ');
	$view_cash_float->execute([$_SESSION['site']]);
		while ($id = $view_cash_float->fetch())
	    {
			include('../../views/pages/other_operations/view_cash_float.php');
	    }
	$view_cash_float->closeCursor();
?>