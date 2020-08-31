<?php
session_start();
$email = $_SESSION['email'];
$title = $_GET['title'];
$field = $_GET['field'];
include("connection.php");
mysqli_query($connection, "insert into votetable values(NULL,'$field','$title','$email');");
header("Location: home.php");
