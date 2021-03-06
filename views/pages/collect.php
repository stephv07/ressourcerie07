<?php
	session_start();
	if(isset($_SESSION['user_name'])){

		// stockage de collect dans la variable de session 'nav'
		$_SESSION['nav'] = 'collect';

		// appel de header, nav et legend.php
		include('../layout/header.php');
		include('../layout/nav.php');
	    include('../layout/legend.php');
?>
		<!-- message de confirmation de saisie au rechargement de la page -->
		<div class="message-OK">
			<?php if(isset($_SESSION['confirmation_message'])){ echo '<script type="text/javascript">' . 'swal("'. $_SESSION['confirmation_message'] .' ");' . '</script>';}?>
    	</div>

    	<!-- formulaire correspondant au different menu deroulant et champs de saisies de la page collecte
    	au submit, appel du controller_collect.php -->
        <form class="row" method="post" action="../../controller/collect/controller_collect.php">

			<!-- initialisation du menu type collecte -->
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="panel-number">
					<button class="btn btn-circle" type="button" disabled="disabled">1</button>
				</div>
				<div class="panel panel-info">
				    <div class="panel-collect">
						<h3 class="panel-title"><label>Type collecte</label></h3>
					</div>
					<div class="panel-body">
						<?php include('../../model/format_input_pages/initialize_collect_type_menu.php'); ?>
					</div>
				</div>
			</div>

			<!-- initialisation du menu type d'objet -->
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="panel-number">
					<button class="btn btn-circle" type="button" disabled="disabled">2</button>
				</div>
				<div class="panel panel-info">
				    <div class="panel-collect">
						<h3 class="panel-title"><label>Type objet</label></h3>
					</div>
					<div class="panel-body">
					    <?php include('../../model/format_input_pages/initialize_object_type_menu.php'); ?>
					</div>
				</div>
			</div>

			<!-- initialisation du champ de saisie poids objet -->
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="panel-number">
					<button class="btn btn-circle" type="button" disabled="disabled">3</button>
				</div>
				<div class="panel panel-info">
				    <div class="panel-collect">
						<h3 class="panel-title"><label>Poids objet</label></h3>
					</div>
					<div class="panel-body">
	      				<?php include('../../model/format_input_pages/initialize_object_weight_value.php'); ?>
	   				</div>
				</div>
			</div>

			<!-- affichage du bouton de submit validation de la pesee -->
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="panel-number">
					<button class="btn btn-circle" type="button" disabled="disabled">4</button>
				</div>
				<div class="panel panel-info">
				    <div class="panel-collect">
						<h3 class="panel-title"><label>Validation</label></h3>
					</div>
					<div class="panel-body" id="divID">
						<input type="submit" class="btn btn-primary btn-lg bouton-pese" title="Validation de la pesée" value="Pesé !"/>
	   				</div>
	   			</div>
			</div>
		</form>

		<!-- affichage des 5 dernieres collecte saisies -->
		<div class="col-md-9 col-lg-9 col-sm-9">
			<div class="panel panel-info">
			    <div class="panel-collect">
					<h3 class="panel-title">
						<label>Les 5 Dernières saisies de collecte</label>
					</h3>
				</div>
				<div class="panel-body table table-responsive">
	                <table class="table table-bordered">
	                    <thead>
	                        <tr>
	                            <th class="admin-table">Date</th>
	                            <th class="admin-table">Type Collecte</th>
	                            <th class="admin-table">Type Objet</th>
	                            <th class="admin-table">Sous Type Objet</th>
	                            <th class="admin-table">Poids</th>
	                        </tr>
	                        <?php
	                            include('../../controller/collect/controller_results_last_5_collect.php');
	                        ?>
	                    </thead>
	                </table>
            	</div>
            </div>
        </div>

        <!-- affichage du bouton annulation -->
        <div class="col-md-3 col-lg-3 col-sm-3">
        	<div class="panel panel-info">
			    <div class="panel-collect">
					<h3 class="panel-title"><label>Annulation</label></h3>
				</div>
				<div class="panel-body" id="divID">
					<a href="../../controller/collect/controller_cancel_collect.php">
						<button type="button" class="btn btn-danger btn-lg bouton-annule" title="Annuler la dernière pesée">Annuler la dernière pesée</button>
					</a>
   				</div>
   			</div>
   		</div>
    </body>
</html>

<?php
	// initialisation des variables de session
	unset($_SESSION['collect_source_value']);
	unset($_SESSION['object_type_value']);
	unset($_SESSION['object_weight_value']);
	unset($_SESSION['confirmation_message']);
	include('../../controller/reset_variables_session.php');
	}
	// redirection sur la page d'authentification dans le cas ou l'internaute saisi le chemin en direct dans l'url
	else{
		include('../../redirects/to_index.php');
	}
?>