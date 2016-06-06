        <?php
            session_start(); ?>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/extras/modernizr-custom.js"></script>
        <script src="http://cdn.jsdelivr.net/webshim/1.12.4/polyfiller.js"></script>
        <?php
            include('../../model/bdd_connection.php');
            if(isset($_POST['site'])){
                if($_POST['submit'] == 'Rechercher'){
                    include('../../model/shop/model_results_shop.php');
                }
            }
        
            // recuperation des valeurs de recherche
            if(isset($_POST['site'])) {
                $_SESSION['return_site'] = $_POST['site'];
            }
            if(isset($_POST['object_type'])) {
                $_SESSION['return_object_type'] = $_POST['object_type'];
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
        ?>
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
                <li class="inactive"><a href="results_collect.php" >Collecte</a></li>
                <li class="inactive"><a href="results_valorization.php">Valorisation</a></li>
                <li class="active_shop"><a href="results_sale.php">Vente</a></li>
            </ul>
            <div class="row panel panel">
                <form action="results_sale.php" method="post">
                    <div class="col-md-2 col-lg-2 col-sm-2">
                        <div class="panel-body">
                            <p>Site</p>
                                <!-- Initialisation du menu déroulant nom du site --> 
                                <?php include('../../model/format_input_pages/initialize_site_name.php'); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2">
                    <div class="panel-body">
                        <p>Type d'Objet</p>
                            <!-- Initialisation du menu déroulant type d'objet -->    
                            <?php include('../../model/format_input_pages/initialize_shop_object_type_menu.php'); ?>  
                        </select>
                    </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2">
                        <div class="panel-body">
                            <p>Type Paiement</p>
                            <select name="payment_type" class="form-control saisie-collect">
                                <option value="" selected="selected">Tout types de paiement</option>
                                <option value="Espèces">Espèces</option>
                                <option value="Chèque">Chèque</option>
                                <option value="Carte Bleue">Carte Bleue</option>
                            </select>
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
        <?php if(isset($_POST['site'])){
            if($_POST['submit'] == 'Rechercher'){ ?>
                <div class="col-md-10 col-lg-10 col-sm-10">
                    <div class="panel-body table table-responsive">
                        <div class="panel-sale">
                            <h3 class="titre-saisie">Répartition des ventes</h3>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="admin-table">Nombre total de vente</th>
                                    <th class="admin-table">Poids total</th>
                                    <th class="admin-table">Valeur totale de vente</th>
                                    <th class="admin-table">Chiffre d'affaire</th>
                                    <th class="admin-table">Caisse</th>
                                    <th class="admin-table">Total des dons</th>
                                    <th class="admin-table">Total des prélèvements</th>
                                    <th class="admin-table">Total des remboursements</th>
                                    <th class="admin-table">Fond de caisse</th>
                                    <th class="admin-table">Panier moyen</th>
                                </tr>
                                <tr>
                                    <td><?php if($line_shop['count_order'] != 0){ echo $line_shop['count_order'] ; }else{ echo '0'; } ?></td>
                                    <td><?php if($line_shop['total_weight'] != 0){ echo round($line_shop['total_weight'], 3) . ' kg'; }else{ echo '0'; } ?></td>
                                    <td><?php if($line_shop['total_price'] != 0){ echo round($line_shop['total_price'], 2) . ' €'; }else{ echo '0'; } ?></td>
                                    <td><?php if($line_shop['total_price'] + $line_shop['total_donation'] + $line_shop['total_repayment'] != 0){ echo round($line_shop['total_price'] + $line_shop['total_donation'] + $line_shop['total_repayment'], 2) . ' €'; }else{ echo '0'; } ?></td>
                                    <td><?php if($line_shop['total_price'] + $line_shop['total_donation'] + $line_shop['total_repayment'] + $line_shop['total_cash_float'] + $line_shop['total_debit'] != 0){ echo round($line_shop['total_price'] + $line_shop['total_donation'] + $line_shop['total_repayment'] + $line_shop['total_cash_float'] + $line_shop['total_debit'], 2) . ' €'; }else{ echo '0'; } ?></td>
                                    <td><?php if($sum_donation['sum_donation'] != 0){ echo round($sum_donation['sum_donation'], 2) . ' €' ; }else{ echo '0'; } ?></td>
                                    <td><?php if($line_shop['total_debit'] != 0){ echo round($line_shop['total_debit'], 2) . ' €' ; }else{ echo '0'; } ?></td>
                                    <td><?php if($line_shop['total_repayment'] != 0){ echo round($line_shop['total_repayment'], 2) . ' €' ; }else{ echo '0'; } ?></td>
                                    <td><?php if($line_shop['total_cash_float'] != 0){ echo round($line_shop['total_cash_float'], 2) . ' €' ; }else{ echo '0'; } ?></td>
                                    <td><?php if($line_account['average_amount'] != 0){ echo round($line_account['average_amount'], 2) . ' €' ; }else{ echo '0'; } ?></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 col-sm-2">
                    <div class="panel-export-csv">
                        <a href="../../model/shop/export_csv_totals.php">
                            <input class="btn btn-primary btn-lg bouton-export-csv" title="Exporter vers Excel" name="submit" value="Export CSV"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="panel-body table table-responsive">
                        <div class="panel-sale">
                            <h3 class="titre-saisie">Répartition par catégorie</h3>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="admin-table">Catégorie</th>
                                    <th class="admin-table">Poids total</th>
                                    <th class="admin-table">Pourcentage des poids</th>
                                    <th class="admin-table">Montant des ventes</th>
                                    <th class="admin-table">Pourcentage montant des ventes</th>
                                </tr>
                                <?php include("../../model/shop/read_shop_by_object_type.php");?>
                                <tr>
                                    <th> Total </th>
                                    <th><?php echo round($sum['sum'], 2) . ' kg '; ?></th>
                                    <th> 100 % </th>
                                    <th><?php echo round($sum['sum2'], 2) . ' € '; ?></th>
                                    <th> 100 % </th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 col-sm-6">
                    <div class="panel-body table table-responsive">
                        <div class="panel-sale">
                            <h3 class="titre-saisie">Répartition par sous catégorie</h3>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="admin-table">Catégorie</th>
                                    <th class="admin-table">Sous catégorie</th>
                                    <th class="admin-table">Poids total</th>
                                    <th class="admin-table">Pourcentage des poids</th>
                                    <th class="admin-table">Montant des ventes</th>
                                    <th class="admin-table">Pourcentage montant des ventes</th>
                                </tr>
                                <?php include("../../model/shop/read_shop_by_sub_object_type.php");?>
                                <tr>
                                    <th>Total</th>
                                    <th></th>
                                    <th><?php echo round($sum['sum'], 3) . ' kg ';?></th>
                                    <th> 100 % </th>
                                    <th><?php echo round($sum['sum2'], 2) . '€';?></th>
                                    <th> 100 % </th>
                                </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-2 col-md-offset-10 col-lg-2 col-lg-offset-10 col-sm-2 col-sm-offset-10">
                    <div class="panel-export-csv">
                        <a href="../../model/shop/export_csv.php">
                            <input class="btn btn-primary btn-lg bouton-export-csv" title="Exporter vers Excel" name="submit" value="Export CSV"/>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-12 col-sm-12">
                    <div class="panel-body table table-responsive">
                        <div class="panel-sale">
                            <h3 class="titre-saisie">Liste des ventes</h3>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>    
                                    <th class="admin-table">Date</th>
                                    <th class="admin-table">Site</th>
                                    <th class="admin-table">Commande</th>
                                    <th class="admin-table">Type Objet</th>
                                    <th class="admin-table">Sous Type Objet</th>
                                    <th class="admin-table">Type paiement</th>
                                    <th class="admin-table">Poids</th>
                                    <th class="admin-table">Prix</th>
                                    <th class="admin-table">Fond Caisse</th>
                                    <th class="admin-table">Prélèvement</th>
                                    <th class="admin-table">Remboursement</th>
                                    <th class="admin-table">Dons</th>
                                    <th class="admin-table">Action</th>
                                </tr>
                                <?php
                                    if(isset($_POST['site'])){
                                        if($_POST['submit'] == 'Rechercher'){
                                            include('../../model/shop/query_read_shop.php');
                                        }
                                    }
                                 ?>
                            </thead>
                        </table>
                    </div>
                </div>
            <?php }
        } ?>
	</body>
</html>
<?php 
include('../../controller/reset_variables_session.php');
    }
    else{
        include('../../redirects/to_index.php');
    }
}
else{
    include('../../redirects/to_index.php');
}
?>