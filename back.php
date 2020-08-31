<?php
include('connection.php');
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $field = $_POST['field'];
    mysqli_query($connection, "INSERT INTO votetable(title,field) values('$title','$field');");
    $fields = mysqli_query($connection, "SELECT field from votedetails where title='$title';");
    while ($field = mysqli_fetch_assoc($fields)) {
        $fieldVal = $field['field'];
        echo '
            <tr>
                <td>
                    ' . $field['field'] . '
                </td>';
        $num = mysqli_query($connection, "select count(field) from votetable where title='$title' and field='$fieldVal';");
        $num = mysqli_fetch_array($num);
        echo '<td>' . $num[0] . '</td>';
        echo '
            </tr>
        ';
    }
}
