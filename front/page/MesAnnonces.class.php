<?php
	include 'manager/QueryAnnonce.class.php'; 
	class MesAnnonces{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$id = $_SESSION['id'];
			$qUser = new QueryUtilisateur();
			$utilisateur = $qUser->getById($id);
			$user;
			while($blop=mysql_fetch_object($utilisateur)){
				$user=$blop;
			}
			$listeAnnonce = $qAnnonce->getByUserId($user->id);
			while ($blop=mysql_fetch_object($listeAnnonce)){
				echo $blop->titre;
			}		
		}
	}
?>