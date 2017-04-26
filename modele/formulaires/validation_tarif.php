<?php
	include 'connect.php';
	$connect = mysqli_connect($hostname, $username, $password, $databaseName);
	$result = $connect->query('SELECT * FROM tarifs_revision UNION SELECT * FROM tarifs_reparation UNION SELECT * FROM tarifs_articles');
	$i = 0;
	while($donnees = $result->fetch_array())
	{
		$nom[$i]=$donnees['nom'];
		$i++;
	}
	for($j = 0; $j < $i; $j++)
	{
		$valeurHT[$j] = $_POST['tarifHT'.$j];		
		$valeurHT[$j] = str_replace("€","",$valeurHT[$j]);
		$valeurTTC[$j] = $_POST['tarifTTC'.$j];
		$valeurTTC[$j] = str_replace("€","",$valeurTTC[$j]);
		$valeurPCT[$j] = $_POST['tarifPCT'.$j];
		$valeurPCT[$j] = str_replace("%","",$valeurPCT[$j]);				$TVA = $valeurHT[$j]+20*$valeurHT[$j]/100;		$valeurTTC[$j] = number_format($TVA, 2, '.', '');
	}
	
	$nbTarifRevision=0;
	$nbTarifReparation=0;
	$nbTarifArticle=0;
	
	$result = $connect->query('SELECT * FROM tarifs_revision');
	while($donnees = $result->fetch_array())
	{
		$nbTarifRevision++;
	}
	
	$result = $connect->query('SELECT * FROM tarifs_reparation');
	while($donnees = $result->fetch_array())
	{
		$nbTarifReparation++;
	}
	
	$result = $connect->query('SELECT * FROM tarifs_articles');
	while($donnees = $result->fetch_array())
	{
		$nbTarifArticle++;
	}
	for($j = 0; $j < $i; $j++)
	{		
		if($j<$nbTarifRevision)
		{
			$sql = "UPDATE tarifs_revision SET tarifht = '$valeurHT[$j]', tarifttc = '$valeurTTC[$j]', pourcent = '$valeurPCT[$j]' WHERE nom = '$nom[$j]'";
		}
		elseif($j<$nbTarifReparation+$nbTarifRevision)
		{
			$sql = "UPDATE tarifs_reparation SET tarifht = '$valeurHT[$j]', tarifttc = '$valeurTTC[$j]', pourcent = '$valeurPCT[$j]' WHERE nom = '$nom[$j]'";
		}
		elseif($j<$nbTarifArticle+$nbTarifReparation+$nbTarifRevision)
		{
			$sql = "UPDATE tarifs_articles SET tarifht = '$valeurHT[$j]', tarifttc = '$valeurTTC[$j]', pourcent = '$valeurPCT[$j]' WHERE nom = '$nom[$j]'";
		}
		$connect->query($sql);
	}
	$connect->close();
	header("location: ../../index.php?a=tarifs");
?>