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
        $name = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $email = $_POST['email'];
        $sql = "SELECT * FROM `users` WHERE `name` = '$name' AND `pass` = '$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num !== 1) {

            if ($password == $cpassword) {

                $sql = "INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$name', '$email', '$password')";
                $result = mysqli_query($conn, $sql);
                header("location:login.php");
            } else {
                $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Password does not match
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        } else {
            $msg = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Please enter a different username or password
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
    ?>
    <div class="container my-3">
        <?php
        echo $msg;
        ?>
    </div>
    <div class="container rounded col-md-6 my-3 bg-dark text-light py-3 px-3">

        <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User name</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" maxlength="49" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3 form-check">
                <input name="terms" type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Accept <a class="text-info" href="terms.php">Terms and conditions</a></label>
            </div>
            <button type="submit" class="btn bg-info btn-dark">Submit</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>