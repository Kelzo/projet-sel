<?php
	include '../../../domaine/TypeAnnonce.class.php';
	include '../../../manager/QueryTypeAnnonce.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$queryTypeAnnonce=new QueryTypeAnnonce();
	$queryTypeAnnonce->delete( $_POST['id']);

	header("location:../index.php?pageAdmin=typeAnnonce");
?>