<?php
http://localhost/3Htl/Busfahrplan/fahrzeiten/

require dirname(__DIR__) . '/connect/connect.php'; 


if($_SERVER['REQUEST_METHOD'] == 'POST'){
$id = $_POST['id'];
$haltestelle_id = $_POST['haltestelle_id'];
$fahrplan_id = $_POST['fahrplan_id'];
$ankunftzeit = $_POST['ankunftzeit'];
$abfahrzeit = $_POST['abfahrzeit'];

$stmt = $pdo->prepare('INSERT INTO `fahrzeit` (`id`, `haltestelle_id`, `fahrplan_id`, `ankunftzeit`, `abfahrzeit`) VALUES (:id, :haltestelle_id, :fahrplan_id, :ankunftzeit, :abfahrzeit)');

$stmt->bindValue('id', $id);
$stmt->bindValue('haltestelle_id', $haltestelle_id);
$stmt->bindValue('fahrplan_id', $fahrplan_id);
$stmt->bindValue('ankunftzeit', $ankunftzeit);
$stmt->bindValue('abfahrzeit', $abfahrzeit);

$stmt->execute();
header('location:.');

}
  

?>

<!DOCTYPE html>
<html lang="de">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Einfügen</title>
    <link rel="shylesheet" href="../views/mycss.css">
</head>
<body>
    <form action="" method="POST">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id">
        <label for="haltestelle_id">haltestellen_id:</label>
        <input type="text" id="haltestelle_id" name="haltestelle_id" >
    <br><br>
        <label for=fahrplan_id>fahrplan_id:</label>
        <input type="text" id=fahrplan_id name=fahrplan_id>
    <br><br>
   <label for=ankunftzeit>ankunftszeit:</label>
        <input type="time" id=ankunftzeit name=ankunftzeit>
    <br><br>
    <label for=abfahrzeit>abfahrzeit:</label>
        <input type="time" id=abfahrzeit name=abfahrzeit>
    <br><br>
        <button type="submit">Absenden</button>
    </form>
</body> 
</html>