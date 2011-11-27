<?php
	include '../../../domaine/ContenuLibre.class.php';
	include '../../../manager/QueryContenuLibre.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$contenuLibre=new ContenuLibre();
	$contenuLibre->id = $_POST['id']+"";
	
	$qContenuLibre=new QueryContenuLibre();
	$qContenuLibre->delete($contenuLibre);

	header("location:../index.php?pageAdmin=contenuLibre");
?>