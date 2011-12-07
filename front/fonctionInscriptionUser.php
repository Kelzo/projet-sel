<?php

	//Fonction qui stocke dans une variable SESSION  un message utile pour la page inscriptionUtilisateur.php
	function transmetMessage($P_Message)
	{
		session_start();
		$_SESSION['message']=$P_Message;
	}
		
	//Fonction qui v�rifie qu'il n'y a pas de doublon sur le login
	// function verifLogin
	// (
		// $qUtilisateur = new QueryUtilisateur();
		// $user =$qUtilisateur->getByPseudo($_POST['pseudoUtilisateur']);

		// $cpt=0;
		// $user;
		// while($blop=mysql_fetch_object($user))
		// {
			// $cpt++;
			// $user=$blop;	
		// }
		
		// if($cpt==0)
			// {return 1;}
		// else
			// {return 0;}
	// )
	
	//Fonction : V�rifie s'il n'y aucun champ vide
	function ChampVide()
	{
		$Condition=EMPTY($_POST['nomUtilisateur']) || EMPTY($_POST['prenomUtilisateur']) || EMPTY($_POST['passwordUtilisateur']) || EMPTY($_POST['adresseUtilisateur']) || EMPTY($_POST['villeUtilisateur']) || EMPTY($_POST['cpUtilisateur']) || EMPTY($_POST['emailUtilisateur']) || EMPTY($_POST['telFixeUtilisateur']) || EMPTY($_POST['telPortableUtilisateur']);
		
		if ($Condition)
			{return 1;}
		else
			{return 0;}
	}
	
	//Fonction qui permet de v�rifier que l'email est au bon format
	function verifEmail()
	{
		$atom   = '[-a-z0-9!#$%&\'*+\\/=?^_`{|}~]';   // caract�res autoris�s avant l'arobase
		$domain = '([a-z0-9]([-a-z0-9]*[a-z0-9]+)?)'; // caract�res autoris�s apr�s l'arobase (nom de domaine)
		
		$regex = '/^' . $atom . '+' .   // Une ou plusieurs fois les caract�res autoris�s avant l'arobase
		'(\.' . $atom . '+)*' .         // Suivis par z�ro point ou plus s�par�s par des caract�res autoris�s avant l'arobase
		'@' .                           // Suivis d'un arobase
		'(' . $domain . '{1,63}\.)+' .  // Suivis par 1 � 63 caract�res autoris�s pour le nom de domaine s�par�s par des points
		$domain . '{2,63}$/i';          // Suivi de 2 � 63 caract�res autoris�s pour le nom de domaine

		// test de l'adresse e-mail
		if (preg_match($regex,$_POST['emailUtilisateur'])) 
			{return 1;}
		else 
			{return 0;}
	}
	
	//Fonction qui v�rifie que les num�ros de t�l�phone sont bien au format num�rique, contiennent 10 chiffres et commencent par un 0
	function verifTel($P_NumTel)
	{
		if (!preg_match("#0\d{8,9}#", $P_NumTel))
			{return 0;} 
		else 
			{return 1;}
	}
	
	//Fonction qui permet de v�rifier que le code postal est au bon format
	function verifCP()
	{
		$Condition=strlen($_POST['cpUtilisateur'])==5 && is_numeric($_POST['cpUtilisateur']);
		
		if ($Condition)
			{return 1;}
		else
			{return 0;}
	}
	
	//Fonction qui  va  v�rifier toutes les contraintes pour l'insription
	function verifInscription()
	{
		$messageErreur="";
		
		// if (verifLogin()==1)
			// {$messageErreur="Un utilisateur utilise d�j� ce pseudo.<br />";}
		
		if (ChampVide()==1)
			{$messageErreur=$messageErreur."<br />Tous les champs sont obligatoires!";}
	
		if (verifCP()==0)
			{$messageErreur=$messageErreur."<br /> Erreur de format sur le code postal!";}
		
		if(verifEmail()==0)
			{$messageErreur=$messageErreur."<br /> Erreur de format sur l'adresse Email!";}
		
		if(verifTel($_POST['telFixeUtilisateur'])==0)
			{$messageErreur=$messageErreur."<br /> Erreur de format sur le  t�l�phone Fixe!";}
		
		if(verifTel($_POST['telPortableUtilisateur'])==0)
			{$messageErreur=$messageErreur."<br /> Erreur de format sur le  t�l�phone portable!";}
			
		return $messageErreur;
	}
?>
	