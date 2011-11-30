<?php
	include '../../../domaine/Commentaire.class.php';
	include '../../../manager/QueryCommentaire.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$qCommentaire=new QueryCommentaire();
	$qCommentaire->delete($_POST['id']);

	header("location:../index.php?pageAdmin=commentaire");
?>