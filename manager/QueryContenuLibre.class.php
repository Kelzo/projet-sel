<?php	class QueryContenuLibre{		function __construct(){		}				function selectAll(){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM contenulibre");			return $query;			$connection->close();		}				function update($contenu){			$connection = new Connection();			$connection->open();			//, desc='".$annonce->desc."'			$query=mysql_query("UPDATE contenulibre SET idFonctionnel='".$niveau->idFonctinnel."', texte='".$niveau->texte."' WHERE id='".$contenu->id."'");			$connection->close();		}				function delete($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("DELETE FROM contenulibre WHERE id='".$id."'");			$connection->close();		}				function insert($contenu){			$connection = new Connection();			$connection->open();			$query=mysql_query("INSERT INTO contenulibre VALUE('','".$contenu->idFonctionnel."', '".$contenu->texte."')");			$connection->close();		}				function getById($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM contenulibre WHERE id='".$id."'");			return $query;			$connection->close();		}				function getByIdFonctionnel($idFonctionnel){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM contenulibre WHERE idFonctionnel='".$idFonctionnel."'");			return $query;			$connection->close();		}	}?>