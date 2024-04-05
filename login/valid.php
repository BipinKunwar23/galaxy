<?php 
require_once "anish.php";
function request($key)
{
    return $_REQUEST[$key] ?? '';
}

$name = $_POST["name"];
$email = $_POST["email"];
$address = $_POST["address"];
$password = $_POST["password"];

if(empty($name) || empty($address) || empty($email)|| empty($password)){
    die("please fill all the fields");
}
$stmt = $pdo->prepare("SELECT * FROM users where name=?");
$stmt->execute([$name]);
$user= $stmt->fetch();
if($user){
die("name already exists");
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    die("please enter proper email...");
}
if($password<6){
    die("enter password greater than 6");
 }
$stmt = $pdo->prepare("INSERT INTO users (name,email,address,password) VALUES (?,?,?,?)");
$stmt->execute([$name,$email,$address,$password]);
echo "Successful";

