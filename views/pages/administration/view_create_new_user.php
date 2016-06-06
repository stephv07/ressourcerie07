<div class="panel-admin">
    <h3 class="titre-saisie-user">Saisie nouvel utilisateur</h3>
</div>
<div class="row">
    <form action="../../controller/administration/controller_administration_new_user.php" method="post">
        <input type="text" class="form-control new-user" autocomplete="off" placeholder="Utilisateur" name="user_name"/>
        <div class="message-erreur">
            <?php if(isset($_SESSION['error_user_name'])){echo '<span class="message-erreur">' . $_SESSION['error_user_name'] . '</span>';} ?>
        </div>
        <input type="text" class="form-control new-password" autocomplete="off" placeholder="Mot de passe" name="user_password"/>
        <div class="message-erreur">
            <?php if(isset($_SESSION['error_user_password'])){echo '<span class="message-erreur">' . $_SESSION['error_user_password'] . '</span>';} ?>
        </div>
        <select name="user_privilege" class="form-control choix-new-site">
            <option value="" selected="selected"></option>
            <?php include('../../model/administration/read_list_site.php'); ?>
        </select>
        <div class="message-erreur">
            <?php if(isset($_SESSION['error_user_privilege'])){echo '<span class="message-erreur">' . $_SESSION['error_user_privilege'] . '</span>';} ?>
        </div>
        <div class="bouton-new-user">
            <input type="submit" class="btn btn-success btn-sm bouton-new-user" autocomplete="off" value="Créer le nouvel utilisateur" title="Valide la création d'un nouvel utilisateur" />
        </div>
    </form>
</div>
<div class="message-OK">
    <?php if(isset($_SESSION['confirmation_message'])){ echo '<script type="text/javascript">' . 'swal(" '. $_SESSION['confirmation_message'] .'");' . '</script>';}?>
</div>
<?php include('../../controller/reset_variables_session.php'); ?>