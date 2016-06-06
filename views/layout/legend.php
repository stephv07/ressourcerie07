<legend>
	<div class="row">
	    <div class="col-md-3 col-lg-3 col-sm-3">
	    	<h2 class="nom-ressourcerie" title="Affiche le site de la ressourcerie"><?php echo $_SESSION['site'];?></h2>
	    </div>
	    <div class="col-md-3 col-md-offset-6 col-lg-3 col-lg-coffset-6 col-sm-3 col-sm-offset-6">
	    	<h4 class="date-du-jour" title="Affiche la date du jour">
		    	<?php 
					$date = date("d/m/Y"); 
					echo ("Nous sommes le $date");
				?>
			</h4>
		</div>
	</div>
</legend>