<tr>
    <td><?php echo strftime("%d/%m/%Y", strtotime($id['sale_date'])); ?></td>
    <td><?php if($id['donation'] != 0){ echo ($id['donation']) . ' €'; }else{ echo ''; } ?></td>
    <td><?php if($id['repayment'] != 0){ echo ($id['repayment']) . ' €'; }else{ echo ''; } ?></td>
    <td><?php if($id['debit'] != 0){ echo ($id['debit']) . ' €'; }else{ echo ''; } ?></td>		
</tr>