<?php
include('connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <script src="jquery.js"></script>
    <title>Vote System</title>
</head>

<body>
    <div class="container">
        <?php
        if (isset($_GET['delete'])) {
            $delete = $_GET['delete'];
            mysqli_query($connection, "DELETE FROM votedetails where title = '$delete';");
            mysqli_query($connection, "DELETE FROM votetable where title = '$delete';");
        }
        if (isset($_POST['submit'])) {
            $counter = 0;
            $title = $_POST['title'];
            foreach ($_POST as $post) {
                if ($counter == 0)
                    $counter = $counter + 1;
                else {
                    if ($post != 'Insert')
                        mysqli_query($connection, "INSERT INTO votedetails(title,field) values('$title','$post');");
                }
            }
        }
        $result = mysqli_query($connection, "SELECT DISTINCT title from votedetails;");
        if ($result) {
            echo '<p class="lead mt-4">Available Vote Titles : </p>';
            while ($row = mysqli_fetch_array($result)) {
                if ($row[0]) {
                    echo '<div class="alert alert-warning" style="width:300px">';
                    ?>
                    <div class="row alin-items-center">
                        <div class="col">
                            <?php
                                        echo "<h5>$row[0]</h5>";
                                        ?>
                        </div>
                        <div class="col">
                            <?php echo '<a class="m-4" href="admin.php?delete=' . $row[0] . '"><img height=30 width=30 src="Icons/minus.svg"></a>'; ?>
                        </div>
                    </div>
                    <div>
                        <table class="table">
                            <?php
                                        $result1 = mysqli_query($connection, "select field,count(field) from votetable where title='$row[0]' GROUP by field;");
                                        while ($row1 = mysqli_fetch_array($result1)) {
                                            echo '
                                                <tr>
                                                    <td>' . $row1[0] . '</td>
                                                    <td>' . $row1[1] . '</td>
                                                </tr>
                                            ';
                                        }
                                        ?>
                            <tr>
                        </table>
                    </div>
        <?php
                    echo "</div><hr>";
                }
            }
        }
        ?>
        <div class="container mt-3">
            <div class="card">
                <div class="card-body">
                    <form action="admin.php" method="POST">
                        <p>Enter the Title of your vote : </p>
                        <input type="text" name="title" id="" class="form-control">
                        <p>Enter the values one by one,, </p>
                        <input placeholder="fields" type="text" name="field0" id="fields0" class="form-control">
                        <button id="addField" class="mt-2 btn btn-secondary">Add field</button>
                        <br>
                        <input class="btn btn-primary mt-2" type="submit" name="submit" value="Insert">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            let counter = 0;
            $("#addField").click(function(e) {
                e.preventDefault();
                console.log(e.target);
                $("#fields" + counter).after(`
                        <input placeholder="fields" type="text" name="field${++counter}" id="fields${counter}" class="form-control mt-2">
                `);
            });
        });
    </script>
</body>

</html>