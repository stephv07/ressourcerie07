<?php
	$bilan_valorization_valotype = $bdd->prepare(
	  'SELECT object_type, valorization_type, SUM(object_weight) AS sum_object_valotype
	   FROM valorization ' .
	   $where2 .
	 ' GROUP BY object_type, valorization_type
	   ORDER BY object_type');
	$bilan_valorization_valotype->execute($query_parameters2);
		while($bilan = $bilan_valorization_valotype->fetch()){?>
			<tr>
				<td><?php echo $bilan['object_type'];?></td>
				<td><?php echo $bilan['valorization_type'];?></td>
				<td><?php echo round($bilan['sum_object_valotype'], 3) . ' kg ' ; ?></td>
				<td><?php echo round(($bilan['sum_object_valotype'] * 100)/$sum['sum'], 2) . ' % '; ?></td>
			</tr><?php
		}
	$bilan_valorization_valotype->closeCursor();
?>