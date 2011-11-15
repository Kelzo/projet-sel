<?php
	include("../../manager/QueryAnnonce.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");

	?><br/><br/><?php
	class Adminannonce extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qAnnonce=new QueryAnnonce();
			$resultat=$qAnnonce->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>Titre</td>
						<td>Description</td>
						<td>Date</td>
						<td>Adresse</td>
						<td>CP</td>
						<td>Ville</td>
						<td>Cout Poivre</td>
						<td>Id annonce parent</td>
						<td>Annonce Valid&eacute;</td>
						<td>Edition</td>
						<td>Supprimer</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="annonce/editerAnnonce.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><input name="titre" value="<?php echo $blop->titre; ?>"/></td>
						<td><textarea name="desc"><?php echo $blop->desc; ?></textarea></td>	
						<td><input name="date" value="<?php echo $blop->date; ?>"/></td>	
						<td><input name="adresse" value="<?php echo $blop->adresse; ?>"/></td>	
						<td><input name="cp" value="<?php echo $blop->cp; ?>"/></td>
						<td><input name="ville" value="<?php echo $blop->ville; ?>"/></td>
						<td><input name="coutPoivre" value="<?php echo $blop->coutPoivre; ?>"/></td>
						<td><input name="idAnnonceParent" value="<?php echo $blop->idAnnonceParent; ?>"/></td>
						<td><input name="annonceValide" value="<?php echo $blop->annonceValide; ?>"/></td>
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="annonce/supprimerAnnonce.php">
						<input type="hidden" name="id" value="<?php echo $blop->id;?>"/>
						<td><input value="X" type="submit"/></td>
					</form>
					</tr>
				<?php 
			}
			//création
			?>
			</table>
			<br/><br/>
				<form method="POST" action="annonce/creerAnnonce.php">
					Titre : <input name="titre"/><br/>
					Description : <textarea name="desc"></textarea><br/>
					Date : <input name="date"/><br/>
					Adresse : <input name="adresse"/><br/>
					Cp : <input name="cp"/><br/>
					Ville : <input name="ville"/><br/>
					Cout Poivre : <input name="coutPoivre"/><br/>
					Id annonce parent<input name="idAnnonceParent"/><br/>
					Annonce Valide<input name="annonceValide"/><br/>
					<input value="Creer" type="submit"/>		
				</form>
			<?php
		}
	}
?>