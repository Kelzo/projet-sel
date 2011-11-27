<?php
	include '../../../domaine/Utilisateur.class.php';
	include '../../../manager/QueryUtilisateur.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$utilisateur=new Utilisateur();
	$utilisateur->id= $_POST['id']+"";
	
	$qUtilisateur=new QueryUtilisateur();
	$qUtilisateur->delete($utilisateur);

	header("location:../index.php?pageAdmin=utilisateur");
?>