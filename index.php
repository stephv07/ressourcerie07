<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/style.css" rel="stylesheet" media="screen">
		<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
		<script src="js/sweetalert.min.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<title>Ressourcerie Trimaran</title>
		<link rel="shortcut icon" type="images/x-icon" href="images/favicon.ico" />
	</head>

	<body>
		<!-- ouverture d'une session pour stocker des variables globales -->
		<?php session_start(); ?>
		<div class="container"
			<div class="row">

				<!-- insertion du logo -->
				<div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
					<img src="images/logo-trimaranweb1.jpg" class="logo img-responsive center-block" alt="Logo Ressourcerie">
				</div>

				<!-- insertion du formulaire de login et appel du controller de login au submit -->
				<div class="col-md-2 col-md-offset-5 col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4">
					<form method="post" action="controller/login/controller_login.php" name="login" class="form-horizontal">
						<div class="form-group">
							<div class="form-group input-group input-group-lg">
									<span class="input-group-addon" id="sizing-addon1"><span class="glyphicon  glyphicon-user"></span></span>
									<input name="user" placeholder="Identifiant" autocomplete="off" class="form-control" type="text" id="UserUsername"/>
							</div>
							<div class="form-group input-group input-group-lg">
									<span class="input-group-addon" id="sizing-addon1"><span class="glyphicon  glyphicon-lock"></span></span>
									<input name="user_password" placeholder="Mot de passe" autocomplete="off" class="form-control" type="password" id="UserPassword"/>
							</div>
							<div class="form-group">
									<button class="btn center-block bouton-connexion" type="submit" value="Connexion">
										<span class="glyphicon glyphicon-log-in"></span> Connexion
									</button>
							</div>
						</div>
					</form>
				</div>

			</div>
		</div>
	</body>

	<!-- si au cours de la procedure de login il y a eu une erreur, affichage d'une popup javascript -->
	<?php if(isset($_SESSION['error_login'])){ 
		echo '<script type="text/javascript">' . 'swal("Erreur"," '. $_SESSION['error_login'] .'" , "error");' . '</script>';
	}?>
</html>

<?php include('controller/reset_variables_session.php'); ?>