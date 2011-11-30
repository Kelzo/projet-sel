<?php
	include '../../../domaine/Niveau.class.php';
	include '../../../manager/QueryNiveau.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$qNiveau=new QueryNiveau();
	$qNiveau->delete($_POST['id']);

	header("location:../index.php?pageAdmin=niveau");
?>