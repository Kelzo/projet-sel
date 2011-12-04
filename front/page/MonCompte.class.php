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
				<form id="adminForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
					<fieldset ><legend>Gérer son compte </legend>
					<label for="id">Id</label>
					<input name="id" type="hidden" value="<?php echo $user->id; ?>"/>
					<span><?php echo $user->id; ?></span>
					<label for="niveauId">Niveau Utilisateur</label>
					<span><?php echo $user->niveauId; ?></span>
					<label for="poivre">Vos grains de poivre</label>
					<span><?php echo $user->poivre ?></span>
					<label for="dateDerniereConnection">Derniere connection </label>
					<span><?php echo $user->dateDerniereConnection; ?></span>
					<label for="nom">Nom</label>
					<input name="nom" value="<?php echo $user->nom; ?>"/>
					<label for="prenom">Prenom</label>
					<input name="prenom" value="<?php echo $user->prenom; ?>"/>
					<label for="pseudo">Pseudo</label>	
					<input name="pseudo" value="<?php echo $user->pseudo; ?>"/>
					<label for="password">Password</label>
					<input name="password" value="<?php echo $user->password; ?>"/>
					<label for="email">Email</label>
					<input name="email" value="<?php echo $user->email; ?>"/>
					<label for="adresse">Adresse</label>
					<input name="adresse" value="<?php echo $user->adresse; ?>"/>
					<label for="cp">Code Postal</label>
					<input name="cp" value="<?php echo $user->cp; ?>"/>
					<label for="ville">Ville</label>
					<input name="ville" value="<?php echo $user->ville; ?>"/>
					<label for="telephoneFixe">Téléphone</label>
					<input name="telephoneFixe" value="<?php echo $user->telephoneFixe; ?>"/>
					<label for="telephonePortable">Téléphone portable</label>
					<input name="telephonePortable" value="<?php echo $user->telephonePortable; ?>"/>
					<label for="photo">Lien Photo</label>
					<input name="photo" value="<?php echo $user->photo; ?>"/>
					</fieldset>
					
					<input value="Editer" type="submit"/>								
				</form>
			<?php 
		}
	}
?>