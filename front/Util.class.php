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