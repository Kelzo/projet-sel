<?php
	include '../../../domaine/Notification.class.php';
	include '../../../manager/QueryNotification.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$notification=new Notification();
	
	//penser a proteger les champs des caracteres speciaux
	$notification->id = $_POST['id']."";
	$notification->desc = mysql_escape_string($_POST['desc']."");
	$notification->recepteurId = mysql_escape_string($_POST['recepteurId']."");
	$notification->emetteurId = mysql_escape_string($_POST['emetteurId']."");
	$notification->etat = mysql_escape_string($_POST['etat']."");
	$notification->date = mysql_escape_string($_POST['date']."");
	
	$qNotification=new QueryNotification();
	$qNotification->update($notification);

	header("location:../index.php?pageAdmin=notification");
?>