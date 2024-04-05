<?php
require_once "db.php";
$obj=new Database();
session_start();
if(isset($_POST['action'])&& $_POST['action']=="catagory"){

$model='
<form class="form_catagory">

<div><span>Room Type</span>
<input type="text" name="room">
</div>
<div><span>Image</span>
<input type="file" name="room_image" id="image_preview">
</div>
<div class="imagePreview">
<img src="">
</div>
<div><span>Adult</span>
<input type="number" name="adult">
</div>
<div><span>Children</span>
<input type="number" name="child">
</div>
<div><span>Price</span>
<input type="number" name="price">
</div>
<div><span>Description</span>
<textarea name="descp" id="" cols="30" rows="10"></textarea>
</div>
<div>
<input id="submit_catagory" type="submit" value="Save">
</div>

</form>';
echo $model;
}

if(isset($_POST['action'])&& $_POST['action']=="submit_catagory"){
    $room=$_POST['room'];
    $imagename=$_FILES['room_image']['name'];

    $extension=pathinfo($imagename,PATHINFO_EXTENSION);
    $validExtension=array('jpg','png','jpeg');
    if(in_array($extension,$validExtension)){
        $newname= rand().".".$extension;
        $path="images/".$newname;
        move_uploaded_file($_FILES['room_image']['tmp_name'],$path);
        $adult=$_POST['adult'];
        $child=$_POST['child'];
        $price=$_POST['price'];
        $descp=$_POST['descp'];

        if($obj->insert('room',['room'=>$room,'image'=>$path,'adult'=>$adult,'child'=>$child,'price'=>$price,'descp'=>$descp],['room'=>$room])){
            echo 1;
        }
    

    }
    else{
        echo "inavalid file format";
    }
   
}

if(isset($_POST['action'])&& $_POST['action']=="load_catagory"){
$data=$obj->select("SELECT * FROM room");
if(count($data)==0){
    $model="No catagory are created Yet";
}
else{
$model='';
foreach($data as $items){
$model.="<div class='catagory_table'>
<div class='catagory_image'><img src='{$items['image']}'></div>

<div class='descp'>
<div><span>{$items['room']} Room</span></div>
<div><span>{$items['descp']}</span></div>
</div>

<div class='catagoryInfo'>
<div class='catagoryPrice'>
<div><span>{$items['price']}</span></div>
<div><span>PER NIGHT</span></div>
</div>

<div class='guest'>
<div><span>Adult: {$items['adult']}</span></div>
<div><span>Children: {$items['child']}</span></div>
</div>

<div class='catagoryAction'>
<div><button data-value='{$items['id']}' class='edit-catagory'>Edit</button></div>
<div><button data-value='{$items['id']}' data-path='{$items['image']}' class='delete-catagory'>Delete</button></div>
</div>
</div>
</div>
";

}
}
echo $model;
}

if(isset($_POST['action'])&& $_POST['action']=="delete-catagory"){
$id=$_POST['id'];
$path=$_POST['path'];
if($obj->delete('room',"id={$id}")){
    unlink($path);
    echo 1;
}

}


if(isset($_POST['action'])&& $_POST['action']=="edit-catagory"){
$id= $_POST['id'];
$data=$obj->select("SELECT * FROM room WHERE id='{$id}' ");
$model='';
foreach($data as $items){
$model.="
<form class='form_catagory saveEdit-catagory'>
<div class='modelbox'>
<div><span>Edit Room Catagory</span></div>
<div id='close-Btn'><button>X</button></div>
</div>
<div><span>Room Type</span>
<input type='text' name='room' value='{$items['room']}'>
</div>
<div><span>Image</span>
<input type='file' name='newimage' id='newimage'>
</div>
<div class='image-preview' >
<img src='{$items["image"]}'>
</div>

<div><span>Adult</span>
<input type='number' name='adult' value='{$items['adult']}'>
</div>
<div><span>Children</span>
<input type='number' name='child' value='{$items['child']}'>
</div>
<div><span>Price</span>
<input type='number' name='price' value='{$items['price']}'>
</div>
<div><span>Description</span>
<textarea name='descp'  cols='30' rows='5' maxlenght='20'>{$items['descp']}</textarea>
</div>
<div>
<input id='save_catagory' type='submit' value='SAVE'>
</div>

</form>
";

}
$_SESSION['id']=$data[0]['id'];
$_SESSION["oldimage"]=$data[0]['image'];
echo $model;

}

if(isset($_POST['action'])&& $_POST['action']=="edit_catagory"){
    $room=$_POST['room'];
    if(isset($_FILES['newimage'])&& $_FILES['newimage']['name']!=null){
    $imagename=$_FILES['newimage']['name'];
    $extension=pathinfo($imagename,PATHINFO_EXTENSION);
    $validExtension=array('jpg','png','jpeg');
    if(in_array($extension,$validExtension)){
        $newname= rand().".".$extension;
        $path="images/".$newname;
        move_uploaded_file($_FILES['newimage']['tmp_name'],$path);
    }
    
    else{
        echo "inavalid file format";
        die;
    
}
    }
    else{
        $path=$_SESSION['oldimage'];
    }
    $id=$_SESSION['id'];
        $adult=$_POST['adult'];
        $child=$_POST['child'];
        $price=$_POST['price'];
        $descp=$_POST['descp'];

       if($obj->update('room',['room'=>$room,'image'=>$path,'adult'=>$adult,'child'=>$child,'price'=>$price,'descp'=>$descp],"id='{$id}'",['room'=>$room],$id)){
        echo 1;
       }
    
   
}
?>
