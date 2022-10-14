<?php
    $conn =mysqli_connect('localhost','root','','todo');
    var_dump($_GET["id_task"]);
    if (isset($_GET["id_task"])) {
        $usersid = $_GET["id_task"];
        mysqli_query($conn ,"DELETE  FROM tasks WHERE id_task = $usersid");
        header("location:todo.php");
        exit(0);
    }
?>