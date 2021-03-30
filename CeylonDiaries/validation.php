<?php
// $dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
$host = "localhost";
$dbname = "ceylondiaries";
$user = "root";
$password = "root";


$dbh = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $user, $password);
?>