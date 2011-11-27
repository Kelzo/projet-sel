<?php 
	Class Protect{
		function __construct(){
			//ajout de la securité
			if(!ISSET($_SESSION['user'])){
				echo("return");
				//on renvoie a l'index
				header("location:index.php");
			}	
		}
	}
?>