<?php 
	Class Protect{
		function __construct(){
			//ajout de la securit�
			if(!ISSET($_SESSION['id'])){
				//on renvoie a l'index
				echo('pafff');
				//header("location:index.php");
			}	
		}
	}
?>