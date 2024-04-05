<?php
require_once "db.php";
$obj = new Database();


if (isset($_POST['action']) && $_POST['action'] == "room_form") {
    $model = '<form action="" class="form_room form_catagory">
<div><span>Floor No:</span>
<select name="floor" id="floorSelect">
<option value="">Select</option>
';
    $data = $obj->select("SELECT * FROM floor");

    foreach ($data as $items) {
        $model .= "<option value='{$items['id']}'>{$items['florno']}</option>";
    }
    $model .= '
</select>
</div>
<div calss="roomNO">
<span>Room No</span>
<select name="roomNO" id="roomNo">
<option value="">select room</option>
</select>
</div>
<div><span>Catagory</span>
<select name="room"><option value="">Select Catagory</option>
';
    $catg = $obj->select("SELECT * FROM  room");
    foreach ($catg as $items) {
        $model .= "<option value='{$items['id']}'>{$items['room']}</option>";
    }
    $model .= '

</select>
</div>

<div class="Bed">
<div><span>Bed Type</span></div>

<div><span>Quantity</span></div>
<div><input type="text" name="bed[]" required></div>

<div><input type="number" name="qty[]" required> </div>
<div><button id="moreBed">More Bed</button></div>
</div>
<div><span>status</span>
<select name="status">
<option value="In Active">In Active</option>
<option value="Active">Active</option>
</select>
</div>
<div><input type="submit" value="SAVE"></div>

</form>';
    echo $model;
}

if (isset($_POST['action']) && $_POST['action'] == "getRoomno") {
    $id = $_POST['florid'];
    $model = "";
    $data = $obj->select("SELECT * FROM floor WHERE id=$id");
    foreach ($data as $items) {
        for ($i = 0; $i < $items['capacity']; $i++) {
            $roomno = ($items['florno'] * 100) + $i;
            $value = $obj->select("SELECT roomno FROM addroom WHERE roomno=$roomno");
            if (count($value) == 0) {
                $model .= "<option value='$roomno'>$roomno</option>";
            }
        }
    }
    echo $model;
}


if (isset($_POST['action']) && $_POST['action'] == "submit_room") {
    if (empty($_POST['floor']) || empty($_POST['roomNO']) || empty($_POST['room'])) {
        echo "Plesase fill all the fields!!!";
        die;
    }
    if ($obj->insert('addroom', [
        'floor' => $_POST['floor'], 'roomno' => $_POST['roomNO'],
        'room' => $_POST['room'], 'bed' => implode(',', $_POST['bed']), 'qty' => implode(',', $_POST['qty']), 'status' => $_POST['status']
    ])) {
        echo 1;
    }
}

if (isset($_POST['action']) && $_POST['action'] == "load_room") {

    $data = $obj->select('SELECT id,roomno,status FROM addroom ORDER BY roomno');
    if (count($data) == 0) {
        $model = "No Room are Created";
    } else {
        $model = "<div class='room_container'>
<div class='color'>

<div>
<div style='background-color: #36BD4F;'></div>
<span>Active</span>
</div>
<div>
<div style='background-color: #ED8B45;'></div>
<span>In Active</span>
</div>
<div>
<div style='background-color: #5112FF;'></div>
<span>Booked</span>
</div>
<div>
<div style='background-color: #E83113;'></div>
<span>Reserve</span>
</div>
</div>
<div class='room_table'>
";
        foreach ($data as $items) {
            if ($items['status'] == "Active") {
                $model .= "<div class='statusContain'><div class='roomstatus' style='background-color: #36BD4F;' class='active'><span  data-value='{$items['id']}'>{$items['roomno']}</span></div></div>";
            } else if ($items['status'] == "In Active") {
                $model .= "<div class='statusContain'><div class='roomstatus' style='background-color: #ED8B45;' class='inactive'><span data-value='{$items['id']}'>{$items['roomno']}</span></></div></div>";
            } else if ($items['status'] == "Booked") {
                $model .= "<div class='statusContain'><div class='roomstatus' style='background-color:  #5112FF;' class='booked'><span  data-value='{$items['id']}'>{$items['roomno']}</span></div></div>";
            } else if ($items['status'] == "Reserve") {
                $model .= "<div class='statusContain'><div class='roomstatus' style='background-color:  #E83113;' class='reserve'><span data-value='{$items['id']}'>{$items['roomno']}</span></div></div>";
            }
        }
        $model .= "</div></div>";
    }
    echo $model;
}

if (isset($_POST['action']) && $_POST['action'] == "roomtable") {
    $data = $obj->select("SELECT ad.bed,ad.qty,ad.status, c.room,c.adult,c.child FROM addroom ad JOIN room c ON ad.room=c.id 
WHERE ad.id={$_POST['roomid']}");
    $bed = getBed($_POST['roomid']);
    foreach ($data as $items) {
        $model = "<div class='roomtable'>
<div><span>Catagory:</span><span>{$items['room']}  Room</span></div>
<div><span>Bed Type:  </span><span>$bed</span></div>
<div><span>Status:  </span><span>{$items['status']}</span></div>
<div><span>Adult:  </span><span>{$items['adult']}</span></div>
<div><span>child:  </span><span>{$items['child']}</span></div>


</div>
";
    }
    echo $model;
}
function getBed($room)
{
    $obj = new Database();
    $data = $obj->select("SELECT bed,qty FROM addroom WHERE id=$room");
    foreach ($data as $items) {
        $bed = explode(',', $items['bed']);
        $qty = explode(',', $items['qty']);
    }
    $bedlist = array();

    for ($i = 0; $i < count($bed); $i++) {
        $bedlist[] = $qty[$i] . "  " . $bed[$i];
    }
    $bedstring = implode('+', $bedlist);
    return $bedstring;
}
