<?php
// Connexion à la base de données
include'connect.php';
$connect = new mysqli($hostname, $username, $password, $databaseName);

$email=$_POST["email"];
$new_password=$_POST["password"];
$verification=$_POST["verification"];
$rue_expedition=$_POST["adresseExpedition"];
$code_postal_expedition=$_POST["codePostalExpedition"];
$ville_expedition=$_POST["villeExpedition"];
$rue_facturation=$_POST["adresseFacturation"];
$code_postal_facturation=$_POST["codePostalFacturation"];
$ville_facturation=$_POST["villeFacturation"];$nom=$_POST["nom"];$prenom=$_POST["prenom"];$telephone=$_POST["telephone"];
if(($new_password==$verification)&&($new_password!=""))
{
	$new_password=sha1($verification);
	$sql="UPDATE clients SET password='$new_password', nom='$nom',prenom='$prenom',telephone='$telephone', ville_expedition='$ville_expedition', rue_expedition='$rue_expedition',code_postal_expedition='$code_postal_expedition', ville_facturation='$ville_facturation', rue_facturation='$rue_facturation', code_postal_facturation='$code_postal_facturation' WHERE  email='$email'";
}
else
{
	$sql="UPDATE clients SET  nom='$nom',prenom='$prenom',telephone='$telephone',ville_expedition='$ville_expedition', rue_expedition='$rue_expedition', code_postal_expedition='$code_postal_expedition', ville_facturation='$ville_facturation', rue_facturation='$rue_facturation', code_postal_facturation='$code_postal_facturation'  WHERE  email='$email'";
}
$connect->query($sql);
$connect->close();
header("location: ../../index.php?a=profil");
?>