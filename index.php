<?php

//Conexão com banco de dados
$dsn = "mysql:host=localhost;port=3308;
dbname=chronicle_db;user=root;password=root;
charset=utf8mb4";

//Criar a instância de conexão
$pdo = new PDO($dsn);

//Prepara a consulta (QUERY SQL)
$statment = $pdo->prepare('SELECT * FROM posts;');
//De fato executa a consulta no banco
$statment->execute();
//Retorna e busca o resultado do banco
$posts = $statment->fetchAll(PDO::FETCH_ASSOC);

// var_dump($posts);

foreach ($posts as $post) {
    echo '<li>' . $post['title'] . '</li>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Posts</title>
    <!-- Bootstrap CSS -->
    <link
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">My Blog</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post.html">Create Post</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Posts List Section -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Todas Postagens</h2>
        <div class="row">
            <?php
            foreach ($posts as $post) {
            ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $post['title']?></h5>
                            <h6 class="card-subtitle mb-2 text-muted">SubTitulo</h6>
                            <p class="card-text">Descrição do texto</p>
                            <button type="button" class="btn btn-outline-primary">
                                visualizar
                            </button>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>