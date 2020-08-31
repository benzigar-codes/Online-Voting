<?php
include('connection.php');
$msg = "";
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($connection, "select * from users where email='$email';");
    if (mysqli_num_rows($result)) {
        $msg = "Email already exists";
    } else {
        mysqli_query($connection, "insert into users values(null,'$username','$password','$email');");
        session_start();
        $_SESSION['email'] = $email;
        header("Location: home.php");
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
    <title>Create account</title>
</head>

<body>
    <div class="container col-lg-5 col-sm-12 col-md-5">
        <div class="display-3 text-center text-primary mt-3">Sign up for a new user</div>
        <form action="createaccount.php" method="post">
            <div class="card m-3 p-3">
                <h3 class="text-danger"><?php echo $msg; ?></h3>
                <h1>Provide the correct details,, </h1>
                <input required placeholder="username" type="text" name="username" id="" class="form-control mb-3">
                <input required placeholder="email" type="email" name="email" id="" class="form-control mb-3">
                <input required placeholder="password" type="password" name="password" id="" class="form-control mb-3">
                <input name="submit" type="submit" value="Create an account" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>

</html>