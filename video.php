<?php

$msg = "";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TVideo</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="text-light">
    <?php include "components/_nav.php"; ?>
    <div class="container text-center my-3 bg-dark text-light rounded">
        <?php
        $video_id = $_GET['video_no'];
        $sql = "SELECT * FROM `videos` WHERE `sno` = '$video_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '<video class="bd-placeholder-img card-img-top" controls>
    <source src="' . $row['file'] . '" type="video/mp4">
    Your browser does not support HTML video.
  </video>';

        ?>

    </div>
    <div class="container text-center py-3 my-3 bg-dark text-light rounded">

        <h3><?php echo $row['user']; ?> uploaded:<?php echo $row['title']; ?></h3>
        <hr>
        <div class="container">

            <details>
                <summary class="text-info">Description</summary>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem id vitae adipisci quisquam veritatis officia perferendis, quae facere eveniet et, eum quia cum? Enim temporibus amet quibusdam animi. Odio, voluptatum.</p>
            </details>

        </div>
    </div>


    <div class="container text-center bg-dark rounded py-3 px-3 my-2">
        <h3 class="text-center">Comment</h3>
        <form action="video.php?video_no=<?php echo $_GET['video_no']; ?>" method="post">
            <textarea class="form-control my-2 bg-dark text-light" name="comment" id=""></textarea>
            <button type="submit" class="btn btn-dark bg-info">Comment</button>
        </form>
        <?php
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = $_SESSION['name'];
            $video_id = $_GET['video_no'];
            $comment = $_POST['comment'];
            $csql = "INSERT INTO `comments` (`user`, `video_id`, `comment`) VALUES ('$name', '$video_id', '$comment')";
            $cresult = mysqli_query($conn, $csql);
        }
        ?>
    </div>
    <div class="container py-3">
        <?php
        $videNo = $_GET['video_no'];
        $sql = "SELECT * FROM `comments` WHERE `video_id` = '$videNo'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '  <div class="container rounded-4 bg-dark py-3 px-3 my-5">
            <p><b>' . $row['user'] . ': </b>' . $row['comment'] . '</p>
            <small>' . $row['date'] . '</small>
        </div>';
        }

        ?>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>