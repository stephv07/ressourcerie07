<?php
	session_start();
	if(isset($_SESSION['user_name'])){
	// stockage de la page active dans la variable de session 'nav'
	$_SESSION['nav'] = 'shop';
	// ajout de l'entete défini dans layout/header
	include('../layout/header.php');
	// ajout de la barre de navigation défini dans layout/nav
	include('../layout/nav.php');
	// ajout de la legend layout/legend
    include('../layout/legend.php');
?>
	<div class="message-OK">
		<?php if(isset($_SESSION['confirmation_message'])){ echo '<script type="text/javascript">' . 'swal(" '. $_SESSION['confirmation_message'] .'");' . '</script>';}?>
	</div>	
		<div class="row">
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="panel panel-info">
				    <div class="panel-shop">
						<h3 class="panel-title"><label>Don</label></h3>
					</div>
					<div class="panel-body">
						<form method="post" action="../../controller/other_operations/controller_donation.php">
							<input type="number" min="0.01" step="0.01" class="form-control saisie-valeur-don" autocomplete="off" placeholder="Somme de la donation" name="donation"/>
							<input type="submit" class="btn btn-success bouton-encaisser-don" title="Encaisser le don" value="Encaisser"/>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="panel panel-info">
				    <div class="panel-shop">
						<h3 class="panel-title"><label>Remboursement</label></h3>
					</div>
					<div class="panel-body">
						<form method="post" action="../../controller/other_operations/controller_repayment.php">
							<input type="number" min="0.01" step="0.01" class="form-control saisie-remboursement" title="Saisir la valeur du remboursement" autocomplete="off" placeholder="Somme à rembourser" name="repayment"/>
							<input type="submit" class="btn btn-success bouton-valide-remboursement" title="Valider le remboursement" value="Rembourser"/>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="panel panel-info">
				    <div class="panel-shop">
						<h3 class="panel-title"><label>Fond de caisse : </label>
								<label>
									<?php 
										include('../../controller/other_operations/controller_view_cash_float.php'); 
									?>
								</label>
						</h3>
					</div>
					<div class="panel-body">
						<form method="post" action="../../controller/other_operations/controller_cash_float.php">
							<input type="number" min="0.01" step="0.01" class="form-control saisie-valeur-don" autocomplete="off" placeholder="Valeur fond de caisse" name="cash_float"/>
							<input type="submit" class="btn btn-success bouton-encaisser-don" title="Modifier le fond de caisse" value="Modifier"/>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-lg-3 col-sm-3">
				<div class="panel panel-info">
				    <div class="panel-shop">
						<h3 class="panel-title"><label>Prélèvement</label></h3>
					</div>
					<div class="panel-body">
						<form method="post" action="../../controller/other_operations/controller_debit.php">
							<input type="number" min="0.01" step="0.01" class="form-control saisie-valeur-don" autocomplete="off" placeholder="Valeur prélèvement" name="debit"/>
							<input type="submit" class="btn btn-success bouton-encaisser-don" title="Ajouter un prélèvement" value="Prélever"/>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 col-sm-4 col-sm-offset-4">
				<a href="../../controller/other_operations/controller_cancel_other_operations.php">
					<button type="button" class="btn btn-danger btn-lg center bouton-annule-other" title="Annuler la dernière saisie">Annuler dernière saisie</button>
				</a>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12">
				<div class="panel panel-info">
				    <div class="panel-shop">
						<h3 class="panel-title">
							<label>Les 5 dernières opérations</label>
						</h3>
					</div>
					<div class="panel-body table table-responsive">
		                <table class="table table-bordered">
		                    <thead>
		                        <tr>
		                            <th class="admin-table">Date</th>
		                            <th class="admin-table">Don</th>
		                            <th class="admin-table">Remboursement</th>	
		                            <th class="admin-table">Prélèvement</th>
		                        </tr>
		                        <?php
		                            include('../../controller/other_operations/controller_results_last_5_other_operations.php');
		                        ?>
		                    </thead>
		                </table>
	            	</div>
	            </div>
            </div>
    </body>
</html>

<?php
	include('../../controller/reset_variables_session.php');
	unset($_SESSION['confirmation_message']);
	unset($_SESSION['confirmation_message']);
	unset($_SESSION['confirmation_message']);
	unset($_SESSION['confirmation_message']);
	unset($_SESSION['confirmation_message']);
	unset($_SESSION['confirmation_message']);
	unset($_SESSION['confirmation_message']);
	}
	else{
		include('../../redirects/to_shop.php');
	}
?>