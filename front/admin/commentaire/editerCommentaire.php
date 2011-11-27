<?php
	include '../../../domaine/Commentaire.class.php';
	include '../../../manager/QueryCommentaire.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$commentaire=new Commentaire();
	
	//penser a proteger les champs des caracteres speciaux
	$commentaire->id = $_POST['id']."";
	$commentaire->texte = mysql_escape_string($_POST['texte']."");
	$commentaire->datePublication = mysql_escape_string($_POST['datePublication']."");
	$commentaire->annonceId = mysql_escape_string($_POST['annonceId']."");
	$commentaire->utilisateurId = mysql_escape_string($_POST['utilisateurId']."");
	
	$qCommentaire=new QueryCommentaire();
	$qCommentaire->update($commentaire);

	header("location:../index.php?pageAdmin=commentaire");
?>