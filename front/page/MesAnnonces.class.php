<?php
	include 'manager/QueryAnnonce.class.php'; 
	class MesAnnonces{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$id = $_SESSION['id'];
			$qUser = new QueryUtilisateur();
			$user;
			while($blop=mysql_fetch_object($qUser)){
				$user=$blop;
			}
			$listeAnnonce = $qAnnonce->getByUserId($blop->id);
			while ($blop=mysql_fetch_object($listeAnnonce)){
				echo $blop->titre;
			}		
		}
	}
?>