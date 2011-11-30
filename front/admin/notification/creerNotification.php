<?php
	include '../../../domaine/Notification.class.php';
	include '../../../manager/QueryNotification.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$notification=new Notification();
	
	//penser a proteger les champs des caracteres speciaux
	$notification->type = mysql_escape_string($_POST['type']."");
	$notification->desc = mysql_escape_string($_POST['desc']."");
	$notification->recepteurId = mysql_escape_string($_POST['recepteurId']."");
	$notification->emetteurId = mysql_escape_string($_POST['emetteurId']."");
	$notification->etat = mysql_escape_string($_POST['etat']."");
	$notification->date = mysql_escape_string($_POST['date']."");
	$notification->annonceId = mysql_escape_string($_POST['annonceId']."");
	$qNotification=new QueryNotification();
	$qNotification->insert($notification);

	header("location:../index.php?pageAdmin=notification");
?>