<?php
require 'Database.php';

$db = new Database();
$db->query('INSERT INTO posts (title, description) 
    VALUES(:title, :description);', [
    'title' => $_POST['title'],
    'description' => $_POST['description']
]);

header("Location: index.php");
exit();
