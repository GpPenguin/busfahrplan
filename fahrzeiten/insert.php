<?php

// (Fehlerhaft: Diese Zeile macht nichts und sollte entfernt werden)
// http://localhost/3Htl/Busfahrplan/fahrzeiten/

// Binde die Datei für die Datenbankverbindung ein (eine Ebene höher im Verzeichnis)
require dirname(__DIR__) . '/connect/connect.php'; 

// Prüfe, ob das Formular mit der Methode POST abgeschickt wurde
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Speichere die übermittelten Formulardaten in Variablen
    $id = $_POST['id'];
    $haltestelle_id = $_POST['haltestelle_id'];
    $fahrplan_id = $_POST['fahrplan_id'];
    $ankunftzeit = $_POST['ankunftzeit'];
    $abfahrzeit = $_POST['abfahrzeit'];

    // Bereite ein SQL-Statement zum Einfügen eines neuen Datensatzes in die Tabelle 'fahrzeit' vor
    $stmt = $pdo->prepare('INSERT INTO `fahrzeit` (`id`, `haltestelle_id`, `fahrplan_id`, `ankunftzeit`, `abfahrzeit`) 
                           VALUES (:id, :haltestelle_id, :fahrplan_id, :ankunftzeit, :abfahrzeit)');

    // Binde die Variablen an die Platzhalter im SQL-Befehl
    $stmt->bindValue('id', $id);
    $stmt->bindValue('haltestelle_id', $haltestelle_id);
    $stmt->bindValue('fahrplan_id', $fahrplan_id);
    $stmt->bindValue('ankunftzeit', $ankunftzeit);
    $stmt->bindValue('abfahrzeit', $abfahrzeit);

    // Führe das vorbereitete SQL-Statement aus (schreibt die Daten in die Datenbank)
    $stmt->execute();

    // Weiterleitung zurück auf dieselbe Seite nach dem Einfügen (verhindert doppeltes Absenden bei Neuladen)
    header('location:.');
}
?>

<!-- Beginn des HTML-Dokuments -->
<!DOCTYPE html>
<html lang="de"> <!-- Deutsch als Sprache der Webseite -->

<head>
    <meta charset="UTF-8"> <!-- Zeichensatz für Umlaute usw. -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Für responsive Darstellung -->
    <title>Einfügen</title> <!-- Titel der Seite im Browser -->

    <!-- Fehler: "shylesheet" sollte "stylesheet" heißen, sonst wird Bootstrap nicht geladen -->
    <link rel="shylesheet" href="../view/bootstrap.min.css">
</head>

<body>
    <!-- Formular zum Eingeben eines neuen Fahrzeit-Datensatzes -->
    <form action="" method="POST"> <!-- Die Daten werden per POST an dieselbe Seite gesendet -->

        <!-- Eingabefeld für die ID -->
        <label for="id">ID:</label>
        <input type="text" id="id" name="id">

        <!-- Eingabefeld für die Haltestellen-ID -->
        <label for="haltestelle_id">haltestellen_id:</label>
        <input type="text" id="haltestelle_id" name="haltestelle_id" >
        <br><br>

        <!-- Eingabefeld für die Fahrplan-ID -->
        <label for="fahrplan_id">fahrplan_id:</label>
        <input type="text" id="fahrplan_id" name="fahrplan_id">
        <br><br>

        <!-- Eingabefeld für die Ankunftszeit (im Zeitformat) -->
        <label for="ankunftzeit">ankunftszeit:</label>
        <input type="time" id="ankunftzeit" name="ankunftzeit">
        <br><br>

        <!-- Eingabefeld für die Abfahrtszeit (im Zeitformat) -->
        <label for="abfahrzeit">abfahrzeit:</label>
        <input type="time" id="abfahrzeit" name="abfahrzeit">
        <br><br>

        <!-- Abschicken des Formulars -->
        <button type="submit">Absenden</button>
    </form>
</body> 

</html>