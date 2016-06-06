<?php
	// On récupère tout le contenu de la table users

      $read_list_users = $bdd->query('SELECT * FROM users');
      while ($user = $read_list_users->fetch()) {
?>
        <tr>
            <td>
                <?php echo $user['user_name']; 
                    $_SESSION['nom_utilisateur'] = $user['user_name'];
                ?>
            </td>
            <!-- <td>
                <?php echo $user['user_password']; ?>
            </td> -->
            <td>
                <?php echo ($user['user_privilege']); 
                    $_SESSION['nom_site_utilisateur'] = $user['user_privilege'];
                ?>
            </td>
            <td>
                <!-- <form class="bouton-action" method="post" action="#">    
                    <button type="submit" class="btn btn-liste-user btn-xs" title="Modifier un utilisateur"><span class="glyphicon glyphicon-pencil"></button>
                </form> -->
                <?php if($user['user_privilege'] != 'Administration'){?>
                <form class="bouton-action" method="post" action="../../controller/administration/controller_administration_delete_user.php">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <button type="submit" class="btn btn-liste-user btn-xs" title="Supprimer un utilisateur"><span class="glyphicon glyphicon-trash"></span></button>
                </form>
                <?php } ?>
            </td>
        </tr>
    <?php }
        $read_list_users->closeCursor(); 
    ?>