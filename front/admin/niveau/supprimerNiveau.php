<?php
	include '../../../domaine/Niveau.class.php';
	include '../../../manager/QueryNiveau.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$niveau=new Niveau();
	$niveau->id = $_POST['id']+"";
	
	$qNiveau=new QueryNiveau();
	$qNiveau->delete($niveau);

	header("location:../index.php?pageAdmin=niveau");
?>