<?php
	if(isset($_SESSION['object_weight_value'])){ ?>
		<input type="text" class="form-control poids" name="object_weight" autocomplete="off" value="<?php echo $_SESSION['object_weight_value']; ?>" />
	<?php }	else { ?>
		<input type="text" class="form-control poids" autocomplete="off" placeholder=". . . . , . . . kg" name="object_weight"/>
	<?php }
	if(isset($_SESSION['error_object_weight'])){
		echo '<span class="message-erreur">' . $_SESSION['error_object_weight'] . '</span>';
	}
?>