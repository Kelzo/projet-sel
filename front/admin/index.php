<?php
	session_start();
	include('../../Connection.class.php');
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15">

			<title>PortFolio V4 - Administration</title>
					
			<link rel="shortcut icon" href="../style/favicon.ico" />
		</head>
		<body>
<a href="index.php?pageAdmin=annonce">Administration des annonces</a><br/>
<a href="index.php?pageAdmin=deco">Log out</a>
<?php
	if(!isset($_GET['pageAdmin'])){
		
	}else{
		if($_GET['pageAdmin']=="annonce"){
			include 'annonce/AdminAnnonce.class.php';
			new AdminAnnonce();
		}else if($_GET['pageAdmin']=="deco"){
			session_unset();
		}
	}
?>
</body>
</html>