<?php
	include '../../../domaine/ContenuLibre.class.php';
	include '../../../manager/QueryContenuLibre.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$contenuLibre=new ContenuLibre();
	
	//penser a proteger les champs des caracteres speciaux
	$contenuLibre->idFonctionnel = mysql_escape_string($_POST['idFonctionnel']."");
	$contenuLibre->texte = mysql_escape_string($_POST['texte']."");
	$qContenuLibre=new QueryContenuLibre();
	$qContenuLibre->insert($contenuLibre);

	header("location:../index.php?pageAdmin=contenuLibre");
?>