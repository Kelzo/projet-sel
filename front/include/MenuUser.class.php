<?php
	class MenuUser{
		function __construct(){
			$qUtilisateur = new QueryUtilisateur();
			$user = $qUtilisateur->getById($_SESSION['id']);
			$util=new Util();
			?>
	
			<div id="pseudo_area">
					<span class="pseudo"><?php echo $user->pseudo; ?></span>
					<span class="poivre">(Grain(s) de poivre: <?php echo $user->poivre; ?>)</span>
			</div>
			<div class="menuTop">
					<div class="menu_User">
					<a  class="boutonHomeDeco"  href="mesNotifications.php">Mes Notifications</a>
					<a  class="boutonHomeDeco"  href="monCompte.php">Mon Compte</a>
					<a  class="boutonHomeDeco"  href="mesAnnonces.php">Mes Annonces</a>
					<a  class="boutonHomeDeco"  href="monHistorique.php">Mon Historique</a>
				</div>
			<?php 
		}	
	}
?>