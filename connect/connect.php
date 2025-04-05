<?php
/*
Erzeugt eine neue Instanz($pdo) de  r Klasse PDO; baut Verbindung zur Datenbank auf Problematik:
Fehler beim Verbinungsaufbau zur DB werden dem Anwender angezeigt, wenn nicht mit "try/catch" gearbeitet wird
*/

/*PDO::ERRMODE_EXCEPTION ist eine Konstante, die bei PHP8 nicht unbedingt gesetzt weden muss,
jedoch bei der Migration der DB auf einen anderen Sever (bzw. PHP Version) gesetzt werden sollte*/
try {
    $pdo = new PDO('mysql:host=localhost;dbname=Busfahrplan', 'root', '', [
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
    ]);
}

catch (PDOException $e) {
    echo "Fehler bei Verbindungsaufbau zur Datenbank";
    echo $e->get.Message();
    die();
}
