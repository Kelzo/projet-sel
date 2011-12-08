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
			<div id="lastAnnonce">
				<ul id="service">
				Proposition :
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
					//afficé a null
				}
				?>
				</ul>				
			
				<ul id="need">
				Demande :
			<?php
				while($blop=mysql_fetch_object($listNeed)){
				$annonceId=$blop->id;
				?>
					<li><a class="homepageLink" href="consulterAnnonce.php?annonce=<?php echo $annonceId;?>">Consulter</a><?php echo "<span>  ".$blop->titre."</span>  /  ".$blop->desc;?></li>
					<?php
				}
				?>
				</ul>
				</div>
				<?php
				new Conseil();
				?>
				
				</div><?php
		}
	}
?>
	