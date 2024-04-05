<?php require "style.php"?>
<div class="container">
<div class="navbar">
<div><h2>HOTEL ANNAPURNA</h2></div>

<div> <a href="#">Room</a></div>
<div><a href="#">About Us</a></div>
<div><a href="#">Gallery</a></div>
<div><a href="#">Services</a></div>
<div><a href="#">Contact Us</a></div>
<div id="sign-btn"><button>Sign In</button></div>
<div class="signIn">
		<form method="POST" action="admin.php" >
			<div class="form-input">
				<input type="text" name="username" placeholder="Enter the User Name" required/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password" required/>
			</div>
			<input type="submit" type="submit" value="LOGIN" name="btn-login"/><br><br>
         
		</form>
        <div>
		<span>Not register yet?</span><a href="#">Register here</a>
		</div>
           
	</div>



</div>
<div class="availability">
    <form action="room.php" method="POST">
        <div>
            <span>Check In</span>
        <input type="date" name="checkin">

        </div>
        <div>
            <span>Check Out</span>
            <input type="date" name="checkout">

        </div>
    <div> <span>Adult</span>
    <input type="number" name="adult" value="1">
    </div>
    <div><span>Child</span>
<input type="number" name="child" value="0">
</div>
        <div class="check-btn">
            <button>Check Availability
            </button>
        </div>
    </form>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
$(document).ready(()=>{
$('#sign-btn button').click(()=>{
    $('.signIn').slideToggle();

})    
})
</script>