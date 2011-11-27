<?php
	include '../../../domaine/Niveau.class.php';
	include '../../../manager/QueryNiveau.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$niveau=new Niveau();
	
	//penser a proteger les champs des caracteres speciaux
	$niveau->label = mysql_escape_string($_POST['label']."");
	$qNiveau=new QueryNiveau();
	$qNiveau->insert($niveau);

	header("location:../index.php?pageAdmin=niveau");
?>