<?php
	session_start();
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=bilan_synthese_vente.csv');
	include('../bdd_connection.php');
 	$output = fopen('php://output', 'w');

 	fputcsv($output, array('Date', 'Nombre total des ventes', 'Poids Total', 'Valeur totale de vente', 'Chiffre d\'affaire', 'Caisse', 'Total des dons', 'Total des prélèvements', 'Total remboursements', 'Fond de caisse', 'Panier Moyen'));

	$rows = $bdd->prepare($_SESSION['query_bilan_2']);
	$rows->execute($_SESSION['parameters']);
		$row = $rows->fetch(PDO::FETCH_ASSOC);
			$print = [strftime('%d/%m/%Y', time()),
						$row['count_order'],
					    $row['total_weight'],
					    round($row['total_price'], 2) . ' €',
					    round($row['total_price'] + $row['total_donation'] + $row['total_repayment'], 2) . ' €',
					    round($row['total_price'] + $row['total_donation'] + $row['total_repayment'] + $row['total_cash_float'] + $row['total_debit'] , 2) . ' €',
					    round($row['total_donation'], 2),
    					round($row['total_debit'], 2),
    					round($row['total_repayment'], 2),
					    round($row['total_cash_float'], 2) . ' €'
					];
	$rows->closeCursor();

	$rows = $bdd->prepare($_SESSION['query_bilan_3']);
	$rows->execute($_SESSION['parameters3']);
		$row = $rows->fetch(PDO::FETCH_ASSOC);
		array_push($print, round($row['average_amount'],2) . ' €');
	$rows->closeCursor();
	fputcsv($output, $print);
	fputcsv($output, array());
	fputcsv($output, array());
	fputcsv($output, array('Catégorie', 'Poids total', 'Pourcentages des poids', 'Montant des ventes','Pourcentage montant des ventes'));
	$rows = $bdd->prepare($_SESSION['query_bilan_4']);
	$rows->execute($_SESSION['parameters3']);
	while($row = $rows->fetch(PDO::FETCH_ASSOC)){
			$print = [
			$row['object_type'],
			round($row['sum_object'], 3) . ' kg ',
			round(($row['sum_object'] * 100)/$_SESSION['sum_weight_for_export'], 2) . '% ',
			round($row['sum_price'], 3) . ' € ',
			round(($row['sum_price'] * 100)/$_SESSION['sum_price_for_export'], 2) . '% '
			];
		fputcsv($output, $print);
	}
	$rows->closeCursor();
	fputcsv($output, array());
	fputcsv($output, array());
	fputcsv($output, array('Catégorie', 'Sous Catégorie', 'Poids total', 'Pourcentages des poids', 'Montant des ventes','Pourcentage montant des ventes'));
	$rows = $bdd->prepare($_SESSION['query_bilan_5']);
	$rows->execute($_SESSION['parameters2']);
	while($row = $rows->fetch(PDO::FETCH_ASSOC)){
			$print = [
				$row['object_type'],
				$row['object_sub_type'],
				round($row['sum_object_subtype'], 3) . ' kg ',
				round(($row['sum_object_subtype'] * 100)/$_SESSION['sum_weight_for_export'], 2) . ' % ',
				round($row['sum_price'], 3) . ' € ',
	   			round(($row['sum_price'] * 100)/$_SESSION['sum_price_for_export'], 2) . '% '
			];
		fputcsv($output, $print);
	}
	$rows->closeCursor();
	fclose($output);
?>
