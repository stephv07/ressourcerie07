<?php
	// On récupère tout le contenu de la table users

      $read_list_sites = $bdd->query('SELECT * FROM sites');
      while ($user = $read_list_sites->fetch()) {
?>
        <tr>
            <td>
                <?php echo $user['site_name'];
                $_SESSION['nom_site'] = $user['site_name'];
                ?>
            <td>
                <form class="bouton-action" method="post" action="../../controller/administration/controller_administration_delete_site.php">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <button type="submit" class="btn btn-liste-user btn-xs" title="Supprimer un site"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
            </td>
        </tr>
    <?php }
        $read_list_sites->closeCursor(); 
    ?>