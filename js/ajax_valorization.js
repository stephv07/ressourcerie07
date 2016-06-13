
/* ------------------------------------------------------------------------------------------------------------------------
| Cette fonction sert à déclarer un nouvel objet "new XMLHttpRequest()" stocké dans une variable que nous appelerons "xhr".
| Les versions d'IE inférieures à 7 requièrent toujours une instanciation via un contrôle ActiveX. 
|Pour déclarer un objet ActiveX, on utilise le "try...catch"
-------------------------------------------------------------------------------------------------------------------------*/ 
function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	return xhr;
}


/* ------------------------------------------------------------------------------------------------------------------------
| Cette fonction sert à définir les modalités d'envoi avec la méthode "open" puis la méthode "send" enverra la requête.
| Cette fonction est appelé par l'évènement "onchange" présent dans l'élément select (menu déroulant).
| A chaque fois que le menu déroulant subira un changement, cette fonction sera appelée. Les données seront récupérées 
| avec les propriétés "responseText" ou "responseXML" qui correspond au format que l'on souhaite à la réception.
| La fonction "readData" déclaré plus bas sur cette page sert à structurer les réponses
-------------------------------------------------------------------------------------------------------------------------*/ 
function request(oSelect) {
	var value = oSelect.options[oSelect.selectedIndex].value;
	var xhr   = getXMLHttpRequest();

	/* ------------------------------------------------------------------------------------------------------------------------ 
	| La fonction ci-dessous permet d'évaluer les changements d'état de la requête pour savoir où elle en est.
	| A chaque changement d'état, on scrutera duquel il s'agit. Pour scruter ces changements, on utilise "readyState"
	| La propriété "status" permet d'évaluer le status.
	| readyState == 4 le serveur a fini son travail, status == 200 ou status == 0 équivaut à succès de la requête
	| On pourrait ajouter dans la condition if une barre d'avancement ou autre
	-------------------------------------------------------------------------------------------------------------------------*/
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			readData(xhr.responseXML); 
		} 
	};

	/* ------------------------------------------------------------------------------------------------------------------------
	| 1er argument : méthode de transfert GET ou POST
	| 2ème argument: url de la page qui donnera suite à la requête
	| 3ème argument: mode transfert true = asynchrone, false = synchrone (ce paramètre est optionnel, par défaut est true)
	-------------------------------------------------------------------------------------------------------------------------*/
	xhr.open("POST", "../../model/format_input_pages/initialize_valorization_type_menu.php", true);
	
	/* ------------------------------------------------------------------------------------------------------------------------
	| Méthode qui découle du transfert POST ci-dessus qui implique le changement du type "MIME" pour que les serveur accept la requête.
	| Cette ligne est à supprimer si on utilise la méthode GET
	-------------------------------------------------------------------------------------------------------------------------*/
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	/* ------------------------------------------------------------------------------------------------------------------------
	| Lorsqu'on utilise la méthode POST, il faut spécifier les variables dans l'argument de send, avec le methode GET, la synthaxe 
	| serait xhr.send(null). L'argument de send correspond au nom du select ($_POST) value="..." 
	-------------------------------------------------------------------------------------------------------------------------*/
	xhr.send("valorization_type=" + value);
}


/* ------------------------------------------------------------------------------------------------------------------------
| Cette fonction sert structurer les données, c'est une fonction dite de "callback". 
| Dans notre cas, "readData" va remplir le deuxième select (menu déroulant)
-------------------------------------------------------------------------------------------------------------------------*/ 
function readData(oData) {
	var nodes   = oData.getElementsByTagName("item");
	
	// nom de l'id attribué au select qui sera chargé en Ajax
	var oSelect = document.getElementById("valorization");
	var oOption, oInner;

	// boucle pour charger le menu en Ajax
	oSelect.innerHTML = "";
	for (var i=0, c=nodes.length; i<c; i++) {

		// création de la balise htlm option
		oOption = document.createElement("option");

		// création de la balise html name
		oInner  = document.createTextNode(nodes[i].getAttribute("name"));
		
		// charge les noms des éléments du menu
		oOption.value = nodes[i].getAttribute("name");
		
		// ajout des éléments au menu
		oOption.appendChild(oInner);
		oSelect.appendChild(oOption);
	};
}
