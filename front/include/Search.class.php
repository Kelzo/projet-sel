<?php
	class Search{
		function __construct(){
		?>
			<div class="rechercher">
				<form>
					<input id="soumettre" name="soumettre" type="submit"/>
					<p>
						<input name="rechercher" type="text"/>
					</p>
					<a href="#">Recherche avancée</a>
				</form>
			</div>
		</div>
<?php		

			if(ISSET($_POST['rechercher'])){
					
			}
		}
	}
?>