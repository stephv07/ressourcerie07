<?php
    session_start();
    
    unset($_SESSION['query_bilan']);
    unset($_SESSION['query_bilan_2']);
    unset($_SESSION['query_bilan_3']);
    
    if(isset($_SESSION['site'])){
        if($_SESSION['site'] == 'Administration'){
            // On se connecte a la Base de données
            include('../../model/bdd_connection.php');
            // stockage de la page active dans la variable de session 'nav'
            $_SESSION['nav'] = 'administration';
            // ajout de l'entete défini dans layout/header
            include('../layout/header.php');
            // ajout de la barre de navigation défini dans layout/nav
            include('../layout/nav.php'); 
            ?>
                    <legend>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-6">
                                <h2 class="nom-ressourcerie">Gestion des utilisateurs</h2>
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
                    <div class="panel panel-user-list col-md-5 col-lg-5 col-sm-5">
                        <!-- Page affichage liste des utilisateurs validés -->
                        <?php include('../../views/pages/administration/view_users_list.php'); ?>
                    </div>
                    <div class="panel panel-user-list col-md-2 col-lg-2 col-sm-2">
                        <!--  Page affcihage liste des sites -->
                        <?php include('../../views/pages/administration/view_sites_list.php'); ?>
                    </div>
                    <div class="panel panel-user-list col-md-2 col-lg-2 col-sm-2">
                        <!--  Page création nouvel utilisateur -->
                        <?php include('../../views/pages/administration/view_create_new_user.php'); ?>
                    </div>
                    <div class="panel panel-user-list col-md-2 col-lg-2 col-sm-2">
                        <!--  Page création nouveau site -->
                        <?php include('../../views/pages/administration/view_create_new_site.php'); ?>
                    </div>
                </body>
            </html>
            <?php
        }
        else{
            $token_redirect = true;
        }
    }
    else{
        $token_redirect = true;
    }
    if(isset($token_redirect)){
        include('../../redirects/to_index.php');
    }
?>