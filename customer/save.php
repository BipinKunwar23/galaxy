
<?php
session_start();

require_once "../admin/db.php";
$obj= new Database();

if(isset($_POST['action'])&& $_POST['action']=="submit_room"){
    $data=$obj->select("SELECT ad.*,r.room AS catagory  FROM addroom ad
    JOIN room r ON ad.room=r.id
    WHERE ad.room= {$_POST['id']} AND ad.status='Active'
    ORDER BY ad.roomno");
    
$price=($_SESSION['adult']*$_POST['price'])+($_SESSION['child']* ceil($_POST['price']/2));
$form='
<form id="submit_details">
        
<div class="customer">
    <div><span>Reg. Date</span><input type="date" name="regdate" required></div>
    <div><span>First Name</span><input type="text" name="fname" required></div>
    <div><span>Last Name</span><input type="text" name="lname"> required</div>
    <div><span>Country</span><input type="text" name="country" required></div>
    <div><span>Province</span><input type="text" name="province"required></div>
    <div><span>District</span><input type="text" name="district"required></div>
    <div><span>Muncipility</span><input type="text" name="mun"required></div>
    <div><span>Ward NO</span><input type="number" name="ward"required></div>
    <div><span>Mobile NO</span><input type="text" name="contact"required></div>
    <div><span>Email</span><input type="email" name="email"required></div>

</div>
<div class="customer">
<div><span>Room No</span>

<select name="roomid" id="roomselector">
<option value="">Select</option>
';
foreach($data as $items){
    $form.="<option value='{$items['id']}'>{$items['roomno']}</option>";
}

$form.="  </select>
     
</div>
    <div><span>Room Type</span><input type='text'name='room' value='{$_POST['room']}'></div>

   <div><span>Bed Type</span>
  <input type='text' id='getBed'>";
   
   $form.="
   </select>
   </div>
   <div><span>Guest</span><input type='text' value='{$_SESSION['guest']}' readonly name='guest'></div>
    <div><span>Price</span><input type='text' value='{$price}' readonly name='price'></div>
    <div><span>Check In</span><input type='text' value='{$_SESSION['checkin']}' name='checkin' required></div>
    <div><span>Check Out</span><input type='text' value='{$_SESSION['checkout']}' name='checkout' required></div>
    <div><input type='submit'></div>
    </div>
    </form>
    ";
    echo $form;
}
    

if(isset($_POST['action'])&& $_POST['action']=="getBed"){
    $room=$_POST['roomno'];
    $data=$obj->select("SELECT bed,qty FROM addroom WHERE id=$room");
    foreach($data as $items){
        $bed=explode(',',$items['bed']);
        $qty=explode(',',$items['qty']);
    }
    $bedlist=array();

   for ($i=0; $i<count($bed); $i++){
    $bedlist[]=$qty[$i]."  ".$bed[$i];
   }
    $bedstring=implode('+',$bedlist);
    echo $bedstring;
}

if(isset($_POST['action'])&& $_POST['action']=="saveRoom"){
    if($_POST['roomid']==""){
        echo "Select Room NO";
        die;
    }
 
    if($obj->insert('customer',['roomid'=>$_POST['roomid'],'regdate'=>$_POST['regdate'],'fname'=>$_POST['fname'],'lname'=>$_POST['lname'],'country'=>$_POST['country'],'pname'=>$_POST['province'],'dname'=>$_POST['district'],'mun'=>$_POST['mun'],'ward'=>$_POST['ward'],'mobile'=>$_POST['contact'],'email'=>$_POST['email']],['email'=>$_POST['email']])){


    
   $data=$obj->select("SELECT id FROM customer  WHERE roomid={$_POST['roomid']}");
   if(count($data)==0){
    echo "Customer record couldnt save!!!";
   }
   else{
   $cid=$data[0]['id'];

   if($obj->insert('booking',['date'=>$_POST['regdate'],'cid'=>$cid,'guest'=>$_POST['guest'],'price'=>$_POST['price'],'checkin'=>$_POST['checkin'],'checkout'=>$_POST['checkout']],null)){


if($obj->update('addroom',['status'=>'Reserve'],"id='{$_POST['roomid']}'",null)){
    echo 1;
}
   }
   }
}
}

?>

      
