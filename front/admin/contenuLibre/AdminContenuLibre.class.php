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
			//cr�ation
			?>
			</table>
			<br/><br/>
			
				<form method="POST" id="adminForm" action="contenuLibre/creerContenuLibre.php">
					<fieldset><legend>Cr�er un contenu libre </legend>
							<label for="idFonctionnel">Id Fonctionnel</label>
							<?php $util->getListIdFContenu(''); ?>	
							<label for="texte">Texte</label>
							<input type="text" name="texte"/></input>
					</fieldset>
					<p>
        			<input type="submit" name="submit" value ="cr�er" />
    				</p>	
				</form>
			<?php
		}
	}
?>