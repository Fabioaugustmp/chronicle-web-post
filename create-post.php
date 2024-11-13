<?php

//Conexão com banco de dados
$dsn = "mysql:host=localhost;port=3308;
dbname=chronicle_db;user=root;password=root;
charset=utf8mb4";

//Criar a instância de conexão
$pdo = new PDO($dsn);

//Prepara a consulta (QUERY SQL)
$statment = $pdo->prepare('INSERT INTO chronicle_db.posts
 (title, description) VALUES(:title, :description);');
//De fato executa a consulta no banco
$statment->execute([
    'title' => $_POST['title'],
    'description' => $_POST['description']
]);

header("Location: index.php");
exit();
