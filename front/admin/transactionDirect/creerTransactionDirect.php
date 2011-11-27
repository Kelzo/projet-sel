<?php
	include '../../../domaine/TransactionDirect.class.php';
	include '../../../manager/QueryTransactionDirect.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$transactionDirect=new TransactionDirect();
	
	//penser a proteger les champs des caracteres speciaux
	$transactionDirect->desc = mysql_escape_string($_POST['desc']."");
	$transactionDirect->recepteurId = mysql_escape_string($_POST['recepteurId']."");
	$transactionDirect->emetteurId = mysql_escape_string($_POST['emetteurId']."");
	$transactionDirect->prix = mysql_escape_string($_POST['prix']."");
	
	$qTransactionDirect=new QueryTransactionDirect();
	$qTransactionDirect->insert($transactionDirect);

	header("location:../index.php?pageAdmin=transactionDirect");
?>