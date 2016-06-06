<tr>
    <td><?php echo strftime("%d/%m/%Y", strtotime($line_valorization['valorization_date'])); ?></td>
    <td><?php echo $line_valorization['site']; ?></td>
    <td><?php echo $line_valorization['object_type']; ?></td>
    <td><?php echo $line_valorization['object_sub_type']; ?></td>
    <td><?php echo $line_valorization['valorization_type']; ?></td>
    <td><?php echo $line_valorization['valorization_sub_type']; ?></td>
    <td><?php echo round($line_valorization['object_weight'], 3) . ' kg'; ?></td>
    <td>
        <form class="bouton-action" method="post" action="../../controller/administration/controller_administration_hidden_entry_valorization.php">
            <input type="hidden" value="<?php echo $line_valorization['id']; ?>" name="id" />
            <button type="submit" class="btn btn-liste-user btn-xs" title="Supprimer une saisie"><span class="glyphicon glyphicon-trash"></span></button>
        </form>
	</td>	
</tr>