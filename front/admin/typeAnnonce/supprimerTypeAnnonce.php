<?php
	include '../../../domaine/TypeAnnonce.class.php';
	include '../../../manager/QueryTypeAnnonce.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$typeAnnonce=new TypeAnnonce();
	$typeAnnonce->id= $_POST['id'];
	
	$queryTypeAnnonce=new QueryTypeAnnonce();
	$queryTypeAnnonce->delete($typeAnnonce);

	header("location:../index.php?pageAdmin=typeAnnonce");
?>