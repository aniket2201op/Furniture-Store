<?php

session_start();
 include_once 'connect.php';
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
}
if (isset($_POST['save_select'])) {
    $query_name = $_SESSION['username'];
    $query = $_POST['query'];
    if (empty($query)){
        echo 'Write the query.';
    }else {
        $sql = "INSERT INTO `queries`(`query_name`, `query`, `answers`) VALUES ('$query_name','$query','?')";
        $result = mysqli_query($conn, $sql);
        header("location: index.php");
    }
}
?>
