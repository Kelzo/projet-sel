<?php
	class AuthClassMaster{
		function __construct()
		{
			if(ISSET($_SESSION['niveauId'])){
				if($_SESSION['niveauId']==1){
				}
				else {
				header("location:http://localhost/my-projet-sel/");}
				
			}
			else {
			header("location:http://localhost/my-projet-sel/");}
			}
					
		}
	
?>