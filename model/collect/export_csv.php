<?php
	session_start();
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=bilan_collecte.csv');
		include('../bdd_connection.php');
	 	$output = fopen('php://output', 'w');

		fputcsv($output, array('date', 'site', 'Collect', 'Type', 'Sous Type', 'Poids'));

		$rows = $bdd->prepare($_SESSION['query_bilan']);
		$rows->execute($_SESSION['parameters']);
		while($row = $rows->fetch(PDO::FETCH_ASSOC)){
			$print = [strftime('%d/%m/%Y', strtotime($row['collect_date'])),
					  $row['collect_site'],
					  $row['collect_source'],
					  $row['object_type'],
					  $row['object_sub_type'],
					  $row['object_weight']
					 ];
			fputcsv($output, $print);
		}
		fclose($output);
	$rows->closeCursor();
?>