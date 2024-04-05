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

if (empty($_POST['name']) || empty($_POST['email'])) {
    die("Please fill all the fields!");
}

$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? AND id != ?");
$stmt->execute([$email, $id]);
$usr = $stmt->fetch();

if ($usr) {
    die("The email address is already taken!");
}

// Update
$stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, address = ? WHERE id = ?");
$stmt->execute([$name, $email, $address, $id]);

echo "Updated";