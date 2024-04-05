<?php 
require_once "db.php";
$obj= new Database();
if(isset($_POST['action'])&& $_POST['action']=="booktable"){
$data=$obj->select("SELECT  ad.roomno,c.fname,c.lname,c.roomid,b.* FROM booking b 
JOIN customer c ON b.cid=c.id
JOIN addroom ad ON c.roomid=ad.id 
WHERE ad.status='Reserve'
");
if(count($data)==0){
    $model="No Booking Confirmation Found Yet";
}
else{
$model="<table class='floor_table booktable'>
<tr>
    <th>Booking</th>

    <th>Room No</th>
    <th>Name</th>
    <th>Guest</th>
    <th>Check In</th>
    <th>Check Out</th>
    <th>Action</th>
</tr>";
foreach($data as $items){
$model.="
<tr>
    <td>{$items['date']}</td>
    <td>{$items['roomno']}</td>

    <td>{$items['fname']} {$items['lname']}</td>
    <td>{$items['guest']}</td>

    <td>{$items['checkin']}</td>
    <td>{$items['checkout']}</td>

    <td><button class='confirm' data-id='{$items['roomid']}'>Confirm</button></td>

</tr>
";
}

$model.="</table>";
}
echo $model;

}
if(isset($_POST['action'])&& $_POST['action']=="bookconfirm"){
$obj->update('addroom',['status'=>'Booked'],"id='{$_POST['romid']}'",null);

}
?>