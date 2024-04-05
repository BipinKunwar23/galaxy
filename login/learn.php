<?php
// $a = "Anish";
// $b = "Pathak";
// echo $a,$b;
// echo "<br>";
// echo strrev($a);
// echo"<br>";
// echo strlen($b);
// // echo str_word_count($a);
// // echo strpos($a);
// $name = "Anish";
// echo "hello $name";
// $a = 70;
// $b = 80;
// $c = 56;
// $d = 67;
// $e = 50;
// $per = ($a+$b)
// 
// for($x= 0; $x < 20; $x++){
//     if($x == 15){
//         break;
//     }
//     echo "the number is: $x <br>";
// }
// $a=5;
// $b=2;
// function hello(){
    
//     echo $GLOBALS['a'] + $GLOBALS['b'];
// }
// hello();
// $fruits = array("apple","banana","mango");
// echo"I like    ". $fruits[1] ,"," . $fruits[0]
$num1 ="";
$num2 ="";
$rem ="";
$sum= "";
if (isset($_POST['btn_Add'])){
    $num1 = $_POST['num1'];
    // $num2 = $_POST['num2'];
    $rem = $num1%10;
    $sum= $sum * 10 + $rem;
    $num1= $num%10;
}
$num="";
$rem="";
$sum="";





?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sum of two number</title>
</head>
<body>
    <form action="" method="post">
    enter first number: <input type="number" name="num1" value="<?php echo $num1; ?>"> <br>
     enter second number: <input type="number" name="num2" value="<?php echo $num2; ?>"> <br>
    
        <input type="submit" value="Add" name="btn_Add"><br>
        result: <input type="number" name="result" value="<?php echo $result; ?>"> <br>
        
    </form>
    
</body>
</html>
