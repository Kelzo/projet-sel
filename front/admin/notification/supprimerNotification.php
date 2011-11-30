<?php
	include '../../../domaine/Notification.class.php';
	include '../../../manager/QueryNotification.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$qNotification=new QueryNotification();
	$qNotification->delete($_POST['id']);

	header("location:../index.php?pageAdmin=notification");
?>