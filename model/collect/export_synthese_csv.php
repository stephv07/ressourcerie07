<?php
	session_start();
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=bilan_synthese_collecte.csv');
		include('../bdd_connection.php');
	 	$output = fopen('php://output', 'w');
	 	
	 	fputcsv($output, array('Bilan Collecte')); 
	 	fputcsv($output, array('Filtre recherche')); 
		fputcsv($output, $_SESSION['parameters2']);
		fputcsv($output, array());

		//----------BILAN PAR CATEGORIE-------------------------------------------------
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

		//----------BILAN PAR SOUS CATEGORIE-------------------------------------------------
		fputcsv($output, array('Catégorie', 'Sous Catégorie', 'Poids Total', 'Pourcentage'));
		$rows = $bdd->prepare($_SESSION['query_bilan4']);
		$rows->execute($_SESSION['parameters2']);
		while($row = $rows->fetch(PDO::FETCH_ASSOC)){
			$print = [$row['object_type'],
					  $row['object_sub_type'],
					  round($row['sum_object_subtype'], 3) . ' kg',
					  round(($row['sum_object_subtype'] * 100)/$_SESSION['SUM'], 2) . ' % '
					 ];
			fputcsv($output, $print);
		}
		fputcsv($output, array('Total', '', round($_SESSION['SUM'], 3) . ' kg', '100 %'));
		$rows->closeCursor();
		
		fputcsv($output, array());
		fputcsv($output, array());
		
		//----------BILAN PAR TYPE DE COLLECTE-------------------------------------------------
		fputcsv($output, array('Catégorie', 'Type collecte', 'Poids Total', 'Pourcentage'));
		$rows = $bdd->prepare($_SESSION['query_bilan2']);
		$rows->execute($_SESSION['parameters2']);
		while($row = $rows->fetch(PDO::FETCH_ASSOC)){
			$print = [$row['object_type'],
					  $row['collect_source'],
					  round($row['sum_object_collect_source'], 3) . ' kg',
					  round(($row['sum_object_collect_source'] * 100)/$_SESSION['SUM'], 2) . ' % '
					 ];
			fputcsv($output, $print);
		}
		fputcsv($output, array('Total', '', round($_SESSION['SUM'], 3) . ' kg', '100 %'));
		fclose($output);
		$rows->closeCursor();
?>
