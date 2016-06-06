<?php
	session_start();
	// stockage de la page active dans la variable de session 'nav'
	if(isset($_SESSION['user_name'])){
	// ajout de l'entete défini dans layout/header
	include('../../views/layout/header.php');
	// ajout de la barre de navigation défini dans layout/nav
	include('../../views/layout/nav.php');
	// ajout de la legend layout/legend
    include('../../views/layout/legend.php');
?>	
		<div class="panel-body table table-responsive">
			<div class="panel-shop">
				<h3 class="panel-title">
					<label>Etat de la caisse</label>
				</h3>
			</div>
		    <table class="table table-bordered">
		        <thead>
		            <tr>
		                <th class="admin-table">Date</th>
		                <th class="admin-table">Fond caisse</th>
		                <th class="admin-table">Prélévement</th>
		                <th class="admin-table">Remboursement</th>
		                <th class="admin-table">Dons</th>
		                <th class="admin-table">Total ventes</th>
		                <th class="admin-table">Caisse</th>
		            </tr>
		            <?php
		            	include('../../controller/cash_day/controller_cash_day.php');
		            ?>
		        </thead>
		    </table>
		</div>
<?php
	include('../../controller/reset_variables_session.php');
	}
	// redirection sur la page d'authentification dans le cas ou l'internaute saisi le chemin en direct dans l'url
	else{
		include('../../redirects/to_index.php');
	}
?>