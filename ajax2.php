<?php
include_once "db.php";
session_start();
if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $userQuery = "SELECT * FROM user WHERE id = '$user_id'";
    $result = mysqli_query($connection, $userQuery);
    $user = mysqli_fetch_assoc($result);
}else{
    header('Location:home.php');
}
include_once "header.php";
include_once "sidebar.php";


if (isset($_GET['reservation'])){
    include_once "reservation.php";
}
elseif (isset($_GET['studentdashboard'])){
    include_once "studentdashboard.php";
}
elseif (isset($_GET['studcompain'])){
    include_once "studcomplain.php";
}
else{
    include_once "reservation.php";
}

include_once "footer.php";