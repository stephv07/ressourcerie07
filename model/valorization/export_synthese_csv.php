<?php
	session_start();
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=bilan_synthese_valorisation.csv');
		include('../bdd_connection.php');
	 	$output = fopen('php://output', 'w');
	 	
	 	fputcsv($output, array('Bilan Valorisation'));
	 	fputcsv($output, array('Filtre recherche')); 
		fputcsv($output, $_SESSION['parameters2']);
		fputcsv($output, array());

		fputcsv($output, array('Catégorie', 'Poids Total', 'Pourcentage'));
		$rows = $bdd->prepare($_SESSION['query_bilan3']);
		$rows->execute($_SESSION['parameters2']);
		while($row = $rows->fetch(PDO::FETCH_ASSOC)){
			$print = [$row['object_type'],
					  round($row['sum_object'], 3) . ' kg',
					  round(($row['sum_object'] * 100)/$_SESSION['SUM'], 2) . ' % '
					 ];
			fputcsv($output, $print);
		}
		fputcsv($output, array('Total', round($_SESSION['SUM'], 3) . ' kg', '100 %'));
		$rows->closeCursor();
		
		fputcsv($output, array());
		fputcsv($output, array()); 

		fputcsv($output, array('Catégorie', 'Type valorisation', 'Poids Total', 'Pourcentage'));
		$rows = $bdd->prepare($_SESSION['query_bilan2']);
		$rows->execute($_SESSION['parameters2']);
		while($row = $rows->fetch(PDO::FETCH_ASSOC)){
			$print = [$row['object_type'],
					  $row['valorization_type'],
					  round($row['sum_object_valotype'], 3) . ' kg',
					  round(($row['sum_object_valotype'] * 100)/$_SESSION['SUM'], 2) . ' % '
					 ];
			fputcsv($output, $print);
		}
		fputcsv($output, array('Total', '', round($_SESSION['SUM'], 3) . ' kg', '100 %'));
		fclose($output);
		$rows->closeCursor();
?>
