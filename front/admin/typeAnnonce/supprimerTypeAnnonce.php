<?php
	include '../../../domaine/TypeAnnonce.class.php';
	include '../../../manager/QueryTypeAnnonce.class.php';
	include '../../../Connection.class.php';
	//on recupere les donn�e du formulaire et on le chargfe dans l'objet
	$typeAnnonce=new TypeAnnonce();
	$typeAnnonce->id= $_POST['id']+"";
	
	$typeAnnonce=new QueryTypeAnnonce();
	$typeAnnonce->delete($typeAnnonce);

	header("location:../index.php?pageAdmin=typeAnnonce");
?>