<?php
session_start();
require "database/querybuilder.php";
require "Components/Auth.php";
$user = new Auth(new QueryBuilder);

$user_check = $user->check();
$user_info = $user->currentUser();
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
                <h2><?= $user_info['login'] ?></h2>
                <img src="uploads/<?= $user_info['avatar'] ?>" alt="" width=300>
                <a href="addavatar.php?id=<?= $user_info['id'] ?>">Добавить аватар</a>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
