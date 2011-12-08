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
	
	class ResultSearch{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$id = $_SESSION['id'];
			$util = new Util();
			$qUser = new QueryUtilisateur();
			$user = $qUser->getById($id);

			if(ISSET($_POST['rechercher'])){
				$qAnnonce = new QueryAnnonce();
				$listeAnnonce = $qAnnonce->getAnnonceBySearch($_POST['champ']);
				$o=0;
				while ($blop=mysql_fetch_object($listeAnnonce)){
					//Liste de vos annonces
					?>
					<fieldset>
						<legend> Resultat recherche </legend>
						<?php
							echo "<h3><a href='consulterAnnonce.php?annonce=".$blop->id."'>".$blop->titre."</a></h3>";;				
						?>
						<hr/>
					</fieldset>
					<br/>
					<?php
					$o++;
				}
				if($o==0){
					?>
					<fieldset>
						<legend> Resultat recherche </legend>
							<h3>Aucun resultat trouvé</h3>
					</fieldset>
					<br/><?php 
				}
			}else{
				if(ISSET($_POST['rechercherAdv'])){
					
				}else{
					?>
					Fonction non implementée
<!--					<form method="POST" action="#">-->
<!--						<input name="rechercher" type="text"/>-->
<!--						<input id="soumettre" name="soumettre" type="submit" name="rechercherAdv"/>-->
<!--					</form>-->
					<?php 
				}
			}
		}
	}
?>