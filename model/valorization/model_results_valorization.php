<?php
    include('../../model/bdd_connection.php');
    if(isset($_POST['site'])) {
        $_SESSION['return_site'] = $_POST['site'];
    }
    if(isset($_POST['date_start'])) {
        $_SESSION['return_date_start'] = $_POST['date_start'];
    }    
    if(isset($_POST['date_end'])) {
        $_SESSION['return_date_end'] = $_POST['date_end'];
    }
	$query_parameters = [];
	$query_parameters2 = [];
	$where = "WHERE visible > 0 ";
	$where2 = "WHERE visible > 0 ";
	// Preparation de la requête sql et interrogation de la BDD
	if($_POST['site'] != ""){
		$where = $where . "AND site = ? ";
		$where2 = $where2 . "AND site = ? ";
		array_push($query_parameters, $_POST['site']);
		array_push($query_parameters2, $_POST['site']);
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

	// Prise en compte dans la requete sql du type de valorization ou sous-type suivant le choix du menu
	if($_POST['valorization_type'] != ""){
		foreach ($_SESSION['menu_valorization_type'] as $line) { 
			if($_POST['valorization_type'] == $line[1]){
				$where = $where . "AND valorization_type = ? ";
				$where2 = $where2 . "AND valorization_type = ? ";
				array_push($query_parameters, $line[1]);
				array_push($query_parameters2, $line[1]);
				break;

			} elseif($_POST['valorization_type'] == $line[3]){
				$where = $where . "AND valorization_sub_type = ? ";
				$where2 = $where2 . "AND valorization_sub_type = ? ";
				array_push($query_parameters, $line[2]);
				array_push($query_parameters2, $line[2]);
			}
		}
	}

	if($_POST['date_start'] != "" AND $_POST['date_end'] != ""){
		$where = $where . "AND valorization_date BETWEEN ? AND ?";
		$where2 = $where2 . "AND valorization_date BETWEEN ? AND ?";
		array_push($query_parameters, $_POST['date_start'], $_POST['date_end']);
		array_push($query_parameters2, $_POST['date_start'], $_POST['date_end']);
	}
	$_SESSION['query_bilan'] = 'SELECT * FROM valorization ' . $where;
	$_SESSION['parameters2'] = $query_parameters2;
	$_SESSION['parameters'] = $query_parameters;
	$_SESSION['query_bilan2'] = 'SELECT 
							object_type, 
							valorization_type, 
							SUM(object_weight) AS sum_object_valotype
   							FROM valorization ' .
   							$where2 . '
 							GROUP BY object_type, valorization_type
   							ORDER BY object_type';
	$_SESSION['query_bilan3'] = 'SELECT 
							object_type, 
							SUM(object_weight) AS sum_object
   							FROM valorization ' .
   							$where2 . '
 							GROUP BY object_type';
	include('../../model/valorization/query_read_sum_weigth.php');
	$_SESSION['SUM'] = $sum['sum'];
	?>

	<!-- <div class="col-md-12">
    <div class="panel-body table table-responsive">
        <table class="table table-bordered">
            <thead>
			   	<tr>
		            <th class="admin-table">Catégorie</th>
		            <th class="admin-table DEA">Sous catégorie</th>
		            <th class="admin-table">Poids total</th>
		            <th class="admin-table">Pourcentage</th>
		        </tr>
				<?php

				$bilan_valorization_subtype = $bdd->prepare(
				  'SELECT object_type, object_sub_type, SUM(object_weight) AS sum_object_subtype
				   FROM valorization ' .
				   $where2 .
				 ' GROUP BY object_type, object_sub_type
				   ORDER BY object_type');
				$bilan_valorization_subtype->execute($query_parameters2);
				   while($bilan = $bilan_valorization_subtype->fetch())
					   {
					   	?>
			   	<tr>
			   		<td><?php echo $bilan['object_type'];?></td>
			   		<td><?php echo $bilan['object_sub_type'];?></td>
			   		<td><?php echo round($bilan['sum_object_subtype'], 3) . ' kg ' ; ?></td>
			   		<td><?php echo round(($bilan['sum_object_subtype'] * 100)/$sum['sum'], 2) . ' % '; ?></td>
			    </tr>
				<?php
				}
		        ?>
	        	<tr>
			   		<th>Total</th>
			   		<th></th>
			   		<th><?php echo round($sum['sum'], 3) . ' kg ' ; ?></th>
			   		<th> 100 % </th>
			    </tr>
            </table>
        </div>
        // $bilan_valorization_subtype->closeCursor();
    </div> -->




