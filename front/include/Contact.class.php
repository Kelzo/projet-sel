<?php
	class Contact{
		function __construct(){
			$qContenuLibre=new QueryContenuLibre();
			$contact = $qContenuLibre->getByIdFonctionnel(CONTENU_CONTACT);
			while ($blop=mysql_fetch_object($contact)){
				if($etat='hidden'){
					echo "<div style='display:none' id=".CONTENU_CONTACT.">".$blop->texte."</div>"; 
				}else{
					echo "<div id=".CONTENU_CONTACT.">".$blop->texte."</div>"; 
				}
			}
		}
	}
?>