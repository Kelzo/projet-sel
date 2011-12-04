<?php
	include("../../manager/QueryNotification.class.php");
	include("../../manager/QueryUtilisateur.class.php");
	include("../../manager/QueryAnnonce.class.php");
	include("../../manager/QueryTransactionDirect.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");

	?><br/><br/><?php
	class AdminNotification extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qNotification=new QueryNotification();
			$resultat=$qNotification->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>Type</td>
						<td>Etat</td>
						<td>Description</td>
						<td>Date</td>
						<td>Recepteur</td>
						<td>Emetteur</td>
						<td>Annonce</td>
						<td>Transaction Direct</td>
						<td>Poivre</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="notification/editerNotification.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><input name="type" value="<?php echo $blop->type; ?>"/></td>
						<td><input name="etat" value="<?php echo $blop->etat; ?>"/></td>
						<td><input name="desc" value="<?php echo $blop->desc; ?>"/></td>
						<td><input name="date" value="<?php echo $blop->date; ?>"/></td>
						<td><?php $util->getListRecepteur($blop->recepteurId);?></td>				
						<td><?php $util->getListEmetteur($blop->emetteurId);?></td>
						<td><?php $util->getListAnnonce($blop->annonceId);?></td>
						<td><?php $util->getListTransactionDirect($blop->transactionDirectId);?></td>
						<td><input name="poivre" value="<?php echo $blop->poivre; ?>"/></td>
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="notification/supprimerNotification.php">
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
				<form method="POST" id="adminForm" action="notification/creerNotification.php">
					<fieldset><legend>Créer une annonce </legend>
							<label for="desc">Description</label>
							<input name="desc"/>
							<label for="type">Type</label>
							<input name="type"/>
							<label for="etat">Etat</label>
							<input name="etat"/>
							<label for="date">Date</label>
							<input name="date"/>
							<label for="poivre">Poivre</label>
							<input name="poivre"/>
							<label for="recepteurId">Recepteur</label>
							<?php $util->getListRecepteur('');?>
							<label for="emetteurId">Emetteur</label>
							<?php $util->getListEmetteur('');?>
							<label for="annonceId">Annonce</label>
							<?php $util->getListAnnonce('');?>
							<label for="transactionDirectId">Transaction Direct</label>
							<?php $util->getListTransactionDirect('');?>
					</fieldset>
					<p>
        			<input type="submit" name="submit" value ="créer" />
    				</p>		
				</form>
			<?php
		}
	}
?>