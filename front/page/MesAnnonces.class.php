<?php
	include 'manager/QueryAnnonce.class.php'; 
	include 'manager/QueryCommentaire.class.php'; 
	include 'manager/QueryNotification.class.php'; 
	include 'domaine/Commentaire.class.php';
	include 'domaine/Notification.class.php';
	
	class MesAnnonces{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$id = $_SESSION['id'];
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);
			$qCom = new QueryCommentaire();
				
			//on traite le formulaire
			if(ISSET($_POST['texte'])){
				$newCom = new Commentaire();
				$newCom->annonceId=$_POST['annonceId'];
				$newCom->datePublication= date('Y-m-d',time());
				$newCom->texte=$_POST['texte'];
				$newCom->utilisateurId=$user->id; 
				$qCom->insert($newCom);
				
				//on envoie une notification a celui qui a écrit le com
				$notif1 = new Notification();
				$notif1->date=date('Y-m-d',time());
				$notif1->desc="Vous avez commenté l'annonce ".$_POST['annonceId'];
				$notif1->desc=mysql_escape_string($notif1->desc);
				$notif1->etat="REPONDU";
				$notif1->recepteurId=$user->id;
				$notif1->emetteurId=$user->id;
				$notif1->type="COMMENTAIRE";
				$qNotif=new QueryNotification();
				$qNotif->insert($notif1);
				
				//on recupere l'annonce
				$annonce = $qAnnonce->getById($_POST['annonceId']);
				//on envoie une notification a celui qui a écrit l'annonce
				$notif2 = new Notification();
				$notif2->date=date('Y-m-d',time());
				$notif2->desc=$user->id." a commenté votre annonce ".$_POST['annonceId'];
				$notif2->etat="REPONDU";
				$notif2->recepteurId=$annonce->utilisateurId;
				$notif2->emetteurId=$user->id;
				$notif2->type="COMMENTAIRE";
				$qNotif->insert($notif2);
			}
			
			//on traite la suppression
			if(ISSET($_POST['comId'])){
				$qCom->delete($_POST['comId']);
				//on envoie une notification
				$notif1 = new Notification();
				$notif1->date=date('Y-m-d',time());
				$notif1->desc="Vous avez supprimé un de vos commentaires de l'annonce ".$_POST['annonceId'];
				$notif1->desc=mysql_escape_string($notif1->desc);
				$notif1->etat="REPONDU";
				$notif1->recepteurId=$user->id;
				$notif1->emetteurId=$user->id;
				$notif1->type="COMMENTAIRE";
				$qNotif=new QueryNotification();
				$qNotif->insert($notif1);
			}
			
			$listeAnnonce = $qAnnonce->getByUserId($user->id);
			while ($blop=mysql_fetch_object($listeAnnonce)){
				echo "<h2>".$blop->titre."</h2>".$blop->desc."<br/><br/><br/>";
				$listeCom = $qCom->getByAnnonceId($blop->id);
				while($blip = mysql_fetch_object($listeCom)){
					//recuperation de l'utilisateur
					$qEmmetteur = new QueryUtilisateur();
					$emmetteur = $qEmmetteur->getById($blip->utilisateurId); 
					echo $blip->datePublication." : ".$blip->texte."<br/>Posté par : ".$emmetteur->nom." ".$emmetteur->prenom."<br/>";
					//ajout de la commande de suppression
					if($blip->utilisateurId==$user->id){
						?>
							<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
								<input name="comId" type="hidden" value="<?php echo $blip->id;?>"/>
								<input type="submit" value="X"/>
							</form>
						<?php 
					}
				}
				//formulaire de reponse
				?>
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
						<input name="annonceId" type="hidden" value="<?php echo $blop->id; ?>"/>
						<input name="texte"/>
						<input type="submit"/>
					</form>
				<?php
				?><hr/><?php 
			}		
		}
	}
?>