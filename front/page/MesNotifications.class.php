<?php
	include 'manager/QueryNotification.class.php'; 
	class MesNotifications{
		function __construct(){
			$qNotification= new QueryNotification();
			$id = $_SESSION['id'];
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);
			
			$listeNotification = $qNotification->getByRecepteurId($user->id);
			while ($blop=mysql_fetch_object($listeNotification)){
				echo "Par : ".$blop->emetteurId."<br/>".$blop->desc."<br/>Daté du ".$blop->date;
			}	
		}
	}
?>