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
		<title> Sondage </title>
	</head>
	<body>
		<h1>Votre avis nous int�resse...</h1></br></br>
		<form name="sondage" action="verif_sondage.php" method="post" action="sondage.php" onSubmit="return verif_avis();"><TABLE>
			<tr>
				<th>Votre num�ro</th><td><?php echo $_SESSION['numero'];?></td>
			</tr>
			<tr>
				<th>Nom du film vu</th><td><select name="nomfilm">
											<option value="default"><i>Choisissez un film</i>
											<option value="La Cite de la Peur">La Cit� de la Peur
											<option value="Kill Bill : Volume 1">Kill Bill : Volume 1
											<option value="Kill Bill : Volume 2">Kill Bill : Volume 2
											</select>
										</td>
			</tr>
			<tr>
				<th>Avis</th><td><select name="avis">
								<option value="default"><i>Choisissez un avis</i>
								<option value="Bien">Bien
								<option value="Moyen">Moyen
								<option value="Decevant">D�cevant
								</select>
							</td>
			</tr>
			<tr>
				<th></th><td><input type="submit" value="Valider"><input type="reset" name="effacer" value="R�tablir"></td>
			</tr>
		</table></form></br></br>
		<a href="liste_spectateurs.php">Liste des spectateurs</a></br>
		<a href="liste_films.php">Liste des films</a></br>
		<a href="liste_cinemas.php">Liste des cin�mas</a></br>
		<a href="liste_avis.php">Liste des avis</a></br>
		<a href="accueil_spectateur.php">Retour � la page d'accueil</a></br>
		<a href="logout.php">Se d�connecter</a>
	</body>
</html>
<script language="javascript">
	function verif_avis(){
		if (document.sondage.nomfilm.value=="default"){
			alert("Vous devez obligatoirement choisir un film.");
			return false;
		}
		if(document.sondage.avis.value=="default"){
			alert("Vous devez obligatoirement choisir un avis.");
			return false;
		}
		else{
			return true;
		}
	}
</script>