<?php
	$read_site = $bdd->prepare(
	  'SELECT site_name
	   FROM sites');
	$read_site->execute();
	while($site_name = $read_site->fetch()){
		echo '<option value="' .  $site_name['site_name'] . '">' . $site_name['site_name'] . '</option>';
	}
	$read_site->closeCursor();
?>