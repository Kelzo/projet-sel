<?php
	include 'manager/QueryAnnonce.class.php'; 
	class MesAnnonces{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			echo Header::$user;
//			$listeAnnonce = $qAnnonce->getByUserId();
//			while ($blop=mysql_fetch_object($listeAnnonce)){
//				echo $blop->titre;
//			}		
		}
	}
?>