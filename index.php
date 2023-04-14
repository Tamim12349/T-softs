<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}


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

<body>
    <?php

    $conn = mysqli_connect("localhost", "root", "", "ttube34");

    ?>
    <nav class="navbar navbar-expand-lg bg-dark fixed-top navbar-dark">
        <div class="container-fluid">
            <img src="img/logo.png" alt="" width="50px" class="navbar-drand">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="report.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="subscribe.php">Subscribe</a>
                    </li>

                </ul>


                <div class="d-flex col-md-6 mx-auto my-1">
                    <input type="text" class="form-control " id="myInput" onkeyup="myFunction()" placeholder="Search for videos.." title="Type in a name">
                    <!-- <button class="btn mx-2 btn-dark bg-info">Search</button> -->
                </div>
                <div class="subbtn">
                    <a href="upload.php">
                        <button class="btn btn-dark bg-info">Upload</button>
                    </a>
                    <a href="logout.php">
                        <button class="bg-info btn btn-dark">Log out</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="container">


        <ul id="myUL" class="text-center  d-flex flex-column mx-auto">

            <?php
            $sql = "SELECT * FROM `videos` ORDER BY `sno` DESC";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li>
                <div class="bg-dark rounded-4 text-start px-3 my-2 py-3 mx-3 text-light">
                <a class="mx-auto nav-link " href="video.php?video_no=' . $row['sno'] . '">
                <h4 class="li">' . substr($row['title'], 0, 150) . '</h4>
                </a>
                <small>Uploaded at : ' . $row['date'] . '</small>

                </div>

                
                </li>';
            }

            ?>


        </ul>
    </div>

    <script>
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByClassName("li")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>