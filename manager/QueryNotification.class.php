<?php	class QueryNotification{		function __construct(){		}				function selectAll(){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM notification");			return $query;			$connection->close();		}				function update($notification){			$connection = new Connection();			$connection->open();			$query=mysql_query("UPDATE notification SET emetteurId='".$notification->emetteurId."', recepteurId='".$notification->recepteurId."', date='".$notification->date."', etat='".$notification->etat."', type='".$notification->type."'");			$connection->close();		}				function delete($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("DELETE FROM notification WHERE id='".$id."'");			$connection->close();		}				function insert($notification){			$connection = new Connection();			$connection->open();			$query=mysql_query("INSERT INTO notification VALUE('','".$notification->type."','".$notification->etat."','".$notification->desc."','".$notification->date."','".$notification->emetteurId."','".$notification->recepteurId."')");			$connection->close();		}				function getById($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM notification WHERE id='".$id."'");			$notif;			while($blop=mysql_fetch_object($query)){				$notif=$blop;			}			return $notif;			$connection->close();		}				function getByEmetteurId($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM notification WHERE emetteurId='".$id."'");			return $query;			$connection->close();		}		function getByRecepteurId($id){			$connection = new Connection();			$connection->open();			$query=mysql_query("SELECT * FROM notification WHERE recepteurId='".$id."'");			return $query;			$connection->close();		}	}?>