﻿<?php
function menuProfil() {
	
	global $login_session;
	global $prenom;
	
	if(!isset($login_session)) {
		$menu = '<span>Visiteur</span>';
	} else {
		$menu = '<span>Bonjour, '.$prenom.'.</span>';
	}
	return ($menu);	
}

function menuNavigation() {		
	
	
	//Déclaration des variables qui recevront l'ID
	$index="";
	$operateur="";
	$profil="";
	$administration="";
	$annonces="";
	$creer_annonce="";
	$modelisation="";
	$tarifs="";
	$voile="";
	global $login_session;
	global $permissions;
	
	//Toutes ces boucles servent à assigner l'ID "en-cours" au menu en question et ceci pour changer la couleur de l'onglet de menu où l'on se trouve
	global $nav_en_cours;
	if($nav_en_cours == "index")
	{
		$index="en-cours";
	}
	else if($nav_en_cours == "administration")
	{
		$administration="en-cours";
	}
	else if($nav_en_cours == "annonces")
	{
		$annonces="en-cours";
	}
	else if($nav_en_cours == "creer_annonce")
	{
		$creer_annonce="en-cours";
	}
	else if($nav_en_cours == "operateur")
	{
		$operateur="en-cours";
	}
	else if($nav_en_cours == "voile")
	{
		$voile="en-cours";
	}
	else if($nav_en_cours == "tarifs")
	{
		$tarifs="en-cours";
	}
	
	
								//Si il n'y a pas de connexion on affiche seulement les menus Accueil et Inscription
	if(!isset($login_session)) {
		$menu = '<a class="mdl-navigation__link animated fadeInLeft" id="'.$index.'" href="index.php"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">home</i>Accueil</a>
				<a class="mdl-navigation__link animated fadeInLeft" href="index.php?a=inscription"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">assignment</i>Inscription</a>';
	} else {					//Condition de connexion : Permission = Utilisateur Opérateur ou Admin et on rajoute des menus si besoin
		if($permissions == 1) {
			$menu = '<a class="mdl-navigation__link animated fadeInLeft" id="'.$index.'" href="index.php"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">home</i>Accueil</a>
					 <a class="mdl-navigation__link animated fadeInLeft" id="'.$annonces.'" href="index.php?a=annonces"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">announcement</i>Annonces</a>
					<a class="mdl-navigation__link animated fadeInLeft" id="'.$voile.'" href="index.php?a=voile"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">visibility</i>Modélisation 3D</a>';
		}
		else if($permissions == 2) {
			$menu ='<a class="mdl-navigation__link animated fadeInLeft" id="'.$index.'" href="index.php"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">home</i>Accueil</a>
					<a class="mdl-navigation__link animated fadeInLeft" id="'.$annonces.'" href="index.php?a=annonces"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">announcement</i>Annonces</a>
					<a class="mdl-navigation__link animated fadeInLeft" id="'.$voile.'" href="index.php?a=voile"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">visibility</i>Modélisation 3D</a>
					<a class="mdl-navigation__link animated fadeInLeft" id="'.$operateur.'" href="index.php?a=operateur"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">build</i>Opérateur</a>';
		}
		else if($permissions == 3) {
			$menu ='<a class="mdl-navigation__link animated fadeInLeft" id="'.$index.'" href="index.php"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">home</i>Accueil</a>
					<a class="mdl-navigation__link animated fadeInLeft"  id="'.$annonces.'" href="index.php?a=annonces"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">create</i>Annonces</a>
					<a class="mdl-navigation__link animated fadeInLeft" id="'.$voile.'" href="index.php?a=voile"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">visibility</i>Modélisation 3D</a>
					<a class="mdl-navigation__link animated fadeInLeft" id="'.$operateur.'" href="index.php?a=operateur"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">build</i>Opérateur</a>
					<a class="mdl-navigation__link animated fadeInLeft" id="'.$administration.'" href="index.php?a=administration"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">settings</i>Administration</a>';
		}
	}
	return ($menu);	
	
	
}

function menuConnexion() { 			//Si déconnecté : Rien n'est affiché
	global $login_session;	$profil='';	global $nav_en_cours;		if($nav_en_cours == "profil")	{		$profil="en-cours";	}
	if(!isset($login_session)) {
		$menu = '';
	} else {						//Si connecté : Affiche le bouton qui renvoie sur le profil du client
		$menu = '<a class="mdl-navigation__link animated fadeInLeft" id="'.$profil.'" href="index.php?a=profil"><i class="mdl-color-text--blue-grey-200 material-icons" role="presentation">face</i>Mon compte</a>';
	}
	return ($menu);	


}