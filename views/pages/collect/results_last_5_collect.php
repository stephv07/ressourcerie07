<tr>
    <td><?php echo strftime("%d/%m/%Y", strtotime($id['collect_date'])); ?></td>
    <td><?php echo ($id['collect_source']); ?></td>
    <td><?php echo ($id['object_type']); ?></td>
    <td><?php echo ($id['object_sub_type']); ?></td>
    <td><?php echo round($id['object_weight'], 3) . ' kg'; ?></td>		
</tr>