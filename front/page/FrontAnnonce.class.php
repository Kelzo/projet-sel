<?php
include 'front/Util.class.php';
Class FrontAnnonce{
	function __construct($annonce,$bool){
		
		$util=new Util();
		?>
				<annonce>
					<header>
						<?php if($bool==1){?>
							<h1><a href="annonce.php?annonceId=<?php echo $annonce->id?>"><?php echo $annonce->titre?></a></h1>
						<?php }else{?>
							<h1><a><?php echo $annonce->titre;?></a></h1>
						<?php }?>
					</header>
					<figure>
						<?php if($bool==1){?>
						<a href="annonce.php?annonceId=<?php echo $annonce->id?>">
							<img src="front/image/<?php echo $annonce->lienImage?>" alt="<?php echo $annonce->titre?>"/>
						</a>
						<?php }else{?>
						<a>
							<img src="front/image/<?php echo $annonce->lienImage?>" alt="<?php echo $annonce->titre?>"/>
						</a>
						<?php }?>
					</figure>
					<p class="annonce">
						<?php if($bool==1){
							//on recupere les 500 premiers caracteres
							echo $util->safeString(substr($annonce->contenu,0,600))."...";	
						}else{
							echo $util->safeString($annonce->contenu);
						}
						?>
					</p>
						
					<?php if($bool==1){?>
					<footer>
						<a class="infoAuteur" href="annonce.php?annonceId=<?php echo $annonce->id?>">Mis en ligne par <?php echo $annonce->auteur?> le <time datetime="<?php echo $annonce->date?>"><?php echo $annonce->date?></time></a>
						<a class="readMore" href="annonce.php?annonceId=<?php echo $annonce->id?>">Read more</a>
					</footer>
					<?php }else{?>
<!--							Page de l'annonce au complet-->
						
							<h2>Titre 1</h2>
							<ol>
								<li>Lorem ipsum 1</li>
								<li>Lorem ipsum 2</li>
							</ol>
							
<!--								zone de quote 1-->
							<blockquote class="quote1">
							<span class="designQuote">"</span>
							<a>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</a></blockquote>
							
							<h2>Titre 2</h2>
							<ul>
								<li>Lorem ispum 1</li>
								<li>Lorem ispum 2</li>
							</ul>
							<blockquote class="quote2"><a>
							Le mol&eacute;culaire est surpuissant et surpuissament bon
							</a></blockquote>
					<?php }?>
				</annonce>
		<?php 
	}
}
?>
