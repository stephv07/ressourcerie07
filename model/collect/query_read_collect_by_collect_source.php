<?php
	$bilan_type_collecte = $bdd->prepare(
	  'SELECT collect_source, object_type, SUM(object_weight) AS sum_object_collect_source
	   FROM collects ' .
	   $where2 .
	 ' GROUP BY object_type, collect_source
	   ORDER BY object_type');
	$bilan_type_collecte->execute($query_parameters2);
	while($bilan = $bilan_type_collecte->fetch()){?>
		<tr>
			<td><?php echo $bilan['object_type'];?></td>
			<td><?php echo $bilan['collect_source'];?></td>
			<td><?php echo round($bilan['sum_object_collect_source'], 3) . ' kg ' ; ?></td>
			<td><?php echo round(($bilan['sum_object_collect_source'] * 100)/$sum['sum'], 2) . ' % '; ?></td>
		</tr><?php
	}
	$bilan_type_collecte->closeCursor();
?>