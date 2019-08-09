<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Добавить запись</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Добавить запись</h1>
                <hr>
                <form action="add.php" method="POST" class="form">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Введите название" required>
                    </div>
                    <div class="form-group">
                        <textarea name="text" class="form-control" placeholder="Введите текст" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                    <a href="/" class="btn btn-warning">На главную</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>