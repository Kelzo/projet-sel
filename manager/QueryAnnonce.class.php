<?php	class QueryAnnonce{		function __construct(){		}				function selectAll(){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM annonce");			return $query;			$connection->close();		}				function update($annonce){			$connection = new Connection();			$connection->open();			//, desc='".$annonce->desc."'			$query=mysql_query("UPDATE annonce SET utilisateurId='".$annonce->utilisateurId."', typeAnnonceId='".$annonce->typeAnnonceId."',titre='".$annonce->titre."', date='".$annonce->date."', adresse='".$annonce->adresse."', cp='".$annonce->cp."', ville='".$annonce->ville."', coutPoivre='".$annonce->coutPoivre."', idAnnonceParent='".$annonce->idAnnonceParent."', annonceValide='".$annonce->annonceValide."', datePublication='".$annonce->datePublication."' WHERE id='".$annonce->id."'");			$connection->close();		}				function delete($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("DELETE FROM annonce WHERE id='".$id."'");			$connection->close();		}				function insert($annonce){			$connection = new Connection();			$connection->open();			$query=mysql_query("INSERT INTO annonce VALUE('','".$annonce->utilisateurId."','".$annonce->typeAnnonceId."','".$annonce->titre."','".$annonce->desc."','".$annonce->date."','".$annonce->adresse."','".$annonce->cp."','".$annonce->ville."','".$annonce->coutPoivre."','".$annonce->idAnnonceParent."','".$annonce->annonceValide."','".$annonce->datePublication."')");			$connection->close();		}				function getById($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM annonce WHERE id='".$id."'");			$annonce;			while($blop=mysql_fetch_object($query)){				$annonce=$blop;			}			return $annonce;			$connection->close();		}				function getByUserId($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM annonce WHERE utilisateurId='".$id."'");			return $query;			$connection->close();		}	}?>