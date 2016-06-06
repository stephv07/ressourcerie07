<tr>
    <td><?php echo strftime("%d/%m/%Y", strtotime($line_shop['sale_date'])); ?></td>
    <td><?php echo $line_shop['site']; ?></td>
    <td><?php if($line_shop['id_order'] != 0){ echo $line_shop['id_order']; }else{ echo 'Opération de caisse'; } ?></td>
    <td><?php echo $line_shop['object_type']; ?></td>
    <td><?php echo $line_shop['object_sub_type']; ?></td>
    <td><?php echo $line_shop['payment_type']; ?></td>
    <td><?php if($line_shop['object_weight'] != 0){ echo round($line_shop['object_weight'], 3) . ' kg'; }else{ echo ''; } ?></td>
    <td><?php if($line_shop['object_quantity'] * $line_shop['object_price'] != 0){ echo $line_shop['object_quantity'] * $line_shop['object_price'] . ' €'; }else{ echo ''; } ?></td>
    <td><?php if($line_shop['cash_float'] != 0){ echo round($line_shop['cash_float'], 2) . ' €'; }else{ echo ''; } ?></td>
    <td><?php if($line_shop['debit'] !=0){ echo round($line_shop['debit'], 2) . ' €'; }else{ echo ''; } ?></td>
    <td><?php if($line_shop['repayment'] != 0){ echo round($line_shop['repayment'], 2) . ' €'; }else{ echo ''; } ?></td>
    <td><?php if($line_shop['donation'] != 0){ echo round($line_shop['donation'], 2) . ' €'; }else{ echo ''; } ?></td>
    <td>
        <form class="bouton-action" method="post" action="../../controller/administration/controller_administration_hidden_entry_shop.php">
            <input type="hidden" value="<?php echo $line_shop['id']; ?>" name="id" />
            <button type="submit" class="btn btn-liste-user btn-xs" title="Supprimer une saisie"><span class="glyphicon glyphicon-trash"></span></button>
        </form>
    </td>	
</tr>