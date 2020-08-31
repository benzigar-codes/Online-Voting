<?php
include('connection.php');
$msg = "";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($connection, "select * from users where email='$email' and password='$password';");
    if (mysqli_num_rows($result)) {
        session_destroy();
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['cart'] = array();
        header("Location: home.php");
    } else {
        $msg = "Check your email and password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <title>Log in</title>
</head>

<body>c
    <div class="container col-lg-5 col-sm-12 col-md-5 mt-4">
        <div class="display-4 text-center mt-3">Online Polling</div>
        <form action="index.php" method="post">
            <div class="card m-3 p-3 shadow">
                <h3 class="text-danger"><?php echo $msg; ?></h3>
                <h1>Log in to continue,,, </h1>
                <input required placeholder="email" type="email" name="email" id="" class="form-control mb-3">
                <input required placeholder="password" type="password" name="password" id="" class="form-control mb-3">
                <input name="submit" type="submit" value="Log in" class="btn btn-primary">
                <a class="text-center mt-3" href="createaccount.php">Create an account</a>
            </div>
        </form>
    </div>
</body>

</html>