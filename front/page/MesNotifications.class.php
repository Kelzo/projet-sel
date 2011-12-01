<?php
	include 'manager/QueryNotification.class.php'; 
	include 'manager/QueryTransactionDirect.class.php';
	include 'domaine/Notification.class.php';
	include 'domaine/TransactionDirect.class.php';
	
	class MesNotifications{
		function __construct(){
			$util=new Util();
			$qNotification= new QueryNotification();
			$id = $_SESSION['id'];
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);
			
			if(ISSET($_POST['accepter'])){
				//la notification direct a été accepté 
				$notification = $qNotification->getById($_POST['id']);
				$desc = $notification->desc."<br/>Demande acceptée<br/>";
				$notification->desc=$desc;
				$notification->etat="REPONDU";
				$qNotification->update($notification);
				//envoie de la reponse
				$repNotification = new Notification();
				$repNotification->date=date('Y-m-d',time());
				$repNotification->emetteurId=$id;
				$repNotification->recepteurId=$notification->emetteurId;
				$repNotification->desc="Demande acceptée";
				$repNotification->etat="REPONDU";
				$repNotification->type="TRANSACTION_DIRECT";
				$qNotification->insert($repNotification);
				
				//on valide la transaction
				$vendeur = $qUser->getById($repNotification->recepteurId);
				$acheteur = $qUser->getById($repNotification->emetteurId);
				$qTransaction = new QueryTransactionDirect();
				$transaction = new TransactionDirect();
				$transaction = $qTransaction->getById($notification->transactionDirectId);
				$vendeur->poivre+=$transaction->prix;
				$qUser->update($vendeur);
				$acheteur->poivre-=$transaction->prix;
				$qUser->update($acheteur);
				
			}else if(ISSET($_POST['refuser'])){
				//la notification direct a été refusé 
				//on recupere la notification
				$notification = $qNotification->getById($_POST['id']);
				$notification->desc+="<br/>Demande refusée<br/>";
				$notification->etat="REPONDU";
				$qNotification->update($notification);
				//envoi de la reponse
				$repNotification = new Notification();
				$repNotification->date=date('Y-m-d',time());
				$repNotification->emetteurId=$id;
				$repNotification->recepteurId=$notification->emetteurId;
				$repNotification->desc="Demande refusée";
				$repNotification->etat="REPONDU";
				$repNotification->type="TRANSACTION_DIRECT";
				$qNotification->insert($repNotification);
			}
			
			if(ISSET($_POST['notifId'])){
				$qNotification->delete($_POST['notifId']);
			}
			
			$listeNotification = $qNotification->getByRecepteurId($user->id);
			while ($blop=mysql_fetch_object($listeNotification)){
				//recuperation de la transaction ou de l'annonce associé
				echo "Par : ".$util->getNomPrenomById($blop->emetteurId)."<br/>".$blop->desc."<br/>Daté du ".$blop->date."<br/>";
				
				if($blop->etat!="REPONDU"){
				?>
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
						<input type="hidden" name="id" value="<?php echo $blop->id;?>"/>
						<input type="submit" name="accepter" value="accepter"/>
					</form>
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
						<input type="hidden" name="id" value="<?php echo $blop->id;?>"/>
						<input type="submit" name="refuser" value="refuser"/>
					</form>
				<?php }?>
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
						<input type="hidden" name="notifId" value="<?php echo $blop->id;?>"/>
						<input type="submit" value="X"/>
					</form>
				<?php
				
			}	
		}
	}
?>