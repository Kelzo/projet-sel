<?php
	class NosPartenaires{
		function __construct(){
			$qContenuLibre=new QueryContenuLibre();
			$partenaire = $qContenuLibre->getByIdFonctionnel(NOS_PARTENAIRES);
			while ($blop=mysql_fetch_object($partenaire)){
				echo "<div id=".NOS_PARTENAIRES.">".$blop->texte."</div>"; 
			}
		}
	}
?>