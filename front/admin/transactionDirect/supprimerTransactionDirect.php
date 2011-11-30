<?php
	include '../../../domaine/TransactionDirect.class.php';
	include '../../../manager/QueryTransactionDirect.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$qTransactionDirect=new QueryTransactionDirect();
	$qTransactionDirect->delete($_POST['id']);

	header("location:../index.php?pageAdmin=transactionDirect");
?>