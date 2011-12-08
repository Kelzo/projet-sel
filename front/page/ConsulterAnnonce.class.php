<?php
	include 'manager/QueryAnnonce.class.php'; 
	include 'manager/QueryCommentaire.class.php'; 
	include 'manager/QueryNotification.class.php';
	include 'manager/QueryTypeAnnonce.class.php'; 
	include 'manager/QueryTransaction.class.php';
	include 'domaine/Commentaire.class.php';
	include 'domaine/Notification.class.php';
	include 'domaine/Annonce.class.php';
	include 'domaine/Transaction.class.php';
	include 'TraitementMesAnnonces.class.php';
	
	
	class ConsulterAnnonce{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$id = $_SESSION['id'];
			$util = new Util();
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);
			$qCom = new QueryCommentaire();

			new TraitementMesAnnonces();
			
			//on recupere l'annonce
			$blop = $qAnnonce->getById($_GET['annonce']);
			if($blop->utilisateurId==$user->id || $blop->annonceValide==1){
				echo "<h3><a href='consulterAnnonce.php?annonce=".$blop->id."'>".$blop->titre."</a></h3>".$blop->desc."<br/><br/><br/>";
					//ajout de la suppression
				if($blop->utilisateurId==$user->id){
				?><form action="<?php echo $_SERVER["PHP_SELF"];?>?annonce=<?php echo $_GET['annonce']?>" method="POST">
						<input name="annonceId" type="hidden" value="<?php echo $blop->id;?>"/>
						<input name="suppressionAnnonce" type="submit" value="X"/>
					</form><?php 
				}
				$listeCom = $qCom->getByAnnonceId($blop->id);
				while($blip = mysql_fetch_object($listeCom)){
					//recuperation de l'utilisateur
					$qEmmetteur = new QueryUtilisateur();
					$emmetteur = $qEmmetteur->getById($blip->utilisateurId); 
					echo date('d-m-Y',strtotime($blip->datePublication))." : ".$blip->texte."<br/>Posté par : ".$emmetteur->nom." ".$emmetteur->prenom."<br/>";
					//ajout de la commande de suppression
					if($blip->utilisateurId==$user->id){
						?>
							<form action="<?php echo $_SERVER["PHP_SELF"];?>?annonce=<?php echo $_GET['annonce']?>" method="POST">
								<input name="comId" type="hidden" value="<?php echo $blip->id;?>"/>
								<input name="annonceId" type="hidden" value="<?php echo $blop->id; ?>"/>
								<input name="suppressionCom" type="submit" value="X"/>
							</form>
						<?php 
					}
				}
				//formulaire de commentaire
				?>
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>?annonce=<?php echo $_GET['annonce']?>" method="POST">
						<input name="annonceId" type="hidden" value="<?php echo $blop->id; ?>"/>
						Commentaire : <input name="texte"/>
						<input name="commentaire" type="submit"/>
					</form>
				<?php
				//formulaire de reponse uniquement pour les autres
				if($blop->utilisateurId!=$user->id){}
				?>
					<br/>Cette annonce vous interesse? Proposez quelque chose en echange!!!
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>?annonce=<?php echo $_GET['annonce']?>" method="POST">
						<input name="annonceCibleId" type="hidden" value="<?php echo $blop->id; ?>"/>
						Vos annonces : <?php $util->getListeVosAnnonces($user->id);?>
						Poivre : <input name="prix"/>
						<input name="reponse" type="submit"/>
					</form>				
				<?php
			}else{
				?>Cette annonce n'a pas encore été validé par notre équipe<?php 
			} 
		}
	}
?>