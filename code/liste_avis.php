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
?>


<script language="javascript">
	dateetjour=new Date();
	document.write(" le ",dateetjour.getDate(),".",dateetjour.getMonth()+1,".",dateetjour.getYear());
	document.write(" � ",dateetjour.getHours(),"h",dateetjour.getMinutes(),"min",dateetjour.getSeconds(),"s<br />");
</script> 
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title> Bdd des avis </title>
	</head>
	<body>
		<h1>Base de donn�es des avis</h1></br></br>
		<table BORDER>
			<caption><h2>Liste des avis</h2></caption>
			<tr>
				<th>Num�ro du sond�</th><th>Visa</th><th>Nom du film</th><th>Avis</th>
			</tr>
<?php		
		$request="SELECT * FROM avis";
		if($result=mysql_query($request)){
		while($ligne=mysql_fetch_array($result)){
			$numero=$ligne[0];
			$visa=$ligne[1];
			$res=mysql_query("SELECT * FROM films WHERE visa='$visa'");
			while($lig=mysql_fetch_array($res)){
				$nom_film=$lig[1];
				}
			$avis=$ligne[2];
?>
			<tr>
				<td><?php echo $numero;?></td></td><td><?php echo $visa;?><td><?php echo $nom_film;?></td><td><?php echo $avis?></td>
			</tr>
<?php 		
		}
?>	       
		</table></br></br>
		<a href="liste_spectateurs.php">Liste des spectateurs</a></br>
		<a href="liste_films.php">Liste des films</a></br>
		<a href="liste_cinemas.php">Liste des cin�mas</a></br>
		<a href="sondage.php">Donner son avis sur un film</a></br>
		<a href="accueil_spectateur.php">Retour � la page d'accueil</a></br>
		<a href="main.php">Se d�connecter</a>
	</body>
</html>
<?php	}else{
			echo "Erreur de requ�te de base de donn�es";
		}
	mysql_close($id);
?>