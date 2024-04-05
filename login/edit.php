<?php

require_once "anish.php";
if (empty($_GET['id'])) {
    die("Please provide ID!");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    die("User with given ID not found!");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>

<body>

    <form action="update.php?id=<?php echo $user['id']; ?>" method="post">

        Name: <input type="text" name="name" value="<?php echo $user['name']; ?>"> <br>
        Email: <input type="email" name="email" value="<?php echo $user['email']; ?>"> <br>
        Address: <input type="text" name="address" value="<?php echo $user['address']; ?>"> <br>
        password: <input type="password" name="password" value="<?php echo $user['password']; ?>"><br> 
        <button>Submit</button>


    </form>

</body>

</html>