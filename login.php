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
    include "components/_nav.php";

    ?>
    <?php
    $msg = '';
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $name = $_POST['name'];
        $pass = $_POST['password'];
        $sql = "SELECT * FROM `users` WHERE `name` = '$name' AND `pass` = '$pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        $num = mysqli_num_rows($result);
        if ($num == 1) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $name;
            $_SESSION['pass'] = $pass;
            $_SESSION['email'] = $email;
            header("location:index.php");
        }
    }

    ?>
    <div class="container col-md-6 rounded my-3 bg-dark text-light py-3 px-3">
        <form action="login.php" method="post">
            <h4 class="text-center">Please log in to continue</h4>
            <hr>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>

            <small>Already have an account? then <a class="text-info" href="signup.php">Sign UP</a></small>
            <br>
            <button type="submit" class="btn bg-info btn-dark">Log In</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>