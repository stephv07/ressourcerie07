<?php
	/*----------------------------------------------------------------------------------------------
	| Ouverture d'une session pour stocker des variables globales 
	| Si la variable globale user_name est differente de null, 
	|	initialisation de la variable global article à null
	|	initialisation de la variable global nav à "home"
	|	chargement des differents elements de la page header, nav, contenu, footer
	| Sinon redirection à la page de login
	----------------------------------------------------------------------------------------------*/
	session_start();
	if(isset($_SESSION['user_name'])){
		unset($_SESSION['articles']);
		$_SESSION['nav'] = 'home';
		include('../layout/header.php');
		include('../layout/nav.php');
?>
		<div class="row">
			<div class="container">
				<div class="col-md-3 col-lg-3 col-sm-3">
					<img src="../../images/logo-trimaranweb1.jpg" class="logo-accueil img-responsive" alt="Logo Ressourcerie">
				</div>

				<div class="col-md-9 col-lg-9 col-sm-9 jumbotron">
					<h1>Ressourcerie Trimaran</h1>
					<p>Bienvenue sur votre site de gestion de ressourcerie</p>
				</div>
			</div>
		</div>
		
<?php
		include('../layout/footer.php');
	}
	else{
		include('../../redirects/to_index.php');
	}
?>