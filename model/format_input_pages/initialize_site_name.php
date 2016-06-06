<select name="site" class="form-control saisie-site">
    <option value="" selected="selected">Tous les sites</option>
    <?php
    foreach ($_SESSION['site_menu'] as $line) { ?>
        <option value="<?php echo $line[1];?>" <?php  if(isset($_SESSION['return_site'])){ if($line[1] == $_SESSION['return_site']){ echo 'selected="selected"';}}?>><?php echo $line[1];?></option>           
    <?php }
    if(isset($_SESSION['site_menu_value'])) { ?>
        <option value="<?php echo $_SESSION['site_menu_value'];?>" selected="selected"><?php echo $_SESSION['site_menu_value']; ?></option>
    <?php } ?>
</select>