<?php
	include '../../../domaine/Agenda.class.php';
	include '../../../manager/QueryAgenda.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$agenda=new Agenda();
	
	//penser a proteger les champs des caracteres speciaux
	$agenda->description = mysql_escape_string($_POST['description']."");
	$agenda->date = mysql_escape_string($_POST['date']."");
	$agenda->lieu = mysql_escape_string($_POST['lieu']."");
	
	$qAgenda=new QueryAgenda();
	$qAgenda->insert($agenda);

	header("location:../index.php?pageAdmin=agenda");
?>