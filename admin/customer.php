<?php 
require_once "db.php";
$obj= new Database();
if(isset($_POST['action'])&& $_POST['action']=="bookedtable"){
    $data=$obj->select("SELECT  ad.roomno,c.fname,c.id AS cid,c.lname,c.roomid,b.*,ad.status FROM booking b 
    JOIN customer c ON b.cid=c.id
    JOIN addroom ad ON c.roomid=ad.id 
    WHERE ad.status='Booked'
    ");
    if(count($data)==0){
        $model="No Booking Found Yet";
    }
    else{
$model="<table class='floor_table booktable'>
<tr>
    <th>Booking</th>

    <th>Room No</th>
    <th>Name</th>
    <th>Guest</th>
    <th>Price</th>
    <th>Check In</th>
    <th>Check Out</th>
    <th>status</th>
    <th>Action</th>
</tr>";
foreach($data as $items){
$model.="
<tr>    
<td>{$items['date']}</td>

    <td>{$items['roomno']}</td>

    <td>{$items['fname']} {$items['lname']}</td>
    <td>{$items['guest']}</td>
    <td>{$items['price']}</td>
    <td>{$items['checkin']}</td>
    <td>{$items['checkout']}</td>
    <td>{$items['status']}</td>

    <td><button class='unbook' data-id='{$items['roomid']}' data-cid='{$items['cid']}'>Unbook</button></td>

</tr>
";
}

$model.="</table>";
    }
echo $model;

}
if(isset($_POST['action'])&& $_POST['action']=="unbook"){
if($obj->delete('booking',"cid='{$_POST['cid']}'")){
    if($obj->delete('customer',"roomid='{$_POST['romid']}'")){
        $obj->update('addroom',['status'=>'Active'],"id='{$_POST['romid']}'",null);

    }

}

}
?>