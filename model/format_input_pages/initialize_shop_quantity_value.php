	<?php if(isset($_SESSION['object_quantity_value'])){ ?>
		<input type="number" min="1" max="99" autocomplete="off" class="form-control saisie" placeholder="Quantité" name="object_quantity" value="<?php echo $_SESSION['object_quantity_value']; ?>"/>
	<?php }	else { ?>
		<input type="number" min="1" max="99" autocomplete="off" class="form-control saisie" placeholder="Quantité" name="object_quantity" />
	<?php } ?>
	<div class="message-erreur">
			<?php if(isset($_SESSION['error_object_quantity'])){echo '<span class="message-erreur">' . $_SESSION['error_object_quantity'] . '</span>';} ?>
	</div>