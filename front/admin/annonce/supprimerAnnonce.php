<?php
	include '../../../domaine/Annonce.class.php';
	include '../../../manager/QueryAnnonce.class.php';
	include '../../../Connection.class.php';
	//on recupere les donn�e du formulaire et on le chargfe dans l'objet
	$annonce=new Annonce();
	$annonce->id= $_POST['id']+"";
	
	$qAnnonce=new QueryAnnonce();
	$qAnnonce->delete($annonce);

	header("location:../index.php?pageAdmin=annonce");
?>