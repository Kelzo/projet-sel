<?php
	include '../../../domaine/Agenda.class.php';
	include '../../../manager/QueryAgenda.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$qAgenda=new QueryAgenda();
	$qAgenda->delete($_POST['id']);

	header("location:../index.php?pageAdmin=agenda");
?>