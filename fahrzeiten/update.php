<?php


//http://localhost/3Htl/Busfahrplan/fahrzeiten/

// Stellt eine Verbindung zur Datenbank her (Datei liegt ein Verzeichnis höher)
require dirname(__DIR__) . '/connect/connect.php'; 

// Prüft, ob in der URL ein Parameter 'id' übergeben wurde
if(isset($_GET['id'])){

    // Speichert die übergebene ID als Ganzzahl (int) in einer Variable
    $id = (int) $_GET['id'];

    // Bereitet eine SQL-Abfrage vor, um den Datensatz mit der passenden ID auszulesen
    $stmt = $pdo->prepare("SELECT * FROM fahrzeit WHERE id = :id");

    // Bindet die ID an den Platzhalter in der Abfrage
    $stmt->bindParam(":id", $id);

    // Führt die Abfrage aus
    $stmt->execute();

    // Holt den Datensatz aus der Datenbank und speichert ihn als assoziatives Array
    $ski = $stmt->fetch(PDO::FETCH_ASSOC);

    // Wenn das Formular abgeschickt wurde (per POST-Methode)
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        // Speichert die übermittelten Formulardaten in Variablen
        $haltestelle_id = $_POST['haltestelle_id'];
        $fahrplan_id = $_POST['fahrplan_id'];
        $ankunftzeit = $_POST['ankunftzeit'];
        $abfahrzeit = $_POST['abfahrzeit'];

        // Bereitet eine SQL-Abfrage zum Aktualisieren des Datensatzes mit der gegebenen ID vor
        $stmt = $pdo->prepare('UPDATE fahrzeit 
                               SET id = :id, 
                                   haltestelle_id = :haltestelle_id,
                                   fahrplan_id = :fahrplan_id,  
                                   ankunftzeit = :ankunftzeit, 
                                   abfahrzeit = :abfahrzeit 
                               WHERE id = :id');

        // Bindet die Werte an die Platzhalter in der SQL-Anweisung
        $stmt->bindValue('id', $id);
        $stmt->bindValue('haltestelle_id', $haltestelle_id);
        $stmt->bindValue('fahrplan_id', $fahrplan_id);
        $stmt->bindValue('ankunftzeit', $ankunftzeit);
        $stmt->bindValue('abfahrzeit', $abfahrzeit);

        // Führt das Update aus
        $stmt->execute();

        // Leitet nach dem Update zur vorherigen Seite weiter
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
