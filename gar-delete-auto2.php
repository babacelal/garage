<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>gar-delete-auto2.php</title>
</head>
<body>
<h1> Op kenteken gegevens zoeken uit de tabel klanten van de database garage zodat ze verwijderen kunnen worden. </h1>
<?php
//klantid uit het formulier halen
$autokenteken = $_POST["autokentekenvak"];
//klantgegevens uit de tabel halen
require_once "gar-connect.php";
$klanten = $conn->prepare("
select klantid, automerk, autotype, autokmstand, autokenteken from auto WHERE autokenteken = :autokenteken
");
$klanten->execute(["autokenteken" => $autokenteken]);
//klantgegevens laten zien
echo "<table>";
foreach($klanten as $klant){
    echo "<tr>";
    echo "<td>" . $klant["klantid"] . "</td>";
    echo "<td>" . $klant["automerk"] . "</td>";
    echo "<td>" . $klant["autotype"] . "</td>";
    echo "<td>" . $klant["autokenteken"] . "</td>";
    echo "<td>" . $klant["autokmstand"] . "</td>";
    echo "</tr>";
}
echo "</table><br />";
echo "<form action='gar-delete-auto3.php' method='post'>";
//klantid mag niet meer gewijzigd worden
echo "<input type='text' name='autokentekenvak' value=$autokenteken>";
//Waarde 0 doorgegeven als er niet gecheckt wordt
echo "<input type='hidden' name='verwijdervak' value='0'>";
echo "<input type='checkbox' name='verwijdervak' value='1'>";
echo "Verwijder deze klant. <br />";
echo "<input type='submit'>";
echo "</form>";

?>
</body>
</html>

