<?php
	include 'manager/QueryContenuLibre.class.php';
	include 'domaine/ContenuLibre.class.php';
	include 'front/page/Agenda.class.php';
	include 'front/page/Contact.class.php';
	
	class Index{
		function __construct(){
			//on creer les boutons de controle
			?><button type="button" onclick="switcher('HOME')">HOME</button>
			<button type="button" onclick="switcher('AGENDA')">AGENDA</button>
			<button type="button" onclick="switcher('CONTACT')">CONTACT</button>
			<?php 	
			//puis le js correspondant
			?>
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
				echo "<div id=".CONTENU_HOME.">".$blop->texte."</div>"; 
			}
			
			new Contact('hidden');
			new Agenda('hidden');
			
			echo("<br/><br/>");
			
			if(ISSET($_SESSION['id'])){
				header("location:home.php");
			}else{
				if(ISSET($_POST['pseudo'])&& ISSET($_POST['password'])){
					//on requete la base
					$qUitlisateur = new QueryUtilisateur();
					$user =$qUitlisateur->getByPseudoAndPassword($_POST['pseudo'], $_POST['password']);
					$i=0;
					$user;
					while($blop=mysql_fetch_object($user)){
						$i++;
						$user=$blop;	
					}
					if($i==0){
						//login echoue
						echo "Echec du login<br/>";
						$this->mireDeLogin();
					}else if($i==1){
						//login reussi
						$_SESSION['id']=$user->id;
						$_SESSION['niveauId']=$user->niveauId;
						//on met a jour la date de derniere connection
						$user->dateDerniereConnection=date('Y-m-d', time());
						$qUitlisateur->update($user);
						
						//On v�rifie le niveau de l'utilisateur & redirection admin ou user
						if($_SESSION['niveauId']==-1)
						{
							header("location:front/admin/");
						}
						else {
						header("location:home.php");}
						}
					else{
						//probleme technique
						echo "Probleme technique veuillez contacter l'administrateur<br/>";
					}
				}else{
					$this->mireDeLogin();
				}
			}
		}
		
		function mireDeLogin(){
			?>
				
				
				<form id="mire" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
					<fieldset><legend>Mire de login :</legend>
						<label for="pseudo">Pseudo</label>
						<input name="pseudo" type="text"/><br/>
						<label for="password">Password</label>
						<input name="password" type="password"/><br/>
						<input type="submit"/>
					</fieldset>
				</form>
			<?php 
		}
	}
?>