<?php

// Binde die Datei ein, die die Verbindung zur Datenbank herstellt
require dirname(__DIR__) . '/connect/connect.php';

// Überprüfe, ob in der URL ein Parameter 'deleteId' übergeben wurde
if(isset($_GET['deleteId'])){
    // Speichere die übergebene ID in einer Variable
    $id = $_GET['deleteId'];

    // Bereite eine SQL-Anweisung vor, die einen Datensatz mit der übergebenen ID aus der Tabelle 'fahrzeit' löscht
    $stmt = $pdo->prepare('DELETE FROM `fahrzeit` WHERE `id` = :id');

    // Binde die ID an den Platzhalter in der SQL-Anweisung
    $stmt->bindValue(':id', $id);

    // Führe das SQL-Statement aus (Datensatz wird gelöscht)
    $stmt->execute();

    // Nach dem Löschen: Weiterleitung zur Startseite (index.php)
    header('location:./index.php');
    
};
?>