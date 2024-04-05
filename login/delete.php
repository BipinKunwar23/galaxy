<?php

require_once "anish.php";

if (empty($_GET['id'])) {
    die("Please provide ID!");
}

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);
echo "DELETED";