<?php
	session_start();
	if($id=mysql_connect("localhost","root","root")){
		if($id_db=mysql_select_db("sondage")){
			echo "Connexion �tablie";
		}else{
			die("Echec de connexion � la base");
		}	
	}else{
		die("Echec de connexion au serveur de base de donn�es");
	}
	if (isset($_SESSION['login']))
	{
	$login=$_SESSION['login'];
	$request="SELECT * FROM spectateurs WHERE login='$login'";
	if($result=mysql_query($request)){
		while($ligne=mysql_fetch_array($result)){
			$_SESSION['numero']=$ligne[0];
			$_SESSION['nom']=$ligne[1];
			$_SESSION['prenom']=$ligne[2];
			$_SESSION['adresse']=$ligne[5];
			$_SESSION['datedenaissance']=$ligne[6];
			$_SESSION['CSP']=$ligne[7];
		}
	}else{
			echo "Erreur de requ�te de base de donn�es";
		}
	}
	mysql_close($id);
?>
<script language="javascript">
	dateetjour=new Date();
	document.write(" le ",dateetjour.getDate(),".",dateetjour.getMonth()+1,".",dateetjour.getYear());
	document.write(" � ",dateetjour.getHours(),"h",dateetjour.getMinutes(),"min",dateetjour.getSeconds(),"s<br />");
</script> 
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title> Mon compte </title>
	</head>
	<body>
		<h1>Bienvenue sur votre session</h1></br></br>
		<table BORDER>
			<caption><h2>Vos informations personnelles</h2></caption>
			<tr>
				<th>Num�ro</th><td><?php if (isset($_SESSION['numero'])) {echo $_SESSION['numero'];}?></td>
			</tr>
			<tr>
				<th>Nom</th><td><?php if (isset($_SESSION['nom'])) echo $_SESSION['nom'];?></td>
			</tr>
			<tr>
				<th>Pr�nom</th><td><?php if (isset($_SESSION['prenom'])) echo $_SESSION['prenom'];?></td>
			</tr>
			<tr>
				<th>Adresse</th><td><?php if (isset($_SESSION['adresse'])) echo $_SESSION['adresse'];?></td>
			</tr>
			<tr>
				<th>Date de naissance</th><td><?php if (isset($_SESSION['datedenaissance'])) echo $_SESSION['datedenaissance'];?></td>
			</tr>
			<tr>
				<th>CSP</th><td><?php if (isset($_SESSION['CSP'])) echo $_SESSION['CSP'];?></td>
			</tr>
        </table></br></br>
		<a href="liste_spectateurs.php">Liste des spectateurs</a></br>
		<a href="liste_films.php">Liste des films</a></br>
		<a href="liste_cinemas.php">Liste des cin�mas</a></br>
		<a href="liste_avis.php">Liste des avis</a></br>
		<a href="sondage.php">Donner son avis sur un film</a></br>
		<a href="logout.php">Se d�connecter</a>
	</body>
</html>