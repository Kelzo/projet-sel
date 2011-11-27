<?php
	Class Notification{
		public $id;
		public $emetteurId;
		public $recepteurId;
		public $date;
		public $desc;
		public $etat;
		
		function __construct(){
			$this->id='';
			$this->$emetteurId='';
			$this->$recepteurId='';
			$this->date='';
			$this->desc='';
			$this->etat='';
		}	
	}
?>