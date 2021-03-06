<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Gar-search-klant2.php</title>
</head>
<body>
<h1> Garage zoek op klantid 2 </h1>
<p> Op klantid gegevens zoeken uit de tabel klanten van de database garage. </p>
<?php
// Klantid uit het formulier halen
$klantid = $_POST["klantidvak"];
//Klantgegevens uit de tabel halen

require_once "gar-connect.php";
$sql = $conn->prepare("select klantid, klantnaam, klantadres, klantpostcode, klantplaats from klant where klantid = :klantid");
$sql->execute(["klantid" => $klantid]);

// Klantgegevens laten zien

echo "<table>";
foreach($sql as $rij)
{
    echo "<tr>";
    echo "<td>" . $rij["klantid"] . "</td>";
    echo "<td>" . $rij["klantnaam"] . "</td>";
    echo "<td>" . $rij["klantadres"] . "</td>";
    echo "<td>" . $rij["klantpostcode"] . "</td>";
    echo "<td>" . $rij["klantplaats"] . "</td>";
    echo "<tr>";
}

echo "</table> <br />";
echo "<a href='gar-menu.php'> Terug naar het menu </a>";
?>
</body>
</html>


