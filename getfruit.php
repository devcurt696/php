<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Fruit</h1>
<?php 
$dsn = "mysql:dbname=mydatabase";
$username = 'root';
$password = 'd4t4l0rd';
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$sql = "SELECT * FROM fruit";
echo "<ul>";
try{
    $rows = $conn->query($sql);
    foreach($rows as $row) {
        echo "<li>A ". $row["name"] . " is " . $row["color"] . ".</li>";
    }
} catch(PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}
echo "</ul>";
$conn = null;
?>
</body>
</html>