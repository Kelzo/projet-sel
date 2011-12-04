<?php
	include("../../manager/QueryTransaction.class.php");
	include("../../manager/QueryUtilisateur.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");

	?><br/><br/><?php
	class AdminTransaction extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qTransaction=new QueryTransaction();
			$resultat=$qTransaction->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>Annonce</td>
						<td>Recepteur</td>
						<td>Emetteur</td>
						<td>Prix</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="transaction/editerTransaction.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><?php $util->getListAnnonce($blop->annonceId);?></td>				
						<td><?php $util->getListRecepteur($blop->recepteurId);?></td>				
						<td><?php $util->getListEmetteur($blop->emetteurId);?></td>
						<td><input name="prix" value="<?php echo $blop->prix; ?>"/></td>
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="transaction/supprimerTransaction.php">
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
				<form method="POST" id="adminForm" action="transaction/creerTransaction.php">
					<fieldset ><legend>Créer une Transaction </legend>
							<label for="annonceId">Annonce</label>
							<?php $util->getListAnnonce('');?>
							<label for="recepteurId">Recepteur</label>
							<?php $util->getListRecepteur('');?>
							<label for="emetteurId">Emetteur</label>
							<?php $util->getListEmetteur('');?>
							<label for="emetteurId">Prix</label>
							<input name="prix"/>

					</fieldset>
					<p>
        			<input type="submit" name="submit" value ="créer" />
    				</p>		
				</form>
			<?php
		}
	}
?>