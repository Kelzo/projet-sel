<?php
	include("../../manager/QueryAgenda.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");
	include ("../Constante.class.php");
	
	?><br/><br/><?php
	class AdminAgenda extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qAgenda=new QueryAgenda();
			$resultat=$qAgenda->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>Description</td>
						<td>Date</td>
						<td>Lieu</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="agenda/editerAgenda.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>	
						<td><input name="description" type="text" value="<?php echo $blop->description; ?>"/></td>	
						<td><input name="date" type="text" value="<?php echo $blop->date; ?>"/></td>	
						<td><input name="lieu" type="text" value="<?php echo $blop->lieu; ?>"/></td>	
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="agenda/supprimerAgenda.php">
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
			
				<form method="POST" id="adminForm" action="agenda/creerAgenda.php">
					<fieldset><legend>Créer un évenenement dans l'Agenda </legend>
							<label for="desc">Description</label>
							<input type="texte" name="description"/></input>
							<label for="texte">Date</label>
							<input type="text" name="date"/></input>
							<label for="texte">Lieu</label>
							<input type="text" name="lieu"/></input>
					</fieldset>
					<p>
        			<input type="submit" name="submit" value ="créer" />
    				</p>	
				</form>
			<?php
		}
	}
?>