<div class="panel-admin">
    <h3 class="titre-saisie">Liste des utilisateurs validés</h3>
</div>
<div class="panel-body table table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="admin-table">Nom d'utilisateur</th>
                <!-- <th class="admin-table">Mot de passe</th> -->
                <th class="admin-table">Site de ressourcerie</th>
                <th class="admin-table"> Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include('../../model/administration/bdd_read_list_user.php');
            ?>
        </tbody>
    </table>
</div>