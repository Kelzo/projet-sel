<?php
	include("../../manager/QueryAnnonce.class.php");
	include("../../manager/QueryTypeAnnonce.class.php");
	include("../../manager/QueryUtilisateur.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");

	?><br/><br/><?php
	class AdminAnnonce extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qAnnonce=new QueryAnnonce();
			$resultat=$qAnnonce->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>Utilisateur</td>
						<td>Type</td>
						<td>Titre</td>
						<td>Description</td>
						<td>Date</td>
						<td>Adresse</td>
						<td>CP</td>
						<td>Ville</td>
						<td>Cout Poivre</td>
						<td>Id annonce parent</td>
						<td>Annonce Valid&eacute;</td>
						<td>Date Publication</td>
						<td>Permanente</td>
						<td>Edition</td>
						<td>Supprimer</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="annonce/editerAnnonce.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><?php $util->getListUtilisateur($blop->utilisateurId);?></td>
						<td><?php $util->getListTypeAnnonce($blop->typeAnnonceId);?></td>
						<td><input name="titre" value="<?php echo $blop->titre; ?>"/></td>
						<td><input name="desc" value="<?php echo $blop->desc; ?>"/></td>	
						<td><input name="date" value="<?php echo $blop->date; ?>"/></td>	
						<td><input name="adresse" value="<?php echo $blop->adresse; ?>"/></td>	
						<td><input name="cp" value="<?php echo $blop->cp; ?>"/></td>
						<td><input name="ville" value="<?php echo $blop->ville; ?>"/></td>
						<td><input name="coutPoivre" value="<?php echo $blop->coutPoivre; ?>"/></td>
						<td><?php $util->getListAnnonceParent($blop->idAnnonceParent);?></td>
						<td><input name="annonceValide" value="<?php echo $blop->annonceValide; ?>"/></td>
						<td><input name="datePublication" value="<?php echo $blop->datePublication; ?>"/></td>
						<td><input name="permanente" value="<?php echo $blop->permanente; ?>"/></td>
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="annonce/supprimerAnnonce.php">
						<input type="hidden" name="id" value="<?php echo $blop->id;?>"/>
						<td><input value="X" type="submit"/></td>
					</form>
					</tr>
				<?php 
			}
			//cr�ation
			?>
			</table>
			<br/><br/>
				<form method="POST" id="adminForm" action="annonce/creerAnnonce.php">
					<fieldset ><legend>Cr�er une annonce </legend>
					
							<label for="utilisateurId">Utilisateur</label>
							<?php $util->getListUtilisateur('');?>
							<label for="typeAnnonceId">Type</label>
							<?php $util->getListTypeAnnonce('');?>
							<label for="titre">Titre</label>
							<input name="titre"/>
							
					
							<label for="description">Description</label>
							<input type="text" name="description" />
							<label for="date">Date</label>
							<input name="date"/>
							<label for="adresse">Adresse</label>
							<input name="adresse"/>
						
					
							<label for="cp">Cp</label>
							<input name="cp"/>
							<label for="ville">Ville</label>
							<input name="ville"/>
							<label for="coutPoivre">Cout Poivre</label>
							<input name="coutPoivre"/>
						
							<label for="idAnnonceParent"> Id Annonce Parent</label>
							<?php $util->getListAnnonceParent('');?>
							<label for="annonceValide"> Annonce Valide </label>
							<input name="annonceValide"/>
							<label for="datePublication" class="datePicker"> Id Annonce Parent</label>
							<input class="datePicker" name="datePublication"/>
							<label for="permanente">Permanente</label>
							<input name="permanente"/>
							</fieldset>	
							<p>
        					<input type="submit" name="submit" value ="cr�er" />
    						</p>	
					
				</form>
			<?php
		}
	}
?>