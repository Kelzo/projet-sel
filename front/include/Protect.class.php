<?php 
	Class Protect{
		function __construct(){
			//ajout de la securité
			if(!ISSET($_SESSION['id'])){
				//on renvoie a l'index
				echo('pafff');
				//header("location:index.php");
			}	
		}
	}
?>