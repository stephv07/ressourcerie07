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
			<form method="post" action="../../controller/shop/controller_add_article.php">
				<div class="col-md-2 col-lg-2 col-sm-2">
					<div class="panel-number">
						<button class="btn btn-circle" type="button" disabled="disabled">1</button>
					</div>
					<div class="panel panel-info">
					    <div class="panel-shop">
							<h3 class="panel-title"><label>Saisie</label></h3>
						</div>
						<div class="panel-body">
							<?php include('../../model/format_input_pages/initialize_shop_object_type_menu.php'); ?>
							<?php include('../../model/format_input_pages/initialize_shop_quantity_value.php'); ?>
							<?php include('../../model/format_input_pages/initialize_shop_price_value.php'); ?>
							<?php include('../../model/format_input_pages/initialize_object_weight_value.php'); ?>
					    	<input class="btn btn-default btn-success bouton-saisie" type="submit" name="payment_type" value="Ajouter" title="Ajoute l'article au panier" />
						</div>
					</div>
				</div>
			</form>
			<div class="col-md-6 col-lg-6 col-sm-6">
				<div class="panel-number">
					<button class="btn btn-circle" type="button" disabled="disabled">2</button>
				</div>
				<div class="panel panel-info">
				    <div class="panel-shop">
						<h3 class="panel-title"><label>Panier / Ticket</label></h3>
					</div>
					<form method="post" action="../../controller/shop/controller_delete_article.php">
						<table class="table-responsive table-bordered">
					        <thead>
					            <tr>
					                <th class="panier-table">Article</th>
					                <th class="panier-table">Quantité</th>
					                <th class="panier-table">Poids</th>
					                <th class="panier-table">Prix unitaire</th>
					                <th class="panier-table">Action</th>
					            </tr>
					        </thead>
					        <tbody>
								<?php
									$total = 0;
									if(isset($_SESSION['articles'])){
										if(count($_SESSION['articles'] > 0)){
											for($article_id = 0; $article_id < count($_SESSION['articles']); $article_id ++){
												$total += ($_SESSION['articles'][$article_id]['quantity'] * $_SESSION['articles'][$article_id]['price']);
												?>
									           	<tr>
										        	<td class="panier-table"><?php echo $_SESSION['articles'][$article_id]['type_concat']; ?></td>
											        <td class="panier-table"><?php echo $_SESSION['articles'][$article_id]['quantity']; ?></td>
											        <td class="panier-table"><?php echo $_SESSION['articles'][$article_id]['weight']. 'kg'; ?></td>
											        <td class="panier-table"><?php echo $_SESSION['articles'][$article_id]['price']. '€'; ?></td>
										        	<input type="hidden" name="id_article" value="<?php echo $article_id;?>"/>
										        	<td class="panier-table"><button type="submit" class="btn btn-poubelle btn-xs" title="Supprimer la ligne"><span class="glyphicon glyphicon-trash"></span></button></td>
										      	</tr>
												<?php
											}
										}
									}
								?>
					        </tbody>
					    </table>
					</form>
					<div class="panel panel-total">
						<div class="form-control total-ticket">
							<?php echo 'TOTAL : ' . $total . ' €' ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2 col-lg-2 col-sm-2">
				<div class="panel-number">
					<button class="btn btn-circle" type="button" disabled="disabled">3</button>
				</div>
				<div class="panel panel-info">
				    <div class="panel-shop">
						<h3 class="panel-title"><label>Règlement</label></h3>
					</div>
					<div class="panel-body" id="divID">
						<div class="panel-body">
							<form class="row giving_change" method="post" action="../../controller/shop/controller_giving_change.php">
								<?php $_SESSION['total'] = $total; ?>
								<input type="number" min="0" step="0.01" class="form-control saisie-paiement" autocomplete="off" placeholder="Montant du règlement" name="payment_amount" value="<?php if(isset($_SESSION['payment_amount'])){ echo $_SESSION['payment_amount'];}?>"/>
								<input type="submit" class="btn btn-success bouton-rendu" value="Rendu monnaie" title="Calculer le rendu de la monnaie"/>
								<input type="text" class="form-control affichage-rendu" autocomplete="off" placeholder="Montant à rendre" value="<?php if(isset($_SESSION['giving_change'])){ echo $_SESSION['giving_change'] . ' €';}?>"/>
							</form>
						</div>
	   				</div>
	   			</div>
			</div>
			<div class="col-md-2 col-lg-2 col-sm-2">
				<div class="panel-number">
					<button class="btn btn-circle" type="button" disabled="disabled">4</button>
				</div>
				<div class="panel panel-info">
				    <div class="panel-shop">
						<h3 class="panel-title"><label>Mode de paiement</label></h3>
					</div>
					<form class="row" method="post" action="../../controller/shop/controller_shop.php">
						<div class="panel-body" id="divID">
							<input type="submit" name="payment_type" autocomplete="off" class="btn btn-primary bouton-encaissement" title="Validation de la vente avec paiement en espèces" value="Espèces"/>
							<input type="submit" name="payment_type" autocomplete="off" class="btn btn-primary bouton-encaissement" title="Validation de la vente avec paiement par chèque" value="Chèque"/>
							<input type="submit" name="payment_type" autocomplete="off" class="btn btn-primary bouton-encaissement" title="Validation de la vente avec paiement par carte bleue" value="Carte Bleue"/>
		   				</div>
		   			</form>
	   			</div>
	   			<div class="panel panel-info">
				    <div class="panel-shop">
						<h3 class="panel-title"><label>Autres opérations</label></h3>
					</div>
					<form method="post" action="other_operations.php">
						<input type="submit" class="btn bouton-don-remboursement" value="Opérations caisse" title="Accéder au opérations de la caisse">
					</form>
					<form method="post" action="../../views/pages/cash_day.php">
						<input type="submit" class="btn bouton-don-remboursement" value="Caisse" title="Accéder à la caisse">
					</form>
					<a href="../../controller/shop/controller_cancel_shop.php">
						<button type="button" class="btn btn-danger btn-lg bouton-annule-shop" title="Annuler la dernière vente saisie">Annuler la dernière vente</button>
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12">
				<div class="panel panel-info">
				    <div class="panel-shop">
						<h3 class="panel-title">
							<label>Les 5 Dernières ventes</label>
						</h3>
					</div>
					<div class="panel-body table table-responsive">
		                <table class="table table-bordered">
		                    <thead>
		                        <tr>
		                            <th class="admin-table">Date</th>
		                            <th class="admin-table">N°</th>
		                            <th class="admin-table">Type Objet</th>
		                            <th class="admin-table">Sous Type Objet</th>
		                            <th class="admin-table">Quantité</th>
		                            <th class="admin-table">Poids</th>
		                            <th class="admin-table">Prix Unitaire</th>
		                        </tr>
		                        <?php
		                            include('../../controller/shop/controller_results_last_5_shop.php');
		                        ?>
		                    </thead>
		                </table>
	            	</div>
	            </div>
            </div>
    </body>
</html>

<?php
	unset($_SESSION['object_type_value']);
	unset($_SESSION['confirmation_message']);
	unset($_SESSION['confirmation_message']);
	unset($_SESSION['object_quantity_value']);
	unset($_SESSION['object_price_value']);
	unset($_SESSION['object_weight_value']);
	unset($_SESSION['giving_change']);
	unset($_SESSION['payment_amount']);
	include('../../controller/reset_variables_session.php');
	}
	else{
		include('../../redirects/to_index.php');
	}
?>