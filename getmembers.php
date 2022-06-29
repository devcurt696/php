<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Member Info</title>
    <link rel="stylesheet" href="common.css"/>
</head>
<body>
    <h1>Club members under 25</h1>
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
$sql = "SELECT * FROM members WHERE age < 25";
echo "<table><tr><th>First Name</th><th>Last Name</th><th>Age</th><th>Joined</th></tr>";
try {
    $rows = $conn->query($sql);
    foreach ($rows as $row) {
        echo "<tr><td>" . $row["firstname"] . "</td><td>" . $row["lastname"] . "</td><td>" . $row["age"] . "</td><td>" . $row["joinDate"] . "</td></tr>";
    }
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}
echo "</table>";
$conn = null;
?>
</body>
</html>