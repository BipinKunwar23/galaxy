<?php 
require_once "anish.php";

if (empty($_GET['s'])) {
    header("Location: index.php");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        body{
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    
</body>
</html>
<?php
$s = $_GET['s'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE name LIKE ?");
$stmt->execute(['%' . $s . '%']);
$data = $stmt->fetchAll();

// print_r($data);
?>

    <?php foreach ($data as $item) { ?>
        <table class="bg_color">
        
            <tr>ID= <?php echo $item['id'];?> </tr><br>
            <tr>Name= <?php echo $item['name'];?> </tr><br>
            <tr>Email= <?php echo $item['email'];?> </tr><br>
            <tr>Address= <?php echo $item['address'];?> </tr><br>
            <tr>
                <a href="edit.php?id=<?php echo $item['id']; ?>">Edit</a> |
                <a href="#" onclick="confirmDelete(<?php echo $item['id']; ?>)">Delete</a>
            </tr>
        </table>
    <?php } ?>
    
    <script>
        function confirmDelete(id) {
            if (confirm('Are you sure?')) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>
    
