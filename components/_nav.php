<nav class="navbar navbar-expand-lg fixed-top bg-dark navbar-dark">
    <div class="container-fluid">
        <img src="img/logo.png" alt="" width="50px" class="navbar-drand">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
            <div class="subbtn d-flex">
                <a href="upload.php">
                    <button class="bg-info btn btn-dark">Upload video</button>
                </a>
                <a href="logout.php">
                    <button class="bg-info btn btn-dark">Log out</button>
                </a>
            </div>
        </div>
    </div>
</nav>
<?php

$conn = mysqli_connect("localhost", "root", "", "ttube34");

?>
<br>
<br>
<br>