<?php
	Class Utilisateur{
		public $id;
		public $nom;
		public $prenom;
		public $pseudo;
		public $password;
		public $adresse;
		public $ville;
		public $cp;
		public $email;
		public $telephoneFixe;
		public $telephonePortable;
		public $poivre;
		public $photo;
		public $dateDerniereConnection;
		public $niveauId;
		
		function __construct(){
			$this->id='';
			$this->nom='';
			$this->prenom='';
			$this->password='';
			$this->pseudo='';
			$this->email='';
			$this->telephoneFixe='';
			$this->telephonePortable='';
			$this->cp='';
			$this->ville='';
			$this->poivre='';
			$this->adresse='';
			$this->photo='';
			$this->dateDerniereConnection='';
			$this->niveauId='';
		}	
	}
?>