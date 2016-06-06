<?php 
$bilan_vente_subtype = $bdd->prepare(
	'SELECT 
		object_type, 
		object_sub_type, 
		SUM(object_weight) AS sum_object_subtype, 
		SUM(object_price * object_quantity) AS sum_price
	FROM shop ' .
	$where3 .
  ' GROUP BY object_type, object_sub_type
	ORDER BY object_type');
$bilan_vente_subtype->execute($query_parameters3);

while($bilan = $bilan_vente_subtype->fetch()){?>
	<tr>
		<td><?php echo $bilan['object_type'];?></td>
		<td><?php echo $bilan['object_sub_type'];?></td>
		<td><?php echo round($bilan['sum_object_subtype'], 3) . ' kg ' ;?></td>
		<td><?php echo round(($bilan['sum_object_subtype'] * 100)/$sum['sum'], 2) . ' % ';?></td>
		<td><?php echo round($bilan['sum_price'], 3) . ' € ' ;?></td>
	   	<td><?php echo round(($bilan['sum_price'] * 100)/$sum['sum2'], 2) . '% ';?></td>
	</tr>
<?php }
$bilan_vente_subtype->closeCursor();
?>