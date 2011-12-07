<?php
	include 'manager/QueryNotification.class.php'; 
	include 'manager/QueryTransactionDirect.class.php';
	include 'manager/QueryTransaction.class.php';
	include 'manager/QueryAnnonce.class.php';
	include 'domaine/Notification.class.php';
	include 'domaine/TransactionDirect.class.php';
	include 'domaine/Transaction.class.php';
	
	class MesNotifications{
		function __construct(){
			$util=new Util();
			$qNotification= new QueryNotification();
			$qAnnonce= new QueryAnnonce();
			$qTransaction = new QueryTransactionDirect();
			$id = $_SESSION['id'];
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);
			
			if(ISSET($_POST['accepter'])){
				//la notification transaction a été accepté 
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
				if($notification->transactionDirectId!=-1){
					$repNotification->type="TRANSACTION_DIRECT";
					$repNotification->annonceId=-1;
					$repNotification->transactionDirectId=$notification->transactionDirectId;
				}else if($notification->annonceId!=-1){
					$repNotification->type="REPONSE_ANNONCE";
					$repNotification->annonceId=$notification->annonceId;
					$repNotification->transactionDirectId=-1;
				}
				$qNotification->insert($repNotification);
				
				//on valide la transaction
				$vendeur = $qUser->getById($repNotification->recepteurId);
				$acheteur = $qUser->getById($repNotification->emetteurId);
				if($notification->transactionDirectId!=-1){
					$qTransaction = new QueryTransactionDirect();
					$transaction = new TransactionDirect();
					$transaction = $qTransaction->getById($notification->transactionDirectId);
					$vendeur->poivre+=$transaction->prix;
					$acheteur->poivre-=$transaction->prix;
				}else if($notification->annonceId!=-1){
					$qTransaction = new QueryTransaction();
					$transaction = new Transaction();
					$transaction = $qTransaction->getById($notification->annonceId);
					$vendeur->poivre-=$transaction->prix;
					$acheteur->poivre+=$transaction->prix;
					
					//on supprime l'annonce si la transaction est non permanente
						$annonce = $qAnnonce->getById($notification->annonceId); 
						$annonce->annonceValide = 2;
						$qAnnonce->update($annonce);
						//et on supprime tous les elements si rapportant
						$listeCom = $qCom->getByAnnonceId($annonce->id);
						while($blop=mysql_fetch_objet($listeCom)){
							$qCom->delete($blop->id);
						}
						$listeNotif = $qNotif->getByAnnonceId($annonce->id);
						while($blop=mysql_fetch_objet($listeNotif)){
							$qNotif->delete($blop->id);
						}
						$listeTransaction = $qTransaction->getByAnnonceId($annonce->id);
						while($blop=mysql_fetch_objet($listeTransaction)){
							$qTransaction->delete($blop->id);
						}	
				}
				
				
				$qUser->update($acheteur);
				$qUser->update($vendeur);
				
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
				if($notification->transactionDirectId!=-1){
					$repNotification->type="TRANSACTION_DIRECT";
					$repNotification->annonceId=-1;
					$repNotification->transactionDirectId=$notification->transactionDirectId;
				}else if($notification->annonceId){
					$repNotification->type="REPONSE_ANNONCE";
					$repNotification->annonceId=$notification->annonceId;
					$repNotification->transactionDirectId=-1;
				}
				$qNotification->insert($repNotification);
			}
			
			if(ISSET($_POST['notifId'])){
				$qNotification->delete($_POST['notifId']);
			}
			
			$listeNotification = $qNotification->getByRecepteurId($user->id);
			while ($blop=mysql_fetch_object($listeNotification)){
				//recuperation de la transaction ou de l'annonce associé
				$concernant;
				if($blop->annonceId!=-1){
					$concernant = $qAnnonce->getById($blop->annonceId);
				}else if($blop->transactionDirectId!=-1){
					$concernant = $qTransaction->getById($blop->transactionDirectId);
				}
				echo "Par : ".$util->getNomPrenomById($blop->emetteurId)."<br/>".$blop->desc."<br/>";
				echo "Concernant : ".$concernant->desc."<br/>";
				echo "Pour : ".$concernant->prix." grains de poivres<br/>";
				echo "Daté du ".date('d-m-Y',strtotime($blop->date))."<br/>";
				
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