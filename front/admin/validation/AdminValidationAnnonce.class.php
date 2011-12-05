<?php
	include("../../manager/QueryAnnonce.class.php");
	include("../../manager/QueryUtilisateur.class.php");
	class AdminValidationAnnonce{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$qUser = new QueryUtilisateur();
			if(ISSET($_POST['annonceId'])){
				$annonce = $qAnnonce->getById($_POST['annonceId']);
				if(ISSET($_POST['valider'])){
					$annonce->annonceValide=1;
				}else if(ISSET($_POST['nonValider'])){
					$annonce->annonceValide=0;
				}
				$qAnnonce->update($annonce);
			}
			//recuperation des annonces pas encore validé
			$listeAnnonce = $qAnnonce->getAnnonceSansValide();
			while($blop=mysql_fetch_object($listeAnnonce)){
				echo $blop->id.", ".$blop->titre." (".$blop->desc."). Valider l'annonce <form action='".$_SERVER["PHP_SELF"]."?pageAdmin=validationAnnonce' method='POST'><input name='annonceId' type='hidden' value='".$blop->id."'/><input name='valider' type='submit' value='Oui'/><input name='nonValider' type='submit' value='Non'/></form>"; 
			}
		}	
	}
?>