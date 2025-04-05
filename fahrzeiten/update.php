<?php

http://localhost/3Htl/Busfahrplan/fahrzeiten/

require dirname(__DIR__) . '/connect/connect.php'; 

if(isset($_GET['id'])){

    $id = (int) $_GET['id'];

    $stmt = $pdo->prepare("SELECT * FROM fahrzeit WHERE id=:id");

    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $ski = $stmt->fetch(PDO::FETCH_ASSOC);


if($_SERVER['REQUEST_METHOD'] == 'POST'){

$haltestelle_id = $_POST['haltestelle_id'];
$fahrplan_id = $_POST['fahrplan_id'];
$ankunftzeit = $_POST['ankunftzeit'];
$abfahrzeit = $_POST['abfahrzeit'];

$stmt = $pdo->prepare('UPDATE fahrzeit SET id = :id, haltestelle_id =:haltestelle_id,fahrplan_id =:fahrplan_id  , ankunftzeit =:ankunftzeit, abfahrzeit=:abfahrzeit WHERE id=:id');

$stmt->bindValue('id', $id);
$stmt->bindValue('haltestelle_id', $haltestelle_id);
$stmt->bindValue('fahrplan_id', $fahrplan_id);
$stmt->bindValue('ankunftzeit', $ankunftzeit);
$stmt->bindValue('abfahrzeit', $abfahrzeit);

$stmt->execute();

header('location:.');
}
}

?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular</title>

</head>
<body>
    <form action="" method="POST">
        
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

        <button type="submit">Updaten</button>
    </form>
</body> 
</html>