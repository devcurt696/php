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
$id = 10;
$username = "Curtis";
$password = "mypass";
$firstname = 'Curtis';
$lastname = "Crouse";
$joinDate = "2008-04-20";
$gender = "m";
$favoriteGenre = 'horror';
$emailAddress = 'cecrouse96@yahoo.com';
$otherInterests = "Guitar, music, video games";
$sql = "INSERT INTO members VALUES(:id, :username, password(:password), :firstname, :lastname, :joinDate, :gender, :favoriteGenre, :emailAddress, :otherInterests)";
try {
    $st = $conn->prepare($sql);
    $st->bindValue(":id", $id, PDO::PARAM_INT);
    $st->bindValue(":username", $username, PDO::PARAM_STR);
    $st->bindValue(":password", $password, PDO::PARAM_STR);
    $st->bindValue(":firstname", $firstname, PDO::PARAM_STR);
    $st->bindValue(":lastname", $lastname, PDO::PARAM_STR);
    $st->bindValue(":joinDate", $joinDate, PDO::PARAM_STR);
    $st->bindValue(":gender", $gender, PDO::PARAM_STR);
    $st->bindValue(":favoriteGenre", $favoriteGenre, PDO::PARAM_STR);
    $st->bindValue(":emailAddress", $emailAddress, PDO::PARAM_STR);
    $st->bindValue(":otherInterests", $otherInterests, PDO::PARAM_STR);
    $st->execute();

} catch(PDOException $e) {
    echo "Query failed " . $e->getMessage();
}
?>