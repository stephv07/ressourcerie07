<?php
	// Ensemble des requêtes qui vont stocker dans des tableaux les valeurs des différents menu déroulant

	// initialisation du tableau menu collecte type
	$_SESSION['menu_collect_type'] = [];
	$receive_collect_menu = $bdd->prepare('
		SELECT 
		collect_type.id,
		collect_type.type,
        collect_sub_type.sub_type,
		case when collect_sub_type.sub_type is null then collect_type.type
		     when collect_sub_type.sub_type is not null then collect_sub_type.sub_type
             end as type_and_sub_type   
		FROM collect_type
		LEFT JOIN collect_sub_type ON (collect_sub_type.type = collect_type.type OR collect_sub_type.sub_type is null)
		ORDER BY collect_type.type
		');
	$receive_collect_menu->execute();
	while($line_collect_menu = $receive_collect_menu->fetch())
	    {
	    	array_push($_SESSION['menu_collect_type'], 
	    		[
		    		$line_collect_menu['id'], 
		    		$line_collect_menu['type'],
		    		$line_collect_menu['sub_type'],
		    		$line_collect_menu['type_and_sub_type']
	    		]);
	    }
	$receive_collect_menu->closeCursor();


	// initialisation du tableau menu object type
	$_SESSION['menu_object_type'] = [];
	$receive_object_menu = $bdd->prepare('
		  	SELECT 
			object_type.id,
			object_type.type,
			object_sub_type.sub_type,
			case when object_sub_type.type is null then object_type.type
			     when object_sub_type.type is not null then CONCAT(object_type.type, " " ,object_sub_type.sub_type)
			     end as type_and_sub_type
			FROM object_type
			LEFT JOIN object_sub_type ON (object_sub_type.type = object_type.type OR object_sub_type.sub_type is null)
			ORDER BY object_type.type DESC
		');
	$receive_object_menu->execute();
	while($line_object_menu = $receive_object_menu->fetch())
	    {
	    	array_push($_SESSION['menu_object_type'], 
	    		[
		    		$line_object_menu['id'], 
		    		$line_object_menu['type'],
		    		$line_object_menu['sub_type'],
		    		$line_object_menu['type_and_sub_type']
	    		]);
	    }
	$receive_object_menu->closeCursor();


	// initialisation du tableau menu valorisation type
	$_SESSION['menu_valorization_type'] = [];
	$receive_valorization_menu = $bdd->prepare('
	  	SELECT 
		valorization_type.id,
		valorization_type.type,
		valorization_sub_type.sub_type,
		case when valorization_sub_type.type is null then valorization_type.type
		     when valorization_sub_type.type is not null then CONCAT(valorization_type.type, " " ,valorization_sub_type.sub_type)
		     end as type_and_sub_type
		FROM valorization_type
		LEFT JOIN valorization_sub_type ON (valorization_sub_type.type = valorization_type.type OR valorization_sub_type.sub_type is null)
		ORDER BY valorization_type.type DESC
		');
	$receive_valorization_menu->execute();
	while($line_valorization_menu = $receive_valorization_menu->fetch())
	    {
	    	array_push($_SESSION['menu_valorization_type'], 
	    		[
		    		$line_valorization_menu['id'], 
		    		$line_valorization_menu['type'],
		    		$line_valorization_menu['sub_type'],
		    		$line_valorization_menu['type_and_sub_type']
	    		]);
	    }
	$receive_valorization_menu->closeCursor();

	// initialisation du tableau menu shop object
	$_SESSION['menu_shop_type'] = [];
	$receive_shop_menu = $bdd->prepare('
		SELECT 
		shop_type.id,
		shop_type.type,
        shop_sub_type.sub_type,
		case when shop_sub_type.sub_type is null then shop_type.type
		     when shop_sub_type.sub_type is not null then CONCAT(shop_type.type, " " ,shop_sub_type.sub_type)
             end as type_and_sub_type   
		FROM shop_type
		LEFT JOIN shop_sub_type ON (shop_sub_type.type = shop_type.type OR shop_sub_type.sub_type is null)
		ORDER BY shop_type.id DESC
		');
	$receive_shop_menu->execute();
	while($line_shop_menu = $receive_shop_menu->fetch())
	    {
	    	array_push($_SESSION['menu_shop_type'], 
	    		[
		    		$line_shop_menu['id'], 
		    		$line_shop_menu['type'],
		    		$line_shop_menu['sub_type'],
		    		$line_shop_menu['type_and_sub_type']
	    		]);
	    }
	$receive_shop_menu->closeCursor();


	// initialisation du menu sites
	$_SESSION['site_menu'] = [];
	$receive_site_menu = $bdd->prepare('
		SELECT 
		sites.id,
		sites.site_name   
		FROM sites
		ORDER BY sites.site_name
		');
	$receive_site_menu->execute();
	while($line_site_menu = $receive_site_menu->fetch())
	    {
	    	array_push($_SESSION['site_menu'], 
	    		[
		    		$line_site_menu['id'], 
		    		$line_site_menu['site_name']
	    		]);
	    }
	$receive_site_menu->closeCursor();
?>