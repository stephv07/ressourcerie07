<tr>
	<td><?php if($line_cash_day['sale_date'] != 0){ echo strftime("%d/%m/%Y", strtotime($line_cash_day['sale_date'])); }else{ echo '';} ?></td>
    <td><?php if($line_cash_day['sum_cash_float'] != 0){ echo round($line_cash_day['sum_cash_float'], 2) . " €"; }else{ echo '';} ?></td>
    <td><?php if($line_cash_day['sum_debit'] != 0){ echo round($line_cash_day['sum_debit'], 2) . " €"; }else{ echo '';} ?></td>
	<td><?php if($line_cash_day['sum_repayment'] != 0){ echo round($line_cash_day['sum_repayment'], 2) . " €"; }else{ echo '';} ?></td>
    <td><?php if($line_cash_day['sum_donation'] != 0){ echo round($line_cash_day['sum_donation'], 2) . " €"; }else{ echo '';} ?></td>
    <td><?php if($line_cash_day['sum_shop'] != 0){ echo round($line_cash_day['sum_shop'], 2) . " €"; }else{ echo '';} ?></td>
    <td><?php if($line_cash_day['sum_cash_day'] != 0){ echo round($line_cash_day['sum_cash_day'], 2) . " €"; }else{ echo '';} ?></td>
</tr>