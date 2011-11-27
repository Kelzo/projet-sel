<?php
	include("../../manager/QueryNotification.class.php");
	include("../../manager/QueryUtilisateur.class.php");
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
						<td>Etat</td>
						<td>Description</td>
						<td>Date</td>
						<td>Recepteur</td>
						<td>Emetteur</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="notification/editerNotification.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><input name="etat" value="<?php echo $blop->desc; ?>"/></td>
						<td><input name="desc" value="<?php echo $blop->prix; ?>"/></td>
						<td><input name="date" value="<?php echo $blop->prix; ?>"/></td>
						<td><?php $util->getListRecepteur($blop->recepteurId);?></td>				
						<td><?php $util->getListEmetteur($blop->emetteurId);?></td>
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
				<form method="POST" action="notification/creerNotification.php">
					Description : <input name="text"/><br/>
					Etat : <input name="etat"/><br/>
					Date : <input name="date"/><br/>
					Recepteur : <?php $util->getListRecepteur('');?><br/>
					Emetteur : <?php $util->getListEmetteur('');?><br/>
					<input value="Creer" type="submit"/>		
				</form>
			<?php
		}
	}
?>