<?php
	include("front/include/Header.class.php");
	include("front/include/Protect.class.php");
	include 'front/include/MenuP.class.php';
	include 'front/include/MenuUser.class.php';
	include 'front/include/Conseil.class.php';
	include 'front/include/Search.class.php';
	include("front/page/Home.class.php");
	include("front/include/Footer.class.php");
	//test commit
	new Header();
	new Protect();
	new MenuP();	
	new MenuUser();
	new Search();
	new Home();
	new Conseil();
	new Footer();	 		
?>
