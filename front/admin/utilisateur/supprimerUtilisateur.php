<?php
	include '../../../domaine/Utilisateur.class.php';
	include '../../../manager/QueryUtilisateur.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	
	$qUtilisateur=new QueryUtilisateur();
	$qUtilisateur->delete($_POST['id']);

	header("location:../index.php?pageAdmin=utilisateur");
?>