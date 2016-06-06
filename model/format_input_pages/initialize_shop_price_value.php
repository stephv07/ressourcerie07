<?php
	if(isset($_SESSION['object_price_value'])){ ?>
	<input type="text" class="form-control saisie" autocomplete="off" placeholder="Prix unitaire" name="object_price" value="<?php echo $_SESSION['object_price_value']; ?>"/>
	<?php }
	else { ?>
		<input type="text" class="form-control saisie" autocomplete="off" placeholder="Prix unitaire" name="object_price"/>
	<?php } ?>
	<div class="message-erreur">
		<?php if(isset($_SESSION['error_object_price'])){echo '<span class="message-erreur">' . $_SESSION['error_object_price'] . '</span>';} ?>
	</div>