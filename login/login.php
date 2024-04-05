<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <style>
        body{
            background-color: #eee;
        }
        .form{
            border: solid grey 1px;
            width: 20%;
            border-radius: 8px;
            margin: 100px auto;
            background: white;
        }
        #btn{
            color: #fff;
            background: skyblue;
            padding: 5px;
            margin-left: 50%;
        }


    </style>
    <div class="form">
    <form action="admin.php" method="post">
        name: <input type="text" id="name"  name="name"><br><br>
        password: <input type="password" id="password" name="password"><br><br>
        <input type="submit" id="btn" value="login"/>
    </form>
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html>
<head>
	<title>Login|Admin</title>
	<link rel="stylesheet" a href="login.css">
	
</head>
<body>
	<div class="containers" ;
	>
	<h1 style="padding-top:10px;">Admin</h1>
		<form method="POST" action="admin.php" >
			<div class="form-input">
				<input type="text" name="username" placeholder="Enter the User Name" required/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password" required/>
			</div>
			<input type="submit" type="submit" value="LOGIN" name="btn-login"/><br><br>
           
		</form>
        <p>Not register yet?</p><a href="create.php">Register here</a>
	</div>
</body>
</html>