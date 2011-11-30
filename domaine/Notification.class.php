<?php
	Class Notification{
		public $id;
		public $type;
		public $emetteurId;
		public $recepteurId;
		public $date;
		public $desc;
		public $etat;
		
		function __construct(){
			$this->id='';
			$this->type='';
			$this->emetteurId='';
			$this->recepteurId='';
			$this->date='';
			$this->desc='';
			$this->etat='';
		}	
	}
?>