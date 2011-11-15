<?php
	Class annonce{
		public $id;
		public $titre;
		public $desc;
		public $date;
		public $adresse;
		public $cp;
		public $ville;
		public $coutPoivre;
		public $idAnnonceParent;
		public $annonceValide;
		
		function __construct(){
			$this->id='';
			$this->titre='';
			$this->desc='';
			$this->date='';
			$this->adresse='';
			$this->cp='';
			$this->ville='';
			$this->coutPoivre='';
			$this->idAnnonceParent='';
			$this->annonceValide='';
		}	
	}
?>