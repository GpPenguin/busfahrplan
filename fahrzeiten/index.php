<?php

require dirname(__DIR__) . '/connect/connect.php';

$stmt = $pdo->prepare("SELECT * FROM `fahrzeit`");

$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Ausgabe der Datensätze

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="witdh=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/bootstrap.min.css">
  
    <title>Busfahrplan</title>
</head>
<body>
    <h1>Busfahrplan</h1>
    <table class="table table-striped">
        <thead>
            <tr>
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
        <?php foreach ($results as $result): ?>
            <tr>
                <td><?php echo $result['id'] ?></td>
                <td><?php echo $result['haltestelle_id'] ?></td>
                <td><?php echo $result['fahrplan_id'] ?></td>
                <td><?php echo $result['ankunftzeit'] ?></td>
                <td><?php echo $result['abfahrzeit'] ?></td>
                <td><a href="update.php?id=<?php echo $result['id']; ?>">Update</a></td>
                <td><a href="delete.php?deleteId=<?php echo $result['id'] ?>">Delete</a></td>
             </tr>
       <?php endforeach;?> 
        </tbody>
    </table>
    </button><a href="insert.php">Fahrzeit anlegen</a></button>  
</body>
</html>

