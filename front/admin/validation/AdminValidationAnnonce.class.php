<?php
	include("../../manager/QueryAnnonce.class.php");
	include("../../manager/QueryUtilisateur.class.php");
	class AdminValidationAnnonce{
		function __construct(){
			$qAnnonce = new QueryAnnonce();
			$qUser = new QueryUtilisateur();
			//recuperation des annonces pas encore validé
			$listeAnnonce = $qAnnonce->getAnnonceValide();
			while($blop=mysql_fetch_object($listeAnnonce)){
				?>
					
					
				<?php 
			}
		}	
	}
?>