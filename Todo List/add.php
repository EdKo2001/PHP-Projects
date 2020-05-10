<?php
    $task = $_POST['task'];
    if($task == '') {
        echo 'Enter what to do';
        exit();
    } 

    require 'configBD.php';

    $sql = "INSERT INTO tasks (task) VALUES ('$task')";

    $conn->query($sql);

    header('Location: /');
?>