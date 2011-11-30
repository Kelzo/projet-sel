<?php
	include '../../../domaine/ContenuLibre.class.php';
	include '../../../manager/QueryContenuLibre.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$qContenuLibre=new QueryContenuLibre();
	$qContenuLibre->delete($_POST['id']);

	header("location:../index.php?pageAdmin=contenuLibre");
?>