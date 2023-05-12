<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="GET" action="get.php">

<input type="text" name="naam" placeholder="Naam" required> <br>

<input type="text" name="achternaam" placeholder="Achternaam" required> <br>

<input type="text" name="leeftijd" placeholder="Leeftijd" required> <br>

<input type="text" name="adres" placeholder="adres" required> <br>

<input type="text" name="Email" placeholder="Email" required> <br>


<input type="submit" value="Verstuur">

</form>

<?php 
$naam = $_GET["naam"];
$achternaam = $_GET["achternaam"];
$leeftijd = $_GET["leeftijd"];
$adres = $_GET["adres"];
$email = $_GET["Email"];


echo "Naam: ".$naam."<br>Achternaam: ".$achternaam."<br>Leeftijd:".$leeftijd."<br>Adres: ".$adres."<br>Email: ".$email;

?>
</body>
</html>
