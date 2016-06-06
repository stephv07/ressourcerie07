<?php
	$query_parameters = [];
	$query_parameters2 = [];
	$where2 = "WHERE visible > 0 ";
	$where = "WHERE visible > 0 ";
	// Preparation de la requête sql et interrogation de la BDD
	if($_POST['site'] != ""){
		$where = $where . "AND collect_site = ? ";
		$where2 = $where2 . "AND collect_site = ? ";
		array_push($query_parameters, $_POST['site']);
		array_push($query_parameters2, $_POST['site']);
	}
	// Prise en compte dans la requete sql du type de collecte
	if($_POST['collect_source'] != ""){
		$where = $where . "AND collect_source = ? ";
		$where2 = $where2 . "AND collect_source = ? ";
		array_push($query_parameters, $_POST['collect_source']);
		array_push($query_parameters2, $_POST['collect_source']);
	}

	// Prise en compte dans la requete sql du type d'objet ou sous-type suivant le choix du menu
	if($_POST['object_type'] != ""){
		foreach ($_SESSION['menu_object_type'] as $line) { 
			if($_POST['object_type'] == $line[1]){
				$where = $where . "AND object_type = ? ";
				array_push($query_parameters, $line[1]);
				break;

			} elseif($_POST['object_type'] == $line[3]){
				$where = $where . "AND object_sub_type = ? ";
				array_push($query_parameters, $line[2]);
			}
		}
	}

	if($_POST['date_start'] != "" AND $_POST['date_end'] != ""){
		$where = $where . "AND collect_date BETWEEN ? AND ?";
		$where2 = $where2 . "AND collect_date BETWEEN ? AND ?";
		array_push($query_parameters, $_POST['date_start'], $_POST['date_end']);
		array_push($query_parameters2, $_POST['date_start'], $_POST['date_end']);
	}
	$_SESSION['query_bilan'] = 'SELECT * FROM collects ' . $where;
	$_SESSION['parameters'] = $query_parameters;
	$_SESSION['query_bilan2'] = 'SELECT 
							collect_source, 
							object_type, 
							SUM(object_weight) AS sum_object_collect_source
   							FROM collects ' .
   							$where2 . '
  							GROUP BY object_type, collect_source
   							ORDER BY object_type';
	$_SESSION['query_bilan3'] = 'SELECT 
							object_type, 
							SUM(object_weight) AS sum_object
   							FROM collects ' .
   							$where2 . '
 							GROUP BY object_type';
 	$_SESSION['query_bilan4'] = 'SELECT 
 							object_type, 
 							object_sub_type, 
 							SUM(object_weight) AS sum_object_subtype
							FROM collects ' .
							$where2 . '
	  						GROUP BY object_type, object_sub_type
							ORDER BY object_type';
	$_SESSION['parameters2'] = $query_parameters2;
	include('../../model/collect/query_read_collect_sum_weight.php');
	$_SESSION['SUM'] = $sum['sum'];
?>