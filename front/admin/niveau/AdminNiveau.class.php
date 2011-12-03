<?php
	include("../../manager/QueryNiveau.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");

	?><br/><br/><?php
	class AdminNiveau extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qNiveau=new QueryNiveau();
			$resultat=$qNiveau->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>label</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="niveau/editerNiveau.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><input name="label" value="<?php echo $blop->label; ?>"/></td>
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="niveau/supprimerNiveau.php">
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
				<form method="POST"  id="adminForm" action="niveau/creerNiveau.php">
					<fieldset><legend>Créer un niveau </legend>			
								<label for="label">Label</label>
								<input name="label"/><br/>
					</fieldset>
					<p>
        			<input type="submit" name="submit" value ="créer" />
    				</p>		
				</form>
				
			<?php
		}
	}
?>