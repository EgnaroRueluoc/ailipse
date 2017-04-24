<?php
if(!class_exists("user"))
{
	class user extends visiteur
	{
		//tous les attributs d'un utilisateur, operateur ou administrateur
		private $nom;			//varchar 50
		private $prenom;		//varchar 50
		private $telephone;			//varchar 10
		private $email;			//varchar 255
		private $villeFacturation;		//varchar 80
		private $adresseFacturation;		//varchar 80
		private $codePostalFacturation;		//varchar 5
		private $villeExpedition;		//varchar 80
		private $adresseExpedition;		//varchar 80
		private $codePostalExpedition;		//varchar 5
		private $permissions;	// int 1
		
		public function __construct()
		{
		}
		public function SetMail($maile)	// recupere le mail de l'utilisateur utilisé apres l'initialisation 
		{
			$this->email=$maile;
		}
		public function recuData()
		{
			$conec=$this->OpenBDD();	//	ouverture de la base de données
			$sql="select * from clients where email='$this->email'";
			$result = $conec->query($sql);	// execution de la requete 

			if ($result->num_rows > 0) {		// verification que le compte existe 
			// output data of each row
			while($row = $result->fetch_assoc()) {			// recuperation de tous les parametres
			$this->email = $row["email"];				
			$this->prenom = $row["prenom"];
			$this->nom = $row["nom"];
			$this->password = $row["password"];
			$this->adresseExpedition = $row["rue_expedition"];
			$this->villeExpedition = $row["ville_expedition"];
			$this->codePostalExpedition = $row["code_postal_expedition"];
			$this->adresseFacturation = $row["rue_facturation"];
			$this->villeFacturation = $row["ville_facturation"];
			$this->codePostalFacturation = $row["code_postal_facturation"];
			$this->telephone=$row["telephone"];
			$this->permissions = $row["permissions"];
    }
} 
			$this->CloseBDD($conec);		//fermeture de la base de données 
		}
		public function ModifierProfil()		// essenciellement de l'affichage avec les valeurs du compte 
		{
			return ('<div class="demo-card-wide mdl-card mdl-shadow--2dp">
			// utilisation de modele/Forme/update.php en POST pour valider les changements 
		}
		public function ValiderProfil($new_password,$verification,$rue_expedition,$code_postal_expedition,$ville_expedition,$rue_facturation,$code_postal_facturation,$ville_facturation)
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
		public function VisualiserControle() // COMING SOON
		{
			
			
			
			
		}
		public function SoumettreAnnonce() // COMING SOON
		{
			
		}
		public function Deconnexion() // COMING SOON
		{
			
			
			
		}
	}
}

?>