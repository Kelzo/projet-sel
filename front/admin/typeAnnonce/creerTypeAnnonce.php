<?php
	include '../../../domaine/TypeAnnonce.class.php';
	include '../../../manager/QueryTypeAnnonce.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$typeAnnonce=new TypeAnnonce();
	
	//penser a proteger les champs des caracteres speciaux
	$typeAnnonce->label = mysql_escape_string($_POST['label']."");
	
	$qTypeAnnonce=new QueryTypeAnnonce();
	$qTypeAnnonce->insert($typeAnnonce);

	header("location:../index.php?pageAdmin=typeAnnonce");
?>