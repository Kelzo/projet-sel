<?php
	include '../../../domaine/ContenuLibre.class.php';
	include '../../../manager/QueryContenuLibre.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$contenuLibre=new ContenuLibre();
	
	//penser a proteger les champs des caracteres speciaux
	$contenuLibre->id = $_POST['id']."";
	$contenuLibre->idFontcionnel = mysql_escape_string($_POST['idFontcionnel']."");
	$contenuLibre->label = mysql_escape_string($_POST['label']."");
	
	$qContenuLibre=new QueryContenuLibre();
	$qContenuLibre->update($contenuLibre);

	header("location:../index.php?pageAdmin=contenuLibre");
?>