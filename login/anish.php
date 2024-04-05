<?php
$db_host = "localhost";
$db_name = "anish";
$db_user = "root";
$db_pass = "";

$dsn = "mysql:host=$db_host;dbname=$db_name";
$options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];
try{
$pdo = new PDO($dsn, $db_user, $db_pass, $options);
}catch(PDOException $e){
    die("cannot connect to database!");
}
?>