<?php
    require_once('header.php');
?>
    <div class="container my-3">
        <?php
        $mysqli = new mysqli("localhost", "root", "", "php1901");
        $result = $mysqli->query("SELECT * FROM articles");
        while (($row = $result->fetch_assoc()) != null){
            $title = $row['title'];
            $id = $row['id'];
            echo "<div class='mb-3'>
                    <h4>
                        <a href='/article.php?id=$id'>$title</a>
                    </h4>
                  </div>";
        }
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>