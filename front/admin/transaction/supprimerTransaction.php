<?php
	include '../../../domaine/Transaction.class.php';
	include '../../../manager/QueryTransaction.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$qTransaction=new QueryTransaction();
	$qTransaction->delete($_POST['id']);

	header("location:../index.php?pageAdmin=transaction");
?>