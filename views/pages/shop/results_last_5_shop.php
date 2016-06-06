<tr>
    <td><?php echo strftime("%d/%m/%Y", strtotime($id['sale_date'])); ?></td>
    <td><?php echo ($id['id_order']); ?></td>
    <td><?php echo ($id['object_type']); ?></td>
    <td><?php echo ($id['object_sub_type']); ?></td>
    <td><?php echo ($id['object_quantity']); ?></td>
    <td><?php if($id['object_weight'] != 0){ echo round($id['object_weight'], 3) . ' kg'; }else{ echo ''; } ?></td>
    <td><?php echo round($id['object_price'], 2) . ' €'; ?></td>
</tr>