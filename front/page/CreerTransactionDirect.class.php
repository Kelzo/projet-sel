<?php
	include 'domaine/TransactionDirect.class.php';
	include 'domaine/Notification.class.php';
	include 'manager/QueryTransactionDirect.class.php';
	include 'manager/QueryNotification.class.php';
	
	class CreerTransactionDirect{
		function __construct(){		
			$util = new Util();
			$qUtilisateur =new QueryUtilisateur();
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
				$notification->desc="Vous avez reçu une demande de transaction direct";
				$notification->type=TRANSACTION_DIRECT;
				$notification->etat="EN_ATTENTE";
				$notification->emetteurId=$_SESSION['id'];
				$notification->recepteurId=$_POST['recepteurId'];
				//recuperation de la derniere transaction direct
				$lastTransaction = $qTransactionDirect->getLastTransaction();
				$notification->transactionDirectId = $lastTransaction->id;
				$notification->annonceId=-1;
				$qNotification = new QueryNotification();
				$qNotification->insert($notification);
			}
			?><form id="adminForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
				<fieldset ><legend>Transaction Directe</legend>
					<label for="desc">Vente</label>
					<textarea name="desc"></textarea><br/>
					<label for="listRecepteur">Cible</label>
					<?php $util->getListRecepteur('');?> <br/>
					<label for="prix">Prix</label>
					<input name="prix" type="text"/><br/>
				</fieldset>
				<p>
        			<input type="submit" name="submit" value ="créer" />
    			</p>
			</form><?php 		
		}
	}
?>