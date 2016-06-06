<div class="panel-admin">
    <h3 class="titre-saisie">Liste des sites</h3>
</div>
<div class="panel-body table table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="admin-table">Nom du site</th>
                <th class="admin-table">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include('../../model/administration/bdd_read_list_sites.php');
            ?>
        </tbody>
    </table>
</div>