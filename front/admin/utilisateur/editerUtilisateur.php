<?php
	include '../../../domaine/Utilisateur.class.php';
	include '../../../manager/QueryUtilisateur.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$utilisateur=new Utilisateur();
	
	//penser a proteger les champs des caracteres speciaux
	$utilisateur->id = $_POST['id']."";
	$utilisateur->nom = mysql_escape_string($_POST['nom']."");
	$utilisateur->prenom = mysql_escape_string($_POST['prenom']."");
	$utilisateur->pseudo = mysql_escape_string($_POST['pseudo']."");
	$utilisateur->password = mysql_escape_string($_POST['password']."");
	$utilisateur->adresse = mysql_escape_string($_POST['adresse']."");
	$utilisateur->cp = mysql_escape_string($_POST['cp']."");
	$utilisateur->ville = mysql_escape_string($_POST['ville']."");
	$utilisateur->email = mysql_escape_string($_POST['email']."");
	$utilisateur->photo = mysql_escape_string($_POST['photo']."");	
	$utilisateur->poivre = mysql_escape_string($_POST['poivre']."");	
	$utilisateur->dateDerniereConnection = mysql_escape_string($_POST['dateDerniereConnection']."");
	$utilisateur->niveauId = mysql_escape_string($_POST['niveauId']."");
	$utilisateur->telephoneFixe = mysql_escape_string($_POST['telephoneFixe']."");
	$utilisateur->telephonePortable = mysql_escape_string($_POST['telephonePortable']."");
	
	$qUtilisateur=new QueryUtilisateur();
	$qUtilisateur->update($utilisateur);

	header("location:../index.php?pageAdmin=utilisateur");
?>