<?php
	include("../../manager/QueryTypeAnnonce.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");

	?><br/><br/><?php
	class AdminTypeAnnonce extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qTypeAnnonce=new QueryTypeAnnonce();
			$resultat=$qTypeAnnonce->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>label</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="typeAnnonce/editerTypeAnnonce.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><input name="label" value="<?php echo $blop->label; ?>"/></td>
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="typeAnnonce/supprimerTypeAnnonce.php">
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
				<form method="POST" action="typeAnnonce/creerTypeAnnonce.php">
					label : <input name="label"/><br/>
					<input value="Creer" type="submit"/>		
				</form>
			<?php
		}
	}
?>