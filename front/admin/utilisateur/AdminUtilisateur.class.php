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
				<form method="POST"  id="adminForm" action="utilisateur/creerUtilisateur.php">
					<fieldset><legend>Créer un Utilisateur </legend>
								<label for="nom">Nom</label>
								<input name="nom"/>
								<label for="niveau">Niveau</label>
								<?php $util->getListNiveau('');?>
								<label for="prenom">Prenom</label>
								<input name="prenom"/>
								<label for="pseudo">Pseudo</label>
								<input name="pseudo"/>
								<label for="password">Password</label>
								<input name="password"/>
								<label for="email">Email</label>
								<input name="email"/>
								<label for="adresse">Adresse</label>
								<input name="adresse"/>
								<label for="cp">Code Postal</label>
								<input name="cp"/>
								<label for="ville">Ville</label>
								<input name="ville"/>
								<label for="poivre">Poivre</label>
								<input name="poivre"/>
								<label for="telephoneFixe">Telephone Fixe</label>
								<input name="telephoneFixe"/>
								<label for="telephonePortable">Telephone Portable</label>
								<input name="telephonePortable"/>
								<label for="dateDerniereConnection">Date Derniere Connection</label>
								<input name="dateDerniereConnection"/>
								<label for="photo">Photo</label>
								<input name="photo"/>
									
							</div>
							
						</fieldset>	
						<p>
        				<input type="submit" name="submit" value ="créer" />
    					</p>
				</form>
			<?php
		}
	}
?>