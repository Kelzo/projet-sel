<?php
	Class TransactionDirect{
		public $id;
		public $emetteurId;
		public $recepteurId;
		public $prix;
		public $desc;
		
		function __construct(){
			$this->id='';
			$this->$emetteurId='';
			$this->$recepteurId='';
			$this->prix='';
			$this->desc='';
		}	
	}
?>