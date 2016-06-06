<div class="panel-admin">
    <h3 class="titre-saisie">Saisie nouveau site</h3>
</div>
<div class="row">
    <form action="../../controller/administration/controller_administration_new_site.php" method="post">
            <input type="text" class="col-md-2 col-lg-2 col-sm-2 form-control new-site" autocomplete="off" placeholder="Nouveau site" name="site_name"/>
            <div class="message-erreur">
                <?php if(isset($_SESSION['error_site_name'])){echo '<span class="message-erreur">' . $_SESSION['error_site_name'] . '</span>';} ?> 
            </div>
            <input type="submit" class="col-md-3 col-lg-3 col-sm-3 btn btn-success btn-sm bouton-new-site" autocomplete="off" value="Créer le nouveau site" title="Valide la création d'un nouvel site"/>
    </form>
</div>
<div class="message-OK">
	<?php if(isset($_SESSION['confirmation_message'])){ echo '<script type="text/javascript">' . 'swal(" '. $_SESSION['confirmation_message'] .'");' . '</script>';}?>
</div>
<?php include('../../controller/reset_variables_session.php'); ?>