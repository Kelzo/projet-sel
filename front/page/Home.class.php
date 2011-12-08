<?php
	include 'manager/QueryAnnonce.class.php';
	class Home{
		function __construct(){	
			?>
			<div id="homepage">
			<?php
			$qAnnonce=new QueryAnnonce();
		
			//on recupere les demandes
			$listNeed = $qAnnonce->getNeed();
		
			//on recupere les propositions
			$listService = $qAnnonce->getService();
			?>
			
			<table><tr><td>
			<ul id="service">
				<h2>Proposition(s) :</h2>
			<?php
				$o=0;
				while($blop=mysql_fetch_object($listService)){
				$annonceId=$blop->id;
				?>
					<li><a class="homepageLink" href="consulterAnnonce.php?annonce=<?php echo $annonceId;?>">Consulter</a><?php echo "<span>  ".$blop->titre."</span>  /  ".$blop->desc;?></li>
					<?php
					$o++;
				}
				if($o==0){
				?>
					<p>Il n'y aucune proposition</p>
					<?php
				}
				?>
				</ul>				
			</td><td>
				<ul id="need">
				<h2>Demande(s) :</h2>
			<?php
				$o=0;
				while($blop=mysql_fetch_object($listNeed)){
				$annonceId=$blop->id;
				?>
					<li><a class="homepageLink" href="consulterAnnonce.php?annonce=<?php echo $annonceId;?>">Consulter</a><?php echo "<span>  ".$blop->titre."</span>  /  ".$blop->desc;?></li>
					<?php
					$o++;
				}
				if($o==0){
				?>
					<p>Il n'y aucune demande</p>
					<?php
				}
				?>
				</ul>
				
			</td></tr></table>
				<?php
				new Conseil();
				?>
				
				</div><?php
		}
	}
?>
	