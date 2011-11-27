<?php
	include 'manager/QueryContenuLibre.class.php';
	include 'manager/QueryUtilisateur.class.php';
	include 'domaine/ContenuLibre.class.php';
	include 'front/Constante.class.php';
	include 'front/include/Agenda.class.php';
	include 'front/include/Contact.class.php';
	
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
			
			if(ISSET($_SESSION['pseudo']) && ISSET($_SESSION['password'])){
				header("location:home.php");
			}else{
				if(ISSET($_POST['pseudo'])&& ISSET($_POST['password'])){
					//on requete la base
					$qUitlisateur = new QueryUtilisateur();
					$user =$qUitlisateur->getByPseudoAndPassword($_POST['pseudo'], $_POST['password']);
					$i=0;
					while (mysql_fetch_object($user)){
						$i++;	
					}
					if($i==0){
						//login echoue
						echo "Echec du login<br/>";
						$this->mireDeLogin();
					}else if($i==1){
						//login reussi
						$_SESSION['pseudo']=$_POST['pseudo'];
						$_SESSION['password']=$_POST['password'];
						header("location:home.php");
					}else{
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
				Mire de login : <br/>
				<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
					pseudo : <input name="pseudo" type="text"/><br/>
					password : <input name="password" type="text"/><br/>
					<input type="submit"/>
				</form>
			<?php 
		}
	}
?>