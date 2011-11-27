<?php
	class Agenda{
		function __construct($etat){
			$qContenuLibre=new QueryContenuLibre();
			$agenda = $qContenuLibre->getByIdFonctionnel(CONTENU_AGENDA);
			while ($blop=mysql_fetch_object($agenda)){
				if($etat='hidden'){
					echo "<div style='display:none' id=".CONTENU_AGENDA.">".$blop->texte."</div>";
				}else{
					echo "<div id=".CONTENU_AGENDA.">".$blop->texte."</div>";
				} 
			}
		}
	}
?>