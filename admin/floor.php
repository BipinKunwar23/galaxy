<?php
require_once "db.php";
$obj= new Database();


if(isset($_POST['action'])&& $_POST['action']=="floor_form"){
$model='<form action="" class="form_floor form_catagory">

<div><span>Floor No:</span><input type="number" name="florno" required></div>
<div><span>Capacity: </span><input type="text" name="capacity" required></div>
<div><input type="submit" value="SAVE"></div>

</form>';
echo $model;
}

if(isset($_POST['action'])&& $_POST['action']=="submit_floor"){
    $florno=$_POST['florno'];
     $capacity=$_POST['capacity'];
   if($obj->insert('floor',['florno'=>$florno,'capacity'=>$capacity],['florno'=>$florno])){
    echo 1;
   }


}

if(isset($_POST['action'])&& $_POST['action']=="load_floor"){

$data=$obj->select('SELECT * FROM floor');
$model="<table class='floor_table'>
<tr>
    <th>Floor NO</th>
    <th>Capacity</th>
    <th>Action</th>
    <th>Action</th>
</tr>";
foreach($data as $items){
$model.="
<tr>
    <td>{$items['florno']}</td>
    <td>{$items['capacity']}</td>
    <td><button>Edit</button></td>
    <td><button>Delete</button></td>

</tr>
";
}

$model.="</table>";
echo $model;
}


?>

