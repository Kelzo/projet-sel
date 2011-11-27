<?php
	class CreerTransactionDirect{
		function __construct(){		
			$util = new Util();
			?><form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
					Vous vendez : <br/>
					<textarea name="description"></textarea><br/>
					A <br/>
					Pseudo : <?php $util->getListUtilisateur('');?> <br/>
					Pour la somme de : <input name="coutPoivre" type="text"/> grain de poivre<br/>
					<input type="submit"/>
			</form><?php 		
		}
	}
?>