<!-- initialisation du menu "type de valorization" de la page bilan -->
	<select name="valorization_type" class="form-control object-type">
		<?php if($_SESSION['nav']!='collect' AND $_SESSION['nav']='valorization' AND $_SESSION['nav']!='shop'){?>
	    	<option value="" selected="selected">Toutes les valorisations</option>
			<?php }else{ ?>
			<option value="" selected="selected"></option>
		<?php } ?>
	    <?php $save_valorization_value = '';
	    foreach($_SESSION['menu_valorization_type'] as $line) { 
	    	// pour l'affichage des types d'objets puis des sous-types
	    	if($line[1] != $save_valorization_value){
	    		if($line[1] != $line[3]){?>
	    			<option class="<?php echo $line[1];?>" value="<?php echo $line[1];?>"><?php echo $line[1];?></option>
	    			<option class="<?php echo $line[1];?>" value="<?php echo $line[3];?>"><?php echo $line[3];?></option>
	    		<?php } else { ?>
	    			<option class="<?php echo $line[1];?>" value="<?php echo $line[1];?>"><?php echo $line[1];?></option>
	    		<?php }
	    	} else { ?>  
	    		<option class="<?php echo $line[1];?>" value="<?php echo $line[3];?>"><?php echo $line[3];?></option>        
	    <?php ;} $save_valorization_value = $line[1];}?>
	</select>

<?php if(isset($_SESSION['error_valorization'])){ echo '<span class="message-erreur">' . $_SESSION['error_valorization'] . '</span>';}?>