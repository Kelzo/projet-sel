<?php
	include '../../../domaine/Annonce.class.php';
	include '../../../manager/QueryAnnonce.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$qAnnonce=new QueryAnnonce();
	$qAnnonce->delete($_POST['id']);

	header("location:../index.php?pageAdmin=annonce");
?>