<?php
$name = "root";
$password = "";
$database = "escola";
$host = "localhost:3306";

try {
    $connection = new PDO("mysql:host=$host;dbname=$database", $name, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>