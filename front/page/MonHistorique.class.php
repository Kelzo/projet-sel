<?php
	include 'manager/QueryAnnonce.class.php'; 
	include 'manager/QueryCommentaire.class.php'; 
	include 'manager/QueryNotification.class.php';
	include 'manager/QueryTransaction.class.php';
	include 'manager/QueryTypeAnnonce.class.php'; 
	include 'domaine/Commentaire.class.php';
	include 'domaine/Notification.class.php';
	include 'domaine/Annonce.class.php';
	include 'domaine/Transaction.class.php';
	include 'TraitementMesAnnonces.class.php';
	
	class MesAnnonces{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$id = $_SESSION['id'];
			$util = new Util();
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);
			$qCom = new QueryCommentaire();

		
			
			//liste de vos annonces
			$listeAnnonce = $qAnnonce->getMyHistory($user->id);
			while ($blop=mysql_fetch_object($listeAnnonce)){
				echo "<h2><a href='consulterAnnonce.php?annonce=".$blop->id."'>".$blop->titre."</a></h2>";;				
				?><hr/><?php 
			}		
		}
	}
?>