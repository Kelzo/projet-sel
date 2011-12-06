<?php
	include("front/include/Header.class.php");
	include("front/include/Footer.class.php");
	include 'manager/QueryContenuLibre.class.php';
	include 'domaine/ContenuLibre.class.php';
	include 'front/page/Agenda.class.php';
	include 'front/page/Contact.class.php';
	
	new Header();
?>
	<div id="banniere">Bienvenue au reseau SEL</div>
		<div id="index">

		<?php //on creer les boutons de controle ?>
		<div id="listBoutton">
			<button class="boutonHomeDeco" type="button" onclick="switcher('HOME')">HOME</button>
			<button class="boutonHomeDeco" type="button" onclick="switcher('AGENDA')">AGENDA</button>
			<button class="boutonHomeDeco" type="button" onclick="switcher('CONTACT')">CONTACT</button>
		</div>
		
		<?php //puis le js correspondant ?>
		<script>
			function switcher(string){
				if(string=='HOME'){
					$("#CONTENU_CONTACT").hide();
					$("#CONTENU_AGENDA").hide();
					$("#CONTENU_HOME").show(200);						
				}if(string=='AGENDA'){
					$("#CONTENU_CONTACT").hide();
					$("#CONTENU_HOME").hide();
					$("#CONTENU_AGENDA").show(200);
				}if(string=='CONTACT'){
					$("#CONTENU_HOME").hide();
					$("#CONTENU_AGENDA").hide();
					$("#CONTENU_CONTACT").show(200);
				}
				}
		</script>
		
		<?php 
			$qContenuLibre=new QueryContenuLibre();
			//on recupere les contenu libre grace a l'idFonctionnel
			$home = $qContenuLibre->getByIdFonctionnel(CONTENU_HOME);
			while ($blop=mysql_fetch_object($home)){
				echo "<div id=".CONTENU_HOME.">".$blop->texte."</div>"; }
			
			new Contact('hidden');
			new Agenda('hidden');
		?>
	
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
