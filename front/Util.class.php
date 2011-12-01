<?php
	class Util{
		function getListActif($elementSelected){
			?><select name="actif"><?php 
			if($elementSelected==1)	{
				?>
				<option selected="selected" value="1">Actif</option>
				<option value="0">Non Actif</option>
				<?php 
			}else {
				?>
				<option value="1">Actif</option>
				<option selected="selected" value="0">Non Actif</option>
				<?php 
			}
			?>
			</select>
			<?php 
		}

		function getListTypeAnnonce($elementSelected){
			$qTypeAnnonce = new QueryTypeAnnonce();
			$resultatType = $qTypeAnnonce->selectAll();
			?>
			<select name="typeAnnonceId">
				<option value="-1">Choisir un type ...</option>
				<?php while($blip = mysql_fetch_object($resultatType)){
					if($blip->label==$elementSelected){
					?><option selected="selected" value="<?php echo $blip->label;?>"><?php echo $blip->label; ?></option><?php 
					}else{
					?><option value="<?php echo $blip->label;?>"><?php echo $blip->label; ?></option><?php 
					}
				}?>
			</select>
			<?php 
		}

		function getListNiveau($elementSelected){
			$qNiveau = new QueryNiveau();
			$resultatNiveau = $qNiveau->selectAll();
			?>
			<select name="niveauId">
				<option value="-1">Choisir un niveau ...</option>
				<?php while($blip = mysql_fetch_object($resultatNiveau)){
					if($blip->label==$elementSelected){
					?><option selected="selected" value="<?php echo $blip->label;?>"><?php echo $blip->label; ?></option><?php 
					}else{
					?><option value="<?php echo $blip->label;?>"><?php echo $blip->label; ?></option><?php 
					}
				}?>
			</select>
			<?php 
		}

		function getListUtilisateur($elementSelected){
			$qUtilisateur = new QueryUtilisateur();
			$resultatUser = $qUtilisateur->selectAll();
			?>
			<select name="utilisateurId">
				<option value="-1">Choisir un utilisateur ...</option>
				<?php while($blip = mysql_fetch_object($resultatUser)){
					if($blip->id==$elementSelected){
					?><option selected="selected" value="<?php echo $blip->id;?>"><?php echo $blip->pseudo; ?></option><?php 
					}else{
					?><option value="<?php echo $blip->id;?>"><?php echo $blip->pseudo; ?></option><?php 
					}
				}?>
			</select>
			<?php 
		}
		function getListEmetteur($elementSelected){
			$qUtilisateur = new QueryUtilisateur();
			$resultatUser = $qUtilisateur->selectAll();
			?>
			<select name="emetteurId">
				<option value="-1">Choisir un emetteur ...</option>
				<?php while($blip = mysql_fetch_object($resultatUser)){
					if($blip->id==$elementSelected){
					?><option selected="selected" value="<?php echo $blip->id;?>"><?php echo $blip->pseudo; ?></option><?php 
					}else{
					?><option value="<?php echo $blip->id;?>"><?php echo $blip->pseudo; ?></option><?php 
					}
				}?>
			</select>
			<?php 
		}
		function getListRecepteur($elementSelected){
			$qUtilisateur = new QueryUtilisateur();
			$resultatUser = $qUtilisateur->selectAll();
			?>
			<select name="recepteurId">
				<option value="-1">Choisir un recepteur ...</option>
				<?php while($blip = mysql_fetch_object($resultatUser)){
					if($blip->id==$elementSelected){
					?><option selected="selected" value="<?php echo $blip->id;?>"><?php echo $blip->pseudo; ?></option><?php 
					}else{
					?><option value="<?php echo $blip->id;?>"><?php echo $blip->pseudo; ?></option><?php 
					}
				}?>
			</select>
			<?php 
		}

		function getListAnnonce($elementSelected){
			$qAnnonce = new QueryAnnonce();
			$resultatAnnonce = $qAnnonce->selectAll();
			?>
			<select name="annonceId">
				<option value="-1">Choisir une annonce ...</option>
				<?php while($blip = mysql_fetch_object($resultatAnnonce)){
					if($blip->id==$elementSelected){
					?><option selected="selected" value="<?php echo $blip->id;?>"><?php echo $blip->titre; ?></option><?php 
					}else{
					?><option value="<?php echo $blip->id;?>"><?php echo $blip->titre; ?></option><?php 
					}
				}?>
			</select>
			<?php 
		}
		
		function getListAnnonceParent($elementSelected){
			$qAnnonce = new QueryAnnonce();
			$resultatAnnonce = $qAnnonce->selectAll();
			?>
			<select name="idAnnonceParent">
				<option value="-1">Choisir une annonce ...</option>
				<?php while($blip = mysql_fetch_object($resultatAnnonce)){
					if($blip->id==$elementSelected){
					?><option selected="selected" value="<?php echo $blip->id;?>"><?php echo $blip->titre; ?></option><?php 
					}else{
					?><option value="<?php echo $blip->id;?>"><?php echo $blip->titre; ?></option><?php 
					}
				}?>
			</select>
			<?php 
		}
		
		function getListTransactionDirect($elementSelected){
			$qTransactionDirect = new QueryTransactionDirect();
			$resultatTransaction = $qTransactionDirect->selectAll();
			?>
			<select name="transactionDirectId">
				<option value="-1">Choisir une transaciton direct ...</option>
				<?php while($blip = mysql_fetch_object($resultatTransaction)){
					if($blip->id==$elementSelected){
					?><option selected="selected" value="<?php echo $blip->id;?>"><?php echo $blip->desc; ?></option><?php 
					}else{
					?><option value="<?php echo $blip->id;?>"><?php echo $blip->desc; ?></option><?php 
					}
				}?>
			</select>
			<?php 
		}
		
		function getListIdFContenu($elementSelected){
			?>
			<select name="idFonctionnel">
				<option value="UNKNOW">Choisir un id Fonctionnel ...</option>
				<!--TODO mettre le selected index-->
				<option value="<?php echo CONTENU_HOME?>">Page Home</option>
				<option value="<?php echo CONTENU_CONTACT?>">Contact</option>
				<option value="<?php echo CONTENU_AGENDA?>">Agenda</option>
				<option value="<?php echo NOS_PARTENAIRES?>">Nos Partenaires</option>
			</select>
			<?php 
		}
		
		function getListeVosAnnonces($idUser){
			?>
			<select name="annonceId">
				<option value="-1">Choisir une annonce ...</option>
				<?php 
					$qAnnonce = new QueryAnnonce();
					$listeAnnonce = $qAnnonce->getByUserId($idUser);
					while($blop=mysql_fetch_object($listeAnnonce)){
						?>
							<option value="<?php echo $blop->id;?>"><?php echo $blop->titre;?></option>
						<?php
					}
				?>
			</select>
			<?php 
		}
		
		function getNomPrenomById($id){
			$qUtilisateur = new QueryUtilisateur();
			$user= $qUtilisateur->getById($id);
			return $user->nom." ".$user->prenom;
		}
		
		function safeString($request=''){
			$replace=array('%C3%80'=>'A','%C3%81'=>'A','%C3%82'=>'A','%C3%83'=>'A','%C3%84'=>'A','%C3%85'=>'A','%C3%A0'=>'a','%C3%A1'=>'a','%C3%A2'=>'a','%C3%A3'=>'a','%C3%A4'=>'a','%C3%A5'=>'a','%C3%92'=>'O','%C3%93'=>'O','%C3%94'=>'O','%C3%95'=>'O','%C3%96'=>'O','%C3%98'=>'O','%C3%B2'=>'o','%C3%B3'=>'o','%C3%B4'=>'o','%C3%B5'=>'o','%C3%B6'=>'o','%C3%B8'=>'o','%C3%88'=>'E','%C3%89'=>'E','%C3%8A'=>'E','%C3%8B'=>'E','%C3%A8'=>'e','%C3%A9'=>'e','%C3%AA'=>'e','%C3%AB'=>'e','%C3%87'=>'C','%C3%A7'=>'c','%C3%8C'=>'I','%C3%8D'=>'I','%C3%8E'=>'I','%C3%8F'=>'I','%C3%AC'=>'i','%C3%AD'=>'i','%C3%AE'=>'i','%C3%AF'=>'i','%C3%99'=>'U','%C3%9A'=>'U','%C3%9B'=>'U','%C3%9C'=>'U','%C3%B9'=>'u','%C3%BA'=>'u','%C3%BB'=>'u','%C3%BC'=>'u','%C3%BF'=>'y','%C3%91'=>'N','%C3%B1'=>'n');
			$request=urlencode($request);
			foreach ($replace as $key => $value) {
			    $request=str_replace($key,$value,$request);
			}
			return urldecode($request);
		}
			
		function enleveaccents($chaine)
	    {
	     $string= strtr($chaine,
	 	  "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ",
	 	  "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn");
	
	     return $string;
	    } 
	    
	}
?>