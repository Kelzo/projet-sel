<?php	class QueryCommentaire{		function __construct(){		}				function selectAll(){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM commentaire");			return $query;			$connection->close();		}				function update($commentaire){			$connection = new Connection();			$connection->open();			//, desc='".$annonce->desc."'			$query=mysql_query("UPDATE commentaire SET texte='".$commentaire->texte."',datePublication='".$commentaire->datePublication."', annonceId='".$commentaire->annonceId."', utilisateurId='".$commentaire->utilisateurId."' WHERE id='".$commentaire->id."'");			$connection->close();		}				function delete($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("DELETE FROM commentaire WHERE id='".$id."'");			$connection->close();		}				function insert($commentaire){			$connection = new Connection();			$connection->open();			$query=mysql_query("INSERT INTO commentaire VALUE('','".$commentaire->texte."','".$commentaire->datePublication."','".$commentaire->annonceId."','".$commentaire->utilisateurId."')");			$connection->close();		}				function getById($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM commentaire WHERE id='".$id."'");			return $query;			$connection->close();		}				function getByAnnonceId($annonceId){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM commentaire WHERE annonceId='".$annonceId."' ORDER BY datePublication");			return $query;			$connection->close();		}	}?>