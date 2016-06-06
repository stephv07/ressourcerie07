<!-- initialisation du menu "type d'objet" -->

<?php if($_SESSION['nav'] == 'shop'){ ?>	
	<select name="object_type" class="form-control object-type" id="editorsSelect" onchange="request(this);">
		<?php if($_SESSION['nav'] != 'collect' AND $_SESSION['nav'] != 'valorization' AND $_SESSION['nav'] != 'shop'){?>
	    	<option value="" selected="selected">Toutes les catégories</option>
			<?php }else{ ?>
			<option value="" selected="selected"></option>
		<?php } ?>
		<?php
			// $line[0] = id, $line[1] = type d'objet, $line[2] = sous type d'objet, $line[3] = concaténation du type et sous type
			foreach ($_SESSION['menu_shop_type'] as $line) { ?>
				<option class="<?php echo $line[1];?>" value="<?php echo $line[3];?>"><?php echo $line[3];?></option>			
			<?php }
			//recuperation des valeurs du menu

			if(isset($_SESSION['object_type_value'])) { echo $_SESSION['object_type_value'];?>
				<option value="<?php echo $_SESSION['object_type_value'];?>" selected="selected"><?php echo $_SESSION['object_type_value']; ?></option>
			<?php } ?>

	</select>

	<?php if(isset($_SESSION['error_object'])){ echo '<span class="message-erreur">' . $_SESSION['error_object'] . '</span>';}

} else {?>
<!-- si la page active n'est pas la boutique -->
	<select name="object_type" class="form-control object-type">
		<?php if($_SESSION['nav'] != 'collect' AND $_SESSION['nav'] != 'valorization' AND $_SESSION['nav'] != 'shop'){?>
	    	<option value="" selected="selected">Toutes les catégories</option>
			<?php }else{ ?>
			<option value="" selected="selected"></option>
		<?php } ?>


	    <?php $save_object_value = '';
	    foreach($_SESSION['menu_shop_type'] as $line) { 
	    	// pour l'affichage des types d'objets puis des sous-types
	    	if($line[1] != $save_object_value){
	    		if($line[1] != $line[3]){?>
	    			<option class="<?php echo $line[1];?>" value="<?php echo $line[1];?>"><?php echo $line[1];?></option>
	    			<option class="<?php echo $line[1];?>" value="<?php echo $line[3];?>"><?php echo $line[3];?></option>
	    		<?php } else { ?>
	    			<option class="<?php echo $line[1];?>" value="<?php echo $line[1];?>"><?php echo $line[1];?></option>
	    		<?php }
	    	} else { ?>  
	    		<option class="<?php echo $line[1];?>" value="<?php echo $line[3];?>"><?php echo $line[3];?></option>        
	    <?php ;} $save_object_value = $line[1];}?>
	    <?php if(isset($_SESSION['return_object_type'])) { ?>
			<option value="<?php echo $_SESSION['return_object_type'];?>" selected="selected"><?php echo $_SESSION['return_object_type']; ?></option>
	   <?php } ?>
	</select>
<?php ;}?>