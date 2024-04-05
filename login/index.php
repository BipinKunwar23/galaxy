<!-- <?php
require_once "anish.php";
//statement
$stmt = $pdo->prepare("SELECT * FROM users");

//execute
$stmt->execute();
//fetch
$users = $stmt->fetchAll();
// print_r($data);

// echo"-------";
// $data =$stmt->fetchAll();
// print_r($data);


// echo $_REQUEST    ["f_name]




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>address</th>

            </tr>
            
        </thead>
    
    

<tbody>
            <?php foreach($users as $usr){?>
            <tr>
                <td><?php echo $usr["id"];?></td>
                <td><?php echo $usr["name"];?></td>
                <td><?php echo $usr["email"];?></td>
                <td><?php echo $usr["address"];?></td>

            </tr>
            <?php }?>
            </tbody>
</table><br>
<a href="create.php" style="border: 1px solid red; " style="text-decoration: none;">CREATE DATABASE</a>
</body>
</html> -->
<?php
require_once "anish.php";

$stmt = $pdo->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<body>

     <?php require_once "hompage.php"?> 
    
<div style="display: flex;">
    <div><a href="create.php">Create</a></div>
    <!-- <div style="padding-left: 15px;"><a href="homepage.php">Homepage</a></div> -->
</div>
    

    <form action="search.php">
        <input type="text" name="s">
        <button>Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $item) { ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><?php echo $item['address']; ?></td>
                    <td><?php echo $item['password'];?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $item['id']; ?>">Edit</a> |
                        <a href="#" onclick="confirmDelete(<?php echo $item['id']; ?>)">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure?')) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>


</body>

</html>