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
					<ul>
						<li><a href="mesNotifications.php">Mes Notifications</a></li>
						<li><a href="monCompte.php">Mon Compte</a></li>
						<li><a href="mesAnnonces.php">Mes Annonces</a></li>
						<li><a href="monHistorique.php">Mon Historique</a><li>
					</ul>
				</div>
			<?php 
		}	
	}
?>