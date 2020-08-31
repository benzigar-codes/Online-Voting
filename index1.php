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
        $result = mysqli_query($connection, "SELECT DISTINCT title from votedetails;");
        while ($row = mysqli_fetch_array($result)) {
            if ($row[0]) {
                ?>
                <div class="card container m-3" style="margin:0 120px;">
                    <p class="display-4 m-4"><?php echo $row[0]; ?></p>

                    <table id="<?php echo str_replace(" ", "-", $row[0]); ?>" class="table table-striped">
                        <?php
                                $result1 = mysqli_query($connection, "SELECT field from votedetails where title='$row[0]';");
                                while ($row1 = mysqli_fetch_array($result1)) {
                                    ?>

                            <tr>
                                <td><?php echo $row1[0]; ?></td>
                                <td><button onclick="vote('<?php echo $row[0] . ',' . $row1[0] ?>')" class="btn btn-primary">Vote</button></td>
                            </tr>
                <?php
                        }
                        echo '</table>';
                        echo '</div>';
                    }
                }
                ?>
                </div>
                <script>
                    function checkCookie() {
                        var x = document.cookie;
                        console.log(x);
                    }
                    checkCookie();
                    $(".btn").click(function(e) {
                        e.preventDefault();
                        $(e.target).text("Voted");
                    });

                    function vote(v) {
                        let temp = v.split(',');
                        let title = temp[0];
                        let field = temp[1];
                        $.ajax({
                            type: "post",
                            url: "back.php",
                            data: {
                                title: title,
                                field: field
                            },
                            dataType: "text",
                            success: function(response) {
                                $("#" + title.replace(" ", "-")).html(`
                            ${response}
                            <tr class="bg-primary text-white">
                                <td colspan="2">You voted for ${field}</td>
                            </tr>
                        `);
                                document.cookie = title + "=" + field + "; expires= Thu, 21 Aug 2022 20:00:00 UTC"
                            }
                        });

                    }
                </script>
</body>

</html>