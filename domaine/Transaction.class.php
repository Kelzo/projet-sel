<?php
	Class Transaction{
		public $id;
		public $emetteurId;
		public $recepteurId;
		public $prix;
		public $annonceId;
		public $annoncePropositionId;
		
		function __construct(){
			$this->id='';
			$this->emetteurId='';
			$this->recepteurId='';
			$this->prix='';
			$this->annonceId='';
			$this->annoncePropositionId='';
		}	
	}
?>