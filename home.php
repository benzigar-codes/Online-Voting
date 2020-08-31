<?php
include('connection.php');
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $username = mysqli_query($connection, "select username from users where email='$email';");
    $username = mysqli_fetch_all($username);
    $username = $username[0][0];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="bootstrap.min.css">
        <title>Vote your Desition</title>
    </head>

    <body>
        <div class="d-flex justify-content-end align-items-center bg-primary">
            <div class="ml-3 mr-auto d-flex align-items-center">
                <svg height=25 width=25 aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-tie" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-user-tie fa-w-14">
                    <path fill="white" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm95.8 32.6L272 480l-32-136 32-56h-96l32 56-32 136-47.8-191.4C56.9 292 0 350.3 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-72.1-56.9-130.4-128.2-133.8z" class=""></path>
                </svg>
                <h2 class="ml-3 text-white">
                    <?php echo $username; ?>
                </h2>
            </div>
            <a href="logout.php">
                <button class="btn btn-dark m-3">
                    <svg height=25 width=25 aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-sign-out-alt fa-w-16">
                        <path fill="white" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z" class=""></path>
                    </svg>
                </button>
            </a>
        </div>
        <hr>
        <div class="container">
            <?php
                $result = mysqli_query($connection, "SELECT title,field from votetable where email='$email';");
                while ($row = mysqli_fetch_array($result)) {
                    echo '
                    <div class="card container m-3" style="margin:0 120px;">
                        <p class="display-4 m-4">' . $row[0] . '</p>
                        <table class="table table-striped">
                    
                        <tr>
                                <td>
                                <h5>
                                You voted for ' . $row[1] . '
                                </h5>
                                </td>
                            </tr>
                        
                        </table>
                    </div>
                    ';
                }
                ?>
        </div>

        <div class="container">
            <?php
                $result = mysqli_query($connection, "SELECT distinct title from votedetails where title not in (select title from votetable where email='$email');");
                while ($row = mysqli_fetch_array($result)) {
                    echo '
                    <div class="card container m-3" style="margin:0 120px;">
                        <p class="display-4 m-4">' . $row[0] . '</p>
                        <table class="table table-striped">
                            ';
                    $result1 = mysqli_query($connection, "select field from votedetails where title='$row[0]';");
                    while ($row1 = mysqli_fetch_array($result1)) {
                        echo '
                        <tr>
                                <td>' . $row1[0] . '</td>
                                <td>
                                    <a href="putvote.php?title=' . $row[0] . '&field=' . $row1[0] . '">
                                        <button class="btn btn-primary">Vote</button>
                                    </a>
                                </td>
                            </tr>
                        ';
                    }
                    echo '
                        </table>
                    </div>
                    ';
                }
                ?>
        </div>

    </body>

    </html>
<?php
} else {
    header("Location: index.php");
}
?>