<tr>
    <td><?php echo strftime("%d/%m/%Y", strtotime($line_collects['collect_date'])); ?></td>
    <td><?php echo $line_collects['collect_site']; ?></td>
    <td><?php echo $line_collects['collect_source']; ?></td>
    <td><?php echo $line_collects['object_type']; ?></td>
    <td><?php echo $line_collects['object_sub_type']; ?></td>
    <td><?php echo round($line_collects['object_weight'], 3) . ' kg'; ?></td>
	<td>
		<form class="bouton-action" method="post" action="../../controller/administration/controller_administration_hidden_entry_collect.php">
			<input type="hidden" value="<?php echo $line_collects['id']; ?>" name="id" />
	    	<button type="submit" class="btn btn-liste-user btn-xs" title="Supprimer une saisie"><span class="glyphicon glyphicon-trash"></span></button>
		</form>
	</td>		
</tr>