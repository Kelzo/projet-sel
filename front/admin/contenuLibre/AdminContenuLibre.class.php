<?php
	include("../../manager/QueryContenuLibre.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");
	include ("../Constante.class.php");
	
	?><br/><br/><?php
	class AdminContenuLibre extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qContenuLibre=new QueryContenuLibre();
			$resultat=$qContenuLibre->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>Id Fonctionnel</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="contenuLibre/editerContenuLibre.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><?php $util->getListIdFContenu($blop->idFonctionnel); ?></td>	
						<td><textarea name="texte"><?php echo $blop->texte; ?></textarea></td>
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="contenuLibre/supprimerContenuLibre.php">
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
			
				<form method="POST" action="contenuLibre/creerContenuLibre.php">
					<fieldset class="adminForm"><legend>Créer un contenu libre </legend>
						<div class="left">
							<label for="idFonctionnel">Id Fonctionnel</label>
							<?php $util->getListIdFContenu(''); ?>	
							<label for="texte">Texte</label>
							<textarea name="texte"/></textarea> <br/>
							<input value="Creer" type="submit"/>
						</div>
					</fieldset>
				</form>
			<?php
		}
	}
?>