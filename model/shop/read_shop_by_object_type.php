<?php 
	$bilan_collect = $bdd->prepare(
	  'SELECT 
	   object_type, 
	   SUM(object_weight) AS sum_object, 
	   SUM(object_price * object_quantity) AS sum_price
	   FROM shop ' .
	   $where3 .
	 ' GROUP BY object_type');
	$bilan_collect->execute($query_parameters3);
   
    while($bilan = $bilan_collect->fetch()){ ?>
		<tr>
			<td><?php echo $bilan['object_type']; ?></td>
			<td><?php echo round($bilan['sum_object'], 3) . ' kg ' ; ?></td>
			<td><?php echo round(($bilan['sum_object'] * 100)/$sum['sum'], 2) . '% ';?></td>
			<td><?php echo round($bilan['sum_price'], 3) . ' € ' ;?></td>
			<td><?php echo round(($bilan['sum_price'] * 100)/$sum['sum2'], 2) . '% ';?></td>
		</tr>
	<?php
	}   	
   	$bilan_collect->closeCursor();
 ?>