<?php

require 'Database.php';

$db = new Database();
var_dump($_POST);

$db->query('UPDATE chronicle_db.posts
SET title=:title, description=:description
WHERE id=:id;', [
    'id' => $_POST['id'],
    'title' => $_POST['title'],
    'description' => $_POST['description']
]);

header("Location: index.php");
exit();