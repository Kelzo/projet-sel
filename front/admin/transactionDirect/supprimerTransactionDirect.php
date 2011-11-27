<?php
	include '../../../domaine/TransactionDirect.class.php';
	include '../../../manager/QueryTransactionDirect.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$transactionDirect=new TransactionDirect();
	$transactionDirect->id= $_POST['id']+"";
	
	$qTransactionDirect=new QueryTransactionDirect();
	$qTransactionDirect->delete($transactionDirect);

	header("location:../index.php?pageAdmin=transactionDirect");
?>