<?php
	class MonCompte{
		function __construct(){
			$qUtilisateur = new QueryUtilisateur();
			$user = $qUtilisateur->getById($_SESSION['id']);
			$util=new Util();
			if(ISSET($_POST['nom'])){
				//on charge l'objet
				$utilisateur = $user;
				$utilisateur->nom = mysql_escape_string($_POST['nom']."");
				$utilisateur->prenom = mysql_escape_string($_POST['prenom']."");
				$utilisateur->pseudo = mysql_escape_string($_POST['pseudo']."");
				$utilisateur->password = mysql_escape_string($_POST['password']."");
				$utilisateur->adresse = mysql_escape_string($_POST['adresse']."");
				$utilisateur->cp = mysql_escape_string($_POST['cp']."");
				$utilisateur->ville = mysql_escape_string($_POST['ville']."");
				$utilisateur->email = mysql_escape_string($_POST['email']."");
				$utilisateur->photo = mysql_escape_string($_POST['photo']."");	
				$utilisateur->telephoneFixe = mysql_escape_string($_POST['telephoneFixe']."");
				$utilisateur->telephonePortable = mysql_escape_string($_POST['telephonePortable']."");

				$qUtilisateur->update($utilisateur);
			}
			?>
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
					<input name="id" type="hidden" value="<?php echo $user->id; ?>"/>
					Id : <?php echo $user->id; ?><br/>
					Niveau : <?php echo $user->niveauId; ?><br/>
					Nombre de grain de poivre <?php echo $user->poivre ?><br/>
					Date derniere connection <?php echo $user->dateDerniereConnection; ?>"<br/>
					Nom : <input name="nom" value="<?php echo $user->nom; ?>"/><br/>
					Prenom : <input name="prenom" value="<?php echo $user->prenom; ?>"/><br/>	
					Pseudo : <input name="pseudo" value="<?php echo $user->pseudo; ?>"/>	<br/>
					Password : <input name="password" value="<?php echo $user->password; ?>"/>	<br/>
					Email : <input name="email" value="<?php echo $user->email; ?>"/>	<br/>
					Adresse : <input name="adresse" value="<?php echo $user->adresse; ?>"/><br/>
					Cp : <input name="cp" value="<?php echo $user->cp; ?>"/><br/>
					Ville : <input name="ville" value="<?php echo $user->ville; ?>"/><br/>
					Telephone Fixe : <input name="telephoneFixe" value="<?php echo $user->telephoneFixe; ?>"/><br/>
					Telephone Portable : <input name="telephonePortable" value="<?php echo $user->telephonePortable; ?>"/><br/>
					Lien Photo : <input name="photo" value="<?php echo $user->photo; ?>"/>
					
					
					<input value="Editer" type="submit"/>								
				</form>
			<?php 
		}
	}
?>