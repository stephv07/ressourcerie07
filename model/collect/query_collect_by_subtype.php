<?php
	$bilan_collect_subtype = $bdd->prepare(
	   'SELECT object_type, object_sub_type, SUM(object_weight) AS sum_object_subtype
		FROM collects ' .
		$where2 .
	  ' GROUP BY object_type, object_sub_type
		ORDER BY object_type');
	$bilan_collect_subtype->execute($query_parameters2);
	while($bilan = $bilan_collect_subtype->fetch()){?>
	<tr>
		<td><?php echo $bilan['object_type'];?></td>
		<td><?php echo $bilan['object_sub_type'];?></td>
		<td><?php echo round($bilan['sum_object_subtype'], 3) . ' kg ' ; ?></td>
		<td><?php echo round(($bilan['sum_object_subtype'] * 100)/$sum['sum'], 2) . ' % '; ?></td>
	</tr>
<?php }
	$bilan_collect_subtype->closeCursor(); ?>