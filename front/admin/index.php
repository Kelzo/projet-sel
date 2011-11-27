<?php
	session_start();
	include('../../Connection.class.php');
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">

			<title>Projet SEL - Administration</title>
					
			<link rel="shortcut icon" href="../style/favicon.ico" />
			<link rel="stylesheet" media="screen" type="text/css" title="Design" href="../style/style.css" id="style"/>
			
<!--			Ajour des script jquery-->
		
		<link type="text/css" href="../style/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="../script/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="../script/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript">
			// Datepicker
			$('.datePicker').datepicker();
		</script>
		
		</head>
		<body>
<div id="admin">
	<a href="index.php?pageAdmin=annonce">Annonces</a><br/>
	<a href="index.php?pageAdmin=niveau">Niveau</a><br/>
	<a href="index.php?pageAdmin=typeAnnonce">Type des annonces</a><br/>
	<a href="index.php?pageAdmin=commentaire">Commentaire</a><br/>
	<a href="index.php?pageAdmin=utilisateur">Utilisateur</a><br/>
	<a href="index.php?pageAdmin=contenuLibre">Contenu Libre</a><br/>
	<a href="index.php?pageAdmin=deco">Log out</a>
	<?php
		if(!isset($_GET['pageAdmin'])){
			
		}else{
			if($_GET['pageAdmin']=="annonce"){
				include 'annonce/AdminAnnonce.class.php';
				new AdminAnnonce();
			}else if($_GET['pageAdmin']=="niveau"){
				include 'niveau/AdminNiveau.class.php';
				new AdminNiveau();
			}else if($_GET['pageAdmin']=="typeAnnonce"){
				include 'typeAnnonce/AdminTypeAnnonce.class.php';
				new AdminTypeAnnonce();
			}else if($_GET['pageAdmin']=="commentaire"){
				include 'commentaire/AdminCommentaire.class.php';
				new AdminCommentaire();
			}else if($_GET['pageAdmin']=="utilisateur"){
				include 'utilisateur/AdminUtilisateur.class.php';
				new AdminUtilisateur();
			}else if($_GET['pageAdmin']=="contenuLibre"){
				include 'contenuLibre/AdminContenuLibre.class.php';
				new AdminContenuLibre();
			}else if($_GET['pageAdmin']=="deco"){
				session_unset();
			}
		}
	?>
</div>
</body>
</html>