<?php
	include '../../../domaine/Notification.class.php';
	include '../../../manager/QueryNotification.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$notification=new Notification();
	$notification->id= $_POST['id']+"";
	
	$qNotification=new QueryNotification();
	$qNotification->delete($notification);

	header("location:../index.php?pageAdmin=notification");
?>