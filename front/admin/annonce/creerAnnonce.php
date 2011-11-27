<?php
	include '../../../domaine/Annonce.class.php';
	include '../../../manager/QueryAnnonce.class.php';
	include '../../../Connection.class.php';
	//on recupere les donnée du formulaire et on le chargfe dans l'objet
	$annonce=new Annonce();
	
	//penser a proteger les champs des caracteres speciaux
	$annonce->typeAnnonceId = mysql_escape_string($_POST['typeAnnonceId']."");
	$annonce->utilisateurId = mysql_escape_string($_POST['utilisateurId']."");
	$annonce->titre = mysql_escape_string($_POST['titre']."");
	$annonce->desc = mysql_escape_string($_POST['desc']."");
	$annonce->date = mysql_escape_string($_POST['date']."");
	$annonce->adresse = mysql_escape_string($_POST['adresse']."");
	$annonce->cp = mysql_escape_string($_POST['cp']."");
	$annonce->ville = mysql_escape_string($_POST['ville']."");
	$annonce->coutPoivre = mysql_escape_string($_POST['coutPoivre']."");
	$annonce->idAnnonceParent = mysql_escape_string($_POST['idAnnonceParent']."");	
	$annonce->annonceValide = mysql_escape_string($_POST['annonceValide']."");	
	$annonce->datePublication = mysql_escape_string($_POST['datePublication']."");
	
	$qAnnonce=new QueryAnnonce();
	$qAnnonce->insert($annonce);

	header("location:../index.php?pageAdmin=annonce");
?>