<?php
	Class Annonce{
		public $id;
		public $utilisateurId;
		public $typeAnnonceId;
		public $titre;
		public $desc;
		public $date;
		public $adresse;
		public $cp;
		public $ville;
		public $coutPoivre;
		public $idAnnonceParent;
		public $annonceValide;
		public $datePublication;
		public $permanente;
		
		function __construct(){
			$this->id='';
			$this->utilisateurId='';
			$this->type_annonce_id='';
			$this->titre='';
			$this->desc='';
			$this->date='';
			$this->adresse='';
			$this->cp='';
			$this->ville='';
			$this->coutPoivre='';
			$this->idAnnonceParent='';
			$this->annonceValide='';
			$this->datePublication='';
			$this->permanente='';
		}	
	}
?>