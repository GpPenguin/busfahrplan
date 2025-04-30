<?php

// Verbindet das aktuelle Skript mit der Datenbank über die Datei connect.php, die im übergeordneten Verzeichnis liegt
require dirname(__DIR__) . '/connect/connect.php';

// Bereitet eine SQL-Abfrage vor, um alle Einträge aus der Tabelle 'fahrzeit' zu holen
$stmt = $pdo->prepare("SELECT * FROM fahrzeit");

// Führt die vorbereitete Abfrage aus
$stmt->execute();

// Holt alle Datensätze aus dem Ergebnis als assoziatives Array (also mit Spaltennamen als Schlüssel)
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ab hier beginnt der HTML-Teil, um die Datensätze in einer Tabelle anzuzeigen
?>

<!DOCTYPE html> <!-- Definiert den Dokumenttyp als HTML5 -->
<html lang="en"> <!-- Sprache der Webseite ist Englisch -->
<head>
    <meta charset="UTF-8"> <!-- Zeichencodierung UTF-8, wichtig für Umlaute usw. -->
    <meta name="viewport" content="witdh=device-width, initial-scale=1.0"> <!-- Macht die Seite mobilfreundlich (kleiner Tippfehler: "width") -->
    <link rel="stylesheet" href="../view/bootstrap.min.css"> <!-- Lädt die CSS-Datei von Bootstrap für schönes Tabellen-Design -->
  
    <title>Busfahrplan</title> <!-- Titel der Seite im Browser-Tab -->
</head>
<body>
    <h1>Busfahrplan</h1> <!-- Überschrift der Seite -->

    <!-- Beginn der Tabelle mit Bootstrap-Klasse für Streifenmuster -->
    <table class="table table-striped">
        <thead>
            <tr> <!-- Tabellenüberschriften -->
                <th>ID</th>
                <th>Haltestelle_id</th>
                <th>Fahrt_id</th>
                <th>Ankunftszeit</th>
                <th>Abfahrtszeit</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
        <!-- PHP-Schleife: Für jeden Datensatz in $results wird eine neue Tabellenzeile erstellt -->
        <?php foreach ($results as $result): ?>
            <tr>
                <!-- Gibt die einzelnen Werte des aktuellen Datensatzes in Tabellenzellen aus -->
                <td><?php echo $result['id'] ?></td>
                <td><?php echo $result['haltestelle_id'] ?></td>
                <td><?php echo $result['fahrplan_id'] ?></td>
                <td><?php echo $result['ankunftzeit'] ?></td>
                <td><?php echo $result['abfahrzeit'] ?></td>
                
                <!-- Erstellt einen Link zum Aktualisieren des Datensatzes (führt zu update.php mit übergebener ID) -->
                <td><a href="update.php?id=<?php echo $result['id']; ?>">Update</a></td>
                
                <!-- Erstellt einen Link zum Löschen des Datensatzes (führt zu delete.php mit übergebener ID) -->
                <td><a href="delete.php?deleteId=<?php echo $result['id'] ?>">Delete</a></td>
             </tr>
        <?php endforeach;?> 
        </tbody>
    </table>

    <!-- Link, um eine neue Fahrzeit hinzuzufügen (führt zu insert.php) -->
    </button><a href="insert.php">Fahrzeit anlegen</a></button>  
</body>
</html>
