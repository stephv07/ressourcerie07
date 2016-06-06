<?php
	session_start();
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=bilan_vente.csv');
	include('../bdd_connection.php');
 	$output = fopen('php://output', 'w');

	fputcsv($output, array('Date', 'Site', 'N° de commande', 'Type objet', 'Sous Type', 'Type paiement', 'Poids', 'Prix', 'Fond Caisse', 'Prélèvement', 'Remboursement', 'Dons'));

	$rows = $bdd->prepare($_SESSION['query_bilan']);
	$rows->execute($_SESSION['parameters']);
		while($row = $rows->fetch(PDO::FETCH_ASSOC)){
			$print = [strftime('%d/%m/%Y', strtotime($row['sale_date'])),
					  $row['site'],
					  $row['id_order'],
					  $row['object_type'],
					  $row['object_sub_type'],
					  $row['payment_type'],
					  $row['object_weight'],
					  $row['object_quantity'] * $row['object_price'],
					  $row['cash_float'],
					  $row['debit'],
					  $row['repayment'],
					  $row['donation']
					 ];
			fputcsv($output, $print);
		}
		fclose($output);
	$rows->closeCursor();
?>
