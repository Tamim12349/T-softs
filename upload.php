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
    <div class="container py-3 px-3 bg-dark text-light rounded my-3">
        <?php echo $msg; ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="150">
                <small class="my-1">
                    Please write a title that have less then 150 charecters
                </small>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Upload Video</label>
                <input type="file" name="video" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <textarea type="text" name="desc" class="form-control" id="exampleInputPassword1" style="height: 100px"></textarea>
            </div>

            <button type="submit" class="btn bg-info btn-dark">Submit</button>
        </form>
    </div>

    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $file_name = $_FILES['video']['name'];
        $file_temp = $_FILES['video']['tmp_name'];
        $file_size = $_FILES['video']['size'];
        $user = $_SESSION['name'];
        $file = explode('.', $file_name);
        $end = end($file);
        $name = date("Ymd") . time();
        $location = 'video/' . $name . "." . $end;
        $sql = "INSERT INTO `videos` (`title`, `description`, `file`, `user`) VALUES ('$title', '$desc', '$location', '$name')";
        $result = mysqli_query($conn, $sql);
        move_uploaded_file($file_temp, $location);
    }

    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>