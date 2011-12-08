<?php
	include 'manager/QueryAnnonce.class.php'; 
	include 'manager/QueryCommentaire.class.php'; 
	include 'manager/QueryNotification.class.php';
	include 'manager/QueryTransaction.class.php';
	include 'manager/QueryTypeAnnonce.class.php'; 
	include 'domaine/Commentaire.class.php';
	include 'domaine/Notification.class.php';
	include 'domaine/Annonce.class.php';
	include 'domaine/Transaction.class.php';
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
			
			if(ISSET($_POST['titre'])){
				$annonce=new Annonce();
				//penser a proteger les champs des caracteres speciaux
				$annonce->typeAnnonceId = mysql_escape_string($_POST['typeAnnonceId']."");
				$annonce->utilisateurId = mysql_escape_string($_POST['utilisateurId']."");
				$annonce->titre = mysql_escape_string($_POST['titre']."");
				$annonce->desc = mysql_escape_string($_POST['desc']."");
				$annonce->date = mysql_escape_string($_POST['date']."");
				$annonce->adresse = mysql_escape_string($_POST['adresse']."");
				$annonce->cp = mysql_escape_string($_POST['cp']."");
				$annonce->ville = mysql_escape_string($_POST['ville']."");
				$annonce->coutPoivre = mysql_escape_string($_POST['coutPoivre']."");
				$annonce->idAnnonceParent = mysql_escape_string($_POST['idAnnonceParent']."");
				$annonce->annonceValide = mysql_escape_string($_POST['annonceValide']."");
				$annonce->datePublication = mysql_escape_string($_POST['datePublication']."");
				$annonce->permanente = mysql_escape_string($_POST['permanente']."");
				
				$qAnnonce=new QueryAnnonce();
				$qAnnonce->insert($annonce);
			}
			
			
			//creer une annonce
			?>
				<form method="POST" id="adminForm" action="<?php echo $_SERVER["PHP_SELF"];?>">
					<fieldset ><legend>Créer une annonce </legend>
							<input type="hidden" name="utilisateurId" value="<?php echo $user->id; ?>"/>
							<label for="typeAnnonceId">Type</label>
							<?php $util->getListTypeAnnonce('');?>
							<label for="titre">Titre</label>
							<input name="titre"/>
							<label for="desc">Description</label>
							<textarea name="desc"></textarea>
							<label for="datePublication">Date</label>
							<input name="datePublication" value="<?php echo date('d-m-Y',time());?>"/>
							<input type="hidden" name="date" value="<?php echo date('d-m-Y',time());?>"/>
							<label for="adresse">Adresse</label>
							<input name="adresse" value="<?php echo $user->adresse;?>"/>
							<label for="cp">Cp</label>
							<input name="cp" value="<?php echo $user->cp;?>"/>
							<label for="ville">Ville</label>
							<input name="ville" value="<?php echo $user->ville;?>"/>
							<label for="coutPoivre">Cout Poivre</label>
							<input name="coutPoivre"/>
							<label for="permanente">Permanente</label>
							<select name="permanente">
								<option value="0">Non</option>
								<option value="1">Oui</option>
							</select>
							<input type="hidden" name="idAnnonceParent" value="0" />
							<input type="hidden" name="annonceValide" value="0" />
					</fieldset>		
						<p>
        				<input type="submit" name="submit" value ="créer" />
    					</p>
				</form>
			<?php 
			
			//Liste de vos annonces
			$listeAnnonce = $qAnnonce->getByUserId($user->id);
			?>
			<fieldset><legend> Toutes mes annonces </legend>
			<?php
			while ($blop=mysql_fetch_object($listeAnnonce)){
				echo "<h3><a href='consulterAnnonce.php?annonce=".$blop->id."'>".$blop->titre."</a></h3>";;				
				?><hr/><?php 
			}
			?>
			</fieldset>
			<br />
			<?php
		}
	}
?>