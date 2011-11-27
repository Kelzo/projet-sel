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
			//cr�ation
			?>
			</table>
			<br/><br/>
				<form method="POST" action="commentaire/creerCommentaire.php">
					Texte : <input name="text"/><br/>
					Date : <input name="datePublication"/><br/>
					Annonce : <?php $util->getListAnnonce(''); ?><br/>
					Utilisateur : <?php $util->getListUtilisateur('');?><br/>
					<input value="Creer" type="submit"/>		
				</form>
			<?php
		}
	}
?>