<?php
	class Agenda{
		function __construct($etat){
			$qAgenda=new QueryAgenda();
			$agenda = $qAgenda->selectAll();
			while ($blop=mysql_fetch_object($agenda)){
					echo "<div>".$blop->description."</div>";
				} 
		}
		
	}
?>