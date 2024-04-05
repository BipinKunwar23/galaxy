<?php
session_reset();
session_start(); 
require_once "../admin/db.php";
require_once "../admin/style.php";
require_once "style.php";


$adult=$_POST['adult'];
$_SESSION['adult']=$adult;
$child=$_POST['child'];
$_SESSION['child']=$child;

$_SESSION['guest']=$adult+$child;
$_SESSION['checkin']=$_POST['checkin'];
$_SESSION['checkout']=$_POST['checkout'];

$obj= new Database();
$data=$obj->select("SELECT r.* ,COUNT(ad.roomno) AS available FROM addroom ad JOIN room r ON ad.room=r.id
WHERE ad.status='Active' AND r.adult IN($adult,$adult+1) AND r.child=$child
GROUP BY ad.room
HAVING COUNT(ad.room)>0
");
if(count($data)==0){
    die("Rooms are not available");
    die;
}

?>
<div class="content">
    <div class="message"></div>

    <div class="registration">
    </div>
    
    <div class="roomcontent">
<?php foreach($data as $items){
    ?>
   
<div class='catagory_table'>
<div class='catagory_image'><img src='../admin/<?php echo $items['image'];?>'></div>

<div class='descp'>
<div><span><?php echo $items['room'] ?> Room</span></div>
<div><span><?php echo$items['descp'] ?></span></div>
</div>

<div class='catagoryInfo'>
<div class='catagoryPrice'>
<div><span><?php echo $items['price'] ?></span></div>
<div><span>PER NIGHT</span></div>
</div>
<div><span>Available: <?php echo  $items['available'] ?> </span></div>

<div><button data-id="<?php echo $items['id']; ?>" data-room="<?php echo $items['room']; ?>" data-price="<?php echo $items['price']; ?>" class="bookNow">BOOK NOW</button></div>

</div>
</div>
<?php
}?>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(()=>{
        $('.bookNow').click((e)=>{
            $.ajax({
                url: "save.php",
                type: "POST",
                data: {'action':'submit_room','id':$(e.target).data("id"),'room':$(e.target).data("room"),
                    'price':$(e.target).data("price")},
                success: function(data){
                   $('.registration').show().html(data);
                   $('.roomcontent').hide();

                    $('#roomselector').change((e)=>{
                    $.ajax({
                url: "save.php",
                type: "POST",
                data: {'action':'getBed','roomno':$(e.target).val()},
                success: function(data){
                    $('#getBed').val(data);
                }
                    })
                    })




                   $('#submit_details').submit((e)=>{
                    e.preventDefault();
                    $.ajax({
                url: "save.php",
                type: "POST",
                data: $(e.target).serialize()+"&action=saveRoom",
                success: function(data){
                    if(data==1){
                    var scrolX= $(window).scrollTop();

                    $('.message').html("Successfully Submitted!!!").css("top",scrolX+"px").slideDown();
                    setTimeout(()=>{
                    $('.message').hide();
                  setInterval(()=>{
                    window.location="home.php";

                  },1000)
                    },2000)
                }
                else{
                    var scrolX= $(window).scrollTop();

                    $('.message').html(data).css("top",scrolX+"px").slideDown();
                    setInterval(()=>{
                    $('.message').hide();
                    },3000)
                }
                }
                    })
                   })
                }
            })
        })

    })

</script>

