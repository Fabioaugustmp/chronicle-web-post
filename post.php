<?php
require 'Database.php';

$db = new Database();
$isUpdate = false;
if (isset($_GET) && isset($_GET['update'])) {
    $id = $_GET['update'];
    $isUpdate = true;

    $post = $db->query(
        "SELECT * FROM posts p WHERE p.id = :id ",
        [
            "id" => $id
        ]
    )->fetch();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="posts.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Criar Post</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Form Section -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Criar novo post</h4>
                    </div>
                    <div class="card-body">
                        <form action="<?= $isUpdate ?
                          'update-post.php' : 
                          'create-post.php'?>" method="POST">
                          <input type="text" name="id" hidden value="<?=
                                                                                                                                                        $isUpdate
                                                                                                                                                            ? $post['id']
                                                                                                                                                            : '' ?>">
                            <div class="form-group">            
                                <label for="title">Título</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Adicione um título a sua postagem" value="<?=
                                                                                                                                                        isset($post['title'])
                                                                                                                                                            ? $post['title']
                                                                                                                                                            : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição</label>
                                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Adicione uma descrição sua postagem" required>
                                <?=
                                isset($post['description'])
                                    ? $post['description']
                                    : '' ?>
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>