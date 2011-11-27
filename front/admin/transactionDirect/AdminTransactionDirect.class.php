<?php
	include("../../manager/QueryTransactionDirect.class.php");
	include("../../manager/QueryUtilisateur.class.php");
	include("../../manager/QueryAnnonce.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");

	?><br/><br/><?php
	class AdminTransactionDirect extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qTransactionDirect=new QueryTransactionDirect();
			$resultat=$qTransactionDirect->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>Description</td>
						<td>Recepteur</td>
						<td>Emetteur</td>
						<td>Prix</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="transactionDirect/editerTransactionDirect.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><input name="desc" value="<?php echo $blop->desc; ?>"/></td>
						<td><?php $util->getListRecepteur($blop->recepteurId);?></td>				
						<td><?php $util->getListEmetteur($blop->emetteurId);?></td>
						<td><input name="prix" value="<?php echo $blop->prix; ?>"/></td>
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="transactionDirect/supprimerTransactionDirect.php">
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
				<form method="POST" action="transactionDirect/creerTransactionDirect.php">
					Desc : <input name="text"/><br/>
					Recepteur : <?php $util->getListRecepteur('');?><br/>
					Emetteur : <?php $util->getListEmetteur('');?><br/>
					Prix : <input name="prix"/><br/>
					<input value="Creer" type="submit"/>		
				</form>
			<?php
		}
	}
?>