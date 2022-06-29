<?php 
$hostname = 'localhost';
$username ='root';
$password = 'd4t4l0rd';

try {
    $dbh = new PDO("mysql:hostname=$hostname;dbname=mysql", $username, $password);
    echo 'Connected to database';
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>