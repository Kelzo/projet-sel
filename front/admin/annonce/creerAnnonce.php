<?php
	include '../../../domaine/Annonce.class.php';
	include '../../../manager/QueryAnnonce.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$annonce=new annonce();
	
	//penser a proteger les champs des caracteres speciaux
	$annonce->titre = mysql_escape_string($_POST['titre']."");
	$annonce->desc = mysql_escape_string($_POST['desc']."");
	$annonce->date = mysql_escape_string($_POST['date']."");
	$annonce->adresse = mysql_escape_string($_POST['adresse']."");
	$annonce->cp = mysql_escape_string($_POST['cp']."");
	$annonce->ville = mysql_escape_string($_POST['ville']."");
	$annonce->coutPoivre = mysql_escape_string($_POST['coutPoivre']."");
	$annonce->idAnnonceParent = mysql_escape_string($_POST['idAnnonceParent']."");	
	$annonce->annonceValide = mysql_escape_string($_POST['annonceValide']."");	
	
	$qAnnonce=new QueryAnnonce();
	$qAnnonce->insert($annonce);

	header("location:../index.php?pageAdmin=annonce");
?>