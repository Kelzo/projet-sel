<?php
	class TraitementMesAnnonces{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$id = $_SESSION['id'];
			$util = new Util();
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);
			$qCom = new QueryCommentaire();
			$qNotif = new QueryNotification();
			$qTransaction = new QueryTransaction();
			
			//on traite la suppression
			if(ISSET($_POST['suppressionAnnonce'])){
				$qAnnonce->delete($_POST['annonceId']);
				//et on supprime tous les elements si rapportant
				$listeCom = $qCom->getByAnnonceId($_POST['annonceId']);
				while($blop=mysql_fetch_objet($listeCom)){
					$qCom->delete($blop->id);
				}
				$listeNotif = $qNotif->getByAnnonceId($_POST['annonceId']);
				while($blop=mysql_fetch_objet($listeNotif)){
					$qNotif->delete($blop->id);
				}
				$listeTransaction = $qTransaction->getByAnnonceId($_POST['annonceId']);
				while($blop=mysql_fetch_objet($listeTransaction)){
					$qTransaction->delete($blop->id);
				}				
			}
			
			//on traite la reponse
			if(ISSET($_POST['reponse'])){
				//envoi des deux notifications
				$notif1 = new Notification();
				$notif1->date=date('Y-m-d',time());
				//on recupere l'annonce associé
				$annonce = $qAnnonce->getById($_POST['annonceCibleId']);
				$notif1->desc=mysql_escape_string("Vous etez interessé par <a href=consulterAnnonce.php?annonce=".$annonce->id.">l'annonce ".$annonce->titre."</a>");
				$notif1->etat="REPONDU";
				$notif1->recepteurId=$user->id;
				$notif1->emetteurId=$user->id;
				$notif1->type="REPONSE";
				$notif1->annonceId=$_POST['annonceCibleId'];
				$notif1->transactionDirectId=-1;
				$qNotif->insert($notif1);
				
				$notif2 = new Notification();
				$notif2->date=date('Y-m-d',time());
				//on recupere l'annonce associé
				$annonce = $qAnnonce->getById($_POST['annonceCibleId']);
				if($_POST['annonceId']!=-1){
					$notif2->desc=mysql_escape_string($user->nom." ".$user->prenom." est interessé par <a href=consulterAnnonce.php?annonce=".$annonce->id.">l'annonce ".$annonce->titre."</a> et vous propose <a href='consulterAnnonce.php?annonce=".$_POST['annonceId']."'> l'annonce suivante</a> ainsi que ".$_POST['prix']." grains de poivre en echange.");
				}else{
					$notif2->desc=mysql_escape_string($user->nom." ".$user->prenom." est interessé par <a href=consulterAnnonce.php?annonce=".$annonce->id.">l'annonce ".$annonce->titre."</a> et vous propose ".$_POST['prix']." grains de poivre en echange.");
				}
				$notif2->etat="EN_ATTENTE";
				$notif2->recepteurId=$annonce->utilisateurId;
				$notif2->emetteurId=$user->id;
				$notif2->type="REPONSE";
				$notif2->annonceId=$_POST['annonceCibleId'];
				$notif2->transactionDirectId=-1;
				$qNotif->insert($notif2);
				
				//on crée la transaction
				$transaction = new Transaction();
				$transaction->annonceId=$_POST['annonceCibleId'];
				$transaction->emetteurId=$user->id;
				$transaction->recepteurId=$annonce->utilisateurId;
				$transaction->prix=$_POST['prix'];
				$transaction->annoncePropositionId=$_POST['annonceId'];
				$qTransaction->insert($transaction);
			}
			
			//on traite le formulaire commentaire
			if(ISSET($_POST['commentaire'])){
				$newCom = new Commentaire();
				$newCom->annonceId=$_POST['annonceId'];
				$newCom->datePublication= date('Y-m-d',time());
				$newCom->texte=mysql_escape_string($_POST['texte']);
				$newCom->utilisateurId=$user->id; 
				$qCom->insert($newCom);
				
				//on envoie une notification a celui qui a écrit le com
				$notif1 = new Notification();
				$notif1->date=date('Y-m-d',time());
				$annonce = $qAnnonce->getById($_POST['annonceId']);
				$emetteurAnnonce = $qUser->getById($annonce->utilisateurId);
				$notif1->desc=mysql_escape_string("Vous avez commenté <a href=consulterAnnonce.php?annonce=".$annonce->id.">l'annonce</a> concernant ".$annonce->desc." proposé par ".$emetteurAnnonce->nom." ".$emetteurAnnonce->prenom);
				$notif1->etat="REPONDU";
				$notif1->recepteurId=$user->id;
				$notif1->emetteurId=$user->id;
				$notif1->type="COMMENTAIRE";
				$notif1->annonceId=$_POST['annonceId'];
				$notif1->transactionDirectId=-1;
				$qNotif->insert($notif1);
				
				//on envoie une notification a celui qui a écrit l'annonce
				$notif2 = new Notification();
				$notif2->date=date('Y-m-d',time());
				$notif2->desc=mysql_escape_string($user->nom." ".$user->prenom." a commenté votre <a href=consulterAnnonce.php?annonce=".$annonce->id.">annonce ".$annonce->titre."</a><br/>");
				$notif2->etat="REPONDU";
				$notif2->recepteurId=$annonce->utilisateurId;
				$notif2->emetteurId=$user->id;
				$notif2->annonceId=$_POST['annonceId'];
				$notif2->transactionDirectId=-1;
				$notif2->type="COMMENTAIRE";
				$qNotif->insert($notif2);
			}
			
			//on traite la suppression commentaire
			if(ISSET($_POST['suppressionCom'])){
				$qCom->delete($_POST['comId']);
				//on envoie une notification
				$notif1 = new Notification();
				$notif1->date=date('Y-m-d',time());
				$annonce = $qAnnonce->getById($_POST['annonceId']);
				$notif1->desc=mysql_escape_string("Vous avez supprimé un de vos commentaires de <a href=consulterAnnonce.php?annonce=".$annonce->id.">l'annonce ".$annonce->titre."</a><br/>");
				$notif1->etat="REPONDU";
				$notif1->recepteurId=$user->id;
				$notif1->emetteurId=$user->id;
				$notif1->annonceId=$annonce->id;
				$notif1->transactionDirectId=-1;
				$notif1->type="COMMENTAIRE";
				$qNotif->insert($notif1);
			}
			
			//si on creer une annonce
			if(ISSET($_POST['crea'])){
				$annonceNew=new Annonce();
				$annonceNew->typeAnnonceId = mysql_escape_string($_POST['typeAnnonceId']."");
				$annonceNew->utilisateurId = $user->id;
				$annonceNew->titre = mysql_escape_string($_POST['titre']."");
				$annonceNew->desc = mysql_escape_string($_POST['desc']."");
				$annonceNew->date = date('Y-m-d',strtotime(mysql_escape_string($_POST['date']."")));
				$annonceNew->adresse = mysql_escape_string($_POST['adresse']."");
				$annonceNew->cp = mysql_escape_string($_POST['cp']."");
				$annonceNew->ville = mysql_escape_string($_POST['ville']."");
				$annonceNew->coutPoivre = mysql_escape_string($_POST['coutPoivre']."");
				$annonceNew->idAnnonceParent = -1;	
				$annonceNew->annonceValide = false;	
				$annonceNew->datePublication = date('Y-m-d',time());
				$annonceNew->permanente= mysql_escape_string($_POST['permanente']."");
				$qAnnonce->insert($annonceNew);
			}		
		}
	}
?>