<?php 
	session_start();
	include 'domaine/Utilisateur.class.php';
	include 'manager/QueryUtilisateur.class.php';
	include 'front/Constante.class.php';
	include 'Connection.class.php';
	class Header{
		function __construct()
		{	
			?>
		<!DOCTYPE html>
			<html>
			<head>		
				<meta http-equiv="Content-type" content="text/html; charset=windows-1252"/>
				<meta name="description" content=""/>
				<meta name="keywords" content=""/>
				
				<link rel="shortcut icon" href="front/image/favicon.ico">				
		   		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="front/style/style.css" id="style"/>	
				<link type="text/css" href="front/style/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
				
				<script type="text/javascript" src="front/script/jquery-1.6.2.min.js"></script>
				<script type="text/javascript" src="front/script/jquery-ui-1.8.16.custom.min.js"></script>
				
				<title>Projet SEL</title>
				
			</head>
			
			<body>
			
			<?php 
			
			
		}		
	}
?>