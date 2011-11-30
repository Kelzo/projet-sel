<?php
	include 'manager/QueryAnnonce.class.php'; 
	include 'manager/QueryCommentaire.class.php'; 
	include 'manager/QueryNotification.class.php';
	include 'manager/QueryTypeAnnonce.class.php'; 
	include 'domaine/Commentaire.class.php';
	include 'domaine/Notification.class.php';
	include 'domaine/Annonce.class.php';
	include 'TraitementMesAnnonces.class.php';
	
	
	class MesAnnonces{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$id = $_SESSION['id'];
			$util = new Util();
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);
			$qCom = new QueryCommentaire();

			new TraitementMesAnnonces();
			
			//creer une annonce
			?>
				<form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<fieldset class="adminForm"><legend>Créer une annonce </legend>
						<div class="left">
							<label for="typeAnnonceId">Type</label>
							<?php $util->getListTypeAnnonce('');?>
							<label for="titre">Titre</label>
							<input name="titre"/>
							</div>
						<div class="left"> 
							<label for="desc">Description</label>
							<textarea name="desc"></textarea>
							<label for="date">Date</label>
							<input name="date" value="<?php echo date('d-m-Y',time());?>"/>
							<label for="adresse">Adresse</label>
							<input name="adresse" value="<?php echo $user->adresse;?>"/>
						</div>
						<div class="left"> 
							<label for="cp">Cp</label>
							<input name="cp" value="<?php echo $user->cp;?>"/>
							<label for="ville">Ville</label>
							<input name="ville" value="<?php echo $user->ville;?>"/>
							<label for="coutPoivre">Cout Poivre</label>
							<input name="coutPoivre"/>
						</div>
						<a class="clear"></a><input name="crea" value="Creer" type="submit"/></a>
					</fieldset>		
				</form>
			<?php 
			
			//liste de vos annonces
			$listeAnnonce = $qAnnonce->getByUserId($user->id);
			while ($blop=mysql_fetch_object($listeAnnonce)){
				echo "<h2>".$blop->titre."</h2>".$blop->desc."<br/><br/><br/>";
				//ajout de la suppression
				?><form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
					<input name="annonceId" type="hidden" value="<?php echo $blop->id;?>"/>
					<input name="suppressionAnnonce" type="submit" value="X"/>
				</form><?php 
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
								<input name="annonceId" type="hidden" value="<?php echo $blop->id; ?>"/>
								<input name="suppressionCom" type="submit" value="X"/>
							</form>
						<?php 
					}
				}
				//formulaire de commentaire
				?>
					<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
						<input name="annonceId" type="hidden" value="<?php echo $blop->id; ?>"/>
						Commentaire : <input name="texte"/>
						<input name="commentaire" type="submit"/>
					</form>
				<?php
				//formulaire de reponse
				?>
					
				<?php 
				?><hr/><?php 
			}		
		}
	}
?>