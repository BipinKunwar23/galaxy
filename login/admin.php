<?php 

require_once "anish.php";

if(isset($_POST['btn-login'])){
    
    $uname=$_POST['username'];
    $password=$_POST['password'];
    if(empty($uname) || empty($password))
    {
        die("please fill all the fields");
    }
    
$stmt = $pdo->prepare("SELECT * FROM admin WHERE username=? && password=?");
$stmt->execute([$uname, $password]);
$admin= $stmt->fetchAll();
if($admin){
header("location: index.php");
die;
}

else{
    echo "invalid username and password";
}

   
}

?>