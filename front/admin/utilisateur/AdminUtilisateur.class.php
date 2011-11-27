<?php
	include("../../manager/QueryUtilisateur.class.php");
	include("../../manager/QueryNiveau.class.php");
	include ("AuthClassMaster.class.php");
	include ("../Util.class.php");

	?><br/><br/><?php
	class AdminUtilisateur extends AuthClassMaster{
		function __construct(){
			parent::__construct();
			$util = new Util();
			$qUtilisateur=new QueryUtilisateur();
			$resultat=$qUtilisateur->selectAll();
			?>
				<table>
					<tr>
						<td>Id</td>
						<td>Niveau</td>
						<td>Nom</td>
						<td>Prenom</td>
						<td>Pseudo</td>
						<td>Password</td>
						<td>Email</td>
						<td>Adresse</td>
						<td>CP</td>
						<td>Ville</td>
						<td>Poivre</td>
						<td>Telephone Fixe</td>
						<td>Telephone Portable</td>
						<td>Date Derniere Connection</td>
						<td>Photo</td>
						<td>Edition</td>
						<td>Supprimer</td>
					</tr>
			<?php 
			while($blop=mysql_fetch_object($resultat)){
				?>
					<tr><form method="POST" action="utilisateur/editerUtilisateur.php">
						<td><input name="id" readonly="true" value="<?php echo $blop->id; ?>"/></td>
						<td><?php $util->getListNiveau($blop->niveauId);?></td>
						<td><input name="nom" value="<?php echo $blop->nom; ?>"/></td>
						<td><input name="prenom" value="<?php echo $blop->prenom; ?>"/></td>	
						<td><input name="pseudo" value="<?php echo $blop->pseudo; ?>"/></td>	
						<td><input name="password" value="<?php echo $blop->password; ?>"/></td>	
						<td><input name="email" value="<?php echo $blop->email; ?>"/></td>	
						<td><input name="adresse" value="<?php echo $blop->adresse; ?>"/></td>
						<td><input name="cp" value="<?php echo $blop->cp; ?>"/></td>
						<td><input name="ville" value="<?php echo $blop->ville; ?>"/></td>
						<td><input name="poivre" value="<?php echo $blop->poivre; ?>"/></td>
						<td><input name="telephoneFixe" value="<?php echo $blop->telephoneFixe; ?>"/></td>
						<td><input name="telephonePortable" value="<?php echo $blop->telephonePortable; ?>"/></td>
						<td><input name="dateDerniereConnection" value="<?php echo $blop->dateDerniereConnection; ?>"/></td>
						<td><input name="photo" value="<?php echo $blop->photo; ?>"/></td>
						<td><input value="E" type="submit"/></td>				
					</form>
					<form method="POST" action="utilisateur/supprimerUtilisateur.php">
						<input type="hidden" name="id" value="<?php echo $blop->id;?>"/>
						<td><input value="X" type="submit"/></td>
					</form>
					</tr>
				<?php 
			}
			//création
			?>
			</table>
			<br/><br/>
				<form method="POST" action="utilisateur/creerUtilisateur.php">
					Nom : <input name="nom"/><br/>
					Niveau : <?php $util->getListNiveau('');?><br/>
					Prenom : <input name="prenom"/><br/>
					Pseudo : <input name="pseudo"/><br/>
					Password : <input name="password"/><br/>
					Email : <input name="email"/><br/>
					Adresse : <input name="adresse"/><br/>
					Cp : <input name="cp"/><br/>
					Ville : <input name="ville"/><br/>
					Poivre : <input name="poivre"/><br/>
					Telephone Fixe<input name="telephoneFixe"/><br/>
					Telephone Portable<input name="telephonePortable"/><br/>
					Date Derniere Connection<input name="dateDerniereConnection"/><br/>
					Photo<input name="photo"/><br/>
					<input value="Creer" type="submit"/>		
				</form>
			<?php
		}
	}
?>