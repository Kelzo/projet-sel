<?php
	include 'domaine/TransactionDirect.class.php';
	include 'domaine/Notification.class.php';
	include 'manager/QueryTransactionDirect.class.php';
	include 'manager/QueryNotification.class.php';
	
	class CreerTransactionDirect{
		function __construct(){		
			$util = new Util();
			if(ISSET($_POST['recepteurId'])){
				//on charge l'objet
				$transactionDirect = new TransactionDirect();
				$transactionDirect->desc=$_POST['desc'];
				$transactionDirect->emetteurId=$_SESSION['id'];
				$transactionDirect->recepteurId=$_POST['recepteurId'];
				$transactionDirect->prix=$_POST['prix'];
				$qTransactionDirect = new QueryTransactionDirect();
				$qTransactionDirect->insert($transactionDirect);
				echo("Vous avez effectué une demande de transaction direct<br/>");
				
				//generation de la notification
				$notification = new Notification();
				$notification->date=date('Y-m-d', time());
				$notification->desc="Vous avez reçu une demande de transaction direct de la part de ".$transactionDirect->emetteurId." concernant ".$transactionDirect->desc;
				$notification->type=TRANSACTION_DIRECT;
				$notification->etat="EN_ATTENTE";
				$notification->emetteurId=$_SESSION['id'];
				$notification->recepteurId=$_POST['recepteurId'];
				$notification->transactionDirectId = 
				$qNotification = new QueryNotification();
				$qNotification->insert($notification);
			}
			?><form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
					Vous vendez : <br/>
					<textarea name="desc"></textarea><br/>
					A <br/>
					Pseudo : <?php $util->getListRecepteur('');?> <br/>
					Pour la somme de : <input name="prix" type="text"/> grain de poivre<br/>
					<input type="submit"/>
			</form><?php 		
		}
	}
?>