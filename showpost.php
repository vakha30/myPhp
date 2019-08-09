<?php

require "database/querybuilder.php";

$db = new QueryBuilder();

$id = $_GET['id'];
$post = $db->getOne("posts", $id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Запись #</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Запись #<?= $post['id'] ?></h1>
                <hr>
                <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading"><?= $post['title'] ?></h4>
                    <p><?= $post['text'] ?></p>
                </div>
                <a href="/" class="btn btn-warning">На главную</a>
            </div>
        </div>
    </div>
</body>
</html>