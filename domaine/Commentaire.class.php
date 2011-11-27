<?php
	Class Commentaire{
		public $id;
		public $texte;
		public $datePublication;
		public $annonceId;
		public $utilisateurId;
		
		function __construct(){
			$this->id='';
			$this->texte='';
			$this->datePublication='';
			$this->annonceId='';
			$this->utilisateurId='';
		}	
	}
?>