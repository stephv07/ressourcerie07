<!-- initialisation du menu "type d'objet" soit à blanc lors d'une saisie correct
soit à la valeur précédemment saisie lors de la validation de pesée 
Le menu est initialisé par extraction de la base de donnée -->
    
<select name="collect_source" class="form-control collect-source">
    <?php if($_SESSION['nav'] != 'collect' AND $_SESSION['nav'] != 'valorization' AND $_SESSION['nav'] != 'shop'){?>
    	<option value="" selected="selected">Toutes les collectes</option>
	<?php }else{ ?>
		<option value="" selected="selected"></option>
	<?php } ?>
    <?php
        // $line[0] = id, $line[1] = type d'objet, $line[2] = sous type d'objet, $line[3] = concaténation du type et sous type
        foreach ($_SESSION['menu_collect_type'] as $line) { ?>
            <option class="<?php echo $line[1];?>" value="<?php echo $line[3];?>"><?php echo $line[3];?></option>           
        <?php }
        if(isset($_SESSION['collect_source_value'])) { ?>
            <option value="<?php echo $_SESSION['collect_source_value'];?>" selected="selected"><?php echo $_SESSION['collect_source_value']; ?></option>
        <?php } ?>
</select>

<?php if(isset($_SESSION['error_collect'])){ echo '<span class="message-erreur">' . $_SESSION['error_collect'] . '</span>';}?>