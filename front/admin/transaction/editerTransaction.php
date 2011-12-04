<?php
	include '../../../domaine/Transaction.class.php';
	include '../../../manager/QueryTransaction.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$transaction=new Transaction();
	
	//penser a proteger les champs des caracteres speciaux
	$transaction->id = $_POST['id']."";
	$transaction->annonceId = mysql_escape_string($_POST['annonceId']."");
	$transaction->recepteurId = mysql_escape_string($_POST['recepteurId']."");
	$transaction->emetteurId = mysql_escape_string($_POST['emetteurId']."");
	$transaction->prix = mysql_escape_string($_POST['prix']."");
	
	$qTransaction=new QueryTransaction();
	$qTransaction->update($transaction);

	header("location:../index.php?pageAdmin=transaction");
?>