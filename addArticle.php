<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Добавить статью</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center">Добавить статью</h1>
        <div class="col-5 mx-auto">
            <form action="/php/handlerAddArticle.php" method="post">
                <div class="mb-3">
                    <input type="text" class="form-control" name="title" placeholder="Заголовок">
                </div>
                <div class="mb-3">
                    <textarea name="content" class="form-control" placeholder="Контент"></textarea>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="author" placeholder="author">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary form-control">
                </div>
            </form>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>