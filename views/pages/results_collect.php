<script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
<script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
<?php
    session_start();
    include('../../model/bdd_connection.php');
    if(isset($_POST['site'])) {
        $_SESSION['return_site'] = $_POST['site'];
    }
    if(isset($_POST['date_start'])) {
        $_SESSION['return_date_start'] = $_POST['date_start'];
    }    
    if(isset($_POST['date_end'])) {
        $_SESSION['return_date_end'] = $_POST['date_end'];
    }

    if(isset($_SESSION['site'])){
    if($_SESSION['site'] == 'Administration'){
    // stockage de la page active dans la variable de session 'nav'
    $_SESSION['nav'] = 'bilan';
    // ajout de l'entete défini dans layout/header
    include('../layout/header.php');
    // ajout de la barre de navigation défini dans layout/nav
    include('../layout/nav.php');
    if(isset($_POST['site'])){
        if($_POST['submit'] == 'Rechercher'){
            include('../../model/collect/model_results_collect.php');
        }
    }?>
<legend>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6">
            <h2 class="nom-ressourcerie">Bilan de la Ressourcerie</h2>
        </div>
        <div class="col-md-3 col-md-offset-3 col-lg-3 col-lg-coffset-3 col-sm-3 col-sm-offset-3">
            <h4 class="date-du-jour" title="Affiche la date du jour">
                <?php 
                    $date = date("d/m/Y"); 
                    echo ("Nous sommes le $date");
                ?>
            </h4>
        </div>
    </div>
</legend>
		<div class="bilan">
		    <ul class="nav nav-pills nav-justified">
              <li class="active_collect"><a href="results_collect.php" >Collecte</a></li>
              <li class="inactive"><a href="results_valorization.php">Valorisation</a></li>
              <li class="inactive"><a href="results_sale.php">Vente</a></li>
            </ul>
            <div class="row panel panel">
                <form action="results_collect.php" method="post">
                    <div class="col-md-2 col-lg-2 col-sm-2">
                        <div class="panel-body">
                            <p>Site</p>
                                <!-- Initialisation du menu déroulant nom du site --> 
                                <?php include('../../model/format_input_pages/initialize_site_name.php'); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2">
                        <div class="panel-body">
                            <p>Type Collecte</p>
                                <!-- Initialisation du menu déroulant type de collect --> 
                                <?php include('../../model/format_input_pages/initialize_collect_type_menu.php'); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2">
                        <div class="panel-body">
                            <p>Type Objet</p>
                                <!-- Initialisation du menu déroulant type d'objet -->      
                                <?php include('../../model/format_input_pages/initialize_object_type_menu.php'); ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2">
                        <div class="panel-body">
                            <p>Date de début</p>
                            <input type="date" class="date" name="date_start" value="<?php if(isset($_SESSION['return_date_start'])){ echo $_SESSION['return_date_start'];}?>"/>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2">
                        <div class="panel-body">
                            <p>Date de fin</p>
                            <input type="date" class="date" name="date_end" value="<?php if(isset($_SESSION['return_date_end'])){ echo $_SESSION['return_date_end'];}?>"/>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2">
                        <div class="panel-body">
                            <input type="submit" name="submit" class="btn btn-primary btn-lg bouton-rechercher" title="Valider la recherche" value="Rechercher"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php if(isset($_POST['site'])){if($_POST['submit'] == 'Rechercher'){ ?>
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="panel-body table table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <div class="col-md-3 col-lg-3 col-sm-3">
                            <div class="panel-poids-total">
                                <div class="form-control total-poids">
                                    <?php echo 'Poids Total : ' . round($line_collects['total_weight'], 3) . ' kg' ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-md-offset-6 col-lg-3 col-lg-offset-6 col-sm-3 col-sm-offset-6">
                            <div class="panel-export-csv">
                                <a href="../../model/collect/export_synthese_csv.php">
                                    <input class="btn btn-primary btn-lg bouton-export-csv" title="Exporter vers Excel" name="submit" value="Export CSV"/>
                                </a>
                            </div>
                        </div>
                    </thead>
                </table>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6">
            <div class="panel-body table table-responsive">
                <div class="panel-collect">
                    <h3 class="titre-saisie">Répartition par type de collecte</h3>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="admin-table">Catégorie</th>
                            <th class="admin-table collecte">Type collecte</th>
                            <th class="admin-table">Poids total</th>
                            <th class="admin-table">Pourcentage</th>
                        </tr>
                         <?php include('../../model/collect/query_read_collect_by_collect_source.php');?>
                        <tr>
                            <th>Total</th>
                            <th></th>
                            <th><?php echo round($sum['sum'], 3) . ' kg ' ; ?></th>
                            <th> 100 % </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-6">
            <div class="panel-body table table-responsive">
                <div class="panel-collect">
                    <h3 class="titre-saisie">Répartition par catégorie</h3>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="admin-table collecte">Catégorie</th>
                            <th class="admin-table">Poids total</th>
                            <th class="admin-table">Pourcentage</th>
                        </tr>
                        <?php include('../../model/collect/query_read_collect_by_object_type.php');?>
                        <tr>
                            <th>Total</th>
                            <th><?php echo round($sum['sum'], 3) . ' kg ' ; ?></th>
                            <th> 100 % </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="panel-body table table-responsive">
                <div class="panel-collect">
                    <h3 class="titre-saisie">Répartition par sous catégorie</h3>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="admin-table">Catégorie</th>
                            <th class="admin-table">Sous catégorie</th>
                            <th class="admin-table">Poids total</th>
                            <th class="admin-table">Pourcentage</th>
                        </tr>
                        <?php include('../../model/collect/query_collect_by_subtype.php');?>
                        <tr>
                            <th>Total</th>
                            <th></th>
                            <th><?php echo round($sum['sum'], 3) . ' kg ' ; ?></th>
                            <th> 100 % </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div> 
        <div class="col-md-3 col-md-offset-9 col-lg-3 col-lg-offset-9 col-sm-3 col-sm-offset-9">
            <div class="panel-export-csv">
                <a href="../../model/collect/export_csv.php">
                    <input class="btn btn-primary btn-lg bouton-export-csv" title="Exporter vers Excel" name="submit" value="Export CSV"/>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="panel-body table table-responsive">
                    <div class="panel-collect">
                        <h3 class="titre-saisie">Liste des collectes</h3>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="admin-table">Date</th>
                                <th class="admin-table">Site</th>
                                <th class="admin-table">Type Collecte</th>
                                <th class="admin-table">Type Objet</th>
                                <th class="admin-table">Sous Type Objet</th>
                                <th class="admin-table">Poids</th>
                                <th class="admin-table">Action</th>
                            </tr>
                            <?php include('../../model/collect/query_read_collect.php'); ?>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
            <?php }
        } ?>
	</body>
</html>
<?php include('../../controller/reset_variables_session.php');
     }
    else{
        include('../../redirects/to_index.php');
    }
}
else{
    include('../../redirects/to_index.php');
}
?>