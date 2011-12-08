<?php
	class Search{
		function __construct(){
		?>
			<div class="rechercher">
				<form method="POST" action="resultSearch.php">
					<input id="soumettre" name="rechercher" type="submit"/>
					<p>
						<input name="champ" type="text"/>
					</p>
					<a href="resultSearch.php">Recherche avancée</a>
				</form>
			</div>
		</div>
<?php	
		}
	}
?>