<?php
require_once('header.php');
$mysqli = new mysqli("localhost", "root", "", "php1901");
$id = $_GET['id'];
$userId = $_SESSION['id'];
$result = $mysqli->query("SELECT * FROM articles WHERE id='$id'");
$row = $result->fetch_assoc();
$comments = $mysqli->query("SELECT comments.comment, users.name, users.lastname FROM comments, users WHERE article_id='$id' AND user_id=users.id");
?>
    <div class="container my-3">
        <h2 class="text-center mb-3"><?= $row['title'] ?></h2>
        <div class="mb-3"><?= $row['content'] ?></div>
        <div class="row my-4">
            <div class="col-sm-6 text-start">
                <?= $row['author'] ?>
            </div>
            <div class="col-sm-6 text-end">
                <a href="/updateArticle.php?id=<?= $row['id'] ?>">[редактировать]</a>
                <a href="/php/handlerDeleteArticle.php?id=<?= $row['id'] ?>">[удалить статью]</a>
            </div>
        </div>

        <form action="/php/handlerAddComment.php" method="post" class="my-4">
            <input type="hidden" name="user_id" value="<?= $userId ?>">
            <input type="hidden" name="article_id" value="<?= $id ?>">
            <div class="mb-3">
                <textarea name="comment" class="form-control" placeholder="Комментарий"></textarea>
            </div>
            <input type="submit" class="btn btn-primary">
        </form>

        <?php while (($row = $comments->fetch_assoc()) != null): ?>
            <div class="my-3">
                <p class="my-1">Пользователь: <?= $row['name'] ?> <?= $row['lastname'] ?></p>
                <p><?= $row['comment'] ?></p>
            </div>
        <?php endwhile; ?>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
