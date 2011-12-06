<?php
	include '../../domaine/Utilisateur.class.php';
	include '../../manager/QueryUtilisateur.class.php';
	include '../../Connection.class.php';
	include '../fonctionInscriptionUser.php';
	
	$messageErreur=verifInscription();
			
	if ($messageErreur=="")
	{
		//Nouvel utilisateur
		$utilisateur = new Utilisateur();
		$utilisateur->nom = $_POST['nomUtilisateur'];
		$utilisateur->prenom = $_POST['prenomUtilisateur'];
		$utilisateur->pseudo = $_POST['pseudoUtilisateur'];
		$utilisateur->password = $_POST['passwordUtilisateur'];
		$utilisateur->adresse = $_POST['adresseUtilisateur'];
		$utilisateur->ville = $_POST['villeUtilisateur'];
		$utilisateur->cp = $_POST['cpUtilisateur'];
		$utilisateur->email = $_POST['emailUtilisateur'];
		$utilisateur->telephoneFixe = $_POST['telFixeUtilisateur'];
		$utilisateur->telephonePortable = $_POST['telPortableUtilisateur'];
		$utilisateur->niveauId = 0;
		$utilisateur->dateDerniereConnection = date("y/m/d");
		$utilisateur->poivre = 500;
					
		$qUtilisateur = new QueryUtilisateur();
		$qUtilisateur->insert($utilisateur);
							
		transmetMessage("Votre inscription a été enregistrée. Elle sera validée par l'administrateur. <br />En attendant la validation, vous bénéficiez d'un compte Invité.<br />Pour votre fidélité, vous gagnez 500 points de poivres.<br /> Cliquez ici pour vous <a href='index.php'>connecter!</a>");
		header("location:../../inscriptionUser.php");
	}
	else
	{
		transmetMessage($messageErreur);
		header("location:../../inscriptionUser.php");
	}
?>