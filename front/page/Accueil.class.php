<?php
	include 'front/page/FrontAnnonce.class.php';
	class Accueil{
		function __construct(){		
			$qAnnonce=new QueryAnnonce();
			$selectAll = $qAnnonce->selectAllActif();
			while ($blop=mysql_fetch_object($selectAll)){
				new FrontAnnonce($blop,1);
			}		
		}
	}
?>