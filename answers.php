<?php

session_start();
 include_once 'connect.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
if (isset($_POST['save_answer'])) {
    $query_name = $_SESSION['username'];
    $query = $_POST['query'];
    $answers =$_POST['answer'];
    if (empty($query)) {
        echo 'Give the response.';
    }else {
        $sql = "UPDATE `queries` SET `answers`='$answers' WHERE `query_name`='$query_name';";
        $result = mysqli_query($conn, $sql);
        header("location: admin.php");
    }
}
?>
