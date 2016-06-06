<?php
	if(isset($_SESSION['payment_value'])){
	?>
	<input type="text" class="form-control saisie-paiement" autocomplete="off" placeholder="Montant du règlement" name="payment" value="<?php echo $_SESSION['payment_value'] ?>"/>
	<?php }
	else { ?>
		<input type="text" class="form-control saisie-paiement" autocomplete="off" placeholder="Montant du règlement" name="payment"/>
	<?php } ?>
	<div class="message-erreur">
		<?php if(isset($_SESSION['error_payment'])){echo '<span class="message-erreur">' . $_SESSION['error_payment'] . '</span>';} ?>
	</div>