<?php
if(!class_exists("Utilisateur"))
{
	class Utilisateur extends Visiteur
	{
		//tous les attributs d'un utilisateur, operateur ou administrateur
		private $_nom;						//varchar 50		private $_prenom;					//varchar 50		private $_telephone;				//varchar 10		private $_email;					//varchar 255		private $_villeFacturation;			//varchar 80		private $_adresseFacturation;		//varchar 80		private $_codePostalFacturation;	//varchar 5		private $_villeExpedition;			//varchar 80		private $_adresseExpedition;		//varchar 80		private $_codePostalExpedition;		//varchar 5		private $_permissions;				// int 1		
		public function __construct()
		{
		}
		public function setMail($email)	// recupere le mail de l'utilisateur utilisé apres l'initialisation 
		{
			$this->_email=$email;
		}
		public function recuData()
		{
			$connexionBdd=$this->OpenBDD();	//	ouverture de la base de données
			$sql="select * from clients where email='$this->_email'";
			$result = $connexionBdd->query($sql);	// execution de la requete 

			if ($result->num_rows > 0) 			{		// verification que le compte existe 
			// output data of each row
				while($row = $result->fetch_assoc()) 				{			// recuperation de tous les parametres
					$this->_email = $row["email"];				
					$this->_prenom = $row["prenom"];
					$this->_nom = $row["nom"];
					$this->_password = $row["password"];
					$this->_adresseExpedition = $row["rue_expedition"];
					$this->_villeExpedition = $row["ville_expedition"];
					$this->_codePostalExpedition = $row["code_postal_expedition"];
					$this->_adresseFacturation = $row["rue_facturation"];
					$this->_villeFacturation = $row["ville_facturation"];
					$this->_codePostalFacturation = $row["code_postal_facturation"];
					$this->_telephone=$row["telephone"];
					$this->_permissions = $row["permissions"];
				}
			} 
			$this->CloseBDD();		//fermeture de la base de données 
		}
		public function modifierProfil()		// essenciellement de l'affichage avec les valeurs du compte 
		{
			return ('<div class="demo-card-wide mdl-card mdl-shadow--2dp">	<div class="mdl-card__title mdl-card-annonces__background animated slideInDown">	<h2 class="mdl-card__title-text">'.$this->_prenom.' '.$this->_nom.'</h2>	</div>			<div class="mdl-card__supporting-text card-background">				<form action="modele/formulaires/update.php" method="post">				<div id="alert" >		</div>				<h5>Modifiez vos informations personnelles</h5>		<div class="content-grid mdl-grid">			<div class="mdl-cell">				<h6>Identifiants de connexion</h6>										  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="email" class="mdl-textfield__input" id="email" type="text" value="'.$this->_email.'" readonly>					<label class="mdl-textfield__label" for="sample3">Adresse E-mail</label>					<div class="mdl-tooltip" data-mdl-for="email">					Pour changer votre email, veuillez contacter un administrateur.					</div>				  </div>				  				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="password" id="password" class="mdl-textfield__input" type="password">					<label class="mdl-textfield__label" for="sample3">Mot de passe</label>				  </div>				  				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="verification" id="password_check" class="mdl-textfield__input" type="password">					<label class="mdl-textfield__label" for="sample3">Confirmation du mot de passe</label>				  </div>				  						</div>						<div class="mdl-cell">				<h6>Données personnelles</h6>								  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="nom" class="mdl-textfield__input" id="nom" type="text" value="'.$this->_nom.'" required="required">					<label class="mdl-textfield__label" for="sample3">Nom</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="prenom" class="mdl-textfield__input" id="prenom" type="text" value="'.$this->_prenom.'" required="required">					<label class="mdl-textfield__label" for="sample3">Prénom</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="telephone" class="mdl-textfield__input" id="telephone" type="text" value="'.$this->_telephone.'" required="required">					<label class="mdl-textfield__label" for="sample3">Téléphone</label>				  </div>				  			</div>						<div class="mdl-cell animated slideInRight">				<br/><br/><br/>				<img src="vue/images/profil_account.png" height="200px" width="200px">			</div>						<div class="mdl-cell">				<h6>Adresse de facturation</h6>								  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="adresseFacturation" class="mdl-textfield__input" id="adresseFacturation" type="text" value="'.$this->_adresseFacturation.'" required="required">					<label class="mdl-textfield__label" for="sample3">Adresse</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="villeFacturation" class="mdl-textfield__input" id="villeFacturation" type="text" value="'.$this->_villeFacturation.'" required="required">					<label class="mdl-textfield__label" for="sample3">Ville</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="codePostalFacturation" class="mdl-textfield__input" id="codePostalFacturation" type="text" value="'.$this->_codePostalFacturation.'" required="required">					<label class="mdl-textfield__label" for="sample3">Code postal</label>				  </div>			</div>						<div class="mdl-cell">				<h6>Adresse d\'expédition</h6>								  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="adresseExpedition" class="mdl-textfield__input" id="adresseExpedition" type="text" value="'.$this->_adresseExpedition.'" required="required">					<label class="mdl-textfield__label" for="sample3">Adresse</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="villeExpedition" class="mdl-textfield__input" id="villeExpedition" type="text" value="'.$this->_villeExpedition.'" required="required">					<label class="mdl-textfield__label" for="sample3">Ville</label>				  </div>				  				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">					<input name="codePostalExpedition" class="mdl-textfield__input" id="codePostalExpedition" type="text" value="'.$this->_codePostalExpedition.'" required="required">					<label class="mdl-textfield__label" for="sample3">Code postal</label>				  </div>			</div>						<div class="mdl-cell animated slideInRight">				<br/><br/><br/>				<img src="vue/images/profil_shipping.png" height="200px" width="200px">			</div>									<div class="mdl-card__actions mdl-card--border card-background2 animated slideInUp">			<center>				<button  type="submit" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">					Valider les modifications apportées				</button>			</center>			</form>			<div/>	</div></div>');
			// utilisation de modele/formulaires/update.php en POST pour valider les changements 
		}
		public function validerProfil($new_password,$verification,$rue_expedition,$code_postal_expedition,$ville_expedition,$rue_facturation,$code_postal_facturation,$ville_facturation)
		{
				// gestion du cryptage et des valeurs de la requete pour valider son profil 
				if(($new_password==$verification)&&($new_password!=""))
				{
					$new_password=sha1($verification);
					return "UPDATE clients SET password='$new_password', ville_expedition='$ville_expedition', rue_expedition='$rue_expedition',code_postal_expedition='$code_postal_expedition', ville_facturation='$ville_facturation', rue_facturation='$rue_facturation', code_postal_facturation='$code_postal_facturation' WHERE  email='$email'";
				}
				else
				{
					return "UPDATE clients SET ville_expedition='$ville_expedition', rue_expedition='$rue_expedition', code_postal_expedition='$code_postal_expedition', ville_facturation='$ville_facturation', rue_facturation='$rue_facturation', code_postal_facturation='$code_postal_facturation'  WHERE  email='$email'";
	
				}
		}
		public function visualiserControle() // COMING SOON
		{
			
			
			
			
		}
		public function deconnexion() // COMING SOON
		{
			
			
			
		}
	}
}

?>