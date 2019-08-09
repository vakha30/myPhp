<?php
session_start();
require "Components/ImageManager.php";
require "database/QueryBuilder.php";
require "Components/Auth.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if(isset($_POST['do_post'])) {
    
    $img = $_FILES['image'];

    $user = new Auth(new QueryBuilder);

    $user->uploadAvatar($img, $id, new ImageManager);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Блокнот</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
   <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 class="text-center"><a href="/">Блокнот</a></h1>
            <hr>
                <h3>Загрузка аватарки</h3>
                <form action="addavatar.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data" class="form">
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" required>
                    </div>
                    <input type="submit" class="btn btn-danger" name="do_post" value="Добавить">
                </form>
            </div>
        </div>
   </div>
   <script src="script.js"></script>
</body>
</html>
