<?php
	include 'manager/QueryNotification.class.php'; 
	class MesNotifications{
		function __construct(){
			$util=new Util();
			$qNotification= new QueryNotification();
			$id = $_SESSION['id'];
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);
			
			$listeNotification = $qNotification->getByRecepteurId($user->id);
			while ($blop=mysql_fetch_object($listeNotification)){
				echo "Par : ".$util->getNomPrenomById($blop->emetteurId)."<br/>".$blop->desc."<br/>Dat� du ".$blop->date."<br/>";
			}	
		}
	}
?>