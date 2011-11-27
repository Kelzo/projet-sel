<?php
	include '../../../domaine/Commentaire.class.php';
	include '../../../manager/QueryCommentaire.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$commentaire=new Commentaire();
	$commentaire->id= $_POST['id']+"";
	
	$qCommentaire=new QueryCommentaire();
	$qCommentaire->delete($commentaire);

	header("location:../index.php?pageAdmin=commentaire");
?>