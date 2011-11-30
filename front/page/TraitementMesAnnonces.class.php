<?php
	class TraitementMesAnnonces{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$id = $_SESSION['id'];
			$util = new Util();
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);
			$qCom = new QueryCommentaire();
			//on traite la suppression
			if(ISSET($_POST['suppressionAnnonce'])){
				$qAnnonce->delete($_POST['annonceId']);				
			}
			
			//on traite le formulaire commentaire
			if(ISSET($_POST['commentaire'])){
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
			
			//on traite la suppression commentaire
			if(ISSET($_POST['suppressionCom'])){
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
				$qAnnonce->insert($annonceNew);
			}		
		}
	}
?>