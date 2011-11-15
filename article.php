<?php
	include("front/include/Header.class.php");
	include("front/page/FrontAnnonce.class.php");
	include 'front/include/Side.claas.php';
	include 'front/include/Widget.class.php';
	include("front/include/Footer.class.php");

	new Header();
	new Side();
	new Widget();
	
	$annonceid=$_GET['annonceId'];
	$queryArt = new QueryAnnonce();
	$annonce = $queryArt->selectAnnonce($annonceid);
	while($blop=mysql_fetch_object($annonce)){
		new FrontAnnonce($blop, 0);
	}
	new Footer();	 		
	
?>