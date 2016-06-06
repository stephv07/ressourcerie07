<?php
	session_start();
	if(isset($_SESSION['user_name'])){
	// stockage de la page active dans la variable de session 'nav'
	$_SESSION['nav'] = 'valorization';
	// ajout de l'entete défini dans layout/header
	include('../layout/header.php');
	// ajout de la barre de navigation défini dans layout/nav
	include('../layout/nav.php');
	// ajout de la legend layout/legend
    include('../layout/legend.php');
?>

<script type="text/javascript" src="../../js/ajax_valorization.js"></script>
	<!-- Affichage validation des données entrées -->
	<div class="message-valorization-OK">
		<?php if(isset($_SESSION['confirmation_message'])){ echo '<script type="text/javascript">' . 'swal("'. $_SESSION['confirmation_message'] .'");' . '</script>';}?>
    </div>

	<!-- Le formulaire sera transmis via le controller_valorization.php -->
    <form class="row" method="post" action="../../controller/valorization/controller_valorization.php">
		<div class="col-md-3 col-lg-3 col-sm-3">
			<div class="panel-number">
				<button class="btn btn btn-circle" type="button" disabled="disabled">1</button>
			</div>
				<div class="panel panel-info">
			    <div class="panel-valorisation">
					<h3 class="panel-title"><label>Type objet</label></h3>
				</div>
				<div class="panel-body">
					<!-- Initialisation du menu déroulant type d'objet -->		
					<?php include('../../model/format_input_pages/initialize_object_type_menu.php'); ?>
				</div>
			</div>
		</div>

		<div class="col-md-3 col-lg-3 col-sm-3">
			<div class="panel-number">
				<button class="btn btn-circle" type="button" disabled="disabled">2</button>
			</div>
			<div class="panel panel-info">
			    <div class="panel-valorisation">
					<h3 class="panel-title"><label>Valorisation</label></h3>
				</div>
				<div class="panel-body">
					<!-- Initialisation du menu déroulant type de valorisation -->
					<select name="valorization_type" class="form-control object-type" id="valorization">
						<?php 
							if(isset($_SESSION['valorization_type_value'])) { echo $_SESSION['valorization_type_value'];?>
								<option value="<?php echo $_SESSION['valorization_type_value'];?>" selected="selected"><?php echo $_SESSION['valorization_type_value']; ?></option>
						<?php } ?>
					</select>
					<?php if(isset($_SESSION['error_valorization'])){ echo '<span class="message-erreur">' . $_SESSION['error_valorization'] . '</span>';}?>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-lg-3 col-sm-3">
			<div class="panel-number">
				<button class="btn btn-circle" type="button" disabled="disabled">3</button>
			</div>
			<div class="panel panel-info">
			    <div class="panel-valorisation">
					<h3 class="panel-title"><label>Poids objet</label></h3>
				</div>
				<div class="panel-body">
				   	<!-- Sauvegarde du poids de l'objet -->
					<?php include('../../model/format_input_pages/initialize_object_weight_value.php');?>
   				</div>
			</div>
		</div>
		<div class="col-md-3 col-lg-3 col-sm-3">
			<div class="panel-number">
				<button class="btn btn-circle" type="button" disabled="disabled">4</button>
			</div>
			<div class="panel panel-info">
			    <div class="panel-valorisation">
					<h3 class="panel-title"><label>Validation</label></h3>
				</div>
				<div class="panel-body" id="divID">
					<input type="submit" class="btn btn-primary btn-lg bouton-pese" title="Validation de la pesée" value="Pesé !"/>
   				</div>
   			</div>
		</div>
	</form>
			<div class="col-md-9 col-lg-9 col-sm-9">
				<div class="panel panel-info">
					    <div class="panel-valorisation">
							<h3 class="panel-title">
								<label>Les 5 dernières saisies de valorisation</label>
							</h3>
						</div>
					<div class="panel-body table table-responsive">
		                <table class="table table-bordered">
		                    <thead>
		                        <tr>
		                            <th class="admin-table">Date</th>
		                            <th class="admin-table">Type Objet</th>
		                            <th class="admin-table">Sous Type Objet</th>
		                            <th class="admin-table">Type Valorisation</th>
		                            <th class="admin-table">Sous Type Valorisation</th>
		                            <th class="admin-table">Poids</th>
		                        </tr>
		                        <?php
		                            include('../../controller/valorization/controller_results_last_5_valorization.php');
		                        ?>
		                    </thead>
		                </table>
		            </div>
	           	</div>
            </div>
            <div class="col-md-3 col-lg-3 col-sm-3">
				<div class="panel panel-info">
				    <div class="panel-valorisation">
						<h3 class="panel-title"><label>Annulation</label></h3>
					</div>
					<div class="panel-body" id="divID">
						<a href="../../controller/valorization/controller_cancel_valorization.php">
							<button type="button" class="btn btn-danger btn-lg bouton-annule" title="Annuler la derniére pesée">Annuler la derniére pesée</button>
						</a>
	   				</div>
	   			</div>
	   		</div>
</body>

<?php 
	unset($_SESSION['object_type_value']);
	unset($_SESSION['valorization_type_value']);
	unset($_SESSION['object_weight_value']);
	include('../../controller/reset_variables_session.php');
	}
	// redirection sur la page d'authentification dans le cas ou l'internaute saisi le chemin en direct dans l'url
	else{
		include('../../redirects/to_index.php');
	}
?>