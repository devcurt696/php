<?php
$dsn = "mysql:dbname=mydatabase";
$username = "root";
$password = 'd4t4l0rd';
try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$id = 8;
$newEmailAddress = "derek.winter@gmail.com";

$sql = "UPDATE members SET emailAddress = :newEmailAddress WHERE id=:id";
try {
    $st = $conn->prepare($sql);
    $st->bindValue(":id", $id, PDO::PARAM_INT);
    $st->bindValue(":newEmailAddress", $newEmailAddress, PDO::PARAM_STR);
    $st->execute();

} catch(PDOException $e) {
    echo "Query failed " . $e->getMessage();
}
?>