
<?php

$host = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "ceylondiaries";


 $conn =new mysqli($host,$dbusername,$dbpassword,$dbname);

 if (mysqli_connect_error()) {
     die('connect Error ('.mysqli_connect_error().')'
    .mysqli_connect());
 }
?>