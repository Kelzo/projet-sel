<?php
	include("front/include/Header.class.php");
	include("front/include/Footer.class.php");
	//test commit
	new Header();
?>
	<div id="banniere">Bienvenue au reseau SEL</div>
	
	<!-- FORMULAIRE INSCRIPTION -->
	<form method="POST" action="front/page/InscriptionUser.php">
	<fieldset>
		<legend>Inscription</legend>			
			<label for="nomUtilisateur">Nom</label>
			<input name="nomUtilisateur"/><br />
			<label for="prenomUtilisateur">Prénom</label>
			<input name="prenomUtilisateur"/><br />
			<label for="pseudoUtilisateur">Pseudo</label>
			<input name="pseudoUtilisateur"/><br />
			<label for="passwordUtilisateur">Password</label>
			<input name="passwordUtilisateur"/><br />
			<label for="emailUtilisateur">Email</label>
			<input name="emailUtilisateur"/><br />
			<label for="adresseUtilisateur">Adresse</label>
			<input name="adresseUtilisateur"/><br />
			<label for="villeUtilisateur">Ville</label>
			<input name="villeUtilisateur"/><br />
			<label for="cpUtilisateur">CP</label>
			<input name="cpUtilisateur"/><br />
			<label for="telPortableUtilisateur">Téléphone Portable</label>
			<input name="telPortableUtilisateur"/><br />
			<label for="telFixeUtilisateur">Téléphone Fixe</label>
			<input name="telFixeUtilisateur"/><br />
			
			<?php
				if(ISSET($_SESSION['message']))
					{echo $_SESSION['message']."<br />";}
			?>
			
		<p><input type="submit" name="submit" value ="créer" /></p>	
	</fieldset>				
</form>

<?php	

	new Footer();	
?>	
