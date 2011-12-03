<?php
	include("../../manager/QueryCommentaire.class.php");
	include("../../manager/QueryUtilisateur.class.php");
	include("../../manager/QueryAnnonce.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");

	?><br/><br/><?php
	class AdminCommentaire extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qCommentaire=new QueryCommentaire();
			$resultat=$qCommentaire->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>Texte</td>
						<td>Date</td>
						<td>AnnonceId</td>
						<td>Utilisateur</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="commentaire/editerCommentaire.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><input name="texte" value="<?php echo $blop->texte; ?>"/></td>
						<td><input name="datePublication" value="<?php echo $blop->datePublication; ?>"/></td>	
						<td><?php $util->getListAnnonce($blop->annonceId); ?></td>	
						<td><?php $util->getListUtilisateur($blop->utilisateurId);?></td>
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="commentaire/supprimerCommentaire.php">
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
				<form method="POST" id="adminForm" action="commentaire/creerCommentaire.php">
					<fieldset ><legend>Créer un commentaire </legend>
						
							<label for="text">Texte</label>
							<input name="texte"/><br/>
							<label for="datePublication">Date</label>
							<input name="datePublication"/><br/>
							<label for="annonceId">Annonce</label>
							<?php $util->getListAnnonce(''); ?><br/>
							<label for="utilisateurId">Utilisateur</label>
							<?php $util->getListUtilisateur('');?><br/>					
					</fieldset>
					<p>
        			<input type="submit" name="submit" value ="créer" />
    				</p>		
				</form>
			<?php
		}
	}
?>