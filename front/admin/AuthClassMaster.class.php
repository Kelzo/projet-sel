<?php
	class AuthClassMaster{
		function __construct()
		{
			if(ISSET($_POST['login']) && ISSET($_POST['mdp'])){
				if($_POST['login']=="Exod" && $_POST['mdp']=="370095"){
					$_SESSION['exod']="god";
				}
				else{
					echo "<p>Erreur lors de l'autentification,<br/>";
					echo "veillez reessayer</p>";
				}
			}
			if(!ISSET($_SESSION['exod']) || $_SESSION['exod']!="god"){
				?><p>Zone d'administration veuillez vous identifier<br/>
				<table>
				<form action="#" method="POST">
					<tr><td>Login </td><td><input name="login" type="text"/></td></tr>
					<tr><td>MDP </td><td><input name="mdp" type="password"></td></tr>
					<br/><input type="submit" value="Confirmer"/>
					</p>
				</form>
				</table><?php 
				exit();	
			}
		}
	}
?>