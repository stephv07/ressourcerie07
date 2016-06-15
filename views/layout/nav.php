<nav class="navbar navbar-inverse">
    <div class="container-fluid">

        <!-- retour a la page d'accueil si clique sur Ressourcerie Trimaran -->
        <div class="navbar-header">
            <a href="home.php" class="titre-nav navbar-brand">Ressourcerie Trimaran</a>
        </div>

        <!-- si le login est different de administration, chargement de la barre de menu operateur -->
        <?php if($_SESSION['site'] != 'Administration'){ ?>
            <ul class="nav navbar-nav">

                <!-- bouton de navigation vers collect.php -->
                <li class="btn <?php if($_SESSION['nav']=='collect'){ echo 'en_cours_collect';} else { echo 'btn-nav';} ?> dropdown" title="Pour la saisie de collecte">
                    <a href="collect.php"><span class="glyphicon glyphicon-flag"></span> - Collecte</a>
                </li>

                <!-- bouton de navigation vers valorization.php -->
                <li class="btn <?php if($_SESSION['nav']=='valorization'){ echo 'en_cours_valorization';} else { echo 'btn-nav';} ?> dropdown" title="Pour la saisie de valorisation">
                    <a href="valorization.php"><span class="glyphicon glyphicon-thumbs-up"></span> - Valorisation</a>
                </li>

                <!-- bouton de navigation vers shop.php -->
                <li class="btn <?php if($_SESSION['nav']=='shop'){ echo 'en_cours_shop';} else { echo 'btn-nav';} ?> dropdown" title="Pour la saisie de vente">
                    <a href="shop.php"><span class="glyphicon glyphicon-shopping-cart"></span> - Boutique</a>
                </li>
            </ul>

        <!-- si le login est administration, chargement de la barre de menu admin -->
        <?php }else{ ?>
            <ul class="nav navbar-nav">

                <!-- bouton de navigation vers administration.php -->
                <li class="btn <?php if($_SESSION['nav']=='administration'){ echo 'en_cours_admin';} else { echo 'btn-nav-admin';} ?>" title="Pour la gestion des utilisateurs">
                    <a href="administration.php"><span class="glyphicon glyphicon-list-alt"></span> - Gestion des utilisateurs</a>
                </li>

                <!-- bouton de navigation vers results_collect.php -->
                <li class="btn <?php if($_SESSION['nav']=='bilan'){ echo 'en_cours_bilan';} else { echo 'btn-nav-admin';} ?>" title="Pour les bilans">
                    <a href="../pages/results_collect.php"><span class="glyphicon glyphicon-euro"></span> - Bilans de la Ressourcerie</a>
                </li>
            </ul>
        <?php } ?>

        <!-- menu deroulant pour changer d'operateur ou se deconnecter -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="glyphicon  glyphicon-user"></span><?php echo ' ' . $_SESSION['user_name'] ?></a>
                <ul class="dropdown-menu">
                     <li>
                        <a href="../../model/logout/action_logout.php"><span class="glyphicon glyphicon-user"></span> Changer d'utilisateur </a>
                    </li>
                    <li>
                        <a href="../../model/logout/action_logout.php"><span class="glyphicon glyphicon-log-out"></span> Se déconnecter </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>