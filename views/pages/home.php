<?php
	session_start();
	if(isset($_SESSION['user_name'])){
		unset($_SESSION['articles']);
	// stockage de la page active dans la variable de session 'nav'
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