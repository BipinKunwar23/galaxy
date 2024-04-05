<?php 
require "style.php";
?>
<div class="container">
<div class="action">
<div><button id="floor">Floor</button></div>
<div><button id="room">Rooms</button></div>
<div><button id="catagory">Room Catagory</button></div>
<div><button id="customer">Customers</button></div>

<div><button id="booking">Booking</button></div>
<div><button>Services</button></div>
<div><button>Log Out</button> </div>
</div>
<div class="content">
<div class="insert"></div>
<div class="form"></div>
<div class="table"></div>
<div class="view"></div>
<div class="edit"></div>
<div class="message"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

$(document).ready(()=>{
function floor(){
    $('#floor').click(()=>{
        $('.insert').hide();
       $(".form").html("");
        $('.table').html("");
        $('.edit').html("");
$('.insert').html("<div><button id='floor_form'>Insert</button> <button id='view_floor'>View</button></div>").fadeIn();

$('#floor_form').click(()=>{


    $.ajax({
        url: "floor.php",
        type: "POST",
        data: {'action':'floor_form'},
        success: function(data){
            $('.form').html(data).show();
            $('.table').hide();
     

            $('.form_floor').submit((e)=>{
                e.preventDefault();

                 $.ajax({
                 url: "floor.php",
                type: "POST",
                 data:$('.form_floor').serialize()+"&action=submit_floor",
                success: function(data){
                   var scrolX= $(window).scrollTop();
                    if(data==1){
                        
                     $('.message').html("Successfully Inserted").css("top",scrolX+"px").slideDown();
                     setTimeout(()=>{
                    $('.message').hide();
                    $('.form_floor').trigger("reset");
                    viewFloor();
                  
                    },2000)
                    }
                    else{
                    $('.message').html(data).css("top",scrolX+"px").slideDown();
                    setTimeout(()=>{
                    $('.message').hide();
                  
                    },5000)
                    }

                   }

                })
             })
             }
            })
        
    })    

 function viewFloor(){
    $.ajax({
        url: "floor.php",
        type: "POST",
        data: {'action':'load_floor'},
        success: function(data){
            $('.form').hide();
            $('.table').html(data).show();
        }
        })
    }

 $('#view_floor').click(()=>{

    viewFloor(); 

    })


    })

}
floor();

function addroom(){
    $('#room').click(()=>{
          $('.insert').hide();
        $(".form").html("");
        $('.table').html("");
        $('.edit').html("");
$('.insert').html("<div><button id='room_form'>Insert</button> <button id='view_room'>View</button></div>").fadeIn();

$('#room_form').click(()=>{

    $.ajax({
        url: "room.php",
        type: "POST",
        data: {'action':'room_form'},
        success: function(data){
            $('.form').html(data).show();
            $('.table').hide();
     
            $('#floorSelect').change((e)=>{
                $.ajax({
                    url: "room.php",
                    type: "POST",
                    data: {'action':'getRoomno','florid':$(e.target).val()},
                    success: function(data){
                        $('#roomNo').html(data);
                    }

                })
            })
            $('#moreBed').click((e)=>{
                e.preventDefault();

                $(e.target).parent().before('<div><input type="text" name="bed[]"></div><div><input type="number" name="qty[]"></div>');
            })
            $('.form_room').submit((e)=>{
                e.preventDefault();
                 $.ajax({
                 url: "room.php",
                type: "POST",
                 data:  $(e.target).serialize()+"&action=submit_room",
                success: function(data){
                    var scrolX= $(window).scrollTop();
                    if(data==1){
                        
                     $('.message').html("Successfully Inserted").css("top",scrolX+"px").slideDown();
                     setTimeout(()=>{
                    $('.message').hide();
                    $('.form_room').trigger("reset");
                    viewRoom();
                  
                    },2000)
                    }
                    else{
                    $('.message').html(data).css("top",scrolX+"px").slideDown();
                    setTimeout(()=>{
                    $('.message').hide();
                  
                    },5000)
                    }

                   }

                })
             })
             }
            })
        
    })    

 function viewRoom(){
    $.ajax({
        url: "room.php",
        type: "POST",
        data: {'action':'load_room'},
        success: function(data){
            $('.form').hide();
            $('.table').html(data).show();

            $('.roomstatus span').mouseenter((e)=>{
                e.preventDefault();

               $.ajax({
                url: "room.php",
                type: "POST",
                 data: {'action':'roomtable','roomid':$(e.target).data("value")},
                success: function(data){
                    $(e.target).parents(".roomstatus").after("<div class='roomcontain'></div>");
                  $(e.target).parents(".roomstatus").siblings(".roomcontain").html(data).show();
                }
               }) 
            })
            $('.roomstatus').mouseleave((e)=>{

                $(".roomcontain").hide();

            })

        }
        })
    }

 $('#view_room').click(()=>{

    viewRoom(); 

    })


    })

}
addroom();


    function catagory(){
    $('#catagory').click(()=>{
        $('.insert').hide();
        $(".form").html("");
        $('.table').html("");
        $('.edit').html("");
$('.insert').html("<div><button id='catagory_form'>Insert</button> <button id='view_catagory'>View</button></div>").fadeIn();

$('#catagory_form').click(()=>{

    $.ajax({
        url: "catagory.php",
        type: "POST",
        data: {'action':'catagory'},
        success: function(data){
            $('.form').html(data).show();
            $('.table').hide();
            $('#image_preview').change((e)=>{
                var file=e.target.files[0];
               const reader=new FileReader();
               reader.readAsDataURL(file);

               reader.onload=(e)=>{
                $('.imagePreview').show();
                $('.imagePreview img').attr("src",e.target.result);
               }


               
            })

            $('.form_catagory').submit((e)=>{
                e.preventDefault();
                var formData= new FormData(e.target);
                formData.append("action","submit_catagory");
                 $.ajax({
                 url: "catagory.php",
                type: "POST",
                 data: formData,
                 contentType: false,
                 processData: false,
                 cache: false,
                success: function(data){
                    var scrolX= $(window).scrollTop();
                    if(data==1){
                        
                     $('.message').html("Successfully Inserted").css("top",scrolX+"px").slideDown();
                     setTimeout(()=>{
                    $('.message').hide();
                    $('.form_catagory').trigger("reset");
                    viewCatagory();
                  
                    },2000)
                    }
                    else{
                    $('.message').html(data).css("top",scrolX+"px").slideDown();
                    setTimeout(()=>{
                    $('.message').hide();
                  
                    },5000)
                    }

                   
                    

                    
                }

                })

            })
        }


        })
        
    })    

 function viewCatagory(){
    $.ajax({
        url: "catagory.php",
        type: "POST",
        data: {'action':'load_catagory'},
        success: function(data){
            $('.form').hide();
            $('.table').html(data).show();
            
            $('.edit-catagory').click((e)=>{
                e.preventDefault();
                var val=$(e.target).data("value");
                 $.ajax({
                    url: "catagory.php",
                     type: "POST",
                     data: {'action':'edit-catagory','id':val},
                     success: function(data){

                        $('.table').hide();
                        $('.edit').html(data).show();
                        $('#close-Btn button').click(()=>{
                        $('.edit').html(data).hide();
                        viewCatagory();
                        $('.table').show();

                        })
                $('#newimage').change((e)=>{
                var file=e.target.files[0];
               const reader=new FileReader();
               reader.readAsDataURL(file);

               reader.onload=(e)=>{
                $('.image-preview');
                $('.image-preview img').attr("src",e.target.result);
               }


               
            })

                $('.saveEdit-catagory').submit((e)=>{
                e.preventDefault();
                var formData= new FormData(e.target);
                formData.append('action','edit_catagory');
                $.ajax({
                url: "catagory.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(data){
                    var scrolX= $(window).scrollTop();
                    if(data==1){
                        
                     $('.message').html("Successfully Updated").css("top",scrolX+"px").slideDown();
                     setTimeout(()=>{
                    $('.message').hide();
                    },2000)
                    }
                    else{
                    $('.message').html(data).css("top",scrolX+"px").slideDown();
                    setTimeout(()=>{
                    $('.message').hide();
                  
                    },5000)
                    }


                    }
                    })
                    })
                }
            })
            })

            
            $('.delete-catagory').click((e)=>{
                e.preventDefault();
                 $.ajax({
                 url: "catagory.php",
                 type: "POST",
                data: {'action':'delete-catagory','id':$(e.target).data("value"),'path':$(e.target).data("path")},
                success: function(data){
                    var scrolX= $(window).scrollTop();
                    if(data==1){
                        
                     $('.message').html("Successfully Inserted").css("top",scrolX+"px").slideDown();
                     setTimeout(()=>{
                    $('.message').hide();
                    viewCatagory();
                  
                    },2000)
                    }
                    else{
                    $('.message').html(data).css("top",scrolX+"px").slideDown();
                    setTimeout(()=>{
                    $('.message').hide();
                  
                    },5000)
                    }


                }
            })

            })


        }
        })
    }
 $('#view_catagory').click(()=>{

    viewCatagory(); 

    })


    })
}
catagory();

$('#booking').click(()=>{

    function booking(){
    $('.insert').hide();
       $(".form").html("");
        $('.table').html("");
        $('.edit').html("");

    $.ajax({
        url: "booking.php",
        type: "POST",
        data: {'action':'booktable'},
        success: function(data){
        $('.table').html(data).show();
            $('.confirm').click((e)=>{
                $.ajax({
        url: "booking.php",
        type: "POST",
        data: {'action':'bookconfirm','romid':$(e.target).data("id")},
        success: function(data){
            booking();

        }
                })
            })

        }
    })
    }
    booking();

})

$('#customer').click(()=>{

function unbooking(){
$('.insert').hide();
   $(".form").html("");
    $('.table').html("");
    $('.edit').html("");

$.ajax({
    url: "customer.php",
    type: "POST",
    data: {'action':'bookedtable'},
    success: function(data){
    $('.table').html(data).show();
        $('.unbook').click((e)=>{
            $.ajax({
    url: "customer.php",
    type: "POST",
    data: {'action':'unbook','romid':$(e.target).data("id"),'cid':$(e.target).data("cid")},
    success: function(data){
        unbooking();

    }
            })
        })

    }
})
}
unbooking();

})
 
})
</script>

</div>