<?php
session_start();
require "database/querybuilder.php";
require "Components/Auth.php";
$user = new Auth(new QueryBuilder);

$user_check = $user->check();
$user_info = $user->currentUser();
// var_dump($user_check);
$db = new QueryBuilder();
$posts = $db->getAll("posts");
$user->remove(5);
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
<style>
    .user {
        font-weight: bold;
        color: blue;
        font-size: 20px;
        position: absolute;
        top: 20px;
        right: 45px;
    }

    .hide {
        display: none !important;
    }
</style>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center"><a href="/">Блокнот</a></h1>
                <div class="user">
                    <div style="display: inline;" class="<?php echo $user_check ? 'hide' : '' ?>">
                        <a href="register.php">Зарегистрироваться&nbsp;</a>
                        <a href="login.php">&nbsp;Войти</a>
                    </div>
                    <div style="display: inline;" class="<?php echo $user_check ? '' : 'hide' ?>">
                        <a href="user.php"><?= $user_info['login'] ?>&nbsp;</a>
                        <a href="logout.php">&nbsp;Выйти</a>
                    </div>
                </div>
                <hr>
                <a href="addpost.php" class="btn btn-success mb-2">Добавить</a>

                <table class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Заголовок</th>
                            <th>Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $post): ?>
                            <tr>
                                <td><?= $post['id'] ?></td>
                                <td><?= $post['title'] ?></td>
                                <td>
                                    <a href="showpost.php?id=<?= $post['id'] ?>" class="btn btn-info">Показать</a>
                                    <a href="editpost.php?id=<?= $post['id'] ?>" class="btn btn-warning">Изменить</a>
                                    <a href="deletepost.php?id=<?= $post['id'] ?>" class="btn btn-danger">Удалить</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>